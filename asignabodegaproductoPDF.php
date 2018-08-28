<?php
require_once 'controlador/conecta.php';
$usuario = 'SELECT
b.DESCRIPCION_BODEGA, p.DESCRIPCION_PRODUCTO, abp.FECHA_HORA_ASIG, abp.CANTIDAD_PRODUCTO, abp.OBSERVACION
 FROM tasignacion_bodega_producto abp inner join tbodega b on abp.ID_BODEGA= b.ID_BODEGA                            inner join tproducto p on abp.ID_PRODUCTO= p.ID_PRODUCTO';

$usuarios = $mysqli->query($usuario);

if (isset($_POST['create_pdf'])) {
    require_once 'tcpdf/tcpdf.php';

    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Handy Fierro Ortiz');
    $pdf->SetTitle($_POST['reporte_name']);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(20, 20, 20, 20, false);
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->SetFont('Helvetica', '', 10);
    $pdf->addPage();

    $content = '';

    $content .= '
    <div class="row">
          <div class="col-md-12">
              <h1 style="text-align:center;">' . $_POST['reporte_name'] . '</h1>

      <table border="1" cellpadding="2">
        <thead>
          <tr>
            <th>Bodega</th>
            <th>Producto</th>
            <th>Fecha hora</th>
            <th>Cantidad producto</th>
            <th>Observacion</th>
          </tr>
        </thead>
  ';

    while ($user = $usuarios->fetch_assoc()) {
        if ($user['ID_SOLICITUD'] == '1') {$color = '#f5f5f5';} else { $color = '#fbb2b2';}
        $content .= '
    <tr bgcolor="' . $color . '">
            <td>' . $user['DESCRIPCION_BODEGA'] . '</td>
            <td>' . $user['DESCRIPCION_PRODUCTO'] . '</td>
            <td>' . $user['FECHA_HORA_ASIG'] . '</td>
            <td>' . $user['CANTIDAD_PRODUCTO'] . '</td>
            <td>' . $user['OBSERVACION'] . '</td>
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
    $pdf->output('Reporte_asignacion_bodega_producto.pdf', 'I');
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
          <div class="col-md-12">
              <?php $h1 = "Reporte de Asignacion bodega productos";
echo '<h1>' . $h1 . '</h1>'
?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Bodega</th>
            <th>Producto</th>
            <th>Fecha hora</th>
            <th>Cantidad producto</th>
            <th>Observacion</th>
          </tr>
        </thead>
        <tbody>
        <?php
while ($user = $usuarios->fetch_assoc()) {?>
          <tr class="<?php if ($user['ID_SOLICITUD'] == '1') {echo 'active';} else {echo 'danger';}?>">
            <td><?php echo $user['DESCRIPCION_BODEGA']; ?></td>
            <td><?php echo $user['DESCRIPCION_PRODUCTO']; ?></td>
            <td><?php echo $user['FECHA_HORA_ASIG']; ?></td>
            <td><?php echo $user['CANTIDAD_PRODUCTO']; ?></td>
            <td><?php echo $user['OBSERVACION']; ?></td>
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