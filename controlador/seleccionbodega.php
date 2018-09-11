<?php
require 'controlador/conecta.php';
$query     = "SELECT  ID_BODEGA, ID_TIPO_BODEGA, ID_EMPLEADO, DESCRIPCION_BODEGA, OBSERVACION_BODEGA FROM tbodega order by DESCRIPCION_BODEGA ASC";
$resultado = $mysqli->query($query);
