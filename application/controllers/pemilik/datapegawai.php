<?php
class dataPegawai extends CI_Controller{
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
        $data['title'] = "Data Pegawai";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_pemilik/header',$data);
        $this->load->view('templates_pemilik/sidebar');
        $this->load->view('pemilik/datapegawai',$data);
        $this->load->view('templates_pemilik/footer');
    }
    }
?>