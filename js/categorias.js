function agregarCategoria(){

	var categoria = $('#nombreCategoria').val();

	if(categoria == ""){
		swal("¡Ingresa una categoría!");
		return false;
	} else{

		$.ajax({

			method:"POST",
			data:"categoria="+ categoria,
			url:"../procesos/categorias/agregarCategoria.php",

			success:function(respuesta){

				respuesta = respuesta.trim();

				if(respuesta == 1){
					$('#tablaCategorias').load("categorias/tablaCategoria.php");

					$('#nombreCategoria').val("");
					swal("","Categoría agregada","success");
				} else{
					swal("","¡Error al agregar!","error");
				}
			}
		});
	}
}

function eliminarCategorias(idCategoria){

	idCategoria = parseInt(idCategoria);

	if(idCategoria < 1){
		swal("¡No tienes id de categoria!");
		return false;
	} else {

		swal({
			title: "¿Está seguro de que desea eliminar esta categoría?",
			text: "¡Una vez eliminada, no podrá recuperarse!",
			icon: "warning",
			buttons: true,
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {

				$.ajax({

					method:"POST",
					data:"idCategoria=" + idCategoria,
					url:"../procesos/categorias/eliminarCategoria.php",
					success:function(respuesta){

						respuesta = respuesta.trim();

						if (respuesta == 1) {

							$('#tablaCategorias').load("categorias/tablaCategoria.php");

							swal("¡Eliminado con éxito!", {
								icon: "success",
							});

						} else{

							swal("","¡Error al eliminar!","error");

						}

					}
				});

			} 
		});

	}
}

function obtenerDatosCategoria(idCategoria){

	$.ajax({

		method:"POST",
		data:"idCategoria=" + idCategoria,
		url:"../procesos/categorias/obtenerCategoria.php",
		success:function(respuesta){

			respuesta = jQuery.parseJSON(respuesta);

			//console.log(respuesta);

			$('#idCategoria').val(respuesta['idCategoria']);
			$('#categoriaU').val(respuesta['nombreCategoria']);

		}
	});
}

function actualizaCategoria(){  // btnActualizaCategoria

	if ($('#categoriaU').val() == "") {

		swal("¡No hay categoría!");

		return false;

	} else{

		$.ajax({

			method:"POST",
			data:$('#frmActualizaCategoria').serialize(),
			url:"../procesos/categorias/actualizaCategoria.php",
			success:function(respuesta){

				respuesta = respuesta.trim();

				if (respuesta == 1) {

					$('#tablaCategorias').load("categorias/tablaCategoria.php");

					swal("","Actualizado con éxito","success");

				} else{

					swal("","¡Error al actualizar!","error");

				}
			}

		});

	}
}
