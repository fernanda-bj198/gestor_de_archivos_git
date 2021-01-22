<?php 

require_once "../../../clases/Usuario.php";

//Se mostrara en la consola del browser todo lo que llega del ajax
//print_r($_POST);

$password=sha1($_POST['contrasena']);

//explode: permite separar la cadena (dd-mm-aaaa) en guiones
						   //Delimitador,dd-mm-aaaa
$fechaNacimiento = explode("-", $_POST['fechaNacimiento']);
					// ano             -      mes                  -       dia
$fechaNacimiento = $fechaNacimiento[2] . "-" . $fechaNacimiento[1] . "-" . $fechaNacimiento[0]; //La cadena se convierte a un arreglo para poder introducirlo a la base de datos en el formato aceptado: aaaa-mm-dd

//Recopilacion de datos del formulario
$datos=array(
	
	"nombre" => $_POST['nombre'],
	"fechaNacimiento" => $fechaNacimiento,
	"correo" => $_POST['correo'],
	"nombreUsuario" => $_POST['nombreUsuario'],
	"contrasena" => $password
	
);

//Instanciar la clase Usuario del archivo Usuario.php
$usuario = new Usuario(); 

echo $usuario->agregarUsuario($datos);

?>