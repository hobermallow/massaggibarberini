<?php
class gallery extends CI_Controller {



	function  __construct() {
		parent::__construct();
		$this->load->model('dottori');
		$this->load->model('gallery_data');
	}

	public function index() {

		//verifica della sessione
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
				$this->load->helper('url');
				$login_url = base_url();
				redirect($login_url . "login/info?c=error");
		}

		$view["dottori"] = $this->dottori->get_all_dottori();
		
		if ($this->input->post("upload")) {
			//richiamo l'upload dal modello
			$this->gallery_data->do_upload();
		}
		
// 		$view["immagini"] = $this->gallery_data->get_images();
		echo APPPATH;
		exit;
// 		$this->load->view('gallery', $view);
	}


}
