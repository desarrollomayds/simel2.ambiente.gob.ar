<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
           DATOS DE LA RUTA
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="580" border="0" cellpadding="5" cellspacing="0" class="tabla">
	<tr>
            <td colspan="7" bgcolor="#EAEAE5"><div align="right"><img class="hand" src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_establecimiento'/></div></td>
	</tr>
</table>
    <div class="clear20"></div>
    <table width="590" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_establecimientos">
	<tr>
		<td width="100" bgcolor="#A8D8EA" class="invisible">Id</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Nombre</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
		<td width="25"  bgcolor="#A8D8EA" class="td">&nbsp;</td>
	</tr>

	{foreach $RUTA.ESTABLECIMIENTOS as $ESTABLECIMIENTO}
		{if $ESTABLECIMIENTO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$ESTABLECIMIENTO.ID}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$ESTABLECIMIENTO.NOMBRE_EMPRESA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$ESTABLECIMIENTO.CALLE} {$ESTABLECIMIENTO.NUMERO} {$ESTABLECIMIENTO.PISO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$ESTABLECIMIENTO.EXPEDIENTE_NUMERO}/{$ESTABLECIMIENTO.EXPEDIENTE_ANIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$ESTABLECIMIENTO.CUIT}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$ESTABLECIMIENTO.CAA_NUMERO} - {$ESTABLECIMIENTO.CAA_VENCIMIENTO}</td>
		<td width="25" align="left" bgcolor="{$COLOR_LINEA}" class="td"><a class='btn_borrar_establecimiento'><img src="/imagenes/borrar.png" width="24" height="22" /></a></td>
	</tr>
	{/foreach}
</table>
    <div class="clear20"></div>

    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar_1' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight" onclick="cerrar();">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>


    </div>
<script>
{literal}
	$("#btn_cerrar_popup_1").click(function(){
		$("#div_popup").hide();
	});

	$("#btn_aceptar_1").click(function(){
		$("#div_popup").hide();
                    cerrar();
	});


	function agregar_establecimiento_ruta(establecimiento){
		color = colores[$('#lista_establecimientos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"    + establecimiento["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + establecimiento["NOMBRE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + establecimiento["DOMICILIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + establecimiento["EXPEDIENTE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + establecimiento["CUIT"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + establecimiento["CAA"] + "</td>\
			<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_establecimiento'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
		</tr>";

		$('#lista_establecimientos> tbody:last').append(datos);
	}

	$("#btn_agregar_establecimiento").click(function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "GET",
		   url: "/operacion/transportista/establecimiento_ruta.php",
		   dataType: "html",
		   success: function(retorno){
				$("#div_popup_2").html(retorno);
				$("#div_popup_2").show();
                                $("#div_popup_2").css("width","600");
                                $("#div_popup_2").css("height","370");

                                centerPopup('div_popup_2');
		   }
		 });
	});

	$(".btn_borrar_establecimiento").live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/establecimiento_ruta.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					//alert(retorno['errores']['general']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

		//operador
{/literal}
</script>
