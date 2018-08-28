<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
//include 'vista/menu.view.php';
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

             <h2> Mantencion Bodega.</h2>
                    <h4> Llene todos los campos obligatorios (*)</h4><br/>
            <table class="table" >
                <form action="#" name="bodega" method="post">
                    <input type="hidden" name="accionBodega" id="accionBodega" value="GuardarBodega">
                    <input type="hidden" name="idBodega" id="idBodega" value="0">
                    <tr>
<?php
include 'controlador/selecciontipobodega.php'; // esto hace que funcione el select y muestra el tipo bodega.
?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Bodega * &nbsp;</th>
                        <td><select  name="TipoBodega" id="TipoBodega"  maxlength="30" required class="form-control">

 <option value="0"> Seleccione Tipo Bodega ... </option>

   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_TIPO_BODEGA']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>

                          <!-- esto fin del select-->

                    </tr>
                     <tr>
                        <th>Empleado &nbsp;</th>
                        <td><input type="text" name="Empleado" id="Empleado" maxlength="30" required placeholder="Nombre empleado" class="form-control" onpaste="return false"></td>
                    </tr>
                      <tr>
                        <th>Nombre Bodega &nbsp;</th>
                        <td><input type="text" name="Descripcion" id="Descripcion" maxlength="50" required placeholder="Digite Nombre bodega" onkeypress="return soloLetras(event)"  class="form-control" onpaste="return false"></td>
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
                    <th>Tipo Bodega</th>
                    <th>Empleado</th>
                    <th>Descripci&oacute;n</th>

                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
                            <tr>
                                <td><?php echo $row['Identificador'] ?></td>
                                <td><?php echo $row['ID_TIPO_BODEGA'] ?></td>
                                <td><?php echo $row['ID_EMPLEADO'] ?></td>
                                <td><?php echo $row['DESCRIPCION_BODEGA'] ?></td>

                                <td><button class="btn btn-success" onclick="moverBodega(<?php echo $row['Identificador'] ?>,'<?php echo $row['ID_TIPO_BODEGA'] ?>', '<?php echo $row['ID_EMPLEADO'] ?>', '<?php echo $row['DESCRIPCION_BODEGA'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaBodega(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            <?php
}
?>
            </table>
        </div> </div> </div> </div>


    </div>

</div>


