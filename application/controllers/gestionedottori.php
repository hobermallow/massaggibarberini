<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class gestionedottori extends CI_Controller {

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


        $this->load->model("dottori");

        $view["error"] = false;
        $view["registrazione_avvenuta"] = false;
        $view["delete_avvenuto"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();

        if ($this->input->post()) {
            //è stato inviato il form di registrazione di un dottore
            $nome = $this->input->post("nome");
            $dettagli = $this->input->post("dettagli");
            $telefono = $this->input->post("telefono");
            $email = $this->input->post("email");
            $orari_settimanali = $this->input->post("orari_settimanali");

            if ($nome != "") {
                $this->dottori->add_dottore($nome, $dettagli, $telefono, $email, $orari_settimanali);
                $view["registrazione_avvenuta"] = true;
            } else {
                $view["error"] = true;
                $view["registrazione_avvenuta"] = false;
            }
        }

        $view["dottori"] = $this->dottori->get_all_dottori();

        $this->load->view("gestionedottori", $view);
    }

//fine index()

    public function delete($id_dottore = 0) {

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


        $this->load->model("dottori");



        $id_dottore = (int) $id_dottore;
        if ($id_dottore == 0) {
            $this->load->helper('url');
            redirect(base_url() . "dashboard");
        }


        $view["delete_avvenuto"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();

        $view["dottore_da_eliminare"] = $this->dottori->get_dottore_by_id($id_dottore);

        //$this->dottori->delete_dottore( $id_dottore );

        $view["delete_avvenuto"] = true;

        $this->load->view("confermaeliminazionedottore", $view);
    }

//fine delete()

    public function conferma_eliminazione($id_dottore = 0) {
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


        $this->load->model("dottori");

        $id_dottore = (int) $id_dottore;
        if ($id_dottore == 0) {
            $this->load->helper('url');
            redirect(base_url() . "dashboard");
        } else {
            $this->dottori->delete_dottore($id_dottore);

            $this->load->helper('url');
            redirect(base_url() . "gestionedottori");
        }
    }

//fine conferma_eliminazione()
    //modifica un dottore
    public function edit($id = -1) {
        $this->load->model("pazienti");
        $this->load->model("dottori");

        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $id_edit = (int) $id;
        if ($id_edit == -1) {
            //errore
            $this->load->helper('url');
            redirect(base_url() . "gestionedottori");
        }



        $view["errore"] = false;
        $view["modifica_avvenuta"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();

        $query_user = $this->dottori->get_dottore_by_id($id_edit);
        $view['fatture'] = $this->dottori->get_fatture_dottore($id_edit)->result();
        $view["dottore_edit"] = $query_user->result();
        
        //se è stato inviato il form di editing delle info del paziente...
        if ($this->input->post("submit") != false) {
            //ottengo tutti i valori dal post
            $nome = $this->input->post('nome');
            $dettagli = $this->input->post('dettagli');
            $telefono = $this->input->post("telefono");
            $email = $this->input->post("email");
            $orari_settimanali = $this->input->post("orari_settimanali");

            if ($this->dottori->modifica_dottore($id_edit, $nome, $dettagli, $telefono, $email, $orari_settimanali) == false)
                $view["errore"] = true;
            else {
                $this->load->helper('url');
                redirect(base_url() . "gestionedottori");
            }
        }
        $this->load->view("editdottore", $view);
    }
    
    public function caricaFattura(){
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        
        $this->load->model("dottori");
        if($this->input->post() && $_FILES['filename']){
            var_dump("ok");
            $data = $this->input->post();
            $target_dir = "./fatture_dottori/" . $data['id_dottore'] . "/";
            if (!file_exists($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $target_file = $target_dir . basename($_FILES["filename"]["name"]);
            var_dump($target_file);
            if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
                return $this->dottori->carica_fattura($_FILES["filename"]["name"], $data);
            }
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function prestazioni() {
        $this->load->model("dottori");

        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["prestazioni"] = $this->dottori->get_prestazioni()->result();
        $this->load->view("listaprestazioni", $view);
    }

    public function editprestazione($id_prestazione = 0) {
        $this->load->model("dottori");

        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        if ($this->input->post()) {
            $id_prestazione = $this->dottori->set_prestazione($this->input->post());
            if ($id_prestazione > 0) {
                //$this->session->flashdata('error')
                $this->session->set_flashdata('message', "Prestazione " . ($this->input->post("id") ? "modificata" : "inserita") . " con successo.");
                redirect(base_url() . "gestionedottori/prestazioni");
            }
        }
        if ($id_prestazione > 0) {
            $view["dottori"] = $this->dottori->get_all_dottori();
            $view["prestazione"] = $this->dottori->get_prestazione_by_id($id_prestazione)->result()[0]; {
                $this->load->view("edit_prestazione", $view);
            }
        }
    }

    public function deleteprestazione($id) {
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        if ((int) $id > 0) {
            $this->load->model("dottori");
            $this->dottori->delete_prestazione($id);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function getprestazioni() {
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            echo json_encode(array("error" => 1));
            exit();
        }
        $this->load->model("dottori");
        echo json_encode($this->dottori->get_prestazioni()->result());
    }

}
