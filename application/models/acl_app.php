<?php

/**
 *
 */
class acl_app extends CI_Model  {
	
	var $gallery_path;
	var $gallery_path_url;
	var $array_image_mime;

  function __construct()  {
    $this->load->helper('phpass');
    $this->load->helper('date');
    $this->load->helper('domini');
    $this->gallery_path  = APPPATH."/../".'images';
    $this->gallery_path_url = base_url('images');
    $this->array_image_mime = ['image/gif', 'image/jpeg', 'image/png'];
  }
  
  public function get_posts() {
  	$id_studio = Domini::get_id_studio();
  	//recupero i posts
  	$this->db->where(['id_studio' => $id_studio]);
  	$query = $this->db->get('post');
  	$posts = [];
  	foreach ($query->result() as $post) {
  		$posts[] = [
  				'titolo' => $post->titolo,
  				'url' => base_url("posts".DIRECTORY_SEPARATOR.$post->nome_file)
  		];
  	}
  	return $posts;
  }

  public function get_visite_by_api_key($api_key) {
    //ricavo l'id dello studio
    $id_studio = Domini::get_id_studio();
    //ricavo l'id del paziente
    $id_paziente = $this->get_id_paziente_by_api_key($api_key);
    //ricavo le visite del paziente
    //lego la visita al dottore
    $this->db->join('dottori as d', 'd.id = v.id_dottore');
    //lego la visita alla prestazione
    $this->db->join('prestazioni as p', 'p.id = v.id_prestazione');
    //lego la visita allo studio
    $this->db->join('relationship_visite_studi', 'relationship_visite_studi.id_persona = v.id');
    $this->db->where(['id_studio' => $id_studio]);
    //seleziono i campi
    $this->db->select('d.nome as dottore, p.descrizione as descrizione, v.orario_visita as ora, v.data_visita as data');
    //eseguo la query
    $result = $this->db->get('visite as v');
    return $result;
  }

  public function get_prestazioni_studio()  {
    //ricavo l'id dello studio
    $id_studio = Domini::get_id_studio();
    //join con relationship_prestazioni_studi
    $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = prestazioni.id');
    $query = $this->db->get_where('prestazioni', ['id_studio' => $id_studio]);
    return $query->result();
  }

  public function get_id_paziente_by_api_key($api_key)  {
    $query = $this->db->get_where('pazienti', ['api_key' => $api_key]);
    return $query->row()->id;
  }

  public function inserisci_visita_by_giorno_ora_prestazione($id_dottore, $id_paziente, $data, $ora, $prestazione)  {
    //ricavo l'id dello studio
    $id_studio = Domini::get_id_studio();
    // in primis, ricavo l'id della prestazione
    $query = $this->db->get_where('prestazioni', ['descrizione' => $prestazione]);
    $id_prestazione = $query->row()->id;
    //prestazione inesistente nello studio
    $descrizione = $query->row()->descrizione;
    if(!isset($id_prestazione)) {
      return FALSE;
    }
    //prendo nome e cognome del paziente
    $query = $this->db->get_where('pazienti', ['id' => $id_paziente]);
    $nome_paziente = $query->row()->nome;
    $cognome_paziente = $query->row()->cognome;
    //aggiungo la visita
    $boolean = $this->db->insert('visite', ['nome_paziente' => $nome_paziente." ".$cognome_paziente, 'id_paziente' => $id_paziente, 'id_dottore' => $id_dottore, 'data_visita' => $data, 'orario_visita' => $ora, 'id_prestazione' => $id_prestazione, 'visita_confermata' => '0', 'descrizione' => $descrizione]);
    //ricavo l'id della visita appena inserita
    $id_visita = $this->db->insert_id();
    //inserisco la visita nella relationship_visite_studi
    $boolean2 = $this->db->insert('relationship_visite_studi', ['id_persona' => $id_visita, 'id_studio' => $id_studio]);
    //mail
    $id_studio = Domini::get_id_studio();
    $this->db->where(['id_studio' => $id_studio]);
    $query = $this->db->get('associazioni_studi_domini');
    $mail_prenotazioni = $query->row()->mail_prenotazioni;
    if($mail_prenotazioni != "") {
    	mail($mail_prenotazioni, "Nuova Prenotazione", "Nuova prenotazione a nome di: ".$nome_paziente." ".$cognome_paziente." ");
    }
    return $boolean && $boolean2;
  }
  
