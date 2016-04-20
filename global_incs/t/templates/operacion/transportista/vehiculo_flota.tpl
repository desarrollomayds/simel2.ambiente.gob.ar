<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
          VEHICULOS
        </div>

    </div>
    <div class="clear20"></div>

    <div align="right">
        <button type="button" class="btn btn-success btn-sm" id='btn_buscar_vehiculos'>Buscar</button>
	</div>

	<br>
	<br>
        <table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla">
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="107">Dominio</th>
			<td bgcolor="#A8D8EA" width="107">Descripci&oacute;n</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>
	</table>
         
                 <table width="100%" style="margin-left: 5px;text-align: left;" border="0" cellpadding="5" cellspacing="0" class="tabla"  id="lista_busqueda_vehiculos2">
                     <tr>
                         <td colspan="7" class="invisible"></td>
                     </tr>
                 </table>
       

    <div style="text-align: center;">
		<!--
		<input class="btn btn-success btn-sm" type="button" data-dismiss="modal" id='btn_aceptar_1' value="Aceptar" style="margin: 15px;"/>-->
		<input class="btn btn-danger btn-sm" type="button" data-dismiss="modal" id="btn_cancelar" value="Cancelar" style="margin: 15px;"/>
	</div>
	<!--
    <div class="contBoton" >
        <div class="bottonLeft" onclick="cerrar2();" >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight" onclick="cerrar2();">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>-->
    <div class="clear20"></div>

    </div>
{literal}
<script>
    function cerrar2(){
        $('#div_popup_2').hide();
    }


	var colores = new Array();

	colores['#A8D8EA'] = '#F7F7F5';
	colores['#EAEAE5'] = '#F7F7F5';
	colores['#F7F7F5'] = '#EAEAE5';

	function llenar_lista_busqueda_vehiculos(vehiculos){
			$('#lista_busqueda_vehiculos2').find('tr:gt(0)').remove();

			for(var indice in vehiculos){
				vehiculo = vehiculos[indice];

				color = colores[$('#lista_busqueda_vehiculos2> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td bgcolor='" + color + "' class='invisible' id='id'>" + vehiculo["ID"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DOMINIO"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='dominio'>"    + vehiculo["DESCRIPCION"] + "</td>\
					<td align='center' bgcolor='" + color + "' ><div><button type='button' class='btn btn-success btn-xs' id='btn_agregar_resultado_vehiculo' data-dismiss='modal' onclick='btn_agregar_resultado_vehiculo(" + vehiculo["ID"] + ")'>Agregar</button></div></td>\
				</tr>";

				$('#lista_busqueda_vehiculos2> tbody:last').append(datos);
			}

	}
function btn_agregar_resultado_vehiculo(vehiculo){
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "alta", id : vehiculo},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					mostrarMensaje("exclamation-triangle", retorno['errores']['alta'], "error");
				}else{
					agregar_vehiculo_flota(retorno['datos']);
				}
		   }
		 });
}

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
	});

	$('#btn_buscar_vehiculos').click(function() {
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "busqueda", criterio : $('#vehiculo_criterio').val()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					//console.log(retorno['datos']);
					llenar_lista_busqueda_vehiculos(retorno['datos']);
				}
		   }
		 });

	})


</script>
{/literal}