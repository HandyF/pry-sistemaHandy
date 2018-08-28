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
    if (isset($_POST['accionDestino'])) {
        $accion = $_POST['accionDestino'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarDestino") {
            //opciones para guardar el registro nuevo
            include 'modelo/destino.model.php';
            $destino = new mandestino();
            $descrip = $_POST['descrip'];
            $flag    = $destino->guardar($descrip);
            if (!$flag) {
                echo "<script>alert('No se puede guardar el destino, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaDestino") {
            //opciones para actualizar el registro
            include 'modelo/destino.model.php';
            $destino = new mandestino();
            $id      = $_POST['idDestino'];
            $descrip = $_POST['descrip'];
            $flag    = $destino->actualiza($id, $descrip);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar el destino, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_DESTINO as Identificador, DESCRIPCION_DESTINO FROM tdestino";
    $rs  = $mysqli->query($sql);

    include 'vista/mandestino.view.php';
} else {
    //  echo "<p class=\"no_validado\">" . "Por favor INICIA SESION" . "</p>";  // mensaje de que debe iniciar sesion para ingresar a modulo de destino.

    echo "<i class=\"no_validado\">" . "Por favor Inicia Sesion" . "</i>";
    include 'vista/login.view.php';
}
?>