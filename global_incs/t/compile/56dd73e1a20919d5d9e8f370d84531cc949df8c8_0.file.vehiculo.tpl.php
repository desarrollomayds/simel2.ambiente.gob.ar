<?php /* Smarty version 3.1.27, created on 2015-11-24 14:07:04
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/vehiculo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:67844631456549938948369_46521244%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '56dd73e1a20919d5d9e8f370d84531cc949df8c8' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/vehiculo.tpl',
      1 => 1443651958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '67844631456549938948369_46521244',
  'variables' => 
  array (
    'ACCION' => 0,
    'ESTABLECIMIENTO' => 0,
    'VEHICULO' => 0,
    'TIPOS_VEHICULO' => 0,
    'tipo' => 0,
    'TIPOS_CAJA' => 0,
    'caja' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_565499389fb105_65099754',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_565499389fb105_65099754')) {
function content_565499389fb105_65099754 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '67844631456549938948369_46521244';
?>
<div class="backGrey">

    <input type='hidden' name='vehiculo_accion' id='vehiculo_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'>
	<input type='hidden' name='vehiculo_establecimiento' id='vehiculo_establecimiento' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value;?>
' size='50'>
	<input type='hidden' name='vehiculo_id'     id='vehiculo_id'     value='<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
' size='50'>

	<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Dominio<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='vehiculo_dominio' id='vehiculo_dominio' value='<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
'></td>
		</tr>

        <tr id="dominio-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="dominio-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Tipo Veh&iacute;culo<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5">
				<select id="tipo-vehiculo" name="tipo-vehiculo">
					<option value="">[SELECCIONE UN TIPO DE VEH&iacute;CULO]</option>
					<?php
$_from = $_smarty_tpl->tpl_vars['TIPOS_VEHICULO']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tipo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tipo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tipo']->value) {
$_smarty_tpl->tpl_vars['tipo']->_loop = true;
$foreach_tipo_Sav = $_smarty_tpl->tpl_vars['tipo'];
?>
						<?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO'] == $_smarty_tpl->tpl_vars['tipo']->value->codigo) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value->codigo;?>
" selected><?php echo $_smarty_tpl->tpl_vars['tipo']->value->descripcion;?>
</option>
						<?php } else { ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['tipo']->value->codigo;?>
"><?php echo $_smarty_tpl->tpl_vars['tipo']->value->descripcion;?>
</option>
						<?php }?>
					<?php
$_smarty_tpl->tpl_vars['tipo'] = $foreach_tipo_Sav;
}
?>
				</select>
			</td>
		</tr>

        <tr id="tipo-vehiculo-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="tipo-vehiculo-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Tipo de caja:</td>
			<td bordercolor="#EAEAE5">
				<select id="tipo-caja" name="tipo-caja">
					<option value="">[NO APLICA]</option>
					<?php
$_from = $_smarty_tpl->tpl_vars['TIPOS_CAJA']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['caja'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['caja']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['caja']->value) {
$_smarty_tpl->tpl_vars['caja']->_loop = true;
$foreach_caja_Sav = $_smarty_tpl->tpl_vars['caja'];
?>
						<?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA'] == $_smarty_tpl->tpl_vars['caja']->value->codigo) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['caja']->value->codigo;?>
" selected><?php echo $_smarty_tpl->tpl_vars['caja']->value->descripcion;?>
</option>
						<?php } else { ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['caja']->value->codigo;?>
"><?php echo $_smarty_tpl->tpl_vars['caja']->value->descripcion;?>
</option>
						<?php }?>
					<?php
$_smarty_tpl->tpl_vars['caja'] = $foreach_caja_Sav;
}
?>
				</select>
			</td>
		</tr>

        <tr id="tipo-caja-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="tipo-caja-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5">
				<textarea type='text' name='vehiculo_descripcion' id='vehiculo_descripcion' style="min-width:396px;height:80px;resize:vertical;"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</textarea>
			</td>
		</tr>

        <tr id="descripcion-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="descripcion-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

	</table>
    
    <div class="row" style="margin-top:30px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Cancelar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" id="btn_aceptar_2">Aceptar</a>
	    </div>
    </div>

</div>

<?php echo '<script'; ?>
>



	$('#btn_aceptar_2').click(function() {
		var campos  = [	'accion', 'establecimiento', 'id', 'dominio', 'tipo-vehiculo', 'tipo-caja', 'descripcion'];
		var prefijo = 'vehiculo';

		// checkeo formato del dominio si no se trata de una BARCAZA
		if ($("#vehiculo_dominio").val() && $("#tipo-vehiculo").val() != 'BA' && !isDominio($("#vehiculo_dominio").val()))
		{
		    mostrarMensaje('exclamation-triangle','Ingrese un dominio de veh&iacute;culo v&aacute;lido.','warning');
		    return false;
		}

		$.ajax({
			type: "POST",
			url: mel_path+"/registracion/vehiculo.php",
			data:
			{
				accion            : $("#vehiculo_accion").val(),
				establecimiento   : $("#vehiculo_establecimiento").val(),
				id                : $("#vehiculo_id").val(),
				dominio           : $("#vehiculo_dominio").val(),
				tipo_vehiculo     : $("#tipo-vehiculo").val(),
				tipo_caja         : $("#tipo-caja").val(),
				descripcion       : $("#vehiculo_descripcion").val(),
			},
			dataType: "text json",
			success: function(retorno){
				if(retorno['estado'] == 0){
					if($("#vehiculo_accion").val() == 'alta'){
						agregar_vehiculo(retorno['datos']);
					}else{
						modificar_vehiculo(retorno['datos']);
					}
					$('#mel2_popup').modal('hide');
				}else{
	                for(campo in campos){
	                    texto_errores = '';
	                    campo = campos[campo];
	                    
	                    if(retorno['errores'][campo] != null){

	                        texto_errores = retorno['errores'][campo];
	                        $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
	                        $('#' + campo).addClass('error_de_carga');
	                    }
	                    else
	                    {
	                        $('#' + campo).removeClass('error_de_carga');
	                    }

	                    if(texto_errores != ''){
	                        $('#' + campo + '-error').html(texto_errores);
	                        $('#' + campo + '-td').show();
	                        $('#' + campo + '-error').show();
	                        ;
	                    }
	                    else
	                    {
	                        $('#' + campo + '-error').hide();
	                        $('#' + campo + '-td').hide();
	                    }
	                }

	               	mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                    return false;
				}
			  }
		 });
	})

	// siempre que se seleccione un tipo-vehiculo, limpiamos tipo-caja.
	$("select#tipo-vehiculo").change(function() {
		$("select#tipo-caja").val('');
	});
<?php echo '</script'; ?>
>

<?php }
}
?>