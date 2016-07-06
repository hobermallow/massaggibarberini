<?php

/**
 *
 */
  class studi extends CI_Controller {

  function __construct()  {
    parent::__construct();
    //Loading dell'helper e del modello corrispondente
    //alle associazioni studio-dominio
    $this->load->model('associazioni_studi_domini');
    $this->load->helper('domini');
  }

  public function index() {
    //Array delle righe nella tabella 'dottori' corrispondenti
    //allo studio dove si sta opereando
    $data['result'] = $this->associazioni_studi_domini->get_persone_by_studio('pazienti');
    $data['id_studio'] = Domini::get_id_studio();
    $this->load->view('studio', $data);
  }

  // NOTA: Questa andrebbe caricata ed eseguita appena si accede alla home
  // e creare la variabile globale id_studio
  private function get_id_studio_by_sottodominio()  {
    //array delle varie componenti dell'url
    $url_array = explode('.', $_SERVER['HTTP_HOST']);
    $subdomain = $url_array[0];
    $query = $this->db->get_where('associazioni_studi_domini', array('dominio_studio' => $subdomain));
    $query = $query->result_array();
    $result = $query[0];
    return $result['id_studio'];
  }
}



 ?>
