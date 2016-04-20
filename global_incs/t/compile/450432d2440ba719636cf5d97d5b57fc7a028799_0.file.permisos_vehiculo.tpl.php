<?php /* Smarty version 3.1.27, created on 2015-11-24 14:08:35
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/permisos_vehiculo.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21659366956549993a417f0_28595578%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '450432d2440ba719636cf5d97d5b57fc7a028799' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/registracion/permisos_vehiculo.tpl',
      1 => 1443651959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21659366956549993a417f0_28595578',
  'variables' => 
  array (
    'VEHICULO' => 0,
    'PERMISO' => 0,
    'ESTABLECIMIENTO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56549993b1d311_06276604',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56549993b1d311_06276604')) {
function content_56549993b1d311_06276604 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '21659366956549993a417f0_28595578';
?>
<div class="backGrey">

	<div class="table-responsive">

		<div class="table-responsive">
			<table class="table table-striped"  id="lista_permisos">
				<thead>
					<tr class="registro-tabla-header">
					  	<th class="invisible">&nbsp;</th>
					  	<th class="text-center">RESIDUO</th>
					  	<th class="text-center">ESTADO</th>
					  	<th class="text-center">CANTIDAD</th>
					  	<th class="text-center">ACCIONES</th>
					</tr>
				</thead>
				<tbody>

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
					<tr>
						<td class="invisible" id='id'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
</td>
						<td class="text-center" id='residuo'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</td>
						<td class="text-center" id='estado'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ESTADO_'];?>
</td>
						<td class="text-center" id='cantidad'><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
</td>
						<td class="text-center">
							<a href="javascript:void(0);" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#mel3_popup" onClick="editar_permiso_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
)" rel='tooltip' data-placement='top' title='Editar'><i class="fa fa-pencil-square-o fa-lg"></i></a>
							<a href="javascript:void(0);" class="btn btn-danger btn-xs" onClick="borrar_permiso_vehiculo($(this), <?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
)" rel='tooltip' data-placement='top' title='Eliminar'><i class="fa fa-trash-o fa-lg"></i></a>
						</td>
					</tr>
					<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>

				</tbody>
			</table>
		</div>
    </div>
    
    <div class="row" style="margin-top:50px;">
	    <div class="col-xs-12 text-right">
	    	<a href="javascript:void(0)" class="btn btn-default" data-dismiss="modal">Finalizar</a>
	    	<a href="javascript:void(0)" class="btn btn-success" onclick="agregar_permiso_vehiculo($(this))" data-toggle="modal" data-target="#mel3_popup">Agregar</a>
	    </div>
    </div>

</div>


<?php echo '<script'; ?>
>

	function modificar_permiso_vehiculo(permiso){

		registro_actual.find('#residuo').html(permiso['RESIDUO']);
		registro_actual.find('#estado').html(permiso['ESTADO_']);
		registro_actual.find('#cantidad').html(permiso['CANTIDAD']);

		registro_actual = null;
	}

	function agregar_listado_vehiculo(permiso){

		datos = "\
		<tr>\
			<td class='invisible' id='id'>" + permiso["ID"] + "</td>\
			<td class='text-center' id='residuo'>" + permiso["RESIDUO"] + "</td>\
			<td class='text-center' id='estado'>" + permiso["ESTADO_"] + "</td>\
			<td class='text-center' id='cantidad'>" + permiso["CANTIDAD"] + "</td>\
			<td class='text-center'>\
				<a href='javascript:void(0);' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#mel3_popup' onClick='editar_permiso_vehiculo($(this),  " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o fa-lg'></i></a>\
				<a href='javascript:void(0);' class='btn btn-danger btn-xs' onClick='borrar_permiso_vehiculo($(this), " + permiso["ID"] + " )' rel='tooltip' data-placement='top' title='Eliminar'><i class='fa fa-trash-o fa-lg'></i></a>\
			</td>\
		</tr>";

		$('#lista_permisos> tbody:last').append(datos);
	}

	function borrar_permiso_vehiculo(esto,PermisoID)
	{	
		registro_actual = esto.parent().parent();
		$.ajax({
		    type: "POST",
		    url: mel_path+"/registracion/permiso_vehiculo.php",
		    data: {
		   	accion : "baja", establecimiento : "<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
", vehiculo : "<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
", id : PermisoID},
		    dataType: "text json",
		    success: function(retorno)
		    {
				if(retorno['estado'] != 0){
					alert(retorno['errores']['baja']);
				}
				else
				{
					registro_actual.remove();
				}
		   }
		 });
	}

	function editar_permiso_vehiculo(esto,PermisoID)
	{
		registro_actual = esto.parent().parent();
		$.ajax({
		    type: "GET",
		    url: mel_path+"/registracion/permiso_vehiculo.php?establecimiento=<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
&vehiculo=<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
&id=" + PermisoID,
		    dataType: "html",
		    success: function(msg){
		  	    $('#mel3_popup_title').html("Editar permiso Veh&iacute;culo");
				$('#mel3_popup_body').html(msg);
				$('#mel3_popup_content').width(600);
		    }
		});
	}

	function agregar_permiso_vehiculo(esto)
	{
		$.ajax({
			type: "GET",
			url: mel_path+"/registracion/permiso_vehiculo.php?establecimiento=<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
&vehiculo=<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
",
			dataType: "html",
			success: function(msg){
		  	 	$('#mel3_popup_title').html("Agregar permiso Veh&iacute;culo");
				$('#mel3_popup_body').html(msg);
				$('#mel3_popup_content').width(600);
			}
		});
	}


<?php echo '</script'; ?>
>

<?php }
}
?>