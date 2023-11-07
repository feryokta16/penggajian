<?php
class presensipulang extends CI_Controller{
public function __construct(){
        parent :: __construct();
        if($this->session->userdata('hak_akses')!='3'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
                <strong>anda belom login</strong>
                </div>');
            redirect('http://localhost/penggajian/login');
        }
    }
    public function index(){
        $data['title'] = "Presensi Pulang";
        $id = $this->session->userdata('id_pegawai');
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
        $this->load->view('templates_pemilik/header',$data);
        $this->load->view('templates_pemilik/sidebar');
        $this->load->view('pemilik/Absensipulang',$data);
        $this->load->view('templates_pemilik/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->index();
        }else{
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $tanggal = $this->input->post('tanggal');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');
            $deskripsi = $this->input->post('deskripsi');
            $jam_pulang = $this->input->post('jam_pulang');
            $photo = $_FILES['photo']['name'];
            if($photo =''){}else{
                $config ['upload_path'] = './assets/photo';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('photo')){
                    echo "photo gagal";
                }else{
                    $photo=$this->upload->data('file_name');
                }
            }
            $data = array(
                'nik' => $nik,
                'nama_pegawai' => $nama_pegawai,
               'nama_jabatan' =>$nama_jabatan,
               'tanggal'=>$tanggal,
               'bulan'=>$bulan,
               'tahun'=>$tahun,
               'status' =>$status,
               'keterangan' =>$keterangan,
               'deskripsi' =>$deskripsi,
               'jam_pulang'=>$jam_pulang,
               'photo'=>$photo
            );
            $this->penggajianModel->insert_data($data,'presensi_pulang');
          redirect('pemilik/dashboard');
        }
        
    }
    public function _rules(){
        $this->form_validation->set_rules('nik','nik','required');
       
    }
}
?>