<?php /* Smarty version 3.1.27, created on 2015-11-20 10:29:42
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/finalizar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:488687059564f204665c613_69361994%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53d3024da74b9f03a4d8bb83d320ea281290abeb' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/finalizar.tpl',
      1 => 1444244842,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '488687059564f204665c613_69361994',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ROL_ID' => 0,
    'ERROR' => 0,
    'MEL_PATH' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f20466ce079_67672488',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f20466ce079_67672488')) {
function content_564f20466ce079_67672488 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '488687059564f204665c613_69361994';
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<title>Registracu&oacute;n - Finalizada</title>

	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>


</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-logos">
						<div class="row">
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" class="img-responsive"></div>
							<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" class="img-responsive"></div>
						</div>
					</div>

					<div id="registro-bloque">
						<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
						<div class="row">
							<div class="col-xs-12">
								<div id="registro-cuerpo">

								<?php if ($_smarty_tpl->tpl_vars['ERROR']->value) {?>
							        <div class="alert alert-danger" role="alert">Ocurri&oacute; un error al guardar los datos. La Administraci&oacute;n fue informada sobre el suceso para ser investigado.</div>
								<?php } else { ?>
									<div class="alert alert-success" role="alert">El proceso de registraci&oacute;n finaliz&oacute; correctamente, esta registraci&oacute;n est&aacute; siendo evaluada por la direcci&oacute;n de residuos pleligrosos.</div>

							    	    <div class="row" style="margin-top:50px;">
										    <div class="col-xs-12 text-right">
										    	<a class="btn btn-default" href="imprimir.php" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
										    	<a class="btn btn-success" href="<?php echo $_smarty_tpl->tpl_vars['MEL_PATH']->value;?>
/login/login_usuario.php">Confirmar</a>
										    </div>
									    </div>

								<?php }?>

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