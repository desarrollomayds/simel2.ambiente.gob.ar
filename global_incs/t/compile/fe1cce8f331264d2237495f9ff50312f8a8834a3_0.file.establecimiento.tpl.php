<?php /* Smarty version 3.1.27, created on 2016-03-28 17:11:39
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:172174099556f98ffb888516_49873664%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fe1cce8f331264d2237495f9ff50312f8a8834a3' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/registracion/establecimiento.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172174099556f98ffb888516_49873664',
  'variables' => 
  array (
    'USUARIO_ID' => 0,
    'ACCION' => 0,
    'ESTABLECIMIENTO' => 0,
    'TIPO' => 0,
    'EMPRESA' => 0,
    'ACTIVIDADES' => 0,
    'ACTIVIDAD' => 0,
    'PROVINCIAS' => 0,
    'PROVINCIA' => 0,
    'ID' => 0,
    'LOCALIDADES_R' => 0,
    'LOCALIDAD' => 0,
    'LOCALIDADES_C' => 0,
    'NOMENCLATURA_CATASTRAL_CIRC' => 0,
    'CIRC' => 0,
    'NOMENCLATURA_CATASTRAL_SEC' => 0,
    'SEC' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f98ffbc02e89_95397675',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f98ffbc02e89_95397675')) {
function content_56f98ffbc02e89_95397675 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '172174099556f98ffb888516_49873664';
?>

<div class="backGrey" style="padding: 10px 0px">
<form>
    <input type='hidden' name='establecimiento_usuario_id' id='establecimiento_usuario_id' value='<?php echo $_smarty_tpl->tpl_vars['USUARIO_ID']->value;?>
' size='50'>
    <input type='hidden' name='establecimiento_accion'     id='establecimiento_accion'     value='<?php echo $_smarty_tpl->tpl_vars['ACCION']->value;?>
'     size='50'>
    <input type='hidden' name='establecimiento_id'         id='establecimiento_id'         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
'  size='50'>
    <input type='hidden' name='establecimiento_tipo'       id='establecimiento_tipo'     value='<?php echo $_smarty_tpl->tpl_vars['TIPO']->value;?>
'>
    <input id="geocomplete" type="hidden">
    <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

    <div class="table-responsive">

        <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;">

            <?php if ($_smarty_tpl->tpl_vars['TIPO']->value != '2') {?>
                <tr>
                    <td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&deg; de Sucursal<span class="obligatorio">*</span>:&nbsp;</td>
                    <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_numero'   id='establecimiento_numero' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO'];?>
' size='30'></td>
                </tr>

                <tr id="establecimiento_numero-td" style="display:none">
                    <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                    <td bordercolor="#EAEAE5"><div id="establecimiento_numero-error" style="text-align:left;color:red;display:none;"></div></td>
                </tr>
            <?php }?>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Nombre<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_nombre'   id='establecimiento_nombre'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
' size='30'></td>
            </tr>

            <tr id="establecimiento_nombre-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="establecimiento_nombre-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Usuario<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5"><input type='text'   name='establecimiento_usuario'   id='establecimiento_usuario'   value='<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO']) {
echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO'];
} else {
echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>
/<?php echo $_smarty_tpl->tpl_vars['USUARIO_ID']->value;
}?>' size='30' readonly='t'></td>
            </tr>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Contrase&ntilde;a<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5"><input type='password'   name='contrasenia'   id='contrasenia'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CONTRASENIA'];?>
' size='30'></td>
            </tr>

            <tr id="contrasenia-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="contrasenia-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&deg; CAA<?php if ($_smarty_tpl->tpl_vars['TIPO']->value != 1) {?><span class="obligatorio">*</span><?php }?> - Fecha<?php if ($_smarty_tpl->tpl_vars['TIPO']->value != 1) {?><span class="obligatorio">*</span><?php }?>:&nbsp;</td>
                <td bordercolor="#EAEAE5">

                        <input type='text' name='establecimiento_caa_numero' id='establecimiento_caa_numero' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
' size='10'>

                    -

                        <input type='text'   name='establecimiento_caa_vencimiento' id='establecimiento_caa_vencimiento' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
' size="10">
                                                            

                </td>
            </tr>

            <tr id="caa_numero-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="caa_numero-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr id="caa_vencimiento-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="caa_vencimiento-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&deg; Expediente<span class="obligatorio">*</span> - A&ntilde;o<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5">

                        <input type='text'   name='expediente_numero'   id='expediente_numero'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
' size='10'>

                    -

                        <input type='text'   name='expediente_anio'     id='expediente_anio'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
'>

                </td>
            </tr>

            <tr id="expediente_numero-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="expediente_numero-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr id="expediente_anio-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="expediente_anio-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="30%" height="30" align="right" bordercolor="#EAEAE5">Actividad principal<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5">
                    <select style="width: 300px;" name='establecimiento_actividad' id='establecimiento_actividad' class="actividad_crear" >
                            <option value="">[SELECCIONE UNA ACTIVIDAD PRINCIPAL]</option>
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
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD'] == $_smarty_tpl->tpl_vars['ACTIVIDAD']->value['CODIGO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ACTIVIDAD']->value['CODIGO'];?>
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
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="establecimiento_actividad-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5"  style="padding:5px">Breve descripci&oacute;n del proceso productivo<span class="obligatorio">*</span>:&nbsp;</td>
                <td bordercolor="#EAEAE5"><textarea type='text' name='descripcion' id='descripcion' style="min-width:396px;height:80px;resize:vertical;"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</textarea></td>
	        </tr>

            <tr id="descripcion-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="descripcion-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

		<tr>
            <td align="right" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO REAL</td>
            <td></td>

		</tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">   <select style="width: 300px;" name='provincia_r' id='provincia_r'>
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
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select style="width: 396px;" name='localidad_r' id='localidad_r'>
                    <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
                    <?php if ($_smarty_tpl->tpl_vars['ID']->value) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['LOCALIDADES_R']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['LOCALIDAD'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['LOCALIDAD']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['LOCALIDAD']->key => $_smarty_tpl->tpl_vars['LOCALIDAD']->value) {
$_smarty_tpl->tpl_vars['LOCALIDAD']->_loop = true;
$foreach_LOCALIDAD_Sav = $_smarty_tpl->tpl_vars['LOCALIDAD'];
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->key;?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R'] == $_smarty_tpl->tpl_vars['LOCALIDAD']->key) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->value;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['LOCALIDAD'] = $foreach_LOCALIDAD_Sav;
}
?>
                    <?php }?>
                </select>
            </td>
        </tr>


        <tr id="localidad_r-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='calle_r'   id='calle_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
' size='30'></td>
		</tr>

        <tr id="calle_r-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="calle_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='numero_r'   id='numero_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
' size='30'></td>
		</tr>

        <tr id="numero_r-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="numero_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Piso:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='piso_r'   id='piso_r'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
' size='30'></td>
		</tr>

        <tr id="piso_r-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="piso_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_R'];?>
' size='30'></td>
        </tr>

        <tr id="cpostal_r-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td  align="right" height="25" bordercolor="#EAEAE5" style="padding:5px">Coordenadas geogr&aacute;ficas del establecimiento</td>
            <td>
                <div style="display:none">
                    <span id="latitud_r" data-geo="lat">lat</span>
                    <span id="longitud_r" data-geo="lng">lng</span>
                </div>
                <div class="mapa-establecimiento" style="width: 396px; height: 300px"></div>
            </td>
		</tr>



		<tr>
                 <td colspan="2" align="left" height="25" bordercolor="#EAEAE5" style="font-size: 14px;color:#4D90FE;"  class="titulos">DOMICILIO CONSTITUIDO</td>
		</tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Provincia<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">   <select style="width: 300px;" name='establecimiento_provincia_c' id='establecimiento_provincia_c'>
                <option value="">[SELECCIONE UNA PROVINCIA]</option>
                <option value="2" data-nombre="CIUDAD AUTONOMA DE BS AS" <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C'] == 2) {?>selected<?php }?>>CIUDAD AUTONOMA DE BS AS</option>
                <!--
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
                -->
            </select></td>
        </tr>

        <tr id="provincia_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">Localidad<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5">
                <select style="width: 396px;" name='localidad_c' id='localidad_c'>
                    <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
                    <?php if ($_smarty_tpl->tpl_vars['ID']->value) {?>
                        <?php
$_from = $_smarty_tpl->tpl_vars['LOCALIDADES_C']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['LOCALIDAD'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['LOCALIDAD']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['LOCALIDAD']->key => $_smarty_tpl->tpl_vars['LOCALIDAD']->value) {
$_smarty_tpl->tpl_vars['LOCALIDAD']->_loop = true;
$foreach_LOCALIDAD_Sav = $_smarty_tpl->tpl_vars['LOCALIDAD'];
?>
                            <option value='<?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->key;?>
' <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C'] == $_smarty_tpl->tpl_vars['LOCALIDAD']->key) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->value;?>
</option>
                        <?php
$_smarty_tpl->tpl_vars['LOCALIDAD'] = $foreach_LOCALIDAD_Sav;
}
?>
                    <?php }?>
                </select>
            </td>
        </tr>

        <tr id="localidad_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Calle<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='calle_c'   id='calle_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
' size='30'></td>
		</tr>

        <tr id="calle_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="calle_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">N&uacute;mero<span class="obligatorio">*</span>:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='numero_c'   id='numero_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
' size='30'></td>
		</tr>

        <tr id="numero_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="numero_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

		<tr>
			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Piso:&nbsp;</td>
			<td bordercolor="#EAEAE5"><input type='text'   name='piso_c'   id='piso_c'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
' size='30'></td>
		</tr>

        <tr id="piso_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="piso_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">C&oacute;digo Postal<span class="obligatorio">*</span>:&nbsp;</td>
            <td bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_C'];?>
' size='30'></td>
        </tr>

        <tr id="cpostal_c-td" style="display:none">
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
            <td bordercolor="#EAEAE5"><div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div></td>
        </tr>

        <tr>
            <td width="30%" height="25" align="right" bordercolor="#EAEAE5" rowspan="2">Nomenclatura Catastral<span class="obligatorio">*</span>:&nbsp;</td>
            <td>

                    Circ <select name='establecimiento_nomenclatura_catastral_circ' id='establecimiento_nomenclatura_catastral_circ'>
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



                    Sec <select name='establecimiento_nomenclatura_catastral_sec' id='establecimiento_nomenclatura_catastral_sec'>
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

            </td>
        </tr>

        <tr>
            <td>

                    Manz        <input type='text' name='establecimiento_nomenclatura_catastral_manz'     id='establecimiento_nomenclatura_catastral_manz'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
'     size='4'>



                    Parc     <input type='text' name='establecimiento_nomenclatura_catastral_parc'     id='establecimiento_nomenclatura_catastral_parc'     value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
'     size='4'>



                    Sub Parc <input type='text' name='establecimiento_nomenclatura_catastral_sub_parc' id='establecimiento_nomenclatura_catastral_sub_parc' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
' size='4'>

            </td>
        </tr>


    		<tr>
    			<td width="30%" height="25" align="right" bordercolor="#EAEAE5">Habilitaciones<span class="obligatorio">*</span>:&nbsp;</td>
    			<td bordercolor="#EAEAE5"><input type='text'   name='habilitaciones'   id='habilitaciones'   value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['HABILITACIONES'];?>
' size='30'></td>
    		</tr>

            <tr id="habilitaciones-td" style="display:none">
                <td width="30%" height="25" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td bordercolor="#EAEAE5"><div id="habilitaciones-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>

            <tr>
                <td width="200" height="25" align="right" bordercolor="#EAEAE5">Direcci&oacute;n de Email<span class="obligatorio">*</span>:&nbsp;</td>
                <td width="450" bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DIRECCION_EMAIL'];?>
' size='35'></td>
            </tr>

            <tr id="direccion_email-td" style="display:none">
                <td width="200" height="10" align="right" bordercolor="#EAEAE5">&nbsp;</td>
                <td width="450" bordercolor="#EAEAE5"><div id="direccion_email-error" style="text-align:left;color:red;display:none;"></div></td>
            </tr>


    	</table>

    </div>

   <div class="clear20"></div>

        <div class="col-xs-12 text-right">

            <a href="javascript:void(0)" class="btn btn-default" id="btn_cancelar" data-dismiss="modal">Cancelar</a>
            <a href="javascript:void(0)" class="btn btn-success" id="btn_aceptar">Aceptar</a>

        </div>

    <div class="clear20"></div>
</form>
</div>

<?php echo '<script'; ?>
>
    $(".actividad_crear").chosen({width: "396px"});

    parse_field_errors();

    $(function() {

        actualizar_mapa('mapa-establecimiento','');

        $('#establecimiento_caa_vencimiento').datepicker({
          format: 'dd/mm/yyyy',
          startView: 'decade',
          startDate: new Date()
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $('#numero_r').filter_input({regex: '[0-9]'});
        //$('#piso_r').filter_input({regex: '[0-9]'});
        $('#numero_c').filter_input({regex: '[0-9]'});
        //$('#piso_c').filter_input({regex: '[0-9]'});
        $('#expediente_numero').filter_input({regex: '[0-9]'});
        $('#expediente_anio').filter_input({regex: '[0-9]'});
        $('#establecimiento_nomenclatura_catastral_manz').filter_input({regex: '[0-9]'});
        $('#establecimiento_nomenclatura_catastral_parc').filter_input({regex: '[0-9]'});
        $('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex: '[0-9]'});
        $('#habilitaciones').filter_input({regex: '[0-9]'});

        $('#btn_aceptar').click(function() {

            //Fecha inicio actividad
            if ($("#establecimiento_caa_vencimiento").val().length > 0)
            {
                if (!comprobar_fecha($("#establecimiento_caa_vencimiento").val()))
                {
                    mostrarMensaje('exclamation-triangle','Su CAA supera el plazo de vencimiento permitido por el sistema.','warning');
                    return false;
                }
                else
                {
                    cerrar_mensajes();
                }
            }

            var campos = ['establecimiento_numero', 'establecimiento_nombre', 'tipo', 'usuario', 'contrasenia',
                'caa_numero', 'caa_vencimiento', 'expediente_numero', 'expediente_anio',
                'establecimiento_actividad', 'descripcion',
                'calle_r', 'numero_r', 'piso_r', 'provincia_r', 'localidad_r', 'cpostal_r',
                'latitud_r', 'longitud_r',
                'calle_c', 'numero_c', 'piso_c', 'provincia_c', 'localidad_c', 'cpostal_c',
                'nomenclatura_catastral_circ', 'nomenclatura_catastral_sec', 'nomenclatura_catastral_manz',
                'nomenclatura_catastral_parc', 'nomenclatura_catastral_sub_parc',
                'habilitaciones', 'direccion_email'
            ];

            console.info("nombre:"+$("#establecimiento_nombre").val());

            $.ajax({
                type: "POST",
                url: mel_path+"/registracion/establecimiento.php",
                data: {
                    accion: $("#establecimiento_accion").val(),
                    id: $("#establecimiento_id").val(),
                    establecimiento_numero: $("#establecimiento_numero").val(),
                    establecimiento_nombre: $("#establecimiento_nombre").val(),
                    tipo: $("#establecimiento_tipo").val(),
                    usuario_id: $("#establecimiento_usuario_id").val(),
                    usuario: $("#establecimiento_usuario").val(),
                    contrasenia: $("#contrasenia").val(),
                    caa_numero: $("#establecimiento_caa_numero").val(),
                    caa_vencimiento: $("#establecimiento_caa_vencimiento").val(),
                    expediente_numero: $("#expediente_numero").val(),
                    expediente_anio: $("#expediente_anio").val(),
                    establecimiento_actividad: $("#establecimiento_actividad").val(),
                    descripcion: $("#descripcion").val(),
                    latitud_r: $("#latitud_r").text(),
                    longitud_r: $("#longitud_r").text(),
                    provincia_r: $("#provincia_r").val(),
                    localidad_r: $("#localidad_r").val(),
                    calle_r: $("#calle_r").val(),
                    numero_r: $("#numero_r").val(),
                    piso_r: $("#piso_r").val(),
                    cpostal_r: $("#cpostal_r").val(),
                    calle_c: $("#calle_c").val(),
                    numero_c: $("#numero_c").val(),
                    piso_c: $("#piso_c").val(),
                    provincia_c: $("#establecimiento_provincia_c").val(),
                    localidad_c: $("#localidad_c").val(),
                    cpostal_c: $("#cpostal_c").val(),
                    nomenclatura_catastral_circ: $("#establecimiento_nomenclatura_catastral_circ").val(),
                    nomenclatura_catastral_sec: $("#establecimiento_nomenclatura_catastral_sec").val(),
                    nomenclatura_catastral_manz: $("#establecimiento_nomenclatura_catastral_manz").val(),
                    nomenclatura_catastral_parc: $("#establecimiento_nomenclatura_catastral_parc").val(),
                    nomenclatura_catastral_sub_parc: $("#establecimiento_nomenclatura_catastral_sub_parc").val(),
                    habilitaciones: $("#habilitaciones").val(),
                    direccion_email: $("#direccion_email").val()
                },
                dataType: "json",
                success: function(retorno) {
                    if (retorno['estado'] == 0) {
                        if ($("#establecimiento_accion").val() == 'alta') {
                            agregar_establecimiento(retorno['datos']);
                        } else {
                            modificar_establecimiento(retorno['datos']);
                        }
                        $('#mel_popup').modal('hide');
                    } else {

                        for(campo in campos){
                            texto_errores = '';
                            campo = campos[campo];

                            if(retorno['errores'][campo] != null){

                                texto_errores = retorno['errores'][campo];
                                $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                                $('#' + campo).addClass('error_de_carga');
                            }else{
                                $('#' + campo).removeClass('error_de_carga');
                            }

                            if(texto_errores != ''){
                                $('#' + campo + '-error').html(texto_errores);
                                $('#' + campo + '-td').show();
                                $('#' + campo + '-error').show();
                                ;
                            }else{
                                $('#' + campo + '-error').hide();
                                $('#' + campo + '-td').hide();
                            }

                        }

                        mostrarMensaje('exclamation-triangle','Hubo errores a la hora de procesar el formulario, revise los campos indicados.','warning');
                        return false;
                    }
                }
            });
        })

        var cambio_localidad_pendiente = null;

        $('#provincia_r').on('change', function() {
            limpiar_calle_num('r');
            actualizar_localidades_r();
            actualizar_mapa('mapa-establecimiento','');
        });

        $('#establecimiento_provincia_c').on('change', function() {
            actualizar_localidades_c();
        });

        $('#localidad_r').on('change', function() {
            $.ajax({
                type: "POST",
                url: mel_path+"/servicios/punto_inicio.php",
                data: {
                    calle: $("#calle_r").val(),
                    numero: $("#numero_r").val(),
                    provincia: $("#provincia_r").val(),
                    localidad: $("#localidad_r").val()
                },
                dataType: "text",
                success: function(punto_inicio) {
                        actualizar_mapa('mapa-establecimiento','');
                }
            });
        })


        $("#establecimiento_actividad").on('change', function(){

            if ($("#establecimiento_actividad").hasClass('error_de_carga'))
            {
                $("#establecimiento_actividad").removeClass('error_de_carga');
                $("#establecimiento_actividad-td").hide();
            }
        });

        $("#calle_r").on('change', function() {

            if ($("#numero_r").val())
                actualizar_mapa('mapa-establecimiento','');
        });

        $("#numero_r").on('change', function() {

            if ($("#calle_r").val())
                actualizar_mapa('mapa-establecimiento','');
        });


        function actualizar_localidades_r() {
            $.getJSON(mel_path+'/servicios/localidades.php', {provincia: $("#provincia_r").val()}, function(json) {
                $('#localidad_r').find('option').remove();

                $.each(json, function(codigo, descripcion) {
                    $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
                });

                var opciones = $("#localidad_r option");

                opciones.sort(function(a, b) {
                    if (a.text > b.text)
                        return 1;
                    else if (a.text < b.text)
                        return -1;
                    else
                        return 0
                })

                $("#localidad_r").empty().append(opciones);

                $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

                $('#localidad_r').val($('#localidad_r option:first').val());
            });
        }

        function actualizar_localidades_c() {
            $.getJSON(mel_path+'/servicios/localidades.php', {provincia: $("#establecimiento_provincia_c").val()}, function(json) {
                $('#localidad_c').find('option').remove();

                $.each(json, function(codigo, descripcion) {
                    $('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
                });

                var opciones = $("#localidad_c option");

                opciones.sort(function(a, b) {
                    if (a.text > b.text)
                        return 1;
                    else if (a.text < b.text)
                        return -1;
                    else
                        return 0
                })

                $("#localidad_c").empty().append(opciones);

                $("#localidad_c").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

                $('#localidad_c').val($('#localidad_c option:first').val());
            });
        }

    });

<?php echo '</script'; ?>
>
<?php }
}
?>