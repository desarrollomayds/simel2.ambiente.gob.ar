<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' mapa='false'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' mapa='false'}

	{literal}
	<style type="text/css">
		h5 {font-weight: bold; border-bottom: 1px solid rgba(128, 128, 128, 0.67); padding-bottom: 13px; color: #2E8DD2; font-size: 14px;}
		.estadisticas_residuos {clear: both; float:left; width:50%;}
	</style>
	{/literal}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_solicitud_de_cambios.php">Solicitudes de Cambios</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo no SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_no_slop">
				<h5>Cantidades totales en kg y por tipo de Y (excluye manifiestos de tipo SLOP)</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
					<input type="button" class="btn btn-default" value="Aplicar" 
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_no_slop"/>
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_no_slop_loading" style="display:none;"></i>

				</div>

				<table class="table table-hover table-striped" id="tabla_cantidad_por_residuo_no_slop">
					<thead>
						<tr>
							<th>CSC</th>
							<th>Descripci&oacute;n</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						{foreach $cantidad_por_residuo_no_slop as $row}
						<tr>
							<td>{$row->csc}</td>
							<td>{$row->descripcion}</td>
							<td>{$row->cantidad}kg</td>
						</tr>
						{/foreach}
					</tbody>
				</table>
			</div>


			<!-- Cantidad por residuo SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_solo_slop">
				<h5>Cantidades totales en kg y por tipo de Y de SLOP (Buques)</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
					<input type="button" class="btn btn-default" value="Aplicar" 
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_solo_slop"/>
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_solo_slop_loading" style="display:none;"></i>
				</div>

				<table class="table table-hover table-striped" id="tabla_cantidad_por_residuo_solo_slop">
					<thead>
						<tr>
							<th>CSC</th>
							<th>Descripci&oacute;n</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						{foreach $cantidad_por_residuo_slop as $row}
							<tr>
								<td>{$row->csc}</td>
								<td>{$row->descripcion}</td>
								<td>{$row->cantidad}kg</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			<div style="clear:both;"></div>

			<!-- Cantidad por residuo y tratamiento -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_y_tratamiento">
				<h5>Cantidades totales en kg y por residuo y tratamiento</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
					<label for="csc">Tratamiento: </label>
					<input style="width:150px;" class="form-control" id="tratamiento" name="tratamiento" placeholder="Tratamiento" value="{$criterios.tratamiento}">
					<input type="button" class="btn btn-default" value="Aplicar" 
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_y_tratamiento"/>
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_y_tratamiento_loading" style="display:none;"></i>
				</div>

				<table class="table table-hover table-striped" id="tabla_cantidad_por_residuo_y_tratamiento">
					<thead>
						<tr>
							<th>CSC</th>
							<th>Descripci&oacute;n</th>
							<th>Tratamiento</th>
							<th>Cantidad</th>
						</tr>
					</thead>
					<tbody>
						{foreach $cantidad_por_residuo_y_tratamiento as $row}
							<tr>
								<td>{$row->csc}</td>
								<td>{$row->descripcion}</td>
								<td>{$row->tratamiento}</td>
								<td>{$row->cantidad}kg</td>
							</tr>
						{/foreach}
					</tbody>
				</table>
			</div>
			<div style="clear:both;"></div>

		</div>
	</div>

	{include file='general/popup.tpl' ID_POPUP='cambios' HIDDEN_INFO='true'}
</body>

<script>
	$(document).ready(function() {});

	function actualizarEstadistica(objButton)
	{
		var tipo_estadistica = objButton.attr('tipo-estadistica');
		var inputs = $("div#"+tipo_estadistica+" input");
		var params = {};
		
		inputs.each(function() {
			params[$(this).attr('id')] = $(this).val();
		});

		// escondemos boton aplicar y mostramos loader
		objButton.hide();
		$("#"+tipo_estadistica+"_loading").show();

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/ajax/ajax_actualizar_estadisticas.php",
			data: {
				tipo_estadistica: tipo_estadistica,
				params: JSON.stringify(params)
			},
			dataType: "text json",
			success: function(rsp) {
				var table = $("table#tabla_"+tipo_estadistica);
				var row_string = '';

				// borramos rows anteriorios
				table.find("tr:gt(0)").remove();

				$.each(rsp, function(key, obj) {
					row_string += '<tr><td>'+ obj.csc + '</td>';

					if ('tratamiento' in obj) {
						row_string += '<td>'+ obj.tratamiento + '</td>';
					}

					row_string += '<td>'+ obj.cantidad + '</td></tr>';
				});

				
				console.log("HEY");
				
				table.append(row_string);

				// al terminar de parsear los datos volvemos botones a estado original
				$("#"+tipo_estadistica+"_loading").hide();
				objButton.show();
			}
		});
	}
</script>

</html>
