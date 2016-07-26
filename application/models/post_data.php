<?php
class post_data extends CI_Model {
	var $file_path;
	var $file_path_url;
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('domini');
		$this->file_path  = realpath(APPPATH."/../".'posts');
	}
	
	public function get_posts() {
		$id_studio = $this->session->userdata('id_studio');
		//recupero i posts
		$this->db->where(['id_studio' => $id_studio]);
		$query = $this->db->get('post');
		$posts = [];
		foreach ($query->result() as $post) {
			$posts[] = [
					'titolo' => $post->titolo,
					'id_post' => $post->id_post,
					'url' => base_url("posts".DIRECTORY_SEPARATOR.$post->nome_file)
			];
		}
		return $posts;
		
	
	
	}
	
	public function get_post($id_post) {
		$id_studio = $this->session->userdata('id_studio');
		//recupero il posts
		$this->db->where(['id_studio' => $id_studio, 'id_post' => $id_post]);
		$query = $this->db->get('post');
		$post_data = $query->row();
		//costruisco il nome del file
		$file = $this->file_path.DIRECTORY_SEPARATOR.$post_data->nome_file;
		//recupero il file legato al post
		$post['testo'] = read_file($file);
		$post['titolo'] = $post_data->titolo;
		$post['id_post'] = $post_data->id_post;
		return $post;
	
	
	
	}
	
	public function save_post($titolo, $testo, $id_post) {
		//no titolo
		if ($titolo == "") {
			return false;
		}
		$id_studio = $this->session->userdata('id_studio');
		if($id_post == '') {
			//nuovo post
			$nome_file = urlencode($titolo).".html";
			//inserisco il post nel db
			$bool = $this->db->insert('post', ['titolo' => $titolo, 'id_studio' => $id_studio, 'nome_file' => $nome_file]);
			//id del post
			$id = $this->db->insert_id();
			//carico il file
			$bool = $bool && write_file($this->file_path.DIRECTORY_SEPARATOR.$nome_file, $testo);
			//se successo
			if($bool) {
				return $id;
			}
			else {
				return $bool;
			}
		}
		else {
			//cancello il vecchio file
			$post = $this->db->get_where('post', ['id_post' => $id_post]);
			//vecchio file
			$old_file = $post->row()->nome_file;
			//cancello il file
			$bool = unlink($this->file_path.DIRECTORY_SEPARATOR.$old_file);
			//nome del nuovo file
			$nome_file = urlencode($titolo).".html";
			$this->db->where(['id_post' => $id_post, 'id_studio' => $id_studio]);
			$bool = $this->db->update('post', ['titolo' => $titolo, 'id_studio' => $id_studio, 'nome_file' => $nome_file]);
			//carico il file
			$bool = $bool && write_file($this->file_path.DIRECTORY_SEPARATOR.$nome_file, $testo);
			
			if($bool) {
				return $id_post;
			}
			else {
				return $bool;
			}
		}
	}
	
	public function delete_post($id_post) {
		//cancello il vecchio file
		$post = $this->db->get_where('post', ['id_post' => $id_post]);
		//vecchio file
		$old_file = $post->row()->nome_file;
		//cancello il file
		$bool = unlink($this->file_path.DIRECTORY_SEPARATOR.$old_file);
		//cancello dal db
		$this->db->where(['id_post' => $id_post, 'id_studio' => $this->session->userdata('id_studio')]);
		$bool = $bool && $this->db->delete('post');
		return $bool;
	}
	
}