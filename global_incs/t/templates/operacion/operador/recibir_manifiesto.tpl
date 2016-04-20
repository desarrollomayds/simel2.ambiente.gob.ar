<div class="alert alert-info" role="alert" style="font-weight:bold;">
	Ud est&aacute; recibiendo los residuos del manifiesto Nro {formatear_id_protocolo_manifiesto($MANIFIESTO.NUMERO_PROTOCOLO)}
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
			{* esto solo puede ocurrir siendo un manif simple resolucion 544/94 *}
			{foreachelse}
				{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SIMPLE_RES_544_94}
					<tr><td colspan="6">Resoluci&oacute;n 544/94</td></tr>
				{/if}
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
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">
		{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SLOP and count($MANIFIESTOS_RELACIONADOS) > 0}
			Residuos declarados en el Padre:
		{else}
			Residuos
		{/if}
	</p>
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
			</tr>
		</thead>
		<tbody>
			{foreach $RESIDUOS as $RESIDUO}
				<tr>
					<td class="invisible">{$RESIDUO.ID}</td>
					<td>{$RESIDUO.RESIDUO}</td>
					<td>{$RESIDUO.CONTENEDOR_}</td>
					<td>{$RESIDUO.CANTIDAD_CONTENEDORES}</td>
					<td>{$RESIDUO.CANTIDAD_ESTIMADA}</td>
					<td>
						<input style="text-align:right;" type="text" size="4" name="cant_real_manifiesto_{$RESIDUO.ID}" value="{$RESIDUO.CANTIDAD_ESTIMADA}">&nbsp;kg
					</td>
					<td>{$RESIDUO.ESTADO_}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>

<!-- Si el Manifiesto SLOP tiene otros relacionados, listo los residuos declarados en sus "hijos" -->
{if $MANIFIESTO.TIPO_MANIFIESTO == TipoManifiesto::SLOP and count($MANIFIESTOS_RELACIONADOS) > 0}
	<div class="table-responsive bs-example">
		<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos Recibidos y Tratados en los Manifiestos Hijos</p>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Protocolo</th>
					<th>Residuo</th>
					<th>Cant.Recibida</th>
					<th>Fecha Tratamiento</th>
					<th>Tratamiento</th>
				</tr>
			</thead>
			<tbody>
				{assign var="cant_total_residuos" value="0"}
				{foreach $MANIFIESTOS_RELACIONADOS as $MHIJO}
					<!-- residuos manif hijos -->
					{foreach $MHIJO->residuos_manifiesto as $MHIJO_RESIDUO}
						<tr>
							<td>{formatear_id_protocolo_manifiesto($MHIJO->id_protocolo_manifiesto)}</td>
							<td>{$MHIJO_RESIDUO->residuo_id}</td>
							<td>{$MHIJO_RESIDUO->cantidad_real}</td>
							<td>{$MHIJO_RESIDUO->fecha_tratamiento->format('Y-m-d H:i:s')}</td>
							<td>{$MHIJO_RESIDUO->tratamiento}</td>
						</tr>
						{assign var="cant_total_residuos" value="{$cant_total_residuos + $MHIJO_RESIDUO->cantidad_real}"}
					{/foreach}
				{/foreach}
				<tr>
					<td><b>Total</b></td>
					<td>&nbsp;</td>
					<td><b>{$cant_total_residuos}</b></td>
					<td colspan="2">&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</div>
{/if}


<!-- hidden fields with usefull data -->
<input type="hidden" id="id" name="id" value="{$MANIFIESTO.ID}" />

<div align="right" id="acciones"><br />
	<button type="button" class="btn btn-success btn-sm" id='btn_aceptar_1' onclick="confirmarRecepcion($(this));" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Confirmar</button>
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>

<script>
{literal}
function confirmarRecepcion(objButton)
{
	var id_manifiesto = $("input#id").val();
	var residuos_relacion_id = new Array();
	var residuos_manifiesto_cantidad_real = new Array();

	objButton.button('loading');

	$('#lista_residuos').find("input[name^='cant_real_manifiesto_']").each(function(index, value){
		obj = $(value);
		residuos_relacion_id.push(obj.attr('name').substr(21));
		residuos_manifiesto_cantidad_real.push(obj.val());
	});

	$.ajax({
		type: "POST",
		url: mel_path+"/operacion/operador/recibir_manifiesto.php",
		data: {
			id: id_manifiesto,
			residuos: residuos_relacion_id,
			residuos_cantidades_reales: residuos_manifiesto_cantidad_real,
		},
		dataType: "text json",
		success: function(retorno) {
			objButton.button('reset');
			if (retorno['estado'] != 0) {
				// alert(retorno['errores']['general']);
				mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
			} else {
				$('#mel_popup_title').hide();
				$('#mel_popup_body').hide();
				$('#mel_popup_content').hide();
				mostrarMensaje("exclamation-triangle","Recepci&oacute;n confirmada","success");
				location.reload();
			}
		}
	});
}

{/literal}
</script>
