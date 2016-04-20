<!--
<div  style="float:left; width:455px; height:35px; background-color:#E9F3F3; ">
	<p class="titulos">Veh&iacute;culos registrados</p>

</div>

<div  style="width:24px; float:left; height:35px;background-color:#E9F3F3">
	 <a id='btn_cerrar' href='#'><img src="/imagenes/boton_cerrar.png" width="24" height="22" /></a>
</div>-->
<table style="font-size: 11px;" width="495" border="0" cellpadding="5" cellspacing="0" class="tabla" id="nombre_en_conflicto">
	 <tr>
                <td colspan="8" height="25" align="center" class="titulos" bordercolor="#E9F3F3" style="background-color:#E9F3F3;"><div style="float: left;">Veh&iacute;culos registrados</div><a i='btn_cerrar' style="float: right;" onclick="cerrar()" href='#'><img style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;"  src="/imagenes/boton_cerrar.png" width="24" height="22" /></a></td>
            </tr>
            </table>



<div style=" background-color:#EAEAE5; padding:5px">
	<table width="480" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_vehiculos">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="">Dominio</th>
			<td bgcolor="#A8D8EA" width="">Descripci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="73" align="center" class="td">Permisos</td>
			<td bgcolor="#A8D8EA" width="73" align="center" class="td">Editar</td>
			<td bgcolor="#A8D8EA" width="60" align="center">Borrar</td>
		</tr>

		{foreach $ESTABLECIMIENTO.VEHICULOS as $VEHICULO}
			{if $VEHICULOS@iteration is even by 1}
				{assign var="COLOR_LINEA" value="#EAEAE5"}
			{else}
				{assign var="COLOR_LINEA" value="#F7F7F5"}
			{/if}
		<tr>
				<td bgcolor="{$COLOR_LINEA}" width="" id='id' class='invisible'>{$VEHICULO.ID}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='dominio'>{$VEHICULO.DOMINIO}</td>
				<td bgcolor="{$COLOR_LINEA}" width="" id='descripcion'>{$VEHICULO.DESCRIPCION}</td>

				<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' class='btn_permisos_vehiculo'><img src="/imagenes/editar.png" width="24" height="22" /></a></td>
				<td align="center" bgcolor="{$COLOR_LINEA}" class="td"><a href='#' class='btn_editar_vehiculo'><img src="/imagenes/editar.png" width="24" height="22" /></a></td>
				<td align="center" bgcolor="{$COLOR_LINEA}"><a href='#' class='btn_borrar_vehiculo'><img src="/imagenes/borrar.png" width="24" height="22" /></a></td>
			</tr>
		{/foreach}
	</table>

	<table width="480" border="0" cellpadding="5" cellspacing="0" class="tabla">
		<tr>
			<td colspan="7" bgcolor="#EAEAE5"><div align="right"><img onclick="cerrar()" src="/imagenes/boton_finalizar.gif" width="91" height="30" /><img src="/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_vehiculo' /></div></td>
		</tr>
	</table>
</div>
{literal}
<script>
	$('#btn_cerrar').click(function() {
		$('#div_popup').hide();
                    $('#bigscreen').hide();
	})


	//permisos
	function modificar_vehiculo(vehiculo){
		registro_actual.find('#dominio').html(vehiculo['DOMINIO']);
		registro_actual.find('#tipo_vehiculo').html(vehiculo['TIPO_VEHICULO']);
		registro_actual.find('#tipo_caja').html(vehiculo['TIPO_CAJA']);
		registro_actual.find('#descripcion').html(vehiculo['DESCRIPCION']);

		registro_actual = null;
	}

	function agregar_vehiculo(vehiculo){
		color = colores[$('#lista_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='dominio'>" + vehiculo["DOMINIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='tipo_vehiculo'>" + vehiculo["TIPO_VEHICULO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='tipo_caja'>" + vehiculo["TIPO_CAJA"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='descripcion'>" + vehiculo["DESCRIPCION"] + "</td>\
			<td align='center' bgcolor='" + color + "' class='td'><a href='#' class='btn_permisos_vehiculo'><img src='/imagenes/editar.png' width='24' height='22' /></a></td>\
			<td align='center' bgcolor='" + color + "' class='td'><a href='#' class='btn_editar_vehiculo'><img src='/imagenes/editar.png' width='24' height='22' /></a></td>\
			<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_vehiculo'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
		</tr>";

		$('#lista_vehiculos> tbody:last').append(datos);
	}

	$('.btn_borrar_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: "/operacion/generador/alta_sucursales/vehiculo.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
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

	$('.btn_permisos_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: "/operacion/generador/alta_sucursales/permisos_vehiculo.php?id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').css("height","280");
			$('#div_popup_2').show();
			centerPopup('div_popup_2');

		   }
		 });
	});

	$('.btn_editar_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: "/operacion/generador/alta_sucursales/vehiculo.php?id=" + registro_actual.find('#id').html(),
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').css("height","200");
			$('#div_popup_2').show();
			centerPopup('div_popup_2');

		   }
		 });
	});

	$('#btn_agregar_vehiculo').click(function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
			type: "GET",
			url: "/operacion/generador/alta_sucursales/vehiculo.php",
			dataType: "html",
			success: function(msg){
				$('#div_popup_2').html(msg);
				$('#div_popup_2').css("height","180");
				$('#div_popup_2').show();
				centerPopup('div_popup_2');
			}
		});
	});
	//permisos

</script>
{/literal}

