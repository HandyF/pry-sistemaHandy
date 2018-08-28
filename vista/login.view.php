<?php
//echo '<i>+ vista/login.view.php </i>';
?>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <?php
//include 'vista/menuCliente.view.php';
?>
    </div>
    <div class="col-sm-2">&nbsp;

        <h3 align="right">Inicie Sesi&oacute;n<br/><small>Acceso al sistema</small></h3>
    </div>

    <div class="col-sm-4">

      <img class="img img-responsive" src="Imagenes/login.png" alt="...">

    </br>
      <table class="table">
        <form name="login" method="post" action="index.php">
          <tr>
            <th><span class="glyphicon glyphicon-user"></span> Nombre de Usuario &nbsp;</th>
            <input type="hidden" name="accionLogin" id="accionLogin" value="login">
            <td><input type="text" name="username" id="username" placeholder="Usuario" required class="form-control"  onpaste="return false" maxlength="50"></td>
          </tr>
          <tr>
            <th><span class="glyphicon glyphicon-lock"></span> Contrase&ntilde;a &nbsp;</th>
            <td><input type="password" name="pass" id="pass" placeholder="****" required class="form-control"  onpaste="return false" maxlength="50"></td>
          </tr>
          <tr>
            <td><input class="btn btn-warning" type="reset" value="Limpiar"></td>
            <td><input class="btn btn-info" type="submit" name="ingresar" id="ingresar" value="Aceptar"></td>
          </tr>
        </form>
      </table>
    <br>
    </div>


  </div>
</div>