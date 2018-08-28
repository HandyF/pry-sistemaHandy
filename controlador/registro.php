<?php
//echo'<i>+ controlador/registro.php </i>';
if (isset($_POST['accionRegistro'])) {
    $accion = $_POST['accionRegistro'];
    if ($accion == "guardarRegistro") {
        //opciones para guardar un nuevo usuario
        include 'modelo/registro.model.php';
        $registro = new Registrar();

        $TipoUsuario = $_POST['TipoUsuario'];
        $Empleado    = $_POST['Empleado'];
        $Descripcion = $_POST['fUsername'];
        $contrasena  = $_POST['fPass'];

        $flagV = $registro->verificaUsuario($Descripcion);

        if ($flagV) {
            $flag = $registro->guardarUsuario($TipoUsuario, $Empleado, $Descripcion, $contrasena);

            if (!$flag) {
                echo "<script>alert('No se pudo guardar, comuníquese con el administrador')</script>";
            } else {
                echo "<script>alert('Se ha registrado exitosamente. Recuerde que sus datos de acceso son: Usuario= " . $Descripcion . ", Contraseña= " . $contrasena . " ')</script>";
            }
        } else {
            echo "<script>alert('Este nombre no está disponible, intente otro.')</script>";
        }

    }
}
include 'vista/registro.view.php';
