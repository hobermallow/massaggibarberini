<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nuovopaziente extends CI_Controller {


	public function index()
	{
		//verifica della sessione
		$this->load->model("acl");
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if( $this->acl->VerificaSessione($session_rserial) == false )	{
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}



		//controllo post input
		$view["error"] = false;
		$view["paziente_salvato"] = false;

		$view["dottori"] = $this->dottori->get_all_dottori();

		$view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

		//Se e' stato effettuato il post delle info del nuovo paziente
		if( $this->input->post() )	{
			$view["paziente_salvato"] = $this->pazienti->add_paziente( $this->input->post() );
			if( $view["paziente_salvato"] == false )
				$view["error"] = true;
			else
			{
				//significa che il paziente è stato inserito correttamente...

				//chiamo le API del pannello centrale...
				$email = urlencode( (string)$this->input->post("email") );
				$telefono = (string)$this->input->post("telefono");

				// $api_result = json_decode(file_get_contents( $this->config->item('pannello_centrale_api_url')."register_paziente_acl_mobile/".$email."/".$telefono ), true );
				//
				//
				//
				// if( $api_result["result"] == "registrazione_ok" ) $view["paziente_registrato_pannello_centrale"] = true;
				// else $view["paziente_registrato_pannello_centrale"] = false;

			}//else

		}//if( $this->input->post() )


		$this->load->view("nuovopaziente", $view);

	}//fine index()
}
