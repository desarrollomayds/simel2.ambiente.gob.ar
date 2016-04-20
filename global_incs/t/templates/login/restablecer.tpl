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
	<body onload="{if $ERRORES}mostrarMensaje('exclamation-triangle','{$ERRORES}','error');{/if}">
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
					<span class="login-titulo">Reestablecimiento de Contrase&ntilde;a</span>

					</div>

					<div id="login-bloque">

						<div class="row">
							<div class="col-xs-12">
								<div id="login-cuerpo">
									{if $VALIDO}
										<div class="alert alert-success" role="alert"><p>Se envi&oacute; un mail a la direcci&oacute;n de correo registrada para el establecimiento actual, para reestablecer su contrase&ntilde;a siga los pasos indicados en el mismo.</p></div>
									{elseif $REESTABLECER_USUARIO}
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
									{else}
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
{literal}
<script>
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
</script>
{/literal}