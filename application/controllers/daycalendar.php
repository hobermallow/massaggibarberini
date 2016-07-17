<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class daycalendar extends CI_Controller {


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
		
		$this->load->model("pazienti");
		$this->load->model("dottori");
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$this->load->view("visualizagiornocalendario", $view);
	}//fine index()
	
	public function view( $id_dottore = 0, $giorno = 0, $mese = 0, $anno = 0 )
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
		
		$view["dottore_corrente"] = $this->dottori->get_dottore_by_id($id_dottore);
		
		//calcolo la data da passare a mysql per la query del giorno...
		$data = "".$anno."-".$mese."-".$giorno;
		
		$view["data_giorno"] = date('d-m-Y', strtotime($data) );
		
		$view["visite_del_giorno"] = $this->pazienti->get_visite_of_day( $data, $id_dottore );
		
		
		$this->load->view("visualizzagiornocalendario", $view);
	}//fine view()
	
	
	
}











































