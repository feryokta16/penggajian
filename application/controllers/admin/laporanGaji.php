<?php
class LaporanGaji extends CI_Controller{
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
	$data['title'] ="Laporan Absensi";
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterLaporanGaji');
        $this->load->view('templates_admin/footer');
    }
    public function cetakLaporanGaji(){
		
	$data['title'] = "cetak Gaji Pegawai";
		if((isset($_GET['bulan']) && $_GET['bulan']!='')&&(isset($_GET['tahun'])&& $_GET['tahun']!='')){
						$bulan = $_GET['bulan'];
						$tahun = $_GET['tahun'];
						$bulantahun = $bulan.$tahun;
					}else{
						$bulan = date('m');
						$tahun = date('Y');
						$bulantahun = $bulan.$tahun;
					}
		$data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
		$data['tambahan'] = $this->penggajianModel->get_data('tambahan_gaji')->result();
		$data['cetakGaji'] = $this->db->query("SELECT data_pegawai.nik,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_kehadiran.alpha,data_kehadiran.lembur,data_kehadiran.bulan
			FROM data_pegawai
			INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik
			INNER JOIN data_jabatan ON data_jabatan.nama_jabatan= data_pegawai.jabatan
			WHERE data_kehadiran.bulan='$bulantahun'
			ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakDataGaji',$data);
        	}
}
?>