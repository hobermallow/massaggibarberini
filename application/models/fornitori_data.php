<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fornitori_data extends CI_Model {

    function __construct() {
// Call the Model constructor
        parent::__construct();
        $this->load->database('default');
        $this->load->helper('domini');
    }

    function set_fornitore($data) {
        $result = false;
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('fornitori', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('fornitori', $data);
            $id = $this->db->insert_id();
            // lego il fornitore allo studio
            $this->db->insert('relationship_fornitori_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function get_all_fornitori() {
        // return $this->db->query("SELECT * from fornitori");
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('fornitori', $this->session->userdata('id_studio'));
        return $this->db->get('fornitori');
    }

    function get_fornitore($id) {
        return $this->db->query("SELECT * from fornitori where id = $id");
    }

    function delete_fornitore($id) {
        $this->db->delete('relationship_fornitori_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM fornitori WHERE id=" . (int) $id);
    }

}
