<div class="alert alert-info" role="alert" style="font-weight:bold;">
	Ud est&aacute; por indicar el tratamiento a los residuos del manifiesto Nro {formatear_id_protocolo_manifiesto($MANIFIESTO.NUMERO_PROTOCOLO)}
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
			<tr>
				<td><b>Fecha de Recepci&oacute;n</b></td>
				<td>{$MANIFIESTO.FECHA_RECEPCION}</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			{foreach $GENERADORES as $GENERADOR}
				<tr>
					<td>{$GENERADOR.NOMBRE}</td>
					<td>{$GENERADOR.CALLE} {$GENERADOR.NUMERO} {$GENERADOR.PISO}</td>
					<td>{$GENERADOR.EXPEDIENTE_NUMERO}/{$GENERADOR.EXPEDIENTE_ANIO}</td>
					<td>{$GENERADOR.CUIT}</td>
					<td>{$GENERADOR.CAA_NUMERO} - {$GENERADOR.CAA_VENCIMIENTO}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{$TRANSPORTISTA.NOMBRE}</td>
				<td>{$TRANSPORTISTA.CALLE} {$TRANSPORTISTA.NUMERO} {$TRANSPORTISTA.PISO}</td>
				<td>{$TRANSPORTISTA.EXPEDIENTE_NUMERO}/{$TRANSPORTISTA.EXPEDIENTE_ANIO}</td>
				<td>{$TRANSPORTISTA.CUIT}</td>
				<td>{$TRANSPORTISTA.CAA_NUMERO} - {$TRANSPORTISTA.CAA_VENCIMIENTO}</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{$OPERADOR.NOMBRE}</td>
				<td>{$OPERADOR.CALLE} {$OPERADOR.NUMERO} {$OPERADOR.PISO}</td>
				<td>{$OPERADOR.EXPEDIENTE_NUMERO}/{$OPERADOR.EXPEDIENTE_ANIO}</td>
				<td>{$OPERADOR.CUIT}</td>
				<td>{$OPERADOR.CAA_NUMERO} - {$OPERADOR.CAA_VENCIMIENTO}</td>
			</tr>
		</tbody>
	</table>
</div>



