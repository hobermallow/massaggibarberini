<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class listapazienti extends CI_Controller {

    protected $g_client;
    protected $g_drive;
    protected $g_auth_url;

    public function __construct() {
        parent::__construct();

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


            $this->g_drive = new Google_Service_Drive($this->g_client);
        }//if( $this->session->userdata('g_access_token') != false )
    }

//function __construct()

    public function drive($id_paziente = 0) {
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


        $id_paziente = (int) $id_paziente;
        if ($id_paziente <= 0)
            redirect(base_url() . "listapazienti");


        //ottengo le info sul paziente
        $view["categorie_assegnate_paziente"] = $this->categorie_pazienti_data->ottieni_categorie_del_paziente($id_paziente);
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        $view["paziente"] = $this->acl->get_account_by_id($id_paziente);


        $view["google_auth_collegato"] = false;

        if ($this->session->userdata('g_access_token') != false) {
            $view["google_auth_collegato"] = true;


            //controllo se esiste la cartella del paziente su drive...
            $ricerca_folder = $this->google_drive->search_folder($this->g_drive, "paziente_" . $id_paziente);
            if ($ricerca_folder == false) {
                //allora non esiste ancora la cartella dell'utente corrente...
                $folder = $this->google_drive->crea_folder_nella_root($this->g_drive, "paziente_" . $id_paziente);
            } else {
                //allora la cartella di questo utente esiste e devo ottenerne i dati...
                $folder = $this->google_drive->search_folder($this->g_drive, "paziente_" . $id_paziente);
            }

            //print_r($folder->id); die();
            //CONTROLLO E GESTIONE DELL'UPLOAD DI UN FILE
            $view["upload_fallito"] = false;
            if ($this->input->post()) {
                $config_upload['upload_path'] = './uploads_temp/';
                $config_upload['allowed_types'] = '*';
                $config_upload['max_size'] = '10000';

                $this->upload->initialize($config_upload);

                if (!$this->upload->do_upload("file")) {
                    //upload fallito
                    $view["upload_fallito"] = true;
                    $view["errore_upload"] = $this->upload->display_errors();
                } else {
                    //upload riuscito
                    $file_data = $this->upload->data();

                    //posso caricare il file su drive
                    $file_creato_drive = $this->google_drive->insert_file($this->g_drive, $file_data["orig_name"], "", $file_data["full_path"], $folder->id);

                    //posso eliminare il file temporaneo uploadato
                    unlink($file_data["full_path"]);
                }
            }
            //FINE CONTROLLO E GESTIONE DELL'UPLOAD DI UN FILE
            //ottengo la lista di files nella sua folder...
            $view["files"] = $this->google_drive->list_files($this->g_drive, $folder->id);
        }//if( $this->session->userdata('g_access_token') != false )

        $this->load->view("drivepaziente", $view);
    }

//public function drive

    public function deletedrivefile($id_paziente, $file_id = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }


        $view["error"] = false;
        $view["registrazione_avvenuta"] = false;
        $view["delete_avvenuto"] = false;

        //$view["dottori"] = $this->dottori->get_all_dottori();


        $view["google_auth_collegato"] = false;

        //var_dump($file_id); //die();

        if ($this->session->userdata('g_access_token') != false && $file_id !== 0) {
            $view["google_auth_collegato"] = true;

            //elimino il file indicato
            $file_id = (string) $file_id;
            $this->google_drive->elimina_file($this->g_drive, $file_id);

            redirect(base_url() . "listapazienti/drive/" . $id_paziente);
        }//if( $this->session->userdata('g_access_token') != false )
        else
            redirect(base_url() . "userdrive");
    }

