/**
 * JS Base for section within /operacion/{role}/*.php
 */

$(document).ready(function()
{
	// boton "Siguiente" de eleccion de carga para manifiestos simples (usado para los 3 roles tipos de establecimientos)
	// tpl: global_incs\t\templates\operacion\compartido\manifiestos_simples.tpl
	$(document).on('click', 'button#btn_ir_creacion_manifiesto', function() {

		var perfil = $("input#perfil").val();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/"+perfil+"/creacion_manifiesto.php",
			data: {tipo_manifiesto: $("select#tipo_manifiesto").val()},
			success: function(response) {
				if (typeof(response) == 'string') {
			    	document.open();
				    document.write(response);
				    document.close();
			    } else {
				    mostrarMensaje("exclamation-triangle", response.errorMsg, "error");
				}
			}
		});

	});

	console.info('/operacion/base.js loaded');
});
/******************
 * Funciones
 ******************/

function extraer_info_boton_favoritos(objButton)
{
	var establecimiento = [];
	establecimiento["ID"] = objButton.attr('establecimiento-id');
	establecimiento["NOMBRE_ESTABLECIMIENTO"] = objButton.attr('nombre-establecimiento');
	establecimiento["SUCURSAL"] = objButton.attr('sucursal');
	establecimiento["CUIT"] = objButton.attr('cuit');
	establecimiento["PROVINCIA_"] = objButton.attr('provincia');
	establecimiento["LOCALIDAD_"] = objButton.attr('localidad');
	establecimiento["CALLE"] = objButton.attr('calle');
	establecimiento["NUMERO"] = objButton.attr('numero');
	establecimiento["PISO"] = objButton.attr('piso');
	establecimiento["ES_FAVORITO"] = 'yes';

	// la funcion espera un array de establecimientos
	var establecimientos = [];
	establecimientos.push(establecimiento);
	return establecimientos;
}

/**
 * Completa la tabla con los resultados de busqueda de entidades.
 */
function llenar_lista_busqueda(entidad, establecimientos)
{
	var imagen_fav, imagen_fav_title = '';
	$('#lista_busqueda_'+entidad+'').find('tr:gt(0)').remove();

	for (var indice in establecimientos) {
		establecimiento = establecimientos[indice];

		if (establecimiento["ES_FAVORITO"] == 'yes') {
			imagen_fav = '<div class="fav_icon">&nbsp;</div>';
			imagen_fav_title = 'Agregado como favorito.';
		} else {
			imagen_fav = '<span class="fa fa-plus hand" id="agregar_favorito_icon'+establecimiento["ID"]+'"></span>';
			imagen_fav_title = 'Agregar como favorito.';
		}

		datos_tabla = "<tr><td class='invisible' id='id'>"+establecimiento["ID"]+"</td>";
		datos_tabla += "<td id='select'><input type='radio' name='select' value='"+establecimiento['ID']+"'";

		if (establecimientos.length == 1) {
			datos_tabla += " checked ";
		}

		datos_tabla += "></td>"
		datos_tabla += "<td id='nombre'>"+establecimiento["NOMBRE_ESTABLECIMIENTO"]+"</td>";

		if (entidad == "generador"){
			datos_tabla += "<td id='nombre'>"+establecimiento["SUCURSAL"]+"</td>";
		}		
			
		datos_tabla += "<td id='cuit'>"+establecimiento["CUIT"]+"</td>\
			<td id='provincia'>"+establecimiento["PROVINCIA_"]+"</td>\
			<td id='localidad'>"+establecimiento["LOCALIDAD_"]+"</td>\
			<td id='direccion'>"+establecimiento["CALLE"]+" - "+establecimiento["NUMERO"]+" - "+establecimiento["PISO"]+"</td>";

		if (establecimiento["ALTA_TEMPRANA"] == 'no'){
			datos_tabla += "<td class='td' id='localidad' title='"+imagen_fav_title+"'>"+imagen_fav+"</td>";
		} else {
			datos_tabla += "<td class='td'>&nbsp;</td>";
		}
		
		datos_tabla += "</tr>";
		
		$('#lista_busqueda_'+entidad+'> tbody:last').append(datos_tabla);
	}

	$('#lista_busqueda_'+entidad).show();
	$(".btn_establecer_resultado_"+entidad).show();

	$("#resultado_entidades").show();

	if (entidad_buscada == 'generador') {
		$('button[name=btn_agregar_sucursal]').show();
	}
	
	$("div#alta_temprana_generador").hide();
}

