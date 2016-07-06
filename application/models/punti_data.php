<?php

/**
 * Model che gestisce la fidelizzazione del cliente
 */
class punti_data extends CI_Model  {

  /* funzione che ritorna il totale dei punti accumulati da un utente */
  public function get_punti_user_by_id($id) {
    //seleziono l'id dell'utente
    $this->db->where(['id_paziente' => $id]);
    //seleziono la somma del valore 'punti'
    $this->db->select_sum('punti', 'punti_tot');
    //eseguo la query
    $query = $this->db->get('punti_fedelta');
    $query = $query->row();
    return $query->punti_tot != NULL ? $query->punti_tot : 0;
  }

  public function insert_punti_user_by_id_and_punti($id, $punti)  {
    //TRUE se operazione andata a buon fine, altrimenti FALSE
    return $this->db->insert('punti_fedelta', ['id_paziente' => $id, 'punti' => $punti]);
  }

  public function aggiorna_punti($id)  {
    $return = false;
    if($this->input->post("punto") != NULL) {
      $return = $this->insert_punti_user_by_id_and_punti($id, 1);
    }
    if($this->input->post('azzera') != NULL) {
      $this->db->where(['id_paziente' => $id]);
      $return = $this->db->delete('punti_fedelta');
    }
    //torna un booleano o un'oggetto
    return $return;

  }
}



 ?>
