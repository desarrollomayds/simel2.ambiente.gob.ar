<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
            VEHICULOS
        </div>
        <div class="imgCerrar" id="btn_cerrar">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="595" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Dominio / Descripci&oacute;n:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text' name='vehiculo_criterio'     id='vehiculo_criterio'     value='' size='50'></label></td>
                        <td><div id='btn_buscar_vehiculos' ><img src="/imagenes/boton_buscar.gif" width="91" height="30" /></div></td>
                </tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="3" align="left" color="red"></td>
		</tr>
	</table> <div class="clear20"></div>

    <table width="580" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="107">Dominio</th>
			<td bgcolor="#A8D8EA" width="107">Descripci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="107">Credencial</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>
	</table>
      <div style="width: 600px;overflow: auto;overflow-x: hidden;height: 150px;">
                 <table width="580" style="margin-left: 5px;text-align: left;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_busqueda_vehiculos">
                     <tr>
                         <td colspan="7" class="invisible"></td>
                     </tr>
                 </table>
         </div>
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
	var colores = new Array();

	colores['#A8D8EA'] = '#F7F7F5';
	colores['#EAEAE5'] = '#F7F7F5';
	colores['#F7F7F5'] = '#EAEAE5';

	function llenar_lista_busqueda_vehiculos(vehiculos){
			$('#lista_busqueda_vehiculos').find('tr:gt(0)').remove();

			for(var indice in vehiculos){
				vehiculo = vehiculos[indice];

				color = colores[$('#lista_busqueda_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td bgcolor='" + color + "' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='credencial'>" + vehiculo["CREDENCIAL_SERIE"] + " - " + vehiculo["CREDENCIAL_NUMERO"] + "</td>\
					<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_agregar_resultado_vehiculo'><img src='/imagenes/boton_agregar.gif'/></a></td>\
				</tr>";

				$('#lista_busqueda_vehiculos> tbody:last').append(datos);
			}

	}

	$('.btn_agregar_resultado_vehiculo').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/vehiculo_edicion.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					//alert(retorno['errores']['alta']);
				}else{
					agregar_vehiculo(retorno['datos']);
				}
		   }
		 });
	});

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
	});
        $('#btn_cerrar2').click(function() {
		$('#div_popup_2').hide();
	});

	$('#btn_buscar_vehiculos').click(function() {
		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/vehiculo_edicion.php",
		   data: {accion : "busqueda", criterio : $('#vehiculo_criterio').val()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					llenar_lista_busqueda_vehiculos(retorno['datos']);
				}
		   }
		 });

	});


</script>
{/literal}