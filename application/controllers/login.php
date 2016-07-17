<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()	{
		parent::__construct();
	}

	public function index()	{
		$this->load->view('login');
	}

	public function info()
	{
		$get = $this->input->get("c");
		if( $get == "logout" ) $this->load->view("logout");
		if( $get == "error" ) $this->load->view("login_error");

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