function callback_favoritos(rol, entidad, rspArray)
{
	var est_fav_id = rspArray['ID'];
	$('#agregar_favorito_icon'+rspArray['ID']).one( "click", function() {
		agregar_establecimiento_favorito(rol, entidad, est_fav_id);
	});
}

function agregar_establecimiento_favorito(rol, entidad, est_fav)
{
	$.ajax({
		type: "POST",
		url: mel_path+"/operacion/" + rol + "/" + entidad + ".php",
		data: {accion: "agregar_favorito", est_fav_id : est_fav},
		dataType: "text json",
	    success: function(response) {
	    	if (response['estado'] != 0) {
				mostrarMensaje("exclamation-triangle", response['errores']['agregar_favorito'], "error");
			}
			else {
				mostrarMensaje("exclamation-triangle", 'Establecimiento agregado a favoritos.', "success");
			}
		}
	});
}

/**
 *	Si nueva sucursal es 'yes', indica que solo crearemos una sucursal porque la empresa ya existe. Si es 'no', hay que crear tanto la empresa como el est.
 */
function realizarAltaTemprana(cuit_criteria, nueva_sucursal)
{
	var nueva_sucursal = nueva_sucursal;
	var alta_temprana = nueva_sucursal == 'no' ? 'yes' : 'no';

	console.info("cuit: "+cuit_criteria);
	console.info("nueva sucursal?: "+nueva_sucursal);
	console.info("tipo_manifiesto: "+tipo_manifiesto);

	$.ajax({
		type: "GET",
		url: mel_path+"/operacion/compartido/alta_temprana.php",
		data: {cuit: cuit_criteria, alta_temprana: alta_temprana, nueva_sucursal: nueva_sucursal, tipo_manifiesto: tipo_manifiesto},
		success: function(response) {
			if (typeof(response) == 'string') {
		    	titulo_popup = alta_temprana == 'yes' ? "Alta temprana Generador": "Nueva Sucursal";
				$('#alta_temprana_popup_title').html(titulo_popup);
				$('#alta_temprana_popup_body').html(response);
				$('#alta_temprana_popup_content').width(650);
				parse_field_errors();
		    } else {
		    	close_alta_temprana_popup();
			    mostrarMensaje("exclamation-triangle", response.errorMsg, "error");
			}
		}
	});
}

function close_alta_temprana_popup()
{
	$('#alta_temprana_popup').modal('hide');
}

function completar_tabla_entidad(entidad, data)
{
	var array = window.location.pathname.split( '/' );
	var last = array[array.length-1];

	// disculpen por esto...
	var plural_entidad = (entidad == 'generador') ? 'generadores' : ((entidad == 'transportista') ? 'transportistas' : 'operadores');

	// verifica si es esta trabajando con generador y es un manifiesto Multiple
	if (entidad == 'generador' && last == "creacion_manifiesto_multiples.php") {
		datos = "\
		<tr>\
			<td class='invisible' id='id'>"  + data["ID"] + "</td>\
			<td id='nombre'>"     + data["NOMBRE"] + "</td>\
			<td align='center' id='sucursal'>"     + data["SUCURSAL"] + "</td>\
			<td id='domicilio'>"  + data["DOMICILIO"] + "</td>\
			<td id='expediente'>" + data["EXPEDIENTE"] + "</td>\
			<td id='cuit'>"       + data["CUIT"] + "</td>\
			<td id='caa'>"        + data["CAA"] + "</td>\
			<td id='cantidad_estimada'><input type='text' style='width:50px;text-align:right;' name='cantidad_estimada[]' value='0'/>&nbsp;kg</td>\
			<td align='center'><a href='#' class='btn_borrar_"+entidad+"'><i class='fa fa-times fa-2x'></i></a></td>\
		</tr>";
	} else {
		$('#lista_'+plural_entidad).find('tr:gt(0)').remove();
		datos = "\
			<tr>\
				<td class='invisible' id='id'>"  + data["ID"] + "</td>\
				<td id='nombre'>"     + data["NOMBRE"] + "</td>";

			if (entidad == 'generador') {
				datos += "<td align='center' id='sucursal'>"     + data["SUCURSAL"] + "</td>";
			}

			datos += "<td id='domicilio'>"  + data["DOMICILIO"] + "</td>\
					  <td id='expediente'>" + data["EXPEDIENTE"] + "</td>\
					  <td id='cuit'>"       + data["CUIT"] + "</td>\
					  <td id='caa'>"        + data["CAA"] + "</td>\
				</tr>";
	}

	$('#lista_'+plural_entidad+'> tbody:last').append(datos);
	$("div#tabla_"+entidad).show();
	$("div#seleccion_"+entidad+" span").hide();
}

