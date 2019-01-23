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

	<!--
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>-->
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
					<a href="<?php echo base_url()?>listado-clientes" class="nav-item nav-link active">Clientes</a>
					<a href="<?php echo base_url()?>listado-productos" class="nav-item nav-link ">Productos</a>
				</div>	
		  	</div>
		  	
		</nav>
	</div>

	<div class="container" style="margin-top: 10px">
		<div class="btn-group">
			<div class="col-md-4">
				<a href="<?php echo site_url() ?>nuevo-cliente" class="btn btn-info">Agregar cliente</a>
			</div>
		</div>
		<div class="btn-group">
			<div class="col-md-4">
				<a href="<?php echo site_url() ?>nueva-factura" class="btn btn-success">Agregar Factura</a>
			</div>
		</div>
		<div class="btn-group">
			<div class="col-md-4">
				<a href="<?php echo site_url() ?>pdf-cliente" class="btn btn-warning">PDF</a>
			</div>
		</div>
		
	</div>

	<div class="container" id="mostrar" style="margin-top: 10px">

		<div id="mostrar" class="table-responsive" style="margin-top: 10px">
			<?php if($clientes != false) {?>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th>id</th>
						<th>Nombre</th>
						<th>direccion</th>
						<th>Telefono</th>
						<th>ver</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($clientes as $c){ ?>
						<tr>
							<th scope="row"><?php echo $c->id_cliente ?></th>
							<td><?php echo $c->nombre_cliente . ' '. $c->apellido_cliente ?></td>
							<td><?php echo $c->direccion ?></td>
							<td><?php echo $c->telefono ?></td>
							<td><a class="btn btn-success" href="<?php echo base_url('detalle-cliente/'.$id=$c->id_cliente)?>"><i class="fa fa-eye"></i></a></td>
							<td><a class="btn btn-info" href="<?php echo base_url('editar-cliente/'.$id=$c->id_cliente)?>"><i class="fa fa-pencil"></i></a></td>
							<td><a class="btn btn-danger" href=""><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else{ ?>
			<h3>Base de datos vacia</h3>
		<?php } ?>
		</div>
		
	</div>
</body>
</html>