//public function deletedrivefile

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



        $view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);

        $view["dottori"] = $this->dottori->get_all_dottori();

        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        //pazienti della pagina 1
        $view["pazienti"] = $this->pazienti->get_page_pazienti(1, 20, "cognome");
        $view["current_categorie_pazienti"] = $this->categorie_pazienti_data->get_categorie_by_query_pazienti($view["pazienti"]);

        $view["pagina_attuale"] = 1;

        //Azzero i filtri di ricerca
        //per evitare comportamenti indefiniti
        $view['filtro_categoria_pazienti'] = 0;
        $view['filtro_nome'] = "";
        $view['filtro_cognome'] = "";
        $view['filtro_luogo_nascita'] = "";
        $view['filtro_indirizzo'] = "";
        $view['filtro_codice_fiscale'] = "";
        $view['filtro_telefono'] = "";
        $view['filtro_email'] = "";


        $this->load->view("listapazienti", $view);
    }

    //fine index()
    //visualizza la lista dei pazienti in pase al numero di pagina passato come argomento
    public function view($page = 0) {
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


        $view["pagine_totali"] = $this->pazienti->get_pages_pazienti(20);

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        //pazienti della pagina scelta
        if ($page != 0) {
            $view["pazienti"] = $this->pazienti->get_page_pazienti($page, 20, "cognome");

            $view["pagina_attuale"] = $page;
        }

        //l'utente potrebbe aver selezionato la pagina manualmente...
        if ($page == 0) {
            if ($this->input->post("numero_pagina") == false) {
                $this->load->helper('url');
                redirect(base_url() . "listapazienti");
            } else {
                //l'utente ha selezionato la pagina manualmente
                if ($this->input->post("numero_pagina") > $view["pagine_totali"] || $this->input->post("numero_pagina") < 1) {
                    //il numero della pagina non è valido...
                    $this->load->helper('url');
                    redirect(base_url() . "listapazienti");
                } else {
                    //tutto è corretto...devo visualizzare la pagina richiesta...
                    $view["pazienti"] = $this->pazienti->get_page_pazienti($this->input->post("numero_pagina"), 20, "cognome");

                    $view["pagina_attuale"] = $this->input->post("numero_pagina");
                }
            }
        }


        $this->load->view("listapazienti", $view);
    }

    //fine view()
    //modifica un paziente
    public function edit($id = -1, $pagina = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        //Controllo id del paziente
        $id_edit = (int) $id;
        if ($id_edit == -1) {
            //errore
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }


        //Inizializzazione variabili controllo
        //errori e modifica avvenuta
        $view["errore"] = false;
        $view["modifica_avvenuta"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();


        //se è stato inviato il form di editing delle info del paziente...
        //Submit collegato al tasto Salva
        if ($this->input->post("submit") != false) {
            $this->pazienti->modifica_paziente($id_edit, $this->input->post());
            $view["errore"] = false;
            $view["modifica_avvenuta"] = true;
        }


        //ottengo i dati attuali del paziente dopo anche un'eventuale modifica dei dati
        ////ritorna l'array con gli id di tutte le categorie assegnate al paziente passato come argomento
        $view["categorie_assegnate_paziente"] = $this->categorie_pazienti_data->ottieni_categorie_del_paziente($id_edit);
        $query_user = $this->pazienti->get_paziente_by_id($id_edit);
        $view["user"] = $query_user->result();



        //paginazione
        $pagina = (int) $pagina;
        if ($pagina == 0 || $pagina == "") {
            if ($this->input->post("numero_pagina")) {
                //significa che il numero della pagina è stato specificato usando il form per andare direttamente ad una pagina
                $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);

                $pagina = (int) $this->input->post("numero_pagina");

                if ($pagina > $view["pagine_totali"] || $pagina < 1) {
                    //il numero della pagina non è valido...
                    $this->load->helper('url');
                    redirect(base_url() . "listapazienti/edit/" . $id); //redirect all'edit del paziente
                } else {
                    //tutto è corretto...devo visualizzare la pagina richiesta...
                    $view["visite"] = $this->pazienti->get_page_visite($pagina, 20, "data_visita", $id);

                    $view["pagina_attuale"] = $pagina;
                }
            } else {
                //la pagina non è stata specificata, quindi printo la pagina 1
                $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);

                //visite del paziente selezionato
                $view["visite"] = $this->pazienti->get_page_visite(1, 20, "data_visita", $id);

                $view["pagina_attuale"] = 1;
            }
        } else {
            //significa che è stata specificata una pagina, printo quella specifica pagina

            $view["pagine_totali"] = $this->pazienti->get_pages_visite(20, $id);
            //visite del paziente selezionato
            $view["visite"] = $this->pazienti->get_page_visite($pagina, 20, "data_visita", $id);
            $view["pagina_attuale"] = $pagina;
        }
        $this->load->model('preventivi_data');
        //fine paginazione
        $view['preventivi'] = $this->preventivi_data->get_preventivi($id)->result();
        $this->load->view("editpaziente", $view);
    }

    //fine edit()
    //elimina un paziente
    public function delete($id = -1, $conferma = 0) {
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


        $view["delete_successful"] = false;

        //controllo validità id
        $id_delete = (int) $id;
        if ($id_delete == -1) {
            //errore
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }

        $this->load->model("pazienti");
        $this->load->model("dottori");

        $view["dottori"] = $this->dottori->get_all_dottori();

        if ($conferma == 1) {
            if ($this->pazienti->elimina_paziente($id_delete) == true)
                $view["delete_successful"] = true;
        }

        //prelevo i dati del paziente
        $query = $this->pazienti->get_paziente_by_id($id_delete);
        $view["paziente"] = $query->result();


        $view["conferma"] = $conferma; //se conferma è 0 bisogna chiedere la conferma nella view


        $this->load->view("deletepaziente", $view);
    }

    //fine delete()


    public function search() {
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

        //ottengo la stringa di ricerca da post
        $ricerca = $this->input->post("ricerca");
        if ($ricerca == false) {
            //errore...
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }

        $view["ricerca_search"] = true; //indica alla view che è in corso una ricerca con chiave

        $query = $this->pazienti->search_paziente($ricerca);

        $view["pazienti"] = $query;


        $this->load->view("listapazienti", $view);
    }

    //fine search()

    public function editvisita($id_visita = 0) {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        //controllo id_visita
        $id_visita = (int) $id_visita;
        if ($id_visita == 0) {
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }

        $this->load->model("pazienti");
        $this->load->model("visite_data");
        $this->load->model("dottori");


        $view["prestazioni"] = $this->dottori->get_prestazioni();
        $view["visita"] = $this->pazienti->get_visita_by_id_simple($id_visita);
        $view["prodotti"] = $this->visite_data->get_prodotti_visita($id_visita)->result();

        $view["paziente"] = $this->pazienti->get_paziente_by_visita_id($id_visita);

        $view["dottori"] = $this->dottori->get_all_dottori();



        $this->load->view("editvisita", $view);
    }

    public function updatevisita() {
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


        //debug only
        //print_r($this->input->post()); die();
        //end debug only



        $view["error"] = false;

        $view["dottori"] = $this->dottori->get_all_dottori();

        if ($this->input->post("ora_visita") && $this->input->post("id")) {

            //i valori del post sono corretti
            //converto la data in formato compatibile con mysql
            $data_visita = $this->input->post("data_visita");
            if ($data_visita != false && $data_visita != "") {
                $data_visita = str_replace("/", "-", $data_visita);
                $data_visita = date('Y-m-d', strtotime($data_visita));
            }

            $ora_visita = $this->input->post("ora_visita");
            $descrizione_visita = $this->input->post("descrizione_visita");
            $dettaglio_visita = $this->input->post("dettaglio_visita");


            if ($ora_visita == false || $ora_visita == "") {
                //form non completato correttamente...
                $view["error"] = true;
            } else {
                //tutto è corretto

                $id_visita = (int) $this->input->post("id");

                $this->pazienti->update_visita($id_visita, $data_visita, $ora_visita, $descrizione_visita, $dettaglio_visita, $this->input->post());

                //ottengo il paziente dall'id della visita...
                $view["paziente"] = $this->pazienti->get_paziente_by_visita_id($id_visita);
                $paziente_corrente = $view["paziente"]->result();

                $view["error"] = false;

                $this->load->helper('url');
                redirect(base_url() . "listapazienti/edit/" . $paziente_corrente[0]->id);
            }
        } else {
            //c'è stato un errore
            $view["error"] = true;
        }

        $this->load->view("updatevisita", $view);
    }

