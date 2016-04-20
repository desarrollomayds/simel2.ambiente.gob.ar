<?php /* Smarty version 3.1.27, created on 2016-03-31 14:12:46
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/login/restablecer.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:89470775656fd5a8e462fd0_89527249%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '340e0c535af4f747993bfdee12d944e03ed090bb' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/login/restablecer.tpl',
      1 => 1443651961,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '89470775656fd5a8e462fd0_89527249',
  'variables' => 
  array (
    'ERRORES' => 0,
    'BASE_PATH' => 0,
    'VALIDO' => 0,
    'REESTABLECER_USUARIO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56fd5a8e56a927_55223860',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56fd5a8e56a927_55223860')) {
function content_56fd5a8e56a927_55223860 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '89470775656fd5a8e462fd0_89527249';
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
	<body onload="<?php if ($_smarty_tpl->tpl_vars['ERRORES']->value) {?>mostrarMensaje('exclamation-triangle','<?php echo $_smarty_tpl->tpl_vars['ERRORES']->value;?>
','error');<?php }?>">
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
					<span class="login-titulo">Reestablecimiento de Contrase&ntilde;a</span>

					</div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">
									<?php if ($_smarty_tpl->tpl_vars['VALIDO']->value) {?>
										<div class="alert alert-success" role="alert"><p>Se envi&oacute; un mail a la direcci&oacute;n de correo registrada para el establecimiento actual, para reestablecer su contrase&ntilde;a siga los pasos indicados en el mismo.</p></div>
									<?php } elseif ($_smarty_tpl->tpl_vars['REESTABLECER_USUARIO']->value) {?>
										<form role="form" method="POST">
											<input type="hidden" name="check" value="hei28euhebs9skadpolw11"/>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input class="form-control" type="password" name="nueva_clave" id="nueva_clave" placeholder="Nueva contrase&ntilde;a"/>
											</div>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-key"></i></span>
												<input class="form-control" type="password" name="nueva_clave_confirmacion" id="nueva_clave_confirmacion" placeholder="Confirmar nueva contrase&ntilde;a"/>
											</div>
											<div class="row">
												<div class="col-xs-12">
													<button type="submit" class="btn btn-success col-xs-12" id="confirmar_clave">Confirmar</button>
												</div>
											</div>
										</form>
									<?php } else { ?>
										<form role="form" method="POST">
											<input type="hidden" name="check" value="gyg26d2u8d8723gd928wyhdd"/>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input class="form-control" type="text" name="usuario" id="usuario" placeholder="CUIT/ID Establecimiento"/>
											</div>
											<div class="row">
												<div class="col-xs-12">
													<button type="submit" class="btn btn-success btn-ingresar col-xs-12" id="btn_submit">Enviar</button>
												</div>
											</div>
										</form>
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

<?php echo '<script'; ?>
>
$(document).ready(function(){
	//función click
	$("#btn_submit").click(function(){
		var usuario = $("#usuario").val();
		if(usuario == ""){
			mostrarMensaje("exclamation-triangle","Debe ingresar el CUIT/ID de Establecimiento.","error");
			return false;
		}
		cerrar_mensajes();
		return true;
	});//click
});//ready
<?php echo '</script'; ?>
>
<?php }
}
?>