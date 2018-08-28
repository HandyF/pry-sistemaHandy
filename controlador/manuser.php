<style type="text/css">
    .no_validado{
    font-size:18px;
    color:#F60;
    font-weight:bold;
    }
</style>
<?php
if (isset($_SESSION['usuario'])) {
    //verificando la accion del formulario
    if (isset($_POST['accionUser'])) {
        $accion = $_POST['accionUser'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarUser") {
            //opciones para guardar el registro nuevo
            include 'modelo/usuarios.model.php';
            $Usuarioregistro = new Usuario(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $TipoUsuario = $_POST['TipoUsuario'];
            $Empleado    = $_POST['Empleado'];

            $Descripcion = $_POST['Descripcion'];
            $contrasena  = $_POST['contrasena'];

            $flag = $Usuarioregistro->guardar($TipoUsuario, $Empleado, $Descripcion, $contrasena);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el usuario, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaUser") {
            //opciones para actualizar el registro
            include 'modelo/usuarios.model.php';
            $Usuarioregistro = new Usuario();

            $id          = $_POST['idUser'];
            $TipoUsuario = $_POST['TipoUsuario'];
            $Empleado    = $_POST['Empleado'];

            $Descripcion = $_POST['Descripcion'];
            $contrasena  = $_POST['contrasena'];

            $flag = $Usuarioregistro->actualiza($id, $TipoUsuario, $Empleado, $Descripcion, $contrasena);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el usuario, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_USUARIO as Identificador, ID_TIPO_USUARIO, ID_EMPLEADO, DESCRIPCION_USUARIO, CONTRASENA FROM tusuario";
    $rs  = $mysqli->query($sql);

    include 'vista/manuser.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>