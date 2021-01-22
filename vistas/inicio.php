<?php 

session_start();
//Si se establecio la sesion usuario de la funcion login que pertenece a la clase login.php, permiteme entrar a inicio.php
//Si se loguea el usuario, podra entrar al if
if(isset($_SESSION['usuario'])){

	include "header.php";

	?>

	<div class="container" style="text-align: center;">
		<div class="row">
			<div class="col-sm-12">
				<br><h1>Gestor de archivos</h1><br>
				<img src="../img/image.png" alt="" width="200px"><br>
				<br><h3>Alumna: Badillo Juarez Maria Fernanda</h3>
				<h3>Profesor: Roldan Aquino Segura</h3>
				<h3>Materia: Tópicos de Programación con MVC</h3>
				<h3>Grupo:7S2</h3>
			</div>
		</div>
	</div>

	<?php

	include "footer.php";
}else {
	header("location:../index.php");
}


?>