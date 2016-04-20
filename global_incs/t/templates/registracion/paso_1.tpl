<!DOCTYPE html>
<html>
<head>

	{include file='general/meta.tpl'}

	<title>Inicio</title>

	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true' mapa='false'}
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="login-logos">
						<div class="row">
							<div class="col-xs-8"><img src="{$BASE_PATH}/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo.gif" class="img-responsive"></div>
							<div class="col-xs-12"><img src="{$BASE_PATH}/imagenes/logo_mel.gif" class="img-responsive" style="margin: 0 auto;"></div>
						</div>
					</div>

					<div id="login-cabecera" class="hidden-xs"><img src="{$BASE_PATH}/imagenes/cabecera_formulario.gif" class="img-responsive"><span class="login-titulo">Registrarse</span></div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">

									<form role="form" action="paso_1.php" method="POST" id="form_paso_1" class="form-horizontal">
									<input type='hidden' name='form_auth_key' value='{$FORM_AUTH_KEY}'>

										<div class="form-group">
											<div class="col-xs-12">
												<input type="text" class="form-control" id="cuit" name="cuit" value="{$CUIT}" placeholder="N&uacute;mero de CUIT">
											</div>
										</div>
										<div class="form-group">
												<div class="col-xs-12">
													<center><div class="g-recaptcha" data-sitekey="{$CAPTCHA_KEY}"></div></center>
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

{literal}
<script>
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
</script>
<script type="text/javascript"
        src="https://www.google.com/recaptcha/api.js?hl=es">
</script>
{/literal}