<?php /* Smarty version 3.1.27, created on 2016-02-05 16:06:45
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/excepciones_cuit.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:146219616856b4f2c57b4146_19922183%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e3fa3a7adb51cbca06e4ebac30e64f0c232b199a' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/excepciones_cuit.tpl',
      1 => 1446730328,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '146219616856b4f2c57b4146_19922183',
  'variables' => 
  array (
    'csv_parsed' => 0,
    'line_errors' => 0,
    'criterio' => 0,
    'line' => 0,
    'err' => 0,
    'excepciones' => 0,
    'excep' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4f2c590b944_29954012',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4f2c590b944_29954012')) {
function content_56b4f2c590b944_29954012 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '146219616856b4f2c57b4146_19922183';
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

</head>

<body style="margin-top:30px">
	<?php echo $_smarty_tpl->getSubTemplate ('drp/operacion/menuBootstrap.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>


	<form class="form-inline" id="upload" enctype="multipart/form-data" action="excepciones_cuit.php" method="POST">

		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_excepciones_cuit.php">Excepciones de cuit</a></li>
				<li class="active">Listado</li>
			</ol>

			<?php if ($_smarty_tpl->tpl_vars['csv_parsed']->value) {?>
				<?php if ($_smarty_tpl->tpl_vars['line_errors']->value) {?>
					<div class="alert alert-danger" role="alert" style="font-weight:bold;">
						* Hubo errores al crear/editar las excepciones que se listan debajo.
					</div>
				<?php } else { ?>
					<div class="alert alert-info" role="alert" style="font-weight:bold;">
						* Excepciones creadas/editadas correctamente.
					</div>
				<?php }?>
			<?php }?>

			<div class="table-responsive bs-example" style="font-size: 12px;">
				<form class="form-inline" style="margin-top:20px;">
					<h5><b>Criterio de B&uacute;squeda</b></h5>
					<div class="form-group">
						<label for="exampleInputName2">Criterio&nbsp;</label>
						<input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
					</div>
					<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
				</form>
			</div>
			
			<div class="table-responsive bs-example" style="font-size: 12px;">
				<div class="form-group" style="">
					<div class="form-group">	
						<label for="protocolo_id">Operar individual</label><br />
						<div class="input-group">
							<div class="input-group-addon">CUIT</div><input type="text" class="form-control" id="cuit" placeholder="CUIT">
							<div class="input-group-addon">Raz&oacute;n Social</div><input typ<e="text" class="form-control" id="razon_social" placeholder="Raz&oacute;n Social">
						</div>
					</div>
					<input type="button" class="btn btn-primary" style="margin-top:22px;" value="Agregar/Editar" onclick="agregarExcepcion();" />
					<div style="clear:both;"></div>
				</div>

				<div class="form-group" style="margin-left:50px;">
					<label for="protocolo_id">Cargar desde CSV</label>
					<input id="file" name="file" type="file" accept=".csv" />
					<button type="submit" class="btn btn-primary" id="submit_csv" name="submit_csv" value="submit_csv">Agregar</button>
				</div>
			</div>
			<br>

			
			<?php if ($_smarty_tpl->tpl_vars['csv_parsed']->value && $_smarty_tpl->tpl_vars['line_errors']->value) {?>
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoPendientes">
						<thead>
							<tr>
								<th>Linea</th>
								<th>Descripci&oacute;n del error</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['line_errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['err'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['err']->_loop = false;
$_smarty_tpl->tpl_vars['line'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['line']->value => $_smarty_tpl->tpl_vars['err']->value) {
$_smarty_tpl->tpl_vars['err']->_loop = true;
$foreach_err_Sav = $_smarty_tpl->tpl_vars['err'];
?>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['line']->value;?>
</td>
								<td><?php if ($_smarty_tpl->tpl_vars['err']->value['cuit']) {?> Cuit: <?php echo $_smarty_tpl->tpl_vars['err']->value['cuit'];?>
 <?php } elseif ($_smarty_tpl->tpl_vars['err']->value['razon_social']) {?> Raz&oacute;n Social: <?php echo $_smarty_tpl->tpl_vars['err']->value['razon_social'];?>
 <?php }?></td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['err'] = $foreach_err_Sav;
}
?>
						</tbody>
					</table>
				</div>
			<?php } else { ?>
			
				<?php if (count($_smarty_tpl->tpl_vars['excepciones']->value) > 0) {?>
					<div class="table-responsive bs-example">
						<table class="table table-hover table-striped" id="listadoPendientes">
							<thead>
								<tr>
									<th>CUIT</th>
									<th>Raz&oacute;n Social</th>
									<th>Creado</th>
									<th>Modificado</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php
$_from = $_smarty_tpl->tpl_vars['excepciones']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['excep'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['excep']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['excep']->value) {
$_smarty_tpl->tpl_vars['excep']->_loop = true;
$foreach_excep_Sav = $_smarty_tpl->tpl_vars['excep'];
?>
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['excep']->value->cuit;?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['excep']->value->razon_social;?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['excep']->value->fecha_creacion->format('Y-m-d H:i:s');?>
</td>
									<td><?php if ($_smarty_tpl->tpl_vars['excep']->value->fecha_modificacion) {?> <?php echo $_smarty_tpl->tpl_vars['excep']->value->fecha_modificacion;?>
 <?php } else { ?> &nbsp;-&nbsp; <?php }?></td>
									<td>
										<button type="button" class="btn btn-info" excepcion-id="<?php echo $_smarty_tpl->tpl_vars['excep']->value->id;?>
" title="Eliminar" onclick="eliminarExcepcion($(this));">
										<span class="fa fa-eye"></span>
										</button>
									</td>
								</tr>
								<?php
$_smarty_tpl->tpl_vars['excep'] = $foreach_excep_Sav;
}
?>
							</tbody>
						</table>
						<?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

					</div>
				<?php } else { ?>
					<div class="alert alert-info">
						<p>No existen excepciones de CUIT.</p>
					</div>
				<?php }?>
			<?php }?>
		</div>

	</form>
</body>

<?php echo '<script'; ?>
>
	$(document).ready(function() {});

	function agregarExcepcion()
	{
		var cuit = $("input#cuit").val();
		var razon_social = $("input#razon_social").val();
		var err_msg = '';

		if ( ! cuit.length) {
			err_msg += 'Indique el cuit.<br/>';
		}

		if ( ! razon_social.length) {
			err_msg += 'Indique la raz&oacute;n social.';
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
			url: admin_path+"/operacion/excepciones_cuit.php",
			data: {
				cuit: cuit,
				razon_social: razon_social,
				accion: 'agregar_individual',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Excepci&oacute;n agregada/editada');
				} else {
					var err_msg = '';
					$.each(rsp_obj.errors, function(field, description) {
						err_msg += field +' : ' + description + '<br />';
					});
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: err_msg,
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function eliminarExcepcion(buttonObj)
	{
		var excepcion_id = buttonObj.attr('excepcion-id');

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/excepciones_cuit.php",
			data: {
				excepcion_id: excepcion_id,
				accion: 'eliminar_excepcion',
			},
			dataType: "text json",
			success: function(rsp_obj) {
				if (rsp_obj.success) {
					mostrarMensajeYRedireccionar('Excepci&oacute;n borrada');
				} else {
					var err_msg = '';
					$.each(rsp_obj.errors, function(field, description) {
						err_msg += field +' : ' + description + '<br />';
					});
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: err_msg,
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