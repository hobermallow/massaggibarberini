<?php

class rest extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('acl_app');
  }
  
  public function registrazione() {
  	$response = array();
  	$this->output->set_header('Content-Type: application/json');
  	if($_SERVER['REQUEST_METHOD'] === 'POST') {
  		$bool = $this->acl_app->registrazione($this->input->post());
  		//se la registrazione e' andata a buon fine
  		if($bool) {
  			$api_key = $this->acl_app->login_app($this->input->post('email'), $this->input->post('password'));
  			$response['api_key'] = $api_key;
  			$response['error'] = false;
  			echo json_encode($response);
  		}
  		else {
  			$response['error'] = true;
  			echo json_encode($response);
  		}
  	}
  	else {
  		$response['error'] = TRUE;
  	}
  }
  public function index() {
    $response = array();
    // il client cerca di settare un nuovo utente
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $api_key = $this->acl_app->login_app($username, $password);
      // l'api_key e' stata settata correttamente

      if(is_string($api_key)) {
        //oggetto json con api_key in output
        $response['error'] = FALSE;
        $response['api_key'] = $api_key;

      }
      else {
        //oggetto json con errore in output
        $response['error'] = TRUE;
      }
      echo json_encode($response);
    }
    else {
      $response['error'] = TRUE;
       echo json_encode($response);
    }

  }

  public function prestazioni() {
    $response = array();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      //controllo l'api_key
      $api_key = $this->input->post('api_key');
      //se l'api_key esiste
      if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {
        //inizializzo array dei risultati

        $prestazioni = $this->acl_app->get_prestazioni_studio();
        foreach ($prestazioni as $prestazione) {
          $response[] = ['prestazione' => $prestazione->descrizione, 'costo' => $prestazione->costo_prestazione, 'durata' => $prestazione->durata_prestazione ];
        }
        echo json_encode($response);

      }

  //se l'api_key non esiste
    else {
      $response['error'] = TRUE;
      echo json_encode($response);
   }
 }

  //se la chimata e' in GET
  else {
    $response['error'] = TRUE;
    echo json_encode($response);
 }

}


  public function get_points()  {
    $response = array();
    $index = 0;
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      $api_key = $this->input->post('api_key');
      if($api_key != NULL) {
        $points = $this->acl_app->get_points_by_api_key($api_key);
        foreach ($points as $key => $value) {
          $response[$index] = ['tipologia' => $key, 'points' => intval($value)];
          $index++;
        }
      }
      else {
      	$response['error'] = TRUE;
      }
      echo json_encode($response);
    }

    else {
      $response['error'] = TRUE;
       echo json_encode($response);
    }
  }

  public function operatori($id_dottore=NULL)  {
    //inizializzo array dei risultati
    $response = array();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      //controllo l'api_key
      $api_key = $this->input->post('api_key');
      //se l'api_key esiste
      if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {

        //if $dottore = NULL ritorna la lista degli operatori
        if($id_dottore == NULL) {
          $prestazione = $this->input->post('prestazione');
          $dottori = $this->acl_app->get_all_dottori_by_prestazione($prestazione);
          foreach ($dottori->result() as $dottore) {
            $response[] = ['id_operatore' => $dottore->id, 'nome_operatore' => $dottore->nome ];
          }
          echo json_encode($response);
        }
        //se il dottore e' specificato
        else {
          //aggiungo alla risposta la lista delle prestazioni del dottore
          $response['prestazioni'] = $this->acl_app->get_prestazioni_dottore($id_dottore);
          //aggiungo l'orario del dottore
          //ricavo la data
          $date = $this->input->post('data');
          $dayofweek = date('w', strtotime($date));
          //ricavo l'orario del giorno del dottore
          $orari = $this->acl_app->get_orario_dottore_by_day($id_dottore, $dayofweek);
          $response['orario_inizio'] = $orari->orario_inizio;
          $response['orario_fine'] = $orari->orario_fine;
          //ricavo le visite del giorno legate al dottore
          $visite = $this->acl_app->get_visite_del_giorno_by_dottore($id_dottore, $date);
          //aggiungo le visite del giorno alla risposta
          $array_visite = array();
          foreach ($visite as $visita) {
            $array_visite[] = [$visita->orario_visita, $visita->durata_prestazione];
          }
          $response['visite_del_giorno'] = $array_visite;
          echo json_encode($response);
        }
      }
      //se l'api_key non esiste
      else {
        $response['error'] = TRUE;
         echo json_encode($response);
      }
    }
    //se la chimata e' in GET
    else {
      $response['error'] = TRUE;
       echo json_encode($response);
    }
  }

  public function prenota($id_dottore)  {
    //inizializzo array dei risultati
    $response = array();
      if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->output->set_header('Content-Type: application/json');
        //controllo l'api_key
        $api_key = $this->input->post('api_key');
        //se l'api_key esiste
        if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {

          //aggiungo l'orario del dottore
          //ricavo la data
          $date = $this->input->post('data');
          //ricavo l'orario
          $orario = $this->input->post('ora');
          //ricavo la tipologia
          $prestazione = $this->input->post('prestazione');
          //ricavo l'id del paziente
          $id_paziente = $this->acl_app->get_id_paziente_by_api_key($api_key);
          //eseguo l'insert
          $boolean = $this->acl_app->inserisci_visita_by_giorno_ora_prestazione($id_dottore, $id_paziente, $date, $orario, $prestazione);
          if($boolean == TRUE) {
            $response['error'] = FALSE;
            echo json_encode($response);
          }
          else {
            $response['error'] = TRUE;
            echo json_encode($response);
         }

        }

    //se l'api_key non esiste
      else {
        $response['error'] = TRUE;
        echo json_encode($response);
     }
   }

    //se la chimata e' in GET
    else {
      $response['error'] = TRUE;
      echo json_encode($response);
   }

  }

  public function lista_visite()  {
    $response = array();
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      //controllo l'api_key
      $api_key = $this->input->post('api_key');
      //se l'api_key esiste
      if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {
        $visite = $this->acl_app->get_visite_by_api_key($api_key);
        foreach ($visite->result() as $visita) {
          $response[] = ['data' => $visita->data, 'ora' => $visita->ora, 'operatore' => $visita->dottore, 'prestazione' => $visita->descrizione];
        }
        echo json_encode($response);
      }
      //se l'api_key non esiste
      else {
        $response['error'] = TRUE;
         echo json_encode($response);
      }
    }
    //se la chimata e' in GET
    else {
      $response['error'] = TRUE;
       echo json_encode($response);
    }
  }
  
  public function gallery() {
  	$response = array();
  	if($_SERVER['REQUEST_METHOD'] === 'POST') {
  		$this->output->set_header('Content-Type: application/json');
  		//controllo l'api_key
  		$api_key = $this->input->post('api_key');
  		//se l'api_key esiste
  		if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {
  			$files = $this->acl_app->get_gallery();
  			foreach ($files as $file) {
  				$response[] = $file;
  			}
  			echo json_encode($response);
  		}
  		//se l'api_key non esiste
  		else {
  			$response['error'] = TRUE;
  			echo json_encode($response);
  		}
  	}
  	//se la chimata e' in GET
  	else {
  		$response['error'] = TRUE;
  		echo json_encode($response);
  	}
  }
  
  public function posts() {
  	$response = array();
  	if($_SERVER['REQUEST_METHOD'] === 'POST') {
  		$this->output->set_header('Content-Type: application/json');
  		//controllo l'api_key
  		$api_key = $this->input->post('api_key');
  		//se l'api_key esiste
  		if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {
  			//inizializzo array dei risultati
  			$this->load->model('acl_app');
  			$posts = $this->acl_app->get_posts();
//   			foreach ($posts as $post) {
//   				$response[] = ['titolo' => $post['titolo'], 'url' => $post['url'] ];
//   			}
// 			echo var_dump("hfjkdsf");
  			echo json_encode($posts);
  
  		}
  
  		//se l'api_key non esiste
  		else {
  			$response['error'] = TRUE;
  			echo json_encode($response);
  		}
  	}
  	else {
  		$response['error'] = TRUE;
  		echo json_encode($response);
  	}
  
}

