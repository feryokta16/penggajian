<?php
class SlipGaji extends CI_Controller{
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
		$data['title'] = "Slip Gaji Karyawan";
		$data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
		$data['kehadiran'] = $this->penggajianModel->get_data('data_kehadiran')->result();
		$this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterSlipGaji',$data);
        $this->load->view('templates_admin/footer');
	}
	public function cetakSlipGaji(){
		$data['title'] = "cetak slip Gaji";
		$nama= $this->input->post('id_pegawai');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun = $bulan.$tahun;
		
		$data['print_slip'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
		WHERE data_gaji.bulan= '$bulantahun' AND data_pegawai.id_pegawai='$nama'")->result();
		$this->load->view('templates_admin/header',$data);
		$this->load->view('admin/cetakSlipGaji',$data);
	}
}

?>