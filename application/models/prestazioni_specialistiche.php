<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class prestazioni_specialistiche extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->database('default');
    }
	
	function add_prestazione($post)
	{
		//escaping
		$post["nome"] = $this->db->escape($post["nome"]);
		
		return $this->db->query("INSERT INTO prestazioni_specialistiche (nome_prestazione) VALUES ( ".$post["nome"]." ) ");
	}
	
	function delete_prestazione($id_prestazione)
	{
		//escaping
		$id_prestazione = (int)$id_prestazione;
		
		return $this->db->query("DELETE FROM prestazioni_specialistiche WHERE id_prestazione=".$id_prestazione." ");
	}
	
	function get_prestazione_by_id($id_prestazione)
	{
		//escaping
		$id_prestazione = (int)$id_prestazione;
		
		return $this->db->query("SELECT * FROM prestazioni_specialistiche WHERE id_prestazione=".$id_prestazione." ");
	}
	
	function edit_prestazione( $id_prestazione, $post )
	{
		//escaping
		$id_prestazione = (int)$id_prestazione;
		$post["nome_prestazione"] = $this->db->escape($post["nome_prestazione"]);
		
		return $this->db->query("UPDATE prestazioni_specialistiche SET nome_prestazione=".$post["nome_prestazione"]." WHERE id_prestazione=".$id_prestazione." ");
	}
	
	
	function get_all_prestazioni_specialistiche()
	{
		return $this->db->query("SELECT * FROM prestazioni_specialistiche ");
	}
	
	
	
}







































