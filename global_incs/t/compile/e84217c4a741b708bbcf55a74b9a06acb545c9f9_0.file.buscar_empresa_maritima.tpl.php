<?php /* Smarty version 3.1.27, created on 2015-11-20 15:51:35
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/buscar_empresa_maritima.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1242864675564f6bb75bfa93_54616325%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e84217c4a741b708bbcf55a74b9a06acb545c9f9' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/buscar_empresa_maritima.tpl',
      1 => 1443651968,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1242864675564f6bb75bfa93_54616325',
  'variables' => 
  array (
    'action' => 0,
    'data' => 0,
    'est' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f6bb7732966_43819372',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f6bb7732966_43819372')) {
function content_564f6bb7732966_43819372 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1242864675564f6bb75bfa93_54616325';
if (isset($_smarty_tpl->tpl_vars['action']->value) && $_smarty_tpl->tpl_vars['action']->value == 'busqueda') {?>

	<?php if ($_smarty_tpl->tpl_vars['data']->value['estado'] == 'ok') {?> 
		<div class='input-group buscador_cuit' id='resultado_cuit' style='width:100%;'>

			<p><b>Empresa:</b> <?php echo $_smarty_tpl->tpl_vars['data']->value['establecimientos'][0]['NOMBRE_EMPRESA'];?>
</p>
			<p><b>CUIT:</b> <?php echo $_smarty_tpl->tpl_vars['data']->value['establecimientos'][0]['CUIT'];?>
</p>

			<table class="table table-hover table-striped" style="margin-top:20px;">
				<thead>
					<tr>
						<th class="invisible">ID</th>
						<th>Buque</th>
						<th>Domicilio</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php
$_from = $_smarty_tpl->tpl_vars['data']->value['establecimientos'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['est'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['est']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['est']->value) {
$_smarty_tpl->tpl_vars['est']->_loop = true;
$foreach_est_Sav = $_smarty_tpl->tpl_vars['est'];
?>
						<tr>
							<td class="invisible"><?php echo $_smarty_tpl->tpl_vars['est']->value['ID'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['est']->value['NOMBRE_ESTABLECIMIENTO'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['est']->value['CALLE'];?>
 <?php echo $_smarty_tpl->tpl_vars['est']->value['NUMERO'];?>
 <?php echo $_smarty_tpl->tpl_vars['est']->value['PISO'];?>
</td>
							<td><button type='button' class='btn btn-default pull-right' data-dismiss='modal' onclick='agregar_empresa("<?php echo $_smarty_tpl->tpl_vars['est']->value['ID'];?>
")'>Agregar</button></td>
						</tr>
					<?php
$_smarty_tpl->tpl_vars['est'] = $foreach_est_Sav;
}
?>
				</tbody>
			</table>
	   	</div>

	   	<div align="center">
	   		<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal' onclick='registrar_nueva_empresa("solo_buque");'>Agregar Buque</button>
	   	</div>
	<?php } elseif ($_smarty_tpl->tpl_vars['data']->value['descripcion'] == "ofrecer_alta_temprana") {?> 
		<div class='input-group buscador_cuit' id='resultado_cuit' style='width:100%;'>
	    	<table border='1' align='center'>
	    		<tr>
	    			<td align='center' style='padding:7px;line-height:40px;'>
    					<h5>El CUIT no se encuentra registrado. ¿Desea registrar una nueva empresa naviera/mar&iacute;tima?</h5>
    					<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal' onclick='registrar_nueva_empresa("empresa_buque");'>Registrar empresa</button>
    				</td>
    			</tr>
    		</table>
    	</div>
	<?php }?>

<?php } else { ?> <!-- Carga default -->

	<div class="alert alert-danger" role="alert" style="display:none;" id="msj_error"></div>

	<div class="container" style="width: 550px;">
	  <div class="panel-group" id="accordion2">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	        
			<div class="input-group buscador_cuit">
				<input type="text" style="width:410px;" class="form-control" placeholder="CUIT"
					name='empresa_cuit' id='empresa_cuit' required>
				<span class="input-group-btn" data-parent="#accordion2" href="#collapse_nuevo">
					<button class="btn btn-default" type="button" onclick="buscar_empresa_cuit()">Buscar</button>
				</span>
			</div>
			
	      </div>
	      <div id="collapse_nuevo" class="panel-collapse collapse" style="width:100%px;">
	        <div class="panel-body">
	        	<div>
					<div class="col-lg-12">
						<div class="input-group buscador_cuit" id="resultado_cuit">
							
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
	        </div>
	      </div>
	    </div>
	  </div> 
	</div>

<?php }

}
}
?>