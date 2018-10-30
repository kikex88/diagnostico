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

		public function guardar(){
			//factura
			$num_factura = $this->input->post('num_factura');
			$id_cliente = $this->input->post('cliente');
			$fecha_factura = $this->input->post('fecha_factura');
			$num_pago = $this->input->post('forma_pago');


			$this->factura->agregarFactura($num_factura,$id_cliente,$fecha_factura,$num_pago);

			//detalle
			$id_producto = $this->input->post('producto');
			$cantidad = $this->input->post('cantidad');
			$precioD = $this->input->post('precio');


			$this->factura->agregarDetalle($num_factura,$id_producto,$cantidad,$precioD);
		}

		public function getPago(){
			$result = $this->factura->pago();
			echo json_encode($result);
		}
	}



 ?>