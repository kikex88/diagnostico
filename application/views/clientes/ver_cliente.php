<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detalle cliente</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
	<!--Agregamos los script de boostrap y jq-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js" ></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark navbar-toggleable-sm " style="background-color: #B43104;">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			   <span class="navbar-toggler-icon"></span>
			</button>


		  	<a href="<?php echo base_url()?>listado-clientes" class="navbar-brand">
		  		<img src="<?php echo base_url() ?>assets/img/tux.png" width="80" height="80" alt="" class="d-inline-block align-top">
		  		Almacenes TUX
		  	</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav">
					<a href="<?php echo base_url()?>listado-clientes" class="nav-item nav-link active">Clientes</a>
					<a href="<?php echo base_url()?>listado-productos" class="nav-item nav-link ">Productos</a>
				</div>	
		  	</div>
		  	
		</nav>
	</div>

	<div class="container" style="padding: 20px">
		<?php if($detalle != false) { ?>
			<form >
				<?php foreach($detalle as $d) {?>
		   		<div class="form-group row">
		   			<label for="nombre_cliente" class="col-md-2">Nombre</label>
		   			<div class="col-md-8">
		   				<input type="text" class="form-control" readonly="" id="nombre_cliente" name="nombre_cliente" value="<?php echo $d->nombre_cliente.' '.$d->apellido_cliente ?>">
		   			</div>
		   		</div>
		   		
		   		<div class="form-group row">
		   			<label for="nombre_cliente" class="col-md-2">Fecha de nacimiento</label>
		   			<div class="col-md-8">
		   				<input type="date" class="form-control" readonly="" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $d->fecha_nacimiento ?>">
		   			</div>
		   		</div>

		   		<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="email">Email</label>
				      <input type="email" class="form-control" id="email" readonly="" name="email" placeholder="Email" value="<?php echo $d->email ?>">
				    </div>
				    <div class="form-group col-md-6">
				      <label for="telefono">Telefono</label>
				      <input type="text" class="form-control" id="telefono" readonly=""  name="telefono" placeholder="Telefono" value="<?php echo $d->telefono ?>">
				    </div>
				</div>

				<div class="form-group">
				    <label for="direccion">Dirección</label>
				    <textarea class="form-control" id="direccion" readonly="" rows="3"><?php echo $d->direccion ?></textarea>
				</div>

				<!--Información sobre las facturas-->
				<div class="container" >
					<h3>facturas asociadas</h3>
					<?php if($factura != false){ ?>
						<?php foreach($factura as $f){ ?>
							<a href="javascript:;" id="num_f"  onclick="factura('<?php echo $f->num_factura ?>')" ><?php echo $f->num_factura ?></a>
						<?php } ?>
					<?php }else{ ?>
						<h1>SIN REGISTRO EN LA BASE DE DATOS</h1>
					<?php } ?>
				</div>


			<?php } ?>
		    </form>
		<?php }else{ ?>
			<h1>SIN REGISTROS EN LA BASE DE DATOS</h1>
		<?php } ?>
	</div>

	<!--modal para mostrar la factura -->
	<div class="modal" id="facturaModal" tabindex="-1" role="dialog">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<!--<h5 class="modal-title">Almacenes TUX </h5>-->
	      </div>
	      <div class="modal-body">
			<div class="container" style="background-color: #bbb" >
				<div class="row">
					<div class="col-md-2"  >
						<img src="<?php echo base_url()?>assets/img/tux.png" width="80" height="80" alt="">
					</div>
					<div class="col-md-6" >
						<h1>Almacenes TUX</h1>
					</div>
					<div class="col-md-4" >
						<center>
							<table >
								<thead>
									<tr>
										<th colspan="3" style="text-align: center;">Fecha</th>
									</tr>
								</thead>
								<tbody id="fecha">
									<!--aqui va la fecha-->
								</tbody>
							</table>
						</center>
					</div>
					
				</div>
				<hr>
				<div class="row">
					<div class="col-md-4" style="background-color: #bbb">
						<label >N° Factura</label>
						<input type="text" id="num_factura" readonly="" style="background-color: #ccc">
					</div>
					
					<div class="col-md-4" style="background-color: #bbb">
						<label >Cliente</label>
						<input type="text" id="cliente" readonly="" style="background-color: #ccc">
					</div>
				</div>

				<hr>

				<div class="row">
					<div class="col-md-12">
						<center>
							<h3>DETALLES</h3>
						</center>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-12">
						<table class="table" border="1">
							<thead>
								<tr>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
								</tr>
							</thead>
							<tbody id="detalle">
								
							</tbody>
							<tfoot align="right" id="total">
								
							</tfoot>
						</table>
					</div>
				</div>


			</div>



	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>
	  </div>
	</div>

	<!--Script para mostrar un modal con la información de la factura-->
	<script>

		function factura(id){
			//var id = $('#num_f').data('value');
			$('#facturaModal').modal('show');
			console.log(id);

			//hacemos una petición ajax para obtener los datos y llenar el modal
			$.ajax({
				type: "POST",
				url: "<?php echo base_url()?>cliente_controller/detalleFactura",
				//data: 'id='+id,
				data: {"id":id},
				dataType: 'json',
				async: false,
				success: function(data){
					//vamos a definir las variables para hacer la fecha
					var dia,mes,año;
					var cadena;
					//variable para mandar html para la fecha
					var html='';
					var detalle="";
					var total=0.0;
					var suma=0.0;
					//le asignamos el valor de la fecha para poder separarlas
					var fecha = data[0].fecha_factura;
					var tfoot = "";

					//hacemos un split para separar la fecha
					cadena = fecha.split('-');
					año = cadena[0];
					mes = cadena[1];
					dia = cadena[2];

					//le asignamos los valores 
					html += '<td>'+ dia + '/' +'</td>'+
							'<td>'+ mes + '/' + '</td>'+
							'<td>'+ año + '</td>';
					$('#fecha').html(html);

					//agregamos los demas campos
					$('#num_factura').val(data[0].num_factura);
					$('#cliente').val(data[0].nombre_cliente + ' '+ data[0].apellido_cliente);

					//agregamos los detalles
					for(var i=0;i<data.length;i++){
						detalle += '<tr>' + 
									'<td>'+ data[i].nombre_producto +'</td>'+
								   	'<td>'+ data[i].cantidad +'</td>'+
								   	'<td>' + data[i].precio_detalle + '</td>'+
								 '</tr>'; 
								 suma += parseFloat(data[i].precio_detalle);
					}
					$('#detalle').html(detalle);

					total = suma;

					tfoot += '<tr>'+
								'<th colspan="2">TOTAL</th>'+
								'<th>'+ total + '</th>'+
							'</tr>';
					$('#total').html(tfoot);




				},
				error: function(jqXHR, textStatus, errorThrown){
					alert('error'+ errorThrown);
				}
			});
		}
	</script>
</body>
</html>