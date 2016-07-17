<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoriepazienti extends CI_Controller {

	
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
		
		$view["categoria_aggiunta"] = false;
		$view["error"] = false;
		
		if( $this->input->post() )
		{
			//si sta tentando di aggiungere una categoria
			$view["categoria_aggiunta"] = $this->categorie_pazienti_data->add_categoria_pazienti( $this->input->post() );
			if( $view["categoria_aggiunta"] == false ) $view["error"] = true;
		}
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		

		$view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
		
		//calcolo per ogni categoria i pazienti assegnati ad essa
		$view["count_pazienti_per_categoria"] = $this->categorie_pazienti_data->get_count_pazienti_per_categoria( $view["all_categorie_pazienti"] );
		
				
		$this->load->view("categoriepazienti", $view);	
	}
	//fine index()
	
	public function edit( $id_categoria )
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
			
		$id_categoria = (int)$id_categoria;
		if( $id_categoria < 1 )
		{
			redirect( base_url() . "categoriepazienti" );
		}
		
		if( $this->input->post() )
		{
			//si sta tentando di modificare una categoria
			$this->categorie_pazienti_data->edit_categoria_pazienti( $id_categoria, $this->input->post() );
			redirect( base_url() . "categoriepazienti" );
		}
		
		
		$view["categoria"] = $this->categorie_pazienti_data->get_categoria_pazienti_by_id( $id_categoria );
		
		
		$this->load->view("editcategoriapazienti", $view);
		
	}//public function edit
	
	
	public function delete( $id_categoria )
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
			
		
		$id_categoria = (int)$id_categoria;
		if( $id_categoria < 1 )
		{
			redirect( base_url() . "categoriepazienti" );
		}
		else
		{
			$this->categorie_pazienti_data->delete_categoria_pazienti( $id_categoria );
			redirect( base_url() . "categoriepazienti" );
		}
		
			
		
	}//public function delete
	
	
	
}





































