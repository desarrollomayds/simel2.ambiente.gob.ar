/**
 * JS Base para SLOP
 */
$(document).ready(function()
{
	$('#residuo_cantidad_estimada').filter_input({regex:'[0-9]'});
	
	$('#btn_buscar_empresa_maritima').click(function() {
			BootstrapDialog.show({
				id: 'buscar_empresa_maritima',
				title: 'Buscar Empresa Naviera/Mar&iacute;tima',
	            message: $('<div></div>').load(mel_path+'/operacion/compartido/buscar_empresa_maritima.php'),
	    });
	});
});

function buscar_empresa_cuit(){
	var empresa_cuit = $('#empresa_cuit').val();
	if (empresa_cuit){
		if (cuitConFormatoValido(empresa_cuit)){
			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/compartido/buscar_empresa_maritima.php",
				data: {accion : "busqueda", cuit : empresa_cuit},
				dataType: "text json",
				success: function(retorno){
					if (retorno.estado == 'error' ){
						$("div#msj_error").html(retorno.html);
						$("div#msj_error").show();
					} else {
						$("div#msj_error").hide();
						$("#collapse_nuevo").slideDown();
						$( "div#resultado_cuit" ).replaceWith(retorno.html);
					}
				}
			});
		} else {
			mostrarMensaje("exclamation-triangle", "Formato de CUIT inv&aacute;lido", "warning");
		}
	} else {
		$("#collapse_nuevo").slideUp();
	}
}

function agregar_empresa(empresa_id){
	$.ajax({
		type: "POST",
		url: mel_path+"/operacion/compartido/buscar_empresa_maritima.php",
		data: {accion : "agregar", id : empresa_id},
		dataType: "text json",
		success: function(retorno){
			//console.debug(retorno);
			$("#buscar_empresa_maritima").modal('hide');
			datos = "\
				<tr id='anterior'>\
					<td class='invisible' id='id'>id</td>\
					<td width='107' class='td' id='nombre'>" + retorno['NOMBRE'] + "</td>\
					<td width='107' class='td' id='buque'>" + retorno['BUQUE'] + "</td>\
					<td width='107' class='td' id='cuit'>" + retorno['CUIT'] + "</td>\
					<td width='107' class='td' id='provincia'>" + retorno['DOMICILIO'] + "</td>\
					<td width='107' class='td' id='localidad'>" + retorno['SUCURSAL'] + "</td>\
				</tr>";
			$("#anterior").remove();
			$('#lista_generadores> tbody:last').append(datos);
			$("#tabla_generador").show();
			$("div#seleccion_generador span").hide();
		}
	});
}

function registrar_nueva_empresa(accion){
	var empresa_cuit = $('#empresa_cuit').val();
	$.ajax({
		type: "POST",
		url: mel_path+"/operacion/compartido/alta_empresa_maritima.php",
		data: {accion : "nueva", cuit : empresa_cuit},
		dataType: "html",
		success: function(retorno){
			BootstrapDialog.show({
			id: 'registrar_nueva_empresa',
			title: 'Registrar nueva empresa',
            message: $('<div>' + retorno + '</div>'),
            buttons: [{
			        id: 'btn-ok',   
			        icon: 'glyphicon glyphicon-check',       
			        label: 'Aceptar',
			        cssClass: 'btn-primary', 
			        autospin: true,
			        action: function(dialogRef){
			            	$("input#latitud_r").val($("span#latitud_r").val());
							$("input#longitud_r").val($("span#longitud_r").val());
							// seteo el tipo_alta. puede indicar que es un alta de empresa y buque o solo buque.
							$("input#tipo_alta").val(accion);

							var form_values = $("form#form_generador_alta_temprana").serialize();

							$.ajax({
							type: "GET",
							url: mel_path+"/operacion/compartido/alta_empresa_maritima.php",
							data: form_values,
				            dataType: "json",
							success: function(response)
							{
								if (response.estado != 1) {
									if (response.estado == -1) {
										mostrarMensaje("exclamation-triangle", 'FATAL ERROR! Contacte al administrador. Descripci&oacute;n: '+response.errors.fatal_error,"error");
									}
									valicacion_formulario_modal(response.errors.empresa);
									valicacion_formulario_modal(response.errors.establecimiento);
								} else {
									dialogRef.close();
									mostrarMensaje("exclamation-triangle", 'Nueva empresa registrada',"success");											
								}
							}
						});
			        }},{
			        id: 'btn-ok',       
			        label: 'Cancelar',
			        cssClass: 'btn-danger', 
			        autospin: false,
			        action: function(dialogRef){    
			            dialogRef.close();
			        }
			    }]
	    	});
		}
	});
}