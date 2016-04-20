<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		{include file='general/meta.tpl'}
		<title>Manifiestos Rechazados</title>
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
					<strong>MANIFIESTOS RECHAZADOS</strong>
				</span>
				<br />
				<br />

				{include file='general/buscador_manifiestos.tpl' form_action="manifiestos_rechazados.php" tipo_manifiesto="{$TIPO_MANIFIESTO}" filtros="{$filtros_buscador}"}

				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" {if $criterios.rechazados_por == 'mi'} class="active" {/if}>
						<a href="manifiestos_rechazados.php?rechazados_por=mi">Mis Rechazados</a>
					</li>
					<li role="presentation" {if $criterios.rechazados_por == 'otros'} class="active" {/if}>
						<a href="manifiestos_rechazados.php?rechazados_por=otros">Por otras Partes</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane active" id="container_mis_rechazados">
						<div class="table-responsive bs-example">
					    	<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>ID Operaci&oacute;n</th>
										<th>Fecha<br />Creaci&oacute;n</th>
										<th>Fecha<br />Rechazo</th>
										<th>Tipo Manifiesto</th>
										<th>Empresa creadora</th>
										<th>Establecimiento</th>
										<th>Sucursal</th>
										<th>Estado</th>
										<th>Motivo</th>
									</tr>
								</thead>
								<tbody>
									{foreach $MANIFIESTOS as $MANIFIESTO}
										<tr>
											<td>{$MANIFIESTO->id}</td>
											<td>{$MANIFIESTO->fecha_creacion->format('Y-m-d H:i:s')}</td>
											<td>{$MANIFIESTO->fecha_rechazo->format('Y-m-d H:i:s')}</td>
											<td>{$MANIFIESTO->tipo_manifiesto_nombre}</td>
											<td>{$MANIFIESTO->nombre_empresa}</td>
											<td>{$MANIFIESTO->nombre_establecimiento}</td>
											<td>{$MANIFIESTO->sucursal}</td>
											<td>Rechazado</td>

											<td width="27" align="center">
												<a class="hand">
													<i class="fa fa-search" 
														empresa-rechazo="{$MANIFIESTO->empresa_rechazo}"
														establecimiento-rechazo="{$MANIFIESTO->establecimiento_rechazo}"
														sucursal-rechazo="{$MANIFIESTO->sucursal_rechazo}"
														fecha-rechazo="{$MANIFIESTO->fecha_rechazo->format('Y-m-d H:i:s')}"
														motivo-rechazo="{$MANIFIESTO->motivo_rechazo}"

														onclick="verMotivoRechazo($(this));" data-toggle="modal" 
														data-target="#motivo_rechazo_popup" style="color:#333333;">
													</i>
												</a>
											</td>
										</tr>
									{foreachelse}
										<tr>
											<td colspan="6">No se han encontrado resultados.</td>
										</tr>
									{/foreach}
								</tbody>
							</table>
						</div>
						{if $MANIFIESTOS}
							{$pagination}
						{/if}

						<div align="right" style="margin-top:20px;">
							<a class="btn btn-primary btn-sm" href='?exportar&tipo_rechazados={$tipo_rechazados}'>
								Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
							</a>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="container_rechazados_por_otras_partes"></div>

				<br /><span class="titulos"><br /></span><br />
			</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

		{include file='general/popup.tpl' ID_POPUP='motivo_rechazo'}
	</body>
</html>


{literal}

<script>

	function verMotivoRechazo(obj)
	{
		var empresa = obj.attr('empresa-rechazo');
		var establecimiento = obj.attr('establecimiento-rechazo');
		var sucursal = obj.attr('sucursal-rechazo');
		var fecha = obj.attr('fecha-rechazo');
		var motivo = obj.attr('motivo-rechazo');

		var view = '<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Empresa</span><input type="text" class="form-control" style="width:400px;" placeholder="'+empresa+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Establecimiento</span><input type="text" class="form-control" style="width:400px;" placeholder="'+establecimiento+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Sucursal</span><input type="text" class="form-control" style="width:400px;" placeholder="'+sucursal+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Fechar de Rechazo</span><input type="text" class="form-control" style="width:400px;" placeholder="'+fecha+'" aria-describedby="basic-addon1" disabled></div><br />\
			<b>Descripci&oacute;n:</b><div class="clear20"></div>\
			<div class="well well-lg">'+motivo+'</div>\
			<div align="right"><button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button></div>';

		$('#motivo_rechazo_popup_title').html("Motivo Rechazo");
		$('#motivo_rechazo_popup_body').html(view);
		$('#motivo_rechazo_popup_content').width(600);
	}

</script>

{/literal}