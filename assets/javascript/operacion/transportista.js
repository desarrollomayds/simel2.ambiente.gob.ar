/**
 * JS for sections within /operacion/transportista/*.php
 */
var registro_actual = null;
var colores         = new Array();

colores['#A8D8EA'] = '#F7F7F5';
colores['#EAEAE5'] = '#F7F7F5';
colores['#F7F7F5'] = '#EAEAE5';

$(document).ready(function()
{
	var tipo_manifiesto = $("input#tipo_manifiesto").val();

	// boton buscar generador en creacion_manifiestos.php
	$('#btn_buscar_generador').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/generador.php",
			data: {tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
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
		   url: mel_path+"/operacion/transportista/generadores.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
					limpiar_tabla_residuos();
					limpiar_tabla_vehiculos();
					desactivar_botones_buscar_vehiculos();
				}
		   }
		 });
	});

	$(document).on('click', '.btn_borrar_transportista', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/transportista.php",
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

	$('#btn_agregar_vehiculo').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/vehiculo.php",
			dataType: "html",
			success: function(msg){
				$('#mel_popup_title').html("Vehiculos");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(600);
			}
		});
	})

	$('#btn_asignar_flota').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/seleccion_flota.php",
			dataType: "html",
			success: function(msg){
				$('#mel_popup_title').html("Asignar Flota");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(600);
				$('#mel_popup').modal('show');
			}
		});
	});
	//vehiculos
	$('#btn_asignar_vehiculo').click(function() {
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "busqueda"},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					$('#mel_popup_title').html("Asignar Veh&iacute;culo");
					$('#mel_popup_body').html(llenar_lista_vehiculos(retorno['datos']));
					$('#mel_popup_content').width(600)
				}
		    }
		});
	});
	$('#btn_asignar_vehiculo2').click(function() {

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "busqueda"},
		   dataType: "text json",
		   success: function(retorno){
	
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
				 BootstrapDialog.show({
		            title: 'Buscar  Veh&iacute;culo',
		            message: $(llenar_lista_vehiculos(retorno['datos'])),
		        });
				}
		    }
		});
	});
	function llenar_lista_vehiculos(vehiculos){
			datos="<div class='panel panel-default'><div class='panel-heading' style='background-color:#A8D8EA;'>";
			datos+="<table width='100%' style='margin-left: 5px;' border='0' cellpadding='5' cellspacing='0' class='tabla' id='lista_vehiculo'><tr><td width='107' class='invisible'>Id</th><td width='107'>Dominio</th><td width='107'>Descripci&oacute;n</th><td width='60' align='center'>&nbsp;</td></tr></table></div>";
			datos+="<table width='99%' style='margin:5px; padding:10px;' border='0' cellpadding='15' cellspacing='0' id='lista_vehiculo'>";
			for(var indice in vehiculos){
				vehiculo = vehiculos[indice];

				color = colores[$('#lista_vehiculo> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos+= "\
				<tr>\
					<td style='padding:5px;' bgcolor='" + color + "' width='107' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
					<td style='padding:5px;' bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
					<td style='padding:5px;' bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
					<td style='padding:5px;' width='60' align='center' bgcolor='" + color + "' ><a class='asignar_vehiculo'><button type='button' class='btn btn-success' value=" + vehiculo["ID"] + " id='agregar_unico_vehiculo' onclick=\"agregar_vehiculo_unico(" + vehiculo['ID'] + ")\" data-dismiss='modal'>Asignar</button></a></td>\
				</tr>";
			}
			datos+="</table></div>";
			datos+="<div style='width:100%;padding:10px;text-align:center;'><button type='button' data-dismiss='modal' class='btn btn-danger btn-sm' data-toggle='modal' style='margin: 15px;'>Cerrar</button></div>";
			return datos;
	}

	//operador
	$('#btn_buscar_operador').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/operador.php",
			data: {tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
			success: function(msg){
				$('#mel_popup_title').html("Agregar Operador");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(750);
			}
		});
	});

	// residuos
	$('#btn_agregar_residuo').click(function()
	{
		var tipo_manifiesto = $("input#tipo_manifiesto").val();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/residuo.php",
			data: {tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
			success: function(msg) {
				$('#mel_popup_title').html("Agregar Permiso de Traslado");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(900);
			}
		});
	});

	$(document).on('click', '.btn_borrar_residuo', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/residuo.php",
			data: {accion : "baja", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(retorno){
				if (retorno['estado'] != 0) {
					alert(retorno['errores']['baja']);
				} else {
					registro_actual.remove();
					// si la tabla de residuos quedó vacia deshabilitamos botones busqueda vehiculos
					var rows_residuos = $("#lista_residuos td").length;

					if (rows_residuos < 1) {
						desactivar_botones_buscar_vehiculos();
					}
					limpiar_tabla_vehiculos();
				}
			}
		});
	});

	// boton aceptar del popup de flotas
	$(document).on('click', '.btn_asignar_flota_resultado', function() {
		registro_actual = $(this).parent().parent();

		$("#btn_aceptar_1").removeAttr("disabled");

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/seleccion_flota.php",
		   data: {id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno) {
				if (retorno['estado'] != 0) {
					mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"warning");
				} else {
					//console.log(retorno['datos']);

					agregar_vehiculos(retorno['datos']);
					$('#div_popup').hide();
					$('#bigscreen').hide();
				}
			}
		});
	});
	
	// expande flotas mostrando sus dominios
	$(document).on('click', '.descripcion_flota', function() {
		var flota_id = $(this).attr('value');
		$(".vehiculos_child_"+flota_id).toggle();
	});

});

