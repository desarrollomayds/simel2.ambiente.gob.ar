<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
          DATOS DE LA FLOTA
        </div>


    </div>
    <div class="clear20"></div>
    <button type="button" id='btn_agregar_vehiculo' class="btn btn-success"style="float:right;">
            <i class="fa fa-truck icon-large"></i> Agregar vehiculo
    </button>

        <div class="clear20"></div>
        <table width="100%" border="0" cellpadding="5" cellspacing="0" id="lista_vehiculos">
	<tr>
		<td width="100" bgcolor="#A8D8EA" class="invisible">Id</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Dominio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Descripci&oacute;n</td>
		<td width="25"  bgcolor="#A8D8EA" class="td">&nbsp;</td>
	</tr>

	{foreach $FLOTA.VEHICULOS as $VEHICULO}
		{if $VEHICULO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$VEHICULO.ID}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$VEHICULO.DOMINIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$VEHICULO.DESCRIPCION}</td>
		<td width="25" align="center" bgcolor="{$COLOR_LINEA}"><a class='btn_borrar_vehiculo'><span title='Eliminar Flota' class='fa fa-times'></span></a></td>
	</tr>
	{/foreach}
</table>
<table id="lista_vehiculos2" width="100%" border="0" cellpadding="5">
	<tr>
		<td width="100" class="invisible"></td>
		<td width="100" class="td"></td>
		<td width="100" class="td"></td>
		<td width="25" class="td"></td>
	</tr>
</table>

 <div class="clear20"></div>

    <div style="text-align: center;">
		<input class="btn btn-success btn-sm" type="button" data-dismiss="modal" id='btn_aceptar_1' value="Aceptar" style="margin: 15px;"/>
		<input class="btn btn-danger btn-sm" type="button" data-dismiss="modal" id="btn_cancelar" value="Cancelar" style="margin: 15px;"/>
	</div>

    <div class="clear20"></div>

    </div>
<script>
{literal}



	function agregar_vehiculo_flota(vehiculo){
		
		color = colores[$('#lista_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr id='" + vehiculo["ID"] + "'>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"    + vehiculo["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + vehiculo["DOMINIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + vehiculo["DESCRIPCION"] + "</td>\
			<td align='center' bgcolor='" + color + "' ><a onclick='btn_borrar_vehiculo(" + vehiculo["ID"] + ")'><span title='Eliminar Flota' class='fa fa-times'></span></a></td>\
		</tr>";

		$('#lista_vehiculos2> tbody:last').append(datos);
	}

	$("#btn_agregar_vehiculo").click(function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   dataType: "html",
		   success: function(retorno){
				 BootstrapDialog.show({
		            title: 'Buscar  Veh&iacute;culo',
		            message: $(retorno),
		        });
		   	/*
		   		$('#div_2_popup_title').html("Agregar vehiculo");
				$('#div_2_popup_body').html(retorno);
				$('#div_2_popup_content').width(600);
				$('#div_2_popup').modal('show');*/
		   }

		 });
	});

	$(".btn_borrar_vehiculo").on('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

	function btn_borrar_vehiculo(vehiculo){
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "baja", id : vehiculo},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					$("#" + vehiculo).remove();
				}
		   }
		 });
	};
		//operador
{/literal}
</script>