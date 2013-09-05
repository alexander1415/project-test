<?php

class Autordao extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function listar(){
		$this->db->select('*');
		return $this->db->get('autor')->result_array();	
	}	

}
