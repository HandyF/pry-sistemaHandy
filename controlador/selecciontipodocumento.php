<?php
require 'controlador/conecta.php';
$query     = "SELECT  ID_TIPO_DOCUMENTO, DESCRIPCION  FROM ttipo_documento order by DESCRIPCION ASC";
$resultado = $mysqli->query($query);
