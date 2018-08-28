
<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-2">
			<?php
//include 'js/funcionesAjax.js';
?>
		</div>
		<div class="col-sm-7">
   <?php
include 'controlador/fecha.php';
?>
<br>
  <div class="btn-group btn-group-justified" role="group">
         <div class="fecha pull-right">
            <label>Fecha actual &nbsp;&nbsp;</label>
                    <i class="glyphicon glyphicon-calendar"></i>
                    <span><?php echo "$dia - $diaN de $mes , $anio " ?></span>
                </div></div>

			<h2>Mantención Tipo de Bodega</h2><br>
			<table class="table">
				<form action="#" name="tipobodega" method="post">
					<input type="hidden" name="accionTipoBodega" id="accionTipoBodega" value="GuardarTipoBodega">
					<input type="hidden" name="idTipoBodega" id="idTipoBodega" value="0">
					<tr>
						<th>Descripción &nbsp;</th>
						<td><input type="text" name="descrip" id="descrip" maxlength="30" required placeholder="Nombre Tipo Bodega" class="form-control" onpaste="return false"></td>
					</tr>
					<tr>
						<td align="center">
							<input type="reset" name="limpiar" value="Cancelar" class="btn btn-default">
						</td>
						<td align="center">
							<input type="submit" name="enviar" value="Actualizar/Guardar" class="btn btn-info">
						</td>
					</tr>
				</form>
			</table>
			      <div class="panel panel-primary"> <!--estilo del panel -->
        <div class="panel-body">         <!--estilo del panel -->
         <p> Tabla de datos ingresados </p>
              <div class="table-responsive"> <!-- creatabla responsiva -->
			<table class="table">
				<tr>
					<th>Identificador</th>
					<th>Descripción</th>
					<th colspan="2">Acciones</th>
				</tr>

					<?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
							<tr>
								<td><?php echo $row['Identificador'] ?></td>
								<td><?php echo $row['DESCRIPCION'] ?></td>
								<td><button class="btn btn-success" onclick="moverTipoBodega(<?php echo $row['Identificador'] ?>,'<?php echo $row['DESCRIPCION'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
								<td><button class="btn btn-danger" onclick="eliminaTipoBodega(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
							</tr>
							<?php
}
?>
			</table>
		</div></div></div>
		</div>

		<div class="col-sm-2">
			<?php
//include 'vista/publicidad.view.php';
?>
		</div>
	</div>

</div>