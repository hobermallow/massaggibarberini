<?php 

class incassi_data extends CI_Model {
	
	/**
	 * Ricavo la prima pagina di incassi (ultimi 10 giorni)
	 */
	function get_page_incassi($start, $end) {
		//prendo tutte le visite relative l periodo selezionato, inserendo il costo di ogni visita
		$this->db->join('prestazioni', 'prestazioni.id = visite.id_prestazione');
		$this->db->join('dottori', 'dottori.id = visite.id_dottore');
		$this->db->join('relationship_visite_studi', 'relationship_visite_studi.id_persona = visite.id');
		$this->db->where(['id_studio' => $this->session->userdata('id_studio'), 'data_visita <=' => $end, 'data_visita >=' => $start]);
		$this->db->select('visite.nome_paziente as paziente, dottori.nome as dottore, prestazioni.costo_prestazione as costo, visite.data_visita as data');
		$query = $this->db->get('visite');
		
		return $query;
		
	}
	
	
}
















