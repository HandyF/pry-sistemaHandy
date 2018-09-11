<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
include 'vista/menuSolicitud.view.php';
?>
        </div>

        <div class="col-sm-12"> <!--vista de datos pantalla solicitud-->
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

             <h2> Solicitud. </h2>
                    <h4>  Llene todos los campos obligatorios (*)</h4>
            <br/>
            <table class="table" >
                <form action="#" name="solicitud" method="post">
                    <input type="hidden" name="accionSolicitud" id="accionSolicitud" value="GuardarSolicitud">
                    <input type="hidden" name="idSolicitud" id="idSolicitud" value="0">
                    <input type="hidden" name="Solicitud" id="Solicitud" value="0">

                   <tr class="col-sm-6">
                        <th>Fecha hora &nbsp;<span class="glyphicon glyphicon-calendar"></span></th>
                        <td><input type="text" name="fechaHora" id="fechaHora" required placeholder="" readonly onpaste="return false" class="form-control" disabled></td><!-- disabled = hace que se vea el icono de bloqueo -->
                    </tr>

                    <tr class="col-sm-6">
                         <!-- esto reparar para el select-->
                        <th>Empleado * &nbsp;</th>
                        <td><input type="text" name="Empleado" id="Empleado" maxlength="30" required placeholder="Nombre empleado"  onpaste="return false" class="form-control"></td>
                    </tr>


                      <tr class="col-sm-6">
                        <th>Observacion &nbsp;</th>
                        <td style="width:100%"><textarea  rows="5" type="text" name="observacion" id="observacion" maxlength="100" required placeholder="Digite observacion solicitud"  onpaste="return false" class="form-control" ></textarea></td>
                    </tr>

                         <tr class="col-sm-6">
                        <?php
include 'controlador/seleccionproducto.php'; // esto hace que funcione el select y muestra el producto.
?>
                         <!-- esto reparar para el select-->
                        <th>Producto * &nbsp;</th>
                        <td><select  name="Producto" id="Producto" required class="form-control">
 <option value="0"> Seleccione Producto ... </option>

   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_PRODUCTO']; ?>"><?php echo $row['NOMBRE_PRODUCTO']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>


                       <tr class="col-sm-6">
                        <th>Cantidad Producto &nbsp;</th>
                        <td><input type="text" name="cantidad" id="cantidad" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Digite cantidad" class="form-control"></td>
                    </tr>


                      <tr class="col-sm-3">
                        <th>Item solicitud &nbsp;</th>
                        <td><input type="text" name="itemSolicit" id="itemSolicit" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Nº Detalle" class="form-control"></td>
                    </tr>


                      <tr class="col-sm-3">
                        <th>Linea codigo &nbsp;</th>
                        <td><input type="text" name="lineaCodigo" id="lineaCodigo" required onpaste="return false" onkeypress="return soloNumeros(event)" placeholder="Nº linea" class="form-control"></td>
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
                   <!-- <th>Empleado</th> -->
                    <th>Fecha Hora</th>
                   <!-- <th>Observacion</th> -->

                    <th>Item solicitud</th>
                    <th>Producto</th>
                    <th>cantidad</th>
                    <th>Linea codigo</th>


                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    //  var_dump($rs)
    ?>
                            <tr>
                                 <td><?php echo $row['ID_SOLICITUD'] ?></td>
                               <!--  <td><--?php echo $row['ID_EMPLEADO'] ?></td> -->
                                <td><?php echo $row['FECHA_HORA_ASIG'] ?></td>
                               <!-- <td><--?php echo $row['OBSERVACION_SOLICITUD'] ?></td> -->
                                <td><?php echo $row['ITEM_SOLICITUD'] ?></td>
                                <td><?php echo $row['ID_PRODUCTO'] ?></td>
                                <td><?php echo $row['CANTIDAD_PRODUCTO'] ?></td>
                                <td><?php echo $row['LINEA_CODIGO'] ?></td>

                                <td><button class="btn btn-success" onclick="moverSolicitud(<?php echo $row['ID_SOLICITUD'] ?>, '<?php echo $row['FECHA_HORA_ASIG'] ?>', '<?php echo $row['ITEM_SOLICITUD'] ?>', '<?php echo $row['ID_PRODUCTO'] ?>', '<?php echo $row['CANTIDAD_PRODUCTO'] ?>', '<?php echo $row['LINEA_CODIGO'] ?>')">Modificar <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaSolicitud(<?php echo $row['ID_SOLICITUD'] ?>, '<?php echo $row['ITEM_SOLICITUD'] ?>')">Eliminar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></td>
                            </tr>
                            <?php
//}
    ;
}
?>
            </table>
          </div> </div></div>
         </div>


    </div>

</div>


