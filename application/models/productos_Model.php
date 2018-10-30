<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class Productos_Model extends CI_Model
{
	public function mostrarLista(){
		$this->db->select('p.*, cat.nombre_categoria');
		$this->db->from('producto as p');
		$this->db->join('categoria as cat','cat.id_categoria=p.id_categoria');
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}


	//obtener las categorias
	public function categorias(){
		$this->db->select('id_categoria,nombre_categoria');
		$this->db->from('categoria');
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}


	//insertar productos
	public function insertar($data){
		$this->db->insert('producto',$data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function getProducto(){
		$this->db->select('*');
		$this->db->from('producto');
		$query = $this->db->get();

		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
}



 ?>