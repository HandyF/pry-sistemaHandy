<div class="container jumbotron">
    <div class="row">
        <div class="col-sm-2">
            <?php
include 'vista/menuEmpleado.view.php';
?>
        </div>



        <div class="col-sm-12"> <!--vista de los datos por pantalla de empleado-->
             <?php
include 'controlador/fecha.php';
?>
<br/>
  <div class="btn-group btn-group-justified" role="group">
         <div class="fecha pull-right">
            <label>Fecha actual &nbsp;&nbsp;</label>
                    <i class="glyphicon glyphicon-calendar"></i>
                    <span><?php echo "$dia - $diaN de $mes , $anio " ?></span>
                </div></div>

             <h2> Mantencion Empleado(a) Regístrese</h2>
                    <h4> Llene todos los campos obligatorios (*)</h4><br/>

            <table class="table">
                <form action="#" name="empleado" method="post">
                    <input type="hidden" name="accionEmpleado" id="accionEmpleado" value="GuardarEmpleado">
                    <input type="hidden" name="idEmpleado" id="idEmpleado" value="0">

                    <tr class="col-sm-6">
<?php
include 'controlador/selecciontipoempleado.php'; // esto hace que funcione el select y muestra el tipo empleado.
?>
                         <!-- esto reparar para el select-->
                        <th>Tipo Empleado * &nbsp;</th>
                        <td><select  name="TipoEmpleado" id="TipoEmpleado"  required class="form-control">

 <option value="0"> Seleccione Tipo Empleado ... </option>

   <?php while ($row = $resultado->fetch_assoc()): ?>
<option value="<?php echo $row['ID_TIPO_EMPLEADO']; ?>"><?php echo $row['DESCRIPCION']; ?></option>

   <?php
endwhile;
?>
                        </select>
                        </td>
                          <!-- esto fin del select-->
                    </tr>

                     <tr class="col-sm-4">

                        <th>RUN &nbsp; <span class="glyphicon glyphicon-credit-card"></span></th>
                        <td><input type="text" name="rut" id="rut" maxlength="10" required  class="form-control" required oninput="checkRut(this)" placeholder="XXXXXXXX-X"></td>
                       <!--<i id="existerutEmpleado"></i>-->
                    </tr>

                      <tr class="col-sm-6">
                        <th>Nombres &nbsp;</th>
                        <td><input type="text" name="nombres" id="nombres" maxlength="50" required placeholder="Digite Nombres" onkeypress="return soloLetras(event)" onblur="limpia()"  class="form-control" onpaste="return false"></td>
                    </tr>

       <tr class="col-sm-6">
                        <th>Fecha nacimiento &nbsp;<span class="glyphicon glyphicon-calendar"></span></th>
                        <td><input type="date" name="fechaNacimiento" id="fechaNacimiento" maxlength="50" required placeholder="" class="form-control">
                        <input type="button" value="Calcular edad" onclick="javascript:calcularEdad();" />

    <!-- div donde mostraremos el resultado -->
    <i id="result"></i> <br/></td>
                    </tr>

                      <tr class="col-sm-6">
                        <th>Primer Apellido &nbsp;</th>
                        <td><input type="text" name="apellidoPater" id="apellidoPater" maxlength="20" required placeholder="Digite Apellido Paterno" onkeypress="return soloLetras(event)" onblur="limpia()"  class="form-control" onpaste="return false"></td>
                    </tr>


                       <tr class="col-sm-6">
                        <th>Segundo Apellido &nbsp;</th>
                        <td><input type="text" name="apellidoMater" id="apellidoMater" maxlength="20" required placeholder="Digite Apellido Materno" onkeypress="return soloLetras(event)" onblur="limpia()"  class="form-control" onpaste="return false"></td>
                    </tr>

                     <tr class="col-sm-4">
                        <th>Genero &nbsp;</th>
                        <td style="width:100%"><input type="text" name="genero" id="genero" maxlength="10" required placeholder="Sexo Empleado" onkeypress="return soloLetras(event)" class="form-control" onpaste="return false">
                                           <i> (Digite genero sexual, máx 10 dígitos) </i>
                        </td>
                    </tr>

                     <tr class="col-sm-4">
                        <th>Fono &nbsp; <span class="glyphicon glyphicon-phone"></span></th>
                        <td><input type="tel" name="fono" id="fono" maxlength="15" required placeholder="Digite fono" onkeypress="return soloNumeros(event)" class="form-control" onpaste="return false">
                                           <i> (Solo números, máx 15 dígitos) </i>
                        </td>
                    </tr>

                     <tr class="col-sm-6">
                        <th>Dirección &nbsp;<span class="glyphicon glyphicon-map-marker"></span></th>
                        <td style="width:100%"><input type="text" name="direccion" id="direccion" maxlength="50"  required placeholder="Digite direccion" class="form-control" onpaste="return false"></td>
                    </tr>


                     <tr class="col-lg-6">
                        <th>E-Mail &nbsp; &nbsp;<span class="glyphicon glyphicon-envelope"></span></th>
                        <td style="width:85%"><input type="email" name="mail" id="mail" maxlength="50" required placeholder="contacto@correo.com" class="form-control" onpaste="return false" ></td>
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
<!-- esto es para iniciar el filtro de busqueda
    <div class="col-sm-8"></div>
    <div class="col-sm-4">-->

