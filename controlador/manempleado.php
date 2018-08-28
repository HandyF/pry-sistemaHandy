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
    if (isset($_POST['accionEmpleado'])) {
        $accion = $_POST['accionEmpleado'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarEmpleado") {
            //opciones para guardar el registro nuevo
            include 'modelo/empleado.model.php';
            $Empleadoregistro = new Empleado(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $TipoEmpleado    = $_POST['TipoEmpleado'];
            $rut             = $_POST['rut'];
            $nombres         = $_POST['nombres'];
            $apellidos       = $_POST['apellidos'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $direccion       = $_POST['direccion'];
            $fono            = $_POST['fono'];
            $mail            = $_POST['mail'];

            $flag = $Empleadoregistro->guardar($TipoEmpleado, $rut, $nombres, $apellidos, $fechaNacimiento, $direccion, $fono, $mail);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el empleado, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaEmpleado") {
            //opciones para actualizar el registro
            include 'modelo/empleado.model.php';
            $Empleadoregistro = new Empleado();

            $id              = $_POST['idEmpleado'];
            $TipoEmpleado    = $_POST['TipoEmpleado'];
            $rut             = $_POST['rut'];
            $nombres         = $_POST['nombres'];
            $apellidos       = $_POST['apellidos'];
            $fechaNacimiento = $_POST['fechaNacimiento'];
            $direccion       = $_POST['direccion'];
            $fono            = $_POST['fono'];
            $mail            = $_POST['mail'];

            $flag = $Empleadoregistro->actualiza($id, $TipoEmpleado, $rut, $nombres, $apellidos, $fechaNacimiento, $direccion, $fono, $mail);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el empleado, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_EMPLEADO as Identificador, ID_TIPO_EMPLEADO, RUT_EMPLEADO, NOMBRES_EMPLEADO, APELLIDOS_EMPLEADO, FECHA_NACIMIENTO, DIRECCION_EMPLEADO, FONO_EMPLEADO, EMAIL_EMPLEADO FROM templeado";
    $rs  = $mysqli->query($sql);

    // $sql = " SELECT
    // e.ID_EMPLEADO as Identificador, te.DESCRIPCION, e.RUT_EMPLEADO,
    // e.NOMBRES_EMPLEADO, e.APELLIDOS_EMPLEADO, e.FECHA_NACIMIENTO,
    //  e.DIRECCION_EMPLEADO, e.FONO_EMPLEADO, e.EMAIL_EMPLEADO

    //  FROM  templeado e inner join  ttipo_empleado te on   e.ID_TIPO_EMPLEADO= te.ID_TIPO_EMPLEADO ";
    // $rs = $mysqli->query($sql);

    include 'vista/manempleado.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>