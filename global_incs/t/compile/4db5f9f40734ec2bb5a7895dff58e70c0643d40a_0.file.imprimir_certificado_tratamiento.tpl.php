<?php /* Smarty version 3.1.27, created on 2015-11-20 10:29:33
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/imprimir_certificado_tratamiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:629776140564f203d2171c9_06039435%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4db5f9f40734ec2bb5a7895dff58e70c0643d40a' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/imprimir_certificado_tratamiento.tpl',
      1 => 1445284233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '629776140564f203d2171c9_06039435',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'MANIFIESTO' => 0,
    'OPERADORES' => 0,
    'OPERADOR' => 0,
    'TRANSPORTISTAS' => 0,
    'TRANSPORTISTA' => 0,
    'GENERADORES' => 0,
    'GENERADOR' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f203d3281e9_62415007',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f203d3281e9_62415007')) {
function content_564f203d3281e9_62415007 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '629776140564f203d2171c9_06039435';
?>
<div style="width: 880px;margin:auto;border:2px solid #dcdbd6;padding:10px;">


	<div id="container">
		<div style="float:left;margin-left:30px;width:70px;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_impresion.gif" />
		</div>
		<div style="float:left;margin-top:29px;"><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
	</div>
	<div style="clear:both;"></div>
	
	<div style="text-align:center;font-size: 14px;margin-top:20px;">
		<strong>CERTIFICADO DE TRATAMIENTO DE RESIDUOS PELIGROSOS</strong>
	</div>

	<div style="margin:20px 30px 0px 30px;border:1px solid black;padding: 10px;font-size: 11px;">
		<b>Manifiesto Nro <?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value['NUMERO_PROTOCOLO']);?>
</b>
	</div>
	
	<div style="width: 30px;clear: both;height: 15px;"></div>


	<table style="margin:10px 30px 10px 30px;width:100%;border-collapse:collapse;font-size:12px;text-align:center;">
	
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
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;width:20%;">Establecimiento</td>
				<td style="border:1px solid black;width:40%;">Empresa</td>
				<td style="border:1px solid black;width:40%;">Domicilio</td>
			</tr>
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Operador</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['OPERADOR'] = $foreach_OPERADOR_Sav;
}
?>

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
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Transportista</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['TRANSPORTISTA'] = $foreach_TRANSPORTISTA_Sav;
}
?>

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
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;">Generador</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['PISO'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['GENERADOR'] = $foreach_GENERADOR_Sav;
}
?>

	</table>
	<div style="clear:both;"></div>


	<div style="margin-left:30px;font-size:12px;margin-top:20px;">
		El d&iacute;a <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value['FECHA_TRATAMIENTO'];?>
 ha finalizado el tratamiento de los residuos. Los mismos fueron sometidos a:
	</div>
	<div style="clear:both;"></div>


	<table style="margin:10px 30px 10px 30px;width:100%;border-collapse:collapse;font-size:12px;text-align:center;">

		<tr style="border:1px solid black; height: 35PX;">
			<td style="border:1px solid black;">CSC</td>
			<td style="border:1px solid black;">Descripci&oacute;n</td>
			<td style="border:1px solid black;">Contenedor</td>
			<td style="border:1px solid black;">Cantidad real</td>
			<td style="border:1px solid black;">Tratamiento</td>
			<td style="border:1px solid black;">Fecha Tratamiento</td>
		</tr>

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
			<tr style="border:1px solid black; height: 35PX;">
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO_'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_REAL'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['TRATAMIENTO'];?>
</td>
				<td style="border:1px solid black;"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['FECHA_TRATAMIENTO']->format('Y-m-d');?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>

	</table>

	<div style="margin:70px 0px 0px 30px;font-size:12px;">
		....................................<br/>
		Firma y sello operador
	</div>
	<div style="clear:both;"></div>

</div><?php }
}
?>