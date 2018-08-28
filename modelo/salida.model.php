<?php
/**
 *
 */
class Salida//class Usuario

{
    public $id;
    public $Destino;
    public $Empleado;
    public $fechaHora;

    public $itemSalid;
    public $Salida;
    public $Bodega;
    public $Producto;
    public $cantidad;
    //  public $fechaHora;
    public $lineaCodigo;

    public function __construct()
    {

    }

    public function guardar($Destino, $Empleado, $itemSalid, $Salida, $Producto, $Bodega, $cantidad, $lineaCodigo)
    {
        //  $mysqli = new mysqli("localhost", "Handy", "12345", "gestion_bodega_salacuna");
        /* comprobar la conexión */
        //  if ($mysqli->connect_errno) {
        //     printf("Falló la conexión: %s\n", $mysqli->connect_error);
        //     exit();
        // }
        include 'controlador/conecta.php';
        $consulta = "INSERT INTO tsalida (ID_SALIDA, ID_DESTINO, ID_EMPLEADO, FECHA_HORA) value (null,'" . $Destino . "','" . $Empleado . "',now())";

        $consultaDetalle = "INSERT INTO tdetalle_salida (ITEM_SALIDA, ID_SALIDA, ID_PRODUCTO, ID_BODEGA, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, LINEA_CODIGO) value ('" . $itemSalid . "','" . $Salida . "','" . $Producto . "', '" . $Bodega . "','now(),'" . $cantidad . "','" . $lineaCodigo . "')";

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $Destino, $Empleado, $itemSalid, $Salida, $Producto, $Bodega, $cantidad, $lineaCodigo)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE tsalida SET ID_DESTINO='" . $Destino . "', ID_EMPLEADO='" . $Empleado . "', FECHA_HORA=now() WHERE ID_SALIDA=" . $id;

        $consultaDetalle = "UPDATE tdetalle_salida SET ITEM_SALIDA='" . $itemSalid . "', ID_SALIDA='" . $Salida . "', ID_PRODUCTO='" . $Producto . "', ID_BODEGA='" . $Bodega . "', FECHA_HORA_ASIG=now(), CANTIDAD_PRODUCTO='" . $cantidad . "' , LINEA_CODIGO='" . $lineaCodigo . "' WHERE ITEM_SALIDA=" . $itemSalid;

        $res = $mysqli->query($consulta = $consultaDetalle);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function elimina($id, $itemSalid)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta        = "DELETE FROM tsalida WHERE ID_SALIDA=" . $id;
        $consultaDetalle = "DELETE FROM tdetalle_salida WHERE ITEM_SALIDA=" . $itemSalid;
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
