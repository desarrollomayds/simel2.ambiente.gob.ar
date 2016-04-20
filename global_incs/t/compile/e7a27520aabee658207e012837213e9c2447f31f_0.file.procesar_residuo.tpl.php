<?php /* Smarty version 3.1.27, created on 2015-11-20 10:28:19
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/procesar_residuo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1201203851564f1ff3cb6de0_35727182%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7a27520aabee658207e012837213e9c2447f31f' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/procesar_residuo.tpl',
      1 => 1443651966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1201203851564f1ff3cb6de0_35727182',
  'variables' => 
  array (
    'TRATAMIENTOS' => 0,
    'tratamiento' => 0,
    'RESIDUO_RELACION_ID' => 0,
    'MANIFIESTO_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1ff3d550f5_93342385',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1ff3d550f5_93342385')) {
function content_564f1ff3d550f5_93342385 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1201203851564f1ff3cb6de0_35727182';
?>
<div class="form-group">
	<label class="col-sm-3 control-label">Fecha Tratamiento *</label>
	<div class="col-sm-9">
		<input class="form-control" style="width:450px;float:right;" type="text" id="fecha_tratamiento" name="fecha_tratamiento">
		<div id="fecha_tratamiento-td"><div class="form_error_msg" id="fecha_tratamiento-error" style="display:none;"></div></div>
	</div>
</div>
<div class="clear20"></div>

<div class="form-group">
	<label class="col-sm-4 control-label">Tratamiento del Residuo</label>
	<div class="col-sm-8">
		<select class="form-control tratamientos" name='tratamiento' id='tratamiento'>
			<option value="0" selected>[SELECCIONE UN TRATAMIENTO]</option>
			<?php
$_from = $_smarty_tpl->tpl_vars['TRATAMIENTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tratamiento'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tratamiento']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tratamiento']->value) {
$_smarty_tpl->tpl_vars['tratamiento']->_loop = true;
$foreach_tratamiento_Sav = $_smarty_tpl->tpl_vars['tratamiento'];
?>
				<option value='<?php echo $_smarty_tpl->tpl_vars['tratamiento']->value->codigo;?>
' descripcion="<?php echo $_smarty_tpl->tpl_vars['tratamiento']->value->descripcion;?>
"><?php echo $_smarty_tpl->tpl_vars['tratamiento']->value->codigo;?>
 - <?php echo $_smarty_tpl->tpl_vars['tratamiento']->value->descripcion;?>
</option>
			<?php
$_smarty_tpl->tpl_vars['tratamiento'] = $foreach_tratamiento_Sav;
}
?>
		</select>
	</div>
</div>
<div class="clear20"></div>
<div align="right">
	<button type="button" class="btn btn-success btn-sm" onclick="procesarResiduo($(this));"
		residuo-relacion-id="<?php echo $_smarty_tpl->tpl_vars['RESIDUO_RELACION_ID']->value;?>
" manifiesto-id="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO_ID']->value;?>
"  data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Aceptar</button>
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>

<?php echo '<script'; ?>
>


	$(document).ready(function() {

	    $('#fecha_tratamiento').datepicker({
			format: 'dd/mm/yyyy',
			endDate: new Date()
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });

	    $(".tratamientos").chosen({width:"450px"});

	});

	function setearTratamiento(obj)
	{
		var residuo_relacion_id = obj.attr('residuo-relacion-id');
		var tratamiento = $("select#tratamiento :selected").val();
		var tratamiento_descripcion = $("select#tratamiento :selected").attr('descripcion');

		if (tratamiento != 0) {
			//console.info("seteando tratamiento_residuo_"+residuo_relacion_id+" con tratamiento: "+tratamiento);
			//console.info("seteando tratamiento_descripcion_"+residuo_relacion_id+" con desc: "+tratamiento_descripcion);
			$("span#tratamiento_residuo_"+residuo_relacion_id).html(tratamiento);
			$("span#tratamiento_descripcion_"+residuo_relacion_id).html(tratamiento_descripcion);
			hideTratamientosPopup();
			showTratamientoSeleccionado(residuo_relacion_id);
		} else {
			mostrarMensaje("exclamation-triangle", "Debe elegir el tratamiento para el residuo del manifiesto", "error");
		}
	}

	function clearTratamientoSeleccionado()
	{
		$("span#tratamiento_codigo").val('');
		$("span#tratamiento_descripcion").val('');
		$("div#tratamientos_definidos").hide();	
	}

	function procesarResiduo(objButton)
	{
		var residuo_relacion_id = objButton.attr('residuo-relacion-id');
		var manifiesto_id = objButton.attr('manifiesto-id');
		var tratamiento = $("select#tratamiento :selected").val();
		var tratamiento_descripcion = $("select#tratamiento :selected").attr('descripcion');
		var fecha_tratamiento = $("input#fecha_tratamiento").val();
		var errors = '';

		objButton.button('loading');

		if (fecha_tratamiento == 0) {
			errors += " Debe indicar la fecha del tratamiento.";
		}

		if (tratamiento == 0) {
			errors += " Debe elegir el tratamiento para el residuo del manifiesto";
		}

		if (errors == '') {
			$.ajax({
				type: "POST",
				url: mel_path+"/operacion/operador/procesar_residuo.php",
				data: {
					manifiesto_id: manifiesto_id,
					residuo_relacion_id: residuo_relacion_id,
					fecha_tratamiento: fecha_tratamiento,
					tratamiento: tratamiento
				},
				dataType: "text json",
				success: function(retorno) {
					objButton.button('reset');
					if (retorno['estado'] != 0) {
						mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
					} else {
						mostrarMensaje("exclamation-triangle","Tratamiento aceptado","success");
						// cerramos modal y recargamos modal procesar manifiesto.
						$('#tratamientos_popup').modal('hide');
						procesarManifiesto(manifiesto_id);
					}
				}
			});
		} else {
			objButton.button('reset');
			mostrarMensaje("exclamation-triangle", errors, "error");
		}
	}


<?php echo '</script'; ?>
>
<?php }
}
?>