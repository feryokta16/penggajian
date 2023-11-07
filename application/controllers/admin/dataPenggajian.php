<?php
class DataPenggajian extends CI_Controller{
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
        $data['gaji'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_gaji.gaji_pokok,data_gaji.uang_transport,data_gaji.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
            WHERE data_gaji.bulan='$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/datagaji',$data);
        $this->load->view('templates_admin/footer');
    }
        public function inputAbsensi(){
            if($this->input->post('submit', TRUE) == 'submit'){
                $post = $this->input->post();
                foreach ($post['bulan'] as $key => $value) {
                    if($post['bulan'][$key] !=''|| $post['nik'][$key] !=''){
                        $simpan[] = array(
                            'bulan'        => $post['bulan'][$key],
                            'nik'          => $post['nik'][$key],
                            'nama_pegawai'         => $post['nama_pegawai'][$key],
                            'jenis_kelamin'         => $post['jenis_kelamin'][$key],
                            'nama_jabatan'         => $post['nama_jabatan'][$key],
                            'gaji_pokok'         => $post['gaji_pokok'][$key],
                            'uang_transport'         => $post['uang_transport'][$key],
                            'Bpjs'         => $post['Bpjs'][$key],
                            'jml_tambahan'         => $post['jml_tambahan'][$key],
                            'jml_potongan'         => $post['jml_potongan'][$key],
                            'total_gaji'         => $post['total_gaji'][$key],
                        );
                    }
                }
                $this->penggajianModel->insert_batch('data_gaji',$simpan);
                redirect('admin/dataPenggajian');
            }
        $data['title'] = "Form Input Penggajian";
        if((isset($_GET['bulan']) && $_GET['bulan']!='')&&(isset($_GET['tahun'])&& $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
                    }
        $data['input_absensi'] = $this->db->query("SELECT data_pegawai.*,data_jabatan.jml_tambahan,data_kehadiran.lembur,data_kehadiran.alpha,data_jabatan.jml_potongan,data_jabatan.gaji_pokok,data_jabatan.bpjs,data_jabatan.uang_transport,data_jabatan.Bpjs,data_kehadiran.bulan
            from data_pegawai
            inner join data_jabatan ON data_pegawai.jabatan= data_jabatan.nama_jabatan
            inner join data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
            WHERE data_pegawai.status='Aktif' and data_kehadiran.bulan='$bulantahun' and NOT EXISTS (SELECT * FROM data_gaji WHERE bulan = '$bulantahun' AND data_pegawai.nik= data_gaji.nik and data_kehadiran.bulan) ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formInputgaji',$data);
        $this->load->view('templates_admin/footer');
    }
    public function cetaklaporan(){
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
        $data['kehadiran'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_gaji.gaji_pokok,data_gaji.uang_transport,data_gaji.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
            WHERE data_gaji.bulan='$bulantahun'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakDataGaji');
    }
    public function cetakGaji($id){
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
        $data['cetakGaji'] = $this->db->query("SELECT data_gaji.*,data_pegawai.nama_pegawai,data_pegawai.jenis_kelamin,data_pegawai.jabatan,data_pegawai.status,data_gaji.gaji_pokok,data_gaji.uang_transport,data_gaji.Bpjs,data_gaji.jml_tambahan,data_gaji.jml_potongan,data_pegawai.no_rekening
            from data_gaji
            INNER JOIN data_pegawai ON data_gaji.nik= data_pegawai.nik
            INNER JOIN data_jabatan ON data_gaji.nama_jabatan = data_jabatan.nama_jabatan
            WHERE data_gaji.id_gaji= '$id'
            ORDER BY data_pegawai.nama_pegawai ASC")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('admin/cetakSlipGaji');
    }
}
?>