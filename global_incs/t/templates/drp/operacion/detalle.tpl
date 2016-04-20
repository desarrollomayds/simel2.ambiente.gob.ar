<html>

<head>
	<title>Detalle de registraci&oacute;n</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery-ui.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/epoch_classes.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.filter_input.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.print_element.js"></script>
	<script type="text/javascript" src="{$BASE_PATH}/javascript/jquery.datepicker_localization.js"></script>
	<script src="http://maps.google.com/maps?language=es&hl=es&file=api&v=2.95&key={$GOOGLE_MAPS_KEY}" type="text/javascript" charset="ISO-8859-1" id="scriptlento"></script>

	<link rel="stylesheet" href="{$BASE_PATH}/css/epoch_styles.css" type="text/css" />
	<link rel="stylesheet" href="{$BASE_PATH}/css/jquery-ui.css" type="text/css" title="ui-theme" />
	<link rel="stylesheet" href="{$BASE_PATH}/css/formularios.css" type="text/css" />
	<link rel="stylesheet" href="{$BASE_PATH}/css/general.css" type="text/css" />
	<link rel="stylesheet" href="{$BASE_PATH}/css/interior.css" type="text/css" />


	<script type="text/javascript">
		function centerPopup(divId) {
			var oDiv = $('#' + divId);

			//var divHeight = oDiv.outerHeight(true);
			//var divWidth  = oDiv.outerWidth(true);
			var divHeight = oDiv.outerHeight();
			var divWidth = oDiv.outerWidth();
			var windowHeight = $(window).height();
			var windowWidth = $(window).width();

			oDiv.css({
				'left': (windowWidth - divWidth) / 2 + $(window).scrollLeft() + 'px',
				'top': (windowHeight - divHeight) / 2 + $(window).scrollTop() + 'px'
			});

			expand2Window();
		}

		function expand2Window() {

			var myBody = $(window);
			$('#bigscreen').show();
			$('#bigscreen').height(myBody.height());
			$('#bigscreen').width(myBody.width());
			$('#bigscreen').css({
				'top': $(window).scrollTop() + 'px'
			});

		}

		$(window).resize(function() {
			if ($('#bigscreen').css("display") == "block") {
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
			}

		});
		$(window).scroll(function() {
			if ($('#bigscreen').css("display") == "block") {
				centerPopup('div_popup');
				centerPopup('div_popup_2');
				centerPopup('div_popup_3');
				expand2Window();
			}
		});

		function cerrar() {
			$('#bigscreen').css("display", "none");
			$('#div_popup').css("display", "none");
			$('#div_popup_2').css("display", "none");
			$('#div_popup_3').css("display", "none");


		}

		function cerraruno() {
			$('#bigscreen').css("display", "none");

		}
	</script>


	{literal}
	<style type="text/css">
		<!-- #apDiv1 {
			position: relative;
			left: 415px;
			top: 44px;
			width: 378px;
			height: 53px;
			z-index: 1;
			background-image: url({/literal}{$BASE_PATH}{literal}/imagenes/cabecera_formulario.gif);
			background-repeat: no-repeat;
			padding-top: 30px;
			padding-left: 30px;
			font-family: Arial, Helvetica, sans-serif;
			font-size: 16px;
			color: #FFFFFF;
			text-align: left;
		}

		.style1 {
			color: #A8D8EA
		}

		-->
	</style>
	{/literal}
	<link rel="stylesheet" href="{$BASE_PATH}/css/new.css" type="text/css" />
	<!--[if IE]>
		<link   rel="stylesheet"       href="/css/otro.css"     type="text/css" />
<!--[else]>
<![endif]-->
</head>

