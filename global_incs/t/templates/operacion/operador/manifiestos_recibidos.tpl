<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	{include file='general/meta.tpl'}
	<title>Manifiestos recibidos</title>
	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true' datepicker='true' chosen='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true' mapa='true' cuit='true' datepicker='true' chosen='true'}
	<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
</head>

<body>
	<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

	<div id="contenedor-interior">
		{include file='general/logos.tpl'}
		<div id="apDiv1">Operadores<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			{include file='operacion/cabecera.tpl'}
			<!-- DATOS, ESTADISTICAS Y ALERTA -->
			<br />
			{include file='operacion/operador/menu_solapas.tpl'}
			<div style="height:2px; background-color:#5D9E00;"></div>
			<div class="clear20"></div>
				<strong>MANIFIESTOS RECIBIDOS</strong>
			</span>
			<div class="clear20"></div>

			{include file='general/buscador_manifiestos.tpl' form_action="manifiestos_recibidos.php" tipo_manifiesto="{$TIPO_MANIFIESTO}" filtros="{$filtros_buscador}"}

			<ul class="nav nav-tabs">
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SIMPLE} class="active" {/if}>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::MULTIPLE} class="active" {/if}>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" {if $TIPO_MANIFIESTO == TipoManifiesto::SLOP} class="active" {/if}>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<div class="table-responsive bs-example">
            	<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Protocolo</th>
							<th>Empresa creadora</th>
							<th>Establecimiento</th>
							<th>Sucursal</th>
							<th>Fecha creaci&oacute;n</th>
							<th>Fecha Recepci&oacute;n</th>
							<th>Cert.Recepci&oacute;n</th>
							<th>Impr.</th>
							<th>Procesar</th>
						</tr>
					</thead>
					<tbody>
						{foreach $MANIFIESTOS as $MANIFIESTO}
							<tr>
								<td id="id">{formatear_id_protocolo_manifiesto($MANIFIESTO->id_protocolo_manifiesto)}</td>
								<td>{$MANIFIESTO->nombre_empresa}</td>
								<td>{$MANIFIESTO->nombre_establecimiento}</td>
								<td>{$MANIFIESTO->sucursal}</td>
								<td>{if $MANIFIESTO->fecha_creacion} {$MANIFIESTO->fecha_creacion->format('Y-m-d H:i:s')} {/if}</td>
								<td>{if $MANIFIESTO->fecha_recepcion} {$MANIFIESTO->fecha_recepcion->format('Y-m-d H:i:s')} {/if}</td>
								<td width="25" align="center">
									<a class='hand' href="imprimir_constancia_recepcion.php?id={$MANIFIESTO->id}">
										<i class="fa fa-print fa-lg" style="line-height:30px;color:#333333;"></i>
									</a>
								</td>
								<td>
									<a class="hand" href="imprimir_manifiesto.php?id={$MANIFIESTO->id}">
										<i class="fa fa-print fa-lg" style="line-height:30px;color:#333333;"></i>
									</a>
								</td>
								<td width="25" align="center">
									<a class='btn_procesar_manifiesto hand' onclick="procesarManifiesto({$MANIFIESTO->id})">
										<i class="fa fa-cogs fa-lg" style="line-height:30px;color:#333333;" data-toggle="modal" data-target="#mel_popup"></i>
									</a>
								</td>
							</tr>
						{foreachelse}
							<tr>
								<td colspan="9">No se han encontrado resultados.</td>
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
						<a class="btn btn-primary btn-sm" href='?exportar'>
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

</html>


