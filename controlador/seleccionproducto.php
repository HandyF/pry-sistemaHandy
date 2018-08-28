<?php
require 'controlador/conecta.php';
$query     = "SELECT ID_PRODUCTO, ID_TIPO_PRODUCTO,	DESCRIPCION_PRODUCTO, OBSERVACION  FROM tproducto order by DESCRIPCION_PRODUCTO ASC";
$resultado = $mysqli->query($query);
