<?php

/**
 * Model che gestisce la fidelizzazione del cliente
 */
class punti_data extends CI_Model  {

  /* funzione che ritorna il totale dei punti accumulati da un utente */
  public function get_punti_paziente_by_id($id_paziente) {
    //inizializzo l'array dei punteggi del paziente
    $punteggi = array();
    //join con relationship_categorie_punti_studi
    $this->db->join('relationship_categorie_punti_studi', "relationship_categorie_punti_studi.id_categoria = categorie_punti.id" );
    //seleziono l'id dello studio
    $this->db->where(['id_studio' => $this->session->userdata('id_studio')]);
    //in primis, ricavo le categorie di punteggio
    $query = $this->db->get('categorie_punti');
    //per ogni categoria, ricavo il punteggio del paziente
    foreach ($query->result() as $row) {
      //ricavo l'id della categoria considerata
      $id_categoria = $row->id;
      //ricavo il nome della categoria
      $nome_categoria = $row->categoria;
      //join con relationship_categorie_punti
      $this->db->join('relationship_categorie_punti', 'relationship_categorie_punti.id_punti = punti_fedelta.id');
      //seleziono l'id dell'utente
      $this->db->where(['id_paziente' => $id_paziente]);
      //seleziono la categoria
      $this->db->where(['id_categoria' => $id_categoria]);
      //seleziono la somma del valore 'punti'
      $this->db->select_sum('punti', 'punti_tot');
      //eseguo la query
      $query = $this->db->get('punti_fedelta');
      //ricavo il punteggio
      $points = $query->row()->punti_tot;
      //aggiungo il punteggio all'array dei punteggi
      $punteggi[$nome_categoria] = $points != NULL ? $points : 0;
    }
    //ritorno l'array dei punteggi
    return $punteggi;
  }

  public function insert_punti_paziente_by_id_punti_categoria($id_paziente, $punti, $id_categoria)  {
    //TRUE se operazione andata a buon fine, altrimenti FALSE
    //inserisco il punteggio per il paziente
    $bool1 = $this->db->insert('punti_fedelta', ['id_paziente' => $id_paziente, 'punti' => $punti]);
    //lego il punteggio alla categoria
    $id_punti = $this->db->insert_id();
    $bool2 = $this->db->insert('relationship_categorie_punti', ['id_punti' => $id_punti, 'id_categoria' => $id_categoria]);
    //ritorno l'and dei due bool
    return $bool1 && $bool2;
  }
  /* aggiorna il punteggio del paziente per la determinata categoria */
  public function aggiorna_punti($id_paziente, $id_categoria)  {
    $return = false;
    if($this->input->post("punto") != NULL) {
      $return = $this->insert_punti_paziente_by_id_punti_categoria($id_paziente, 1, $id_categoria);
    }
    if($this->input->post('azzera') != NULL) {
      // $this->db->where(['id_paziente' => $id]);
      // $return = $this->db->delete('punti_fedelta');
      //seleziono i punteggi legati al paziente ed alla categoria
      $this->db->join('relationship_categorie_punti', 'relationship_categorie_punti.id_punti = punti_fedelta.id');
      $this->db->where(['id_paziente' => $id_paziente]);
      $this->db->where(['id_categoria' => $id_categoria]);
      $result = $this->db->get('punti_fedelta');
      //ricavo gli id dei punteggi da eliminare
      $ids = array();
      foreach ($result->result() as $row) {
        $ids[] = $row->id;
      }
      //cancello i punteggi dalla relationship_categorie_punti
      $this->db->where_in('id_punti', $ids);
      $this->db->delete('relationship_categorie_punti');
      //cancello i punteggi da punti_fedelta
      $this->db->where_in('id', $ids);
      $return = $this->db->delete('punti_fedelta');
    }
    //torna un booleano o un'oggetto
    return $return;

  }
  /* ritorno l'array delle coppie id_categoria => nome_categoria */
  public function get_categorie_punti() {
    //join con relationship_categorie_punti_studi
    $this->db->join('relationship_categorie_punti_studi', "relationship_categorie_punti_studi.id_categoria = categorie_punti.id" );
    //seleziono l'id dello studio
    $this->db->where(['id_studio' => $this->session->userdata('id_studio')]);
    //in primis, ricavo le categorie di punteggio
    $query = $this->db->get('categorie_punti');
    //ritorno array delle righe
    return $query->result();
  }
  
  public function insert_categoria($nome_categoria, $punteggio_massimo) {
  	//inserisco la categoria
  	$bool = $this->db->insert('categorie_punti', ['categoria' => $nome_categoria, 'max_punti' => $punteggio_massimo]);
  	$id_categoria = $this->db->insert_id();
  	//relationship
  	$id_studio = $this->session->userdata('id_studio');
  	$bool = $bool && $this->db->insert('relationship_categorie_punti_studi', ['id_categoria' => $id_categoria, 'id_studio' => $id_studio]);
  	return $bool;
  }
  
  public function delete_categoria($id_categoria) {
  	//in primis, cancello tutti i punti legati alla categoria
  	//ricavo  gli id dei punteggi legati alla categoria
  	$this->db->select('id_punti');
  	$query = $this->db->get_where('relationship_categorie_punti', ['id_categoria' => $id_categoria]);
  	$punti = [];
  	$punti[] = '';
  	foreach ($query->result() as $punto) {
  		$punti[] = $punto->id_punti;
  	}
  	//cancello la relationship fra categorie e punti
  	$this->db->where(['id_categoria' => $id_categoria]);
  	$bool = $this->db->delete('relationship_categorie_punti');
  	//cancello i punti legati alla categoria
  	$this->db->where_in('id', $punti);
  	$bool = $bool && $this->db->delete('punti_fedelta');
  	//cancello la relazione fra la categoria e lo studio
  	$id_studio = $this->session->userdata('id_studio');
  	$this->db->where(['id_studio' => $id_studio, 'id_categoria' => $id_categoria]);
  	$bool = $bool && $this->db->delete('relationship_categorie_punti_studi');
  	//cancello la categoria
  	$this->db->where(['id' => $id_categoria]);
  	$bool = $bool && $this->db->delete('categorie_punti');
  	return $bool;
  	
  }
}



 ?>
