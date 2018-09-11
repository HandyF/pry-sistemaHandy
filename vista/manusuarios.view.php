<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-2">
			<!--?php
//include 'vista/menu.view.php';
?-->
		</div>
			<div class="col-sm-8" >
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

			<h2>Mantención Usuarios</h2>
			<h4>Llene todos los campos obligatorios (*)</h4><br>
			<table class="table">
				<form action="#"  name="formUsuarios" method="post">
					<input type="hidden" name="accionUser" id="accionUser" value="GuardarUser">
					<input type="hidden" name="idUser" id="idUser" value="0">


                      <tr class="col-sm-6">
                      	<?php
include 'controlador/selecciontipouser.php'; // esto hace que funcione el select y muestra el tipo usuario.

?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Usuario *&nbsp;</th>
                        <td><select  name="TipoUsuario" id="TipoUsuario" required class="form-control">

 <option value="0">Seleccione Tipo Usuario..</option>

   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_TIPO_USUARIO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>

                     <tr class="col-sm-6">
                     	<?php
include 'controlador/seleccionempleado.php'; // esto hace que funcione el select y muestra el tipo usuario.

?>
                         <!-- esto reparar para el select-->
                        <th>Empleado *&nbsp;</th>
                        <td><select  name="Empleado" id="Empleado"  required class="form-control">
                             <option value="0">Seleccione Empleado ..</option>
                                 <?php while ($row = $resultado->fetch_assoc()): ?>
                         <option value="<?php echo $row['ID_EMPLEADO']; ?>"><?php echo $row['NOMBRES_EMPLEADO']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>

                          <!-- esto fin del select-->
                    </tr>


					<tr class="col-sm-8">
						<th>Nombre Usuario &nbsp;<span class="glyphicon glyphicon-user"></span></th>
						<td><input type="text" name="Descripcion" id="Descripcion" maxlength="50" required placeholder="Digite nombre usuario" class="form-control" onpaste="return false"></td>
					</tr>


	                 <tr class="col-sm-6">
						<th>Contrase&ntilde;a &nbsp;<span class="glyphicon glyphicon-lock"></span></th><td><input type="password" name="contrasena" id="contrasena" required placeholder="Digite contraseña" onpaste="return false" maxlength="50" class="form-control">
                                      <i>(Digite hasta un máximo 50 caracteres)</i>
                                      <br/>
                                      <i> se recomienda Primera letra mayuscula, seguido de minusculas y numeros "ejemplo: Example121"</i>
						</td>
					</tr>
                   <!-- <script>
						document.getElementById("contrasena").maxLength = "50";
					</script> -->


					<tr class="col-sm-6">
						<th>Repita Contrase&ntilde;a &nbsp;<span class="glyphicon glyphicon-lock"></span></th><td style="width:100%"><input type="password" name="recontrasena" id="recontrasena" required placeholder="Digite otra vez la contraseña" onpaste="return false" maxlength="50"  class="form-control">
                                           <i>
                                             (Digite otra vez la contraseña)
                                           </i>
						</td>
					</tr>
                 <!--  <script>
						document.getElementById("recontrasena").maxLength = "50";
					</script> -->

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

<p align="center"> Tabla de datos ingresados </p>

    <div class="table-responsive">       <!-- creatabla responsiva -->
			<table class="table" >  <!-- id= tipousario (esto esta declarado en funcionesAjax para la busqueda con eso filtra la tabla) -->
				<tr>
					<th>Identificador</th>
					<th>Tipo Usuario</th>
					<th>Empleado</th>
					<th>Descripci&oacute;n</th>
					<th>Contrase&ntilde;a</th>
					<th colspan="2">Acciones</th>
				</tr>

					<?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
							<tr>
								<td><?php echo $row['Identificador'] ?></td>
								<td><?php echo $row['ID_TIPO_USUARIO'] ?></td>
								<td><?php echo $row['ID_EMPLEADO'] ?></td>
								<td><?php echo $row['DESCRIPCION_USUARIO'] ?></td>
								<td><?php echo $row['CONTRASENA'] ?></td>
								<td><button class="btn btn-success" onclick="moverUsuarios(<?php echo $row['Identificador'] ?>,'<?php echo $row['ID_TIPO_USUARIO'] ?>', '<?php echo $row['ID_EMPLEADO'] ?>', '<?php echo $row['DESCRIPCION_USUARIO'] ?>','<?php echo $row['CONTRASENA'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
								<td><button class="btn btn-danger" onclick="eliminaUsuarios(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
							</tr>
							<?php
}
?>
			</table>
		</div></div></div>

</div>

		<div class="col-sm-2">
			<!--?php
//include 'vista/publicidad.view.php';
?-->
		</div>
	</div>

</div>