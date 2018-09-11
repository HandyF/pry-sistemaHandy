<?php
/**
 *
 */
class Empleado//class Usuario

{
    public $id; //public $usuario;
    public $TipoEmpleado; //public $contrasenia;
    public $rut; //public $nombres;
    public $nombres; //public $apellidos;
    public $apellidoPater; //public $direccion;
    public $apellidoMater; //public $direccion;
    public $fechaNacimiento; //public $fono;
    public $genero;
    public $direccion; //public $mail;
    public $fono; //public $fechaCreacion;
    public $mail; //public $fechaModifica;
    //public $run;
    //public $TipoUsuario;

    public function __construct()
    {

    }

    public function guardar($TipoEmpleado, $rut, $nombres, $apellidoPater, $apellidoMater, $fechaNacimiento, $genero, $direccion, $fono, $mail)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }

        $consulta = "INSERT INTO templeado (ID_EMPLEADO, ID_TIPO_EMPLEADO, RUT_EMPLEADO, NOMBRES_EMPLEADO, APELLIDOPATER_EMPLEADO, APELLIDOMATER_EMPLEADO, FECHA_NACIMIENTO, GENERO_EMPLEADO, DIRECCION_EMPLEADO, FONO_EMPLEADO, EMAIL_EMPLEADO) value (null,'" . $TipoEmpleado . "','" . $rut . "','" . $nombres . "','" . $apellidoPater . "','" . $apellidoMater . "','" . $fechaNacimiento . "','" . $genero . "','" . $direccion . "','" . $fono . "','" . $mail . "')";
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $TipoEmpleado, $rut, $nombres, $apellidoPater, $apellidoMater, $fechaNacimiento, $genero, $direccion, $fono, $mail)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE templeado SET ID_TIPO_EMPLEADO='" . $TipoEmpleado . "',RUT_EMPLEADO='" . $rut . "', NOMBRES_EMPLEADO='" . $nombres . "',APELLIDOPATER_EMPLEADO='" . $apellidoPater . "',APELLIDOMATER_EMPLEADO='" . $apellidoMater . "',FECHA_NACIMIENTO='" . $fechaNacimiento . "',GENERO_EMPLEADO='" . $genero . "',DIRECCION_EMPLEADO='" . $direccion . "',FONO_EMPLEADO='" . $fono . "', EMAIL_EMPLEADO='" . $mail . "' WHERE ID_EMPLEADO=" . $id;
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
        $consulta = "DELETE FROM templeado WHERE ID_EMPLEADO=" . $id;
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
