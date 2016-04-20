<script type="text/javascript" src="{$BASE_PATH}/javascript/operacion/transportista.js"></script>

{if $ROL == '1'}
	{assign var = tipo value='generador'}
	{assign var = addon value="0"}
{elseif $ROL == '2'}
	{assign var = tipo value='transportista'}
{elseif $ROL == '3'}
	{assign var = tipo value='operador'}
{/if}
{assign var = usuario_actual value="ESTADO_{$tipo|upper}"}

{include file='general/popup.tpl' ID_POPUP='mel'}
{include file='general/popup.tpl' ID_POPUP='asignar_flota'}
{include file='general/popup.tpl' ID_POPUP='asignar_vehiculo'}

{include file='operacion/popups.tpl'}

<div class="headerPopUp" style="padding:6px;">
	OPERAR CON EL MANIFIESTO SELECCIONADO
</div>

<div class="alert alert-info" role="alert" style="display:none;" id="mensaje_slop_con_barcaza">
	Al elegir una barcaza est&aacute; indicando que este manifiesto tendr&aacute; otros manifiestos SLOP relacionados, en los cuales se indican los transportistas y veh&iacute;culos que participar&aacute;n.
</div>

<div id="mensaje_comprobante_no_valido" style=" background-color:#EAEAE5;width:95%; padding:5px; display: none">
	<strong>COMPROBANTE SIN VALIDEZ</strong>
</div>
 