/**
 * Checkea que las tablas de Establecimientos en manifiestos esten completas para poder asignar residuos.
 */
function activar_boton_buscar_residuos(rol_actual, tipo_manifiesto)
{
	var rows_generadores = $("#lista_generadores td").length;
	var rows_transportistas = $("#lista_transportistas td").length;
	var rows_operadores = $("#lista_operadores td").length;

	if (rol_actual == 'generador')
	{
		// tipo manifiesto concentrador no checkea el operador (no tiene)
		if (tipo_manifiesto == 4) {
			if (rows_transportistas > 0) {
				$("#btn_agregar_residuo").attr('disabled', false);
			}
		} else if (rows_transportistas > 0 && rows_operadores > 0) {
			$("#btn_agregar_residuo").attr('disabled', false);
		}
	}

	// Para transportista es indistinto el tipo de manifiesto. 
	// En caso de ser RES 544/94 tiene un row informativo en generadores por default
	if (rol_actual == 'transportista') {
		if (rows_generadores > 0 && rows_operadores > 0) {
			$("#btn_agregar_residuo").attr('disabled', false);
		}
	}

	// solo trabaja con manif simples.
	if (rol_actual == 'operador') {
		if (rows_generadores > 0 && rows_transportistas > 0) {
			$("#btn_agregar_residuo").attr('disabled', false);
		}
	}
}

/**
 * Sacamos rows de los residuos, ocultamos la tabla y mostrar el div de "Seleccionar residuo".
 */
function limpiar_tabla_residuos()
{
	var rows_residuos = $("#lista_residuos td");
	rows_residuos.remove();
	$("div#tabla_residuos").hide();
	$("div#seleccione_residuo").show();
	$("div#seleccione_residuo span.legend").show();

	if ($("#lista_vehiculos") != undefined) {
		limpiar_tabla_vehiculos();
		desactivar_botones_buscar_vehiculos();
	}
}

function activar_botones_buscar_vehiculos()
{
	var rows_vehiculos = $("#lista_generadores td").length;
	if (rows_vehiculos > 0) {
		$("#btn_asignar_vehiculo").attr('disabled', false);
		$("#btn_asignar_flota").attr('disabled', false);
	}
}

function desactivar_botones_buscar_vehiculos()
{
	$("#btn_asignar_vehiculo").attr('disabled', true);
	$("#btn_asignar_flota").attr('disabled', true);
}

function limpiar_tabla_vehiculos()
{
	var vehiculos = $("#lista_vehiculos td");
	vehiculos.remove();
	$("div#tabla_vehiculos").hide();
	$("div#seleccion_vehiculos").show();
	$("div#seleccion_vehiculos span.legend").show();
}

function procesarManifiesto(manifiesto_id)
{
	$.ajax({
		type: "GET",
		url: mel_path+"/operacion/operador/procesar_manifiesto.php",
		data: {id : manifiesto_id},
		dataType: "html",
		success: function(msg){
			$('#mel_popup_title').html("Procesar Manifiesto");
			$('#mel_popup_body').html(msg);
			$('#mel_popup_content').width(800);
		}
	});
}

