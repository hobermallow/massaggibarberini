<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class carichi_data extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->database('default');
    }

    function set_carico($data) {
        $result = false;
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('carichi', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('carichi', $data);
            $id = $this->db->insert_id();
            $this->db->insert('relationship_carichi_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function count_non_pagate($id_fornitore) {
        return $this->db->query("SELECT count(*) as total from carichi where stato = 0 and id_fornitore = $id_fornitore")->result()[0]->total;
    }

    function get_all_carichi() {
        return $this->db->query("SELECT c.prezzo_acquisto, c.stato, c.fattura, c.quantita, c.id, f.ragione_sociale,p.nome as nome_prodotto, DATE_FORMAT(c.data, '%d/%m/%Y') as data from carichi as c  JOIN relationship_carichi_studi as r ON r.id_persona = c.id LEFT JOIN fornitori as f "
                        . "ON c.id_fornitore = f.id LEFT JOIN prodotti as p ON c.id_prodotto = p.id WHERE r.id_studio = ".$this->session->userdata('id_studio'));
    }

    function get_carichi_prodotto($idProdotto) {
        return $this->db->query("SELECT c.prezzo_acquisto, c.quantita, c.stato, c.fattura, c.id, f.ragione_sociale,p.nome as nome_prodotto, DATE_FORMAT(c.data, '%d/%m/%Y') as data from carichi as c LEFT JOIN fornitori as f "
                        . "ON c.id_fornitore = f.id LEFT JOIN prodotti as p ON c.id_prodotto = p.id where id_prodotto = " . $idProdotto);
    }

    function get_carico($id) {
        return $this->db->query("SELECT c.prezzo_acquisto, c.stato, c.fattura, c.quantita, c.id, f.id as id_fornitore, p.id as id_prodotto, f.ragione_sociale, p.nome as nome_prodotto, DATE_FORMAT(c.data, '%d/%m/%Y') as data from carichi as c LEFT JOIN fornitori as f "
                        . "ON c.id_fornitore = f.id LEFT JOIN prodotti as p ON c.id_prodotto = p.id where c.id = $id");
    }

    function delete_carico($id) {
        $this->db->delete('relationship_carichi_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM carichi WHERE id=" . (int) $id);
    }

    function toggle_stato($id) {
        return $this->db->query("UPDATE carichi SET stato = !stato where id = $id");
    }

    function set_fattura($filename, $id) {
        return $this->db->query("UPDATE carichi SET fattura = '$filename' where id = $id");
    }

}
