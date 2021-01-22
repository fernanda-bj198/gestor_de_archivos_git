<?php 

require_once "Conexion.php";

class Gestor extends Conexion {

	public function agregaRegistroArchivo($datos){

		$conexion = Conexion::conectar();

		$sql = "INSERT INTO t_archivos (id_usuario,id_categoria,nombre,tipo,ruta) VALUES (?,?,?,?,?)";

		$query = $conexion->prepare($sql);

		$query->bind_param("iisss", $datos['id_u'], $datos['id_c'], $datos['nombre_a'], $datos['tipo_a'], $datos['ruta_f']);

		$respuesta = $query->execute();

		$query->close();

		return $respuesta;
	}

	public function obtenNombreArchivo($idArchivo){

		$conexion = Conexion::conectar();

		$sql = "SELECT nombre FROM t_archivos WHERE id = '$idArchivo'";

		$result = mysqli_query($conexion,$sql);

		return mysqli_fetch_array($result)['nombre'];

	}

	public function eliminarRegistroArchivo($idArchivo){

		$conexion = Conexion::conectar();

		$sql = "DELETE FROM t_archivos WHERE id = ?";

		$query = $conexion->prepare($sql);

		$query->bind_param('i',$idArchivo);

		$respuesta = $query->execute();

		$query->close();

		return $respuesta;
	}

	public function obtenerRutaArchivo($idArchivo){

		$conexion = Conexion::conectar();

		$sql = "SELECT nombre, tipo FROM t_archivos WHERE id = '$idArchivo'";

		$result = mysqli_query($conexion, $sql);

		$datos = mysqli_fetch_array($result);

		$nombreArchivo = $datos['nombre'];

		$extension = $datos['tipo'];

		return self::tipoArchivo($nombreArchivo, $extension);

	}

	public function tipoArchivo($nombre, $extension){

		$idUsuario = $_SESSION['idUsuario']; 

		$ruta = "../archivos/".$idUsuario."/".$nombre;

		switch ($extension) {
			case 'png':
			return '<img src="'.$ruta.'" width="50%">';
			break;

			case 'jpg':
			return '<img src="'.$ruta.'" width="50%">';
			break;

			case 'pdf':
			return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
			break;

			case 'mp3':
			return '<audio controls src="'.$ruta.'"></audio>';
			break;

			case 'mp4':
			return '<video src="'.$ruta.'" controls width="100%" height="600px"></video>';
			break;
			
			default:
				# code...
			break;
		}
	}
}

?>