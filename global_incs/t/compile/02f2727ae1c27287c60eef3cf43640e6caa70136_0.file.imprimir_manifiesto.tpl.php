<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:47
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/imprimir_manifiesto.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1441371814564f1f97591742_52340697%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02f2727ae1c27287c60eef3cf43640e6caa70136' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/imprimir_manifiesto.tpl',
      1 => 1445954881,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1441371814564f1f97591742_52340697',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'CODIGO' => 0,
    'FECHA_EMISION' => 0,
    'FECHA_VENCIMIENTO' => 0,
    'ES_SLOP_RELACIONADO' => 0,
    'PROTOCOLO_SLOP_PADRE' => 0,
    'MANIFIESTO' => 0,
    'GENERADORES' => 0,
    'TRANSPORTISTA' => 0,
    'OPERADOR' => 0,
    'VEHICULO' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
    'ES_SLOP_BARCAZA_CABECERA' => 0,
    'index' => 0,
    'GENERADOR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f977f5494_75267995',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f977f5494_75267995')) {
function content_564f1f977f5494_75267995 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1441371814564f1f97591742_52340697';
?>

<style type="text/css">
.td {border:1px solid black;}
.center {text-align: center;}
.seccion_tabla {border-collapse:collapse;margin-top: 25px;border:1px solid black;margin:auto;width:880px;font-size: 15px;}
</style>


<div style="width:880px;margin:auto;border:2px solid #dcdbd6;font-family:calibri,Verdana,Arial;padding:10px;">

	<div id="container">
		<div style="float:left;margin-left:30px;width:70px;">
			<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_impresion.gif" />
		</div>
		<div style="float:left;margin-top:29px;"><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
	</div>
	<div style="clear:both;"></div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;width:500px;">Manifiesto Ley 24.051</div>
		<div style="float:right;border:1px solid #dcdbd6;padding:3px;"><b>Nro <?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
</b></div>
	</div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;"><b>Fecha de Emisi&oacute;n</b>: <?php echo $_smarty_tpl->tpl_vars['FECHA_EMISION']->value;?>
</div>
	</div>

	<div style="font-size:12px;margin-bottom:5px;">
		<div style="float:left;"><b>Fecha de Vencimiento</b>: <?php echo $_smarty_tpl->tpl_vars['FECHA_VENCIMIENTO']->value;?>
</div>
	</div>

	<?php if (isset($_smarty_tpl->tpl_vars['ES_SLOP_RELACIONADO']->value) && $_smarty_tpl->tpl_vars['ES_SLOP_RELACIONADO']->value == 'true') {?>
		<div style="font-size:12px;margin-bottom:5px;">
			<div style="float:left;">Esta manifiesto est&aacute; vinculado al manifiesto Nro <b><?php echo $_smarty_tpl->tpl_vars['PROTOCOLO_SLOP_PADRE']->value;?>
</b></div>
		</div>
	<?php }?>

	<!-- DATOS IDENTIFICATORIOS -->
	<table class="seccion_tabla">

		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="7" style="text-align:center;font-weight:bold;">Datos Identificatorios</td>
		</tr>
		<tr>
			<td class="td">&nbsp;</td>
			<td colspan="2" class="td center">Generador</td>
			<td colspan="2" class="td center">Transportista</td>
			<td colspan="2" class="td center">Operador</td>
		</tr>
		<tr>
			<td class="td">Nombre</td>
			
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::MULTIPLE) {?>
				<td colspan="2" rowspan="5" class="td center">Ver al dorso</td>
			<?php } elseif ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::SIMPLE_RES_544_94) {?>
				<td colspan="2" rowspan="5" class="td center">Resoluci&oacute;n 544/94</td>
			<?php } else { ?>
				<td colspan="2" class="td center">Empresa:&nbsp;<?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['NOMBRE_EMPRESA'];?>
<br><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SLOP) {?>Establecimiento:&nbsp;<?php } else { ?>Buque:&nbsp;<?php }?> <?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['NOMBRE'];?>
</td>
			<?php }?>

			<td colspan="2" class="td center">Empresa:&nbsp;<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE_EMPRESA'];?>
<br>Establecimiento:&nbsp;<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NOMBRE'];?>
</td>
			<td colspan="2" class="td center">Empresa:&nbsp;<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE_EMPRESA'];?>
