<html>
	<head>
		<title>Admin - Agregar rol</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' mapa='false'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='false'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/generador.js"></script>
	</head>
	<body>
		<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a>
			</div>
		</div>

		<div id="contenedor-interior">

			<div id="logo" style="width: 100%;">
			<img style="float: left;" src="{$BASE_PATH}/images/LogoDRP.png" width="289" height="73" />
			<img style="float: left;margin-left: 120px" src="{$BASE_PATH}/imagenes/logo_mel.gif" />
			<img style="float: right;margin-right: 45px" src="{$BASE_PATH}/imagenes/logo.gif" width="137" height="60" vspace="5" />
			</div>
			<div style="height: 0px;width: 100%;clear:both;"></div>
			<div id="apDiv1">Administradores</div>

			<div id="contenido-interior"><br />
<div id="menu-solapas">
				{if $USUARIO.ROL == 1}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-right:5px;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
				{elseif $USUARIO.ROL == 2}
					<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:80px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>
					<div style="width: 20px;"></div>
<div class="tabnueva" style="width:130px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>
					<div style="width: 20px;"></div>
					<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/reportes.php">Reportes</a></div>
				{elseif $USUARIO.ROL == 0}
					<span class="titulos"><br />
					<div id="menu-solapas">
						<div class="tabnuevaInactiva"><a href="../operacion/listado_usuarios.php">Usuarios</a> </div>
						<div class="tabnueva"><a href="../operacion/listado_roles.php">Roles</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>
			<br/><br/>
				<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre del rol:</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='descripcion' id='descripcion' value='' size='35'/></td>
					</tr>


					<tr class="invisible">
						<td colspan="2" align="left" id="sumario_errores">
						</td>
					</tr>
				</table>
				<center><a id="btn_grabar"><img src="{$BASE_PATH}/imagenes/boton_aceptar.gif"></a></center>
			</div>
		</div>
	</body>

	{literal}
	<script>
		$('#btn_grabar').click(function() {
			var campos  = [	'descripcion' ];

			var prefijo = '';

			$.ajax({
				type: "POST",
				url: "../operacion/agregar_rol.php",
				data:	{
						descripcion : $("#descripcion").val()
					},
				dataType: "text json",
				success: function(retorno){
					if(retorno['estado'] == 0){
						window.location.replace("../operacion/listado_roles.php");
					}else{
						texto_errores = '';
						for(campo in campos){
							campo = campos[campo];

							if(retorno['errores'][campo] != null){
								texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
							}

							if(texto_errores != ''){
								$('#sumario_errores').html(texto_errores);
								$('#sumario_errores').show();
								;
							}else{
								$('#sumario_errores').hide();
							}
						}
					}
				}
			 });
		});
	</script>
	{/literal}
<html>