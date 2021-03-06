<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class dottori extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('domini');
        $this->load->database('default');
    }
    
    function get_image_dottore($id_dottore) {
    	//id dello studio
    	$id_studio = $this->session->userdata('id_studio');
    	//path del file da cercare
    	$thumb = base_url()."immagini-dottori/".$id_studio."/".$id_dottore."/thumb.jpg";
    	//prendo il nome dell'immagine dal db
    	$this->db->where(['id_studio' => $id_studio, 'id_dottore' => $id_dottore]);
    	$query = $this->db->get('immagini_dottori');
    	if($query->num_rows() < 1) {
    		return NULL;
    	}
    	$image = $query->row()->nome_file;
    	$array = ['thumb' => $thumb, 'image' => base_url()."immagini-dottori/".$id_studio."/".$id_dottore."/".$image, 'name' => $image];
    	//ritorno il percorso del thumb e quello dell'immagine
    	return $array;
    }

    function upload_immagine($id_dottore, $post) {
    	//id dello studio
    	$id_studio = $this->session->userdata('id_studio');
    	//creo la cartella per l'immagine del dottore se non esiste
    	$path = FCPATH."immagini-dottori/".$id_studio."/".$id_dottore;
    	if(!file_exists($path)) {
    		mkdir($path, 0777, true);
    	}
    	
    	//se la cartella contiene gia un file, la svuoto
    	$files = glob($path."/*"); // get all file names
    	foreach($files as $file){ // iterate files
    		if(is_file($file))
    			unlink($file); // delete file
    	}
    	
		//configurazione per l'upload
    	$config['upload_path'] = $path;
    	$config['allowed_types'] = 'gif|jpg|png';
    	$config['max_size']     = '200000';

    	
    	
    	$this->load->library('upload', $config);
    	//carico l'immagine
    	if(!($this->upload->do_upload('picture'))) {
    		return false;
    	}
    	$image_data = $this->upload->data();
    	
    	//creo thumb
    	if($image_data['is_image']) {
    		//configurazioni della image_lib
    		$img_config = array();
    		$img_config['source_image'] = $image_data['full_path'];
    		$img_config['maintain_ratio'] = true;
    		$img_config['new_image'] = $path."/thumb.jpg";
    		$img_config['width'] = 500;
    		$img_config['height'] = 500;
    		
    		$this->load->library('image_lib', $img_config);
    		$this->image_lib->resize();
    	}
    	
    	//inserisco il nome dell'immagine in tabella 
    	$query = $this->db->get_where('immagini_dottori', ['id_studio' => $id_studio, 'id_dottore' => $id_dottore]);
    	if($query->num_rows() > 0) {
    		//update
    		$this->db->where(['id_studio' => $id_studio, 'id_dottore' => $id_dottore]);
    		$this->db->update('immagini_dottori', ['nome_file' => $image_data['file_name']]);
    	}
    	else {
    		//insert
    		$this->db->insert('immagini_dottori', ['id_studio' => $id_studio, 'id_dottore' => $id_dottore, 'nome_file' => $image_data['file_name']]);
    	}
    	
    	return true;
    }
    
    function get_fatture_dottore($id_dottore) {
        return $this->db->query("SELECT f.id_fattura as id_fattura, f.filename as filename, f.id_dottore as id_dottore, f.totale as totale, f.data as data, DATE_FORMAT(data, '%d-%m-%Y') as data from fatture as f join relationship_fatture_studi on relationship_fatture_studi.id_fattura = f.id_fattura where id_dottore = $id_dottore and id_studio = ".$this->session->userdata('id_studio')."");
    }
    
    function delete_fattura($id_fattura) {
    	//cancello la fattura dalla relationship_fatture_studi
    	$this->db->where(['id_fattura' => $id_fattura]);
    	$this->db->delete('relationship_fatture_studi');
    	//ricavo l'id del dottore
    	$this->db->where(['id_fattura' => $id_fattura]);
    	$query = $this->db->get('fatture');
    	$fattura = $query->row();
    	$id_dottore = $fattura->id_dottore;
    	//percorso del file
    	$dir = "./fatture_dottori/".$id_dottore."/".$fattura->filename;
    	if(file_exists($dir)) {
    		//cancello il file se esiste
    		unlink($dir);
    	}
    	//cancello la fattura
    	$this->db->where(['id_fattura' => $id_fattura]);
    	$this->db->delete('fatture');
    	
    }
 
    function carica_fattura($filename, $data) {
        $date = new DateTime();
        $this->db->query("INSERT into fatture (id_dottore, filename, totale, data) VALUES (" . $data['id_dottore'] . ", '$filename', '" . $data['totale'] . "', '" . $date->format("Y-m-d") . "')");
        // lego la fattura allo studio
        $id_fattura = $this->db->insert_id();
        $this->db->insert('relationship_fatture_studi', ['id_fattura' => $id_fattura, 'id_studio' => $this->session->userdata('id_studio')]);
    }

    //ritorna un array che ha come indici gli id dei dottori relativi ed il contenuto di ogni elemento è un array associativo con tutte le info della visita
    function get_visite_odierne_by_query_dottori($query_dottori) {
        $array_visite = array();

        $data_odierna = date("Y-m-d");
        $data_odierna_escaped = $this->db->escape($data_odierna);

        foreach ($query_dottori->result() as $dottore) {
            $id_dottore = (int) $dottore->id;

            $query_visite_odierne = $this->db->query("
				SELECT *
				FROM visite
        JOIN relationship_visite_studi ON relationship_visite_studi.id_persona = visite.id
				WHERE id_dottore=" . $id_dottore . " AND data_visita=" . $data_odierna_escaped . " AND id_studio = ".$this->session->userdata('id_studio')."
				ORDER BY orario_visita ASC
			");

            $array_visite[$id_dottore] = $query_visite_odierne->result_array();
        }//foreach( $query_dottori->result() as $dottore )

        return $array_visite;
    }

//function get_visite_odierne_by_query_dottori
    //torna il numero totale di dottori registrati
    function get_tot_dottori() {
        // $query = $this->db->query("SELECT id FROM dottori ");
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('dottori', $this->session->userdata('id_studio'));
        $query = $this->db->get('dottori');
        return $query->num_rows();
    }

    function get_all_dottori() {
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('dottori', $this->session->userdata('id_studio'));
        $this->db->order_by('data');
        // return $this->db->query("SELECT * FROM dottori ORDER BY data ");
        return $this->db->get('dottori');
    }

    function get_dottore_by_id($id_dottore) {
        return $this->db->query("SELECT * FROM dottori WHERE id=" . $id_dottore . " ");
    }

    function get_prestazioni() {
        Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('prestazioni', $this->session->userdata('id_studio'));
        return $this->db->get('prestazioni');
    }

    function get_prestazioni_by_id_dottore($id_dottore) {
      $id_studio = Domini::get_id_studio();
      $this->db->join('relationship_prestazioni_dottori', 'relationship_prestazioni_dottori.id_dottore = dottori.id');
      $this->db->join('prestazioni', 'prestazioni.id = relationship_prestazioni_dottori.id_prestazione');
      $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = prestazioni.id');
      $this->db->where(['dottori.id' => $id_dottore, 'relationship_prestazioni_studi.id_studio' => $id_studio]);
      //seleziono i campi di interesse
      $this->db->select('dottori.id as id_dottore, prestazioni.id as id_prestazione, prestazioni.durata_prestazione as durata_prestazione, prestazioni.costo_prestazione as costo_prestazione, prestazioni.descrizione as descrizione');
      $query = $this->db->get('dottori');
      return $query;
    }

    function get_prestazione_by_id($id_prestazione) {
        return $this->db->query("SELECT * FROM prestazioni WHERE id=" . $id_prestazione . " ");
    }

    function add_dottore($nome, $dettagli, $telefono, $email, $orari_settimanali) {
        $nome = $this->db->escape($nome);
        $dettagli = $this->db->escape($dettagli);
        $telefono = $this->db->escape($telefono);
        $email = $this->db->escape($email);
        $orari_settimanali = $this->db->escape($orari_settimanali);
        // booleano rappresentante l'esito dell'INSERT
        $query = $this->db->query("INSERT INTO dottori (nome, dettagli, telefono, email, orari_settimanali) VALUES ( " . $nome . ", " . $dettagli . ", " . $telefono . ", " . $email . ", " . $orari_settimanali . " ) ");
        // id dell'ultima riga inserita
        $id_dottore = $this->db->insert_id();
        $this->db->insert('relationship_dottori_studi', ['id_persona' => $id_dottore, 'id_studio' => $this->session->userdata('id_studio')]);
        return $id_dottore;
    }

    function delete_dottore($id_dottore) {
        //in primis elimino gli orari del dottore per quello studio
        $bool1 = $this->db->delete('orari_dottori', ['id_dottore' => $id_dottore, 'id_studio' => $this->session->userdata('id_studio')]);
        //di seguito, elimino la relazione fra il medico e lo studio
        $bool2 = $this->db->delete('relationship_dottori_studi', ['id_studio' => $this->session->userdata('id_studio'), 'id_persona' => $id_dottore]);
        // controllo se il medico sia legato ad altri studi
        $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = relationship_prestazioni_dottori.id_prestazione');
        $bool4 = $this->db->delete('relationship_prestazioni_dottori', ['id_studio' => $this->session->userdata('id_studio'), 'id_dottore' => $id_dottore]);
        $bool3 = true;
        $query = $this->db->get_where('relationship_dottori_studi', ['id_persona' => $id_dottore]);
        if($query->num_rows() < 1) {
          $bool3 = $this->db->delete('dottori', ['id' => $id_dottore]);
        }
        return $bool1 && $bool2 && $bool3 && $bool4;
    }

    function modifica_dottore($id, $nome, $dettagli, $telefono, $email, $orari_settimanali) {
        $nome = $this->db->escape($nome);
        $dettagli = $this->db->escape($dettagli);
        $telefono = $this->db->escape($telefono);
        $email = $this->db->escape($email);
        $orari_settimanali = $this->db->escape($orari_settimanali);


        return $this->db->query("UPDATE dottori SET nome=" . $nome . ", dettagli=" . $dettagli . ", telefono=" . $telefono . ", email=" . $email . ", orari_settimanali=" . $orari_settimanali . " WHERE id=" . $id . " ");
    }

    function set_prestazione($data) {
        $result = false;
        $id = 0;
        if (isset($data['id']) && $data['id'] > 0) {
            $this->db->where('id', $data['id']);
            $descrizione = $data['descrizione'];
            $durata_prestazione = $data['durata_prestazione'];
            $costo_prestazione = $data['costo_prestazione'];
            $result = $this->db->update('prestazioni', ['descrizione' => $descrizione, 'costo_prestazione' => $costo_prestazione, 'durata_prestazione' =>$durata_prestazione]);
            //update delle relationship
            $this->db->where(['id_prestazione' => $data['id']]);
            $this->db->delete('relationship_categorie_prestazioni');
            //ricreo
            foreach ($data['categorie_prestazioni'] as $id_categoria) {
            	$this->db->insert('relationship_categorie_prestazioni', ['id_prestazione' => $data['id'], 'id_categoria' => $id_categoria]);
            }
            $id = $data['id'];
        } else {
            $result = $this->db->insert('prestazioni', $data);
            $id = $this->db->insert_id();
            $this->db->insert('relationship_prestazioni_studi', ['id_persona' => $id, 'id_studio' => $this->session->userdata('id_studio')]);
        }
        return $id;
    }

    function delete_prestazione($id_prestazione) {
        $this->db->delete('relationship_prestazioni_studi', ['id_persona' => $id_prestazione, 'id_studio' => $this->session->userdata('id_studio')]);
        return $this->db->query("DELETE FROM prestazioni WHERE id=" . $id_prestazione . " ");
    }

    function delete_prestazione_dottore($id_prestazione, $id_dottore) {
        return $this->db->delete('relationship_prestazioni_dottori', ['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]);
    }

    function add_prestazione_dottore($id_prestazione, $id_dottore)  {
      if($id_prestazione == "") {
        return TRUE;
      }
      $id_prestazione = intval($id_prestazione);
      $this->db->where(['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]);
      $query = $this->db->get('relationship_prestazioni_dottori');
      if($query->num_rows() > 0) {
        return TRUE;
      }
      return !($this->db->insert('relationship_prestazioni_dottori', ['id_prestazione' => $id_prestazione, 'id_dottore' => $id_dottore]));
    }

    public function aggiorna_orario($id_dottore, $post) {
      $bool = TRUE;
      if(!(isset($post['giorno']))) {
      	return false;
      }
      	$giorni = $post['giorno'];
      //giorni da aggiornare
      
      foreach ($giorni as $giorno) {
        $inizio = $giorno."-inizio";
        $fine = $giorno."-fine";
        //vedo se il dottore ha gia un'orario per quel giorno
        $this->db->where(['id_dottore' => $id_dottore, 'giorno' => $giorno, 'id_studio' => $this->session->userdata('id_studio')]);
        $query = $this->db->get('orari_dottori');
        if($query->num_rows() > 0) {
          $this->db->where(['id_dottore' => $id_dottore, 'giorno' => $giorno, 'id_studio' => $this->session->userdata('id_studio')]);
          $bool = $bool && $this->db->update('orari_dottori', ['orario_inizio' => $post[$inizio], 'orario_fine' => $post[$fine]]);
        }
        else {
          $bool = $bool && $this->db->insert('orari_dottori', ['orario_inizio' => $post[$inizio], 'orario_fine' => $post[$fine], 'id_dottore' => $id_dottore, 'giorno' => $giorno, 'id_studio' => $this->session->userdata('id_studio')]);
        }
      }
      return $bool;
    }

    public function get_orari_dottore($id_dottore)  {
      $orari = [];
      for ($i=0; $i < 8; $i++) {
        $this->db->where(['id_dottore' => $id_dottore, 'giorno' => $i, 'id_studio' => $this->session->userdata('id_studio')]);
        $orari[] = $this->db->get('orari_dottori')->row();
      }
      return $orari;
    }
    
    public function get_categorie_prestazioni() {
    	$id_studio = $this->session->userdata('id_studio');
    	$query = $this->db->get_where('categorie_prestazioni', ['id_studio' => $id_studio]);
    	return $query;
    }
    
    public function set_categoria_prestazioni($post) {
    	//recupre l'id dello studio
    	$id_studio = $this->session->userdata('id_studio');
    	//recupre il nome della categoria
    	$categoria = $post['categoria_prestazioni'];
    	//inserisco la categoria
    	$bool = $this->db->insert('categorie_prestazioni', ['id_studio' => $id_studio, 'categoria' => $categoria]);
    	//recupero l'id della categoria appena inserita
    	$id_categoria = $this->db->insert_id();
    	//se inserimento a buon fine
    	if($bool) {
    		return $id_categoria;
    	}
    	else {
    		return $bool;
    	}
    }
    
    public function delete_categoria_prestazioni($id_categoria) {
    	//cancello le relatioship fra categoria e prestazioni
    	$this->db->where(['id_categoria' => $id_categoria]);
    	$bool = $this->db->delete('relationship_categorie_prestazioni');
    	//elimino la categoria
    	$this->db->where(['id' => $id_categoria]);
    	$bool = $bool && $this->db->delete('categorie_prestazioni');
    	return $bool;
    }
    
    public function get_categoria_prestazioni_by_id($id_categoria) {
    	$query = $this->db->get_where('categorie_prestazioni', ['id' => $id_categoria]);
    	return $query->row();
    }
    
    public function update_categoria_prestazioni($post) {
    	$categoria = $post['descrizione'];
    	$id_categoria = $post['id'];
    	$this->db->where(['id' => $id_categoria]);
    	$bool = $this->db->update('categorie_prestazioni', ['categoria' => $categoria]);
    	return $bool;
    }
    
    public function get_categorie_by_id_prestazione($id_prestazione) {
    	$this->db->where(['id_prestazione' => $id_prestazione]);
    	$this->db->select('relationship_categorie_prestazioni.id_categoria as id');
    	$query = $this->db->get('relationship_categorie_prestazioni');
    	$array = [];
    	foreach ($query->result() as $row) {
    		$array[] = (int)($row->id);
    	}
    	return $array;
    }

}
