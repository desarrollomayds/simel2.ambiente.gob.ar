<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Admin</title>

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
            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> |<a style="color:white;" href="../compartido/mi_cuenta.php">  Mi cuenta </a>|<a style="color:white;" href="../login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
        </div>

		<div id="contenedor-interior">
			{include file='general/logos.tpl'}
			<div id="apDiv1">Administradores</div>

			<div id="contenido-interior"><br />

			<span class="titulos"><br />
				<div id="menu-solapas">
				{if $USUARIO.ROL == 1}
					<div class="tabnueva" style="width:200px; background-color:#1F99CD; padding-top:10px; float:left;"><a href="/operacion/listado.php">Registraciones Pendientes</a></div>
					<div style="width: 20px;"></div>
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
					<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				{elseif $USUARIO.ROL == 0}
					<div class="tabnueva"><a href="../operacion/listado_usuarios.php">Usuarios</a> </div>
					<div class="tabnuevaInactiva"><a href="../operacion/listado_roles.php">Roles</a></div>
					<div class="tabnuevaInactiva"><a href="../operacion/reportes.php">Reportes</a></div>
					<div class="tabnuevaInactiva"><a href="../operacion/bandeja_de_entrada.php">Mensajes</a></div>
				{/if}
			</span>
			<div style="height:2px; background-color:#5D9E00; clear:both"></div>
			</div>
			<br/><br/>
				<form method='post' action=''>
					<center>
	                    <div class="tablaBuscar" style="width:500px;">Criterio :&nbsp;&nbsp;<input type='text' name='criterio' value=''>&nbsp;&nbsp;<input class="ui-el-minibutton" type='submit' value='buscar'>&nbsp;&nbsp;</div>
					</center>
				</form>
				<br>
				<table align="center" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size: 14px;">
					<tr style="height: 15px;">
						<td width=""  bgcolor="#A8D8EA" class="td">Raz&oacute;n social</td>
						<td width="" bgcolor="#A8D8EA" class="td">Cuit</td>
						<td width="" bgcolor="#A8D8EA" class="td">Roles</td>
	                    <td width="" bgcolor="#A8D8EA" class="td">Domicilio Real</td>
						<td width="" bgcolor="#A8D8EA" class="td">Nro. de solicitud</td>
						<td width="" bgcolor="#A8D8EA" class="td">Fecha de inscripci&oacute;n</td>
						<td width="" bgcolor="#A8D8EA" class="td">Estado</td>
						<td width="" bgcolor="#A8D8EA" class="td" colspan="2">Opciones</td>
					</tr>

					{foreach $PENDIENTES as $PENDIENTE}
						{if $PENDIENTE@iteration is even by 1}
							{assign var="COLOR_LINEA" value="#EAEAE5"}
						{else}
							{assign var="COLOR_LINEA" value="#F7F7F5"}
						{/if}
					<tr>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$PENDIENTE.NOMBRE}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.CUIT}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.ROLES_}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="dom_">{$PENDIENTE.DOMICILIO_REAL}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="id_">{$PENDIENTE.ID}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.FECHA_INSCRIPCION}</td>
						<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$PENDIENTE.ESTADO_}</td>
						<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='detalle.php?id={$PENDIENTE.ID}'>ver detalle</a></td>
						<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='detalle.php?id={$PENDIENTE.ID}'>Restablecer contrase&ntilde;a</a></td>
					</tr>
					{/foreach}
				</table>
				<div style="margin-top:25px;">P&aacute;ginas
	            <table align="center">
					{foreach $PAGINAS as $PAGINA}
						<a href="/operacion/listado.php?p={$PAGINA+1-1}">{$PAGINA+1}</a>
					{/foreach}
				</table>
				</div>
			</div>
		</div>
	</body>
