<?php
/**
 *
 */
class Bodega//class Usuario

{
    public $id;
    public $TipoBodega;
    public $Empleado;
    public $Descripcion;
    public $observacion;

    public function __construct()
    {

    }

    public function guardar($TipoBodega, $Empleado, $Descripcion, $observacion)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta = "INSERT INTO tbodega (ID_BODEGA, ID_TIPO_BODEGA, ID_EMPLEADO, DESCRIPCION_BODEGA, OBSERVACION_BODEGA) value (null,'" . $TipoBodega . "','" . $Empleado . "','" . $Descripcion . "','" . $observacion . "')";
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $TipoBodega, $Empleado, $Descripcion, $observacion)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE tbodega SET ID_TIPO_BODEGA='" . $TipoBodega . "', ID_EMPLEADO='" . $Empleado . "', DESCRIPCION_BODEGA='" . $Descripcion . "', OBSERVACION_BODEGA='" . $observacion . "' WHERE ID_BODEGA=" . $id;
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function elimina($id)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta = "DELETE FROM tbodega WHERE  ID_BODEGA=" . $id;
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    // métodos propios implementados
    public function valida_user_pass($user, $pass)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $sql   = "SELECT * FROM tusuario WHERE DESCRIPCION_USUARIO='" . $user . "' AND CONTRASENA='" . $pass . "'";
        $resp  = $mysqli->query($sql);
        $filas = mysqli_num_rows($resp);
        if ($filas === 0) {
            return false;
        } else {

            return true;

        }
    }

    public function valida_tipo_user($user)
    {
        require 'controlador/conecta.php';
        $sql1 = "SELECT ID_TIPO_USUARIO FROM tusuario WHERE DESCRIPCION_USUARIO = '" . $user . "'";
        //echo $sql1;
        $resp1 = $mysqli->query($sql1);
        while ($row1 = mysqli_fetch_array($resp1)) {
            //echo $row1['TipoUsuario'];
            return $row1['ID_TIPO_USUARIO'];
        }

    }

}