// Agrega el residuo a la lista en la creacion de manifiestos.
function agregar_residuo(residuo, solo_uno)
{
	var solo_uno = (typeof solo_uno !== 'undefined') ? true : false;
	//console.info("agregando residuo- solo uno? "+ solo_uno);

	datos = "\
	<tr>\
		<td class='invisible' id='id'>" + residuo["ID"] + "</td>\
		<td id='tipo_contenedor'>" + residuo["CONTENEDOR_"] + "</td>\
		<td id='cantidad_contenedores'>" + residuo["CANTIDAD_CONTENEDORES"] + "</td>\
		<td id='rediduo'>" + residuo["RESIDUO"] + "</td>\
		<td id='cantidad_estimada'>" + residuo["CANTIDAD_ESTIMADA"] + "&nbsp;kg</td>\
		<td id='estado'>" + residuo["ESTADO_"] + "</td>\
		<td id='estado'>" + residuo["PELIGROSIDAD"] + "</td>\
		<td><div class='btn_borrar_residuo'><img class='hand' src='"+asset_path+"/imagenes/borrar.png' width='24' height='22' /></div></td>";
	
	datos += "\ </tr>";

	if (solo_uno === true) {
		$("#lista_residuos td").remove();
		$('#lista_residuos> tbody:last').append(datos);
	} else {
		$('#lista_residuos> tbody:last').append(datos);
	}

	$("div#tabla_residuos").show();
	$("div#seleccione_residuo span").hide();
}
function btn_buscar_ruta(){
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/compartido/rutas.php",
			data: {tipo_manifiesto: tipo_manifiesto},
			dataType: "html",
			success: function(msg){
					BootstrapDialog.show({
		            title: 'RUTAS',
		            message: $(msg),
		            type: BootstrapDialog.TYPE_PRIMARY, 
		            closable: true, 
		            draggable: false, 
		            buttons: [{
		                label: 'Cancelar',
		                cssClass: 'btn-success',
		                action: function(dialogRef){
		                    dialogRef.close();
		                }
		            },{
		             	label: 'Cargar nueva ruta',
		                cssClass: 'btn-success',
		                action: function(dialogRef){
		                    	BootstrapDialog.show({
					            title: 'NUEVA RUTA',
					            message: $('<div></div>').load(mel_path+"/operacion/compartido/nueva_ruta.php"),
					            type: BootstrapDialog.TYPE_PRIMARY, 
					            closable: true, 
					            draggable: false, 
					            buttons: [{
					                label: 'Cancelar',
					                cssClass: 'btn-success',
					                action: function(dialogRef){
					                    dialogRef.close();
					                }
					            },{
					             	label: 'Guardar',
					                cssClass: 'btn-success',
					                action: function(dialogRef){
					         
					                		$.ajax({
											type: "POST",
											url: mel_path+"/operacion/compartido/rutas.php",
											data: {accion : "guardar"},
											dataType: "text json",
											success: function(response){
												BootstrapDialog.closeAll();
												btn_buscar_ruta();
											}

										});
					                }
					        	}]
							});
		                }
		        	}]
				});
			}
		});
}
function eliminar_ruta(id, descripcion){
		BootstrapDialog.confirm({
            title: 'ELIMINAR RUTA',
            message: '<center>Esta seguro de que quiere eliminar esta ruta?<br><br><i class="fa fa-truck"/> ' + descripcion + '</center>',
            type: BootstrapDialog.TYPE_DANGER, 
            closable: true, 
            draggable: true, 
            btnCancelLabel: 'No, cancelar', 
            btnOKLabel: 'Si, eliminar', 
            btnOKClass: 'btn-danger', 
            callback: function(result) {
                if(result) {
                    $.ajax({
						type: "POST",
						url: mel_path+"/operacion/compartido/rutas.php",
						data: {accion : "eliminar", id : id},
						dataType: "text json",
						success: function(response){
							
							$("#"+response).html("");
						}
					});
                }
            }
        });
	}

function editar_ruta(id, descripcion){
		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/compartido/rutas.php",
			data: {accion : "editar", id : id},
			dataType: "text json",
			success: function(response){

				var datos="";
				$.each( response, function( key, value ) {
				  datos+= "<div id="+ value['ID'] +"><div class='panel panel-default'><div class='panel-body' style='line-height:30px'><div style='float:left'><i class='fa fa-map-marker'/> "+ value['NOMBRE'] +" - "+ value['LOCALIDAD_'] +" "+ value['PROVINCIA_R_'] +"</div><button class='btn btn-danger btn-sm' type='button' onclick='eliminarGenerador(\" "+ value['NOMBRE'] +" \",\" "+ value['LOCALIDAD_'] +" \",\" "+ value['PROVINCIA_R_'] +" \",\" "+ value['ID'] +" \",\" "+ id +" \",\" "+ descripcion +" \")' style='float:right'>Eliminar</button></div></div></div>";
				});
				datos+= "<center><button type='button' class='btn btn-primary' onclick='agregarGenerador(\" "+ id +" \")'>Agregar generador</button></center>";

				BootstrapDialog.show({
		            title: 'Editar ruta',
		            message: datos,
		            buttons: [{
		                label: 'Cerrar',
		                cssClass: 'btn-success',
		                action: function(dialog) {
		                    dialog.close();
		                }
		            }]
		        });
			}
		});
	}

