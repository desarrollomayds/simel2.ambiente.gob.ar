<html>
	<head>
		<title>auditoria - listado de registraciones pendientes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<!-- carga de css -->
		{include file='general/css_headers.tpl' bootstrap='true' mapa='false'}
		<!-- carga de js y files especificos para la seccion -->
		{include file='general/js_headers.tpl' bootstrap='true' mapa='false'}
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/generador.js"></script>
		<script type="text/javascript" src="{$BASE_PATH}/javascript/epoch_classes.js"></script>
		<link   rel="stylesheet" href="{$BASE_PATH}/css/epoch_styles.css" type="text/css" />
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
						<div class="tabnueva"><a href="../operacion/listado_usuarios.php">Usuarios</a> </div>
						<div class="tabnuevaInactiva"><a href="../operacion/listado_roles.php">Roles</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
						<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>
					</div>
				</span>
				<div style="height:2px; background-color:#5D9E00"></div>
				{/if}
			</div>
			<br><br>

			<div style=" background-color:#EAEAE5;">
				<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre de usuario :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='username' id='username' value='' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Contrase&ntilde;a :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='password' name='password' id='password' value='' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Rol :</td>
						<td width="450" bordercolor="#EAEAE5">	<select id='rol' name='rol'>
												{foreach $ROLES as $ROL}
													<option style="font-size: 11px;" value='{$ROL.CODIGO}' >{$ROL.DESCRIPCION}</option>
												{/foreach}
											</select></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Nombre :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Apellido :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='apellido' id='apellido' value='' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Tipo de documento :</td>
						<td width="450" bordercolor="#EAEAE5"><select id='tipo_documento' name='tipo_documento'>
												{foreach $TIPOS_DOCUMENTO as $TIPO_DOCUMENTO}
													<option style="font-size: 11px;" value='{$TIPO_DOCUMENTO.ID}'>{$TIPO_DOCUMENTO.DESCRIPCION}</option>
												{/foreach}
											</select></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero de documento :</td>
						<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_documento' id='numero_documento' value='' size='35'/></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de nacimiento :</td>
						<td width="450" bordercolor="#EAEAE5"><label><input type='text' name='fecha_nacimiento' id='fecha_nacimiento' value='' size='35' readonly="true"/><input type='button' value='...' id='btn_cal_fecha_nacimiento'></label></td>
					</tr>
					<tr>
						<td width="200" height="25" align="right" bordercolor="#EAEAE5">Sexo :</td>
						<td width="450" bordercolor="#EAEAE5">	<select id='sexo' name='sexo'>
												<option value='f'>Femenino</option>
												<option value='m'>Masculino</option>
											</select></td>
					</tr>


					<tr>
						<td colspan="2" align="left" id="sumario_errores" class="invisible">
						</td>
					</tr>
				</table>
			</div>
			<center><a id="btn_grabar"><img src="{$BASE_PATH}/imagenes/boton_aceptar.gif"></a></center>


			<br><br>

		</div>
	</body>

	{literal}
	<script>
		var fecha_nacimiento_instancia = null;

		$(function(){
			$('#numero_documento').filter_input({regex:'[0-9]'});

			fecha_nacimiento_instancia = new Epoch('fecha_nacimiento_container', 'popup', document.getElementById('fecha_nacimiento'), 0);
		});

		$('#btn_cal_fecha_nacimiento').click(function() {
			fecha_nacimiento_instancia.toggle();
		})

		$('#btn_grabar').click(function() {
			var campos  = [	'username', 'password', 'rol', 'nombre', 'apellido', 'tipo_documento', 'numero_documento', 'fecha_nacimiento', 'sexo' ];

			var prefijo = '';

			$.ajax({
				type: "POST",
				url: "../operacion/agregar_usuario.php",
				data:	{
						username         : $("#username").val(),
						password         : $("#password").val(),
						rol              : $("#rol").val(),
						nombre           : $("#nombre").val(),
						apellido         : $("#apellido").val(),
						tipo_documento   : $("#tipo_documento").val(),
						numero_documento : $("#numero_documento").val(),
						fecha_nacimiento : $("#fecha_nacimiento").val(),
						sexo             : $("#sexo").val()
					},
				dataType: "text json",
				success: function(retorno){
								if(retorno['estado'] == 0){
									window.location.replace("../operacion/listado_usuarios.php");
								}else{
									texto_errores = '';
									for(campo in campos){
										campo = campos[campo];

										if(retorno['errores'][campo] != null){
											texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
											$('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
											$('#' + campo).addClass('error_de_carga');
										}else{
											$('#' + campo).removeClass('error_de_carga');
										}
									}

									if(texto_errores != ''){
										$('#sumario_errores').html(texto_errores);
										$('#sumario_errores').show();
									}else{
//										$('#sumario_errores').hide();
									}
								}
							}
			 });
		});
	</script>
	{/literal}
<html>