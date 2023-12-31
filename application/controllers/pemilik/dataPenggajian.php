<?php
class DataPenggajian extends CI_Controller{
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
        $data['title'] = "Data  Penggajian Pegawai";
        if((isset($_GET['bulan']) && $_GET['bulan']!='')&&(isset($_GET['tahun'])&& $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
                    }
        $data['gaji'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
            WHERE data_gaji.bulan='$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_pemilik/header',$data);
        $this->load->view('templates_pemilik/sidebar');
        $this->load->view('pemilik/datagaji',$data);
        $this->load->view('templates_pemilik/footer');
    }
}
?>