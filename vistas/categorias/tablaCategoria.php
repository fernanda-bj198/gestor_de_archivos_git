<?php 

session_start();

require_once "../../clases/Conexion.php";

$idUsuario = $_SESSION['idUsuario'];

$conexion = new Conexion();

$conexion = $conexion->conectar();


?>

<div class="row">
	<div class="table-responsive">
		<table class="table table-striped table-bordered lead" id="tablaCategoriaDataTable">
			<thead>
				<tr style="text-align: center;">
					<td>Nombre</td>
					<td>Fecha</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
			</thead>
			<tbody>

				<?php

				$sql = "SELECT id, nombre, horaRegistro FROM t_categorias WHERE id_usuario = '$idUsuario'"; 

				$result = mysqli_query($conexion,$sql);

				while($mostrar = mysqli_fetch_array($result)){

					$idCategoria = $mostrar['id'];

				 ?>

					<tr style="text-align: center;">
					<td><?php echo $mostrar['nombre']; ?></td>
					<td><?php echo $mostrar['horaRegistro']; ?></td>
					<!--Boton editar-->
					<td style="text-align: center;">
						<span class="btn btn-secondary btn-sm" onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')" data-toggle="modal" data-target="#modalActualizarCategoria">
							<span class="far fa-edit"></span>
						</span>
					</td>
					<!--Boton eliminar-->
					<td style="text-align: center;">
						<span class="btn btn-danger btn-sm" onclick="eliminarCategorias('<?php echo $idCategoria ?>')">
							<span class="far fa-trash-alt"></span>
						</span>
					</td>
				</tr>

				<?php 
					}
				 ?>

			</tbody>
		</table>
	</div>
</div>

<!--DataTable-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaCategoriaDataTable').DataTable();
	});
</script>