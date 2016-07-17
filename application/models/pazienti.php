<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pazienti extends CI_Model {

    //RISCRIVERE SQL CON HELPER CI
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->database('default');
        $this->load->helper('domini');
    }

    function search_patologia($search) {
        //escaping INUTILE USANDO CI
        //$search = $this->db->escape($search);
        //$search = str_replace("'", "", $search);
        //INIZIO MIO
        $this->db->limit(100);
        $this->db->like('nome_patologia', $search);
        return $this->db->get('patologie');
        //FINE MIO
        //return $this->db->query("SELECT * FROM patologie WHERE nome_patologia LIKE '%" . $search . "%' LIMIT 100 ");
    }

    function search_farmaco($search) {
        //escaping
        $search = $this->db->escape($search);
        $search = str_replace("'", "", $search);

        return $this->db->query("SELECT * FROM farmaci WHERE nome_farmaco LIKE '%" . $search . "%' LIMIT 100 ");
    }

//function search_farmaco
    //ritorna false se esistono visite con gli stessi parametri passati, true altrimenti
    function check_visita_unique($post) {
        //escaping
        $post["id_dottore"] = (int) $post["id_dottore"];
        $post["ora_visita"] = $this->db->escape(($post["ora_visita"] . ":00"));

        $post["data_visita"] = str_replace("/", "-", $post["data_visita"]);
        $post["data_visita"] = date('Y-m-d', strtotime($post["data_visita"]));
        $post["data_visita"] = $this->db->escape($post["data_visita"]);


        $query_visite = $this->db->query("SELECT id FROM visite WHERE id_dottore=" . $post["id_dottore"] . " AND data_visita=" . $post["data_visita"] . " AND orario_visita=" . $post["ora_visita"] . " LIMIT 200 ");

        if ($query_visite->num_rows() > 0)
            return false;
        else
            return true;
    }

    function get_visite_by_day_by_paziente($day, $id_paziente) {
        //escaping
        $day = $this->db->escape($day);
        $id_paziente = (int) $id_paziente;

        return $this->db->query("SELECT * FROM visite WHERE id_paziente=" . $id_paziente . " AND data_visita=" . $day . " LIMIT 10 ");
    }

    function get_pazienti_with_alert_sms_enabled() {
        return $this->db->query("SELECT * FROM pazienti WHERE alert_sms=1 ");
    }

    //ritorna tutti i pazienti con l'alert email abilitato
    function get_pazienti_with_alert_email_enabled() {
        return $this->db->query("SELECT * FROM pazienti WHERE alert_email=1 ");
    }

    //ritorna il telefono del paziente se lo trova, false altrimenti
    function get_paziente_telefono_by_id_paziente($id_paziente) {
        //escaping
        $id_paziente = (int) $id_paziente;

        $query_paziente = $this->db->query("SELECT telefono FROM pazienti WHERE id=" . $id_paziente . " LIMIT 1 ");
        $query_paziente = $query_paziente->result();

        if (isset($query_paziente[0]))
            return (string) $query_paziente[0]->telefono;
        else
            return false;
    }

    //ritorna l'email del paziente se lo trova, false altrimenti
    function get_paziente_email_by_id_paziente($id_paziente) {
        //escaping
        $id_paziente = (int) $id_paziente;

        $query_paziente = $this->db->query("SELECT email FROM pazienti WHERE id=" . $id_paziente . " LIMIT 1 ");
        $query_paziente = $query_paziente->result();

        if (isset($query_paziente[0]))
            return (string) $query_paziente[0]->email;
        else
            return false;
    }

    //converte la data ita to mysql
    private function convertiData($dataEur) {
        $rsl = explode('/', $dataEur);
        $rsl = array_reverse($rsl);
        return implode($rsl, '-');
    }

    //per validare una data di nascita
    function validaData($date) {
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    function ajax_query_pazienti($post) {
        $array_pazienti_risultanti = array();

        //MIO CODICE
        // //id maggiore di zero
        // $this->db->where('id >', 0);
        //
        // //vari filtri
        if ($post["filtro_nome"] != "")
            $this->db->like('nome', $post['filtro_nome']);
        else
            $post["filtro_nome"] = "";

        if ($post["filtro_cognome"] != "")
            $this->db->like('cognome', $post['filtro_cognome']);
        else
            $post["filtro_cognome"] = "";

        if ($post["filtro_luogo_nascita"] != "")
            $this->db->like('luogo_nascita', $post['filtro_luogo_nascita']);
        else
            $post["filtro_luogo_nascita"] = "";

        if ($post["filtro_indirizzo"] != "")
            $this->db->like('indirizzo', $post['filtro_indirizzo']);
        else
            $post["filtro_indirizzo"] = "";

        if ($post["filtro_codice_fiscale"] != "")
            $this->db->like('codice_fiscale', $post['filtro_codice_fiscale']);
        else
            $post["filtro_codice_fiscale"] = "";

        if ($post["filtro_telefono"] != "")
            $this->db->like('telefono', $post['filtro_telefono']);
        else
            $post["filtro_telefono"] = "";

        if ($post["filtro_email"] != "")
            $this->db->like('email', $post['filtro_email']);
        else
            $post["filtro_email"] = "";
        //
        // $post['filtro_categoria_pazienti'] = 0;
        //FINE MIO CODICE
        // $query_pazienti = "SELECT * FROM pazienti WHERE id>0 ";

        //escaping

        $post["filtro_categoria_pazienti"] = (int) $post["filtro_categoria_pazienti"];

        // if ($post["filtro_nome"] != "")
        //     $query_pazienti .= "AND nome LIKE '%" . $post["filtro_nome"] . "%' ";
        // else
        //     $post["filtro_nome"] = $this->db->escape("");
        //
        // if ($post["filtro_cognome"] != "")
        //     $query_pazienti .= "AND cognome LIKE '%" . $post["filtro_cognome"] . "%' ";
        // else
        //     $post["filtro_cognome"] = $this->db->escape("");
        //
        // if ($post["filtro_luogo_nascita"] != "")
        //     $query_pazienti .= "AND luogo_nascita LIKE '%" . $post["filtro_luogo_nascita"] . "%' ";
        // else
        //     $post["filtro_luogo_nascita"] = $this->db->escape("");
        //
        // if ($post["filtro_indirizzo"] != "")
        //     $query_pazienti .= "AND indirizzo LIKE '%" . $post["filtro_indirizzo"] . "%' ";
        // else
        //     $post["filtro_indirizzo"] = $this->db->escape("");
        //
        // if ($post["filtro_codice_fiscale"] != "")
        //     $query_pazienti .= "AND codice_fiscale LIKE '%" . $post["filtro_codice_fiscale"] . "%' ";
        // else
        //     $post["filtro_codice_fiscale"] = $this->db->escape("");
        //
        // if ($post["filtro_telefono"] != "")
        //     $query_pazienti .= "AND telefono LIKE '%" . $post["filtro_telefono"] . "%' ";
        // else
        //     $post["filtro_telefono"] = $this->db->escape("");
        //
        // if ($post["filtro_email"] != "")
        //     $query_pazienti .= "AND email LIKE '%" . $post["filtro_email"] . "%' ";
        // else
        //     $post["filtro_email"] = $this->db->escape("");

        //fine escaping
        //prima effettuo la query per i pazienti senza contare il filtro_categoria_pazienti
        //INIZIO CODICE MIO!!!
        $id_studio = $this->session->userdata('id_studio');
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('pazienti', $id_studio);
        $this->db->where("pazienti.id > 0");
        // $pazienti = $this->db->query($query_pazienti);

        //print_r($query_pazienti);
        $this->db->select('pazienti.id as id, pazienti.nome as nome, pazienti.cognome as cognome, pazienti.email as email, pazienti.telefono as telefono, pazienti.indirizzo as indirizzo, pazienti.cap as cap, pazienti.codice_fiscale as codice_fiscale, pazienti.data_nascita as data_nascita, pazienti.luogo_nascita as luogo_nascita, pazienti.dettaglio_paziente as dettaglio_paziente, pazienti.alert_email as alert_email, pazienti.alert_sms as alert_sms');
        /* FOR ASSASSINO!!!!!!!!!!!!!!!!!!!! */
        if($post["filtro_categoria_pazienti"] != 0) {
          $this->db->join('associazioni_pazienti_categorie', 'associazioni_pazienti_categorie.id_paziente = pazienti.id');
          $this->db->join('categorie_pazienti', 'categorie_pazienti.id_categoria = associazioni_pazienti_categorie.id_categoria');
          $this->db->where('categorie_pazienti.id_categoria = ', $post['filtro_categoria_pazienti']);
        }
        // else {
        //   $this->db->select('pazienti.id as id, pazienti.nome as nome, pazienti.cognome as cognome, pazienti.email as email, pazienti.telefono as telefono, pazienti.indirizzo as indirizzo, pazienti.cap as cap, pazienti.codice_fiscale as codice_fiscale, pazienti.data_nascita as data_nascita, pazienti.luogo_nascita as luogo_nascita, pazienti.dettaglio_paziente as dettaglio_paziente, pazienti.alert_email as alert_email, pazienti.alert_sms as alert_sms');
        //
        //
        // }
        $pazienti = $this->db->get('pazienti');
        // if ($post["filtro_categoria_pazienti"] != 0) {
        //     foreach ($pazienti->result() as $paziente) {
        //         //ottengo la prima categorie del paziente
        //         $categoria_del_paziente = $this->db->query("
				// 	SELECT * FROM associazioni_pazienti_categorie
				// 	LEFT JOIN categorie_pazienti
				// 	ON associazioni_pazienti_categorie.id_categoria=categorie_pazienti.id_categoria
				// 	WHERE associazioni_pazienti_categorie.id_paziente=" . $paziente->id . "
				// 	LIMIT 1
				// ");
        //
        //         if ($categoria_del_paziente->num_rows() > 0) {
        //             $categoria_del_paziente = $categoria_del_paziente->result();
        //
        //             //se si, allora significa che il paziente soddisfa la categoria
        //             if ($categoria_del_paziente[0]->id_categoria == $post["filtro_categoria_pazienti"])
        //                 $array_pazienti_risultanti[] = $paziente;
        //         }
        //     }//foreach( $pazienti->result() as $paziente )
        // }//if( $post["filtro_categoria_pazienti"] != 0 )
        // else {

            // foreach ($pazienti->result() as $paziente) {
            //     //aggiungo tutti i pazienti in quanto sono tutti validi
            //     $array_pazienti_risultanti[] = $paziente;
            // }//foreach( $pazienti->result() as $paziente )
        // }

        //print_r($array_pazienti_risultanti);
        //die();


        return $pazienti->result();
    }

//function ajax_query_pazienti
    //crea un nuovo paziente e ne ritorna l'id
    function add_paziente_with_name($nome) {
        $nome = $this->db->escape($nome);
        $cognome = $this->db->escape("");
        $codice_fiscale = $this->db->escape("");
        $email = $this->db->escape("");
        $telefono = $this->db->escape("");
        $indirizzo = $this->db->escape("");
        $cap = $this->db->escape("");
        $data_nascita = $this->db->escape("0000-00-00");
        $indirizzo = $this->db->escape("");
        $luogo_nascita = $this->db->escape("");
        $dettaglio_paziente = $this->db->escape("");

        $gestante = 0;
        $infertilita = 0;

        $this->db->query("INSERT INTO pazienti (nome, cognome, email, telefono, indirizzo, cap, codice_fiscale, data_nascita, luogo_nascita, dettaglio_paziente) VALUES ( " . $nome . ", " . $cognome . ", " . $email . ", " . $telefono . ", " . $indirizzo . ", " . $cap . ", " . $codice_fiscale . ", " . $data_nascita . ", " . $luogo_nascita . ", " . $dettaglio_paziente . " )  ");

        return $this->db->insert_id();
    }

    //aggiunge un paziente al database, nome, cognome e codice fiscale sono campi obbligatori e ne ritorna l'id
    function add_paziente($post) {
        //escaping

        if ($post["nome"] != "")
            $post["nome"] = $this->db->escape(substr((string) $post["nome"], 0, 250));
        else
            $post["nome"] = $this->db->escape("");

        if ($post["cognome"] != "")
            $post["cognome"] = $this->db->escape(substr((string) $post["cognome"], 0, 250));
        else
            $post["cognome"] = $this->db->escape("");

        if ($post["email"] != "")
            $post["email"] = $this->db->escape(substr((string) $post["email"], 0, 250));
        else
            $post["email"] = $this->db->escape("");

        if ($post["telefono"] != "")
            $post["telefono"] = $this->db->escape(substr((string) $post["telefono"], 0, 250));
        else
            $post["telefono"] = $this->db->escape("");

        if ($post["indirizzo"] != "")
            $post["indirizzo"] = $this->db->escape(substr((string) $post["indirizzo"], 0, 250));
        else
            $post["indirizzo"] = $this->db->escape("");

        if ($post["cap"] != "")
            $post["cap"] = $this->db->escape(substr((string) $post["cap"], 0, 28));
        else
            $post["cap"] = $this->db->escape("");

        if ($post["codice_fiscale"] != "")
            $post["codice_fiscale"] = $this->db->escape(substr((string) $post["codice_fiscale"], 0, 250));
        else
            $post["codice_fiscale"] = $this->db->escape("");


        if ($post["data_nascita"] == "")
            $post["data_nascita"] = "0000-00-00";
        else {
            //converto la data da ITA a mysql
            $post["data_nascita"] = $this->convertiData($post["data_nascita"]);

            $post["data_nascita"] = $this->db->escape(substr((string) $post["data_nascita"], 0, 20));
        }

        if ($post["luogo_nascita"] != "")
            $post["luogo_nascita"] = $this->db->escape(substr((string) $post["luogo_nascita"], 0, 200));
        else
            $post["luogo_nascita"] = $this->db->escape("");

        if ($post["dettaglio_paziente"] != "")
            $post["dettaglio_paziente"] = $this->db->escape(substr((string) $post["dettaglio_paziente"], 0, 490));
        else
            $post["dettaglio_paziente"] = $this->db->escape("");

        //fine escaping
        //ottengo le categorie che si vogliono attribuire al paziente che va inserito
        //alla fine del foreach avremmo, nell'array "$array_categorie_da_assegnare" solo gli id delle categorie a cui deve appartenere questo paziente
        $array_categorie_da_assegnare = array();
        $all_categorie = $this->db->query("SELECT id_categoria FROM categorie_pazienti ");
        foreach ($all_categorie->result() as $categoria) {
            //se è vero, significa che bisogna assegnare all'utente questa categoria
            if (isset($post["cat" . $categoria->id_categoria]) && $post["cat" . $categoria->id_categoria] != "")
                $array_categorie_da_assegnare[] = (int) $categoria->id_categoria;
        }

        //inserisco prima di tutto il paziente nel db
        $this->db->query("
			INSERT INTO pazienti
			( nome, cognome, email, telefono, indirizzo, cap, codice_fiscale, data_nascita, luogo_nascita, dettaglio_paziente )
			VALUES ( " . $post["nome"] . ", " . $post["cognome"] . ", " . $post["email"] . ", " . $post["telefono"] . ", " . $post["indirizzo"] . ", " . $post["cap"] . ", " . $post["codice_fiscale"] . ", " . $post["data_nascita"] . ", " . $post["luogo_nascita"] . ", " . $post["dettaglio_paziente"] . " )");

        //Riprendo l'id del paziente a partire dall'ultima query
        $id_paziente = (int) $this->db->insert_id();

        //registro le categorie alle quali deve appartenere
        foreach ($array_categorie_da_assegnare as $id_categoria) {
            $id_categoria = (int) $id_categoria;
            $this->db->query("INSERT INTO associazioni_pazienti_categorie ( id_paziente, id_categoria ) VALUES ( " . $id_paziente . ", " . $id_categoria . " ) ");
        }

        //Aggiungo la coppia id_studio, id_paziente alla relationship_pazienti_studi
        $data = ['id_persona' => $id_paziente, 'id_studio' => $this->session->userdata('id_studio')];
        $this->db->insert('relationship_pazienti_studi', $data);

        return $id_paziente;
    }

    //ritorna la query del paziente a partire dall'id passato come argomento
    function get_paziente_by_id($id) {
        $id_paziente = (int) $id;
        return $this->db->query("SELECT * FROM pazienti WHERE id=" . $id_paziente . " ");
    }

    //ritorna il numero di pagine totali per visualizzare tutti i pazienti, basato sul parametro $pazienti_per_pagina
    function get_pages_pazienti($pazienti_per_pagina) {
        $totale_pagine = -1;

        $query = $this->db->query("SELECT id FROM pazienti ");


        $totale_rows = $query->num_rows();
        $totale_pagine = (int) ($totale_rows / $pazienti_per_pagina);
        //gestione del riporto
        if (($totale_rows % $pazienti_per_pagina) != 0)
            $totale_pagine++;

        return $totale_pagine;
    }

    function get_pages_pazienti_gestanti($pazienti_per_pagina) {
        $totale_pagine = -1;

        $query = $this->db->query("SELECT id FROM pazienti WHERE gestante=1 ");


        $totale_rows = $query->num_rows();
        $totale_pagine = (int) ($totale_rows / $pazienti_per_pagina);
        //gestione del riporto
        if (($totale_rows % $pazienti_per_pagina) != 0)
            $totale_pagine++;

        return $totale_pagine;
    }

    function get_pages_pazienti_infertilita($pazienti_per_pagina) {
        $totale_pagine = -1;

        $query = $this->db->query("SELECT id FROM pazienti WHERE infertilita=1 ");


        $totale_rows = $query->num_rows();
        $totale_pagine = (int) ($totale_rows / $pazienti_per_pagina);
        //gestione del riporto
        if (($totale_rows % $pazienti_per_pagina) != 0)
            $totale_pagine++;

        return $totale_pagine;
    }

    function get_pages_pazienti_ginecologia($pazienti_per_pagina) {
        $totale_pagine = -1;

        $query = $this->db->query("SELECT id FROM pazienti WHERE ginecologia=1 ");


        $totale_rows = $query->num_rows();
        $totale_pagine = (int) ($totale_rows / $pazienti_per_pagina);
        //gestione del riporto
        if (($totale_rows % $pazienti_per_pagina) != 0)
            $totale_pagine++;

        return $totale_pagine;
    }

    //ritorna i pazienti di una pagina specificata dal parametro $page (la prima pagina in assoluto è la 1)
    //colonna_ordinamento = nome della colonna sulla quale va chiamato l'ordinamento
    function get_page_pazienti($page, $pazienti_per_pagina, $colonna_ordinamento) {
        if ($page == 1) {
            Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('pazienti', $this->session->userdata('id_studio'));
            $this->db->limit($pazienti_per_pagina);
            $this->db->order_by($colonna_ordinamento);
            $query = $this->db->get('pazienti');
        }
        else {
            Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('pazienti', $this->session->userdata('id_studio'));
            $this->db->limit($pazienti_per_pagina, ($page-1)*$pazienti_per_pagina);
            $this->db->order_by($colonna_ordinamento);
            $query = $this->db->get('pazienti');
        }
        return $query;
    }

    function get_page_pazienti_gestanti($page, $pazienti_per_pagina, $colonna_ordinamento) {
        if ($page == 1)
            $query = $this->db->query("SELECT * FROM pazienti WHERE gestante=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . $pazienti_per_pagina . " ");
        else
            $query = $this->db->query("SELECT * FROM pazienti WHERE gestante=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . (($page - 1) * $pazienti_per_pagina) . "," . $pazienti_per_pagina . " ");

        return $query;
    }

    function get_page_pazienti_infertilita($page, $pazienti_per_pagina, $colonna_ordinamento) {
        if ($page == 1)
            $query = $this->db->query("SELECT * from pazienti WHERE infertilita=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . $pazienti_per_pagina . " ");
        else
            $query = $this->db->query("SELECT * from pazienti WHERE infertilita=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . (($page - 1) * $pazienti_per_pagina) . "," . $pazienti_per_pagina . " ");

        return $query;
    }

    function get_page_pazienti_ginecologia($page, $pazienti_per_pagina, $colonna_ordinamento) {
        if ($page == 1)
            $query = $this->db->query("SELECT * from pazienti WHERE ginecologia=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . $pazienti_per_pagina . " ");
        else
            $query = $this->db->query("SELECT * from pazienti WHERE ginecologia=1 ORDER BY " . $colonna_ordinamento . " LIMIT " . (($page - 1) * $pazienti_per_pagina) . "," . $pazienti_per_pagina . " ");

        return $query;
    }

    function elimina_paziente($id) {
        $id_delete = (int) $id;
        $query_1 = $this->db->delete('relationship_pazienti_studi', 'id_persona = '.$id);
        $query_2 = $this->db->query("DELETE FROM pazienti WHERE id=" . $id . " ");

        return $query_1 && $query_2;
    }

    //modifica un paziente con i campi indicati come parametri
    function modifica_paziente($id_paziente, $post) {
        //escaping

        $id_paziente = (int) $id_paziente;

        //print_r($post); die();

        if ($post["nome"] != "")
            $post["nome"] = $this->db->escape(substr((string) $post["nome"], 0, 250));
        else
            $post["nome"] = $this->db->escape("");

        if ($post["cognome"] != "")
            $post["cognome"] = $this->db->escape(substr((string) $post["cognome"], 0, 250));
        else
            $post["cognome"] = $this->db->escape("");

        if ($post["email"] != "")
            $post["email"] = $this->db->escape(substr((string) $post["email"], 0, 250));
        else
            $post["email"] = $this->db->escape("");

        if ($post["telefono"] != "")
            $post["telefono"] = $this->db->escape(substr((string) $post["telefono"], 0, 250));
        else
            $post["telefono"] = $this->db->escape("");

        if ($post["indirizzo"] != "")
            $post["indirizzo"] = $this->db->escape(substr((string) $post["indirizzo"], 0, 250));
        else
            $post["indirizzo"] = $this->db->escape("");

        if ($post["cap"] != "")
            $post["cap"] = $this->db->escape(substr((string) $post["cap"], 0, 28));
        else
            $post["cap"] = $this->db->escape("");

        if ($post["codice_fiscale"] != "")
            $post["codice_fiscale"] = $this->db->escape(substr((string) $post["codice_fiscale"], 0, 250));
        else
            $post["codice_fiscale"] = $this->db->escape("");


        if ($post["data_nascita"] == "")
            $post["data_nascita"] = "0000-00-00";
        else {
            //converto la data da ITA a mysql
            $post["data_nascita"] = $this->convertiData($post["data_nascita"]);

            $post["data_nascita"] = $this->db->escape(substr((string) $post["data_nascita"], 0, 20));
        }

        if ($post["luogo_nascita"] != "")
            $post["luogo_nascita"] = $this->db->escape(substr((string) $post["luogo_nascita"], 0, 200));
        else
            $post["luogo_nascita"] = $this->db->escape("");

        if ($post["dettaglio_paziente"] != "")
            $post["dettaglio_paziente"] = $this->db->escape(substr((string) $post["dettaglio_paziente"], 0, 490));
        else
            $post["dettaglio_paziente"] = $this->db->escape("");


        $alert_email = 0;
        $alert_sms = 0;
        if (isset($post["alert_email"]) && $post["alert_email"] == "alert_email")
            $alert_email = 1;
        if (isset($post["alert_sms"]) && $post["alert_sms"] == "alert_sms")
            $alert_sms = 1;

        //fine escaping
        //ottengo le categorie che si vogliono attribuire al paziente che va inserito
        //alla fine del foreach avremmo, nell'array "$array_categorie_da_assegnare" solo gli id delle categorie a cui deve appartenere questo paziente
        $array_categorie_da_assegnare = array();
        $all_categorie = $this->db->query("SELECT id_categoria FROM categorie_pazienti ");
        foreach ($all_categorie->result() as $categoria) {
            //se è vero, significa che bisogna assegnare all'utente questa categoria
            if (isset($post["cat" . $categoria->id_categoria]) && $post["cat" . $categoria->id_categoria] != "")
                $array_categorie_da_assegnare[] = (int) $categoria->id_categoria;
        }

        //modifico prima di tutto il paziente nel db
        $this->db->query("
			UPDATE pazienti
			SET nome=" . $post["nome"] . ", cognome=" . $post["cognome"] . " , email=" . $post["email"] . ", telefono=" . $post["telefono"] . ", indirizzo=" . $post["indirizzo"] . ", cap=" . $post["cap"] . ", codice_fiscale=" . $post["codice_fiscale"] . ", data_nascita=" . $post["data_nascita"] . ", luogo_nascita=" . $post["luogo_nascita"] . ", dettaglio_paziente=" . $post["dettaglio_paziente"] . ", alert_email=" . $alert_email . ", alert_sms=" . $alert_sms . "
			WHERE id=".$id_paziente." ");

        //pulisco le categorie alle quali apparteneva il paziente prima di questo aggiornamento
        $this->db->query("DELETE FROM associazioni_pazienti_categorie WHERE id_paziente=" . $id_paziente . " ");

        //registro le categorie alle quali deve appartenere
        foreach ($array_categorie_da_assegnare as $id_categoria) {
            $id_categoria = (int) $id_categoria;
            $this->db->query("INSERT INTO associazioni_pazienti_categorie ( id_paziente, id_categoria ) VALUES ( " . $id_paziente . ", " . $id_categoria . " ) ");
        }


        return true;
    }

    function search_paziente($search) {
        if ($search == false || $search == "")
            return false;

        $result = $this->db->query("SELECT * FROM pazienti WHERE nome LIKE '%" . $search . "%' OR cognome LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR telefono LIKE '%" . $search . "%' OR indirizzo LIKE '%" . $search . "%' OR data_nascita LIKE '%" . $search . "%' ");

        return $result;
    }

    function search_paziente_gestante($search) {
        if ($search == false || $search == "")
            return false;

        $result = $this->db->query("SELECT * FROM pazienti WHERE gestante=1 AND ( nome LIKE '%" . $search . "%' OR cognome LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR telefono LIKE '%" . $search . "%' OR indirizzo LIKE '%" . $search . "%' OR data_nascita LIKE '%" . $search . "%' ) ");

        return $result;
    }

    function search_paziente_infertilita($search) {
        if ($search == false || $search == "")
            return false;

        $result = $this->db->query("SELECT * FROM pazienti WHERE infertilita=1 AND ( nome LIKE '%" . $search . "%' OR cognome LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR telefono LIKE '%" . $search . "%' OR indirizzo LIKE '%" . $search . "%' OR data_nascita LIKE '%" . $search . "%' ) ");

        return $result;
    }

    function search_paziente_ginecologia($search) {
        if ($search == false || $search == "")
            return false;

        $result = $this->db->query("SELECT * FROM pazienti WHERE ginecologia=1 AND ( nome LIKE '%" . $search . "%' OR cognome LIKE '%" . $search . "%' OR email LIKE '%" . $search . "%' OR telefono LIKE '%" . $search . "%' OR indirizzo LIKE '%" . $search . "%' OR data_nascita LIKE '%" . $search . "%' ) ");

        return $result;
    }

    function get_tutti_pazienti_full() {
        return $this->db->query("SELECT * FROM pazienti ");
    }

    function get_all_pazienti() {
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('pazienti', $this->session->userdata('id_studio'));
        // return $this->db->query("SELECT id, nome, cognome, codice_fiscale FROM pazienti ");
        return $this->db->get('pazienti');
    }

    function get_all_visite() {
        return $this->db->query("
			SELECT * FROM visite
                        LEFT JOIN pazienti on pazienti.id = visite.id_paziente
		");
    }

    function get_all_visite_by_dottore($id_dottore) {
        $id_dottore = (int) $id_dottore;

        $data_partenza = date("Y-m-d");
        $data_partenza = date('Y-m-d', strtotime("-1 months", strtotime($data_partenza)));

        //escaping
        $data_partenza = $this->db->escape($data_partenza);

        return $this->db->query("SELECT * FROM visite WHERE id_dottore=" . $id_dottore . " AND data_visita >= " . $data_partenza . " ");
    }

    function get_user_id_by_string($codice_fiscale_paziente) {
        $query = $this->db->query("SELECT id FROM pazienti WHERE codice_fiscale='" . $codice_fiscale_paziente . "' ");
        $risultato = $query->result();
        if (count($risultato) > 0) {
            return $risultato[0]->id;
        }
        return -1;
    }

    function get_nome_cognome_paziente_by_id($id_paziente) {
        $query = $this->db->query("SELECT nome, cognome FROM pazienti WHERE id='" . $id_paziente . "' ");
        $risultato = $query->result();

        return $risultato[0]->nome . " " . $risultato[0]->cognome;
    }

    //scrive una visita a db
    function registra_visita($id_paziente, $id_dottore, $data_visita, $orario_visita, $descrizione) {
        //calcolo il nome del paziente
        $nome_paziente = $this->get_nome_cognome_paziente_by_id($id_paziente);

        //escaping
        $nome_paziente = $this->db->escape($nome_paziente);


        if ($descrizione == false || $descrizione == "")
            $descrizione = "";
        $descrizione = $this->db->escape($descrizione);


        $this->db->query("INSERT INTO visite (id_paziente, id_dottore, nome_paziente, data_visita, orario_visita, descrizione) VALUES ( " . $id_paziente . ", " . $id_dottore . ", " . $nome_paziente . ", '" . $data_visita . "', '" . $orario_visita . "', " . $descrizione . " ) ");
        $id = $this->db->insert_id();
        $this->db->insert('relationship_visite_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        return $id;
    }

    function get_visita_by_id_simple($id_visita) {
        return $this->db->query("
			SELECT *, visite.id as id_visita FROM visite
			WHERE visite.id=" . $id_visita . "
		");
    }

    function get_visita_by_id($id_visita) {
        return $this->db->query("
			SELECT * FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
			LEFT JOIN patologie ON visite.id_patologia=patologie.id_patologia
			LEFT JOIN farmaci ON visite.id_farmaco=farmaci.id_farmaco
			WHERE visite.id=" . $id_visita . "
		");
    }

    function get_visite_of_day($data, $id_dottore) {
        $data = $this->db->escape($data);

        return $this->db->query("SELECT * FROM visite WHERE data_visita=" . $data . " AND id_dottore=" . $id_dottore . " ORDER BY orario_visita ASC ");
    }

    function get_paziente_by_visita_id($id_visita) {
        $query = $this->db->query("SELECT * FROM visite WHERE id=" . $id_visita . " ");
        $risultato = $query->result();

        $id_paziente = $risultato[0]->id_paziente;

        return $this->db->query("SELECT * FROM pazienti WHERE id=" . $id_paziente . " ");
    }

    //ritorna tutte le visite del paziente ordinate per data ascendente
    function get_visite_paziente($id_paziente) {
        return $this->db->query("
			SELECT * FROM visite
			LEFT JOIN patologie ON visite.id_patologia=patologie.id_patologia
			LEFT JOIN farmaci ON visite.id_farmaco=farmaci.id_farmaco
			WHERE id_paziente=" . $id_paziente . " ORDER BY data_visita ASC
		");
    }

    //ritorna il numero di pagine totali per visualizzare tutte le visite, basato sul parametro $visite_per_pagina e $id_paziente
    function get_pages_visite($visite_per_pagina, $id_paziente) {
        $totale_pagine = -1;

        $query = $this->db->query("SELECT id FROM visite WHERE id_paziente=" . $id_paziente . " ");


        $totale_rows = $query->num_rows();
        $totale_pagine = (int) ($totale_rows / $visite_per_pagina);
        //gestione del riporto
        if (($totale_rows % $visite_per_pagina) != 0)
            $totale_pagine++;

        return $totale_pagine;
    }

    //ritorna i pazienti di una pagina specificata dal parametro $page (la prima pagina in assoluto è la 1)
    //colonna_ordinamento = nome della colonna sulla quale va chiamato l'ordinamento
    function get_page_visite($page, $visite_per_pagina, $colonna_ordinamento, $id_paziente) {
        if ($page == 1)
            $query = $this->db->query("SELECT visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita, prestazioni.descrizione as nome_prestazione, dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente
                        JOIN prestazioni on prestazioni.id = visite.id_prestazione WHERE id_paziente=" . $id_paziente . " ORDER BY " . $colonna_ordinamento . " DESC LIMIT " . $visite_per_pagina . " ");
        else
            $query = $this->db->query("SELECT visite.*,DATE_FORMAT(data_visita, '%d-%m-%Y') as data_visita, prestazioni.descrizione as nome_prestazione, dottori.nome as nome_dottore FROM visite
			LEFT JOIN dottori ON visite.id_dottore=dottori.id
                        LEFT JOIN pazienti ON pazienti.id=visite.id_paziente
                        JOIN prestazioni on prestazioni.id = visite.id_prestazione WHERE id_paziente=" . $id_paziente . " ORDER BY " . $colonna_ordinamento . " DESC LIMIT " . (($page - 1) * $visite_per_pagina) . "," . $visite_per_pagina . " ");

        return $query;
    }

    function delete_visita_by_id($id_visita) {
        $this->db->query("DELETE FROM visite WHERE id=" . $id_visita . " ");

        return true;
    }

    function update_visita($id_visita, $data_visita, $orario_visita, $descrizione_visita, $dettaglio_visita, $post) {
        $descrizione_visita = $this->db->escape($descrizione_visita);
        $dettaglio_visita = $this->db->escape($dettaglio_visita);
        $id_dottore = $post['id_dottore'] && $post['id_dottore'] != '' ? (integer)$post['id_dottore'] : "NULL";
        $id_prestazione = $post['id_prestazione'];
        //print_r($descrizione_visita); die();
        if ($data_visita == "") {
            //faccio update senza aggiornare la data_visita
            return $this->db->query("UPDATE visite SET id_prestazione = $id_prestazione, id_dottore = " . $id_dottore . ",orario_visita='" . $orario_visita . "', descrizione=" . $descrizione_visita . ", dettaglio=" . $dettaglio_visita . " WHERE id=" . $id_visita . " ");
        }
        if ($orario_visita == "") {
            //faccio update senza aggiornare l orario_visita
            return $this->db->query("UPDATE visite SET id_prestazione = $id_prestazione, id_dottore = " . $id_dottore . ", data_visita='" . $data_visita . "', descrizione=" . $descrizione_visita . ", dettaglio=" . $dettaglio_visita . " WHERE id=" . $id_visita . " ");
        }

        if ($data_visita != "" && $orario_visita != "") {
            return $this->db->query("UPDATE visite SET id_prestazione = $id_prestazione, id_dottore = " . $id_dottore . ",data_visita='" . $data_visita . "', orario_visita='" . $orario_visita . "', descrizione=" . $descrizione_visita . ", dettaglio=" . $dettaglio_visita . " WHERE id=" . $id_visita . " ");
        }
        return false;
    }

//fine update_visita()

    function get_visite_del_giorno_all_fields($oggi) {
        $oggi = $this->db->escape($oggi);
        $query = $this->db->query("SELECT * FROM visite WHERE data_visita=" . $oggi . " ");

        return $query;
    }

    //ritorna il numero di visite per la data passata come argomento (Y-m-d)
    function get_visite_del_giorno($oggi) {
        $oggi = $this->db->escape($oggi);
        $query = $this->db->query("SELECT id FROM visite WHERE data_visita=" . $oggi . " ");

        return $query->num_rows();
    }

    function get_visite_della_settimana($oggi, $giorno_settimana) {
        $oggi = $this->db->escape($oggi);

        //calcolo i giorni mancanti della settimana
        $mancanti_della_settimana = 0;

        if ($giorno_settimana == "Monday")
            $mancanti_della_settimana = 6;
        if ($giorno_settimana == "Tuesday")
            $mancanti_della_settimana = 5;
        if ($giorno_settimana == "Wednesday")
            $mancanti_della_settimana = 4;
        if ($giorno_settimana == "Thursday")
            $mancanti_della_settimana = 3;
        if ($giorno_settimana == "Friday")
            $mancanti_della_settimana = 2;
        if ($giorno_settimana == "Saturday")
            $mancanti_della_settimana = 1;
        if ($giorno_settimana == "Sunday")
            $mancanti_della_settimana = 0;

        // $query = $this->db->query("SELECT id FROM visite WHERE data_visita >= " . $oggi . " AND data_visita <= ( NOW() + INTERVAL " . $mancanti_della_settimana . " DAY ) ");
        $query = $this->db->query("SELECT id FROM visite JOIN relationship_pazienti_studi ON id_studio = " . $this->session->userdata('id_studio') . " WHERE data_visita >= " . $oggi . " AND data_visita <= ( NOW() + INTERVAL " . $mancanti_della_settimana . " DAY ) ");

        return $query->num_rows();
    }

//fine get_visite_della_settimana()
}
