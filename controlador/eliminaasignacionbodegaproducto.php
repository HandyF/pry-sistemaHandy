<?php
include '../modelo/asignacionbodegaproducto.model.php';
$Bodega   = $_POST['ID_BODEGA'];
$Producto = $_POST['ID_PRODUCTO'];

$tipo = new AsignacionBodegaProducto();
$tipo->elimina($Bodega = $Producto);
echo "Eliminado";
