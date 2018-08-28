<?php
//echo'<i>+ modelo/usuarios.model.php </i>';
/**
 * Autor: Luis Sandoval; fecha última modificación: 18/07/2017
 */
class Registrar
{

    public $TipoUsuario;
    public $Empleado;
    public $Descripcion;
    public $contrasena;

    //  public $usuario;
    //  public $nombres;
    //  public $apellidos;
    //  public $direccion;
    //  public $fono;
    //  public $mail;
    //  public $run;
    //  public $contrasenia;
    //  public $tipoUsuario;

    public function __construct()
    {
        /* Se recomienda un constructor vacío, para no tener problemas en la instanciación*/
    }

    //métodos propios implementados
    public function guardarUsuario(, $TipoUsuario, $Empleado, $Descripcion, $contrasena)
    {
        include 'controlador/conecta.php';
        $consulta = "INSERT INTO tusuario (id,TipoUsuario, Empleado, Descripcion, contrasena) VALUES (null,'" . $TipoUsuario . "','" . $Empleado . "','" . $Descripcion . "','" . $contrasena . ;
        //var_dump($consulta);
        $res = $mysqli->query($consulta);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
    public function verificaUsuario($Descripcion)
    {
        include 'controlador/conecta.php';
        $verifica = "SELECT * FROM `tusuario` WHERE Descripcion = '" . $Descripcion . "' ";

        $res = $mysqli->query($verifica);

        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
