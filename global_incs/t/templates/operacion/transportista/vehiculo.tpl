<div class="backGrey">

    <div class="clear20"></div>
    <table width="595" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Dominio / Descripci&oacute;n:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text' name='vehiculo_criterio'     id='vehiculo_criterio'     value='' size='35'></label></td>
                        <td><div id='btn_buscar_vehiculos'><img class="hand" style="text-decoration: none;margin: 0;padding: 0;border: 0;outline: 0;" src="{$BASE_PATH}/imagenes/boton_buscar.gif" width="91" height="30" /></div></td>
                </tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="3" align="left" color="red"></td>
		</tr>
	</table>
    <div class="clear20"></div>
    <table width="590" border="0" cellpadding="5" cellspacing="0" class="tabla" style="margin-left: 5px;text-align: left;">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="107">Dominio</th>
			<td bgcolor="#A8D8EA" width="107">Descripci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="107">Credencial</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>
	</table>
        <div style="width: 600px;overflow: auto;overflow-x: hidden;height: 150px;">
                 <table width="590" style="margin-left: 5px;text-align: left;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_busqueda_vehiculos">
                     <tr>
                         <td colspan="7" class="invisible"></td>
                     </tr>
                 </table>
        </div>
       <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonRight">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_cancelar.gif" width="91" height="30" data-dismiss="modal"/>
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

	$('.btn_agregar_resultado_vehiculo').on('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){

					//alert(retorno['datos']);
				}else{
					agregar_vehiculo(retorno['datos']);
				}
		   }
		 });
	});

	$('#btn_buscar_vehiculos').click(function() {
		console.log("vehiculo:"+$('#vehiculo_criterio').val());
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo.php",
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
	})

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
				<td bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
				<td bgcolor='" + color + "' width='107' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
				<td bgcolor='" + color + "' width='107' class='td' id='credencial'>" + vehiculo["CREDENCIAL_SERIE"] + " - " + vehiculo["CREDENCIAL_NUMERO"] + "</td>\
				<td align='center' bgcolor='" + color + "' width='60' ><div class='btn_agregar_resultado_vehiculo hand'><img src='"+base_path+"/imagenes/boton_agregar.gif' data-dismiss='modal'/></div></td>\
			</tr>";

			$('#lista_busqueda_vehiculos> tbody:last').append(datos);
		}
	}

</script>
{/literal}