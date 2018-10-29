<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Este controlador tendra la logica para mostrar el listado de clientes y productos
 */
class Producto_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('productos_Model','producto');
	}


	#nos muestra el listado de los clientes
	public function index(){
		$this->mostrar_productos();
	}

	#nos muestra el listado de los productos
	public function mostrar_productos(){
		$this->load->view('productos/productos_list_view');
	}

	public function lista_productos(){
		$datos = $this->producto->mostrarLista();
		echo json_encode($datos);
	}


	//////////////////////////////////////////////////////////////////////////////////
	/*			PRODUCTOS 					*/
	public function nuevo_producto(){
		$this->load->view('productos/nuevo_producto');
	}

	//función para obtener las categorias de la base de datos
	public function categorias(){
		$result = $this->producto->categorias();
		echo json_encode($result);
	}// fin de categoria

	//función para agregar producto
	public function agregar_producto(){
		$nombre_producto = $this->input->post('nombre_producto');
		$stock = $this->input->post('stock');
		$precio = $this->input->post('precio');
		$categoria = $this->input->post('categoria');

		$data = array(
			'nombre_producto' => $nombre_producto,
			'precio_producto' => $precio,
			'stock' => $stock,
			'id_categoria' => $categoria
		);
		
		$result = $this->producto->insertar($data);

		if($result){
			echo '<script>
					alert("Producto agregado con éxito")
				</script>';
		}else{
			echo '<script>
					alert("Error, no se pudo agregar el producto")
				</script>';
		}
		//redirect(base_url('nuevo-producto'));
		//header('Location: base_url("nuevo_producto")');
		$this->index();
	}

}//fin de la clase 
?>