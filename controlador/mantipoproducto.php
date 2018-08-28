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
    if (isset($_POST['accionTipoProducto'])) {
        $accion = $_POST['accionTipoProducto'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarTipoProducto") {
            //opciones para guardar el registro nuevo
            include 'modelo/tipoproducto.model.php';
            $TipoProducto = new mantipoproducto();
            $descrip      = $_POST['descrip'];
            $flag         = $TipoProducto->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el tipo producto, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaTipoProducto") {
            //opciones para actualizar el registro
            include 'modelo/tipoproducto.model.php';
            $TipoProducto = new mantipoproducto();
            $id           = $_POST['idTipoProducto'];
            $descrip      = $_POST['descrip'];
            $flag         = $TipoProducto->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el tipo producto, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_TIPO_PRODUCTO as Identificador, DESCRIPCION FROM ttipo_producto";
    $rs  = $mysqli->query($sql);

    include 'vista/mantipoproducto.view.php';
} else {
    //  echo "<p class=\"no_validado\">" . "Por favor INICIA SESION" . "</p>";  // mensaje de que debe iniciar sesion para ingresar a modulo de destino.

    echo "<i class=\"no_validado\">" . "Por favor Inicia Sesion" . "</i>";
    include 'vista/login.view.php';
}
?>