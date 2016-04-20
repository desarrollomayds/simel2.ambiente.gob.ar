<html>
	<head>
		<title>registraci&oacute;n - paso final</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<script type="text/javascript" src="/javascript/jquery.js"></script>
		<script type="text/javascript" src="/javascript/jquery-ui.js"></script>
		<script type="text/javascript" src="/javascript/jquery.filter_input.js"></script>
		<link   rel="stylesheet"       href="/css/jquery-ui.css"       type="text/css" title="ui-theme" />
		<link   rel="stylesheet"       href="/css/formularios.css"     type="text/css" />
		<link   rel="stylesheet"       href="/css/general.css"         type="text/css" />


                <!--[if IE]>
<link   rel="stylesheet"       href="/css/formularios2.css"     type="text/css" />
<!--[if !IE]>

<![endif]-->

		{literal}

		{/literal}
	</head>
	<body style="text-align: center">
	<div id="contenedor-form"><div id="logo" style="width: 100%;"> <img style="float: left;" src="/images/LogoDRP.png" width="289" height="73" /><img style="float: right;margin-right: 45px" src="/imagenes/logo.gif" width="137" height="60" vspace="5" /></div>
                    <div style="height: 0px;width: 100%;clear:both;"></div>

		<div id="apDiv1">Formulario - Paso 4<br /></div>
			<div id="contenido-form" style="margin-top: 6px;"><br />
				<span class="titulos"><br />
				<br />
				</span><br />
				<table width="770" border="0" style="font-size: 11px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
					<tr>
						<td colspan="6" width="760"  style="font-size:12px;" bgcolor="#A8D8EA">DATOS DE LA EMPRESA</td>
					</tr>

					<tr>
						<td  colspan="6" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$EMPRESA.CUIT}</td>

                                        </tr>
                                        <tr>
                                        <td  colspan="6" bgcolor="#EAEAE5"><strong>Roles : </strong>
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
                                             <td   colspan="6" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$EMPRESA.NOMBRE}</td>

                                        </tr>
                                        <tr>
                                          <td colspan="6" bgcolor="#EAEAE5"><strong>Fec. Ini. Act : </strong>{$EMPRESA.FECHA_INICIO_ACT}</td>

                                        </tr>
                                        <tr>
						<td  colspan="3" bgcolor="#EAEAE5"><strong>N&uacute;mero Telef&oacute;nico : </strong>{$EMPRESA.NUMERO_TELEFONICO}</td>
                                                <td  colspan="3" bgcolor="#EAEAE5"><strong>Direcci&oacute;n de Email: </strong>{$EMPRESA.DIRECCION_EMAIL}</td>
					</tr>

					<tr>
						<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5"><strong>Domicilio real</strong><br/><br/><strong>Calle : </strong>{$EMPRESA.CALLE_R}&nbsp;<strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_R}&nbsp;<strong>Piso : </strong>{$EMPRESA.PISO_R}&nbsp;<br/><strong>Oficina : </strong>{$EMPRESA.OFICINA_R}&nbsp;<br/><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_R_}<strong><br/>Localidad : </strong>{$EMPRESA.LOCALIDAD_R_}</td>
                                              <td colspan="2"  style="border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5"><strong>Domicilio legal</strong><br/><br/><strong>Calle : </strong>{$EMPRESA.CALLE_L}&nbsp;<strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_L}&nbsp;<strong>Piso : </strong>{$EMPRESA.PISO_L}&nbsp;<br/><strong>Oficina : </strong>{$EMPRESA.OFICINA_L}&nbsp;<br/><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_L_}<strong><br/>Localidad : </strong>{$EMPRESA.LOCALIDAD_L_}</td>
                                              <td colspan="2"  style="border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5"><strong>Domicilio constituido</strong><br/><br/><strong>Calle : </strong>{$EMPRESA.CALLE_C}&nbsp;<strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_C}&nbsp;<strong>Piso : </strong>{$EMPRESA.PISO_C}&nbsp;<br/><strong>Oficina : </strong>{$EMPRESA.OFICINA_C}&nbsp;<br/><strong>Provincia : </strong>{$EMPRESA.PROVINCIA_C_}<strong><br/>Localidad : </strong>{$EMPRESA.LOCALIDAD_C_}</td>

					</tr>

				</table>
				<br>
				<br>

				{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
					<table width="770" border="0" style="font-size: 11px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
						<tr><td width="760" bgcolor="#A8D8EA">Representante Legal</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
					</table>
                                        <br/>
				<br/>
				{/foreach}


				{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
					<table width="770" border="0" style="font-size: 11px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
						<tr><td width="760"  bgcolor="#A8D8EA">Representante T&eacute;cnico</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
						<tr><td bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Cargo : </strong>{$REPRESENTANTE.CARGO}</td></tr>
						<tr><td  bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
					</table>
                                          <br/>
				<br/>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					<table width="770" border="0" style="font-size: 11px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
						<tr><td colspan="6" width="760"  bgcolor="#A8D8EA">Establecimiento</td></tr>
						<tr><td colspan="6"  bgcolor="#EAEAE5"><strong>Nombre : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
						<tr><td colspan="6"  bgcolor="#EAEAE5"><strong>Tipo : </strong>{$ESTABLECIMIENTO.TIPO_}</td></tr>
						<tr><td colspan="6"  bgcolor="#EAEAE5"><strong>Usuario : </strong>{$ESTABLECIMIENTO.USUARIO}</td></tr>
						<tr><td colspan="6"  bgcolor="#EAEAE5"><strong>Actividad : </strong>{$ESTABLECIMIENTO.ACTIVIDAD_}</td></tr>
						<tr><td colspan="6"  bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong>{$ESTABLECIMIENTO.DESCRIPCION}</td></tr>

						<tr>
							<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
								<strong>Domicilio real</strong>
								<br/>
								<br/>
								<strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_R}&nbsp;
								<strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_R}&nbsp;
								<strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_R}
								<br/>
								<strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_R_}&nbsp;<br/>
								<strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_R_}
							</td>
							<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
								<strong>Domicilio constituido</strong>
								<br/>
								<br/>
								<strong>Calle : </strong>{$ESTABLECIMIENTO.CALLE_C}&nbsp;
								<strong>N&uacute;mero : </strong>{$ESTABLECIMIENTO.NUMERO_C}&nbsp;
								<strong>Piso : </strong>{$ESTABLECIMIENTO.PISO_C}
								<br/>
								<strong>Provincia : </strong>{$ESTABLECIMIENTO.PROVINCIA_C_}&nbsp;
								<br/>
								<strong>Localidad : </strong>{$ESTABLECIMIENTO.LOCALIDAD_C_}
							</td>
							<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
								<strong>Nomenclatura Catastral : </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}&nbsp;&nbsp;&nbsp;&nbsp;
								<br/>
								<strong>Habilitaciones : </strong>{$ESTABLECIMIENTO.HABILITACIONES}&nbsp;&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
					</table>
					<br/>
					<br/>
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
						<table width="770" style="font-size: 11px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760"  bgcolor="#A8D8EA">Permiso de generaci&oacute;n/operaci&oacute;n</td></tr>
							<tr><td bgcolor="#EAEAE5"><strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
							<tr><td h bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
						</table>
                                                     <br/>
				<br/>
					{/foreach}
				{/foreach}


				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						<table width="770" style="font-size: 11px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
							<tr><td width="760"  bgcolor="#A8D8EA">Veh&iacute;culo Registrado</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Establecimiento  : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Dominio : </strong>{$VEHICULO.DOMINIO}</td></tr>
							<tr><td  bgcolor="#EAEAE5"><strong>Descripci&oacute;n  : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
						</table>
                                                     <br/>
				<br/>
					{/foreach}
				{/foreach}



				{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
					{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
						{foreach $VEHICULO.PERMISOS as $PERMISO}
							<table style="font-size: 11px" width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
								<tr><td width="760"  bgcolor="#A8D8EA">Permiso de traslado</td></tr>
								<tr><td bgcolor="#EAEAE5"><strong>Veh&iacute;culo : </strong>{$VEHICULO.DOMINIO}</td></tr>
								<tr><td  bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
								<tr><td  bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
								<tr><td bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
								<tr><td  bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
								<tr><td  bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
							</table>
                                                             <br/>
				<br/>
						{/foreach}
					{/foreach}
				{/foreach}


				<div align="right"><br />
					<a href="paso_3.php"><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/boton_anterior.gif" width="91" height="30" border="0" /></a>
					<a href="finalizar.php"><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/boton_finalizar.gif" width="91" height="30" /></a>
					<br />
				</div>
			</div>
		</div>
	</body>
</html>
