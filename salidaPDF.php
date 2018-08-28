<?php
require_once 'controlador/conecta.php';
$usuario = 'SELECT s.ID_SALIDA, d.DESCRIPCION_DESTINO, e.NOMBRES_EMPLEADO + e.APELLIDOS_EMPLEADO as EmpleadoNombresyApellidos, s.FECHA_HORA
FROM  tsalida s inner join tdestino d on s.ID_DESTINO= d.ID_DESTINO
                       join templeado e  on s.ID_EMPLEADO= e.ID_EMPLEADO ';

$detalleSalida = 'SELECT ds.ITEM_SALIDA, s.FECHA_HORA, abp.ID_PRODUCTO, abp1.ID_BODEGA, ds.FECHA_HORA_ASIG, ds.CANTIDAD_PRODUCTO FROM  tdetalle_salida ds inner join tsalida s on ds.ID_SALIDA= s.ID_SALIDA
       inner join tasignacion_bodega_producto abp on  abp.ID_PRODUCTO= ds.ID_PRODUCTO
       inner join tasignacion_bodega_producto abp1 on abp1.ID_BODEGA= ds.ID_BODEGA';

$usuarios = $mysqli->query($usuario = $detalleSalida);

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
            <th>ItemSalida</th>
            <th>Fecha Salida</th>
            <th>Destino</th>
            <th>Producto</th>
            <th>Bodega</th>
            <th>Cantidad Producto</th>
            <th>Empleado</th>
          </tr>
        </thead>
  ';

    while ($user = $usuarios->fetch_assoc()) {
        if ($user['ID_SALIDA'] == '1') {$color = '#f5f5f5';} else { $color = '#fbb2b2';}
        $content .= '
    <tr bgcolor="' . $color . '">
            <td>' . $user['ITEM_SALIDA'] . '</td>
            <td>' . $user['FECHA_HORA'] . '</td>
            <td>' . $user['DESCRIPCION'] . '</td>
            <td>' . $user['ID_PRODUCTO'] . '</td>
            <td>' . $user['ID_BODEGA'] . '</td>
            <td>' . $user['CANTIDAD_PRODUCTO'] . '</td>
            <td>' . $user['EmpleadoNombresyApellidos'] . '</td>
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
    $pdf->output('Reporte_Salida_Detalle.pdf', 'I');
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
include 'vista/menuSalida.view.php';
?>

        </div>
          <div class="col-md-12">
              <?php $h1 = "Reporte de Salida al Detalle";
echo '<h1>' . $h1 . '</h1>'
?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>ItemSalida</th>
            <th>Fecha Salida</th>
            <th>Destino</th>
            <th>Producto</th>
            <th>Bodega</th>
            <th>Cantidad Producto</th>
            <th>Empleado</th>
          </tr>
        </thead>
        <tbody>
        <?php
while ($user = $usuarios->fetch_assoc()) {?>
          <tr class="<?php if ($user['ID_SALIDA'] == '1') {echo 'active';} else {echo 'danger';}?>">
            <td><?php echo $user['ITEM_SALIDA']; ?></td>
            <td><?php echo $user['FECHA_HORA']; ?></td>
            <td><?php echo $user['DESCRIPCION']; ?></td>
            <td><?php echo $user['ID_PRODUCTO']; ?></td>
            <td><?php echo $user['ID_BODEGA']; ?></td>
            <td><?php echo $user['CANTIDAD_PRODUCTO']; ?></td>
            <td><?php echo $user['EmpleadoNombresyApellidos']; ?></td>
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