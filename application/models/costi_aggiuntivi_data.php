<?php

class costi_aggiuntivi_data extends CI_Model {
	
	//get a specific extra cost
	public function get_extra_cost($id) {
		$id_studio = $this->session->userdata('id_studio');
		$this->db->where(['id_studio' => $id_studio, 'id' => $id]);
		$query = $this->db->get('costi_aggiuntivi');
		return $query->row();
	}
	
	//load first 10 extra costs
	public function get_first_page() {
		$id_studio = $this->session->userdata('id_studio');
		$this->db->limit(10);
		$query = $this->db->get_where('costi_aggiuntivi', ['id_studio' => $id_studio]);
		return $query;
	}
	
	//load page (pagination)
	public function get_page($page) {
		$id_studio = $this->session->userdata('id_studio');
		$this->db->limit(10, 10*($page-1));
		$query = $this->db->get_where('costi_aggiuntivi', ['id_studio' => $id_studio]);
		return $query;
	}
	
	//get pages number
	public function get_pages_number() {
		$id_studio = $this->session->userdata('id_studio');
		$query = $this->db->get_where('costi_aggiuntivi', ['id_studio' => $id_studio]);
		return ceil(($query->num_rows())/10.0);
	}
	
	//save extra cost in db
	public function save_extra_cost($description, $cost) {
		$id_studio = $this->session->userdata('id_studio');
		$bool = $this->db->insert('costi_aggiuntivi', ['descrizione' => $description, 'costo' => $cost, 'id_studio' => $id_studio]);
		return $bool;
	}
	
	//delete extra cost
	public function delete_extra_cost($id) {
		$id_studio = $this->session->userdata('id_studio');
		$this->db->where(['id_studio' => $id_studio, 'id' => $id]);
		$bool = $this->db->delete('costi_aggiuntivi');
		return $bool;
	}
	
	//update extra cost
	public function update_extra_cost($id, $description, $cost) {
		$id_studio = $this->session->userdata('id_studio');
		$this->db->where(['id_studio' => $id_studio, 'id' => $id ]);
		$bool = $this->db->update('costi_aggiuntivi', ['descrizione' => $description, 'costo' => $cost]);
		return $bool;
	}
}



?>