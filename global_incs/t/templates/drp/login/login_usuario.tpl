<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Inicio</title>
	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true' formularios='true'}
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

					<div id="login-cabecera" class="hidden-xs">
					<img src="{$BASE_PATH}/imagenes/cabecera_formulario.gif" class="img-responsive">
					<span class="login-titulo">Ingreso al panel de administraci&oacute;n de la DRP</span>

					</div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">
									<form role="form" action="{$ADMIN_PATH}/login/login_usuario.php" method="POST">
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
{literal}
<script>
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
</script>
{/literal}

{if $ERRORES.LOGIN}
<script>mostrarMensaje("exclamation-triangle","{$ERRORES.LOGIN}","error");</script>
{/if}