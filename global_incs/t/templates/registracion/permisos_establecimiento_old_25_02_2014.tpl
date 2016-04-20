<div class="backGrey" style="width: 695px;">
    <div class="headerPopUp">
        <div class="textLeft">
           RESIDUOS PERMITIDOS
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <div style="width: 690px;height: 130px;overflow: auto;overflow-x: hidden">
    <table style="font-size: 11px;margin-left: 5px;" width="670" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_permisos">

            <tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="">Residuo</th>
			<td bgcolor="#A8D8EA" width="">Estado</th>
			<td bgcolor="#A8D8EA" width="">Cantidad</th>
			<td bgcolor="#A8D8EA" width="">Fecha de inicio</th>
			<td bgcolor="#A8D8EA" width="">Fecha de finalizaci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="73" align="center" class="td">Editar</td>
			<td bgcolor="#A8D8EA" width="60" align="center">Borrar</td>
		</tr>

		{foreach $ESTABLECIMIENTO.PERMISOS as $PERMISO}
			{if $PERMISO@iteration is even by 1}
				{assign var="COLOR_LINEA" value="#EAEAE5"}
			{else}
				{assign var="COLOR_LINEA" value="#F7F7F5"}
			{/if}
		<tr>
				<td bgcolor="{$COLOR_LINEA}" width="" id='id' class='invisible'>{$PERMISO.ID}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='residuo'>{$PERMISO.RESIDUO}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='estado'>{$PERMISO.ESTADO_}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='cantidad'>{$PERMISO.CANTIDAD}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='fecha_inicio'>{$PERMISO.FECHA_INICIO}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='fecha_fin'>{$PERMISO.FECHA_FIN}</td>

				<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' class='btn_editar_permiso_establecimiento'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/editar.png" width="24" height="22" /></a></td>
				<td align="center" bgcolor="{$COLOR_LINEA}"><a href='#' class='btn_borrar_permiso_establecimiento'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/borrar.png" width="24" height="22" /></a></td>
			</tr>
		{/foreach}
	</table>
        </div>
 <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_agregar_permiso_establecimiento' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_agregar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_finalizar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>

</div>
{literal}
<script>
	$('#btn_cerrar').click(function() {
		$('#div_popup').hide();
		$('#bigscreen').hide();
	})


	//permisos
	function modificar_permiso_establecimiento(permiso){
		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);
		registro_actual.find('#fecha_inicio').html(permiso['FECHA_INICIO']);
		registro_actual.find('#fecha_fin').html(permiso['FECHA_FIN']);

		registro_actual = null;
	}

	function agregar_permiso_establecimiento(permiso){
		color = colores[$('#lista_permisos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>" + permiso["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='residuo'>" + permiso["RESIDUO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='estado'>" + permiso["ESTADO_"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='cantidad'>" + permiso["CANTIDAD"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='fecha_inicio'>" + permiso["FECHA_INICIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='fecha_fin'>" + permiso["FECHA_FIN"] + "</td>\
			<td align='center' bgcolor='" + color + "' class='td'><a href='#' class='btn_editar_permiso_establecimiento'><img src='/imagenes/editar.png' width='24' height='22' /></a></td>\
			<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_permiso_establecimiento'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	$('.btn_borrar_permiso_establecimiento').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: "/registracion/permiso_establecimiento.php",
		   data: {accion : "baja", establecimiento: "{/literal}{$ESTABLECIMIENTO.ID}{literal}", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

	$('.btn_editar_permiso_establecimiento').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: "/registracion/permiso_establecimiento.php?establecimiento={/literal}{$ESTABLECIMIENTO.ID}{literal}&id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').show();
                         $('#div_popup_2').css("width","600");

				$('#bigscreen').css("display","block");
				centerPopup('div_popup_2');




		   }
		 });
	});

	$('#btn_agregar_permiso_establecimiento').click(function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
			type: "GET",
			url: "/registracion/permiso_establecimiento.php?establecimiento={/literal}{$ESTABLECIMIENTO.ID}{literal}",
			dataType: "html",
			success: function(msg){
				$('#div_popup_2').html(msg);
				$('#div_popup_2').show();
                                 $('#div_popup_2').css("width","600");
				$('#div_popup_2').css("height","300");

				$('#bigscreen').css("display","block");
				centerPopup('div_popup_2');






			}
		});
	});
	//permisos

</script>
{/literal}

    </div>