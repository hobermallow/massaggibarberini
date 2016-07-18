<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dottori extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('domini');
        $this->load->database('default');
    }

    function get_fatture_dottore($id_dottore) {
        return $this->db->query("SELECT f.id_fattura as id_fattura, f.filename as filename, f.id_dottore as id_dottore, f.totale as totale, f.data as data, DATE_FORMAT(data, '%d-%m-%Y') as data from fatture as f join relationship_fatture_studi on relationship_fatture_studi.id_fattura = f.id_fattura where id_dottore = $id_dottore and id_studio = ".$this->session->userdata('id_studio')."");
    }

    function carica_fattura($filename, $data) {
        $date = new DateTime();
        $this->db->query("INSERT into fatture (id_dottore, filename, totale, data) VALUES (" . $data['id_dottore'] . ", '$filename', '" . $data['totale'] . "', '" . $date->format("Y-m-d") . "')");
        // lego la fattura allo studio
        $id_fattura = $this->db->inser_id();
        $this->db->insert('relationship_fatture_studi', ['id_fattura' => $id_fattura, 'id_studio' => $this->session->userdata('id_studio')]);
    }

    //ritorna un array che ha come indici gli id dei dottori relativi ed il contenuto di ogni elemento è un array associativo con tutte le info della visita
    function get_visite_odierne_by_query_dottori($query_dottori) {
        $array_visite = array();

        $data_odierna = date("Y-m-d");
        $data_odierna_escaped = $this->db->escape($data_odierna);

        foreach ($query_dottori->result() as $dottore) {
            $id_dottore = (int) $dottore->id;

            $query_visite_odierne = $this->db->query("
				SELECT *
				FROM visite
        JOIN relationship_visite_studi ON relationship_visite_studi.id_persona = visite.id
				WHERE id_dottore=" . $id_dottore . " AND data_visita=" . $data_odierna_escaped . " AND id_studio = ".$this->session->userdata('id_studio')."
				ORDER BY orario_visita ASC
			");

            $array_visite[$id_dottore] = $query_visite_odierne->result_array();
        }//foreach( $query_dottori->result() as $dottore )

        return $array_visite;
    }

//function get_visite_odierne_by_query_dottori
    //torna il numero totale di dottori registrati
    function get_tot_dottori() {
        // $query = $this->db->query("SELECT id FROM dottori ");
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('dottori', $this->session->userdata('id_studio'));
        $query = $this->db->get('dottori');
        return $query->num_rows();
    }

    function get_all_dottori() {
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('dottori', $this->session->userdata('id_studio'));
        $this->db->order_by('data');
        // return $this->db->query("SELECT * FROM dottori ORDER BY data ");
        return $this->db->get('dottori');
    }

    function get_dottore_by_id($id_dottore) {
        return $this->db->query("SELECT * FROM dottori WHERE id=" . $id_dottore . " ");
    }

    function get_prestazioni() {
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('prestazioni', $this->session->userdata('id_studio'));
        return $this->db->get('prestazioni');
    }

    function get_prestazioni_by_id_dottore($id_dottore) {
      $id_studio = Domini::get_id_studio();
      $this->db->join('relationship_prestazioni_dottori', 'relationship_prestazioni_dottori.id_dottore = dottori.id');
      $this->db->join('prestazioni', 'prestazioni.id = relationship_prestazioni_dottori.id_prestazione');
      $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = prestazioni.id');
      $this->db->where(['dottori.id' => $id_dottore, 'relationship_prestazioni_studi.id_studio' => $id_studio]);
      //seleziono i campi di interesse
      $this->db->select('dottori.id as id_dottore, prestazioni.id as id_prestazione, prestazioni.durata_prestazione as durata_prestazione, prestazioni.costo_prestazione as costo_prestazione, prestazioni.descrizione as descrizione');
      $query = $this->db->get('dottori');
      return $query;
    }

    function get_prestazione_by_id($id_prestazione) {
        return $this->db->query("SELECT * FROM prestazioni WHERE id=" . $id_prestazione . " ");
    }

    function add_dottore($nome, $dettagli, $telefono, $email, $orari_settimanali) {
        $nome = $this->db->escape($nome);
        $dettagli = $this->db->escape($dettagli);
        $telefono = $this->db->escape($telefono);
        $email = $this->db->escape($email);
        $orari_settimanali = $this->db->escape($orari_settimanali);
        // booleano rappresentante l'esito dell'INSERT
        $query = $this->db->query("INSERT INTO dottori (nome, dettagli, telefono, email, orari_settimanali) VALUES ( " . $nome . ", " . $dettagli . ", " . $telefono . ", " . $email . ", " . $orari_settimanali . " ) ");
        // id dell'ultima riga inserita
        $id_dottore = $this->db->insert_id();
        return $query && $this->db->insert('relationship_dottori_studi', ['id_persona' => $id_dottore, 'id_studio' => $this->session->userdata('id_studio')]);
    }

    function delete_dottore($id_dottore) {
        $this->db->delete('relationship_dottori_studi', ['id_studio' => $this->session->userdata('id_studio'), 'id_persona' => $id_dottore]);
        return $this->db->query("DELETE FROM dottori WHERE id=" . $id_dottore . " ");
    }

    function modifica_dottore($id, $nome, $dettagli, $telefono, $email, $orari_settimanali) {
        $nome = $this->db->escape($nome);
        $dettagli = $this->db->escape($dettagli);
        $telefono = $this->db->escape($telefono);
        $email = $this->db->escape($email);
        $orari_settimanali = $this->db->escape($orari_settimanali);


        return $this->db->query("UPDATE dottori SET nome=" . $nome . ", dettagli=" . $dettagli . ", telefono=" . $telefono . ", email=" . $email . ", orari_settimanali=" . $orari_settimanali . " WHERE id=" . $id . " ");
    }

    function set_prestazione($data) {
        $result = false;
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('prestazioni', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('prestazioni', $data);
            $id = $this->db->insert_id();
            $this->db->insert('relationship_prestazioni_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function delete_prestazione($id_prestazione) {
        $this->db->delete('relationship_prestazioni_studi', ['id_persona' => $id_prestazione, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM prestazioni WHERE id=" . $id_prestazione . " ");
    }

    function delete_prestazione_dottore($id_prestazione, $id_dottore) {
        return $this->db->delete('relationship_prestazioni_dottori', ['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]);
    }

    function add_prestazione_dottore($id_prestazione, $id_dottore)  {
      if($id_prestazione == "") {
        return TRUE;
      }
      $id_prestazione = intval($id_prestazione);
      $this->db->where(['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]);
      $query = $this->db->get('relationship_prestazioni_dottori');
      if($query->num_rows() > 0) {
        return TRUE;
      }
      return !($this->db->insert('relationship_prestazioni_dottori', ['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]));
    }

}
