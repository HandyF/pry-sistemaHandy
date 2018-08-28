// todo esto funciona en Tipo Usuario
function moverTipoUser(id, descrip) {
    $("input#accionTipoUser").val("ModificaTipoUser");
    $("input#idTipoUser").val(id);
    $("input#descrip").val(descrip);
}

function eliminaTipoUser(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminatipouser.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en tipo Usuario.
// todo esto funciona en Solicitud
function moverSolicitud(id, Empleado, fechaHora, observacion, itemSolicit, Solicitud, Producto, cantidad, lineaCodigo) {
    $("input#accionSolicitud").val("ModificaSolicitud");
    $("input#idSolicitud").val(id);
    $("input#Empleado").val(Empleado);
    $("input#fechaHora").val(fechaHora);
    $("input#observacion").val(observacion);
    $("input#itemSolicit").val(itemSolicit);
    $("input#Solicitud").val(Solicitud); //Solicitud
    $("select#Producto").val(Producto);
    $("input#cantidad").val(cantidad);
    $("input#lineaCodigo").val(lineaCodigo);
    // todo esto funciona en Solicitud para detalle
}

function eliminaSolicitud(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) { //itemSolicit
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminasolicitud.php',
            data: {
                identificador: id
                // ITEM_SOLICITUD: itemSolicit
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en Solicitud.
///////////////
// todo esto funciona en Recepcion
function moverRecepcion(id, Empleado, TipoDocumento, fechaHora, numeroTipoDocumento, itemRecep, Recepcion, Bodega, Producto, cantidad, lineaCodigo) {
    $("input#accionRecepcion").val("ModificaRecepcion");
    $("input#idRecepcion").val(id);
    $("input#Empleado").val(Empleado);
    $("select#TipoDocumento").val(TipoDocumento);
    $("input#fechaHora").val(fechaHora);
    $("input#numeroTipoDocumento").val(numeroTipoDocumento);
    $("input#itemRecep").val(itemRecep);
    $("input#Recepcion").val(Recepcion);
    $("select#Bodega").val(Bodega);
    $("select#Producto").val(Producto);
    $("input#cantidad").val(cantidad);
    $("input#lineaCodigo").val(lineaCodigo);
}

function eliminaRecepcion(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) { //itemRecep
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminarecepcion.php',
            data: {
                identificador: id
                //  ITEM_RECEPCION: itemRecep
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en Recepcion.
/////////////
// todo esto funciona en Asignacion Bodega Producto (ojo ver esto y solucionar)
function moverAsignacionBodegaProducto(Bodega, Producto, fechaHora_Asig, cantidad, observacion) {
    $("input#accionAsignacionBodegaProducto").val("ModificaAsignacionBodegaProducto");
    $("select#Bodega").val(Bodega);
    $("select#Producto").val(Producto);
    $("input#fechaHora_Asig").val(fechaHora_Asig);
    $("input#cantidad").val(cantidad);
    $("input#observacion").val(observacion);
}

function eliminaAsignacionBodegaProducto(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) { // Bodega,Producto
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminaasignacionbodegaproducto.php',
            data: {
                identificador: id
                // ID_BODEGA: Bodega
                // ID_PRODUCTO: Producto
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en Asignacion Bodega Producto.
/////////////
// todo esto funciona en Salida
function moverSalida(id, Destino, Empleado, fechaHora, itemSalid, Salida, Bodega, Producto, cantidad, lineaCodigo) {
    $("input#accionSolicitud").val("ModificaSalida");
    $("input#idSalida").val(id);
    $("select#Destino").val(Destino);
    $("input#Empleado").val(Empleado);
    $("input#fechaHora").val(fechaHora);
    $("input#itemSalid").val(itemSalid);
    $("input#Salida").val(Salida);
    $("select#Bodega").val(Bodega);
    $("select#Producto").val(Producto);
    $("input#cantidad").val(cantidad);
    $("input#lineaCodigo").val(lineaCodigo);
}

function eliminaSalida(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) { //itemSalid
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminasalida.php',
            data: {
                identificador: id
                // ITEM_SALIDA: itemSalid
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en Salida.
/////////////
//////////
// todo esto funciona en Tipo Producto
function moverTipoProducto(id, descrip) {
    $("input#accionTipoProducto").val("ModificaTipoProducto");
    $("input#idTipoProducto").val(id);
    $("input#descrip").val(descrip);
}

function eliminaTipoProducto(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminatipoproducto.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en tipo Producto.
// todo esto funciona en destino
function moverDestino(id, descrip) {
    $("input#accionDestino").val("ModificaDestino");
    $("input#idDestino").val(id);
    $("input#descrip").val(descrip);
}

function eliminaDestino(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminadestino.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en destino
// todo esto funciona en Tipo Bodega
function moverTipoBodega(id, descrip) {
    $("input#accionTipoBodega").val("ModificaTipoBodega");
    $("input#idTipoBodega").val(id);
    $("input#descrip").val(descrip);
}

function eliminaTipoBodega(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminatipobodega.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en tipo Bodega.
// todo esto funciona en Tipo Documento
function moverTipoDocumento(id, descrip) {
    $("input#accionTipoDocumento").val("ModificaTipoDocumento");
    $("input#idTipoDocumento").val(id);
    $("input#descrip").val(descrip);
}

function eliminaTipoDocumento(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminatipodocumento.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en tipo Documento.
// todo esto funciona en Tipo Empleado
function moverTipoEmpleado(id, descrip) {
    $("input#accionTipoEmpleado").val("ModificaTipoEmpleado");
    $("input#idTipoEmpleado").val(id);
    $("input#descrip").val(descrip);
}

function eliminaTipoEmpleado(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminatipoempleado.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
// fin todo esto funciona en tipo Empleado.
// todo esto funciona en Empleado
function moverEmpleado(id, TipoEmpleado, rut, nombres, apellidos, fechaNacimiento, direccion, fono, mail) {
    $("input#accionEmpleado").val("ModificaEmpleado");
    $("input#idEmpleado").val(id);
    $("select#TipoEmpleado").val(TipoEmpleado);
    $("input#rut").val(rut);
    $("input#nombres").val(nombres);
    $("input#apellidos").val(apellidos);
    $("input#fechaNacimiento").val(fechaNacimiento);
    $("input#direccion").val(direccion);
    $("input#fono").val(fono);
    $("input#mail").val(mail);
}

function eliminaEmpleado(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminaempleado.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
//fin todo esto funciona en Empleado
// todo esto funciona en Producto
function moverProducto(id, TipoProducto, Descripcion, observacion) {
    $("input#accionProducto").val("ModificaProducto");
    $("input#idProducto").val(id);
    $("select#TipoProducto").val(TipoProducto);
    $("input#Descripcion").val(Descripcion);
    $("input#observacion").val(observacion);
}

function eliminaProducto(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminaproducto.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
//fin todo esto funciona en Producto
// todo esto funciona en Bodega
function moverBodega(id, TipoBodega, Empleado, Descripcion) {
    $("input#accionBodega").val("ModificaBodega");
    $("input#idBodega").val(id);
    $("select#TipoBodega").val(TipoBodega);
    $("input#Empleado").val(Empleado);
    $("input#Descripcion").val(Descripcion);
}

function eliminaBodega(id) {
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminabodega.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
//fin todo esto funciona en Bodega
// todo esto funciona en usuario
//function moverUser(id, usuario, contrasenia, nombres, apellidos, direccion, fono, mail, fechaCreacion, fechaModifica, run, TipoUsuario) {
//    $("input#accionUser").val("ModificaUser");
//    $("input#idUser").val(id);
//    $("input#usuario").val(usuario);
//    $("input#contrasenia").val(contrasenia);
//    $("input#nombres").val(nombres);
//    $("input#apellidos").val(apellidos);
//   $("input#direccion").val(direccion);
//   $("input#fono").val(fono);
//   $("input#mail").val(mail);
//   $("input#fechaCreacion").val(fechaCreacion);
//   $("input#fechaModifica").val(fechaModifica);
//   $("input#run").val(run);
//   $("input#TipoUsuario").val(TipoUsuario);
//}
//function eliminauser(id) {
//    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
//       //comunicacion del cliente al servidor $.post()
//        $.ajax({
//            type: 'POST',
//            url: 'controlador/eliminauser.php',
//            data: {
//                identificador: id
//            },
//            success: function(respuesta) {
//                alert(respuesta);
//            },
//            complete: function() {
//                location.reload();
//            }
//        });
//   } else {
//       alert("Registro NO ELIMINADO");
//   }
//}
//fin todo esto funciona en usuario
/////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
function preguntar() {
    if (confirm("¿Desea Salir?, perderá los datos del carro de compra.")) {
        location.href = "index.php?control=logout";
    } else {
        location.href = "index.php?control=principal";
    }
}
///////////////////////////////////////////////////////////////////
// funcion solo se digitan letras
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];
    tecla_especial = false
    for (var i in especiales) {
        if (key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial) return false;
}

function limpia() {
    var val = document.getElementById("nombres, apellidos").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
        if (!isNaN(val[i])) document.getElementById("nombres, apellidos").value = '';
    }
}
//fin funcion solo letras
////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////
// funcion solo se digitan numeros
function soloNumeros(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 8) {
        return true;
    }
    patron = /[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
// fin funcion solo se digitan numeros
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
//// inicia la funcion de validar rut chileno
function checkRut(rut) {
    // Despejar Puntos
    var valor = rut.value.replace('.', '');
    // Despejar Guión
    valor = valor.replace('-', '');
    // Aislar Cuerpo y Dígito Verificador
    cuerpo = valor.slice(0, -1);
    dv = valor.slice(-1).toUpperCase();
    // Formatear RUN
    rut.value = cuerpo + '-' + dv
    // Si no cumple con el mínimo ej. (n.nnn.nnn)
    if (cuerpo.length < 7) {
        rut.setCustomValidity("RUT Incompleto");
        return false;
    }
    // Calcular Dígito Verificador
    suma = 0;
    multiplo = 2;
    // Para cada dígito del Cuerpo
    for (i = 1; i <= cuerpo.length; i++) {
        // Obtener su Producto con el Múltiplo Correspondiente
        index = multiplo * valor.charAt(cuerpo.length - i);
        // Sumar al Contador General
        suma = suma + index;
        // Consolidar Múltiplo dentro del rango [2,7]
        if (multiplo < 7) {
            multiplo = multiplo + 1;
        } else {
            multiplo = 2;
        }
    }
    // Calcular Dígito Verificador en base al Módulo 11
    dvEsperado = 11 - (suma % 11);
    // Casos Especiales (0 y K)
    dv = (dv == 'K') ? 10 : dv;
    dv = (dv == 0) ? 11 : dv;
    // Validar que el Cuerpo coincide con su Dígito Verificador
    if (dvEsperado != dv) {
        rut.setCustomValidity("RUT Inválido");
        return false;
    }
    // Si todo sale bien, eliminar errores (decretar que es válido)
    rut.setCustomValidity('');
}
//// fin a la funcion de validar rut chileno
////////////////////////////////////////////////////////////////////
/**
 * Funcion que devuelve true o false dependiendo de si la fecha es correcta.
 * Tiene que recibir el dia, mes y año
 */
function isValidDate(day, month, year) {
    var dteDate;
    // En javascript, el mes empieza en la posicion 0 y termina en la 11 
    //   siendo 0 el mes de enero
    // Por esta razon, tenemos que restar 1 al mes
    month = month - 1;
    // Establecemos un objeto Data con los valore recibidos
    // Los parametros son: año, mes, dia, hora, minuto y segundos
    // getDate(); devuelve el dia como un entero entre 1 y 31
    // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,
    //   martes, miercoles ...
    // getHours(); Devuelve la hora
    // getMinutes(); Devuelve los minutos
    // getMonth(); devuelve el mes como un numero de 0 a 11
    // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1
    //   de enero de 1970 hasta el momento definido en el objeto date
    // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.
    // getYear(); devuelve el año
    // getFullYear(); devuelve el año
    dteDate = new Date(year, month, day);
    //Devuelva true o false...
    return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
}
/**
 * Funcion para validar una fecha
 * Tiene que recibir:
 *  La fecha en formato ingles yyyy-mm-dd
 * Devuelve:
 *  true-Fecha correcta
 *  false-Fecha Incorrecta
 */
function validate_fecha(fecha) {
    var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
    if (fecha.search(patron) == 0) {
        var values = fecha.split("-");
        if (isValidDate(values[2], values[1], values[0])) {
            return true;
        }
    }
    return false;
}
/**
 * Esta función calcula la edad de una persona y los meses
 * La fecha la tiene que tener el formato yyyy-mm-dd que es
 * metodo que por defecto lo devuelve el <input type="date">
 */
function calcularEdad() {
    var fecha = document.getElementById("fechaNacimiento").value;
    if (validate_fecha(fecha) == true) {
        // Si la fecha es correcta, calculamos la edad
        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes) {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia)) {
            edad--;
        }
        if (edad > 1900) {
            edad -= 1900;
        }
        // calculamos los meses
        var meses = 0;
        if (ahora_mes > mes) meses = ahora_mes - mes;
        if (ahora_mes < mes) meses = 12 - (mes - ahora_mes);
        if (ahora_mes == mes && dia > ahora_dia) meses = 11;
        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia) dias = ahora_dia - dia;
        if (ahora_dia < dia) {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }
        document.getElementById("result").innerHTML = "Tienes " + edad + " años, " + meses + " meses y " + dias + " días";
    } else {
        document.getElementById("result").innerHTML = "La fecha " + fecha + " es incorrecta";
    }
}
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
// todo esto funciona en usuario
function moverUsuarios(id, TipoUsuario, Empleado, Descripcion, contrasena) { //cambiar nombre moverUsuarios
    $("input#accionUser").val("ModificaUser");
    $("input#idUser").val(id);
    $("select#TipoUsuario").val(TipoUsuario);
    $("select#Empleado").val(Empleado);
    $("input#Descripcion").val(Descripcion);
    $("input#contrasena").val(contrasena);
    var f = document.formUsuarios; //ver formRegistro
    var contrasena = f.contrasena.value;
    var recontrasena = f.recontrasena.value;
    if (contrasena != "" && recontrasena != "" && contrasena == recontrasena) {
        f.fContrasena.value = f.contrasena.value;
        f.submit();
    } else if (contrasena == "") {
        alert("Falta la contraseña");
        document.getElementById(contrasena).focus();
    } else if (recontrasena == "") {
        alert("Repita la contraseña");
        document.getElementById(recontrasena).focus();
    } else if (contrasena != recontrasena) {
        alert("La contraseña debe coincidir");
    }
}

function eliminaUsuarios(id) { //cambiar nombre eliminaUsuarios
    if (confirm("¿Desea Eliminar el registro: " + id + "?")) {
        //comunicacion del cliente al servidor $.post()
        $.ajax({
            type: 'POST',
            url: 'controlador/eliminausuarios.php',
            data: {
                identificador: id
            },
            success: function(respuesta) {
                alert(respuesta);
            },
            complete: function() {
                location.reload();
            }
        });
    } else {
        alert("Registro NO ELIMINADO");
    }
}
//fin todo esto funciona en usuario
////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////
function crearUsuario() { //TipoUsuario
    var f = document.formRegistro;
    var username = f.username.value;
    var TipoUsuario = f.TipoUsuario.value;
    var Empleado = f.Empleado.value;
    //  var name = f.name.value;
    //  var last = f.last.value;
    var pass = f.pass.value;
    var repass = f.repass.value;
    if (pass != "" && username != "" && repass != "" && pass == repass) {
        f.fUsername.value = f.username.value;
        //  f.fName.value = f.name.value;
        //  f.fLast.value = f.last.value;
        //  f.fAdress.value = f.address.value;
        //  f.fFono.value = f.fono.value;
        //  f.fEmail.value = f.email.value;
        f.fTipoUsuario.value = f.TipoUsuario.value;
        f.fEmpleado.value = f.Empleado.value;
        f.fPass.value = f.pass.value;
        f.submit();
    } else if (username == "") {
        alert("Falta el nombre de usuario");
        document.getElementById(username).focus();
    } else if (TipoUsuario == "") {
        alert("Falta el TipoUsuario");
        document.getElementById(TipoUsuario).focus();
    } else if (Empleado == "") {
        alert("Falta el Empleado");
        document.getElementById(Empleado).focus();
    } else if (pass == "") {
        alert("Falta la contraseña");
        document.getElementById(pass).focus();
    } else if (repass == "") {
        alert("Repita la contraseña");
        document.getElementById(repass).focus();
    } else if (pass != repass) {
        alert("La contraseña debe coincidir");
    }
}

function modificaUsuario() {
    var f = document.manUser;
    var last = f.last.value;
    var name = f.name.value;
    if (name != "" && last != "") {
        f.fName.value = f.name.value;
        f.fLast.value = f.last.value;
        f.fRun.value = f.run.value;
        f.fAdress.value = f.address.value;
        f.fFono.value = f.fono.value;
        f.fEmail.value = f.email.value;
        f.submit();
    } else if (name == "") {
        alert("Falta su nombre");
        document.getElementById(name).focus();
    } else if (last == "") {
        alert("Falta su apellido");
        document.getElementById(last).focus();
    }
}
//////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////
////////////////////////////////////////////////////////
///////////////////////////////////////////////////////
/// aqui inicia las funciones para el filtro de busqueda por ajax
// esto funciona en buscar informacion en la pantalla tipousario
// fin esto funciona en buscar informacion en la pantalla tipousario