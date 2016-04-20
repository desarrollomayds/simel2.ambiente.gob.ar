<style type="text/css">{literal}
    .error {border-color:red;color:red;}
{/literal}</style>

<div class="backGrey" id="residuos_popup">

    <!-- vehiculo fields -->
    <div class="bs-example">
        <form class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">Dominio</label>
                <div class="col-sm-10">
                    <input type='text' class="form-control" name='dominio' id='dominio' value='{$vehiculo->dominio}' size='30'>
                    <div style="display:none" id="dominio-error"></div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Veh&iacute;culo</label>
                <div class="col-sm-10">
                    <select class="form-control" name='tipo_vehiculo' id='tipo_vehiculo'>
                        <option value="0">[SELECCIONE UN TIPO DE VEH&Iacute;CULO]</option>
                        {foreach $tipos_vehiculo as $tv}
                            <option value='{$tv->codigo}' {if ($tv->codigo == $vehiculo->tipo_vehiculo)} selected {/if}>{$tv->descripcion}</option>
                        {/foreach}
                    </select>
                    <div style="display:none" id="tipo_vehiculo-error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tipo Caja</label>
                <div class="col-sm-10">
                    <select class="form-control" name='tipo_caja' id='tipo_caja'>
                        <option value="0">[NO APLICA]</option>
                        {foreach $tipos_caja as $tc}
                            <option value='{$tc->codigo}' {if ($tc->codigo == $vehiculo->tipo_caja)} selected {/if}>{$tc->descripcion}</option>
                        {/foreach}
                    </select>
                    <div style="display:none" id="tipo_caja-error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Descripci&oacute;n</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{$vehiculo->descripcion}</textarea>
                    <div style="display:none" id="descripcion-error"></div>
                </div>
            </div>

            {* Hidden data *}
            <input type="hidden" id="establecimiento_id" name="establecimiento_id" value="{$establecimiento->id}" />
            <input type="hidden" id="vehiculo_id" name="vehiculo_id" value="{$vehiculo->id}"/>

        </form>
    </div> <!-- vehiculo fields -->

    <div align="right">
        <button type="button" class="btn btn-success btn-sm" id='btn_aceptar' onclick="btn_aceptar_vehiculo();">Aceptar</button>
        <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
    </div>

    <div class="clear20"></div>
</div>

{literal}
<script>

    $(document).ready(function() {
        removeFieldErrors();
    });

    function btn_aceptar_vehiculo()
    {
        var dominio = $("input#dominio").val();
        var tipo_vehiculo = $("select#tipo_vehiculo").val();
        var tipo_caja = $("select#tipo_caja").val();
        var vehiculo_id = $('input#vehiculo_id').val();
        var descripcion = $("textarea#descripcion").val();
        var establecimiento_id = $("input#establecimiento_id").val();

        // checkeo formato del dominio si no se trata de una BARCAZA
        if (tipo_vehiculo != 'BA' && !isDominio(dominio)) {
            var errors = {};
            errors.dominio = 'Ingrese un dominio de veh&iacute;culo v&aacute;lido.';
            parseErrors(errors);
            return false;
        }

        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/set_vehiculo.php",
            data: {
                accion: "set",
                establecimiento_id: establecimiento_id,
                vehiculo_id: vehiculo_id,
                dominio: dominio,
                tipo_vehiculo: tipo_vehiculo,
                tipo_caja: tipo_caja,
                descripcion: descripcion
            },
            dataType: "text json",
            success: function(retorno) {
                if (retorno['estado'] == 'success') {
                    var nombre_container = $('input#vehiculos_hidden_info').val();
                    var html = parseVehiculoHtml(retorno['vehiculo_obj'], nombre_container);

                    if (nombre_container == 'nuevo_vehiculo') {
                        $('div#container_vehiculos_transportista').append(html);
                    } else {
                        $('div#'+nombre_container).replaceWith(html);
                    }

                    $('#vehiculos_popup').modal('hide');
                } else {
                    parseErrors(retorno['errores']);
                }
            }
        });
    }

    function parseVehiculoHtml(vehiculo_obj, nombre_container)
    {
        var html = ' \
            <div class="bs-example vehiculos_establecimiento" id="container_vehiculo_'+vehiculo_obj.vehiculo_id+'"> \
                <i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" vehiculo-id="'+vehiculo_obj.vehiculo_id+'" \
                    onclick="borrarVehiculo($(this), '+vehiculo_obj.establecimiento_id+');" container="container_vehiculo_'+vehiculo_obj.vehiculo_id+'" title="Borrar"></i> \
                <i class="fa fa-key" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Agregar Permiso al Veh&iacute;culo" onclick="setPermisoVehiculo($(this), '+vehiculo_obj.vehiculo_id+');" container="nuevo_permiso_vehiculo_'+vehiculo_obj.vehiculo_id+'" establecimiento-id="'+vehiculo_obj.establecimiento_id+'" data-toggle="modal" data-target="#permisos_vehiculos_popup"></i> \
                <i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Veh&iacute;culo" \
                    onclick="setVehiculo($(this), '+vehiculo_obj.establecimiento_id+', '+vehiculo_obj.vehiculo_id+');" container="container_vehiculo_'+vehiculo_obj.vehiculo_id+'" \
                    data-toggle="modal" data-target="#vehiculos_popup"></i> \
                <p> \
                    <strong>Dominio/Matr&iacute;cula: </strong><span>'+vehiculo_obj.dominio+'</span><br> \
                    <strong>Tipo veh&iacute;culo: </strong><span>'+vehiculo_obj.tipo_vehiculo+'</span><br> \
                    <strong>Tipo caja: </strong><span>'+vehiculo_obj.tipo_caja+'</span><br> \
                    <strong>Descripci&oacute;n: </strong><span>'+vehiculo_obj.descripcion+'</span> \
                </p>';

        if (nombre_container == 'nuevo_vehiculo') {
            html += ' \
                <div class="bs-example" id="container_permisos_vehiculo_'+vehiculo_obj.vehiculo_id+'" style=""> \
                    <p class="registro-titulo bg-warning"> \
                        <b>Permisos del Veh&iacute;culo:</b> \
                    </p> \
                    <div id="vehiculo_'+vehiculo_obj.vehiculo_id+'_sin_permisos"><p>A&uacute;n no se han asignado permisos al veh&iacute;culo</p></div>';
        }

        html += '</div>';

        return html;
    }

</script>
{/literal}