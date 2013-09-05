<?php

class Librodao extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	
	public function listar(){
		$this->db->select('*');
		return $this->db->get('vw_libro')->result_array();	
	}
	
	
	public function buscar_categoria($id){
		$this->db->select('*');
		if($id!=1)$this->db->where('catid',$id);
		return $this->db->get('vw_libro')->result_array();
	}
	
	public function buscar_autor($id){
		$this->db->select('*');
		$this->db->where('auid',$id);
		return $this->db->get('vw_libro')->result_array();
	}
	
	public function buscar($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$data = $this->db->get('vw_libro')->result_array();
		if(count($data)==0)return NULL;
		return $data[0];		
	}
	
}
