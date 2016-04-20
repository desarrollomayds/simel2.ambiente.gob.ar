<?php /* Smarty version 3.1.27, created on 2016-04-06 16:28:49
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_de_manifiestos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:13859349975705637152be91_65720209%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6ae49842759601b7f01591f747aea824868890a' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/estadisticas_cantidad_de_manifiestos.tpl',
      1 => 1451915392,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13859349975705637152be91_65720209',
  'variables' => 
  array (
    'res_array' => 0,
    'tipo' => 0,
    'cantidad' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5705637177ec01_99180625',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5705637177ec01_99180625')) {
function content_5705637177ec01_99180625 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '13859349975705637152be91_65720209';
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
		h4 {font-weight: bold; border-bottom: 1px solid rgba(128, 128, 128, 0.67); padding-bottom: 13px; color: #2E8DD2; font-size: 14px;}
		.estadisticas_manifiestos {clear: both; float:left; width:100%;}
		.recuadros_cantidades {padding:2px 10px 10px 10px;background-color: #E6E6E6; border:1px dotted black;margin-bottom:10px;}
		.tabla_cantidades {width:350px;float:left;}
	</style>
	
</head>

<body style="margin-top:30px">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['p'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['a'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['e'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['f'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['r'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
								<?php
$_from = $_smarty_tpl->tpl_vars['res_array']->value['v'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cantidad'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cantidad']->_loop = false;
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->_loop = true;
$foreach_cantidad_Sav = $_smarty_tpl->tpl_vars['cantidad'];
?>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['tipo']->value;?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
									</tr>
								<?php
$_smarty_tpl->tpl_vars['cantidad'] = $foreach_cantidad_Sav;
}
if (!$_smarty_tpl->tpl_vars['cantidad']->_loop) {
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
				</div>
				<div style="clear:both;"></div>
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

<?php echo '</script'; ?>
>


</html>
<?php }
}
?>