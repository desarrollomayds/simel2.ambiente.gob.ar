<div class="container" style="width:100%;">
	<form class="form-horizontal" id="form_generador_alta_temprana" method="post">

		<input id="geocomplete" type="hidden">
		<input id="pais_r" type="hidden" data-nombre="ARGENTINA">

		<input type="hidden" name="cuit" id="cuit" value="{$cuit}">
		<input type="hidden" name="nombre" id="nombre" value="{$razon}">
		<input type="hidden" name ="alta_temprana" id="alta_temprana" value="{$alta_temprana}">
		<input type="hidden" name ="nueva_sucursal" id="nueva_sucursal" value="{$nueva_sucursal}">

		<p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Informaci&oacute;n Empresa/Establecimiento</p>

		<div class="form-group">
			<label class="col-sm-3 control-label">Cuit</label>
			<div class="col-sm-9">
				<input class="form-control" id="disabledInput" type="text" placeholder="{$cuit}" id="cuit" name="cuit" value="{$cuit}" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Empresa Naviera</label>
			<div class="col-sm-9">
				<input class="form-control" id="disabledInput" type="text" placeholder="{$razon}" id="razon_social" name="razon_social" value="{$razon}" disabled>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Buque <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input class="form-control" type="text" id="nombre_establecimiento" name="nombre_establecimiento" value="{$generador.nombre}" required>
				<div id="nombre_establecimiento-td"><div class="form_error_msg" id="nombre_establecimiento-error" style="display:none;"></div></div>
			</div>
		</div>
		
		<p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Domicilio Real</p>

		<div class="form-group">
			<label class="col-sm-3 control-label">Provincia <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name='provincia' id='provincia_r'>
					<option value="0" selected>Seleccione una provincia</option>
					{foreach $provincias as $provincia}
						<option value='{$provincia.CODIGO}'>{$provincia.DESCRIPCION}</option>
					{/foreach}
				</select>
				<div id="provincia-td"><div class="form_error_msg" id="provincia-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Localidad <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<select class="form-control" name='localidad' id='localidad_r'>
					<option value="0" selected>Seleccione una localidad</option>
                    {foreach $localidades as $localidad}
                   	 	<option value='{$localidad@key}' data-nombre='{$localidad}'>{$localidad}</option>
                    {/foreach}
                </select>
				<div id="localidad-td"><div class="form_error_msg" id="localidad-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Calle <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='calle' id='calle' value='{$generador.calle}' size='30' required>
				<div id="calle-td"><div class="form_error_msg" id="calle-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">N&uacute;mero <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='numero' id='numero' value='{$generador.numero}' size='30' required>
				<div id="numero-td"><div class="form_error_msg" id="numero-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">C&oacute;digo Postal <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='codigo_postal' id='codigo_postal' value='{$generador.codigo_postal}' size='30' required>
				<div id="codigo_postal-td"><div class="form_error_msg" id="codigo_postal-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Piso</label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='piso' id='piso' value='{$generador.piso}' size='30'>
				<div id="piso-td"><div class="form_error_msg" id="piso-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Oficina</label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='oficina' id='oficina' value='{$generador.oficina}' size='30'>
				<div id="oficina-td"><div class="form_error_msg" id="oficina-error" style="display:none;"></div></div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Coordenadas geogr&aacute;ficas del establecimiento</label>
            <div class="col-sm-9">
            	<div>
                	<span id="latitud_r" data-geo="lat" style="display:none"></span>
                	<span id="longitud_r" data-geo="lng" style="display:none"></span>
                	<input type='hidden' name='latitud' id='latitud_r'>
					<input type='hidden' name='longitud' id='longitud_r'>
            	</div>
            	<div class="mapa-empresa" style="width:100%;height:300px;"></div>
            </div>
		</div>

		<div style="clear:both;"></div>

		<div class="form-group">
			<label class="col-sm-3 control-label">Tel&eacute;fono de emergencia <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type='text' class="form-control" name='numero_telefonico' id='numero_telefonico' value='{$generador.numero_telefonico}' size='30'>
				<div id="numero_telefonico-td"><div class="form_error_msg" id="numero_telefonico-error" style="display:none;"></div></div>
			</div>
		</div>


		<div class="form-group">
			<label class="col-sm-3 control-label">Correo electr&oacute;nico <span class="obligatorio">*</span></label>
			<div class="col-sm-9">
				<input type="email" class="form-control" name='email' id='email' value='{$generador.email}' size='30' required>
				<div id="email-td"><div class="form_error_msg" id="email-error" style="display:none;"></div></div>
			</div>
		</div>

		<div style="clear:both;"></div>

		<input type="hidden" id="accion" name="accion" value="" />

	</form>
<!--
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar_alta_temprana'>
        	<button type="button" class="btn btn-success btn-sm" onClick="alta_nueva_empresa();">Aceptar</button>
		</div>
        <div class="bottonRight" data-dismiss="modal">
            <button type="button" class="btn btn-danger btn-sm" style="float:right;">Cancelar</button>
        </div>
    </div>
-->
    <div class="clear20"></div>
</div>
{literal}
<script>
	actualizar_mapa('mapa-empresa', '');

	$('#provincia_r').change(function() {
	    limpiar_calle_num('r','');
	    actualizar_localidades();
	    actualizar_mapa('mapa-empresa','');
	});

	$('#localidad_r').change(function() {
		actualizar_mapa('mapa-empresa','');
	});

	$("#calle_r").on('change', function() {

		if ($("#numero_r").val())
		actualizar_mapa('mapa-empresa','');
	});

	$("#numero_r").on('change', function() {

		if ($("#calle_r").val())
		actualizar_mapa('mapa-empresa','');
	});

	function actualizar_localidades() {
	    $.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
	        $('#localidad_r').find('option').remove();

	        $.each(json, function(codigo, descripcion) {
	            $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
	        });

	        $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');
	        $('#localidad_r').val($('#localidad_r option:first').val());
	    });
	}
</script>
{/literal}