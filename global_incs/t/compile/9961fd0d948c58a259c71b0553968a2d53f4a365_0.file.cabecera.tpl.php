<?php /* Smarty version 3.1.27, created on 2016-02-05 14:51:11
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/cabecera.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:100735498656b4e10f8f50b0_71610768%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9961fd0d948c58a259c71b0553968a2d53f4a365' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/cabecera.tpl',
      1 => 1443651967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100735498656b4e10f8f50b0_71610768',
  'variables' => 
  array (
    'EMPRESA' => 0,
    'ESTABLECIMIENTO' => 0,
    'ESTADISTICAS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e10f972252_42862209',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e10f972252_42862209')) {
function content_56b4e10f972252_42862209 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '100735498656b4e10f8f50b0_71610768';
?>

<?php echo actualizar_estadisticas_del_usuario();?>


<!-- DATOS DE LA EMPRESA -->
<div id="recuadro-datos-empresa" style="font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;font-size:12px;">
	<div class="sub_containers_cabecera borde-redondeado" align="left">
		<strong>Empresa:</strong>
		<br />
		<strong>CUIT :</strong> <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>
<br />
		<strong>Raz&oacute;n social : </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NOMBRE'];?>
<br />
		<strong>Establecimiento: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
<br />
	</div>

	<div class="sub_containers_cabecera borde-redondeado" align="left" style="margin-top:10px;">
		<strong>Certificado:</strong><br />
		<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO']) {?>
			<b>Nro:&nbsp;</b><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
<br />
			<b>Vencimiento:&nbsp;</b> <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
 <b>(<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO_DIAS'];?>
 d&iacute;as) </b>.
		<?php } else { ?>
			No disponible.
		<?php }?>
	</div>
</div>

<!-- ESTADISTICAS -->
<div id="recuadro-datos-totales" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;width:560px;">

	<div class="borde-redondeado sub_containers_cabecera">
		<div align="left" style=" padding-left:10px">
			<b>Estad&iacute;sticas Manifiestos:</b>
		</div>

		<div class="recuado_estadisticas" style="background-color:#9FD4DB;">
			Creados:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_CREADOS'];?>
</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#E9DB60;">
			Pendientes:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_PENDIENTES'];?>
</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#43a775;">
			Aprobados:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_ACEPTADOS'];?>
</span>
		</div>

		<br />

		<div class="recuado_estadisticas" style="background-color:#8C97C3;">
			Recibidos:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_RECIBIDOS'];?>
</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#FFA23E;">
			Finalizados:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_FINALIZADOS'];?>
</span>
		</div>

		<div class="recuado_estadisticas" style="background-color:#E95E51;">
			Rechazados:
			<span><?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['MANIFIESTOS_RECHAZADOS'];?>
</span>
		</div>
	</div>

	<div class="borde-redondeado sub_containers_cabecera" style="margin-top:10px;text-align:left;">
		<b>Manifiestos disponibles:</b> <?php echo $_smarty_tpl->tpl_vars['ESTADISTICAS']->value['FORMULARIOS_DISPONIBLES'];?>

	</div>

</div>


<!-- MENSAJERIA -->

</div>

<div style="height: 7px;width: 10px;clear: both;"></div>
	<?php }
}
?>