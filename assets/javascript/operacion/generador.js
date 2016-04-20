/**
 * JS for sections within /operacion/generador/*.php
 */
var registro_actual = null;

$(document).ready(function()
{
	var tipo_manifiesto = $("input#tipo_manifiesto").val();

	$(document).on('click', '.btn_borrar_residuo', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/generador/residuo.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
				}
		   }
		});
	});

	$('#btn_buscar_transportista').click(function() {

		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/generador/transportista.php",
		   data: {tipo_manifiesto: tipo_manifiesto},
		   dataType: "html",
		   success: function(msg){
		  	 	$('#mel_popup_title').html("Agregar Transportista");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
		   }
		 });
	});
	//transportistas

	$('#btn_buscar_operador').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/generador/operador.php",
			dataType: "html",
			data: {tipo_manifiesto: tipo_manifiesto},
			success: function(msg){
				$('#mel_popup_title').html("Agregar Operador");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
		  	}
		});
	});

	// aplica para el Manifiesto Concentrador, donde se permite cargar un generador como operador.
	$('#btn_buscar_generador').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/generador/generador.php",
			dataType: "html",
			data: {tipo_manifiesto: tipo_manifiesto},
			success: function(msg){
				$('#mel_popup_title').html("Agregar Generador como Operador");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
		  	}
		});
	});

	// residuos
	$('#btn_agregar_residuo').click(function()
	{
		var tipo_manifiesto = $("input#tipo_manifiesto").val();
		//console.info("voy a disparar transportista/residuo.php por GET");
		//console.info("Tipo manifiesto: "+tipo_manifiesto);

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/generador/residuo.php",
			data: {tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
			success: function(msg) {
				$('#mel_popup_title').html("Agregar Permiso de Traslado");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(900);
			}
		});
	});
}); // end of $(document).ready

function btn_finalizar(instance) {

 	var botonFinalizar = progessButton;
 	botonFinalizar.init(instance);
 	botonFinalizar.setProgress(0.1);

	var tipo_manifiesto = $("input#tipo_manifiesto").val();
	var observaciones = $("textarea#observaciones_manifiesto").val();
	botonFinalizar.setProgress(0.4);

	var resultado = true;

		var as = $.ajax({
			type: "POST",
			url: mel_path+"/operacion/generador/creacion_manifiesto.php",
			data: {tipo_manifiesto: tipo_manifiesto, observaciones: observaciones},
			dataType: "text json",
			async: false,
			success: function(retorno)
			{	
				botonFinalizar.setProgress(0.7);

				if(retorno['estado'] == 0) {
					$('#sumario_errores').html('');
					$('#sumario_errores').hide();
					mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
					window.location.replace(mel_path+"/operacion/generador/manifiestos_pendientes.php");

				} else {
					if(retorno['estado'] == 0) {
						mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
						window.location.replace(mel_path+"/operacion/transportista/manifiestos_pendientes.php");
					} else {
						var texto_errores = '';

						for (error in retorno['errores']) {
							texto_errores += retorno['errores'][error] + '<br>';
						}
						mostrarMensaje("exclamation-triangle",texto_errores,"error");
						resultado = false;
					}
				}
			}
		});

 	botonFinalizar.stopProgress(resultado);
};
