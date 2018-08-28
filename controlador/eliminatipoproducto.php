<?php
include '../modelo/tipoproducto.model.php';
$id   = $_POST['identificador'];
$tipo = new mantipoproducto();
$tipo->elimina($id);
echo "Eliminado";
