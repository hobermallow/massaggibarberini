<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class magazzino_data extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->database('default');
        $this->load->helper('domini');
    }

    function set_prodotto($data) {
        $result = false;
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('prodotti', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('prodotti', $data);
            $id = $this->db->insert_id();
            $this->db->insert('relationship_prodotti_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function update_quantita($id, $quantita) {
        $result = false;
        if (isset($id) && $id > 0) {
            $this->db->where('id', $id);
            $this->db->set('quantita', 'quantita+' . (int) $quantita, FALSE);
            $result = $this->db->update('prodotti');
        }
        return $result;
    }

    function get_prodotti() {
        return $this->db->query("SELECT p.id, p.quantita,p.prezzo_vendita, p.nome from prodotti as p join relationship_prodotti_studi as r on r.id_persona = p.id where r.id_studio = ".$this->session->userdata('id_studio').""); // join carichi as c on c.id = (Select id from carichi where id_prodotto = p.id order by id desc LIMIT 1) where r.id_studio = ".$this->session->userdata('id_studio')."");
    }

    function get_prodotto($id) {
        return $this->db->query("SELECT * from prodotti where id = $id");
    }

    function delete_prodotto($id) {
        $this->db->delete('relationship_prodotti_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM prodotti WHERE id = " . (int) $id);
    }

}
