<?php
class TambahanGaji extends CI_Controller{
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
		$data['title'] = "Bonus";
		$data['tambah_gaji'] = $this->penggajianModel->get_data('tambahan_gaji')->result();
		$this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/tambahanGaji',$data);
        $this->load->view('templates_admin/footer');
	}
        public function _rules(){
    	$this->form_validation->set_rules('jenis_tambahan','jenis tambahan', 'required');
    	$this->form_validation->set_rules('jml_tambahan','jumlah tambahan', 'required');
    }
    public function deleteData($id){
    	$where = array('id' =>$id);
    	$this->penggajianModel->delete_data($where,'tambahan_gaji');
    		$this->session->set_flashdata('pesan','<div class="alert alert-success alert-success alert-dismissible fade show" role="alert">
    			<strong>data diapus</strong>
    			<button type="button" class="close" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span></button>
    			</div>');
    		redirect('admin/tambahanGaji');
    }

}
?>