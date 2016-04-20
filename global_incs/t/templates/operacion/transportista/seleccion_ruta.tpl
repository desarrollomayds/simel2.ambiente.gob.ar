<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            RUTAS
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
      {if !empty($RUTAS) }
    <table width="590" style="margin-left:5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_busqueda_rutas">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="107">Descripci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>

		{foreach $RUTAS as $RUTA}
			{if $RUTA@iteration is even by 1}
				{assign var="COLOR_LINEA" value="#EAEAE5"}
			{else}
				{assign var="COLOR_LINEA" value="#F7F7F5"}
			{/if}
		<tr>
			<td width="77" height="20" align="center" valign="middle" bgcolor="{$COLOR_LINEA}" class="invisible" id='id'>{$RUTA.ID}</td>
			<td width="400" height="20" align="left" valign="middle" bgcolor="{$COLOR_LINEA}" class="td">{$RUTA.DESCRIPCION}</td>
			<td width="25" align="left" bgcolor="{$COLOR_LINEA}" class="td"><div onclick='cerrar();' class='btn_asignar_ruta_resultado hand'><img src="/imagenes/boton_aceptar.gif"/></div></td>
		</tr>
		{/foreach}

	</table>
{else}
NO HAY RUTAS QUE MOSTRAR
{/if}

    </div>
  <div class="clear20"></div>
    <div class="contBoton">
          <div class="bottonLeft"  onclick="cerrar();">
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight" onclick="cerrar();">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>
    <div class="clear20"></div>
{literal}
<script>

	$('.btn_asignar_ruta_resultado').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/seleccion_ruta.php",
		   data: {id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					asignar_ruta(retorno['datos']);
					$('#div_popup').hide();
					$('#bigscreen').hide();
				}
		   }
		 });
	});

	$('#btn_cerrar').click(function() {
		$('#div_popup').hide();
	})
</script>
{/literal}