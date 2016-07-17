<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class impostazioni_data extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->database('default');
    }

    function save_last_esecuzione_alerthandler($tot_email, $tot_sms) {
        $tot_email = (int) $tot_email;
        $tot_sms = (int) $tot_sms;

        return $this->db->query("
			INSERT INTO esecuzioni_alerthandler 
			( tot_email_inviate, tot_sms_inviati ) 
			VALUES ( " . $tot_email . ", " . $tot_sms . " )
		");
    }

    function get_ultima_esecuzione_alerthandler() {
        return $this->db->query("SELECT * FROM esecuzioni_alerthandler ORDER BY data_esecuzione DESC LIMIT 1 ");
    }

    function get_all_impostazioni() {
        return $this->db->query("SELECT * FROM impostazioni ");
    }

    function updateImpostazioni($alert_email, $alert_sms) {
        //escaping
        $alert_email = $this->db->escape($alert_email);
        $alert_sms = $this->db->escape($alert_sms);

        $this->db->query("UPDATE impostazioni SET valore=" . $alert_email . " WHERE impostazione='alert_email' ");
        $this->db->query("UPDATE impostazioni SET valore=" . $alert_sms . " WHERE impostazione='alert_sms' ");
    }

    function updateDatiFatturazione($data) {
        $result = false;
        $id = 0;
        unset($data['dati_fatturazione_submit']);
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $result = $this->db->update('dati_fatturazione', $data);
            $id = $data['id'];
        } else {
            $result = $this->db->insert('dati_fatturazione', $data);
            $id = $this->db->insert_id();
        }
        return $id;
    }
    
    function get_dati_fatturazione() {
         return $this->db->query("SELECT * FROM dati_fatturazione");
    }

}
