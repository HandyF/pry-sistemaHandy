<?php
require_once 'controlador/conecta.php';
$usuario = 'SELECT e.ID_EMPLEADO, te.DESCRIPCION, e.RUT_EMPLEADO,
    e.NOMBRES_EMPLEADO, e.APELLIDOPATER_EMPLEADO, e.APELLIDOMATER_EMPLEADO, e.FECHA_NACIMIENTO,e.GENERO_EMPLEADO, e.DIRECCION_EMPLEADO, e.FONO_EMPLEADO, e.EMAIL_EMPLEADO

    FROM  templeado e inner join  ttipo_empleado te on   e.ID_TIPO_EMPLEADO= te.ID_TIPO_EMPLEADO';
$usuarios = $mysqli->query($usuario);

if (isset($_POST['create_pdf'])) {
    require_once 'tcpdf/tcpdf.php';

    $pdf = new TCPDF('P', 'mm', 'A3', true, 'UTF-8', false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('Handy Fierro Ortiz');
    $pdf->SetTitle($_POST['reporte_name']);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    $pdf->SetMargins(10, 20, 20, 20, false);
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
            <th>Codigo</th>
            <th>Tipo Empleado</th>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Fecha nacimiento</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Fono</th>
            <th>E-mail</th>
          </tr>
        </thead>
  ';

    while ($user = $usuarios->fetch_assoc()) {
        if ($user['ID_EMPLEADO'] == '1') {$color = '#f5f5f5';} else { $color = '#f5f5f5';}
        $content .= '
    <tr bgcolor="' . $color . '">
            <td>' . $user['ID_EMPLEADO'] . '</td>
            <td>' . $user['DESCRIPCION'] . '</td>
            <td>' . $user['RUT_EMPLEADO'] . '</td>
            <td>' . $user['NOMBRES_EMPLEADO'] . '</td>
            <td>' . $user['APELLIDOPATER_EMPLEADO'] . '</td>
            <td>' . $user['APELLIDOMATER_EMPLEADO'] . '</td>
            <td>' . $user['FECHA_NACIMIENTO'] . '</td>
            <td>' . $user['GENERO_EMPLEADO'] . '</td>
            <td>' . $user['DIRECCION_EMPLEADO'] . '</td>
            <td>' . $user['FONO_EMPLEADO'] . '</td>
            <td>' . $user['EMAIL_EMPLEADO'] . '</td>
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
    $pdf->output('Reporte_Empleados.pdf', 'I');
}

?>



<!doctype html>
<html lang="ES">
<head>
<meta charset="utf-8">
<title>Exportar a PDF</title>
<meta name="keywords" content="">
<meta name="description" content="">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid">
        <div class="row padding">
          <div class="col-sm-2">
            <?php
include 'vista/menuEmpleado.view.php';
?>

        </div>
          <div class="col-md-12">
              <?php $h1 = "Reporte de Empleados";
echo '<h1>' . $h1 . '</h1>'
?>
            </div>
        </div>
      <div class="row">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Codigo</th>
            <th>Tipo Empleado</th>
            <th>Rut</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Fecha nacimiento</th>
            <th>Genero</th>
            <th>Direccion</th>
            <th>Fono</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
        <?php
while ($user = $usuarios->fetch_assoc()) {?>
          <tr class="<?php if ($user['ID_EMPLEADO'] == '1') {echo 'active';} else {echo 'danger';}?>">
            <td><?php echo $user['ID_EMPLEADO']; ?></td>
            <td><?php echo $user['DESCRIPCION']; ?></td>
            <td><?php echo $user['RUT_EMPLEADO']; ?></td>
            <td><?php echo $user['NOMBRES_EMPLEADO']; ?></td>
            <td><?php echo $user['APELLIDOPATER_EMPLEADO']; ?></td>
            <td><?php echo $user['APELLIDOMATER_EMPLEADO']; ?></td>
            <td><?php echo $user['FECHA_NACIMIENTO']; ?></td>
            <td><?php echo $user['GENERO_EMPLEADO']; ?></td>
            <td><?php echo $user['DIRECCION_EMPLEADO']; ?></td>
            <td><?php echo $user['FONO_EMPLEADO']; ?></td>
            <td><?php echo $user['EMAIL_EMPLEADO']; ?></td>
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