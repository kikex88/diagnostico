<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require('assets/fpdf181/fpdf.php');

/**
 * Este controlador tendra la logica para mostrar el listado de clientes y productos
 */
class pdf_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('clientes_Model','cliente');
		$this->load->model('productos_Model','producto');
	}

	//función imprimiendo con un for datos traidos con un result_array
	public function pdf_cliente()
	{
		#traemos los datos que queremos mostrar por medio del modelo
		$data = $this->cliente->listapdf();

		#preparamos la clase
		$pdf = new FPDF(); //objeto de la clase FPDF
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);

		#Creamos un foreach
		for($i=0;$i<count($data);$i++) {
			$pdf->Cell(40,10,$data[$i]['nombre_cliente']);
			$pdf->Cell(40,10,$data[$i]['apellido_cliente']);
			$pdf->Cell(40,10,$data[$i]['direccion']);
			$pdf->Cell(40,10,$data[$i]['fecha_nacimiento']);
			$pdf->Cell(40,10,$data[$i]['telefono']);
			$pdf->Cell(40,10,$data[$i]['email']);
			$pdf->ln(5);
		}
		
		$pdf->Output();
	}

	//función imprimiendo con un foreach datos traidos con un result
	public function pdf_producto()
	{
		#traemos los datos que queremos mostrar por medio del modelo
		$data = $this->producto->mostrarLista();

		#preparamos la clase
		$pdf = new FPDF(); //objeto de la clase FPDF
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);

		#Creamos un foreach
		foreach($data as $k) {
			$pdf->Cell(50,10,$k->nombre_producto);
			$pdf->Cell(40,10,$k->precio_producto);
			$pdf->Cell(40,10,$k->stock);
			$pdf->Cell(40,10,$k->nombre_categoria);
			$pdf->ln(5);//genera un salto de pagina
		}
		
		$pdf->Output();
	}
}