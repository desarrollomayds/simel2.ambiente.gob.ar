<style>
input {
width:100px;
}
</style>
<div class="backGrey" style="height:490px;overflow:auto;width: 600px;">
    <div class="headerPopUp">
        <div class="textLeft">
         RESIDUOS TRASNPORTADOS POR "{$VEHICULO.DOMINIO}"
        </div>
        <div class="imgCerrar" id="btn_cerrar">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
   <div class="clear20"></div>


    <br /><div style="float:left;font-weight:bold;margin-left:25px;"><span id="titulos">RESIDUOS TRASLADABLES<br /></span></div><br />
  <div class="clear20"></div>
<table width="560" style="margin-left: 15px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuos">
	<tr>
	<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
	<td bgcolor="#A8D8EA" width="" class="invisible">Id_residuo</th>
		<td width="" bgcolor="#A8D8EA" class="td">Tipo Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Residuo</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Est.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Unidad</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Estado</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Trasladar</td>
	</tr>

	{foreach $RESIDUOS as $RESIDUO}
		{if $RESIDUO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
	<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$VEHICULO.ID}</td>
	<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id_res">{$RESIDUO.ID}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CONTENEDOR_}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
		<td bgcolor="{$COLOR_LINEA}" id="resi" class="td">{$RESIDUO.RESIDUO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.UNIDAD_}</td>
		<td bgcolor="{$COLOR_LINEA}" id="estado" class="td">{$RESIDUO.ESTADO_}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td"><img class="trasladar_residuo_div hand" src="/imagenes/truck_add.png" /></td>
	</tr>
	{/foreach}
</table>
     <div class="clear20"></div>



        <div id="tablaagregar" style="display:none;">
         <br /><div style="float:left;font-weight:bold;margin-left:25px;"><span id="titulos">AGREGAR TRASLADO<br /></span></div><br />
        <table id="addTransporte"  width="550" style="margin-left: 15px;" border="0" cellpadding="5" cellspacing="0" class="tabla" >
        <tr>
        	<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
        	<td bgcolor="#A8D8EA" width="" class="invisible">Id_resido</th>
        	<td  bgcolor="#A8D8EA" class="td">Cantidad</td>
        	<td  bgcolor="#A8D8EA" class="td">Residuo</td>
        	<td  bgcolor="#A8D8EA" class="td">Estado</td>
        	<td bgcolor="#A8D8EA" class="td">Acciones</td>
        </tr>
        <tr>
        <td bgcolor="{$COLOR_LINEA}" class="invisible" id="id_aceptar"></td>
        <td bgcolor="{$COLOR_LINEA}" class="invisible" id="id_residuo"></td>
           	<td><input type="text" name="cantidad" id="cantidad"/></td>
        	<td><input type="text" name="fecha" id="residuo1"/></td>
        	<td><input type="text" name="fecha" id="estado1"/></td>
        	<td><img class="hand aceptar_traslado" src="/imagenes/proceso_check.png" /><img style="margin-left:25px;" class="hand cerrar_div" src="/imagenes/proceso_delete.png" /></td>
        </tr>

        </table>
        </div>
         <div class="clear20"></div>
           <div id="tablaagregados" style="display:block;">
            <br /><div style="float:left;font-weight:bold;margin-left:25px;"><span id="titulos">RESIDUOS A TRASLADAR<br /></span></div><br />
        <table id="addAgregados"  width="550" style="margin-left: 15px;" border="0" cellpadding="5" cellspacing="0" class="tabla" >
        <tr>
        	<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
        	<td bgcolor="#A8D8EA" width="" class="invisible">Id_resido</th>
        	<td  bgcolor="#A8D8EA" class="td">Cantidad</td>
        	<td  bgcolor="#A8D8EA" class="td">Residuo</td>
        	<td  bgcolor="#A8D8EA" class="td">Estado</td>
        	<td bgcolor="#A8D8EA" class="td">Acciones</td>
        </tr>
       	{foreach $TRASLADOS as $TRASLADO}
      <tr>
					<td  class='invisible' id='id'>{$TRASLADO.ID}</td>
					<td  class='invisible' id='id_residuo'>{$TRASLADO.ID_RESIDUO_MANIFIESTO}</td>
					<td  class='td' >{$TRASLADO.CANTIDAD}</td>

					{foreach $RESIDUOS as $RESIDUO}
					<td  class='td' >{IF $TRASLADO.ID_RESIDUO_MANIFIESTO == $RESIDUO.ID}{$RESIDUO.RESIDUO} {/IF}</td>
					<td  class='td' >{IF $TRASLADO.ID_RESIDUO_MANIFIESTO == $RESIDUO.ID}{$RESIDUO.ESTADO_} {/IF}</td>
					{/foreach}
					<td align='center'  ><img class='borrar_actual' src='/imagenes/proceso_delete.png'/></td>
				</tr>
       	{/foreach}

        </table>
        </div>
        <div class="clear20"></div>

                </div>
    <div class="clear20"></div>


       <div class="clear20"></div>
    <div class="contBoton">

        <div class="bottonRight" id="btn_cerrar2">
        <img style="float:left;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>
    <div class="clear20"></div>

    </div>
{literal}
<script>
	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
                checkAnexo();
	});
        $('#btn_cerrar2').click(function() {
		$('#div_popup_2').hide();
                 checkAnexo();
	});
function agregartutu(){

registro_actual = $(this).parent().parent();
	//alert(registro_actual.find('#id').html());return false;
		$.ajax({
		   type: "GET",
		   url: "/operacion/transportista/residuos_transportados.php",
		   data: { id : registro_actual.find('#id').html()},
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').show();
                        $('#div_popup_2').css("width","600");
                        $('#div_popup_2').css("height","550");
                        centerPopup('div_popup_2');
		   }
		 });
}

</script>
{/literal}