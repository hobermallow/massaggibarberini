<?php
class Gallery extends CI_Controller {
	
	
	
	function  __construct() {
		parent::__construct();
		$this->load->model('dottori');
		$this->load->model('gallery');
	}
	
	public function index() {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		if ($this->input->post("Upload")) {
			//richiamo l'upload dal modello
			$this->gallery->do_upload();
		}
		$this->load->view('gallery');
	}
	
	
}