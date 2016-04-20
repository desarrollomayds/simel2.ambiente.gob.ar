
<div style="width:760px;">
<table style="width:755px;border: 1px solid black;border-collapse:collapse;">
<tr>
<td colspan="4" style="border: 1px solid black;"><strong>DATOS DE LA EMPRESA</strong></td>
</tr>
<tr>
<td style="border: 1px solid black;"><strong>CUIT:</strong>{$EMPRESA.CUIT}</td>
<td colspan="2" style="border: 1px solid black;"><strong>ROLES:</strong>{if $EMPRESA.ROLES.GENERADOR}
							Generador
							{/if}
							{if $EMPRESA.ROLES.TRANSPORTISTA}
							Transportista
							{/if}
							{if $EMPRESA.ROLES.OPERADOR}
							Operador
							{/if}
</td>
<td style="border: 1px solid black;"><strong>Fec. Ini. Act:</strong>{$EMPRESA.FECHA_INICIO_ACT}</td>

</tr>
<tr>
<td style="border: 1px solid black;"><strong>NOMBRE:</strong>{$EMPRESA.NOMBRE}</td>
<td style="border: 1px solid black;"><strong>TELEFONO:</stronge>{$EMPRESA.NUMERO_TELEFONICO}</td>
<td colspan="2" style="border: 1px solid black;"><strong>MAIL:</strong>{$EMPRESA.DIRECCION_EMAIL}</td>
</tr>
<tr>
<td colspan="4" style="border: 1px solid black;">DOMICILIO REAL:<br/><strong>Calle : </strong>{$EMPRESA.CALLE_R}&nbsp<strong>N&uacute;mero : </strong>{$EMPRESA.NUMERO_R}&nbsp<strong>Piso : </strong>{$EMPRESA.PISO_R}&nbsp<strong>Oficina : </strong>{$EMPRESA.OFICINA_R}<strong><br/>Provincia : </strong>{$EMPRESA.PROVINCIA_R_}<strong>&nbspLocalidad : </strong>{$EMPRESA.LOCALIDAD_R_}</td>

</tr>
<tr>
<td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO<br/><strong>Calle : </strong>{$EMPRESA.CALLE_C}<strong>&nbsp;N&uacute;mero : </strong>{$EMPRESA.NUMERO_C}<strong>&nbsp;Piso : </strong>{$EMPRESA.PISO_C}<strong>&nbsp;Oficina : </strong>{$EMPRESA.OFICINA_C}<strong><br/>Provincia : </strong>{$EMPRESA.PROVINCIA_C_}<strong>&nbsp;Localidad : </strong>{$EMPRESA.LOCALIDAD_C_}</td>
</tr>
</table>

</div>



<!--<span class="titulos"><br />
<br />
</span><br />
<table width="770" border="0" style="font-size: 13px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
	<tr>
		<td width="760" height="30" style="font-size:12px;" bgcolor="#4D90FE">DATOS DE LA EMPRESA</td>
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
<br>
<br>

{foreach $EMPRESA.REPRESENTANTES_LEGALES as $REPRESENTANTE}
	<table width="770" border="0" style="font-size: 11px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
		<tr><td width="760" height="30" bgcolor="#A8D8EA">Representante Legal</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
	</table>
{/foreach}
<br>
<br>

{foreach $EMPRESA.REPRESENTANTES_TECNICOS as $REPRESENTANTE}
	<table width="770" border="0" style="font-size: 11px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
		<tr><td width="760" height="30" bgcolor="#A8D8EA">Representante T&eacute;cnico</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$REPRESENTANTE.NOMBRE}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Apellido : </strong>{$REPRESENTANTE.APELLIDO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de nacimiento : </strong>{$REPRESENTANTE.FECHA_NACIMIENTO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo de documento : </strong>{$REPRESENTANTE.TIPO_DOCUMENTO_}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de documento : </strong>{$REPRESENTANTE.NUMERO_DOCUMENTO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Cargo : </strong>{$REPRESENTANTE.CARGO}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Cuit : </strong>{$REPRESENTANTE.CUIT}</td></tr>
	</table>
{/foreach}
<br>
<br>

{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
	<table width="770" border="0" style="font-size: 11px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
		<tr><td width="760" height="30" bgcolor="#A8D8EA">Establecimiento</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Nombre : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Tipo : </strong>{$ESTABLECIMIENTO.TIPO_}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Usuario : </strong>{$ESTABLECIMIENTO.USUARIO}</td></tr>
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

		<tr><td height="20" bgcolor="#EAEAE5"><strong>Nomenclatura Catastral : </strong>{$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_CIRC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SEC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_MANZ} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_PARC} - {$ESTABLECIMIENTO.NOMENCLATURA_CATASTRAL_SUB_PARC}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Habilitaciones : </strong>{$ESTABLECIMIENTO.HABILITACIONES}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Memoria : </strong>{$ESTABLECIMIENTO.MEMORIA}</td></tr>
		<tr><td height="20" bgcolor="#EAEAE5"><strong>Equiprin : </strong>{$ESTABLECIMIENTO.EQUIPRIN}</td></tr>
	</table>
{/foreach}
<br>
<br>

{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
	{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
		<table width="770" style="font-size: 11px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
			<tr><td width="760" height="30" bgcolor="#A8D8EA">Permiso de generaci&oacute;n/operaci&oacute;n</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
		</table>
	{/foreach}
{/foreach}
<br>
<br>

{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
	{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
		<table width="770" style="font-size: 11px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
			<tr><td width="760" height="30" bgcolor="#A8D8EA">Vehiculo Registrado</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Establecimiento  : </strong>{$ESTABLECIMIENTO.NOMBRE}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Dominio : </strong>{$VEHICULO.DOMINIO}</td></tr>
			<tr><td height="20" bgcolor="#EAEAE5"><strong>Descripci&oacute;n  : </strong>{$VEHICULO.DESCRIPCION}</td></tr>
		</table>
	{/foreach}
{/foreach}
<br>
<br>


{foreach $EMPRESA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
	{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
		{foreach $VEHICULO.PERMISOS as $PERMISO}
			<table style="font-size: 11px" width="770" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
				<tr><td width="760" height="30" bgcolor="#A8D8EA">Permiso de traslado</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Veh&iacute;culo : </strong>{$VEHICULO.DOMINIO}</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Residuo : </strong>{$PERMISO.RESIDUO_}</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Cantidad : </strong>{$PERMISO.CANTIDAD}</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Estado : </strong>{$PERMISO.ESTADO_}</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de inicio : </strong>{$PERMISO.FECHA_INICIO}</td></tr>
				<tr><td height="20" bgcolor="#EAEAE5"><strong>Fecha de fin : </strong>{$PERMISO.FECHA_FIN}</td></tr>
			</table>
		{/foreach}
	{/foreach}
{/foreach}

<table>
	<tr>
		<td height="20" bgcolor="#EAEAE5"><img src="/registracion/barcode.php?code={$EMPRESA.ID}"></td>
	</tr>
	<tr>
		<td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de registraci&oacute;n: </strong>{$EMPRESA.ID}</td>
	</tr>
<table>

-->
