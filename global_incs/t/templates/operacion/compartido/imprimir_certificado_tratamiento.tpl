<div style="width: 880px;margin:auto;border:2px solid #dcdbd6;padding:10px;">


	<div id="container">
		<div style="float:left;margin-left:30px;width:70px;">
			<img src="{$BASE_PATH}/imagenes/logo_impresion.gif" />
		</div>
		<div style="float:left;margin-top:29px;"><strong>MINISTERIO DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
	</div>
	<div style="clear:both;"></div>
	
	<div style="text-align:center;font-size: 14px;margin-top:20px;">
		<strong>CERTIFICADO DE TRATAMIENTO DE RESIDUOS PELIGROSOS</strong>
	</div>

	<div style="margin:20px 30px 0px 30px;border:1px solid black;padding: 10px;font-size: 11px;">
		<b>Manifiesto Nro {formatear_id_protocolo_manifiesto($MANIFIESTO.NUMERO_PROTOCOLO)}</b>
	</div>
	
	<div style="width: 30px;clear: both;height: 15px;"></div>


	<table style="margin:10px 30px 10px 30px;width:100%;border-collapse:collapse;font-size:12px;text-align:center;">
	
		{foreach $OPERADORES as $OPERADOR}
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;width:20%;">Establecimiento</td>
				<td style="border:1px solid black;width:40%;">Empresa</td>
				<td style="border:1px solid black;width:40%;">Domicilio</td>
			</tr>
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Operador</td>
				<td style="border:1px solid black;">{$OPERADOR.NOMBRE}</td>
				<td style="border:1px solid black;">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
			</tr>
		{/foreach}

		{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Transportista</td>
				<td style="border:1px solid black;">{$TRANSPORTISTA.NOMBRE}</td>
				<td style="border:1px solid black;">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
			</tr>
		{/foreach}

		{foreach $GENERADORES as $GENERADOR}
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Generador</td>
				<td style="border:1px solid black;">{$GENERADOR.NOMBRE}</td>
				<td style="border:1px solid black;">{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
			</tr>
		{/foreach}

	</table>
	<div style="clear:both;"></div>


	<div style="margin-left:30px;font-size:12px;margin-top:20px;">
		El d&iacute;a {$MANIFIESTO.FECHA_TRATAMIENTO} ha finalizado el tratamiento de los residuos. Los mismos fueron sometidos a:
	</div>
	<div style="clear:both;"></div>


	<table style="margin:10px 30px 10px 30px;width:100%;border-collapse:collapse;font-size:12px;text-align:center;">

		<tr style="border:1px solid black; height: 35PX;">
			<td style="border:1px solid black;">CSC</td>
			<td style="border:1px solid black;">Descripci&oacute;n</td>
			<td style="border:1px solid black;">Contenedor</td>
			<td style="border:1px solid black;">Cantidad real</td>
			<td style="border:1px solid black;">Tratamiento</td>
			<td style="border:1px solid black;">Fecha Tratamiento</td>
		</tr>

		{foreach $RESIDUOS as $RESIDUO}
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">{$RESIDUO.RESIDUO}</td>
				<td style="border:1px solid black;">{$RESIDUO.RESIDUO_}</td>
				<td style="border:1px solid black;">{$RESIDUO.CONTENEDOR}</td>
				<td style="border:1px solid black;">{$RESIDUO.CANTIDAD_REAL}</td>
				<td style="border:1px solid black;">{$RESIDUO.TRATAMIENTO}</td>
				<td style="border:1px solid black;">{$RESIDUO.FECHA_TRATAMIENTO->format('Y-m-d')}</td>
			</tr>
		{/foreach}

	</table>

	<div style="margin:70px 0px 0px 30px;font-size:12px;">
		....................................<br/>
		Firma y sello operador
	</div>
	<div style="clear:both;"></div>

</div>