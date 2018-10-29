<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar cliente</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/font-awesome.min.css">
	<!--Agregamos los script de boostrap y jq-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/bootstrap.js" ></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/popper.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	<!-- mascara-->
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js" type="text/javascript"></script>

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
					<a href="<?php echo base_url()?>listado-clientes" class="nav-item nav-link ">Clientes</a>
					<a href="<?php echo base_url()?>listado-productos" class="nav-item nav-link ">Productos</a>
				</div>
		  	</div>
		  	
		</nav>
	</div>
	<?php foreach($detalle as $d) {?>
	<div class="container" style="margin-top: 20px">
		<form method="post" action="<?php echo base_url() ?>cliente_controller/actualizar_cliente" >
			<input type="hidden" name="id" value="<?php echo $d->id_cliente ?>">
		   		<div class="form-group row">
		   			<label for="nombre_cliente" class="col-md-2">Nombres</label>
		   			<div class="col-md-6">
		   				<input type="text" class="form-control"  id="nombre_cliente" name="nombre_cliente" required="" value="<?php echo $d->nombre_cliente ?>">
		   			</div>
		   		</div>

		   		<div class="form-group row">
		   			<label for="apellido_cliente" class="col-md-2">Apellidos</label>
		   			<div class="col-md-6">
		   				<input type="text" class="form-control"  id="apellido_cliente" name="apellido_cliente" required="" value="<?php echo $d->apellido_cliente ?>">
		   			</div>
		   		</div>
		   		
		   		<div class="form-group row">
		   			<label for="nombre_cliente" class="col-md-2">Fecha de nacimiento</label>
		   			<div class="col-md-4">
		   				<input type="date" class="form-control"  id="fecha_nacimiento" name="fecha_nacimiento" required="" value="<?php echo $d->fecha_nacimiento ?>">
		   			</div>
		   		</div>

		   		<div class="form-row">
				    <div class="form-group col-md-6">
				      <label for="email">Email</label>
				      <input type="email" class="form-control" id="email"  name="email" placeholder="Email" required="" value="<?php echo $d->email ?>">
				    </div>
				    <div class="form-group col-md-4">
				      <label for="telefono">Telefono</label>
				      <input type="text" class="form-control" id="telefono"   name="telefono" placeholder="Telefono" required="" value="<?php echo $d->telefono ?>">
				    </div>
				</div>

				<div class="form-group">
				    <label for="direccion">Dirección</label>
				    <textarea class="form-control" id="direccion" name="direccion" required="" rows="3"><?php echo $d->direccion ?></textarea>
				</div>

				<div class="form-group">
					<input class="btn btn-success" type="submit" value="Actualizar" name="actualizar">
				</div>
		    </form>
	</div>
<?php } ?>

	<script>
		jQuery(function($){
    $("#telefono").inputmask({"mask": " 9999-9999"});
    });
	</script>

</body>
</html>