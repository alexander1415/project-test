<?php

class Categoriadao extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function listar(){
		$this->db->select('*');
		return $this->db->get('categoria')->result_array();	
	}	

}
