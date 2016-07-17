<?php
  /**
   *
   */
  class associazioni_studi_domini extends CI_Model {
    /**
    * Invoca il costruttore della classe da cui eredita, settando l'id dello studio
    * corrispondente al dominio visitato
    */
    function __construct()  {
      parent::__construct();
      $this->load->helper('url');
      $this->load->helper('domini');
    }

    /**
    * @return l'array delle righe rappresentanti i pazienti e/o i dottori relativi
    * allo studio-sottodominio che si sta utilizzando
    */
    public function get_persone_by_studio($categoria)  {
      if(strcmp($categoria,'dottori')==0) {
        return $this->utility_get_persone_by_studio('dottori');
      }
      else if(strcmp($categoria, 'pazienti')==0) {
        return $this->utility_get_persone_by_studio('pazienti');
      }
      else {
        return array_merge($this->utility_get_persone_by_studio('dottori'), $this->utility_get_persone_by_studio('pazienti'));
      }
    }


    /*
    SELECT	*
  FROM	relationship_pazienti_studi
  JOIN	pazienti
  ON		relationship_pazienti_studi.id_persona = pazienti.id
  WHERE relationship_pazienti_studi.id_studio = get_id_studio_by_sottodominio()
    */
    private function utility_get_persone_by_studio($categoria){
      $id_studio = Domini::get_id_studio();
      Domini::aggiungi_join_relationship_categoria_studi_where_id_studio($categoria, $id_studio);
      $query = $this->db->get($categoria);
      return $query->result_array();
    }

  }


 ?>