public function cancella() {
	//inizializzo risultati
	$response = array();
	if($_SERVER['REQUEST_METHOD'] === 'POST') {
		$this->output->set_header('Content-Type: application/json');
		//controllo l'api_key
		$api_key = $this->input->post('api_key');
		//se l'api_key esiste
		if($this->acl_app->control_api_key($api_key) && $api_key != NULL) {
	
			//aggiungo l'orario del dottore
			//ricavo la data
			$date = $this->input->post('data');
			//ricavo l'orario
			$orario = $this->input->post('ora');
			//ricavo la tipologia
			$prestazione = $this->input->post('prestazione');
			//ricavo l'id del paziente
			$id_paziente = $this->acl_app->get_id_paziente_by_api_key($api_key);
			//eseguo l'insert
			$boolean = $this->acl_app->cancella_visita($id_paziente, $date, $orario);
			
			if($boolean == TRUE) {
				$response['error'] = FALSE;
				echo json_encode($response);
			}
			else {
				$response['error'] = TRUE;
				echo json_encode($response);
			}
	
		}
	
		//se l'api_key non esiste
		else {
			$response['error'] = TRUE;
			echo json_encode($response);
		}
	}
	
	//se la chimata e' in GET
	else {
		$response['error'] = TRUE;
		echo json_encode($response);
	}
	
}
}
