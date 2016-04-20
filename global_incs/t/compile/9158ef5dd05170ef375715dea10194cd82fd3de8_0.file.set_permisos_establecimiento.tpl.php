<?php /* Smarty version 3.1.27, created on 2015-11-20 10:58:33
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_permisos_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:117732928564f270970ea44_91069336%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9158ef5dd05170ef375715dea10194cd82fd3de8' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_permisos_establecimiento.tpl',
      1 => 1443651963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '117732928564f270970ea44_91069336',
  'variables' => 
  array (
    'ACCION' => 0,
    'RESIDUO' => 0,
    'residuos' => 0,
    'res' => 0,
    'permiso_establecimiento' => 0,
    'establecimiento' => 0,
    'tratamientos' => 0,
    'trat' => 0,
    'trat_definido' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f27098361b8_87404853',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f27098361b8_87404853')) {
function content_564f27098361b8_87404853 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '117732928564f270970ea44_91069336';
?>
<style type="text/css">
	.error {border-color:red;color:red;}
</style>

<div class="backGrey" id="residuos_popup">

<!--    <input type='hidden' name='residuo_accion' id='residuo_accion' value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
' size='50'> -->
	<input type='hidden' name='residuo_id' id='residuo_id' value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
' size='50'>
	<form class="form-horizontal">
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
' <?php if ($_smarty_tpl->tpl_vars['res']->value->codigo == $_smarty_tpl->tpl_vars['permiso_establecimiento']->value->residuo) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['res']->value->codigo;?>
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

		<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::GENERADOR) {?>
			<div class="form-group">
				<label class="col-sm-2 control-label">Cantidad estimada (kg)</label>
				<div class="col-sm-10">
					<input type='text' class="form-control" name='cantidad' id='cantidad' value='<?php echo $_smarty_tpl->tpl_vars['permiso_establecimiento']->value->cantidad;?>
' size='30'>
					<div style="display:none" id="cantidad-error"></div>
				</div>
			</div>
			<div style="clear:both;"></div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::OPERADOR) {?>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tratamientos</label>
				<div class="col-sm-10">
					<select name='tratamientos' id='tratamientos' class="tratamientos" style='width: 300px' multiple="multiple">
		                <?php
$_from = $_smarty_tpl->tpl_vars['tratamientos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['trat'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['trat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['trat']->value) {
$_smarty_tpl->tpl_vars['trat']->_loop = true;
$foreach_trat_Sav = $_smarty_tpl->tpl_vars['trat'];
?>
		                    <option value='<?php echo $_smarty_tpl->tpl_vars['trat']->value->codigo;?>
'
			                    <?php
$_from = $_smarty_tpl->tpl_vars['permiso_establecimiento']->value->tratamientos;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['trat_definido'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['trat_definido']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['trat_definido']->value) {
$_smarty_tpl->tpl_vars['trat_definido']->_loop = true;
$foreach_trat_definido_Sav = $_smarty_tpl->tpl_vars['trat_definido'];
?>
			                        <?php if ($_smarty_tpl->tpl_vars['trat']->value->codigo == $_smarty_tpl->tpl_vars['trat_definido']->value->operacion_residuo) {?>
			                            selected
			                        <?php }?>
			                    <?php
$_smarty_tpl->tpl_vars['trat_definido'] = $foreach_trat_definido_Sav;
}
?>
		                    ><?php echo $_smarty_tpl->tpl_vars['trat']->value->codigo;?>
 - <?php echo $_smarty_tpl->tpl_vars['trat']->value->descripcion;?>

		                    </option>
		                <?php
$_smarty_tpl->tpl_vars['trat'] = $foreach_trat_Sav;
}
?>
		            </select>
		            <div style="display:none" id="tratamientos-error"></div>
		        </div>
			</div>
		<?php }?>

		
		<input type="hidden" id="establecimiento_id" name="establecimiento_id" value="<?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->id;?>
" />

		<?php if (isset($_smarty_tpl->tpl_vars['permiso_establecimiento']->value)) {?>
			<input type="hidden" id="permiso_id" name="permiso_id" value="<?php echo $_smarty_tpl->tpl_vars['permiso_establecimiento']->value->id;?>
"/>
		<?php }?>

	</form>

    <div align="right">
		<button type="button" class="btn btn-success btn-sm" id='btn_aceptar' onclick="btn_aceptar_permisos_establecimiento();">Aceptar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

    <div class="clear20"></div>
</div>


<?php echo '<script'; ?>
>
	$(".residuos").chosen({width:"100%;"});
	$(".tratamientos").chosen({width:"100%;"});

	$(document).ready(function() {
		removeFieldErrors();
	});

	function btn_aceptar_permisos_establecimiento()
	{
		var residuo = $("select#residuo").val();
		var cantidad = $("input#cantidad").val();
		var tratamientos = JSON.stringify($("#tratamientos").val());
		var establecimiento_id = $("input#establecimiento_id").val();
		var permiso_id = $("input#permiso_id").val();

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_permisos_establecimiento.php",
			data: {
				accion: "set",
				permiso_id: permiso_id,
				residuo: residuo,
				cantidad: cantidad,
				tratamientos: tratamientos,
				establecimiento_id: establecimiento_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					var nombre_container = $('input#permisos_hidden_info').val();
					var html = parsePermisoEstablecimientoHtml(retorno['permiso_obj'], nombre_container);

					if (nombre_container == 'nuevo_permiso_'+retorno['permiso_obj'].tipo_establecimiento+'_'+retorno['permiso_obj'].establecimiento_id) {
						$('div#container_establecimiento_permisos_'+retorno['permiso_obj'].tipo_establecimiento+'_'+retorno['permiso_obj'].establecimiento_id).append(html);
					} else {
						$('div#'+nombre_container).replaceWith(html);
					}


					$('#permisos_popup').modal('hide');
				} else {
					parseErrors(retorno['errores']);
				}
			}
		});
	}

	function parsePermisoEstablecimientoHtml(permiso_obj, nombre_container)
	{
		console.debug(permiso_obj);
		//id: "736", establecimiento_id: 326, residuo: "Y10C", cantidad: null, tratamientos: Array[0]}cantidad: nullestablecimiento_id: 326id: "736"residuo: "Y10C"tratamientos: Array[0]__proto__: Object

		var html = ' \
				<div class="bs-example residuos_establecimiento" id="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'"> \
				<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" permiso-id="'+permiso_obj.id+'" onclick="borrarPermisoEstablecimiento($(this), '+permiso_obj.establecimiento_id+');" container="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'" title="Borrar" rol="'+permiso_obj.tipo_establecimiento+'"></i> \
				<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso" onclick="setPermisoEstablecimiento($(this), '+permiso_obj.establecimiento_id+','+permiso_obj.id+');" container="container_residuo_'+permiso_obj.tipo_establecimiento+'_'+permiso_obj.establecimiento_id+'_'+permiso_obj.residuo+'" data-toggle="modal" data-target="#permisos_popup"></i> \
				<p> \
					<strong>CSC: </strong><span id="callbPerm">'+permiso_obj.residuo+'</span> \
					<br> \
					<strong>Descripci&oacute;n: </strong><span>'+permiso_obj.descripcion+'</span> \
					<br> \
				';

		if (permiso_obj.tipo_establecimiento == 'generador') {
			html += ' \
					<strong>Cantidad: </strong><span>'+permiso_obj.cantidad+'</span> \
					<br>';
		}

		if (permiso_obj.tipo_establecimiento == 'operador') {
			html += '<strong>Tratamientos: </strong> \
				</p> \
				<ul>';

			$.each(permiso_obj.tratamientos, function(key, value) {
				console.info(value);
				html += '<li>'+value+'</li>';
			});

			html += '</ul></div>';
				
		// este cierre aplica a rol != operador.
		} else {
			html += '</p></div>';
		}

		return html;
	}
<?php echo '</script'; ?>
>
<?php }
}
?>