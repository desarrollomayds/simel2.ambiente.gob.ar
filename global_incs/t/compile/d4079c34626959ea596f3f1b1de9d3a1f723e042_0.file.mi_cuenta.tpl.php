<?php /* Smarty version 3.1.27, created on 2016-02-05 14:53:15
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mi_cuenta.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:108780073956b4e18b37cc79_51364901%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd4079c34626959ea596f3f1b1de9d3a1f723e042' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/mi_cuenta.tpl',
      1 => 1445889332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108780073956b4e18b37cc79_51364901',
  'variables' => 
  array (
    'PERFIL' => 0,
    'ROL_ID' => 0,
    'ESTABLECIMIENTO' => 0,
    'PROVINCIAS' => 0,
    'PROVINCIA' => 0,
    'LOCALIDADES_R' => 0,
    'LOCALIDAD' => 0,
    'LOCALIDADES_C' => 0,
    'NOMENCLATURA_CATASTRAL_CIRC' => 0,
    'CIRC' => 0,
    'NOMENCLATURA_CATASTRAL_SEC' => 0,
    'SEC' => 0,
    'CAMBIOS_PENDIENTES' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e18b4c8653_26708020',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e18b4c8653_26708020')) {
function content_56b4e18b4c8653_26708020 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '108780073956b4e18b37cc79_51364901';
?>
<!DOCTYPE html>
<html>
<head>

    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


    <title>Crear manifiesto</title>

    <!-- Carga de header global -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
?>

    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','datepicker'=>'true'), 0);
?>


</head>

<body>
<div id="login-top" align="center">
    <div style="width:950px" align="right"><strong>Centro de Ayuda</strong> | <a style="color:white;"
                                                                                 href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi
            cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a
                href='../compartido/boletas_de_pago.php' class="imgBox"></a>
    </div>
</div>
<div id="contenedor-interior">
    <?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <br>

    <div id="alerta-micuenta" class="alert alert-danger" style="display:none"></div>


    <div id="apDiv1">Mi Cuenta<br></div>
    <div id="contenido-interior">

        <br>
            <span class="titulos"><br>

                <div id="menu-solapas">
                    <div class="tabnueva">
                        <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Informaci&oacute;n del Establecimiento</a>
                    </div>
                    <div class="tabnueva">
                        <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_permisos.php">Permisos del Establecimiento</a>
                    </div>
                    <?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == 2) {?>
                        <div class="tabnueva">
                            <a href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mis_vehiculos.php">Veh&iacute;culos</a>
                        </div>
                    <?php } else { ?>
                        <div class="tabnueva">
                            <a href="./alta_sucursales/paso_1.php">Alta de Sucursales</a>
                        </div>
                    <?php }?>
                </div>
                <div style="height:2px; background-color:#5D9E00"></div>
            </span>
        <br>

        <p class="registro-titulo bg-primary">Cambiar contrase&ntilde;a</p>

        <div class="tablaBuscar" style="text-align:left;">
            <form class="form-inline" onsubmit="return false;">
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_actual"
                           placeholder="Contrase&ntilde;a actual">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_nueva"
                           placeholder="Nueva contrase&ntilde;a">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="contrasenia_nueva_bis"
                           placeholder="Confirmar contrase&ntilde;a">
                </div>
                <input id='btn_cambiar_contrasenia' type="submit" value="Cambiar" class="btn btn-success">
            </form>
        </div>

        <br>

        <p class="registro-titulo bg-primary">CAA</p>

        <div class="tablaBuscar" style="text-align:left;">
            <form class="form-inline" onsubmit="return false;">
                <div class="form-group">
                    Nro CAA:
                    <input type="text" class="form-control" id="establecimiento_caa_numero"
                           value="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
" placeholder="Nº de expediente">
                </div>
                <div class="form-group">
                    Fecha Vencimiento:
                    <input type="text" class="form-control" id="establecimiento_caa_vencimiento"
                           value="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
" placeholder="Fecha de caducidad CAA">
                </div>
                <input id='btn_cambiar_caa' type="submit" value="Cambiar" class="btn btn-success">
            </form>
        </div>
        <br>


        <p class="registro-titulo bg-primary">Datos de la empresa</p>

        <div class="table-responsive tablaBuscar">

            <form>

                <input id="geocomplete" type="hidden">
                <input id="pais_r" type="hidden" data-nombre="ARGENTINA">

                <table width="100%" border="0" cellspacing="0" cellpadding="5" style="font-size:13px;"
                       id="tablas-forms">

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Nombre<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='establecimiento_nombre'
                                                         id='establecimiento_nombre' value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
'
                                                         size='30'></td>
                    </tr>

                    <tr id="establecimiento_nombre-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="establecimiento_nombre-error"
                                 style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Descripci&oacute;n<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><textarea type='text' name='descripcion' id='descripcion'
                                                            style="min-width:396px;height:80px;resize:vertical;"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</textarea>
                        </td>
                    </tr>

                    <tr id="descripcion-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="descripcion-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="left" height="25" bordercolor="#EAEAE5"
                            style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO REAL
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><select style="width: 300px;" name='provincia_r' id='provincia_r'>
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
'
                                            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R'] == $_smarty_tpl->tpl_vars['PROVINCIA']->value['CODIGO']) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['PROVINCIA']->value['DESCRIPCION'];?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['PROVINCIA'] = $foreach_PROVINCIA_Sav;
}
?>
                            </select></td>
                    </tr>

                    <tr id="provincia_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="provincia_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <select style="width: 396px;" name='localidad_r' id='localidad_r'>
                                <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
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
'
                                            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R'] == $_smarty_tpl->tpl_vars['LOCALIDAD']->key) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->value;?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['LOCALIDAD'] = $foreach_LOCALIDAD_Sav;
}
?>
                            </select>
                        </td>
                    </tr>

                    <tr id="localidad_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr id="localidad_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Calle<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='calle_r' id='calle_r'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
' size='30'></td>
                    </tr>

                    <tr id="calle_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="calle_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='numero_r' id='numero_r'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
' size='30'></td>
                    </tr>

                    <tr id="numero_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="numero_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Piso:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='piso_r' id='piso_r'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
' size='30'></td>
                    </tr>

                    <tr id="piso_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="piso_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='cpostal_r' id='cpostal_r'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_R'];?>
' size='30'></td>
                    </tr>

                    <tr id="cpostal_r-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="cpostal_r-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="30" align="left" bordercolor="#EAEAE5" style="padding:5px">Coordenadas
                            geogr&aacute;ficas del establecimiento:
                        </td>
                        <td>
                            <div style="display:none">
                                <span id="latitud_r" data-geo="lat">lat</span>
                                <span id="longitud_r" data-geo="lng">lng</span>
                            </div>
                            <div class="mapa-establecimiento" style="width: 396px; height: 300px"></div>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2" align="left" height="25" bordercolor="#EAEAE5"
                            style="font-size: 14px;color:#4D90FE;" class="titulos">DOMICILIO CONSTITUIDO
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Provincia<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><select style="width: 300px;" name='provincia_c' id='provincia_c'>
                                <option value="">[SELECCIONE UNA PROVINCIA]</option>
                                <option value="2" data-nombre="CIUDAD AUTONOMA DE BS AS"
                                        <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C'] == 2) {?>selected<?php }?>>CIUDAD AUTONOMA DE BS AS
                                </option>
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
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="provincia_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Localidad<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <select style="width: 396px;" name='localidad_c' id='localidad_c'>
                                <option value="">[SELECCIONA UNA PROVINCIA PARA LISTAR SUS LOCALIDADES]</option>
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
'
                                            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C'] == $_smarty_tpl->tpl_vars['LOCALIDAD']->key) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['LOCALIDAD']->value;?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['LOCALIDAD'] = $foreach_LOCALIDAD_Sav;
}
?>
                            </select>
                        </td>
                    </tr>

                    <tr id="localidad_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="localidad_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Calle<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='calle_c' id='calle_c'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
' size='30'></td>
                    </tr>

                    <tr id="calle_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="calle_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">N&uacute;mero<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='numero_c' id='numero_c'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
' size='30'></td>
                    </tr>

                    <tr id="numero_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="numero_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Piso:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='piso_c' id='piso_c'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
' size='30'></td>
                    </tr>

                    <tr id="piso_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="piso_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">C&oacute;digo Postal<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='cpostal_c' id='cpostal_c'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_C'];?>
' size='30'></td>
                    </tr>

                    <tr id="cpostal_c-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="cpostal_c-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5" rowspan="2">Nomenclatura
                            Catastral<span class="obligatorio">*</span>:&nbsp;</td>
                        <td>

                            Circ <select name='establecimiento_nomenclatura_catastral_circ'
                                         id='establecimiento_nomenclatura_catastral_circ'>
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
'
                                            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'] == $_smarty_tpl->tpl_vars['CIRC']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['CIRC']->value;?>
</option>
                                <?php
$_smarty_tpl->tpl_vars['CIRC'] = $foreach_CIRC_Sav;
}
?>
                            </select>


                            Sec <select name='establecimiento_nomenclatura_catastral_sec'
                                        id='establecimiento_nomenclatura_catastral_sec'>
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
'
                                            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'] == $_smarty_tpl->tpl_vars['SEC']->value) {?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['SEC']->value;?>
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

                            Manz <input type='text' name='establecimiento_nomenclatura_catastral_manz'
                                        id='establecimiento_nomenclatura_catastral_manz'
                                        value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
' size='4'>


                            Parc <input type='text' name='establecimiento_nomenclatura_catastral_parc'
                                        id='establecimiento_nomenclatura_catastral_parc'
                                        value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
' size='4'>


                            Sub Parc <input type='text' name='establecimiento_nomenclatura_catastral_sub_parc'
                                            id='establecimiento_nomenclatura_catastral_sub_parc'
                                            value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
' size='4'>

                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Habilitaciones<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='habilitaciones' id='habilitaciones'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['HABILITACIONES'];?>
' size='30'></td>
                    </tr>

                    <tr id="habilitaciones-td" style="display:none">
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="habilitaciones-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                    <tr>
                        <td width="15%" height="25" align="left" bordercolor="#EAEAE5">Direcci&oacute;n Email<span
                                    class="obligatorio">*</span>:&nbsp;</td>
                        <td bordercolor="#EAEAE5"><input type='text' name='direccion_email' id='direccion_email'
                                                         value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EMAIL'];?>
' size='35'></td>
                    </tr>

                    <tr id="direccion_email-td" style="display:none">
                        <td width="15%" height="10" align="left" bordercolor="#EAEAE5">&nbsp;</td>
                        <td bordercolor="#EAEAE5">
                            <div id="direccion_email-error" style="text-align:left;color:red;display:none;"></div>
                        </td>
                    </tr>

                </table>

            </form>

        </div>

        <table width="100%" cellspacing="0" cellpadding="0" border="0" style="margin-top: 10px;">
            <tbody>
            <tr>
                <?php if ($_smarty_tpl->tpl_vars['CAMBIOS_PENDIENTES']->value == 0) {?>
                    <td align="right"><input type="button" class="btn btn-success" value="Guardar cambios"
                                             id="btn_guardar_cambios" name="btn_guardar_cambios"/></td>
                <?php } else { ?>
                    <?php echo '<script'; ?>
>
                        $(function () {
                            $("#alerta-micuenta").show().html("Para requerir un nuevo cambio deber&aacute; esperar a que se eval&uacute;e el actual.");
                        });
                    <?php echo '</script'; ?>
>
                <?php }?>
            </tr>
            </tbody>
        </table>
        </form>
        </tbody>


    </div>
</div>
</body>


    <?php echo '<script'; ?>
 type="text/javascript">

        var registro_actual = null;

        $(function () {

            $("alerta-micuenta").hide();

            $('#establecimiento_caa_vencimiento').datepicker({
                format: 'dd/mm/yyyy',
                startView: 'decade',
                startDate: new Date()
            }).on('changeDate', function (e) {
                $(this).datepicker('hide');
            });

            coordenadas = $("#latitud_r").text() + ', ' + $("#longitud_r").text();

            actualizar_mapa('mapa-establecimiento', coordenadas);

            $('#numero_r').filter_input({regex: '[0-9]'});
            $('#piso_r').filter_input({regex: '[0-9]'});
            $('#numero_c').filter_input({regex: '[0-9]'});
            $('#piso_c').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_manz').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_parc').filter_input({regex: '[0-9]'});
            $('#establecimiento_nomenclatura_catastral_sub_parc').filter_input({regex: '[0-9]'});

            $('#btn_cambiar_contrasenia').on('click', function () {
                var campos = ['general'];
                var prefijo = '';

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        'accion': 'contrasenia',
                        'contrasenia_actual': $('#contrasenia_actual').val(),
                        'contrasenia_nueva': $('#contrasenia_nueva').val(),
                        'contrasenia_nueva_bis': $('#contrasenia_nueva_bis').val()
                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) {
                            mostrarMensaje("", "Contrase&ntilde;a actualizada de forma exitosa", "success");
                            $("#btn_cambiar_contrasenia").attr('disabled', 'disabled');
                        }
                        else {

                            for (campo in campos) {
                                campo = campos[campo];

                                if (retorno['errores'][campo] != null) {
                                    mostrarMensaje("exclamation-triangle", retorno['errores'][campo], "warning");
                                }
                            }
                        }
                    }

                });
            })

            $('#btn_guardar_cambios').click(function () {
                var campos = ['establecimiento_nombre', 'descripcion',
                    'provincia_r', 'localidad_r', 'calle_r', 'numero_r', 'piso_r', 'cpostal_r',
                    'latitud_r', 'longitud_r',
                    'provincia_c', 'localidad_c', 'calle_c', 'numero_c', 'piso_c', 'cpostal_c',
                    'habilitaciones', 'direccion_email', 'general'
                ];

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        accion: 'establecimiento',
                        establecimiento_nombre: $("#establecimiento_nombre").val(),
                        descripcion: $("#descripcion").val(),
                        provincia_r: $("#provincia_r").val(),
                        localidad_r: $("#localidad_r").val(),
                        calle_r: $("#calle_r").val(),
                        numero_r: $("#numero_r").val(),
                        piso_r: $("#piso_r").val(),
                        cpostal_r: $("#cpostal_r").val(),
                        latitud_r: $("#latitud_r").text(),
                        longitud_r: $("#longitud_r").text(),
                        calle_c: $("#calle_c").val(),
                        numero_c: $("#numero_c").val(),
                        piso_c: $("#piso_c").val(),
                        cpostal_c: $("#cpostal_c").val(),
                        provincia_c: $("#provincia_c").val(),
                        localidad_c: $("#localidad_c").val(),
                        nomenclatura_catastral_circ: $("#establecimiento_nomenclatura_catastral_circ").val(),
                        nomenclatura_catastral_sec: $("#establecimiento_nomenclatura_catastral_sec").val(),
                        nomenclatura_catastral_manz: $("#establecimiento_nomenclatura_catastral_manz").val(),
                        nomenclatura_catastral_parc: $("#establecimiento_nomenclatura_catastral_parc").val(),
                        nomenclatura_catastral_sub_parc: $("#establecimiento_nomenclatura_catastral_sub_parc").val(),
                        habilitaciones: $("#habilitaciones").val(),
                        direccion_email: $("#direccion_email").val()
                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) 
                        {

                            // saco el boton
                            $('#btn_guardar_cambios').attr('disabled', 'disabled');
                            
                            mostrarMensajeYRedireccionar('Sus cambios han sido recibos y est&aacute;n pendientes de aprobaci&oacute;n de la DRP');

                        }
                        else {
                            for (campo in campos) {
                                texto_errores = '';
                                campo = campos[campo];

                                if (retorno['errores'][campo] != null) {
                                    texto_errores = retorno['errores'][campo];
                                    $('#' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
                                    $('#' + campo).addClass('error_de_carga');
                                }
                                else {
                                    $('#' + campo).removeClass('error_de_carga');
                                }

                                if (texto_errores != '') {
                                    $('#' + campo + '-error').html(texto_errores);
                                    $('#' + campo + '-td').show();
                                    $('#' + campo + '-error').show();
                                    ;
                                }
                                else {
                                    $('#' + campo + '-error').hide();
                                    $('#' + campo + '-td').hide();
                                }

                            }
                            mostrarMensaje('exclamation-triangle', 'Hubo errores a la hora de procesar el formulario, revise los campos indicados.', 'warning');
                            return false;
                        }
                    }
                });
            })

            $('#btn_cambiar_caa').click(function () {
                var campos = [
                    'caa_numero', 'caa_vencimiento'
                ];

                $.ajax({
                    type: "POST",
                    url: mel_path + "/operacion/compartido/mi_cuenta.php",
                    data: {
                        accion: 'cambio_caa',
                        caa_numero: $("#establecimiento_caa_numero").val(),
                        caa_vencimiento: $("#establecimiento_caa_vencimiento").val()

                    },
                    dataType: "text json",
                    success: function (retorno) {
                        if (retorno['estado'] == 0) {
                            
                            // saco el boton
                            $('#btn_cambiar_caa').attr('disabled', 'disabled');
                            
                            mostrarMensajeYRedireccionar('Sus cambios han sido recibos y est&aacute;n pendientes de aprobaci&oacute;n de la DRP');
                        }
                        else {
                            mostrarMensaje("exclamation-triangle", retorno['errores']['general'], "warning");
                            return false;
                        }
                    }
                });
            })

            var cambio_localidad_pendiente = null;

            $('#provincia_r').change(function () {
                limpiar_calle_num('r', '');
                actualizar_localidades_r();
                actualizar_mapa('mapa-establecimiento', '');
            });

            $('#provincia_c').change(function () {
                actualizar_localidades_c();
            });

            $('#localidad_r').change(function () {
                $.ajax({
                    type: "POST",
                    url: mel_path + "/servicios/punto_inicio.php",
                    data: {
                        calle: $("#calle_r").val(),
                        numero: $("#numero_r").val(),
                        provincia: $("#provincia_r").val(),
                        localidad: $("#localidad_r").val()
                    },
                    dataType: "text",
                    success: function (punto_inicio) {
                        actualizar_mapa('mapa-establecimiento', '');
                    }
                });
            })

            function actualizar_localidades_r() {
                $.getJSON(mel_path + '/servicios/localidades.php', {provincia: $("#provincia_r").val()}, function (json) {

                    $('#localidad_r').find('option').remove();

                    $.each(json, function (codigo, descripcion) {
                        $('#localidad_r').append('<option value="' + codigo + '" data-nombre="' + descripcion + '">' + descripcion + '</option>').val(codigo);
                    });

                    $("#localidad_r").prepend('<option>[SELECCIONE UNA LOCALIDAD]</option>');

                    $('#localidad_r').val($('#localidad_r option:first').val());
                });
            }

            function actualizar_localidades_c() {
                $.getJSON(mel_path + '/servicios/localidades.php', {provincia: $("#provincia_c").val()}, function (json) {

                    $('#localidad_c').find('option').remove();

                    $.each(json, function (codigo, descripcion) {
                        $('#localidad_c').append('<option value="' + codigo + '">' + descripcion + '</option>').val(codigo);
                    });

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