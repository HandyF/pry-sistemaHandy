<div class="container jumbotron">
	<div class="row">
		<div class="col-sm-2">
			<?php
//if ($_SESSION['tipouser'] == 1) {
//   include 'vista/menu.view.php';
//} else if ($_SESSION['tipouser'] == 2) {
//    include 'vista/menuCliente.view.php';
//}

?>
		</div>
		<div class="col-sm-8">
			<h2>Actualiza tus datos</h1><br>

			<table class="table">
			<form action="#" name="manUser" method="post">
				<input type="hidden" name="accionUser" id="accionUser" value="ModificaUser">
				<input type="hidden" name="fId" id="fId" value="<?php echo $row2['id'] ?>">
				<input type="hidden" name="fUsername" id="fUsername" value="<?php echo $row2['Descripcion'] ?>">
				<input type="hidden" name="fPass" id="fPass" value="">
                <input type="hidden" name="fName" id="fName" value="">
				<input type="hidden" name="fLast" id="fLast" value="">
				<input type="hidden" name="fRun" id="fRun" value="">
				<input type="hidden" name="fAdress" id="fAdress" value="">
				<input type="hidden" name="fFono" id="fFono" value="">
				<input type="hidden" name="fEmail" id="fEmail" value="">

				<tr>
					<td width="150">Usuario</td><td width="300"><input type="text" name="user" readonly  required="required" value="<?php echo $row2['Descripcion'] ?>"></td>
				</tr>

<tr>
	<?php
include 'controlador/selecciontipouser.php'; // esto hace que funcione el select y muestra el tipo usuario.

?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Usuario * &nbsp;</th>
                        <td><select  name="TipoUsuario" id="TipoUsuario"  maxlength="30" required value="<?php echo $row2['TipoUsuario'] ?>">

 <option value="0"> Seleccione tipo usuario... </option>

   <?php while ($row = $resultado->fetch_assoc()) {?>
<option value="<?php echo $row['ID_TIPO_USUARIO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
}
?>
                        </select>
                        </td>


                          <!-- esto fin del select-->

                    </tr>

              <script>
					document.getElementById("TipoUsuario").maxLength = "30";
				</script>

				<tr>
					<td>Empleado id*</td><td><input type="text" name="last" id="last" required="required" value="<?php echo $row2['Empleado'] ?>"></td>
				</tr>
				<script>
					document.getElementById("empleado").maxLength = "1";
				</script>


				 <tr>
					<td>E-mail Empleado *</td><td><input type="email" name="last" id="last" required="required" value="<?php echo $row2['Empleado'] ?>"></td>
				</tr>
				<script>
					document.getElementById("empleado").maxLength = "50";
				</script>
				<tr>
					<td><input type="reset" name="limpiar" value="Limpiar" class="btn btn-default"></td>
					<td><input type="button" name="modificar" value="Actualizar" class="btn btn-info" onclick="modificaUsuario()"></td>
				</tr>
			</form>
			</table>
		</div>

		<div class="col-sm-2">
			<?php
//include 'vista/publicidad.view.php';
?>
		</div>
	</div>

</div>