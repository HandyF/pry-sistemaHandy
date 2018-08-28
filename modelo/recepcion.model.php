<?php
/**
 *
 */
class Recepcion//class Usuario

{
    public $id;
    public $Empleado;
    public $TipoDocumento;
    public $fechaHora;
    public $numeroTipoDocumento;

    public $itemRecep;
    public $Recepcion;
    public $Bodega;
    public $Producto;
    public $cantidad;
    //  public $fechaHora;
    public $lineaCodigo;

    public function __construct()
    {

    }

    public function guardar($Empleado, $TipoDocumento, $numeroTipoDocumento, $itemRecep, $Recepcion, $Bodega, $Producto, $cantidad, $lineaCodigo)
    {
        // $mysqli = new mysqli("localhost", "Handy", "12345", "gestion_bodega_salacuna");
        /* comprobar la conexión */
        // if ($mysqli->connect_errno) {
        //     printf("Falló la conexión: %s\n", $mysqli->connect_error);
        //     exit();
        // }
        include 'controlador/conecta.php';
        $consulta = "INSERT INTO trecepcion (ID_RECEPCION, ID_EMPLEADO, ID_TIPO_DOCUMENTO, FECHA_HORA, NUMERO_TIPO_DOCUMENTO) value (null,'" . $Empleado . "','" . $TipoDocumento . "', now(),'" . $numeroTipoDocumento . "')";

        $consultaDetalle = "INSERT INTO tdetalle_recepcion (ITEM_RECEPCION, ID_RECEPCION, ID_BODEGA, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, LINEA_CODIGO) value ('" . $itemRecep . "','" . $Recepcion . "','" . $Bodega . "', '" . $Producto . "','now(),'" . $cantidad . "','" . $lineaCodigo . "')";

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $Empleado, $TipoDocumento, $numeroTipoDocumento, $itemRecep, $Recepcion, $Bodega, $Producto, $cantidad, $lineaCodigo)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE trecepcion SET ID_EMPLEADO='" . $Empleado . "', ID_TIPO_DOCUMENTO='" . $TipoDocumento . "', FECHA_HORA=now(), NUMERO_TIPO_DOCUMENTO='" . $numeroTipoDocumento . "' WHERE ID_RECEPCION=" . $id;

        $consultaDetalle = "UPDATE tdetalle_recepcion SET ITEM_RECEPCION='" . $itemRecep . "', ID_RECEPCION='" . $Recepcion . "', ID_BODEGA='" . $Bodega . "', ID_PRODUCTO='" . $Producto . "', FECHA_HORA_ASIG=now(), CANTIDAD_PRODUCTO='" . $cantidad . "' , LINEA_CODIGO='" . $lineaCodigo . "' WHERE ITEM_RECEPCION=" . $itemRecep;

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function elimina($id, $itemRecep)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta        = "DELETE FROM trecepcion WHERE ID_RECEPCION=" . $id;
        $consultaDetalle = "DELETE FROM tdetalle_recepcion WHERE ITEM_RECEPCION=" . $itemRecep;
        $res             = $mysqli->query($consulta = $consultaDetalle);
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
