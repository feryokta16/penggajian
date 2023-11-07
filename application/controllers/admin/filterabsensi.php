<?php
class Filterabsensi extends CI_Controller{
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
        $data['title'] = "Filter Absenssi Karyawan";
        $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/filterabsensikaryawan',$data);
        $this->load->view('templates_admin/footer');
    }
    public function persensiharian(){
        $data['title'] = "Rekab Presensi Bulanan";  
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $nama= $this->input->post('nik');
        $data['kehadiran'] = $this->db->query("SELECT presents.*,
            presents.nik,data_pegawai.nama_pegawai,presents.tanggal,presents.bulan,presents.tahun,presents.status,presents.photo,presents.nama_jabatan,presents.keterangan,data_pegawai.nik
            from presents
            inner join data_pegawai  on presents.nik = data_pegawai.nik
            inner join data_jabatan on presents.nama_jabatan = data_jabatan.nama_jabatan
            where presents.bulan='$bulan' and presents.tahun ='$tahun' and presents.nik='$nama'
            ")->result();
        $hadir = $this->db->query("select * from presents where nik='$nama' and status='Hadir' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $sakit = $this->db->query("select * from presents where nik='$nama' and status='Sakit'  and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $izin = $this->db->query("select * from presents where nik='$nama' and status='Izin' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $Alpha = $this->db->query("select * from presents where nik='$nama' and status='Alpha' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $lembur = $this->db->query("select * from lembur where nik='$nama' and status='Lembur' and keterangan='diterima' and bulan='$bulan' and tahun='$tahun' ");
        $validasi =$this->db->query("select * from presents where nik='$nama'and keterangan='Validation' and bulan='$bulan' and tahun='$tahun' ");
        $data['hadir'] =$hadir->num_rows();
        $data['sakit'] =$sakit->num_rows();
        $data['izin'] =$izin->num_rows();
        $data['Alpha'] =$Alpha->num_rows();
        $data['lembur'] =$lembur->num_rows();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/rekabharian',$data);
        $this->load->view('templates_admin/footer');
    }
        public function cetakSlip(){
        $data['title'] = "cetak slip gaji";       
        $data['print_slip'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_jabatan.gaji_pokok,data_jabatan.uang_transport,data_jabatan.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
        WHERE data_gaji.id_gaji= '$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakLaporanKehadiran');
        }
}
?>