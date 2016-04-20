<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:35
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/recibir_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:987017538564f1f8bb37290_70255966%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f6eb4fba55f023bfa582708b689bd32c4e7bd48' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/operador/recibir_manifiesto.tpl',
      1 => 1445284300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '987017538564f1f8bb37290_70255966',
  'variables' => 
  array (
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'GENERADOR' => 0,
    'TRANSPORTISTA' => 0,
    'OPERADOR' => 0,
    'MANIFIESTOS_RELACIONADOS' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'MHIJO' => 0,
    'MHIJO_RESIDUO' => 0,
    'cant_total_residuos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f8bce31c7_57408183',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f8bce31c7_57408183')) {
function content_564f1f8bce31c7_57408183 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '987017538564f1f8bb37290_70255966';
?>
<div class="alert alert-info" role="alert" style="font-weight:bold;">
	Ud est&aacute; recibiendo los residuos del manifiesto Nro <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO']);?>

</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Informaci&oacute;n del Manifiesto</p>
	<table class="table table-hover table-striped">
		<tbody>
			<tr>
				<td><b>Empresa Creadora:</b></td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['CREADOR']['NOMBRE_EMPRESA'];?>
</td>
			</tr>
			<tr>
				<td><b>Fecha de Creaci&oacute;n</b></td>
				<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_CREACION'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['GENERADORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['GENERADOR'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['GENERADOR']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['GENERADOR']->value) {
$_smarty_tpl->tpl_vars['GENERADOR']->_loop = true;
$foreach_GENERADOR_Sav = $_smarty_tpl->tpl_vars['GENERADOR'];
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['PISO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CUIT'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
				</tr>
			
			<?php
$_smarty_tpl->tpl_vars['GENERADOR'] = $foreach_GENERADOR_Sav;
}
if (!$_smarty_tpl->tpl_vars['GENERADOR']->_loop) {
?>
				<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::SIMPLE_RES_544_94) {?>
					<tr><td colspan="6">Resoluci&oacute;n 544/94</td></tr>
				<?php }?>
			<?php
}
?>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportista</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_ANIO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<th>Nombre</th>
				<th>Domicilio</th>
				<th>Expediente</th>
				<th>Cuit</th>
				<th>Caa</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CUIT'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">
		<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::SLOP && count($_smarty_tpl->tpl_vars['MANIFIESTOS_RELACIONADOS']->value) > 0) {?>
			Residuos declarados en el Padre:
		<?php } else { ?>
			Residuos
		<?php }?>
	</p>
	<table class="table table-hover table-striped" id="lista_residuos">
		<thead>
			<tr>
				<th class="invisible">Id</th>
				<th>Residuo</th>
				<th>Tipo Cont.</th>
				<th>Cant. Cont.</th>
				<th>Cant. Est.</th>
				<th>Cant. Real</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>
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
				<tr>
					<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
					<td>
						<input style="text-align:right;" type="text" size="4" name="cant_real_manifiesto_<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ID'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
">&nbsp;kg
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO_'];?>
</td>
				</tr>
			<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
		</tbody>
	</table>
</div>

<!-- Si el Manifiesto SLOP tiene otros relacionados, listo los residuos declarados en sus "hijos" -->
<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::SLOP && count($_smarty_tpl->tpl_vars['MANIFIESTOS_RELACIONADOS']->value) > 0) {?>
	<div class="table-responsive bs-example">
		<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos Recibidos y Tratados en los Manifiestos Hijos</p>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<th>Protocolo</th>
					<th>Residuo</th>
					<th>Cant.Recibida</th>
					<th>Fecha Tratamiento</th>
					<th>Tratamiento</th>
				</tr>
			</thead>
			<tbody>
				<?php $_smarty_tpl->tpl_vars["cant_total_residuos"] = new Smarty_Variable("0", null, 0);?>
				<?php
$_from = $_smarty_tpl->tpl_vars['MANIFIESTOS_RELACIONADOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['MHIJO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['MHIJO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['MHIJO']->value) {
$_smarty_tpl->tpl_vars['MHIJO']->_loop = true;
$foreach_MHIJO_Sav = $_smarty_tpl->tpl_vars['MHIJO'];
?>
					<!-- residuos manif hijos -->
					<?php
$_from = $_smarty_tpl->tpl_vars['MHIJO']->value->residuos_manifiesto;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['MHIJO_RESIDUO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value) {
$_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->_loop = true;
$foreach_MHIJO_RESIDUO_Sav = $_smarty_tpl->tpl_vars['MHIJO_RESIDUO'];
?>
						<tr>
							<td><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MHIJO']->value->id_protocolo_manifiesto);?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value->residuo_id;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value->cantidad_real;?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value->fecha_tratamiento->format('Y-m-d H:i:s');?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value->tratamiento;?>
</td>
						</tr>
						<?php $_smarty_tpl->tpl_vars["cant_total_residuos"] = new Smarty_Variable(((string)($_smarty_tpl->tpl_vars['cant_total_residuos']->value+$_smarty_tpl->tpl_vars['MHIJO_RESIDUO']->value->cantidad_real)), null, 0);?>
					<?php
$_smarty_tpl->tpl_vars['MHIJO_RESIDUO'] = $foreach_MHIJO_RESIDUO_Sav;
}
?>
				<?php
$_smarty_tpl->tpl_vars['MHIJO'] = $foreach_MHIJO_Sav;
}
?>
				<tr>
					<td><b>Total</b></td>
					<td>&nbsp;</td>
					<td><b><?php echo $_smarty_tpl->tpl_vars['cant_total_residuos']->value;?>
</b></td>
					<td colspan="2">&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</div>
<?php }?>


<!-- hidden fields with usefull data -->
<input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
" />

<div align="right" id="acciones"><br />
	<button type="button" class="btn btn-success btn-sm" id='btn_aceptar_1' onclick="confirmarRecepcion($(this));" data-loading-text="Procesando..." class="btn btn-primary" autocomplete="off">Confirmar</button>
	<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
</div>

<?php echo '<script'; ?>
>

function confirmarRecepcion(objButton)
{
	var id_manifiesto = $("input#id").val();
	var residuos_relacion_id = new Array();
	var residuos_manifiesto_cantidad_real = new Array();

	objButton.button('loading');

	$('#lista_residuos').find("input[name^='cant_real_manifiesto_']").each(function(index, value){
		obj = $(value);
		residuos_relacion_id.push(obj.attr('name').substr(21));
		residuos_manifiesto_cantidad_real.push(obj.val());
	});

	$.ajax({
		type: "POST",
		url: mel_path+"/operacion/operador/recibir_manifiesto.php",
		data: {
			id: id_manifiesto,
			residuos: residuos_relacion_id,
			residuos_cantidades_reales: residuos_manifiesto_cantidad_real,
		},
		dataType: "text json",
		success: function(retorno) {
			objButton.button('reset');
			if (retorno['estado'] != 0) {
				// alert(retorno['errores']['general']);
				mostrarMensaje("exclamation-triangle",retorno['errores']['general'],"error");
			} else {
				$('#mel_popup_title').hide();
				$('#mel_popup_body').hide();
				$('#mel_popup_content').hide();
				mostrarMensaje("exclamation-triangle","Recepci&oacute;n confirmada","success");
				location.reload();
			}
		}
	});
}


<?php echo '</script'; ?>
>
<?php }
}
?>