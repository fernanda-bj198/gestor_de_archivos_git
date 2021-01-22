<?php

session_start();

if(isset($_SESSION['usuario'])){

	include "header.php"; 

?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Gestor de archivos</h1>
		</div>
	</div>

	<div style="text-align: left;">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarArchivos">
						<span><span class="fas fa-plus-circle"></span> Agregar archivos</span>
					</span>
				</div>
			</div>
		</div>
	</div><br>

	<div class="container">
		<div id="tablaGestorArchivos"></div>
	</div>

	<!--Modal para agregar archivos-->

<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<!--enctype="multipart/form-data"-->
      	<!--Propiedad para cargar archivos del lado del servidor-->
      	<form id="frmArchivos" enctype="multipart/form-data" method="post">
      		<label>Categoría</label>
      		<div id="categoriasLoad"></div>
      		<label>Selecciona archivos</label>
      		<input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

	<?php include "footer.php";  ?>

	<script src="../js/gestor.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
			$('#categoriasLoad').load("categorias/selectCategorias.php");

			$('#btnGuardarArchivos').click(function(){

				agregarArchivosGestor();

			});
		});
	</script>

	<?php

	} else{

	header("location:../index.php");

	}

	?>


