<?php 

require_once "Conexion.php";

class Categorias extends Conexion
{
	public function agregarCategoria($datos){

		$conexion = Conexion::conectar();

		$sql = "INSERT INTO t_categorias (id_usuario,nombre) VALUES (?,?)";

		$query = $conexion->prepare($sql);

		$query->bind_param("is",$datos['idUsuario'],$datos['categoria']);

		$respuesta = $query->execute();

		$query->close();

		return $respuesta;
	}

	public function eliminarCategoria($idCategoria){

		$conexion = Conexion::conectar();

		$sql = "DELETE FROM t_categorias WHERE id = ?";

		$query = $conexion->prepare($sql);

		$query->bind_param('i',$idCategoria);

		$respuesta = $query->execute();

		$query->close();

		return $respuesta;

	}

	public function obtenerCategoria($idCategoria){

		$conexion = Conexion::conectar();

		$sql = "SELECT id, nombre FROM t_categorias WHERE id = '$idCategoria'";

		$result = mysqli_query($conexion,$sql);

		$categoria = mysqli_fetch_array($result);

		$datos = array("idCategoria" => $categoria['id'], "nombreCategoria" => $categoria['nombre']);

		return $datos;
	}

	public function actualizarCategoria($datos){

		$conexion = Conexion::conectar();

		$sql = "UPDATE t_categorias SET nombre = ? WHERE id = ?";

		$query = $conexion->prepare($sql);

		$query->bind_param("si", $datos['categoriaU'], $datos['idCategoria']);

		$respuesta = $query->execute();

		$query->close();

		return $respuesta;
	}
}

?>