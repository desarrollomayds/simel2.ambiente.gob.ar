<?php /* Smarty version 3.1.27, created on 2016-03-18 13:55:59
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_por_residuo_y_tratamiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:8645828856ec331ff11b52_95923599%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2925f23f7f7a384b0606177967a74a331040b054' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_por_residuo_y_tratamiento.tpl',
      1 => 1449683455,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8645828856ec331ff11b52_95923599',
  'variables' => 
  array (
    'criterios' => 0,
    'estadisticas_residuos_json' => 0,
    'estadisticas_tratamientos_json' => 0,
    'estadisticas_residuo_y_tratamiento' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56ec3320142447_10979085',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56ec3320142447_10979085')) {
function content_56ec3320142447_10979085 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '8645828856ec331ff11b52_95923599';
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
				<li><a href="estadisticas_cantidad_por_residuo_y_tratamiento.php">Estad&iacute;sticas - Residuo y tratamiento</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo y tratamiento -->
			<div class="table-responsive bs-example estadisticas_residuos" id="cantidad_por_residuo_y_tratamiento">
				<h5>Cantidades totales en kg y por residuo y tratamiento</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['csc'];?>
">
					<label for="csc">Tratamiento: </label>
					<input style="width:150px;" class="form-control" id="tratamiento" name="tratamiento" placeholder="Tratamiento" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['tratamiento'];?>
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

				<input type="hidden" id="residuos_json_graph_data" name="residuos_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_residuos_json']->value;?>
' />
				<input type="hidden" id="tratamientos_json_graph_data" name="tratamientos_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_tratamientos_json']->value;?>
' />

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
						<?php
$_from = $_smarty_tpl->tpl_vars['estadisticas_residuo_y_tratamiento']->value;
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
								<td><?php echo $_smarty_tpl->tpl_vars['row']->value->tratamiento;?>
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
								<td colspan="4">No se han encontrado resultados</td>
							</tr>
						<?php
}
?>
					</tbody>
				</table>
			</div>
			<div style="clear:both;"></div>

		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios','HIDDEN_INFO'=>'true'), 0);
?>

</body>


<?php echo '<script'; ?>
>
	var residuos_chart_data = jQuery.parseJSON($("#residuos_json_graph_data").val());
	generateBarsChart('pie_chart_residuos', residuos_chart_data);

	var tratamientos_chart_data = jQuery.parseJSON($("#tratamientos_json_graph_data").val());
	generateBarsChart('pie_chart_tratamientos', tratamientos_chart_data);
<?php echo '</script'; ?>
>


</html>
<?php }
}
?>