<?php

/**
 *  Classe 'helper' con metodi statici per la gestione
 */
class Domini  {

  //Variabile contentente il valore corrente dell'id del sottodominio
  private static $id_studio = NULL;

  //Costruttore privato per evitare "l'istanziazione" della classe
  private function __construct() {
  }

  /**
  * @return l'id dello studio a partire dal sottodominio
  */
  static function get_id_studio() {
    $dominio_studio = explode(".", $_SERVER['HTTP_HOST']);
    $dominio_studio = $dominio_studio[0];
    $CI = & get_instance();
    $query = $CI->db->get_where('associazioni_studi_domini', ['dominio_studio' => $dominio_studio]);
    $query = $query->result_array();
    $row = $query[0];
    return $row['id_studio'];
  }


  /* select *
  from $categoria
  join relationship_$categoria_studi
  on relationship_$categoria_studi.id_persona = categoria.id
  where relationship_$categoria_studi.id_studio = $id_studio
  */

  /**
  * Setta il join con la tabella della relazione fra la categoria di persone
  * e gli studi. In seguito setta il where, selezionando le righe con
  * l'id_studio selezionato
  */
  static function aggiungi_join_relationship_categoria_studi_where_id_studio($categoria, $id_studio)  {
    $CI = & get_instance();
    $CI->db->join('relationship_'.$categoria."_studi", 'relationship_'.$categoria.'_studi.id_persona = '.$categoria.'.id');
    $CI->db->where('relationship_'.$categoria.'_studi.id_studio', $id_studio);
  }
}
