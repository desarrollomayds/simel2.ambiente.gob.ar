<?php /* Smarty version 3.1.27, created on 2016-02-18 11:54:27
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/manifiestos_recibidos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:169023729956c5db233d4838_07675629%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '778e47593bb9568d9a18e5da335f5091f88e6eab' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/manifiestos_recibidos.tpl',
      1 => 1445546597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169023729956c5db233d4838_07675629',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'PERFIL' => 0,
    'TIPO_MANIFIESTO' => 0,
    'filtros_buscador' => 0,
    'MANIFIESTOS' => 0,
    'MANIFIESTO' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c5db2349ab43_81542145',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c5db2349ab43_81542145')) {
function content_56c5db2349ab43_81542145 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '169023729956c5db233d4838_07675629';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Manifiestos recibidos</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','cuit'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
</head>

<body>
	<div id="bigscreen" onclick="" style="left: 0px;background-color: grey;filter: alpha(opacity=50);opacity: 0.5;z-index: 999;position: absolute;display: none;"></div>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

	<div id="contenedor-interior">
		<?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<div id="apDiv1">Operadores<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
			<!-- DATOS, ESTADISTICAS Y ALERTAS -->
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<!-- DATOS, ESTADISTICAS Y ALERTA -->
			<br />
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/operador/menu_solapas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<div style="height:2px; background-color:#5D9E00;"></div>
			<div class="clear20"></div>
				<strong>MANIFIESTOS RECIBIDOS</strong>
			</span>
			<div class="clear20"></div>

			<?php echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"manifiestos_recibidos.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value)), 0);
?>


			<ul class="nav nav-tabs">
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SIMPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::MULTIPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?> class="active" <?php }?>>
					<a href="manifiestos_recibidos.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<div class="table-responsive bs-example">
            	<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Protocolo</th>
							<th>Empresa creadora</th>
							<th>Establecimiento</th>
							<th>Sucursal</th>
							<th>Fecha creaci&oacute;n</th>
							<th>Fecha Recepci&oacute;n</th>
							<th>Cert.Recepci&oacute;n</th>
							<th>Impr.</th>
							<th>Procesar</th>
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
								<td id="id"><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value->id_protocolo_manifiesto);?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_empresa;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_establecimiento;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->sucursal;?>
</td>
								<td><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion) {?> <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion->format('Y-m-d H:i:s');?>
 <?php }?></td>
								<td><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_recepcion) {?> <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_recepcion->format('Y-m-d H:i:s');?>
 <?php }?></td>
								<td width="25" align="center">
									<a class='hand' href="imprimir_constancia_recepcion.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
										<i class="fa fa-print fa-lg" style="line-height:30px;color:#333333;"></i>
									</a>
								</td>
								<td>
									<a class="hand" href="imprimir_manifiesto.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
										<i class="fa fa-print fa-lg" style="line-height:30px;color:#333333;"></i>
									</a>
								</td>
								<td width="25" align="center">
									<a class='btn_procesar_manifiesto hand' onclick="procesarManifiesto(<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
)">
										<i class="fa fa-cogs fa-lg" style="line-height:30px;color:#333333;" data-toggle="modal" data-target="#mel_popup"></i>
									</a>
								</td>
							</tr>
						<?php
$_smarty_tpl->tpl_vars['MANIFIESTO'] = $foreach_MANIFIESTO_Sav;
}
if (!$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop) {
?>
							<tr>
								<td colspan="9">No se han encontrado resultados.</td>
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

			<table width="880" border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td align='right'>
						<a class="btn btn-primary btn-sm" href='?exportar'>
							Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
						</a>
					</td>
				</tr>
			</table>

			<br /><span class="titulos"><br /></span><br />
		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'tratamientos'), 0);
?>

	</div>

</body>

</html>


<?php }
}
?>