<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class dashboard extends CI_Controller {

	protected $g_client;
	protected $g_drive;
	protected $g_auth_url;

	public function __construct()
	{
		parent::__construct();

		if( $this->session->userdata('g_access_token') != false )
		{
			//inizializzo le API Google PHP
			$client_id = $this->config->item('google_drive_client_id');
			$client_secret = $this->config->item('google_drive_secret');
			$redirect_uri = $this->config->item('google_drive_redirect_uri');
			$this->g_client = new Google_Client();
			$this->g_client->setClientId($client_id);
			$this->g_client->setClientSecret($client_secret);
			$this->g_client->setRedirectUri($redirect_uri);

			$this->g_client->setScopes(array(
				'https://www.googleapis.com/auth/userinfo.email',
				'https://www.googleapis.com/auth/drive'
			));

			$this->g_client->setAccessType('offline');

			$authUrl = $this->g_client->createAuthUrl();

			//print_r($this->session->userdata('g_access_token')); die();

			$this->g_client->setAccessToken( $this->session->userdata('g_access_token') );

			//controllo che il token sia ancora valido
			//$token_json = json_decode( $this->g_client->getAccessToken() );


			if( $this->g_client->isAccessTokenExpired() )
			{
				//token scaduto, effettuo il refresh
				//$this->g_client->refreshToken($token_json);
				//$this->g_client->refreshToken( $this->session->userdata('g_refresh_token') );

				$this->session->unset_userdata('g_access_token');

				redirect($authUrl);

				//$this->session->set_userdata('g_access_token' , $this->g_client->getAccessToken() );
			}


			$this->g_drive = new Google_Service_Drive($this->g_client);

		}//if( $this->session->userdata('g_access_token') != false )


	}//function __construct()



	//ritorna true se è verificato e corretto, false altrimenti
	public function verify_google_auth()
	{
		$client_id = $this->config->item('google_drive_client_id');
		$client_secret = $this->config->item('google_drive_secret');
		$redirect_uri = $this->config->item('google_drive_redirect_uri');
		$client = new Google_Client();
		$client->setClientId($client_id);
		$client->setClientSecret($client_secret);
		$client->setRedirectUri($redirect_uri);

		$client->setScopes(array(
			'email',
			'https://www.googleapis.com/auth/drive'
		));

		$client->setAccessType('offline');

		$google_code = $this->input->get('code');

		$client->authenticate($google_code);

		$this->session->set_userdata('g_access_token' , $client->getAccessToken() );


		redirect(base_url() . "dashboard");


	}//public function verify_google_auth()



	public function index()
	{
		$view_printata = false;

		$this->load->model('acl');
		//Prende dalla richiesta POST username e password
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//NON FACCIO HASHING DELLA PASSWORD
		// $password = md5($password);

		$this->load->model("pazienti");
		$this->load->model("dottori");
		$this->load->model("tasks_data");


		//CONTROLLO DEL TOKEN GOOGLE
		if( $this->session->userdata('g_access_token') != false )
		{
			$client_id = $this->config->item('google_drive_client_id');
			$client_secret = $this->config->item('google_drive_secret');
			$redirect_uri = $this->config->item('google_drive_redirect_uri');
			$client = new Google_Client();
			$client->setClientId($client_id);
			$client->setClientSecret($client_secret);
			$client->setRedirectUri($redirect_uri);

			$client->setScopes(array(
				'email',
				'https://www.googleapis.com/auth/drive'
			));

			$client->setAccessType('offline');

			$client->setAccessToken( $this->session->userdata('g_access_token') );

			$token_json = json_decode( $client->getAccessToken() );
			//print_r($token_json->id_token); die();

			$ticket = $client->verifyIdToken($token_json->id_token);
			if( $ticket )
			{
				//allora il token è valido, ottengo la email e creo una sessione per questo utente
				$data = $ticket->getAttributes();

				$email = $data['payload']['email'];

				$this->acl->esegui_autenticazione_google_by_email( $email );
			}
			else redirect(base_url() . "login/info?c=error");
		}
		//FINE CONTROLLO DEL TOKEN GOOGLE



		//$view["recent_tasks"] = $this->tasks_data->get_recent_tasks();

		//controllo se si sta cercando di effettuare un login...
		if( $username != "" && $password != "" )
		{
			if( $this->acl->controllaLogin($username, $password) )
			{
				//login effettuato con successo
				//Predisposizione della view
				$oggi = date("Y-m-d");
				$giorno_settimana = date("l");
				$view["appuntamenti_del_giorno"] = $this->pazienti->get_visite_del_giorno( $oggi );
				$view["appuntamenti_settimana"] = $this->pazienti->get_visite_della_settimana( $oggi, $giorno_settimana );
				$view["dottori_registrati"] = $this->dottori->get_tot_dottori();

				$view["dottori"] = $this->dottori->get_all_dottori();

				$view["visite_per_dottori"] = $this->dottori->get_visite_odierne_by_query_dottori( $view["dottori"] );

				$view["username"] = (string)$username;
				$this->load->view('dashboard', $view);
				$view_printata = true;
			}
			else
			{
				$this->load->helper('url');
				$login_url = base_url();
				redirect($login_url . "login/info?c=error");
			}

		}

		if( $view_printata == false )
		{
			//solo se la view non è stata mai printata esegue il controllo, altrimenti no

			$session_rserial = $this->session->userdata('rserial');
			if( $this->acl->VerificaSessione($session_rserial) == true )
			{
				//l'utente ha una sessione valida...può continuare
				$view["username"] = $this->session->userdata("username");
				$this->load->view('dashboard', $view);
				$view_printata = true;
			}
			else
			{
				$this->load->helper('url');
				$login_url = base_url();
				redirect($login_url . "login/info?c=error");
			}
		}

	}//fine index()


}
