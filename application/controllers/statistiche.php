<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class statistiche extends CI_Controller {

	

	public function index( $modifica_effettuata = 0 )
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
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		
		
		$view["statistica_patologie"] = $this->statistiche_data->get_statistica_patologie();
		
		$view["statistica_farmaci"] = $this->statistiche_data->get_statistica_farmaci();
		
		
		$view["statistica_visite_mensili"] = $this->statistiche_data->get_statistica_visite_mensile();
		
		
		
		$this->load->view("statistiche", $view);
		
		
	}//fine index()
	
	
	
	
	
}







