function usar_ruta(id){
		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/compartido/rutas.php",
			data: {accion : "usar", id : id},
			dataType: "text json",
			success: function(response){
				BootstrapDialog.closeAll();
					$.each( response, function( key, value ) {
					  completar_tabla_entidad('generador', value);
					});
					activar_boton_buscar_residuos('transportista', tipo_manifiesto);
					limpiar_tabla_residuos();
					limpiar_tabla_vehiculos();
			}
		});
	}

function btn_guardar_nombre_ruta(){
	var nombre = $('#nombre_de_ruta').val();
	if (nombre){
		$('#collapse_nuevo').collapse()
		$( "div#input_nombre" ).replaceWith( "<h5><i class='fa fa-truck'/> " + nombre + "</h5>" );
		if (nombre){
				$.ajax({
					type: "POST",
					url: mel_path+"/operacion/compartido/rutas.php",
					data: {accion : "ruta", nombre : nombre},
					dataType: "text json",
					success: function(response){
					}
				});
		}
	} else {
		BootstrapDialog.show({
            title: 'Informaci&oacute;n',
            message: 'Debe ingresar un nombre para la nueva ruta',
            buttons: [{
                label: 'Cerrar',
                action: function(dialog) {
                    dialog.close();
                }
            }]
        });
	}
}
function eliminarGenerador(nombre, localidad, provincia, id, ruta_id, ruta_descripcion){
			var datos="";

			datos+= "Esta seguro de que quiere eliminar este generador de la ruta " + ruta_descripcion + "? <br><br><div class='panel panel-default'><div class='panel-body' style='line-height:30px'><div style='float:left'><i class='fa fa-map-marker'/> "+ nombre +" - "+ localidad +" "+ provincia +"</div></div></div>";

			BootstrapDialog.show({
	            title: 'ELIMINAR GENERADOR',
	            message: '<center>'+ datos +'</center>',
	            type: BootstrapDialog.TYPE_DANGER, 
	            buttons: [{
		                label: 'Cancelar',
		                action: function(dialog) {
		                    dialog.close();
		                }
		            }, {
		                label: 'Eliminar',
		                cssClass: 'btn-danger',
		                action: function(dialog) {
		                	$.ajax({
								type: "POST",
								url: mel_path+"/operacion/compartido/rutas.php",
								data: {accion : "eliminar_generador", ruta : ruta_id, generador : id},
								dataType: "text json",
								success: function(response){
									BootstrapDialog.show({
							            title: 'Informaci&oacute;n',
							            message: 'El generador ha sido eliminado',
							            buttons: [{
							                label: 'Cerrar',
							                action: function(dialog) {
							                    dialog.close();
							                }
							            }]
							        });
									dialog.close();
									$("#"+response['establecimiento_id']).html("");
								}
							});
		                }
		            }]
	        });
}

function agregarGenerador(ruta_id){

			var datos="";

			datos+= "<div class='panel-body'><div class='col-lg-6' style='float:left'><div class='input-group buscador_cuit' style='width:450px;''><input type='text' class='form-control input_numerico' placeholder='Ingrese un CUIT...' name='{$entidad_buscada}_cuit' id='cuit'><span class='input-group-btn' data-parent='#accordion2' href='#collapse_nuevo'><button class='btn btn-default' onclick='buscarPorCuit(\" "+ ruta_id +" \")' type='button'>Buscar y seleccionar generador</button></span></div>";

			BootstrapDialog.show({
	            title: 'AGREGAR GENERADOR',
	            id: 'agregar_generador',
	            message: '<center>'+ datos +'</center>', 
	            buttons: [{
		                label: 'Cancelar',
		                action: function(dialog) {
		                    dialog.close();
		                }
		            }]
	        });
}

