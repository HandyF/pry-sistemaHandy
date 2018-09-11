<?PHP
session_start();

if ((isset($_GET['control'])) && ($_GET['control'] != "")) {
    $control = $_GET['control'];

} else {
    //session_destroy();
    $control = "principal";
}

//este archivo es el que controlará todo lo que hagamos dentro del sitio
//if ((isset($_GET['control'])) && ($_GET['control'] != "")) {
//    $control = $_GET['control'];
//} else {
//    $control = "principal";
//}

// Aquí se carga las variables que vienen por POST en el archivo indexPost.php
include 'index/indexPost.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" lang="ES">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Gestion de Bodega Sala Cuna</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/funcionesAjax.js"></script>

</head>
<body>
  <?PHP
if ($_SESSION['tipouser'] == 1) {

//en esta linea sale error pero nose porque o como solucionar.(tipouser)
    ?><!--Agregamos encabezado y Menú Principal -->
  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?control=principal">Nombre Software</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span> HOME</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">MANTENEDORES <span class="caret"></span></a>
                        <ul class="dropdown-menu">

      <li><a href="index.php?control=manusuarios"><span class="glyphicon glyphicon-user"></span> Usuarios</a></li>
      <li><a href="index.php?control=mantipouser"><span class="glyphicon glyphicon-saved"></span> Tipo de usuario</a></li>
      <li><a href="index.php?control=manbodega"><span class="glyphicon glyphicon-saved"></span> Bodega</a></li>
      <li><a href="index.php?control=mantipobodega"><span class="glyphicon glyphicon-saved"></span> Tipo Bodega</a></li>
      <li><a href="index.php?control=manproducto"><span class="glyphicon glyphicon-saved"></span> Producto</a></li>
      <li><a href="index.php?control=mantipoproducto"><span class="glyphicon glyphicon-saved"></span> Tipo Producto</a></li>
      <li><a href="index.php?control=manempleado"><span class="glyphicon glyphicon-saved"></span> Empleado</a></li>
      <li><a href="index.php?control=mantipoempleado"><span class="glyphicon glyphicon-saved"></span> Tipo Empleado</a></li>
      <li><a href="index.php?control=mantipodocumento"><span class="glyphicon glyphicon-saved"></span> Tipo Documento</a></li>
      <li><a href="index.php?control=mandestino"><span class="glyphicon glyphicon-saved"></span> Destino</a></li>

                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">PROCESOS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
      <li><a href="index.php?control=manrecepcion"><span class="glyphicon glyphicon-calendar"></span> Recepci&oacute;n</a></li>
      <li><a href="index.php?control=mansalida"><span class="glyphicon glyphicon-calendar"></span> Salida</a></li>
      <li><a href="index.php?control=mansolicitud"><span class="glyphicon glyphicon-calendar"></span> Solicitud</a></li>
                        </ul>
                    </li>

<li><a href="index.php?control=manasignacionbodegaproducto">ASIGNACION BODEGA PRODUCTO</a></li>


                    <!--li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">AYUDA <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Politica de privasidad</a></li>
                            <li><a href="#">Informacion acerca del software</a></li>
                            <li><a href="formCorreoController.php"><i class="fa fa-envelope fa-2x"></i> Contacto</a></li>
                        </ul>
                    </li-->


    <ul class="nav navbar-nav navbar-right">

             <?PHP if (isset($_SESSION['usuario'])) {

        ?>
            <li><a href="index.php?control=manuser"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['usuario']; ?></a></li>
          <?PHP
} else {
        ?>
            <li><a href="index.php?control=registro"><span class="glyphicon glyphicon-user"></span>&nbsp;Reg&iacute;strese&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
      <?PHP
}
    ?>


      <?PHP if (isset($_SESSION['usuario'])) {
//(usuario)
        ?>
            <li><a href="index.php?control=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
          <?PHP
} else {
        ?>
            <li><a href="index.php?control=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Inicie Sesi&oacute;n</a></li>
      <?PHP
}
    ?>

      </ul>
       </ul>
    </div>
  </div>
</div>
<?PHP
}
?>

