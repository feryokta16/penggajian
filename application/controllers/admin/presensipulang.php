<?php
class presensipulang extends CI_Controller{
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
        $data['title'] = "Data Presensi Pulang Pegawai";
        $id = $this->session->userdata('id_pegawai');
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
        $data['presensi_pulang'] = $this->db->query("SELECT presensi_pulang.*,
            presensi_pulang.nik,data_pegawai.nama_pegawai,presensi_pulang.jam_pulang,presensi_pulang.tanggal,presensi_pulang.bulan,presensi_pulang.tahun,presensi_pulang.status,presensi_pulang.photo,presensi_pulang.nama_jabatan,presensi_pulang.keterangan
            from presensi_pulang
            inner join data_pegawai  on presensi_pulang.nik = data_pegawai.nik
            inner join data_jabatan on presensi_pulang.nama_jabatan = data_jabatan.nama_jabatan
            order by presensi_pulang.tanggal asc
            ")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/presensipulang',$data);
        $this->load->view('templates_admin/footer');
    }
    public function updateData($id){
            $where = array('id_presensi_pulang'=>$id);
            $data ['title'] = 'Validasi Data Pulang';
            $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
            $data['lembur'] = $this->db->query("SELECT * FROM presensi_pulang WHERE id_presensi_pulang='$id'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formUpdatepulang',$data);
            $this->load->view('templates_admin/footer');

        }
        public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_presensi_pulang');
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
               'keterangan' =>$keterangan,
            );
            $where = array(
                'id_presensi_pulang'=>$id);
            $this->penggajianModel->update_data('presensi_pulang',$data,$where);
          redirect('admin/presensipulang');
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('nik','nik','required');
       
    }
}
?>