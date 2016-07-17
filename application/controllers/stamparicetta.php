<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stamparicetta extends CI_Controller {

	
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
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		//ciclo sull'intero array POST
		$voci_ricetta = array();
		foreach( $this->input->post() as $key => $val )
		{
			if( $key[0] == 'r' && $key[1] == 'i' && $key[2] == 'c' && $key[3] == 'e' && $key[4] == 't' && $key[5] == 't' && $key[6] == 'a' && $key[7] == '_' && $key[8] == 'c' && $key[9] == 'a' && $key[10] == 'm' && $key[11] == 'p' && $key[12] == 'o' && $key[13] == '_' )
			{
				//se arrivo qui significa che questa chiave post è un campo ricetta che devo printare nella ricetta
				$voci_ricetta[] = $val; //aggiorna il record di id=$val e imposta il suo checkbox su on
			}
		}

		$view["voci_ricetta"] = $voci_ricetta;
		
		$this->load->view("stamparicetta", $view);
		
	}//fine index()
	
	
}









































