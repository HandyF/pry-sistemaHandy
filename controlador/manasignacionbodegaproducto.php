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
    if (isset($_POST['accionAsignacionBodegaProducto'])) {
        $accion = $_POST['accionAsignacionBodegaProducto'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarAsignacionBodegaProducto") {
            //opciones para guardar el registro nuevo
            include 'modelo/asignacionbodegaproducto.model.php';
            $AsignacionBodegaProductoregistro = new AsignacionBodegaProducto(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $Bodega   = $_POST['Bodega'];
            $Producto = $_POST['Producto'];
            // $fechaHora_Asig   = $_POST['fechaHora_Asig'];
            $cantidadProducto = $_POST['cantidadProducto'];
            $observacion      = $_POST['observacion'];

            $flag = $AsignacionBodegaProductoregistro->guardar($Bodega, $Producto, $cantidadProducto, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede guardar la AsignacionBodegaProducto, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaAsignacionBodegaProducto") {
            //opciones para actualizar el registro
            include 'modelo/asignacionbodegaproducto.model.php';
            $AsignacionBodegaProductoregistro = new AsignacionBodegaProducto();

            $Bodega   = $_POST['Bodega'];
            $Producto = $_POST['Producto'];
            // $fechaHora_Asig   = $_POST['fechaHora_Asig'];
            $cantidadProducto = $_POST['cantidadProducto'];
            $observacion      = $_POST['observacion'];

            $flag = $AsignacionBodegaProductoregistro->actualiza($Bodega, $Producto, $cantidadProducto, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar la AsignacionBodegaProducto, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT  ID_BODEGA, ID_PRODUCTO, FECHA_HORA_ASIG, CANTIDAD_PRODUCTO, OBSERVACION
 FROM tasignacion_bodega_producto";
    $rs = $mysqli->query($sql);

    include 'vista/manasignacionbodegaproducto.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>