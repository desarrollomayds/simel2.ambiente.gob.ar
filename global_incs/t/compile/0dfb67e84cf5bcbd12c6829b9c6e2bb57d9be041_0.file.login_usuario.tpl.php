<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:37
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/login/login_usuario.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2060789137564f1f8d193eb8_61228140%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0dfb67e84cf5bcbd12c6829b9c6e2bb57d9be041' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/login/login_usuario.tpl',
      1 => 1443651961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2060789137564f1f8d193eb8_61228140',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'MEL_PATH' => 0,
    'ERRORES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f8d246d26_21350817',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f8d246d26_21350817')) {
function content_564f1f8d246d26_21350817 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2060789137564f1f8d193eb8_61228140';
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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
					<span class="login-titulo">Ingreso al Formulario</span>

					</div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">
									<form role="form" action="<?php echo $_smarty_tpl->tpl_vars['MEL_PATH']->value;?>
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
										<div class="row extras">
											<div class="col-xs-12 col-sm-6">
													<a class="btn btn-default col-xs-12" href="<?php echo $_smarty_tpl->tpl_vars['MEL_PATH']->value;?>
/registracion/paso_1.php" role="button"><i class="fa fa-user"></i> Registrarse</a>
											</div>
											<div class="col-xs-12 col-sm-6">
													<a class="btn btn-default col-xs-12" href="<?php echo $_smarty_tpl->tpl_vars['MEL_PATH']->value;?>
/login/restablecer/" role="button"><i class="fa fa-lock"></i> Recordar contrase&ntilde;a</a>
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