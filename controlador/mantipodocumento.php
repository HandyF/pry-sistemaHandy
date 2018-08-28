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
    if (isset($_POST['accionTipoDocumento'])) {
        $accion = $_POST['accionTipoDocumento'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarTipoDocumento") {
            //opciones para guardar el registro nuevo
            include 'modelo/tipodocumento.model.php';
            $TipoDocumento = new mantipodocumento();
            $descrip       = $_POST['descrip'];
            $flag          = $TipoDocumento->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el tipo documento, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaTipoDocumento") {
            //opciones para actualizar el registro
            include 'modelo/tipodocumento.model.php';
            $TipoDocumento = new mantipodocumento();
            $id            = $_POST['idTipoDocumento'];
            $descrip       = $_POST['descrip'];
            $flag          = $TipoDocumento->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el tipo documento, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_TIPO_DOCUMENTO as Identificador, DESCRIPCION FROM ttipo_documento";
    $rs  = $mysqli->query($sql);

    include 'vista/mantipodocumento.view.php';
} else {
    //  echo "<p class=\"no_validado\">" . "Por favor INICIA SESION" . "</p>";  // mensaje de que debe iniciar sesion para ingresar a modulo de destino.

    echo "<i class=\"no_validado\">" . "Por favor Inicia Sesion" . "</i>";
    include 'vista/login.view.php';
}
?>