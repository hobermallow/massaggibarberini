<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class costi extends CI_Controller {

    public function index($startDateParam = "", $endDateParam = "") {
        //verifica della sessione
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        $startDate = new DateTime();
        $endDate = new DateTime();
        if ($startDateParam) {
            $startDate = new DateTime($startDateParam);
        }

        if ($endDateParam) {
            $endDate = new DateTime($endDateParam);
        }


        $this->load->model("carichi_data");
        $this->load->model("preventivi_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;

        $view['start'] = $startDate->format("d-m-Y");
        $view['end'] = $endDate->format("d-m-Y");

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["costi"] = $this->statistiche_data->get_costi_by_date($startDate->format("Y-m-d"), $endDate->format("Y-m-d"));
        $view["pagato"] = $this->preventivi_data->get_all_preventivi_by_date($startDate->format("Y-m-d"), $endDate->format("Y-m-d"), 1)->result();
        //$view["non_pagato"] = $this->statistiche_data->get_totale_non_pagato();

        $this->load->view("costi", $view);
    }

//fine index()
}
