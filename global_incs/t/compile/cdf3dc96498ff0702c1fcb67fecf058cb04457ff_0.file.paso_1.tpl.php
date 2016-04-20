<?php /* Smarty version 3.1.27, created on 2015-11-20 10:48:01
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_sucursales/paso_1.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:253330824564f249178a0a2_74383057%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cdf3dc96498ff0702c1fcb67fecf058cb04457ff' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_sucursales/paso_1.tpl',
      1 => 1444163389,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '253330824564f249178a0a2_74383057',
  'variables' => 
  array (
    'PERFIL' => 0,
    'ROL_ID' => 0,
    'USUARIO_ID' => 0,
    'ACCION' => 0,
    'ESTABLECIMIENTO' => 0,
    'NOMBRE_USUARIO' => 0,
    'ACTIVIDADES' => 0,
    'ACTIVIDAD' => 0,
    'PROVINCIAS' => 0,
    'PROVINCIA' => 0,
    'NOMENCLATURA_CATASTRAL_CIRC' => 0,
    'CIRC' => 0,
    'NOMENCLATURA_CATASTRAL_SEC' => 0,
    'SEC' => 0,
    'CAMBIOS_PENDIENTES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f24918d9f84_68366705',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f24918d9f84_68366705')) {
function content_564f24918d9f84_68366705 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '253330824564f249178a0a2_74383057';
?>
<!DOCTYPE html>
<html>
<head>

    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<title>Crear manifiesto</title>

	<!-- Carga de header global -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>'true','datepicker'=>'true'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','chosen'=>'true','datepicker'=>'true'), 0);
?>


</head>

<body onload="actualizar_mapa('map','');">

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel2'), 0);
?>


		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>
	<div id="contenedor-interior">
		<?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>

		<div id="apDiv1">Mi Cuenta<br></div>
		<div id="contenido-interior">

			<br>
			<span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == 2) {?>
                        <div class="tabnueva">
                            <a href="../../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    <?php } else { ?>
                        <div class="tabnueva">
                            <a href="../../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    <?php }?>
                </div>
				<div style="height:2px; background-color:#5D9E00"></div>
			</span>
			<br>

			<form>
				<input id="geocomplete" type="hidden">
				<input id="pais_r" type="hidden" data-nombre="ARGENTINA">

				<input type='hidden' name='establecimiento_usuario_id' id='establecimiento_usuario_id' value='<?php echo $_smarty_tpl->tpl_vars['USUARIO_ID']->value;?>
' size='50'>
				<input type='hidden' name='establecimiento_accion'     id='establecimiento_accion'     value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
'     size='50'>
				<input type='hidden' name='establecimiento_id'         id='establecimiento_id'         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
'  size='50'>

				<p class="registro-titulo bg-primary">Agregar sucursal</p>

				<table width="100%" cellspacing="0"  cellpadding="5" border="0" style="text-align: left;font-size: 13px" id="tablas-forms" class="tabla">

	                <tr>
	                    <td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&deg; de Sucursal<span class="obligatorio">*</span>:</td>
	                    <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_numero'   id='establecimiento_numero' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO'];?>
' size='30'></td>
	                </tr>

	                <tr id="establecimiento_numero-td" style="display:none">
	                    <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
	                    <td bordercolor="#EAEAE5"><div id="establecimiento_numero-error" style="text-align:left;color:red;display:none;"></div></td>
	                </tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Nombre<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text' name='establecimiento_nombre'   id='establecimiento_nombre'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
' size='30'></td>
					</tr>

					<tr id="establecimiento_nombre-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td bordercolor="#EAEAE5"><div id="establecimiento_nombre-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Usuario<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text' name='usuario'   id='usuario'   value='<?php echo $_smarty_tpl->tpl_vars['NOMBRE_USUARIO']->value;?>
' size='30' disabled></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Contrase&ntilde;a<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='password'   name='contrasenia'   id='contrasenia'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CONTRASENIA'];?>
' size='30'></td>
					</tr>

					<tr id="contrasenia-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td bordercolor="#EAEAE5"><div id="contrasenia-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero CAA - Fecha:</td>
						<td bordercolor="#EAEAE5">

							<input type='text'   name='caa_numero'      id='caa_numero'      value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
'      size='10'>

							-

							<input type='text'   name='caa_vencimiento' id='caa_vencimiento' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
' size='10' readonly="true">
						</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&deg; Expediente<span class="obligatorio">*</span> - A&ntilde;o<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">

							<input type='text'   name='establecimiento_expediente_numero'   id='expediente_numero'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
' size='10'>

							-

							<input type='text'   name='expediente_anio'     id='expediente_anio'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
'   size='4'>

						</td>
					</tr>

					<tr id="expediente_numero-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="expediente_numero-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr id="expediente_anio-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="expediente_anio-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Actividad principal<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">

							<select style="width: 280px;" name='establecimiento_actividad' id='establecimiento_actividad' >
								<option></option>
								<?php
$_from = $_smarty_tpl->tpl_vars['ACTIVIDADES']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ACTIVIDAD'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ACTIVIDAD']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ACTIVIDAD']->value) {
$_smarty_tpl->tpl_vars['ACTIVIDAD']->_loop = true;
$foreach_ACTIVIDAD_Sav = $_smarty_tpl->tpl_vars['ACTIVIDAD'];
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['ACTIVIDAD']->value['CODIGO'];?>
'><?php echo $_smarty_tpl->tpl_vars['ACTIVIDAD']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ACTIVIDAD']->value['DESCRIPCION'];?>
</option>
								<?php
$_smarty_tpl->tpl_vars['ACTIVIDAD'] = $foreach_ACTIVIDAD_Sav;
}
?>
							</select>
						</td>

					</tr>

					<tr id="establecimiento_actividad-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="establecimiento_actividad-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Breve descripci&oacute;n del proceso productivo<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><textarea type='text'   name='descripcion'   id='descripcion' style="width:100%;height:80px;resize:vertical;"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</textarea></td>
					</tr>

					<tr id="descripcion-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="descripcion-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

					<tr>
			            <td align="left" colspan="2" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO REAL</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5">
							<select style="width: 280px;" name='provincia_r' id='provincia_r'>
								<option value="">[SELECCIONE UNA PROVINCIA]</option>
								<?php
$_from = $_smarty_tpl->tpl_vars['PROVINCIAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PROVINCIA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PROVINCIA']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PROVINCIA']->value) {
$_smarty_tpl->tpl_vars['PROVINCIA']->_loop = true;
$foreach_PROVINCIA_Sav = $_smarty_tpl->tpl_vars['PROVINCIA'];
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['CODIGO'];?>
' data-nombre='<?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['DESCRIPCION'];?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R'] == $_smarty_tpl->tpl_vars['PROVINCIA']->value['CODIGO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['DESCRIPCION'];?>
</option>
								<?php
$_smarty_tpl->tpl_vars['PROVINCIA'] = $foreach_PROVINCIA_Sav;
}
?>
							</select></td>
						</tr>

						<tr id="provincia_r-td" style="display:none">
							<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
							<td width="450" bordercolor="#EAEAE5"><div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div></td>
						</tr>

						<tr>
							<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:</td>
							<td bordercolor="#EAEAE5">
								<select style="width: 380px;" name='localidad_r' id='localidad_r'>
									<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
								</select></td>
							</tr>

							<tr id="localidad_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='calle_r'   id='calle_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
' size='30'></td>
							</tr>

							<tr id="calle_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="calle_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='numero_r'   id='numero_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
' size='30'></td>
							</tr>

							<tr id="numero_r-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="numero_r-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Piso:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='piso_r'   id='piso_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
' size='30'></td>
							</tr>

					        <tr>
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
					            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_R'];?>
' size='30'></td>
					        </tr>

					        <tr id="cpostal_r-td" style="display:none">
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
					            <td bordercolor="#EAEAE5"><div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div></td>
					        </tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Coordenadas geogr&aacute;ficas de la sucursal<span class="obligatorio">*</span>:</td>
								<td width="450px" bordercolor="#EAEAE5">
									<div>
										<span id="latitud_r" data-geo="lat" style="display:none"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LATITUD_R'];?>
</span>
										<span id="longitud_r" data-geo="lng" style="display:none"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LONGITUD_R'];?>
</span>
									</div>
									<div class="mapa-sucursal" style="width: 450px; height: 300px"></div>
								</td>
							</tr>

							<tr>
					            <td align="left" colspan="2" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5">	<select style="width: 280px;" name='provincia_c' id='provincia_c'>
									<option value="">[SELECCIONE UNA PROVINCIA]</option>
									<?php
$_from = $_smarty_tpl->tpl_vars['PROVINCIAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PROVINCIA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PROVINCIA']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PROVINCIA']->value) {
$_smarty_tpl->tpl_vars['PROVINCIA']->_loop = true;
$foreach_PROVINCIA_Sav = $_smarty_tpl->tpl_vars['PROVINCIA'];
?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['CODIGO'];?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C'] == $_smarty_tpl->tpl_vars['PROVINCIA']->value['CODIGO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['DESCRIPCION'];?>
</option>
									<?php
$_smarty_tpl->tpl_vars['PROVINCIA'] = $foreach_PROVINCIA_Sav;
}
?>
								</select></td>
							</tr>

							<tr id="provincia_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5">	<select style="width: 380px;" name='localidad_c' id='localidad_c'>
									<option value="">[SELECCIONE UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
								</select></td>
							</tr>

							<tr id="localidad_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='calle_c'   id='calle_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
' size='30'></td>
							</tr>

							<tr id="calle_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="calle_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>				

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='numero_c'   id='numero_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
' size='30'></td>
							</tr>

							<tr id="numero_c-td" style="display:none">
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
								<td width="450" bordercolor="#EAEAE5"><div id="numero_c-error" style="text-align:left;color:red;display:none;"></div></td>
							</tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Piso:</td>
								<td bordercolor="#EAEAE5"><input type='text'   name='piso_c'   id='piso_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
' size='30'></td>
							</tr>
        
					        <tr>
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
					            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_C'];?>
' size='30'></td>
					        </tr>

					        <tr id="cpostal_c-td" style="display:none">
					            <td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
					            <td bordercolor="#EAEAE5"><div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div></td>
					        </tr>

							<tr>
								<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Nomenclatura Catastral:</td>
								<td bordercolor="#EAEAE5">

									Circ <select name='nomenclatura_catastral_circ' id='nomenclatura_catastral_circ'>
									<?php
$_from = $_smarty_tpl->tpl_vars['NOMENCLATURA_CATASTRAL_CIRC']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['CIRC'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['CIRC']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['CIRC']->value) {
$_smarty_tpl->tpl_vars['CIRC']->_loop = true;
$foreach_CIRC_Sav = $_smarty_tpl->tpl_vars['CIRC'];
?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['CIRC']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'] == $_smarty_tpl->tpl_vars['CIRC']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['CIRC']->value;?>
</option>
									<?php
$_smarty_tpl->tpl_vars['CIRC'] = $foreach_CIRC_Sav;
}
?>
								</select>



								Sec <select name='nomenclatura_catastral_sec' id='nomenclatura_catastral_sec'>
								<?php
$_from = $_smarty_tpl->tpl_vars['NOMENCLATURA_CATASTRAL_SEC']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['SEC'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['SEC']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['SEC']->value) {
$_smarty_tpl->tpl_vars['SEC']->_loop = true;
$foreach_SEC_Sav = $_smarty_tpl->tpl_vars['SEC'];
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['SEC']->value;?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'] == $_smarty_tpl->tpl_vars['SEC']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['SEC']->value;?>
</option>
								<?php
$_smarty_tpl->tpl_vars['SEC'] = $foreach_SEC_Sav;
}
?>
							</select>



							Manz     <input type='text' name='nomenclatura_catastral_manz'     id='nomenclatura_catastral_manz'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
'     size='4'>



							Parc     <input type='text' name='nomenclatura_catastral_parc'     id='nomenclatura_catastral_parc'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
'     size='4'>



							Sub Parc <input type='text' name='nomenclatura_catastral_sub_parc' id='nomenclatura_catastral_sub_parc' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
' size='4'>

						</td>
					</tr>

					<tr>
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">Habilitaciones<span class="obligatorio">*</span>:</td>
						<td bordercolor="#EAEAE5"><input type='text'   name='habilitaciones'   id='habilitaciones'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['HABILITACIONES'];?>
' size='30'></td>
					</tr>

					<tr id="habilitaciones-td" style="display:none">
						<td width="20%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
						<td width="450" bordercolor="#EAEAE5"><div id="habilitaciones-error" style="text-align:left;color:red;display:none;"></div></td>
					</tr>

		            <tr>
		                <td width="20%" height="25" align="left" bordercolor="#EAEAE5">Direcci&oacute;n de Email<span class="obligatorio">*</span>:&nbsp;</td>
		                <td bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DIRECCION_EMAIL'];?>
' size='35'></td>
		            </tr>

		            <tr id="direccion_email-td" style="display:none">
		                <td width="20%" height="10" align="left" bordercolor="#EAEAE5">&nbsp;</td>
		                <td bordercolor="#EAEAE5"><div id="direccion_email-error" style="text-align:left;color:red;display:none;"></div></td>
		            </tr>

					<tr>
						<td width="100%" height="25" align="center" bordercolor="#EAEAE5" colspan='3'>
							<input type="button" class="btn btn-warning" value="Administrar permisos" id="btn_permisos_establecimiento" name="btn_permisos_establecimiento" data-toggle="modal" data-target="#mel_popup"/>
						</td>
					</tr>

				</table>
			</form>
			<table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
				<tbody>
					<tr>
						<?php if (!$_smarty_tpl->tpl_vars['CAMBIOS_PENDIENTES']->value) {?>
						<td align="right"><input type="button" class="btn btn-success" value="Crear sucursal" id="btn_guardar_cambios" name="btn_guardar_cambios"/></td>
						<?php } else { ?>
						<?php echo '<script'; ?>
>
							$(function() {
								$("#alerta-micuenta").show().html("Para requerir un nuevo cambio deber&aacute; esperar a que se eval&uacute;e el actual.");
							});
						<?php echo '</script'; ?>
>
						<?php }?>
					</tr>
				</tbody>
			</table>

		</div>
	</div>
</body>


<?php echo '<script'; ?>
 type="text/javascript">

	$(function() {

		$("#establecimiento_actividad").chosen({width: "450px"});

		actualizar_mapa('mapa-sucursal','');


		$('#establecimiento_numero_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_r').filter_input({regex:'[0-9]'});
		$('#establecimiento_numero_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_piso_c').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_numero').filter_input({regex:'[0-9]'});
		$('#establecimiento_expediente_anio').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_manz').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_parc').filter_input({regex:'[0-9]'});
		$('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex:'[0-9]'});

		$('#caa_vencimiento').datepicker({
			format: 'dd/mm/yyyy'
	    }).on('changeDate', function(e){
	        $(this).datepicker('hide');
	    });

		$("#establecimiento_actividad").on('change',function(){

			$("#establecimiento_actividad-td").hide();

		});

// creacion_manifiesto.tpl

$('#btn_permisos_establecimiento').on('click', function() {
	$.ajax({
		type: "GET",
		url: mel_path+"/operacion/compartido/alta_sucursales/permisos_establecimiento.php",
		dataType: "html",
		success: function(msg){
			$('#mel_popup_title').html("Residuos permitidos");
			$('#mel_popup_body').html(msg);
			$('#mel_popup_content').width(600);
		}
	});
});

$('#btn_guardar_cambios').on('click', function() {
	var campos = [	'establecimiento_numero', 'establecimiento_nombre', 'usuario',
	'caa_numero', 'caa_vencimiento', 'expediente_numero', 'expediente_anio',
	'establecimiento_actividad', 'descripcion', 'contrasenia', 'tipo', 'caa_numero', 'caa_vencimiento',
	'calle_r', 'numero_r', 'piso_r', 'provincia_r', 'localidad_r', 'cpostal_r', 'latitud_r', 'longitud_r',
	'calle_c', 'numero_c', 'piso_c', 'provincia_c', 'localidad_c', 'cpostal_c',
	'nomenclatura_catastral_circ', 'nomenclatura_catastral_sec', 'nomenclatura_catastral_manz',
	'nomenclatura_catastral_parc', 'nomenclatura_catastral_sub_parc',
	'habilitaciones',  'general', 'direccion_email', 'permisos_establecimientos'
	];

	$.ajax({
		type: "POST",
		url:  mel_path+"/operacion/compartido/alta_sucursales/paso_1.php",
		data:
		{
			accion                          : 'alta',
			usuario 						: $("#usuario").val(),
			establecimiento_numero 			: $("#establecimiento_numero").val(),
			establecimiento_nombre          : $("#establecimiento_nombre").val(),
			tipo                            : $("#establecimiento_tipo").val(),
			contrasenia     				: $("#contrasenia").val(),
			caa_numero                      : $("#caa_numero").val(),
			caa_vencimiento                 : $("#caa_vencimiento").val(),
			expediente_numero 				: $("#expediente_numero").val(),
			expediente_anio   				: $("#expediente_anio").val(),
			establecimiento_actividad		: $("#establecimiento_actividad").val(),
			descripcion       				: $("#descripcion").val(),
			provincia_r       				: $("#provincia_r").val(),
			localidad_r       				: $("#localidad_r").val(),
			calle_r           				: $("#calle_r").val(),
			numero_r          				: $("#numero_r").val(),
			piso_r            				: $("#piso_r").val(),
			cpostal_r 						: $("#cpostal_r").val(),
            latitud_r 						: $("#latitud_r").text(),
            longitud_r  					: $("#longitud_r").text(),
			calle_c                         : $("#calle_c").val(),
			numero_c                        : $("#numero_c").val(),
			piso_c                          : $("#piso_c").val(),
			provincia_c                     : $("#provincia_c").val(),
			localidad_c                     : $("#localidad_c").val(),
			cpostal_c 						: $("#cpostal_c").val(),
			nomenclatura_catastral_circ     : $("#nomenclatura_catastral_circ").val(),
			nomenclatura_catastral_sec      : $("#nomenclatura_catastral_sec").val(),
			nomenclatura_catastral_manz     : $("#nomenclatura_catastral_manz").val(),
			nomenclatura_catastral_parc     : $("#nomenclatura_catastral_parc").val(),
			nomenclatura_catastral_sub_parc : $("#nomenclatura_catastral_sub_parc").val(),
			habilitaciones                  : $("#habilitaciones").val(),
			direccion_email 				: $("#direccion_email").val()
		},
		dataType: "text json",
		success: function(retorno){
			if(retorno['estado'] == 0)
			{	
				mostrarMensaje('','Sucursal registrada. A continuaci&oacute;n ser&aacute; redireccionado.','success');

				setTimeout(function () {
			        location.reload();
			    }, 5000);
				
			}
			else
			{
                for(campo in campos){
                    texto_errores = '';
                    campo = campos[campo];

                    if (retorno['errores'][campo] != null && (campo == 'permisos_establecimientos'))
                    {
                        mostrarMensaje('exclamation-triangle',retorno['errores'][campo],'warning');
                        return false;
                    }
                    else
                    {
                        cerrar_mensajes();
                    }

                    if(retorno['errores'][campo] != null){

                        texto_errores = retorno['errores'][campo];
                        $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                        $('#' + campo).addClass('error_de_carga');
                    }
                    else
                    {
                        $('#' + campo).removeClass('error_de_carga');
                    }

                    if(texto_errores != '')
                    {
                        $('#' + campo + '-error').html(texto_errores);
                        $('#' + campo + '-td').show();
                        $('#' + campo + '-error').show();
                    }
                    else
                    {
                        $('#' + campo + '-error').hide();
                        $('#' + campo + '-td').hide();
                    }

                }

                mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                return false;
			}
		}
	});
});


var cambio_localidad_pendiente = null;

$('#provincia_r').on('change',function() {
	limpiar_calle_num('r','');
	actualizar_localidades_r();
	actualizar_mapa('mapa-sucursal','');
});

$('#localidad_r').on('change',function() {
	limpiar_calle_num('r','');
	actualizar_mapa('mapa-sucursal','');
});

$('#provincia_c').on('change',function() {
	actualizar_localidades_c();
});

$("#calle_r").on('change', function() {

	if ($("#numero_r").val())
		actualizar_mapa('mapa-sucursal','');
});	

$("#numero_r").on('change', function() {

	if ($("#calle_r").val())
		actualizar_mapa('mapa-sucursal','');
});	

function actualizar_localidades_r(){

	$.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_r").val()}, function(json){
		
		$('#localidad_r').find('option').remove();

		$.each(json, function(codigo, descripcion) {
			$('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
		});

		var opciones = $("#localidad_r option");

		opciones.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0
		})

		$("#localidad_r").empty().append( opciones );

		$("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

		$('#localidad_r').val($('#localidad_r option:first').val());

	});
}

function actualizar_localidades_c(){

	$.getJSON(mel_path+'/servicios/localidades.php', {provincia : $("#provincia_c").val()}, function(json){
		$('#localidad_c').find('option').remove();

		$.each(json, function(codigo, descripcion) {
			$('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
		});

		var opciones = $("#localidad_c option");

		opciones.sort(function(a,b) {
		    if (a.text > b.text) return 1;
		    else if (a.text < b.text) return -1;
		    else return 0
		})

		$("#localidad_c").empty().append( opciones );

		$("#localidad_c").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

		$('#localidad_c').val($('#localidad_c option:first').val());

	});
}
});
<?php echo '</script'; ?>
>


</html><?php }
}
?>