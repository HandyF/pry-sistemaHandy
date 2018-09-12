<?php
//$server   = "localhost";
//$user     = "Handy";
//$password = "12345";
//$bd       = "gestionbodega1";

//$conexion = mysqli_connect($server, $user, $password, $bd);
//if (!$conexion) {
//    die('Error de Conexión: ' . mysqli_connect_errno());
//}

$mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");

/* comprobar la conexion */
if ($mysqli->connect_errno) {
    echo ("Falló la conexión: %s/n" . $mysqli->connect_error);
    exit();

}
