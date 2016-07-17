<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class statistiche_data extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();

        $this->load->database('default');
    }

    public function get_statistica_visite_mensile() {
        //parametri
        $totale_mesi_fa = 7; //minimo = 1

        $stats = array();

        $current_date = date("Y-m-d");
        $current_date_escaped = $this->db->escape($current_date);
        $new_timestamp = strtotime('-' . $totale_mesi_fa . ' months', strtotime($current_date));
        $max_past_date = date("Y-m-d", $new_timestamp); //la data passata che indica il massimo passato in cui si possono prelevare le visite
        //effettuo la query delle visite
        $i = 0;
        while ($i < $totale_mesi_fa) {
            //ottengo le visite di questo mese specifico
            $new_timestamp = strtotime('-' . $i . ' months', strtotime($current_date));
            $max_past_date = date("Y-m-01", $new_timestamp); //la data passata che indica il massimo passato in cui si possono prelevare le visite
            $max_past_date_escaped = $this->db->escape($max_past_date);
            $last_day_curr_month = date("Y-m-t", strtotime($max_past_date));
            $last_day_curr_month_escaped = $this->db->escape($last_day_curr_month);

            //effettuo la query delle visite del mese
            $query_visite = $this->db->query("SELECT * FROM visite WHERE ( data_visita >= " . $max_past_date_escaped . " AND data_visita < " . $last_day_curr_month_escaped . " ) ");

            //ottengo anno e mese per le visite calcolate in questo ciclo
            $mese = date("m", strtotime($max_past_date));

            switch ($mese) {
                case "01":
                    $mese = "Gennaio";
                    break;
                case "02":
                    $mese = "Febbraio";
                    break;
                case "03":
                    $mese = "Marzo";
                    break;
                case "04":
                    $mese = "Aprile";
                    break;
                case "05":
                    $mese = "Maggio";
                    break;
                case "06":
                    $mese = "Giugno";
                    break;
                case "07":
                    $mese = "Luglio";
                    break;
                case "08":
                    $mese = "Agosto";
                    break;
                case "09":
                    $mese = "Settembre";
                    break;
                case "10":
                    $mese = "Ottobre";
                    break;
                case "11":
                    $mese = "Novembre";
                    break;
                case "12":
                    $mese = "Dicembre";
                    break;
            }//switch

            $anno = date("Y", strtotime($max_past_date));

            $stats[] = array(
                "mese" => $mese,
                "anno" => $anno,
                "riscontri" => $query_visite->num_rows(),
            );

            $i++;
        }//while

        return array_reverse($stats);
    }

//public function get_statistica_visite_mensile

    public function get_statistica_farmaci() {
        $stats = array();

        $query_farmaci = $this->db->query("SELECT * FROM farmaci ");

        foreach ($query_farmaci->result() as $farmaco) {
            //ottengo quante visite
            $id_farmaco = (int) $farmaco->id_farmaco;
            $nome_farmaco = (string) $farmaco->nome_farmaco;
            $query_visite = $this->db->query("SELECT id FROM visite WHERE id_farmaco=" . $id_farmaco . " ");

            $stats[] = array(
                "id_farmaco" => $id_farmaco,
                "nome_farmaco" => $nome_farmaco,
                "riscontri" => $query_visite->num_rows(),
            );
        }//foreach


        return $stats;
    }

//public function get_statistica_farmaci

    public function get_statistica_patologie() {
        $stats = array();

        $query_patologie = $this->db->query("SELECT * FROM patologie ");

        foreach ($query_patologie->result() as $patologia) {
            //ottengo quante visite
            $id_patologia = (int) $patologia->id_patologia;
            $nome_patologia = (string) $patologia->nome_patologia;
            $query_visite = $this->db->query("SELECT id FROM visite WHERE id_patologia=" . $id_patologia . " ");

            $stats[] = array(
                "id_patologia" => $id_patologia,
                "nome_patologia" => $nome_patologia,
                "riscontri" => $query_visite->num_rows(),
            );
        }//foreach


        return $stats;
    }

    public function get_costi() {
        $result = $this->db->query("SELECT SUM(prezzo_acquisto*quantita) as totale FROM carichi")->result();
        return $result[0]->totale;
    }
    
    public function get_costi_by_date($startDate, $endDate) {
        return $this->db->query("SELECT c.prezzo_acquisto, c.quantita, c.id, f.ragione_sociale,p.nome as nome_prodotto, DATE_FORMAT(c.data, '%d/%m/%Y') as data from carichi as c LEFT JOIN fornitori as f "
                        . "ON c.id_fornitore = f.id LEFT JOIN prodotti as p ON c.id_prodotto = p.id where data >= '$startDate' and data <= '$endDate'")->result();
        
    }
    
    public function get_introiti() {
        $result = $this->db->query("SELECT SUM(totale) as totale FROM visite where stato = 1")->result();
        return $result[0]->totale;
    }
    
    public function get_totale_non_pagato() {
        $result = $this->db->query("SELECT SUM(totale) as totale FROM visite where stato = 0")->result();
        return $result[0]->totale;
    }

//public function get_statistica_patologie
}
