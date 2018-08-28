<style type="text/css" >
    .no_validado{
    font-size:18px;
    color:#F60;
    font-weight:bold;
    }

</style>
<?php
if (isset($_SESSION['usuario'])) {
    //verificando la accion del formulario
    if (isset($_POST['accionTipoEmpleado'])) {
        $accion = $_POST['accionTipoEmpleado'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarTipoEmpleado") {
            //opciones para guardar el registro nuevo
            include 'modelo/tipoempleado.model.php';
            $TipoEmpleado = new mantipoempleado();
            $descrip      = $_POST['descrip'];
            $flag         = $TipoEmpleado->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el tipo empleado, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaTipoEmpleado") {
            //opciones para actualizar el registro
            include 'modelo/tipoempleado.model.php';
            $TipoEmpleado = new mantipoempleado();
            $id           = $_POST['idTipoEmpleado'];
            $descrip      = $_POST['descrip'];
            $flag         = $TipoEmpleado->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el tipo empleado, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_TIPO_EMPLEADO as Identificador, DESCRIPCION FROM ttipo_empleado";
    $rs  = $mysqli->query($sql);

    include 'vista/mantipoempleado.view.php';
} else {
    //  echo "<p class=\"no_validado\">" . "Por favor INICIA SESION" . "</p>";  // mensaje de que debe iniciar sesion para ingresar a modulo de destino.

    echo "<i class=\"no_validado\">" . "Por favor Inicia Sesion" . "</i>";
    include 'vista/login.view.php';
}
?>