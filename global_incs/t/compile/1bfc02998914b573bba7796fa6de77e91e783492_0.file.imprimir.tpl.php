<?php /* Smarty version 3.1.27, created on 2015-11-20 10:29:45
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/imprimir.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:850066241564f20491fbab1_22099190%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bfc02998914b573bba7796fa6de77e91e783492' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/imprimir.tpl',
      1 => 1443651958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '850066241564f20491fbab1_22099190',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'EMPRESA' => 0,
    'REPRESENTANTE' => 0,
    'ESTABLECIMIENTO' => 0,
    'PERMISO' => 0,
    'ELIMINACION' => 0,
    'VEHICULO' => 0,
    'CODIGO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f2049397559_37617448',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f2049397559_37617448')) {
function content_564f2049397559_37617448 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '850066241564f20491fbab1_22099190';
?>
<div style="width:100%;color: #333333;font-size:9px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;">

    <div id="container">
        <div style="float:left;margin-left:30px;width:70px;">
            <img src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/imagenes/logo_impresion.gif" />
        </div>
        <div style="float:left;margin:29px 0px 0px 110px;"><strong>SECRETARIA DE AMBIENTE Y DESARROLLO SUSTENTABLE <br> DIRECCION DE RESIDUOS PELIGROSOS</strong></div>
    </div>
    <div style="clear:both;"></div>

    <div style="padding:5px">
        <table style="width:755px;border: 1px solid black;border-collapse:collapse;font-size:11px; font-family: Arial,Helvetica,sans-serif;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>DATOS DE LA EMPRESA</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CUIT'];?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>ROLES: </strong><?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['GENERADOR']) {?>
                    Generador
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['TRANSPORTISTA']) {?>
                    Transportista
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value['ROLES']['OPERADOR']) {?>
                    Operador
                    <?php }?>
                </td>
                <td style="border: 1px solid black;"><strong>Fec. Ini. Act: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['FECHA_INICIO_ACT'];?>
</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NOMBRE'];?>
</td>
                <td style="border: 1px solid black;"><strong>TELEFONO: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_TELEFONICO'];?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_R'];?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_R'];?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_R'];?>
&nbsp;<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_R'];?>
<strong><br>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_R_'];?>
<strong>&nbsp;Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_R_'];?>
<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_R'];?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_L'];?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_L'];?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_L'];?>
&nbsp;<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_L'];?>
<strong><br>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_L_'];?>
<strong>&nbsp;Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_L_'];?>
<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_L'];?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CALLE_C'];?>
<strong>&nbsp;N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['NUMERO_C'];?>
<strong>&nbsp;Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PISO_C'];?>
<strong>&nbsp;Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['OFICINA_C'];?>
<strong><br>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['PROVINCIA_C_'];?>
<strong>&nbsp;Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['LOCALIDAD_C_'];?>
<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value['CPOSTAL_C'];?>
</td>
            </tr>
        </table>

    

    <br><br><br>
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
        <table style="width:755px;border: 1px solid black;font-size:11px; font-family: Arial,Helvetica,sans-serif;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE LEGAL</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</td>
            </tr>

        </table>

    
    <br><br>
    <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>

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
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>REPRESENTANTE TECNICO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NOMBRE'];?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['APELLIDO'];?>
</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['FECHA_NACIMIENTO'];?>
</td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['TIPO_DOCUMENTO_'];?>
</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['NUMERO_DOCUMENTO'];?>
</td>
                <td style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CUIT'];?>
</td>
                <td height="20" ><strong>Cargo: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value['CARGO'];?>
</td>
            </tr>

        </table>

    
    <br><br><br>

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
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black; text-align:center;background-color: gainsboro;"><strong>ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td>
                <td  style="border: 1px solid black;"><strong>TIPO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO_'];?>
</td>
                <td colspan="2"style="border: 1px solid black;"><strong>USUARIO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO'];?>
</td>


            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CAA: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
</td>
                <td colspan="3" style="border: 1px solid black;"><strong>CAA VENCIMIENTO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
</td>
            </tr>
            <tr>
                <td colspan="4"><strong>Expediente / A&ntilde;o: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
 / <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
</td>
            </tr>
            <tr>
                <td  colspan="4" style="border: 1px solid black;"><strong>ACTIVIDAD: </strong>
                <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD_'];?>
</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DESCRIPCION: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DIRECCI&Oacute;N EMAIL: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DIRECCION_EMAIL'];?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
&nbsp;<strong><br>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_'];?>
<strong>&nbsp;Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_'];?>
<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_R'];?>
</td>

            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO:<br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
<strong>&nbsp;N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
<strong>&nbsp;Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
<strong><br>Provincia: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_'];?>
<strong>&nbsp;Localidad: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_'];?>
<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CPOSTAL_C'];?>
</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMENCLATURA CATASTRAL </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
</td>
                <td  style="border: 1px solid black;" colspan="3"><strong>HABILITACIONES: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['HABILITACIONES'];?>
</td>
            </tr>
        </table>
        <br>
        
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
        <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
            <tr>
                <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL ESTABLECIMIENTO</strong></td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td>
                <td colspan="3" rowspan="2" style="border: 1px solid black;"><strong>RESIDUO: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</td>


            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CANTIDAD: </strong><?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 1) {
echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];
} else { ?>-<?php }?></td>
            </tr>

            <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 3) {?>
            <tr>
                <td colspan="4" style="border: 1px solid black;"><strong>PERMISOS DE ELIMINACION DE RESIDUOS: </strong><br>
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
                </td>
            </tr>
            <?php }?>

        </table>
        <br>
      <?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

      <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 2) {?>

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
            <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                <tr>
                    <td colspan="4" style="background-color: gainsboro;border: 1px solid black;text-align:center;"><strong>VEHICULO REGISTRADO</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</td>
                    <td style="border: 1px solid black;"><strong>DOMINIO: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
                    <td colspan="2" style="border: 1px solid black;"><strong>DESCRIPCION: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td>
                </tr>

            </table>

            <br>

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
            <table style="width:755px;font-size:11px; font-family: Arial,Helvetica,sans-serif;border: 1px solid black;border-collapse:collapse;">
                <tr>
                    <td colspan="4" style="border: 1px solid black;text-align:center;background-color: gainsboro;"><strong>PERMISOS DEL VEHICULO</strong></td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>VEHICULO: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
                    <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</td>
                </tr>
                <tr>
                    <td  style="border: 1px solid black;"><strong>CANTIDAD: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
</td>
                    <td style="border: 1px solid black;"><strong>ESTADO: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ESTADO_'];?>
</td>
                </tr>
            </table>
            <?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
        <?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
      <?php }?>
    <br><br><br>
    <?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>

<div style="width:90%;text-align: center;margin:auto;">
<table> 
        <!--
        <tr>
                <td height="20" bgcolor="#EAEAE5"><img src="http://manifiestos/me/registracion/barcode.php?code=<?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
"></td>
        </tr>
        -->
        <tr>
                <td height="20" bgcolor="#EAEAE5"><strong>N&uacute;mero de registraci&oacute;n: </strong><?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
</td>
        </tr>
</table>
</div>
</div>
</div>


<?php }
}
?>