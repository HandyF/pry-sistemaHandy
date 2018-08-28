<?php
require 'controlador/conecta.php';
$query     = "SELECT ID_DESTINO, DESCRIPCION_DESTINO FROM tdestino order by 	DESCRIPCION_DESTINO ASC";
$resultado = $mysqli->query($query);
