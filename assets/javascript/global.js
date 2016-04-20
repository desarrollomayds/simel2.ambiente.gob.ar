
$(document).ready(function()
{	
	// Aciva los tooltip
	$('[data-toggle="tooltip"]').tooltip();

	$('body').tooltip({
	    selector: '[rel=tooltip]'
	});

	parse_field_errors();

	$.fn.extend({

		filter_input: function(options) {

					var defaults = {
						regex:".*",
						live:false
					}

					var options =  $.extend(defaults, options);
					var regex = new RegExp(options.regex);

					function filter_input_function(event) {

						var key = event.charCode ? event.charCode : event.keyCode ? event.keyCode : 0;

			        // 8 = backspace, 9 = tab, 13 = enter, 35 = end, 36 = home, 37 = left, 39 = right, 46 = delete
			        if (key == 8 || key == 9 || key == 13 || key == 35 || key == 36|| key == 37 || key == 39 || key == 46) {

			        	if ($.browser.mozilla) {

			            // if charCode = key & keyCode = 0
			            // 35 = #, 36 = $, 37 = %, 39 = ', 46 = .

			            if (event.charCode == 0 && event.keyCode == key) {
			            	return true;
			            }

			        }
			    }


			    var string = String.fromCharCode(key);
			    if (regex.test(string)) {
			    	return true;
			    }
			    return false;
			}

			if (options.live) {
				$(this).live('keypress', filter_input_function);
			} else {
				return this.each(function() {
					var input = $(this);
					input.unbind('keypress').keypress(filter_input_function);
				});
			}
		}
	});
});

function parse_field_errors()
{

	$('input').focus(function() {

		if ($('#'+$(this).get(0).name).hasClass('error_de_carga'))
		{
			$('#'+$(this).get(0).name).removeClass('error_de_carga');
			$('#'+$(this).get(0).name+'-td').hide();
		}

	});

	$('select').focus(function() {

		if ($('#'+$(this).get(0).name).hasClass('error_de_carga'))
		{
			$('#'+$(this).get(0).name).removeClass('error_de_carga');
			$('#'+$(this).get(0).name+'-td').hide();
		}

	});

	$('textarea').focus(function() {

		if ($('#'+$(this).get(0).name).hasClass('error_de_carga'))
		{
			$('#'+$(this).get(0).name).removeClass('error_de_carga');
			$('#'+$(this).get(0).name+'-td').hide();
		}
	});
}

/**
* Genera y muestra un mensaje 'noty' en pantalla
*/
function mostrarMensaje(icono, mensaje, tipo)
{
	noty({
		text        : '<i class="fa fa-'+icono+'"></i> '+mensaje,
		type        : tipo,
		dismissQueue: true,
		layout      : 'topRight',
		closeWith   : ['click'],
		theme       : 'relax',
		maxVisible  : 10,
		killer: true,
		animation   : {
			open  : 'animated bounceInRight',
			close : 'animated bounceOutRight',
			easing: 'swing',
			speed : 500
		}
	});
}


/**
* Cierra todos los mensajes 'noty'
*/
function cerrar_mensajes()
{
	$.noty.closeAll();
}
   
/**
* Función global de mapa
* 
*/
function actualizar_mapa(clase_mapa,coords)
{	
	$("#geocomplete").geocomplete({
		map: "."+clase_mapa,
		//location: coords.length > 0 ? '':localizacion(), (Fede: Linea obsoleta, la comenté el 14/07/2015. Si por algún motivo algún mapa dejó de funcionar avisarme)
		details: "form",
		detailsAttribute: "data-geo",
		async: false,
		markerOptions: {
			draggable: true
		}
	})
	.bind("geocode:result", function(event, result){
		console.log("Result: " + result.formatted_address);
	})
	.bind("geocode:error", function(event, status){
		console.log("ERROR: " + status);
	})
	.bind("geocode:multiple", function(event, results){
		console.log("Multiple: " + results.length + " results found");
	})
	.bind("geocode:dragged", function(event, latLng){
		$('#latitud_r').text(latLng.lat());
		$('#longitud_r').text(latLng.lng());
	});

	if (coords.length > 0)
	{
		$("#geocomplete").geocomplete("find", coords);

	}
	else
	{
		$("#geocomplete").val(localizacion()).trigger("geocode");
	}

}

