<?php
class DataLembur extends CI_Controller{
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
        $data['title'] = "Laporan Lembur";
        $nik = $this->session->userdata('nik');
        $data['lembur'] = $this->db->query("SELECT lembur.*,
            lembur.nik,data_pegawai.nama_pegawai,lembur.tanggal,lembur.bulan,lembur.tahun,lembur.status,lembur.photo,lembur.nama_jabatan,lembur.laporan_lembur
            from lembur
            inner join data_pegawai  on lembur.nik = data_pegawai.nik
            inner join data_jabatan on lembur.nama_jabatan = data_jabatan.nama_jabatan
            order by lembur.tanggal asc
            ")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/lembur',$data);
        $this->load->view('templates_admin/footer');
    }
    public function updateData($id){
            $where = array('id_lembur'=>$id);
            $data ['title'] = 'Validasi Data Lembur';
            $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
            $data['lembur'] = $this->db->query("SELECT * FROM lembur WHERE id_lembur='$id'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formUpdatelembur',$data);
            $this->load->view('templates_admin/footer');

        }
        public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_lembur');
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
                'id_lembur'=>$id);
            $this->penggajianModel->update_data('lembur',$data,$where);
          redirect('admin/datalembur');
        }
    }
    public function _rules(){
        $this->form_validation->set_rules('keterangan','keterangan','required');
       
    }
}
?>