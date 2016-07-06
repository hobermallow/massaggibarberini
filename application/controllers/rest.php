<?php

class rest extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('acl_app');
  }
  public function index() {
    $response = array();
    // il client cerca di settare un nuovo utente
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->output->set_header('Content-Type: application/json');
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $api_key = $this->acl_app->primo_login_app($username, $password);
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
}
