<?php
/**
 *
 */
class AsignacionBodegaProducto//class Usuario

{
    public $Bodega;
    public $Producto;
    public $fechaHora_Asig;
    public $cantidadProducto;
    public $observacion;

    public function __construct()
    {

    }

    public function guardar($Bodega, $Producto, $cantidadProducto, $observacion)
    {
        //$mysqli = new mysqli("localhost", "Handy", "12345", "gestion_bodega_salacuna");
        /* comprobar la conexión */
        // if ($mysqli->connect_errno) {
        //    printf("Falló la conexión: %s\n", $mysqli->connect_error);
        //    exit();
        //}
        include $_SERVER['DOCUMENT_ROOT'] . '/pry-sistemaHandy/controlador/conecta.php';
        $consulta = "INSERT INTO tasignacion_bodega_producto (ID_BODEGA, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, OBSERVACION) value ('" . $Bodega . "','" . $Producto . "', now(),'" . $cantidadProducto . "','" . $observacion . "')";
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            echo "Error: " . $res . "<br>" . $mysqli->error;
            return false;
        }
    }

    public function actualiza($Bodega, $Producto, $cantidadProducto, $observacion)
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/pry-sistemaHandy/controlador/conecta.php';
        $consulta = "UPDATE tasignacion_bodega_producto SET ID_BODEGA='" . $Bodega . "', ID_PRODUCTO='" . $Producto . "', FECHA_HORA_ASIG=now(), CANTIDAD_PRODUCTO='" . $cantidadProducto . "' , OBSERVACION='" . $observacion . "' WHERE ID_PRODUCTO=" . $Producto;
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    //------------------------------------------------
    // public function elimina($Bodega, $Producto)
    // {
    //     include $_SERVER['DOCUMENT_ROOT'] . '/controlador/conecta.php';
    //     $consulta = "DELETE FROM tasignacion_bodega_producto WHERE ID_BODEGA= " . $Bodega . "and ID_PRODUCTO = " . $Producto;
    //     $res      = $mysqli->query($consulta);
    //     if ($res) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    //  }
    //----------------------------------------------------

    // métodos propios implementados
    public function valida_user_pass($user, $pass)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Fallólaconexión: % s\n", $mysqli->connect_error);
            exit();
        }
        $sql   = "SELECT * FROM tusuario WHERE DESCRIPCION_USUARIO = '" . $user . "' and CONTRASENA = '" . $pass . "'";
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
