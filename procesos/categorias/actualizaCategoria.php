<?php 

require_once "../../clases/Categorias.php";

$categorias = new Categorias();

$datos = array("idCategoria" => $_POST['idCategoria'], "categoriaU" => $_POST['categoriaU']);

echo $categorias->actualizarCategoria($datos);


 ?>