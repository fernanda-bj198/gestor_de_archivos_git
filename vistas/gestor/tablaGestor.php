<?php 

session_start();

require_once "../../clases/Conexion.php";

$c = new Conexion();

$conexion = $c->conectar();

$idUsuario = $_SESSION['idUsuario']; 

$sql = "SELECT archivos.id as idArchivo,usuario.nombre as nombreUsuario,categorias.nombre as nombreCategoria,archivos.nombre as nombreArchivo,archivos.tipo as tipoArchivo,archivos.ruta as rutaArchivo,archivos.hora_registro as horaRegistro FROM t_archivos as archivos inner join t_usuarios as usuario on archivos.id_usuario = usuario.id inner join t_categorias as categorias on archivos.id_categoria = categorias.id and archivos.id_usuario = '$idUsuario'";

$result = mysqli_query($conexion,$sql);

?>

<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered lead" id="tablaGestorDataTable">
				<thead>
					<tr style="text-align: center;">
						<td>Categoría</td>
						<td>Nombre</td>
						<td>Extensión de archivo</td>
						<td>Descargar</td>
						<td>visualizar</td>
						<td>Eliminar</td>
					</tr>
				</thead>
				<tbody>
					<?php 

					$extensionesValidas = array('png','jpg','pdf','mp3','mp4');

					while($mostrar = mysqli_fetch_array($result)){

						$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];

						$nombreArchivo = $mostrar['nombreArchivo'];

						$idArchivo = $mostrar['idArchivo'];


						?>
						<tr>
							<td style="text-align: center;"><?php echo $mostrar['nombreCategoria'] ?></td>
							<td style="text-align: center;"><?php echo $mostrar['nombreArchivo']; ?></td>
							<td style="text-align: center;"><?php echo $mostrar['tipoArchivo']; ?></td>
							<td style="text-align: center;">
								<a href="<?php echo $rutaDescarga; ?>" download="<?php echo $nombreArchivo; ?>" class="btn btn-success btn-sm">
									<span class="fas fa-file-download"></span>
								</a>
							</td>
							<!--Boton visualizar-->
							<td style="text-align: center;">
								<?php 
								for ($i=0; $i < count($extensionesValidas); $i++) { 

									if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
										?>

										<span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick=" obtenerArchivoPorId('<?php echo $idArchivo ?>')">
											<span class="far fa-eye"></span>
										</span>

										<?php

									}
									
								}

								?>
							</td>
							<!--Boton eliminar-->
							<td style="text-align: center;">
								<span class="btn btn-danger btn-sm" onclick="eliminarArchivo('<?php echo $idArchivo ?>')">
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
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorDataTable').DataTable();
	});
</script>