<br>Establecimiento:&nbsp;<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NOMBRE'];?>
</td>
		</tr>
		<tr>
			<td class="td">Domicilio Planta</td>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::MULTIPLE && $_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SIMPLE_RES_544_94) {?>
				<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['PISO'];?>
</td>
			<?php }?>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO'];?>
</td>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO'];?>
</td>
		</tr>
		<tr>
			<td class="td">Expediente</td>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::MULTIPLE && $_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SIMPLE_RES_544_94) {?>
				<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['EXPEDIENTE_ANIO'];?>
</td>
			<?php }?>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['EXPEDIENTE_ANIO'];?>
</td>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_NUMERO'];?>
/<?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['EXPEDIENTE_ANIO'];?>
</td>
		</tr>
		<tr>
			<td class="td">CUIT</td>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::MULTIPLE && $_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SIMPLE_RES_544_94) {?>
				<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['CUIT'];?>
</td>
			<?php }?>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CUIT'];?>
</td>
			<td colspan="2" class="td center"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CUIT'];?>
</td>
		</tr>
		<tr>
			<td class="td">C.A.A.</td>
			<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::MULTIPLE && $_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] != TipoManifiesto::SIMPLE_RES_544_94) {?>
				<td class="td center">Nro: <?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['CAA_NUMERO'];?>
</td>
				<td class="td center">Vto: <?php echo $_smarty_tpl->tpl_vars['GENERADORES']->value[0]['CAA_VENCIMIENTO'];?>
</td>
			<?php }?>
			<td class="td center">Nro: <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_NUMERO'];?>
</td>
			<td class="td center">Vto: <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CAA_VENCIMIENTO'];?>
</td>
			<td class="td center">Nro: <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_NUMERO'];?>
</td>
			<td class="td center">Vto: <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CAA_VENCIMIENTO'];?>
</td>
		</tr>
	</table>
	<br />

	<!-- VEHICULOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="2" style="text-align:center;font-weight:bold;">Veh&iacute;culo</td>
		</tr>
		<tr>
			<td class="td center">Nro Patente / Matr&iacute;cula</td>
			<td class="td center">Tipo de Veh&iacute;culo</td>
			<td class="td center">Tipo de Caja</td>
		</tr>
		
		<?php
