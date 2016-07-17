<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class user extends CI_Controller {

    public function index() {

        $this->load->model("pazienti");
        $this->load->model("carichi_data");
        $view["error"] = false;

        if ($this->input->post("search")) {
            //si sta tentando di aggiungere un carico
            $data = $this->input->post();
            $id = $this->pazienti->get_user_id_by_string($data['codice_fiscale']);
            if ($id > 0) {
                redirect(base_url() . "user/view/" . $id);
            } else {
                $view["error"] = "Utente non trovato";
            }
        } else if ($this->input->post("save")) {
            $id = $this->pazienti->get_user_id_by_string($this->input->post('codice_fiscale'));
            if ($id > 0) {
                $view["error"] = "Utente già registrato";
            } else {
                $view["paziente_salvato"] = $this->pazienti->add_paziente($this->input->post());
                if ($view["paziente_salvato"] == false)
                    $view["error"] = true;
            }
        }
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        $this->load->view("user", $view);
    }
    public function view($id = -1, $pagina = 0) {
        $id_edit = (int) $id;
        if ($id_edit == -1) {
            redirect(base_url() . "user");
        }
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        $view["categorie_assegnate_paziente"] = $this->categorie_pazienti_data->ottieni_categorie_del_paziente($id_edit);
        $query_user = $this->acl->get_account_by_id($id_edit);
        $view["user"] = $query_user->result();
        if ($pagina == 0 || $pagina == "") {
            if ($this->input->post("numero_pagina")) {
                //significa che il numero della pagina è stato specificato usando il form per andare direttamente ad una pagina
                $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);

                $pagina = (int) $this->input->post("numero_pagina");

                if ($pagina > $view["pagine_totali"] || $pagina < 1) {
                    //il numero della pagina non è valido...
                    $this->load->helper('url');
                    redirect(base_url() . "user/view/" . $id); //redirect all'edit del paziente
                } else {
                    //tutto è corretto...devo visualizzare la pagina richiesta...
                    $view["visite"] = $this->pazienti->get_page_visite($pagina, 20, "data_visita", $id);

                    $view["pagina_attuale"] = $pagina;
                }
            } else {
                //la pagina non è stata specificata, quindi printo la pagina 1
                $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);

                //visite del paziente selezionato
                $view["visite"] = $this->pazienti->get_page_visite(1, 20, "data_visita", $id);

                $view["pagina_attuale"] = 1;
            }
        } else {
            //significa che è stata specificata una pagina, printo quella specifica pagina

            $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);

            //visite del paziente selezionato
            $view["visite"] = $this->pazienti->get_page_visite($pagina, 20, "data_visita", $id);

            $view["pagina_attuale"] = $pagina;
        }
        //fine paginazione

        $this->load->view("user_view", $view);
    }
    
}
