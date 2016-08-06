<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class visite_data extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->database('default');
    }
    
    function get_visita_fattura($idVisita) {
    	$this->db->select('nome_paziente, pazienti.indirizzo as indirizzo, pazienti.codice_fiscale as codice_fiscale, pazienti.telefono as telefono, visite.data_visita as data_visita, visite.descrizione as descrizione, prestazioni.descrizione as prestazione, prestazioni.costo_prestazione as prezzo');
   		$this->db->join('pazienti', 'pazienti.id = visite.id_paziente');
   		$this->db->join('prestazioni', 'prestazioni.id = visite.id_prestazione');
   		$this->db->where(['visite.id' => $idVisita]);
   		$query = $this->db->get('visite');
   		return $query;
    }

    function get_nome_cognome_paziente_by_id($id_paziente) {
        $query = $this->db->query("SELECT nome, cognome FROM pazienti WHERE id='" . $id_paziente . "' ");
        $risultato = $query->result();

        return $risultato[0]->nome . " " . $risultato[0]->cognome;
    }

    function set_visita($data) {
        $result = false;
        $data['nome_paziente'] = $this->get_nome_cognome_paziente_by_id($data['id_paziente']);
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('visite', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('visite', $data);
            $id = $this->db->insert_id();
            // lego la visita allo studio
            $this->db->insert('relationship_visite_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function set_prodotto_visita($data) {
        $this->db->insert('prodotti_to_visita', $data);
        return $this->db->insert_id();
    }

    function get_all_visite($stato = -1) {
        $query = "SELECT visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita, prestazioni.descrizione as nome_prestazione, dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente
                        JOIN prestazioni on prestazioni.id = visite.id_prestazione JOIN relationship_visite_studi as r ON r.id_persona = visite.id  where r.id_studio = ".$this->session->userdata('id_studio');
        if ($stato > 0) {
            $query .= " and stato = " . $stato;
        }
        return $this->db->query($query);
    }

    function get_visite_sospese() {
        $query = "SELECT visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita, prestazioni.descrizione as nome_prestazione, dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente
                        JOIN prestazioni on prestazioni.id = visite.id_prestazione JOIN relationship_visite_studi as r ON r.id_persona = visite.id  where (visite.id_dottore is NULL or visite.id_dottore = '') and r.id_studio = ".$this->session->userdata('id_studio');
        return $this->db->query($query);
    }

    function get_visite_sospese_mio() {
      $this->db->join('relationship_visite_studi', 'relationship_visite_studi.id_persona = visite.id');
      $this->db->join('dottori', 'dottori.id = visite.id_dottore', 'left');
      $this->db->join('prestazioni', 'prestazioni.id = visite.id_prestazione', 'left');
      $this->db->join('pazienti', 'pazienti.id = visite.id_paziente');
      $this->db->where(['id_studio' => $this->session->userdata('id_studio'), 'visita_confermata' => 0]);
      $this->db->select('pazienti.nome as nome_paziente, pazienti.cognome as cognome_paziente, dottori.nome as nome_dottore, prestazioni.descrizione as nome_prestazione, visite.data_visita as data_visita, visite.orario_visita as orario_visita, visite.id as id_visita');
      return $this->db->get('visite');
    }

    public function conferma_visita($id_visita) {
      //recupero l'id del paziente
      $id_paziente = $this->db->get_where('visite', ['id' => $id_visita]);
      $id_paziente = $id_paziente->row()->id_paziente;
      //recupero l'eventuale api key e firebase_id
      $query = $this->db->get_where('pazienti', ['id' => $id_paziente]);
      $api_key = $query->row()->api_key;
      $firebase_id = $query->row()->firebase_id;
      //se no sono nulle
      if($api_key != null && $firebase_id != null) {
      	//recupero la visita	
      	$query = $this->db->get_where('visite', ['id' => $id_visita]);
      	$data_visita = $query->row()->data_visita;
      	$orario_visita = $query->row()->orario_visita;
      	$prestazione = $query->row()->descrizione;
      	//PUSH NOTIFICATION
      	//inizializzo curl
      	$curl = curl_init("https://fcm.googleapis.com/fcm/send");
      	//setto le opzioni
      	
      	$header = [
      			'Content-Type: application/json',
      			'Authorization: key=AIzaSyBuf9BvPSNJnszoP7Bj4HliK4ju62F1amE'
      	];
      	curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
      	//setto il contenuto del messaggio
      	$data = [ "notification" => [
      		"title" => "Prenotazione Confermata",
      		"text" => "Prenotazione per $prestazione confermata\nGiorno: $data_visita\nOra: $orario_visita"
      	],
      	"to" => "$firebase_id"
      	];
      	curl_setopt( $curl, CURLOPT_POSTFIELDS, json_encode( $data ) );
      	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      	curl_exec($curl);
      	$string = curl_close($curl);
      }
      
      $this->db->set('visita_confermata', 1, FALSE);
      $this->db->where(['id' => $id_visita]);
      return $this->db->update('visite');
    }

    function get_all_visite_by_date($startDate, $endDate, $stato = -1) {
        $query = "SELECT visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita,dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente JOIN relationship_visite_studi as r ON r.id_persona = visite.id  where r.id_studio = ".$this->session->userdata('id_studio')." and data_visita >= '$startDate' and data_visita <= '$endDate'";
        if ($stato > 0) {
            $query .= " and stato = " . $stato;
        }
        return $this->db->query($query);
    }

    function get_visita($id) {
        $query = "SELECT visite.*,pazienti.indirizzo,pazienti.telefono,pazienti.cap,pazienti.codice_fiscale,
                        DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita,dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente where visite.id = " . $id;
        return $this->db->query($query);
    }

    function toggle_stato($id) {
        return $this->db->query("UPDATE visite SET stato = !stato where id = $id");
    }

    function get_prodotti_visita($idVisita) {
        return $this->db->query("SELECT prodotti_to_visita.*, prodotti.nome FROM prodotti_to_visita
			LEFT JOIN prodotti ON prodotti_to_visita.id_prodotto = prodotti.id where id_visita = $idVisita");
    }

    function delete_visita($id) {
        $bool = $this->db->delete('relationship_visite_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM visite WHERE id=" . (int) $id) && $bool;
    }

}
