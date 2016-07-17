<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//descrive un utente generico
class utente
{
	//attributi
	public $id = -1; //l'id dell'utente
	public $username = "";
	public $tipo_account = -1;
}

class Acl extends CI_Model {

    function __construct()	{
        // Call the Model constructor
        parent::__construct();
				$this->load->database('default');
    }

	//richiamare questa funzione solo se si è certi che la email passata come parametro possa accedere al sistema. ritorna false se l'email non esiste nella table users, true altrimenti
	function esegui_autenticazione_google_by_email( $email )
	{
		//escaping
		$email = $this->db->escape($email);

		$query_utente = $this->db->query("SELECT * FROM users WHERE username=".$email." LIMIT 1 ");

		if( $query_utente->num_rows() <= 0 ) return false;

		foreach( $query_utente->result() as $row )
		{
			$id_collegato = $row->id;
			$tipoacc = $row->tipoacc;
			$username = $row->username;
			$scadenza_utente = $row->scadenza_utente;
		}


		//calcolo dell'rserial
		$rserial = "" . $id_collegato . $this->genera_rserial(46);
		//calcolo dell ip della macchina
		$ip_client = $this->input->ip_address();

		$tempo = time();


		//eseguo la query di insert o di update in base a se la sessione è ancora attiva o meno
		if( $this->EsisteSession($id_collegato) == true ) //se succede significa che si sta cercando di effetture un nuovo login anche se nella tabella session abbiamo ancora quell'id
		{
			$this->db->query("UPDATE session SET rserial='" . $rserial . "', ultimoclick=" . $tempo . ", ip='" . $ip_client . "' WHERE id=" . $id_collegato . "");
		}
		else //significa che la session di questo utente non è presente nel database quindi va scritta normalmente con un insert
		{
			$this->db->query("INSERT INTO session (id, rserial, ultimoclick, ip) VALUES (" . $id_collegato . ", '" . $rserial . "', " . $tempo . ", '" . $ip_client . "')");
		}

		$this->session->set_userdata('rserial' , $rserial);
		$this->session->set_userdata("tipoacc", $tipoacc);
		$this->session->set_userdata("username", $username);


		return true; //ritorna true se tutto va bene

	}


	//questa funzione esegue una serie di controlli sulla sessione (validità,scadenza) partendo dall'rserial...ritorna true se è valida, false altrimenti
	function VerificaSessione($rserial)
	{
		$result = $this->db->query("SELECT * FROM session WHERE rserial='" . $rserial . "' ");

			//controllo
			if( $result->num_rows() == 1 )
			{
				//variabili del record
				$id_record; //id del result
				$time_session; //tempo della sessione
				$ip_sessione; //ip registrato nella sessione su sql
				$scadenza_utente; //timestamp della scadenza dell'utente

				foreach( $result->result() as $row )
				{
					$time_session = $row->ultimoclick;
					$id_record = $row->id;
					$ip_sessione = $row->ip;

					//ottengo la scadenza_utente di questo user
					$scadenza_utente = $this->db->query("SELECT scadenza_utente FROM users WHERE id=".$id_record." ");
					if( $scadenza_utente->num_rows() == 1 )
					{
						$scadenza_utente = $scadenza_utente->result();
						$scadenza_utente = (string)$scadenza_utente[0]->scadenza_utente;
					}
					else return false;

				}

				$time_attuale = time(); //tempo attuale

				//controllo anche la scadenza dell'utente
				$now_timestamp = date("Y-m-d H:i:s");

				//gestisco il caso in cui siano passati più di x minuti dall'ultima operazione o che l'utente sia scaduto
				if( $time_attuale - $time_session > 43000 /*||  $this->input->ip_address() != $ip_sessione*/ )
				{
					$this->db->query("DELETE FROM session WHERE id=" . $id_record . " ");

					return false;
				}
				else
				{
					$this->db->query("UPDATE session SET rserial='" . $rserial . "', ultimoclick=" . $time_attuale . " WHERE id=" . $id_record . " ");


					if( $scadenza_utente != NULL )
					{
						//devo controllare la scadenza utente
						if( $now_timestamp > $scadenza_utente )
						{
							//l'utente ha esaurito il suo tempo
							$this->db->query("DELETE FROM session WHERE id=" . $id_record . " ");

							return false;
						}
						else return true;
					}


					//ritorno true
					return true;
				}
			}
			//gestisco il caso in cui non ho risultati oppure ho risultati multipli il che non dovrebbe mai accadere
			else
			{
				return false;
			}

	}//fine VerificaSessione()

