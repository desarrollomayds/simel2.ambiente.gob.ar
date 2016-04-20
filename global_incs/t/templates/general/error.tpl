<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

					<div id="login-cabecera" class="hidden-xs">
					<span class="login-titulo"></span>
					</div>
					<div class="col-md-8 alert alert-info" style="float: none; margin: 0 auto;">
						<div class="row">
							<div class="col-md-12">
				                 <div class="error-container">
				                     <div class="error-code">{$ERROR_CODE}</div>
				                     <div class="error-text">{$ERROR_TITLE}</div>
				                     <div class="error-subtext">{$ERROR_TEXT}</div>
				                     <div class="error-subtext"></div>
				                     <div class="text-center"><a href="{$SYSTEM_PATH}"><button type="button" class="btn btn-success">Volver al Inicio</button></a></div>
				                 </div>
           					</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
