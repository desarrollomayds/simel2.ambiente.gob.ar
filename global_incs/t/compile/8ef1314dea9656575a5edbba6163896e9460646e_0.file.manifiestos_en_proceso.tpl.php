<?php /* Smarty version 3.1.27, created on 2016-02-26 14:57:23
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_en_proceso.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:147979772156d09203538c92_79120580%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8ef1314dea9656575a5edbba6163896e9460646e' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/manifiestos_en_proceso.tpl',
      1 => 1445546606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147979772156d09203538c92_79120580',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'PERFIL' => 0,
    'nombre_seccion' => 0,
    'rol' => 0,
    'TIPO_MANIFIESTO' => 0,
    'filtros_buscador' => 0,
    'MANIFIESTOS' => 0,
    'MANIFIESTO' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56d092036cf647_31619314',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d092036cf647_31619314')) {
function content_56d092036cf647_31619314 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '147979772156d09203538c92_79120580';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<title>Manifiestos en Proceso</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'false','datepicker'=>'true'), 0);
?>

		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/jquery.print_element.js"><?php echo '</script'; ?>
>
	</head>

	<body>

		<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 1) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Generadores', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('generador', null, 0);?>
		<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 2) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('transportista', null, 0);?>
		<?php }?>

		<div id="login-top" align="center">
			<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
			</div>
		</div>

		<div id="contenedor-interior">
            <?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            <div id="apDiv1"><?php echo $_smarty_tpl->tpl_vars['nombre_seccion']->value;?>
<br /></div>

		<div id="contenido-interior"><br />
			<div style="padding:5px; height:150px">
				<!-- DATOS, ESTADISTICAS Y ALERTAS -->
				<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<!-- DATOS, ESTADISTICAS Y ALERTA -->

				<br />
				<?php echo $_smarty_tpl->getSubTemplate ("operacion/".((string)$_smarty_tpl->tpl_vars['rol']->value)."/menu_solapas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				<div style="height:2px; background-color:#5D9E00"></div>

				<div class="clear20"></div>
					<strong>MANIFIESTOS EN PROCESO</strong>
				</span>
				<br /><br />

				
				<?php echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"manifiestos_proceso.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value)), 0);
?>


				<ul class="nav nav-tabs" style="margin-top: 20px;">
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SIMPLE) {?> class="active" <?php }?>>
						<a href="manifiestos_proceso.php?tipo_manifiesto=0">Simple</a>
					</li>
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::MULTIPLE) {?> class="active" <?php }?>>
						<a href="manifiestos_proceso.php?tipo_manifiesto=1">M&uacute;ltiple</a>
					</li>
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?> class="active" <?php }?>>
						<a href="manifiestos_proceso.php?tipo_manifiesto=2">Slop</a>
					</li>
				</ul>

				<div class="table-responsive bs-example">
                	<table class="table table-hover table-striped">
						<thead>
							<tr>
								<th>Protocolo</th>
								<th>Empresa creadora</th>
								<th>Establecimiento</th>
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?><th>Sucursal</th><?php }?>
								<th>Fecha Creaci&oacute;n</th>
								<th>Estado</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<?php
$_from = $_smarty_tpl->tpl_vars['MANIFIESTOS']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['MANIFIESTO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['MANIFIESTO']->value) {
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = true;
$foreach_MANIFIESTO_Sav = $_smarty_tpl->tpl_vars['MANIFIESTO'];
?>
								<tr id="tr_manifiesto_<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
									<td id="id"><?php echo formatear_id_protocolo_manifiesto($_smarty_tpl->tpl_vars['MANIFIESTO']->value->id_protocolo_manifiesto);?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_empresa;?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->nombre_establecimiento;?>
</td>
									<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?><td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->sucursal;?>
</td><?php }?>
									<td><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion) {?> <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion->format('Y-m-d H:i:s');?>
 <?php }?></td>
									<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->estado;?>
</td>
									<td width="50" align="center">
										<a class='hand' href="imprimir_manifiesto.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									</td>
									
									<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP && $_smarty_tpl->tpl_vars['MANIFIESTO']->value->es_slop_cabecera == 'si') {?>
										<td><i class="fa fa-plus-circle hand" style="line-height:30px;color: #333333;" title="Ver Manifiestos Relacionados" onclick="expandirManifiestosRelacionados($(this), <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
);"></i></td>
									<?php } else { ?>
										<td>&nbsp;</td>
									<?php }?>
								</tr>
							<?php
$_smarty_tpl->tpl_vars['MANIFIESTO'] = $foreach_MANIFIESTO_Sav;
}
if (!$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop) {
?>
								<tr>
									<td colspan="<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?>6<?php } else { ?>5<?php }?>">No se han encontrado resultados.</td>
								</tr>
							<?php
}
?>
						</tbody>
					</table>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['MANIFIESTOS']->value) {?>
					<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

				<?php }?>

				<div align="right" >
					<a class="btn btn-primary btn-sm" href='?exportar=yes&tipo_manifiesto=<?php echo $_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value;?>
'>
						Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
					</a>
				</div>

			</div>
		</div>

		<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>


</body>


<?php echo '<script'; ?>
>
	var registro_actual;

	$(document).on('click', '.btn_imprimir_manifiesto', function() {
		registro_actual = $(this).parent().parent();

		$.ajax({
			type: "GET",
			url: mel_path+"/operacion/generador/imprimir_manifiesto.php",
			data: { id: registro_actual.find('#id').html() },
			dataType: "html",
			success: function(msg) {
				$('#mel_popup_title').html("Imprimir Manifiesto");
				$('#mel_popup_body').html(msg);
				$('#mel_popup_content').width(800);
			}
		});
	});

	var rol = '<?php echo $_smarty_tpl->tpl_vars['rol']->value;?>
';

	function expandirManifiestosRelacionados(obj, manifiesto_cabecera_id)
	{
		//console.info("expandirManifiestosRelacionados. manifiesto_cabecera_id: " + manifiesto_cabecera_id);
		var tr_padre = $("#tr_manifiesto_"+manifiesto_cabecera_id);

		if (tr_padre.hasClass('tr_manif_relacionados_desplegados')) {
			$("tr.tr_manifiesto_relacionado_al_"+manifiesto_cabecera_id).toggle();

			if (obj.hasClass('fa-plus-circle')) {
				obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
			} else {
				obj.removeClass('fa-minus-circle').addClass('fa-plus-circle');
			}
		} else {
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/"+rol+"/manifiestos_proceso.php",
				data: {action: 'get_manifiestos_relacionados', manifiesto_cabecera_id: manifiesto_cabecera_id},
				dataType: "text json",
				success: function(json) {
					if (json.estado == 'ok' && json.html != '') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						tr_padre.closest( "tr" ).after(json.html);
						obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
					}
				}
			});
		}
	}

<?php echo '</script'; ?>
>

</html>


<?php }
}
?>