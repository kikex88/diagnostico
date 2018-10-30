<?php 

	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * Clase que controlara la factura
	 */
	class Factura_controller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();

			//cargamos el modelo
			$this->load->model('factura_Model','factura');
			$this->load->model('clientes_Model','cliente');
			$this->load->model('productos_Model','producto');
		}


		public function nueva_factura(){

			$this->load->view('factura/factura');
		}

		//función para obtener la ultima factura
		public function getFactura(){
			$tipo = $this->input->post('tipo');
			$num = $this->factura->getFactura($tipo);
			echo json_encode($num);
		}

		public function getCliente(){
			$result = $this->cliente->mostrarLista();
			echo json_encode($result);
		}

		public function getProducto(){
			$result = $this->producto->getProducto();
			echo json_encode($result);
		}
	}



 ?>