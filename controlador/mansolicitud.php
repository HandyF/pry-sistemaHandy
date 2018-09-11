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
    if (isset($_POST['accionSolicitud'])) {
        $accion = $_POST['accionSolicitud'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarSolicitud") {
            //opciones para guardar el registro nuevo
            include 'modelo/solicitud.model.php';
            $Solicitudregistro = new Solicitud(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $Empleado = $_POST['Empleado'];
            //  $fechaHora   = $_POST['fechaHora'];
            $observacion = $_POST['observacion'];

            $itemSolicit = $_POST['itemSolicit'];
            $Solicitud   = $_POST['Solicitud'];
            $Producto    = $_POST['Producto'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Solicitudregistro->guardar($Empleado, $observacion, $itemSolicit, $Solicitud, $Producto, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede guardar la solicitud, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaSolicitud") {
            //opciones para actualizar el registro
            include 'modelo/solicitud.model.php';
            $Solicitudregistro = new Solicitud();

            $id          = $_POST['idSolicitud'];
            $Empleado    = $_POST['Empleado'];
            $observacion = $_POST['observacion'];

            $itemSolicit = $_POST['itemSolicit'];
            $Solicitud   = $_POST['Solicitud'];
            $Producto    = $_POST['Producto'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Solicitudregistro->actualiza($id, $Empleado, $observacion, $itemSolicit, $Solicitud, $Producto, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar la solicitud, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    // $sql = "SELECT ID_SOLICITUD, ID_EMPLEADO, FECHA_HORA, OBSERVACION_SOLICITUD FROM tsolicitud";

    //   $sqlDetalle = "SELECT ITEM_SOLICITUD, ID_SOLICITUD, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, LINEA_CODIGO FROM tdetalle_solicitud";

    //  $rs = $mysqli->query($sql = $sqlDetalle);

    $sqlDetalle = "SELECT ITEM_SOLICITUD, ID_SOLICITUD, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, LINEA_CODIGO FROM tdetalle_solicitud";

    $rs = $mysqli->query($sqlDetalle);

    include 'vista/mansolicitud.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>


