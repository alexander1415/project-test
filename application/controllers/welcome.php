<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct() {
		parent::__construct();
		$this -> load -> model('categoriadao');
		$this -> load -> model('autordao');
		$this -> load -> model('librodao');
	}
	
	
	
	public function index()
	{
		
		$data['categorias']=$this->categoriadao->listar();
		$dtContenido['libros']=$this->librodao->listar();
		$data['autores']=$this->autordao->listar();
		$data['contenido']=$this->load->view('libro/tablaLibro',$dtContenido,TRUE);						
		$this->load->view('template',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */