<?php 

session_start();

require_once "../../clases/Gestor.php";

$gestor = new Gestor();

$idArchivo = $_POST['idArchivo'];

echo $gestor->obtenerRutaArchivo($idArchivo);

?>