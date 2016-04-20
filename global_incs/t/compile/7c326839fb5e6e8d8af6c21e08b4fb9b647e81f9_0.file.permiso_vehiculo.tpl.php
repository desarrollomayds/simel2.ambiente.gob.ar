<?php /* Smarty version 3.1.27, created on 2015-11-23 14:34:35
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/permiso_vehiculo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:206581723556534e2b3712b4_59032481%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7c326839fb5e6e8d8af6c21e08b4fb9b647e81f9' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/permiso_vehiculo.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '206581723556534e2b3712b4_59032481',
  'variables' => 
  array (
    'EXTRA' => 0,
    'VEHICULO_ID' => 0,
    'PERMISO_ID' => 0,
    'ACCION' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'PERMISO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56534e2b49bef0_36738989',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56534e2b49bef0_36738989')) {
function content_56534e2b49bef0_36738989 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '206581723556534e2b3712b4_59032481';
?>
<div class="backGrey">
<?php if ($_smarty_tpl->tpl_vars['EXTRA']->value) {?>

    <input type='hidden' name='permiso_vehiculo' id='permiso_vehiculo' value='<?php echo $_smarty_tpl->tpl_vars['VEHICULO_ID']->value;?>
'>
    <input type='hidden' name='permiso_id' id='permiso_id' value='<?php echo $_smarty_tpl->tpl_vars['PERMISO_ID']->value;?>
'>
    <input type='hidden' name='permiso_accion' id="permiso_accion" value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
'>

    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

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
                        <option value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value->codigo;?>
' <?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value->codigo == $_smarty_tpl->tpl_vars['PERMISO']->value->residuo) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value->codigo;?>
 - <?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value->descripcion;?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
                </select>
            </td>
        </tr>

        <tr id="residuo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="residuo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cantidad (kg)<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
' size='35'></td>
        </tr>

        <tr id="cantidad-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="cantidad-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Estado<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='permiso_estado' id='permiso_estado'>
                    <option value="">[SELECCIONE EL ESTADO DE LA SUSTANCIA]</option>
                    <option value='1' <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->estado == 1) {?>selected<?php }?>>L&iacute;quido</option>
                    <option value='2' <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->estado == 2) {?>selected<?php }?>>S&oacute;lido</option>
                    <option value='3' <?php if ($_smarty_tpl->tpl_vars['PERMISO']->value->estado == 3) {?>selected<?php }?>>Semi-s&oacute;lido</option>
                </select>
            </td>
        </tr>

        <tr id="estado-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="estado-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

    </table>

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-12 text-right">
            <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
            <a href="javascript:void(0)" class="btn btn-success" onClick="aceptar_permisos_vehiculo()">Aceptar</a>
        </div>
    </div>

    <?php } else { ?>
        <div class="alert alert-danger" role="alert">Para poder agregar un permiso a un veh&iacute;culo es necesario primero agregar al menos un permiso al establecimiento.</div>

        <div class="row" style="margin-top:30px;">
            <div class="col-xs-12 text-right">
                <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Volver</a>
            </div>
        </div>

    <?php }?>
</div>


<?php echo '<script'; ?>
>
    $(".permiso_residuo").chosen({width: "396px"});
    $('#permiso_cantidad').filter_input({regex:'[0-9]'});

    function aceptar_permisos_vehiculo()
    {
        var campos  = [ 'accion', 'establecimiento', 'vehiculo', 'id', 'residuo', 'cantidad', 'estado', 'duplicado' ];
        var prefijo = 'permiso';

        $.ajax({
            type: "POST",
            url: mel_path+"/operacion/transportista/permiso_vehiculo.php",
            data:
            {
                accion          : $("#permiso_accion").val(),
                vehiculo        : $("#permiso_vehiculo").val(),
                permiso         : $("#permiso_id").val(),
                residuo         : $("#permiso_residuo").val(),
                cantidad        : $("#permiso_cantidad").val(),
                estado          : $("#permiso_estado").val()
            },
            dataType: "text json",
            success: function(retorno)
            {
                if(retorno['estado'] == 0){
                    location.reload();
                }
                else
                {

                    for(campo in campos){
                        texto_errores = '';
                        campo = campos[campo];

                        if(retorno['errores'][campo] != null){

                            if (campo == 'duplicado' && retorno['errores'][campo])
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