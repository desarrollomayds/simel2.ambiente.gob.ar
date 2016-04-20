{if $PERFIL == 'transportista'}
	{assign var=nombre_seccion value='Transportistas'}
	{assign var=rol value='transportista'}
{elseif $PERFIL == 'operador'}
	{assign var=nombre_seccion value='Operadores'}
	{assign var=rol value='operador'}
{/if}

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' progressButton='true' chosen='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' cuit='true' progressButton='true' mapa='true' chosen='true'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/{$PERFIL}.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/slop.js"></script>
	</head>

	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
		<div id="contenedor-interior">
			  {include file='general/logos.tpl'}
			<div id="apDiv1">{$nombre_seccion}</div>

		<div id="contenido-interior">
		<br />
			
		<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			{include file='operacion/cabecera.tpl'}
			<br/>
			<span class="titulos">
			{include file="operacion/{$PERFIL}/menu_solapas.tpl"}
			</span>

			<div class="clear20"></div>
			<!-- arranca el form de manifiesto slop -->
			<div class="titulo_manifiesto">Creaci&oacute;n manifiesto SLOP</div>

			<div class="alert alert-info" role="alert" style="display:none;" id="mensaje_slop_con_barcaza">
				Ud est&aacute; generando un manifiesto que tendr&aacute; vinculado manifiestos SLOP relacionados, en los cuales se indican los transportistas y veh&iacute;culos que participar&aacute;n.
			</div>

			<input type="hidden" id="tipo_manifiesto" name="tipo_manifiesto" value="{TipoManifiesto::SLOP}"/>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Empresa Naviera/Mar&iacute;tima - Buque</p>
				<div id="tabla_generador" style="display:none;">
					<table class="table table-hover table-striped" id="lista_generadores">
						<thead>
							<tr>
								<th class="invisible">ID</th>
								<th>Raz&oacute;n Social</th>
								<th>Nombre del buque</th>
								<th>CUIT</th>
								<th>Domicilio</th>
								<th>Tel</th>
							</tr>
						</thead>
						<tbody></tbody>
					</table>
				</div>
				<div class="contenedor_buscar" id="seleccion_generador">
					<span class="legend">Seleccione la empresa</span>
					<div class="buscar_button">
						<button type="button" class="btn btn-success btn-sm" id='btn_buscar_empresa_maritima'>Buscar</button>
					</div>
				</div>
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
				<div id="tabla_transportista" {if $PERFIL == 'transportista'} style="display:block;" {else} style="display:none;" {/if}>
					<table class="table table-hover table-striped" id="lista_transportistas">
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
							{if $PERFIL == 'transportista'}
								<tr>
									<td class="invisible">{$ESTABLECIMIENTO.ID}</td>
									<td>{$ESTABLECIMIENTO.NOMBRE_EMPRESA}</td>
									<td>{$ESTABLECIMIENTO.CALLE_R} {$ESTABLECIMIENTO.NUMERO_R} {$ESTABLECIMIENTO.PISO_R}</td>
									<td>{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}/{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</td>
									<td>{$ESTABLECIMIENTO.CUIT}</td>
									<td>{$ESTABLECIMIENTO.CAA_NUMERO} - {$ESTABLECIMIENTO.CAA_VENCIMIENTO}</td>
								</tr>
							{/if}
						</tbody>						
					</table>
				</div>

				{if $PERFIL != 'transportista'}
					<div class="contenedor_buscar" id="seleccion_transportista">
						<span class="legend">Seleccione un Transportista</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_transportista'>Buscar</button>
						</div>
					</div>
				{/if}
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
				<div id="tabla_operador" {if $PERFIL == 'operador'} style="display:block;" {else} style="display:none;" {/if}>
					<table class="table table-hover table-striped" id="lista_operadores">
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
							{if $PERFIL == 'operador'}
								<tr>
									<td class="invisible">{$ESTABLECIMIENTO.ID}</td>
									<td>{$ESTABLECIMIENTO.NOMBRE_EMPRESA}</td>
									<td>{$ESTABLECIMIENTO.CALLE_R} {$ESTABLECIMIENTO.NUMERO_R} {$ESTABLECIMIENTO.PISO_R}</td>
									<td>{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}/{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</td>
									<td>{$ESTABLECIMIENTO.CUIT}</td>
									<td>{$ESTABLECIMIENTO.CAA_NUMERO} - {$ESTABLECIMIENTO.CAA_VENCIMIENTO}</td>
								</tr>
							{/if}
						</tbody>
					</table>
				</div>

				{if $PERFIL != 'operador'}
					<div class="contenedor_buscar" id="seleccion_operador">
						<span class="legend">Seleccione un Operador</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_buscar_operador' data-toggle="modal" data-target="#mel_popup">Buscar</button>
						</div>
					</div>
				{/if}
			</div>

			<div class="table-responsive bs-example">
				<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuo</p>
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
						<tbody></tbody>
					</table>
				</div>
				<div class="contenedor_buscar" id="seleccione_residuo">
					<span class="legend">Seleccione el Residuo</span>
					<div class="buscar_button">
						<button type="button" class="btn btn-success btn-sm" id="btn_agregar_residuo" data-toggle="modal" data-target="#mel_popup">Buscar</button>
					</div>
				</div>
			</div>

			{if $PERFIL == 'transportista'}
				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culo / Barcaza</p>
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
						<span class="legend">Seleccione un veh&iacute;culo</span>
						<div class="buscar_button">
							<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo' data-toggle="modal" data-target="#mel_popup" disabled>Buscar Veh&iacute;culo</button>
						</div>
					</div>
				</div>
			{/if}

				<div class="table-responsive bs-example">
					<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
					<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" placeholder="Escriba aqu&iacute; todas las observaciones que considere necesarias a tener en cuenta sobre el manifiesto"></textarea>
				</div>

			<div align="center" style="margin-top:25px;">

				<div id='progress-button_btn_f' class="progress-button elastic" >
					<button id="btn_finalizar_b" data-target="#mel_popup"><span>Finalizar</span></button>
					<svg class="progress-circle" width="70" height="70"><path d="m35,2.5c17.955803,0 32.5,14.544199 32.5,32.5c0,17.955803 -14.544197,32.5 -32.5,32.5c-17.955803,0 -32.5,-14.544197 -32.5,-32.5c0,-17.955801 14.544197,-32.5 32.5,-32.5z"/></svg>
					<svg class="checkmark" width="70" height="70"><path d="m31.5,46.5l15.3,-23.2"/><path d="m31.5,46.5l-8.5,-7.1"/></svg>
					<svg class="cross" width="70" height="70"><path d="m35,35l-9.3,-9.3"/><path d="m35,35l9.3,9.3"/><path d="m35,35l-9.3,9.3"/><path d="m35,35l9.3,-9.3"/></svg>
				</div>

			</div>
			</div>

		</div>
		{include file='general/popup.tpl' ID_POPUP='mel'}
		{include file='operacion/popups.tpl'}
	</body>

{literal}

<script language="javascript">
	// Boton de progreso para Finalizar
	newProgressButton('progress-button_btn_f','submit_slop_padre');

	$(document).on('click', '.btn_establecer_resultado_operador', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/operador.php",
			data: {accion : "alta", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(response){
				if (response['estado'] != 0) {
					mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
				} else {
					completar_tabla_entidad('operador', response['datos']);
				}
			}
		});
	});

	$(document).on('click', '.btn_establecer_resultado_transportista', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/operador/transportista.php",
			data: {accion : "alta", id : registro_actual.find('#id').html()},
			dataType: "text json",
			success: function(response){
				if(response['estado'] != 0){
					mostrarMensaje("exclamation-triangle", response['errores']['alta'], "warning");
				}else{
					completar_tabla_entidad('transportista', response['datos']);
					activar_boton_buscar_residuos('transportista', 2);
					limpiar_tabla_residuos();
				}
			}
		});
	});

	/**
	 * @override para particularidades de Manifiesto SLOP. 
	 */
	function agregar_vehiculo_unico(vehiculo_id)
	{
		//console.info("Ejecutando agregar_vehiculo_unico() dentro de form_manifiesto_slop_padre.tpl");
		//console.info("lista_vehiculos tr:" + $('#lista_vehiculos tr').length);
		$("#btn_aceptar_1").removeAttr("disabled");

		
		// 1 porque ese tr corresponde a los titulos de la tabla
		if ($('#lista_vehiculos tr').length <= 1) {
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

						if (retorno['datos']['TIPO_VEHICULO'] == 'BA') {
							$("div#mensaje_slop_con_barcaza").show();
						} else {
							$("div#mensaje_slop_con_barcaza").hide();
						}
					}
			    }
			});
			$("div#seleccion_vehiculos span").hide();
		} else {
			mostrarMensaje("exclamation-triangle", "No puede cargar m&aacute;s de un veh&iacute;culo en el manifiesto","error");
		}
	};

	function submit_slop_padre(instance)
	{
		var rol = '{/literal}{$rol}{literal}';
		var observaciones = $("textarea#observaciones_manifiesto").val();

		var botonFinalizar = progessButton;
		botonFinalizar.init(instance);
		botonFinalizar.setProgress(0.1);
		var resultado = true;
		botonFinalizar.setProgress(0.4);
		var residuo_cantidad_estimada = $("input#residuo_cantidad_estimada").val();

		if (residuo_cantidad_estimada != '') {
			var as = $.ajax({
				type: "POST",
				url: mel_path+"/operacion/"+rol+"/manifiestos_slop.php",
				data: {tipo_slop: 'slop', residuo_cantidad_estimada: residuo_cantidad_estimada, observaciones: observaciones},
				dataType: "text json",
				async: false,
				success: function(retorno)
				{
					botonFinalizar.setProgress(0.7);

					if(retorno['estado'] == 0) {
						mostrarMensaje("exclamation-triangle","Manifiesto creado de forma exitosa","success");
						window.location.replace(mel_path+"/operacion/"+rol+"/manifiestos_pendientes.php");
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
		} else {
			botonFinalizar.setProgress(0.7);
			mostrarMensaje("exclamation-triangle", "Debe indicar la cantidad estimada","error");
			resultado = false;
		}

		botonFinalizar.stopProgress(resultado);
	};

</script>
{/literal}
</html>
