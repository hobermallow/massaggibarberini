<?php

/**
 *
 */
class acl_app extends CI_Model  {

  function __construct()  {
    $this->load->helper('phpass');
    $this->load->helper('date');
  }

  public function get_points_by_api_key($api_key) {
    // ricavo l'id dell'utente a partire dall'api_key
    $this->db->where(['api_key' => $api_key ]);
    $query = $this->db->get('pazienti');
    $query = $query->row();
    $id = $query->id;
    //seleziono l'id dell'utente
    $this->db->where(['id_paziente' => $id ]);
    //seleziono la somma del valore 'punti'
    $this->db->select_sum('punti', 'punti_tot');
    //eseguo la query
    $query = $this->db->get('punti_fedelta');
    $query = $query->row();
    return $query->punti_tot != NULL ? $query->punti_tot : 0;

  }
  public function primo_login_app($username, $password) {

      //Controllo se lo username sia gia esistente
      $query = $this->db->query("SELECT * FROM pazienti WHERE username = '$username'");
      if($query->num_rows() > 0) {
        //nome utente gia esistente
        $query = $query->row();
        //creo l'hasher per controllare la password
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        //ricavo il timestamp
        $timestamp = $query->data;
        //se  timestamp+password corrisponde
        if($hasher->CheckPassword($password, $query->password)) {
          //se l'api_key non esiste la creo
          if(!isset($query->api_key)) {
            //Prendo l'id dell'utente di cui devo creare l'hash
            $id = $query->id;
            //genero l'api key
            $api_key = $hasher->HashPassword($timestamp.$password);
            //inserisco api_key nel db
            $this->db->where('id', $id);
            //booleano che controlla il successo dell'operazione di inserimento nel db dell'api_key
            $bool = $this->db->update('pazienti', ['api_key' => $api_key]);
          }
          //altrimenti, se l'api_key e' gia settata
          else {
            $api_key = $query->api_key;
            //l'operazione e' andata a buon fine
            $bool = TRUE;
          }
          // se le operazioni del db sono andate a buon fine, ritorno l'api_key
          if($bool) {
            return $api_key;
          }
          // altrimenti, -1
          else {
            return -1;
          }
        }
        //altrimenti, se la password e' errata
        return -2;
      }
    }
  }
 ?>
