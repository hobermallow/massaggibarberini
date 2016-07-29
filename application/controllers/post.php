<?php
class post extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('post_data');
	}
	
	public function index() {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		
		//carico i posts
		$view['posts'] = $this->post_data->get_posts();
		
		//carico i dottori		
		$this->load->model("dottori");
		$view["dottori"] = $this->dottori->get_all_dottori();
		$this->load->view("lista_posts", $view);
		
		
	}
	
	public function edit($id_post = NULL) {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		//se sto salvando il post
		if($this->input->post('save')) {
			//salvo il post
			$id = $this->post_data->save_post($this->input->post('titolo'), $this->input->post('testo'), $this->input->post('id_post'));
			
			if(is_bool($id)) {
				//c'e' stato un errore
				$view['error'] = true;
			}
			else {
				$view['error'] = false;
				$view['id_post'] = $id;
				$post = $this->post_data->get_post($id);
				$view['titolo'] = $post['titolo'];
				$view['testo'] = $post['testo'];
				
			}
			
		}
		
		//carico i dottori
		$this->load->model("dottori");
		$view["dottori"] = $this->dottori->get_all_dottori();
		
		//carico il post o l'editor
		
		//se sto editando un post gia esistente
		if(isset($id_post)) {
			$post = $this->post_data->get_post($id_post);
			$view['titolo'] = $post['titolo'];
			$view['testo'] = $post['testo'];
			$view['id_post'] = $post['id_post'];
		}
		//carico le immagini da inserire nei post
		$this->load->model('gallery_data');
		$view['images'] = $this->gallery_data->get_images();
		$this->load->view('editor', $view);
	}
	
	public function delete($id_post) {
		$session_rserial = $this->session->userdata('rserial');
		$view["username"] = $this->session->userdata("username");
		if ($this->acl->VerificaSessione($session_rserial) == false) {
			$this->load->helper('url');
			$login_url = base_url();
			redirect($login_url . "login/info?c=error");
		}
		//cancello il post
		$view['error'] = !($this->post_data->delete_post($id_post));
		//carico i posts
		$view['posts'] = $this->post_data->get_posts();
		
		
		//carico i dottori
		$this->load->model("dottori");
		$view["dottori"] = $this->dottori->get_all_dottori();
		$this->load->view("lista_posts", $view);
		
		
		
	}
	
}