function btn_admin_flotas_vehiculos(){
	$.ajax({
		type: "GET",
		url: mel_path+"/operacion/transportista/flotas.php",
		data: {},
		dataType: "html",
		success: function(response) {
			if ($.trim(response)) {
				BootstrapDialog.show({
	            title: 'Administrar Flotas',
	            message: $(response),
	        });
			} else {
				close_alta_temprana_popup();
				mostrarMensaje("exclamation-triangle","El CUIT no pertenece a una entidad registrada en AFIP","error");
			}
		}
	});
};

function agregar_vehiculos(vehiculos)
{
	$('#tabla_vehiculos').html("");
	var datos = '<table class="table table-hover table-striped" id="lista_vehiculos">'+
					'<tr>'+
						'<th class="invisible">ID</th>'+
						'<th>Dominio</th>'+
						'<th>Tipo</th>'+
						'<th>Tipo Caja</th>'+
						'<th>Descripci&oacute;n</th>'+
						'<th>Borrar</th>'+
					'</tr>';

	for (indice in vehiculos) {
		vehiculo = vehiculos[indice];
		datos += "\
		<tr id=" + vehiculo["ID"] + ">\
			<td class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
			<td id='nombre'>" + vehiculo["DOMINIO"] + "</td>\
			<td id='nombre'>" + vehiculo["TIPO_VEHICULO"] + "</td>\
			<td id='nombre'>" + vehiculo["TIPO_CAJA"] + "</td>\
			<td id='descripcion'>" + vehiculo["DESCRIPCION"] + "</td>\
			<td align='center'><a href='#' value=" + vehiculo["ID"] + " onclick=\"btn_borrar_vehiculo_unico(" + vehiculo['ID'] + ")\" class='btn_borrar_vehiculo'><i class='fa fa-times fa-2x'></i></a></td>\
		</tr>";
	}

	datos += '</table>';
	//console.log(datos);
	$('#tabla_vehiculos').html(datos);
	$("div#tabla_vehiculos").show();
	$("div#seleccion_vehiculos span").hide();
}

 function btn_finalizar(instance){

 	var botonFinalizar = progessButton;
 	botonFinalizar.init(instance);

 	botonFinalizar.setProgress(0.1);

	var seccion = $("#btn_finalizar_b").attr('seccion');
	var tipo_manifiesto = $("input#tipo_manifiesto").val();
	var observaciones = $("textarea#observaciones_manifiesto").val();
	var cant_estimada_por_generador = [];

	if (seccion == 'simple') {
		var url = mel_path+"/operacion/transportista/creacion_manifiesto.php";
	} else if (seccion == 'multiple') {
		var url = mel_path+"/operacion/transportista/creacion_manifiesto_multiples.php";
		var cant_estimada_por_generador = $('input[name="cantidad_estimada\\[\\]"]').map(function(){return $(this).val();}).get();
		//console.info("Laburanding con manifiesto multiple. Cantidades por generador:");
		//console.debug(cant_estimada_por_generador);
	}
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
				window.location.replace(mel_path+"/operacion/transportista/manifiestos_pendientes.php");
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

	// boton ASIGNAR al buscar por Vehiculo
	function agregar_vehiculo_unico(vehiculo_id)
	{
		$("#btn_aceptar_1").removeAttr("disabled");
		
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "alta", id : vehiculo_id},
		   dataType: "text json",
		   success: function(retorno)
		   {
				if (retorno['estado'] != 0) {
					mostrarMensaje("exclamation-triangle",retorno['errores']['alta'],"warning");
				} else {
					datos = "<tr id=" + vehiculo_id + "><td class='invisible' id='id'>" + id + "</td><td id='dominio'>" + retorno['datos']['DOMINIO'] + "</td><td id='tipo_vehiculo'>" + retorno['datos']['TIPO_VEHICULO'] + "</td><td id='tipo_caja'>" + retorno['datos']['TIPO_CAJA'] + "</td><td id='descripcion'>" + retorno['datos']['DESCRIPCION'] + "</td><td align='center'><a href='#' value=" + retorno['datos']['ID'] + " class='btn_borrar_vehiculo' onclick=\"btn_borrar_vehiculo_unico(" + vehiculo_id + ")\"><i class='fa fa-times fa-2x'></i></a></td></tr>";
					$('#lista_vehiculos> tbody:last').append(datos);
					$("div#tabla_vehiculos").show();
				}
		    }
		});

		$("div#seleccion_vehiculos span").hide();
	};

	function btn_borrar_vehiculo_unico(vehiculo_id){
		$("td#vehiculos_no_asignados").show();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "baja", id : vehiculo_id},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['vacio'] == "vacio"){
					$("#btn_aceptar_1").attr("disabled", true);
				}
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					$("#"+vehiculo_id).remove();
					$("div#mensaje_slop_con_barcaza").hide();

					if($('#lista_vehiculos tr').length <= 1) {
						$("div#tabla_vehiculos").hide();
						$("div#seleccion_vehiculos span").show();
					}
				}
		    }
		});
	};
