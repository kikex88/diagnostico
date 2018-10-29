<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado</title>
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
		  		<img src="assets/img/tux.png" width="80" height="80" alt="" class="d-inline-block align-top">
		  		Almacenes TUX
		  	</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav">
					<a href="<?php echo base_url()?>listado-clientes" class="nav-item nav-link">Clientes</a>
					<a href="<?php echo base_url()?>listado-productos" class="nav-item nav-link active">Productos</a>
				</div>	
		  	</div>
		  	
		</nav>
	</div>

	<div class="container" id="agregar" style="margin-top: 10px">
		<form action="<?php echo base_url()?>producto_controller/agregar_producto" method="post">
			<div class="form-group row">
	   			<label for="nombre_producto" class="col-md-2">Nombre del producto</label>
	   			<div class="col-md-6">
	   				<input type="text" class="form-control"  id="nombre_producto" name="nombre_producto" required="">
	   			</div>
	   		</div>
	   		<div class="form-group row">
	   			<label for="stock" class="col-md-2">STOCK</label>
	   			<div class="col-md-3">
	   				<input type="number"  min="0" class="form-control"  id="stock" name="stock" required="">
	   			</div>
	   		</div>
	   		<div class="form-group row">
	   			<label for="precio" class="col-md-2">Precio</label>
	   			<div class="col-md-3">
	   				<input type="number" step="any" min="0" class="form-control"  id="precio" name="precio" required="">
	   			</div>
	   		</div>
	   		<div class="form-group row">
	   			<label for="categoria" class="col-md-2">Categoria</label>
	   			<div class="col-md-6">
	   				<select name="categoria" id="categoria">
	   					
	   				</select>
	   			</div>
	   		</div>

	   		<div class="form-group row">
	   			<input type="submit" class="btn btn-info" value="GUARDAR">
	   		</div>
		</form>
	</div>

	
	
	<!--Este script tendra la petición ajax para mostrar la tabla-->
	<script>
		$(document).ready(function(){
			categoria();
			limpiar();
		});

		function limpiar(){
			if($('#nombre_producto').val()!='' && $('#nombre_producto').val() != '' && $('#precio').val() !='' ){
				$('#nombre_producto').val('');
				$('#stock').val('');
				$('#precio').val('');
			}
		}
		
		function categoria(){
			//petición ajax
			$.ajax({
				url: "<?php echo base_url()?>producto_controller/categorias",
				dataType: 'json',
				async: false,
				success: function(data){
					$.each(data,function(key, registro) {
						$("#categoria").append('<option value='+registro.id_categoria+'>'+registro.nombre_categoria +'</option>');
			      	});
				}
			});
		}

		function guardar(){
			$.ajax({
				url: "<?php echo base_url()?>producto_controller/agregar_producto",
				dataType: 'json',
				async: false,
				success: function(data){
					if(data==true){
						alert('Producto agregado satisfactoriamente');
					}else{
						alert('Error: no se pudo agregar el producto');
					}
				}
			});
		}
	</script>
</body>
</html>