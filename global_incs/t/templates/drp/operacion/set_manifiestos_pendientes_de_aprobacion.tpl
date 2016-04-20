{literal}
<style type="text/css">
.td_ {border:1px solid black;font-size:12px;}
.center {text-align: center;}
.seccion_tabla {border-collapse:collapse;margin-top: 25px;border:1px solid black;margin:auto;width:880px;font-size: 15px;}
</style>
{/literal}

<div class="bs-example">

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;"><b>Fecha de Creaci&oacute;n</b>: {$MANIFIESTO.FECHA_CREACION}</div>
	</div>
	<br /><br />

	<!-- DATOS IDENTIFICATORIOS -->
	<table class="seccion_tabla">

		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="7" style="text-align:center;font-weight:bold;">Datos Identificatorios</td>
		</tr>
		<tr>
			<td class="td_">&nbsp;</td>
			<td colspan="2" class="td_ center">Generador</td>
			<td colspan="2" class="td_ center">Transportista</td>
			<td colspan="2" class="td_ center">Operador</td>
		</tr>
		<tr>
			<td class="td_">Nombre</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.GENERADORES[0].NOMBRE_EMPRESA}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.TRANSPORTISTAS[0].NOMBRE_EMPRESA}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.OPERADORES[0].NOMBRE_EMPRESA}</td>
		</tr>
		<tr>
			<td class="td_">Domicilio Planta</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.GENERADORES[0].CALLE} {$MANIFIESTO.GENERADORES[0].NUMERO} {$MANIFIESTO.GENERADORES[0].PISO}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.TRANSPORTISTAS[0].CALLE} {$MANIFIESTO.TRANSPORTISTAS[0].NUMERO} {$MANIFIESTO.TRANSPORTISTAS[0].PISO}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.OPERADORES[0].CALLE} {$MANIFIESTO.OPERADORES[0].NUMERO} {$MANIFIESTO.OPERADORES[0].PISO}</td>
		</tr>
		<tr>
			<td class="td_">Expediente</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.GENERADORES[0].EXPEDIENTE_NUMERO}/{$MANIFIESTO.GENERADORES[0].EXPEDIENTE_ANIO}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.TRANSPORTISTAS[0].EXPEDIENTE_NUMERO}/{$MANIFIESTO.TRANSPORTISTAS[0].EXPEDIENTE_ANIO}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.OPERADORES[0].EXPEDIENTE_NUMERO}/{$MANIFIESTO.OPERADORES[0].EXPEDIENTE_ANIO}</td>
		</tr>
		<tr>
			<td class="td_">CUIT</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.GENERADORES[0].CUIT}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.TRANSPORTISTAS[0].CUIT}</td>
			<td colspan="2" class="td_ center">{$MANIFIESTO.OPERADORES[0].CUIT}</td>
		</tr>
		<tr>
			<td class="td_">C.A.A.</td>
			<td class="td_ center">Nro: {$MANIFIESTO.GENERADORES[0].CAA_NUMERO}</td>
			<td class="td_ center">Vto: {$MANIFIESTO.GENERADORES[0].CAA_VENCIMIENTO}</td>
			<td class="td_ center">Nro: {$MANIFIESTO.TRANSPORTISTAS[0].CAA_NUMERO}</td>
			<td class="td_ center">Vto: {$MANIFIESTO.TRANSPORTISTAS[0].CAA_VENCIMIENTO}</td>
			<td class="td_ center">Nro: {$MANIFIESTO.OPERADORES[0].CAA_NUMERO}</td>
			<td class="td_ center">Vto: {$MANIFIESTO.OPERADORES[0].CAA_VENCIMIENTO}</td>
		</tr>
	</table>
	<br />

	<!-- VEHICULOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="3" style="text-align:center;font-weight:bold;">Veh&iacute;culo</td>
		</tr>
		<tr>
			<td class="td_ center">Nro Patente / Matr&iacute;cula</td>
			<td class="td_ center">Tipo de Veh&iacute;culo</td>
			<td class="td_ center">Tipo de Caja</td>
		</tr>
		
		{foreach $MANIFIESTO.TRANSPORTISTAS[0].VEHICULOS as $VEHICULO}
			 <tr>
				<td class="td_ center">{$VEHICULO.DOMINIO}</td>
				<td class="td_ center">{$VEHICULO.TIPO_VEHICULO}</td>
				<td class="td_ center">{$VEHICULO.TIPO_CAJA}</td>
			</tr>
		{foreachelse}
			 <tr>
				<td class="td_ center">&nbsp;-&nbsp;</td>
				<td class="td_ center">&nbsp;-&nbsp;</td>
				<td class="td_ center">&nbsp;-&nbsp;</td>
			</tr>
		{/foreach}

	</table>
	<br />

	<!-- RESIDUOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="8" style="text-align:center;font-weight:bold;">Informaci&oacute;n de Residuos</td>
		</tr>
		<tr>
			<td colspan="2" class="td_ center">Contenedores</td>
			<td rowspan="2" class="td_ center">CSC</td>
			<td rowspan="2" class="td_ center">Descripci&oacute;n</td>
			<td rowspan="2" class="td_ center">Peligrosidad</td>
			<td rowspan="2" class="td_ center">Cant.<br>(estimada)</td>
			<td rowspan="2" class="td_ center">Cant.<br>(real)</td>
			<td rowspan="2" class="td_ center">Estado</td>
		</tr>
		<tr>
			<td class="td_ center">Tipo</td>
			<td class="td_ center">Cantidad</td>
		</tr>

		{foreach $MANIFIESTO.RESIDUOS as $RESIDUO}
			 <tr>
				<td class="td_ center">{$RESIDUO.CONTENEDOR}</td>
				<td class="td_ center">{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
				<td class="td_ center">{$RESIDUO.RESIDUO}</td>
				<td class="td_ center">{$RESIDUO.RESIDUO_}</td>
				<td class="td_ center">{$RESIDUO.PELIGROSIDAD}</td>
				<td class="td_ center">{$RESIDUO.CANTIDAD_ESTIMADA}</td>
				<td class="td_ center">
					{if $RESIDUO.CANTIDAD_REAL == ''}
						&nbsp;
					{else}
						{$RESIDUO.CANTIDAD_REAL}
					{/if}
				</td>
				<td class="td_ center">{$RESIDUO.ESTADO_}</td>
			</tr>
		{/foreach}
		
	</table>
	<br />

	<div style="text-align: center">
		<button type="button" data-dismiss="modal" id="btn_aceptar" class="btn btn-success btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off" onclick="aceptarManifiesto($(this), {$MANIFIESTO.ID});">Aceptar</button>
		<button type="button" id="btn_rechazar" class="btn btn-danger btn-sm" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off" onclick="rechazarManifiesto($(this), {$MANIFIESTO.ID});">Rechazar</button>
		<button type="button" data-dismiss="modal" class="btn btn-primary btn-sm">Cancelar</button>
	</div>
</div>

<script>
{literal}

	function aceptarManifiesto(objButton, manifiesto_id)
	{
		objButton.button('loading');
		BootstrapDialog.show({
            title: 'Aceptar',
            message: 'Esta apunto de aprobar este manifiesto, desea continuar&#63;',
            type: BootstrapDialog.TYPE_DANGER,
            buttons: [{
		    	id: 'cancelar',
				label: 'Cancelar',
				cssClass: 'btn-primary',
				autospin: false,
				action: function(dialogRef){
					objButton.button('reset');
				    dialogRef.close();
				}
		    },{
				id: 'aceptar',
		        label: 'Aceptar',
		        cssClass: 'btn-danger',
		        autospin: false,
		        action: function(dialogRef){
			            $.ajax({
					    type: "POST",
					    url: admin_path+"/operacion/set_manifiestos_pendientes_de_aprobacion.php",
					    data: {accion: "aceptar", manifiesto_id: manifiesto_id},
					    dataType: "text json",
					    success: function(retorno){
					    	objButton.button('reset');
							if (retorno['estado'] == 'success') {
								setTimeout(function(){
									mostrarMensaje("exclamation-triangle","Manifiesto Concentrador Aceptado","success");
								}, 1000);
								window.location.replace(admin_path+"/operacion/listado_manifiestos_pendientes_de_aprobacion.php");
							} else if (retorno['estado'] == 'error') {
								BootstrapDialog.alert({
									title: 'Ha ocurrido un error.',
									message: retorno['error'],
									type: BootstrapDialog.TYPE_DANGER,
								});
							}
					    }
					});
			        dialogRef.close();
			        $('#pendientes_popup').modal('hide');
		        }
		    }],
        });
	};

	function rechazarManifiesto(objButton, manifiesto_id)
	{
		objButton.button('loading');
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
					objButton.button('reset');
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
					    url: admin_path+"/operacion/set_manifiestos_pendientes_de_aprobacion.php",
					    data: {accion: "rechazar", manifiesto_id: manifiesto_id, motivo: $('#motivo').val()},
					    dataType: "text json",
					    success: function(retorno){
					    	objButton.button('reset');
							if (retorno['estado'] == 'success') {
								setTimeout(function(){
									mostrarMensaje("exclamation-triangle","Manifiesto Concentrador Rechazado","success");
								}, 1000);
								window.location.replace(admin_path+"/operacion/listado_manifiestos_pendientes_de_aprobacion.php");
							} else if (retorno['estado'] == 'error') {
								BootstrapDialog.alert({
									title: 'Ha ocurrido un error.',
									message: retorno['error'],
									type: BootstrapDialog.TYPE_DANGER,
								});
							}
					    }
					});
			        dialogRef.close();
			        $('#pendientes_popup').modal('hide');
		        }
		    }],
        });
	};

{/literal}
</script>