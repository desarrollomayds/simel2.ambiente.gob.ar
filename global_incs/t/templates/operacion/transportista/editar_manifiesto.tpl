<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/base.js"></script>
<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>
<div class="backGrey">

    <div id="mensaje_comprobante_no_valido" style=" background-color:#EAEAE5;width:95%; padding:5px; display: none">
	<strong>COMPROBANTE SIN VALIDEZ</strong>
    </div>
     <div style=" background-color:#EAEAE5; padding:5px;float: left;">
        <span >
            <strong>Empresa Creadora : </strong>{$MANIFIESTO.CREADOR.NOMBRE_EMPRESA}&nbsp;&nbsp;
			<strong>Fecha de Creaci&oacute;n: </strong>{$MANIFIESTO.FECHA_CREACION}
        </span>
		<input type="hidden" value="{$MANIFIESTO.ID}" name="id_man" id="id_man"/>
	</div>
         
        <div class="clear20"></div>
		<div style="overflow: auto;overflow-x: hidden;">

        <br /><span id="titulos">GENERADORES<br /></span><br />

        <table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_generadores">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
	</tr>

	{foreach $GENERADORES as $GENERADOR}
		{if $GENERADOR@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.NOMBRE_EMPRESA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CUIT}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$GENERADOR.CAA_NUMERO} - {$GENERADOR.CAA_VENCIMIENTO}</td>
	</tr>
	{/foreach}
</table>

<br /><span id="titulos">TRANSPORTISTAS<br /></span><br />

<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_transportistas">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
	</tr>

	{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
		{if $TRANSPORTISTA@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.NOMBRE_EMPRESA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CUIT}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
	</tr>
	{/foreach}
</table>

<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla">
	<tr>
            <td colspan="7" bgcolor="#EAEAE5"><div align="right">
            {IF $EXTRA == 'no'}

{ELSE}
<img class="hand" src="{$BASE_PATH}/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_transportista'/>
{/IF}

            </div></td>
	</tr>
</table>

<br /><span id="titulos">VEHICULOS ASIGNADOS<br /></span><br />

<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_vehiculos">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="invisible">Id</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Dominio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Descripci&oacute;n</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Credencial</td>
		<td  width="100" bgcolor="#A8D8EA" class="td">Residuos a Trasladar</td>


	</tr>

	{foreach $VEHICULOS as $VEHICULO}
		{if $VEHICULO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="invisible" id="id">{$VEHICULO.ID}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$VEHICULO.DOMINIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$VEHICULO.DESCRIPCION}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$VEHICULO.CREDENCIAL_SERIE} - {$VEHICULO.CREDENCIAL_NUMERO}</td>
			<td  bgcolor="{$COLOR_LINEA}" class="td"><img src="{$BASE_PATH}/imagenes/autoship.png" class='btn_agregar_vehiculo_residuo hand'/></td>



	</tr>
	{/foreach}
</table>

<table width="100%" border="0" cellpadding="5" cellspacing="0" class="tabla">
	<tr>
            <td colspan="7" bgcolor="#EAEAE5">
                <div align="left" id="anexo">
                 {if $anexo eq 1}
                     {$display = "block"}
                     {else}
                     {$display = "none"}
                 {/if}
                 <div class="hand imprimir_anexo" style="display:{$display}; width:105px;height:25px;padding-left:15px;padding-top:5px;color:white;background-color:grey;">Imprimir Anexo</div>

                 </div>

            <div align="right">

                       {IF $EXTRA == 'no'}

{ELSE}
<img class="hand" src="{$BASE_PATH}/imagenes/boton_agregar.gif" width="91" height="30" id='btn_agregar_vehiculo'/>
{/IF}




            </div></td>
	</tr>
</table>

<br /><span id="titulos">OPERADORES<br /></span><br />

<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_operadores">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Nombre</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Domicilio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Expediente</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Cuit</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Caa</td>
	</tr>

	{foreach $OPERADORES as $OPERADOR}
		{if $OPERADOR@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.NOMBRE_EMPRESA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CUIT}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
	</tr>
	{/foreach}
</table>

