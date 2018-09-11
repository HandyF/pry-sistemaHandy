<?php
require 'controlador/conecta.php';
$query     = "SELECT ID_PRODUCTO, ID_TIPO_PRODUCTO, NOMBRE_PRODUCTO, IMAGEN_PRODUCTO, DESCRIPCION_PRODUCTO, OBSERVACION_PRODUCTO  FROM tproducto order by NOMBRE_PRODUCTO ASC";
$resultado = $mysqli->query($query);