$_from = $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['VEHICULOS'];
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
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>

	</table>
	<br />

	<!-- RESIDUOS -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="6" style="text-align:center;font-weight:bold;">Informaci&oacute;n de Residuos</td>
		</tr>
		<tr>
			<td colspan="2" class="td center">Contenedores</td>
			<td rowspan="2" class="td center">CSC</td>
			<td rowspan="2" class="td center">Descripci&oacute;n</td>
			<td rowspan="2" class="td center">Peligrosidad</td>
			<td rowspan="2" class="td center">Cant.<br>(estimada)</td>
			<td rowspan="2" class="td center">Cant.<br>(real)</td>
			<td rowspan="2" class="td center">Estado</td>
		</tr>
		<tr>
			<td class="td center">Tipo</td>
			<td class="td center">Cantidad</td>
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
			 <tr>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CONTENEDOR'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_CONTENEDORES'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['RESIDUO_'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['PELIGROSIDAD'];?>
</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_ESTIMADA'];?>
</td>
				<td class="td center">
					<?php if ($_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_REAL'] == '') {?>
						&nbsp;
					<?php } else { ?>
						<?php if (!isset($_smarty_tpl->tpl_vars['ES_SLOP_BARCAZA_CABECERA']->value)) {?>
							<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CANTIDAD_REAL'];?>

						<?php } else { ?>
							&nbsp;
						<?php }?>
					<?php }?>
				</td>
				<td class="td center"><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['ESTADO_'];?>
</td>
			</tr>
		<?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
		
	</table>
	<br />

	<!-- INFORMACION DE EMERGENCIA -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="3" style="text-align:center;font-weight:bold;">Informaci&oacute;n de emergencia</td>
		</tr>
		<tr>
			<td class="td center">&nbsp;</td>
			<td class="td center">Operador</td>
			<td class="td center">Transportista</td>
		</tr>
		<tr>
			<td class="td center">Tel&eacute;fono</td>
			<td class="td center"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO_TELEFONICO'];?>
</td>
			<td class="td center"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO_TELEFONICO'];?>
</td>
		</tr>
		<tr>
			<td class="td center">Observaci&oacute;n</td>
			<td class="td center"><?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['CALLE_C'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['NUMERO_C'];?>
 <?php echo $_smarty_tpl->tpl_vars['OPERADOR']->value['PISO_C'];?>
</td>
			<td class="td center"><?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['CALLE_C'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['NUMERO_C'];?>
 <?php echo $_smarty_tpl->tpl_vars['TRANSPORTISTA']->value['PISO_C'];?>
</td>
		</tr>
	</table>
	<br />

	<!-- CERTIFICACION -->
	<table class="seccion_tabla">
		<tr style="border:1px solid black;background-color:#E7E7E7;">
			<td colspan="4" style="text-align:center;font-weight:bold;">Certificaci&oacute;n</td>
		</tr>
		<tr>
			<td class="td center">&nbsp;</td>
			<td class="td center">Generador</td>
			<td class="td center">Operador</td>
			<td class="td center">Transportista</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Firma</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Aclaraci&oacute;n</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
		<tr>
			<td class="td center" style="height:50px;">Fecha</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
			<td class="td center" style="height:50px;">&nbsp;</td>
		</tr>
	</table>
	<br />

	<!-- DECLARACION JURADA -->
	<div style="text-align: left;font-size:12px;border: 1px solid black;padding:5px;">
		<strong>Declaraci&oacute;n Jurada: Certificaci&oacute;n del Generador</strong>
		<div style="text-align: left;font-size:12px;">Declaro bajo juramento, que la informaci&oacute;n y los datos manifestados en el presente, son veraces y se ajustan a la legislaci&oacute;n vigente en la materia.</div>
	</div>


	<!-- Los Manifiestos Múltiples tiene un dorso -->
	<?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value['TIPO_MANIFIESTO'] == TipoManifiesto::MULTIPLE) {?>
		<pagebreak />

		<div id="container">
			<div style="float:left;margin-left:30px;width:70px;">
				<img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_impresion.gif" />
			</div>
			<div style="float:left;margin-top:29px;"><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE</strong></div>
		</div>
		<div style="clear:both;"></div>

		<div style="font-size:12px;margin-bottom:5px;">
			<div style="float:left;width:500px;">Manifiesto Ley 24.051</div>
			<div style="float:right;"><b>Nro <?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
</b></div>
		</div>

		<!-- GENERADORES DORSO MANIFIESTO MULTIPLE -->
		<!-- DATOS IDENTIFICATORIOS -->
		<table class="seccion_tabla">
			<tr style="border:1px solid black;background-color:#E7E7E7;">
				<td colspan="7" style="text-align:center;font-weight:bold;">Informaci&oacute;n de Generadores</td>
			</tr>
			<tr>
				<td class="td center">Orden</td>
				<td class="td center">CUIT</td>
				<td class="td center">Nombre</td>
				<td class="td center">Domicilio Planta</td>
				<td class="td center">Localidad</td>
				<td class="td center">Correo Electr&oacute;nico</td>
				<td class="td center">Cantidad<br/>(estimada)</td>
			</tr>

			<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable(1, null, 0);?>
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
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['index']->value;?>
</td>
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CUIT'];?>
</td>
					<td class="td center">Empresa:&nbsp;<?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE_EMPRESA'];?>
<br>Establecimiento:&nbsp;<?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NOMBRE'];?>
</td>
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CALLE'];?>
 Nro <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['NUMERO'];?>
. Piso: <?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['PISO'];?>
</td>
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['LOCALIDAD'];?>
</td>
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['EMAIL'];?>
</td>
					<td class="td center"><?php echo $_smarty_tpl->tpl_vars['GENERADOR']->value['CANT_RESIDUO'];?>
</td>
				</tr>
				<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable($_smarty_tpl->tpl_vars['index']->value+1, null, 0);?>
			<?php
$_smarty_tpl->tpl_vars['GENERADOR'] = $foreach_GENERADOR_Sav;
}
?>
		</table>
	<?php }?>

</div>

<?php echo '<script'; ?>
>



<?php echo '</script'; ?>
><?php }
}
?>