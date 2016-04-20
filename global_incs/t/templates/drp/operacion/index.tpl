<html>
	<head>
		<title>auditoria - listado de registraciones pendientes</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />

		{literal}
		<style type="text/css">
			<!--
			#apDiv1 {
				position:relative;
				left:415px;
				top:44px;
				width:378px;
				height:53px;
				z-index:1;
				background-image: url(/imagenes/cabecera_formulario.gif);
				background-repeat: no-repeat;
				padding-top: 30px;
				padding-left: 30px;
				font-family: Arial, Helvetica, sans-serif;
				font-size: 16px;
				color: #FFFFFF;
				text-align: left;
			}
			.style1 {color: #A8D8EA}
			-->
		</style>
		{/literal}
	</head>
	<body>
		<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>
		<div id="apDiv1">DRP<br /></div>

		<div id="contenido-form">
			<br><br><br>
			<div>
				{if $USUARIO.ROL == 1}
					<a href="/operacion/listado.php">Registraciones Pendientes</a>
				{elseif $USUARIO.ROL == 2}
					<a href="/operacion/listado.php">Registraciones Pendientes</a> | <a href="/operacion/reportes.php">Reportes</a>
				{/if}
			</div>
			<hr>
			<br>
			aca habria que poner algo

		</div>
	</body>
<html>
