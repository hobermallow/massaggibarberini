<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class magazzino extends CI_Controller {

    public function index() {
        //verifica della sessione
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("magazzino_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;
        if ($this->input->post()) {
            //si sta tentando di aggiungere un fornitore
            $data = $this->input->post();
            unset($data['submit']);
            if (strpos($data['prezzo_vendita'], ",")) {
                $data['prezzo_vendita'] = str_replace(",", ".", $data['prezzo_vendita']);
            }
            $view["insert_completed"] = $this->magazzino_data->set_prodotto($data) > 0;
            $view['is_update'] = isset($data['id']);
            $view["error"] = !$view["insert_completed"];
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["prodotti"] = $this->magazzino_data->get_prodotti()->result();

        $this->load->view("listaprodotti", $view);
    }

    public function delete($id_prodotto) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("magazzino_data");
        $id_prodotto = (int) $id_prodotto;
        if ($id_prodotto > 0) {
            $this->magazzino_data->delete_prodotto($id_prodotto);
        }
        redirect(base_url() . "magazzino");
    }

    public function edit($id_prodotto) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("dottori");
        $this->load->model("magazzino_data");
        if ($this->input->post()) {
            //si sta tentando di modificare un prodotto
            $data = $this->input->post();
            unset($data['submit']);
            $this->magazzino_data->set_prodotto($data) > 0;
            redirect(base_url() . "magazzino");
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["prodottoToEdit"] = $this->magazzino_data->get_prodotto($id_prodotto)->result();
        $this->load->view("edit_prodotto", $view);
    }
    
    public function view($id_prodotto) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("dottori");
        $this->load->model("magazzino_data");
        $this->load->model("carichi_data");
        
        $view["dottori"] = $this->dottori->get_all_dottori();
        $prodotto = $this->magazzino_data->get_prodotto($id_prodotto)->result();
        $view["prodottoToView"] = $prodotto[0];
        $view["carichi"] = $this->carichi_data->get_carichi_prodotto($id_prodotto)->result();
        $this->load->view("view_prodotto", $view);
    }

}
