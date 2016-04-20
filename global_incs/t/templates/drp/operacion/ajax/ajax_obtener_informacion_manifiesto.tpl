<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">General</p>
	<table class="table table-hover table-striped">
		<tr>
			<td>ID Operaci&oacute;n</td>
			<td>{$MANIFIESTO.ID}</td>
		</tr>
		<tr>
			<td>Protocolo</td>
			<td>{if {$MANIFIESTO.NUMERO_PROTOCOLO}}{formatear_id_protocolo_manifiesto($MANIFIESTO.NUMERO_PROTOCOLO)}{else}-{/if}</td>
		</tr>
		<tr>
			<td>Tipo</td>
			<td>{obtener_tipo_manifiesto($MANIFIESTO.TIPO_MANIFIESTO)}</td>
		</tr>
		<tr>
			<td>Fecha creaci&oacute;n</td>
			<td>{$MANIFIESTO.FECHA_CREACION}</td>
		</tr>
		<tr>
			<td>Est.creador</td>
			<td>{$MANIFIESTO.CREADOR.NOMBRE_ESTABLECIMIENTO} ({$MANIFIESTO.CREADOR.CUIT})</td>
		</tr>
		<tr>
			<td>Fecha aceptaci&oacute;n</td>
			<td>{if {$MANIFIESTO.FECHA_ACEPTACION}}{$MANIFIESTO.FECHA_ACEPTACION}{else}-{/if}</td>
		</tr>
		<tr>
			<td>Fecha recepci&oacute;n</td>
			<td>{if {$MANIFIESTO.FECHA_RECEPCION}}{$MANIFIESTO.FECHA_RECEPCION}{else}-{/if}</td>
		</tr>
		<tr>
			<td>Fecha tratamiento</td>
			<td>{if {$MANIFIESTO.FECHA_TRATAMIENTO}}{$MANIFIESTO.FECHA_TRATAMIENTO}{else}-{/if}</td>
		</tr>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $GENERADORES as $KEY => $GENERADOR}
				<tr>
					<td>{$GENERADOR.NOMBRE}</td>
					<td>{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
					<td>{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
					<td>{$GENERADOR.CUIT}</td>
					<td>{$GENERADOR.CAA_NUMERO} - {$GENERADOR.CAA_VENCIMIENTO}</td>
				</tr>
			{* esto solo puede ocurrir siendo un manif simple resolucion 544/94 *}
			{foreachelse}
				{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SIMPLE_RES_544_94}
					<td colspan="6">Resoluci&oacute;n 544/94</td>
				{/if}
			{/foreach}
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportistas</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
				<tr>
					<td>{$TRANSPORTISTA.NOMBRE}</td>
					<td>{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
					<td>{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
					<td>{$TRANSPORTISTA.CUIT}</td>
					<td>{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example" id="tabla_vehiculos">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culos Asignados</p>
	<table class="table table-hover table-striped" id="lista_vehiculos">
		<thead>
			<tr>
				<td class="invisible">Id</td>
				<td>Dominio</td>
				<td>Tipo</td>
				<td>Tipo Caja</td>
				<td>Descripci&oacute;n</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			{foreach $VEHICULOS as $VEHICULO}
				<tr>
					<td class="invisible" id="id">{$VEHICULO.ID}</td>
					<td>{$VEHICULO.DOMINIO}</td>
					<td>{$VEHICULO.TIPO_VEHICULO}</td>
					<td>{$VEHICULO.TIPO_CAJA}</td>
					<td>{$VEHICULO.DESCRIPCION}</td>
					<td><i class="fa fa-truck fa-2x"></i></td>	
				</tr>
			{foreachelse}
				<tr>
					<td id="vehiculos_no_asignados" colspan="6">A&uacute;n no se han asignado veh&iacute;culos.</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $OPERADORES as $OPERADOR}
				<td>{$OPERADOR.NOMBRE}</td>
				<td>{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
				<td>{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
				<td>{$OPERADOR.CUIT}</td>
				<td>{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Tipo Cont.</td>
				<td>Cantidad Cont.</td>
				<td>Residuo</td>
				<td>Cantidad Est.</td>
				<td>Unidad</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody>
			{foreach $RESIDUOS as $RESIDUO}
				<tr>
					<td>{$RESIDUO.CONTENEDOR_}</td>
					<td>{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
					<td>{$RESIDUO.RESIDUO}</td>
					<td>{$RESIDUO.CANTIDAD_ESTIMADA}</td>
					<td>{$RESIDUO.UNIDAD_}</td>
					<td>{$RESIDUO.ESTADO_}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
	<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" disabled>{$MANIFIESTO.OBSERVACIONES}</textarea>
</div>
