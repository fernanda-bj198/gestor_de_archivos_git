<?php 

session_start();
//Si se establecio la sesion usuario de la funcion login que pertenece a la clase login.php, permiteme entrar a inicio.php
//Si se loguea el usuario, podra entrar al if
if(isset($_SESSION['usuario'])){

	include "header.php";

	?>

	<div class="jumbotron jumbotron-fluid">
		<div class="container">
			<h1 class="display-4">Categorías</h1>
		</div>
	</div>

	<div style="text-align: left;">
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<span class="btn btn-primary" data-toggle="modal" data-target="#modalAgregaCategoria">
						<span><span class="fas fa-plus-circle"></span> Agregar categoría</span>
					</span>
				</div>
			</div>
		</div>
	</div><br>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div id="tablaCategorias">
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalAgregaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Agregar nueva categoría</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<form id="frmCategorias" method="post">
						<label for="nombreCategoria">Nombre de la categoría</label>
						<input type="text" name="nombreCategoria" id="nombreCategoria" class="form-control">
					</form>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary" id="btnGuardarCategoria">Guardar</button>
				</div>
			</div>
		</div>
	</div>

<!-- Modal -->
<div class="modal fade" id="modalActualizarCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form id="frmActualizaCategoria">
      		<input type="text" name="idCategoria" id="idCategoria" hidden="">
      		<label for="categoriaU">Categoría</label>
      		<input type="text" name="categoriaU" id="categoriaU" class="form-control">
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnActualizaCategoria">Actualizar</button>
      </div>
    </div>
  </div>
</div>

	<?php

	include "footer.php";
	?>

	<script src="../js/categorias.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#tablaCategorias').load("categorias/tablaCategoria.php");

			$('#btnGuardarCategoria').click(function(){
				agregarCategoria();
			});

			$('#btnActualizaCategoria').click(function(){

				actualizaCategoria();

			});
		});
	</script>

	<?php

}else {
	header("location:../index.php");
}

?>