<?php

//Se mostrara todo lo que llega del ajax
//print_r($_POST); 

session_start();
require_once "../../../clases/Usuario.php";

//Se almacenan los datos del formulario
$usuario = $_POST['userName'];
$password = sha1($_POST['contrasena']);
//Hacer una instancia de la clase Usuario del archivo Usuario.php 
$usuarioObj = new Usuario();

echo $usuarioObj->login($usuario, $password); 

?>