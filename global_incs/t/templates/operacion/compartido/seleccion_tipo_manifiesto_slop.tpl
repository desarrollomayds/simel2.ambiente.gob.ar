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
			<div id="container">
			{if $ALERTA.bloqueante == 'N' || $ALERTA.bloqueante == ''}
				<div class="form-group">
					<label>&#191;Qu&eacute; tipo de Manifiesto SLOP desea generar&#63;</label>
					<div>
						<select class="form-control" name='tipo_slop' id='tipo_slop'>
							<option value='slop' selected>Nuevo Manifiesto SLOP</option>
							{if $PERFIL == 'transportista'}
								<option value='relacionado'>Nuevo Manifiesto SLOP Relacionado</option>
							{/if}
						</select>
					</div>
				</div>

				<input type="hidden" id="perfil" name="perfil" value="{$PERFIL}"/>

				<div align="right">
					<button type="submit" class="btn btn-success btn-sm" id='btn_crear_manifiesto_slop'>Siguiente</button>
				</div>
			{/if}
			</div>
		</div>
		</div>

	</body>

{literal}


<script language="javascript">

	$(document).on('click', 'button#btn_crear_manifiesto_slop', function() {

		var perfil = $("input#perfil").val();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/"+perfil+"/manifiestos_slop.php",
			data: {tipo_slop: $("select#tipo_slop").val()},
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
</script>
{/literal}
</html>
