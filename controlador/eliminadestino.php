<?php
include '../modelo/destino.model.php';
$id   = $_POST['identificador'];
$tipo = new mandestino();
$tipo->elimina($id);
echo "Eliminado";
