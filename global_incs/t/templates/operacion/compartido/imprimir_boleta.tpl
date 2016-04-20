{literal}
<style type="text/css">
body {font-family:Calibri,Verdana,Arial;}
.td {border:1px solid black;}
.seccion_tabla {border-collapse:collapse;margin-top: 25px;border:1px solid black;margin:auto;width:880px;font-size: 12px;}
.separacion {background-color:#818181;font-weight:bold;border:1px solid black;}
.border {border: solid 1px black;}
.rotate {
	-webkit-transform: rotate(270deg);
	-moz-transform: rotate(270deg);
	-o-transform: rotate(270deg);
	writing-mode: lr-tb;
}
</style>
{/literal}

<div style="width:880px;border:2px solid #dcdbd6;padding:10px;">

	<div id="container">
		<div style="float:left;border: 0px solid black;width:289px;height:73px;">
			<img width="270" height="66" src="{$BASE_PATH}/imagenes/LogoDRP_letras_negras.png" />
		</div>
		<div style="float:left;border:0px solid blue;height:77px;">
			<div style="text-align:center;float:left;padding:10px;font-weight:bold;font-size:14px;">DIRECCI&Oacute;N NACIONAL DE GESTI&Oacute;N AMBIENTAL</div>
			<div style="float:right;text-align:center;font-weight:bold;font-size:12px;">DIRECCI&Oacute;N DE RESIDUOS PELIGROSOS</div>
		</div>
	</div>
	<div style="clear:both;"></div>

	<div class="separacion" style="padding:12px;text-align:center;margin-top:5px;">
		COMPROBANTE DE PAGO DE MANIFIESTOS ELECTR&Oacute;NICOS
	</div>

	<div style="padding:10px;border:1px solid black;font-size:12px;">
		<div style="float:left;width:250px;margin-left:60px;">BOLETA DE PAGO Nro {$boleta_id}</div>
		<div style="float:right;width:300px;">Fecha de emisi&oacute;n: {$fecha_registracion}</div>
	</div>

	<div class="separacion" style="padding:5px;text-align:center;font-size:12px;">
		DATOS DEL INTERESADO
	</div>

	<div class="border" style="width:100%;">
		<table class="seccion_tabla" style="width:100%;">
			<tr>
				<td class="td" style="width:50%;">ID SIMEL:{$id}</td>
				<td class="td" style="width:50%;">NRO CUIT:{$cuit}</td>
			</tr>
			<tr>
				<td class="td" style="width:50%;">RAZ&Oacute;N SOCIAL:{$razon}</td>
				<td class="td" style="width:50%;">NOMBRE:{$nombre}</td>
			</tr>
		</table>
	</div>

	<div class="border" style="width:100%;margin-top:10px;">
		<table class="seccion_tabla" style="width:100%;text-align:center;">
			<tr class="separacion">
				<td class="td">CONCEPTO</td>
				<td class="td">IMPORTE UNITARIO</td>
				<td class="td">CANTIDAD</td>
				<td class="td">SUBTOTAL</td>
			</tr>
			<tr>
				<td class="td">Manifiestos electr&oacute;nicos</td>
				<td class="td">$ {$boleta_unitario}</td>
				<td class="td">{$cantidad_manifiestos}</td>
				<td class="td">$ {$importe}</td>
			</tr>
		</table>
	</div>

	<div style="border:font-size:12px;margin-top:10px;">
		<div style="padding:5px;float:left;width:525px;border:1px solid black;background-color:#E7E7E7;font-size:12px;">Total a abonar</div>
		<div style="padding:5px;float:right;border:1px solid black;width:100px;text-align:center;font-size:12px;">$ {$importe}</div>
	</div>

	<div style="border:font-size:12px;margin-top:10px;">
		<div style="padding:5px;float:left;width:525px;font-size:10px;">Los manifiestos no ser&aacute;n habilitados por SAyDS hasta en tanto se haya confirmado la recepci&oacute;n de pago</div>
		<div style="padding:5px;float:right;border:1px solid black;width:100px;text-align:center;font-size:12px;">Vto: {$fecha_vencimiento}</div>
	</div>

	<div class="separacion" style="padding:5px;text-align:center;font-size:12px;margin-top:10px;font-size:8px;">
		<div>SECRETAR&Iacute;A DE AMBIENTE Y DESARROLLO SUSTENTABLE DE LA NACI&Oacute;N</div>
		<div>SAN MART&Iacute;N 451 x C1004A1 x CIUDAD AUT&Oacute;NOMA DE BUENOS AIRES x ARGENTINA x TEL: +54 11 4348 8200 x FAX: +54 11 4348 8300</div>
	</div>


	<div class="comprobante" style="border:1px solid #818181;font-size:11px;margin-top:20px;">
		<div style="float:left;width:5%;border:0px solid blue;background-color:#818181;">
			<img src="{$BASE_PATH}/imagenes/boleta/comprobante_cliente.png" />
		</div>
		<div style="float:left;width:53%;border:0px solid red;padding:5px 0px 0px 5px;">
			<div>
				Convenio Marco de Cooperaci&oacute;n T&eacute;cnica SAyDS -<br /> CC: 12312212/99<br/>
				Convenio de Recaudaci&oacute;n Nro 8614
				<br /><br/>
				Nro CUIT Cliente: {$cuit}
				<br /><br/>
				Importe a abonar: $ {$importe}
				<br /><br/>
			</div>
			<div style="text-align:center">
				<img src="generador_codigo_barras.php?cb={$cb}" />
			</div>
			
			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				Vencimiento {$fecha_vencimiento}
			</div>
		</div>
		<div style="float:left;width:40%;border:0px solid green;padding-top:5px;">
			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				BOLETA DE PAGO Nro {$boleta_id}
			</div>

			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				Fecha de emisi&oacute;n: {$fecha_registracion}
			</div>

			<div style="padding:55px 10px 10px 10px;border:1px solid black;text-align:center;width:120px;height:60px;margin: 13px 0px 0px 60px;">
				SELLO CAJA BANCO
			</div>
		</div>
	</div>


	<div class="comprobante" style="border:1px solid #818181;font-size:11px;margin-top:10px;">
		<div style="float:left;width:5%;border:0px solid blue;background-color:#818181;">
			<img src="{$BASE_PATH}/imagenes/boleta/comprobante_cliente.png" />
		</div>
		<div style="float:left;width:53%;border:0px solid red;padding:5px 0px 0px 5px;">
			<div>
				Convenio Marco de Cooperaci&oacute;n T&eacute;cnica SAyDS -<br /> CC: 12312212/99<br/>
				Convenio de Recaudaci&oacute;n Nro 8614
				<br /><br/>
				Nro CUIT Cliente: {$cuit}
				<br /><br/>
				Importe a abonar: $ {$importe}
				<br /><br/>
			</div>
			<div style="text-align:center">
				<img src="generador_codigo_barras.php?cb={$cb}" />
			</div>
			
			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				Vencimiento {$fecha_vencimiento}
			</div>
		</div>
		<div style="float:left;width:40%;border:0px solid green;padding-top:5px;">
			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				BOLETA DE PAGO Nro {$boleta_id}
			</div>

			<div style="margin:5px;padding:10px;border:1px solid black;text-align:center;">
				Fecha de emisi&oacute;n: {$fecha_registracion}
			</div>

			<div style="padding:55px 10px 10px 10px;border:1px solid black;text-align:center;width:120px;height:60px;margin: 13px 0px 0px 60px;">
				SELLO CAJA BANCO
			</div>
		</div>
	</div>

	<div class="separacion" style="padding:5px;text-align:left;font-size:12px;margin-top:10px;">
		<div>ENTIDADES HABILITADAS PARA PAGO</div>
		<div style="font-size:10px;">- Sucursales habilitadas Banco Naci&oacute;n</div>
	</div>

</div>