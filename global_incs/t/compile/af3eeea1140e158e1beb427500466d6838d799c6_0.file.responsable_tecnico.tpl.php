<?php /* Smarty version 3.1.27, created on 2016-03-28 17:10:52
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/responsable_tecnico.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:46636848956f98fcce915a9_33733929%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'af3eeea1140e158e1beb427500466d6838d799c6' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/responsable_tecnico.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46636848956f98fcce915a9_33733929',
  'variables' => 
  array (
    'ACCION' => 0,
    'REPRESENTANTE' => 0,
    'TIPOS_DOCUMENTO' => 0,
    'TIPO_DOCUMENTO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f98fcd03f8c2_10008885',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f98fcd03f8c2_10008885')) {
function content_56f98fcd03f8c2_10008885 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '46636848956f98fcce915a9_33733929';
?>
<div class="backGrey">

    <input type='hidden' name='resp_accion' id='resp_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'>
    <input type='hidden' name='resp_id'     id='resp_id'     value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
' size='50'>
    <div class="clear20" ></div>
    <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size: 13px;">
        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Nombre<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_nombre'   id='resp_nombre'   value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
' size='30'></td>
        </tr>

        <tr id="resp_nombre-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_nombre-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Apellido<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_apellido' id='resp_apellido'   value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
' size='30'></td>
        </tr>

        <tr id="resp_apellido-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_apellido-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Fecha de nacimiento<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_fecha_nacimiento' id='resp_fecha_nacimiento'   value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
'></td>
        </tr>

        <tr id="resp_fecha_nacimiento-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_fecha_nacimiento-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Tipo de Documento<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select name='resp_tipo_doc' id='resp_tipo_doc' style='width: 200px'>
                    <?php
$_from = $_smarty_tpl->tpl_vars['TIPOS_DOCUMENTO']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TIPO_DOCUMENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->value) {
$_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->_loop = true;
$foreach_TIPO_DOCUMENTO_Sav = $_smarty_tpl->tpl_vars['TIPO_DOCUMENTO'];
?>
                        <option value='<?php echo $_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->value['ID'];?>
' <?php if ($_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->value['ID'] == $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['TIPO_DOCUMENTO']->value['DESCRIPCION'];?>
</option>
                    <?php
$_smarty_tpl->tpl_vars['TIPO_DOCUMENTO'] = $foreach_TIPO_DOCUMENTO_Sav;
}
?>
                </select>
            </td>
        </tr>

        <tr id="resp_tipo_doc-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_tipo_doc-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero de Documento<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_nro_doc'  id='resp_nro_doc'  maxlength='8' value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
' size='30'></td>
        </tr>

        <tr id="resp_nro_doc-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_nro_doc-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cargo<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_cargo'     id='resp_cargo'     value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
' size='30'></td>
        </tr>

        <tr id="resp_cargo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_cargo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Cuit/ Cuil<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text'   name='resp_cuit'     id='resp_cuit'     maxlength='11' value='<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
' size='30'></td>
        </tr>

        <tr id="resp_cuit-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="resp_cuit-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr id='sumario_errores_responsable_tecnico' class='invisible'>
            <td colspan="2" align="left" color="red"></td>
        </tr>
    </table>

    <div class="clear20"></div>


    <div class="col-xs-12 text-right">

        <a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
        <a href="javascript:void(0)" class="btn btn-success" id="btn_aceptar">Aceptar</a>

    </div>

    <div class="clear20"></div>

</div>

<?php echo '<script'; ?>
>
            $('input').focus(function() {

                $('#'+$(this).get(0).name).removeClass('error_de_carga');
                $('#'+$(this).get(0).name+'-td').hide();

            });

            $('select').focus(function() {

                $('#'+$(this).get(0).name).removeClass('error_de_carga');
                $('#'+$(this).get(0).name+'-td').hide();

            });

            $(function() {
                $('#resp_cuit').filter_input({regex: '[0-9]'});
                $('#resp_nro_doc').filter_input({regex: '[0-9]'});

                $('#resp_fecha_nacimiento').datepicker({
                  format: 'dd/mm/yyyy',
                  startView: 'decade',
                  endDate: new Date()
                }).on('changeDate', function(e){
                    $(this).datepicker('hide');
                });

            });


            $('#btn_aceptar').click(function() {
                var campos = ['accion', 'id', 'nombre', 'apellido', 'fecha_nacimiento', 'tipo_doc', 'nro_doc', 'cargo', 'cuit'];
                var prefijo = 'resp';

                if ($("#resp_cuit").val().length > 0)
                {

                    if(cuitConFormatoValido($("#resp_cuit").val()))
                    {
                        cerrar_mensajes();
                    }
                    else
                    {
                        mostrarMensaje('exclamation-triangle','El CUIT ingresado no es v&aacute;lido.','warning');
                        return false;
                    }

                }

                $.ajax({
                    type: "POST",
                    url: mel_path+"/registracion/responsable_tecnico.php",
                    data: {
                        accion: $("#resp_accion").val(),
                        id: $("#resp_id").val(),
                        nombre: $("#resp_nombre").val(),
                        apellido: $("#resp_apellido").val(),
                        fecha_nacimiento: $("#resp_fecha_nacimiento").val(),
                        tipo_doc: $("#resp_tipo_doc").val(),
                        nro_doc: $("#resp_nro_doc").val(),
                        cargo: $("#resp_cargo").val(),
                        cuit: $("#resp_cuit").val()
                    },
                    dataType: "text json",
                    success: function(retorno) {
                        if (retorno['estado'] == 0) {
                            if ($("#resp_accion").val() == 'alta') {
                                agregar_representante_tecnico(retorno['datos']);
                            } else {
                                modificar_representante_tecnico(retorno['datos']);
                            }
                            $('#mel_popup').modal('hide');
                        } else {

                            for(campo in campos){
                                campo = campos[campo];
                                texto_errores = '';

                                if(retorno['errores'][campo] != null){

                                    texto_errores = retorno['errores'][campo];
                                    $('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                                    $('#' + prefijo + '_' + campo).addClass('error_de_carga');
                                }else{
                                    $('#' + prefijo + '_' + campo).removeClass('error_de_carga');
                                }

                                if(texto_errores != ''){
                                    $('#' + prefijo + '_' + campo + '-error').html(texto_errores);
                                    $('#' + prefijo + '_' + campo + '-td').show();
                                    $('#' + prefijo + '_' + campo + '-error').show();
                                    ;
                                }else{
                                    $('#' + prefijo + '_' + campo + '-error').hide();
                                    $('#' + prefijo + '_' + campo + '-td').hide();

                                }
                            }
                        }
                    }
                });
            });
<?php echo '</script'; ?>
>


<?php }
}
?>