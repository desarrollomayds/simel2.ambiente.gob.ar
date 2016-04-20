<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Manifiestos en Proceso</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' datepicker='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='false' datepicker='true'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.print_element.js"></script>
	</head>

	<body>

		{if $PERFIL == 1}
			{assign var=nombre_seccion value='Generadores'}
			{assign var=rol value='generador'}
		{elseif $PERFIL == 2}
			{assign var=nombre_seccion value='Transportistas'}
			{assign var=rol value='transportista'}
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
					<strong>MANIFIESTOS EN PROCESO</strong>
				</span>
				<br /><br />

				{* Buscador *}
				{include file='general/buscador_manifiestos.tpl' form_action="manifiestos_proceso.php" tipo_manifiesto="{$TIPO_MANIFIESTO}" filtros="{$filtros_buscador}"}

				<ul class="nav nav-tabs" style="margin-top: 20px;">
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SIMPLE} class="active" {/if}>
						<a href="manifiestos_proceso.php?tipo_manifiesto=0">Simple</a>
					</li>
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::MULTIPLE} class="active" {/if}>
						<a href="manifiestos_proceso.php?tipo_manifiesto=1">M&uacute;ltiple</a>
					</li>
					<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SLOP} class="active" {/if}>
						<a href="manifiestos_proceso.php?tipo_manifiesto=2">Slop</a>
					</li>
				</ul>

				<div class="table-responsive bs-example">
                	<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Protocolo</th>
								<th>Empresa creadora</th>
								<th>Establecimiento</th>
								{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}<th>Sucursal</th>{/if}
								<th>Fecha Creaci&oacute;n</th>
								<th>Estado</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							{foreach $MANIFIESTOS as $MANIFIESTO}
								<tr id="tr_manifiesto_{$MANIFIESTO->id}">
									<td id="id">{formatear_id_protocolo_manifiesto($MANIFIESTO->id_protocolo_manifiesto)}</td>
									<td>{$MANIFIESTO->nombre_empresa}</td>
									<td>{$MANIFIESTO->nombre_establecimiento}</td>
									{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}<td>{$MANIFIESTO->sucursal}</td>{/if}
									<td>{if $MANIFIESTO->fecha_creacion} {$MANIFIESTO->fecha_creacion->format('Y-m-d H:i:s')} {/if}</td>
									<td>{$MANIFIESTO->estado}</td>
									<td width="50" align="center">
										<a class='hand' href="imprimir_manifiesto.php?id={$MANIFIESTO->id}">
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
									<td colspan="{if $TIPO_MANIFIESTO != TipoManifiesto::SLOP}6{else}5{/if}">No se han encontrado resultados.</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>

				{if $MANIFIESTOS}
					{$pagination}
				{/if}

				<div align="right" >
					<a class="btn btn-primary btn-sm" href='?exportar=yes&tipo_manifiesto={$TIPO_MANIFIESTO}'>
						Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
					</a>
				</div>

			</div>
		</div>

		{include file='general/popup.tpl' ID_POPUP='mel'}

</body>

{literal}
<script>
	var registro_actual;

	$(document).on('click', '.btn_imprimir_manifiesto', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/generador/imprimir_manifiesto.php",
			data: { id: registro_actual.find('#id').html() },
			dataType: "html",
			success: function(msg) {
				$('#mel_popup_title').html("Imprimir Manifiesto");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(800);
			}
		});
	});

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
				url: mel_path+"/operacion/"+rol+"/manifiestos_proceso.php",
				data: {action: 'get_manifiestos_relacionados', manifiesto_cabecera_id: manifiesto_cabecera_id},
				dataType: "text json",
				success: function(json) {
					if (json.estado == 'ok' && json.html != '') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						tr_padre.closest( "tr" ).after(json.html);
						obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
					}
				}
			});
		}
	}

</script>
{/literal}
</html>


