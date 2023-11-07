<?php
class Dashboard extends CI_Controller{
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
        $data['title'] = "Dashboard";
        $pegawai = $this->db->query("select * from data_pegawai");
        $jabatan = $this->db->query("select * from data_jabatan");
        $kehadiran = $this->db->query("select * from data_kehadiran");
        $admin = $this->db->query("select * from data_pegawai where hak_akses = '1'");
        $data['pegawai'] =$pegawai->num_rows();
        $data['admin'] =$admin->num_rows();
        $data['jabatan'] =$jabatan->num_rows();
        $data['kehadiran'] =$kehadiran->num_rows();
        $data['pegawai_laki'] = $this->penggajianModel->getPegawaiJK('Laki-Laki');
        $data['pegawai_perempuan'] = $this->penggajianModel->getPegawaiJK('Perempuan');
        $data['tetap'] = $this->penggajianModel->getStatus('Aktif');
        $data['tidaktetap'] = $this->penggajianModel->getStatus('Tidak Aktif');
        $this->load->view('templates_pemilik/header',$data);
        $this->load->view('templates_pemilik/sidebar');
        $this->load->view('pemilik/dashboard',$data);
        $this->load->view('templates_pemilik/footer');
    }
}
?>