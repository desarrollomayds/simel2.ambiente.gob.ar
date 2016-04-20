<?php /* Smarty version 3.1.27, created on 2016-03-28 17:31:41
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_registro_pendiente.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18710427856f994ad5ec841_02662139%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e463d0fb16fa5886ff89d348ebc0f0ae87e9e69' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/edit_registro_pendiente.tpl',
      1 => 1443651964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18710427856f994ad5ec841_02662139',
  'variables' => 
  array (
    'ROL_ID' => 0,
    'EMPRESA' => 0,
    'REPRESENTANTE' => 0,
    'ESTABLECIMIENTO' => 0,
    'PERMISO' => 0,
    'TRAT' => 0,
    'VEHICULO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f994adb85c17_53435217',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f994adb85c17_53435217')) {
function content_56f994adb85c17_53435217 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '18710427856f994ad5ec841_02662139';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>"true"), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>"true"), 0);
?>

</head>

<body style="padding-top:60px;">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_registros_pendientes.php">Registraciones Pendientes</a></li>
				<li class="active">Solicitud de Registro</li>
			</ol>
			<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
			<div class="row">
				<div class="col-xs-12">
					<div id="registro-cuerpo">
						<div class="row">
							<div class="col-md-8">
								<h2>INFORMACI&Oacute;N</h2>
							</div>
							<div class="col-md-4 text-right">
								<button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
								<button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i> Descargar</button>
								<button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
							</div>
						</div>
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#Datos" aria-controls="Datos" role="tab" data-toggle="tab">Datos de la empresa</a></li>
							<li role="presentation"><a href="#Establecimiento" aria-controls="Establecimiento" role="tab" data-toggle="tab" id="linkEst">Establecimiento</a></li>
						</ul>
						<div class="tab-content">
							<div role="tabpanel" class="bs-example tab-pane tabUnique active" id="Datos">
								<div class="bs-example">
									<p>
										<strong>Cuit: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>

										<br>
										<strong>Roles: </strong>
										<?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['GENERADOR']) {?> Generador <?php }?> <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['TRANSPORTISTA']) {?> Transportista <?php }?> <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['OPERADOR']) {?> Operador <?php }?>
										<br>
										<strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NOMBRE'];?>

										<br>
										<strong>Fec. Ini. Act: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/fecinact" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>
</span>
										<br>
										<strong>N&uacute;mero Telef&oacute;nico: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/telef" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>
</span>
									</p>
									<hr>
									<div class="row">
										<div class="col-md-4">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrecalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrenum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrepiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrreofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr1" data-name="Emp/pro1" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_'];?>
</span>
											<?php echo '<script'; ?>
>var arr1 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr2" data-name="Emp/loca1" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_'];?>
</span>
											<?php echo '<script'; ?>
>var arr2 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrrecp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL'];?>
</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlecalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlenum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlepiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrleofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr3" data-name="Emp/pro2" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_'];?>
</span>
											<?php echo '<script'; ?>
>var arr3 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr4" data-name="Emp/loca2" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_'];?>
</span>
											<?php echo '<script'; ?>
>var arr4 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrlecp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_L'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_L'];?>
</span>
										</div>
										<div class="col-md-4">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcocalle" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
</span>&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrconum" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
</span>&nbsp;
											<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcopiso" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
</span>&nbsp;
											<strong>Oficina: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcoofi" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
</span>&nbsp;
											<br>
											<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr5" data-name="Emp/pro3" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_'];?>
</span>
											<?php echo '<script'; ?>
>var arr5 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-array="1" data-values="arr6" data-name="Emp/loca3" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_'];?>
</span>
											<?php echo '<script'; ?>
>var arr6 = <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_ARR'];?>
;<?php echo '</script'; ?>
>
											<br>
											<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
" data-name="Emp/domrcocp" data-id="<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CODIGO_POSTAL_C'];?>
</span>
										</div>
									</div>
								</div>
								<br>
								<p class="registro-titulo bg-info">Representante Legal</p>
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['REPRESENTANTES_LEGALES'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['REPRESENTANTE']->value) {
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = true;
$foreach_REPRESENTANTE_Sav = $_smarty_tpl->tpl_vars['REPRESENTANTE'];
?>
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/nom" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</span>
										<br>
										<strong>Apellido: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/ape" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/fn" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-array="1" data-values="tdni1" data-name="RL/tdni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</span>
										<?php echo '<script'; ?>
>var tdni1 = <?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ARR'];?>
;<?php echo '</script'; ?>
>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/dni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</span>
										<br>
										<strong>Cuit: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RL/cuit" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</span>
									</p>
								</div>
								<br> <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>
								<p class="registro-titulo bg-info">Representante T&eacute;cnico</p>
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['REPRESENTANTES_TECNICOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['REPRESENTANTE']->value) {
$_smarty_tpl->tpl_vars['REPRESENTANTE']->_loop = true;
$foreach_REPRESENTANTE_Sav = $_smarty_tpl->tpl_vars['REPRESENTANTE'];
?>
								<div class="bs-example">
									<p>
										<strong>Nombre: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/nom" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</span>
										<br>
										<strong>Apellido: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/ape" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</span>
										<br>
										<strong>Fecha de nacimiento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/fn" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</span>
										<br>
										<strong>Tipo de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-array="1" data-values="tdni2" data-name="RT/tdni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</span>
										<?php echo '<script'; ?>
>var tdni2 = <?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_ARR'];?>
;<?php echo '</script'; ?>
>
										<br>
										<strong>N&uacute;mero de documento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/dni" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</span>
										<br>
										<strong>Cargo: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/cargo" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
</span>
										<br>
										<strong>Cuit: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['ID'];?>
" data-name="RT/cuit" data-id="<?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>

									</p>
								</div>
								<br> <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>
							</div>
							<div role="tabpanel" class="bs-example tab-pane tabUnique" id="Establecimiento">
								<ul class="nav nav-tabs js-mupe">
								<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['ESTABLECIMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value) {
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = true;
$foreach_ESTABLECIMIENTO_Sav = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO'];
?>
									<li><a  href="#subt_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" role="tab" data-toggle="tab"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</a></li>
								<?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>
								</ul>
								<div class="tab-content">
									<?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value['ESTABLECIMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value) {
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = true;
$foreach_ESTABLECIMIENTO_Sav = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO'];
?>
									<div role="tabpanel" class="bs-example tab-pane tabUnique" id="subt_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
">
										<p>
											<strong>Nombre: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/nomb" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</span>
											<br>
											<strong>Tipo: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO_'];?>

											<br>
											<strong>Usuario: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO'];?>

											<h3 class="bg-warning">
												<strong>CAA: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/caanu" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
</span>
												<strong>Vencimiento: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/caaven" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
</span>
											 </h3>
										</p>
										<h3 class="bg-warning">
											<strong>Expediente: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/exnu" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
</span>
											<strong>A&ntilde;o: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/exanio" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
</span>
										</h3>
										<strong>Actividad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-type="textarea" data-name="Est/act" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD_'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD_'];?>
</span>
										<br>
										<strong>Descripci&oacute;n: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-type="textarea" data-name="Est/desc" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</span>
										<br>
										<strong>Direcci&oacute;n Email: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/email" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EMAIL'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EMAIL'];?>
</span>

										<hr>
										<div class="row">
											<div class="col-md-4">
												<strong>Domicilio real</strong>
												<br>
												<br>
												<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/recalle" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
</span>
												<br>
												<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/renum" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
</span>
												<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/repiso" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
</span>
												<br>
												<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-array="1" data-values="reprov<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/reprov" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_'];?>
</span>
												<?php echo '<script'; ?>
>var reprov<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
 = <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_ARR'];?>
;<?php echo '</script'; ?>
>
												<br>
												<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-array="1" data-values="reloc<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/reloca1" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_'];?>
</span>
												<?php echo '<script'; ?>
>var reloc<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
 = <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_ARR'];?>
;<?php echo '</script'; ?>
>
												<br>
												<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/recp" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL'];?>
</span>
											</div>
											<div class="col-md-4">
												<strong>Domicilio constituido</strong>
												<br>
												<br>
												<strong>Calle: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/cacalle" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
</span>
												<br>
												<strong>N&uacute;mero: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/canum" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
</span>
												<strong>Piso: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/capiso" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
</span>
												<br>
												<strong>Provincia: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-array="1" data-values="caprov<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/caprov" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_'];?>
</span>
												<?php echo '<script'; ?>
>var caprov<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
 = <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_ARR'];?>
;<?php echo '</script'; ?>
>
												<br>
												<strong>Localidad: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-array="1" data-values="caloc<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/caloca1" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_ID'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_'];?>
</span>
												<?php echo '<script'; ?>
>var caloc<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
 = <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_ARR'];?>
;<?php echo '</script'; ?>
>
												<br>
												<strong>C. Postal: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/cacp" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL_C'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL_C'];?>
</span>
											</div>
											<div class="col-md-4">
												<strong>Nomenclatura Catastral: </strong>
												<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/catacir" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'];?>
</span> -
												<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/catasec" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'];?>
</span> -
												<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/cataman" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
</span> -
												<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/catapar" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
</span> -
												<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/catasup" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
</span> &nbsp;&nbsp;&nbsp;&nbsp;
												<br>
												<strong>Habilitaciones: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/nocasub" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUBPARC'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUBPARC'];?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;
											</div>
										</div>
										<br>
										<div id="container_establecimiento_permisos_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
">
											<p class="registro-titulo bg-info">Permisos
												<i class="fa fa-plus-square" style="float:right;cursor:hand;cursor:pointer;"
													onclick="setPermisoEstablecimiento($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
);"
													container="nuevo_permiso_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
"
													data-toggle="modal" data-target="#permisos_popup"></i>
											</p>
											<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PERMISOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
												<div class="bs-example" id="container_residuo_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
">
													<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
													permiso-id="<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
" onclick="borrarPermisoEstablecimiento($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
);" container="container_residuo_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
" title="Borrar Permiso" rol="<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
"></i>
													<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso" onclick="setPermisoEstablecimiento($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
,<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
);" container="container_residuo_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
"
													data-toggle="modal" data-target="#permisos_popup"></i>
													<p>
														<strong>CSC: </strong><span id="callbPerm"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</span>
														<br>
														<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</span>
														<br>
														<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 1) {?>
															<strong>Cantidad: </strong>
															<span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
</span>
															<br> 
														<?php }?>

														<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 3) {?>
															<strong>Tratamientos: </strong>
															<ul>
																<?php
$_from = $_smarty_tpl->tpl_vars['PERMISO']->value['TRATAMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TRAT'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TRAT']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TRAT']->value) {
$_smarty_tpl->tpl_vars['TRAT']->_loop = true;
$foreach_TRAT_Sav = $_smarty_tpl->tpl_vars['TRAT'];
?>
																	<li><?php echo $_smarty_tpl->tpl_vars['TRAT']->value;?>
</li>
																<?php
$_smarty_tpl->tpl_vars['TRAT'] = $foreach_TRAT_Sav;
}
?>
															</ul>
														<?php }?>
													</p>
												</div>
											<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
										</div> <!-- end div container_establecimiento_permisos -->

										<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 2) {?>
										<p class="registro-titulo bg-info">Veh&iacute;culos
											<i class="fa fa-plus-square" style="float:right;cursor:hand;cursor:pointer;"
												onclick="setVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
);"
												container="nuevo_vehiculo" data-toggle="modal" data-target="#vehiculos_popup"></i>
										</p>
											<div id="container_vehiculos_transportista">
												<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['VEHICULOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
													<div class="bs-example vehiculos_establecimiento" id="container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
">
														<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
															vehiculo-id="<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" onclick="borrarVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
);" container="container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" title="Borrar Veh&iacute;culo"></i>

														<i class="fa fa-key" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Agregar Permiso al Veh&iacute;culo" onclick="setPermisoVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
);" container="nuevo_permiso_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-toggle="modal" data-target="#permisos_vehiculos_popup"></i>

														<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Veh&iacute;culo" onclick="setVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
,<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
);" container="container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" data-toggle="modal" data-target="#vehiculos_popup"></i>
														<p>
															<strong>Dominio/Matr&iacute;cula: </strong><span><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</span><br>
															<strong>Tipo veh&iacute;culo: </strong><span><?php echo TipoVehiculo::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO']);?>
</span><br>
															<strong>Tipo caja: </strong><span><?php echo TipoCaja::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA']);?>
</span><br>
															<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</span>
														</p>
													</div> <!-- end of container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
 -->

													<div class="bs-example" id="container_permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" style="    margin-left: 35px;">
														<p class="registro-titulo bg-warning">
															<b>Permisos del Veh&iacute;culo:</b>
														</p>
														<?php
$_from = $_smarty_tpl->tpl_vars['VEHICULO']->value['PERMISOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
															<div class="bs-example permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" id="container_permiso_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
">
																<p>
																<!-- iconos permisos vehiculos -->
																	<i class="fa fa-trash-o" style="float:right;cursor:hand;cursor:pointer;" 
																	vehiculo-id="<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" onclick="borrarPermisoVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
, <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
);" container="container_permiso_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" title="Borrar Permiso Veh&iacute;culo" establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
"></i>

																	<i class="fa fa-pencil" style="float:right;cursor:hand;cursor:pointer;margin-right:10px;" title="Editar Permiso Veh&iacute;culo" onclick="setPermisoVehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
, <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
);" container="container_permiso_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
"
																	establecimiento-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
"
																	data-toggle="modal" data-target="#permisos_vehiculos_popup"></i>

																	<strong>CSC: </strong><span id="callbPerm"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</span><br>
																	<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</span><br>
																	<strong>Cantidad: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
 kg</span><br>
																	<strong>Estado: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ESTADO_'];?>
</span>

																</p>
															</div>
														<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
													</div> <!-- end of container_permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
 -->
												<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
											</div> <!-- end of container_vehiculos_transportista -->
										<?php }?>

									</div>
									<?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>
								</div>
							</div>
						</div>
						<div class="text-right">
							<button type="button" class="btn btn-success validar"><i class="fa fa-check"></i> Validar</button>
							<button type="button" class="btn btn-info descargar"><i class="fa fa-download"></i></i> Descargar</button>
							<button type="button" class="btn btn-warning rechazar"><i class="fa fa-times"></i> Rechazar</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'permisos','HIDDEN_INFO'=>'true'), 0);
?>

			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'vehiculos','HIDDEN_INFO'=>'true'), 0);
?>

			<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'permisos_vehiculos','HIDDEN_INFO'=>'true'), 0);
?>

		</div>
</body>


<?php echo '<script'; ?>
>
	var multMenu=false;
	var empresa_id = '<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['ID'];?>
';

	$(document).ready(function() {
		$(".validar").click(function() {
			window.location="aceptar.php?id="+empresa_id;
		});

		  $(".descargar").click(function() {
			window.open("descargar.php?id="+empresa_id);
		});

		$(".rechazar").click(function() {
			window.location="rechazar.php?id="+empresa_id;
		});

		$(".js-mupe").find("li").first().addClass("active");
		$("#Establecimiento .tab-content").find(".tab-pane").first().addClass("active");
		$('#linkEst').click(function (e) {
			if(!multMenu) {
				$(".js-mupe").find("li").first().find("a").click();
				multMenu = true;
				$('.js-mupe').bootstrapResponsiveTabs();
				$(".js-mupe").find("li").first().find("a").click();
			}
		});

		$('.editableFeld').each(function() {
			var opts = Array();
			if($(this).data('array')=="1") {
				opts.source = window[$(this).attr('data-values')];
				opts.type = 'select';
				opts.value = $(this).attr('data-id');
			}

			if($(this).attr('data-type')=="textarea") {
				opts.type = 'textarea';
			}
			opts.pk = $(this).attr('data-pk');
			opts.name = $(this).attr('data-name');
			opts.url = 'editField.php';
			opts.emptytext = '';
			opts.success = function(response, newValue) {
				if($(this).data('name')=="Veh/dom") {
					$('#vh2_'+$(this).data('pk')).html(newValue);
				}
				if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
					$(this).parent().parent().find('#callbPerm').html(newValue);
				}

			};
			$(this).editable(opts);
		});
	}); // end of $(document).ready()

	function setPermisoEstablecimiento(obj, establecimiento_id, permiso_id)
	{
		var permiso_id = (typeof permiso_id !== 'undefined') ? permiso_id : null;
		var popup_title = permiso_id ? 'Editar permiso del establecimiento' : 'Agregar permiso al establecimiento';
		var nombre_container = obj.attr('container');

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permisos_establecimiento.php",
		    data: {establecimiento_id: establecimiento_id, permiso_id: permiso_id},
		    dataType: "html",
			success: function(html_response){
				$('#permisos_popup_title').html(popup_title);
				$('#permisos_popup_body').html(html_response);
				$('#permisos_popup_content').width(800);
				$('input#permisos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoEstablecimiento(obj, establecimiento_id)
	{
		var permiso_id = obj.attr('permiso-id');
		var nombre_container = obj.attr('container');
		console.info('nombre_container: '+nombre_container);

		if ( ! esElUnicoResiduo(obj.attr('rol'), establecimiento_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el residuo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permisos_establecimiento.php",
						   data: {accion: "delete", permiso_id: permiso_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								} else {
									BootstrapDialog.alert({
										title: 'No es posible borrar el residuo',
										message: retorno['errores']['delete_error'],
										type: BootstrapDialog.TYPE_DANGER,
									});
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el residuo',
				message: 'No puede eliminar el residuo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible modificar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoResiduo(rol, establecimiento_id)
	{
		var residuos_por_rol = $('div[id^="container_residuo_'+rol+'_'+establecimiento_id+'_"]');
		return residuos_por_rol.length == 1;
	}

	function setVehiculo(obj, establecimiento_id, vehiculo_id)
	{
		var vehiculo_id = (typeof vehiculo_id !== 'undefined') ? vehiculo_id : null;
		var popup_title = vehiculo_id ? 'Editar veh&iacute;culo' : 'Agregar veh&iacute;culo';
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_vehiculo.php",
		    data: {establecimiento_id: establecimiento_id, vehiculo_id: vehiculo_id},
		    dataType: "html",
			success: function(html_response){
				$('#vehiculos_popup_title').html(popup_title);
				$('#vehiculos_popup_body').html(html_response);
				$('#vehiculos_popup_content').width(700);
				$('input#vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarVehiculo(obj, establecimiento_id)
	{
		var vehiculo_id = obj.attr('vehiculo-id');
		var nombre_container_vehiculo = obj.attr('container');
		var nombre_container_permisos_vehiculo = 'container_permisos_vehiculo_'+vehiculo_id;
		console.info("nombre_container_vehiculo: "+nombre_container_vehiculo);
		console.info("nombre_container_permisos_vehiculo: "+nombre_container_permisos_vehiculo);

		if ( ! esElUnicoVehiculo()) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el veh&iacute;culo y sus permisos&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_vehiculo.php",
						   data: {accion: "delete", vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container_vehiculo).remove();
									$("div#"+nombre_container_permisos_vehiculo).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el veh&iacute;culo',
				message: 'No puede eliminar el veh&iacute;culo ya que es &uacute;nico que posee el establecimiento. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoVehiculo()
	{
		return $("div.vehiculos_establecimiento").length == 1;
	}

	function setPermisoVehiculo(obj, vehiculo_id, permiso_vehiculo_id)
	{
		var permiso_vehiculo_id = (typeof permiso_vehiculo_id !== 'undefined') ? permiso_vehiculo_id : null;
		var popup_title = permiso_vehiculo_id ? 'Editar permiso del veh&iacute;culo' : 'Agregar permiso al veh&iacute;culo';
		var establecimiento_id = obj.attr('establecimiento-id');

		// container="container_permiso_{$PERMISO.ID}_vehiculo_{$VEHICULO.ID}"
		var nombre_container = obj.attr('container');
		console.info("set container: "+nombre_container);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_permiso_vehiculo.php",
		    data: {
		    	establecimiento_id: establecimiento_id,
		    	vehiculo_id: vehiculo_id,
		    	permiso_vehiculo_id: permiso_vehiculo_id
		    },
		    dataType: "html",
			success: function(html_response){
				$('#permisos_vehiculos_popup_title').html(popup_title);
				$('#permisos_vehiculos_popup_body').html(html_response);
				$('#permisos_vehiculos_popup_content').width(700);
				$('input#permisos_vehiculos_hidden_info').val(nombre_container);
			}
		});
	}

	function borrarPermisoVehiculo(obj, permiso_vehiculo_id, vehiculo_id)
	{
		var establecimiento_id = obj.attr('establecimiento-id');
		var nombre_container = obj.attr('container');
		console.info("container permiso vehiculo: "+nombre_container);

		if ( ! esElUnicoPermisoDelVehiculo(vehiculo_id)) {

			BootstrapDialog.confirm({
				title: 'ATENCI&Oacute;N',
				message: '&#191;Est&aacute; seguro que quiere borrar el permiso del veh&iacute;culo&#63;',
				type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
				closable: false, // <-- Default value is false
				draggable: false, // <-- Default value is false
				btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
				btnOKLabel: 'Borrar', // <-- Default value is 'OK',
				btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
				callback: function(result) {
					// result will be true if button was click, while it will be false if users close the dialog directly.
					if (result)
					{
						$.ajax({
						   type: "POST",
						   url: admin_path+"/operacion/set_permiso_vehiculo.php",
						   data: {accion: "delete", permiso_vehiculo_id: permiso_vehiculo_id, vehiculo_id: vehiculo_id, establecimiento_id: establecimiento_id },
						   dataType: "text json",
						   success: function(retorno) {
								console.debug(retorno);
								if (retorno['estado'] == 'success') {
									$("div#"+nombre_container).remove();
								}
							}
						});
					}
				}
			});
		} else {
			BootstrapDialog.alert({
				title: 'No es posible borrar el permiso del veh&iacute;culo',
				message: 'No puede eliminar el permiso del veh&iacute;culo ya que es &uacute;nico que posee. Recuerde que es posible editar el mismo.',
				type: BootstrapDialog.TYPE_DANGER,
			});
		}
	}

	function esElUnicoPermisoDelVehiculo(vehiculo_id)
	{
		return $("div.permisos_vehiculo_"+vehiculo_id).length == 1;
	}

<?php echo '</script'; ?>
>

</html>
<?php }
}
?>