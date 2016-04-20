<html>
	<head>
		<title>auditoria - listado de empresas habilitadas</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
                <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />
<link   rel="stylesheet"       href="/css/new.css"         type="text/css" />
<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->


		{literal}
		<style type="text/css">

		</style>
		{/literal}
	</head>
	<body>
		<div id="contenedor-form">

<div id="contenedor-interior"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">DRP<br /></div>
<!--<div id="logo"><img src="/imagenes/logo.gif" width="179" height="83" vspace="5" /></div><div id="apDiv1">Registraciones pendientes<br /></div>-->

		<div id="contenido-form">
			<br><br>

			<br/>
			<!--[if IE]>
		<div id="menu-solapas" style="width:900px;">
{if $USUARIO.ROL == 1}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
{elseif $USUARIO.ROL == 2}
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>

				<div class="tabnueva" style="width:170px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>

				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left:5px; "> <a href="/operacion/cambios_pendientes.php">Cambios Pendientes</a></div>

				<div class="tabnueva" style="width:70px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left:5px;"> <a href="/operacion/reportes.php">Reportes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 5px;"><a href="/operacion/reportes.php">Reportes</a></div>
{/if}
			</div>

<div style="border-bottom:1px solid #5D9E00;width:100%;margin-top:-20px;"></div>
<!--[if !IE]> -->
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
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
				{/if}
			</div>

<div style="height:2px; background-color:#5D9E00;width:100%;"></div>
<![endif]-->

			<br/>
			<form method='post' action=''>
				<br/>
				<center>
                                    <div class="tablaBuscar">Criterio :&nbsp;&nbsp;<input type='text' name='criterio' value=''>&nbsp;&nbsp;<input class="ui-el-minibutton" type='submit' value='buscar'>&nbsp;&nbsp;</div>

				</center>
			</form>

			<br>
			<table width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size: 13px;">
				<tr style="height: 15px;">
					<td width=""  bgcolor="#A8D8EA" class="td">Raz&oacute;n social</td>
					<td width="70" bgcolor="#A8D8EA" class="td">Cuit</td>
					<td width="70" bgcolor="#A8D8EA" class="td">Roles</td>
					<td width="" bgcolor="#A8D8EA" class="td">Domicilio Real</td>
					<td width="" bgcolor="#A8D8EA" class="td">Nro. de protocolo</td>

					<td width="" bgcolor="#A8D8EA" class="td">Estado</td>
					<td width="" bgcolor="#A8D8EA" class="td">Opciones</td>
				</tr>

				{foreach $EMPRESAS as $EMPRESA}
					{if $EMPRESA@iteration is even by 1}
						{assign var="COLOR_LINEA" value="#EAEAE5"}
					{else}
						{assign var="COLOR_LINEA" value="#F7F7F5"}
					{/if}
				<tr>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$EMPRESA.NOMBRE}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$EMPRESA.CUIT}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="rol">{$EMPRESA.ROLES_}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="dom_">{$EMPRESA.DOMICILIO_REAL}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="id_">{$EMPRESA.ID_PROTOCOLO}</td>

					<td bgcolor="{$COLOR_LINEA}" class="td" id="estado">{$EMPRESA.ESTADO_}</td>
					<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='/operacion/detalle_empresa_habilitada.php?id={$EMPRESA.ID}'>ver detalle</a> | <a href='/operacion/redactar_mensaje.php?id={$EMPRESA.ID}'>enviar mensaje</a></td>
				</tr>
				{/foreach}
			</table>
			<div style="float:right; margin-top:25px;">P&aacute;ginas
                            <table>
				{foreach $PAGINAS as $PAGINA}
					<a href="/operacion/listado.php?p={$PAGINA+1-1}">{$PAGINA+1}</a>&nbsp;
				{/foreach}
			</table></div>
			<br/>

			<br><br>

		</div>
	</body>
<html>
