<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class visite extends CI_Controller {

    public function index() {
        //verifica della sessione
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("visite_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["visite"] = $this->visite_data->get_all_visite()->result();

        $this->load->view("listavisite", $view);
    }

    public function delete($id_carico) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("carichi_data");
        $id_carico = (int) $id_carico;
        if ($id_carico > 0) {
            $this->carichi_data->delete_carico($id_carico);
        }
        redirect(base_url() . "carichi");
    }
    
    public function sospese() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("visite_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["visite"] = $this->visite_data->get_visite_sospese()->result();

        $this->load->view("visitesospese", $view);
    }

}