<?PHP

if (!isset($_SESSION['usuario'])) {; //en esta linea sale error pero nose porque o como solucionar.(usuario) 
  // cambie funcion de is_null a !isset();
    ?>
  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
      <li class="active"><a href="index.php?control=principal">Nombre Software</a></li>
                   <!-- index.php?control=bienvenido -->
      <li><a href="#"><span class="glyphicon glyphicon-home"></span> HOME</a></li>
      <!-- index.php?control=bienvenido -->
      <li><a href="index.php?control=manservicio"><span class="glyphicon glyphicon-saved"></span> Quienes somos ?</a></li>

    </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php?control=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Inicie Sesi&oacute;n</a></li>
          <li><a href="index.php?control=registro"><span class="glyphicon glyphicon-user"></span>&nbsp;Reg&iacute;strese&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
        </ul>
   </div>
  </div>
 </div>

<?PHP
}
;?>

<?PHP

if (isset($_SESSION['tipouser']) && $_SESSION['tipouser'] == 2) {
    ;
//en esta linea sale error pero nose porque o como solucionar.
    ?>

  <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php?control=principal">Nombre Software</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-home"></span> HOME</a></li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">MANTENEDORES <span class="caret"></span></a>
                        <ul class="dropdown-menu">

      <li><a href="index.php?control=manbodega"><span class="glyphicon glyphicon-saved"></span> Bodega</a></li>
      <li><a href="index.php?control=mantipobodega"><span class="glyphicon glyphicon-saved"></span> Tipo Bodega</a></li>
      <li><a href="index.php?control=manproducto"><span class="glyphicon glyphicon-saved"></span> Producto</a></li>
      <li><a href="index.php?control=mantipoproducto"><span class="glyphicon glyphicon-saved"></span> Tipo Producto</a></li>
      <li><a href="index.php?control=mantipodocumento"><span class="glyphicon glyphicon-saved"></span> Tipo Documento</a></li>
      <li><a href="index.php?control=mandestino"><span class="glyphicon glyphicon-saved"></span> Destino</a></li>
                        </ul>
                    </li>
                     <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">PROCESOS <span class="caret"></span></a>
                        <ul class="dropdown-menu">
      <li><a href="index.php?control=manrecepcion"><span class="glyphicon glyphicon-calendar"></span> Recepci&oacute;n</a></li>
      <li><a href="index.php?control=mansalida"><span class="glyphicon glyphicon-calendar"></span> Salida</a></li>
      <li><a href="index.php?control=mansolicitud"><span class="glyphicon glyphicon-calendar"></span> Solicitud</a></li>
                        </ul>
                    </li>



 <li><a href="index.php?control=manasignacionbodegaproducto">ASIGNACION BODEGA PRODUCTO</a></li>


            </ul>


    <ul class="nav navbar-nav navbar-right">
                      <li>
             <?PHP if (isset($_SESSION['usuario'])) {
        ?>
            <a href="index.php?control=manuser"><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $_SESSION['usuario']; ?></a>
          <?PHP
} else {
        ?>
            <a href="index.php?control=registro"><span class="glyphicon glyphicon-user"></span>&nbsp;Reg&iacute;strese&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <?PHP
}?>
           </li>
          <li>
      <?PHP if (isset($_SESSION['usuario'])) {
        ?>
            <a href="index.php?control=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Salir&nbsp;&nbsp;&nbsp;&nbsp;</a>
          <?PHP
} else {
        ?>
            <a href="index.php?control=login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Inicie Sesi&oacute;n</a>
      <?PHP
}
    ?>
      </li>

    </ul>
    </div>
    </div>
</div>

 <?PHP
}
;?>

<br/><br/>
 <?PHP
include 'vista/carousel.view.php';
?>
<br/>






</div>
</div> <!-- esta parte es del cierre del container -->
</div>
 <?PHP
include 'index/indexControl.php';
include 'vista/footer.view.php';
?>
</body>
</html>

