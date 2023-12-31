<?php
class dataPegawai extends CI_Controller{
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
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataPegawai',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahData(){
        $data['title'] = "Tambah Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahPegawai',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tambahDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $jabatan = $this->input->post('jabatan');
            $no_rekening = $this->input->post('no_rekening');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $password = ($this->input->post('password'));
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
               'jenis_kelamin' => $jenis_kelamin,
               'jabatan' =>$jabatan,
               'no_rekening' =>$no_rekening,
               'tanggal_masuk' => $tanggal_masuk,
               'status' =>$status,
               'hak_akses' =>$hak_akses,
               'username' =>$username,
               'password' =>$password,
               'photo'=>$photo
            );
            $this->penggajianModel->insert_data($data,'data_pegawai');
          redirect('admin/dataPegawai');
        }
        
    }
    public function updateData($id){
            $where = array('id_pegawai'=>$id);
            $data ['title'] = 'Update data Pegawai';
            $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
            $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formUpdatePegawai',$data);
            $this->load->view('templates_admin/footer');

        }
        public function updateDataAksi(){
        $this->_rules();
        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id = $this->input->post('id_pegawai');
            $nik = $this->input->post('nik');
            $nama_pegawai = $this->input->post('nama_pegawai');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $no_rekening = $this->input->post('no_rekening');
            $jabatan = $this->input->post('jabatan');
            $tanggal_masuk = $this->input->post('tanggal_masuk');
            $status = $this->input->post('status');
            $hak_akses = $this->input->post('hak_akses');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
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
               'jenis_kelamin' => $jenis_kelamin,
               'jabatan' =>$jabatan,
               'no_rekening' =>$no_rekening,
               'tanggal_masuk' => $tanggal_masuk,
               'status' =>$status,
               'hak_akses' =>$hak_akses,
               'username' =>$username,
               'password' =>$password,
            );
            $where = array(
                'id_pegawai'=>$id);
            $this->penggajianModel->update_data('data_pegawai',$data,$where);
          redirect('admin/dataPegawai');
        }
    }
    public function deleteData($id){
        $where = array('id_pegawai' =>$id);
        $this->penggajianModel->delete_data($where,'data_pegawai');
        $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
      </div>');
      redirect('admin/DataPegawai');
    }
        
    public function _rules(){
        $this->form_validation->set_rules('nik','nim','required');
        $this->form_validation->set_rules('nama_pegawai','nama pegawai','required');
        $this->form_validation->set_rules('tanggal_masuk','tanggal masuk','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('status','status','required');
       
    }
    }
?>