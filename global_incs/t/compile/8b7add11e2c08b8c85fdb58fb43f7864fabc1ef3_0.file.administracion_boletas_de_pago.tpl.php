<?php /* Smarty version 3.1.27, created on 2015-11-20 13:14:25
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/administracion_boletas_de_pago.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:938120216564f46e10feea1_21740867%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b7add11e2c08b8c85fdb58fb43f7864fabc1ef3' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/administracion_boletas_de_pago.tpl',
      1 => 1444851986,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '938120216564f46e10feea1_21740867',
  'variables' => 
  array (
    'nro_boleta' => 0,
    'BOLETAS' => 0,
    'BOLETA' => 0,
    'PAGINADOR' => 0,
    'LOG' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f46e124e1d5_52343440',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f46e124e1d5_52343440')) {
function content_564f46e124e1d5_52343440 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '938120216564f46e10feea1_21740867';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
				<li><a href="#">Boletas de Pago</a></li>
				<li class="active">Listado</li>
			</ol>

			<form class="form-inline">
				<div class="form-group">
					<label for="exampleInputName2">Criterio</label>
					<input type="text" class="form-control" id="exampleInputName2" placeholder="C&oacute;digo Boleta" name='nro_boleta' value="<?php echo $_smarty_tpl->tpl_vars['nro_boleta']->value;?>
">
				</div>
				<button type="submit" class="btn btn-default" value='buscar'>Buscar</button>
			</form>

			<table border='0'>
				<tr>
					<td colspan="2"><button type="button" id="cargar_archivo_excel" class="btn btn-primary btn-sm pull-right">Cargar archivo CSV</button>
					</td>
				</tr>
			</table>
			<br>
			<div class="table-responsive bs-example">
				<table border='0' class="table table-hover table-striped">
				<tr><td class="bg-info" align="center" height="35">ID</td><td class="bg-info" align="center" height="35">C&oacute;digo boleta</td><td class="bg-info" align="center">Fecha de registraci&oacute;n</td><td class="bg-info" align="center">Fecha de pago</td><td class="bg-info" align="center">Cantidad de manifiestos</td><td class="bg-info" align="center">Importe</td><td class="bg-info" align="center">Estado</td><td class="bg-info" align="center">Opciones</td></tr> 
				<?php if ($_smarty_tpl->tpl_vars['BOLETAS']->value['error']) {?>
					<tr><td colspan="6" height="35" align="center">No se han encontrado boletas anteriores</td></tr>
				<?php } else { ?>
					<?php
$_from = $_smarty_tpl->tpl_vars['BOLETAS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['BOLETA'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['BOLETA']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['BOLETA']->value) {
$_smarty_tpl->tpl_vars['BOLETA']->_loop = true;
$foreach_BOLETA_Sav = $_smarty_tpl->tpl_vars['BOLETA'];
?>
					<tr>
						<td align="center" height="35"><?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->boleta_id;?>
</td>
						<td align="center" height="35"><?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->cb;?>
</td>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['BOLETA']->value->fecha_registracion) {?> <?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->fecha_registracion->format('Y-m-d');?>
 <?php }?></td>
						<td align="center"><?php if ($_smarty_tpl->tpl_vars['BOLETA']->value->fecha_pago) {?> <?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->fecha_pago->format('Y-m-d');?>
 <?php }?></td>
						<td align="center"><?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->cantidad_manifiestos;?>
</td>
						<td align="right">$ <?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->importe;?>
&nbsp;&nbsp;</td>
						<?php if ($_smarty_tpl->tpl_vars['BOLETA']->value->fecha_pago) {?>
							<td align="center"><font color="green">Pagado</font></td>
						<?php } else { ?>
							<td align="center"><font color="red">Pendiente de pago</font></td>
						<?php }?>
						<td align="center">
							<div class="btn-group" role="group">
							<a type="button" href="ver_boleta.php?establecimiento_id=<?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->establecimiento_id;?>
&boleta_id=<?php echo $_smarty_tpl->tpl_vars['BOLETA']->value->boleta_id;?>
"><i class="fa fa-download fa-lg"></i></a>
							</div>
						</td>
					</tr>
					<?php
$_smarty_tpl->tpl_vars['BOLETA'] = $foreach_BOLETA_Sav;
}
?>
				<?php }?>
				</table>
			</div>
			<?php echo $_smarty_tpl->tpl_vars['PAGINADOR']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['LOG']->value) {?>
				<?php echo '<script'; ?>
 type="text/javascript">
				
					BootstrapDialog.show({
						title: 'Proceso de archivo',
						message: '<center>Archivo procesado con exito</center>',
						buttons: [{
							label: 'Cerrar',
							action: function(dialogRef){
								dialogRef.close();
							}
						}, {
							label: '<i class="fa fa-download"></i> Descargar Log',
							action: function(dialogRef){
								window.location.replace("download_log.php");
								dialogRef.close();
							}
						}]
					});
				
				<?php echo '</script'; ?>
>
			<?php }?>
		</div>

	</body>
</html>
<?php echo '<script'; ?>
 type="text/javascript">

	$("#cargar_archivo_excel").click(function(){
		var $mensaje = $('<div>Se permiten solo archivos CSV<br /><form id="upload" enctype="multipart/form-data" action="administracion_boletas_de_pago.php" method="POST"><input id="file" name="file" type="file" accept=".csv" /></form></div>');

		BootstrapDialog.show({
			title: 'Cargar archivo CSV',
			message: $mensaje,
			buttons: [{
				label: 'Cancelar',
				action: function(dialogRef){
					dialogRef.close();
				}
			}, {
				label: 'Cargar',
				action: function(dialogRef){
					if ($('[type=file]').val()){
						var ext = $('[type=file]').val().split('.').pop();
						if (ext == 'csv'){
							$("#upload").submit();
							dialogRef.close();
						} else {
							BootstrapDialog.alert({
								title: 'Informaci&oacute;n',
								message: 'El archivo seleccionado no es CSV',
							});
							return false;
						}
					} else {
						BootstrapDialog.alert({
							title: 'Informaci&oacute;n',
							message: 'Debe seleccionar un archivo a cargar',
						});
						return false;
					}
				}
			}]
		});
	});

<?php echo '</script'; ?>
><?php }
}
?>