<!--<form action="buscadorEmpleado.php" method="post" accept-charset="utf-8">
    <input type="text" name="consultaempleado" placeholder="Buscar por id o nombre" class="form-control">
     <input type="submit" value="Buscar" name="btnFiltrar" class="btn btn-warning">

<br><br>

       <div class="col-sm-6">
    <div class="input-group">
      <div class="input-group-btn">
        <button type="button" class="btn btn-warning ">Buscar <span class="
glyphicon glyphicon-search"></span></button>

      </div> /btn-group -->
    <!--   <input type="text" class="form-control" name="txtFiltro" placeholder="Buscar por id o nombre" >
    </div>/input-group -->
 <!--  </div> /.col-lg-6 -->
<!-- </form> -->
 <!-- <label><span class="glyphicon glyphicon-search"></span> Buscar :</label>
     <input  type="text" name="caja_busquedaEmpleado" id="caja_busquedaEmpleado" onpaste="return false" placeholder="Digite busqueda"></input>  -->


  <!--            <label>Buscador</label>
    <input type="text" action="buscarEmpleado.php" method="post" name="busqueda" id="busqueda" maxlength="50"  required placeholder="Buscar....." size="50" class="form-control">

     </div>
 </div> -->


<!-- fin del filtro de busqueda -->
         <p align="center"> Tabla de datos ingresados </p>
              <div class="table-responsive" > <!-- creatabla responsiva -->
            <table class="table" >
                <tr>
                    <th>Identificador</th>
                    <th>Tipo Empleado</th>
                    <th>Rut</th>
                    <th>Nombres</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Fecha nacimiento</th>
                    <th>Genero</th>
                    <th>Dirección</th>
                    <th>Fono</th>
                    <th>E-mail</th>
                    <th colspan="2">Acciones</th>
                </tr>

                    <?php
while ($row = mysqli_fetch_array($rs)) {
    ?>
                            <tr>
                                <td><?php echo $row['Identificador'] ?></td>
                                <td><?php echo $row['ID_TIPO_EMPLEADO'] ?></td>
                                <td><?php echo $row['RUT_EMPLEADO'] ?></td>
                                <td><?php echo $row['NOMBRES_EMPLEADO'] ?></td>
                               <!-- <td><--?php echo $row['APELLIDOS_EMPLEADO'] ?></td> -->
                                <td><?php echo $row['APELLIDOPATER_EMPLEADO'] ?></td>

                                <td><?php echo $row['APELLIDOMATER_EMPLEADO'] ?></td>
                                <td><?php echo $row['FECHA_NACIMIENTO'] ?></td>
                                <td><?php echo $row['GENERO_EMPLEADO'] ?></td>
                                <td><?php echo $row['DIRECCION_EMPLEADO'] ?></td>
                                <td><?php echo $row['FONO_EMPLEADO'] ?></td>
                                <td><?php echo $row['EMAIL_EMPLEADO'] ?></td>
                                <td><button class="btn btn-success" onclick="moverEmpleado(<?php echo $row['Identificador'] ?>,'<?php echo $row['ID_TIPO_EMPLEADO'] ?>', '<?php echo $row['RUT_EMPLEADO'] ?>', '<?php echo $row['NOMBRES_EMPLEADO'] ?>','<?php echo $row['APELLIDOPATER_EMPLEADO'] ?>','<?php echo $row['APELLIDOMATER_EMPLEADO'] ?>', '<?php echo $row['FECHA_NACIMIENTO'] ?>', '<?php echo $row['GENERO_EMPLEADO'] ?>', '<?php echo $row['DIRECCION_EMPLEADO'] ?>', '<?php echo $row['FONO_EMPLEADO'] ?>', '<?php echo $row['EMAIL_EMPLEADO'] ?>')">Modificar <span class="glyphicon glyphicon-refresh"></span></button></td>
                                <td><button class="btn btn-danger" onclick="eliminaEmpleado(<?php echo $row['Identificador'] ?>)">Eliminar <span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                            <?php
}
?>

            </table>

        </div> </div></div>
        </div></div>

    </div>

</div></div></div>





