<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Compra extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('categoriadao');
        $this->load->model('autordao');
        $this->load->model('librodao');
        $this->load->model('clientedao');
        $this->load->model('ventadao');
        $this->load->library('form_validation');
    }

    public function datos() {
        $data['categorias'] = $this->categoriadao->listar();
        $data['autores'] = $this->autordao->listar();
        $dataCar['productos'] = $this->cart->contents();
        $dataCar['images'] = array('banner1.jpg', 'banner2.jpg', 'banner6.jpg', 'banner2.jpg', 'banner7.jpg');
        $data['contenido'] = $this->load->view('carrito/compra', $dataCar, TRUE);
        $this->load->view('template', $data);
    }

    public function pago() {
        if ($this->session->userdata('paso') == 'pago') {
            $data['categorias'] = $this->categoriadao->listar();
            $data['autores'] = $this->autordao->listar();
            $dataCar['productos'] = $this->cart->contents();
            $dataCar['images'] = array('banner1.jpg', 'banner2.jpg', 'banner6.jpg', 'banner2.jpg','banner7.jpg');
			
			$userid = $this->session->userdata('cliente_id_agregado');
			$user = $this->clientedao->find($userid);			
			$dataCar['val_cliente']=$user['remitente'];
			
			
			$total = $this->cart->total();
			$dataCar['val_importe']=$this->cart->total();
			$dataCar['val_igv']=$total*.18;
			$dataCar['val_total']=$this->cart->total()+($this->cart->total()*.18);			
			
            $data['contenido'] = $this->load->view('carrito/pago', $dataCar, TRUE);
            $this->load->view('template', $data);
        } else {
            redirect('carrito');
        }
    }


	public function pagar_procesar(){
		if ($this->session->userdata('paso') == 'pago') {
			if ($this -> input -> server('REQUEST_METHOD') === 'POST'){
				
				$data['categorias'] = $this->categoriadao->listar();
            	$data['autores'] = $this->autordao->listar();
            	$dataCar['productos'] = $this->cart->contents();
            	$dataCar['images'] = array('banner1.jpg', 'banner2.jpg', 'banner6.jpg', 'banner2.jpg','banner7.jpg');			
				$userid = $this->session->userdata('cliente_id_agregado');
				
				$user = $this->clientedao->find($userid);
				$total = $this->input->post('total');
				$cuenta = $this -> input->post('hd_cuenta');
				
				
				$this->db->trans_start(); //inicia bd trans
				
				
				$rowVenta['tipo'] = 1;
				$rowVenta['importe'] = $total;
				$rowVenta['cliente_id'] = $user['id'];
				$rowVenta['empleado_id'] = 1;//pagina web
				
				$idVenta = $this->ventadao->guardar($rowVenta);
				
				
				foreach ($this->cart->contents() as $row) {
					$detRow['cantidad']= $row['qty'];
					$detRow['precio']= $row['price'];
					$detRow['venta_id']= $idVenta;
					$detRow['libro_id']= $row['id'];
					$this->clientedao->guardar_det($detRow);					
				}
						
											
				
			}			
		}			
		
	}

    public function guardar_datos() {
        $this->form_validation->set_message('required', '* Esta información es obligatoria.');
        $this->form_validation->set_message('is_natural_no_zero', '* Seleccione una opción.');
        $this->form_validation->set_message('numeric', 'Ingrese un número valido.');
        $this->form_validation->set_message('valid_email', 'Ingrese un correo valido.');

        $this->form_validation->set_rules('remitente', 'Nombres y Apellidos ', 'required|trim');
        $this->form_validation->set_rules('destino', 'Nombres Y Apellidos', 'required|trim');
        $this->form_validation->set_rules('correo', 'Correo', 'required|trim|valid_email');
        $this->form_validation->set_rules('celular', 'Celular', 'required|trim|numeric');
        $this->form_validation->set_rules('direccion', 'Direccion', 'required|trim');
		
        if ($this->form_validation->run()) {
            $remitente = $this->input->post('remitente');
            $destino = $this->input->post('destino');			
            $correo = $this->input->post('correo');
            $direccion = $this->input->post('direccion');
            $celular = $this->input->post('celular');

            $affected = $this->clientedao->add_cliente(array('remitente' => $remitente, 'destinatario' => $destino,
            	 'direccion_dest' => $destino,
                'telefono_rem' => $celular, 'email_rem' => $correo));
            if ($affected!=NULL) {
                $this->session->set_userdata('paso', 'pago');                
				$this->session->unset_userdata('cliente_id_agregado');
				$this->session->set_userdata('cliente_id_agregado', $affected);				
                echo 1;
            }
            else
                echo 0;
        } else {
            echo json_encode(array(
                array('name' => 'remitente', 'error' => form_error('remitente')),
                array('name' => 'destino', 'error' => form_error('destino')),
                array('name' => 'correo', 'error' => form_error('correo')),
                array('name' => 'direccion', 'error' => form_error('direccion')),
                array('name' => 'celular', 'error' => form_error('celular'))
            ));
        }
    }

    public function remover_producto($id) {
        if ($id >= 0 && $this->cart->total() < $id) {
            
        }
    }

}