<body>
	<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>
	<div id="login-top" align="center">
		<div style="width:950px" align="right">
			<strong>Centro de Ayuda</strong> |<a style="color:white;" href="../compartido/mi_cuenta.php">  Mi cuenta </a>|<a style="color:white;" href="../login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
	</div>

	<div id="contenedor-form">
		{include file='general/logos.tpl'}

		<div style="height: 0px;width: 100%;clear:both;"></div>
		<div id="apDiv1">DRP
			<br />
		</div>
		<div id="contenido-form">
			<br />

			<br>
			<br>
			<br>
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
				<div class="tabnueva" style="width:150px; height:20px; background-color:#1F99CD; padding-top:10px; float:left;margin-right:5px;"> <a href="/operacion/listado.php">Registraciones Pendientes</a></div>
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



			<br>
				<span class="titulos"><br /></span>
				{if $FLAG_EMPRESA_ACTIVA}
				<div align="center" width='100%'><b><font color='red'>La empresa postulante ya posee una cuenta habilitada, para hacer cambios a sus establecimientos usar el menu "mi cuenta", esta postulacion solo podra ser rechazada.</font></b></div>
				{/if}

				<br>

				<div>
					<table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px">
						<tr>
							<td width="760" height="30" bgcolor="#A8D8EA" style="font-size:12px;">DATOS DE LA EMPRESA</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$EMPRESA.CUIT}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Roles : </strong>
								{if $EMPRESA.ROLES.GENERADOR}
								Generador
								{/if}
								{if $EMPRESA.ROLES.TRANSPORTISTA}
								Transportista
								{/if}
								{if $EMPRESA.ROLES.OPERADOR}
								Operador
								{/if}
							</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$EMPRESA.NOMBRE}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Fec. Ini. Act : </strong>{$EMPRESA.FECHA_INICIO_ACT}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio real</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_R}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_R_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_R_}</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio legal</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_L}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_L_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_L_}</td>
						</tr>

						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong></td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$EMPRESA.CALLE_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$EMPRESA.PISO_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Oficina : </strong>{$EMPRESA.OFICINA_C}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_C_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$EMPRESA.LOCALIDAD_C_}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero Telef&oacute;nico : </strong>{$EMPRESA.NUMERO_TELEFONICO}</td>
						</tr>
						<tr>
							<td height="20" bgcolor="#EAEAE5"><strong>Direcci&oacute;n de Email: </strong>{$EMPRESA.DIRECCION_EMAIL}</td>
						</tr>
					</table>
					<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
						<tr>
							<td align="right" style='width:100%'>&nbsp;</td>
                                                        <td align="right"><div  class="ui-el-minibutton hand florBoton" name="btn_editar_empresa" style="font-size: 10px;" id="btn_editar_empresa" data-id="{$EMPRESA.ID}">Editar informac&iacute;on</div></td>
						</tr>
					</table>
				</div>
				<br>
				<br>

				{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
					<div>
						<table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms"  style="font-size: 13px">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">REPRESENTANTE LEGAL</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
						</table>

						<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
							<tr>
								<td align="right" style='width:100%'>&nbsp;</td>
								<td align="right"><div class="btn_eliminar_representante_legal hand ui-el-minibutton florBotonNeg"  style="font-size: 10px;font-weight: bold;">Eliminar Representante</div></td>
                                                                <td align="right"><div class="btn_editar_representante_legal hand ui-el-minibutton  florBoton" style="margin-left: 5px;font-size: 10px;font-weight: bold;" data-id="{$REPRESENTANTE.ID}">Editar informaci&oacute;n</div></td>
							</tr>
						</table>
					</div>
				<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
					<div>
                        <table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size:13px;">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">REPRESENTANTE TECNICO</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cargo : </strong>{$REPRESENTANTE.CARGO}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
						</table>
						<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
							<tr>
								<td align="right" style='width:100%'>&nbsp;</td>
								<td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;" class="btn_eliminar_representante_tecnico ui-el-minibutton hand florBotonNeg">Eliminar representante</div></td>
                                                                <td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;" class="btn_editar_representante_tecnico ui-el-minibutton hand  florBoton" data-id="{$REPRESENTANTE.ID}">Editar informaci&oacute;n</div></td>
							</tr>
						</table>
					</div>
<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					<div>
						<table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px;">
							<tr><td width="760" height="30" bgcolor="#A8D8EA">ESTABLECIMIENTO</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Actividad : </strong>{$ESTABLECIMIENTO.ACTIVIDAD_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong>{$ESTABLECIMIENTO.DESCRIPCION}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio real</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_R}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong></td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_C}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Nomenclatura Catastral : </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL}</td></tr>
							<tr><td height="20" bgcolor="#EAEAE5"><strong>Habilitaciones : </strong>{$ESTABLECIMIENTO.HABILITACIONES}</td></tr>
						</table>
						<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
							<tr>
								<td align="right" style='width:100%'>&nbsp;</td>
								<td align="right"><div  style="margin-left: 5px;font-size: 10px;font-weight: bold;" class="btn_eliminar_establecimiento ui-el-minibutton hand florBotonNeg">Eliminar establecimiento</div></td>
                                                                <td align="right"><div  style="margin-left: 5px;font-size: 10px;font-weight: bold;" class="btn_editar_establecimiento ui-el-minibutton hand  florBoton" data-id="{$ESTABLECIMIENTO.ID}">Editar informaci&oacute;n</div></td>
							</tr>
						</table>
					</div>
<br>
				<br>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
						<div style='margin-bottom: 10px'>
                            <table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size:13px;">
								<tr><td width="760" height="30" bgcolor="#A8D8EA">PERMISO DE GENERACION/ OPERACION</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
							</table>
							<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
								<tr>
									<td align="right" style='width:100%'>&nbsp;</td>
									<td align="right"><div  style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_eliminar_permiso_establecimiento ui-el-minibutton hand florBotonNeg">Eliminar permiso</div></td>
									<td align="right"><div  style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_editar_permiso_establecimiento ui-el-minibutton hand  florBoton" data-id-permiso="{$PERMISO.ID}" data-id-establecimiento="{$ESTABLECIMIENTO.ID}" >Editar permiso</div></td>
								</tr>
							</table>
						</div>
