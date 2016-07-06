<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fornitori extends CI_Controller {

    public function index() {
        //verifica della sessione
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("fornitori_data");
        $this->load->model("carichi_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;
        if ($this->input->post()) {
            //si sta tentando di aggiungere un fornitore
            $data = $this->input->post();
            unset($data['submit']);
            $view["insert_completed"] = $this->fornitori_data->set_fornitore($data) > 0;
            $view['is_update'] = isset($data['id']);
            $view["error"] = !$view["insert_completed"];
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["fornitori"] = $this->fornitori_data->get_all_fornitori()->result();

        for ($i = 0; $i < count($view['fornitori']); $i++) {
            $view['fornitori'][$i]->non_pagati = $this->carichi_data->count_non_pagate($view['fornitori'][$i]->id);
        }

        $this->load->view("listafornitori", $view);
    }

    public function delete($id_fornitore) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("fornitori_data");
        $id_fornitore = (int) $id_fornitore;
        if ($id_fornitore > 0) {
            $this->fornitori_data->delete_fornitore($id_fornitore);
        }
        redirect(base_url() . "fornitori");
    }

    public function edit($id_fornitore) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("dottori");
        $this->load->model("fornitori_data");
        if ($this->input->post()) {
            //si sta tentando di aggiungere un fornitore
            $data = $this->input->post();
            unset($data['submit']);
            $this->fornitori_data->set_fornitore($data) > 0;
            redirect(base_url() . "fornitori");
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["fornitoreToEdit"] = $this->fornitori_data->get_fornitore($id_fornitore)->result();
        $this->load->view("edit_fornitore", $view);
    }

//fine index()
}
