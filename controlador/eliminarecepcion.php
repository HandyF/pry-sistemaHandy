<?php
include '../modelo/recepcion.model.php';
$id        = $_POST['identificador'];
$itemRecep = $_POST['ITEM_RECEPCION'];
$tipo      = new Recepcion();
$tipo->elimina($id = $itemRecep);
echo "Eliminado";