{if !$OPERADORES}
<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla">
	<tr>
		<td colspan="7" bgcolor="#EAEAE5"><div align="right"><img src="{$BASE_PATH}/imagenes/boton_buscar.gif" width="91" height="30" id='btn_buscar_operador'/></div></td>
	</tr>
</table>
{/if}

<br /><span id="titulos">RESIDUOS<br /></span><br />

<table width="100%" style="margin-left: 5px;" border="0" cellpadding="5" cellspacing="0" class="tabla" id="lista_residuos">
	<tr>
		<td width="" bgcolor="#A8D8EA" class="td">Tipo Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Cont.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Residuo</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Cantidad Est.</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Unidad</td>
		<td width="80" bgcolor="#A8D8EA" class="td">Estado</td>
	</tr>

	{foreach $RESIDUOS as $RESIDUO}
		{if $RESIDUO@iteration is even by 1}
			{assign var="COLOR_LINEA" value="#EAEAE5"}
		{else}
			{assign var="COLOR_LINEA" value="#F7F7F5"}
		{/if}
	<tr>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CONTENEDOR_}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.RESIDUO}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.UNIDAD_}</td>
		<td bgcolor="{$COLOR_LINEA}" class="td">{$RESIDUO.ESTADO_}</td>
	</tr>
	{/foreach}
</table>

        </div>
    <div class="clear20"></div>
    <div class="contBoton">
          <div class="bottonLeft"  id="btn_aceptar_1">
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="{$BASE_PATH}/imagenes/boton_cancelar.gif" width="91" height="30" data-dismiss="modal"/>
        </div>
    </div>
    <div class="clear20"></div>

    </div>
   <input type="hidden" value="{$MANIFIESTO.ID}" id="mani_id"/>

		{include file='general/popup.tpl' ID_POPUP='mel'}
		{include file='general/popup.tpl' ID_POPUP='vehiculos_por_dominio'}
		{include file='general/popup.tpl' ID_POPUP='alta_temprana'}
		{include file='general/popup.tpl' ID_POPUP='flotas'}

		{include file='general/popup.tpl' ID_POPUP='div_1'}
		{include file='general/popup.tpl' ID_POPUP='div_2'}
		{include file='general/popup.tpl' ID_POPUP='div_3'}
		{include file='general/popup.tpl' ID_POPUP='agregar_vehiculo_residuo_popup'}

		{include file='operacion/popups.tpl'}

