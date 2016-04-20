<?php /* Smarty version 3.1.27, created on 2016-02-26 14:56:31
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/historial_manifiestos.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:72827313656d091cfc85ee6_02021607%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b269f6d7d1bda707120317cf99eadabd11857b96' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/compartido/historial_manifiestos.tpl',
      1 => 1445546606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '72827313656d091cfc85ee6_02021607',
  'variables' => 
  array (
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
  'unifunc' => 'content_56d091d00ac8d0_43541150',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d091d00ac8d0_43541150')) {
function content_56d091d00ac8d0_43541150 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '72827313656d091cfc85ee6_02021607';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

		<title>Historial de Manifiestos</title>
		<!-- carga de css -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true'), 0);
?>

		<!-- carga de js y files especificos para la seccion -->
		<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','cuit'=>'true'), 0);
?>

	</head>

	<body>
		<?php if ($_smarty_tpl->tpl_vars['PERFIL']->value == 1) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Generadores', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('generador', null, 0);?>
		<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 2) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Transportistas', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('transportista', null, 0);?>
		<?php } elseif ($_smarty_tpl->tpl_vars['PERFIL']->value == 3) {?>
			<?php $_smarty_tpl->tpl_vars['nombre_seccion'] = new Smarty_Variable('Operadores', null, 0);?>
			<?php $_smarty_tpl->tpl_vars['rol'] = new Smarty_Variable('operador', null, 0);?>
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
					<strong>HISTORIAL MANIFIESTOS</strong>
				</span>
				<div class="clear20"></div>

				
				<?php echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"historial_manifiestos.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value)), 0);
?>


				<ul class="nav nav-tabs">
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SIMPLE) {?> class="active" <?php }?>>
						<a href="historial_manifiestos.php?tipo_manifiesto=0">Simple</a>
					</li>
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::MULTIPLE) {?> class="active" <?php }?>>
						<a href="historial_manifiestos.php?tipo_manifiesto=1">M&uacute;ltiple</a>
					</li>
					<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?> class="active" <?php }?>>
						<a href="historial_manifiestos.php?tipo_manifiesto=2">Slop</a>
					</li>
				</ul>

				<div class="table-responsive bs-example">
                	<table class="table table-hover table-striped">
						<thead>
							<tr>
	                            <th>Protocolo</th>
								<th>Emp. Creador</th>
								<th>Est. Creador</th>
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?><th>Sucursal</th><?php }?>
								<th>Estado</th>
								<th>Fecha Tratamiento</th>
								<th>Const. Recepci&oacute;n</th>
								<th>Cert. Tratamiento</th>
								<th>Manif.</th>
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?><th>&nbsp;</th><?php }?>
							</tr>
						</thead>

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
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?>
									<td><?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->sucursal;?>
</td>
								<?php }?>
								<td>Finalizado</td>
								<td><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_tratamiento) {?> <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_tratamiento->format('Y-m-d H:i:s');?>
 <?php }?></td>

								<td width="25" align="center">
									
									<?php if (($_smarty_tpl->tpl_vars['MANIFIESTO']->value->tipo_manifiesto == TipoManifiesto::SLOP && $_smarty_tpl->tpl_vars['MANIFIESTO']->value->es_slop_cabecera == 'si') || $_smarty_tpl->tpl_vars['MANIFIESTO']->value->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {?>
										&nbsp;-&nbsp;
									<?php } else { ?>
										<a class='hand' href="imprimir_constancia_recepcion.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									<?php }?>
								</td>

								<td width="25" align="center">
									
									<?php if (($_smarty_tpl->tpl_vars['MANIFIESTO']->value->tipo_manifiesto == TipoManifiesto::SLOP && $_smarty_tpl->tpl_vars['MANIFIESTO']->value->es_slop_cabecera == 'si') || $_smarty_tpl->tpl_vars['MANIFIESTO']->value->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {?>
										&nbsp;-&nbsp;
									<?php } else { ?>
										<a class='hand' href="imprimir_certificado_tratamiento.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									<?php }?>
								</td>

								<td width="27" align="left">
									<a class="hand" href="imprimir_manifiesto.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
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
								<td colspan="<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?>9<?php } else { ?>8<?php }?>">No se han encontrado resultados.</td>
							</tr>
						<?php
}
?>
					</table>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['MANIFIESTOS']->value) {?>
					<?php echo $_smarty_tpl->tpl_vars['pagination']->value;?>

				<?php }?>

				<div align="right" style="margin-top:20px;">
					<a class="btn btn-primary btn-sm" href='?exportar'>
						Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
					</a>
				</div>

				<br /><span class="titulos"><br /></span><br />
			</div>
		</div>

		<div id='div_popup' class='invisible'>
		</div>

	</body>




<?php echo '<script'; ?>
>

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
				url: mel_path+"/operacion/"+rol+"/historial_manifiestos.php",
				data: {action: 'get_manifiestos_relacionados', manifiesto_cabecera_id: manifiesto_cabecera_id},
				dataType: "text json",
				success: function(json) {
					if (json.estado == 'ok' && json.html != '') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						// rows bajo el tr padre "tr_manifiesto_"
						tr_padre.closest( "tr" ).after(json.html);
						$("div#msj_recibir_manifiestos_relacionados").show();
						obj.removeClass('fa-plus-circle').addClass('fa-minus-circle');
					}
				}
			});
		}
	}

<?php echo '</script'; ?>
>

</html><?php }
}
?>