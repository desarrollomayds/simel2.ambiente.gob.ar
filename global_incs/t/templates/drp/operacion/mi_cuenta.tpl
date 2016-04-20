<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    {include file='general/css_headers_bootstrap.tpl' bootstrap='true' datepicker='true'}
    <!-- carga de js y files especificos para la seccion -->
    {include file='general/js_headers_bootstrap.tpl' bootstrap='true' datepicker='true'}

    <style type="text/css">{literal}
    	.obligatorio {color:red;}
    	.passw_label {color:#5F9EA0;text-align:right;}
    	.error {border-color:red;color:red;}
    {/literal}</style>
</head>

<body style="margin-top:30px">
    {include file='drp/operacion/menuBootstrap.tpl'}

        <div class="main">
	        <ol class="breadcrumb">
                <li><a href="#">Mi Cuenta</a></li>
                <li class="active">Edici&oacute;n</li>
            </ol>

            {if $ERRORES > 0 }
            	<div class="alert alert-danger" role="alert">
					Se han encontrado errores.
				</div>
			{elseif $POST_AND_SAVED}
				<div class="alert alert-success" role="alert">
					Cambios guardados.
				</div>
            {/if}

            <div class="table-responsive bs-example">
	        	<form class="form-horizontal" action="mi_cuenta.php" method="post">
					<div class="form-group">
						<label for="login" class="col-sm-3 control-label">Nombre de Usuario</label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="login" value="{$USER.LOGIN}" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="login" class="col-sm-3 control-label">Cambiar Contrase&ntilde;a</label>
						<div class="col-sm-7">
							<input style="margin-top:11px;" type="checkbox" name="restablecer_password" id="restablecer_password" {if $USER.RESTABLECER_PASSWORD} checked {/if}>
						</div>
					</div>

					<div id="new_pass_container" {if $USER.RESTABLECER_PASSWORD} style="display:block;" {else} style="display:none;" {/if}>
						<div class="form-group">
							<label for="login" class="col-sm-3 control-label passw_label">Nueva<span class="obligatorio">&nbsp;*</span></label>
							<div class="col-sm-7">
								<input type="password" class="form-control input_element" id="new_password_1" name="new_password_1" placeholder="Nueva Contrase&ntilde;a">
								<div style="display:none" id="new_password_1-error"></div>
							</div>
						</div>

						<div class="form-group">
							<label for="login" class="col-sm-3 control-label passw_label">Confirme<span class="obligatorio">&nbsp;*</span></label>
							<div class="col-sm-7">
								<input type="password" class="form-control input_element" id="new_password_2" name="new_password_2" placeholder="Confirme Contrase&ntilde;a">
								<div style="display:none" id="new_password_2-error"></div>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label for="codigo_rol" class="col-sm-3 control-label">Rol</label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="codigo_rol" name="codigo_rol" value="{$DESCRIPCION_ROL}" disabled>
						</div>
					</div>
					<div class="form-group">
						<label for="nombre" class="col-sm-3 control-label">Nombre<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="nombre" name="nombre" value="{$USER.NOMBRE}">
						</div>
						<div style="display:none" id="nombre-error"></div>
					</div>
					<div class="form-group">
						<label for="apellido" class="col-sm-3 control-label">Apellido<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="apellido" name="apellido" value="{$USER.APELLIDO}">
						</div>
						<div style="display:none" id="apellido-error"></div>
					</div>
					<div class="form-group">
						<label for="sexo" class="col-sm-3 control-label">Sexo<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<div class="radio">
								<label>
									<input type="radio" name="sexo" id="sexo" value="f" {if $USER.SEXO == 'f'} checked {/if}>&nbsp;Femenino
								</label>
								<label>
									<input type="radio" name="sexo" id="sexo" value="m" {if $USER.SEXO == 'm'} checked {/if}>&nbsp;Masculino
								</label>
							</div>
							<div style="display:none" id="sexo-error"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="tipo_documento" class="col-sm-3 control-label">Tipo Documento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<select class="form-control input_element" id="tipo_documento" name="tipo_documento">
								{foreach $TIPOS_DOCUMENTO as $tipo}
									<option value="{$tipo.ID}" {if $USER.TIPO_DOCUMENTO == $tipo.ID} selected {/if}>{$tipo.DESCRIPCION}</option>
								{/foreach}
							</select>
							<!-- <input type="text" class="form-control input_element" id="tipo_documento" value="{$USER.TIPO_DOCUMENTO}"> -->
						</div>
						<div style="display:none" id="tipo_documento-error"></div>
					</div>
					<div class="form-group">
						<label for="nro_documento" class="col-sm-3 control-label">Nro Documento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="nro_documento" name="nro_documento" value="{$USER.NRO_DOCUMENTO}">
							<div style="display:none" id="nro_documento-error"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="fecha_nacimiento" class="col-sm-3 control-label">Fecha Nacimiento<span class="obligatorio">*</span></label>
						<div class="col-sm-7">
							<input type="text" class="form-control input_element" id="fecha_nacimiento" name="fecha_nacimiento" value="{$USER.FECHA_NACIMIENTO}">
							<div style="display:none" id="fecha_nacimiento-error"></div>
						</div>
					</div>

					<div align="center" style="margin-top:30px;">
						<button type="submit" class="btn btn-default">Guardar Cambios</button>
						<button class="btn btn-default" id="volver_button" name="volver_button">Volver</button>
					</div>
					
				</form>
			</div>
        </div>
    </div>
</body>

{literal}
<script>

$(document).ready(function() {

	var json_errors = $.parseJSON('{/literal}{$JSON_ERRORS}{literal}');

	if (json_errors) {
		parseErrors(json_errors);
	}

	$("input#restablecer_password").change(function() {
		if ($(this).is(":checked")) {
			console.info("restablecer esta checked");
			$("div#new_pass_container").show();
		} else {
			console.info("restablecer NO esta checked");
			$("div#new_pass_container").hide();
		}
	});

	 $('#fecha_nacimiento').datepicker({
		format: 'dd/mm/yyyy',
		endDate: new Date()
    }).on('changeDate', function(e){
        $(this).datepicker('hide');
    });

    removeFieldErrors();
});

</script>
{/literal}

</html>