{literal}
<script type="text/javascript">

	acciones = new Array();

	acciones['ASIGNAR']    = 'desasignar';
	acciones['DESASIGNAR'] = 'asignar';

	$("#btn_aceptar_1").click(function(){
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/editar_manifiesto.php",
			data: {accion : "grabar", id : $("#mani_id").val() },
			dataType: "text json",
			success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					$("#div_popup").hide();
					cerrar();
				}
			}
		});
	});

	$('.btn_asignar').on('click', function() {
		registro_actual = $(this).parent().parent();
		accion = registro_actual.find('#btn_asignar').html();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/editar_manifiesto.php",
		   data: {accion : accion.toLowerCase(), id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					registro_actual.find('#btn_asignar').html(acciones[accion].toUpperCase());
				}
		   }
		 });
	});

	//transportistas
	function agregar_transportista(transportista){
		color = colores[$('#lista_transportistas> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"  + transportista["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='nombre'>"     + transportista["NOMBRE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='domicilio'>"  + transportista["DOMICILIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='expediente'>" + transportista["EXPEDIENTE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='cuit'>"       + transportista["CUIT"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='caa'>"        + transportista["CAA"] + "</td>\
			<td align='center' bgcolor='" + color + "' ><a href='#' class='btn_borrar_transportista'><img src='/imagenes/borrar.png' width='24' height='22' /></a></td>\
		</tr>";

		$('#lista_transportistas> tbody:last').append(datos);
	}

	$(document).on('click', '.btn_borrar_transportista', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/transportista_edicion.php",
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

	$('#btn_agregar_transportista').click(function() {
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/transportista_edicion.php",

		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').show();
                        $('#div_popup_2').css("width","600");
                        $('#div_popup_2').css("height","380");
                            centerPopup('div_popup_2');
		   }
		 });
	})

	//vehiculos
	function agregar_vehiculo(vehiculo){
		color = colores[$('#lista_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"  + vehiculo["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='nombre'>"     + vehiculo["DOMINIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='descripcion'>"+ vehiculo["DESCRIPCION"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='domicilio'>"  + vehiculo["CREDENCIAL_SERIE"] + "-" + vehiculo["CREDENCIAL_NUMERO"] + "</td>\
			<td  bgcolor='"+color+"' class='td'><img src='/imagenes/autoship.png' onclick='agregartutu();' class=' hand'/></td>\
			<td bgcolor='" + color + "' class='td'><a id='btn_asignar' class='btn_asignar' href='#'>ASIGNAR </a>/ <a class='btn_borrar_vehiculo'>BORRAR</a></td>\</tr>";

		$('#lista_vehiculos> tbody:last').append(datos);
	}


	$('.btn_borrar_vehiculo').on('click', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_edicion.php",
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


	$('.btn_agregar_vehiculo_residuo').click(function() {
	registro_actual = $(this).parent().parent();
	//console.log(registro_actual);
	//alert(registro_actual.find('#id').html());return false;
	vehiculo_id = registro_actual.find('#id').html();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/residuos_transportados.php",
		   data: { id : vehiculo_id},
		   dataType: "html",
		   success: function(msg){
		   		//alert("alert");
		   				$('#mel_popup').html(msg);
						$('#mel_popup').show();
                        $('#mel_popup').css("width","600");
                        $('#mel_popup').css("height","361");
                    
                        centerPopup('div_popup');
				/*$('#agregar_vehiculo_residuo_popup_title').html("Editar Manifiesto");
				$('#agregar_vehiculo_residuo_popup_body').html(msg);
				$('#agregar_vehiculo_residuo_popup_content').width(600);
				 $("#agregar_vehiculo_residuo_popup").show();*/
		    }
		});
	})



	$('#btn_agregar_vehiculo').click(function() {
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/vehiculo_edicion.php",
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').show();
                        $('#div_popup_2').css("width","600");
                         $('#div_popup_2').css("height","361");
                            centerPopup('div_popup_2');
		   }
		 });
	})
	//vehiculos
	//operador
	function establecer_operador(operador){
		$('#lista_operadores').find('tr:gt(0)').remove();

		color = colores[$('#lista_operadores> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"  + operador["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='nombre'>"     + operador["NOMBRE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='domicilio'>"  + operador["DOMICILIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='expediente'>" + operador["EXPEDIENTE"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='cuit'>"       + operador["CUIT"] + "</td>\
			<td bgcolor='" + color + "' class='td' id='caa'>"        + operador["CAA"] + "</td>\
		</tr>";

		$('#lista_operadores> tbody:last').append(datos);

		$('#div_popup_2').hide();
	}

	$('#btn_buscar_operador').click(function() {
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/operador_edicion.php",
		   dataType: "html",
		   success: function(msg){
			$('#div_popup_2').html(msg);
			$('#div_popup_2').show();
                            centerPopup('div_popup_2');
		   }
		 });
	})


	          $('.imprimir_anexo').on('click', function() {
				id = $("#id_man").val();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/operacion/transportista/imprimir_anexo.php",
				   data: {id : id},
				   dataType: "html",
				   success: function(msg){
					$('#div_popup').html("<img style='float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;' onclick='cerrar()' class='hand'  src='/imagenes/boton_cerrar.png' /><div style='width:890px;height:600px;overflow:auto;'>"+msg+"<br/></div>");
					//$('#div_popup').css("display","none");
					$('#div_popup').css("width","910");
					$('#div_popup').css("height","610");
					  centerPopup('div_popup');
					$('#div_popup').printElement();
				   }
				 });
			})

                        function checkAnexo(){
                        id = $("#id_man").val();

				$.ajax({
				   type: "GET",
				   url: mel_path+"/operacion/transportista/checkAnexo.php",
				   data: {id : id,exp:'1'},
				   dataType: "html",
				   success: function(msg){

					if(msg==1){
                                            $(".imprimir_anexo").css("display","block");
                                        }else{
                                             $(".imprimir_anexo").css("display","none");
                                        }

				   }
				 });
                        }

</script>
{/literal}