function buscarPorCuit(ruta_id){

		var cuit = $('#cuit').val();
		if (cuit){
			if (cuitConFormatoValido(cuit)) {	

				$.ajax({
					type: "POST",
					url: mel_path+"/operacion/compartido/busqueda_generador.php",
					data: {accion : "busqueda", criterio : cuit, tipo_manifiesto: "multiple"},
					dataType: "text json",
					success: function(response)
					{	
						var datos="";
						if (response['errores']['busqueda']){
							datos = "<center>"+response['errores']['busqueda']+"</center>";
						} else {
							if (ruta_id){
								$.each( response['datos'], function( key, value ) {
								datos+= "<div class='panel panel-default'><div class='panel-body' style='line-height:30px'><div style='float:left'>"+ value['NOMBRE'] +" - "+ value['LOCALIDAD_'] +" "+ value['PROVINCIA_R_'] +"</div><button class='btn btn-default btn-sm' type='button' onclick='agregarEditarGenerador(\" "+ value['NOMBRE'] +" \",\" "+ value['LOCALIDAD_'] +" \",\" "+ value['PROVINCIA_R_'] +" \",\" "+ value['ID'] +" \",\" "+ ruta_id +" \")' style='float:right' data-dismiss='modal'>Seleccionar</button></div></div>";
								});
							} else {
								$.each( response['datos'], function( key, value ) {
								datos+= "<div class='panel panel-default'><div class='panel-body' style='line-height:30px'><div style='float:left'>"+ value['NOMBRE'] +" - "+ value['LOCALIDAD_'] +" "+ value['PROVINCIA_R_'] +"</div><button class='btn btn-default btn-sm' type='button' onclick='seleccionarGenerador(\" "+ value['NOMBRE'] +" \",\" "+ value['LOCALIDAD_'] +" \",\" "+ value['PROVINCIA_R_'] +" \",\" "+ value['ID'] +" \")' style='float:right' data-dismiss='modal'>Seleccionar</button></div></div>";
								});
							}
							
						}
						
						BootstrapDialog.show({
				            title: 'GENERADORES DISPONIBLES',
				            message: datos,
				            cssClass: 'login-dialog',
				            buttons: [{
				                label: 'Cancelar',
				                cssClass: 'btn-success',
				                action: function(dialog){
				                    dialog.close();
				                }
				            }]
				        });
					}
				});
			} else {
				BootstrapDialog.show({
		            title: 'Informaci&oacute;n',
		            message: '<center>El CUIT ingresado no es v&aacute;lido</center>',
		            buttons: [{
		                label: 'Cerrar',
		                action: function(dialog) {
		                    dialog.close();
		                }
		            }]
		        });
			}
		} else {
			BootstrapDialog.show({
	            title: 'Informaci&oacute;n',
	            message: '<center>El CUIT ingresado no pertecene a ning&uacute;n generador ingresado en SIMEL. Por favor realice el alta temprana del mismo para poder agregarlo a la ruta.</center>',
	            buttons: [{
	                label: 'Cerrar',
	                action: function(dialog) {
	                    dialog.close();
	                }
	            }]
	        });
		}
	}

function seleccionarGenerador(nombre, localidad, provincia, id){
		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/compartido/rutas.php",
			data: {accion : "alta", id : id},
			dataType: "text json",
			success: function(response){
				if (response){
					BootstrapDialog.show({
			            title: 'Informaci&oacute;n',
			            message: 'Ese generador ya se encuentra en la lista',
			            buttons: [{
			                label: 'Cerrar',
			                action: function(dialog) {
			                    dialog.close();
			                }
			            }]
			        });
				} else {
					$('#generadores').append("<br><i class='fa fa-map-marker'/> "+nombre+ " - "+localidad+ ", "+provincia);
				}
			}
		});
}

function agregarEditarGenerador(nombre, localidad, provincia, id, ruta_id){
		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/compartido/rutas.php",
			data: {accion : "agregar_generador", id : id, ruta_id : ruta_id},
			dataType: "text json",
			success: function(response){
					BootstrapDialog.closeAll();
					BootstrapDialog.show({
			            title: 'Informaci&oacute;n',
			            message: '<center>Generador agregado correctamente</center>',
			            buttons: [{
			                label: 'Cerrar',
			                action: function(dialog) {
			                    dialog.close();
			                }
			            }]
			        });
					//dialogRef.close();
					//agregar_generador.close();
					//$("#"+response['establecimiento_id']).html("");
					//$('#generadores').append("<br><i class='fa fa-map-marker'/> "+nombre+ " - "+localidad+ ", "+provincia);
			
			}
		});
}