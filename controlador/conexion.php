<?php
$mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos

if (mysqli_connect_errno()) {
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
}
$acentos = $mysqli->query("SET NAMES 'utf8'")
?>
