<?php
include '../modelo/empleado.model.php';
$id   = $_POST['identificador'];
$tipo = new Empleado();
$tipo->elimina($id);
echo "Eliminado";
