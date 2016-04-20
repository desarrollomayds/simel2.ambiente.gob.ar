<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:12
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mis_permisos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1711912917564f1f7438a712_18158767%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5d453a51e0a68b09f2344d1267b853fc271e7271' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mis_permisos.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1711912917564f1f7438a712_18158767',
  'variables' => 
  array (
    'PERFIL' => 0,
    'ROL_ID' => 0,
    'PERMISOS' => 0,
    'PERMISO' => 0,
    'PERMISOS_APROBACION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f746cfa16_65588591',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f746cfa16_65588591')) {
function content_564f1f746cfa16_65588591 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1711912917564f1f7438a712_18158767';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <title>Mi cuenta - Permisos Establecimientos</title>
    <!-- Carga de header global -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

</head>

<body>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>


        <div id="login-top" align="center">
            <div style="width:950px" align="right"> <strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
            </div>
        </div>
    <div id="contenedor-interior">
        <?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

        <br>
        <div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>


        <div id="apDiv1">Mi Cuenta<br></div>
        <div id="contenido-interior">

            <br>
            <span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == 2) {?>
                        <div class="tabnueva">
                            <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    <?php } else { ?>
                        <div class="tabnueva">
                            <a href="./alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    <?php }?>
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
                        <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
                            <th class="text-center">CANTIDAD</th>
                        <?php }?>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                    </thead>
                    <tbody id="contenido_permisos" style="font-size:11px">

                        <?php
$_from = $_smarty_tpl->tpl_vars['PERMISOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
                        <tr <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio == 'B') {?>class="danger"<?php } elseif ($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio == 'E') {?>class="info"<?php }?>>
                            <td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
</td>
                            <td class="text-center" id="residuo" ><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
 - <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->descripcion;?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
                                <td class="text-center" id="cantidad"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
</td>
                            <?php }?>
                            <?php if (empty($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio)) {?>
                                <td class="text-center">
                                    <a href="javascript:void(0);" class="btn btn-primary btn-xs" onClick="editar_permiso($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
)" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                    <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
)" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
                                </td>
                            <?php } else { ?>
                                <td class="text-center">A la espera de

                                    <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio == 'E') {?>
                                        edici&oacute;n 
                                    <?php }?>
                                    <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio == 'B') {?>
                                        eliminaci&oacute;n 
                                    <?php }?>

                                </td>
                            <?php }?>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

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
                        <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
                            <th class="text-center">CANTIDAD</th>
                        <?php }?>
                    </tr>
                    </thead>
                    <tbody id="contenido_permisos" style="font-size:11px">

                        <?php
$_from = $_smarty_tpl->tpl_vars['PERMISOS_APROBACION']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
                        <tr>
                            <td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
</td>
                            <td class="text-center" id="residuo" ><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
 - <?php echo obtener_categoria_residuo($_smarty_tpl->tpl_vars['PERMISO']->value->residuo);?>
</td>
                            <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
                                <td class="text-center" id="cantidad"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
</td>
                            <?php }?>
                        </tr>
                        <?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

                    </tbody>
                </table>

            </div>


            
            <br><br>
            
        </form>
    </tbody>


</div>
</div>
</body>


<?php echo '<script'; ?>
 type="text/javascript">

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
<?php echo '</script'; ?>
>

</html><?php }
}
?>