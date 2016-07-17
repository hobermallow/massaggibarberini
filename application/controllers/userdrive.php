<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userdrive extends CI_Controller {
	
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
		
		
		$view["error"] = false;
		$view["registrazione_avvenuta"] = false;
		$view["delete_avvenuto"] = false;
		
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		
		$view["google_auth_collegato"] = false;
		
		if( $this->session->userdata('g_access_token') != false )
		{
			$view["google_auth_collegato"] = true;

			//controllo se esiste la cartella del dottore su drive...
			$ricerca_folder = $this->google_drive->search_folder( $this->g_drive, $view["username"] );
			if( $ricerca_folder == false )
			{
				//allora non esiste ancora la cartella dell'utente corrente...
				$folder = $this->google_drive->crea_folder_nella_root( $this->g_drive, $view["username"] );
			}
			else
			{
				//allora la cartella di questo utente esiste e devo ottenerne i dati...
				$folder = $this->google_drive->search_folder( $this->g_drive, $view["username"] );
			}
			
			//print_r($folder->id); die();
			
			
			//CONTROLLO E GESTIONE DELL'UPLOAD DI UN FILE
			$view["upload_fallito"] = false;
			if( $this->input->post() )
			{
				$config_upload['upload_path'] = './uploads_temp/';
				$config_upload['allowed_types'] = '*';
				$config_upload['max_size']	= '10000';
				
				$this->upload->initialize($config_upload);
				
				if( !$this->upload->do_upload("file") )
				{
					//upload fallito
					$view["upload_fallito"] = true;
					$view["errore_upload"] = $this->upload->display_errors();
				}
				else
				{
					//upload riuscito
					$file_data = $this->upload->data();
					
					//posso caricare il file su drive
					$file_creato_drive = $this->google_drive->insert_file( $this->g_drive, $file_data["orig_name"], "", $file_data["full_path"], $folder->id );
					
					//posso eliminare il file temporaneo uploadato
					unlink( $file_data["full_path"] );
				}
			}
			//FINE CONTROLLO E GESTIONE DELL'UPLOAD DI UN FILE
			
			
			//ottengo la lista di files nella sua folder...
			$view["files"] = $this->google_drive->list_files( $this->g_drive, $folder->id );
			
			//print_r( $files );
		
		
		}//if( $this->session->userdata('g_access_token') != false )
		
		
		
		$this->load->view("userdrive", $view);
		
	}//fine index()
	
	
	//elimina un file da drive...
	public function delete( $file_id = 0 )
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
		
		
		$view["error"] = false;
		$view["registrazione_avvenuta"] = false;
		$view["delete_avvenuto"] = false;
		
		//$view["dottori"] = $this->dottori->get_all_dottori();
		
		
		$view["google_auth_collegato"] = false;
		
		//var_dump($file_id); //die();
		
		if( $this->session->userdata('g_access_token') != false && $file_id !== 0 )
		{
			$view["google_auth_collegato"] = true;
			
			//elimino il file indicato
			$file_id = (string)$file_id;
			$this->google_drive->elimina_file( $this->g_drive, $file_id );
			
			redirect( base_url()."userdrive" );
		
		}//if( $this->session->userdata('g_access_token') != false )
		else redirect( base_url()."userdrive" );
	
	}//function delete
	
	
}









































