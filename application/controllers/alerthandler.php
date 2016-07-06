 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class alerthandler extends CI_Controller {
	
	public function index()
	{
		echo "Esecuzione script di gestione alert...<br><br>";
		
		//controllo se il cron è già partito nella giornata di oggi...
		$ultima_esecuzione = $this->impostazioni_data->get_ultima_esecuzione_alerthandler();
		$ultima_esecuzione = $ultima_esecuzione->result();
		$today = date("Y-m-d");
		if( isset($ultima_esecuzione[0]) ) $ultima_esecuzione_date_only = date("Y-m-d", strtotime($ultima_esecuzione[0]->data_esecuzione));
		else $ultima_esecuzione_date_only = "va eseguito!";
		if( $today == $ultima_esecuzione_date_only )
		{
			echo "nella data di oggi lo script è già stato eseguito!<br>";
			die();
		}
		
		echo "Esecuzione script accettata<br><br>";
		
		
		//risultati
		$tot_email_inviate = 0;
		$tot_sms_inviati = 0;
		
		
		//inizializzazione libreria invio email
		$this->email->initialize(
			array(
				"protocol" => "smtp",
				"smtp_host" => "127.0.0.1",
				//"smtp_user" => ,
				//"smtp_pass" => ,
				"smtp_port" => 25,
				"mailtype" => "html"
			)
		);

		echo "IMPOSTAZIONI DI SISTEMA: <br><br>";
		
		//ottengo le impostazioni di sistema
		$all_impostazioni = array();
		$query_impostazioni = $this->impostazioni_data->get_all_impostazioni();
		foreach( $query_impostazioni->result() as $impostazione )
		{
			$all_impostazioni[$impostazione->impostazione] = $impostazione->valore;
			
			//print per debug
			echo "impostazione: ".$impostazione->impostazione.", valore: ".$impostazione->valore;
			echo "<br>";
		}
		
		echo "<br><br>";
		
		
		//inizio l'esecuzione del core dello script
		
		echo "Esecuzione core script<br><br>";
		
		//GESTIONE ALERT EMAIL
		if( $all_impostazioni["alert_email"] == "on" )
		{
			echo "alert email globale abilitato<br><br>";
			
			//le email devo essere inviate a tutti i pazienti che domani hanno una visita
			$datetime = new DateTime( $today );
			$datetime->modify('+1 day');
			$data_domani = $datetime->format('Y-m-d');
			
			$visite_domani = $this->pazienti->get_visite_del_giorno_all_fields($data_domani);
			
			foreach( $visite_domani->result() as $visita )
			{
				$cur_email_paziente = $this->pazienti->get_paziente_email_by_id_paziente( $visita->id_paziente );
				$ora_visita = (string)$visita->orario_visita;
				
				//invio la email a questo paziente
				$this->email->from('studioroiate@gmail.com', 'Studio Roiate');
				$this->email->to($cur_email_paziente);
				$this->email->subject('Studio Roiate - Avviso Visita');
				$this->email->message("
					Studio Roiate ti avvisa che alle ore ".$ora_visita." avete una visita presso il centro: ".$all_impostazioni["nome_esercizio"].".
				");
				$send_result = $this->email->send();
				//var_dump($send_result);
				
				if( $send_result == true )
				{
					echo "email inviata: { email: ".$cur_email_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }";
					echo "<br><br>";
				}
				else echo "errore durante l'invio della email: { email: ".$cur_email_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }<br><br>";
				
				$tot_email_inviate++;
				
			}//foreach
		
		}//if( $all_impostazioni["alert_email"] == true )
		else
		{
			echo "alert email globale disabilitato<br><br>";
			
			//eseguo questo se l'alert email è disabilitato globalmente. devo verificare le impostazioni paziente per paziente

			$datetime = new DateTime( $today );
			$datetime->modify('+1 day');
			$data_domani = $datetime->format('Y-m-d');
			
			$pazienti_alert_email_enabled = $this->pazienti->get_pazienti_with_alert_email_enabled();
			
			foreach( $pazienti_alert_email_enabled->result() as $paziente )
			{
				$visite_del_paziente = $this->pazienti->get_visite_by_day_by_paziente( $data_domani, $paziente->id );
				
				foreach( $visite_del_paziente->result() as $visita )
				{
					$cur_email_paziente = $paziente->email;
					$ora_visita = (string)$visita->orario_visita;
					
					//invio la email a questo paziente
					$this->email->from('studioroiate@gmail.com', 'Studio Roiate');
					$this->email->to($cur_email_paziente);
					$this->email->subject('Studio Roiate - Avviso Visita');
					$this->email->message("
						Studio Roiate ti avvisa che alle ore ".$ora_visita." avete una visita presso il centro: ".$all_impostazioni["nome_esercizio"].".
					");
					$send_result = $this->email->send();
					//var_dump($send_result);
					
					if( $send_result == true )
					{
						echo "email inviata: { email: ".$cur_email_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }";
						echo "<br><br>";
					}
					else echo "errore durante l'invio della email: { email: ".$cur_email_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }<br><br>";
					
					$tot_email_inviate++;
					
				}//foreach( $visite_domani->result() as $visita )
				
			}//foreach( $pazienti_alert_email_enabled->result() as $paziente )

		}//else
		
		
		//GESTIONE ALERT SMS
		if( $all_impostazioni["alert_sms"] == "on" )
		{
			if( $all_impostazioni["plugin_sms_abilitato"] == "si" )
			{
			
				echo "alert sms globale abilitato<br><br>";
				
				//alert devo essere inviate a tutti i pazienti che domani hanno una visita
				$datetime = new DateTime( $today );
				$datetime->modify('+1 day');
				$data_domani = $datetime->format('Y-m-d');
				
				$visite_domani = $this->pazienti->get_visite_del_giorno_all_fields($data_domani);
				
				foreach( $visite_domani->result() as $visita )
				{
					$cur_telefono_paziente = $this->pazienti->get_paziente_telefono_by_id_paziente( $visita->id_paziente );
					$ora_visita = (string)$visita->orario_visita;
					
					//invio sms a questo paziente
					$recipients = array("39".$cur_telefono_paziente);
					$this->skebby_sms->skebbyGatewaySendSMS(
						'<USERNAME>',
						'<PASSWORD>',
						$recipients,
						"Studio Roiate ti avvisa che alle ore ".$ora_visita." avete una visita presso il centro: ".$all_impostazioni["nome_esercizio"].".", 
						SMS_TYPE_TEST_BASIC,
						'',
						'Syrus'
					);
					
					echo "sms inviato: { telefono: ".$cur_telefono_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }";
					echo "<br><br>";
					
					$tot_sms_inviati++;
					
				}//foreach
			
			}//if( $all_impostazioni["plugin_sms_abilitato"] == "si" )
		
		}//if( $all_impostazioni["alert_sms"] == true )
		else
		{
			if( $all_impostazioni["plugin_sms_abilitato"] == "si" )
			{
			
				echo "alert sms globale disabilitato<br><br>";
				
				//eseguo questo se l'alert sms è disabilitato globalmente. devo verificare le impostazioni paziente per paziente
	
				$datetime = new DateTime( $today );
				$datetime->modify('+1 day');
				$data_domani = $datetime->format('Y-m-d');
				
				$pazienti_alert_sms_enabled = $this->pazienti->get_pazienti_with_alert_sms_enabled();
				
				foreach( $pazienti_alert_sms_enabled->result() as $paziente )
				{
					$visite_del_paziente = $this->pazienti->get_visite_by_day_by_paziente( $data_domani, $paziente->id );
					
					foreach( $visite_del_paziente->result() as $visita )
					{
						$cur_telefono_paziente = $paziente->telefono;
						$ora_visita = (string)$visita->orario_visita;
						
						//invio sms a questo paziente
						$recipients = array("39".$cur_telefono_paziente);
						$this->skebby_sms->skebbyGatewaySendSMS(
							'<USERNAME>',
							'<PASSWORD>',
							$recipients,
							"Studio Roiate ti avvisa che alle ore ".$ora_visita." avete una visita presso il centro: ".$all_impostazioni["nome_esercizio"].".", 
							SMS_TYPE_TEST_BASIC,
							'',
							'Syrus'
						);
						
						echo "sms inviato: { telefono: ".$cur_telefono_paziente.", id_visita: ".$visita->id.", id_paziente: ".$visita->id_paziente." }";
						echo "<br><br>";
						
						$tot_sms_inviati++;
						
					}//foreach( $visite_domani->result() as $visita )
					
				}//foreach( $pazienti_alert_sms_enabled->result() as $paziente )
			
			}//if( $all_impostazioni["plugin_sms_abilitato"] == "si" )

		}//else
		
		
		
		//finalizzazione dello script e salvataggio resoconto nel db
		$this->impostazioni_data->save_last_esecuzione_alerthandler($tot_email_inviate, $tot_sms_inviati );
		
		
	}//fine index()
	
	
}









































