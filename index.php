<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/logIn.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap4/bootstrap.min.css">
</head>
<body>

	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<img src="img/image.png" id="icon" alt="User Icon" />
				<h1>Gestor de archivos</h1>
			</div>

			<!-- Login Form -->
			<form method="post" id="frmLogIn" onsubmit="return logIn()">
				<input type="text" id="userName" class="fadeIn second" name="userName" placeholder="usuario" required="">
				<input type="password" id="contrasena" class="fadeIn third" name="contrasena" placeholder="contraseña" required="">
				<input type="submit" class="fadeIn fourth" value="Iniciar sesión">
			</form>

			<!-- Remind Passowrd -->
			<div id="formFooter">
				<a class="underlineHover" href="registro.php">Regístrate</a>
			</div>
		</div>
	</div>
	<!--Dependencia para el elemento swal de la pagina sweetalert en la seccion guide-->
	<script src="librerias/sweetalert.min.js"></script>
	<!--Para utilizar la estructura ajax, se tiene que mandar a llamar la dependencia jquery-->
	<script src="librerias/jquery-3.5.1.min.js"></script>

	<script type="text/javascript">

		function logIn(){

			$.ajax({
				method:"POST",
				data:$('#frmLogIn').serialize(),
				url:"procesos/usuario/login/login.php",
				success:function(respuesta){

					//console.log(respuesta);
					//alert(respuesta);

					//Para quitarle los espacios de la derecha e izquierda de la respuesta
					respuesta = respuesta.trim();

					if(respuesta == 1){
						//Si el usuario existe 
						window.location = "vistas/inicio.php"

					}else{
						//Si el usuario no existe 
						swal("","¡Error al iniciar sesión!","error");

					}

				}

			});

			return false;
			
		}
		
	</script>

</body>
</html>




