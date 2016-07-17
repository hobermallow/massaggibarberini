<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tasks extends CI_Controller {

	
	public function index()
	{
		//DISABLED!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		redirect(base_url() . "dashboard");
		
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
		$this->load->model("tasks_data");
		
		
		$view["error"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		$view["recent_tasks"] = $this->tasks_data->get_recent_tasks();
		
		$this->load->view("tasks", $view);	
	}//fine index()
	
	//aggiunge un task
	public function add()
	{
		//DISABLED!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		redirect(base_url() . "dashboard");
		
		
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
		
		$this->load->model("tasks_data");
		
		if( $this->input->post("descrizione_task") )
		{
			//salvo il task nel db
			$descrizione_task = $this->input->post("descrizione_task");
			$this->tasks_data->add_task( $descrizione_task );
		}
		
		$this->load->helper('url');
		redirect(base_url() . "tasks");
	}
	
	
	//vengono inviati via post tutti i campi input e bisogna aggiornare totalmente la table dei tasks
	public function update()
	{
		//DISABLED!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		redirect(base_url() . "dashboard");
		
		
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
		
		$this->load->model("tasks_data");
		
		
		//ciclo sull'intero array POST
		$this->tasks_data->reset_all_checkbox();
		foreach( $this->input->post() as $key => $val )
		{
			if( $key[0] == 'c' && $key[1] == 'h' )
			{
				//il valore del post è di un checkbox
				$this->tasks_data->update_checkbox_on($val); //aggiorna il record di id=$val e imposta il suo checkbox su on
			}
			
			if( $key[0] == 't' && $key[1] == 'a' )
			{
				//il valore del post è di un text_input del task
				//ottengo l'id del task
				$temp_string = substr( $key, 5 );
				$id_task = (int)$temp_string;
				
				$this->tasks_data->update_task( $id_task, $val );
				
			}
		}
		
		
		
		$this->load->helper('url');
		redirect(base_url() . "tasks");
		
		
	}//fine update()
	
}









