<br>
				<br>
					{/foreach}
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						<div>
							<input type='hidden' id='id' value='{$VEHICULO.ID}'>
                                                        <table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px;">
								<tr><td width="760" height="30" bgcolor="#A8D8EA">VEHICULO REGISTRADO</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento  : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Dominio : </strong>{$VEHICULO.DOMINIO}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n  : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
								<tr><td height="20" bgcolor="#EAEAE5"><strong>Credencial  : </strong>{$VEHICULO.CREDENCIAL_NUMERO} - {$VEHICULO.CREDENCIAL_SERIE}</td></tr>
							</table>
							<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
								<tr>
									<td align="right" style='width:100%'>&nbsp;</td>
									<td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_eliminar_vehiculo ui-el-minibutton hand florBotonNeg" value="">Eliminar vehiculo</div></td>
                                                                        <td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_editar_vehiculo ui-el-minibutton hand  florBoton" data-id="{$EMPRESA.ID}">Editar informaci&oacute;n</div></td>
								</tr>
							</table>
						</div>
<br>
				<br>
					{/foreach}
				{/foreach}



				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						{foreach $VEHICULO.PERMISOS as $PERMISO}
							<div>
								<input type='hidden' id='id_vehiculo' value='{$VEHICULO.ID}'>
								<input type='hidden' id='id_permiso' value='{$PERMISO.ID}'>
                                                                <table width="870" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms" style="font-size: 13px;">
									<tr><td width="760" height="30" bgcolor="#A8D8EA">PERMISO DE TRASLADO</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Veh&iacute;culo : </strong>{$VEHICULO.DOMINIO}</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
									<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
								</table>
								<table width="870" border="0" cellpadding="0" cellspacing="0" style="margin-top: 35px;">
									<tr>
										<td align="right" style='width:100%'>&nbsp;</td>
										<td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_eliminar_permiso_vehiculo ui-el-minibutton hand florBotonNeg" >Eliminar permiso</div></td>
										<td align="right"><div style="margin-left: 5px;font-size: 10px;font-weight: bold;"  class="btn_editar_permiso_vehiculo ui-el-minibutton hand  florBoton" data-id="{$EMPRESA.ID}">Editar permiso</div></td>
									</tr>
								</table>
							</div>
