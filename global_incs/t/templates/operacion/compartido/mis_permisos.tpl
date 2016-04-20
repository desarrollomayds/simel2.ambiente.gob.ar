<!DOCTYPE html>
<html>
<head>
    {include file='general/meta.tpl'}
    <title>Mi cuenta - Permisos Establecimientos</title>
    <!-- Carga de header global -->
    {include file='general/css_headers.tpl' bootstrap='true' datepicker='true' chosen='true'}
    {include file='general/js_headers.tpl' bootstrap='true' mapa='true' datepicker='true' chosen='true'}
</head>

<body>

    {include file='general/popup.tpl' ID_POPUP='mel'}

        <div id="login-top" align="center">
            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> | <a style="color:white;" href="../{$PERFIL}/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
            </div>
        </div>
    <div id="contenedor-interior">
        {include file='general/logos.tpl'}
        <br>
        <div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>


        <div id="apDiv1">Mi Cuenta<br></div>
        <div id="contenido-interior">

            <br>
            <span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../{$PERFIL}/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../{$PERFIL}/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    {if $ROL_ID == 2}
                        <div class="tabnueva">
                            <a href="../{$PERFIL}/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    {else}
                        <div class="tabnueva">
                            <a href="./alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    {/if}
                </div>
                <div style="height:2px; background-color:#5D9E00"></div>
            </span>
            <br>

            <p class="registro-titulo bg-primary">Mis permisos</p>

            <div class="table-responsive">

                <table class="table table-striped"  id="lista_permisos">
                    <thead>
                    <tr class="registro-tabla-header">
                        <th class="invisible">&nbsp;</th>
                        <th class="text-center">RESIDUO</th>
                        {if $ROL_ID == '1'}
                            <th class="text-center">CANTIDAD</th>
                        {/if}
                        <th class="text-center">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody id="contenido_permisos" style="font-size:11px">

                        {foreach $PERMISOS as $PERMISO}
                        <tr {if $PERMISO->tipo_cambio == 'B'}class="danger"{elseif $PERMISO->tipo_cambio == 'E'}class="info"{/if}>
                            <td class="invisible" id="id">{$PERMISO->id}</td>
                            <td class="text-center" id="residuo" >{$PERMISO->residuo} - {$PERMISO->descripcion}</td>
                            {if $ROL_ID == '1'}
                                <td class="text-center" id="cantidad">{$PERMISO->cantidad}</td>
                            {/if}
                            {if empty($PERMISO->tipo_cambio)}
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-xs" onClick="editar_permiso($(this), {$PERMISO->id})" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso($(this), {$PERMISO->id})" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
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
                    <a href="javascript:void(0)" class="btn btn-warning" onclick="agregar_perm_al_establecimiento($(this))" data-toggle="modal" data-target="#mel_popup">Agregar</a>
                </div>
            </div>
            
            <br>

            <p class="registro-titulo bg-primary">Permisos pendientes de aprobaci&oacute;n</p>

            <div class="table-responsive">

                <table class="table table-striped"  id="lista_permisos">
                    <thead>
                    <tr class="registro-tabla-header">
                        <th class="invisible">&nbsp;</th>
                        <th class="text-center">RESIDUO</th>
                        {if $ROL_ID == '1'}
                            <th class="text-center">CANTIDAD</th>
                        {/if}
                    </tr>
                    </thead>
                    <tbody id="contenido_permisos" style="font-size:11px">

                        {foreach $PERMISOS_APROBACION as $PERMISO}
                        <tr>
                            <td class="invisible" id="id">{$PERMISO->id}</td>
                            <td class="text-center" id="residuo" >{$PERMISO->residuo} - {obtener_categoria_residuo($PERMISO->residuo)}</td>
                            {if $ROL_ID == '1'}
                                <td class="text-center" id="cantidad">{$PERMISO->cantidad}</td>
                            {/if}
                        </tr>
                        {/foreach}

                    </tbody>
                </table>

            </div>


            
            <br><br>
            {*
            <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
                <tbody>
                    <tr>
                        {if not $CAMBIOS_PENDIENTES}
                        <td align="right"><input type="button" class="btn btn-success" value="Guardar cambios" id="btn_guardar_cambios" name="btn_guardar_cambios"/></td>
                        {else}
                        <script>
                            $(function() {
                                $("#alerta-micuenta").show().html("Para requerir un nuevo cambio deber&aacute; esperar a que se eval&uacute;e el actual.");
                            });
                        </script>
                        {/if}
                    </tr>
                </tbody>
            </table>
            *}
        </form>
    </tbody>


</div>
</div>
</body>

{literal}
<script type="text/javascript">

        //permisos
        function modificar_permiso_establecimiento(permiso){
            registro_actual.find('#residuo').html(permiso['RESIDUO']);
            registro_actual.find('#estado').html(permiso['ESTADO_']);
            registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

            registro_actual = null;
        }

        function agregar_permiso_establecimiento(permiso){
        
            datos = "\
            <tr>\
                <td class='invisible' id='id'>" + permiso["ID"] + "</td>\
                <td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
                " + ($('#rol_id_permiso').val() == '1' ? "<td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>" : "") + "\
                <td class='text-center'>\
                    <a href='javascript:void(0);' class='btn btn-primary btn-xs' onClick='editar_permiso($(this),  " + permiso["ID"] + " )' data-toggle='modal' data-target='#mel_popup' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
                    <a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso($(this), " + permiso["ID"] + ")' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
                </td>\
            </tr>";

            $('#lista_permisos> tbody:last').append(datos);
        }

        function borrar_permiso(esto,PermisoID)
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
                           url: mel_path+"/operacion/compartido/mis_permisos.php",
                           data: {accion : "baja", id : PermisoID},
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

        function editar_permiso(esto, PermisoID)
        {   
            registro_actual = esto.parent().parent();
            $.ajax({
               type: "GET",
               url: mel_path+"/operacion/compartido/mis_permisos_establecimiento.php?accion=editar&id=" + PermisoID,
               dataType: "html",
               success: function(msg)
               {
                    $('#mel_popup_title').html("Editar residuos permisos");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }

        function agregar_perm_al_establecimiento(esto)
        {   
            registro_actual = esto.parent().parent();

            $.ajax({
                type: "GET",
                url: mel_path+"/operacion/compartido/mis_permisos_establecimiento.php?accion=crear",
                dataType: "html",
                success: function(msg){
                    $('#mel_popup_title').html("Residuos permisos");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }
</script>
{/literal}
</html>