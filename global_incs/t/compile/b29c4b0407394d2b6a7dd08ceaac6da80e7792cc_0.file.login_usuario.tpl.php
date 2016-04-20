<?php /* Smarty version 3.1.27, created on 2016-02-05 14:11:37
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/login/login_usuario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:198897493956b4d7c91cc819_86198440%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b29c4b0407394d2b6a7dd08ceaac6da80e7792cc' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/login/login_usuario.tpl',
      1 => 1443651961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '198897493956b4d7c91cc819_86198440',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ADMIN_PATH' => 0,
    'ERRORES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4d7c927af17_25160199',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4d7c927af17_25160199')) {
function content_56b4d7c927af17_25160199 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '198897493956b4d7c91cc819_86198440';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Inicio</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','formularios'=>'true'), 0);
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
					<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/cabecera_formulario.gif" class="img-responsive">
					<span class="login-titulo">Ingreso al panel de administraci&oacute;n de la DRP</span>

					</div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">
									<form role="form" action="<?php echo $_smarty_tpl->tpl_vars['ADMIN_PATH']->value;?>
/login/login_usuario.php" method="POST">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input class="form-control" type="text" name="usuario" id="usuario" placeholder="Usuario">
										</div>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"></i></span>
											<input class="form-control" type="password" name="contrasenia" id="contrasenia" placeholder="Contrase&ntilde;a">
										</div>
										<div class="row">
											<div class="col-xs-12">
												<button type="submit" class="btn btn-success btn-ingresar col-xs-12" id="btn_submit">Ingresar</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>

<?php echo '<script'; ?>
>
	$('#btn_submit').click(function() {
		$('#form_login').submit();
	})

	$('#usuario').keypress(function(e) {
		if(e.charCode == 13)
			$('#form_login').submit();
	})

	$('#contrasenia').keypress(function(e) {
		if(e.charCode == 13)
			$('#form_login').submit();
	})
<?php echo '</script'; ?>
>


<?php if ($_smarty_tpl->tpl_vars['ERRORES']->value['LOGIN']) {?>
<?php echo '<script'; ?>
>mostrarMensaje("exclamation-triangle","<?php echo $_smarty_tpl->tpl_vars['ERRORES']->value['LOGIN'];?>
","error");<?php echo '</script'; ?>
>
<?php }
}
}
?>