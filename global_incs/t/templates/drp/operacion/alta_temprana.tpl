<div class="backGrey" style="padding:10px;">

    <form class="form-horizontal" id="form_generador_alta_temprana">

        <input id="geocomplete" type="hidden">
        <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

        <input type="hidden" name="establecimiento" id="establecimiento" value="{$establecimiento}">
        <input type="hidden" name ="cuit" id="cuit" value="{$alta_temprana->cuit}">
        <input type="hidden" name ="nombre" id="nombre" value="{$alta_temprana->nombre}">

        <p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Informaci&oacute;n Empresa/Establecimiento</p>

        <div class="form-group">
            <label class="col-sm-3 control-label">Cuit</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="{$alta_temprana->cuit}" id="cuit_no" name="cuit_no" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Raz&oacute;n Social</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="{$alta_temprana->empresa_nombre}" id="razon_social_no" name="razon_social_no" value="{$alta_temprana->empresa_nombre}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Usuario</span></label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="usuario" name="usuario" value="{$alta_temprana->usuario}" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Establecimiento <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="nombre_establecimiento" name="nombre_establecimiento" value="{$alta_temprana->nombre}">
                <div id="nombre_establecimiento-td"><div class="form_error_msg" id="nombre_establecimiento-error" style="display:none;"></div></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Sucursal</label>
            <div class="col-sm-9">
                <input type='text' class="form-control" name='sucursal' id='sucursal' value='{$alta_temprana->sucursal}' size='30'>
                <div id="sucursal-td"><div class="form_error_msg" id="sucursal-error" style="display:none;"></div></div>
            </div>
        </div>

        <p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Domicilio Real</p>

        <div class="form-group">
            <label class="col-sm-3 control-label">Provincia <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <select class="form-control" name='provincia' id='provincia_r'>
                    <option value="0" selected>Seleccione una provincia</option>
                    {foreach $provincias as $provincia}
                        <option value='{$provincia.CODIGO}' data-nomnre="{$provincia.DESCRIPCION}" {if $alta_temprana->provincia == $provincia.CODIGO}selected{/if}>{$provincia.DESCRIPCION}</option>
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
                        <option value='{$localidad@key}' data-nombre='{$localidad}' {if $alta_temprana->localidad == $localidad@key}selected{/if}>{$localidad}</option>
                    {/foreach}
                </select>
                <div id="localidad-td"><div class="form_error_msg" id="localidad-error" style="display:none;"></div></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Calle <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input type='text' class="form-control" name='calle' id='calle' value='{$alta_temprana->calle}' size='30'>
                <div id="calle-td"><div class="form_error_msg" id="calle-error" style="display:none;"></div></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">N&uacute;mero <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input type='text' class="form-control" name='numero' id='numero' value='{$alta_temprana->numero}' size='30'>
                <div id="numero-td"><div class="form_error_msg" id="numero-error" style="display:none;"></div></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Piso</label>
            <div class="col-sm-9">
                <input type='text' class="form-control" name='piso' id='piso' value='{$alta_temprana->piso}' size='30'>
                <div id="piso-td"><div class="form_error_msg" id="piso-error" style="display:none;"></div></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">C&oacute;digo Postal <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input type='text' class="form-control" name='codigo_postal' id='codigo_postal' value='{$alta_temprana->codigo_postal}' size='30'>
                <div id="codigo_postal-td"><div class="form_error_msg" id="codigo_postal-error" style="display:none;"></div></div>
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
            <label class="col-sm-3 control-label">Correo electr&oacute;nico <span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input type="email" class="form-control" name='email' id='email' value='{$alta_temprana->email}' size='30'>
                <div id="email-td"><div class="form_error_msg" id="email-error" style="display:none;"></div></div>
            </div>
        </div>

        <p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Expediente</p>

        <div class="form-group">
            <label class="col-sm-3 control-label">Expediente / A&ntilde;o<span class="obligatorio">*</span></label>
            <div class="col-sm-9">
                <input type="expediente_numero" class="form-control" name='expediente_numero' id='expediente_numero' value='{$alta_temprana->expediente_numero}' style="float:left;width:120px;"><span style="float:left;margin-top:7px;">&nbsp;/&nbsp;</span>
                <input type="expediente_anio" class="form-control" name='expediente_anio' id='expediente_anio' value='{$alta_temprana->expediente_anio}' style="margin-left:10px;width:70px;">
                <div id="expediente_numero-td"><div class="form_error_msg" id="expediente_numero-error" style="display:none;"></div></div>
                <div id="expediente_anio-td"><div class="form_error_msg" id="expediente_anio-error" style="display:none;"></div></div>
            </div>
        </div>

        <div style="clear:both;"></div>

    </form>

    <div class="row" style="margin-top:30px;">
        {if $alta_temprana->residuo}
            <div class="col-xs-6 text-left">
                <a href="javascript:void(0)" class="btn btn-success" onClick="alta_temprana()">Aceptar</a>
            </div>
        {else}
            <div class="col-xs-6 text-left">
                <span class="label label-warning">El establecimiento no tiene residuos asociados.</span>
            </div>
        {/if}
        <div class="col-xs-6 text-right">
            <a href="javascript:void(0)" class="btn btn-danger" onClick="rechazar_alta_temprana()">Rechazar</a>
        </div>
    </div>




    <div class="clear20"></div>