<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Informaci&oacute;n del Manifiesto</p>
	<table class="table table-hover table-striped">
		<tbody>
			<tr>
				<td><b>Empresa Creadora:</b></td>
				<td>{$MANIFIESTO.CREADOR.NOMBRE_EMPRESA}</td>
			</tr>
			<tr>
				<td><b>Fecha de Creaci&oacute;n</b></td>
				<td>{$MANIFIESTO.FECHA_CREACION}</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $GENERADORES as $KEY => $GENERADOR}
				<tr>
					{if $ESTADO_GENERADOR[$KEY] == "a"}
						<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
					{elseif $ESTADO_GENERADOR[$KEY] == "p"}
						<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
					{/if}
					<td>{$GENERADOR.NOMBRE}</td>
					<td>{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
					<td>{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
					<td>{$GENERADOR.CUIT}</td>
					<td>{$GENERADOR.CAA_NUMERO} - {$GENERADOR.CAA_VENCIMIENTO}</td>
				</tr>
			{* esto solo puede ocurrir siendo un manif simple resolucion 544/94 *}
			{foreachelse}
				{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SIMPLE_RES_544_94}
					<td colspan="6">Resoluci&oacute;n 544/94</td>
				{/if}
			{/foreach}
		</div>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportistas</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $TRANSPORTISTAS as $TRANSPORTISTA}
				<tr>
					{if $ESTADO_TRANSPORTISTA == "a"}
						<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
					{elseif $ESTADO_TRANSPORTISTA == "p"}
						<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
					{/if}
					<td>{$TRANSPORTISTA.NOMBRE}</td>
					<td>{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
					<td>{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
					<td>{$TRANSPORTISTA.CUIT}</td>
					<td>{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example" id="tabla_vehiculos">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culos Asignados</p>
	<table class="table table-hover table-striped" id="lista_vehiculos">
		<thead>
			<tr>
				<td class="invisible">Id</td>
				<td>Dominio</td>
				<td>Tipo</td>
				<td>Tipo Caja</td>
				<td>Descripci&oacute;n</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			{foreach $VEHICULOS as $VEHICULO}
				<tr>
					<td class="invisible" id="id">{$VEHICULO.ID}</td>
					<td>{$VEHICULO.DOMINIO}</td>
					<td>{$VEHICULO.TIPO_VEHICULO}</td>
					<td>{$VEHICULO.TIPO_CAJA}</td>
					<td>{$VEHICULO.DESCRIPCION}</td>
					<td><i class="fa fa-truck fa-2x"></i></td>	
				</tr>
			{foreachelse}
				<tr>
					<td id="vehiculos_no_asignados" colspan="6">A&uacute;n no se han asignado veh&iacute;culos.</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>

</div>
{if !$VEHICULOS && $tipo == 'transportista'}
<table style="margin:6px;" cellpadding="5" cellspacing="5" border="0" width="99%">
<tr><td style="text-align: right;">
	<div id="seleccion_vehiculos">
		<div class="buscar_button">
			<button type="button" class="btn btn-success btn-sm" id='btn_asignar_vehiculo2' data-target="#mel_popup">Buscar  Veh&iacute;culo</button>
			{if $MANIFIESTO.TIPO_MANIFIESTO != TipoManifiesto::SLOP}
				<button type="button" class="btn btn-success btn-sm" id='btn_asignar_flota2' data-target="#mel_popup">Buscar Flota</button>
			{/if}
		</div>
	</div>
</td></tr>
</table>
{/if}


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Estado</td>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			{foreach $OPERADORES as $OPERADOR}
				{if $OPERADOR@iteration is even by 1}
					{assign var="COLOR_LINEA" value="#EAEAE5"}
				{else}
					{assign var="COLOR_LINEA" value="#F7F7F5"}
				{/if}
			<tr>
				{if $ESTADO_OPERADOR == "a"}
					<td><div style="color:green">Aprobado <i class="fa fa-thumbs-o-up"></i><div></td>
				{elseif $ESTADO_OPERADOR == "p"}
					<td>Esperando aprobaci&oacute;n <i class="fa fa-refresh fa-spin"></i></td>
				{/if}
				<td>{$ACEPTADO_OPERADOR} - {$OPERADOR.NOMBRE}</td>
				<td>{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
				<td>{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
				<td>{$OPERADOR.CUIT}</td>
				<td>{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
			</tr>
			{/foreach}
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Tipo Cont.</td>
				<td>Cantidad Cont.</td>
				<td>Residuo</td>
				<td>Cantidad Est.</td>
				<td>Unidad</td>
				<td>Estado</td>
			</tr>
		</thead>
		<tbody>
			{foreach $RESIDUOS as $RESIDUO}
				<tr>
					<td>{$RESIDUO.CONTENEDOR_}</td>
					<td>{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
					<td>{$RESIDUO.RESIDUO}</td>
					<td>{$RESIDUO.CANTIDAD_ESTIMADA}</td>
					<td>{$RESIDUO.UNIDAD_}</td>
					<td>{$RESIDUO.ESTADO_}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>

<div class="clear20"></div>
{if ${$usuario_actual}.$addon == "a"}
    <br/><br/>
    Este manifiesto ya se encuentra Aceptado. A la espera de la aceptaci&oacute;n o rechazo de las demas partes.
    {if $MANIFIESTO.ESTADO_AUTORIZACION_DRP == 0}
    	<b>Sigue pendiente la autorizaci&oacute;n por parte de la DRP para operar el manifiesto.</b>
    {/if}
    <br/>
    {else}
<div style="text-align: center">

	{if empty($VEHICULOS) && $tipo == 'transportista'}
    	{if $MANIFIESTO.TIPO_MANIFIESTO == "2" && is_null($MANIFIESTO.MANIFIESTO_PADRE)}
			<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
		{else}
    		<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" disabled="disabled" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
    	{/if}
	{else}
	<button type="button" data-dismiss="modal" id="btn_aceptar_1" class="btn btn-success btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
	{/if}
	&nbsp;&nbsp;&nbsp;
	<button type="button" id="btn_rechazar_1" class="btn btn-danger btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Rechazar</button>
	&nbsp;&nbsp;&nbsp;
	<button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Cancelar</button>
</div>
{/if}
<div class="clear20"></div>

{literal}
    <script>
	var acciones = new Array();

	acciones['ASIGNAR']    = 'desasignar';
	acciones['DESASIGNAR'] = 'asignar';

	$("#btn_cerrar_popup_1").click(function(){
		$("#div_popup").hide();
                    cerrar();
	});

	$("#btn_cancelar_1").click(function(){
		$("#div_popup").hide();
                    cerrar();
	});

	$("#btn_imprimir_1").click(function(){
		$("#acciones").hide();
		$("#mensaje_comprobante_no_valido").show();
		$("#div_popup").printElement();
		$("#mensaje_comprobante_no_valido").hide();
		$("#acciones").show();
	});

	$("#btn_aceptar_1").click(function(){
		$(this).button('loading');

		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/" + tipo + "/operar_manifiesto.php",
		   data: {accion : "aceptar", id : {/literal}{$MANIFIESTO.ID}{literal}},
		   dataType: "text json",
		   success: function(retorno){
		   		$(this).button('reset');
				if(retorno['estado'] != 0){
					mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
				}else{
					setTimeout(function(){
						mostrarMensaje("exclamation-triangle","Manifiesto Aprobado","success");
					}, 1000);

					if (tipo != 'operador') {
						window.location.replace(mel_path+"/operacion/" + tipo + "/manifiestos_proceso.php");
					} else {
						window.location.replace(mel_path+"/operacion/operador/manifiestos_en_camino.php");
					}
				}
		    }
		});
	});

	$("#btn_rechazar_1").click(function(){
		$(this).button('loading');
		BootstrapDialog.show({
            title: 'Rechazar',
            message: 'Esta apunto de rechazar este manifiesto, debe ingresar un motivo del rechazo: <textarea class="form-control" id="motivo"></textarea>',
            type: BootstrapDialog.TYPE_DANGER, 
            onshown: function(dialog) {
                dialog.getButton('rechazar').disable();
                $('#motivo').keyup(function() {
                	dialog.getButton('rechazar').enable();
			    });
               
            },
            buttons: [{
		    	id: 'cancelar',      
				label: 'Cancelar',
				cssClass: 'btn-primary', 
				autospin: false,
				action: function(dialogRef){    
				    dialogRef.close();
				}
		    },{
				id: 'rechazar',      
		        label: 'Rechazar',
		        cssClass: 'btn-danger', 
		        autospin: false,
		        action: function(dialogRef){
			            $.ajax({
					    type: "POST",
					    url: mel_path+"/operacion/" + tipo + "/operar_manifiesto.php",
					    data: {accion : "rechazar", id : {/literal}{$MANIFIESTO.ID}{literal}, motivo : $('#motivo').val()},
					    dataType: "text json",
					    success: function(retorno){
					    	$(this).button('reset');
							if(retorno['estado'] != 0){
								alert(retorno['errores']['general']);
							}else{
								setTimeout(function(){
									mostrarMensaje("exclamation-triangle","Manifiesto Rechazado","success");
								}, 1000);
								window.location.replace(mel_path+"/operacion/operador/manifiestos_rechazados.php");
							}
					    }
					});
			        dialogRef.close();
			        $('#mel_popup').modal('hide');
		        }
		    }],
        });
	});
	$('#btn_asignar_flota2').click(function() {
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/transportista/seleccion_flota.php",
			dataType: "html",
			success: function(msg){
				BootstrapDialog.show({
		            title: 'Buscar Flota',
		            message: $(msg),
		        });
			}
		});
	});

	/**
	 * @override para particularidades de Manifiesto SLOP. 
	 */
	function agregar_vehiculo_unico(vehiculo_id)
	{
		$("#btn_aceptar_1").removeAttr("disabled");
		
		// 1 porque ese tr corresponde a los titulos de la tabla
		if ($('#lista_vehiculos tr').length <= 2) {
			$("td#vehiculos_no_asignados").hide();
			$.ajax({
			   type: "POST",
			   url: mel_path+"/operacion/transportista/vehiculo.php",
			   data: {accion : "alta", id : vehiculo_id},
			   dataType: "text json",
			   success: function(retorno)
			   {
					if (retorno['estado'] != 0) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['alta'],"warning");
					} else {
						datos = "<tr bgcolor='#fff' id=" + vehiculo_id + "><td class='invisible' id='id'>" + id + "</td><td id='dominio'>" + retorno['datos']['DOMINIO'] + "</td><td id='tipo_vehiculo'>" + retorno['datos']['TIPO_VEHICULO'] + "</td><td id='tipo_caja'>" + retorno['datos']['TIPO_CAJA'] + "</td><td id='descripcion'>" + retorno['datos']['DESCRIPCION'] + "</td><td align='center'><a href='#' value=" + retorno['datos']['ID'] + " class='btn_borrar_vehiculo' onclick=\"btn_borrar_vehiculo_unico(" + vehiculo_id + ")\"><i class='fa fa-times fa-2x'></i></a></td></tr>";
						$('#lista_vehiculos> tbody:last').append(datos);
						$("div#tabla_vehiculos").show();

						if (retorno['datos']['TIPO_VEHICULO'] == 'BA') {
							$("div#mensaje_slop_con_barcaza").show();
						} else {
							$("div#mensaje_slop_con_barcaza").hide();
						}
					}
			    }
			});
			$("div#seleccion_vehiculos span").hide();
		} else {
			mostrarMensaje("exclamation-triangle", "No puede cargar m&aacute;s de un veh&iacute;culo en el manifiesto","error");
		}
	};
</script>
{/literal}
