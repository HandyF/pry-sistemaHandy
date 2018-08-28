<?php
include "controlador/conecta.php";
include "controlador/paginador.php";
?>
<!--DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Paginador</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>Ejemplo de paginador <small>PHP, Mysql, PDO</small></h1>
                </div>


                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID_EMPLEADO</th>
                            <th>ID_TIPO_EMPLEADO</th>
                            <th>RUT_EMPLEADO</th>
                            <th>NOMBRES_EMPLEADO</th>
                            <th>APELLIDOS_EMPLEADO</th>
                            <th>FECHA_NACIMIENTO</th>
                            <th>DIRECCION_EMPLEADO</th>
                            <th>FONO_EMPLEADO</th>
                            <th>EMAIL_EMPLEADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
if ($totalregistros >= 1):
    foreach ($registros as $reg):
    ?>
                                     <tr>
                                        <td><?php echo $reg['ID_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['ID_TIPO_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['RUT_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['NOMBRES_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['APELLIDOS_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['FECHA_NACIMIENTO']; ?></td>
                                        <td><?php echo $reg['DIRECCION_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['FONO_EMPLEADO']; ?></td>
                                        <td><?php echo $reg['EMAIL_EMPLEADO']; ?></td>
                                    </tr>
                             <?php
endforeach;
else:
?>
                        <tr>
                            <td colspan="9">No hay registros</td>
                        </tr>
                        <?php endif;?>
                    </tbody>
                </table>

                <?php if ($totalregistros >= 1): ?>
                <nav aria-label="Page navigation" class="text-center">
                    <ul class="pagination">
                        <?php if ($pagina == 1): ?>
                        <li class="disabled">
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="index.php?pagina=<?php echo $pagina - 1; ?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
endif;

for ($i = 1; $i <= $numeropaginas; $i++) {
    if ($pagina == $i) {
        echo '<li class="active">
                                        <a href="index.php?pagina=' . $i . '">' . $i . '</a>
                                    </li>';
    } else {
        echo '<li>
                                        <a href="index.php?pagina=' . $i . '">' . $i . '</a>
                                    </li>';
    }
}

if ($pagina == $numeropaginas):
?>
                        <li class="disabled">
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <?php else: ?>
                        <li>
                            <a href="index.php?pagina=<?php echo $pagina + 1; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                        <?php endif;?>
                    </ul>
                </nav>
                <?php endif;?>

            </div>
        </div>
    </div>
    <!--script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html-->