<?php
class Login extends CI_Controller {

	
	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE){
		$data['title'] = "Form Login";
		$this->load->view('templates_admin/header',$data);
		$this->load->view('formlogin');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$cek = $this->penggajianModel->cek_login($username, $password);

			if($cek == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-success alert-dismissible fade show" role="alert">
    			<strong>username atau Password salah </strong>
    			</div>');
				redirect('http://localhost/penggajian/login');
			}else{
				$this->session->set_userdata('hak_akses',$cek->hak_akses);
				$this->session->set_userdata('nama_pegawai',$cek->nama_pegawai);
				$this->session->set_userdata('photo',$cek->photo);
				$this->session->set_userdata('id_pegawai',$cek->id_pegawai);
				$this->session->set_userdata('nik',$cek->nik);
				$this->session->set_userdata('nik',$cek->nik);

				switch ($cek->hak_akses) {
					case 1:redirect('admin/dashboard');
						break;
					
					case 2 :redirect('pegawai/dashboard');
						break;
					case 3 : redirect('pemilik/dashboard');
						break;
					case 4 : redirect('http://localhost/penggajian/login');
						default:break;
				}
			}
		}	
	}
	public function _rules(){
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

}
