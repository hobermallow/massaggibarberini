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
		$view["prestazioni"] = $this->dottori->get_prestazioni_by_id_dottore($id_dottore);
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
	
	private function get_id_paziente_by_string( $stringa )
	{
		preg_match_all("(<(.*?)>)si", $stringa, $risultato );
		if( isset($risultato[1][0]) ) return $risultato[1][0];
		else return false;
	
	}
	
	public function generale() {
		//verifica della sessione
		$this->load->model("acl");
		$this->load->model("pazienti");
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if( $this->acl->VerificaSessione($session_rserial) == false )
		{
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		
		//se si e' inviato post di registrazione
		if( $this->input->post("paziente") && $this->input->post("data_visita") && $this->input->post("ora_visita")  )
		{
			//allora il form è stato inviato...
			$id_paziente = (int)$this->get_id_paziente_by_string( $this->input->post("paziente") );
			if($id_paziente == FALSE) {
				//registro nuovo paziente
				$paziente = $this->input->post("paziente");
				$paziente = preg_split('/\s+/', $paziente);
				$nome = $paziente[0];
				$cognome = $paziente[1];
				$id_paziente = $this->pazienti->add_paziente_with_name_surname($nome, $cognome);
				
			}
			//converto la data in formato compatibile con mysql
			$data_visita = $this->input->post("data_visita");
			if( $data_visita != false && $data_visita != "" )
			{
				$data_visita = str_replace("/", "-", $data_visita);
				$data_visita = date('Y-m-d', strtotime($data_visita) );
			}
			else
			{
				$view["error"] = true;
				// 				redirect($_SERVER['HTTP_REFERER']);
				// 				break;
			}
		
			$ora_visita = $this->input->post("ora_visita");
			$descrizione_visita = $this->input->post("descrizione_visita");
			$id_dottore = intval($this->input->post("dottore"));
			$id_prestazione = intval($this->input->post("prestazione"));
		
			if( $id_paziente == "" || $ora_visita == "" || $ora_visita == false  )
			{
				//form con completato correttamente...
				$view["error"] = true;
				// 				redirect($_SERVER['HTTP_REFERER']);
				// 				break;
			}
			else
			{
				if($id_dottore == 0) {
					$id_dottore = "NULL";
				}
		
				if($id_prestazione == 0) {
					$id_prestazione = "NULL";
				}
				//tutto è corretto
				//ottengo l'id del paziente relativo in base al suo codice fiscale
		
				$id_visita = $this->pazienti->registra_visita( $id_paziente, $id_dottore, $data_visita, $ora_visita, $descrizione_visita, $id_prestazione );
		
				$view["visita_salvata"] = true;
		
		
		
				$this->load->helper('url');
				if($id_dottore == "NULL") {
					redirect(base_url() . "visite/sospese");
				}
				redirect(base_url() . "calendario/focus/".$id_dottore."/".$id_visita);
			}
		
		}
		
		$view["username"] = $this->session->userdata("username");
		$this->session->set_userdata(['id_studio' => Domini::get_id_studio()]);
		$this->load->model("dottori");
		$this->load->model("visite_data");
		$view["dottori"] = $this->dottori->get_all_dottori();
		$view["operatori"] = $this->dottori->get_all_dottori();
		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();
		$view['visite'] = $this->visite_data->get_all_visite();
		$view['prestazioni'] = $this->dottori->get_prestazioni();
		$view['durate'] = [];
		foreach ($view['visite']->result() as $visita) {
			$view['durate'][] = $this->visite_data->get_durata_visita_by_id_prestazione($visita->id_prestazione);
		}
		$this->load->view("calendario_generico", $view);
	}

}
