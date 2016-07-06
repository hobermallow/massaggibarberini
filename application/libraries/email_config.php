<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class email_config
{

	public $protocol = "smtp";
	
	public $smtp_host = "localhost";
	
	public $smtp_user = "";
	
	public $smtp_pass = "";
	
	public $smtp_port = 25;
	
	public $mailtype = "html";
	
	//genera la configurazione delle email a partire dalle variabili statiche sopra
	public function genera_file_configurazione()
	{
		$configurazione = array();
		
		$configurazione["protocol"] = $this->protocol;
		$configurazione["smtp_host"] = $this->smtp_host;
		$configurazione["smtp_user"] = $this->smtp_user;
		$configurazione["smtp_pass"] = $this->smtp_pass;
		$configurazione["smtp_port"] = $this->smtp_port;
		$configurazione["mailtype"] = $this->mailtype;
		
		
		return $configurazione;
	}

	
}