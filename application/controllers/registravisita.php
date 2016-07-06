<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class registravisita extends CI_Controller {

	//a partire da una stringa del tipo <nome> <cognome> (<codice_fiscale>), ritorna il codice fiscale del paziente, ritorna false se non è stato possibile ottenere l'id del paziente
	private function get_id_paziente_by_string( $stringa )
	{
		preg_match_all("(<(.*?)>)si", $stringa, $risultato );
		if( isset($risultato[1][0]) ) return $risultato[1][0];
		else return false;

	}


	public function check_visita_unique()
	{
		//verifica della sessione
		$this->load->model("acl");
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
			if( $this->acl->VerificaSessione($session_rserial) == false )
			{
				return -1;
			}

		if( !$this->input->post() ) return -1;

		//ho anche i valori post

		$visita_unique = $this->pazienti->check_visita_unique( $this->input->post() );

		if( $visita_unique == false ) echo "false";
		if( $visita_unique == true ) echo "true";

	}


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



		$view["error"] = false;
		$view["visita_salvata"] = false;

		$view["dottori"] = $this->dottori->get_all_dottori();

		if( $this->input->post("paziente") && $this->input->post("data_visita") && $this->input->post("ora_visita") && $this->input->post("dottore") )
		{
			//allora il form è stato inviato...
			$id_paziente = (int)$this->get_id_paziente_by_string( $this->input->post("paziente") );

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
				break;
			}

			$ora_visita = $this->input->post("ora_visita");
			$descrizione_visita = $this->input->post("descrizione_visita");
			$id_dottore = (int)$this->input->post("dottore");

			if( $id_paziente == "" || $ora_visita == "" || $ora_visita == false || $id_dottore == 0 )
			{
				//form con completato correttamente...
				$view["error"] = true;
				break;
			}
			else
			{
				//tutto è corretto
				//ottengo l'id del paziente relativo in base al suo codice fiscale

				$id_visita = $this->pazienti->registra_visita( $id_paziente, $id_dottore, $data_visita, $ora_visita, $descrizione_visita );

				$view["visita_salvata"] = true;



				$this->load->helper('url');
				redirect(base_url() . "calendario/focus/".$id_dottore."/".$id_visita);
			}

		}



		//se il form non è stato mai inviato, prendo i dati dei pazienti...
		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();


		$view["dottori"] = $this->dottori->get_all_dottori();


		$this->load->view("nuovavisita", $view);
	}//fine index()

	public function registravisitadirettamente()
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



		$view["error"] = false;
		$view["visita_salvata"] = false;

		$view["dottori"] = $this->dottori->get_all_dottori();

		if( $this->input->post("paziente") && $this->input->post("data_visita") && $this->input->post("ora_visita") && $this->input->post("dottore") )
		{
			//allora il form è stato inviato...
			$id_paziente = (int)$this->get_id_paziente_by_string( $this->input->post("paziente") );
			if( $id_paziente == false )
			{
				//creo un nuovo paziente con il nome immesso
				$id_paziente = $this->pazienti->add_paziente_with_name( $this->input->post("paziente") );
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
				break;
			}

			$ora_visita = $this->input->post("ora_visita");
			$descrizione_visita = $this->input->post("descrizione_visita");
			$id_dottore = (int)$this->input->post("dottore");

			if( $id_paziente == "" || $ora_visita == "" || $ora_visita == false || $id_dottore == 0 )
			{
				//form con completato correttamente...
				$view["error"] = true;
				break;
			}
			else
			{
				//tutto è corretto
				//ottengo l'id del paziente relativo in base al suo codice fiscale

				$id_visita = $this->pazienti->registra_visita( $id_paziente, $id_dottore, $data_visita, $ora_visita, $descrizione_visita );

				$view["visita_salvata"] = true;



				$this->load->helper('url');
				redirect(base_url() . "calendario/focus/".$id_dottore."/".$id_visita);
			}

		}



		//se il form non è stato mai inviato, prendo i dati dei pazienti...
		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();


		$view["dottori"] = $this->dottori->get_all_dottori();


		$this->load->view("nuovavisita", $view);
	}//fine registravisitadirettamente()

	public function pazienteselezionato( $id_paziente = 0 )
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



		$view["id_paziente"] = $id_paziente;

		$view["error"] = false;
		$view["visita_salvata"] = false;

		$view["dottori"] = $this->dottori->get_all_dottori();

		$temp = $this->pazienti->get_paziente_by_id($id_paziente);
		$temp1 = $temp->result();

		$view["nome_paziente"] = $temp1[0]->nome." ".$temp1[0]->cognome;

		if( $id_paziente != 0 && $this->input->post("data_visita") && $this->input->post("ora_visita") && $this->input->post("dottore") )
		{
			//allora il form è stato inviato...
			$codice_fiscale_paziente = $temp1[0]->codice_fiscale;

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
				break;
			}

			$ora_visita = $this->input->post("ora_visita");
			$descrizione_visita = $this->input->post("descrizione_visita");
			$id_dottore = (int)$this->input->post("dottore");
			$id_paziente = $this->input->post("id_paziente");

			if( $ora_visita == "" || $ora_visita == false || $id_dottore == 0 )
			{
				//form con completato correttamente...
				$view["error"] = true;
				break;
			}
			else
			{
				//tutto è corretto

				$id_visita = $this->pazienti->registra_visita( $id_paziente, $id_dottore, $data_visita, $ora_visita, $descrizione_visita );

				$view["visita_salvata"] = true;



				$this->load->helper('url');
				redirect(base_url() . "calendario/focus/".$id_dottore."/".$id_visita);
			}

		}



		//se il form non è stato mai inviato, prendo i dati dei pazienti...
		$view["pazienti"] = $this->pazienti->get_tutti_pazienti_full();


		$view["dottori"] = $this->dottori->get_all_dottori();


		$this->load->view("nuovavisita", $view);


	}//fine pazienteselezionato()
}
