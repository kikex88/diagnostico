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
					<a href="<?php echo base_url()?>listado-clientes" class="nav-item nav-link ">Clientes</a>
					<a href="<?php echo base_url()?>listado-productos" class="nav-item nav-link ">Productos</a>
				</div>	
		  	</div>
		  	
		</nav>
	</div>

	<div class="container" id="mostrar" style="margin-top: 10px">
			Tipo de factura:

			<div style="margin: 15px">
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="tipoFactura" id="tipoJAVA" value="JAVA" onclick="num_java()">
				  <label class="form-check-label" for="tipoJAVA">
				    JAVA
				  </label>
				</div>
				<div class="form-check">
				  <input class="form-check-input" type="radio" name="tipoFactura" id="tipoPHP" value="PHP" onclick="num_php()">
				  <label class="form-check-label" for="tipoPHP">
				    PHP
				  </label>
				</div>	
			</div>
			<hr>

			<form action="<?php echo base_url()?>factura_controller/guardar" method="post">
				<div class="row">
					<div class="col-md-4">
						Numero de Factura
						<input class="form-control" type="text" id="num_factura" name="num_factura" required="">
					</div>
					<div class="col-md-4">
						fecha:
						<input class="form-control" type="date" id="fecha_factura" name="fecha_factura" required="">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						Cliente
						<select class="form-control" name="cliente" id="cliente"></select>
					</div>
					<div class="col-md-4">
						Forma de pago
						<select class="form-control" name="forma_pago" id="forma_pago"></select>
					</div>
				</div>
				<hr>
				<br>
				<!--para agregar el detalle-->
				<div class="row">
					<div class="col-md-4">
						<button class="btn btn-success" type="button" id="agregar" name="agregar">mas +</button>
					</div>
					<div class="col-md-4">
						Total:
						<input type="number" step="any" class="form-control" name="total" id="total">
					</div>
				</div>
				<br><br>
				<center>
					<h3>Detalle</h3>
				</center>
				<center>
					<table id="tabla">
						
						<thead>
							<td>PRODUCTO</td>
							<td>CANTIDAD</td>
							<td>PRECIO</td>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</center>

				<div class="col-md-4">
					<input type="submit" class="btn btn-warning" value="Guardar">
				</div>

			</form>

	</div>

	<script>
	$(document).ready(function(){
		cliente();
		pago();
		
		$('#total').val(0.0);

		agregar()


	})

		//clonar los inputs
		/*$('#agregar').on('click',function(){
			$('#tabla tbody tr:eq(0)').clone().removeClass('fila-fija').appendTo('#tabla');
		});*/

		//selecciona la fila y la elimina
		$(document).on('click','.eliminar',function(){
			var parent = $(this).parents().get(0);
			$(parent).remove();
		});

		$(document).ready(function(){
			$('#agregar').click(function(){
				agregar();
			});
		})

		//variables globales
		var cont=0;//sirve para contar el numero de elementos que se crean
		var total=0.0 ;


		function pago(){
			$.ajax({
				url: '<?php echo base_url() ?>factura_controller/getPago',
				asynce: false,
				dataType: 'json',
				success: function(data){

					$.each(data,function(key, registro) {
						$("#forma_pago").append('<option value='+registro.num_pago+'>'+registro.nombre_modo_pago +'</option>');
			      	});

					
				}
			})
		}

		function agregar(){
			producto();
			cont++;
			var fila='<tr class="selected" id="fila'+cont+'" >'+
							'<td> <select class="form-control" onblur="getSelect(this.id)" onblur="getSelect(this.id)" name="producto[]" id="producto'+cont+'"><option></option></select>'+
							'<td> <input required="" type="number" onpaste="return false" onkeypress="return validar(event)" onkeyup="(precio(this.id));" name="cantidad[]" id="cantidad'+cont+'" placeholder="cantidad"> </td>'+
							'<td> <input required="" type="number" step="any" name="precio[]" id="precio'+cont+'"  placeholder="precio"> </td>'+	
						'</tr>'
			$('#tabla').append(fila);
		}

		function validar(e){
			key=e.keyCode || e.which;

			teclado=String.fromCharCode(key);

			numeros = "0123456789";

			especiales = "8-37-38-46";//array

			teclado_especial = false;

			for(var i in especiales){
				if(key == especiales[i]){
					teclado_especial=true;
				}
			}

			if(numeros.indexOf(teclado)== -1 && !teclado_especial){
				return false;
			}
		}

		//variables globales a usar para obtener el valor de los select
		var valor_select;

		function getSelect(id){
			var cad;
			var valor;
			var idProducto;

			cad = id.split('producto');
			valor = cad[1];
			idProducto = '#producto' + valor;

			valor_select = $(idProducto).val();
			console.log(valor_select);
		}

		function precio(id){
			
			var cantidad;//guarda el valor de la cantidad
			var cad;//nos guardara el id cortado, ya que nos interesa saber el número
			var valor;// guardara el valor numero del id
			var id_precio;
			var id_cantidad;
			var id_producto;
			var option;


			cad = id.split('cantidad');

			valor = cad[1];

			//creamos el id de precio
			id_precio = 'precio'+valor;

			console.log(id_precio);

			//creamos los id que necesitaremos para obtener sus valores y poder 
			id_cantidad = '#cantidad'+ valor;
			id_precio = '#precio' + valor;
			id_producto = '#producto' + valor;
			console.log(id_precio);
			cantidad = $(id_cantidad).val();
			cantidad = parseInt(cantidad);

			if(Number.isInteger(cantidad) == true ){
				
				option = valor_select; 
				console.log('option');
				console.log(option);

				$.ajax({
					type: 'post',
					url: '<?php echo base_url() ?>producto_controller/precio',
					data: {'id': option},
					dataType: 'json',
					success: function(data){

						var precio_t = cantidad * data[0].precio_producto;
						$(id_precio).val(precio_t);
						
						total = total + precio_t;
						$('#total').val(total);

						//precio_t = 0.00;
					},
				});


			}
			
			
		}

		function num_java(){
			if( $('#tipoJAVA').attr('checked','checked') ){
				var tipo = 'JAVA';
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>factura_controller/getFactura',
					data: {'tipo': tipo},
					asynce: false,
					dataType: 'json',
					success: function(data){
						if(data[0].num_factura == null){
							$('#num_factura').val('JAVA0001');
						}else{
							var indice = data[0].num_factura;
							var cod = indice.split('JAVA');
							var num = parseInt(cod[1]);
							var factura;
							num += 1;console.log(num);

							if(num >=0 && num <= 9){
								factura = 'JAVA000'+num;
								$('#num_factura').val(factura);
							}else if(num >= 10 && num <=99){
								factura = 'JAVA00'+num;
								$('#num_factura').val(factura);
							}else if(num >=100 && num <= 999){
								factura = 'JAVA0'+num;
								$('#num_factura').val(factura);
							}else{
								factura = 'JAVA'+num;
								$('#num_factura').val(factura);
							}
						}
					}
				});
			}
		}

		function num_php(){
			if( $('#tipoPHP').attr('checked','checked') ){
				var tipo = 'PHP';
				$.ajax({
					type: 'POST',
					url: '<?php echo base_url() ?>factura_controller/getFactura',
					data: {'tipo': tipo},
					asynce: false,
					dataType: 'json',
					success: function(data){
						if(data[0].num_factura == null){
							$('#num_factura').val('PHP0001');
						}else{
							var indice = data[0].num_factura;
							var cod = indice.split('PHP');
							var num = parseInt(cod[1]);
							var factura;
							num += 1;console.log(num);

							if(num >=0 && num <= 9){
								factura = 'PHP000'+num;
								$('#num_factura').val(factura);
							}else if(num >= 10 && num <=99){
								factura = 'PHP00'+num;
								$('#num_factura').val(factura);
							}else if(num >=100 && num <= 999){
								factura = 'PHP0'+num;
								$('#num_factura').val(factura);
							}else{
								factura = 'PHP'+num;
								$('#num_factura').val(factura);
							}
						}
					}
				});
			}
		}

		function cliente(){
			$.ajax({
				url: '<?php echo base_url() ?>factura_controller/getCliente',
				asynce: false,
				dataType: 'json',
				success: function(data){

					$.each(data,function(key, registro) {
						$("#cliente").append('<option value='+registro.id_cliente+'>'+registro.nombre_cliente + ' '+ registro.apellido_cliente+'</option>');
			      	});

					
				}
			})
		}

		function producto(){
			$.ajax({
				url: '<?php echo base_url() ?>factura_controller/getProducto',
				asynce: false,
				dataType: 'json',
				success: function(data){
					var id = '#producto'+ cont;
					console.log(id);
					$.each(data,function(key, registro) {

						$(id).append('<option value='+registro.id_producto+'>'+registro.nombre_producto + '</option>');
			      	});
				}
			})
		}


	</script>


</body>
</html>