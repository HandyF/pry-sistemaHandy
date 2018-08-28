<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
include 'vista/menuProducto.view.php';
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

             <h2> Mantencion Producto.</h2>
                    <h4> Llene todos los campos obligatorios (*)</h4><br/>
            <table class="table">
                <form action="#" name="producto" method="post">
                    <input type="hidden" name="accionProducto" id="accionProducto" value="GuardarProducto">
                    <input type="hidden" name="idProducto" id="idProducto" value="0">
                    <tr>
                       <?php
include 'controlador/selecciontipoproducto.php'; // esto hace que funcione el select y muestra el tipo producto.
?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Producto * &nbsp;</th>
                        <td><select  name="TipoProducto" id="TipoProducto"  maxlength="30" required class="form-control">
 <option value="0"> Seleccione Tipo Producto ... </option>
   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_TIPO_PRODUCTO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>

                     <tr>
                        <th>Descripcion Producto &nbsp;</th>
                        <td><input type="text" name="Descripcion" id="Descripcion" maxlength="50" required placeholder="Nombre producto" class="form-control" onpaste="return false"></td>
                    </tr>

                      <tr>
                        <th>Observacion Producto &nbsp;</th>
                        <td><input type="text"  name="observacion" id="observacion" maxlength="100" required placeholder="Digite observacion del Producto" class="form-control" onpaste="return false"></td>
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
         <p align="center"> Tabla de datos ingresados </p>
              <div class="table-responsive"> <!-- creatabla responsiva -->
            <table class="table">
                <tr>
                    <th>Identificador</th>
                    <th>Tipo Producto</th>
                    <th>Descripcion</th>
                    <th>Observacion</th>

                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
                            <tr>
                                <td><?php echo $row['Identificador'] ?></td>
                                <td><?php echo $row['ID_TIPO_PRODUCTO'] ?></td>
                                <td><?php echo $row['DESCRIPCION_PRODUCTO'] ?></td>
                                <td><?php echo $row['OBSERVACION'] ?></td>

                                <td><button class="btn btn-success" onclick="moverProducto(<?php echo $row['Identificador'] ?>,'<?php echo $row['ID_TIPO_PRODUCTO'] ?>', '<?php echo $row['DESCRIPCION_PRODUCTO'] ?>', '<?php echo $row['OBSERVACION'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaProducto(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            <?php
}
?>
            </table>
        </div> </div> </div>
    </div>


    </div>

</div>


