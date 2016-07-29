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
			$this->gallery_data->do_upload();
		}
		else if ($this->input->post("delete")) {
			if(null != $this->input->post("images") && count($this->input->post("images"))) {
				$this->gallery_data->delete($this->input->post("images"));
			}
		}
		$view["immagini"] = $this->gallery_data->get_media();
		$this->load->view('gallery', $view);
	}

	public function upload() {
		if ($this->input->post("upload")) {
			if($this->gallery_data->do_upload()) {
// 			echo "Upload eseguito";
// 			echo var_dump($_POST);
// 			echo var_dump($_FILES);
// 			exit;
				echo "Upload eseguito con successo";
			}
			else {
				echo "Errore nell'upload";
			}
		}
		else if ($this->input->post("delete")) {
// 			echo var_dump($_POST);
// 			echo var_dump($_FILES);
// 			exit;
			if(null != $this->input->post("images") && count($this->input->post("images"))) {
				if($this->gallery_data->delete($this->input->post("images"))) {
					echo "Cancellazione eseguita";
				}
				else {
					echo "Errore nella cancellazione";
				}
			}
		}
	}

}
