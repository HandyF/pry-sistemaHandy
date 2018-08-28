<?php
require 'controlador/conecta.php';
$query     = "SELECT ID_TIPO_PRODUCTO, DESCRIPCION  FROM ttipo_producto order by DESCRIPCION ASC";
$resultado = $mysqli->query($query);
