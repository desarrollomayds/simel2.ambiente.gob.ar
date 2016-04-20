<?php /* Smarty version 3.1.27, created on 2015-11-20 11:15:47
         compiled from "/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_solicitud_de_cambios.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1880989843564f2b13ec7787_12813120%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb9f1c4bbc96d1788d7edcc7c47bd59f3539fe36' => 
    array (
      0 => '/sitios/simel.ambiente.gob.ar/global_incs/t/templates/drp/operacion/set_solicitud_de_cambios.tpl',
      1 => 1445889317,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1880989843564f2b13ec7787_12813120',
  'variables' => 
  array (
    'data' => 0,
    'establecimiento' => 0,
    'solicitud' => 0,
    'cpe' => 0,
    'titulo' => 0,
    'trat' => 0,
    'ccaa' => 0,
    'suc' => 0,
    'suc_perm' => 0,
    'key' => 0,
    'cv' => 0,
    'new_vehiculo' => 0,
    'cpv' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_564f2b14679593_60299533',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_564f2b14679593_60299533')) {
function content_564f2b14679593_60299533 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1880989843564f2b13ec7787_12813120';
?>
<style type="text/css">
	.aprobado {color:green;font-weight:bold;}
	.rechazado {color:red;font-weight:bold;}
</style>

<div class="backGrey" id="residuos_popup">

	
	<?php $_smarty_tpl->tpl_vars["counter_pendientes"] = new Smarty_Variable("0", null, 0);?>

	<div class="bs-example">

		<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']) {?>
			<div class="alert alert-info" role="alert" style="font-weight:bold;">Cambios para el establecimiento: <?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->nombre;?>
</div>

			<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']) {?>
				<div class="bs-example" id="">
					<table class="table table-hover table-striped" id="">
						<thead>
							<tr>
								<th>Tipo Solicitud: Cambios en la informaci&oacute;n del establecimiento</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->nombre;?>
</td>
								<td>
									<div class="container_buttons" id="container_buttons_ce_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->id;?>
" style="float:right;">
										<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->estado == 'A') {?>
											<span class="aprobado">APROBADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->estado == 'R') {?>
											<span class="rechazado">RECHAZADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->estado == 'P') {?>
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['info']->id;?>
);" data-toggle="modal" data-target="#detalle_establecimiento_popup"><span class="fa fa-eye"></span></button>
										<?php }?>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['permisos']) {?>
				<div class="bs-example">
					<p class="registro-titulo bg-info">Cambios en Permisos del Establecimiento</p>
					<?php
$_from = $_smarty_tpl->tpl_vars['data']->value['cambios_establecimiento']['permisos'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cpe'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cpe']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cpe']->value) {
$_smarty_tpl->tpl_vars['cpe']->_loop = true;
$foreach_cpe_Sav = $_smarty_tpl->tpl_vars['cpe'];
?>

						<?php if ($_smarty_tpl->tpl_vars['cpe']->value->tipo_cambio == 'A') {?>
							<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Agregar Permiso", null, 0);?>
						<?php } elseif ($_smarty_tpl->tpl_vars['cpe']->value->tipo_cambio == 'E') {?>
							<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Editar Permiso", null, 0);?>
						<?php } else { ?>
							<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Borrar Permiso", null, 0);?>
						<?php }?>

						<div class="bs-example" id="item_cpe_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cpe']->value->id;?>
">
							
							<div class="acciones">
								<div class="container_subtitle" style="float:left;">
									<b><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</b>
								</div>
								<div class="container_buttons" id="container_buttons_cpe_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cpe']->value->id;?>
" style="float:right;">
									<?php if ($_smarty_tpl->tpl_vars['cpe']->value->estado == 'A') {?>
										<span class="aprobado">APROBADO</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cpe']->value->estado == 'R') {?>
										<span class="rechazado">RECHAZADO</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cpe']->value->estado == 'P') {?>
										<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cpe']->value->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
										<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cpe']->value->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
									<?php }?>
								</div>
							</div>

							<div style="clear:both;"></div>
							<div class="contenidos" style="margin-top:10px;">
								
								<?php if ($_smarty_tpl->tpl_vars['cpe']->value->tipo_cambio == 'A') {?>
									<div>CSC: <?php echo $_smarty_tpl->tpl_vars['cpe']->value->residuo;?>
</div>
									<div>Cantidad: <?php if ($_smarty_tpl->tpl_vars['cpe']->value->cantidad) {?> <?php echo $_smarty_tpl->tpl_vars['cpe']->value->cantidad;?>
 <?php } else { ?> - <?php }?></div>

									<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::OPERADOR) {?>
										<?php if ($_smarty_tpl->tpl_vars['cpe']->value->tratamientos) {?>
											<div>Tratamientos: <?php echo implode(' - ',json_decode($_smarty_tpl->tpl_vars['cpe']->value->tratamientos));?>
</div>
										<?php } else { ?>
											<div>Tratamientos: <?php if ($_smarty_tpl->tpl_vars['cpe']->value->tratamientos) {?> <?php echo $_smarty_tpl->tpl_vars['cpe']->value->tratamientos;?>
 <?php } else { ?> - <?php }?></div>
										<?php }?>
									<?php }?>
								
								<?php } elseif ($_smarty_tpl->tpl_vars['cpe']->value->tipo_cambio == 'E') {?>
									<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
										<div><b>De</b></div>
										<div>CSC: <?php echo PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->residuo;?>
</div>
										<div>Cantidad: <?php if (PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->cantidad) {?> <?php echo PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->cantidad;?>
 <?php } else { ?> - <?php }?></div>

										<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::OPERADOR) {?>
											<?php if (PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->tratamientos) {?>
												Tratamientos: 
												<?php
$_from = PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->tratamientos;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['trat'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['trat']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['trat']->value) {
$_smarty_tpl->tpl_vars['trat']->_loop = true;
$foreach_trat_Sav = $_smarty_tpl->tpl_vars['trat'];
?>
													<?php echo $_smarty_tpl->tpl_vars['trat']->value->operacion_residuo;?>
 - 
												<?php
$_smarty_tpl->tpl_vars['trat'] = $foreach_trat_Sav;
}
?>
											<?php } else { ?>
												<div>Tratamientos: - </div>
											<?php }?>
										<?php }?>
									</div>
									<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
										<div><b>A</b></div>
										<div><?php echo $_smarty_tpl->tpl_vars['cpe']->value->residuo;?>
</div>
										<div>Cantidad: <?php if ($_smarty_tpl->tpl_vars['cpe']->value->cantidad) {?> <?php echo $_smarty_tpl->tpl_vars['cpe']->value->cantidad;?>
 <?php } else { ?> - <?php }?></div>

										<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::OPERADOR) {?>
											<?php if ($_smarty_tpl->tpl_vars['cpe']->value->tratamientos) {?>
												<div>Tratamientos: <?php echo implode(' - ',json_decode($_smarty_tpl->tpl_vars['cpe']->value->tratamientos));?>
</div>
											<?php } else { ?>
												<div>Tratamientos: <?php if ($_smarty_tpl->tpl_vars['cpe']->value->tratamientos) {?> <?php echo $_smarty_tpl->tpl_vars['cpe']->value->tratamientos;?>
 <?php } else { ?> - <?php }?></div>
											<?php }?>
										<?php }?>
									</div>
									<div style="clear:both;"></div>
								
								<?php } else { ?>
									<div>CSC: <?php echo PermisoEstablecimiento::find($_smarty_tpl->tpl_vars['cpe']->value->permiso_id)->residuo;?>
</div>
								<?php }?>
							</div>
						</div>
					<?php
$_smarty_tpl->tpl_vars['cpe'] = $foreach_cpe_Sav;
}
?>
				</div>
			<?php }?>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_caa']) {?>
			<div class="bs-example">
				<p class="registro-titulo bg-info">Cambio en CAA del establecimiento</p>
				<?php
$_from = $_smarty_tpl->tpl_vars['data']->value['cambios_caa'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ccaa'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ccaa']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ccaa']->value) {
$_smarty_tpl->tpl_vars['ccaa']->_loop = true;
$foreach_ccaa_Sav = $_smarty_tpl->tpl_vars['ccaa'];
?>
					<div class="bs-example" id="item_ccaa_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['ccaa']->value->id;?>
">
						
						<div class="acciones">
							<div class="container_subtitle" style="float:left;">
								<b>Modificaci&oacute;n en la info del CAA</b>
							</div>
							<div class="container_buttons" id="container_buttons_ccaa_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['ccaa']->value->id;?>
" style="float:right;">
								<?php if ($_smarty_tpl->tpl_vars['ccaa']->value->estado == 'A') {?>
									<span class="aprobado">APROBADO</span>
								<?php } elseif ($_smarty_tpl->tpl_vars['ccaa']->value->estado == 'R') {?>
									<span class="rechazado">RECHAZADO</span>
								<?php } elseif ($_smarty_tpl->tpl_vars['ccaa']->value->estado == 'P') {?>
									<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioCaa(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
									<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioCaa(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
								<?php }?>
							</div>
						</div>

						<div style="clear:both;"></div>
						<div class="contenidos" style="margin-top:10px;">
							
							<?php if ($_smarty_tpl->tpl_vars['ccaa']->value->tipo_cambio == 'E') {?>
								<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
									<div><b>CAA Actual</b></div>
									<div>Nro: <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->caa_numero_old;?>
</div>
									<div>Vencimiento: <?php if ($_smarty_tpl->tpl_vars['ccaa']->value->caa_vencimiento_old) {?> <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->caa_vencimiento_old->format('Y-m-d');?>
 <?php } else { ?> &nbsp;-&nbsp; <?php }?></div>
								</div>
								<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
									<div><b>CAA Modificado</b></div>
									<div>Nro: <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->caa_numero_new;?>
</div>
									<div>Vencimiento: <?php if ($_smarty_tpl->tpl_vars['ccaa']->value->caa_vencimiento_new) {?> <?php echo $_smarty_tpl->tpl_vars['ccaa']->value->caa_vencimiento_new->format('Y-m-d');?>
 <?php } else { ?> &nbsp;-&nbsp; <?php }?></div>
								</div>
								<div style="clear:both;"></div>
							<?php }?>
						</div>
					</div>
				<?php
$_smarty_tpl->tpl_vars['ccaa'] = $foreach_ccaa_Sav;
}
?>
			</div>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['data']->value['nuevas_sucursales']) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value['nuevas_sucursales'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['suc'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['suc']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['suc']->value) {
$_smarty_tpl->tpl_vars['suc']->_loop = true;
$foreach_suc_Sav = $_smarty_tpl->tpl_vars['suc'];
?>
				<div class="alert alert-info" role="alert" style="font-weight:bold;">Nueva Sucursal: <?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->nombre;?>
</div>
				<div class="bs-example" id="">
					<table class="table table-hover table-striped" id="">
						<thead>
							<tr>
								<th>Tipo Solicitud: Nueva Sucursal</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->nombre;?>
</td>
								<td>
									<div class="container_buttons" id="container_buttons_ce_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->id;?>
" style="float:right;">
										<?php if ($_smarty_tpl->tpl_vars['suc']->value['info']->estado == 'A') {?>
											<span class="aprobado">APROBADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['suc']->value['info']->estado == 'R') {?>
											<span class="rechazado">RECHAZADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['suc']->value['info']->estado == 'P') {?>
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleCambioEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['suc']->value['info']->id;?>
);" data-toggle="modal" data-target="#detalle_establecimiento_popup"><span class="fa fa-eye"></span></button>
										<?php }?>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['suc']->value['permisos']) {?>
					<div class="bs-example">
						<p class="registro-titulo bg-info">Permisos para la nueva sucursal: </p>
						<?php
$_from = $_smarty_tpl->tpl_vars['suc']->value['permisos'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['suc_perm'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['suc_perm']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['suc_perm']->value) {
$_smarty_tpl->tpl_vars['suc_perm']->_loop = true;
$foreach_suc_perm_Sav = $_smarty_tpl->tpl_vars['suc_perm'];
?>
							<div class="bs-example" id="item_cpe_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->id;?>
">
								
								<div class="acciones">
									<div class="container_subtitle" style="float:left;">
										<b>Agregar Permiso</b>
									</div>
									<div class="container_buttons" id="container_buttons_cpe_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->id;?>
" style="float:right;">
										<?php if ($_smarty_tpl->tpl_vars['suc_perm']->value->estado == 'A') {?>
											<span class="aprobado">APROBADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['suc_perm']->value->estado == 'R') {?>
											<span class="rechazado">RECHAZADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['suc_perm']->value->estado == 'P') {?>
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoEstablecimiento(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
										<?php }?>
									</div>
								</div>

								<div style="clear:both;"></div>
								<div class="contenidos" style="margin-top:10px;">
									
									<div>CSC: <?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->residuo;?>
</div>
									<div>Cantidad: <?php if ($_smarty_tpl->tpl_vars['suc_perm']->value->cantidad) {?> <?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->cantidad;?>
 <?php } else { ?> - <?php }?></div>

									<?php if ($_smarty_tpl->tpl_vars['establecimiento']->value->tipo == Establecimiento::OPERADOR) {?>
										<?php if ($_smarty_tpl->tpl_vars['suc_perm']->value->tratamientos) {?>
											<div>Tratamientos: <?php echo implode(' - ',json_decode($_smarty_tpl->tpl_vars['suc_perm']->value->tratamientos));?>
</div>
										<?php } else { ?>
											<div>Tratamientos: <?php if ($_smarty_tpl->tpl_vars['suc_perm']->value->tratamientos) {?> <?php echo $_smarty_tpl->tpl_vars['suc_perm']->value->tratamientos;?>
 <?php } else { ?> - <?php }?></div>
										<?php }?>
									<?php }?>
								</div>
							</div>
						<?php
$_smarty_tpl->tpl_vars['suc_perm'] = $foreach_suc_perm_Sav;
}
?>
					</div>
				<?php }?>
			<?php
$_smarty_tpl->tpl_vars['suc'] = $foreach_suc_Sav;
}
?>
		<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['data']->value['cambios_vehiculos']) {?>
			<?php
$_from = $_smarty_tpl->tpl_vars['data']->value['cambios_vehiculos'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cv']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['cv']->value) {
$_smarty_tpl->tpl_vars['cv']->_loop = true;
$foreach_cv_Sav = $_smarty_tpl->tpl_vars['cv'];
?>
				<?php if ($_smarty_tpl->tpl_vars['key']->value == 'nuevos') {?>
					<?php
$_from = $_smarty_tpl->tpl_vars['cv']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['new_vehiculo'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['new_vehiculo']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['new_vehiculo']->value) {
$_smarty_tpl->tpl_vars['new_vehiculo']->_loop = true;
$foreach_new_vehiculo_Sav = $_smarty_tpl->tpl_vars['new_vehiculo'];
?>
						<div class="alert alert-info" role="alert" style="font-weight:bold;">Nuevo Veh&iacute;culo: <?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->dominio;?>
</div>
						<div class="bs-example" id="">
							<table class="table table-hover table-striped" id="">
								<thead>
									<tr>
										<th>Tipo Solicitud: Nuevo Veh&iacute;culo</th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->dominio;?>
</td>
										<td>
											<div class="container_buttons" id="container_buttons_cv_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->id;?>
" style="float:right;">
												<?php if ($_smarty_tpl->tpl_vars['new_vehiculo']->value->estado == 'A') {?>
													<span class="aprobado">APROBADO</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['new_vehiculo']->value->estado == 'R') {?>
													<span class="rechazado">RECHAZADO</span>
												<?php } elseif ($_smarty_tpl->tpl_vars['new_vehiculo']->value->estado == 'P') {?>
													<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
													<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
													<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Ver Detalles" onclick="verDetalleVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['new_vehiculo']->value->id;?>
);" data-toggle="modal" data-target="#detalle_vehiculo_popup"><span class="fa fa-eye"></span></button>
												<?php }?>
											</div>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					<?php
$_smarty_tpl->tpl_vars['new_vehiculo'] = $foreach_new_vehiculo_Sav;
}
?>
				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['cv']->value['info']) {?>
						<div class="alert alert-info" role="alert" style="font-weight:bold;">
							<?php if ($_smarty_tpl->tpl_vars['cv']->value['info']->dominio) {?>
								Veh&iacute;culo: <?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->dominio;?>

							<?php } else { ?>
							 	Veh&iacute;culo: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->dominio;?>

							 <?php }?>
						</div>
						<div class="bs-example" id="item_cv_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->id;?>
">
							<div class="acciones">
								<div class="container_subtitle" style="float:left;">
									<?php if ($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_cambio == 'E') {?>
										<b>Editar Informaci&oacute;n</b>
									<?php } elseif ($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_cambio == 'B') {?>
										<b>Borrar Veh&iacute;culo</b>
									<?php }?>
								</div>
								<div class="container_buttons" id="container_buttons_cv_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->id;?>
" style="float:right;">
									<?php if ($_smarty_tpl->tpl_vars['cv']->value['info']->estado == 'A') {?>
										<span class="aprobado">APROBADO</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cv']->value['info']->estado == 'R') {?>
										<span class="rechazado">RECHAZADO</span>
									<?php } elseif ($_smarty_tpl->tpl_vars['cv']->value['info']->estado == 'P') {?>
										<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
										<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
									<?php }?>
								</div>
							</div>

							<div style="clear:both;"></div>
							<div class="contenidos" style="margin-top:10px;">
								
								<?php if ($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_cambio == 'E') {?>
									<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
										<div><b>De</b></div>
										<div>Dominio/Matr&iacute;cula: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->dominio;?>
</div>
										<div>Tipo Veh&iacute;culo: <?php echo TipoVehiculo::get_descripcion_by_codigo(Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_vehiculo);?>
</div>
										<div>Tipo Caja: <?php if (Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_caja) {?> <?php echo TipoCaja::get_descripcion_by_codigo(Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_caja);?>
 <?php } else { ?> - <?php }?></div>
										<div>Descripci&oacute;n: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->descripcion;?>
</div>
									</div>
									<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
										<div><b>A</b></div>
										<div>Dominio/Matr&iacute;cula: <?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->dominio;?>
</div>
										<div>Tipo Veh&iacute;culo: <?php echo TipoVehiculo::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_vehiculo);?>
</div>
										<div>Tipo Caja: <?php if ($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_caja) {?> <?php echo TipoCaja::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_caja);?>
 <?php } else { ?> - <?php }?></div>
										<div>Descripci&oacute;n: <?php echo $_smarty_tpl->tpl_vars['cv']->value['info']->descripcion;?>
</div>
									</div>
									<div style="clear:both;"></div>
								
								<?php } elseif ($_smarty_tpl->tpl_vars['cv']->value['info']->tipo_cambio == 'B') {?>
									<div>Dominio/Matr&iacute;cula: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->dominio;?>
</div>
									<div>Tipo Veh&iacute;culo: <?php echo TipoVehiculo::get_descripcion_by_codigo(Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_vehiculo);?>
</div>
									<div>Tipo Caja: <?php if (Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_caja) {?> <?php echo TipoCaja::get_descripcion_by_codigo(Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->tipo_caja);?>
 <?php } else { ?> - <?php }?></div>
									<div>Descripci&oacute;n: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['cv']->value['info']->vehiculo_id)->descripcion;?>
</div>
								<?php }?>
							</div>
						</div>
					<?php }?>
					
					<?php if ($_smarty_tpl->tpl_vars['cv']->value['permisos']) {?>
						<div class="alert alert-info" role="alert" style="font-weight:bold;">Permisos del Veh&iacute;culo: <?php echo Vehiculo::find($_smarty_tpl->tpl_vars['key']->value)->dominio;?>
</div>
						<?php
$_from = $_smarty_tpl->tpl_vars['cv']->value['permisos'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['cpv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['cpv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['cpv']->value) {
$_smarty_tpl->tpl_vars['cpv']->_loop = true;
$foreach_cpv_Sav = $_smarty_tpl->tpl_vars['cpv'];
?>
							<div class="bs-example" id="item_cpv_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cpv']->value->id;?>
">
								<?php if ($_smarty_tpl->tpl_vars['cpv']->value->tipo_cambio == 'A') {?>
									<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Agregar Permiso", null, 0);?>
								<?php } elseif ($_smarty_tpl->tpl_vars['cpv']->value->tipo_cambio == 'E') {?>
									<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Editar Permiso", null, 0);?>
								<?php } else { ?>
									<?php $_smarty_tpl->tpl_vars["titulo"] = new Smarty_Variable("Borrar Permiso", null, 0);?>
								<?php }?>

								<div class="acciones">
									<div class="container_subtitle" style="float:left;">
										<b><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</b>
									</div>
									<div class="container_buttons" id="container_buttons_cpv_<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
_<?php echo $_smarty_tpl->tpl_vars['cpv']->value->id;?>
" style="float:right;">
										<?php if ($_smarty_tpl->tpl_vars['cpv']->value->estado == 'A') {?>
											<span class="aprobado">APROBADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['cpv']->value->estado == 'R') {?>
											<span class="rechazado">RECHAZADO</span>
										<?php } elseif ($_smarty_tpl->tpl_vars['cpv']->value->estado == 'P') {?>
											<button style="float:right;" type="button" class="btn btn-warning" title="Rechazar" onclick="operarCambioPermisoVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cpv']->value->id;?>
, 'rechazar');"><span class="fa fa-times"></span></button>
											<button style="float:right;margin-right:5px;" type="button" class="btn btn-info" title="Aceptar" onclick="operarCambioPermisoVehiculo(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
, <?php echo $_smarty_tpl->tpl_vars['cpv']->value->id;?>
, 'aceptar');"><span class="fa fa-check"></span></button>
										<?php }?>
									</div>
								</div>

								<div style="clear:both;"></div>
								<div class="contenidos" style="margin-top:10px;">
									
									<?php if ($_smarty_tpl->tpl_vars['cpv']->value->tipo_cambio == 'A') {?>
										
										<div>CSC: <?php echo $_smarty_tpl->tpl_vars['cpv']->value->residuo;?>
</div>
										<!-- <div>Descripci&oacute;n: <?php echo obtener_categoria_residuo($_smarty_tpl->tpl_vars['cpv']->value->residuo);?>
</div>-->
										<div>Estado: <?php echo obtener_estado($_smarty_tpl->tpl_vars['cpv']->value->estado);?>
</div>
										<div>Cantidad: <?php echo $_smarty_tpl->tpl_vars['cpv']->value->cantidad;?>
</div>
									
									<?php } elseif ($_smarty_tpl->tpl_vars['cpv']->value->tipo_cambio == 'E') {?>
										<div id="container_old" style="float:left;border:1px solid #ddd;padding:5px;width:300px;">
											<div><b>De</b></div>
											<div>CSC: <?php echo PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->residuo;?>
</div>
										<!--	<div>Descripci&oacute;n: <?php echo obtener_categoria_residuo(PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->residuo);?>
</div>-->
											<div>Estado: <?php echo obtener_estado(PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->estado);?>
</div>
											<div>Cantidad: <?php echo PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->cantidad;?>
</div>
										</div>
										<div id="container_new" style="float:left;border:1px solid #ddd;padding:5px;margin-left:20px;width:300px;">
											<div><b>A</b></div>
											<div>CSC: <?php echo $_smarty_tpl->tpl_vars['cpv']->value->residuo;?>
</div>
										<!--	<div>Descripci&oacute;n: <?php echo obtener_categoria_residuo($_smarty_tpl->tpl_vars['cpv']->value->residuo);?>
</div>-->
											<div>Estado: <?php echo obtener_estado($_smarty_tpl->tpl_vars['cpv']->value->estado);?>
</div>
											<div>Cantidad: <?php echo $_smarty_tpl->tpl_vars['cpv']->value->cantidad;?>
</div>
										</div>
										<div style="clear:both;"></div>
									
									<?php } elseif ($_smarty_tpl->tpl_vars['cpv']->value->tipo_cambio == 'B') {?>
										<div>CSC: <?php echo PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->residuo;?>
</div>
										<!--	<div>Descripci&oacute;n: <?php echo obtener_categoria_residuo(PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->residuo);?>
</div>-->
										<div>Estado: <?php echo obtener_estado(PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->estado);?>
</div>
										<div>Cantidad: <?php echo PermisoVehiculo::find($_smarty_tpl->tpl_vars['cpv']->value->vehiculo_permiso_id)->cantidad;?>
</div>
									<?php }?>
								</div>
							</div>
						<?php
$_smarty_tpl->tpl_vars['cpv'] = $foreach_cpv_Sav;
}
?>
					<?php }?>
				<?php }?>
			<?php
$_smarty_tpl->tpl_vars['cv'] = $foreach_cv_Sav;
}
?>
		<?php }?>

	</div>

	
	<input type="hidden" id="establecimiento_id" name="establecimiento_id" value="<?php echo $_smarty_tpl->tpl_vars['establecimiento']->value->id;?>
" />

	<div align="right">
		<button class="btn btn-info btn-sm" type="button" style="margin-left:10px;" onclick="finalizarSolicitud(<?php echo $_smarty_tpl->tpl_vars['solicitud']->value->id;?>
)">Finalizar</button>
		<button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
	</div>

	<div class="clear20"></div>
</div>


<?php echo '<script'; ?>
>
	$(document).ready(function() {});

	function operarCambioPermisoEstablecimiento(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cpe_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_permisos_establecimientos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function verDetalleCambioEstablecimiento(solicitud_id, cambio_id)
	{
		console.info("CambioEstablecimiento - solicitud: "+solicitud_id+" - "+"cambio_id: "+cambio_id);

		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_cambios_establecimientos.php",
			data: {
				solicitud_id: solicitud_id,
				cambio_id: cambio_id,
			},
			dataType: "html",
			success: function(html_response) {
				if (html_response != 'error') {
					$('#detalle_establecimiento_popup_title').html('Detalles');
					$('#detalle_establecimiento_popup_body').html(html_response);
					$('#detalle_establecimiento_popup_content').width(800);
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: 'No fue posible identificar el cambio solicitado. Por favor contacte al administrador del sitio.',
						type: BootstrapDialog.TYPE_DANGER,
					});
					$('#detalle_establecimiento_popup').modal('hide');
				}
			}
		});
	}

	function operarCambioEstablecimiento(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_ce_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_establecimientos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
						if (retorno['permisos_sucursal']) {
							$.each(retorno['permisos_sucursal'], function(key, cp_suc_id) {
								var container_buttons_permiso_sucursal = $('div#container_buttons_cpe_'+solicitud_id+'_'+cp_suc_id);
								container_buttons_permiso_sucursal.html('<span class="rechazado">RECHAZADO</span>');
							});
						}
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function operarCambioCaa(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_ccaa_'+solicitud_id+'_'+cambio_id);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_caa.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					if (accion == 'aceptar') {
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function verDetalleVehiculo(solicitud_id, cambio_id)
	{
		$.ajax({
			type: "GET",
			url: admin_path+"/operacion/set_cambios_vehiculos.php",
			data: {
				solicitud_id: solicitud_id,
				cambio_id: cambio_id,
			},
			dataType: "html",
			success: function(html_response) {
				if (html_response != 'error') {
					$('#detalle_vehiculo_popup_title').html('Detalles');
					$('#detalle_vehiculo_popup_body').html(html_response);
					$('#detalle_vehiculo_popup_content').width(600);
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: 'No fue posible identificar el cambio solicitado. Por favor contacte al administrador del sitio.',
						type: BootstrapDialog.TYPE_DANGER,
					});
					$('#detalle_vehiculo_popup').modal('hide');
				}
			}
		});
	}

	function operarCambioVehiculo(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cv_'+solicitud_id+'_'+cambio_id);
		// console.info("container_buttons vehiculo: "+container_buttons);
		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_vehiculos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function operarCambioPermisoVehiculo(solicitud_id, cambio_id, accion)
	{
		var container_buttons = $('div#container_buttons_cpv_'+solicitud_id+'_'+cambio_id);
		console.info("container_buttons: "+container_buttons);

		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_cambios_permisos_vehiculos.php",
			data: {
				accion: accion,
				solicitud_id: solicitud_id,
				cambio_id: cambio_id
			},
			dataType: "text json",
			success: function(retorno) {
				if (retorno['estado'] == 'success') {
					console.info("success");console.info(accion);
					if (accion == 'aceptar') {
						console.info("aprobado");
						container_buttons.html('<span class="aprobado">APROBADO</span>');
					} else if (accion == 'rechazar') {
						console.info("rechazar");
						container_buttons.html('<span class="rechazado">RECHAZADO</span>');
					}
				}
				else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: retorno['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}

	function finalizarSolicitud(solicitud_id)
	{
		$.ajax({
			type: "POST",
			url: admin_path+"/operacion/set_solicitud_de_cambios.php",
			data: { solicitud_id: solicitud_id },
			dataType: "text json",
			success: function(response) {
				console.debug(response);
				if (response['resultado'] != 'error') {
					mostrarMensajeYRedireccionar('Solicitud de Cambios finalizada');
				} else {
					BootstrapDialog.alert({
						title: 'Ha ocurrido un error.',
						message: response['error'],
						type: BootstrapDialog.TYPE_DANGER,
					});
				}
			}
		});
	}
<?php echo '</script'; ?>
>
<?php }
}
?>