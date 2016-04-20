<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

{if $PERFIL == 'generador'}
	{assign var=nombre_seccion value='Generadores'}
{elseif $PERFIL == 'transportista'}
	{assign var=nombre_seccion value='Transportistas'}
{elseif $PERFIL == 'operador'}
	{assign var=nombre_seccion value='Operadores'}
{/if}

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' cuit='true' }
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

				<div style="height:2px; background-color:#5D9E00"></div>

				<br />
				<div class="clear20"></div>
				{if $ALERTA.bloqueante == 'N' || $ALERTA.bloqueante == ''}
				<div id="container_manifiestos_simples">
					<div class="form-group">
						<label>&#191;Con qu&eacute; tipo de Manifiesto Simple desea trabajar&#63;</label>
						<div>
							<select class="form-control" name='tipo_manifiesto' id='tipo_manifiesto'>
								<option value='{TipoManifiesto::SIMPLE}' selected>Nuevo Manifiesto Simple</option>
								{if $PERFIL == 'generador'}
									<option value='{TipoManifiesto::SIMPLE_CONCENTRADOR}'>Nuevo Manifiesto Simple Concentrador</option>
								{else}
									<option value='{TipoManifiesto::SIMPLE_RES_544_94}'>Nuevo Manifiesto Res. 544/94</option>
								{/if}
							</select>
						</div>
					</div>

					<input type="hidden" id="perfil" name="perfil" value="{$PERFIL}" />

					<div align="right">
						<button type="submit" class="btn btn-success btn-sm" id='btn_ir_creacion_manifiesto'>Siguiente</button>
					</div>
				</div>
				{/if}
			</div>
		</div>

	</body>
</html>