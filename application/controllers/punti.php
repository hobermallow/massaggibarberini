<?php

/**
 *
 */
class Punti extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('pazienti');
    $this->load->model('punti_data');
    $this->load->model('dottori');
  }

  public function index()  {
    //verifica della sessione
    $session_rserial = $this->session->userdata('rserial');
    $view["username"] = $this->session->userdata("username");
    if ($this->acl->VerificaSessione($session_rserial) == false) {
        $this->load->helper('url');
        $login_url = base_url();
        redirect($login_url . "login/info?c=error");
    }
    //ricavo tutti i dottori (necessario per la left view della dashboard)
    $view['dottori'] = $this->dottori->get_all_dottori();
    //ricavo tutti i pazienti
    $view['pazienti'] = $this->pazienti->get_page_pazienti(1, 20, "cognome")->result();
    //ricavo tutte le categorie dei pazienti
    $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
    //inizializzo array dei punteggi
    $punti = array();
    // per ogni paziente, ricavo i punti
    foreach ($view['pazienti'] as $paziente) {
      //ad ogni paziente aggiungo il punteggio accumulato
      $punti[] = $this->punti_data->get_punti_paziente_by_id($paziente->id);
    }
    //aggiungo le categorie dei pazienti
    $view['categorie_punti'] = $this->punti_data->get_categorie_punti();
    //inserisco i punti nei dati da passare alla view
    $view['punti'] = $punti;
    //Azzero i filtri di ricerca
    //per evitare comportamenti indefiniti
    $view['filtro_categoria_pazienti'] = 0;
    $view['filtro_nome'] = "";
    $view['filtro_cognome'] = "";
    $view['filtro_luogo_nascita'] = "";
    $view['filtro_indirizzo'] = "";
    $view['filtro_codice_fiscale'] = "";
    $view['filtro_telefono'] = "";
    $view['filtro_email'] = "";
    //pagina attuale da visualizzare
    $view["pagina_attuale"] = 1;
    //numero pagine totali
    $view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);
    //carico la view
    $this->load->view('punti', $view);
  }

  public function filtriavanzati() {
      //verifica della sessione
      $this->load->model("acl");
      $session_rserial = $this->session->userdata('rserial');
      $view["username"] = $this->session->userdata("username");
      if ($this->acl->VerificaSessione($session_rserial) == false) {
          $this->load->helper('url');
          $login_url = base_url();
          redirect($login_url . "login/info?c=error");
      }

      $view["dottori"] = $this->dottori->get_all_dottori();
      $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
      //aggiungo le categorie dei pazienti
      $view['categorie_punti'] = $this->punti_data->get_categorie_punti();
      $view["ricerca_search"] = true; //indica alla view che è in corso una ricerca con chiave

      if ($this->input->post() == false) {
          //se non è arrivato nnt dal post questa pagina non deve essere possibile
          $this->load->helper('url');
          redirect(base_url() . "listapazienti");
      }

      //procedo ad ottenere tutti i filtri
      $view["filtro_categoria_pazienti"] = (int) $this->input->post("categoria_pazienti");
      $view["filtro_nome"] = (string) $this->input->post("nome");
      $view["filtro_cognome"] = (string) $this->input->post("cognome");
      $view["filtro_luogo_nascita"] = "";
      $view["filtro_indirizzo"] = "";
      $view["filtro_codice_fiscale"] = "";
      $view["filtro_telefono"] = "";
      $view["filtro_email"] = "";



      $this->load->view("punti", $view);
  }

  public function esegui_query_pazienti() {
      //debug only
      //sleep(5);
      //verifica della sessione
      $this->load->model("acl");
      $session_rserial = $this->session->userdata('rserial');
      $view["username"] = $this->session->userdata("username");
      if ($this->acl->VerificaSessione($session_rserial) == false) {
          return -1;
      }

      if ($this->input->post() == false) {
          //se non è arrivato nnt dal post questa pagina non deve essere possibile
          return -1;
      }


      $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

      $view["pazienti"] = $this->pazienti->ajax_query_pazienti($this->input->post());
      //inizializzo array dei pazienti
      $punti = array();
      //per ogni paziente, calcolo il punteggio
      foreach ($view['pazienti'] as $paziente) {
        $punti[] = $this->punti_data->get_punti_paziente_by_id($paziente->id);
      }
      $view["current_categorie_pazienti"] = $this->categorie_pazienti_data->get_categorie_by_query_pazienti_array($view["pazienti"]);

      foreach ($view["pazienti"] as $row) {
          echo '<tr>';
          echo '<td>';
          if (isset($view["current_categorie_pazienti"][$row->id]))
              echo $view["current_categorie_pazienti"][$row->id]["nome_categoria"];
          echo '</td>';

          echo '<td>';
          echo $row->cognome;
          echo '</td>';

          echo '<td>';
          echo $row->nome;
          echo '</td>';

          foreach (array_pop($punti) as $value) {
            echo '<td>';
            echo $value;
            echo '</td>';
          }

          echo '<td class="numeric" style="text-align: center;" >';

          echo '<a href="' . base_url() . 'punti/edit/' . $row->id . '" title="Modifica" class="btn red" >';
          echo '<i class="fa fa-edit"></i>';
          echo '</a>';


          echo '</td>';

          echo '</tr>';
      }
  }

  public function view($page = 0) {
      //verifica della sessione
      $this->load->model("acl");
      $session_rserial = $this->session->userdata('rserial');
      $view["username"] = $this->session->userdata("username");
      if ($this->acl->VerificaSessione($session_rserial) == false) {
          $this->load->helper('url');
          $login_url = base_url();
          redirect($login_url . "login/info?c=error");
      }


      $this->load->model("pazienti");
      $this->load->model("dottori");


      $view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);

      $view["dottori"] = $this->dottori->get_all_dottori();
      $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

      //pazienti della pagina scelta
      if ($page != 0) {
          $view["pazienti"] = $this->pazienti->get_page_pazienti($page, 20, "cognome")->result();
          //inizializzo array dei pazienti
          $punti = array();
          //per ogni paziente, calcolo il punteggio
          foreach ($view['pazienti'] as $paziente) {
            $punti[] = $this->punti_data->get_punti_paziente_by_id($paziente->id);
          }
          $view['punti'] = $punti;
          $view["pagina_attuale"] = $page;
      }

      //l'utente potrebbe aver selezionato la pagina manualmente...
      if ($page == 0) {
          if ($this->input->post("numero_pagina") == false) {
              $this->load->helper('url');
              redirect(base_url() . "punti");
          } else {
              //l'utente ha selezionato la pagina manualmente
              if ($this->input->post("numero_pagina") > $view["pagine_totali"] || $this->input->post("numero_pagina") < 1) {
                  //il numero della pagina non è valido...
                  $this->load->helper('url');
                  redirect(base_url() . "punti");
              } else {
                  //tutto è corretto...devo visualizzare la pagina richiesta...
                  $view["pazienti"] = $this->pazienti->get_page_pazienti($this->input->post("numero_pagina"), 20, "cognome")->result();
                  //inizializzo array dei punteggi
                  $punti = array();
                  // per ogni paziente, ricavo i punti
                  foreach ($view['pazienti'] as $paziente) {
                    //ad ogni paziente aggiungo il punteggio accumulato
                    $punti[] = $this->punti_data->get_punti_paziente_by_id($paziente->id);
                  }
                  //inserisco i punti nei dati da passare alla view
                  $view['punti'] = $punti;

                  $view["pagina_attuale"] = $this->input->post("numero_pagina");
              }
          }
      }


      $this->load->view("punti", $view);
  }

  public function edit($id) {
    //verifica della sessione
    $this->load->model("acl");
    $session_rserial = $this->session->userdata('rserial');
    $view["username"] = $this->session->userdata("username");
    if ($this->acl->VerificaSessione($session_rserial) == false) {
        $this->load->helper('url');
        $login_url = base_url();
        redirect($login_url . "login/info?c=error");
    }
    //Inizializzazione variabili di controllo
    $view["errore"] = false;
    $view["modifica_avvenuta"] = false;
    //paziente di cui modificare i punti
    $paziente = $this->pazienti->get_paziente_by_id((int)$id)->row();
    $view['paziente'] = $paziente;
    //ricavo tutti i dottori (necessario per la left view della dashboard)
    $view['dottori'] = $this->dottori->get_all_dottori();

    //Se post -> aggiornamento punti
    if ($this->input->server('REQUEST_METHOD') == 'POST') {
        $id_paziente = $this->input->post('id_paziente');
        $id_categoria = $this->input->post('categoria');
        $boolean = $this->punti_data->aggiorna_punti($id_paziente, $id_categoria);
        if(!is_bool($boolean)) {
          $view["modifica_avvenuta"] = true;
        }
        else {
          if((bool)$boolean == true) {
            $view["modifica_avvenuta"] = true;
          }
          else {
            $view["errore"] = true;
          }
        }
    }
    //ricavo i punti del paziente
    $punti = $this->punti_data->get_punti_paziente_by_id((int)$id);
    $view['punti'] = $punti;
    $view['categorie_punti'] = $this->punti_data->get_categorie_punti();
    $this->load->view('edit_punti', $view);

  }

  public function esegui_query_api_key()  {
    //verifica della sessione
    $this->load->model("acl");
    $session_rserial = $this->session->userdata('rserial');
    $view["username"] = $this->session->userdata("username");
    if ($this->acl->VerificaSessione($session_rserial) == false) {
        return -1;
    }

    if ($this->input->post() == false) {
        //se non è arrivato nnt dal post questa pagina non deve essere possibile
        return -1;
    }
    //recupero l'api_key
    $api_key = $this->input->post('api_key');
    //eseguo query
    $this->db->where(['api_key' => $api_key]);
    //join
    $this->db->join('relationship_pazienti_studi', 'relationship_pazienti_studi.id_persona = pazienti.id');
    $query = $this->db->get('pazienti');
    $response = array();
    // $response['id'] = 1;
    if($query->num_rows() >= 1) {
      $response['id'] = $query->row()->id;
    }
    else {
      $response['id'] = 0;
    }

    echo json_encode($response);
  }
  
  public function categorie() {
  	//verifica della sessione
  	$this->load->model("acl");
  	$session_rserial = $this->session->userdata('rserial');
  	$view["username"] = $this->session->userdata("username");
  	if ($this->acl->VerificaSessione($session_rserial) == false) {
  		$this->load->helper('url');
  		$login_url = base_url();
  		redirect($login_url . "login/info?c=error");
  	}
  	
  	
  	$this->load->model("pazienti");
  	$this->load->model("dottori");
  	$this->load->model('punti_data');
  	
  	
  	$view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);
  	
  	$view["dottori"] = $this->dottori->get_all_dottori();
  	$view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
  	
  	//carico le categorie di punteggio
  	$view["categorie_punti"] = $this->punti_data->get_categorie_punti();
  	$this->load->view('categorie_punti', $view);
  }
  
  public function add_categoria() {
  	//verifica della sessione
  	$this->load->model("acl");
  	$session_rserial = $this->session->userdata('rserial');
  	$view["username"] = $this->session->userdata("username");
  	if ($this->acl->VerificaSessione($session_rserial) == false) {
  		$this->load->helper('url');
  		$login_url = base_url();
  		redirect($login_url . "login/info?c=error");
  	}
  	 
  	 
  	$this->load->model("pazienti");
  	$this->load->model("dottori");
  	$this->load->model('punti_data');
  	 
  	 
  	$view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);
  	 
  	$view["dottori"] = $this->dottori->get_all_dottori();
  	$view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
  	
  	//se in post
  	if($this->input->post("add_categoria")) {
  		//inserisco la categoria
  		$nome_categoria = $this->input->post('nome_categoria');
  		$punteggio_massimo = $this->input->post('punteggio_massimo');
  		$view['errore_add'] = $this->punti_data->insert_categoria($nome_categoria, $punteggio_massimo);
  		//carico le categorie di punteggio
  		$view["categorie_punti"] = $this->punti_data->get_categorie_punti();
  		$this->load->view('categorie_punti', $view);
  	}
  	else {
  		$this->load->helper('url');
  		$login_url = base_url();
  		redirect($login_url . "login/info?c=error");
  	}
  }
  
  public function delete_categoria($id_categoria) {
  	//verifica della sessione
  	$this->load->model("acl");
  	$session_rserial = $this->session->userdata('rserial');
  	$view["username"] = $this->session->userdata("username");
  	if ($this->acl->VerificaSessione($session_rserial) == false) {
  		$this->load->helper('url');
  		$login_url = base_url();
  		redirect($login_url . "login/info?c=error");
  	}
  	
  	
  	$this->load->model("pazienti");
  	$this->load->model("dottori");
  	$this->load->model('punti_data');
  	
  	
  	$view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);
  	
  	$view["dottori"] = $this->dottori->get_all_dottori();
  	$view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();
  	 
 	//inserisco la categoria
  	$view['errore_delete'] = $this->punti_data->delete_categoria($id_categoria);
  	//carico le categorie di punteggio
  	$view["categorie_punti"] = $this->punti_data->get_categorie_punti();
  	$this->load->view('categorie_punti', $view);
  }
}




 ?>
