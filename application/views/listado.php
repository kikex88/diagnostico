<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Listado</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-dark navbar-toggleable-sm " style="background-color: #B43104;">
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			   <span class="navbar-toggler-icon"></span>
			</button>


		  	<a href="<?php echo base_url()?>listado" class="navbar-brand">
		  		<img src="assets/img/tux.png" width="80" height="80" alt="" class="d-inline-block align-top">
		  		Almacenes TUX
		  	</a>
		  	<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		  		<div class="navbar-nav">
					<a href="#" class="nav-item nav-link active">Clientes</a>
					<a href="#" class="nav-item nav-link ">Productos</a>
				</div>	
		  	</div>
		  	
		</nav>
	</div>

	<div class="containerS">
		<?php if($clientes != false) {?>
			<table class="table">
				<thead>
					<th>id</th>
					<th>Nombre</th>
					<th>direccion</th>
					<th>Telefono</th>
					<th>ver</th>
					<th>Editar</th>
				</thead>
				<tbody>
					<?php foreach($clientes as $c){ ?>
						<tr>
							<td><?php echo $c->id_cliente ?></td>
							<td><?php echo $c->nombre_cliente . ' '. $c->apellido_cliente ?></td>
							<td><?php echo $c->direccion ?></td>
							<td><?php echo $c->telefono ?></td>
							<td><?php  ?></td>
							<td><?php  ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		<?php } else{ ?>
			<h3>Base de datos vacia</h3>
		<?php } ?>
	</div>

	
	<!--Agregamos los script de boostrap y jq
	<script src="<?php echo base_url()?>assets/js/popper.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>assets/js/jquery.js"></script>-->

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>