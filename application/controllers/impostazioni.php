<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class impostazioni extends CI_Controller {

    public function index($modifica_effettuata = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("impostazioni_data");
        $this->load->model("dottori");



        if ($modifica_effettuata == 0)
            $view["update_riuscito"] = false;
        if ($modifica_effettuata == 1)
            $view["update_riuscito"] = true;


        $view["impostazioni"] = $this->impostazioni_data->get_all_impostazioni();
        $view["impostazioniFatturazione"] = $this->impostazioni_data->get_dati_fatturazione()->result();

        $view["dottori"] = $this->dottori->get_all_dottori();

        $view["accounts"] = $this->acl->get_all_users();

        $this->load->view("impostazioni", $view);
    }

//fine index()

    public function updateimpostazioni() {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("impostazioni_data");
        $this->load->model("dottori");


        $view["error"] = false;
        $view["update_riuscito"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();

        if ($this->input->post("submit_newuser")) {
            /*
              var_dump((string)$this->input->post("username"));
              var_dump((string)$this->input->post("password"));
              var_dump((int)$this->input->post("tipoacc"));
              die();
             */

            if (((string) $this->input->post("username")) != "" && ((string) $this->input->post("password")) != "" && ( ((int) $this->input->post("tipoacc")) == 0 || ((int) $this->input->post("tipoacc")) == 1 )) {
                //allora possiamo procedere all'inserimento dell'utente
                $username = (string) $this->input->post("username");
                $password_md5 = md5((string) $this->input->post("password"));
                $tipoacc = (int) $this->input->post("tipoacc");

                $this->acl->add_user($username, $password_md5, $tipoacc);

                $view["update_riuscito"] = true;
                $view["error"] = false;
            } else {
                //errore, non si può procedere all'inserimento di un utente
                $view["update_riuscito"] = false;
                $view["error"] = true;
            }
        } else if ($this->input->post("submit")) {
            //allora il form è stato inviato
            $alert_email = $this->input->post("alert_email");
            $alert_sms = $this->input->post("alert_sms");

            if ($alert_email == "on")
                $alert_email = "on";
            else
                $alert_email = "off";

            if ($alert_sms == "on")
                $alert_sms = "on";
            else
                $alert_sms = "off";


            //eseguo aggiornamento impostazioni
            $this->impostazioni_data->updateImpostazioni($alert_email, $alert_sms);

            $view["update_riuscito"] = true;
        }

        else if ($this->input->post("dati_fatturazione_submit")) {
            $data = $this->input->post();
            array_walk($data, 'trim');
            if ($data['intestazione'] != "" && $data['indirizzo'] != "" && $data['cap'] != "" && $data['piva'] != "" && $data['comune'] != "" && $data['provincia'] != "" && $data['telefono'] != "") {
                $this->impostazioni_data->updateDatiFatturazione($data);
                $view["update_riuscito"] = true;
                $view["error"] = false;
            } else {
                //errore, non si può procedere all'inserimento di un utente
                $view["update_riuscito"] = false;
                $view["error"] = true;
            }
        }

        $view["impostazioni"] = $this->impostazioni_data->get_all_impostazioni();
        $view["impostazioniFatturazione"] = $this->impostazioni_data->get_dati_fatturazione()->result();
        

        $view["accounts"] = $this->acl->get_all_users();

        $this->load->view("impostazioni", $view);
    }

//fine updateimpostazioni()
}
