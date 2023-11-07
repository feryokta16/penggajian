<?php
class TableAbsensi extends CI_Controller{
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
        $data['title'] = "Daftar Hadir";
        $nik = $this->session->userdata('nik');
        $data['kehadiran'] = $this->db->query("SELECT presents.*,
            presents.nik,presents.nik,data_pegawai.nama_pegawai,presents.tanggal,presents.bulan,presents.tahun,presents.status,presents.photo,presents.nama_jabatan
            from presents
            inner join data_pegawai  on presents.nik = data_pegawai.nik
            inner join data_jabatan on presents.nama_jabatan = data_jabatan.nama_jabatan
            where presents.nik = '$nik'
            order by presents.tanggal asc
            ")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/tableabsensi',$data);
        $this->load->view('templates_pegawai/footer');
    }
}
?>