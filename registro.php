<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="librerias/jquery-ui-1.12.1/jquery-ui.css">
</head>
<body>
	<div class="container">
		<h1 class="text-center">Registro de usuario</h1><hr>
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<form id="frmRegistro" method="post" onsubmit="return agregarUsuarioNuevo()" autocomplete="off">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe tu nombre" required="">
					<label for="fechaNacimiento">Selecciona tu fecha de nacimiento</label>
					<input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required="" readonly="" placeholder="dd-mm-aaaa"> 
					<label for="correo">Correo electrónico</label>
					<input type="email" name="correo" id="correo" placeholder="Escribe tu correo electrónico" class="form-control" required="">
					<label for="nombreUsuario">Usuario</label>
					<input type="text" name="nombreUsuario" id="nombreUsuario" placeholder="Ejemplo: usuario1, juanLopez56" class="form-control" required="">
					<label for="contrasena">Contraseña</label>
					<input type="password" name="contrasena" id="contrasena" class="form-control" placeholder="Escribe tu nueva contraseña" required=""><br>
					<div class="row">
						<div class="col-sm-6 text-right">
							<button class="btn btn-primary">Registrar</button>
						</div>
						<div class="col-sm-6 text-left">
							<a href="index.php" class="btn btn-success">Regresar</a>
						</div>
					</div>
				</form>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	<!--Para utilizar la estructura ajax , se tiene que mandar a llamar la dependencia jquery-->
	<script src="librerias/jquery-3.5.1.min.js"></script>
	<!--Dependencia para el elemento Datepicker de la pagina jquery ui-->
	<script src="librerias/jquery-ui-1.12.1/jquery-ui.js"></script>
	<!--Dependencia para el elemento swal de la pagina sweetalert en la seccion guide-->
	<script src="librerias/sweetalert.min.js"></script>
	<!--La funcion 'agregarUsuarioNuevo' va a tomar todos los datos del formulario frmRegistro y lo enviara al proceso agregarUsuario.php-->
	<script type="text/javascript">

		//Fucion para el elemento Datepicker
		$(function(){

			var fechaA = new Date();
			var yyyy = fechaA.getFullYear(); //complemento para el ano, del 1900 hasta el ano actual 

			$("#fechaNacimiento").datepicker({
				changeMonth: true, //Me permite seleccionar el mes 
				changeYear: true,  //Me permite seleccionar el ano 
				//Comienza desde el ano 1900 hasta el año actual 
				yearRange: '1900:' + yyyy,  //Rango dell ano al ano actual
				dateFormat: "dd-mm-yy" //Formato de la fecha 
			});
		});
		
		function agregarUsuarioNuevo(){
			//abrimos una plantilla de ajax
			$.ajax({
				method:"POST",
				data:$('#frmRegistro').serialize(),
				url:"procesos/usuario/registro/agregarUsuario.php",
				success:function(respuesta){
					//Quitar los espacios del lado derecho e izquierdo de la respuesta
					respuesta = respuesta.trim();

					if(respuesta == 1){
						swal("","¡Registro no agregado!","error");
					} else if(respuesta == 2){
						swal("Este usuario ya existe, introduzca uno diferente");
					}  
					else{
						//Limpiar el formulario
						$("#frmRegistro")[0].reset();
						swal("¡Buen trabajo!","Agregado con éxito","success");
					}
				}

			});

			return false;
		}

	</script>
</body>
</html>

