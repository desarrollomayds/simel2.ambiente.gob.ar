<?php /* Smarty version 3.1.27, created on 2016-03-09 13:55:14
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_por_residuo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13689521756e055726d6348_96696201%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3eb0e94985aa3d5c054e7cf0088dad5c75345737' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_por_residuo.tpl',
      1 => 1449683404,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13689521756e055726d6348_96696201',
  'variables' => 
  array (
    'criterios' => 0,
    'estadisticas_no_slop_json' => 0,
    'estadisticas_no_slop' => 0,
    'row' => 0,
    'estadisticas_slop_json' => 0,
    'estadisticas_slop' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e05572adfd42_37477760',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e05572adfd42_37477760')) {
function content_56e05572adfd42_37477760 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13689521756e055726d6348_96696201';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','graphs'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','graphs'=>'true'), 0);
?>


	
	<style type="text/css">
		h5 {font-weight: bold; border-bottom: 1px solid rgba(128, 128, 128, 0.67); padding-bottom: 13px; color: #2E8DD2; font-size: 14px;}
		.estadisticas_residuos {clear: both; float:left; width:100%;}
	</style>
	
</head>

<body style="margin-top:30px">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['csc'];?>
">
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
				<input type="hidden" id="no_slop_json_graph_data" name="no_slop_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_no_slop_json']->value;?>
' />

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
							<?php
$_from = $_smarty_tpl->tpl_vars['estadisticas_no_slop']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value->csc;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value->descripcion;?>
</td>
								<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['row']->value->cantidad);?>
kg</td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
								<tr>
									<td colspan="3">No se han encontrado resultados</td>
								</tr>
							<?php
}
?>
						</tbody>
					</table>
				</div>
			</div>


			<!-- Cantidad por residuo SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_solo_slop">
				<h5>Cantidades totales en kg de manifiestos de tipo: SLOP</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['csc'];?>
">

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

				<input type="hidden" id="slop_json_graph_data" name="slop_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_slop_json']->value;?>
' />

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
							<?php
$_from = $_smarty_tpl->tpl_vars['estadisticas_slop']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['row'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['row']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
$foreach_row_Sav = $_smarty_tpl->tpl_vars['row'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['row']->value->csc;?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['row']->value->descripcion;?>
</td>
									<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['row']->value->cantidad);?>
kg</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
								<tr>
									<td colspan="3">No se han encontrado resultados</td>
								</tr>
							<?php
}
?>
						</tbody>
					</table>
				</div>
			</div>
			<div style="clear:both;"></div>

		</div>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios','HIDDEN_INFO'=>'true'), 0);
?>

</body>

<?php echo '<script'; ?>
>

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

<?php echo '</script'; ?>
>


</html>
<?php }
}
?>