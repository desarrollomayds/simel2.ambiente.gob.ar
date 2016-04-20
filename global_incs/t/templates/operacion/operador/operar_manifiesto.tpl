<div class="backGrey">

<div id="mensaje_comprobante_no_valido" style=" background-color:#EAEAE5; padding:5px; display: none">
	<strong>COMPROBANTE SIN VALIDEZ</strong>
</div>

<div style=" background-color:#EAEAE5; padding:5px"> <span style=" padding-left:10px"><br />
	<strong>Empresa Creadora : </strong>{$MANIFIESTO.CREADOR.NOMBRE_EMPRESA}<br />
	<strong>Fecha de Creaci&oacute;n: </strong>{$MANIFIESTO.FECHA_CREACION}</span><br />
	<br />
</div>
  <div style="width: 600px;overflow: auto;height: 400px;overflow-x: hidden;">
        <div class="clear20"></div>
        <span id="titulos" style="float: left;font-size: 14px;font-weight: bold;margin-left: 5px;margin-bottom: 15px;">OPERADORES<br /></span><br />


<table width="580" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_generadores">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
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

<table width="570" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_transportistas">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
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

<table width="570" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_operadores">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
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

<table width="570" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuos">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Tipo Cont.</td>
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
  {if $ACEPTADO}
        <br/><br/>
        Este manifiesto ya se encuentra Aceptado. A la espera de la aceptaci&oacute;n o rechazo de las demas partes.
        <br/>
        {else}
<div align="right" id="acciones"><br />
    <div class='boton_faltante' style="float: left;" id='btn_aceptar_1'><img class="hand" src="{$BASE_PATH}/imagenes/boton_aceptar.gif" width="91" height="30" data-dismiss="modal" /></div>
    <div class='boton_faltante' style="float: right;" id='btn_rechazar_1'><img class="hand" src="{$BASE_PATH}/imagenes/boton_rechazar.gif" width="91" height="30" data-dismiss="modal" /></div>
    <div id='btn_cancelar_1' style="float: right;"><img class="hand" src="{$BASE_PATH}/imagenes/boton_cancelar.gif" width="91" height="30" data-dismiss="modal" /></div>
</div>
        {/if}
    </div>
<script>
{literal}
	var acciones = new Array();

	acciones['ASIGNAR']    = 'desasignar';
	acciones['DESASIGNAR'] = 'asignar';

	$("#btn_imprimir_1").click(function(){
		$("#acciones").hide();
		$("#mensaje_comprobante_no_valido").show();
		$("#div_popup").printElement();
		$("#mensaje_comprobante_no_valido").hide();
		$("#acciones").show();
	});

	$("#btn_aceptar_1").click(function(){
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/operador/operar_manifiesto.php",
		   data: {accion : "aceptar", id : {/literal}{$MANIFIESTO.ID}{literal}},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

	$("#btn_rechazar_1").click(function(){
		$.ajax({
		   type: "POST",
		   url: mel_path+	"/operacion/operador/operar_manifiesto.php",
		   data: {accion : "rechazar", id : {/literal}{$MANIFIESTO.ID}{literal}},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});
{/literal}
</script>

