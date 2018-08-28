<?php
include '../modelo/tipobodega.model.php';
$id   = $_POST['identificador'];
$tipo = new mantipobodega();
$tipo->elimina($id);
echo "Eliminado";
