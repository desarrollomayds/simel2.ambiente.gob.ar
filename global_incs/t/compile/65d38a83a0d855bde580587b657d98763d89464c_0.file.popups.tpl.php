<?php /* Smarty version 3.1.27, created on 2015-11-20 10:26:13
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/popups.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:450516664564f1f7532f615_74190532%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d38a83a0d855bde580587b657d98763d89464c' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/popups.tpl',
      1 => 1443651967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '450516664564f1f7532f615_74190532',
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f1f75339cf1_55606599',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f1f75339cf1_55606599')) {
function content_564f1f75339cf1_55606599 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '450516664564f1f7532f615_74190532';
?>
	<!-- popup confirmar eliminicion favoritos -->
	<div id="confirmar_borrado_fav" class="modal fade">
		<div class="modal-dialog" id="confirmar_borrado_fav_content">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
					<h4 id="confirmar_borrado_fav_title" class="modal-title" style="color:#31708f;"></h4>
				</div>
				<div id="confirmar_borrado_fav_body" class="modal-body">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="conf_elim_fav" value=""
				onclick="eliminarFavorito();">Eliminar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- popup confirmar eliminicion flota -->
	<div id="confirmar_borrado_flota" class="modal fade">
		<div class="modal-dialog" id="confirmar_borrado_flota_content">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
					<h4 id="confirmar_borrado_flota_title" class="modal-title" style="color:#31708f;"></h4>
				</div>
				<div id="confirmar_borrado_flota_body" class="modal-body">
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" id="conf_elim_flota" value=""
				onclick="eliminarFlota();">Eliminar</button>
				</div>
			</div>
		</div>
	</div><?php }
}
?>