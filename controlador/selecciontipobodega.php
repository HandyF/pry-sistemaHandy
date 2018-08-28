<?php
require 'controlador/conecta.php';
$query     = "SELECT  ID_TIPO_BODEGA, DESCRIPCION  FROM ttipo_bodega order by DESCRIPCION ASC";
$resultado = $mysqli->query($query);
