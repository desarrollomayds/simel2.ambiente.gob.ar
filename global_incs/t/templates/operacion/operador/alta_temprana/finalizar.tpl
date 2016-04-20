<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Final</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.print_element.js"></script>
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />

		{literal}
		<style type="text/css">
			<!--
			#apDiv1 {
				position:relative;
				left:45px;
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
			.a {
				color: #519018;
				border-bottom-width: 1px;
				border-bottom-style: dotted;
				border-bottom-color: #447814;
				text-decoration: none;
			}
			.style1 {color: #A8D8EA}
			-->
		</style>
		{/literal}
	</head>

	<body>
		<div id="ingreso"><div id="logo" style="width: 450px;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
		<br /><br /><br />
		<div id="apDiv1">Fin de alta temprana<br /></div>
		<div id="contenido-ingreso">
			{if $ERROR}
			<span class="titulos"><br /><br />Ocurrio un error al guardar los datos : {$ERROR}<br /></span>
			<br />
			<span class="titulos"><a href='paso_4.php'><img src="/imagenes/boton_anterior.gif" width="91" height="30" border="0" /></a><br /></span>
			<a id='btn_imprimir'><img src="/imagenes/boton_imprimir.gif" width="91" height="30" /></a>
			{else}
			<span class="titulos"><br /><br />Los datos fueron guardados de forma correcta, por favor, cierre esta ventana.<br /></span>
			<br />
			{/if}
		</div>
		<div id="div_impresion" class="invisible" width="100%"></div>
	</body>
</html>
