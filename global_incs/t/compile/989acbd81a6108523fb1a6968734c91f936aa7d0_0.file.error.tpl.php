<?php /* Smarty version 3.1.27, created on 2016-01-12 15:06:01
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/error.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:9184806356954089bba493_01545488%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '989acbd81a6108523fb1a6968734c91f936aa7d0' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/general/error.tpl',
      1 => 1443651960,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9184806356954089bba493_01545488',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ERROR_CODE' => 0,
    'ERROR_TITLE' => 0,
    'ERROR_TEXT' => 0,
    'SYSTEM_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56954089c72535_20208893',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56954089c72535_20208893')) {
function content_56954089c72535_20208893 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '9184806356954089bba493_01545488';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Inicio</title>

		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false'), 0);
?>


	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="login-logos">
						<div class="row">
							<div class="col-xs-8"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" class="img-responsive"></div>
							<div class="col-xs-12"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" class="img-responsive" style="margin: 0 auto;"></div>
						</div>
					</div>

					<div id="login-cabecera" class="hidden-xs">
					<span class="login-titulo"></span>
					</div>
					<div class="col-md-8 alert alert-info" style="float: none; margin: 0 auto;">
						<div class="row">
							<div class="col-md-12">
				                 <div class="error-container">
				                     <div class="error-code"><?php echo $_smarty_tpl->tpl_vars['ERROR_CODE']->value;?>
</div>
				                     <div class="error-text"><?php echo $_smarty_tpl->tpl_vars['ERROR_TITLE']->value;?>
</div>
				                     <div class="error-subtext"><?php echo $_smarty_tpl->tpl_vars['ERROR_TEXT']->value;?>
</div>
				                     <div class="error-subtext"></div>
				                     <div class="text-center"><a href="<?php echo $_smarty_tpl->tpl_vars['SYSTEM_PATH']->value;?>
"><button type="button" class="btn btn-success">Volver al Inicio</button></a></div>
				                 </div>
           					</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<?php }
}
?>