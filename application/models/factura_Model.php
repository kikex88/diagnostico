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
	}



 ?>