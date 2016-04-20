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
				<li><a href="estadisticas_entrada_salida_de_residuos.php">Estad&iacute;sticas - Entrada/Salida por Jurisdicci&oacute;n</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo no SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="entrada_salida_residuos_provincia">
				<h5>Entrada y salida de residuos por provincia (el reporte consulta manifiestos finalizados).</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;margin-left:10px;margin-right:10px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="{$criterios.csc}">
					
					<label for="provincia_desde">Desde: </label>
					<select style="width:200px;margin-left:10px;margin-right:10px;" class="form-control" id='provincia_desde' name='provincia_desde'>
						<option value=''>TODAS</option>
						{foreach $provincias as $prov}
							<option value='{$prov->codigo}' {if $criterios.provincia_desde == $prov->codigo} selected {/if}>{$prov->descripcion}</option>
						{/foreach}
					</select>

					<label for="csc">Hacia: </label>
					<select style="width:200px;margin-left:10px;margin-right:10px;" class="form-control" id='provincia_hacia' name='provincia_hacia'>
						<option value=''>TODAS</option>
						{foreach $provincias as $prov}
							<option value='{$prov->codigo}' {if $criterios.provincia_hacia == $prov->codigo} selected {/if}>{$prov->descripcion}</option>
						{/foreach}
					</select>

					<div style="clear:both;"></div>
					<label style="margin-top:20px;" for="csc">Rango: </label>
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
						onclick="actualizarEstadistica($(this));" tipo-estadistica="entrada_salida_residuos_provincia"
						chart-id='["pie_chart_prov_salida", "pie_chart_prov_entrada"]'/>
					<i class="fa fa-spinner fa-spin" id="entrada_salida_residuos_provincia_loading" style="display:none;"></i>

					<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="entrada_salida_residuos_provincia">
						<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
					</a>
				</div>


				<div class="chart_titles"><p><b>Cantidad de residuos salientes:</b></p></div>
				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_prov_salida">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>
				<div style="width:100%;height:350px;border;float:left;margin-top:10px;" id="pie_chart_prov_salida">
					<svg></svg>
				</div>

				<div class="chart_titles"><p><b>Cantidad de residuos recibidos:</b></p></div>
				<div class="alert alert-warning" role="alert" style="font-weight:bold;display:none;" id="cant_show_chart_pie_chart_prov_entrada">
                * El resultado del informe es muy grande para ser representado gr&aacute;ficamente.
            	</div>
				<div style="width:100%;height:350px;border;float:left;margin-top:10px;" id="pie_chart_prov_entrada">
				  <svg></svg>
				</div>

				<input type="hidden" id="prov_salida_json_graph_data" name="prov_salida_json_graph_data" value='{$estadisticas_salida_json}' />
				<input type="hidden" id="prov_entrada_json_graph_data" name="prov_entrada_json_graph_data" value='{$estadisticas_entrada_json}' />

				<table class="table table-hover table-striped" id="tabla_entrada_salida_residuos_provincia">
					<thead>
						<tr>
							<th>CSC</th>
							<th>Descripci&oacute;n</th>
							<th>Enviado Desde</th>
							<th>Recibido en</th>
							<th>Cantidad Estimada</th>
							<th>Cantidad Real</th>
						</tr>
					</thead>
					<tbody>
						{foreach $estadisticas_entrada_salida_de_residuos as $row}
						<tr>
							<td>{$row->csc}</td>
							<td>{$row->descripcion}</td>
							<td>{$row->enviado}</td>
							<td>{$row->recibido}</td>
							<td>{format_number_with_thousand_separator($row->cantidad)}kg</td>
							<td>{format_number_with_thousand_separator($row->cantidad_real)}kg</td>
						</tr>
						{foreachelse}
							<tr>
								<td colspan="6">No se han encontrado resultados</td>
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

	var prov_salida_chart_data = jQuery.parseJSON($("#prov_salida_json_graph_data").val());
	generateBarsChart('pie_chart_prov_salida', prov_salida_chart_data);

	var prov_entrada_chart_data = jQuery.parseJSON($("#prov_entrada_json_graph_data").val());
	generateBarsChart('pie_chart_prov_entrada', prov_entrada_chart_data);

</script>
{/literal}

</html>
