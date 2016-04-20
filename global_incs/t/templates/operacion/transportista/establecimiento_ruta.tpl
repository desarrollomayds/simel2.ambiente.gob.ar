<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
           GENERADORES
        </div>
        <div class="imgCerrar" onclick="cerrar2();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="590" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="" height="25" align="right" bordercolor="#EAEAE5">Raz&oacute;n social / CUIT :</td>
			<td width="" bordercolor="#EAEAE5"><label><input type='text' name='establecimiento_criterio'     id='establecimiento_criterio'     value='' size='40'></label></td>
            <td><div id='btn_buscar_establecimientos' ><img class="hand" src="/imagenes/boton_buscar.gif" width="91" height="30" /></div></td>
                </tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="3" align="left" color="red"></td>
		</tr>
	</table>
     <div class="clear20"></div>
     <table width="590" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" >
		<tr>
			<td bgcolor="#A8D8EA" width="" class="invisible">Id</th>
			<td bgcolor="#A8D8EA" width="107">Raz&oacute;n social</th>
			<td bgcolor="#A8D8EA" width="107">Cuit</th>
			<td bgcolor="#A8D8EA" width="107">Provincia</th>
			<td bgcolor="#A8D8EA" width="107">Localidad</th>
			<td bgcolor="#A8D8EA" width="107">Domicilio</th>
			<td bgcolor="#A8D8EA" width="60" align="center">&nbsp;</td>
		</tr>
	</table>
      <div style="width: 600px;overflow: auto;overflow-x: hidden;height: 150px;">
                 <table width="580" style="margin-left: 5px;text-align: left;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_busqueda_establecimientos">
                     <tr>
                         <td colspan="7" class="invisible"></td>
                     </tr>
                 </table>
        </div>
     <div class="clear20"></div>
    <div class="contBoton" >

        <div class="bottonRight" id="btn_cerrar1">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>
    <div class="clear20"></div>
    </div>



{literal}
<script>
    $("#btn_cerrar_popup_2").click(function(){
		$("#div_popup2").hide();
	});
        $('#btn_cerrar1').click(function() {
		$('#div_popup_2').hide();
	});

        function cerrar2(){
            $('#div_popup_2').hide();
        }

	var colores = new Array();

	colores['#A8D8EA'] = '#F7F7F5';
	colores['#EAEAE5'] = '#F7F7F5';
	colores['#F7F7F5'] = '#EAEAE5';

	function llenar_lista_busqueda_establecimientos(establecimientos){
			$('#lista_busqueda_establecimientos').find('tr:gt(0)').remove();

			for(var indice in establecimientos){
				establecimiento = establecimientos[indice];

				color = colores[$('#lista_busqueda_establecimientos> tbody:last').find("td:last").attr("bgcolor")];
				if(color == undefined)
					color = '#F7F7F5';

				datos = "\
				<tr>\
					<td bgcolor='" + color + "' class='invisible' id='id'>" + establecimiento["ID"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='nombre'>"    + establecimiento["NOMBRE_EMPRESA"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='cuit'>"      + establecimiento["CUIT"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='provincia'>" + establecimiento["PROVINCIA_"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='localidad'>" + establecimiento["LOCALIDAD_"] + "</td>\
					<td bgcolor='" + color + "' class='td' id='direccion'>" + establecimiento["CALLE"] + " - " + establecimiento["NUMERO"] + " - " + establecimiento["PISO"] + "</td>\
					<td align='center' bgcolor='" + color + "' ><div onclick='cerrar2();' class='btn_agregar_resultado_establecimiento hand'><img src='/imagenes/boton_agregar.gif'/><div></td>\
				</tr>";

				$('#lista_busqueda_establecimientos> tbody:last').append(datos);
			}

	}

/*	$('.btn_agregar_resultado_establecimiento').live('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/establecimiento_ruta.php",
		   data: {accion : "alta", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					agregar_establecimiento_ruta(retorno['datos']);
				}
		   }
		 });
	});*/

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
	});

	$('#btn_buscar_establecimientos').click(function() {
		$.ajax({
		   type: "POST",
		   url: "/operacion/transportista/establecimiento_ruta.php",
		   data: {accion : "busqueda", criterio : $('#establecimiento_criterio').val()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['busqueda']);
				}else{
					llenar_lista_busqueda_establecimientos(retorno['datos']);
				}
		   }
		 });

	})


</script>
{/literal}