<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Este controlador tendra la logica para mostrar el listado de clientes y productos
 */
class Cliente_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('clientes_Model','cliente');
		$this->load->model('productos_Model','producto');
	}


	#nos muestra el listado de los clientes
	public function index(){
		$this->mostrar_clientes();
	}

	public function mostrar_clientes(){
		$data['clientes'] = $this->cliente->mostrarLista();
		$this->load->view('clientes/clientes_list_view',$data);
		//$this->load->view('clientes/clientes_list_view');
	}


	public function lista_clientes(){
		$datos = $this->cliente->mostrarLista();
		echo json_encode($datos);
	}

	//función para poder ver los datos del cliente junto a sus facturas
	public function ver_cliente($id){

		$result['detalle'] = $this->cliente->ver_cliente($id);
		$result['factura'] = $this->cliente->getFactura($id);
		
		$this->load->view('clientes/ver_cliente',$result);
	}

	//función que obtiene el detalle de la factura
	public function detalleFactura(){
		$id_factura = $this->input->post('id');
		//$id_factura=filter_input(INPUT_POST, 'id');
		//var_dump($id_factura);echo'<br>';
		$datos = $this->cliente->detalle_Factura($id_factura);
		echo json_encode($datos);
	}

	//función para agregar un nuevo cliente
	public function nuevo_cliente(){
		$this->load->view('clientes/nuevo_cliente_view');
	}

	//función para agregar cliente
	public function agregar_cliente(){
		$nombre = $this->input->post('nombre_cliente');
		$apellido = $this->input->post('apellido_cliente');
		$fecha = $this->input->post('fecha_nacimiento');
		$correo = $this->input->post('email');
		$tel = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');

		$data = array(
			'nombre_cliente' => $nombre,
			'apellido_cliente' => $apellido,
			'direccion' => $direccion,
			'fecha_nacimiento' => $fecha,
			'telefono' => $tel,
			'email' => $correo

		);

		$result = $this->cliente->insertar($data);
		if($result){
			echo "<script>alert('Cliente agregado correctamente');</script>";
		}else{
			echo "<script>alert('Cliente no pudo ser agregado')</script>";
		}
		//redirect(base_url());
		$this->index();
	}//fin de agregar

	//función para obtener los datos del cliente y editarlos
	public function editar_cliente($id){
		$dato['detalle'] = $this->cliente->editarCliente($id);
		$this->load->view('clientes/editar_cliente',$dato);
	}//fin de editar

	public function actualizar_cliente(){
		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre_cliente');
		$apellido = $this->input->post('apellido_cliente');
		$fecha = $this->input->post('fecha_nacimiento');
		$correo = $this->input->post('email');
		$tel = $this->input->post('telefono');
		$direccion = $this->input->post('direccion');

		$data = array(
			'nombre_cliente' => $nombre,
			'apellido_cliente' => $apellido,
			'direccion' => $direccion,
			'fecha_nacimiento' => $fecha,
			'telefono' => $tel,
			'email' => $correo
		);
		$result = $this->cliente->actualizar($data,$id);
		if($result){
			echo "<script>alert('Cliente actualizado correctamente');</script>";
		}else{
			echo "<script>alert('Cliente no pudo ser actualizado')</script>";
		}
		$this->index();
	}


}//fin de la clase 
?>