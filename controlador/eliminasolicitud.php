<?php
include '../modelo/solicitud.model.php';
$id          = $_POST['identificador'];
$itemSolicit = $_POST['ITEM_SOLICITUD'];
$tipo        = new Solicitud();
$tipo->elimina($id = $itemSolicit);
echo "Eliminado";
