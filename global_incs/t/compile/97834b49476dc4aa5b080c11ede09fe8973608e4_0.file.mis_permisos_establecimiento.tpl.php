<?php /* Smarty version 3.1.27, created on 2016-02-05 14:53:29
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mis_permisos_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:150012254756b4e199e2db71_55258487%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97834b49476dc4aa5b080c11ede09fe8973608e4' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mis_permisos_establecimiento.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '150012254756b4e199e2db71_55258487',
  'variables' => 
  array (
    'ACCION' => 0,
    'PERMISO' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'ROL_ID' => 0,
    'OPERACIONES' => 0,
    'OPERACION' => 0,
    'MIS_RESIDUOS' => 0,
    'ELIMINACION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e199f32c06_37669087',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e199f32c06_37669087')) {
function content_56b4e199f32c06_37669087 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '150012254756b4e199e2db71_55258487';
?>
<div class="backGrey">

    <input type='hidden' name='permiso_accion' id='permiso_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'>
    <input type='hidden' name='permiso_id'     id='permiso_id'     value='<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->id;?>
' size='50'>

    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">

        <tr>
            <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Residuo<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='permiso_residuo' id='permiso_residuo' class="permiso_residuo" style='width: 300px'>
                    <option value="">[SELECCIONE TIPO DE RESIDUO]</option>
                    <?php
$_from = $_smarty_tpl->tpl_vars['RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['RESIDUO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['RESIDUO']->value) {
$_smarty_tpl->tpl_vars['RESIDUO']->_loop = true;
$foreach_RESIDUO_Sav = $_smarty_tpl->tpl_vars['RESIDUO'];
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
' <?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'] == $_smarty_tpl->tpl_vars['PERMISO']->value->residuo) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['DESCRIPCION'];?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
                </select>
            </td>
        </tr>

        <tr id="permiso_residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="permiso_residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cantidad (kg)<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
' size='35'></td>
        </tr>

        <tr id="permiso_cantidad-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="permiso_cantidad-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '3') {?>
        <tr>
            <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Operaciones<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='operaciones_residuo' id='operaciones_residuo' class="operaciones_residuo" style='width: 300px' multiple="multiple">
                    <?php
$_from = $_smarty_tpl->tpl_vars['OPERACIONES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['OPERACION'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['OPERACION']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['OPERACION']->value) {
$_smarty_tpl->tpl_vars['OPERACION']->_loop = true;
$foreach_OPERACION_Sav = $_smarty_tpl->tpl_vars['OPERACION'];
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['OPERACION']->value['CODIGO'];?>
'
                         <?php
$_from = $_smarty_tpl->tpl_vars['MIS_RESIDUOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ELIMINACION'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ELIMINACION']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ELIMINACION']->value) {
$_smarty_tpl->tpl_vars['ELIMINACION']->_loop = true;
$foreach_ELIMINACION_Sav = $_smarty_tpl->tpl_vars['ELIMINACION'];
?>
                            <?php if ($_smarty_tpl->tpl_vars['OPERACION']->value['CODIGO'] == $_smarty_tpl->tpl_vars['ELIMINACION']->value->operacion_residuo) {?>
                                selected
                            <?php }?>
                        <?php
$_smarty_tpl->tpl_vars['ELIMINACION'] = $foreach_ELIMINACION_Sav;
}
?> 
                        ><?php echo $_smarty_tpl->tpl_vars['OPERACION']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['OPERACION']->value['DESCRIPCION'];?>

                        </option>
                    <?php
$_smarty_tpl->tpl_vars['OPERACION'] = $foreach_OPERACION_Sav;
}
?>
                </select>
            </td>
        </tr>
        <tr id="operaciones_residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="operaciones_residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>
        <?php }?>
    </table>

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            <a href="javascript:void(0)" class="btn btn-success" onClick="aceptar_permisos()">Aceptar</a>
        </div>
    </div>

</div>


<?php echo '<script'; ?>
>
    $(".permiso_residuo").chosen({width: "396px"});
    $(".operaciones_residuo").chosen({width: "396px"});

    function aceptar_permisos()
    {

        var campos = ['accion', 'id', 'permiso_residuo', 'permiso_cantidad', 'operaciones_residuo', 'permiso_estado', 'duplicado', 'residuo_pendiente'];

        $.ajax({
            type: "POST",
            url: mel_path + "/operacion/compartido/mis_permisos_establecimiento.php",
            data: {
                accion: $("#permiso_accion").val(),
                id: $("#permiso_id").val(),
                permiso_residuo: $("#permiso_residuo").val(),
                permiso_cantidad: $("#permiso_cantidad").val(),
                operaciones_residuo: JSON.stringify($("#operaciones_residuo").val())
            },
            dataType: "text json",
            success: function(retorno) {

                if (retorno['estado'] == 0)
                {   
                    location.reload();
                }
                else
                {

                    for(campo in campos){
                        texto_errores = '';
                        campo = campos[campo];

                        if(retorno['errores'][campo] != null){


                            if ((campo == 'duplicado' || campo == 'residuo_pendiente') && retorno['errores'][campo])
                            {
                                mostrarMensaje('exclamation-triangle',retorno['errores'][campo],'warning');
                                return false;
                            }
                            else
                            {
                                cerrar_mensajes();
                            }

                            texto_errores = retorno['errores'][campo];
                            $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                            $('#' + campo).addClass('error_de_carga');
                        }else{
                            $('#' + campo).removeClass('error_de_carga');
                        }

                        if(texto_errores != ''){
                            $('#' + campo + '-error').html(texto_errores);
                            $('#' + campo + '-td').show();
                            $('#' + campo + '-error').show();
                            ;
                        }else{
                            $('#' + campo + '-error').hide();
                            $('#' + campo + '-td').hide();
                        }
                    }

                    mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                    return false;
                }

            }
        });
    }

<?php echo '</script'; ?>
>
<?php }
}
?>