//fine updatevisita()
    //gestione dei filtri avanzati
    public function filtriavanzati() {
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
        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        $view["ricerca_search"] = true; //indica alla view che è in corso una ricerca con chiave

        if ($this->input->post() == false) {
            //se non è arrivato nnt dal post questa pagina non deve essere possibile
            $this->load->helper('url');
            redirect(base_url() . "listapazienti");
        }

        //procedo ad ottenere tutti i filtri
        $view["filtro_categoria_pazienti"] = (int) $this->input->post("categoria_pazienti");
        $view["filtro_nome"] = (string) $this->input->post("nome");
        $view["filtro_cognome"] = (string) $this->input->post("cognome");
        $view["filtro_luogo_nascita"] = (string) $this->input->post("luogo_nascita");
        $view["filtro_indirizzo"] = (string) $this->input->post("indirizzo");
        $view["filtro_codice_fiscale"] = (string) $this->input->post("codice_fiscale");
        $view["filtro_telefono"] = (string) $this->input->post("telefono");
        $view["filtro_email"] = (string) $this->input->post("email");



        $this->load->view("listapazienti", $view);
    }

//fine filtriavanzati()

    public function esegui_query_pazienti() {
        //debug only
        //sleep(5);
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            return -1;
        }

        if ($this->input->post() == false) {
            //se non è arrivato nnt dal post questa pagina non deve essere possibile
            return -1;
        }


        $view["all_categorie_pazienti"] = $this->categorie_pazienti_data->get_all_categorie_pazienti();

        $view["pazienti"] = $this->pazienti->ajax_query_pazienti($this->input->post());
        $view["current_categorie_pazienti"] = $this->categorie_pazienti_data->get_categorie_by_query_pazienti_array($view["pazienti"]);

        foreach ($view["pazienti"] as $row) {
            echo '<tr>';
            echo '<td>';
            if (isset($view["current_categorie_pazienti"][$row->id]))
                echo $view["current_categorie_pazienti"][$row->id]["nome_categoria"];
            echo '</td>';

            echo '<td>';
            echo $row->cognome;
            echo '</td>';

            echo '<td>';
            echo $row->nome;
            echo '</td>';

            echo '<td>';
            echo $row->luogo_nascita;
            echo '</td>';

            echo '<td>';
            echo date('d-m-Y', strtotime($row->data_nascita));
            echo '</td>';

            echo '<td>';
            echo $row->indirizzo;
            echo '</td>';

            echo '<td>';
            echo $row->codice_fiscale;
            echo '</td>';

            echo '<td>';
            echo $row->telefono;
            echo '</td>';

            echo '<td>';
            echo $row->email;
            echo '</td>';


            echo '<td class="numeric" style="text-align: center;" >';

            echo '<a href="' . base_url() . 'listapazienti/edit/' . $row->id . '" title="Modifica" class="btn red" >';
            echo '<i class="fa fa-edit"></i>';
            echo '</a>';

            echo '<a href="' . base_url() . 'listapazienti/delete/' . $row->id . '" title="Elimina" class="btn purple" >';
            echo '<i class="fa fa-times"></i>';
            echo '</a>';

            echo '</td>';

            echo '</tr>';
        }
    }

