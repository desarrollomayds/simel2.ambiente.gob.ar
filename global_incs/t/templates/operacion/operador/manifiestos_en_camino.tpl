<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	{include file='general/meta.tpl'}
	<title>Manifiestos en Camino</title>
	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true' datepicker='true' chosen='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true' datepicker='true' chosen='true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
</head>

<body>

	<div id="login-top" align="center">
		<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
		</div>
	</div>

	<div id="contenedor-interior">
	{include file='general/logos.tpl'}
	<div id="apDiv1">Operadores<br /></div>

	<div id="contenido-interior"><br />
		<div style="padding:5px; height:150px">
			{include file='operacion/cabecera.tpl'}
			<br />
			{include file='operacion/operador/menu_solapas.tpl'}
			<div style="height:2px; background-color:#5D9E00;"></div>
			<div class="clear20"></div>
				<strong>MANIFIESTOS EN CAMINO</strong>
			</span>
			<div class="clear20"></div>

			{* Buscador *}
			{include file='general/buscador_manifiestos.tpl' form_action="manifiestos_en_camino.php" tipo_manifiesto="{$TIPO_MANIFIESTO}" filtros="{$filtros_buscador}"}

			<ul class="nav nav-tabs">
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SIMPLE} class="active" {/if}>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::MULTIPLE} class="active" {/if}>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SLOP} class="active" {/if}>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<div class="alert alert-danger" role="alert" style="display:none;margin-top:10px;" id="msj_recibir_manifiestos_relacionados">
				Para recibir un Manifiesto Slop Padre y finalizarlo se debe primero recibir y tratar todos sus hijos.
			</div>

			<div class="table-responsive bs-example">
                <table class="table table-hover table-striped">
                	<thead>
						<tr>
							<th>Protocolo</th>
							<th>
								{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP}Empresa Naviera{else}Empresa creadora{/if}
							</th>
							<th>
								{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP}Buque{else}Establecimiento{/if}
							</th>
							{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}
								<th>Sucursal</th>
							{/if}
							<th>Fecha Creaci&oacute;n</th>
							<th>Estado</th>
							<th>{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP}Acci&oacute;n{else}Recibir{/if}</th>
							<th>&nbsp;</th>
						</tr>
					</thead>
					{* query rows *}
					<tbody>
						{foreach $MANIFIESTOS as $MANIFIESTO}

							{if $MANIFIESTO@iteration is even by 1}
								{assign var="COLOR_LINEA" value="#EAEAE5"}
							{else}
								{assign var="COLOR_LINEA" value="#F8F7F5"}
							{/if}

							{* para manifiesto slop vamos a ocultar los tr de los hijos para que los expandan manualmente del padre*}
							{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP }
								<tr id="tr_padre_{$MANIFIESTO->id}">
							{else}
								<tr>
							{/if}
									<td id="id">{formatear_id_protocolo_manifiesto($MANIFIESTO->id_protocolo_manifiesto)}</td>
									<td>{$MANIFIESTO->nombre_empresa}</td>
									<td>{$MANIFIESTO->nombre_establecimiento}</td>
									{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}
										<td>{$MANIFIESTO->sucursal}</td>
									{/if}
									<td>{if $MANIFIESTO->fecha_creacion} {$MANIFIESTO->fecha_creacion->format('Y-m-d H:i:s')} {/if}</td>
									<td style="font-weight:bold;">Aprobado</td>
									<td width="25" align="center">
										<i class="fa fa-pencil-square-o fa-lg hand" style="line-height:30px;color: #333333;" manifiesto-id="{$MANIFIESTO->id}" onclick="recibirManifiesto($(this));"></i>
									</td>
									<td>
										<a class="hand" href="imprimir_manifiesto.php?id={$MANIFIESTO->id}">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									</td>
								</tr>
						{foreachelse}
							<tr>
								<td colspan="{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}7{else}6{/if}">No se han encontrado resultados.</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			{if $MANIFIESTOS}
				{$pagination}
			{/if}

			<table width="880" border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td align='right'>
						<a class="btn btn-primary btn-sm" href='?exportar&tipo_manifiesto={$TIPO_MANIFIESTO}'>
							Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
						</a>
					</td>
				</tr>
			</table>

			<br /><span class="titulos"><br /></span><br />
		</div>
	</div>

	{include file='general/popup.tpl' ID_POPUP='mel'}
	{include file='general/popup.tpl' ID_POPUP='tratamientos'}
	</div>

</body>

{literal}
<script>

	/**
	 * Posibles responses:
	 *   CASO_1:
	 * 	 json.estado = hijos_no_finalizados
	 * 	 json.html   = rows html para apendear y mostrar manifiestos slop relacionados en la tabla
     *
     *   CASO_2:
     *   json.estado = listo_para_recibir
     *   json.html   = html para el popup de recepcion del manifiesto
	 *
	 *   CASO_3:
	 *   json.estado = slop_barcaza_sin_relacionados
	 * 	 json.html   = msj indicando que al manif slop cabecera aun no le fueron relacionados manifiestos slop hijos.
	 */
	function recibirManifiesto(obj)
	{
		var manifiesto_id = obj.attr("manifiesto-id");
		var tr_padre = $("#tr_padre_"+manifiesto_id);
		
		if (tr_padre.hasClass('tr_manif_relacionados_desplegados')) {
			$("tr.tr_manifiesto_relacionado_al_"+manifiesto_id).toggle();
			$("div#msj_recibir_manifiestos_relacionados").toggle();
		} else {
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/operador/recibir_manifiesto.php",
				data: {id : manifiesto_id},
				dataType: "text json",
				success: function(json) {
					console.debug(json);
					// CASO_1
					if (json.estado == 'hijos_no_finalizados') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						// rows bajo el tr padre tr_padre_
						tr_padre.closest( "tr" ).after(json.html);
						$("div#msj_recibir_manifiestos_relacionados").show();
					}
					// CASO_2
					if (json.estado == 'listo_para_recibir') {
					    $('#mel_popup').modal('show');
						$('#mel_popup_title').html("Recibir Manifiesto");
						$('#mel_popup_body').html(json.html);
						$('#mel_popup_content').width(750);
					}
					// CASO_3
					if (json.estado == 'slop_barcaza_sin_relacionados') {
						mostrarMensaje("exclamation-triangle", json.html,"warning");
					}
				}
			});
		}
	}
</script>
{/literal}
</html>
