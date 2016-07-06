<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {


	public function index()
	{
		//esegue semplicamente il logout e riporta al login...
		$this->load->model('acl');
		
		$session_rserial = $this->session->userdata('rserial');
		$this->acl->EseguiLogout($session_rserial);
		
		//elimino la ci_session
		$this->session->sess_destroy();
		
		$this->load->helper('url');
		$login_url = base_url();
		redirect($login_url . "login/info?c=logout");
		
	}
}