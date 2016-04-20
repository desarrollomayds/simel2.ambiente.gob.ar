<?php /* Smarty version 3.1.27, created on 2015-11-20 10:38:36
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/imprimir_solicitud_registro.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:640047085564f225ca623b5_20719319%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f2879c11bbab646183b73ba9481d0d6632280bfc' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/imprimir_solicitud_registro.tpl',
      1 => 1443651963,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '640047085564f225ca623b5_20719319',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'EMPRESA' => 0,
    'ESTABLECIMIENTOS' => 0,
    'ESTABLECIMIENTO' => 0,
    'REPRESENTANTE' => 0,
    'PERMISO' => 0,
    'TRATAMIENTO' => 0,
    'VEHICULO' => 0,
    'CODIGO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f225ccbce13_97962121',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f225ccbce13_97962121')) {
function content_564f225ccbce13_97962121 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '640047085564f225ca623b5_20719319';
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
                <td style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->cuit;?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>ROLES: </strong>
                    <?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value) {
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->_loop = true;
$foreach_ESTABLECIMIENTO_Sav = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO'];
?>
                        <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 1) {?>
                            Generador
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 2) {?>
                            Transportista
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 3) {?>
                            Operador
                        <?php }?>
                    <?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>
                </td>
                <td style="border: 1px solid black;"><strong>Fec. Ini. Act: </strong>
                    <?php if ($_smarty_tpl->tpl_vars['EMPRESA']->value->fecha_inicio_act != '') {?>
                        <?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->fecha_inicio_act->format('Y-m-d');?>

                    <?php } else { ?>
                        &nbsp;
                    <?php }?>
                    </td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->nombre;?>
</td>
                <td style="border: 1px solid black;"><strong>TELEFONO: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->numero_telefonico;?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->calle;?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->numero;?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->piso;?>
&nbsp;<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->oficina;?>
<strong><br>Provincia: </strong><?php echo obtener_provincia($_smarty_tpl->tpl_vars['EMPRESA']->value->provincia);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->provincia;?>
)<strong>&nbsp;Localidad: </strong><?php echo obtener_localidad($_smarty_tpl->tpl_vars['EMPRESA']->value->localidad);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->localidad;?>
)<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->codigo_postal;?>
</td>

            </tr>

            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO LEGAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->calle_l;?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->numero_l;?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->piso_l;?>
&nbsp;<strong>Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->oficina_l;?>
<strong><br>Provincia: </strong><?php echo obtener_provincia($_smarty_tpl->tpl_vars['EMPRESA']->value->provincia_l);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->provincia_l;?>
)<strong>&nbsp;Localidad: </strong><?php echo obtener_localidad($_smarty_tpl->tpl_vars['EMPRESA']->value->localidad_l);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->localidad_l;?>
)<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->codigo_postal_l;?>
</td>
            </tr>

            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->calle_c;?>
<strong>&nbsp;N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->numero_c;?>
<strong>&nbsp;Piso: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->piso_c;?>
<strong>&nbsp;Oficina: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->oficina_c;?>
<strong><br>Provincia: </strong><?php echo obtener_provincia($_smarty_tpl->tpl_vars['EMPRESA']->value->provincia_c);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->provincia_c;?>
)<strong>&nbsp;Localidad: </strong><?php echo obtener_localidad($_smarty_tpl->tpl_vars['EMPRESA']->value->localidad_c);?>
 (<?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->localidad_c;?>
)<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['EMPRESA']->value->codigo_postal_c;?>
</td>
            </tr>
        </table>

    <br><br><br>

    <?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value->representantes_legales;
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
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->nombre;?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->apellido;?>
</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>
                    <?php if ($_smarty_tpl->tpl_vars['REPRESENTANTE']->value->fecha_nacimiento != '') {?>
                        <?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->fecha_nacimiento->format('Y-m-d');?>

                    <?php } else { ?>
                        &nbsp;
                    <?php }?>
                </td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->tipo_documento;?>
</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->numero_documento;?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->cuit;?>
</td>
            </tr>
        </table>
        <br><br>
    <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>


    <?php
$_from = $_smarty_tpl->tpl_vars['EMPRESA']->value->representantes_tecnicos;
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
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->nombre;?>
</td>
                <td colspan="2" style="border: 1px solid black;"><strong>APELLIDO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->apellido;?>
</td>
                <td style="border: 1px solid black;"><strong>FECHA DE NACIMIENTO: </strong>
                    <?php if ($_smarty_tpl->tpl_vars['REPRESENTANTE']->value->fecha_nacimiento != '') {?>
                        <?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->fecha_nacimiento->format('Y-m-d');?>

                    <?php } else { ?>
                        &nbsp;
                    <?php }?>
               </td>

            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>TIPO DOCUMENTO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->tipo_documento;?>
</td>
                <td style="border: 1px solid black;"><strong>NUMERO: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->numero_documento;?>
</td>
                <td style="border: 1px solid black;"><strong>CUIT: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->cuit;?>
</td>
                <td height="20" ><strong>Cargo: </strong><?php echo $_smarty_tpl->tpl_vars['REPRESENTANTE']->value->cargo;?>
</td>
            </tr>
        </table>
        <br><br><br>
    <?php
$_smarty_tpl->tpl_vars['REPRESENTANTE'] = $foreach_REPRESENTANTE_Sav;
}
?>


    <?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTOS']->value;
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
                <td style="border: 1px solid black;"><strong>NOMBRE: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nombre;?>
</td>
                <td  style="border: 1px solid black;"><strong>TIPO: </strong><?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo);?>
</td>
                <td colspan="2"style="border: 1px solid black;"><strong>USUARIO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->usuario;?>
</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>CAA: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->caa_numero;?>
</td>
                <td colspan="3" style="border: 1px solid black;"><strong>CAA VENCIMIENTO: </strong><?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->caa_vencimiento != '') {
echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->caa_vencimiento->format('Y-m-d');
} else { ?>&nbsp;<?php }?></td>
            </tr>
            <tr>
                <td colspan="4">
                    <strong>Expediente / A&ntilde;o: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->expediente_numero;?>
 / <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->expediente_anio;?>

                </td>
            </tr>
            <tr>
                <td  colspan="4" style="border: 1px solid black;"><strong>ACTIVIDAD: </strong>
                <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->codigo_actividad;?>
 - <?php echo utf8_encode(obtener_actividad($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->codigo_actividad));?>
</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DESCRIPCION: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->descripcion;?>
</td>
            </tr>
            <tr>
                <td COLSPAN="4" style="border: 1px solid black;"><strong>DIRECCI&Oacute;N EMAIL: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->email;?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO REAL: <br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->calle;?>
&nbsp;<strong>N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->numero;?>
&nbsp;<strong>Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->piso;?>
&nbsp;<strong><br>Provincia: </strong><?php echo obtener_provincia($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->provincia);?>
 (<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->provincia;?>
)<strong>&nbsp;Localidad: </strong><?php echo obtener_localidad($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->localidad);?>
 (<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->localidad;?>
)<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->codigo_postal;?>
</td>
            </tr>
            <tr>
                <td colspan="4" style="border: 1px solid black;">DOMICILIO CONSTITUIDO:<br><strong>Calle: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->calle_c;?>
<strong>&nbsp;N&uacute;mero: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->numero_c;?>
<strong>&nbsp;Piso: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->piso_c;?>
<strong><br>Provincia: </strong><?php echo obtener_provincia($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->provincia_c);?>
 (<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->provincia_c;?>
)<strong>&nbsp;Localidad: </strong><?php echo obtener_localidad($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->localidad_c);?>
 (<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->localidad_c;?>
)<br><strong>C. Postal: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->codigo_postal_c;?>
</td>
            </tr>
            <tr>
                <td style="border: 1px solid black;"><strong>NOMENCLATURA CATASTRAL </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nomenclatura_catastral_circ;?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nomenclatura_catastral_sec;?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nomenclatura_catastral_manz;?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nomenclatura_catastral_parc;?>
 - <?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nomenclatura_catastral_sub_parc;?>
</td>
                <td  style="border: 1px solid black;" colspan="3"><strong>HABILITACIONES: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->habilitaciones;?>
</td>
            </tr>
        </table>
        <br>

        <?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->permisos_establecimientos;
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
                    <td style="border: 1px solid black;"><strong>ESTABLECIMEINTO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nombre;?>
</td>
                    <td colspan="3" rowspan="2" style="border: 1px solid black;"><strong>RESIDUO: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
 - <?php echo obtener_categoria_residuo($_smarty_tpl->tpl_vars['PERMISO']->value->residuo);?>
</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;"><strong>CANTIDAD: </strong><?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 1) {
echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;
} else { ?>-<?php }?></td>
                </tr>

                <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 3) {?>
                    <tr>
                        <td colspan="4" style="border: 1px solid black;"><strong>PERMISOS DE ELIMINACION DE RESIDUOS: </strong><br>
                            <ul>
                                <?php
$_from = $_smarty_tpl->tpl_vars['PERMISO']->value->tratamientos;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TRATAMIENTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TRATAMIENTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TRATAMIENTO']->value) {
$_smarty_tpl->tpl_vars['TRATAMIENTO']->_loop = true;
$foreach_TRATAMIENTO_Sav = $_smarty_tpl->tpl_vars['TRATAMIENTO'];
?>
                                    <li><?php echo $_smarty_tpl->tpl_vars['TRATAMIENTO']->value->operacion_residuo;?>
</li>
                                <?php
$_smarty_tpl->tpl_vars['TRATAMIENTO'] = $foreach_TRATAMIENTO_Sav;
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

          <?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->tipo == 2) {?>

            <?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->vehiculos;
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
                        <td style="border: 1px solid black;"><strong>ESTABLECIMIENTO: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value->nombre;?>
</td>
                        <td style="border: 1px solid black;"><strong>DOMINIO: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->dominio;?>
</td>
                        <td colspan="2" style="border: 1px solid black;"><strong>DESCRIPCION: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->descripcion;?>
</td>
                    </tr>

                </table>

                <br>

                <?php
$_from = $_smarty_tpl->tpl_vars['VEHICULO']->value->permisos_vehiculos;
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
                            <td style="border: 1px solid black;"><strong>VEHICULO: </strong><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value->dominio;?>
</td>
                            <td colspan="3" style="border: 1px solid black;"><strong>RESIDUO: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->residuo;?>
 - <?php echo obtener_categoria_residuo($_smarty_tpl->tpl_vars['PERMISO']->value->residuo);?>
</td>
                        </tr>
                        <tr>
                            <td  style="border: 1px solid black;"><strong>CANTIDAD: </strong><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value->cantidad;?>
</td>
                            <td style="border: 1px solid black;"><strong>ESTADO: </strong><?php echo obtener_estado($_smarty_tpl->tpl_vars['PERMISO']->value->estado);?>
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
    <tr>
       <td height="20" bgcolor="#EAEAE5"><img src="http://manifiestos/me/registracion/barcode.php?code=<?php echo $_smarty_tpl->tpl_vars['CODIGO']->value;?>
"></td>
    </tr>
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