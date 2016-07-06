<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class noprivilegi extends CI_Controller {

	

	public function index()
	{
		//verifica della sessione
		$this->load->model("acl");
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
			if( $this->acl->VerificaSessione($session_rserial) == false )
			{
				$this->load->helper('url');
				$login_url = base_url();
				redirect($login_url . "login/info?c=error");
			}
		
		
		$this->load->model("dottori");
		
		
		$view["error"] = false;
		$view["registrazione_avvenuta"] = false;
		$view["delete_avvenuto"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$this->load->view("noprivilegi", $view);
		
		
	}//fine index()
}