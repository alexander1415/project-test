<?php

class Clientedao extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function add_cliente($data) {
        $this->db->insert('cliente', $data);
		$insert_id = $this -> db -> insert_id();
        return $insert_id;
    }
	
	
	public function find($id){
		$this->db->select('*');
		$this->db->where('id',$id);
		$data=$this->db->get('cliente')->result_array();
		return $data[0];			
	}

}
