<?php
//echo'<i>+ controlador/mantipouser.php </i>';
if (isset($_SESSION['usuario'])) {
    if (isset($_POST['accionTipoUser'])) {
        $accion = $_POST['accionTipoUser'];
        if ($accion == "GuardarTipoUser") {
            //opciones para guardar el registro nuevo
            include 'modelo/tipousuario.model.php';
            $tipoUsuario = new mantipouser();
            $descrip     = $_POST['descrip'];
            $flag        = $tipoUsuario->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se pudo guardar el tipo usuario, comuníquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaTipoUser") {
            //opciones para actualizar el registro
            include 'modelo/tipousuario.model.php';
            $tipoUsuario = new mantipouser();
            $id          = $_POST['idTipoUser'];
            $descrip     = $_POST['descrip'];
            $flag        = $tipoUsuario->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se pudo actualizar el tipo usuario, comuníquese con el administrador')</script>";
            }
        }
    }

    //cargando los tipos de usuario que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_TIPO_USUARIO AS Identificador, DESCRIPCION FROM ttipo_usuario";
    $rs  = $mysqli->query($sql);
    //verificando la acción del formulario

    include 'vista/mantipouser.view.php';
} else {
    session_destroy();
    header('Location: index.php?control=principal'); //echo "Usted no puede estar acá";
    //echo "Usted no puede estar acá";
}
