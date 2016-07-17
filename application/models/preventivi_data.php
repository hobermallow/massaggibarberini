<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class preventivi_data extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database('default');
    }

    function set_preventivo($data) {
        $this->db->insert('preventivi', $data);
        $id = $this->db->insert_id();
        $this->db->insert('relationship_preventivi_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $id;
    }

    function get_preventivi($idPaziente = 0) {
        $query = "SELECT DISTINCT CONCAT(CONCAT( pazienti.nome, SPACE(2)), pazienti.cognome ) as nome_paziente, preventivi.parziale, preventivi.totale, preventivi.stato, preventivi.id as id_preventivo, data_preventivo as dd, DATE_FORMAT(data_preventivo, '%d-%m-%Y %H:%i:%s') as data_preventivo
                        FROM preventivi
                        LEFT JOIN pazienti ON pazienti.id = preventivi.id_paziente JOIN relationship_preventivi_studi as r on r.id_persona = preventivi.id WHERE r.id_studio = ".$this->session->userdata('id_studio')." ";
        if ($idPaziente > 0) {
            $query .= " and pazienti.id = $idPaziente";
        }

        $query .= " order by dd desc";

        return $this->db->query($query);
    }

    function get_preventivo($idPreventivo) {
        $query = "SELECT preventivi.totale, pazienti.*,preventivi.stato, visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita,dottori.nome
            as nome_dottore
                        FROM preventivi LEFT JOIN visite on visite.id_preventivo = preventivi.id
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente where visite.id_preventivo = $idPreventivo";

        return $this->db->query($query);
    }

    function get_all_preventivi_by_date($startDate, $endDate, $stato = -1) {
        $query = "SELECT preventivi.*,data_preventivo as dd, DATE_FORMAT(data_preventivo, '%d-%m-%Y') as data_preventivo,pazienti.nome as nome_paziente,pazienti.cognome as cognome_paziente FROM preventivi
                        LEFT JOIN pazienti ON pazienti.id=preventivi.id_paziente JOIN relationship_preventivi_studi as r on r.id_persona = preventivi.id  where data_pagamento >= '$startDate' and data_pagamento <= '$endDate' and r.id_studio = ".$this->session->userdata('id_studio');
        if ($stato > 0) {
            $query .= " and stato = " . $stato;
        }
        $query .= " ORDER by dd desc";
        return $this->db->query($query);
    }

    function delete_preventivo($id) {
        $bool = $this->db->delete('relationship_preventivi_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM preventivi WHERE id=" . (int) $id) && $bool;
    }

    function toggle_stato($id) {
        $data = new DateTime();
        return $this->db->query("UPDATE preventivi SET stato = !stato, parziale=0, data_pagamento='" . $data->format("Y-m-d") . "' where id = $id");
    }

    function pagamento_parziale($data) {
        $date = new DateTime();
        $idPreventivo = $data['idPreventivo'];
        $parziale = (float)$data['daPagare'];
        $giaPagato = (float)$data['giaPagato'];
        $totalePreventivo = (float)$data['totalePreventivo'];
        if($giaPagato + $parziale == $totalePreventivo){
            $stato = 1;
            $parziale = $totalePreventivo;
        }
        else{
            $stato = 0;
        }
        return $this->db->query("UPDATE preventivi SET stato = $stato, parziale = $parziale, data_pagamento='" . $date->format("Y-m-d") . "' where id = $idPreventivo");
    }

}
