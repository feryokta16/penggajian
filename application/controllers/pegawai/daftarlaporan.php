<?php
class daftarlaporan extends CI_Controller{
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
        $data['title'] = "Laporan Pulang";
        $nik = $this->session->userdata('nik');
        $data['laporan_pulang'] = $this->db->query("SELECT presensi_pulang.*,
            presensi_pulang.nik,presensi_pulang.jam_pulang,data_pegawai.nama_pegawai,presensi_pulang.tanggal,presensi_pulang.bulan,presensi_pulang.tahun,presensi_pulang.status,presensi_pulang.photo,presensi_pulang.nama_jabatan,presensi_pulang.keterangan,presensi_pulang.deskripsi
            from presensi_pulang
            inner join data_pegawai  on presensi_pulang.nik = data_pegawai.nik
            inner join data_jabatan on presensi_pulang.nama_jabatan = data_jabatan.nama_jabatan
            where presensi_pulang.nik = '$nik'
            order by presensi_pulang.tanggal asc
            ")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/tablelaporan',$data);
        $this->load->view('templates_pegawai/footer');
    }
}
?>