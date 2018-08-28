<?php
$fecha = getdate();
$diaN  = date('d');
$anio  = date('Y');
$meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
$diaS  = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
$dia   = $diaS[$fecha['wday']];
$mes   = $meses[$fecha['mon'] - 1];
