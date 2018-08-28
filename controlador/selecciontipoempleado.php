<?php
require 'controlador/conecta.php';
$query     = "SELECT  ID_TIPO_EMPLEADO, DESCRIPCION  FROM ttipo_empleado order by DESCRIPCION ASC";
$resultado = $mysqli->query($query);
