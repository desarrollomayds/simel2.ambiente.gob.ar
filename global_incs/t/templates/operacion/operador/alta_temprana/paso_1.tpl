<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Inicio</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
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
		<div id="ingreso"><div id="logo"><div id="logo" style="width: 450px;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
		<br /><br /><br />
		<div id="apDiv1">Inicio de alta temprana<br /></div>
		<div id="contenido-ingreso">
			<span class="titulos"><br /><br />Por favor, Ingrese los datos	:<br /></span>
			<br />
			<form id="form_paso_1" method="post" action="paso_1.php">
				<input type='hidden' name='form_auth_key' value='{$FORM_AUTH_KEY}'>
				<div style=" background-color:#EAEAE5; padding:5px">
					<table width="400" border="0" cellspacing="0" cellpadding="5">
						<tr>
							<td width="136" height="25" align="right" bordercolor="#EAEAE5">Cuit :</td>
							<td width="244" bordercolor="#EAEAE5"><label><input name="cuit" type="text" id="cuit" size="30" value="{$CUIT}" maxlength="11"/></label></td>
						</tr>
						<tr><td>&nbsp;</td>
							<td align="center"><img class='img_captcha' src='/registracion/captcha.php'></td>
						</tr>
						<tr><td>&nbsp;</td>
							<td><input name="captcha" type="text" id="captcha" size="30"/></td>
						</tr>

						<tr id='sumario_errores_paso_1' class='invisible'>
							<td colspan="2" align="left" color="red"></td>
						</tr>

					</table>
				</div>
				<div align="right">
					<br />
					<span class="titulos"><a id='btn_submit'><img src="/imagenes/boton_siguiente.gif" width="91" height="30" border="0" /></a><br /></span>
				</div>
			</form>
		</div>
	</body>
</html>
{literal}
<script>
	$(function(){
		//filtros
		$('#cuit').filter_input({regex:'[0-9]'});

		//eventos
		$('#cuit').keypress(function(e) {
			if(e.charCode == 13)
				$('#btn_submit').click();
		})

		$('#captcha').keypress(function(e) {
			if(e.charCode == 13)
				$('#btn_submit').click();
		})

		$('#btn_submit').click(function() {
			var campos  = [	'cuit', 'captcha'];

			$.ajax({
				type: "POST",
				url: "/operacion/operador/alta_temprana/paso_1.php",
				data:	{	cuit    : $("#cuit").val(),
							captcha : $("#captcha").val()
						},
				dataType: "text json",
				success: function(retorno){
											if(retorno['estado'] == 0){
												window.location.replace(retorno['siguiente']);
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

													if(texto_errores != ''){
														$('#sumario_errores_paso_1 td:first').html(texto_errores);
														$('#sumario_errores_paso_1').show();
														;
													}else{
														$('#sumario_errores_paso_1').hide();
													}
												}
											}
										  }
			 });
		})

	});
</script>
{/literal}
