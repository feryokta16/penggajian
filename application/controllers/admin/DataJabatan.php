<?php 
class DataJabatan extends CI_Controller{
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
        $data['title'] = "Data Jabatan";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData(){
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $uang_transport = $this->input->post('uang_transport');
            $Bpjs = $this->input->post('Bpjs');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
               'uang_transport' => $uang_transport,
               'Bpjs' => $Bpjs,
               'jml_tambahan' => $Bpjs,
               'jml_potongan' => $Bpjs,

            );
            $this->penggajianModel->insert_data($data,'data_jabatan');
          redirect('admin/DataJabatan');
        }
    }
    public function updateData($id){
        $where = array('id_jabatan' => $id);
        $data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan='$id'")->result();
        $data['title'] = "Tambah Data Jabatan";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/updateDataJabatan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id         =$this->input->post('id_jabatan');
            $nama_jabatan = $this->input->post('nama_jabatan');
            $gaji_pokok = $this->input->post('gaji_pokok');
            $uang_transport = $this->input->post('uang_transport');
            $Bpjs = $this->input->post('Bpjs');
            $jml_potongan = $this->input->post('jml_potongan');
            $jml_tambahan = $this->input->post('jml_tambahan');

            $data = array(
                'nama_jabatan' => $nama_jabatan,
                'gaji_pokok' => $gaji_pokok,
               'uang_transport' => $uang_transport,
               'Bpjs' => $Bpjs,
               'jml_potongan'=>$jml_potongan,
               'jml_tambahan'=>$jml_tambahan
            );
            $where = array(
                'id_jabatan' =>$id
            );
            $this->penggajianModel->update_data('data_jabatan',$data,$where);
            $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
          </div>');
          redirect('admin/DataJabatan');
        }
    }
    
    public function _rules(){
        $this->form_validation->set_rules('nama_jabatan','nama jabatan','required');
        $this->form_validation->set_rules('gaji_pokok','gaji pokok','required');
        $this->form_validation->set_rules('uang_transport','uang transport','required');
        $this->form_validation->set_rules('Bpjs','Bpjs','required');
       
    }
    public function deleteData($id){
        $where = array('id_jabatan' =>$id);
        $this->penggajianModel->delete_data($where,'data_jabatan');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>');
      redirect('admin/DataJabatan');
    }
}
?>