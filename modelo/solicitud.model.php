<?php
/**
 *
 */
class Solicitud//class Usuario

{
    public $id;
    public $Empleado;
    public $fechaHora;
    public $observacion;

    public $itemSolicit;
    public $Solicitud; //$Solicitud
    public $Producto;
    public $cantidad;
    //  public $fechaHora;
    public $lineaCodigo;

    public function __construct()
    {

    }

    public function guardar($Empleado, $observacion, $itemSolicit, $Solicitud, $Producto, $cantidad, $lineaCodigo)
    {
        //  $mysqli = new mysqli("localhost", "Handy", "12345", "gestion_bodega_salacuna");
        /* comprobar la conexión */
        //  if ($mysqli->connect_errno) {
        //     printf("Falló la conexión: %s\n", $mysqli->connect_error);
        //     exit();
        //  }
        include 'controlador/conecta.php';
        $consulta = "INSERT INTO tsolicitud (ID_SOLICITUD, ID_EMPLEADO, FECHA_HORA, OBSERVACION) value (null,'" . $Empleado . "', now(),'" . $observacion . "')";

        $consultaDetalle = "INSERT INTO tdetalle_solicitud (ITEM_SOLICITUD, ID_SOLICITUD, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, LINEA_CODIGO) value ('" . $itemSolicit . "','" . $Solicitud . "','" . $Producto . "', now(),'" . $cantidad . "','" . $lineaCodigo . "')";

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $Empleado, $observacion, $itemSolicit, $Solicitud, $Producto, $cantidad, $lineaCodigo)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE tsolicitud SET ID_EMPLEADO='" . $Empleado . "', FECHA_HORA=now(), OBSERVACION='" . $observacion . "' WHERE ID_SOLICITUD=" . $id;

        $consultaDetalle = "UPDATE tdetalle_solicitud SET ITEM_SOLICITUD='" . $itemSolicit . "', ID_SOLICITUD='" . $Solicitud . "', ID_PRODUCTO='" . $Producto . "', FECHA_HORA_ASIG=now(), CANTIDAD_PRODUCTO='" . $cantidad . "' , LINEA_CODIGO='" . $lineaCodigo . "' WHERE ITEM_SOLICITUD=" . $itemSolicit;

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function elimina($id, $itemSolicit)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta        = "DELETE FROM tsolicitud WHERE ID_SOLICITUD=" . $id;
        $consultaDetalle = "DELETE FROM tdetalle_solicitud WHERE ITEM_SOLICITUD=" . $itemSolicit;
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
