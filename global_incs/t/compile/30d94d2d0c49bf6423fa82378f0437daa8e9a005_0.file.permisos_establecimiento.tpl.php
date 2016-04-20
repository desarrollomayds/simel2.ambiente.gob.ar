<?php /* Smarty version 3.1.27, created on 2016-03-28 16:53:51
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_sucursales/permisos_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:173913720756f98bcf78dc28_02451979%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30d94d2d0c49bf6423fa82378f0437daa8e9a005' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/alta_sucursales/permisos_establecimiento.tpl',
      1 => 1443651969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '173913720756f98bcf78dc28_02451979',
  'variables' => 
  array (
    'ROL_ID' => 0,
    'ESTABLECIMIENTO' => 0,
    'PERMISO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56f98bcf886138_53503160',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56f98bcf886138_53503160')) {
function content_56f98bcf886138_53503160 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '173913720756f98bcf78dc28_02451979';
?>


<div class="backGrey">
	
	<input type="hidden" id="rol_id_permiso" value="<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
">
	
	<div class="table-responsive">

		<table class="table table-striped"  id="lista_permisos">
			<thead>
			<tr class="registro-tabla-header">
			  	<th class="invisible">&nbsp;</th>
			  	<th class="text-center">RESIDUO</th>
			  	<?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
			  		<th class="text-center">CANTIDAD</th>
			  	<?php }?>
			  	<th class="text-center">ACCIONES</th>
			</tr>
			</thead>
			<tbody id="contenido_permisos">

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
				<tr>
					<td class="invisible" id="id"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
</td>
					<td class="text-center" id="residuo"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</td>
					<?php if ($_smarty_tpl->tpl_vars['ROL_ID']->value == '1') {?>
						<td class="text-center" id="cantidad"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
</td>
					<?php }?>
					<td class="text-center">
						<a href="javascript:void(0);" class="btn btn-primary btn-xs" onClick="editar_permiso($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
)" data-toggle="modal" data-target="#mel2_popup"><i class="fa fa-pencil-square-o fa-lg"></i></a>
						<a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
)"><i class="fa fa-trash-o fa-lg"></i></a>
					</td>
				</tr>
				<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

			</tbody>
		</table>

	</div>

    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" onclick="agregar_perm_al_establecimiento($(this))" data-toggle="modal" data-target="#mel2_popup">Agregar</a>
	    </div>
    </div>
</div>

<?php echo '<script'; ?>
>

	//permisos
	function modificar_permiso_establecimiento(permiso){
		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

		registro_actual = null;
	}

	function agregar_permiso_establecimiento(permiso){
		
		datos = "\
		<tr>\
			<td class='invisible' id='id'>" + permiso["ID"] + "</td>\
			<td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
			" + ($('#rol_id_permiso').val() == '1' ? "<td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>" : "") + "\
			<td class='text-center'>\
				<a href='javascript:void(0);' class='btn btn-primary btn-xs' onClick='editar_permiso($(this),  " + permiso["ID"] + " )' data-toggle='modal' data-target='#mel2_popup'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
				<a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso($(this), " + permiso["ID"] + ")'><i class='fa fa-trash-o fa-lg'></i></a>\
			</td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	function borrar_permiso(esto,PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		   type: "POST",
		   url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php",
		   data: {accion : "baja", establecimiento: "<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
", id : PermisoID},
		   dataType: "text json",
		   success: function(retorno){
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}else{
					registro_actual.remove();
				}
		   }
		 });
	}

	function editar_permiso(esto, PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		   type: "GET",
		   url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php?rol=<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
&id=" + PermisoID,
		   dataType: "html",
		   success: function(msg){
		  	 	$('#mel2_popup_title').html("Editar residuos permisos");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
		   	}
		});
	}

	function agregar_perm_al_establecimiento(esto)
	{	
		registro_actual = esto.parent().parent();
		console.log(registro_actual);
		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/compartido/alta_sucursales/permiso_establecimiento.php?rol=<?php echo $_smarty_tpl->tpl_vars['ROL_ID']->value;?>
",
			dataType: "html",
			success: function(msg){
		  	 	$('#mel2_popup_title').html("Residuos permisos");
				$('#mel2_popup_body').html(msg);
				$('#mel2_popup_content').width(600);
			}
		});
	}


<?php echo '</script'; ?>
>
<?php }
}
?>