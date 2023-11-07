<?php
class Profile extends CI_controller{

public function __construct(){
        parent :: __construct();
        if($this->session->userdata('hak_akses')!='1'){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
                <strong>anda belom login</strong>
                </div>');
            redirect('http://localhost/penggajian/login');
        }
    }
public function index()
{
	$data['title'] = "Dashboard";
    $id = $this->session->userdata('id_pegawai');

    $data['pegawai'] = $this->db->query("SELECT * FROM data_pegawai WHERE id_pegawai='$id'")->result();
	$this->load->view('templates_admin/header',$data);
	$this->load->view('templates_admin/sidebar');
	$this->load->view('admin/profile',$data);
	$this->load->view('templates_admin/footer');
    }
}
?>