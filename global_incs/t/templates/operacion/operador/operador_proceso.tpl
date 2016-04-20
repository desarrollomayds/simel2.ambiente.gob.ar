<style>
input {
width:100px;
}
</style>
<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            OPERAR RESIDUOS
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>

   <div style="width: 590px;overflow: auto;height: 400px;overflow-x: hidden;">
  <div class="clear20"></div>

<span id="titulos" style="float: left;font-size: 14px;font-weight: bold;margin-left: 5px;margin-bottom: 15px;">RESIDUOS<br /></span><br />


<table width="570" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuos"  style="margin-left:5px;">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Tipo Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Residuo</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Est.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Real</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Unidad</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Estado</td>
                <td width="80" bgcolor="#A8D8EA" class="td">Procesar</td>
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
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_REAL}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.UNIDAD_}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.ESTADO_}</td>
                <td bgcolor="{$COLOR_LINEA}" class="td"><img onclick="addProceso('{$RESIDUO.ID}','{$CREADOR}','{$RESIDUO.RESIDUO}');" class="hand" src="/imagenes/edit-trash.png" width="24" height="22" /></td>
	</tr>
	{/foreach}
</table>
<div class="clear20"></div>
<span id="titulos" style="float: left;font-size: 14px;font-weight: bold;margin-left: 5px;margin-bottom: 15px;">RESIDUOS PROCESADOS<br /></span><br />
<table width="570" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuosp"  style="margin-left:5px;">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Residuo</td>

		<td width="" bgcolor="#A8D8EA" class="td">Cantidad Procesada</td>
		<td width="" bgcolor="#A8D8EA" class="td">Forma de proceso</td>
		<td width="" bgcolor="#A8D8EA" class="td">fecha de proceso</td>
                <td width="" bgcolor="#A8D8EA" class="td">Borrar</td>

	</tr>

	{foreach $PROCESADOS as $PROCESO}
		{if $PROCESO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
                <tr id="new{$PROCESO.ID}">
            <td bgcolor="{$COLOR_LINEA}" class="td">
                {foreach $RESIDUOS as $RESIDUO}
                {if $RESIDUO.ID == $PROCESO.RESIDUOS_MANIFIESTO_ID}
                  {$RESIDUO.RESIDUO}
                 {/if}
                {/foreach}
                </td>

		<td bgcolor="{$COLOR_LINEA}" class="td">{$PROCESO.CANTIDAD_PROCESADA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$PROCESO.FORMA_PROCESO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$PROCESO.FECHA_PROCESO}</td>
                <td bgcolor="{$COLOR_LINEA}" class="td"><img  onclick="deleteResiduoProcesado('{$PROCESO.ID}')" class="imgP" class="hand" src="/imagenes/proceso_delete.png" /></td>
		</tr>
	{/foreach}
</table>
<div id="proceso">
    <p style="width:570px;">* Si necesita agregar mas de un proceso a un residuo, haga click nuevamente en procesar para generar un nuevo campo de proceso</p>
    <table id="tabla_proceso" width="560" border="0" cellpadding="5" cellspacing="0" id="lista_residuos" style="margin-left:5px;" >
        <tr >
            <td  bgcolor="#A8D8EA" class="td">Cantidad Procesada</td>
            <td  bgcolor="#A8D8EA" class="td">Metodo de proceso</td>
            <td  bgcolor="#A8D8EA" class="td">Fecha de proceso</td>
            <td  bgcolor="#A8D8EA" class="td">Confirmar</td>
            <td  bgcolor="#A8D8EA" class="td">Cancelar</td>
        </tr>

    </table>
 </div>
   </div>
<div align="right" id="acciones"><br />
   <div class='boton_faltante' style="float: left;" id='btn_aceptar_1'><img class="hand" src="/imagenes/boton_finalizar_proceso.gif" /></div>
   <div id='btn_cancelar_1' style="float: right;"><img class="hand" src="/imagenes/boton_cancelar.gif" /></div>
</div>

    </div>
<script>
{literal}
	acciones = new Array();

	acciones['ASIGNAR']    = 'desasignar';
	acciones['DESASIGNAR'] = 'asignar';
        var colores         = new Array();

		colores['#4D90FE'] = '#F7F7F5';
		colores['#A8D8EA'] = '#F7F7F5';
		colores['#EAEAE5'] = '#F7F7F5';
		colores['#F7F7F5'] = '#EAEAE5';

	$("#btn_cerrar_popup_1").click(function(){
		$("#div_popup").hide();
                cerrar();
	});

	$("#btn_cancelar_1").click(function(){

                var r=confirm("los cambios generados en el proceso han sido guardados.Pero recuerde que para dar por finalizado el proceso debe hacer click en el boton finalizar proceso, de otra manera,los datos quedaran guardados pero el mismo no quedara finalizado. \nPrecione ACEPTAR si desea salir de todas maneras o cancelar si desea volver atras.");

                if (r==true)
                  {
                  $("#div_popup").hide();
                 cerrar();
                  }


	});
        tb = 0;
        var fecha_destruccion_pop_instance = [];
        function addProceso(id_residuo, establecimiento_id,nombre_residuo){
            tb = tb+1;
            $("#tabla_proceso").append('<tr id="esto'+tb+'"><td><input class="cantidad" type="text" name="cantidad"/></td><td><select id="metodo" style="width:100px;">{/literal}{$TIPOOPERACION}{literal}</select></td><td><input type="text" class="fecha" id="fecha_destruccion_pop_' + tb + '" name="fecha_destruccion_pop"/></td><td><img  class="imgP" onclick="aceptarProceso(\''+id_residuo+'\',\''+tb+'\',\''+establecimiento_id+'\',\''+nombre_residuo+'\');"  class="hand" src="/imagenes/proceso_check.png" /></td><td><img  class="imgP" onclick="cancelarProceso(\''+tb+'\');" class="hand" src="/imagenes/proceso_delete.png" /></td></tr>');

            fecha_destruccion_pop_instance.push(new Epoch('fecha_destruccion_pop' + tb + '_container', 'popup', document.getElementById('fecha_destruccion_pop_' + tb), 0));
        }

        function cancelarProceso(trid){
            $("#esto"+trid).remove();
        }


        function deleteResiduoProcesado(id_residuo){
             $.ajax({
		   type: "POST",
		   url: "/operacion/operador/operador_proceso.php",
		   data: {accion : "borrar", id_residuo : id_residuo},
		   dataType: "text json",
		   success: function(msg){

                      if(msg != 'OK'){
					alert("Ocurrio un error al borrar el elemento");
				}else{
					alert("El elemento se borro correctamente");
                                        $("#new"+id_residuo).remove();
				}

			   }
		 });
        }



        function aceptarProceso(id_residuo, trid,establecimiento_id, nombre_residuo){

           cantidad =  $("#esto"+trid).find('.cantidad').val();
           metodo =  $("#esto"+trid).find('#metodo').val();
           metodoTexto = $("#esto"+trid).find('#metodo  option:selected').text();
           fecha =  $("#esto"+trid).find('#fecha_destruccion_pop_'+trid).val();



        $.ajax({
		   type: "POST",
		   url: "/operacion/operador/operador_proceso.php",
		   data: {accion : "aceptar",establecimiento_id : establecimiento_id,metodoTexto:metodoTexto, id_residuo : id_residuo,cantidad : cantidad, metodo :  metodo, fecha : fecha,  id : {/literal}{$MANIFIESTO.ID}{literal}},
		   dataType: "text json",
		   success: function(msg){

                      if(msg == 'OK'){
					alert(msg);
				}else{
					alert("Los datos de proceso de residuos se guardaron correctamente.");
                                        color = colores[$('#lista_residuosp> tbody:last').find("td:last").attr("bgcolor")];
                                        if(color == undefined)
                                                color = '#F7F7F5';
                                        datos = '<tr id="new'+msg+'"><td  bgcolor="'+ color +'" class="td"  >'+nombre_residuo+'</td><td  bgcolor="'+ color +'" class="td" >'+cantidad+'</td><td  bgcolor="'+ color +'" class="td" >'+metodoTexto+' </td><td  bgcolor="'+ color +'" class="td" >'+fecha+'</td><td  bgcolor="'+ color +'" class="td" ><img onclick="deleteResiduoProcesado(\''+msg+'\');"  class="imgP" class="hand" src="/imagenes/proceso_delete.png" /></td></tr>';
                                        $('#lista_residuosp> tbody:last').append(datos);
                                        $("#esto"+trid).remove();
				}

			   }
		 });

        }


	$("#btn_aceptar_1").click(function(){
		var residuos_manifiesto_id = new Array();
		var residuos_manifiesto_cantidad_real = new Array();

		$('#lista_residuos').find("input[name^='cant_real_manifiesto_']").each(function(index, value){
			obj = $(value)
			residuos_manifiesto_id.push(obj.attr('name').substr(21));
			residuos_manifiesto_cantidad_real.push(obj.val());
		});

		$.ajax({
		   type: "POST",
                   url: "/operacion/operador/procesar_manifiesto.php",
                   //url: "/operacion/operador/operador_proceso.php",
		   data: {accion : "aceptar",
		   id : {/literal}{$MANIFIESTO.ID}{literal}},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					$("#div_popup").hide();
                                            cerrar();
                                            location.reload();
				}
		   }
		 });
	});
{/literal}
</script>

