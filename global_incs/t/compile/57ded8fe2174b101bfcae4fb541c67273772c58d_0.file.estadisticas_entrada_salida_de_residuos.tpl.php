<?php /* Smarty version 3.1.27, created on 2015-12-09 15:48:25
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_entrada_salida_de_residuos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:137629275956687779637891_67773348%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57ded8fe2174b101bfcae4fb541c67273772c58d' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_entrada_salida_de_residuos.tpl',
      1 => 1449683504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137629275956687779637891_67773348',
  'variables' => 
  array (
    'criterios' => 0,
    'provincias' => 0,
    'prov' => 0,
    'estadisticas_salida_json' => 0,
    'estadisticas_entrada_json' => 0,
    'estadisticas_entrada_salida_de_residuos' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56687779778474_94440514',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56687779778474_94440514')) {
function content_56687779778474_94440514 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '137629275956687779637891_67773348';
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
				<li><a href="estadisticas_entrada_salida_de_residuos.php">Estad&iacute;sticas - Entrada/Salida por Jurisdicci&oacute;n</a></li>
				<li class="active">Listado</li>
			</ol>

			<!-- Cantidad por residuo no SLOP -->
			<div class="table-responsive bs-example estadisticas_residuos" id="entrada_salida_residuos_provincia">
				<h5>Entrada y salida de residuos por provincia (el reporte consulta manifiestos finalizados).</h5>

				<div class="form-inline form-group">
					<label for="csc">CSC: </label>
					<input style="width:150px;margin-left:10px;margin-right:10px;" class="form-control" id="csc" name="csc" placeholder="CSC" value="<?php echo $_smarty_tpl->tpl_vars['criterios']->value['csc'];?>
">
					
					<label for="provincia_desde">Desde: </label>
					<select style="width:200px;margin-left:10px;margin-right:10px;" class="form-control" id='provincia_desde' name='provincia_desde'>
						<option value=''>TODAS</option>
						<?php
$_from = $_smarty_tpl->tpl_vars['provincias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['prov'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['prov']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['prov']->value) {
$_smarty_tpl->tpl_vars['prov']->_loop = true;
$foreach_prov_Sav = $_smarty_tpl->tpl_vars['prov'];
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['prov']->value->codigo;?>
' <?php if ($_smarty_tpl->tpl_vars['criterios']->value['provincia_desde'] == $_smarty_tpl->tpl_vars['prov']->value->codigo) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['prov']->value->descripcion;?>
</option>
						<?php
$_smarty_tpl->tpl_vars['prov'] = $foreach_prov_Sav;
}
?>
					</select>

					<label for="csc">Hacia: </label>
					<select style="width:200px;margin-left:10px;margin-right:10px;" class="form-control" id='provincia_hacia' name='provincia_hacia'>
						<option value=''>TODAS</option>
						<?php
$_from = $_smarty_tpl->tpl_vars['provincias']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['prov'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['prov']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['prov']->value) {
$_smarty_tpl->tpl_vars['prov']->_loop = true;
$foreach_prov_Sav = $_smarty_tpl->tpl_vars['prov'];
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['prov']->value->codigo;?>
' <?php if ($_smarty_tpl->tpl_vars['criterios']->value['provincia_hacia'] == $_smarty_tpl->tpl_vars['prov']->value->codigo) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['prov']->value->descripcion;?>
</option>
						<?php
$_smarty_tpl->tpl_vars['prov'] = $foreach_prov_Sav;
}
?>
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

				<input type="hidden" id="prov_salida_json_graph_data" name="prov_salida_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_salida_json']->value;?>
' />
				<input type="hidden" id="prov_entrada_json_graph_data" name="prov_entrada_json_graph_data" value='<?php echo $_smarty_tpl->tpl_vars['estadisticas_entrada_json']->value;?>
' />

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
						<?php
$_from = $_smarty_tpl->tpl_vars['estadisticas_entrada_salida_de_residuos']->value;
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
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value->enviado;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['row']->value->recibido;?>
</td>
							<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['row']->value->cantidad);?>
kg</td>
							<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['row']->value->cantidad_real);?>
kg</td>
						</tr>
						<?php
$_smarty_tpl->tpl_vars['row'] = $foreach_row_Sav;
}
if (!$_smarty_tpl->tpl_vars['row']->_loop) {
?>
							<tr>
								<td colspan="6">No se han encontrado resultados</td>
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

	var prov_salida_chart_data = jQuery.parseJSON($("#prov_salida_json_graph_data").val());
	generateBarsChart('pie_chart_prov_salida', prov_salida_chart_data);

	var prov_entrada_chart_data = jQuery.parseJSON($("#prov_entrada_json_graph_data").val());
	generateBarsChart('pie_chart_prov_entrada', prov_entrada_chart_data);

<?php echo '</script'; ?>
>


</html>
<?php }
}
?>