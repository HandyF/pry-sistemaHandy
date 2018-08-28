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
    if (isset($_POST['accionRecepcion'])) {
        $accion = $_POST['accionRecepcion'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarRecepcion") {
            //opciones para guardar el registro nuevo
            include 'modelo/recepcion.model.php';
            $Recepcionregistro = new Recepcion(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $Empleado      = $_POST['Empleado'];
            $TipoDocumento = $_POST['TipoDocumento'];
            //  $fechaHora           = $_POST['fechaHora'];
            $numeroTipoDocumento = $_POST['numeroTipoDocumento'];

            $itemRecep   = $_POST['itemRecep'];
            $Recepcion   = $_POST['Recepcion'];
            $Bodega      = $_POST['Bodega'];
            $Producto    = $_POST['Producto'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Recepcionregistro->guardar($Empleado, $TipoDocumento, $numeroTipoDocumento, $itemRecep, $Recepcion, $Bodega, $Producto, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede guardar la recepcion, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaRecepcion") {
            //opciones para actualizar el registro
            include 'modelo/recepcion.model.php';
            $Recepcionregistro = new Recepcion();

            $id            = $_POST['idRecepcion'];
            $Empleado      = $_POST['Empleado'];
            $TipoDocumento = $_POST['TipoDocumento'];
            // $fechaHora           = $_POST['fechaHora'];
            $numeroTipoDocumento = $_POST['numeroTipoDocumento'];

            $itemRecep   = $_POST['itemRecep'];
            $Recepcion   = $_POST['Recepcion'];
            $Bodega      = $_POST['Bodega'];
            $Producto    = $_POST['Producto'];
            $cantidad    = $_POST['cantidad'];
            $lineaCodigo = $_POST['lineaCodigo'];

            $flag = $Recepcionregistro->actualiza($id, $Empleado, $TipoDocumento, $numeroTipoDocumento, $itemRecep, $Recepcion, $Bodega, $Producto, $cantidad, $lineaCodigo);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar la recepcion, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_RECEPCION as Identificador, ID_EMPLEADO, ID_TIPO_DOCUMENTO, FECHA_HORA, NUMERO_TIPO_DOCUMENTO

 FROM  trecepcion ";

    $sqlDetalle = "SELECT dr.ITEM_RECEPCION, r.FECHA_HORA,
abp2.ID_BODEGA, abp3.ID_PRODUCTO, dr.CANTIDAD_PRODUCTO, dr.LINEA_CODIGO

 FROM  tdetalle_recepcion dr inner join trecepcion r on dr.ID_RECEPCION= r.ID_RECEPCION
       inner join tasignacion_bodega_producto abp2 on abp2.ID_BODEGA= dr.ID_BODEGA
       inner join tasignacion_bodega_producto abp3 on  abp3.ID_PRODUCTO= dr.ID_PRODUCTO";
    $rs = $mysqli->query($sql = $sqlDetalle);

    include 'vista/manrecepcion.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>