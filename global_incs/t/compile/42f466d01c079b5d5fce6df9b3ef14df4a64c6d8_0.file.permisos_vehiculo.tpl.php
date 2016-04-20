<?php /* Smarty version 3.1.27, created on 2015-11-23 14:34:25
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/permisos_vehiculo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:27586845256534e214ed689_39940508%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42f466d01c079b5d5fce6df9b3ef14df4a64c6d8' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/permisos_vehiculo.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27586845256534e214ed689_39940508',
  'variables' => 
  array (
    'PERMISOS' => 0,
    'PERMISO' => 0,
    'PERMISOS_PENDIENTES' => 0,
    'VEHICULO_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56534e21755fb0_79735440',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56534e21755fb0_79735440')) {
function content_56534e21755fb0_79735440 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '27586845256534e214ed689_39940508';
?>
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
                    <td class="invisible" id='id'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
</td>
                    <td class="text-center" id='residuo'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
</td>
                    <td class="text-center" id='estado'>
                               
                        <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 1) {?>
                            L&iacute;quido
                        <?php } elseif ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 2) {?>
                            S&oacute;lido
                        <?php } elseif ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 3) {?>
                            Semi-s&oacute;lido
                        <?php }?>
                    
                    </td>
                    <td class="text-center" id='cantidad'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
</td>
                    <?php if (empty($_smarty_tpl->tpl_vars['PERMISO']->value->tipo_cambio)) {?>
                        <td class="text-center">
                            <a href="javascript:void(0);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mel3_popup" onClick="editar_permiso_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
)" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
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

                    <?php
$_from = $_smarty_tpl->tpl_vars['PERMISOS_PENDIENTES']->value;
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
                        <td class="text-center" id='residuo'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
</td>
                        <td class="text-center" id='estado'>
                                   
                                <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 1) {?>
                                    L&iacute;quido
                                <?php } elseif ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 2) {?>
                                    S&oacute;lido
                                <?php } elseif ($_smarty_tpl->tpl_vars['PERMISO']->value->estado_residuo == 3) {?>
                                    Semi-s&oacute;lido
                                <?php }?>
                        
                        </td>
                        <td class="text-center" id='cantidad'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
</td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

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


<?php echo '<script'; ?>
>

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
                            vehiculo: "<?php echo $_smarty_tpl->tpl_vars['VEHICULO_ID']->value;?>
",
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
                vehiculo: "<?php echo $_smarty_tpl->tpl_vars['VEHICULO_ID']->value;?>
",
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
                vehiculo: "<?php echo $_smarty_tpl->tpl_vars['VEHICULO_ID']->value;?>
"            
            },
            dataType: "html",
            success: function(msg){
                $('#mel3_popup_title').html("Agregar permiso Veh&iacute;culo");
                $('#mel3_popup_body').html(msg);
                $('#mel3_popup_content').width(600);
            }
        });
    }

<?php echo '</script'; ?>
>

<?php }
}
?>