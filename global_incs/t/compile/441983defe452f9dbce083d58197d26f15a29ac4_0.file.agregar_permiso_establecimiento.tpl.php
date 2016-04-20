<?php /* Smarty version 3.1.27, created on 2016-03-08 13:38:10
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/agregar_permiso_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:207366074556defff29637b1_55803075%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '441983defe452f9dbce083d58197d26f15a29ac4' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/agregar_permiso_establecimiento.tpl',
      1 => 1457455297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207366074556defff29637b1_55803075',
  'variables' => 
  array (
    'ESTABLECIMIENTOS' => 0,
    'ESTABLECIMIENTO' => 0,
    'RESIDUOS' => 0,
    'RESIDUO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56defff29e8357_91202972',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56defff29e8357_91202972')) {
function content_56defff29e8357_91202972 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '207366074556defff29637b1_55803075';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

    <title>Panel de Administraci&oacute;n</title>
    <!-- carga de css -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>'true'), 0);
?>

    <!-- carga de js y files especificos para la seccion -->
    <?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','chosen'=>'true'), 0);
?>


<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function popUp(URL) {
day = new Date();
id = day.getTime();
eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=0,scrollbars=0,location=0,statusbar=0,menubar=0,resizable=0,width=50,height=50,left = 655,top = 359');");
}
// End -->
<?php echo '</script'; ?>
>
</head>



<body style="margin-top:30px">
<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
           AGREGAR PERMISO ESTABLECIMIENTO
        </div>
        <div class="imgCerrar" onclick="cerrar();">
            <img class="hand" src="/imagenes/boton_cerrar.png" width="24" height="22" />
        </div>

    </div>
    <div class="clear20"></div>
    <table width="495" border="0" cellspacing="0" cellpadding="5" style="font-size: 11px;">

            <tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Establecimiento:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_establecimiento' id='permiso_establecimiento' style='width: 300px'>
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
				 <option value='<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
'><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</option>
			 <?php
$_smarty_tpl->tpl_vars['ESTABLECIMIENTO'] = $foreach_ESTABLECIMIENTO_Sav;
}
?>
																</select></label></td>
		</tr>

            <tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Residuo:</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_residuo' id='permiso_residuo' style='width: 300px'>
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
				 <option value='<?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
'><?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['CODIGO'];?>
 - <?php echo $_smarty_tpl->tpl_vars['RESIDUO']->value['DESCRIPCION'];?>
</option>
			 <?php
$_smarty_tpl->tpl_vars['RESIDUO'] = $foreach_RESIDUO_Sav;
}
?>
																</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Cantidad :</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_cantidad' id='permiso_cantidad' value='' size='35'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Estado :</td>
			<td width="328" bordercolor="#EAEAE5"><label>	<select name='permiso_estado' id='permiso_estado'>
																<option value='1'>l&iacute;quido</option>
																<option value='2'>s&oacute;lido</option>
																<option value='3'>semi-s&oacute;lido</option>
															</select></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de inicio:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_inicio'     id='permiso_fecha_inicio'     value='' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_inicio'></label></td>
		</tr>

		<tr>
			<td width="147" height="25" align="right" bordercolor="#EAEAE5">Fecha de finalizaci&oacute;n:</td>
			<td width="328" bordercolor="#EAEAE5"><label><input type='text'   name='permiso_fecha_fin'     id='permiso_fecha_fin'     value='' size='35' readonly="true"><input type='button' value='...' id='btn_cal_permiso_fecha_fin'></label></td>
		</tr>

		<tr id='sumario_errores_permiso_establecimiento' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
                                                                                                                                <div class="clear20"></div>
    <div class="contBoton">
        <div class="bottonLeft" id='btn_aceptar_2' >
            <img style="float:left; text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_aceptar.gif" width="91" height="30" />
        </div>
        <div class="bottonRight">
            <img onclick="cerrar();" style="float:right;text-decoration: none;  margin: 0;   padding: 0;   border: 0;   outline: 0;" class="hand"  src="/imagenes/boton_cancelar.gif" width="91" height="30" />
        </div>
    </div>

    <div class="clear20"></div>
    <?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'asignar'), 0);
?>

</body>
    

<?php echo '<script'; ?>
>
	var permiso_fecha_inicio_instancia = permiso_fecha_inicio_container;
	var permiso_fecha_fin_instancia    = permiso_fecha_fin_container;

	$(function(){
		$('#permiso_cantidad').filter_input({regex:'[0-9]'});

		permiso_fecha_inicio_instancia = new Epoch('permiso_fecha_inicio_container', 'popup', document.getElementById('permiso_fecha_inicio'), 0);
		permiso_fecha_fin_instancia    = new Epoch('permiso_fecha_fin_container', 'popup', document.getElementById('permiso_fecha_fin'),    0);
	});
$('#btn_cancelar_2').click(function() {
		$('#div_popup_2').hide();
	})

	$('#btn_cal_permiso_fecha_fin').click(function() {
		permiso_fecha_fin_instancia.toggle();
	})

	$('#btn_cal_permiso_fecha_inicio').click(function() {
		permiso_fecha_inicio_instancia.toggle();
	})

	$('#btn_cerrar').click(function() {
		$('#div_popup_2').hide();
		cerrar();

	})

	$('#btn_cancelar_2').click(function() {
		$('#div_popup_2').hide();
cerrar();
	})


	$('#btn_aceptar_2').click(function() {
		var campos  = [	'accion', 'establecimiento', 'id', 'residuo', 'cantidad', 'estado', 'fecha_inicio', 'fecha_fin' ];
		var prefijo = 'permiso';

		$.ajax({
			type: "POST",
			url: "/operacion/agregar_permiso_establecimiento.php",
			data:	{
						establecimiento : $("#permiso_establecimiento").val(),
						residuo         : $("#permiso_residuo").val(),
						cantidad        : $("#permiso_cantidad").val(),
						estado          : $("#permiso_estado").val(),
						fecha_inicio    : $("#permiso_fecha_inicio").val(),
						fecha_fin       : $("#permiso_fecha_fin").val()
					},
			dataType: "text json",
			success: function(retorno){
										if(retorno['estado'] == 0){
											location.reload();
										}else{
											texto_errores = '';
											for(campo in campos){
												campo = campos[campo];

												if(retorno['errores'][campo] != null){
													texto_errores = texto_errores + retorno['errores'][campo] + '<br>';
													$('#' + prefijo + '_' + campo + '_error').find('#descripcion').html(retorno['errores'][campo]);
													$('#' + prefijo + '_' + campo).addClass('error_de_carga');
												}else{
													$('#' + prefijo + '_' + campo).removeClass('error_de_carga');
												}

												if(texto_errores != ''){
													$('#sumario_errores_permiso_establecimiento td:first').html(texto_errores);
													$('#sumario_errores_permiso_establecimiento').show();
													;
												}else{
													$('#sumario_errores_permiso_establecimiento').hide();


												}
											}
										}
									}
		 });
	})
<?php echo '</script'; ?>
>
{include file='general/popup.tpl' ID_POPUP='asignar'}
</body>
<?php }
}
?>