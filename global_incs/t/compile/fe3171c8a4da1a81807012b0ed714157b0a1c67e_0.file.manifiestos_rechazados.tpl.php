<?php /* Smarty version 3.1.27, created on 2015-11-20 10:27:20
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_rechazados.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:793887209564f1fb815c7f0_76228978%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe3171c8a4da1a81807012b0ed714157b0a1c67e' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_rechazados.tpl',
      1 => 1445546606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '793887209564f1fb815c7f0_76228978',
  'variables' => 
  array (
    'PERFIL' => 0,
    'nombre_seccion' => 0,
    'rol' => 0,
    'TIPO_MANIFIESTO' => 0,
    'filtros_buscador' => 0,
    'criterios' => 0,
    'MANIFIESTOS' => 0,
    'MANIFIESTO' => 0,
    'pagination' => 0,
    'tipo_rechazados' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1fb82fd558_05778911',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1fb82fd558_05778911')) {
function content_564f1fb82fd558_05778911 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '793887209564f1fb815c7f0_76228978';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<title>Manifiestos Rechazados</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','cuit'=>'true'), 0);
?>

	</head>

	<body>
		<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 1) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Generadores', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('generador', null, 0);?>
		<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 2) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('transportista', null, 0);?>
		<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 3) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Operadores', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('operador', null, 0);?>
		<?php }?>

	<div id="login-top" align="center">
		<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
		</div>
	</div>

		<div id="contenedor-interior">
		<?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<div id="apDiv1"><?php echo $_smarty_tpl->tpl_vars['nombre_seccion']->value;?>
<br /></div>

			<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['rol']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<div style="height:2px; background-color:#5D9E00"></div>
				<div class="clear20"></div>
					<strong>MANIFIESTOS RECHAZADOS</strong>
				</span>
				<br />
				<br />

				<?php echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"manifiestos_rechazados.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value)), 0);
?>


				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['rechazados_por'] == 'mi') {?> class="active" <?php }?>>
						<a href="manifiestos_rechazados.php?rechazados_por=mi">Mis Rechazados</a>
					</li>
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['criterios']->value['rechazados_por'] == 'otros') {?> class="active" <?php }?>>
						<a href="manifiestos_rechazados.php?rechazados_por=otros">Por otras Partes</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					
					<div role="tabpanel" class="tab-pane active" id="container_mis_rechazados">
						<div class="table-responsive bs-example">
					    	<table class="table table-hover table-striped">
								<thead>
									<tr>
										<th>ID Operaci&oacute;n</th>
										<th>Fecha<br />Creaci&oacute;n</th>
										<th>Fecha<br />Rechazo</th>
										<th>Tipo Manifiesto</th>
										<th>Empresa creadora</th>
										<th>Establecimiento</th>
										<th>Sucursal</th>
										<th>Estado</th>
										<th>Motivo</th>
									</tr>
								</thead>
								<tbody>
									<?php
$_from = $_smarty_tpl->tpl_vars['MANIFIESTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['MANIFIESTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['MANIFIESTO']->value) {
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = true;
$foreach_MANIFIESTO_Sav = $_smarty_tpl->tpl_vars['MANIFIESTO'];
?>
										<tr>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion->format('Y-m-d H:i:s');?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_rechazo->format('Y-m-d H:i:s');?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->tipo_manifiesto_nombre;?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_empresa;?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_establecimiento;?>
</td>
											<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->sucursal;?>
</td>
											<td>Rechazado</td>

											<td width="27" align="center">
												<a class="hand">
													<i class="fa fa-search" 
														empresa-rechazo="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->empresa_rechazo;?>
"
														establecimiento-rechazo="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->establecimiento_rechazo;?>
"
														sucursal-rechazo="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->sucursal_rechazo;?>
"
														fecha-rechazo="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_rechazo->format('Y-m-d H:i:s');?>
"
														motivo-rechazo="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->motivo_rechazo;?>
"

														onclick="verMotivoRechazo($(this));" data-toggle="modal" 
														data-target="#motivo_rechazo_popup" style="color:#333333;">
													</i>
												</a>
											</td>
										</tr>
									<?php
$_smarty_tpl->tpl_vars['MANIFIESTO'] = $foreach_MANIFIESTO_Sav;
}
if (!$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop) {
?>
										<tr>
											<td colspan="6">No se han encontrado resultados.</td>
										</tr>
									<?php
}
?>
								</tbody>
							</table>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['MANIFIESTOS']->value) {?>
							<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

						<?php }?>

						<div align="right" style="margin-top:20px;">
							<a class="btn btn-primary btn-sm" href='?exportar&tipo_rechazados=<?php echo $_smarty_tpl->tpl_vars['tipo_rechazados']->value;?>
'>
								Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
							</a>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="container_rechazados_por_otras_partes"></div>

				<br /><span class="titulos"><br /></span><br />
			</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'motivo_rechazo'), 0);
?>

	</body>
</html>




<?php echo '<script'; ?>
>

	function verMotivoRechazo(obj)
	{
		var empresa = obj.attr('empresa-rechazo');
		var establecimiento = obj.attr('establecimiento-rechazo');
		var sucursal = obj.attr('sucursal-rechazo');
		var fecha = obj.attr('fecha-rechazo');
		var motivo = obj.attr('motivo-rechazo');

		var view = '<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Empresa</span><input type="text" class="form-control" style="width:400px;" placeholder="'+empresa+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Establecimiento</span><input type="text" class="form-control" style="width:400px;" placeholder="'+establecimiento+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Sucursal</span><input type="text" class="form-control" style="width:400px;" placeholder="'+sucursal+'" aria-describedby="basic-addon1" disabled></div><br />\
			<div class="input-group"><span class="input-group-addon" id="basic-addon1" style="width:160px;">Fechar de Rechazo</span><input type="text" class="form-control" style="width:400px;" placeholder="'+fecha+'" aria-describedby="basic-addon1" disabled></div><br />\
			<b>Descripci&oacute;n:</b><div class="clear20"></div>\
			<div class="well well-lg">'+motivo+'</div>\
			<div align="right"><button class="btn btn-default" type="button" data-dismiss="modal">Cerrar</button></div>';

		$('#motivo_rechazo_popup_title').html("Motivo Rechazo");
		$('#motivo_rechazo_popup_body').html(view);
		$('#motivo_rechazo_popup_content').width(600);
	}

<?php echo '</script'; ?>
>

<?php }
}
?>