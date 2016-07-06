<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tasks_data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		
		$this->load->database('default');
    }
	
	function get_recent_tasks()
	{
		return $this->db->query("SELECT * FROM tasks ORDER BY data DESC LIMIT 50 ");
	}
	
	function reset_all_checkbox()
	{
		return $this->db->query("UPDATE tasks SET completato=0 ");
	}
	
	function add_task( $descrizione_task )
	{
		$descrizione_task = $this->db->escape($descrizione_task);	
		
		return $this->db->query("INSERT INTO tasks (descrizione_task) VALUES ( ".$descrizione_task." ) ");
	}
	
	
	//aggiorna il record di id=$val e imposta il suo checkbox su on
	function update_checkbox_on( $id_task )
	{
		return $this->db->query("UPDATE tasks SET completato=1 WHERE id=".$id_task." ");
	}
	
	function update_task( $id_task, $descrizione_task )
	{
		$descrizione_task = $this->db->escape($descrizione_task);
		
		return $this->db->query("UPDATE tasks SET descrizione_task=".$descrizione_task." WHERE id=".$id_task." ");
	}
	
	
	
	
	
}







































