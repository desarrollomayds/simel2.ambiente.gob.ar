<?php /* Smarty version 3.1.27, created on 2015-11-24 16:08:12
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/nueva_ruta.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:12979737705654b59c4e8175_10648194%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41d1db668288957497c144293a344561f7d02773' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/nueva_ruta.tpl',
      1 => 1443651969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12979737705654b59c4e8175_10648194',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'entidad_buscada' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5654b59c534984_40697052',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5654b59c534984_40697052')) {
function content_5654b59c534984_40697052 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '12979737705654b59c4e8175_10648194';
?>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/transportista.js"><?php echo '</script'; ?>
>
<div class="container" style="width: 550px;">
  <div class="panel-group" id="accordion2">
    <div class="panel panel-default">
      <div class="panel-heading">
		<div class="input-group buscador_cuit" id="input_nombre">  
			<input type="text" style="width:410px;" class="form-control" placeholder="Nombre de ruta"
				name='nombre_de_ruta' id='nombre_de_ruta'>
			<span class="input-group-btn" data-toggle="collapse" data-parent="#accordion2">
				<button class="btn btn-default" type="button" onclick="btn_guardar_nombre_ruta()">Guardar</button>
			</span>
		</div>

      </div>
      <div id="collapse_nuevo" class="panel-collapse collapse">
        <div class="panel-body">
        	<div>
				<div class="col-lg-6" style="float:left">
					<div class="input-group buscador_cuit" style="width:450px;">
						<input type="text" class="form-control input_numerico" placeholder="Ingrese un CUIT..."
							name='<?php echo $_smarty_tpl->tpl_vars['entidad_buscada']->value;?>
_cuit' id='cuit'>
						<span class="input-group-btn" data-parent="#accordion2" href="#collapse_nuevo">
							<button class="btn btn-default" onclick="buscarPorCuit()" type="button">Buscar y seleccionar generador</button>
						</span>
					</div>
				</div>
			</div>
			<div style='float:left;padding:10px;width:100%;' id='generadores'></div>
			<div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div> 
</div><?php }
}
?>