	//questa funzione genera una stringa random di n caratteri
	function genera_rserial($n)
	{
			$stringafinal = ""; //stringa finale
			$i = 0; //iteratore
			while( $i<$n )
			{
				$stringafinal = $stringafinal . rand(0,9);

				$i++;
			}

			return $stringafinal;
	}

	//questa funzione ritorna true se sulla tabella session c'è un id con lo stesso passato come argomento id=id_user
	function EsisteSession($id)
	{
		$result = $this->db->query("SELECT * FROM session WHERE id=" . $id . " ");

		//se esiste la session con l'id passato come argomento ritorna true
		if( $result->num_rows() == 1 ) return true;
		else return false;
	}


	/**
	* @return TRUE o FALSE a seconda che le credenziali inserite per il login
	* siano corrette rispetto anche al dominio dal quale si
	* sta facendo l'accesso
	*/
	function controllaLogin($email, $password)	{
		//Aggiungo l'helper di gestione delle password
		$this->load->helper('phpass');
		//creo l'hasher
		$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
		//Qui si aggiunge la gestione degli studi
		$this->load->helper('domini');
		$id_studio = Domini::get_id_studio();
		Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('users', $id_studio);
		// $this->db->where(['username' => $email, 'password' => $password]);
		$this->db->where(['username' => $email]);
		$result = $this->db->get('users');
		//controllo che la password corrisponda
		$row = $result->row();
		if(isset($row)) {
				$hash = $row->password;
				$login = $hasher->CheckPassword($password, $hash);
		}
		else {
				$login = FALSE;
		}

		//	se è stato verificato che un utente con quella email e password esiste, salvo la sessione nel database con le misure di sicurezza stabilite
		if( $login )	{
				//calcolo il time
				$tempo = time();
				//print_r($tempo); die(); //debug

				//calcolo id
				//assegno a id_collegato l'id dell'utente presente nella tabella login
				foreach( $result->result() as $row )	{
					$id_collegato = $row->id;
					$tipoacc = $row->tipoacc;
					$username = $row->username;
					$scadenza_utente = $row->scadenza_utente;
				}

				//controllo scadenza utente
				$now_timestamp = date("Y-m-d H:i:s");
				if( $scadenza_utente != NULL )
				{
					//devo controllare la scadenza dell'utente
					if( $now_timestamp > $scadenza_utente ) return false;
				}

				//calcolo dell'rserial
				$rserial = "" . $id_collegato . $this->genera_rserial(46);
				//print_r($rserial); //debug
				//die(); //debug

				//calcolo dell ip della macchina
				$ip_client = $this->input->ip_address();
				//print_r($ip_client);
				//die();

				//eseguo la query di insert o di update in base a se la sessione è ancora attiva o meno
				if( $this->EsisteSession($id_collegato) == true ) //se succede significa che si sta cercando di effetture un nuovo login anche se nella tabella session abbiamo ancora quell'id
				{
					$this->db->query("UPDATE session SET rserial='" . $rserial . "', ultimoclick=" . $tempo . ", ip='" . $ip_client . "' WHERE id=" . $id_collegato . "");
				}
				else //significa che la session di questo utente non è presente nel database quindi va scritta normalmente con un insert
				{
					$this->db->query("INSERT INTO session (id, rserial, ultimoclick, ip) VALUES (" . $id_collegato . ", '" . $rserial . "', " . $tempo . ", '" . $ip_client . "')");

				}

				$this->session->set_userdata('rserial' , $rserial);
				$this->session->set_userdata("tipoacc", $tipoacc);
				$this->session->set_userdata("username", $username);

				//Setta l'id_studio nella variabile $_SESSIONS
				$this->session->set_userdata(['id_studio' => $id_studio]);
				return true; //ritorna true se tutto va bene

			}
			else //se eseguo questo significa che nessun utente è stato trovato con i dati username e password inseriti...
			{
				return false;
			}

	}//fine controlla login



