<?php
class TotalHadir extends CI_Controller{
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
        $data['title'] = "Daftar Absensi";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/totalhadir',$data);
        $this->load->view('templates_admin/footer');
    }
    public function tabelhadir(){
        $data['title'] = "Rekab Lembur Bulanan";  
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $nama= $this->input->post('nik');
        $data['kehadiran'] = $this->db->query("SELECT lembur.*,
        lembur.nik,data_pegawai.nama_pegawai,lembur.tanggal,lembur.bulan,lembur.tahun,lembur.status,lembur.photo,lembur.nama_jabatan,lembur.keterangan,data_pegawai.nik,lembur.laporan_lembur
            from lembur
            inner join data_pegawai  on lembur.nik = data_pegawai.nik
            inner join data_jabatan on lembur.nama_jabatan = data_jabatan.nama_jabatan
            where lembur.bulan='$bulan' and lembur.tahun ='$tahun' and lembur.nik='$nama'
            ")->result();
        $hadir = $this->db->query("select * from presents where nik='$nama' and status='Hadir' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $sakit = $this->db->query("select * from presents where nik='$nama' and status='Sakit'  and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $izin = $this->db->query("select * from presents where nik='$nama' and status='Izin' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $Alpha = $this->db->query("select * from presents where nik='$nama' and status='Alpha' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $lembur = $this->db->query("select * from lembur where nik='$nama' and status='Lembur' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $validasi =$this->db->query("select * from lembur where nik='$nama'and keterangan='Validation' and bulan='$bulan' and tahun='$tahun' ");
        $data['hadir'] =$hadir->num_rows();
        $data['sakit'] =$sakit->num_rows();
        $data['izin'] =$izin->num_rows();
        $data['Alpha'] =$Alpha->num_rows();
        $data['lembur'] =$lembur->num_rows();
        $data['validasi'] =$validasi->num_rows();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tabelhadir',$data);
        $this->load->view('templates_admin/footer');
    }
}
?>