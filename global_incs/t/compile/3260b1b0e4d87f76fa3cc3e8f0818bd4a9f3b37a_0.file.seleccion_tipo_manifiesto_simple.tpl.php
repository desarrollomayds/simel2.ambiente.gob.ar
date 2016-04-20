<?php /* Smarty version 3.1.27, created on 2016-02-05 14:51:11
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/seleccion_tipo_manifiesto_simple.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:88747668456b4e10f7fc089_04908068%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3260b1b0e4d87f76fa3cc3e8f0818bd4a9f3b37a' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/seleccion_tipo_manifiesto_simple.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '88747668456b4e10f7fc089_04908068',
  'variables' => 
  array (
    'PERFIL' => 0,
    'BASE_PATH' => 0,
    'nombre_seccion' => 0,
    'ALERTA' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e10f8e5766_92137669',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e10f8e5766_92137669')) {
function content_56b4e10f8e5766_92137669 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '88747668456b4e10f7fc089_04908068';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'generador') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Generadores', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 'transportista') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 'operador') {?>
	<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Operadores', null, 0);?>
<?php }?>

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Crear manifiesto</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','cuit'=>'true'), 0);
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

			<div id="apDiv1"><?php echo $_smarty_tpl->tpl_vars['nombre_seccion']->value;?>
</div>
		<div id="contenido-interior">
		<br />
			
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<br/>
				<span class="titulos">
				<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['PERFIL']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				</span>

				<div style="height:2px; background-color:#5D9E00"></div>

				<br />
				<div class="clear20"></div>
				<?php if ($_smarty_tpl->tpl_vars['ALERTA']->value['bloqueante'] == 'N' || $_smarty_tpl->tpl_vars['ALERTA']->value['bloqueante'] == '') {?>
				<div id="container_manifiestos_simples">
					<div class="form-group">
						<label>&#191;Con qu&eacute; tipo de Manifiesto Simple desea trabajar&#63;</label>
						<div>
							<select class="form-control" name='tipo_manifiesto' id='tipo_manifiesto'>
								<option value='<?php echo TipoManifiesto::SIMPLE;?>
' selected>Nuevo Manifiesto Simple</option>
								<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 'generador') {?>
									<option value='<?php echo TipoManifiesto::SIMPLE_CONCENTRADOR;?>
'>Nuevo Manifiesto Simple Concentrador</option>
								<?php } else { ?>
									<option value='<?php echo TipoManifiesto::SIMPLE_RES_544_94;?>
'>Nuevo Manifiesto Res. 544/94</option>
								<?php }?>
							</select>
						</div>
					</div>

					<input type="hidden" id="perfil" name="perfil" value="<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
" />

					<div align="right">
						<button type="submit" class="btn btn-success btn-sm" id='btn_ir_creacion_manifiesto'>Siguiente</button>
					</div>
				</div>
				<?php }?>
			</div>
		</div>

	</body>
</html><?php }
}
?>