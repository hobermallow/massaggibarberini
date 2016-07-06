<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class comparazionecalendari extends CI_Controller {

	
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
		$this->load->model("pazienti");
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$view["error"] = true;
		
		if( $this->input->post("compare_with") && $this->input->post("dottore_iniziale") )
		{
			$view["error"] = false;
			
			$id_dottore1 = $this->input->post("dottore_iniziale");
			$id_dottore2 = $this->input->post("compare_with");
			
			//dati e visite del dottore 1
			$view["dottore1"] = $this->dottori->get_dottore_by_id( $id_dottore1 );
			
			//dati e visite del dottore 2
			$view["dottore2"] = $this->dottori->get_dottore_by_id( $id_dottore2 );
			
		}
		
		
		$this->load->view("comparazionecalendari", $view);
		
	}//fine index()
	
	
}









































