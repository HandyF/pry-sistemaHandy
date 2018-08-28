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
    if (isset($_POST['accionProducto'])) {
        $accion = $_POST['accionProducto'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarProducto") {
            //opciones para guardar el registro nuevo
            include 'modelo/producto.model.php';
            $Productoregistro = new Producto(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $TipoProducto = $_POST['TipoProducto'];
            $Descripcion  = $_POST['Descripcion'];
            $observacion  = $_POST['observacion'];

            $flag = $Productoregistro->guardar($TipoProducto, $Descripcion, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el producto, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaProducto") {
            //opciones para actualizar el registro
            include 'modelo/producto.model.php';
            $Productoregistro = new Producto();

            $id           = $_POST['idProducto'];
            $TipoProducto = $_POST['TipoProducto'];
            $Descripcion  = $_POST['Descripcion'];
            $observacion  = $_POST['observacion'];

            $flag = $Productoregistro->actualiza($id, $TipoProducto, $Descripcion, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el producto, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_PRODUCTO as Identificador, ID_TIPO_PRODUCTO, DESCRIPCION_PRODUCTO, OBSERVACION FROM tproducto";
    $rs  = $mysqli->query($sql);

    include 'vista/manproducto.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>