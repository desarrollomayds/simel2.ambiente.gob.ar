<div align="center" style="float:left; width:450px; height:35px; background-color:#E9F3F3; ">
	<span class="titulos">Residuos permitidos</span>
	<br />
</div>

<div align="right" style="width:24px; float:left; height:35px;background-color:#E9F3F3">
	<a id='btn_cerrar_2' href='#'><img src="/imagenes/boton_cerrar.png" width="24" height="22" /></a>
</div>

<div style=" background-color:#EAEAE5; padding:5px">
	<table width="480" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_permisos" style="font-size: 12px;">
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

		{foreach $VEHICULO.PERMISOS as $PERMISO}
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

				<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' class='btn_editar_permiso_vehiculo'><img src="/imagenes/editar.png" width="24" height="22" /></a></td>
				<td align="center" bgcolor="{$COLOR_LINEA}"><a href='#' class='btn_borrar_permiso_vehiculo'><img src="/imagenes/borrar.png" width="24" height="22" /></a></td>
			</tr>
		{/foreach}
	</table>

	<table width="480" border="0" cellpadding="5" cellspacing="0" class="tabla">
		<tr>
			<td colspan="7" bgcolor="#EAEAE5"><div align="right"><!--<a id='btn_cerrar_3' href='#'><img src="/imagenes/boton_finalizar.gif" width="91" height="30" /></a>--><img src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_permiso_vehiculo' /></div></td>
		</tr>
	</table>
</div>
{literal}
<script>
	$('#btn_cerrar_2').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_cerrar_3').click(function() {
		$('#div_popup_2').hide();
	})


	//permisos
	function modificar_permiso_vehiculo(permiso){
		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);
		registro_actual.find('#fecha_inicio').html(permiso['FECHA_INICIO']);
		registro_actual.find('#fecha_fin').html(permiso['FECHA_FIN']);

		registro_actual = null;
	}

	function agregar_permiso_vehiculo(permiso){
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
			<td align='center' bgcolor='" + color + "' class='td'><a href='#' class='btn_editar_permiso_vehiculo'><img src='/imagenes/editar.png' width='24' height='22' /></a></td>\
			<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_permiso_vehiculo'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	$('.btn_borrar_permiso_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: "/operacion/generador/alta_sucursales/permiso_vehiculo.php",
		   data: {accion : "baja", vehiculo : "{/literal}{$VEHICULO.ID}{literal}", id : registro_actual.find('#id').html()},
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

	$('.btn_editar_permiso_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: "/operacion/generador/alta_sucursales/permiso_vehiculo.php?vehiculo={/literal}{$VEHICULO.ID}{literal}&id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_3').html(msg);
			$('#div_popup_3').show();
			centerPopup('div_popup_3');
		   }
		 });
	});

	$('#btn_agregar_permiso_vehiculo').click(function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
			type: "GET",
			url: "/operacion/generador/alta_sucursales/permiso_vehiculo.php?vehiculo={/literal}{$VEHICULO.ID}{literal}",
			dataType: "html",
			success: function(msg){
				$('#div_popup_3').html(msg);
				$('#div_popup_3').css("height","300");
				$('#div_popup_3').show();
				centerPopup('div_popup_3');
			}
		});
	});
	//permisos

</script>
{/literal}

