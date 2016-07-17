<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class fatture extends CI_Controller {
    protected $g_client;
    
    
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

        $view["dottori"] = $this->dottori->get_all_dottori();
        //$view["carichi"] = $this->carichi_data->get_all_carichi()->result();

        $this->load->view("listacarichi", $view);
    }

    public function generaFattura($idPreventivo) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->helper('pdf_helper');
        $this->load->model("impostazioni_data");
        $this->load->model("preventivi_data");
        $view["datiFatturazione"] = $this->impostazioni_data->get_dati_fatturazione()->result();
        $view["datiPreventivo"] = $this->preventivi_data->get_preventivo($idPreventivo)->result();
        init_library_pdf();
        $view["type"] = "I";

        $this->load->view("pdfinvoice", $view);
    }

    public function generaFatturaECarica($idPreventivo) {
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $this->load->helper('pdf_helper');
        $this->load->model("impostazioni_data");
        $this->load->model("preventivi_data");
        $view["datiFatturazione"] = $this->impostazioni_data->get_dati_fatturazione()->result();
        $view["datiPreventivo"] = $this->preventivi_data->get_preventivo($idPreventivo)->result();
        $view["type"] = "FI";
        init_library_pdf();

        $this->load->view("pdfinvoice", $view);
        $filePath = FCPATH . "/assets/fattura-" . $view["datiVisita"][0]->data_visita . ".pdf";
        if (file_exists($filePath)) {
            if ($this->session->userdata('g_access_token') != false) {
                //inizializzo le API Google PHP
                $client_id = $this->config->item('google_drive_client_id');
                $client_secret = $this->config->item('google_drive_secret');
                $redirect_uri = $this->config->item('google_drive_redirect_uri');
                $this->g_client = new Google_Client();
                $this->g_client->setClientId($client_id);
                $this->g_client->setClientSecret($client_secret);
                $this->g_client->setRedirectUri($redirect_uri);

                $this->g_client->setScopes(array(
                    'https://www.googleapis.com/auth/userinfo.email',
                    'https://www.googleapis.com/auth/drive'
                ));

                $this->g_client->setAccessType('offline');

                $authUrl = $this->g_client->createAuthUrl();

                //print_r($this->session->userdata('g_access_token')); die();

                $this->g_client->setAccessToken($this->session->userdata('g_access_token'));

                //controllo che il token sia ancora valido
                //$token_json = json_decode( $this->g_client->getAccessToken() );


                if ($this->g_client->isAccessTokenExpired()) {
                    //token scaduto, effettuo il refresh
                    //$this->g_client->refreshToken($token_json);
                    //$this->g_client->refreshToken( $this->session->userdata('g_refresh_token') );

                    $this->session->unset_userdata('g_access_token');

                    redirect($authUrl);

                    //$this->session->set_userdata('g_access_token' , $this->g_client->getAccessToken() );
                }


                $g_drive = new Google_Service_Drive($this->g_client);
                $ricerca_folder = $this->google_drive->search_folder($g_drive, "fatture");
                if ($ricerca_folder == false) {
                    $ricerca_folder = $this->google_drive->crea_folder_nella_root($g_drive, "fatture");
                }
                $this->google_drive->insert_file($g_drive, basename($filePath), "", $filePath, $ricerca_folder->id);

                //posso eliminare il file temporaneo uploadato
                unlink($filePath);
            }
        }
    }

//fine index()
}
