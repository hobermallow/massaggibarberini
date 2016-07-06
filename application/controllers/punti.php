<?php

/**
 *
 */
class Punti extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('pazienti');
    $this->load->model('punti_data');
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
    //ricavo tutti i pazienti
    $view['pazienti'] = $this->pazienti->get_all_pazienti()->result();
    //inizializzo array dei punteggi
    $punti = array();
    // per ogni paziente, ricavo i punti
    foreach ($view['pazienti'] as $paziente) {
      //ad ogni paziente aggiungo il punteggio accumulato
      $punti[] = $this->punti_data->get_punti_user_by_id($paziente->id);
    }
    //inserisco i punti nei dati da passare alla view
    $view['punti'] = $punti;
    //carico la view
    $this->load->view('punti', $view);
  }
}




 ?>
