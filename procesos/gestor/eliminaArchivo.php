<?php 

session_start();

require_once "../../clases/Gestor.php";

$gestor = new Gestor();

$idArchivo = $_POST['idArchivo'];

$idUsuario = $_SESSION['idUsuario'];

$nombreArchivo = $gestor->obtenNombreArchivo($idArchivo);

$rutaEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivo;

if (unlink($rutaEliminar)) {
	echo $gestor->eliminarRegistroArchivo($idArchivo);
} else{
	echo 0;
}

?>