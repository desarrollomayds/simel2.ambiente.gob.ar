{literal}
<style type="text/css">
.td {border:1px solid black;}
.center {text-align: center;}
.seccion_tabla {border-collapse:collapse;margin-top: 25px;border:1px solid black;margin:auto;width:880px;font-size: 15px;}
</style>
{/literal}

<div style="width:880px;margin:auto;border:2px solid #dcdbd6;font-family:calibri,Verdana,Arial;padding:10px;">

	<div id="container">
		<div style="float:left;margin-left:30px;width:70px;">
			<img src="{$BASE_PATH}/imagenes/logo_impresion.gif" />
		</div>
		<div style="float:left;margin-top:29px;"><strong>MINISTERIO DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
	</div>
	<div style="clear:both;"></div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;width:500px;">Manifiesto Ley 24.051</div>
		<div style="float:right;border:1px solid #dcdbd6;padding:3px;"><b>Nro {$CODIGO}</b></div>
	</div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;"><b>Fecha de Emisi&oacute;n</b>: {$FECHA_EMISION}</div>
	</div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;"><b>Fecha de Vencimiento</b>: {$FECHA_VENCIMIENTO}</div>
	</div>

	{if isset($ES_SLOP_RELACIONADO) and $ES_SLOP_RELACIONADO == 'true'}
		<div style="font-size:12px;margin-bottom:5px;">
			<div style="float:left;">Esta manifiesto est&aacute; vinculado al manifiesto Nro <b>{$PROTOCOLO_SLOP_PADRE}</b></div>
		</div>
	{/if}

	<!-- DATOS IDENTIFICATORIOS -->
	<table class="seccion_tabla">

		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="7" style="text-align:center;font-weight:bold;">Datos Identificatorios</td>
		</tr>
		<tr>
			<td class="td">&nbsp;</td>
			<td colspan="2" class="td center">Generador</td>
			<td colspan="2" class="td center">Transportista</td>
			<td colspan="2" class="td center">Operador</td>
		</tr>
		<tr>
			<td class="td">Nombre</td>
			{* Dependiento tipo manifiesto dato del generador o una leyenda*}
			{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::MULTIPLE}
				<td colspan="2" rowspan="5" class="td center">Ver al dorso</td>
			{elseif $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SIMPLE_RES_544_94}
				<td colspan="2" rowspan="5" class="td center">Resoluci&oacute;n 544/94</td>
			{else}
				<td colspan="2" class="td center">Empresa:&nbsp;{$GENERADORES[0].NOMBRE_EMPRESA}<br>{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SLOP}Establecimiento:&nbsp;{else}Buque:&nbsp;{/if} {$GENERADORES[0].NOMBRE}</td>
			{/if}

			<td colspan="2" class="td center">Empresa:&nbsp;{$TRANSPORTISTA.NOMBRE_EMPRESA}<br>Establecimiento:&nbsp;{$TRANSPORTISTA.NOMBRE}</td>
			<td colspan="2" class="td center">Empresa:&nbsp;{$OPERADOR.NOMBRE_EMPRESA}<br>Establecimiento:&nbsp;{$OPERADOR.NOMBRE}</td>
		</tr>
		<tr>
			<td class="td">Domicilio Planta</td>
			{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::MULTIPLE and $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SIMPLE_RES_544_94}
				<td colspan="2" class="td center">{$GENERADORES[0].CALLE} {$GENERADORES[0].NUMERO} {$GENERADORES[0].PISO}</td>
			{/if}
			<td colspan="2" class="td center">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
			<td colspan="2" class="td center">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
		</tr>
		<tr>
			<td class="td">Expediente</td>
			{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::MULTIPLE and $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SIMPLE_RES_544_94}
				<td colspan="2" class="td center">{$GENERADORES[0].EXPEDIENTE_NUMERO}/{$GENERADORES[0].EXPEDIENTE_ANIO}</td>
			{/if}
			<td colspan="2" class="td center">{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
			<td colspan="2" class="td center">{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
		</tr>
		<tr>
			<td class="td">CUIT</td>
			{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::MULTIPLE and $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SIMPLE_RES_544_94}
				<td colspan="2" class="td center">{$GENERADORES[0].CUIT}</td>
			{/if}
			<td colspan="2" class="td center">{$TRANSPORTISTA.CUIT}</td>
			<td colspan="2" class="td center">{$OPERADOR.CUIT}</td>
		</tr>
		<tr>
			<td class="td">C.A.A.</td>
			{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::MULTIPLE and $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SIMPLE_RES_544_94}
				<td class="td center">Nro: {$GENERADORES[0].CAA_NUMERO}</td>
				<td class="td center">Vto: {$GENERADORES[0].CAA_VENCIMIENTO}</td>
			{/if}
			<td class="td center">Nro: {$TRANSPORTISTA.CAA_NUMERO}</td>
			<td class="td center">Vto: {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
			<td class="td center">Nro: {$OPERADOR.CAA_NUMERO}</td>
			<td class="td center">Vto: {$OPERADOR.CAA_VENCIMIENTO}</td>
		</tr>
	</table>
	<br />

	<!-- VEHICULOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="2" style="text-align:center;font-weight:bold;">Veh&iacute;culo</td>
		</tr>
		<tr>
			<td class="td center">Nro Patente / Matr&iacute;cula</td>
			<td class="td center">Tipo de Veh&iacute;culo</td>
			<td class="td center">Tipo de Caja</td>
		</tr>
		
		{foreach $TRANSPORTISTA.VEHICULOS as $VEHICULO}
			 <tr>
				<td class="td center">{$VEHICULO.DOMINIO}</td>
				<td class="td center">{$VEHICULO.TIPO_VEHICULO}</td>
				<td class="td center">{$VEHICULO.TIPO_CAJA}</td>
			</tr>
		{/foreach}

	</table>
	<br />

	<!-- RESIDUOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="6" style="text-align:center;font-weight:bold;">Informaci&oacute;n de Residuos</td>
		</tr>
		<tr>
			<td colspan="2" class="td center">Contenedores</td>
			<td rowspan="2" class="td center">CSC</td>
			<td rowspan="2" class="td center">Descripci&oacute;n</td>
			<td rowspan="2" class="td center">Peligrosidad</td>
			<td rowspan="2" class="td center">Cant.<br>(estimada)</td>
			<td rowspan="2" class="td center">Cant.<br>(real)</td>
			<td rowspan="2" class="td center">Estado</td>
		</tr>
		<tr>
			<td class="td center">Tipo</td>
			<td class="td center">Cantidad</td>
		</tr>

		{foreach $RESIDUOS as $RESIDUO}
			 <tr>
				<td class="td center">{$RESIDUO.CONTENEDOR}</td>
				<td class="td center">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
				<td class="td center">{$RESIDUO.RESIDUO}</td>
				<td class="td center">{$RESIDUO.RESIDUO_}</td>
				<td class="td center">{$RESIDUO.PELIGROSIDAD}</td>
				<td class="td center">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
				<td class="td center">
					{if $RESIDUO.CANTIDAD_REAL == ''}
						&nbsp;
					{else}
						{if ! isset($ES_SLOP_BARCAZA_CABECERA)}
							{$RESIDUO.CANTIDAD_REAL}
						{else}
							&nbsp;
						{/if}
					{/if}
				</td>
				<td class="td center">{$RESIDUO.ESTADO_}</td>
			</tr>
		{/foreach}
		
	</table>
	<br />

	<!-- INFORMACION DE EMERGENCIA -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="3" style="text-align:center;font-weight:bold;">Informaci&oacute;n de emergencia</td>
		</tr>
		<tr>
			<td class="td center">&nbsp;</td>
			<td class="td center">Operador</td>
			<td class="td center">Transportista</td>
		</tr>
		<tr>
			<td class="td center">Tel&eacute;fono</td>
			<td class="td center">{$OPERADOR.NUMERO_TELEFONICO}</td>
			<td class="td center">{$TRANSPORTISTA.NUMERO_TELEFONICO}</td>
		</tr>
		<tr>
			<td class="td center">Observaci&oacute;n</td>
			<td class="td center">{$OPERADOR.CALLE_C} {$OPERADOR.NUMERO_C} {$OPERADOR.PISO_C}</td>
			<td class="td center">{$TRANSPORTISTA.CALLE_C} {$TRANSPORTISTA.NUMERO_C} {$TRANSPORTISTA.PISO_C}</td>
		</tr>
	</table>
	<br />

	<!-- CERTIFICACION -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="4" style="text-align:center;font-weight:bold;">Certificaci&oacute;n</td>
		</tr>
		<tr>
			<td class="td center">&nbsp;</td>
			<td class="td center">Generador</td>
			<td class="td center">Operador</td>
			<td class="td center">Transportista</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Firma</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Aclaraci&oacute;n</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Fecha</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
	</table>
	<br />

	<!-- DECLARACION JURADA -->
	<div style="text-align: left;font-size:12px;border: 1px solid black;padding:5px;">
		<strong>Declaraci&oacute;n Jurada: Certificaci&oacute;n del Generador</strong>
		<div style="text-align: left;font-size:12px;">Declaro bajo juramento, que la informaci&oacute;n y los datos manifestados en el presente, son veraces y se ajustan a la legislaci&oacute;n vigente en la materia.</div>
	</div>


	<!-- Los Manifiestos Múltiples tiene un dorso -->
	{if $MANIFIESTO['TIPO_MANIFIESTO'] == TipoManifiesto::MULTIPLE}
		<pagebreak />

		<div id="container">
			<div style="float:left;margin-left:30px;width:70px;">
				<img src="{$BASE_PATH}/imagenes/logo_impresion.gif" />
			</div>
			<div style="float:left;margin-top:29px;"><strong>MINISTERIO DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
		</div>
		<div style="clear:both;"></div>

		<div style="font-size:12px;margin-bottom:5px;">
			<div style="float:left;width:500px;">Manifiesto Ley 24.051</div>
			<div style="float:right;"><b>Nro {$CODIGO}</b></div>
		</div>

		<!-- GENERADORES DORSO MANIFIESTO MULTIPLE -->
		<!-- DATOS IDENTIFICATORIOS -->
		<table class="seccion_tabla">
			<tr style="border:1px solid black;background-color:#E7E7E7;">
				<td colspan="7" style="text-align:center;font-weight:bold;">Informaci&oacute;n de Generadores</td>
			</tr>
			<tr>
				<td class="td center">Orden</td>
				<td class="td center">CUIT</td>
				<td class="td center">Nombre</td>
				<td class="td center">Domicilio Planta</td>
				<td class="td center">Localidad</td>
				<td class="td center">Correo Electr&oacute;nico</td>
				<td class="td center">Cantidad<br/>(estimada)</td>
			</tr>

			{assign var=index value=1}
			{foreach $GENERADORES as $GENERADOR}
				<tr>
					<td class="td center">{$index}</td>
					<td class="td center">{$GENERADOR.CUIT}</td>
					<td class="td center">Empresa:&nbsp;{$GENERADOR.NOMBRE_EMPRESA}<br>Establecimiento:&nbsp;{$GENERADOR.NOMBRE}</td>
					<td class="td center">{$GENERADOR.CALLE} Nro {$GENERADOR.NUMERO}. Piso: {$GENERADOR.PISO}</td>
					<td class="td center">{$GENERADOR.LOCALIDAD}</td>
					<td class="td center">{$GENERADOR.EMAIL}</td>
					<td class="td center">{$GENERADOR.CANT_RESIDUO}</td>
				</tr>
				{assign var=index value=$index + 1}
			{/foreach}
		</table>
	{/if}

</div>

<script>
{literal}

{/literal}
</script>