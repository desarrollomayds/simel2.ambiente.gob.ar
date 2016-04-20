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
		h4 {font-weight: bold; border-bottom: 1px solid rgba(128, 128, 128, 0.67); padding-bottom: 13px; color: #2E8DD2; font-size: 14px;}
		.estadisticas_manifiestos {clear: both; float:left; width:100%;}
		.recuadros_cantidades {padding:2px 10px 10px 10px;background-color: #E6E6E6; border:1px dotted black;margin-bottom:10px;}
		.tabla_cantidades {width:350px;float:left;}
	</style>
	{/literal}
</head>

<body style="margin-top:30px">
	{include file='drp/operacion/menuBootstrap.tpl'}

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="estadisticas_cantidad_por_residuo.php">Estad&iacute;sticas - Manifiestos Aprobados/Vencidos</a></li>
				<li class="active">Listado</li>
			</ol>
			
			<div class="table-responsive bs-example estadisticas_manifiestos" id="estadistica_cantidad_de_manifiestos">
				<div id="container_form" style="width:800px;float:left;padding:10px;">
					<form class="form-horizontal">
					  <div class="form-group">
					    <label for="rango_fechas" class="col-sm-2 control-label">Fecha creaci&oacute;n</label>
					    <div class="col-sm-10">
					      	<select class="form-control" id="rango_estadisticas" name="rango_estadisticas">
								<option value="today" selected>Hoy</option>
								<option value="current_month">Mes Actual</option>
								<option value="last_month">&Uacute;ltimo mes</option>
								<option value="last_6_months">&Uacute;ltimos 6 meses</option>
								<option value="custom" selected>Elegir rango</option>
							</select>
					    </div>
					    <div style="margin:45px 0px 0px 150px;">
							<input style="width:150px;float:left;" class="form-control" id="start_date" name="start_date" placeholder="Fecha Inicio" value="">
							<input style="width:150px;float:left;margin-left:10px;" class="form-control" id="end_date" name="end_date" placeholder="Fecha Fin" value="">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
							<input type="button" class="btn btn-default" value="Aplicar" 
							onclick="actualizarEstadistica($(this));" tipo-estadistica="estadistica_cantidad_de_manifiestos" />
							<i class="fa fa-spinner fa-spin" id="estadistica_cantidad_de_manifiestos" style="display:none;"></i>
<!--
							<a class="btn btn-primary btn-sm" onclick="descargarEstadisticaCSV($(this));" tipo-estadistica="estadistica_cantidad_de_manifiestos">
								<i class="fa fa-download">&nbsp;&nbsp;.CSV</i>
							</a>
-->
					    </div>
					  </div>
					</form>
				</div>

				<!-- operador -->
				<div id="container_resultados">
					<div class="tabla_cantidades" id="container_pendientes">
						<h4>Manifiestos Pendientes</h4>
						<table class="table table-hover table-striped" id="tabla_pendientes">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['p'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>

					<div class="tabla_cantidades" id="container_aprobados">
						<h4>Manifiestos Aprobados</h4>
						<table class="table table-hover table-striped" id="tabla_aprobados">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['a'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>

					<div class="tabla_cantidades" id="container_recibidos">
						<h4>Manifiestos Recibidos</h4>
						<table class="table table-hover table-striped" id="tabla_recibidos">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['e'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>

					<div class="tabla_cantidades" id="container_tratados">
						<h4>Manifiestos Tratados</h4>
						<table class="table table-hover table-striped" id="tabla_tratados">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['f'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>

					<div class="tabla_cantidades" id="container_rechazados">
						<h4>Manifiestos Rechazados</h4>
						<table class="table table-hover table-striped" id="tabla_rechazados">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['r'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>

					<div class="tabla_cantidades" id="container_vencidos">
						<h4>Manifiestos Vencidos</h4>
						<table class="table table-hover table-striped" id="tabla_vencidos">
							<thead>
								<tr>
									<th>Tipo</th>
									<th>Cantidad</th>
								</tr>
							</thead>
							<tbody>
								{foreach $res_array['v'] as $tipo => $cantidad}
									<tr>
										<td>{$tipo}</td>
										<td>{$cantidad}</td>
									</tr>
								{foreachelse}
									<tr>
										<td colspan="4">No se han encontrado resultados</td>
									</tr>
								{/foreach}
							</tbody>
						</table>
					</div>
				</div>
				<div style="clear:both;"></div>
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

    // @override
	function actualizarEstadistica(objButton)
	{
	    var tipo_estadistica = 'estadistica_cantidad_de_manifiestos';
	    var inputs = $("div#"+tipo_estadistica+" input");
	    var selects = $("div#"+tipo_estadistica+" select");
	    var params = {};
	    
	    inputs.each(function() {
			params[$(this).attr('id')] = $(this).val();
	    });

	    selects.each(function() {
	        params[$(this).attr('id')] = $(this).val();
	    });

	    // escondemos boton aplicar y mostramos loader
	    objButton.hide();
	    $("#estadistica_cantidad_de_manifiestos_loading").show();

	    $.ajax({
	        type: "POST",
	        url: admin_path+"/operacion/ajax/ajax_actualizar_estadistica_cantidad_de_manifiestos.php",
	        data: {
	            params: JSON.stringify(params)
	        },
	        dataType: "text json",
	        success: function(rsp) {
	            parse_tables(rsp);
	            // al terminar de parsear los datos volvemos botones a estado original
	            $("#"+tipo_estadistica+"_loading").hide();
	            objButton.show();
	        }
	    });
	}

	function parse_tables(obj)
	{
		$.each(obj, function(estado, rows) {

			switch (estado) {
				case 'p':
					var tabla = $("table#tabla_pendientes");
				break;
				case 'a':
					var tabla = $("table#tabla_aprobados");
				break;
				case 'e':
					var tabla = $("table#tabla_recibidos");
				break;
				case 'f':
					var tabla = $("table#tabla_tratados");
				break;
				case 'r':
					var tabla = $("table#tabla_rechazados");
				break;
				case 'v':
					var tabla = $("table#tabla_vencidos");
				break;
			}

			// limpiamos la tabla
			tabla.find("tr:gt(0)").remove();
			var row_string = '';

			$.each(rows, function(key, r) {
				row_string += '<tr>\
					<td>'+ key + '</td>\
					<td>'+ r + '</td>';
			});

			tabla.append(row_string);
		});
	}

</script>
{/literal}

</html>
