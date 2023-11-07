<?php
class TableLembur extends CI_Controller{
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
        $data['title'] = "Laporan Lembur";
        $nik = $this->session->userdata('nik');
        $data['lembur'] = $this->db->query("SELECT lembur.*,
            lembur.nik,data_pegawai.nama_pegawai,lembur.tanggal,lembur.bulan,lembur.tahun,lembur.status,lembur.photo,lembur.nama_jabatan,lembur.laporan_lembur
            from lembur
            inner join data_pegawai  on lembur.nik = data_pegawai.nik
            inner join data_jabatan on lembur.nama_jabatan = data_jabatan.nama_jabatan
            where lembur.nik = '$nik'
            order by lembur.tanggal asc
            ")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/tablelembur',$data);
        $this->load->view('templates_pegawai/footer');
    }
}
?>