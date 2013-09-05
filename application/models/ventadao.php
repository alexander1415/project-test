<?php

class Ventadao extends CI_Model {

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
	
	
	public function guardar_det($datos){
		 $this->db->insert('detalle_venta', $data);
	}
	public function guardar($datos){
        $this->db->insert('venta', $data);
		$insert_id = $this -> db -> insert_id();
        return $insert_id;
	}
	
}
