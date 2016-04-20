<div class="backGrey">
   
    <div class="clear20"></div>
    <table width="595" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n social / CUIT :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text' name='transportista_criterio'     id='transportista_criterio'     value='' size='35'></label></td>
                        <td><div id='btn_buscar_transportistas'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="/imagenes/boton_buscar.gif" width="91" height="30" /></div></td>
                </tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="3" align="left" color="red"></td>
		</tr>
	</table>

        <div class="clear20"></div>
        <table width="590" border="0" cellpadding="5" cellspacing="0" class="tabla" style="margin-left: 5px;">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="90">Raz&oacute;n social</th>
			<td bgcolor="#A8D8EA" width="107">Cuit</th>
			<td bgcolor="#A8D8EA" width="107">Provincia</th>
			<td bgcolor="#A8D8EA" width="107">Localidad</th>
			<td bgcolor="#A8D8EA" width="107">Domicilio</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>
	</table>
        <div style="width: 600px;overflow: auto;overflow-x: hidden;height: 150px;">
                 <table width="580" style="margin-left: 5px;text-align: left;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_busqueda_transportistas">
                     <tr>
                         <td colspan="7" class="invisible"></td>
                     </tr>
                 </table>
        </div>
       <div class="clear20"></div>
    <div class="contBoton">

        <div class="bottonRight">

            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>
    <div class="clear20"></div>
    </div>
{literal}
<script>
	var colores = new Array();

	colores['#A8D8EA'] = '#F7F7F5';
	colores['#EAEAE5'] = '#F7F7F5';
	colores['#F7F7F5'] = '#EAEAE5';

	function llenar_lista_busqueda_transportistas(transportistas){
			$('#lista_busqueda_transportistas').find('tr:gt(0)').remove();

			for(var indice in transportistas){
				transportista = transportistas[indice];

				color = colores[$('#lista_busqueda_transportistas> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td bgcolor='" + color + "' class='invisible' id='id'>" + transportista["ID"] + "</td>\
					<td bgcolor='" + color + "' width='90' class='td' id='nombre'>"    + transportista["NOMBRE_EMPRESA"] + "</td>\
					<td bgcolor='" + color + "' width='107' class='td' id='cuit'>"      + transportista["CUIT"] + "</td>\
					<td bgcolor='" + color + "' width='107' class='td' id='provincia'>" + transportista["PROVINCIA_"] + "</td>\
					<td bgcolor='" + color + "' width='107' class='td' id='localidad'>" + transportista["LOCALIDAD_"] + "</td>\
					<td bgcolor='" + color + "' width='107' class='td' id='direccion'>" + transportista["CALLE"] + " - " + transportista["NUMERO"] + " - " + transportista["PISO"] + "</td>\
					<td align='center' bgcolor='" + color + "' width='90' ><div class='btn_agregar_resultado_transportista hand'><img src='/imagenes/boton_agregar.gif'/></div></td>\
				</tr>";

				$('#lista_busqueda_transportistas> tbody:last').append(datos);
			}

	}

	$('.btn_agregar_resultado_transportista').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/transportista.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					//alert(retorno['errores']['alta']);
				}else{
					agregar_transportista(retorno['datos']);
				}
		   }
		 });
	});

	$('#btn_buscar_transportistas').click(function() {
		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/transportista.php",
		   data: {accion : "busqueda", criterio : $('#transportista_criterio').val()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					llenar_lista_busqueda_transportistas(retorno['datos']);
				}
		   }
		 });

	});


</script>
{/literal}