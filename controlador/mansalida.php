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
    if (isset($_POST['accionSalida'])) {
        $accion = $_POST['accionSalida'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarSalida") {
            //opciones para guardar el registro nuevo
            include 'modelo/salida.model.php';
            $Salidaregistro = new Salida(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $Destino  = $_POST['Destino'];
            $Empleado = $_POST['Empleado'];
            //  $fechaHora = $_POST['fechaHora'];

            $itemSalid   = $_POST['itemSalid'];
            $Salida      = $_POST['Salida'];
            $Producto    = $_POST['Producto'];
            $Bodega      = $_POST['Bodega'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Salidaregistro->guardar($Destino, $Empleado, $itemSalid, $Salida, $Producto, $Bodega, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede guardar la salida, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaSalida") {
            //opciones para actualizar el registro
            include 'modelo/salida.model.php';
            $Salidaregistro = new Salida();

            $id       = $_POST['idSalida'];
            $Destino  = $_POST['Destino'];
            $Empleado = $_POST['Empleado'];
            // $fechaHora = $_POST['fechaHora'];

            $itemSalid   = $_POST['itemSalid'];
            $Salida      = $_POST['Salida'];
            $Producto    = $_POST['Producto'];
            $Bodega      = $_POST['Bodega'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Salidaregistro->actualiza($id, $Destino, $Empleado, $itemSalid, $Salida, $Producto, $Bodega, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar la salida, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_SALIDA as Identificador, ID_DESTINO, ID_EMPLEADO, FECHA_HORA FROM tsalida";

    $sqlDetalle = "SELECT ds.ITEM_SALIDA, s.FECHA_HORA, abp.ID_PRODUCTO, abp1.ID_BODEGA, ds.FECHA_HORA_ASIG, ds.CANTIDAD_PRODUCTO FROM  tdetalle_salida ds inner join tsalida s on ds.ID_SALIDA= s.ID_SALIDA
       inner join tasignacion_bodega_producto abp on  abp.ID_PRODUCTO= ds.ID_PRODUCTO
       inner join tasignacion_bodega_producto abp1 on abp1.ID_BODEGA= ds.ID_BODEGA";

    $rs = $mysqli->query($sql = $sqlDetalle);

    include 'vista/mansalida.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>