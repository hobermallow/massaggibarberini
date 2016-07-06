<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class carichi extends CI_Controller {

    public function index() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("carichi_data");
        $this->load->model("dottori");

        $view["error"] = false;
        $view["insert_completed"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["carichi"] = $this->carichi_data->get_all_carichi()->result();

        $this->load->view("listacarichi", $view);
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

    public function insert() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("dottori");
        $this->load->model("carichi_data");
        $this->load->model("fornitori_data");
        $this->load->model("magazzino_data");
        if ($this->input->post()) {
            $data = $this->input->post();
            unset($data['submit']);
            if (strpos($data['prezzo_acquisto'], ",")) {
                $data['prezzo_acquisto'] = str_replace(",", ".", $data['prezzo_acquisto']);
            }
            $id = $this->carichi_data->set_carico($data);
            if ($id > 0) {
                $this->magazzino_data->update_quantita($data['id_prodotto'], $data['quantita']);
                redirect(base_url() . "carichi");
            }
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["prodotti"] = $this->magazzino_data->get_prodotti()->result();
        $view["fornitori"] = $this->fornitori_data->get_all_fornitori()->result();
        $this->load->view("insert_carico", $view);
    }

    public function edit($id = -1) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("dottori");
        $this->load->model("carichi_data");
        $this->load->model("fornitori_data");
        $this->load->model("magazzino_data");

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["prodotti"] = $this->magazzino_data->get_prodotti()->result();
        $view["fornitori"] = $this->fornitori_data->get_all_fornitori()->result();
        $this->load->model("carichi_data");

        $id_carico = (int) $id;
        if ($id_carico > 0) {
            $view["carico"] = $this->carichi_data->get_carico($id_carico)->result()[0];
        }

        if ($this->input->post()) {
            $data = $this->input->post();

            $oldQuant = $data['old_quantita'];
            unset($data['old_quantita']);
            unset($data['submit']);
            if (strpos($data['prezzo_acquisto'], ",")) {
                $data['prezzo_acquisto'] = str_replace(",", ".", $data['prezzo_acquisto']);
            }
            $id = $this->carichi_data->set_carico($data);
            if ($id > 0) {
                $data['quantita'] = $data['quantita'] - $oldQuant;
                $this->magazzino_data->update_quantita($data['id_prodotto'], $data['quantita']);
                redirect(base_url() . "carichi");
            }
        }

        $this->load->view("edit_carico", $view);
    }

    public function togglePagato($id) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("carichi_data");

        $this->carichi_data->toggle_stato($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function fattura() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        if ($this->input->post() && $_FILES['fattura']) {
            $data = $this->input->post();
            $this->load->model("carichi_data");
            if (!file_exists("fatture/" . $data['id'])) {
                mkdir("fatture/" . $data['id'] . "/", 0777, true);
            }
            if (move_uploaded_file($_FILES['fattura']['tmp_name'], "fatture/" . $data['id'] . "/" . $_FILES['fattura']['name'])) {
                $this->carichi_data->set_fattura($_FILES['fattura']['name'], $data['id']);
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function eliminaFattura($id_carico, $filename) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("carichi_data");
        $id_carico = (int) $id_carico;
        if(file_exists("fatture/$id_carico/$filename")){
            unlink("fatture/$id_carico/$filename");
        }
        if ($id_carico > 0) {
            $this->carichi_data->set_fattura("", $id_carico);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

}
