<?php


require_once "../../clases/Categorias.php"; 

$categorias = new Categorias();

echo json_encode($categorias->obtenerCategoria($_POST['idCategoria']));


 ?>