function localizacion()
{
	var valores = ["pais_r", "provincia_r", "localidad_r", "calle_r", "numero_r"];
	var localizacion = "";
	$.each( valores, function( key, value ) {

		if($("#"+value).data("nombre"))
			var nueva_localizacion = $("#"+value).data("nombre");
		else
		{
			if($("#"+value).find(':selected').val())
				var nueva_localizacion = $("#"+value).find(':selected').data("nombre");

			if( (value == "calle_r" || value == "numero_r" ) && $("#"+value).val())
				var nueva_localizacion = $("#"+value).val();

		}
		if(nueva_localizacion)
			localizacion == '' ? localizacion +=  nueva_localizacion : localizacion += ', '+nueva_localizacion;

	});

	return localizacion;
}

/**
* Función que limpia los campos de calle y número para cuando se modifica la provincia
*/
function limpiar_calle_num(tipo, prefijo)
{
	$("#"+prefijo+"calle_"+tipo).val("");
	$("#"+prefijo+"numero_"+tipo).val("");
}

/**
 * Desencodea el value dado. Por ej. recibe: "Encontr&oacute;" y devuelve "Encontró".
 */
 function html_decode(value) {
 	return $("<textarea/>").html(value).text();
 }

/**
* Validación de formularios en los modals!
*/
function valicacion_formulario_modal(error)
{
	for (campo in error) {
		console.log(campo);
		if (error[campo] != null) {
			$('#' + campo + '-error').html(error[campo]);
			$('#' + campo + '-td').show();
			$('#' + campo + '-error').show();
			$('#' + campo).addClass('error_de_carga');
		} else {
			$('#' + campo).removeClass('error_de_carga');
			$('#' + campo + '-error').hide();
		}
	}
}

/**
* Comprueba si una fecha es mayor o menor a la fecha actual
*/
function comprobar_fecha(fecha, tipo)
{

	var isCAA = (typeof tipo !== 'undefined') ? true : false;

	// Fecha recibida en formato dd/mm/aa
	fecha = fecha.split('/');

	// Crea fecha en formato mm/dd/aa
	var inputFecha = new Date(fecha[1]+'/'+fecha[0]+'/'+fecha[2]);

	// Crea la fecha actual
	var fechaActual = new Date();

	var resultado = inputFecha.setHours(0,0,0,0) > fechaActual.setHours(0,0,0,0) ? true : false;
	
	if (isCAA && !resultado)
	{	
		// Año pasado
		var dia = fechaActual.getUTCDate();
		var mes = fechaActual.getUTCMonth()+1;
		var year = fechaActual.getUTCFullYear()-1;

		var sePermite = new Date(mes+'/'+dia+'/'+year);

		resultado = inputFecha.setHours(0,0,0,0) > sePermite.setHours(0,0,0,0) ? 'si' : 'no';

		return inputFecha.setHours(0,0,0,0) > sePermite.setHours(0,0,0,0) ? true : false;

	}
	else
	{
		return resultado;
	}
	// Comprobación de que la fecha sea mayor a la actual
	

}

function mostrarMensajeYRedireccionar(mensaje)
{

    //var solo_uno = (typeof selfLocation !== 'undefined') ? true : false;
    
    mostrarMensaje("", mensaje, "success");

    setTimeout(function(){
        location.reload();
    }, 3000);

}

/**
* Métodos para determinar si un dominio esta bien formulado
*/

function isDominioNuevo(a){
  pat=/^([a-zA-Z]{3,3})([0-9]{3,3})$/
  return pat.test(a.value);
}

function isDominioAuto(a) {
  pat=/^(([a-zA-Z]{3,3})([0-9]{3,3})|([a-zA-Z]{1,1})([0-9]{7,7}))$/
  return pat.test(a);
}

function isDominioMoto(a) {
  pat=/^(([0-9]{3,3})([a-zA-Z]{3,3}))$/
  return pat.test(a);
}

function isDominio(a, t){
  switch(parseInt(t)) {
    case 1:
      if(!isDominioAuto(a)){
        return false;
      }
      break;
    case 2:
      if(!isDominioMoto(a)){
        return false;
      }
      break;
      default:
      if(!isDominioAuto(a) && !isDominioMoto(a)){
        return false;
      }
      break;
  }
  return true;
}