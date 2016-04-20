<!DOCTYPE html>
<html>
<head>
	{include file='general/meta.tpl'}
	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	{include file='general/css_headers_bootstrap.tpl' bootstrap='true' datepicker='true' graphs='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers_bootstrap.tpl' bootstrap='true' datepicker='true' graphs='true'}

	{literal}
	<style type="text/css">
		h5 {font-weight: bold; border-bottom: 1px solid rgba(128, 128, 128, 0.67); padding-bottom: 13px; color: #2E8DD2; font-size: 14px;}
		.estadisticas_residuos {clear: both; float:left; width:100%;}
	</style>
	{/literal}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="estadisticas_cantidad_por_residuo_y_tratamiento.php">Estad&iacute;sticas - Residuo y tratamiento</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo y tratamiento -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_y_tratamiento">
				<h5>Cantidades totales en kg y por residuo y tratamiento</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
					<label for="csc">Tratamiento: </label>
					<input style="width:150px;" class="form-control" id="tratamiento" name="tratamiento" placeholder="Tratamiento" value="{$criterios.tratamiento}">

					<label for="csc">Rango: </label>
					<select class="form-control" id="rango_estadisticas" name="rango_estadisticas">
						<option value="today" selected>Hoy</option>
						<option value="current_month">Mes Actual</option>
						<option value="last_month">&Uacute;ltimo mes</option>
						<option value="last_6_months">&Uacute;ltimos 6 meses</option>
						<option value="custom">Elegir rango</option>
					</select>

					<input style="width:150px;display:none;" class="form-control" id="start_date" name="start_date" placeholder="Fecha Inicio" value="" disabled>
					<input style="width:150px;display:none;" class="form-control" id="end_date" name="end_date" placeholder="Fecha Fin" value="" disabled>

					<input type="button" class="btn btn-default" value="Aplicar" 
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_y_tratamiento"
						chart-id='["pie_chart_residuos", "pie_chart_tratamientos"]'/>
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_y_tratamiento_loading" style="display:none;"></i>

					<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="cantidad_por_residuo_y_tratamiento">
						<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
					</a>
				</div>


				<div class="chart_titles"><p><b>Residuos</b></p></div>
				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_residuos">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>

				<div style="width:100%;height:350px;border;float:left;" id="pie_chart_residuos">
				  <svg></svg>
				</div>

				<div class="chart_titles"><p><b>Tratamientos aplicados</b></p></div>
				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_tratamientos">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>
				<div style="width:100%;height:350px;border;float:left;" id="pie_chart_tratamientos">
				  <svg></svg>
				</div>

				<input type="hidden" id="residuos_json_graph_data" name="residuos_json_graph_data" value='{$estadisticas_residuos_json}' />
				<input type="hidden" id="tratamientos_json_graph_data" name="tratamientos_json_graph_data" value='{$estadisticas_tratamientos_json}' />

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
						{foreach $estadisticas_residuo_y_tratamiento as $row}
							<tr>
								<td>{$row->csc}</td>
								<td>{$row->descripcion}</td>
								<td>{$row->tratamiento}</td>
								<td>{format_number_with_thousand_separator($row->cantidad)}kg</td>
							</tr>
						{foreachelse}
							<tr>
								<td colspan="4">No se han encontrado resultados</td>
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

{literal}
<script>
	var residuos_chart_data = jQuery.parseJSON($("#residuos_json_graph_data").val());
	generateBarsChart('pie_chart_residuos', residuos_chart_data);

	var tratamientos_chart_data = jQuery.parseJSON($("#tratamientos_json_graph_data").val());
	generateBarsChart('pie_chart_tratamientos', tratamientos_chart_data);
</script>
{/literal}

</html>
