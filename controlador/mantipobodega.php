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
    if (isset($_POST['accionTipoBodega'])) {
        $accion = $_POST['accionTipoBodega'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarTipoBodega") {
            //opciones para guardar el registro nuevo
            include 'modelo/tipobodega.model.php';
            $TipoBodega = new mantipobodega();
            $descrip    = $_POST['descrip'];
            $flag       = $TipoBodega->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el tipo bodega, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaTipoBodega") {
            //opciones para actualizar el registro
            include 'modelo/tipobodega.model.php';
            $TipoBodega = new mantipobodega();
            $id         = $_POST['idTipoBodega'];
            $descrip    = $_POST['descrip'];
            $flag       = $TipoBodega->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el tipo bodega, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_TIPO_BODEGA as Identificador, DESCRIPCION FROM ttipo_bodega";
    $rs  = $mysqli->query($sql);

    include 'vista/mantipobodega.view.php';
} else {
    //  echo "<p class=\"no_validado\">" . "Por favor INICIA SESION" . "</p>";  // mensaje de que debe iniciar sesion para ingresar a modulo de destino.

    echo "<i class=\"no_validado\">" . "Por favor Inicia Sesion" . "</i>";
    include 'vista/login.view.php';
}
?>