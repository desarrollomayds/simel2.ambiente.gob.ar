<?php /* Smarty version 3.1.27, created on 2016-02-04 17:29:37
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/abm_pruebas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:22896863356b3b4b1af8894_22587461%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75f3d8d8b6f32c7bc3a605672412790537f7b987' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/abm_pruebas.tpl',
      1 => 1454617762,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22896863356b3b4b1af8894_22587461',
  'variables' => 
  array (
    'ERRORES' => 0,
    'POST_AND_SAVED' => 0,
    'criterio' => 0,
    'r' => 0,
    'residuos' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b3b4b1bf55a1_88192085',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b3b4b1bf55a1_88192085')) {
function content_56b3b4b1bf55a1_88192085 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22896863356b3b4b1af8894_22587461';
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Panel de Administraci&oacute;n</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers_bootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'cambios'), 0);
?>

</head>

<body style="margin-top:30px">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<form class="form-inline" id="upload" enctype="multipart/form-data" action="#" method="POST">

		<div class="main">
		
			<ol class="breadcrumb">
				<li><a href="#">Editar</a></li>
                <li class="active">Edici&oacute;n</li>
			</ol>
		
            <?php if ($_smarty_tpl->tpl_vars['ERRORES']->value > 0) {?>
            	<div class="alert alert-danger" role="alert">
					Se han encontrado errores.
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['POST_AND_SAVED']->value) {?>
				<div class="alert alert-success" role="alert">
					Cambios guardados.
				</div>
            <?php }?>

			<div class="table-responsive bs-example" style="font-size: 12px;">
				<form class="form-inline" style="margin-top:20px;">
					<h5><b>Criterio de B&uacute;squeda</b></h5>
					<div class="form-group">
						<label for="exampleInputName2">Criterio&nbsp;</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Nombre de la categor&iacute;a" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
					</div>
					<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
				</form>
			</div>
			
			<div class="table-responsive bs-example" style="font-size: 12px;">
				<div class="form-group" style="">
					<div class="form-group">	
						<label for="protocolo_id">Agregar C&oacute;digo Categor&iacute;a</label><br />
						<div class="input-group">
							<div class="input-group-addon">C&oacute;digo</div><input type="text" class="form-control" id="codigo" placeholder="C&oacute;digo">
							<div class="input-group-addon">Categor&iacute;a</div><input typ<e="text" class="form-control" id="categoria" placeholder="Categori&iacute;a">
							<div class="input-group-addon">Descripci&oacute;n</div><input type="text" class="form-control" id="descripcion" placeholder="Descripci&oacute;n">
						</div>
					</div>
					<input type="button" class="btn btn-primary" style="margin-top:22px;" value="Agregar" onclick="agregarCodigoCategoria();" />
					<div style="clear:both;"></div>
				</div>
			</div>
			<br>

			<div class="form-group">
				<label for="descripcion" class="form-control">Descripci&oacute;n<span class="obligatorio">*</span></label>
				<div class="col-sm-3">
					<input type="text" class="form-control input_element" id="descripcion" name="descripcion" value="<?php echo $_smarty_tpl->tpl_vars['r']->value['descripcion'];?>
">
					<div style="display:none" id="descripcion-error"></div>
				</div>
			</div>

			
			<?php if (count($_smarty_tpl->tpl_vars['residuos']->value) > 0) {?>
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoPendientes">
						<thead>
							<tr>
								<th>C&oacute;digo</th>
								<th>Categor&iacute;a</th>
								<th>Descripci&oacute;n</th>
								<th>Editar</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['residuos']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['r'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['r']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['r']->value) {
$_smarty_tpl->tpl_vars['r']->_loop = true;
$foreach_r_Sav = $_smarty_tpl->tpl_vars['r'];
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['r']->value->categoria;?>
</td>
								<td><?php echo $_smarty_tpl->tpl_vars['r']->value->descripcion;?>
</td>
								<td>
									<button type="button" class="btn btn-info edit" codigo="<?php echo $_smarty_tpl->tpl_vars['r']->value->codigo;?>
">
                                        <span class="fa fa-eye"></span>
									</button>
								</td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['r'] = $foreach_r_Sav;
}
?>
						</tbody>
					</table>
					<?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

				</div>
			<?php } else { ?>
				<div class="alert alert-info">
					<p>No existen residuos.</p>
				</div>
			<?php }?>
		</div>

	</form>
</body>

<?php echo '<script'; ?>
>
	$(document).ready(function() {});


	function agregarCodigoCategoria()
	{
		var codigo = $("#codigo").val();
		var categoria = $("#categoria").val();
		var descripcion = $("#descripcion").val();
		var err_msg = '';

		if ( ! codigo.length) {
			err_msg += 'Indique el c&oacute;digo.<br/>';
		}

		if ( ! categoria.length) {
			err_msg += 'Indique la categor&iacute;a.<br/>';
		}

		if ( ! descripcion.length) {
			err_msg += 'Indique la descripc&iacute;on.';
		}

		if (err_msg != '') {
			BootstrapDialog.alert({
				title: 'Errores.',
				message: err_msg,
				type: BootstrapDialog.TYPE_DANGER,
			});

			return false;
		}

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/ajax/ajax_abm_pruebas.php",
			data: {
				codigo: codigo,
				categoria: categoria,
				descripcion: descripcion,
				accion: 'agregar',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Categoría Agregada.');
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: rsp_obj.err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

<?php echo '</script'; ?>
>

</html>
<?php }
}
?>