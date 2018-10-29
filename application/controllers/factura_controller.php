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
		}


		public function nueva_factura(){

			$this->load->view('factura/factura');
		}
	}



 ?>