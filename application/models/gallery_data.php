<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class gallery_data extends CI_Model {

	var $gallery_path;
	var $gallery_path_url;
	var $array_image_mime;

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->gallery_path  = realpath(APPPATH."/../".'images');
		$this->gallery_path_url = base_url('images');
		$this->array_image_mime = ['image/gif', 'image/jpeg', 'image/png'];
	}
	
	public function get_images() {
		//recupero i file nella cartella delle immagini
		$files = scandir($this->gallery_path);
		//elimino gli elementi che non sono immagini
		$files = array_diff($files, ['thumbs', '.', '..']);
		//per ogni immagine, passo url dell'immagine e del thumb
		$images = array();
		foreach ($files as $file) {
			//se il file e' un immagine
			if(in_array($this->getMimeType($this->gallery_path.DIRECTORY_SEPARATOR.$file), $this->array_image_mime))	{
				$thumb = $this->gallery_path_url . DIRECTORY_SEPARATOR . "/thumbs/" . $file;
			}
			//altrimenti
			else {
				$thumb =explode('.', $file);
				$thumb = $thumb[0];
				$thumb = $thumb.".jpg";
				$thumb = $this->gallery_path_url . DIRECTORY_SEPARATOR . "/thumbs/" . $thumb;
			}
			$images[] = [
					'image_url' => $this->gallery_path_url . DIRECTORY_SEPARATOR . $file,
					'image_thumb' => $thumb,
					'image_name' => $file
			];
		}
		return $images;
		
		
	}

	public function do_upload() {
		// echo $this->gallery_path;
		// exit;
		$config['upload_path'] = $this->gallery_path;
		$config['allowed_types'] = 'gif|jpg|png|mp4|3gp|avi';
		$config['max_size']     = '200000';
		// $config['max_width'] = '1024';
		// $config['max_height'] = '768';



		$this->load->library('upload', $config);
		if(!($this->upload->do_upload())) {
			echo "SKJKDSNKJNDKSA";
			exit;
		}
		//dati sul file appena uploadato
		$image_data = $this->upload->data();
		//se e' un immagine
		if($image_data['is_image']) {
			//configurazioni della image_lib
			$img_config = array();
			$img_config['source_image'] = $image_data['full_path'];
			$img_config['maintain_ratio'] = true;
			$img_config['new_image'] = $this->gallery_path . DIRECTORY_SEPARATOR ."thumbs";
			$img_config['width'] = 100;
			$img_config['height'] = 70;
			// $img_config['create_thumb'] = TRUE:
			// $img_config['image_library'] = 'gd2';


			$this->load->library('image_lib', $img_config);
			$this->image_lib->resize();
		}
		//altrimenti e' un video
		else {
			//preparo il nome del file thumb
			$file_name = $image_data['file_name'];
			$file_name =explode('.', $file_name);
			$file_name = $file_name[0];
			$file_name = $file_name.".jpg";
			//eseguo il comando
			exec("ffmpegthumbnailer   -i" .$image_data['full_path'] . " -f -s 100 -o ".$this->gallery_path.DIRECTORY_SEPARATOR."thumbs".DIRECTORY_SEPARATOR.$file_name );
				
		}
		// echo var_dump($img_config);
		// exit;
	}
	
	public function delete($files) {
		//$files e' array dei nomi dei file da cancellare
		foreach ($files as $file) {
			
			//cancello il thumb
			//se e' un immagine stesso nome
			if(in_array($this->getMimeType($this->gallery_path.DIRECTORY_SEPARATOR.$file), $this->array_image_mime))	{
				unlink($this->gallery_path . DIRECTORY_SEPARATOR . "thumbs" .DIRECTORY_SEPARATOR . $file);
			}
			//altrimenti
			else {
				$file_thumb =explode('.', $file);
				$file_thumb = $file_thumb[0];
				$file_thumb = $file_thumb.".jpg";
				$file_thumb = $this->gallery_path_url . DIRECTORY_SEPARATOR . "/thumbs/" . $file_thumb;
				unlink($file_thumb);
			}
			//cancello il file originale
			unlink($this->gallery_path . DIRECTORY_SEPARATOR . $file);
			
		}
	}
	
	private function getMimeType($filename)	{
		$mimetype = false;
		if(function_exists('finfo_fopen')) {
			$f_info = finfo_open(FILEINFO_MIME_TYPE);
			$mimetype = finfo_file($f_info, $filename);
		} 
		
		else if(function_exists('mime_content_type')) {
			$mimetype = mime_content_type($filename);
		}
		return $mimetype;
	}
}
