<?php 

//print_r($_FILES);

session_start();

require_once "../../clases/Gestor.php";

$gestor = new Gestor();
$idCategoria = $_POST['categoriasArchivos']; 
$idUsuario = $_SESSION['idUsuario'];

if($_FILES['archivos']['size'] > 0){

	$carpetaUsuario = '../../archivos/'.$idUsuario;

	if (!file_exists($carpetaUsuario)) {

		mkdir($carpetaUsuario, 0777, true);

	}

	$totalArchivos = count($_FILES['archivos']['name']);

	for ($i=0; $i < $totalArchivos; $i++) { 

		$nombreArchivo = $_FILES['archivos']['name'][$i];
		$explode = explode('.', $nombreArchivo);
		$tipoArchivo = array_pop($explode);

		$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i]; 
		
		$rutaFinal = $carpetaUsuario."/".$nombreArchivo;

		$datosRegistroArchivo = array("id_u" => $idUsuario, "id_c" => $idCategoria, "nombre_a" => $nombreArchivo, "tipo_a" => $tipoArchivo, "ruta_f" => $rutaFinal);

		if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {

			$respuesta = $gestor->agregaRegistroArchivo($datosRegistroArchivo);
		}
	}		
	echo $respuesta;
} else{
	echo 0;
}

?>
