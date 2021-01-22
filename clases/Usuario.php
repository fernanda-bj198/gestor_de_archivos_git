<?php 

require_once "Conexion.php";

class Usuario extends Conexion{

	public function agregarUsuario($datos){

		$conexion = Conexion::conectar();

		//self:Llamando un metodo sobre la misma clase 
		//Si ya existe el usuario
		if (self::buscarUsuarioRepetido($datos['nombreUsuario'])){
			//Si el usuario existe 
			return 2;
		//Si no existe el usuario	
		} else{

			$sql="INSERT  INTO t_usuarios (nombre,fechaNacimiento,correo,nombreUsuario,contrasena) VALUES (?,?,?,?,?)";
		    //prepare es un metodo del API de mysqli 
			$query=$conexion->prepare($sql);
		    //Agregar todos los datos que vienen de aqui
			$query->bind_param('sssss', $datos['nombre'], $datos['fechaNacimiento'], $datos['correo'], $datos['nombreUsuario'], $datos['contrasena']);
		    //Se ejecuta el query
			$exito=$query->execute();

			$query->close();
			//Regresamos la respuesta
			//Regresara un verdadero o falso 
			return $exito;

		}

	}

	public function buscarUsuarioRepetido($usuario){

		$conexion = Conexion::conectar();

		$sql="SELECT nombreUsuario FROM t_usuarios WHERE nombreUsuario = '$usuario'";

		$result=mysqli_query($conexion,$sql);

		//Almacena el resultado de la consulta 
		$datos=mysqli_fetch_array($result);
		//Ve si existe el usuario en la tabla t_usuarios
		if($datos['nombreUsuario'] != "" || $datos['nombreUsuario'] == $usuario){
			//Si el usuario se repite
			return 1;
		} else{
			//Si no se repite el usuario 
			return 0;
		}

	}

	public function login($usuario, $password){

		$conexion = Conexion::conectar();

		$sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE nombreUsuario = '$usuario' AND contrasena = '$password'";

		$result = mysqli_query($conexion,$sql);

		$respuesta = mysqli_fetch_array($result)['existeUsuario'];

		if($respuesta > 0){

			$_SESSION['usuario'] = $usuario;

			$sql = "SELECT id FROM t_usuarios WHERE nombreUsuario = '$usuario' AND contrasena = '$password'";

			$result = mysqli_query($conexion, $sql);
								  //El campo id es el campo 0 en la tabla t_usuarios
			$id = mysqli_fetch_row($result)[0];

			$_SESSION['idUsuario'] = $id ;

			return 1;

		} else {

			return 0;

		}

	}

}

?>


