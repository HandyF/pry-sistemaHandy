// esto funciona en buscar informacion en la pantalla servicio
$(buscar_datos());

function buscar_datos(consulta){
   $.ajax({
	   url: 'controlador/buscarservicio.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consulta: consulta},
	   })	
	   .done(function(respuesta) {
	      $("#datos").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busqueda', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_datos(valor);
		}else{
			buscar_datos();
		}
	});
// fin esto funciona en buscar informacion en la pantalla servicio

// esto funciona en buscar informacion en la pantalla carro
$(buscar_carro());

function buscar_carro(consultacarro){
   $.ajax({
	   url: 'controlador/buscarcarro.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultacarro: consultacarro},
	   })	
	   .done(function(respuesta) {
	      $("#carro").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedaCarro', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_carro(valor);
		}else{
			buscar_carro();
		}
	});
// fin esto funciona en buscar informacion en la pantalla carro

// esto funciona en buscar informacion en la pantalla tipousario
$(buscar_tipousario());

function buscar_tipousario(consultatipousario){
   $.ajax({
	   url: 'controlador/buscartipouser.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultatipousario: consultatipousario},
	   })	
	   .done(function(respuesta) {
	      $("#tipousario").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedaTipouser', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_tipousario(valor);
		}else{
			buscar_tipousario();
		}
	});
// fin esto funciona en buscar informacion en la pantalla tipousario

// esto funciona en buscar informacion en la pantalla usuario
$(buscar_user());

function buscar_user(consultauser){
   $.ajax({
	   url: 'controlador/buscaruser.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultauser: consultauser},
	   })	
	   .done(function(respuesta) {
	      $("#user").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedauser', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_user(valor);
		}else{
			buscar_user();
		}
	});
// fin esto funciona en buscar informacion en la pantalla usuario

// esto funciona en buscar informacion en la pantalla ventas
$(buscar_ventas());

function buscar_ventas(consultaventas){
   $.ajax({
	   url: 'controlador/buscarventa.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultaventas: consultaventas},
	   })	
	   .done(function(respuesta) {
	      $("#ventas").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedaventas', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_ventas(valor);
		}else{
			buscar_ventas();
		}
	});
// fin esto funciona en buscar informacion en la pantalla ventas

// esto funciona en buscar informacion en la pantalla venta detalle
$(buscar_ventadetalle());

function buscar_ventadetalle(consultaventadetalle){
   $.ajax({
	   url: 'controlador/buscarventadetalle.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultaventadetalle: consultaventadetalle},
	   })	
	   .done(function(respuesta) {
	      $("#ventadetalle").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedaventadetalle', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_ventadetalle(valor);
		}else{
			buscar_ventadetalle();
		}
	});
// fin esto funciona en buscar informacion en la pantalla venta detalle

// esto funciona en buscar informacion en la pantalla carrito detalle
$(buscar_carrodetalle());

function buscar_carrodetalle(consultacarrodetalle){
   $.ajax({
	   url: 'controlador/buscarcarrodetalle.php',
	   type: 'POST',
	   dataType: 'html',
	   data: {consultacarrodetalle: consultacarrodetalle},
	   })	
	   .done(function(respuesta) {
	      $("#carrodetalle").html(respuesta);
	   })
	   .fail(function(){
	      console.log("error");
	   })

}


$(document).on('keyup', '#caja_busquedacarrodetalle', function(){
	var valor = $(this).val();
	if(valor != ""){
		buscar_carrodetalle(valor);
		}else{
			buscar_carrodetalle();
		}
	});
// fin esto funciona en buscar informacion en la pantalla carrito detalle
