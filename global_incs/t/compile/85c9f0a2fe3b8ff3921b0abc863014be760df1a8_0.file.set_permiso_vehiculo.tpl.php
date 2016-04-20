<?php /* Smarty version 3.1.27, created on 2015-12-10 10:09:48
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_permiso_vehiculo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:14393252235669799ce241d6_72656605%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85c9f0a2fe3b8ff3921b0abc863014be760df1a8' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_permiso_vehiculo.tpl',
      1 => 1443651963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14393252235669799ce241d6_72656605',
  'variables' => 
  array (
    'vehiculo' => 0,
    'residuos' => 0,
    'res' => 0,
    'permiso_vehiculo' => 0,
    'estados' => 0,
    'est' => 0,
    'establecimiento' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5669799d052d35_57593352',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5669799d052d35_57593352')) {
function content_5669799d052d35_57593352 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '14393252235669799ce241d6_72656605';
?>
<style type="text/css">
    .error {border-color:red;color:red;}
</style>

<div class="backGrey" id="residuos_popup">

    <!-- vehiculo fields -->
    <div class="bs-example">
        <form class="form-horizontal">

            <div class="form-group">
                <label class="col-sm-2 control-label">Dominio</label>
                <div class="col-sm-10">
                    <input type='text' class="form-control" name='dominio' id='dominio' value='<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->dominio;?>
' size='30' disabled>
                    <div style="display:none" id="dominio-error"></div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Residuo</label>
                <div class="col-sm-10">
                    <select class="form-control residuos" name='residuo' id='residuo'>
                        <option></option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['residuos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['res']->value->codigo;?>
' <?php if ($_smarty_tpl->tpl_vars['res']->value->codigo == $_smarty_tpl->tpl_vars['permiso_vehiculo']->value->residuo) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['res']->value->codigo;?>
 - <?php echo $_smarty_tpl->tpl_vars['res']->value->descripcion;?>

                            </option>
                        <?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
                    </select>
                    <div style="display:none" id="residuo-error"></div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Cantidad (kg)</label>
                <div class="col-sm-10">
                    <input type='text' class="form-control" name='cantidad' id='cantidad' value='<?php echo $_smarty_tpl->tpl_vars['permiso_vehiculo']->value->cantidad;?>
' size='30'>
                    <div style="display:none" id="cantidad-error"></div>
                </div>
            </div>
            <div style="clear:both;"></div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Estado</label>
                <div class="col-sm-10">
                    <select class="form-control" name='estado' id='estado'>
                        <option value="0">[SELECCIONE UN ESTADO]</option>
                        <?php
$_from = $_smarty_tpl->tpl_vars['estados']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['est'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['est']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['est']->value) {
$_smarty_tpl->tpl_vars['est']->_loop = true;
$foreach_est_Sav = $_smarty_tpl->tpl_vars['est'];
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['est']->value->id;?>
' <?php if (($_smarty_tpl->tpl_vars['est']->value->id == $_smarty_tpl->tpl_vars['permiso_vehiculo']->value->estado)) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['est']->value->descripcion;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['est'] = $foreach_est_Sav;
}
?>
                    </select>
                    <div style="display:none" id="estado-error"></div>
                </div>
            </div>

            
            <input type="hidden" id="establecimiento_id" name="establecimiento_id" value="<?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->id;?>
" />
            <input type="hidden" id="vehiculo_id_perm" name="vehiculo_id_perm" value="<?php echo $_smarty_tpl->tpl_vars['vehiculo']->value->id;?>
"/>
            <input type="hidden" id="permiso_vehiculo_id" name="permiso_vehiculo_id" value="<?php echo $_smarty_tpl->tpl_vars['permiso_vehiculo']->value->id;?>
"/>

        </form>
    </div> <!-- vehiculo fields -->

    <div align="right">
        <button type="button" class="btn btn-success btn-sm" id='btn_aceptar' onclick="btn_aceptar_permiso_vehiculo();">Aceptar</button>
        <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
    </div>

    <div class="clear20"></div>
</div>


<?php echo '<script'; ?>
>

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

<?php echo '</script'; ?>
>
<?php }
}
?>