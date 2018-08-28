<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-2">
			<?php
//include 'vista/menu.view.php';
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

			<h2>Mantenci&oacute;n Destino</h2><br>
			<table class="table">
				<form action="#" name="destino" method="post">
					<input type="hidden" name="accionDestino" id="accionDestino" value="GuardarDestino">
					<input type="hidden" name="idDestino" id="idDestino" value="0">
					<tr>
						<th>Descripci&oacute;n &nbsp;</th>
						<td><input type="text" name="descrip" id="descrip" maxlength="30" required placeholder="Nombre destino" class="form-control" onpaste="return false"></td>
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
					<th>Descripci&oacute;n</th>
					<th colspan="2">Acciones</th>
				</tr>

					<?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
							<tr>
								<td><?php echo $row['Identificador'] ?></td>
								<td><?php echo $row['DESCRIPCION_DESTINO'] ?></td>
								<td><button class="btn btn-success" onclick="moverDestino(<?php echo $row['Identificador'] ?>,'<?php echo $row['DESCRIPCION_DESTINO'] ?>')">Modificar <span class="glyphicon glyphicon-refresh"></span></button></td>
								<td><button class="btn btn-danger" onclick="eliminaDestino(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove"></span></button></td>
							</tr>
							<?php
}
?>
			</table>
		</div></div></div></div>

		<div class="col-sm-2">
			<?php
//include 'vista/publicidad.view.php';
?>
		</div>
	</div>

</div>