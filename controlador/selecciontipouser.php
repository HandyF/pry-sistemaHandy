<?php
require 'controlador/conecta.php';
$query     = "SELECT  ID_TIPO_USUARIO, DESCRIPCION  FROM ttipo_usuario order by DESCRIPCION ASC";
$resultado = $mysqli->query($query);
