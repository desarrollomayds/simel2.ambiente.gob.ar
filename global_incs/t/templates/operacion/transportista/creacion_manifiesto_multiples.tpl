<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Crear manifiesto multiple</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' progressButton='true' chosen='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true' progressButton='true' chosen='true'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
		<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/cpb/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="{$BASE_PATH}/cpb/css/component.css" />
		<script src="{$BASE_PATH}/cpb/js/modernizr.custom.js"></script>
	</head>
<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>
		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a>			
				<a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
		<div id="contenedor-interior">
			  {include file='general/logos.tpl'}
			<div id="apDiv1">Transportistas</div>
			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<span class="titulos"><br />

				{include file='operacion/transportista/menu_solapas.tpl'}
				<div style="height:2px; background-color:#5D9E00"></div>

				{* mantengo para el submit el tipo manifiesto *}
				<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="{$tipo_manifiesto}"/>
				<div class="clear20"></div>

		{if $ALERTA.bloqueante == 'N' || $ALERTA.bloqueante == ''}

				<div class="titulo_manifiesto">Creaci&oacute;n de manifiesto M&uacute;ltiple</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Generador</p>
					<div id="tabla_generador" style="display:none;">
						<table class="table table-hover table-striped" id="lista_generadores">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Nombre</th>
									<th>Sucursal</th>
									<th>Domicilio</th>
									<th>Expediente</th>
									<th>CUIT</th>
									<th>CAA</th>
									<th>Cant.<br/>(estimada)</th>
									<th>Quitar</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccion_generador">
						<span class="legend">Seleccione un Generador</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_generador' data-toggle="modal" data-target="#mel_popup">Buscar generador</button>
							<button type="button" class="btn btn-success btn-sm" id="btn_buscar_ruta" data-loading-text="<i class='icon-spinner icon-spin icon-large'></i>" onclick="btn_buscar_ruta()">Buscar ruta</button>
						</div>
					</div>
				</div>


				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Transportista</p>
					<div id="tabla_transportista">
						<table class="table table-hover table-striped" id="lista_transportista">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Domicilio</th>
									<th>Expediente</th>
									<th>CUIT</th>
									<th>CAA</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="invisible">{$TRANSPORTISTA.ID}</td>
									<td>{$TRANSPORTISTA.NOMBRE_EMPRESA}</td>
									<td>{$TRANSPORTISTA.CALLE_R} {$TRANSPORTISTA.NUMERO_R} {$TRANSPORTISTA.PISO_R}</td>
									<td>{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
									<td>{$TRANSPORTISTA.CUIT}</td>
									<td>{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Operador</p>
					<div id="tabla_operador" style="display:none;">
						<table class="table table-hover table-striped" id="lista_operadores">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Nombre</th>
									<th>Domicilio</th>
									<th>Expediente</th>
									<th>CUIT</th>
									<th>CAA</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccion_operador">
						<span class="legend">Seleccione un Operador</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_operador' data-toggle="modal" data-target="#mel_popup">Buscar</button>
						</div>
					</div>
				</div>


				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del Residuo</p>
					<div id="tabla_residuos" style="display:none;">
						<table class="table table-hover table-striped" id="lista_residuos">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Tipo Cont.</th>
									<th>Cantidad Cont.</th>
									<th>Residuo</th>
									<th>Cantidad Est.</th>
									<th>Estado</th>
									<th>Peligrosidad</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody><tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccione_residuo">
						<span class="legend">Seleccione Residuos</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id="btn_agregar_residuo" data-toggle="modal" data-target="#mel_popup" disabled>Buscar</button>
						</div>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Datos del/los Veh&iacute;culo/s</p>
					<div id="tabla_vehiculos" style="display:none;">
						<table class="table table-hover table-striped" id="lista_vehiculos">
							<thead>
								<tr>
									<th class="invisible">ID</th>
									<th>Dominio / Matr&iacute;cula</th>
									<th>Tipo</th>
									<th>Tipo Caja</th>
									<th>Descripci&oacute;n</th>
									<th>Borrar</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>

					<div class="contenedor_buscar" id="seleccion_vehiculos">
						<span class="legend">Seleccione Flotas</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo' data-toggle="modal" data-target="#mel_popup" disabled>Buscar  Veh&iacute;culo</button>
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_flota' data-toggle="modal" data-target="#mel_popup" disabled>Buscar Flota</button>
						</div>
					</div>
				</div>

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
					<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" placeholder="Escriba aqu&iacute; todas las observaciones que considere necesarias a tener en cuenta sobre el manifiesto"></textarea>
				</div>

				<div align="center" style="margin-top:25px;">

					<div id='progress-button_btn_f' class="progress-button elastic" >
						<button id="btn_finalizar_b" data-target="#mel_popup"
						seccion="multiple"><span>Finalizar</span></button>
						<svg class="progress-circle" width="70" height="70"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
						<svg class="checkmark" width="70" height="70"><path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/></svg>
						<svg class="cross" width="70" height="70"><path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/></svg>
					</div>

				</div>

		{/if}<!--fin ALERTA BLOQUEANTE -->
				<!--
				<div align="center" style="margin-top:25px;">
					<button type="button" class="btn btn-success btn-sm" id='btn_finalizar' data-target="#mel_popup"
						seccion="multiple">Finalizar</button>
				</div>
				-->
			</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

		{include file='general/popup.tpl' ID_POPUP='mel'}
		{include file='general/popup.tpl' ID_POPUP='vehiculos_por_dominio'}
		{include file='general/popup.tpl' ID_POPUP='alta_temprana'}
		{include file='general/popup.tpl' ID_POPUP='flotas'}

		{include file='general/popup.tpl' ID_POPUP='div_1'}
		{include file='general/popup.tpl' ID_POPUP='div_2'}
		{include file='general/popup.tpl' ID_POPUP='div_3'}
	</body>

	{include file='operacion/popups.tpl'}

	{literal}

	<script language="javascript">

		var tipo_manifiesto = {/literal}{$tipo_manifiesto}{literal}

		// Boton de progreso para Finalizar
		newProgressButton('progress-button_btn_f','btn_finalizar');

		$(document).on('click', '.btn_establecer_resultado_generador', function() {
			registro_actual = $(this).parent().parent();

			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/transportista/generador.php",
				data: {accion : "alta", id : registro_actual.find('input:checked').val()},
				dataType: "text json",
				success: function(response){
					if(response['estado'] != 0){
						mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
					}else{
						completar_tabla_entidad('generador', response['datos']);
						activar_boton_buscar_residuos('transportista', tipo_manifiesto);
						limpiar_tabla_residuos();
						limpiar_tabla_vehiculos();
					}
				}
			});
		});

		$(document).on('click', '.btn_establecer_resultado_operador', function() {
			registro_actual = $(this).parent().parent();

			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/transportista/operador.php",
				data: {accion : "alta", id : registro_actual.find('#id').html()},
				dataType: "text json",
				success: function(response){
					if(response['estado'] != 0){
						mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
					}else{
						completar_tabla_entidad('operador', response['datos']);
						activar_boton_buscar_residuos('transportista', tipo_manifiesto);
						limpiar_tabla_residuos();
						limpiar_tabla_vehiculos();
					}
				}
			});
		});
	</script>
	{/literal}
</html>