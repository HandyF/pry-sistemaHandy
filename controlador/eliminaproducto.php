<?php
include '../modelo/producto.model.php';
$id   = $_POST['identificador'];
$tipo = new Producto();
$tipo->elimina($id);
echo "Eliminado";
