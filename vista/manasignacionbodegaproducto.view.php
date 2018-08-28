<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
include 'vista/menuAsignaProduct.view.php';
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

             <h2> Asigancion Bodega Producto </h2>
                <h4> Llene todos los campos obligatorios (*) </h4><br/>
            <table class="table">
                <form action="#" name="asigancionbodegaproducto" method="post">
                    <input type="hidden" name="accionAsignacionBodegaProducto" id="accionAsignacionBodegaProducto" value="GuardarAsignacionBodegaProducto">

                    <tr>
                        <th>Fecha hora &nbsp;</th>
                        <td><input type="text" name="fechaHora_Asig" id="fechaHora_Asig" required placeholder="" readonly onpaste="return false" class="form-control"></td>
                    </tr>


                    <tr>
                        <?php
include 'controlador/seleccionbodega.php';
?>
                         <!-- esto reparar para el select-->
                        <th>Bodega * &nbsp;</th>
                        <td><select  name="Bodega" id="Bodega"  maxlength="30" required class="form-control">
 <option value="0"> Seleccione Bodega... </option>
   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_BODEGA']; ?>"><?php echo $row['DESCRIPCION_BODEGA']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>

                      <tr>
<?php
include 'controlador/seleccionproducto.php'; // esto hace que funcione el select y muestra el tipo empleado.
?>
 <!-- esto inicia del select-->
                   <th>Producto * &nbsp;</th>
                        <td><select  name="Producto" id="Producto"  maxlength="30" required class="form-control">

                   <option value="0"> Seleccione Producto... </option>
                     <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_PRODUCTO']; ?>"><?php echo $row['DESCRIPCION_PRODUCTO']; ?></option>

<?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>




                    <tr>
                        <th>Cantidad Producto &nbsp;</th>
                        <td><input type="text"  name="cantidad" id="cantidad" required placeholder="Digite cantidad"  class="form-control"></td>
                    </tr>


                    <tr>
                        <th>Observacion Producto &nbsp;</th>
                        <td><input type="text"  name="observacion" id="observacion" maxlength="100" required placeholder="Digite observacion del Producto" class="form-control"></td>
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
                    <th>Bodega</th>
                    <th>Producto</th>
                    <th>Fecha hora</th>
                    <th>Cantidad Producto</th>
                    <th>Observacion</th>
                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
                            <tr>
                                <td><?php echo $row['ID_BODEGA'] ?></td>
                                <td><?php echo $row['ID_PRODUCTO'] ?></td>
                                <td><?php echo $row['FECHA_HORA_ASIG'] ?></td>
                                <td><?php echo $row['CANTIDAD_PRODUCTO'] ?></td>
                                <td><?php echo $row['OBSERVACION'] ?></td>
                                <td><button class="btn btn-success" onclick="moverAsignacionBodegaProducto(<?php echo $row['ID_BODEGA'] ?>, '<?php echo $row['ID_PRODUCTO'] ?>', '<?php echo $row['FECHA_HORA_ASIG'] ?>','<?php echo $row['CANTIDAD_PRODUCTO'] ?>', '<?php echo $row['OBSERVACION'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaAsignacionBodegaProducto(<?php echo $row['ID_BODEGA'] ?>,'<?php echo $row['ID_PRODUCTO'] ?>')">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            <?php
}
?>
            </table>
        </div> </div></div> </div>
    </div>


    </div>

</div>


