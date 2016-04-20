<!DOCTYPE html>
<html>
<head>

	{include file='general/meta.tpl'}

	<title>Registracu&oacute;n - Finalizada</title>

	<!-- carga de css -->
	{include file='general/css_headers.tpl' bootstrap='true'}
	<!-- carga de js y files especificos para la seccion -->
	{include file='general/js_headers.tpl' bootstrap='true'}

</head>

	<body>

		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-logos">
						<div class="row">
							<div class="col-xs-4"><img src="{$BASE_PATH}/images/LogoDRP.png" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo_mel.gif" class="img-responsive"></div>
							<div class="col-xs-4"><img src="{$BASE_PATH}/imagenes/logo.gif" class="img-responsive"></div>
						</div>
					</div>

					<div id="registro-bloque">
						<input id="rol_id" type="hidden" value="{$ROL_ID}">
						<div class="row">
							<div class="col-xs-12">
								<div id="registro-cuerpo">

								{if $ERROR}
							        <div class="alert alert-danger" role="alert">Ocurri&oacute; un error al guardar los datos. La Administraci&oacute;n fue informada sobre el suceso para ser investigado.</div>
								{else}
									<div class="alert alert-success" role="alert">El proceso de registraci&oacute;n finaliz&oacute; correctamente, esta registraci&oacute;n est&aacute; siendo evaluada por la direcci&oacute;n de residuos pleligrosos.</div>

							    	    <div class="row" style="margin-top:50px;">
										    <div class="col-xs-12 text-right">
										    	<a class="btn btn-default" href="imprimir.php" target="_blank"><i class="fa fa-print"></i> Imprimir</a>
										    	<a class="btn btn-success" href="{$MEL_PATH}/login/login_usuario.php">Confirmar</a>
										    </div>
									    </div>

								{/if}

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

</html>
