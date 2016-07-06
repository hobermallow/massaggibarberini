<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gestionericette extends CI_Controller {

	

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
			
			
		
		
	}//fine index()
	
	public function addricetta( $id_paziente = 0 )
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
		
		$this->load->model("pazienti");
		$this->load->model("dottori");
		
		
		
		$view["error"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		//controllo id_paziente
		$id_paziente = (int)$id_paziente;
		if( $id_paziente == 0 )
		{
			$this->load->helper('url');
			redirect(base_url() . "gestionericette");
		}
		
		$view["paziente"] = $this->pazienti->get_paziente_by_id($id_paziente);
		
		$view["prestazioni_specialistiche"] = $this->prestazioni_specialistiche->get_all_prestazioni_specialistiche();
		
		
		$this->load->view("addricetta", $view);
		
		
	}//fine addricetta()
	
	public function ricettacustom()
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
		
		$this->load->model("pazienti");
		$this->load->model("dottori");
		
		$view["dottori"] = $this->dottori->get_all_dottori();
	
	
		$this->load->view("ricettacustom", $view);
	
	}//fine ricettacustom()
	
	
	
}







































