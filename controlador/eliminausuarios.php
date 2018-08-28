<?php
include '../modelo/usuariosman.model.php';
$id   = $_POST['identificador'];
$tipo = new Usuario();
$tipo->elimina($id);
echo "Eliminado";
