<?php
include '../modelo/tipoempleado.model.php';
$id   = $_POST['identificador'];
$tipo = new mantipoempleado();
$tipo->elimina($id);
echo "Eliminado";
