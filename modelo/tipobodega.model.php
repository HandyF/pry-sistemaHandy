<?php
//echo'<i>+ modelo/tipousuario.model.php </i>';
/**
 * Autor: Handy Fierro Ortiz; fecha última modificación: 10/07/2018
 */
class mantipobodega
{
    public $id;
    public $descrip;

    public function __construct()
    {
        /* Se recomienda un constructor vacío, para no tener problemas en la instanciación*/
    }

    //métodos propios implementados
    public function guardar($descrip)
    {
        include 'controlador/conecta.php';
        $consulta = "INSERT INTO ttipo_bodega (ID_TIPO_BODEGA, DESCRIPCION) VALUES (null, '" . $descrip . "')";
        $res      = $mysqli->query($consulta);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function actualiza($id, $descrip)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE ttipo_bodega SET DESCRIPCION = '" . $descrip . "' WHERE ID_TIPO_BODEGA=" . $id;
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function elimina($id)
    {
        //include 'controlador/conecta.php';
        //se copia el código de la clase conecta.php
        //$mysqli = new mysqli("localhost","administrador","xyz123","pryTCE"); //localhost
        // $mysqli = new mysqli("localhost", "andres_27", "2345", "prytce"); //hosting
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1"); //localhost
        /* comprobar la conexion */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s/n", $mysqli->connect_error);
            exit();
        }
        $consulta = "DELETE FROM ttipo_bodega WHERE ID_TIPO_BODEGA =" . $id;
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
