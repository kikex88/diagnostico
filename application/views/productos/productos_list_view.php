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
		  		<img src="<?php echo base_url()?>assets/img/tux.png" width="80" height="80" alt="" class="d-inline-block align-top">
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

	<div class="container" style="margin-top: 10px">
		<div class="btn-group">
			<div class="col-md-3">
				<a href="<?php echo site_url() ?>nuevo-producto" class="btn btn-info">Agregar producto</a>
			</div>
		</div>
		<div class="btn-group">
			<div class="col-md-8">
				<a href="<?php echo site_url() ?>nuevo-producto" class="btn btn-success">Agregar categoria</a>
			</div>
		</div>
		
	</div>

	<div class="container" id="mostrar" style="margin-top: 10px">
		
	</div>

	
	
	<!--Este script tendra la petición ajax para mostrar la tabla-->
	<script>

	$(document).ready(function(){
		mostrarProducto();
	})


		function mostrarProducto(){
			//petición ajax
			$.ajax({
				url: '<?php echo base_url()?>producto_controller/lista_productos',
				dataType: 'json',
				async: false,
				success: function(data){
					//creamos una variable llamada html el cual nos servira para crear el html que mandaremos a el cuerpo de la tabla
					var html='';
					var i;
						if(data==false){
							html+='<h1>SIN REGISTRO EN LA BASE DE DATOS</h1>';
							$('#mostrar').html(html);
						}else{
							
							html+='<table class="table">'+
									'<thead class="thead-dark">'+
										'<th>id</th>'+
										'<th>Producto</th>'+
										'<th>Precio</th>'+
										'<th>Stock</th>'+
										'<th>categoria</th>'+
										'<th>Editar</th>'+
										'<th>Eliminar</th>'+
									'</thead>'+
									'<tbody>';
							//hacemos un ciclo for para poder recorrer el arreglo data que trae nuestros datos de la base de datos
							for(i=0;i<data.length;i++){

								html += '<tr>'+
											'<td>'+ data[i].id_producto + '</td>'+
											'<td>'+ data[i].nombre_producto +'</td>'+
											'<td>'+ data[i].precio_producto + '</td>'+
											'<td>'+ data[i].stock + '</td>'+
											'<td>'+ data[i].nombre_categoria + '</td>'+
											'<td><a href="javascript:;" class="btn btn-info item-edit" data="'+data[i].id_producto+'"> <i class="fa fa-pencil" aria-hidden="true"></i></a> </td>'+
											'<td><a href="javascript:;" class="btn btn-danger item-delete" data="'+data[i].id_producto+'"><i class="fa fa-trash" aria-hidden="true"></i> </a> </td>'
										'</tr>'+
										'</tbody>'+
								'</table>';
							}//fin del for
							//mandamos esos datos a mostrar
							$('#mostrar').html(html);
						}
				}
			});
		}
	</script>
</body>
</html>