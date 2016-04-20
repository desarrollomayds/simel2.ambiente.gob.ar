<?php /* Smarty version 3.1.27, created on 2016-03-28 17:30:26
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/paso_4.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:81089433156f99462481ee0_47305497%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afb715eca7336757a72aae08b6e2af690df642cf' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/paso_4.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '81089433156f99462481ee0_47305497',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'ROL_ID' => 0,
    'EMPRESA' => 0,
    'REPRESENTANTE' => 0,
    'ESTABLECIMIENTO' => 0,
    'PERMISO' => 0,
    'ELIMINACION' => 0,
    'VEHICULO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f994627f6c80_11669555',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f994627f6c80_11669555')) {
function content_56f994627f6c80_11669555 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '81089433156f99462481ee0_47305497';
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<title>Registraci&oacute;n - &Uacute;ltimo paso</title>

	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>


</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="registro-logos">
					<div class="row">
						<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/images/LogoDRP.png" class="img-responsive"></div>
						<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_mel.gif" class="img-responsive"></div>
						<div class="col-xs-4"><img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo.gif" class="img-responsive"></div>
					</div>
				</div>

				<div id="registro-bloque">
					<input id="rol_id" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
					<div class="row">
						<div class="col-xs-12">
							<div id="registro-cuerpo">

								<p class="text-primary">INFORMACI&Oacute;N</p>

								<p class="registro-titulo bg-primary">Datos de la empresa</p>

								<table width="100%" border="0" style="font-size: 12px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">

									<tr>
										<td  colspan="6" bgcolor="#EAEAE5">
											<strong>Cuit: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>

										</td>
				                    </tr>
				                    
				                    <tr>
				                        <td  colspan="6" bgcolor="#EAEAE5"><strong>Roles: </strong>
											<?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['GENERADOR']) {?>
												Generador
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['TRANSPORTISTA']) {?>
												Transportista
											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['OPERADOR']) {?>
												Operador
											<?php }?>
										</td>
	                                </tr>
	                                
	                                <tr>
	                                    <td colspan="6" bgcolor="#EAEAE5">
	                                     	<strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NOMBRE'];?>

	                                    </td>
	                                </tr>

	                                <tr>
										<td colspan="6" bgcolor="#EAEAE5">
											<strong>Fec. Ini. Act: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>

										</td>
	                                </tr>

	                                <tr>
										<td  colspan="6" bgcolor="#EAEAE5">
											<strong>N&uacute;mero Telef&oacute;nico: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>

										</td>
									</tr>

									<tr>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio real</strong>
											<br>
											<br>
											<strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
&nbsp;
											<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
&nbsp;
											<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
&nbsp;
											<br>
											<strong>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_'];?>

											<br>
											<strong>Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_'];?>

											<br>
											<strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_R'];?>

										</td>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio legal</strong>
											<br>
											<br>
											<strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
&nbsp;
											<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
&nbsp;
											<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
&nbsp;
											<br>
											<strong>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_'];?>

											<br>
											<strong>Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_'];?>

											<br>
											<strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_L'];?>

										</td>
										<td colspan="2"   style="border: 1px dotted #C0C0C0;"bgcolor="#EAEAE5">
											<strong>Domicilio constituido</strong>
											<br>
											<br>
											<strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
&nbsp;
											<br>
											<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
&nbsp;
											<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
&nbsp;
											<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
&nbsp;
											<br>
											<strong>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_'];?>

											<br>
											<strong>Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_'];?>

											<br>
											<strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_C'];?>

										</td>
									</tr>

								</table>

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
									<table width="100%" border="0" style="font-size: 12px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td bgcolor="#EAEAE5"><strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Apellido: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Fecha de nacimiento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Tipo de documento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>N&uacute;mero de documento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cuit: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</td></tr>
									</table>
                                	<br>
								<?php
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
									<table width="100%" border="0" style="font-size: 12px" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td bgcolor="#EAEAE5"><strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Apellido: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Fecha de nacimiento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Tipo de documento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>N&uacute;mero de documento: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cargo: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
</td></tr>
										<tr><td bgcolor="#EAEAE5"><strong>Cuit: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</td></tr>
									</table>
                              		<br>
								<?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>

								

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
								<p class="registro-titulo bg-primary">Establecimiento</p>
									<table width="100%" border="0" style="font-size: 12px;border-collapse:collapse;" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Nombre: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Tipo: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO_'];?>
</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Usuario: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO'];?>
</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Actividad: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD_'];?>
</td></tr>
		                                <tr>
											<td colspan="6" bgcolor="#EAEAE5">
												<strong>CAA: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
<br />
											</td>
		                                </tr>
										<tr>
											<td colspan="6" bgcolor="#EAEAE5">
												<strong>CAA Vencimiento: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>

											</td>
		                                </tr>
		                                <tr>
		                                	<td colspan="6" bgcolor="#EAEAE5"><strong>Expediente / A&ntilde;o: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
 / <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
</td>
		                                </tr>

										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Descripci&oacute;n: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</td></tr>
										<tr><td colspan="6" bgcolor="#EAEAE5"><strong>Direcci&oacute;n Email: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DIRECCION_EMAIL'];?>
</td></tr>

										<tr>
                                            <td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
                                            	<strong>Domicilio real</strong>
                                            	<br><br>
                                            	<strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>

                                            	<br>
                                            	<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>

                                            	<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>

                                            	<br>
                                            	<strong>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_'];?>

                                            	<br>
                                            	<strong>Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_'];?>

                                            	<br>
                                            	<strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_R'];?>

                                            </td>
											<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
												<strong>Domicilio constituido</strong>
												<br><br>
												<strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>

												<br>
												<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>

												<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>

												<br>
												<strong>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_'];?>

												<br>
												<strong>Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_'];?>

                                            	<br>
                                            	<strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_C'];?>

											</td>
											<td colspan="2" style="width:33%;border: 1px dotted #C0C0C0;" bgcolor="#EAEAE5">
												<strong>Nomenclatura Catastral: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
&nbsp;&nbsp;&nbsp;&nbsp;
												<br>
												<strong>Habilitaciones: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['HABILITACIONES'];?>
&nbsp;&nbsp;&nbsp;&nbsp;<br>
											</td>
										</tr>
									</table>
				                    <br>
				                    <p class="registro-titulo bg-info">Permisos</p>
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
											<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
												<tr><td bgcolor="#EAEAE5"><strong>Establecimiento: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td></tr>
												<tr><td  bgcolor="#EAEAE5"><strong>C&oacute;digo: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</td></tr>
												<tr><td  bgcolor="#EAEAE5"><strong>Residuo: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</td></tr>
												<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 1) {?>
												<tr><td  bgcolor="#EAEAE5"><strong>Cantidad: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
&nbsp;kg</td></tr>
												<?php }?>
												<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 3) {?>
												<tr><td  bgcolor="#EAEAE5"><strong>Permisos de eliminaci&oacute;n de residuos: </strong>
													<ul>
														<?php
$_from = $_smarty_tpl->tpl_vars['PERMISO']->value['ELIMINACION'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ELIMINACION'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ELIMINACION']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ELIMINACION']->value) {
$_smarty_tpl->tpl_vars['ELIMINACION']->_loop = true;
$foreach_ELIMINACION_Sav = $_smarty_tpl->tpl_vars['ELIMINACION'];
?>
															<li><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ELIMINACION_'][$_smarty_tpl->tpl_vars['ELIMINACION']->value];?>
</li>
														<?php
$_smarty_tpl->tpl_vars['ELIMINACION'] = $foreach_ELIMINACION_Sav;
}
?>
													</ul>
												</td></tr>
												<?php }?>
											</table>
									<br>
										<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

										<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 2) {?>
					                    <p class="registro-titulo bg-info">Veh&iacute;culos</p>
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
												<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
													<tr><td  bgcolor="#EAEAE5"><strong>Establecimiento : </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td></tr>
													<tr><td  bgcolor="#EAEAE5"><strong>Dominio: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td></tr>
													<tr><td  bgcolor="#EAEAE5"><strong>Descripci&oacute;n : </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td></tr>
												</table>
												
												<br>
												<p class="registro-titulo bg-warning">Permisos del Veh&iacute;culo <?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
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

													<table width="100%" style="font-size: 12px" border="0" cellpadding="5" cellspacing="0" class="tabla" id="tablas-forms">
														<tr><td  bgcolor="#EAEAE5"><strong>C&oacute;digo: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</td></tr>
														<tr><td  bgcolor="#EAEAE5"><strong>Residuo: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</td></tr>
														<tr><td  bgcolor="#EAEAE5"><strong>Cantidad: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
&nbsp;kg</td></tr>
														<tr><td bgcolor="#EAEAE5"><strong>Estado: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ESTADO_'];?>
</td></tr>
													</table>

													<br>
												<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
											<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
										<?php }?>

								<?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>

					    	    <div class="row" style="margin-top:50px;">
								    <div class="col-xs-12 text-right">
								    	<a class="btn btn-default" href="paso_2.php">Volver</a>
								    	<a class="btn btn-success" href="finalizar.php">Finalizar</a>
								    </div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><?php }
}
?>