<?php
include '../modelo/salida.model.php';
$id        = $_POST['identificador'];
$itemSalid = $_POST['ITEM_SALIDA'];
$tipo      = new Salida();
$tipo->elimina($id = $itemSalid);
echo "Eliminado";
