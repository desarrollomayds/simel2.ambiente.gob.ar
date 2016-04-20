<html>
	<head>
		<title>Detalle de registraci&oacute;n</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script type="text/javascript" src="/javascript/jquery.print_element.js"></script>
		<script type="text/javascript" src="/javascript/jquery.datepicker_localization.js"></script>

		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
		<link   rel="stylesheet"       href="/css/interior.css"         type="text/css" />

		<script type="text/javascript">

			function centerPopup(divId){
				var oDiv = $('#'+ divId);

				//var divHeight = oDiv.outerHeight(true);
				//var divWidth  = oDiv.outerWidth(true);
				var divHeight = oDiv.outerHeight();
				var divWidth  = oDiv.outerWidth();
				var windowHeight = $(window).height();
				var windowWidth =  $(window).width();

				oDiv.css({
					'left':  (windowWidth  - divWidth) /2  + $(window).scrollLeft() + 'px',
					'top':   (windowHeight - divHeight) /2 + $(window).scrollTop()  + 'px'
				});

				expand2Window();
			}
			function expand2Window(){

				var myBody = $(window);
				$('#bigscreen').show();
				$('#bigscreen').height( myBody.height() );
				$('#bigscreen').width(  myBody.width() );
				$('#bigscreen').css({
					'top': $(window).scrollTop()  + 'px'
				});

			}

			$(window).resize(function() {
			    if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
				}

			});
			$(window).scroll(function() {
			     if($('#bigscreen').css("display")=="block"){
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
			     }
			});

            function cerrar(){
	      $('#bigscreen').css("display","none");
                   $('#div_popup').css("display","none");
                   $('#div_popup_2').css("display","none");
	           $('#div_popup_3').css("display","none");


	}
              function cerraruno(){
	      $('#bigscreen').css("display","none");

	}





        </script>


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
<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>


	<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 135px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div><div id="apDiv1">Detalle de registraci&oacute;n<br /></div>
			<div id="contenido-form"><br />

			<br><br><br>
			<div id="menu-solapas">
{if $USUARIO.ROL == 1}
				<div class="tabnueva" style="width:210px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-right:5px;">	<a href="/operacion/listado.php">Registraciones Pendientes</a></div>
{elseif $USUARIO.ROL == 2}
				<div class="tabnueva" style="width:210px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; "><a href="/operacion/listado.php">Registraciones Pendientes</a></div>
				<div style="width: 20px;"></div>
				<div class="tabnueva" style="width:180px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/manifiestos_pendientes.php">Manifiestos Pendientes</a></div>
				<div style="width: 20px;"></div>
				<div class="tabnueva" style="width:110px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/empresas_habilitadas.php">Empresas</a></div>
				<div style="width: 20px;"></div>
				<div class="tabnueva" style="width:110px; height:20px; background-color:#1F99CD; padding-top:10px; float:left; margin-left: 20px;"> <a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
{elseif $USUARIO.ROL == 0}
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_usuarios.php">Usuarios</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/listado_roles.php">Roles</a></div>

				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/reportes.php">Reportes</a></div>
				<div class="tabnueva" style="width:90px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-left: 20px;"><a href="/operacion/bandeja_de_entrada.php">Mensajes</a></div>
{/if}
			</div>


			<div style="height:2px; background-color:#5D9E00"></div>
			<br>
				<span class="titulos"><br /></span>
				<!--<div align="right">
					<a href='/operacion/listado.php'><img width="91" height="30" border="0" src="/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/rechazar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_rechazar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/aceptar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_aceptar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a class='btn_imprimir' href='#'><img width="91" height="30" border="0" src="/imagenes/boton_imprimir.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>
				</div>-->
				<br>

				<div align='center'>
					<div style=" background-color:#EAEAE5; padding:5px"> <span style=" padding-left:10px"><br />
						<strong>Empresa Creadora : </strong>{$MANIFIESTO.CREADOR.NOMBRE_EMPRESA}<br />
						<strong>Fecha de Creaci&oacute;n: </strong>{$MANIFIESTO.FECHA_CREACION}</span><br />
						<br />
					</div>

					<br /><span id="titulos">Generadores<br /></span><br />

					<table width="500" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_generadores">
						<tr>
							<td width="100" bgcolor="#A8D8EA" class="td">Nombre</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
						</tr>

						{foreach $GENERADORES as $GENERADOR}
							{if $GENERADOR@iteration is even by 1}
								{assign var="COLOR_LINEA" value="#EAEAE5"}
							{else}
								{assign var="COLOR_LINEA" value="#F7F7F5"}
							{/if}
						<tr>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.NOMBRE_EMPRESA}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CUIT}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CAA_NUMERO} - {$GENERADOR.CAA_VENCIMIENTO}</td>
						</tr>
						{/foreach}
					</table>

					<br /><span id="titulos">Transportistas<br /></span><br />

					<table width="500" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_transportistas">
						<tr>
							<td width="100" bgcolor="#A8D8EA" class="td">Nombre</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
						</tr>

						{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
							{if $TRANSPORTISTA@iteration is even by 1}
								{assign var="COLOR_LINEA" value="#EAEAE5"}
							{else}
								{assign var="COLOR_LINEA" value="#F7F7F5"}
							{/if}
						<tr>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.NOMBRE_EMPRESA}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CUIT}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
						</tr>
						{/foreach}
					</table>

					<br /><span id="titulos">Operadores<br /></span><br />

					<table width="500" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_operadores">
						<tr>
							<td width="100" bgcolor="#A8D8EA" class="td">Nombre</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
							<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
						</tr>

						{foreach $OPERADORES as $OPERADOR}
							{if $OPERADOR@iteration is even by 1}
								{assign var="COLOR_LINEA" value="#EAEAE5"}
							{else}
								{assign var="COLOR_LINEA" value="#F7F7F5"}
							{/if}
						<tr>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.NOMBRE_EMPRESA}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CUIT}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
						</tr>
						{/foreach}
					</table>


					<br /><span id="titulos">Residuos<br /></span><br />

					<table width="500" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuos">
						<tr>
							<td width="80" bgcolor="#A8D8EA" class="td">Tipo Cont.</td>
							<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Cont.</td>
							<td width="80" bgcolor="#A8D8EA" class="td">Residuo</td>
							<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Est.</td>
							<td width="80" bgcolor="#A8D8EA" class="td">Unidad</td>
							<td width="80" bgcolor="#A8D8EA" class="td">Estado</td>
						</tr>

						{foreach $RESIDUOS as $RESIDUO}
							{if $RESIDUO@iteration is even by 1}
								{assign var="COLOR_LINEA" value="#EAEAE5"}
							{else}
								{assign var="COLOR_LINEA" value="#F7F7F5"}
							{/if}
						<tr>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CONTENEDOR_}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.RESIDUO}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.UNIDAD_}</td>
							<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.ESTADO_}</td>
						</tr>
						{/foreach}
					</table>
				</div>

				<br>
				<br>

				<div align="right">
					<a href='/operacion/manifiestos_pendientes.php'><img width="91" height="30" border="0" src="/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/rechazar_manifiesto.php?id={$MANIFIESTO.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_rechazar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/aceptar_manifiesto.php?id={$MANIFIESTO.ID}'><img width="91" height="30" border="0" src="/imagenes/boton_aceptar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
				</div>
			</div>
		</div>
	</body>
</html>
