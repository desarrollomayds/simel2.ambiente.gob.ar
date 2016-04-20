<?php /* Smarty version 3.1.27, created on 2016-02-11 10:14:45
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/cat_residuos_peligrosos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:193509719556bc8945524a22_00255732%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6401d95d30ab435f9d9ce948a4bfd6435e1e5669' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/cat_residuos_peligrosos.tpl',
      1 => 1454611336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '193509719556bc8945524a22_00255732',
  'variables' => 
  array (
    'residuo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56bc8945845de8_89191808',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56bc8945845de8_89191808')) {
function content_56bc8945845de8_89191808 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '193509719556bc8945524a22_00255732';
?>
<div class="backGrey" style="padding:10px;">

    <form class="form-horizontal" id="tablas-forms">

        <input id="geocomplete" type="hidden">
        <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

        <input type="hidden" name="residuo" id="residuo" value="<?php echo $_smarty_tpl->tpl_vars['residuo']->value;?>
">
        <input type="hidden" name ="codigo" id="codigo" value="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->codigo;?>
">
        <input type="hidden" name ="codigo" id="codigo" value="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->codigo;?>
">
        

        <p class="bg-info" style="font-size:15px;font-weight:bold;padding:5px;">Informaci&oacute;n Residuos Peligrosos</p>

        <div class="form-group">
            <label class="col-sm-3 control-label">C&oacute;digo</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->codigo;?>
" id="codigo" name="codigo" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Categor&oacute;a</label>
            <div class="col-sm-9">
                <input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->categoria;?>
" id="categoria" name="categoria" value="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->categoria;?>
" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Descripci&oacute;n</span></label>
            <div class="col-sm-9">
                <input class="form-control" type="text" id="descripcion" name="descripcion" value="<?php echo $_smarty_tpl->tpl_vars['residuo']->value->descripcion;?>
" disabled>
            </div>
        </div>

        
        

        <div style="clear:both;"></div>

        

    <div class="row" style="margin-top:30px;">
        <div class="col-xs-6 text-left">
            <a href="javascript:void(0)" class="btn btn-success" onClick="cat_residuos_peligrosos()">Aceptar</a>
        </div>
        <div class="col-xs-6 text-right">
            <a href="javascript:void(0)" class="btn btn-danger" onClick="cancelar()">Cancelar</a>
        </div>
    </div>

    <div class="clear20"></div>
</div>


    <?php echo '<script'; ?>
>
        $(document).ready(function() {
            removeFieldErrors();


        function cat_residuos_peligrosos()
        {
            var campos = ['codigo','categoria','descripcion']

           
            

            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/cat_residuos_peligrosos.php",
                data: {
                    //form_values,
                    accion: "aprobar",
                    codigo: $('#codigo').val(),
                    categoria: $('#categoria').val(),
                    descripcion: $('#descripcion').val(),
                    
                },
                dataType: "text json",
                success: function(retorno)
                {   
                    if (retorno['estado'] == 0) 
                    {
                        location.reload();
                    }
                    else 
                    {
                        valicacion_formulario_modal(retorno['errores']);

                        mostrarMensaje('exclamation-triangle', 'Hubo errores a la hora de procesar el formulario, revise los campos indicados.', 'warning');
                        return false;
                    }
                }
            });
        }

        function cancelar()
        {
            $.ajax({
                type: "POST",
                url: admin_path+"/operacion/cat_residuos_peligrosos.php",
                data: {
                    accion: "rechazar",
                    residuos: $("#residuo").val(),
                },
                dataType: "json",
                success: function(data)
                {
                    if (data.respuesta)
                        location.reload();
                }
            });
        }

    <?php echo '</script'; ?>
>
<?php }
}
?>