</div>

{literal}
    <script>
        $(document).ready(function() {
            removeFieldErrors();

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

        });

        function actualizar_localidades() {
            $.getJSON(admin_path+'/servicios/localidades.php', {provincia: $("#provincia_r").val()}, function(json){
                $('#localidad_r').find('option').remove();

                $.each(json, function(codigo, descripcion) {
                    $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
                });

                $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');
                $('#localidad_r').val($('#localidad_r option:first').val());
            });
        }

        function alta_temprana()
        {
            var campos = ['establecimiento','nueva_sucursal','cuit','nombre','provincia','localidad','calle','numero','piso','codigo_postal','latitud','longitud','email', 'sucursal', 'expediente']

            $("input#latitud_r").val($("#latitud_r").text());
            $("input#longitud_r").val($("#longitud_r").text());
            var form_values = $("form#form_generador_alta_temprana").serialize();

            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/alta_temprana.php",
                data: {
                    //form_values,
                    accion: "aprobar",
                    establecimiento: $('#establecimiento').val(),
                    nueva_sucursal: $('#nueva_sucursal').val(),
                    cuit: $('#cuit').val(),
                    nombre: $('#nombre').val(),
                    nombre_establecimiento: $('#nombre_establecimiento').val(),
                    sucursal: $('#sucursal').val(),
                    provincia: $('#provincia_r').val(),
                    localidad: $('#localidad_r').val(),
                    calle: $('#calle').val(),
                    numero: $('#numero').val(),
                    piso: $('#piso').val(),
                    codigo_postal: $('#codigo_postal').val(),
                    latitud: $('#latitud_r').text(),
                    longitud: $('#longitud_r').text(),
                    email: $('#email').val(),
                    expediente_numero: $('#expediente_numero').val(),
                    expediente_anio: $('#expediente_anio').val(),
                },
                dataType: "text json",
                success: function(retorno)
                {   
                    if (retorno['estado'] == 0) 
                    {
                        location.reload();
                    }
                    else 
                    {
                        valicacion_formulario_modal(retorno['errores']);

                        mostrarMensaje('exclamation-triangle', 'Hubo errores a la hora de procesar el formulario, revise los campos indicados.', 'warning');
                        return false;
                    }
                }
            });
        }

        function rechazar_alta_temprana()
        {
            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/alta_temprana.php",
                data: {
                    accion: "rechazar",
                    establecimiento: $("#establecimiento").val(),
                },
                dataType: "json",
                success: function(data)
                {
                    if (data.respuesta)
                        location.reload();
                }
            });
        }

    </script>
{/literal}