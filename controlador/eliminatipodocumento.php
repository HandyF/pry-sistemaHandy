<?php
include '../modelo/tipodocumento.model.php';
$id   = $_POST['identificador'];
$tipo = new mantipodocumento();
$tipo->elimina($id);
echo "Eliminado";
