<html>
	<head>
		<title>registraci&oacute;n - paso 2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/epoch_classes.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<script src="http://maps.google.com/maps?language=es&hl=es&file=api&v=2.95&key={$GOOGLE_MAPS_KEY}" type="text/javascript" charset="ISO-8859-1" id="scriptlento"></script>

	        <link   rel="stylesheet"       href="/css/epoch_styles.css"    type="text/css" />
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />
        <link   rel="stylesheet"       href="/css/interior.css"        type="text/css" />

<!--[if IE]>
		<link   rel="stylesheet"       href="/css/formularios2.css"     type="text/css" />
<!--[else]>
<![endif]-->

		{literal}
		<script type="text/javascript">
			function centerPopup(divId){
				var oDiv = $('#'+ divId);
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


         function otro(){
             $('#bigscreen').css("display","none");
         }
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
		{/literal}
	</head>
	<body style="text-align: center;" >
        <div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

	<div id="contenedor-form" style="margin-top: 20px;">
       <div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 35px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
            <div style="clear: both;">
                <div id="apDiv1" style="top:15px;">Formulario - Paso 2<br /></div>
                    </div>
       <div id="contenido-form" style="margin-top: -19px;">

			<form id='form_datos_empresa' action='paso_2.php' method='POST'>
				<div class="titulos" style="text-align: left;">  LA EMPRESA TIENE EXPEDIENTE DE: </div><br /><br />

				<div id='roles' style="text-align: left;">
                                   <b>Elija la opci&oacute;n que corresponde a su empresa:</b>
					<input type='checkbox' name='rol_generador'     id='rol_generador'     value='1' {if $EMPRESA.ROLES.GENERADOR     == 1}checked{/if}> Generador
					<input type='checkbox' name='rol_transportista' id='rol_transportista' value='1' {if $EMPRESA.ROLES.TRANSPORTISTA == 1}checked{/if}> Transportista
					<input type='checkbox' name='rol_operador'      id='rol_operador'      value='1' {if $EMPRESA.ROLES.OPERADOR      == 1}checked{/if}> Operador
				</div>
				<br /><br />

				<div class="titulos" style="color:black; text-align: left;width:750px;background-color:#4D90FE;padding:10px ">DATOS DE LA EMPRESA</div>

				<div style=" background-color:#EAEAE5; padding:5px">
					<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n Social:</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='nombre' id='nombre' value='{$EMPRESA.NOMBRE}' size='35'/></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio de actividades :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='fecha_inicio_act' id='fecha_inicio_act' value='{$EMPRESA.FECHA_INICIO_ACT}' size='35' class='{if $ERRORES.FECHA_INICIO_ACT}error_de_carga{/if}' readonly="true"><input type='button' value='...' id='btn_cal_fecha_inicio_act'></td>
						</tr>

						<tr>
							<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO REAL</td>
							<td></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_r' id='calle_r' value='{$EMPRESA.CALLE_R}' size='35' class='{if $ERRORES.CALLE_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_r' id='numero_r' value='{$EMPRESA.NUMERO_R}' size='35' class='{if $ERRORES.NUMERO_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_r' id='piso_r' value='{$EMPRESA.PISO_R}' size='35' class='{if $ERRORES.PISO_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_r' id='oficina_r' value='{$EMPRESA.OFICINA_R}' size='35' class='{if $ERRORES.OFICINA_R}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='provincia_r' id='provincia_r'  class='{if $ERRORES.PROVINCIA_R}error_de_carga{/if}'>
									{foreach $PROVINCIAS as $PROVINCIA}
										<option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_R == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='localidad_r' id='localidad_r'  class='{if $ERRORES.LOCALIDAD_R}error_de_carga{/if}'>
									{foreach $LOCALIDADES as $LOCALIDAD}
										<option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_R == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;"  class="titulos"></td>
							<td>
								<!--<input type="button"  class="ui-el-minibutton" id="btn_activar_mapa_r" value="UBICAR EN MAPA">-->
								<input type="text" name="latitud_r"  id="latitud_r"  value="{$EMPRESA.LATITUD_R}"  readonly='true'>
								<input type="text" name="longitud_r" id="longitud_r" value="{$EMPRESA.LONGITUD_R}" readonly='true'>
								<div id="map" style="width: 300px; height: 300px"></div>
							</td>
						</tr>

						<tr>
							<td  align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO LEGAL</td>
							<td></td>
						</tr>

						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_l' id='calle_l' value='{$EMPRESA.CALLE_L}' size='35' class='{if $ERRORES.CALLE_L}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_l' id='numero_l' value='{$EMPRESA.NUMERO_L}' size='35' class='{if $ERRORES.NUMERO_L}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_l' id='piso_l' value='{$EMPRESA.PISO_L}' size='35' class='{if $ERRORES.PISO_L}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_l' id='oficina_l' value='{$EMPRESA.OFICINA_L}' size='35' class='{if $ERRORES.OFICINA_L}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='provincia_l' id='provincia_l'  class='{if $ERRORES.PROVINCIA_L}error_de_carga{/if}'>
									{foreach $PROVINCIAS as $PROVINCIA}
										<option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_L == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='localidad_l' id='localidad_l' style="font-size: 11px;" class='{if $ERRORES.LOCALIDAD_L}error_de_carga{/if}'>
									{foreach $LOCALIDADES as $LOCALIDAD}
										<option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_L == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
									{/foreach}
								</select>
							</td>
						</tr>


						<tr>
							<td align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
                                                       <td></td>
						</tr>

						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Calle :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='calle_c' id='calle_c' value='{$EMPRESA.CALLE_C}' size='35' class='{if $ERRORES.CALLE_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero/ Kilometro :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_c' id='numero_c' value='{$EMPRESA.NUMERO_C}' size='35' class='{if $ERRORES.NUMERO_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Piso :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='piso_c' id='piso_c' value='{$EMPRESA.PISO_C}' size='35' class='{if $ERRORES.PISO_C}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Oficina :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='oficina_c' id='oficina_c' value='{$EMPRESA.OFICINA_C}' size='35' class='{if $ERRORES.OFICINA_C}error_de_carga{/if}'></td>
						</tr>
						<tr class='invisible'>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Provincia :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='__provincia_c' id='provincia_c'  class='{if $ERRORES.PROVINCIA_C}error_de_carga{/if}'>
									{foreach $PROVINCIAS as $PROVINCIA}
										<option style="font-size: 11px;" value='{$PROVINCIA.CODIGO}' {if $EMPRESA.PROVINCIA_C == $PROVINCIA.CODIGO}selected{/if}>{$PROVINCIA.DESCRIPCION}</option>
									{/foreach}
								</select>
							</td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Localidad :</td>
							<td width="450" bordercolor="#EAEAE5">
								<select style="font-size: 11px;" name='localidad_c' id='localidad_c'  class='{if $ERRORES.LOCALIDAD_C}error_de_carga{/if}'>
									{foreach $LOCALIDADES_C as $LOCALIDAD}
										<option style="font-size: 11px;" value='{$LOCALIDAD@key}' {if $EMPRESA.LOCALIDAD_C == $LOCALIDAD@key}selected{/if}>{$LOCALIDAD}</option>
									{/foreach}
								</select>
							</td>
						</tr>

						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero Telef&oacute;nico :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='numero_telefonico' id='numero_telefonico' value='{$EMPRESA.NUMERO_TELEFONICO}' size='35' class='txt {if $ERRORES.NUMERO_TELEFONICO}error_de_carga{/if}'></td>
						</tr>
						<tr>
							<td width="200" height="25" align="right" bordercolor="#EAEAE5">Direcci&oacute;n de Email :</td>
							<td width="450" bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email' value='{$EMPRESA.DIRECCION_EMAIL}' size='35' class='txt {if $ERRORES.DIRECCION_EMAIL}error_de_carga{/if}'></td>
						</tr>

						<tr id='sumario_errores_paso_2' class='invisible'>
							<td colspan="2" align="left" color="red"></td>
						</tr>

						{if $ERRORES.ROLES             or $ERRORES.NOMBRE           or $ERRORES.FECHA_INICIO_ACT or
							$ERRORES.CALLE             or $ERRORES.NUMERO           or $ERRORES.PISO             or $ERRORES.OFICINA          or
							$ERRORES.PROVINCIA         or $ERRORES.LOCALIDAD        or
							$ERRORES.NUMERO_TELEFONICO or $ERRORES.DIRECCION_EMAIL  }
						<tr>
							<td colspan="2" align="left">
								{if $ERRORES.ROLES}{$ERRORES.ROLES}<br>{/if}
								{if $ERRORES.NOMBRE}{$ERRORES.NOMBRE}<br>{/if}
								{if $ERRORES.FECHA_INICIO_ACT}{$ERRORES.FECHA_INICIO_ACT}<br>{/if}
								{if $ERRORES.CALLE}{$ERRORES.CALLE}<br>{/if}
								{if $ERRORES.NUMERO}{$ERRORES.NUMERO}<br>{/if}
								{if $ERRORES.PISO}{$ERRORES.PISO}<br>{/if}
								{if $ERRORES.OFICINA}{$ERRORES.OFICINA}<br>{/if}
								{if $ERRORES.PROVINCIA}{$ERRORES.PROVINCIA}<br>{/if}
								{if $ERRORES.LOCALIDAD}{$ERRORES.LOCALIDAD}<br>{/if}
								{if $ERRORES.NUMERO_TELEFONICO}{$ERRORES.NUMERO_TELEFONICO}<br>{/if}
								{if $ERRORES.DIRECCION_EMAIL}{$ERRORES.DIRECCION_EMAIL}<br>{/if}
							</td>
						</tr>
						{/if}

					</table>
				</div>
			</form>

			<br /><br />

			<div class="titulos" style="text-align: left;">DATOS DE LOS RESPONSABLES LEGALES<div><br /><br />

			<table style="font-size: 12px;" width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_legales">
				<tr>
					<td bgcolor="#4D90FE" class="invisible">ID</td>
					<td width="120" bgcolor="#4D90FE" class="td">NOMBRE</td>
					<td width="120" bgcolor="#4D90FE" class="td">APELLIDO</td>
					<td width="220" bgcolor="#4D90FE" class="td">FECHA DE NACIMIENTO</td>
					<td width="120" bgcolor="#4D90FE" class="td">TIPO DOC.</td>
					<td width="150" bgcolor="#4D90FE" class="td">NRO DOC.</td>
					<td width="150" bgcolor="#4D90FE" class="td">CUIT</td>
					<td width="40" align="center" bgcolor="#4D90FE" class="td">EDITAR</td>
					<td width="40" align="center" bgcolor="#4D90FE">BORRAR</td>
				</tr>

				{foreach $REPRESENTANTES_LEGALES as $REPRESENTANTE}
					{if $REPRESENTANTE@iteration is even by 1}
						{assign var="COLOR_LINEA" value="#EAEAE5"}
					{else}
						{assign var="COLOR_LINEA" value="#F7F7F5"}
					{/if}
				<tr>
					<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$REPRESENTANTE.ID}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$REPRESENTANTE.NOMBRE}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="apellido">{$REPRESENTANTE.APELLIDO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="fecha_nacimiento">{$REPRESENTANTE.FECHA_NACIMIENTO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="tipo_doc">{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="nro_doc">{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$REPRESENTANTE.CUIT}</td>
					<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><div class='btn_editar_resp_legal'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/editar.png" width="24" height="22" /></div></td>
					<td align="center" bgcolor="{$COLOR_LINEA}"><div class='btn_borrar_resp_legal'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/borrar.png" width="24" height="22" /></div></td>
				</tr>
				{/foreach}
			</table>
			<table width="769" border="0" cellpadding="5" cellspacing="0" class="tabla">
				<tr>
					<td colspan="7" bgcolor="#EAEAE5"><div align="right"><img  class="hand" src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_resp_legal' /></div></td>
				</tr>
			</table>

			<br /><br />

			<div class="titulos" style="text-align: left;">DATOS DE LOS RESPONSABLES TECNICOS</div><br /><br />

			<table style="font-size: 11px;" width="769" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_resp_tecnicos">
				<tr>
					<td bgcolor="#4D90FE" class="invisible">ID</td>
					<td width="120" bgcolor="#4D90FE" class="td">NOMBRE</td>
					<td width="120" bgcolor="#4D90FE" class="td">APELLIDO</td>
					<td width="200" bgcolor="#4D90FE" class="td">FECHA DE NACIMIENTO</td>
					<td width="120" bgcolor="#4D90FE" class="td">TIPO DOC.</td>
					<td width="120" bgcolor="#4D90FE" class="td">NOR DOC.</td>
					<td width="120" bgcolor="#4D90FE" class="td">CARGO</td>
					<td width="120" bgcolor="#4D90FE" class="td">CUIT</td>
					<td width="40"  align="center" bgcolor="#4D90FE" class="td">EDITAR</td>
					<td width="40"  align="center" bgcolor="#4D90FE">BORRAR</td>
				</tr>

				{foreach $REPRESENTANTES_TECNICOS as $REPRESENTANTE}
					{if $REPRESENTANTE@iteration is even by 2}
						{assign var="COLOR_LINEA" value="#EAEAE5"}
					{else}
						{assign var="COLOR_LINEA" value="#F7F7F5"}
					{/if}
				<tr>
					<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$REPRESENTANTE.ID}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="nombre">{$REPRESENTANTE.NOMBRE}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="apellido">{$REPRESENTANTE.APELLIDO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="fecha_nacimiento">{$REPRESENTANTE.FECHA_NACIMIENTO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="tipo_doc">{$REPRESENTANTE.TIPO_DOCUMENTO_}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="nro_doc">{$REPRESENTANTE.NUMERO_DOCUMENTO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="cargo">{$REPRESENTANTE.CARGO}</td>
					<td bgcolor="{$COLOR_LINEA}" class="td" id="cuit">{$REPRESENTANTE.CUIT}</td>
					<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><div class='btn_editar_resp_tecnico'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/editar.png" width="24" height="22" /></div></td>
					<td align="center" bgcolor="{$COLOR_LINEA}"><div class='btn_borrar_resp_tecnico'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/borrar.png" width="24" height="22" /></div></td>
				</tr>
				{/foreach}
			</table>

			<table style="font-size: 11px;" width="769" border="0" cellpadding="5" cellspacing="0" class="tabla">
				<tr>
					<td colspan="7" bgcolor="#EAEAE5"><div align="right"><img class="hand" src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_resp_tecnico'/></div></td>
				</tr>
			</table>

			<div align="right"><br /><br />
				<a id='btn_anterior' href="paso_1.php"><img class="hand" src="/imagenes/boton_anterior.gif"  width="91" height="30" border="0" /></a>
				<a id='btn_siguiente' ><img class="hand" src="/imagenes/boton_siguiente.gif" width="91" height="30" border="0" /></a>
			</div>
		</div>


		<div id='div_popup' class='invisible'>
		</div>

		<div id='div_popup_2' class='invisible'>
		</div>

	</body>
	{literal}
	<script type="text/javascript">
		var fecha_inicio_act_instance = null;
		var registro_actual           = null;
		var colores                   = new Array();

		colores['#A8D8EA'] = '#F7F7F5';
		colores['#EAEAE5'] = '#F7F7F5';
		colores['#F7F7F5'] = '#EAEAE5';

		//representantes legales
		function modificar_representante_legal(representante){
			registro_actual.find('#nombre').html(representante['NOMBRE']);
			registro_actual.find('#apellido').html(representante['APELLIDO']);
			registro_actual.find('#fecha_nacimiento').html(representante['FECHA_NACIMIENTO']);
			registro_actual.find('#tipo_doc').html(representante['TIPO_DOCUMENTO_']);
			registro_actual.find('#nro_doc').html(representante['NUMERO_DOCUMENTO']);
			registro_actual.find('#cuit').html(representante['CUIT']);

			registro_actual = null;
		}

		function agregar_representante_legal(representante){

			color = colores[$('#lista_resp_legales> tbody:last').find("td:last").attr("bgcolor")];
			if(color == undefined)
				color = '#F7F7F5';

			datos = "\
			<tr>\
				<td bgcolor='" + color + "' class='invisible' id='id'>" + representante["ID"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='nombre'>" + representante["NOMBRE"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='apellido'>" + representante["APELLIDO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='fecha_nacimiento'>" + representante["FECHA_NACIMIENTO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='tipo_doc'>" + representante["TIPO_DOCUMENTO_"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='nro_doc'>" + representante["NUMERO_DOCUMENTO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='cuit'>" + representante["CUIT"] + "</td>\
				<td align='center' bgcolor='" + color + "' class='td'><div class='btn_editar_resp_legal'><img class='hand' style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/editar.png' width='24' height='22' /></div></td>\
				<td align='center' bgcolor='" + color + "' ><div class='btn_borrar_resp_legal'><img class='hand' style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/borrar.png' width='24' height='22' /></div></td>\
			</tr>";

			$('#lista_resp_legales> tbody:last').append(datos);
		}
		//representantes legales

		//representantes tecnicos
		function modificar_representante_tecnico(representante){
			registro_actual.find('#nombre').html(representante['NOMBRE']);
			registro_actual.find('#apellido').html(representante['APELLIDO']);
			registro_actual.find('#fecha_nacimiento').html(representante['FECHA_NACIMIENTO']);
			registro_actual.find('#tipo_doc').html(representante['TIPO_DOCUMENTO_']);
			registro_actual.find('#nro_doc').html(representante['NUMERO_DOCUMENTO']);
			registro_actual.find('#cargo').html(representante['CARGO']);
			registro_actual.find('#cuit').html(representante['CUIT']);

			registro_actual = null;
		}

		function agregar_representante_tecnico(representante){
			color = colores[$('#lista_resp_tecnicos> tbody:last').find("td:last").attr("bgcolor")];
			if(color == undefined)
				color = '#F7F7F5';

			datos = "\
			<tr>\
				<td bgcolor='" + color + "' class='invisible' id='id'>" + representante["ID"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='nombre'>" + representante["NOMBRE"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='apellido'>" + representante["APELLIDO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='fecha_nacimiento'>" + representante["FECHA_NACIMIENTO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='tipo_doc'>" + representante["TIPO_DOCUMENTO_"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='nro_doc'>" + representante["NUMERO_DOCUMENTO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='cargo'>" + representante["CARGO"] + "</td>\
				<td bgcolor='" + color + "' class='td' id='cuit'>" + representante["CUIT"] + "</td>\
				<td align='center' bgcolor='" + color + "' class='td'><div class='btn_editar_resp_tecnico'><img class='hand' style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/editar.png' width='24' height='22' /></div></td>\
				<td align='center' bgcolor='" + color + "' ><div class='btn_borrar_resp_tecnico'><img class='hand' style='text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;' src='/imagenes/borrar.png' width='24' height='22' /></div></td>\
			</tr>";

			$('#lista_resp_tecnicos> tbody:last').append(datos);
		}
		//representantes tecnicos

		//localidades
		function actualizar_localidades_r(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
				$('#localidad_r').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					console.log(codigo);
					$('#localidad_r').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				var opciones = $("#localidad_r option");

				opciones.sort(function(a,b) {
				    if (a.text > b.text) return 1;
				    else if (a.text < b.text) return -1;
				    else return 0
				})

				$("#localidad_r").empty().append( opciones );

				$('#localidad_r').val($('#localidad_r option:first').val());
			});
		}

		function actualizar_localidades_l(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_l").val()}, function(json){
				$('#localidad_l').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_l').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				var opciones = $("#localidad_l option");

				opciones.sort(function(a,b) {
				    if (a.text > b.text) return 1;
				    else if (a.text < b.text) return -1;
				    else return 0
				})

				$("#localidad_l").empty().append( opciones );

				$('#localidad_l').val($('#localidad_l option:first').val());
			});
		}

		function actualizar_localidades_c(){
			$.getJSON('/servicios/localidades.php', {provincia : $("#provincia_c").val()}, function(json){
				$('#localidad_c').find('option').remove();

				$.each(json, function(codigo, descripcion) {
					$('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
				});

				var opciones = $("#localidad_c option");

				opciones.sort(function(a,b) {
				    if (a.text > b.text) return 1;
				    else if (a.text < b.text) return -1;
				    else return 0
				})

				$("#localidad_c").empty().append( opciones );

				$('#localidad_c').val($('#localidad_c option:first').val());
			});
		}
		//localidades

		$(function(){
			//representantes legales
			$('.btn_borrar_resp_legal').live('click', function() {
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "POST",
				   url: "/registracion/responsable_legal.php",
				   data: {accion : "baja", id : registro_actual.find('#id').html()},
				   dataType: "text json",
				   success: function(retorno){
						if(retorno['estado'] != 0){
							alert(retorno['errores']['baja']);
						}else{
							registro_actual.remove();
						}
				   }
				 });
			});

			$('.btn_editar_resp_legal').live('click', function() {
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "GET",
				   url: "/registracion/responsable_legal.php?id=" + registro_actual.find('#id').html(),
				   dataType: "html",
				   success: function(msg){

					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');

				   }
				 });
			});

			$('#btn_agregar_resp_legal').click(function() {

				$.ajax({
				   type: "GET",
				   url: "/registracion/responsable_legal.php",
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
					centerPopup('div_popup');
				   }
				 });
			})
			//representantes legales




			//representantes tecnicos
			$('.btn_borrar_resp_tecnico').live('click', function() {
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "POST",
				   url: "/registracion/responsable_tecnico.php",
				   data: {accion : "baja", id : registro_actual.find('#id').html()},
				   dataType: "text json",
				   success: function(retorno){
						if(retorno['estado'] != 0){
							alert(retorno['errores']['baja']);
						}else{
							registro_actual.remove();
						}
				   }
				 });
			});

			$('.btn_editar_resp_tecnico').live('click', function() {
				registro_actual = $(this).parent().parent();
				$.ajax({
				   type: "GET",
				   url: "/registracion/responsable_tecnico.php?id=" + registro_actual.find('#id').html(),
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
									centerPopup('div_popup');
				   }
				 });
			});

			$('#btn_agregar_resp_tecnico').click(function() {
				$.ajax({
				   type: "GET",
				   url: "/registracion/responsable_tecnico.php",
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html(msg);
					$('#div_popup').show();
					$('#bigscreen').css("display","block");
									centerPopup('div_popup');
				   }
				 });
			})
			//representantes tecnicos


			//datos geograficos
			$('#btn_activar_mapa_r').click(function() {
				$.ajax({
				   type: "POST",
				   url: "/registracion/mapa.php",
				   data: {
							campo_latitud    : 'latitud_r',
							campo_longitud   : 'longitud_r',
							calle_inicio     : $("#calle_r").val(),
							numero_inicio    : $("#numero_r").val(),
							provincia_inicio : $("#provincia_r").val(),
							localidad_inicio : $("#localidad_r").val()
						},
				   dataType: "html",
				   success: function(msg){
				    $("#div_popup_2").addClass('div_mapa');
					$('#div_popup_2').html(msg);
					$('#div_popup_2').show();
					$('#bigscreen').show();

				   }
				 });
			})
			//datos geograficos


			//datos empresa
			$(function(){
				$('#numero_r').filter_input({regex:'[0-9]'});
				$('#piso_r').filter_input({regex:'[0-9]'});
				$('#numero_l').filter_input({regex:'[0-9]'});
				$('#piso_l').filter_input({regex:'[0-9]'});
				$('#numero_c').filter_input({regex:'[0-9]'});
				$('#piso_c').filter_input({regex:'[0-9]'});
				$('#numero_telefonico').filter_input({regex:'[0-9 \\-]'});

				fecha_inicio_act_instance = new Epoch('fecha_inicio_act_container', 'popup', document.getElementById('fecha_inicio_act'), 0);
			});

			$('#btn_cal_fecha_inicio_act').click(function() {
				fecha_inicio_act_instance.toggle();
			})


			$('#provincia_r').change(function() {
				actualizar_localidades_r();
			})


			$('#localidad_r').change(function() {
				$.ajax({
				   type: "POST",
				   url: "/servicios/punto_inicio.php",
				   data: {
							calle     : $("#calle_r").val(),
							numero    : $("#numero_r").val(),
							provincia : $("#provincia_r").val(),
							localidad : $("#localidad_r").val()
						},
				   dataType: "text",
				   success: function(punto_inicio){
												    showAddress(punto_inicio);
				   }
				 });
			})

			$('#provincia_l').change(function() {
				actualizar_localidades_l();
			})

			$('#provincia_c').change(function() {
				actualizar_localidades_c();
			})
			//datos empresa


			$('#btn_siguiente').click(function() {
				var campos  = [	'roles', 'nombre', 'fecha_inicio_act',
								'calle_r', 'numero_r', 'piso_r', 'oficina_r', 'provincia_r', 'localidad_r', 'latitud_r', 'longitud_r',
								'calle_l', 'numero_l', 'piso_l', 'oficina_l', 'provincia_l', 'localidad_l',
								'calle_c', 'numero_c', 'piso_c', 'oficina_c', 'provincia_c', 'localidad_c',
								'numero_telefonico', 'direccion_email', 'lista_resp_legales', 'lista_resp_tecnicos'];

				$.ajax({
					type: "POST",
					url: "/registracion/paso_2.php",
					data:	{	nombre            : $("#nombre").val(),
								fecha_inicio_act  : $("#fecha_inicio_act").val(),

								calle_r           : $("#calle_r").val(),
								numero_r          : $("#numero_r").val(),
								piso_r            : $("#piso_r").val(),
								oficina_r         : $("#oficina_r").val(),
								provincia_r       : $("#provincia_r").val(),
								localidad_r       : $("#localidad_r").val(),

								latitud_r         : $("#latitud_r").val(),
								longitud_r        : $("#longitud_r").val(),

								calle_l           : $("#calle_l").val(),
								numero_l          : $("#numero_l").val(),
								piso_l            : $("#piso_l").val(),
								oficina_l         : $("#oficina_l").val(),
								provincia_l       : $("#provincia_l").val(),
								localidad_l       : $("#localidad_l").val(),

								calle_c           : $("#calle_c").val(),
								numero_c          : $("#numero_c").val(),
								piso_c            : $("#piso_c").val(),
								oficina_c         : $("#oficina_c").val(),
								provincia_c       : $("#provincia_c").val(),
								localidad_c       : $("#localidad_c").val(),

								numero_telefonico : $("#numero_telefonico").val(),
								direccion_email   : $("#direccion_email").val(),

								rol_generador     : ($("#rol_generador").is(':checked')) ? 1 : 0,
								rol_transportista : ($("#rol_transportista").is(':checked')) ? 1 : 0,
								rol_operador      : ($("#rol_operador").is(':checked')) ? 1 : 0
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
															$('#sumario_errores_paso_2 td:first').html(texto_errores);
															$('#sumario_errores_paso_2').show();
															;
														}else{
															$('#sumario_errores_paso_2').hide();
														}
													}
												}
											  }
				 });
			})

			//mapa
			var map      = null;
			var geocoder = null;

			function load() {


				if (GBrowserIsCompatible()) {
					map = new GMap2(document.getElementById("map"));

					map.setCenter(new GLatLng(-34.60828,-58.3708375), 15);
					map.addControl(new GSmallMapControl());
					map.addControl(new GMapTypeControl());

					geocoder = new GClientGeocoder();

					//---------------------------------//
					//   MARCADOR AL HACER CLICK
					//---------------------------------//
					GEvent.addListener(map, "click",function(marker, point) {
                                                                        if (marker) {
                                                                                null;
                                                                        } else {
                                                                                map.clearOverlays();
                                                                                var marcador = new GMarker(point);

                                                                                map.addOverlay(marcador);

                                                                                $("#latitud_r").val(point.y);
                                                                                $("#longitud_r").val(point.x);
                                                                        }
                                                                }
                                                                );
					//---------------------------------//
					//   FIN MARCADOR AL HACER CLICK
					//---------------------------------//
				}
			}

			//---------------------------------//
			//           GEOCODER
			//---------------------------------//
			function showAddress(address, zoom) {
				if (geocoder) {
					geocoder.getLatLng(address,	function(point) {
													if (!point) {
//														alert(address + " not found");
													} else {
														map.setCenter(point, zoom);
														var marker = new GMarker(point);
														map.addOverlay(marker);

														$("#latitud_r").val(point.y);
														$("#longitud_r").val(point.x);
													}
												}
									);
				}
			}
			//---------------------------------//
			//     FIN DE GEOCODER
			//---------------------------------//

			load();
			showAddress("{/literal}{$PUNTO_INICIO}{literal}");
			//mapa
		});
	</script>
	{/literal}
</html>

