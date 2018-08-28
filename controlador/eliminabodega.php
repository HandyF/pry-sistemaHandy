<?php
include '../modelo/bodega.model.php';
$id   = $_POST['identificador'];
$tipo = new Bodega();
$tipo->elimina($id);
echo "Eliminado";
