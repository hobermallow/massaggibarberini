<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class gallery_data extends CI_Model {

	var $gallery_path;
	var $gallery_path_url;

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->gallery_path  = realpath(APPPATH.'images');
		$this->gallery_path_url = base_url('images');
	}

	public function do_upload() {
		// echo $this->gallery_path;
		// exit;
		$config['upload_path'] = $this->gallery_path;
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '2000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '768';



		$this->load->library('upload', $config);
		$this->upload->do_upload();
		//dati sul file appena uploadato
		$image_data = $this->upload->data();
		//configurazioni della image_lib
		$img_config = array();
		$img_config['source_image'] = $image_data['full_path'];
		$img_config['maintain_ratio'] = true;
		$img_config['new_image'] = $this->gallery_path."/thumbs";
		$img_config['width'] = 100;
		$img_config['height'] = 70;
		// $img_config['create_thumb'] = TRUE:
		// $img_config['image_library'] = 'gd2';


		$this->load->library('image_lib', $img_config);
		$this->image_lib->resize();
		// echo var_dump($img_config);
		// exit;
	}
}
