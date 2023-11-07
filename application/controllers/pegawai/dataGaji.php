<?php
class DataGaji extends CI_controller{

public function __construct(){
        parent :: __construct();
        if($this->session->userdata('hak_akses')!='2'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
                <strong>anda belom login</strong>
                </div>');
            redirect('http://localhost/penggajian/login');
        }
    }
public function index()
{
    
	$data['title'] = "Data Gaji Karyawan";
    $nik = $this->session->userdata('nik');
    $data['gaji'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
        WHERE data_gaji.nik='$nik'
        ORDER BY data_gaji.bulan DESC")->result();
	$this->load->view('templates_pegawai/header',$data);
	$this->load->view('templates_pegawai/sidebar');
	$this->load->view('pegawai/dataGaji',$data);
	$this->load->view('templates_pegawai/footer');
    }


    public function cetakSlip($id){
        $data['title'] = "cetak slip gaji";       
        $data['print_slip'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
        WHERE data_gaji.id_gaji= '$id'")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('pegawai/cetakSlipGaji');
        }
}
?>