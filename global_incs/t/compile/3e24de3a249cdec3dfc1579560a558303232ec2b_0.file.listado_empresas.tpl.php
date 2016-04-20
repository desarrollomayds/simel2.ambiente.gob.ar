<?php /* Smarty version 3.1.27, created on 2015-11-20 10:32:44
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_empresas.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1606166392564f20fca4d2c8_19059719%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3e24de3a249cdec3dfc1579560a558303232ec2b' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/listado_empresas.tpl',
      1 => 1445262944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1606166392564f20fca4d2c8_19059719',
  'variables' => 
  array (
    'criterio' => 0,
    'pendientes' => 0,
    'COLOR_LINEA' => 0,
    'pend' => 0,
    'paginador' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f20fcb71546_96697606',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f20fcb71546_96697606')) {
function content_564f20fcb71546_96697606 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1606166392564f20fca4d2c8_19059719';
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


		<div class="main">
			<ol class="breadcrumb">
				<li><a href="listado_empresas.php">Empresas</a></li>
				<li class="active">Listado</li>
			</ol>
			<form class="form-inline">
				<div class="form-group">
					<label for="exampleInputName2">Criterio</label>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="Raz&oacute;n social o CUIT" name='criterio' value="<?php echo $_smarty_tpl->tpl_vars['criterio']->value;?>
">
				</div>
				<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
			</form>
			<br>
			<?php if (count($_smarty_tpl->tpl_vars['pendientes']->value) > 0) {?>
				<div class="table-responsive bs-example">
					<table class="table table-hover table-striped" id="listadoPendientes">
						<thead>
							<tr>
								<th>Raz&oacute;n social</th>
								<th>Cuit</th>
								<th>Roles</th>
								<th>Domicilio Real</th>
								<th>Nro. de solicitud</th>
								<th>Fecha de inscripci&oacute;n</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
$_from = $_smarty_tpl->tpl_vars['pendientes']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pend'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pend']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pend']->value) {
$_smarty_tpl->tpl_vars['pend']->_loop = true;
$foreach_pend_Sav = $_smarty_tpl->tpl_vars['pend'];
?>
							<tr>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="nombre"><?php echo $_smarty_tpl->tpl_vars['pend']->value->nombre;?>
</td>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="cuit"><?php echo $_smarty_tpl->tpl_vars['pend']->value->cuit;?>
</td>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="roles">
									<?php if ($_smarty_tpl->tpl_vars['pend']->value->rol_generador) {?>&nbsp;G&nbsp;<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['pend']->value->rol_transportista) {?>&nbsp;T&nbsp;<?php }?>
									<?php if ($_smarty_tpl->tpl_vars['pend']->value->rol_operador) {?>&nbsp;O&nbsp;<?php }?>
								</td>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="dom_"><?php echo $_smarty_tpl->tpl_vars['pend']->value->calle;?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['pend']->value->numero;?>
</td>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="id_"><?php echo $_smarty_tpl->tpl_vars['pend']->value->id;?>
</td>
								<td bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td" id="cuit"><?php if ($_smarty_tpl->tpl_vars['pend']->value->fecha_inscripcion) {?> <?php echo $_smarty_tpl->tpl_vars['pend']->value->fecha_inscripcion->format('Y-m-d');?>
 <?php }?></td>
								<td align="center" bgcolor="<?php echo $_smarty_tpl->tpl_vars['COLOR_LINEA']->value;?>
" class="td">
									<button type="button" class="btn btn-info edit" data-id="<?php echo $_smarty_tpl->tpl_vars['pend']->value->id;?>
">
										<span class="fa fa-eye"></span>
									</button>
								</td>
							</tr>
							<?php
$_smarty_tpl->tpl_vars['pend'] = $foreach_pend_Sav;
}
?>

						</tbody>
					</table>
					<?php echo $_smarty_tpl->tpl_vars['paginador']->value;?>

				</div>
			<?php } else { ?>

				<div class="alert alert-info">
					<p>En estos momentos no hay ninguna empresa pendiente de aprobaci&oacute;n.</p>
				</div>

			<?php }?>
		</div>
	</div>
</body>

<?php echo '<script'; ?>
>
	$(function() {
		$("#listadoPendientes .edit").each(function() {
			$(this).click(function() {
				window.location = admin_path+"/operacion/edit_listado_empresas.php?id=" + $(this).attr("data-id");
			});
		})
	});
<?php echo '</script'; ?>
>

</html>
<?php }
}
?>