<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped" id="lista_residuos">
		<thead>
			<tr>
				<th class="invisible">Id</th>
				<th>Residuo</th>
				<th>Tipo Cont.</th>
				<th>Cant. Cont.</th>
				<th>Cant. Est.</th>
				<th>Cant. Real</th>
				<th>Estado</th>
				<th>Tratamiento</th>
				<th>Procesado</th>
			</tr>
		</thead>
		<tbody>
			{* cant residuos en el manifiesto *}
			{assign var=cant_residuos value=$RESIDUOS|@count}
			{assign var=cant_residuos_procesados value=0}
			{foreach $RESIDUOS as $RESIDUO}
				<tr>
					<td class="invisible">{$RESIDUO.ID}</td>
					<td>{$RESIDUO.RESIDUO}</td>
					<td>{$RESIDUO.CONTENEDOR_}</td>
					<td>{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
					<td>{$RESIDUO.CANTIDAD_ESTIMADA}</td>
					<td>{$RESIDUO.CANTIDAD_REAL}</td>
					<td>{$RESIDUO.ESTADO_}</td>
					<td align="center">
						<div class="btn_tratamiento_residuo" style="text-align:right;margin-right:20px;">
							{if $RESIDUO.TRATAMIENTO and $RESIDUO.FECHA_TRATAMIENTO}
								({$RESIDUO.TRATAMIENTO})
							{else}
								
							{/if}
							<i class="fa fa-pencil-square-o fa-lg hand" onclick="tratamientoResiduo($(this));" residuo-id="{$RESIDUO.ID}" residuo-codigo="{$RESIDUO.RESIDUO}" data-toggle="modal" data-target="#tratamientos_popup"></i>
						</div>
					</td>
					<td align="center">
						{if $RESIDUO.TRATAMIENTO and $RESIDUO.FECHA_TRATAMIENTO}
							{assign var=cant_residuos_procesados value=$cant_residuos_procesados + 1}
							<i class="fa fa-check" style="color:#449d44;"></i>
						{else}
							&nbsp;
						{/if}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>

	<div id="tratamientos_definidos" style="display:none;">
		<span id="titulos" style="font-size:14px;font-weight:bold;">Tratamiento del Residuo</span>

		<table style="width:750px;margin:5px 0px 20px 0px;text-align:center;" class="tabla" id="lista_tratamientos">
			<tr>
				<td style="width:50px;word-wrap: break-word;">Residuo</td>
				<td style="width:50px;word-wrap: break-word;">Tratamiento</td>
				<td style="word-wrap: break-word;">Descripcion</td>
			</tr>

			{foreach $RESIDUOS as $RESIDUO}
				{if $RESIDUO@iteration is even by 1}
					{assign var="COLOR_LINEA" value="#EAEAE5"}
				{else}
					{assign var="COLOR_LINEA" value="#F7F7F5"}
				{/if}
				<tr id="tr_residuo_relacion_{$RESIDUO.ID}" style="display:none;">
					<td bgcolor="#F7F7F5" class="td" style="width:100px;"><span id="residuo">{$RESIDUO.RESIDUO}</span></td>
					<td bgcolor="#F7F7F5" class="td" style="width:100px;"><span id="tratamiento_residuo_{$RESIDUO.ID}" name="tratamiento_residuo_{$RESIDUO.ID}"></span></td>
					<td bgcolor="#F7F7F5" class="td"><span id="tratamiento_descripcion_{$RESIDUO.ID}"></span></td>
				</tr>
			{/foreach}

		</table>
	</div>
</div>

<!-- hidden fields with usefull data -->
<input type="hidden" id="id" name="id" value="{$MANIFIESTO.ID}" />

<div align="right" id="acciones"><br />
	{if $cant_residuos_procesados == $cant_residuos}
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar_1' onclick="finalizarManifiesto($(this));" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Finalizar</button>
	{/if}
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>


<script>
{literal}

	function tratamientoResiduo(objRow)
	{
		var manifiesto_id = $("input#id").val();
		var residuo_relacion_id = objRow.attr('residuo-id');
		var residuo_codigo = objRow.attr('residuo-codigo');
		//console.info("consiguiendo tratamiento para residuo-relacion-id: "+residuo_relacion_id+" ("+residuo_codigo+")");

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/operador/procesar_residuo.php",
			data: {
				id: manifiesto_id,
				residuo_codigo: residuo_codigo,
				residuo_relacion_id: residuo_relacion_id
			},
			dataType: "html",
			success: function(response)
			{
				$('#tratamientos_popup_title').html("Tratamiento de Residuo");
				$('#tratamientos_popup_body').html(response);
				$('#tratamientos_popup_content').width(750);
				showTratamientosPopup();
			}
		});
		$(".tratamientos").chosen({width: "396px"});
	}

	function showTratamientosPopup()
	{
		$('#tratamientos_popup_title').show();
		$('#tratamientos_popup_body').show();
		$('#tratamientos_popup_content').show();
	}

	function hideTratamientosPopup()
	{
		$('#tratamientos_popup_title').hide();
		$('#tratamientos_popup_body').hide();
		$('#tratamientos_popup_content').hide();
	}

	function showTratamientoSeleccionado(id_relacion_residuo)
	{
		$("div#tratamientos_definidos").show();
		$("tr#tr_residuo_relacion_"+id_relacion_residuo).show();
	}

	function clearTratamientoSeleccionado()
	{
		$("span#tratamiento_codigo").val('');
		$("span#tratamiento_descripcion").val('');
		$("div#tratamientos_definidos").hide();	
	}

	function finalizarManifiesto(objButton)
	{
		var id_manifiesto = $("input#id").val();
		var residuos = new Array();
		var tratamientos = new Array();
		var fecha_tratamiento = $("input#fecha_tratamiento").val();

		objButton.button('loading');

		$('#lista_tratamientos').find("span[name^='tratamiento_residuo_']").each(function(index, value){
			obj = $(value);
			residuos.push(obj.attr('name').substr(20));
			tratamientos.push(obj.text());
		});

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/operador/procesar_manifiesto.php",
			data: {
				id: id_manifiesto,
				residuos: residuos,
				fecha_tratamiento: fecha_tratamiento,
				tratamientos: tratamientos
			},
			dataType: "text json",
			success: function(retorno) {
				objButton.button('reset');
				if (retorno['estado'] != 0) {
					// alert(retorno['errores']['general']);
					mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
				} else {
					$('#mel_popup_title').toggle();
					$('#mel_popup_body').toggle();
					$('#mel_popup_content').toggle();
					mostrarMensaje("exclamation-triangle","Recepci&oacute;n confirmada","success");
					location.reload();
				}
			}
		});
	}

{/literal}
</script>
