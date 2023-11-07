<?php
class Dashboard extends CI_Controller{
public function __construct(){
        parent :: __construct();
        if($this->session->userdata('hak_akses')!='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
                <strong>anda belom login</strong>
                </div>');
            redirect('http://localhost/penggajian/login');
        }
    }
    public function index(){
        $data['title'] = "Dashboard";
        $nik = $this->session->userdata('nik');
        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_pegawai.no_rekening
            from data_kehadiran
            INNER JOIN data_pegawai ON data_kehadiran.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_kehadiran.nama_jabatan = data_jabatan.nama_jabatan
            WHERE data_kehadiran.nik='$nik'
            ORDER BY data_kehadiran.bulan DESC")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboard',$data);
        $this->load->view('templates_pegawai/footer');
    }
}
?>