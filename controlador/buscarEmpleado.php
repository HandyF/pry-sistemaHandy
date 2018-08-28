<?php
$mysqli = new mysqli("localhost", "Handy", "12345", "gestionbodega1");
$salida = "";
$query  = "SELECT * FROM templeado ORDER By ID_EMPLEADO";

if (isset($_POST['consultaempleado'])) {
    $q     = $mysqli->real_escape_string($_POST['consultaempleado']);
    $query = "SELECT ID_EMPLEADO, ID_TIPO_EMPLEADO, RUT_EMPLEADO, NOMBRES_EMPLEADO, APELLIDOS_EMPLEADO, FECHA_NACIMIENTO, DIRECCION_EMPLEADO, FONO_EMPLEADO, EMAIL_EMPLEADO FROM templeado WHERE ID_TIPO_EMPLEADO LIKE '%" . $q . "%' OR RUT_EMPLEADO LIKE '%" . $q . "%' OR NOMBRES_EMPLEADO LIKE '%" . $q . "%' OR APELLIDOS_EMPLEADO LIKE '%" . $q . "%' OR FECHA_NACIMIENTO LIKE '%" . $q . "%' OR DIRECCION_EMPLEADO LIKE '%" . $q . "%' OR FONO_EMPLEADO LIKE '%" . $q . "%' OR EMAIL_EMPLEADO LIKE '%" . $q . "%'";
}
$resultado = $mysqli->query($query);

if ($resultado->num_rows > 0) {
    $salida .= "<table class='table'>
	  <tr>
	  <td>Identificador</td>
	  <td>Tipo Empleado</td>
	  <td>Rut</td>
	  <td>Nombres</td>
	  <td>Apellidos</td>
	  <td>Fecha nacimiento</td>
	  <td>Direccion</td>
	  <td>Fono</td>
	  <td>E-mail</td>
	  </tr>";
    while ($empleado = $resultado->array_filter()) {
        $salida .= "<tr>
	  <td>" . $empleado['ID_EMPLEADO'] . "</td>
	  <td>" . $empleado['ID_TIPO_EMPLEADO'] . "</td>
	  <td>" . $empleado['RUT_EMPLEADO'] . "</td>
	  <td>" . $empleado['NOMBRES_EMPLEADO'] . "</td>
	  <td>" . $empleado['APELLIDOS_EMPLEADO'] . "</td>
	  <td>" . $empleado['FECHA_NACIMIENTO'] . "</td>
	  <td>" . $empleado['DIRECCION_EMPLEADO'] . "</td>
	  <td>" . $empleado['FONO_EMPLEADO'] . "</td>
	  <td>" . $empleado['EMAIL_EMPLEADO'] . "</td>
	  </tr>";
    }
    $salida .= "</table>";
} else {
    $salida .= "No hay datos :(";
}
echo $salida;
$mysqli->close();
