<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class prestazionispecialistiche extends CI_Controller {

	
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
		
		
		if( $this->input->post() )
		{
			$this->prestazioni_specialistiche->add_prestazione($this->input->post());
			
			$view["registrazione_avvenuta"] = true;
		}
		
		
	
		$view["prestazioni_specialistiche"] = $this->prestazioni_specialistiche->get_all_prestazioni_specialistiche();
		
		$this->load->view("gestioneprestazionispecialistiche", $view);
		
	}//fine index()
	
	
	public function edit( $id_prestazione = 0 )
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
		//controllo privilegi
		$tipo_account = $this->session->userdata('tipoacc');
		if( $tipo_account == 1 )
		{
			//non si hanno i permessi necessari per accedere alla funzionalità corrente
			$this->load->helper('url');
			redirect(base_url() . "noprivilegi");
		}
		
		
		$this->load->model("dottori");

		$id_prestazione = (int)$id_prestazione;
		if( $id_prestazione == 0 )
		{
			$this->load->helper('url');
			redirect(base_url(). "dashboard");
		}
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		
		
		if( $this->input->post() )
		{
			//allora è stato confermato
			
			$this->prestazioni_specialistiche->edit_prestazione( $id_prestazione, $this->input->post() );
			
			redirect(base_url() . "prestazionispecialistiche");
			
		}
		
		
		$view["prestazione_edit"] = $this->prestazioni_specialistiche->get_prestazione_by_id($id_prestazione);
		
		$this->load->view("editprestazionespecialistica", $view);
		
	}
	
	
	public function delete( $id_prestazione = 0, $conferma_delete = 0 )
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
		//controllo privilegi
		$tipo_account = $this->session->userdata('tipoacc');
		if( $tipo_account == 1 )
		{
			//non si hanno i permessi necessari per accedere alla funzionalità corrente
			$this->load->helper('url');
			redirect(base_url() . "noprivilegi");
		}
		
		
		$this->load->model("dottori");
		
		
			
		$id_prestazione = (int)$id_prestazione;
		if( $id_prestazione == 0 )
		{
			$this->load->helper('url');
			redirect(base_url(). "dashboard");
		}
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		
		if( (int)$conferma_delete == 1 )
		{
			//allora è stato confermato
			
			$this->prestazioni_specialistiche->delete_prestazione($id_prestazione);
			
			redirect(base_url() . "prestazionispecialistiche");
			
		}
		
		
		$view["prestazione_delete"] = $this->prestazioni_specialistiche->get_prestazione_by_id($id_prestazione);
		
		$this->load->view("deleteprestazionespecialistica", $view);
		
		
	}//fine delete()
	
	
}









































