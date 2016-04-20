<div align="center" style="float:left; width:455px; height:15px; background-color:#E9F3F3; padding:10px">
	<span class="titulos">Operadores</span>
	<br />
</div>

<div align="right" style="width:24px; float:left; height:35px;background-color:#E9F3F3">
	<a id='btn_cerrar' href='#'><img src="/imagenes/boton_cerrar.png" width="24" height="22" /></a>
</div>


<div style=" background-color:#EAEAE5; padding:5px">
	<table width="475" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n social / CUIT :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text' name='operador_criterio'     id='operador_criterio'     value='' size='50'></label></td>
		</tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>

	<div align="right">
		<a id='btn_buscar_operadores'  href='#'><img src="/imagenes/boton_buscar.gif" width="91" height="30" /></a>
	</div>

	<br>
	<br>
	<table width="455" border="0" cellpadding="2" cellspacing="0" class="tabla" id="lista_busqueda_operadores">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="">Raz&oacute;n social</th>
			<td bgcolor="#A8D8EA" width="">Cuit</th>
			<td bgcolor="#A8D8EA" width="">Provincia</th>
			<td bgcolor="#A8D8EA" width="">Localidad</th>
			<td bgcolor="#A8D8EA" width="">Domicilio</th>
			<td bgcolor="#A8D8EA" width="" align="center">&nbsp;</td>
		</tr>
	</table>
</div>
{literal}
<script>
	var colores = new Array();

	colores['#A8D8EA'] = '#F7F7F5';
	colores['#EAEAE5'] = '#F7F7F5';
	colores['#F7F7F5'] = '#EAEAE5';

	function llenar_lista_busqueda_operadores(operadores){
			$('#lista_busqueda_operadores').find('tr:gt(0)').remove();

			for(var indice in operadores){
				operador = operadores[indice];

				color = colores[$('#lista_busqueda_operadores> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td bgcolor='" + color + "' class='invisible' id='id'>" + operador["ID"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='nombre'>"    + operador["NOMBRE_EMPRESA"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='cuit'>"      + operador["CUIT"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='provincia'>" + operador["PROVINCIA_"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='localidad'>" + operador["LOCALIDAD_"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='direccion'>" + operador["CALLE"] + " - " + operador["NUMERO"] + " - " + operador["PISO"] + "</td>\
					<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_establecer_resultado_operador'><img src='/imagenes/boton_aceptar.gif'/></a></td>\
				</tr>";

				$('#lista_busqueda_operadores> tbody:last').append(datos);
			}

	}

	$('.btn_establecer_resultado_operador').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/operador_edicion.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['alta']);
				}else{
					establecer_operador(retorno['datos']);
				}
		   }
		 });
	});

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_buscar_operadores').click(function() {
		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/operador_edicion.php",
		   data: {accion : "busqueda", criterio : $('#operador_criterio').val()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					llenar_lista_busqueda_operadores(retorno['datos']);
				}
		   }
		 });

	})


</script>
{/literal}

