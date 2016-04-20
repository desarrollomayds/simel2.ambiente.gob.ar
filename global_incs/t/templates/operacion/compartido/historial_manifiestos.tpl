<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Historial de Manifiestos</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true'}
	</head>

	<body>
		{if $PERFIL == 1}
			{assign var=nombre_seccion value='Generadores'}
			{assign var=rol value='generador'}
		{elseif $PERFIL == 2}
			{assign var=nombre_seccion value='Transportistas'}
			{assign var=rol value='transportista'}
		{elseif $PERFIL == 3}
			{assign var=nombre_seccion value='Operadores'}
			{assign var=rol value='operador'}
		{/if}

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

		<div id="contenedor-interior">
		{include file='general/logos.tpl'}
		<div id="apDiv1">{$nombre_seccion}<br /></div>

			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				{include file='operacion/cabecera.tpl'}
				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				{include file="operacion/{$rol}/menu_solapas.tpl"}
				<div style="height:2px; background-color:#5D9E00"></div>
				<div class="clear20"></div>
					<strong>HISTORIAL MANIFIESTOS</strong>
				</span>
				<div class="clear20"></div>

				{* Buscador *}
				{include file='general/buscador_manifiestos.tpl' form_action="historial_manifiestos.php" tipo_manifiesto="{$TIPO_MANIFIESTO}" filtros="{$filtros_buscador}"}

				<ul class="nav nav-tabs">
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SIMPLE} class="active" {/if}>
						<a href="historial_manifiestos.php?tipo_manifiesto=0">Simple</a>
					</li>
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::MULTIPLE} class="active" {/if}>
						<a href="historial_manifiestos.php?tipo_manifiesto=1">M&uacute;ltiple</a>
					</li>
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SLOP} class="active" {/if}>
						<a href="historial_manifiestos.php?tipo_manifiesto=2">Slop</a>
					</li>
				</ul>

				<div class="table-responsive bs-example">
                	<table class="table table-hover table-striped">
						<thead>
							<tr>
	                            <th>Protocolo</th>
								<th>Emp. Creador</th>
								<th>Est. Creador</th>
								{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}<th>Sucursal</th>{/if}
								<th>Estado</th>
								<th>Fecha Tratamiento</th>
								<th>Const. Recepci&oacute;n</th>
								<th>Cert. Tratamiento</th>
								<th>Manif.</th>
								{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP}<th>&nbsp;</th>{/if}
							</tr>
						</thead>

						{foreach $MANIFIESTOS as $MANIFIESTO}
							<tr id="tr_manifiesto_{$MANIFIESTO->id}">
								<td id="id">{formatear_id_protocolo_manifiesto($MANIFIESTO->id_protocolo_manifiesto)}</td>
								<td>{$MANIFIESTO->nombre_empresa}</td>
								<td>{$MANIFIESTO->nombre_establecimiento}</td>
								{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}
									<td>{$MANIFIESTO->sucursal}</td>
								{/if}
								<td>Finalizado</td>
								<td>{if $MANIFIESTO->fecha_tratamiento} {$MANIFIESTO->fecha_tratamiento->format('Y-m-d H:i:s')} {/if}</td>

								<td width="25" align="center">
									{* slop padre no genero una const. de recepcion *}
									{if ($MANIFIESTO->tipo_manifiesto == TipoManifiesto::SLOP and $MANIFIESTO->es_slop_cabecera == 'si') or $MANIFIESTO->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR}
										&nbsp;-&nbsp;
									{else}
										<a class='hand' href="imprimir_constancia_recepcion.php?id={$MANIFIESTO->id}">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									{/if}
								</td>

								<td width="25" align="center">
									{* slop padre no genero una cert. de tratamiento *}
									{if ($MANIFIESTO->tipo_manifiesto == TipoManifiesto::SLOP and $MANIFIESTO->es_slop_cabecera == 'si') or $MANIFIESTO->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR}
										&nbsp;-&nbsp;
									{else}
										<a class='hand' href="imprimir_certificado_tratamiento.php?id={$MANIFIESTO->id}">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									{/if}
								</td>

								<td width="27" align="left">
									<a class="hand" href="imprimir_manifiesto.php?id={$MANIFIESTO->id}">
										<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
									</a>
								</td>

								{* Si es SLOP de tipo barcaza agregamos boton + para que vea los hijos *}
								{if $TIPO_MANIFIESTO == TipoManifiesto::SLOP and $MANIFIESTO->es_slop_cabecera == 'si'}
									<td><i class="fa fa-plus-circle hand" style="line-height:30px;color: #333333;" title="Ver Manifiestos Relacionados" onclick="expandirManifiestosRelacionados($(this), {$MANIFIESTO->id});"></i></td>
								{else}
									<td>&nbsp;</td>
								{/if}
							</tr>
						{foreachelse}
							<tr>
								<td colspan="{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}9{else}8{/if}">No se han encontrado resultados.</td>
							</tr>
						{/foreach}
					</table>
				</div>

				{if $MANIFIESTOS}
					{$pagination}
				{/if}

				<div align="right" style="margin-top:20px;">
					<a class="btn btn-primary btn-sm" href='?exportar'>
						Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
					</a>
				</div>

				<br /><span class="titulos"><br /></span><br />
			</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

	</body>



{literal}
<script>

	var rol = '{/literal}{$rol}{literal}';

	function expandirManifiestosRelacionados(obj, manifiesto_cabecera_id)
	{
		//console.info("expandirManifiestosRelacionados. manifiesto_cabecera_id: " + manifiesto_cabecera_id);
		var tr_padre = $("#tr_manifiesto_"+manifiesto_cabecera_id);

		if (tr_padre.hasClass('tr_manif_relacionados_desplegados')) {
			$("tr.tr_manifiesto_relacionado_al_"+manifiesto_cabecera_id).toggle();

			if (obj.hasClass('fa-plus-circle')) {
				obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
			} else {
				obj.removeClass('fa-minus-circle').addClass('fa-plus-circle');
			}
		} else {
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/"+rol+"/historial_manifiestos.php",
				data: {action: 'get_manifiestos_relacionados', manifiesto_cabecera_id: manifiesto_cabecera_id},
				dataType: "text json",
				success: function(json) {
					if (json.estado == 'ok' && json.html != '') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						// rows bajo el tr padre "tr_manifiesto_"
						tr_padre.closest( "tr" ).after(json.html);
						$("div#msj_recibir_manifiestos_relacionados").show();
						obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
					}
				}
			});
		}
	}

</script>
{/literal}
</html>