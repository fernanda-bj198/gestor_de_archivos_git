<?php 

session_start();
require_once "../../clases/Categorias.php";
$categorias = new Categorias();

echo $categorias->eliminarCategoria($_POST['idCategoria']);


?>