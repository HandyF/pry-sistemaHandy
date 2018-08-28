<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
include 'vista/menuSalida.view.php';
?>
        </div>
        <div class="col-sm-10">
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

             <h2> Salida.</h2>
                    <h4> Llene todos los campos obligatorios (*)</h4><br>

            <table class="table" >
                <form action="#" name="salida" method="post">
                    <input type="hidden" name="accionSalida" id="accionSalida" value="GuardarSalida">
                    <input type="hidden" name="idSalida" id="idSalida" value="0">

                    <tr>
                      <?php
include 'controlador/selecciondestino.php'; // esto hace que funcione el select y muestra el tipo bodega.?>
                         <!-- esto reparar para el select-->
                        <th>Destino * &nbsp;</th>
                        <td><select  name="Destino" id="Destino"  maxlength="30" required class="form-control">
 <option value="0"> Seleccione Destino ... </option>
   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_DESTINO']; ?>"><?php echo $row['DESCRIPCION_DESTINO']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>

                    <tr>
                         <!-- esto reparar para el select-->
                        <th>Empleado * &nbsp;</th>
                        <td><input type="text" name="Empleado" id="Empleado" maxlength="30" required placeholder="Nombre empleado" onpaste="return false" class="form-control"></td>

                    </tr>
                     <tr>
                        <th>Fecha hora &nbsp;<span class="glyphicon glyphicon-calendar"></span></th>
                        <td><input type="text" name="fechaHora" id="fechaHora" required placeholder="" readonly onpaste="return false" class="form-control"></td>
                    </tr>

                       <tr>
                        <?php
include 'controlador/seleccionbodega.php'; // esto hace que funcione el select y muestra bodega.
?>
                         <!-- esto reparar para el select-->
                        <th>Bodega * &nbsp;</th>
                        <td><select  name="Bodega" id="Bodega"  maxlength="30" required class="form-control">
 <option value="0"> Seleccione Bodega ... </option>

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
include 'controlador/seleccionproducto.php'; // esto hace que funcione el select y muestra el producto.
?>
                         <!-- esto reparar para el select-->
                        <th>Producto * &nbsp;</th>
                        <td><select  name="Producto" id="Producto" required class="form-control">
 <option value="0"> Seleccione Producto ... </option>

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
                        <td><input type="text" name="cantidadProducto" id="cantidadProducto" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Digite cantidad" class="form-control"></td>
                    </tr>


                    <tr>
                        <th>Item salida &nbsp;</th>
                        <td><input type="text" name="itemSalid" id="itemSalid" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Digite Nº detalle" class="form-control"></td>
                    </tr>


                      <tr>
                        <th>Linea de codigo &nbsp;</th>
                        <td><input type="text" name="lineaCodigo" id="lineaCodigo" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Digite Nº detalle" class="form-control"></td>
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
                    <th>Destino</th>
                    <th>Empleado</th>
                    <th>fechaHora</th>

                    <th>Item</th>
                    <th>Bodega</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>Linea codigo</th>

                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
                            <tr>
                                <td><?php echo $row['Identificador'] ?></td>
                                <td><?php echo $row['ID_DESTINO'] ?></td>
                                <td><?php echo $row['ID_EMPLEADO'] ?></td>
                                <td><?php echo $row['FECHA_HORA'] ?></td>

                                <td><?php echo $row['ITEM_SALIDA'] ?></td>
                                <td><?php echo $row['ID_BODEGA'] ?></td>
                                <td><?php echo $row['ID_PRODUCTO'] ?></td>
                                <td><?php echo $row['CANTIDAD_PRODUCTO'] ?></td>
                                <td><?php echo $row['LINEA_CODIGO'] ?></td>


                                <td><button class="btn btn-success" onclick="moverSalida(<?php echo $row['Identificador'] ?>,'<?php echo $row['ID_DESTINO'] ?>', '<?php echo $row['ID_EMPLEADO'] ?>', '<?php echo $row['FECHA_HORA'] ?>', '<?php echo $row['ITEM_SALIDA'] ?>', '<?php echo $row['ID_BODEGA'] ?>', '<?php echo $row['ID_PRODUCTO'] ?>', '<?php echo $row['CANTIDAD_PRODUCTO'] ?>', '<?php echo $row['LINEA_CODIGO'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaSalida(<?php echo $row['Identificador'] ?>, '<?php echo $row['ITEM_SALIDA'] ?>')">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            <?php
}
?>
            </table>
        </div> </div></div>
    </div>

    </div>

</div>


