<?php /* Smarty version 3.1.27, created on 2016-03-21 13:38:38
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flota_detalle.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:42461343656f0238eb03949_05374607%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de4c0891bca1719aba4f99231c4939273409c491' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/transportista/flota_detalle.tpl',
      1 => 1443651970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '42461343656f0238eb03949_05374607',
  'variables' => 
  array (
    'FLOTA' => 0,
    'COLOR_LINEA' => 0,
    'VEHICULO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f0238ebeb680_45138833',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f0238ebeb680_45138833')) {
function content_56f0238ebeb680_45138833 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '42461343656f0238eb03949_05374607';
?>
<div class="backGrey">
    <div class="headerPopUp">
        <div class="textLeft">
          DATOS DE LA FLOTA
        </div>


    </div>
    <div class="clear20"></div>
    <button type="button" id='btn_agregar_vehiculo' class="btn btn-success"style="float:right;">
            <i class="fa fa-truck icon-large"></i> Agregar vehiculo
    </button>

        <div class="clear20"></div>
        <table width="100%" border="0" cellpadding="5" cellspacing="0" id="lista_vehiculos">
	<tr>
		<td width="100" bgcolor="#A8D8EA" class="invisible">Id</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Dominio</td>
		<td width="100" bgcolor="#A8D8EA" class="td">Descripci&oacute;n</td>
		<td width="25"  bgcolor="#A8D8EA" class="td">&nbsp;</td>
	</tr>

	<?php
$_from = $_smarty_tpl->tpl_vars['FLOTA']->value['VEHICULOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
$_smarty_tpl->tpl_vars['VEHICULO']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$_smarty_tpl->tpl_vars['VEHICULO']->iteration++;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
		<?php if (!(1 & $_smarty_tpl->tpl_vars['VEHICULO']->iteration / 1)) {?>
			<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#EAEAE5", null, 0);?>
		<?php } else { ?>
			<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#F7F7F5", null, 0);?>
		<?php }?>
	<tr>
		<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
</td>
		<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</td>
		<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td"><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</td>
		<td width="25" align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
"><a class='btn_borrar_vehiculo'><span title='Eliminar Flota' class='fa fa-times'></span></a></td>
	</tr>
	<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
</table>
<table id="lista_vehiculos2" width="100%" border="0" cellpadding="5">
	<tr>
		<td width="100" class="invisible"></td>
		<td width="100" class="td"></td>
		<td width="100" class="td"></td>
		<td width="25" class="td"></td>
	</tr>
</table>

 <div class="clear20"></div>

    <div style="text-align: center;">
		<input class="btn btn-success btn-sm" type="button" data-dismiss="modal" id='btn_aceptar_1' value="Aceptar" style="margin: 15px;"/>
		<input class="btn btn-danger btn-sm" type="button" data-dismiss="modal" id="btn_cancelar" value="Cancelar" style="margin: 15px;"/>
	</div>

    <div class="clear20"></div>

    </div>
<?php echo '<script'; ?>
>




	function agregar_vehiculo_flota(vehiculo){
		
		color = colores[$('#lista_vehiculos> tbody:last').find("td:last").attr("bgcolor")];
		if(color == undefined)
			color = '#F7F7F5';

		datos = "\
		<tr id='" + vehiculo["ID"] + "'>\
			<td bgcolor='" + color + "' class='invisible' id='id'>"    + vehiculo["ID"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + vehiculo["DOMINIO"] + "</td>\
			<td bgcolor='" + color + "' class='td' id=''>"             + vehiculo["DESCRIPCION"] + "</td>\
			<td align='center' bgcolor='" + color + "' ><a onclick='btn_borrar_vehiculo(" + vehiculo["ID"] + ")'><span title='Eliminar Flota' class='fa fa-times'></span></a></td>\
		</tr>";

		$('#lista_vehiculos2> tbody:last').append(datos);
	}

	$("#btn_agregar_vehiculo").click(function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   dataType: "html",
		   success: function(retorno){
				 BootstrapDialog.show({
		            title: 'Buscar  Veh&iacute;culo',
		            message: $(retorno),
		        });
		   	/*
		   		$('#div_2_popup_title').html("Agregar vehiculo");
				$('#div_2_popup_body').html(retorno);
				$('#div_2_popup_content').width(600);
				$('#div_2_popup').modal('show');*/
		   }

		 });
	});

	$(".btn_borrar_vehiculo").on('click', function() {
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "baja", id : registro_actual.find('#id').html()},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	});

	function btn_borrar_vehiculo(vehiculo){
		registro_actual = $(this).parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/transportista/vehiculo_flota.php",
		   data: {accion : "baja", id : vehiculo},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['general']);
				}else{
					$("#" + vehiculo).remove();
				}
		   }
		 });
	};
		//operador

<?php echo '</script'; ?>
><?php }
}
?>