<br>
				<br>
						{/foreach}
					{/foreach}
				{/foreach}


				<div align='right' style='margin-bottom: 20px'>
					<div style="width: 155px;margin-left: 5px;float: left;font-size: 10px;font-weight: bold;" class="btn_agregar_representante_legal ui-el-minibutton hand  florBoton" >Agregar representante legal</div>
					<div style="width: 165px;margin-left: 15px;float: left;font-size: 10px;font-weight: bold;" class="btn_agregar_representante_tecnico ui-el-minibutton hand  florBoton" >Agregar representante tecnico</div>
					<div style="width: 125px;margin-left: 15px;float: left;font-size: 10px;font-weight: bold;" class="btn_agregar_vehiculo ui-el-minibutton hand  florBoton"  >Agregar veh&iacute;culo</div>
					<div style="width: 145px;margin-left: 15px;float: left;font-size: 10px;font-weight: bold;" class="btn_agregar_permiso_vehiculo ui-el-minibutton hand  florBoton" >Agregar permiso veh&iacute;culo</div>
					<div style="width: 165px;margin-left: 15px;float: left;font-size: 10px;font-weight: bold;" class="btn_agregar_establecimiento ui-el-minibutton hand  florBoton" >Agregar establecimiento</div>
					 <div class="clear20"></div>
                                        <div style="width: 165px;margin-left: 5px;float: right;font-size: 10px;font-weight: bold;" class="btn_agregar_permiso_establecimiento ui-el-minibutton hand  florBoton">Agregar permiso establecimiento</div>
				</div>
                                <div class="clear20"></div>
				<div align="right">
					<a href='/operacion/listado.php'><img width="91" height="30" border="0" src="{$BASE_PATH}/imagenes/boton_anterior.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					<a href='/operacion/rechazar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="{$BASE_PATH}/imagenes/boton_rechazar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					{if !$FLAG_EMPRESA_ACTIVA}
					<a href='/operacion/aceptar.php?id={$EMPRESA.ID}'><img width="91" height="30" border="0" src="{$BASE_PATH}/imagenes/boton_aceptar.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>&nbsp;&nbsp;
					{/if}
					<a class='btn_imprimir' href='#'><img width="91" height="30" border="0" src="{$BASE_PATH}/imagenes/boton_imprimir.gif" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"/></a>
				</div>
			</div>
		</div>

		<div id='div_popup' class='invisible'></div>
		<div id="div_impresion" class="invisible" width="100%"></div>
	</body>

	{if !$FLAG_EMPRESA_ACTIVA}
	{literal}
	<script>
		$(document).ready(function(){
			var registro_actual;

			$('#btn_editar_empresa').click(function() {
				registro_actual = $(this).attr("data-id");
				console.log(registro_actual);

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_empresa.php",
				   data: {id : registro_actual},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			//permisos establecimiento
			$('.btn_eliminar_permiso_establecimiento').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_permiso_establecimiento.php",
				   data: { accion : 'baja', id : registro_actual.find('#id_permiso').val() },
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													location.reload();
												}else{
													alert(retorno['general']);
												}
				   }
				 });
			});

			$('.btn_editar_permiso_establecimiento').live('click', function() {
				id_permiso = $(this).attr("data-id-permiso");
				id_establecimiento = $(this).attr("data-id-establecimiento");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_permiso_establecimiento.php",
				   data: {
					   id_permiso : id_permiso,
					   id_establecimiento : id_establecimiento },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			$('.btn_agregar_permiso_establecimiento').live('click', function() {
				registro_actual = $(this).attr("data-id");
				console.log(registro_actual);

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_permiso_establecimiento.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//permisos establecimiento

			//permisos vehiculo
			$('.btn_eliminar_permiso_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_permiso_vehiculo.php",
				   data: { accion : 'baja', id : registro_actual.find('#id_permiso').val() },
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													location.reload();
												}else{
													alert(retorno['general']);
												}
				   }
				 });
			});

			$('.btn_editar_permiso_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_permiso_vehiculo.php",
				   data: { id_permiso : registro_actual.find('#id_permiso').val(), id_vehiculo : registro_actual.find('#id_vehiculo').val() },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			$('.btn_agregar_permiso_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_permiso_vehiculo.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//permisos vehiculo

			//establecimiento
			$('.btn_agregar_establecimiento').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_establecimiento.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			$('.btn_eliminar_establecimiento').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_establecimiento.php",
				   data: {accion : 'baja', id : registro_actual.find('#id').val()},
				   dataType: "text json",
				   success: function(retorno){
											if(retorno['estado'] == 0){
												location.reload();
											}else{
												alert(retorno['general']);
											}
				   }
				 });
			});

			$('.btn_editar_establecimiento').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_establecimiento.php",
				   data: {id : registro_actual},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//establecimiento

			//representante legal
			$('.btn_agregar_representante_legal').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_representante_legal.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			$('.btn_eliminar_representante_legal').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_representante_legal.php",
				   data: {accion : 'baja', id : registro_actual.find('#id').val()},
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													location.reload();
												}else{
													alert(retorno['general']);
												}
				   }
				 });
			});

			$('.btn_editar_representante_legal').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_representante_legal.php",
				   data: {id : registro_actual},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//representante legal

			//representante tecnico
			$('.btn_agregar_representante_tecnico').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_representante_tecnico.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});

			$('.btn_eliminar_representante_tecnico').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_representante_tecnico.php",
				   data: {accion : 'baja', id : registro_actual.find('#id').val()},
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													location.reload();
												}else{
													alert(retorno['general']);
												}
				   }
				 });
			});

			$('.btn_editar_representante_tecnico').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_representante_tecnico.php",
				   data: {id : registro_actual},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//representante tecnico

			//vehiculo

			$('.btn_agregar_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/agregar_vehiculo.php",
				   data: {id : {/literal}{$EMPRESA.ID}{literal}},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			$('.btn_eliminar_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "POST",
				   url: "/operacion/editar_vehiculo.php",
				   data: {accion : 'baja', id : registro_actual.find('#id').val()},
				   dataType: "text json",
				   success: function(retorno){
												if(retorno['estado'] == 0){
													location.reload();
												}else{
													alert(retorno['general']);
												}
				   }
				 });
			});

			$('.btn_editar_vehiculo').live('click', function() {
				registro_actual = $(this).attr("data-id");

				$.ajax({
				   type: "GET",
				   url: "/operacion/editar_vehiculo.php",
				   data: {id : registro_actual.find('#id').val()},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			});
			//vehiculo


			$('.btn_imprimir').live('click', function() {
				$.ajax({
				   type: "GET",
				   url: "/operacion/imprimir.php",
				   data: { id : {/literal}{$EMPRESA.ID}{literal} },
				   dataType: "html",
				   success: function(msg){
					$('#div_impresion').html(msg);
					$('#div_impresion').printElement();
				   }
				 });
			})
		});
	</script>
	{/literal}
	{/if}
</html>
