<?php /* Smarty version 3.1.27, created on 2016-02-05 15:18:27
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_manifiestos_por_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:38332127456b4e77354e737_87918869%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf71be8ddd3616dfc76db2cc10d2e1bab4821f8b' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_manifiestos_por_establecimiento.tpl',
      1 => 1454612153,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38332127456b4e77354e737_87918869',
  'variables' => 
  array (
    'params' => 0,
    'start_date' => 0,
    'end_date' => 0,
    'manifiestos' => 0,
    'm' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e773748aa2_04317782',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e773748aa2_04317782')) {
function content_56b4e773748aa2_04317782 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '38332127456b4e77354e737_87918869';
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
		.estadisticas_manifiestos {clear: both; float:left; width:100%;}
		.recuadros_cantidades {padding:2px 10px 10px 10px;background-color: #E6E6E6; border:1px dotted black;margin-bottom:10px;}

	</style>
	
</head>

<body style="margin-top:30px">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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
								<option value="1"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_establecimiento == '1') {?>selected<?php }?>>Generador</option>
								<option value="2"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_establecimiento == '2') {?>selected<?php }?>>Transportista</option>
								<option value="3"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_establecimiento == '3') {?>selected<?php }?>>Operador</option>
							</select>
							<input class="form-control" style="display:inline;max-width:438px;" type="establecimiento" id="usuario_establecimiento" name="usuario_establecimiento" placeholder="Usuario del establecimiento" value="<?php echo $_smarty_tpl->tpl_vars['params']->value->usuario_establecimiento;?>
">
						</div>
					  </div>
					  <div class="form-group">
						<label for="tipo_manifiesto" class="col-sm-2 control-label">Tipo Manif.</label>
						<div class="col-sm-9">
							<select class="form-control" id="tipo_manifiesto" name="tipo_manifiesto">
								<option value="all" <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_manifiesto == 'all') {?>selected<?php }?>>Todos</option>
								<option value="0"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_manifiesto == '0') {?>selected<?php }?>>Simple</option>
								<option value="1"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_manifiesto == '1') {?>selected<?php }?>>M&uacute;ltiple</option>
								<option value="2"   <?php if ($_smarty_tpl->tpl_vars['params']->value->tipo_manifiesto == '2') {?>selected<?php }?>>SLOP</option>
							</select>
						</div>
					  </div>
					  <div class="form-group">
						<label for="rango_fechas" class="col-sm-2 control-label">Rango</label>
						<div class="col-sm-9">
							<select class="form-control" id="rango_estadisticas" name="rango_estadisticas">
								<option value="today" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas == 'today') {?>selected<?php }?>>Hoy</option>
								<option value="current_month" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas == 'current_month') {?>selected<?php }?>>Mes Actual</option>
								<option value="last_month" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas == 'last_month') {?>selected<?php }?>>&Uacute;ltimo mes</option>
								<option value="last_6_months" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas == 'last_6_months') {?>selected<?php }?>>&Uacute;ltimos 6 meses</option>
								<option value="custom" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas == 'custom') {?>selected<?php }?>>Elegir rango</option>
							</select>
							<input style="width:150px;<?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas != 'custom') {?>display:none;<?php }?>" class="form-control" id="start_date" name="start_date" placeholder="Fecha Inicio" value="<?php echo $_smarty_tpl->tpl_vars['start_date']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas != 'custom') {?>disabled<?php }?>>
							<input style="width:150px;<?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas != 'custom') {?>display:none;<?php }?>" class="form-control" id="end_date" name="end_date" placeholder="Fecha Fin" value="<?php echo $_smarty_tpl->tpl_vars['end_date']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['params']->value->rango_estadisticas != 'custom') {?>disabled<?php }?>>
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
				<div id="container_resultados" <?php if (!$_smarty_tpl->tpl_vars['manifiestos']->value) {?>style="display:none;"<?php }?>>
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
							<?php
$_from = $_smarty_tpl->tpl_vars['manifiestos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['m']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['m']->value) {
$_smarty_tpl->tpl_vars['m']->_loop = true;
$foreach_m_Sav = $_smarty_tpl->tpl_vars['m'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['m']->value->nombre_establecimiento_creador;?>
</td>
									<td><?php echo obtener_tipo_manifiesto($_smarty_tpl->tpl_vars['m']->value->tipo_manifiesto);?>
</td>
									<td><a href="listado_manifiestos.php?protocolo_id=<?php echo $_smarty_tpl->tpl_vars['m']->value->protocolo_id;?>
"><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['m']->value->protocolo_id);?>
</a></td>
									<td><?php echo $_smarty_tpl->tpl_vars['m']->value->estado_manifiesto;?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['m']->value->residuo;?>
</td>
									<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['m']->value->cantidad_estimada);?>
</td>
									<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['m']->value->cantidad_recibida);?>
</td>
									<td><?php echo format_number_with_thousand_separator($_smarty_tpl->tpl_vars['m']->value->cantidad_tratada);?>
</td>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['m'] = $foreach_m_Sav;
}
if (!$_smarty_tpl->tpl_vars['m']->_loop) {
?>
								<td colspan="8">No se han encontrado resultados.</td>
							<?php
}
?>
						</tbody>
					</table>
				</div>
				<div style="clear:both;"></div>

				<?php if ($_smarty_tpl->tpl_vars['manifiestos']->value) {?>
					<?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

				<?php }?>
			</div>

			<div style="clear:both;"></div>
		</div>
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

<?php echo '</script'; ?>
>


</html>
<?php }
}
?>