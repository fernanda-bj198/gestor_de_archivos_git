function agregarArchivosGestor(){

	var formData = new FormData(document.getElementById('frmArchivos'));

	$.ajax({

		url:"../procesos/gestor/guardarArchivos.php",
		method:"POST",
		datatype:"html",
		data: formData,
		cache:false,
		contentType:false,
		processData:false,
		success:function(respuesta){

			console.log(respuesta);

			respuesta = respuesta.trim();


			if (respuesta == 1) {
				$('#frmArchivos')[0].reset();
				$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
				swal("","¡Agregado con éxito!","success");
			} else{
				swal("","¡Error al agregar!","error");
			}
		}

	});

}

function eliminarArchivo(idArchivo){

	swal({
		title: "¿Está seguro de que desea eliminar este archivo?",
		text: "¡Una vez eliminada, no podrá recuperarse!",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {

			$.ajax({

				method:"POST",
				data:"idArchivo=" + idArchivo,
				url:"../procesos/gestor/eliminaArchivo.php",
				success:function(respuesta){

					respuesta = respuesta.trim();

					if (respuesta == 1) {

						$('#tablaGestorArchivos').load("gestor/tablaGestor.php");

						swal("Eliminado con éxito!", {
							icon: "success",
						});
					} else{

						swal("Error al eliminar!", {
							icon: "error",
						});
					}
				}
			});
		}
	});

}

function obtenerArchivoPorId(idArchivo){

	$.ajax({

		method:"POST",
		data:"idArchivo=" + idArchivo,
		url:"../procesos/gestor/obtenerArchivo.php",
		success:function(respuesta){

			//alert(respuesta);

			$('#archivoObtenido').html(respuesta);

		}
	});
}