<?php /* Smarty version 3.1.27, created on 2016-03-16 11:46:05
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/ajax/ajax_obtener_informacion_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:76294751056e971adaf7154_14380356%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6885d14c77df8276adbd23af1efdd88a9713d357' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/ajax/ajax_obtener_informacion_manifiesto.tpl',
      1 => 1454610791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76294751056e971adaf7154_14380356',
  'variables' => 
  array (
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'GENERADOR' => 0,
    'TRANSPORTISTAS' => 0,
    'TRANSPORTISTA' => 0,
    'VEHICULOS' => 0,
    'VEHICULO' => 0,
    'OPERADORES' => 0,
    'OPERADOR' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56e971adc2f4f3_63731453',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e971adc2f4f3_63731453')) {
function content_56e971adc2f4f3_63731453 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '76294751056e971adaf7154_14380356';
?>
<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">General</p>
	<table class="table table-hover table-striped">
		<tr>
			<td>ID Operaci&oacute;n</td>
			<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['ID'];?>
</td>
		</tr>
		<tr>
			<td>Protocolo</td>
			<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO'];
$_tmp1=ob_get_clean();
if ($_tmp1) {
echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO']);
} else { ?>-<?php }?></td>
		</tr>
		<tr>
			<td>Tipo</td>
			<td><?php echo obtener_tipo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO']);?>
</td>
		</tr>
		<tr>
			<td>Fecha creaci&oacute;n</td>
			<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_CREACION'];?>
</td>
		</tr>
		<tr>
			<td>Est.creador</td>
			<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['CREADOR']['NOMBRE_ESTABLECIMIENTO'];?>
 (<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['CREADOR']['CUIT'];?>
)</td>
		</tr>
		<tr>
			<td>Fecha aceptaci&oacute;n</td>
			<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_ACEPTACION'];
$_tmp2=ob_get_clean();
if ($_tmp2) {
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_ACEPTACION'];
} else { ?>-<?php }?></td>
		</tr>
		<tr>
			<td>Fecha recepci&oacute;n</td>
			<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_RECEPCION'];
$_tmp3=ob_get_clean();
if ($_tmp3) {
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_RECEPCION'];
} else { ?>-<?php }?></td>
		</tr>
		<tr>
			<td>Fecha tratamiento</td>
			<td><?php ob_start();
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_TRATAMIENTO'];
$_tmp4=ob_get_clean();
if ($_tmp4) {
echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_TRATAMIENTO'];
} else { ?>-<?php }?></td>
		</tr>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Generadores</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
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
$_smarty_tpl->tpl_vars['KEY'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['KEY']->value => $_smarty_tpl->tpl_vars['GENERADOR']->value) {
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
					<td colspan="6">Resoluci&oacute;n 544/94</td>
				<?php }?>
			<?php
}
?>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Transportistas</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['TRANSPORTISTAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TRANSPORTISTA']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value) {
$_smarty_tpl->tpl_vars['TRANSPORTISTA']->_loop = true;
$foreach_TRANSPORTISTA_Sav = $_smarty_tpl->tpl_vars['TRANSPORTISTA'];
?>
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
			<?php
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = $foreach_TRANSPORTISTA_Sav;
}
?>
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example" id="tabla_vehiculos">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Veh&iacute;culos Asignados</p>
	<table class="table table-hover table-striped" id="lista_vehiculos">
		<thead>
			<tr>
				<td class="invisible">Id</td>
				<td>Dominio</td>
				<td>Tipo</td>
				<td>Tipo Caja</td>
				<td>Descripci&oacute;n</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['VEHICULOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
				<tr>
					<td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td>
					<td><i class="fa fa-truck fa-2x"></i></td>	
				</tr>
			<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
if (!$_smarty_tpl->tpl_vars['VEHICULO']->_loop) {
?>
				<tr>
					<td id="vehiculos_no_asignados" colspan="6">A&uacute;n no se han asignado veh&iacute;culos.</td>
				</tr>
			<?php
}
?>
		</tbody>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Nombre</td>
				<td>Domicilio</td>
				<td>Expediente</td>
				<td>Cuit</td>
				<td>Caa</td>
			</tr>
		</thead>
		<tbody>
			<?php
$_from = $_smarty_tpl->tpl_vars['OPERADORES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['OPERADOR'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['OPERADOR']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['OPERADOR']->value) {
$_smarty_tpl->tpl_vars['OPERADOR']->_loop = true;
$foreach_OPERADOR_Sav = $_smarty_tpl->tpl_vars['OPERADOR'];
?>
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
			<?php
$_smarty_tpl->tpl_vars['OPERADOR'] = $foreach_OPERADOR_Sav;
}
?>
		</tbody>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
		<thead>
			<tr>
				<td>Tipo Cont.</td>
				<td>Cantidad Cont.</td>
				<td>Residuo</td>
				<td>Cantidad Est.</td>
				<td>Unidad</td>
				<td>Estado</td>
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
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR_'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['UNIDAD_'];?>
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


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
	<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" disabled><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OBSERVACIONES'];?>
</textarea>
</div>
<?php }
}
?>