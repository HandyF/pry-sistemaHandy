<?php
/**
 *
 */
class Usuario
{
    public $id;
    public $TipoUsuario;
    public $Empleado;
    public $Descripcion;
    public $contrasena;
    //public $usuario;

    //public $nombres;
    //public $apellidos;
    //public $direccion;
    //public $fono;
    //public $mail;
    //public $fechaCreacion;
    //public $fechaModifica;
    //public $run;

    public function __construct()
    {

    }

    public function guardar($TipoUsuario, $Empleado, $Descripcion, $contrasena)
    // public function guardar($usuario, $contrasenia, $nombres, $apellidos, $direccion, $fono, $mail, $run, $TipoUsuario)
    {
        $mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
        /* comprobar la conexión */
        if ($mysqli->connect_errno) {
            printf("Falló la conexión: %s\n", $mysqli->connect_error);
            exit();
        }
        $consulta = "INSERT INTO tusuario (ID_USUARIO, ID_TIPO_USUARIO, ID_EMPLEADO, DESCRIPCION_USUARIO, CONTRASENA) value (null,'" . $TipoUsuario . "','" . $Empleado . "','" . $Descripcion . "','" . $contrasena . "')";
        $res      = $mysqli->query($consulta);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function actualiza($id, $TipoUsuario, $Empleado, $Descripcion, $contrasena)
    //  public function actualiza($id, $usuario, $contrasenia, $nombres, $apellidos, $direccion, $fono, $mail, $run, $TipoUsuario)
    {
        include 'controlador/conecta.php';
        $consulta = "UPDATE tusuario SET DESCRIPCION_USUARIO='" . $Descripcion . "',CONTRASENA='" . $contrasena . "', ID_EMPLEADO='" . $Empleado . "',ID_TIPO_USUARIO='" . $TipoUsuario . "' WHERE ID_USUARIO=" . $id;
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
        $consulta = "DELETE FROM tusuario WHERE ID_USUARIO=" . $id;
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
