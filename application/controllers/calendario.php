<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class calendario extends CI_Controller {



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

		$view["visite"] = $this->pazienti->get_all_visite();
		$view["pazienti"] = $this->pazienti->get_all_pazienti();

		$this->load->view("calendario", $view);
	}//fine index()

	//visualizza il calendario del id_dottore passato come argomento
	public function dottore( $id_dottore = 0 )
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

		//verifica della sessione
		$this->load->model("acl");
		/*
		$session_rserial = $this->session->userdata('rserial');
			if( $this->acl->VerificaSessione($session_rserial) == false )
			{
				$this->load->helper('url');
				$login_url = base_url();
				redirect($login_url . "login/info?c=error");
			}
		*/

		$view["error"] = false;

		$this->load->model("pazienti");
		$this->load->model("dottori");

		$view["dottori"] = $this->dottori->get_all_dottori();

		$view["dottore_corrente"] = $this->dottori->get_dottore_by_id( $id_dottore );

		$view["visite"] = $this->pazienti->get_all_visite_by_dottore( $id_dottore );


		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();


		$this->load->view("calendario", $view);

	}


	//visualizza gli appuntamenti
	public function view( $id_visita = 0 )
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

		$id_visita = (int)$id_visita;
		if( $id_visita == 0 || $id_visita < 1 )
		{
			$this->load->helper('url');
			redirect(base_url() . "dashboard");
		}

		$this->load->model("pazienti");
		$this->load->model("dottori");

		$view["dottori"] = $this->dottori->get_all_dottori();

		$view["visita"] = $this->pazienti->get_visita_by_id( $id_visita );

		$view["paziente"] = $this->pazienti->get_paziente_by_visita_id( $id_visita );

		$this->load->view("visualizzavisita", $view);
	}//fine view()


	//visualizza il calendario focussando però l'id della visita passato come argomento
	public function focus( $id_dottore = 0, $id = 0 )
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

		$id = (int)$id;
		if( $id == 0 || $id < 1 )
		{
			$this->load->helper('url');
			redirect(base_url() . "dashboard");
		}

		$this->load->model("pazienti");
		$this->load->model("dottori");
		$view["visita_focus"] = $this->pazienti->get_visita_by_id( $id );

		$view["dottore_corrente"] = $this->dottori->get_dottore_by_id( $id_dottore );

		//devo comunque sia ottenere tutte le visite
		$view["visite"] = $this->pazienti->get_all_visite_by_dottore( $id_dottore );

		$view["dottori"] = $this->dottori->get_all_dottori();

		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();


		$this->load->view("focusvisita", $view);


	}

}