	//esegue il logout dell'utente a partire dal suo rserial, ritorna true se tutto è stato eseguito correttamente, false altrimenti
	function EseguiLogout($rserial)
	{
		$result = $this->db->query("SELECT * FROM session WHERE rserial='" . $rserial . "' ");



			//controllo
			if( $result->num_rows() == 1 )
			{
				//variabili del record
				$id_record = -1;
				foreach( $result->result() as $row )
				{
					$id_record = $row->id;
				}

				$this->db->query("DELETE FROM session WHERE id=" . $id_record . " ");

				//flush delle sessioni vecchie
				$this->FlushSessionCache();


				return true;


			}
			//gestisco il caso in cui non ho risultati oppure ho risultati multipli il che non dovrebbe mai accadere
			else
			{
				//flush delle sessioni vecchie
				$this->FlushSessionCache();

				return false;
			}


	}//fine EseguiLogout()


		//questa funzione esegue il flush(pulizia) dei record ormai scaduti della tabella 'session' del database
	function FlushSessionCache()
	{
			//ottengo il time attuale
			$time_attuale = time();
			//gli sottraggo 180 ovvero i secondi dopo i quali il record dovrebbe scadere
			$time_attuale = $time_attuale - 180;

		$result = $this->db->query("SELECT * FROM session WHERE ultimoclick < " . $time_attuale . " ");

			//per ogni record di sessione ormai scaduto, lo elimino
			foreach( $result->result() as $row )
			{
				//ottengo l'id del record corrispondente (scaduto)
				$id_record = $row->id;

				$this->db->query("DELETE FROM session WHERE id=" . $id_record . " ");

			}


			return true;

	}//fine FlushSessionCache()


	//questa funzione esegue il get dell'identità dell'utente attualmente connesso a partire dal suo rserial, ritorna -1 in caso di errore altrimenti un oggetto di tipo "utente"
	function getUtente($rserial)
	{

		$result = $this->db->query("SELECT * FROM session WHERE rserial='" . $rserial . "' ");

			//controllo
			if( $result->num_rows() == 1 )
			{
				//variabili del record
				$id_record;
				foreach( $result->result() as $row )
				{
					$id_record = $row->id;
				}

				//ottengo i valori dell'utente
				$current_user = new utente();

				$result2 = $this->db->query("SELECT * FROM users WHERE id=" . $id_record ." ");

				if( $result2->num_rows() == 1 )
				{
					foreach( $result2->result() as $row )
					{
						$current_user->id = $row->id;
						$current_user->username = $row->username;
						$current_user->tipo_account = $row->tipoacc;
					}

				}



				return $current_user;

			}

			return -1; //in caso di errore

	}//fine getUtente()

	//ritorna l'account a partire dal suo id
	function get_account_by_id($id)
	{
		$id_account = (int)$id;
		return $this->db->query("SELECT * FROM pazienti WHERE id=".$id_account." ");
	}

	function get_user_by_id($id)
	{
		$id_account = (int)$id;

		return $this->db->query("SELECT * FROM users WHERE id=".$id_account." ");
	}

	function delete_utente($id)
	{
		return $this->db->query("DELETE FROM users WHERE id=".$id." ");
	}


	function get_all_users()
	{
		return $this->db->query("SELECT * FROM users ");
	}

	function add_user($username, $password_md5, $tipoacc)
	{
		//escaping
		$username = $this->db->escape($username);
		$password_md5 = $this->db->escape($password_md5);

		return $this->db->query("INSERT INTO users (username, password, tipoacc) VALUES (".$username.", ".$password_md5.", ".$tipoacc.") ");
	}

	function update_user($id, $username, $password_md5, $tipoacc)
	{
		//escaping
		$username = $this->db->escape($username);

		if( $password_md5 == "" ) return $this->db->query("UPDATE users SET username=".$username.", tipoacc=".$tipoacc." WHERE id=".$id." ");
		else
		{
			//escaping
			$password_md5 = $this->db->escape($password_md5);

			return $this->db->query("UPDATE users SET username=".$username.", password=".$password_md5.", tipoacc=".$tipoacc." WHERE id=".$id." ");
		}

	}


}
