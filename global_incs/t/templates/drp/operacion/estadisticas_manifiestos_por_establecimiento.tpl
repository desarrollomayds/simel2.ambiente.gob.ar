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
		.estadisticas_manifiestos {clear: both; float:left; width:100%;}
		.recuadros_cantidades {padding:2px 10px 10px 10px;background-color: #E6E6E6; border:1px dotted black;margin-bottom:10px;}

	</style>
	{/literal}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="estadisticas_cantidad_por_residuo.php">Estad&iacute;sticas - Manifiestos por Establecimiento</a></li>
				<li class="active">Listado</li>
			</ol>
			
			<div class="table-responsive bs-example estadisticas_manifiestos" id="estadistica_manifiestos_por_establecimiento">
				<div class="form-inline form-group">
				</div>

				<div id="container_form" style="width:800px;float:left;padding:10px;">
					<h4>Filtros de b&uacute;squeda:</h4>
					<hr>
					<form class="form-horizontal">
					  <div class="form-group">
						<label for="establecimiento" class="col-sm-2 control-label">Establecimiento</label>
						<div class="col-sm-9">
							<select class="form-control" style="width:135px;display:inline;" id="tipo_establecimiento" name="tipo_establecimiento">
								<option value="1"   {if $params->tipo_establecimiento == '1'}selected{/if}>Generador</option>
								<option value="2"   {if $params->tipo_establecimiento == '2'}selected{/if}>Transportista</option>
								<option value="3"   {if $params->tipo_establecimiento == '3'}selected{/if}>Operador</option>
							</select>
							<input class="form-control" style="display:inline;max-width:438px;" type="establecimiento" id="usuario_establecimiento" name="usuario_establecimiento" placeholder="Usuario del establecimiento" value="{$params->usuario_establecimiento}">
						</div>
					  </div>
					  <div class="form-group">
						<label for="tipo_manifiesto" class="col-sm-2 control-label">Tipo Manif.</label>
						<div class="col-sm-9">
							<select class="form-control" id="tipo_manifiesto" name="tipo_manifiesto">
								<option value="all" {if $params->tipo_manifiesto == 'all'}selected{/if}>Todos</option>
								<option value="0"   {if $params->tipo_manifiesto == '0'}selected{/if}>Simple</option>
								<option value="1"   {if $params->tipo_manifiesto == '1'}selected{/if}>M&uacute;ltiple</option>
								<option value="2"   {if $params->tipo_manifiesto == '2'}selected{/if}>SLOP</option>
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="rango_fechas" class="col-sm-2 control-label">Rango</label>
						<div class="col-sm-9">
							<select class="form-control" id="rango_estadisticas" name="rango_estadisticas">
								<option value="today" {if $params->rango_estadisticas == 'today'}selected{/if}>Hoy</option>
								<option value="current_month" {if $params->rango_estadisticas == 'current_month'}selected{/if}>Mes Actual</option>
								<option value="last_month" {if $params->rango_estadisticas == 'last_month'}selected{/if}>&Uacute;ltimo mes</option>
								<option value="last_6_months" {if $params->rango_estadisticas == 'last_6_months'}selected{/if}>&Uacute;ltimos 6 meses</option>
								<option value="custom" {if $params->rango_estadisticas == 'custom'}selected{/if}>Elegir rango</option>
							</select>
							<input style="width:150px;{if $params->rango_estadisticas != 'custom'}display:none;{/if}" class="form-control" id="start_date" name="start_date" placeholder="Fecha Inicio" value="{$start_date}" {if $params->rango_estadisticas != 'custom'}disabled{/if}>
							<input style="width:150px;{if $params->rango_estadisticas != 'custom'}display:none;{/if}" class="form-control" id="end_date" name="end_date" placeholder="Fecha Fin" value="{$end_date}" {if $params->rango_estadisticas != 'custom'}disabled{/if}>
						</div>
					  </div>
					  <div class="form-group">
						<div class="col-sm-offset-2 col-sm-9">
							<input type="button" class="btn btn-default" value="Aplicar" onclick="correrReporte($(this));" />
							<i class="fa fa-spinner fa-spin" id="estadistica_manifiestos_por_establecimiento_loading" style="display:none;"></i>

							<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="estadistica_manifiestos_por_establecimiento">
								<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
							</a>
						</div>
					  </div>
					</form>
				</div>
				<div style="clear:both"></div>
				
				<!-- tabla de resultados solo visible cuando haya datos -->
				<div id="container_resultados" {if ! $manifiestos}style="display:none;"{/if}>
					<hr>
					<h4 style="margin-top:50px;"><b>MANIFIESTOS ENCONTRADOS</b></h4>
					<table class="table table-hover table-striped" id="tabla_operador">
						<thead>
							<tr>
								<th>Est. creador</th>
								<th>Tipo Manif.</th>
								<th>Protocolo</th>
								<th>Estado</th>
								<th>Y</th>
								<th>KG</th>
								<th>KG recibidos</th>
								<th>KG tratados</th>
							</tr>
						</thead>
						<tbody>
							{foreach $manifiestos as $m}
								<tr>
									<td>{$m->nombre_establecimiento_creador}</td>
									<td>{obtener_tipo_manifiesto($m->tipo_manifiesto)}</td>
									<td><a href="listado_manifiestos.php?protocolo_id={$m->protocolo_id}">{formatear_id_protocolo_manifiesto($m->protocolo_id)}</a></td>
									<td>{$m->estado_manifiesto}</td>
									<td>{$m->residuo}</td>
									<td>{format_number_with_thousand_separator($m->cantidad_estimada)}</td>
									<td>{format_number_with_thousand_separator($m->cantidad_recibida)}</td>
									<td>{format_number_with_thousand_separator($m->cantidad_tratada)}</td>
								</tr>
							{foreachelse}
								<td colspan="8">No se han encontrado resultados.</td>
							{/foreach}
						</tbody>
					</table>
				</div>
				<div style="clear:both;"></div>

				{if $manifiestos}
					{$paginador}
				{/if}
			</div>

			<div style="clear:both;"></div>
		</div>
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

	function correrReporte(objButton)
	{
		var inputs = $("div#estadistica_manifiestos_por_establecimiento input");
		var selects = $("div#estadistica_manifiestos_por_establecimiento select");
		var params = {};
		
		inputs.each(function() {
			params[$(this).attr('id')] = $(this).val();
		});

		selects.each(function() {
			params[$(this).attr('id')] = $(this).val();
		});

		// checkeo de parametros
		if ( ! checkParametros(params)) {
			return false;
		}

		return true;
	}

	function checkParametros(params)
	{
		var err_msg = '';

		if ( ! params.usuario_establecimiento) {
			err_msg += "<br />El nombre de usuario del establecimiento es obligatorio.";
		}

		if (params.rango_estadisticas == 'custom' && (params.start_date == "" || params.end_date == "")) {
			err_msg += "<br />Complete los rangos de fecha.";
		}

		if (err_msg != '') {
			BootstrapDialog.show({
				title: 'Informaci&oacute;n',
				message: err_msg,
				buttons: [{
					label: 'Cerrar',
					action: function(dialog) {
						dialog.close();
					}
				}]
			});

			return false;
		} else {
			$("form").submit();
		}
	}

</script>
{/literal}

</html>
