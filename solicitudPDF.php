<?php
require_once 'controlador/conecta.php';
//$usuario = 'SELECT st.ID_SOLICITUD, st.ID_EMPLEADO, st.FECHA_HORA, st.OBSERVACION_SOLICITUD
//FROM  tsolicitud st  join templeado e  on st.ID_EMPLEADO= e.ID_EMPLEADO';

//$detalleSolicitud = 'SELECT dst.ITEM_SOLICITUD, st.FECHA_HORA, p.NOMBRE_PRODUCTO, dst.FECHA_HORA_ASIG, dst.CANTIDAD_PRODUCTO, dst.LINEA_CODIGO FROM tdetalle_solicitud dst inner join tsolicitud st on dst.ID_SOLICITUD= st.ID_SOLICITUD
// inner join tproducto p on dst.ID_PRODUCTO= p.ID_PRODUCTO';

//$usuarios = $mysqli->query($usuario = $detalleSolicitud);

$usuario = "SELECT dst.ID_SOLICITUD, CONCAT( p.NOMBRE_PRODUCTO ,'<br><br>',  p.DESCRIPCION_PRODUCTO ,'<br><br>' ,p.OBSERVACION_PRODUCTO) AS NOMBRE_PRODUCTO, dst.ITEM_SOLICITUD, CONCAT(e.NOMBRES_EMPLEADO,' ', e.APELLIDOPATER_EMPLEADO,' ',e.APELLIDOMATER_EMPLEADO) as ID_EMPLEADO , st.OBSERVACION_SOLICITUD, dst.FECHA_HORA_ASIG, dst.CANTIDAD_PRODUCTO, dst.LINEA_CODIGO FROM tdetalle_solicitud dst
     inner join tsolicitud st on dst.ID_SOLICITUD= st.ID_SOLICITUD
     inner join tproducto p on dst.ID_PRODUCTO= p.ID_PRODUCTO
     inner join templeado e on dst.ID_PRODUCTO= e.ID_EMPLEADO";

$usuarios = $mysqli->query($usuario);

if (isset($_POST['create_pdf'])) {
    require_once 'tcpdf/tcpdf.php';

    $pdf = new TCPDF('P', 'mm', 'A3', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Handy Fierro Ortiz');
    $pdf->SetTitle($_POST['reporte_name']);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(15, 10, 10, 10, 10, false);
    $pdf->SetAutoPageBreak(true, 20);
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->addPage();

    $content = '';

    $content .= '
    <div class="row">
          <div class="col-sm-12">
              <h1 style="text-align:center;">' . $_POST['reporte_name'] . '</h1>

      <table border="1" cellpadding="2">
        <thead>
          <tr>
            <th>Item Solicitud</th>
            <th>Solicitud</th>
            <th>Fecha Solicitud</th>
            <th>Empleado</th>
            <th>Producto</th>
            <th>Cantidad producto</th>
            <th>Observacion solicitud</th>
            <th>Linea codigo</th>
          </tr>
        </thead>
  ';

    while ($user = $usuarios->fetch_assoc()) {
        if ($user['ID_SOLICITUD'] == '1') {$color = '#f5f5f5';} else { $color = '#f5f5f5';}
        $content .= '
    <tr bgcolor="' . $color . '">
            <td>' . $user['ITEM_SOLICITUD'] . '</td>
            <td>' . $user['ID_SOLICITUD'] . '</td>
            <td>' . $user['FECHA_HORA_ASIG'] . '</td>
            <td>' . $user['ID_EMPLEADO'] . '</td>
            <td>' . $user['NOMBRE_PRODUCTO'] . '</td>
            <td>' . $user['CANTIDAD_PRODUCTO'] . '</td>
            <td>' . $user['OBSERVACION_SOLICITUD'] . '</td>
            <td>' . $user['LINEA_CODIGO'] . '</td>
        </tr>
  ';
    }

    $content .= '</table>';

    $content .= '
    <div class="row padding">
          <div class="col-md-12" style="text-align:center;">
              <span>Pdf Creado por Handy </span>
            </div>
        </div>

  ';

    $pdf->writeHTML($content, true, 0, true, 0);

    $pdf->lastPage();
    $pdf->output('Reporte_Solicitud_detalle.pdf', 'I');
}

?>



<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title>Exportar a PDF</title>
<meta name="keywords" content="">
<meta name="description" content="">
<!-- Meta Mobil
================================================== -->
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
        <div class="row padding">
          <div class="col-sm-2">
            <?php
include 'vista/menuSolicitud.view.php';
?>

        </div>
          <div class="col-sm-12">
              <?php $h1 = "Reporte de Solicitud al Detalle";
echo '<h1>' . $h1 . '</h1>'
?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Item Solicitud</th>
            <th>Solicitud</th>
            <th>Fecha Solicitud</th>
            <th>Empleado</th>
            <th>Producto</th>
            <th>Cantidad producto</th>
            <th>Observacion Solicitud</th>
            <th>Linea codigo</th>
          </tr>
        </thead>
        <tbody>
        <?php
while ($user = $usuarios->fetch_assoc()) {?>

          <tr class="<?php if ($user['ID_SOLICITUD'] == '1') {echo 'active';} else {echo 'danger';}?>">
            <td><?php echo $user['ITEM_SOLICITUD']; ?></td>
            <td><?php echo $user['ID_SOLICITUD']; ?></td>
            <td><?php echo $user['FECHA_HORA_ASIG']; ?></td>
            <td><?php echo $user['ID_EMPLEADO']; ?></td>
            <td><?php echo $user['NOMBRE_PRODUCTO']; ?></td>
            <td><?php echo $user['CANTIDAD_PRODUCTO']; ?></td>
            <td><?php echo $user['OBSERVACION_SOLICITUD']; ?></td>
            <td><?php echo $user['LINEA_CODIGO']; ?></td>
          </tr>
         <?php }?>
        </tbody>
      </table>
              <div class="col-md-12">
                <form method="post">
                  <input type="hidden" name="reporte_name" value="<?php echo $h1; ?>">
                  <input type="submit" name="create_pdf" class="btn btn-danger pull-right" value="Generar PDF">
                </form>
              </div>
        </div>
    </div>


</body>
</html>