<?php /* Smarty version 3.1.27, created on 2016-02-18 11:54:34
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/manifiestos_en_camino.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:53766027256c5db2ae83893_64413112%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a0245c047d4b737a62da8fbb9a378f57b01817f' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/operacion/operador/manifiestos_en_camino.tpl',
      1 => 1445546597,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '53766027256c5db2ae83893_64413112',
  'variables' => 
  array (
    'BASE_PATH' => 0,
    'PERFIL' => 0,
    'TIPO_MANIFIESTO' => 0,
    'filtros_buscador' => 0,
    'MANIFIESTOS' => 0,
    'MANIFIESTO' => 0,
    'pagination' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56c5db2b047aa8_69870584',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c5db2b047aa8_69870584')) {
function content_56c5db2b047aa8_69870584 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '53766027256c5db2ae83893_64413112';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $_smarty_tpl->getSubTemplate ('general/meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<title>Manifiestos en Camino</title>
	<!-- carga de css -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/css_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

	<!-- carga de js y files especificos para la seccion -->
	<?php echo $_smarty_tpl->getSubTemplate ('general/js_headers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('bootstrap'=>'true','mapa'=>'true','cuit'=>'true','datepicker'=>'true','chosen'=>'true'), 0);
?>

	<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['BASE_PATH']->value;?>
/javascript/operacion/base.js"><?php echo '</script'; ?>
>
</head>

<body>

	<div id="login-top" align="center">
		<div style="width:950px" align="right">	<strong>Centro de Ayuda</strong> | <a style="color:white;" href="../<?php echo $_smarty_tpl->tpl_vars['PERFIL']->value;?>
/mi_cuenta.php">Mi cuenta </a> | <a style="color:white;" href="../../login/logout_usuario.php">Cerrar Sesi&oacute;n</a><a href='../compartido/boletas_de_pago.php' class="imgBox"></a>
		</div>
	</div>

	<div id="contenedor-interior">
	<?php echo $_smarty_tpl->getSubTemplate ('general/logos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

	<div id="apDiv1">Operadores<br /></div>

	<div id="contenido-interior"><br />
		<div style="padding:5px; height:150px">
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<br />
			<?php echo $_smarty_tpl->getSubTemplate ('operacion/operador/menu_solapas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

			<div style="height:2px; background-color:#5D9E00;"></div>
			<div class="clear20"></div>
				<strong>MANIFIESTOS EN CAMINO</strong>
			</span>
			<div class="clear20"></div>

			
			<?php echo $_smarty_tpl->getSubTemplate ('general/buscador_manifiestos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('form_action'=>"manifiestos_en_camino.php",'tipo_manifiesto'=>((string)$_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value),'filtros'=>((string)$_smarty_tpl->tpl_vars['filtros_buscador']->value)), 0);
?>


			<ul class="nav nav-tabs">
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SIMPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=0">Simple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::MULTIPLE) {?> class="active" <?php }?>>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=1">M&uacute;ltiple</a>
				</li>
				<li role="presentation" <?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?> class="active" <?php }?>>
					<a href="manifiestos_en_camino.php?tipo_manifiesto=2">Slop</a>
				</li>
			</ul>

			<div class="alert alert-danger" role="alert" style="display:none;margin-top:10px;" id="msj_recibir_manifiestos_relacionados">
				Para recibir un Manifiesto Slop Padre y finalizarlo se debe primero recibir y tratar todos sus hijos.
			</div>

			<div class="table-responsive bs-example">
                <table class="table table-hover table-striped">
                	<thead>
						<tr>
							<th>Protocolo</th>
							<th>
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?>Empresa Naviera<?php } else { ?>Empresa creadora<?php }?>
							</th>
							<th>
								<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?>Buque<?php } else { ?>Establecimiento<?php }?>
							</th>
							<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?>
								<th>Sucursal</th>
							<?php }?>
							<th>Fecha Creaci&oacute;n</th>
							<th>Estado</th>
							<th><?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?>Acci&oacute;n<?php } else { ?>Recibir<?php }?></th>
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
$_smarty_tpl->tpl_vars['MANIFIESTO']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['MANIFIESTO']->value) {
$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop = true;
$_smarty_tpl->tpl_vars['MANIFIESTO']->iteration++;
$foreach_MANIFIESTO_Sav = $_smarty_tpl->tpl_vars['MANIFIESTO'];
?>

							<?php if (!(1 & $_smarty_tpl->tpl_vars['MANIFIESTO']->iteration / 1)) {?>
								<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#EAEAE5", null, 0);?>
							<?php } else { ?>
								<?php $_smarty_tpl->tpl_vars["COLOR_LINEA"] = new Smarty_Variable("#F8F7F5", null, 0);?>
							<?php }?>

							
							<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value == TipoManifiesto::SLOP) {?>
								<tr id="tr_padre_<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
							<?php } else { ?>
								<tr>
							<?php }?>
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
									<td><?php if ($_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion) {?> <?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->fecha_creacion->format('Y-m-d H:i:s');?>
 <?php }?></td>
									<td style="font-weight:bold;">Aprobado</td>
									<td width="25" align="center">
										<i class="fa fa-pencil-square-o fa-lg hand" style="line-height:30px;color: #333333;" manifiesto-id="<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
" onclick="recibirManifiesto($(this));"></i>
									</td>
									<td>
										<a class="hand" href="imprimir_manifiesto.php?id=<?php echo $_smarty_tpl->tpl_vars['MANIFIESTO']->value->id;?>
">
											<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
										</a>
									</td>
								</tr>
						<?php
$_smarty_tpl->tpl_vars['MANIFIESTO'] = $foreach_MANIFIESTO_Sav;
}
if (!$_smarty_tpl->tpl_vars['MANIFIESTO']->_loop) {
?>
							<tr>
								<td colspan="<?php if ($_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value != TipoManifiesto::SLOP) {?>7<?php } else { ?>6<?php }?>">No se han encontrado resultados.</td>
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

			<table width="880" border="0" cellpadding="5" cellspacing="0">
				<tr>
					<td align='right'>
						<a class="btn btn-primary btn-sm" href='?exportar&tipo_manifiesto=<?php echo $_smarty_tpl->tpl_vars['TIPO_MANIFIESTO']->value;?>
'>
							Exportar&nbsp;&nbsp;&nbsp;<i class="fa fa-file-excel-o"></i>
						</a>
					</td>
				</tr>
			</table>

			<br /><span class="titulos"><br /></span><br />
		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'mel'), 0);
?>

	<?php echo $_smarty_tpl->getSubTemplate ('general/popup.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('ID_POPUP'=>'tratamientos'), 0);
?>

	</div>

</body>


<?php echo '<script'; ?>
>

	/**
	 * Posibles responses:
	 *   CASO_1:
	 * 	 json.estado = hijos_no_finalizados
	 * 	 json.html   = rows html para apendear y mostrar manifiestos slop relacionados en la tabla
     *
     *   CASO_2:
     *   json.estado = listo_para_recibir
     *   json.html   = html para el popup de recepcion del manifiesto
	 *
	 *   CASO_3:
	 *   json.estado = slop_barcaza_sin_relacionados
	 * 	 json.html   = msj indicando que al manif slop cabecera aun no le fueron relacionados manifiestos slop hijos.
	 */
	function recibirManifiesto(obj)
	{
		var manifiesto_id = obj.attr("manifiesto-id");
		var tr_padre = $("#tr_padre_"+manifiesto_id);
		
		if (tr_padre.hasClass('tr_manif_relacionados_desplegados')) {
			$("tr.tr_manifiesto_relacionado_al_"+manifiesto_id).toggle();
			$("div#msj_recibir_manifiestos_relacionados").toggle();
		} else {
			$.ajax({
				type: "GET",
				url: mel_path+"/operacion/operador/recibir_manifiesto.php",
				data: {id : manifiesto_id},
				dataType: "text json",
				success: function(json) {
					console.debug(json);
					// CASO_1
					if (json.estado == 'hijos_no_finalizados') {
						tr_padre.addClass('tr_manif_relacionados_desplegados');
						// rows bajo el tr padre tr_padre_
						tr_padre.closest( "tr" ).after(json.html);
						$("div#msj_recibir_manifiestos_relacionados").show();
					}
					// CASO_2
					if (json.estado == 'listo_para_recibir') {
					    $('#mel_popup').modal('show');
						$('#mel_popup_title').html("Recibir Manifiesto");
						$('#mel_popup_body').html(json.html);
						$('#mel_popup_content').width(750);
					}
					// CASO_3
					if (json.estado == 'slop_barcaza_sin_relacionados') {
						mostrarMensaje("exclamation-triangle", json.html,"warning");
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