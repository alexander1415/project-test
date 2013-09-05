<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Libro extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this -> load -> model('categoriadao');
		$this -> load -> model('autordao');
		$this -> load -> model('librodao');
		$this -> load ->library('pagination');
	}
	
	public function index()
	{
		
		$data['categorias']=$this->categoriadao->listar();
		$data['autores']=$this->autordao->listar();					
		$this->load->view('template',$data);
	}
	
	
	
	public function porcategoria($id){
		$dataCat['libros'] = $this->librodao->buscar_categoria($id);
		$data['categorias']=$this->categoriadao->listar();
		$data['autores']=$this->autordao->listar();
		$data['contenido']= $this->load->view('libro/tablaLibro',$dataCat,TRUE);							
		$this->load->view('template',$data);		
	}
	
	
	public function porautor($id){
		$dataCat['libros'] = $this->librodao->buscar_autor($id);
		$data['categorias']=$this->categoriadao->listar();
		$data['autores']=$this->autordao->listar();
		$data['contenido']= $this->load->view('libro/tablaLibro',$dataCat,TRUE);							
		$this->load->view('template',$data);
	}
	
		
	
	public function detalle($id=1){
		
		$libro = $this->librodao->buscar($id);
		if($libro!=NULL){
			$data['categorias']=$this->categoriadao->listar();
			$data['autores']=$this->autordao->listar();
			$this->session->set_userdata('prev_page',$_SERVER['HTTP_REFERER']);			
			$dataView['prev_page']=$this->session->userdata('prev_page');
			$dataView['libro']=$libro;			
			$data['contenido'] = $this->load->view('libro/detalleLibro',$dataView,TRUE);
			$this->load->view('template',$data);			
		}else{
			redirect(base_url());
		}		
		
	}
	
}
