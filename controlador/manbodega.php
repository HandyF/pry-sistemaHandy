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
    if (isset($_POST['accionBodega'])) {
        $accion = $_POST['accionBodega'];
        echo "<script>alert(" . $accion . ")</script>";
        if ($accion == "GuardarBodega") {
            //opciones para guardar el registro nuevo
            include 'modelo/bodega.model.php';
            $Bodegaregistro = new Bodega(); //esto esta bien asi

            //$id=$_POST['idUser'];    // no guarda eso en el form.
            $TipoBodega  = $_POST['TipoBodega'];
            $Empleado    = $_POST['Empleado'];
            $Descripcion = $_POST['Descripcion'];
            $observacion = $_POST['observacion'];

            $flag = $Bodegaregistro->guardar($TipoBodega, $Empleado, $Descripcion, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede guardar la bodega, comuniquese con el administrador')</script>";
            }
        } elseif ($accion == "ModificaBodega") {
            //opciones para actualizar el registro
            include 'modelo/bodega.model.php';
            $Bodegaregistro = new Bodega();

            $id          = $_POST['idBodega'];
            $TipoBodega  = $_POST['TipoBodega'];
            $Empleado    = $_POST['Empleado'];
            $Descripcion = $_POST['Descripcion'];
            $observacion = $_POST['observacion'];

            $flag = $Bodegaregistro->actualiza($id, $TipoBodega, $Empleado, $Descripcion, $observacion);
            if (!$flag) {
                echo "<script>alert('No se puede actualizar la bodega, comuniquese con el administrador')</script>";
            }
        }
    }
    //cargando los tipos de usuarios que hay en la tabla ttipousuario
    include 'controlador/conecta.php';
    $sql = "SELECT ID_BODEGA as Identificador, ID_TIPO_BODEGA, ID_EMPLEADO, DESCRIPCION_BODEGA, OBSERVACION_BODEGA FROM tbodega";
    $rs  = $mysqli->query($sql);

    include 'vista/manbodega.view.php';
} else {
    echo "<p class=\"no_validado\">" . "Por favor Inicia Sesion" . "</p>";
    include 'vista/login.view.php';
}
?>