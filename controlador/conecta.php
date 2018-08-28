<?php
$mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");

/* comprobar la conexion */
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s/n", $mysqli->connect_error);
    exit();

}
