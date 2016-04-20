<?php /* Smarty version 3.1.27, created on 2015-11-20 13:18:02
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/vehiculos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:44280811564f47ba5bbd07_15578563%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff2770f679f8352906cc08b0dc0d90b275b6c870' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/vehiculos.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '44280811564f47ba5bbd07_15578563',
  'variables' => 
  array (
    'ACCION' => 0,
    'VEHICULO' => 0,
    'TIPOS_VEHICULO' => 0,
    'tipo' => 0,
    'TIPOS_CAJA' => 0,
    'caja' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f47ba6d6ec9_88249065',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f47ba6d6ec9_88249065')) {
function content_564f47ba6d6ec9_88249065 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '44280811564f47ba5bbd07_15578563';
?>
<div class="backGrey">

    <input type='hidden' name='vehiculo_accion' id='vehiculo_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'>
	<input type='hidden' name='vehiculo_id'     id='vehiculo_id'     value='<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->id;?>
' size='50'>

	<table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Dominio<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='vehiculo_dominio' id='vehiculo_dominio' value='<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->dominio;?>
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
						<?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_vehiculo == $_smarty_tpl->tpl_vars['tipo']->value->codigo) {?>
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
						<?php if ($_smarty_tpl->tpl_vars['VEHICULO']->value->tipo_caja == $_smarty_tpl->tpl_vars['caja']->value->codigo) {?>
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
				<textarea type='text' name='vehiculo_descripcion' id='vehiculo_descripcion' style="min-width:396px;height:80px;resize:vertical;"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->descripcion;?>
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
		var campos  = [	'accion', 'establecimiento', 'id', 'dominio', 'tipo-vehiculo', 'tipo-caja', 'descripcion', 'dominio_uso'];
		var prefijo = 'vehiculo';

		// checkeo formato del dominio si no se trata de una BARCAZA
		if ($("#vehiculo_dominio").val() && $("#tipo-vehiculo").val() != 'BA' && !isDominio($("#vehiculo_dominio").val()))
		{
		    mostrarMensaje('exclamation-triangle','Ingrese un dominio de veh&iacute;culo v&aacute;lido.','warning');
		    return false;
		}

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/vehiculo/vehiculos.php",
			data:
			{
				accion            : $("#vehiculo_accion").val(),
				id                : $("#vehiculo_id").val(),
				dominio           : $("#vehiculo_dominio").val(),
				tipo_vehiculo     : $("#tipo-vehiculo").val(),
				tipo_caja         : $("#tipo-caja").val(),
				descripcion       : $("#vehiculo_descripcion").val(),
			},
			dataType: "text json",
			success: function(retorno){
				if(retorno['estado'] == 0)
				{
					location.reload();
				}
				else{

	                for(campo in campos){
	                    texto_errores = '';
	                    campo = campos[campo];
	                    
	                    if(retorno['errores'][campo] != null){

                            if ((campo == 'dominio_uso') && retorno['errores'][campo])
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