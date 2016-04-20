<?php /* Smarty version 3.1.27, created on 2016-02-04 15:23:02
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail3.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:169848111456b397063cdf31_16932067%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd263390ead0fa4f9af80fc55d4a046e6906ad4e' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/mail/mail3.tpl',
      1 => 1454610090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '169848111456b397063cdf31_16932067',
  'variables' => 
  array (
    'id_protocolo_manifiesto' => 0,
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'GENERADOR' => 0,
    'TRANSPORTISTAS' => 0,
    'TRANSPORTISTA' => 0,
    'OPERADORES' => 0,
    'OPERADOR' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b397065cc4d4_07951077',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b397065cc4d4_07951077')) {
function content_56b397065cc4d4_07951077 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '169848111456b397063cdf31_16932067';
?>
<p>Por medio del presente la Secretaría de Ambiente y Desarrollo Sustentable de la Nación le informa que el Manifiesto Electrónico NRO <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['id_protocolo_manifiesto']->value);?>
 ha sido aprobada por todas las partes.</p>

<p>El mismo tiene a partir del día de la fecha, 30 días para su vencimiento. En caso de no poder completar el circuito dentro de ese plazo, él mismo vencerá y deberá realizar un nuevo manifiesto.</p>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Informaci&oacute;nGeneral</p>
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
				<td>Nombre</td>
				<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE'];?>
</td>
			</tr>
			<tr>
				<td>Domicilio</td>
				<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['PISO'];?>
</td>
			</tr>
			<tr>
				<td>Expediente</td>
				<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
			</tr>
			<tr>
				<td>Cuit</td>
				<td><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CUIT'];?>
</td>
			</tr>
			<tr>
				<td>Caa</td>
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
				<td>Nombre</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE'];?>
</td>
			</tr>
			<tr>
				<td>Domicilio</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO'];?>
</td>
			</tr>
			<tr>
				<td>Expediente</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_ANIO'];?>
</td>
			</tr>
			<tr>
				<td>Cuit</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CUIT'];?>
</td>
			</tr>
			<tr>
				<td>Caa</td>
				<td><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_VENCIMIENTO'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = $foreach_TRANSPORTISTA_Sav;
}
?>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Operador</p>
	<table class="table table-hover table-striped">
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
		<tr>
			<td>Nombre</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
</td>
		</tr>
		<tr>
			<td>Domicilio</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO'];?>
</td>
		</tr>
		<tr>
			<td>Expediente</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
		</tr>
		<tr>
			<td>Cuit</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CUIT'];?>
</td>
		</tr>
		<tr>
			<td>Caa</td>
			<td><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_NUMERO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
		</tr>
		<?php
$_smarty_tpl->tpl_vars['OPERADOR'] = $foreach_OPERADOR_Sav;
}
?>
	</table>
</div>

<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Residuos</p>
	<table class="table table-hover table-striped">
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
				<td>Tipo Cont.</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR_'];?>
</td>
			</tr>
			<tr>
				<td>Cantidad Cont.</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
			</tr>
			<tr>
				<td>Residuo</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
			</tr>
			<tr>
				<td>Cantidad Est.</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
			</tr>
			<tr>
				<td>Unidad</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['UNIDAD_'];?>
</td>
			</tr>
			<tr>
				<td>Estado</td>
				<td><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO_'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
	</table>
</div>


<div class="table-responsive bs-example">
	<p class="bg-info" style="font-size:13px;font-weight:bold;padding:7px;">Observaciones</p>
	<textarea class="form-control" rows="3" id="observaciones_manifiesto" name="observaciones_manifiesto" disabled><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['OBSERVACIONES'];?>
</textarea>
</div>

<p>Ante cualquier inconveniente o eventualidad le rogamos se ponga en contacto con la Dirección de Residuos Peligrosos a <a href='mailto:drp@ambiente.gob.ar'>drp@ambiente.gob.ar</a></p>

<?php echo $_smarty_tpl->getSubTemplate ('mail/firma_mails.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);

}
}
?>