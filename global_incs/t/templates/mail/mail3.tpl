<p>Por medio del presente, el Ministerio de Ambiente y Desarrollo Sustentable de la Nación le informa que el Manifiesto Electrónico NRO {formatear_id_protocolo_manifiesto($id_protocolo_manifiesto)} ha sido aprobada por todas las partes.</p>

<p>El mismo tiene, a partir del día de la fecha, 30 días para su vencimiento. En caso de no poder completar el circuito dentro de ese plazo, el mismo vencerá y deberá realizar un nuevo manifiesto.</p>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Informaci&oacute;nGeneral</p>
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
		{foreach $GENERADORES as $KEY => $GENERADOR}
			<tr>
				<td>Nombre</td>
				<td>{$GENERADOR.NOMBRE}</td>
			</tr>
			<tr>
				<td>Domicilio</td>
				<td>{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
			</tr>
			<tr>
				<td>Expediente</td>
				<td>{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
			</tr>
			<tr>
				<td>Cuit</td>
				<td>{$GENERADOR.CUIT}</td>
			</tr>
			<tr>
				<td>Caa</td>
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
		{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
			<tr>
				<td>Nombre</td>
				<td>{$TRANSPORTISTA.NOMBRE}</td>
			</tr>
			<tr>
				<td>Domicilio</td>
				<td>{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
			</tr>
			<tr>
				<td>Expediente</td>
				<td>{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
			</tr>
			<tr>
				<td>Cuit</td>
				<td>{$TRANSPORTISTA.CUIT}</td>
			</tr>
			<tr>
				<td>Caa</td>
				<td>{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
			</tr>
		{/foreach}
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		{foreach $OPERADORES as $OPERADOR}
		<tr>
			<td>Nombre</td>
			<td>{$OPERADOR.NOMBRE}</td>
		</tr>
		<tr>
			<td>Domicilio</td>
			<td>{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
		</tr>
		<tr>
			<td>Expediente</td>
			<td>{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
		</tr>
		<tr>
			<td>Cuit</td>
			<td>{$OPERADOR.CUIT}</td>
		</tr>
		<tr>
			<td>Caa</td>
			<td>{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
		</tr>
		{/foreach}
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		{foreach $RESIDUOS as $RESIDUO}
			<tr>
				<td>Tipo Cont.</td>
				<td>{$RESIDUO.CONTENEDOR_}</td>
			</tr>
			<tr>
				<td>Cantidad Cont.</td>
				<td>{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
			</tr>
			<tr>
				<td>Residuo</td>
				<td>{$RESIDUO.RESIDUO}</td>
			</tr>
			<tr>
				<td>Cantidad Est.</td>
				<td>{$RESIDUO.CANTIDAD_ESTIMADA}</td>
			</tr>
			<tr>
				<td>Unidad</td>
				<td>{$RESIDUO.UNIDAD_}</td>
			</tr>
			<tr>
				<td>Estado</td>
				<td>{$RESIDUO.ESTADO_}</td>
			</tr>
		{/foreach}
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
	<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" disabled>{$MANIFIESTO.OBSERVACIONES}</textarea>
</div>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

{include file='mail/firma_mails.tpl'}