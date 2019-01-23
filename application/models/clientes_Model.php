<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Clientes_Model extends CI_Model
{
	#esta función sirve para traer la lista de los clientes
	public function mostrarLista(){
		$this->db->select('c.*');
		$this->db->from('cliente c');
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}//fin de mostrar cliente

	public function listapdf()
	{
		$this->db->select('c.*');
		$this->db->from('cliente c');
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return false;
		}
	}

	#función para traer la información de un cliente especifico junto a sus facturas asociadas
	public function ver_cliente($id){
		$this->db->select('c.*');
		$this->db->from('cliente c');
		$this->db->where('c.id_cliente',$id);
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}//fin de ver_cliente($id)

	//funcion para traer las facturas del cliente
	public function getFactura($id){
		$this->db->select('num_factura');
		$this->db->from('factura');
		$this->db->where('id_cliente',$id);
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}// fin de getFactura


	//
	public function detalle_Factura($id_f){
		$this->db->select('f.num_factura,f.fecha_factura, c.nombre_cliente,c.apellido_cliente,p.nombre_producto,d.cantidad,d.precio_detalle, mp.nombre_modo_pago');
		$this->db->from('factura f');
		$this->db->join('cliente c','f.id_cliente=c.id_cliente');
		$this->db->join('detalle d','f.num_factura = d.id_factura');
		$this->db->join('modo_pago mp','f.num_pago = mp.num_pago');
		$this->db->join('producto p','p.id_producto = d.id_producto');
		$this->db->join('categoria ca','ca.id_categoria = p.id_categoria');
		$this->db->where('f.num_factura',$id_f);
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}//fin detalle_Factura

	public function insertar($data){
		$this->db->insert('cliente',$data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}// fin de insertar

	public function editarCliente($id){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('id_cliente',$id);
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}//fin de editar

	public function actualizar($data,$id){
		$this->db->where('id_cliente', $id);
		$this->db->update('cliente', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}//fin de la clase



 ?>