<?php
class Gallery extends CI_Model {
	
	var $gallery_path = APPPATH.'images';
	var $gallery_path_url = base_url('images');
	
	public function do_upload() {
		
		$config['upload_path'] = $this->gallery_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		
		$this->load->library('upload', $config);
		$this->upload->do_upload('userfile');
	}
}