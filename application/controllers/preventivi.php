<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class preventivi extends CI_Controller {

    public function index($stato = -1) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("preventivi_data");
        $this->load->model("dottori");

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["visite"] = $this->preventivi_data->get_preventivi()->result();
        $view["stato_selected"] = $stato;

        $this->load->view("listapreventivi", $view);
    }

    public function insert() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("magazzino_data");
        $this->load->model("dottori");
        $this->load->model("pazienti");

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["pazienti"] = $this->pazienti->get_all_pazienti()->result();
        $view["prodotti"] = $this->magazzino_data->get_prodotti()->result();

        $this->load->view("nuovopreventivo", $view);
    }

    public function accetta() {
        if ($this->input->post()) {
            $success = -1;
            //si sta tentando di aggiungere un carico
            $arrayData = $this->input->post();
            $visite = $arrayData['visite'];

            $this->load->model("visite_data");
            $this->load->model("preventivi_data");
            $this->load->model("magazzino_data");
            if (strpos($arrayData['totale'], ",")) {
                $arrayData['totale'] = str_replace(",", ".", $arrayData['totale']);
            }
            $idPreventivo = $this->preventivi_data->set_preventivo(array("totale" => $arrayData['totale'], "sconto" => $arrayData['sconto'], "id_paziente" => $visite[0]['paziente']));

            /*ZONA DI CODICE CHE INSERISCE UNA VISTIA SENZA DOTTORE
            PER IL PREVENTIVO FATTO...MA PERCHE ??? */

            foreach ($visite as $data) {
                $visitaData = array("id_preventivo" => $idPreventivo);
                //$visitaData['id_dottore'] = $data['dottore'];
                $visitaData['descrizione'] = isset($data['descrizione']) ? $data['descrizione'] : "";
                $visitaData['id_paziente'] = $data['paziente'];
                $visitaData['id_prestazione'] = $data['id_prestazione'];
                /* $visitaData['orario_visita'] = $data['ora_visita'];
                  $date = "";
                  if (isset($data['data_visita']) && $data['data_visita'] != "") {
                  $date = DateTime::createFromFormat("d/m/Y", $data['data_visita']);
                  $date = $date->format("Y-m-d");
                  }
                  $visitaData['data_visita'] = $date; */
              //  try {
                    //$idVisita = $this->visite_data->set_visita($visitaData);
                    //if ($idVisita > 0) {
                        /* if (isset($data['prodotti']) && is_array($data['prodotti'])) {
                          foreach ($data['prodotti'] as $prodotto) {
                          $prodottoVisitaData = array();
                          $prodottoVisitaData['id_prodotto'] = $prodotto['id'];
                          $prodottoVisitaData['id_visita'] = $idVisita;
                          $prodottoVisitaData['quantita'] = $prodotto['quantita'];
                          $prodottoVisitaData['prezzo_vendita'] = $prodotto['prezzo'];
                          $this->magazzino_data->update_quantita($prodotto['id'], -$prodotto['quantita']);
                          $this->visite_data->set_prodotto_visita($prodottoVisitaData);
                          }
                          } */
                        $success = 1;
                //    }
                // } catch (Exception $e) {
                //     $success = -1;
                // }
                // if ($success == -1) {
                //     break;
                // }
            }

            echo json_encode(array("success" => $success));
        }
    }

    public function togglePagato() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        $this->load->model("preventivi_data");
        $this->preventivi_data->toggle_stato($this->input->post());
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function pagamentoParziale() {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }
        if ($this->input->post()) {
            $this->load->model("preventivi_data");
            $this->preventivi_data->pagamento_parziale($this->input->post());
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function delete($id) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->model("preventivi_data");

        $this->preventivi_data->delete_preventivo($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

//fine index()
}
