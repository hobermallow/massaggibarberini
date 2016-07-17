<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gestioneutenti extends CI_Controller {

	
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
			
		$this->load->helper('url');
		redirect(base_url() . "dashboard");

	}//fine index()
	
	public function delete( $id_utente = 0 )
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
		
		
			
		$id_utente = (int)$id_utente;
		if( $id_utente == 0 )
		{
			$this->load->helper('url');
			redirect(base_url(). "dashboard");
		}
		
		
		$view["delete_avvenuto"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$view["utente_da_eliminare"] = $this->acl->get_user_by_id($id_utente);
		
		//$this->dottori->delete_dottore( $id_dottore );
		
		$view["delete_avvenuto"] = true;
		
		$this->load->view("confermaeliminazioneutente", $view);
		
		
	}//fine delete()
	
	public function conferma_eliminazione( $id_utente = 0 )
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
			
		$id_utente = (int)$id_utente;
		if( $id_utente == 0 )
		{
			$this->load->helper('url');
			redirect(base_url(). "dashboard");
		}
		else
		{
			$this->acl->delete_utente( $id_utente );
			
			$this->load->helper('url');
			redirect(base_url(). "impostazioni/index/1");
		}


	}//fine conferma_eliminazione()
	
	//modifica un account
	public function edit( $id = -1 )
	{
		$this->load->model("pazienti");
		$this->load->model("dottori");
		
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
			
		$id_edit = (int)$id;
		if( $id_edit == -1 )
		{
			//errore
			$this->load->helper('url');
			redirect(base_url()."impostazioni");
		}
		
		
		$view["errore"] = false;
		$view["modifica_avvenuta"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$query_user = $this->acl->get_user_by_id($id_edit);
		$view["account_edit"] = $query_user->result();
		
		//se è stato inviato il form di editing delle info del paziente...
		if( $this->input->post("submit") != false )
		{
			//si sta cercando di aggiungere un nuovo utente al sistema...
			$username = $this->input->post("username");
			if( $this->input->post("password") == "" ) $password_md5 = "";
			else $password_md5 = md5($this->input->post("password"));
			$tipoacc = $this->input->post("tipoacc");
			
			//for security reason...
			unset($_POST);
			
			$this->acl->update_user( $id_edit, $username, $password_md5, $tipoacc);
			
			$view["update_riuscito"] = true;
			
			$this->load->helper('url');
			redirect(base_url() . "impostazioni/index/1");
		}
		

		$this->load->view("editutente", $view);
	}
	//fine edit()
}









