  public function cancella_visita($id_paziente, $data_visita, $orario_visita) {
  	//ricavo l'id dello studio
  	$id_studio = Domini::get_id_studio();
  	//ricavo l'id della visita
  	$this->db->where(['id_paziente' => $id_paziente, 'data_visita' => $data_visita, 'orario_visita' => $orario_visita]);
  	$query = $this->db->get('visite');
  	//se la visita non esiste
  	if($query->num_rows() <= 0) {
  		return false;
  	}
	//altrimenti
	$id_visita = $query->row()->id;
	//cancello l'entry nella relationship
	$this->db->where(['id_studio' => $id_studio, 'id_persona' => $id_visita]);
	$bool = $this->db->delete('relationship_visite_studi');
	//cancello la visita
	$this->db->where(['id' => $id_visita]);
	$bool = $bool && $this->db->delete('visite');
	return $bool;
  }

  public function get_visite_del_giorno_by_dottore($id_dottore, $day) {
    $id_studio = Domini::get_id_studio();
    $id_dottore = intval($id_dottore);
    $this->db->join('prestazioni', 'prestazioni.id = visite.id_prestazione');
    $this->db->join('relationship_visite_studi', 'relationship_visite_studi.id_persona = visite.id');
    $this->db->where(['id_studio' => $id_studio]);
    $query = $this->db->get_where('visite', ['visite.id_dottore' => $id_dottore, 'data_visita' => $day, 'visita_confermata' => 1]);
    return $query->result();
  }

  public function get_all_dottori() {
      Domini::aggiungi_join_relationship_categoria_studi_where_id_studio('dottori', Domini::get_id_studio());
      $this->db->order_by('data');
      // return $this->db->query("SELECT * FROM dottori ORDER BY data ");
      return $this->db->get('dottori');
  }

  public function get_all_dottori_by_prestazione($prestazione) {
      //ricavo l'id della prestazione
      $query = $this->db->get_where('prestazioni', ['descrizione' => $prestazione]);
      $id_prestazione = $query->row()->id;
      //id dello studio
      $id_studio = Domini::get_id_studio();
      //relationship con lo studio
      // $this->db->join('relationship_dottori_studi', 'relationship_dottori_studi.id_persona = dottori.id');
      //join con relationship_prestazioni_dottori
      $this->db->join('relationship_prestazioni_dottori', 'relationship_prestazioni_dottori.id_dottore = dottori.id');
      //lego la prestzione allo studio
      $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = relationship_prestazioni_dottori.id_prestazione');
      //seleziono l'id della prestazione
      $this->db->where(['relationship_prestazioni_dottori.id_prestazione' => $id_prestazione, 'relationship_prestazioni_studi.id_studio' => $id_studio]);
      // return $this->db->query("SELECT * FROM dottori ORDER BY data ");
      return $this->db->get('dottori');
  }


  public function get_prestazioni_dottore($id_dottore)  {
    $id_studio = Domini::get_id_studio();
    $this->db->join('relationship_prestazioni_dottori', 'relationship_prestazioni_dottori.id_dottore = dottori.id');
    $this->db->join('prestazioni', 'prestazioni.id = relationship_prestazioni_dottori.id_prestazione');
    $this->db->join('relationship_prestazioni_studi', 'relationship_prestazioni_studi.id_persona = prestazioni.id');
    $this->db->where(['dottori.id' => $id_dottore, 'relationship_prestazioni_studi.id_studio' => $id_studio]);
    $query = $this->db->get('dottori');
    $prestazioni = array();
    foreach ($query->result() as $row) {
      $prestazioni[] = [ $row->descrizione, $row->durata_prestazione, $row->costo_prestazione ];
    }
    return $prestazioni;
  }

  public function get_orario_dottore_by_day($id_dottore, $day) {
    //ricavo l'id dello studio
    $id_studio = Domini::get_id_studio();
    //ricevo in input l'intero corrispondente al giorno...
    $query = $this->db->get_where('orari_dottori', ['id_dottore' => $id_dottore, 'giorno' => strval($day), 'id_studio' => $id_studio]);
    return $query->row();

  }
  // controlla se l'api_key esiste o no
  public function control_api_key($api_key) {
      $id_studio = Domini::get_id_studio();
    //join con relationship_pazienti_studi
    $this->db->join('relationship_pazienti_studi', 'relationship_pazienti_studi.id_persona = pazienti.id');
    //WHERE
    $this->db->where(['id_studio' => $id_studio]);
    //controllo l'api_key
    $this->db->where(['api_key' => $api_key]);
    $query = $this->db->get('pazienti');
    if($query->num_rows() > 0) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  public function get_points_by_api_key($api_key) {
    //recupero l'id del paziente corrispondente all'api_key
    $this->db->where(['api_key' => $api_key]);
    $query = $this->db->get('pazienti');
    $id_paziente = $query->row()->id;
    //ricavo l'id dello studio
    $id_studio = Domini::get_id_studio();
    //inizializzo l'array dei punteggi del paziente
    $punteggi = array();
    //join con relationship_categorie_punti_studi
    $this->db->join('relationship_categorie_punti_studi', "relationship_categorie_punti_studi.id_categoria = categorie_punti.id" );
    //seleziono l'id dello studio
    $this->db->where(['id_studio' => $id_studio]);
    //in primis, ricavo le categorie di punteggio
    $query = $this->db->get('categorie_punti');
    //per ogni categoria, ricavo il punteggio del paziente
    foreach ($query->result() as $row) {
      //ricavo l'id della categoria considerata
      $id_categoria = $row->id;
      //ricavo il nome della categoria
      $nome_categoria = $row->categoria;
      //join con relationship_categorie_punti
      $this->db->join('relationship_categorie_punti', 'relationship_categorie_punti.id_punti = punti_fedelta.id');
      //seleziono l'id dell'utente
      $this->db->where(['id_paziente' => $id_paziente]);
      //seleziono la categoria
      $this->db->where(['id_categoria' => $id_categoria]);
      //seleziono la somma del valore 'punti'
      $this->db->select_sum('punti', 'punti_tot');
      //eseguo la query
      $query = $this->db->get('punti_fedelta');
      //ricavo il punteggio
      $points = $query->row()->punti_tot;
      //aggiungo il punteggio all'array dei punteggi
      $punteggi[$nome_categoria] = $points != NULL ? $points : 0;
    }
    //ritorno l'array dei punteggi
    return $punteggi;

  }
  public function login_app($username, $password) {
      //id dello studio
      $id_studio = Domini::get_id_studio();
      //Controllo se lo username sia gia esistente
      $query = $this->db->query("SELECT * FROM pazienti JOIN relationship_pazienti_studi ON pazienti.id = relationship_pazienti_studi.id_persona WHERE username = '$username' AND id_studio = '$id_studio'");
      if($query->num_rows() > 0) {
        //nome utente gia esistente
        $query = $query->row();
        //creo l'hasher per controllare la password
        $hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
        //ricavo il timestamp
        $timestamp = $query->data;
        //se  timestamp+password corrisponde
        if($hasher->CheckPassword($timestamp.$password, $query->password)) {
          //ritorno l'api_key
            $api_key = $query->api_key;
            //l'operazione e' andata a buon fine
            return $api_key;
        }
        
        //altrimenti, se la password e' errata
        return -2;
      }
    }
    
    public function registrazione($post) {
    	$data = array();
    	$data['username'] = $post['email'];
    	$password = $post['password'];
    	$data['nome'] = $post['nome'];
    	$data['cognome'] = $post['cognome'];
//     	$data['cap'] = $post['cap'];
//     	$data['telefono'] = $post['telefono'];
//     	$data['indirizzo'] = $post['indirizzo'];
    	$data['data_nascita'] = $post['data_nascita'];
    	$data['firebase_id'] = $post['firebase_id'];
    	foreach ($data as $item) {
    		//se uno degli elementi e' NULL
    		if (!isset($item)) {
    			return false;
    		}
    	}
    	//controllo che lo username non sia gia in uso
    	$query = $this->db->get_where('pazienti', ['username' => $data['username']]);
    	if ($query->num_rows() > 0) {
    		return false;
    	}
    	//email uguale a username
    	$data['email'] = $data['username'];
    	//creo l'hasher per criptare la password
    	$hasher = new PasswordHash(PHPASS_HASH_STRENGTH, PHPASS_HASH_PORTABLE);
    	//inserisco dati nel db
    	$bool1 = $this->db->insert('pazienti', $data);
   		//recupero l'id del paziene appena inserito
   		$id_paziente = $this->db->insert_id();
    	//id dello studio
    	$id_studio = Domini::get_id_studio();
    	//inserisco la relazione fra paziente e studio
    	$bool2 = $this->db->insert('relationship_pazienti_studi', ['id_persona' => $id_paziente, 'id_studio' => $id_studio]);
    	//username
    	$username = $data['username'];
    	//eseguo query per ricavare il timestamp
    	$query = $this->db->query("SELECT * FROM pazienti JOIN relationship_pazienti_studi ON pazienti.id = relationship_pazienti_studi.id_persona WHERE username = '$username' AND id_studio = '$id_studio'");
    	//ricavo il timestamp
    	$timestamp = $query->row()->data;
    	//genero la password
    	$password = $hasher->HashPassword($timestamp.$password);
    	//genero l'api_key
    	$api_key = $hasher->HashPassword($timestamp.$password);
    	//inserisco api_key e password nel db
    	$this->db->where(['id' => $id_paziente]);
    	$bool3 = $this->db->update('pazienti', ['password' => $password, 'api_key' => $api_key, 'data' => $timestamp]);
    	return $bool1 && $bool2 && $bool3;
    }
    
    public function get_gallery() {
    	$id_studio = Domini::get_id_studio();
		//creo il path
		$gallery_path = realpath($this->gallery_path.$id_studio);
		//recupero i file nella cartella delle immagini
		$files = scandir($gallery_path);
    	//elimino gli elementi che non sono immagini
    	$files = array_diff($files, ['thumbs', '.', '..']);
    	//per ogni immagine, passo url dell'immagine e del thumb
    	$images = array();
    	foreach ($files as $file) {
    		//se il file e' un immagine
    		if(in_array($this->getMimeType($gallery_path.DIRECTORY_SEPARATOR.$file), $this->array_image_mime))	{
    			$thumb = $this->gallery_path_url . $id_studio. DIRECTORY_SEPARATOR . "/thumbs/" . $file;
    			$is_image = true;
    		}
    		//altrimenti
    		else {
    			$thumb =explode('.', $file);
    			$thumb = $thumb[0];
    			$thumb = $thumb.".jpg";
    			$thumb = $this->gallery_path_url .$id_studio. DIRECTORY_SEPARATOR . "/thumbs/" . $thumb;
    			$is_image = false;
    		}
    		$images[] = [
    				'file_url' => $this->gallery_path_url . $id_studio. DIRECTORY_SEPARATOR . $file,
    				'file_thumb' => $thumb,
    				'file_name' => $file,
    				'is_image' => $is_image
    		];
    	}
    	return $images;
    
    
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
 ?>
