<?php /* Smarty version 3.1.27, created on 2016-03-21 13:38:25
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flota.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:36017071456f0238174e138_05652444%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c08549d24ed67b024215bdda1d016762121b43d7' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flota.tpl',
      1 => 1443651969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36017071456f0238174e138_05652444',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f023817dfe75_11149966',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f023817dfe75_11149966')) {
function content_56f023817dfe75_11149966 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '36017071456f0238174e138_05652444';
?>
<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
          CREAR NUEVA FLOTA
        </div>

    </div>
    <div class="clear20"></div>
    <table width="500" border="0" cellspacing="0" cellpadding="5">
		<tr>
			<td width="100" height="25" align="right" bordercolor="#EAEAE5">Descripci&oacute;n :</td>
			<td width="340" bordercolor="#EAEAE5"><label><input type='text' name='flota_descripcion' id='flota_descripcion' size='35'></label></td>
		</tr>

		<tr id='sumario_errores' class='invisible'>
			<td colspan="2" align="left" color="red"></td>
		</tr>
	</table>
     <div class="clear20"></div>

    <div style="text-align: center;">
		<input class="btn btn-success btn-sm" type="button" data-dismiss="modal" id='btn_aceptar' value="Aceptar" style="margin: 15px;"/>
		<input class="btn btn-danger btn-sm" type="button" data-dismiss="modal" id="btn_cancelar" value="Cancelar" style="margin: 15px;"/>
	</div>

    <div class="clear20"></div>

    </div>

<?php echo '<script'; ?>
>
	$('#btn_aceptar').on('click', function() {
		var campos  = [	'descripcion' ];
		var prefijo = 'flota';

		$.ajax({
			type: "POST",
			url: mel_path+"/operacion/transportista/flota.php",
			data:	{	accion      : 'alta',
						descripcion : $("#flota_descripcion").val(),
					},
			dataType: "text json",
			success: function(retorno){
										if(retorno['estado'] == 0){
											agregar_flota(retorno['datos']);
											$('#div_popup').hide();
                                            cerrar();
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
													$('#sumario_errores td:first').html(texto_errores);
													$('#sumario_errores').show();
													;
												}else{
													$('#sumario_errores').hide();
                                                                                                            cerrar();
												}
											}
										}
									}

		 });
	})
<?php echo '</script'; ?>
>
<?php }
}
?>