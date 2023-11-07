<?php
class Datakehadiran extends CI_Controller{
public function __construct(){
        parent :: __construct();
        if($this->session->userdata('hak_akses')!='1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
                <strong>anda belom login</strong>
                </div>');
            redirect('http://localhost/penggajian/login');
        }
    }
    public function index(){
        $data['title'] = "Daftar Hadir Karyawan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $data['present'] = $this->db->query("SELECT presents.*,
            presents.nik,data_pegawai.nama_pegawai,presents.tanggal,presents.bulan,presents.keterangan,presents.tahun,presents.status,presents.photo,presents.nama_jabatan
            from presents
            inner join data_pegawai  on presents.nik = data_pegawai.nik
            inner join data_jabatan on presents.nama_jabatan = data_jabatan.nama_jabatan
            order by data_pegawai.nama_pegawai and presents.tanggal and presents.bulan asc
            ")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/daftarhadir',$data);
        $this->load->view('templates_admin/footer');

    }
     public function tambahData(){
        $data['title'] = "Tambah Data Harian";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();

        $nik = $this->input->post('nik');
        $data['lookupPegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE nik='$nik'")->result();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataHarian',$data);
        $this->load->view('templates_admin/footer');
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
            $jam = $this->input->post('jam');
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
               'jam' =>$jam,
               'photo'=>$photo
            );
            $this->penggajianModel->insert_data($data,'presents');
          redirect('admin/datakehadiran');
        }
        
    }
     public function updateData($id){
            $where = array('id_presents'=>$id);
            $data ['title'] = 'Update data Presensi Pegawai';
            $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
            $data['presents'] = $this->db->query("SELECT * FROM presents WHERE id_presents='$id'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formUpdateKehadiran',$data);
            $this->load->view('templates_admin/footer');

        }
         public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_presents');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $tanggal = $this->input->post('tanggal');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $status = $this->input->post('status');
            $keterangan = $this->input->post('keterangan');
            $photo = $_FILES['photo']['name'];
            if($photo){
                $config ['upload_path'] = './assets/photo';
                $config ['allowed_types'] = 'jpg|jpeg|png|gif';
                $this->load->library('upload',$config);
                if($this->upload->do_upload('photo')){
                    $photo=$this->upload->data('file_name');
                    $this->db->set('photo',$photo);
                }else{
                    echo $this->upload->display_errors();
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
            );
            $where = array(
                'id_presents'=>$id);
            $this->penggajianModel->update_data('presents',$data,$where);
          redirect('admin/datakehadiran');
        }
    }

     public function lihatdata($id){
            $where = array('id_presents'=>$id);
            $data ['title'] = 'View Data presensi';
            $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
            $data['presents'] = $this->db->query("SELECT * FROM presents WHERE id_presents='$id'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/liatdata',$data);
            $this->load->view('templates_admin/footer');

        }


        public function deleteData($id){
        $where = array('id_presents' =>$id);
        $this->penggajianModel->delete_data($where,'presents');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>');
      redirect('admin/Datakehadiran');
    }
    public function _rules(){
        $this->form_validation->set_rules('nik','nik','required');
       
    }
}
?>