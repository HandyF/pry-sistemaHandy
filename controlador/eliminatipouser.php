<?php
include '../modelo/tipousuario.model.php';
$id   = $_POST['identificador'];
$tipo = new mantipouser();
$tipo->elimina($id);
echo "Eliminado";
