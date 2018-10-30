<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	 * clase que tiene la logica para la factura
	 */
	class Factura_Model extends CI_Model
	{
		
		public function getFactura($tipo){
			$this->db->select_max('num_factura');
			$this->db->from('factura');
			$this->db->like('num_factura', $tipo);
			$query = $this->db->get();

			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}

		public function pago(){
			$this->db->select('num_pago,nombre_modo_pago');
			$this->db->from('modo_pago');
			$query = $this->db->get();

			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}

		public function agregarFactura($num_factura,$id_cliente,$fecha_factura,$num_pago){
			$this->db->query("CALL sp_insercion_factura($num_factura,$id_cliente,$fecha_factura,$num_pago)");
		}

		public function agregarDetalle($num_factura,$id_producto,$cantidad,$precioD){
			$data = array(
				'id_factura' => $num_factura,
				'id_producto' => $id_producto,
				'cantidad' => $cantidad,
				'precio_detalle' => $precioD
			);

			$this->db->insert('detalle', $data);
		}
	}



 ?>