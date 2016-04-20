<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>
		<link   rel="stylesheet"       href="/css/daterangepicker.css" type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/interior.css"        type="text/css" />

		<style type="text/css">
		{literal}
			<!--
			#apDiv1 {
				position:relative;
				left:555px;
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
		<style type="text/css">
		<!--
			.style2 {
				color: #66B31C;
				font-weight: bold;
			}
		-->
		{/literal}
		</style>
	</head>

<body>
		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
<div id="contenedor-interior"><div id="logo"> <img src="/imagenes/logo.gif" width="179" height="83" vspace="5" /> </div>
<div id="apDiv1">Transportistas<br />
</div>
<div id="contenido-interior"><br />
<div style="padding:5px; height:150px">
<!-- DATOS, ESTADISTICAS Y ALERTAS -->
{include file='operacion/transportista/cabecera.tpl'}
<!-- DATOS, ESTADISTICAS Y ALERTA -->

<br />
<span class="titulos"><br />

<div id="menu-solapas">
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="creacion_manifiesto.php">Manifiestos Simples <a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="creacion_manifiesto_multiples.php">Manifiestos Multiples<a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="rutas.php">Rutas<a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:left; margin-right:5px"><a href="flotas.php">Flotas<a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="historial_manifiestos.php">Historial de Manifiestos</a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="manifiestos_ejecutables.php">Manifiestos en Proceso</a></div>
	<div class="solapas" style="width:auto; height:10px; background-color:#A8D8EA; padding:10px; float:right; margin-right:5px"><a href="manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
</div>
<div style="height:2px; background-color:#1F99CD"></div>

<br />
Ruta Definida<br />
</span><br />
<table width="908" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms4">
<tr>
<td height="30" colspan="4" bgcolor="#A8D8EA" class="td"><span class="style1"></span>Por favor Seleccione la ruta del manifiesto</td>
</tr>
<tr>
<td width="271" rowspan="2" align="center" bgcolor="#EAEAE5" class="td"><select name="select5" size="4" multiple="multiple" id="select5" style="height:65px; width:250px">
<option value="Area Norte">Area Norte</option>
<option value="Area Sur">Area Sur</option>
<option value="Area Este">Area Este</option>
<option value="Area Oeste">Area Oeste</option>
<option value="5">5</option>
</select></td>
<td width="308" rowspan="2" align="center" bgcolor="#EAEAE5" class="td"><select name="select6" size="4" multiple="multiple" id="select6" style="height:65px; width:250px">
<option value="Destino 1">Destino 1</option>
<option value="Destino 2">Destino 2</option>
<option value="Destino 3">Destino 3</option>
<option value="Destino 4">Destino 4</option>
<option value="5">5</option>
</select></td>
<td width="299" height="35" align="center" bgcolor="#EAEAE5" class="td"><label><img src="/imagenes/boton_agregarNuevo.gif" width="120" height="30" /></label></td>
</tr>
<tr>
<td height="35" align="center" bgcolor="#EAEAE5" class="td"><img src="/imagenes/boton_buscar.gif" width="79" height="30" /></td>
</tr>
</table>
<br />
<span class="titulos">Cantidades</span><br />
<br />
<table width="903" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
<tr>
<td width="52" height="30" align="center" bgcolor="#A8D8EA" class="td"><span class="titulos">
<input type="checkbox" name="checkbox5" id="checkbox5" />
</span></td>
<td width="235" height="30" bgcolor="#A8D8EA" class="td">Cliente</td>
<td width="112" bgcolor="#A8D8EA" class="td">Cantidad</td>
<td width="52" align="center" bgcolor="#A8D8EA" class="td"><span class="titulos">
<input type="checkbox" name="checkbox5" id="checkbox5" />
</span></td>
<td width="244" bgcolor="#A8D8EA" class="td">Cliente</td>
<td width="148" bgcolor="#A8D8EA" class="td">Cantidad</td>
</tr>
<tr>
<td height="20" align="center" valign="middle" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox6" id="checkbox6" />
</span></td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 1</td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">500k</td>
<td align="center" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox6" id="checkbox6" />
</span></td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 6</td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">500k</td>
</tr>
<tr>
<td align="center" bgcolor="#EAEAE5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox7" id="checkbox7" />
</span></td>
<td bgcolor="#EAEAE5" class="td">Cliente 2</td>
<td bgcolor="#EAEAE5" class="td">20k</td>
<td align="center" bgcolor="#EAEAE5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox7" id="checkbox7" />
</span></td>
<td bgcolor="#EAEAE5" class="td">Cliente 7</td>
<td bgcolor="#EAEAE5" class="td">20k</td>
</tr>
<tr>
<td height="20" align="center" valign="middle" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox8" id="checkbox8" />
</span></td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 3</td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">1500k</td>
<td align="center" valign="middle" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox8" id="checkbox8" />
</span></td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 8</td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">1500k</td>
</tr>
<tr>
<td align="center" bgcolor="#EAEAE5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox9" id="checkbox9" />
</span></td>
<td bgcolor="#EAEAE5" class="td">Cliente 4</td>
<td bgcolor="#EAEAE5" class="td">250k</td>
<td align="center" bgcolor="#EAEAE5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox9" id="checkbox9" />
</span></td>
<td bgcolor="#EAEAE5" class="td">Cliente 9</td>
<td bgcolor="#EAEAE5" class="td">250k</td>
</tr>
<tr>
<td height="20" align="center" valign="middle" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox10" id="checkbox10" />
</span></td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 5</td>
<td height="20" align="left" valign="middle" bgcolor="#F7F7F5" class="td">300k</td>
<td align="center" valign="middle" bgcolor="#F7F7F5" class="td"><span class="titulos">
<input type="checkbox" name="checkbox10" id="checkbox10" />
</span></td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">Cliente 10</td>
<td align="left" valign="middle" bgcolor="#F7F7F5" class="td">300k</td>
</tr>
</table>
<span class="titulos"><br />
Operador </span><br />
<br />
<table width="908" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms3">
<tr>
<td height="30" colspan="4" bgcolor="#A8D8EA" class="td"><span class="style1"></span>Por favor Seleccione al Operador</td>
</tr>
<tr>
<td width="258" rowspan="2" align="center" bgcolor="#EAEAE5" class="td"><input name="textfield4" type="text" id="textfield4" size="30" /></td>
<td width="266" height="35" bgcolor="#EAEAE5" class="td"><label>
<input type="radio" name="radio" id="radio3" value="radio" />
</label>
Nombre</td>
<td width="354" rowspan="2" align="center" bgcolor="#EAEAE5"><label>
<select name="select2" size="4" multiple="multiple" id="select2" style="height:65px; width:250px">
<option value="lista">Lista</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select>
</label></td>
</tr>
<tr>
<td height="35" bgcolor="#EAEAE5" class="td"><input type="radio" name="radio" id="radio4" value="radio" />
CUIT</td>
</tr>
</table>
<br />
<br />
<div align="right"><br />
<br />

<label>
<input type="checkbox" name="checkbox" id="checkbox" />
</label>
Imprimir Manifiesto
<input type="checkbox" name="checkbox2" id="checkbox2" />
Comprobante

<a href="form3.html">
<img  style="padding-left:20px" src="/imagenes/boton_finalizar.gif" width="91" height="30" border="0" align="absmiddle" /></a></div>
</div>
</div>
</body>
</html>


