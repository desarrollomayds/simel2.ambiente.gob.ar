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
                <link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />
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

<div id="contenedor-interior"><div id="logo"> <img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/logo.gif" width="179" height="83" vspace="5" /> </div>
<div id="apDiv1">Mensajeria<br /></div>
<!--<div id="logo"><img src="/imagenes/logo.gif" width="179" height="83" vspace="5" /></div><div id="apDiv1">Registraciones pendientes<br /></div>-->

		<div id="contenido-form">
			<br><br>

			<br/>

<div style="height:2px; background-color:#5D9E00;width:100%;"></div>



			<br/>
			<form method='post' action=''>
				<br/>
				<center>
                                    <div class="tablaBuscar">Criterio :&nbsp;&nbsp;<input type='text' name='criterio' value=''>&nbsp;&nbsp;<input class="ui-el-minibutton" type='submit' value='buscar'>&nbsp;&nbsp;</div>

				</center>
			</form>

			<br>
			<table width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales" style="font-size: 14px;">
				<tr style="height: 15px;">
					<td width=""  bgcolor="#A8D8EA" class="td">Fecha</td>
					<td width="" bgcolor="#A8D8EA" class="td">Empresa</td>
					<td width="" bgcolor="#A8D8EA" class="td">Mensaje</td>
                                        <td width="" bgcolor="#A8D8EA" class="td">Ver</td>
					<td width="" bgcolor="#A8D8EA" class="td">Borrar</td>

				</tr>


			</table>
			<div style="float:right; margin-top:25px;">P&aacute;ginas
                            <table>

					<a href="#" ></a>

			</table></div>
			<br/>

			<br><br>
                        <div id='div_popup' class='invisible'>
                    </div>

		</div>
	</body>
<html>
