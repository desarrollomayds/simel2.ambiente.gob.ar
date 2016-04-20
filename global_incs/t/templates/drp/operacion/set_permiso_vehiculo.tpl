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
                    <input type='text' class="form-control" name='dominio' id='dominio' value='{$vehiculo->dominio}' size='30' disabled>
                    <div style="display:none" id="dominio-error"></div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Residuo</label>
                <div class="col-sm-10">
                    <select class="form-control residuos" name='residuo' id='residuo'>
                        <option></option>
                        {foreach $residuos as $res}
                            <option value='{$res->codigo}' {if $res->codigo == $permiso_vehiculo->residuo}selected{/if}>{$res->codigo} - {$res->descripcion}
                            </option>
                        {/foreach}
                    </select>
                    <div style="display:none" id="residuo-error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad (kg)</label>
                <div class="col-sm-10">
                    <input type='text' class="form-control" name='cantidad' id='cantidad' value='{$permiso_vehiculo->cantidad}' size='30'>
                    <div style="display:none" id="cantidad-error"></div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" name='estado' id='estado'>
                        <option value="0">[SELECCIONE UN ESTADO]</option>
                        {foreach $estados as $est}
                            <option value='{$est->id}' {if ($est->id == $permiso_vehiculo->estado)} selected {/if}>{$est->descripcion}</option>
                        {/foreach}
                    </select>
                    <div style="display:none" id="estado-error"></div>
                </div>
            </div>

            {* Hidden data *}
            <input type="hidden" id="establecimiento_id" name="establecimiento_id" value="{$establecimiento->id}" />
            <input type="hidden" id="vehiculo_id_perm" name="vehiculo_id_perm" value="{$vehiculo->id}"/>
            <input type="hidden" id="permiso_vehiculo_id" name="permiso_vehiculo_id" value="{$permiso_vehiculo->id}"/>

        </form>
    </div> <!-- vehiculo fields -->

    <div align="right">
        <button type="button" class="btn btn-success btn-sm" id='btn_aceptar' onclick="btn_aceptar_permiso_vehiculo();">Aceptar</button>
        <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
    </div>

    <div class="clear20"></div>
</div>

{literal}
<script>

    $(document).ready(function() {
        removeFieldErrors();
        $(".residuos").chosen({width:"100%;"});
    });

    function btn_aceptar_permiso_vehiculo()
    {
        var establecimiento_id = $("input#establecimiento_id").val();
        var vehiculo_id = $('input#vehiculo_id_perm').val();
        var permiso_vehiculo_id = $('input#permiso_vehiculo_id').val();
        var residuo = $("select#residuo").val();
        var cantidad = $("input#cantidad").val();
        var estado = $("select#estado").val();

        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/set_permiso_vehiculo.php",
            data: {
                accion: "set",
                establecimiento_id: establecimiento_id,
                vehiculo_id: vehiculo_id,
                permiso_vehiculo_id: permiso_vehiculo_id,
                residuo: residuo,
                cantidad: cantidad,
                estado: estado
            },
            dataType: "text json",
            success: function(retorno) {
                console.debug(retorno);
                if (retorno['estado'] == 'success') {
                    var nombre_container = $('input#permisos_vehiculos_hidden_info').val();
                    var html = parsePermisoVehiculoHtml(retorno['permiso_vehiculo_obj'], nombre_container);

                    if (nombre_container == 'nuevo_permiso_vehiculo_'+vehiculo_id) {
                        $('div#container_permisos_vehiculo_'+vehiculo_id).append(html);
                    } else {
                        console.info("reemplazando container: "+nombre_container);
                        $('div#'+nombre_container).replaceWith(html);
                    }

                    $('#permisos_vehiculos_popup').modal('hide');
                } else {
                    parseErrors(retorno['errores']);
                }
            }
        });
    }

    function parsePermisoVehiculoHtml(perm_vehiculo_obj, nombre_container)
    {
        var html = '<div class="bs-example permisos_vehiculo_'+perm_vehiculo_obj.vehiculo_id+'" id="container_permiso_'+perm_vehiculo_obj.permiso_vehiculo_id+'_vehiculo_'+perm_vehiculo_obj.vehiculo_id+'"> \
                <p> \
                <!-- iconos permisos vehiculos --> \
                    <i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" vehiculo-id="'+perm_vehiculo_obj.vehiculo_id+'" onclick="borrarPermisoVehiculo($(this),'+perm_vehiculo_obj.permiso_vehiculo_id+', '+perm_vehiculo_obj.vehiculo_id+');" container="container_permiso_'+perm_vehiculo_obj.permiso_vehiculo_id+'_vehiculo_'+perm_vehiculo_obj.vehiculo_id+'" establecimiento-id="'+perm_vehiculo_obj.establecimiento_id+'" title="Borrar Permiso Veh&iacute;culo"></i> \
                    <i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso Veh&iacute;culo" onclick="setPermisoVehiculo($(this), '+perm_vehiculo_obj.vehiculo_id+', '+perm_vehiculo_obj.permiso_vehiculo_id+');" container="container_permiso_'+perm_vehiculo_obj.permiso_vehiculo_id+'_vehiculo_'+perm_vehiculo_obj.vehiculo_id+'" establecimiento-id="'+perm_vehiculo_obj.establecimiento_id+'" data-toggle="modal" data-target="#permisos_vehiculos_popup"></i> \
                    <strong>CSC: </strong><span id="callbPerm">'+perm_vehiculo_obj.residuo+'</span><br> \
                    <strong>Descripci&oacute;n: </strong><span>'+perm_vehiculo_obj.descripcion+'</span><br> \
                    <strong>Cantidad: </strong><span>'+perm_vehiculo_obj.cantidad+' kg</span><br> \
                    <strong>Estado: </strong><span>'+perm_vehiculo_obj.estado+'</span> \
                </p> \
            </div>';

        // en caso de estar agregando el primer permiso al vehiculo queremos ocultar la leyendo de "no permisos"
        $("div#vehiculo_"+perm_vehiculo_obj.vehiculo_id+"_sin_permisos").hide();

        return html;
    }

</script>
{/literal}