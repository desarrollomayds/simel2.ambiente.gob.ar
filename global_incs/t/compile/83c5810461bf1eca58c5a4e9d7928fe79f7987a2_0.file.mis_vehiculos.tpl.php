<?php /* Smarty version 3.1.27, created on 2015-11-20 13:18:00
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/mis_vehiculos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1030541997564f47b8345303_15677982%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '83c5810461bf1eca58c5a4e9d7928fe79f7987a2' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/mis_vehiculos.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1030541997564f47b8345303_15677982',
  'variables' => 
  array (
    'PERFIL' => 0,
    'ROL_ID' => 0,
    'VEHICULOS' => 0,
    'VEHICULO' => 0,
    'VEHICULOS_APROBACION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f47b84dbea4_83581748',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f47b84dbea4_83581748')) {
function content_564f47b84dbea4_83581748 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1030541997564f47b8345303_15677982';
?>
<!DOCTYPE html>
<html>
<head>

    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <title>Mi cuenta - Vech&iacute;culos Establecimiento</title>

    <!-- Carga de header global -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>


</head>

<body>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel3'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel4'), 0);
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

                    <?php
$_from = $_smarty_tpl->tpl_vars['VEHICULOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
                    <tr <?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_cambio == 'B') {?>class="danger"<?php } elseif ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_cambio == 'E') {?>class="info"<?php }?>>
                        <td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->id;?>
</td>
                        <td class="text-center" id='dominio'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->dominio;?>
</td>
                        <td class="text-center" id='tipo_vehiculo'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_vehiculo;?>
</td>
                        <td class="text-center" id='tipo_caja'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_caja;?>
</td>
                        <td class="text-center" id='descripcion'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->descripcion;?>
</td>
                        <?php if (empty($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_cambio)) {?>
                            <td class="text-center">
                                <a href="javascript:void(0);" class="btn btn-info btn-xs" onclick="editar_permisos_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->id;?>
)" data-toggle="modal" data-target="#mel_popup" rel='tooltip' data-placement='top' title='Permisos'><i class='fa fa-truck fa-lg'></i></a>
                                <a href="javascript:void(0);" class="btn btn-primary btn-xs" onClick="editar_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->id;?>
)" data-toggle="modal" data-target="#mel_popup"  rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                                <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->id;?>
)" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
                            </td>
                        <?php } else { ?>
                            <td class="text-center">A la espera de

                                <?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_cambio == 'E') {?>
                                    edici&oacute;n 
                                <?php }?>
                                <?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_cambio == 'B') {?>
                                    eliminaci&oacute;n 
                                <?php }?>

                            </td>
                        <?php }?>

                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>

                </tbody>
            </table>

        </div>

        <br>

        <p class="registro-titulo bg-primary">Veh&iacute;culos pendientes de aprobaci&oacute;n</p>

        <div class="table-responsive">

            <table class="table table-striped"  id="lista_permisos">
                <thead>
                    <tr class="registro-tabla-header">
                        <th class="text-center">DOMINIO</th>
                        <th class="text-center">TIPO VEH&Iacute;CULO</th>
                        <th class="text-center">TIPO CAJA</th>
                        <th class="text-center">DESCRIPCI&Oacute;N</th>
                    </tr>
                </thead>
                <tbody id="contenido_permisos" style="font-size:11px">

                   <?php
$_from = $_smarty_tpl->tpl_vars['VEHICULOS_APROBACION']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
                    <tr>
                        <td class="text-center" id='dominio'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->dominio;?>
</td>
                        <td class="text-center" id='tipo_vehiculo'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_vehiculo;?>
</td>
                        <td class="text-center" id='tipo_caja'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_caja;?>
</td>
                        <td class="text-center" id='descripcion'><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->descripcion;?>
</td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
                </tbody>
            </table>

        </div>

        <div class="row" style="margin-top:50px;">
            <div class="col-xs-12 text-right">
                <a href="javascript:void(0)" class="btn btn-warning" onclick="agregar_vehiculo_establecimiento($(this))" data-toggle="modal" data-target="#mel_popup">Agregar</a>
            </div>
        </div>

    </div>

    
    <?php echo '<script'; ?>
>


        function agregar_vehiculo_establecimiento()
        {
            registro_actual = $(this).parent().parent();
            $.ajax({
                type: "GET",
                url: mel_path+"/operacion/transportista/vehiculo/vehiculos.php",
                dataType: "html",
                success: function(msg){
                    $('#mel_popup_title').html("Agregar Veh&iacute;culo");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }

        function borrar_permiso_vehiculo(esto,vehiculoID)
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
                                vehiculo : vehiculoID
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

        function editar_vehiculo(esto,vehiculoID)
        {
            registro_actual = esto.parent().parent();
            $.ajax({
                type: "GET",
                url: mel_path+"/operacion/transportista/vehiculo/vehiculos.php",
                data: {
                    accion: 'editar',
                    vehiculo: vehiculoID
                },
                dataType: "html",
                success: function(msg){
                    $('#mel_popup_title').html("Editar permiso Veh&iacute;culo");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }

        function editar_permisos_vehiculo(esto,vehiculoID)
        {
            registro_actual = esto.parent().parent();
            $.ajax({
                type: "GET",
                url: mel_path+"/operacion/transportista/permisos_vehiculo.php",
                data: {
                    vehiculo: vehiculoID
                },
                dataType: "html",
                success: function(msg){
                    $('#mel_popup_title').html("Editar permiso Veh&iacute;culo");
                    $('#mel_popup_body').html(msg);
                    $('#mel_popup_content').width(600);
                }
            });
        }

    <?php echo '</script'; ?>
>
    

</body>
</html><?php }
}
?>