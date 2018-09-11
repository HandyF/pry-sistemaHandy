<?php
require_once 'controlador/conecta.php';
// $usuario = 'SELECT
// r.ID_RECEPCION, e.NOMBRES_EMPLEADO + e.APELLIDOS_EMPLEADO as EmpleadoNombresyApellidos, td.DESCRIPCION, r.FECHA_HORA, r.NUMERO_TIPO_DOCUMENTO

// FROM  trecepcion r inner join templeado e on r.ID_EMPLEADO= e.ID_EMPLEADO
//      join ttipo_documento td on r.ID_TIPO_DOCUMENTO= td.ID_TIPO_DOCUMENTO';

// $detalleRecepcion = 'SELECT dr.ITEM_RECEPCION, r.FECHA_HORA,
// abp2.ID_BODEGA, abp3.ID_PRODUCTO, dr.CANTIDAD_PRODUCTO, dr.FECHA_HORA_ASIG, dr.LINEA_CODIGO

// FROM  tdetalle_recepcion dr inner join trecepcion r on dr.ID_RECEPCION= r.ID_RECEPCION
//       inner join tasignacion_bodega_producto abp2 on abp2.ID_BODEGA= dr.ID_BODEGA
//       inner join tasignacion_bodega_producto abp3 on  abp3.ID_PRODUCTO= dr.ID_PRODUCTO';

// $usuarios = $mysqli->query($usuario = $detalleRecepcion);

$usuario = "SELECT dr.ITEM_RECEPCION, dr.ID_RECEPCION, CONCAT(b.DESCRIPCION_BODEGA,'<br><br>',b.OBSERVACION_BODEGA)  AS ID_BODEGA , CONCAT(p.NOMBRE_PRODUCTO,'<br><br>', p.DESCRIPCION_PRODUCTO,'<br><br>', p.OBSERVACION_PRODUCTO) as ID_PRODUCTO , dr.FECHA_HORA_ASIG, dr.CANTIDAD_PRODUCTO, dr.LINEA_CODIGO
       FROM  tdetalle_recepcion dr inner join tbodega b on b.ID_BODEGA= dr.ID_BODEGA
       inner join tproducto p on  p.ID_PRODUCTO= dr.ID_PRODUCTO";

$usuarios = $mysqli->query($usuario);

if (isset($_POST['create_pdf'])) {
    require_once 'tcpdf/tcpdf.php';

    $pdf = new TCPDF('P', 'mm', 'A3', true, 'UTF-8', false);

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
            <th>Item Recepcion</th>
            <th>Recepcion</th>
            <th>Bodega</th>
            <th>Producto</th>
            <th>Fecha Recepcion</th>
            <th>Cantidad producto</th>
            <th>Linea codigo</th>
          </tr>
        </thead>
  ';

    while ($user = $usuarios->fetch_assoc()) {
        if ($user['ID_RECEPCION'] == '1') {$color = '#f5f5f5';} else { $color = '#f5f5f5';}
        $content .= '
    <tr bgcolor="' . $color . '">
            <td>' . $user['ITEM_RECEPCION'] . '</td>
            <td>' . $user['ID_RECEPCION'] . '</td>
            <td>' . $user['ID_BODEGA'] . '</td>
            <td>' . $user['ID_PRODUCTO'] . '</td>
            <td>' . $user['FECHA_HORA_ASIG'] . '</td>
            <td>' . $user['CANTIDAD_PRODUCTO'] . '</td>
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
    $pdf->output('Reporte_Recepcion_detalle.pdf', 'I');
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
include 'vista/menuRecepcion.view.php';
?>

        </div>
          <div class="col-md-12">
              <?php $h1 = "Reporte de Recepcion al Detalle";
echo '<h1>' . $h1 . '</h1>'
?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Item Recepcion</th>
            <th>Recepcion</th>
            <th>Bodega</th>
            <th>Producto</th>
            <th>Fecha Recepcion</th>
            <th>Cantidad producto</th>
            <th>Linea codigo</th>
          </tr>
        </thead>
        <tbody>
        <?php
while ($user = $usuarios->fetch_assoc()) {?>
          <tr class="<?php if ($user['ID_RECEPCION'] == '1') {echo 'active';} else {echo 'danger';}?>">
            <td><?php echo $user['ITEM_RECEPCION']; ?></td>
            <td><?php echo $user['ID_RECEPCION']; ?></td>
            <td><?php echo $user['ID_BODEGA']; ?></td>
            <td><?php echo $user['ID_PRODUCTO']; ?></td>
            <td><?php echo $user['FECHA_HORA_ASIG']; ?></td>
            <td><?php echo $user['CANTIDAD_PRODUCTO']; ?></td>
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