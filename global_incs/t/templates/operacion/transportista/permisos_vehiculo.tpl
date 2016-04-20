<div class="backGrey">

    <div class="table-responsive">
        <table class="table table-striped"  id="lista_permisos">
            <thead>
                <tr class="registro-tabla-header">
                    <th class="invisible">&nbsp;</th>
                    <th class="text-center">RESIDUO</th>
                    <th class="text-center">ESTADO</th>
                    <th class="text-center">CANTIDAD</th>
                    <th class="text-center">ACCIONES</th>
                </tr>
            </thead>
            <tbody>

                {foreach $PERMISOS as $PERMISO}
                <tr {if $PERMISO->tipo_cambio == 'B'}class="danger"{elseif $PERMISO->tipo_cambio == 'E'}class="info"{/if}>
                    <td class="invisible" id='id'>{$PERMISO->id}</td>
                    <td class="text-center" id='residuo'>{$PERMISO->residuo}</td>
                    <td class="text-center" id='estado'>
                               
                        {if $PERMISO->estado_residuo == 1}
                            L&iacute;quido
                        {elseif $PERMISO->estado_residuo == 2}
                            S&oacute;lido
                        {elseif $PERMISO->estado_residuo == 3}
                            Semi-s&oacute;lido
                        {/if}
                    
                    </td>
                    <td class="text-center" id='cantidad'>{$PERMISO->cantidad}</td>
                    {if empty($PERMISO->tipo_cambio)}
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mel3_popup" onClick="editar_permiso_vehiculo($(this), {$PERMISO->id})" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), {$PERMISO->id})" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
                        </td>
                    {else}
                        <td class="text-center">A la espera de

                            {if $PERMISO->tipo_cambio == 'E'}
                                edici&oacute;n 
                            {/if}
                            {if $PERMISO->tipo_cambio == 'B'}
                                eliminaci&oacute;n 
                            {/if}

                        </td>
                    {/if}
                </tr>
                {/foreach}

            </tbody>
        </table>
    </div>
        
    <div class="row" style="margin-top:50px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-success" onclick="agregar_permiso_vehiculo($(this))" data-toggle="modal" data-target="#mel3_popup">Agregar</a>
        </div>
    </div>
    <br>
    <p class="registro-titulo bg-primary">Permisos pendientes de aprobaci&oacute;n</p>

        <div class="table-responsive">
            <table class="table table-striped"  id="lista_permisos">
                <thead>
                    <tr class="registro-tabla-header">
                        <th class="text-center">RESIDUO</th>
                        <th class="text-center">ESTADO</th>
                        <th class="text-center">CANTIDAD</th>
                    </tr>
                </thead>
                <tbody>

                    {foreach $PERMISOS_PENDIENTES as $PERMISO}
                    <tr {if $PERMISO->tipo_cambio == 'B'}class="danger"{elseif $PERMISO->tipo_cambio == 'E'}class="info"{/if}>
                        <td class="text-center" id='residuo'>{$PERMISO->residuo}</td>
                        <td class="text-center" id='estado'>
                                   
                                {if $PERMISO->estado_residuo == 1}
                                    L&iacute;quido
                                {elseif $PERMISO->estado_residuo == 2}
                                    S&oacute;lido
                                {elseif $PERMISO->estado_residuo == 3}
                                    Semi-s&oacute;lido
                                {/if}
                        
                        </td>
                        <td class="text-center" id='cantidad'>{$PERMISO->cantidad}</td>
                    </tr>
                    {/foreach}

                </tbody>
            </table>
        </div>
    </div>
    

    <div class="row" style="margin-top:50px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
        </div>
    </div>
            
</div>

{literal}
<script>

    function borrar_permiso_vehiculo(esto,PermisoID)
    {   
        // Confirmar que se quiera eliminar
        BootstrapDialog.confirm({
            title: 'ATENCI&Oacute;N',
            message: 'Confirme si desea continuar con la operaci&oacute;n',
            type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
            closable: false, // <-- Default value is false
            draggable: false, // <-- Default value is false
            btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
            btnOKLabel: 'Continuar', // <-- Default value is 'OK',
            btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
            callback: function(result) {
                // result will be true if button was click, while it will be false if users close the dialog directly.
                if (result)
                {
                    registro_actual = esto.parent().parent();
                    $.ajax({
                        type: "POST",
                        url: mel_path+"/operacion/transportista/permiso_vehiculo.php",
                        data: {
                            accion : "baja",
                            vehiculo: "{/literal}{$VEHICULO_ID}{literal}",
                            permiso : PermisoID
                        },
                        dataType: "text json",
                        success: function(retorno){
                            if(retorno)
                                location.reload();
                        }
                    });
                } 
            }
        });

    }

    function editar_permiso_vehiculo(esto,PermisoID)
    {
        registro_actual = esto.parent().parent();
        $.ajax({
            type: "GET",
            url: mel_path+"/operacion/transportista/permiso_vehiculo.php",
            data: {
                accion: "editar",
                vehiculo: "{/literal}{$VEHICULO_ID}{literal}",
                permiso: PermisoID
            },
            dataType: "html",
            success: function(msg){
                $('#mel3_popup_title').html("Editar permiso Veh&iacute;culo");
                $('#mel3_popup_body').html(msg);
                $('#mel3_popup_content').width(600);
            }
        });
    }

    function agregar_permiso_vehiculo(esto)
    {
        console.log("asenad");
        $.ajax({
            type: "GET",
            url: mel_path+"/operacion/transportista/permiso_vehiculo.php",
            data: {
                accion: "agregar",
                vehiculo: "{/literal}{$VEHICULO_ID}{literal}"            
            },
            dataType: "html",
            success: function(msg){
                $('#mel3_popup_title').html("Agregar permiso Veh&iacute;culo");
                $('#mel3_popup_body').html(msg);
                $('#mel3_popup_content').width(600);
            }
        });
    }

</script>
{/literal}
