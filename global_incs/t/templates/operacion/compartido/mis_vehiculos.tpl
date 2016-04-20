<!DOCTYPE html>
<html>
<head>

    {include file='general/meta.tpl'}

    <title>Mi cuenta - Vech&iacute;culos Establecimiento</title>

    <!-- Carga de header global -->
    {include file='general/css_headers.tpl' bootstrap='true' datepicker='true' chosen='true'}
    {include file='general/js_headers.tpl' bootstrap='true' mapa='true' datepicker='true' chosen='true'}

</head>

<body>

    {include file='general/popup.tpl' ID_POPUP='mel'}
    {include file='general/popup.tpl' ID_POPUP='mel3'}

    <div id="login-top" align="center">

        <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> |<a style="color:white;" href="#">  Mi cuenta </a>|<a style="color:white;" href="../../login/logout_usuario.php">  Cerrar Sesi&oacute;n</a></div>
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

        <p class="registro-titulo bg-primary">Mis veh&iacute;culos</p>

        <div class="table-responsive">

            <table class="table table-striped"  id="lista_vehiculos">
                <thead>
                    <tr class="registro-tabla-header">
                        <th class="invisible">&nbsp;</th>
                        <th class="text-center">DOMINIO</th>
                        <th class="text-center">TIPO VEH&Iacute;CULO</th>
                        <th class="text-center">TIPO CAJA</th>
                        <th class="text-center">DESCRIPCI&Oacute;N</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>

                    {foreach $VEHICULOS as $VEHICULO}
                    <tr {if $VEHICULO->tipo_cambio == '3'}class="danger"{elseif $VEHICULO->tipo_cambio == '2'}class="info"{/if}>
                        <td class="invisible" id="id">{$VEHICULO->id}</td>
                        <td class="text-center" id='dominio'>{$VEHICULO->dominio}</td>
                        <td class="text-center" id='tipo_vehiculo'>{$VEHICULO->tipo_vehiculo}</td>
                        <td class="text-center" id='tipo_caja'>{$VEHICULO->tipo_caja}</td>
                        <td class="text-center" id='descripcion'>{$VEHICULO->descripcion}</td>
                        {if empty($VEHICULO->tipo_cambio)}
                            <td class="text-center">
                                <a href="javascript:void(0);" class="btn btn-info btn-xs btn_permisos_vehiculo" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Permisos'><i class='fa fa-truck fa-lg'></i></a>
                                <a href="javascript:void(0);" class="btn btn-primary btn-xs" onclick="editar_permiso_vehiculo($(this), {$VEHICULO->id})" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), {$VEHICULO->id})" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        {else}
                            <td class="text-center">A la espera de

                                {if $VEHICULO->tipo_cambio == '2'}
                                    edici&oacute;n 
                                {/if}
                                {if $VEHICULO->tipo_cambio == '3'}
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

    </div>

    {literal}
    <script>

        function modificar_permiso_vehiculo(permiso){

            registro_actual.find('#residuo').html(permiso['RESIDUO']);
            registro_actual.find('#estado').html(permiso['ESTADO_']);
            registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

            registro_actual = null;
        }

        function agregar_listado_vehiculo(permiso){

            datos = "\
            <tr>\
                <td class='invisible' id='id'>" + permiso["ID"] + "</td>\
                <td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
                <td class='text-center' id='estado'>" + permiso["ESTADO_"] + "</td>\
                <td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>\
                <td class='text-center'>\
                    <a href='javascript:void(0);' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#mel3_popup' onClick='editar_permiso_vehiculo($(this),  " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
                    <a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso_vehiculo($(this), " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
                </td>\
            </tr>";

            $('#lista_permisos> tbody:last').append(datos);
        }

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
                            url: mel_path+"/operacion/transportista/mis_vehiculos.php",
                            data: {
                                accion : "baja",
                                id : PermisoID
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
                url: mel_path+"/operacion/transportista/permisos_vehiculo.php",
                data: {
                    accion: 'editar',
                    id: PermisoID
                },
                dataType: "html",
                success: function(msg){
                    $('#mel_popup_title').html("Editar permiso Veh&iacute;culo");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }

    </script>
    {/literal}

</body>
</html>