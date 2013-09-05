<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Carrito extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this -> load -> model('categoriadao');
		$this -> load -> model('autordao');
		$this -> load -> model('librodao');
	}

	public function index() {

		$data['categorias'] = $this -> categoriadao -> listar();
		$data['autores'] = $this -> autordao -> listar();
		$args['productos']= $this -> cart -> contents();
		$args['importeTotal']= $this -> cart -> total();		
		$dataCar['prev_page'] = $this -> session -> userdata('prev_page');		
		$dataCar['images'] = array('banner1.jpg','banner2.jpg','banner3.jpg','banner2.jpg','banner7.jpg');
		$dataCar['carrito'] = $this->load->view('carrito/lista_carrito',$args,TRUE);
		$data['contenido'] = $this -> load -> view('carrito/carro', $dataCar, TRUE);
		$this -> load -> view('template', $data);
	}

	public function agregar_producto($id) {
		$prod = $this -> librodao -> buscar($id);

		if ($prod != NULL) {
			$data = array('id' => $prod['id'], 'qty' => 1, 'price' => $prod['precio'], 'name' => $prod['titulo'], 'options' => array());
			$this -> cart -> insert($data);
			redirect(base_url('carrito'));
		}
	}

	public function cambiar_cantidad() {
		if ($this -> input -> server('REQUEST_METHOD') === 'POST') {
			$id = trim($this -> input -> post('id'));
			$cnt = trim($this -> input -> post('cnt'));
			$data = $this -> cart -> contents();
			foreach ($data as $item) {
				if ($item['id'] == $id) {
					$item['qty'] = $cnt;
					$this -> cart -> update($item);
				}
			}
			$args['productos']= $this -> cart -> contents();
			$args['importeTotal']= $this -> cart -> total();
			echo $this->load->view('carrito/lista_carrito',$args,TRUE);
		}
	}

	public function remover_producto($id) {

		$data = $this -> cart -> contents();
		foreach ($data as $item) {
			if ($item['id'] == $id) {
				$item['qty'] = 0;
				$this -> cart -> update($item);
			}
		}
		redirect(base_url('carrito'));

	}

}
