<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class categorie_pazienti_data extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database('default');
    }

  /**
  * @return l'array delle info sulle categorie per ciascun paziente
  * ritornato dall'array $query_pazienti_array (->result_array())
  */
	function get_categorie_by_query_pazienti_array( $query_pazienti_array )  {
		$array_categorie = array();

			foreach( $query_pazienti_array as $paziente )
			{
				//ottengo la prima categorie del paziente
				$categorie_del_paziente = $this->db->query("
					SELECT * FROM associazioni_pazienti_categorie
				  JOIN categorie_pazienti
					ON associazioni_pazienti_categorie.id_categoria=categorie_pazienti.id_categoria
          join relationship_categorie_studi on relationship_categorie_studi.id_categoria = categorie_pazienti.id
					WHERE associazioni_pazienti_categorie.id_paziente= $paziente->id and relationship_categorie_studi.id_studio = $this->session->userdata('id_studio')
					LIMIT 1
				");

				foreach( $categorie_del_paziente->result() as $categoria_del_paziente )
				{
					$array_categorie[$paziente->id] = array(
						"id_categoria" => $categoria_del_paziente->id_categoria,
						"nome_categoria" => $categoria_del_paziente->nome_categoria
					);
				}

			}//foreach( $query_pazienti->result() as $paziente )

			//print_r($array_categorie);
			//die();

		return $array_categorie;
	}

	/**
  * @return l'array delle info sulle categorie per ciascun paziente
  * ritornato dalla $query_pazienti
  */
	function get_categorie_by_query_pazienti( $query_pazienti )  {
		$array_categorie = array();

		if( $query_pazienti->num_rows() > 0 )
		{
      $id_studio =$this->session->userdata('id_studio');
			foreach( $query_pazienti->result() as $paziente )
			{
				//ottengo la prima categorie del paziente
				$categorie_del_paziente = $this->db->query("
					SELECT * FROM associazioni_pazienti_categorie
					JOIN categorie_pazienti
					ON associazioni_pazienti_categorie.id_categoria=categorie_pazienti.id_categoria
          join relationship_categorie_studi on relationship_categorie_studi.id_categoria = categorie_pazienti.id_categoria
					WHERE associazioni_pazienti_categorie.id_paziente= $paziente->id and relationship_categorie_studi.id_studio = $id_studio
					LIMIT 1
				");

				foreach( $categorie_del_paziente->result() as $categoria_del_paziente )
				{
					$array_categorie[$paziente->id] = array(
						"id_categoria" => $categoria_del_paziente->id_categoria,
						"nome_categoria" => $categoria_del_paziente->nome_categoria
					);
				}

			}//foreach( $query_pazienti->result() as $paziente )
		}

		return $array_categorie;

	}//function get_categorie_by_query_pazienti

	/** ritorna l'array con gli id di tutte le categorie assegnate al paziente passato come argomento
  */
	function ottieni_categorie_del_paziente( $id_paziente )  {
		$array_categorie = array();

		//escaping
		$id_paziente = (int)$id_paziente;
    $id_studio = $this->session->userdata('id_studio');
		$categorie_paziente = $this->db->query("SELECT associazioni_pazienti_categorie.id_categoria as id_categoria FROM associazioni_pazienti_categorie join relationship_categorie_studi on relationship_categorie_studi.id_categoria = associazioni_pazienti_categorie.id_categoria  WHERE id_paziente=".$id_paziente." and relationship_categorie_studi.id_studio = $id_studio ");

		foreach( $categorie_paziente->result() as $categoria )  {
			$array_categorie[] = (int)$categoria->id_categoria;
		}

		return $array_categorie;
	}

  /**
  * @return Array dei contatori dei pazienti per ciascuna categoria.
  * NON necessita di essere legata alla studio, essendo utilizzata solo
  * con argomento get_all_categorie()
  */
	function get_count_pazienti_per_categoria( $all_categorie_pazienti ) {
		$array_counter = array();
    $id_studio = $this->session->userdata('id_studio');
		//elaboro ogni singola categoria pazienti...
		foreach( $all_categorie_pazienti->result() as $categoria )
		{
			$id_categoria = $categoria->id_categoria;

			$pazienti_in_categoria = $this->db->query("SELECT COUNT(*) FROM associazioni_pazienti_categorie join relationship_pazienti_studi on relationship_pazienti_studi.id_persona = associazioni_pazienti_categorie.id_paziente WHERE associazioni_pazienti_categorie.id_categoria=".$id_categoria." AND relationship_pazienti_studi.id_studio = $id_studio");
			$pazienti_in_categoria = $pazienti_in_categoria->result_array();
			$pazienti_in_categoria = $pazienti_in_categoria[0]["COUNT(*)"];

			$array_counter[] = $pazienti_in_categoria;//ADD
		}

		return $array_counter;
	}

  /**
  * Ritorna la categoria in base al suo id
  */
	function get_categoria_pazienti_by_id( $id_categoria ) {
		//escaping
		$id_categoria = (int)$id_categoria;

		return $this->db->query("SELECT * FROM categorie_pazienti WHERE id_categoria=".$id_categoria." ");
	}

  /**
  * Permette la modifica della denominazione di una categoria
  */
	function edit_categoria_pazienti( $id_categoria, $post ) {
		//escaping
		$id_categoria = (int)$id_categoria;
		$post["nome_categoria"] = $this->db->escape( substr((string)$post["nome_categoria"],0,190) );

		return $this->db->query("UPDATE categorie_pazienti SET nome_categoria=".$post["nome_categoria"]." WHERE id_categoria=".$id_categoria." ");
	}

  /**
  * Elimina una categoria (a partire dal suo id) facente parte della categorizzazione dei pazienti dello studio specifico
  */
	function delete_categoria_pazienti( $id_categoria )  {
		$id_categoria = (int)$id_categoria;
    $id_studio = $this->session->userdata('id_studio');
    //elimino tutti valori in associazioni_pazienti_categorie con l'id della categoria
    $this->db->delete('associazioni_pazienti_categorie', ['id_categoria' => $id_categoria]);
    //Elimina la riga corrispondente alla categoria nella tabella relationship_categorie_studi (per la quale e' una foreign key)
    $this->db->delete('relationship_categorie_studi',['id_categoria' => $id_categoria, 'id_studio' => $id_studio ]);
		return $this->db->query("DELETE FROM categorie_pazienti WHERE id_categoria=".$id_categoria." ");
	}

  /**
  * Aggiunge categoria di pazienti per lo studio da cui si sta effettuando l'aggiunta
  */
	function add_categoria_pazienti($post) {
		//escaping
    $this->db->insert('categorie_pazienti', ['nome_categoria' =>  substr((string)$post["nome_categoria"],0,190) ]);
		// $post["nome_categoria"] = $this->db->escape( substr((string)$post["nome_categoria"],0,190) );
    $id_categoria = $this->db->insert_id();
    $id_studio = $this->session->userdata('id_studio');
    return $this->db->insert('relationship_categorie_studi', ['id_categoria' => $id_categoria, 'id_studio' => $id_studio]);
		// return $this->db->query("INSERT INTO categorie_pazienti ( nome_categoria ) VALUES ( ".$post["nome_categoria"]." ) ");
	}

  /**
  * @return le categorie di suddivisione dei pazienti dello specifico studio
  */
	function get_all_categorie_pazienti()  {
    $id_studio = $this->session->userdata('id_studio');
    $this->db->join('relationship_categorie_studi', 'relationship_categorie_studi.id_categoria = categorie_pazienti.id_categoria');
    $this->db->where('relationship_categorie_studi.id_studio = '.$id_studio);
    $this->db->select('categorie_pazienti.id_categoria as id_categoria, categorie_pazienti.nome_categoria as nome_categoria, categorie_pazienti.data_aggiunta as data_aggiunta');
    $query = $this->db->get('categorie_pazienti');
    return $query;
	}



}
