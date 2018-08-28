<?php
if ($control == "principal") {
    include 'vista/inicio.view.php';
} else if ($control == "login") {
    include 'vista/login.view.php';
} else if ($control == "mantipouser") {
    include 'controlador/mantipouser.php';
} else if ($control == "manuser") {
    include 'controlador/manuser.php';
} else if ($control == "registro") {
    include 'controlador/registro.php';

} else if ($control == "manusuarios") {
    //desde esta página se carga la respectiva vista usuarios
    include 'controlador/manusuarios.php';

} else if ($control == "manbodega") {
    //desde esta página se carga la respectiva vista bodega
    include 'controlador/manbodega.php';

} else if ($control == "mantipobodega") {
    //desde esta página se carga la respectiva vista tipo bodega
    include 'controlador/mantipobodega.php';

} else if ($control == "mandestino") {
    //desde esta página se carga la respectiva vista destino
    include 'controlador/mandestino.php';

} else if ($control == "manproducto") {
    //desde esta página se carga la respectiva vista producto
    include 'controlador/manproducto.php';

} else if ($control == "mantipoproducto") {
    //desde esta página se carga la respectiva vista tipo producto
    include 'controlador/mantipoproducto.php';

} else if ($control == "manempleado") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/manempleado.php';

} else if ($control == "empleadoPDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/empleadoPDF.php';

} else if ($control == "reportePDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'vista/empleadoPDF.view.php';

} else if ($control == "productoPDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/productoPDF.php';

} else if ($control == "recepcionPDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/recepcionPDF.php';

} else if ($control == "solicitudPDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/solicitudPDF.php';

} else if ($control == "salidaPDF") {
    //desde esta página se carga la respectiva vista empleado
    include 'controlador/salidaPDF.php';

} else if ($control == "mantipoempleado") {
    //desde esta página se carga la respectiva vista tipo empleado
    include 'controlador/mantipoempleado.php';

} else if ($control == "mantipodocumento") {
    //desde esta página se carga la respectiva vista tipo documento
    include 'controlador/mantipodocumento.php';

} else if ($control == "manrecepcion") {
    //desde esta página se carga la respectiva vista recepcion
    include 'controlador/manrecepcion.php';

} else if ($control == "mansalida") {
    //desde esta página se carga la respectiva vista salida
    include 'controlador/mansalida.php';

} else if ($control == "mansolicitud") {
    //desde esta página se carga la respectiva vista solicitud
    include 'controlador/mansolicitud.php';

} else if ($control == "manasignacionbodegaproducto") {
    //desde esta página se carga la respectiva vista solicitud
    include 'controlador/manasignacionbodegaproducto.php';

} else if ($control == "logout") {
    session_destroy();
    include 'vista/inicio.view.php';
} else if ($control == "registro") {
    include 'vista/manuser.view.php';
}
