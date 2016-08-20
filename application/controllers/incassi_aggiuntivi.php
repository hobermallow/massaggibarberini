<?php

class incassi_aggiuntivi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->model('incassi_aggiuntivi_data');
		$this->load->model('dottori');
		$this->load->model('pazienti');
	}
	
	
	public function index() {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		if($this->input->post("add")) {
			//save a new cost
			$description = $this->input->post("descrizione");
			$cost = $this->input->post("costo");
			$view['add'] = $this->incassi_aggiuntivi_data->save_extra_income($description, $cost);
		}
		$view['dottori'] = $this->dottori->get_all_dottori();
		//specific section
		$view['incassi_aggiuntivi'] = $this->incassi_aggiuntivi_data->get_first_page();
		$view['pagine_totali'] = $this->incassi_aggiuntivi_data->get_pages_number();
		$view['pagina_attuale'] = 1;
		$this->load->view("incassi_aggiuntivi", $view);
	}
	public function view($page = 1) {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		$view['dottori'] = $this->dottori->get_all_dottori();
		//specific section
		if($this->input->post("add")) {
			//save a new cost
			$description = $this->input->post("descrizione");
			$cost = $this->input->post("costo");
			$view['add'] = $this->incassi_aggiuntivi_data->save_extra_income($description, $cost);
		}
		if($this->input->post("page")) {
			//page specified by post...
			$page = $this->input->post('numero_pagina');
			
		}
		$view['incassi_aggiuntivi'] = $this->incassi_aggiuntivi_data->get_page($page);
		$view['pagine_totali'] = $this->incassi_aggiuntivi_data->get_pages_number();
		$view['pagina_attuale'] = $page;
		$this->load->view("incassi_aggiuntivi", $view);
	}
	
	//delete extra cost
	public function delete($id) {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		//deleting cost
		$view['delete'] = $this->incassi_aggiuntivi_data->delete_extra_income($id);
		$view['dottori'] = $this->dottori->get_all_dottori();
		$view['incassi_aggiuntivi'] = $this->incassi_aggiuntivi_data->get_first_page();
		$view['pagine_totali'] = $this->incassi_aggiuntivi_data->get_pages_number();
		$view['pagina_attuale'] = 1;
		$this->load->view("incassi_aggiuntivi", $view);
	}
	
	//edit extra cost
	public function edit($id) {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		//updating
		if($this->input->post()) {
			//getting info from post
			$description = $this->input->post("descrizione");
			$cost = floatval($this->input->post("costo"));
			$view['update'] = $this->incassi_aggiuntivi_data->update_extra_income($id, $description, $cost);
		}
		$view['incasso_aggiuntivo'] = $this->incassi_aggiuntivi_data->get_extra_income($id);
		//common section
		$view['dottori'] = $this->dottori->get_all_dottori();
		$this->load->view("editincassoaggiuntivo", $view);
	}
}


?>