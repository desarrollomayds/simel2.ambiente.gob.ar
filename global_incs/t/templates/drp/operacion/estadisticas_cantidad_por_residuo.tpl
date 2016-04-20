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
				<li><a href="estadisticas_cantidad_por_residuo.php">Estad&iacute;sticas - Cantidad por residuo</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo no SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_no_slop">
				<h5>Cantidades totales en kg de manifiestos de tipo: SIMPLES y M&Uacute;LTIPLES</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
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
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_no_slop"
						chart-id='["pie_chart_no_slop"]' />
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_no_slop_loading" style="display:none;"></i>

					<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="cantidad_por_residuo_no_slop">
						<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
					</a>

				</div>

				<!-- hidden input para primer carga del grafico -->
				<input type="hidden" id="no_slop_json_graph_data" name="no_slop_json_graph_data" value='{$estadisticas_no_slop_json}' />

				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_no_slop">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>
				
				<div style="width:100%;height:350px;border;" id="pie_chart_no_slop">
					<svg></svg>
				</div>


				<div style="float:left;width:100%;">
					<table class="table table-hover table-striped" id="tabla_cantidad_por_residuo_no_slop">
						<thead>
							<tr>
								<th>CSC</th>
								<th>Descripci&oacute;n</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							{foreach $estadisticas_no_slop as $row}
							<tr>
								<td>{$row->csc}</td>
								<td>{$row->descripcion}</td>
								<td>{format_number_with_thousand_separator($row->cantidad)}kg</td>
							</tr>
							{foreachelse}
								<tr>
									<td colspan="3">No se han encontrado resultados</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>


			<!-- Cantidad por residuo SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_solo_slop">
				<h5>Cantidades totales en kg de manifiestos de tipo: SLOP</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">

					<label for="csc">Rango: </label>
					<select class="form-control" id="rango_estadisticas_slop" name="rango_estadisticas_slop">
						<option value="today" selected>Hoy</option>
						<option value="current_month">Mes Actual</option>
						<option value="last_month">&Uacute;ltimo mes</option>
						<option value="last_6_months">&Uacute;ltimos 6 meses</option>
						<option value="custom">Elegir rango</option>
					</select>

					<input style="width:150px;display:none;" class="form-control" id="start_date_slop" name="start_date_slop" placeholder="Fecha Inicio" value="" disabled>
					<input style="width:150px;display:none;" class="form-control" id="end_date_slop" name="end_date_slop" placeholder="Fecha Fin" value="" disabled>

					<input type="button" class="btn btn-default" value="Aplicar" 
						onclick="actualizarEstadistica($(this));" tipo-estadistica="cantidad_por_residuo_solo_slop"
						chart-id='["pie_chart_slop"]'/>
					<i class="fa fa-spinner fa-spin" id="cantidad_por_residuo_solo_slop_loading" style="display:none;"></i>

					<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="cantidad_por_residuo_solo_slop">
						<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
					</a>
				</div>

				<input type="hidden" id="slop_json_graph_data" name="slop_json_graph_data" value='{$estadisticas_slop_json}' />

				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_slop">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>

				<div style="width:100%;height:350px;border;" id="pie_chart_slop">
					<svg></svg>
				</div>

				<div style="width:100%;">
					<table class="table table-hover table-striped" id="tabla_cantidad_por_residuo_solo_slop">
						<thead>
							<tr>
								<th>CSC</th>
								<th>Descripci&oacute;n</th>
								<th>Cantidad</th>
							</tr>
						</thead>
						<tbody>
							{foreach $estadisticas_slop as $row}
								<tr>
									<td>{$row->csc}</td>
									<td>{$row->descripcion}</td>
									<td>{format_number_with_thousand_separator($row->cantidad)}kg</td>
								</tr>
							{foreachelse}
								<tr>
									<td colspan="3">No se han encontrado resultados</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				</div>
			</div>
			<div style="clear:both;"></div>

		</div>

	{include file='general/popup.tpl' ID_POPUP='cambios' HIDDEN_INFO='true'}
</body>
{literal}
<script>

	$('#start_date_slop').datepicker({
		format: 'dd/mm/yyyy',
		startView: 'decade',
		endDate: new Date()
	}).on('changeDate', function(e){
		$(this).datepicker('hide');
	});

	$('#end_date_slop').datepicker({
		format: 'dd/mm/yyyy',
		startView: 'decade',
	}).on('changeDate', function(e){
		$(this).datepicker('hide');
	});

    $("#rango_estadisticas_slop").change(function() {
        if ($(this).val() == 'custom') {
            $("input#start_date_slop").show();
            $("input#start_date_slop").attr('disabled', false);
            $("input#end_date_slop").show();
            $("input#end_date_slop").attr('disabled', false);
        } else {
            $("input#start_date_slop").hide();
            $("input#start_date_slop").attr('disabled', true);
            $("input#end_date_slop").hide();
            $("input#end_date_slop").attr('disabled', true);
        }
    });

	var no_slop_chart_data = jQuery.parseJSON($("#no_slop_json_graph_data").val());
	generateBarsChart('pie_chart_no_slop', no_slop_chart_data);

	var slop_chart_data = jQuery.parseJSON($("#slop_json_graph_data").val());
	generateBarsChart('pie_chart_slop', slop_chart_data);

</script>
{/literal}

</html>
