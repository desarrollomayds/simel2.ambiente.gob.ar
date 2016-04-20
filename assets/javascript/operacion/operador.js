/**
 * JS for sections within /operacion/operador/*.php
 */
var registro_actual = null;

$(document).ready(function()
{
	var tipo_manifiesto = $("input#tipo_manifiesto").val();

	$('#btn_buscar_transportista').click(function() {
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/operador/transportista.php",
		   dataType: "html",
		   data: {tipo_manifiesto: tipo_manifiesto},
		   success: function(msg){
		   		$('#mel_popup').modal('show');
		   		$('#mel_popup_title').html("Agregar Transportista");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
		   }
		 });
	});

	$('#btn_buscar_generador').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/operador/generador.php",
			dataType: "html",
			data: {tipo_manifiesto: tipo_manifiesto},
			success: function(msg){
				$('#mel_popup_title').html("Agregar Generador");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
			}
		});
	});

	//generador
	$(document).on('click', '.btn_borrar_generador', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/operador/generador.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
					limpiar_tabla_residuos();
				}
		   }
		 });
	});

	$(document).on('click', '.btn_borrar_residuo', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/operador/residuo.php",
			data: {accion : "baja", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(retorno){
				if (retorno['estado'] != 0) {
					alert(retorno['errores']['baja']);
				} else {
					registro_actual.remove();
				}
			}
		});
	});

	$('#btn_agregar_residuo').click(function() {
		var tipo_manifiesto = $("input#tipo_manifiesto").val();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/operador/residuo.php",
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

 function btn_finalizar(instance)
 {
	var botonFinalizar = progessButton;
 	botonFinalizar.init(instance);

 	botonFinalizar.setProgress(0.1);
	var seccion = $("#btn_finalizar_b").attr('seccion');
	var tipo_manifiesto = $("input#tipo_manifiesto").val();
	var observaciones = $("textarea#observaciones_manifiesto").val();
	var cant_estimada_por_generador = [];

	if (seccion == 'simple') {
		var url = mel_path+"/operacion/operador/creacion_manifiesto.php";
	} else if (seccion == 'multiple') {
		var url = mel_path+"/operacion/operador/creacion_manifiesto_multiples.php";
		var cant_estimada_por_generador = $('input[name="cantidad_estimada\\[\\]"]').map(function(){return $(this).val();}).get();
	}

	//console.info("seccion: "+seccion);
	//console.info("Cant estimada por generador: ");
	//console.debug(cant_estimada_por_generador);

	var resultado = true;
	botonFinalizar.setProgress(0.4);

	var as = $.ajax({
		type: "POST",
		url: url,
		data: {tipo_manifiesto: tipo_manifiesto, cant_estimada_por_generador: cant_estimada_por_generador, observaciones: observaciones},
		dataType: "text json",
		async: false,
		success: function(retorno)
		{
			botonFinalizar.setProgress(0.7);

			if(retorno['estado'] == 0) {
				mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
				window.location.replace(mel_path+"/operacion/operador/manifiestos_pendientes.php");
				resultado = true;
			} else {
				var texto_errores = '';

				for (error in retorno['errores']) {
					texto_errores += retorno['errores'][error] + '<br>';
				}
				mostrarMensaje("exclamation-triangle",texto_errores,"error");
				resultado = false;
			}
		}
	});

	botonFinalizar.stopProgress(resultado);
};
