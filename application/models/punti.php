<?php

/**
 * Model che gestisce la fidelizzazione del cliente
 */
class punti extends CI_Model  {

  function __construct(argument)  {
    parent::__construct();
  }
  /* funzione che ritorna il totale dei punti accumulati da un utente */
  public function get_punti_user_by_id($id) {
    //seleziono l'id dell'utente
    $this->db->where(['id' => $id]);
    //seleziono la somma del valore 'punti'
    $this->db->select_sum('punti', 'punti_tot');
    //eseguo la query
    $query = $this->db->get('punti_fedelta');
    $query = $query->row();
    return $query->punti_tot;
  }
}



 ?>
