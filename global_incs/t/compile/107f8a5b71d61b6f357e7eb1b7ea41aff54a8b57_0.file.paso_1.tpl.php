<?php /* Smarty version 3.1.27, created on 2015-11-20 10:28:55
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/paso_1.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:519172175564f20171f1e76_03031743%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '107f8a5b71d61b6f357e7eb1b7ea41aff54a8b57' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/paso_1.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '519172175564f20171f1e76_03031743',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'FORM_AUTH_KEY' => 0,
    'CUIT' => 0,
    'CAPTCHA_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f20172808e3_92980395',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f20172808e3_92980395')) {
function content_564f20172808e3_92980395 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '519172175564f20171f1e76_03031743';
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


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

					<div id="login-cabecera" class="hidden-xs"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/cabecera_formulario.gif" class="img-responsive"><span class="login-titulo">Registrarse</span></div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">

									<form role="form" action="paso_1.php" method="POST" id="form_paso_1" class="form-horizontal">
									<input type='hidden' name='form_auth_key' value='<?php echo $_smarty_tpl->tpl_vars['FORM_AUTH_KEY']->value;?>
'>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" id="cuit" name="cuit" value="<?php echo $_smarty_tpl->tpl_vars['CUIT']->value;?>
" placeholder="N&uacute;mero de CUIT">
											</div>
										</div>
										<div class="form-group">
												<div class="col-xs-12">
													<center><div class="g-recaptcha" data-sitekey="<?php echo $_smarty_tpl->tpl_vars['CAPTCHA_KEY']->value;?>
"></div></center>
												</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12 text-right">
												<button type="submit" class="btn btn-success" id="btn_submit">Continuar</button>
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
	$(function(){
		//filtros
		$('#cuit').filter_input({regex:'[0-9]'});

		//eventos
		$('#cuit').keypress(function(e) {
			if(e.charCode == 13)
				$('#btn_submit').click();
		})

		$('#captcha').keypress(function(e) {
			if(e.charCode == 13)
				$('#btn_submit').click();
		})

		$('#btn_reload').click(function() {
			$('#img_captcha').attr('src', mel_path+'/registracion/captcha.php');
			return false;
		})

		$('#btn_submit').click(function() {

			var campos  = [	'cuit','captcha'];

			$.ajax({
				type: "POST",
				url: mel_path+"/registracion/paso_1.php",
				data:	{	cuit    : $("#cuit").val(),
							captcha : grecaptcha.getResponse()
						},
				dataType: "text json",
				success: function(retorno){
					if(retorno['estado'] == 0){
						window.location.replace(retorno['siguiente']);
					}
					else{
						for(campo in campos){
							texto_errores = '';
							campo = campos[campo];
							//console.log(campo);
							//alert(retorno['errores'][campo]==null?"si":"no");
							if(retorno['errores'][campo] != null){
								texto_errores = retorno['errores'][campo];
							}

							if(texto_errores != ''){
								mostrarMensaje("exclamation-triangle",texto_errores,"error");
								grecaptcha.reset();
							}
						}
					}
				}
			 });

			return false;
		});

	});
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=es">
<?php echo '</script'; ?>
>
<?php }
}
?>