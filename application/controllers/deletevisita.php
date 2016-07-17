<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class deletevisita extends CI_Controller {

    public function index() {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("pazienti");
        $this->load->model("dottori");

        $view["dottori"] = $this->dottori->get_all_dottori();
    }

    //richiede la conferma per l'eliminazione di una visita con l'id passato
    public function delete($id_visita = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        //controllo privilegi
        $tipo_account = $this->session->userdata('tipoacc');
        if ($tipo_account == 1) {
            //non si hanno i permessi necessari per accedere alla funzionalità corrente
            $this->load->helper('url');
            redirect(base_url() . "noprivilegi");
        }

        $this->load->model("pazienti");
        $this->load->model("dottori");

        $id_visita = (int) $id_visita;
        if ($id_visita == 0 || $id_visita < 1) {
            //errore...
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }



        $view["visita"] = $this->pazienti->get_visita_by_id_simple($id_visita);

        $view["paziente"] = $this->pazienti->get_paziente_by_visita_id($id_visita);

        $view["dottori"] = $this->dottori->get_all_dottori();

        $this->load->view("deletevisita", $view);
    }

//fine delete()

    public function confermadelete($id_visita = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        //controllo privilegi
        $tipo_account = $this->session->userdata('tipoacc');
        if ($tipo_account == 1) {
            //non si hanno i permessi necessari per accedere alla funzionalità corrente
            $this->load->helper('url');
            redirect(base_url() . "noprivilegi");
        }

        $id_visita = (int) $id_visita;
        if ($id_visita == 0 || $id_visita < 1) {
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }

        $this->load->model("pazienti");
        $this->load->model("dottori");

        $view["visita_eliminata"] = $this->pazienti->delete_visita_by_id($id_visita);

        $view["dottori"] = $this->dottori->get_all_dottori();


        $this->load->view("confermadeletevisita", $view);
    }

//fine confermadelete()
}
