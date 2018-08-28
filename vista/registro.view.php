<?php //echo ' + vista/registro.view.php ';
//include 'controlador/seleccionempleado.php';
?>


<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-2">
			<?php
//include 'vista/menuCliente.view.php';
?>
		</div>
		<div class="col-sm-8">
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

			<h2>Regístrese</h2>
			<h4>Llene todos los campos obligatorios (*)</h4>
			<form action="#" id="formRegistro" name="formRegistro" method="post">
				<input type="hidden" name="accionRegistro" id="accionRegistro" value="guardarRegistro">
				<input type="hidden" name="fUsername" id="fUsername" value="">
				<input type="hidden" name="fPass" id="fPass" value="">

			<!--	<select type="hidden" name="fTipoUsuario" id="fTipoUsuario">
					<option value=""></option>
					</select>

                <select type="hidden" name="fEmpleado" id="fEmpleado">
                	<option value="value=""></option>
                </select> -->

				<table class="table">
					<tr>
						<td width="150">Usuario *</td><td width="300"><input type="text" name="username" required="required"></td>
					</tr>

<tr>
	<?php
include 'controlador/selecciontipouser.php'; // esto hace que funcione el select y muestra el tipo usuario.
?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Usuario * &nbsp;</th>
                        <td><select  name="TipoUsuario" id="TipoUsuario"  required value="">

 <option value="0"> Seleccione Tipo Usuario... </option>

   <?php while ($row = $resultado->fetch_assoc()) {?>
<option value="<?php echo $row['ID_TIPO_USUARIO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
}
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>



				<tr>
					<?php
include 'controlador/seleccionempleado.php';
?>
                    <th>Empleado * &nbsp;</th>
                        <td><select  name="Empleado" id="Empleado"  required value="">

      <option value="0"> Seleccione Empleado... </option>

   <?php while ($row = $resultado->fetch_assoc()) {?>
<option value="<?php echo $row['ID_EMPLEADO']; ?>"><?php echo $row['RUT_EMPLEADO']; ?></option>

   <?php
}
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
				</tr>




					<tr>
						<td>Contraseña *</td><td><input type="password" name="pass" id="pass" required="required"></td>
					</tr>
					<script>
						document.getElementById("pass").maxLength = "50";
					</script>
					<tr>
						<td>Repita Contraseña *</td><td><input type="password" name="repass" id="repass" required="required"></td>
					</tr>
					<script>
						document.getElementById("repass").maxLength = "50";
					</script>
					<tr>
						<td><input type="reset" name="limpiar" value="Limpiar" class="btn btn-default"></td>
						<td><input type="button" name="crear" value="Crear Usuario" class="btn btn-info" onclick="crearUsuario()"></td>
					</tr>
				</table>
			</form>
		</div>
		<div class="col-sm-2">
			<?php
//include 'vista/publicidad.view.php';
?>
		</div>
	</div>
</div>