//public function esegui_query_associati

    public function autocomplete_farmaci() {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $results_array = array();


        $search = (string) $this->input->get("term");


        $query_result = $this->pazienti->search_farmaco($search);

        //assemblo correttamente i contenuti per farli leggere al jQuery
        foreach ($query_result->result() as $farmaco) {
            $results_array[] = array(
                "label" => $farmaco->nome_farmaco,
                "value" => $farmaco->nome_farmaco,
                "id" => $farmaco->id_farmaco,
            );
        }//foreach


        echo json_encode($results_array);
    }

//public function autocomplete_farmaci

    public function autocomplete_patologie() {
        //verifica della sessione
        $this->load->model("acl");
        $session_rserial = $this->session->userdata('rserial');
        $view["username"] = $this->session->userdata("username");
        if ($this->acl->VerificaSessione($session_rserial) == false) {
            $this->load->helper('url');
            $login_url = base_url();
            redirect($login_url . "login/info?c=error");
        }

        $results_array = array();


        $search = (string) $this->input->get("term");


        $query_result = $this->pazienti->search_patologia($search);

        //assemblo correttamente i contenuti per farli leggere al jQuery
        foreach ($query_result->result() as $patologia) {
            $results_array[] = array(
                "label" => $patologia->nome_patologia,
                "value" => $patologia->nome_patologia,
                "id" => $patologia->id_patologia,
            );
        }//foreach


        echo json_encode($results_array);
    }

//public function autocomplete_patologie
}
