<?php /* Smarty version 3.1.27, created on 2016-02-05 15:01:15
         compiled from "/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/ajax/ajax_obtener_informacion_establecimiento.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:209815508856b4e36b3b8230_54483748%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f268ec862698715a8e5e9a2133ccf6d066674911' => 
    array (
      0 => '/sitios/simel2.ambiente.gob.ar/global_incs/t/templates/drp/operacion/ajax/ajax_obtener_informacion_establecimiento.tpl',
      1 => 1454610791,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209815508856b4e36b3b8230_54483748',
  'variables' => 
  array (
    'ESTABLECIMIENTO' => 0,
    'PERMISO' => 0,
    'TRAT' => 0,
    'VEHICULO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_56b4e36b6311f5_64564266',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56b4e36b6311f5_64564266')) {
function content_56b4e36b6311f5_64564266 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '209815508856b4e36b3b8230_54483748';
?>
<div role="tabpanel" class="bs-example tab-pane tabUnique" id="subt_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
">
	<p>
		<strong>Nombre: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMBRE'];?>
</span>
		<br>
		<strong>Tipo: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO_'];?>

		<br>
		<strong>Usuario: </strong><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['USUARIO'];?>

		<h3 class="bg-warning">
			<strong>CAA: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_NUMERO'];?>
</span>
			<strong>Vencimiento: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CAA_VENCIMIENTO'];?>
</span>
		 </h3>
	</p>
	<h3 class="bg-warning">
		<strong>Expediente: </strong>
		<span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/exnu" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];?>
" class="editableFeld"><?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO']) {
echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_NUMERO'];
} else { ?>-<?php }?></span>
		
		<strong>A&ntilde;o: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/exanio" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];?>
" class="editableFeld"><?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO']) {
echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EXPEDIENTE_ANIO'];
} else { ?>-<?php }?></span>
	</h3>
	<strong>Actividad: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ACTIVIDAD_'];?>
</span>
	<br>
	<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['DESCRIPCION'];?>
</span>
	<br>
	<strong>Direcci&oacute;n Email: </strong><span data-pk="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
" data-name="Est/email" data-id="<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EMAIL'];?>
" class="editableFeld"><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['EMAIL'];?>
</span>

	<hr>
	<div class="row">
		<div class="col-md-4">
			<strong>Domicilio real</strong>
			<br>
			<br>
			<strong>Calle: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_R'];?>
</span>
			<br>
			<strong>N&uacute;mero: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_R'];?>
</span>
			<strong>Piso: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_R'];?>
</span>
			<br>
			<strong>Provincia: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_R_'];?>
</span>
			<br>
			<strong>Localidad: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_R_'];?>
</span>
			<br>
			<strong>C. Postal: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL'];?>
</span>
		</div>
		<div class="col-md-4">
			<strong>Domicilio constituido</strong>
			<br>
			<br>
			<strong>Calle: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CALLE_C'];?>
</span>
			<br>
			<strong>N&uacute;mero: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NUMERO_C'];?>
</span>
			<strong>Piso: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PISO_C'];?>
</span>
			<br>
			<strong>Provincia: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PROVINCIA_C_'];?>
</span>
			<br>
			<strong>Localidad: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['LOCALIDAD_C_'];?>
</span>
			<br>
			<strong>C. Postal: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['CODIO_POSTAL_C'];?>
</span>
		</div>
		<div class="col-md-4">
			<strong>Nomenclatura Catastral: </strong>
			<span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_CIRC'];?>
</span> -
			<span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SEC'];?>
</span> -
			<span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_MANZ'];?>
</span> -
			<span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_PARC'];?>
</span> -
			<span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUB_PARC'];?>
</span> &nbsp;&nbsp;&nbsp;&nbsp;
			<br>
			<strong>Habilitaciones: </strong><span><?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['NOMENCLATURA_CATASTRAL_SUBPARC'];?>
</span>&nbsp;&nbsp;&nbsp;&nbsp;
		</div>
	</div>
	<br>
	<div id="container_establecimiento_permisos_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
">

		<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['PERMISOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
			<div class="bs-example" id="container_residuo_<?php echo obtener_tipo($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO']);?>
_<?php echo $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['ID'];?>
_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
">
				<p>
					<strong>CSC: </strong><span id="callbPerm"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</span>
					<br>
					<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</span>
					<br>
					<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 1) {?>
						<strong>Cantidad: </strong>
						<span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
</span>
						<br> 
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 3) {?>
						<strong>Tratamientos: </strong>
						<ul>
							<?php
$_from = $_smarty_tpl->tpl_vars['PERMISO']->value['TRATAMIENTOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['TRAT'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['TRAT']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['TRAT']->value) {
$_smarty_tpl->tpl_vars['TRAT']->_loop = true;
$foreach_TRAT_Sav = $_smarty_tpl->tpl_vars['TRAT'];
?>
								<li><?php echo $_smarty_tpl->tpl_vars['TRAT']->value;?>
</li>
							<?php
$_smarty_tpl->tpl_vars['TRAT'] = $foreach_TRAT_Sav;
}
?>
						</ul>
					<?php }?>
				</p>
			</div>
		<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
	</div> <!-- end div container_establecimiento_permisos -->

	<?php if ($_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['TIPO'] == 2) {?>

		<div id="container_vehiculos_transportista">
			<?php
$_from = $_smarty_tpl->tpl_vars['ESTABLECIMIENTO']->value['VEHICULOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['VEHICULO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['VEHICULO']->value) {
$_smarty_tpl->tpl_vars['VEHICULO']->_loop = true;
$foreach_VEHICULO_Sav = $_smarty_tpl->tpl_vars['VEHICULO'];
?>
				<div class="bs-example vehiculos_establecimiento" id="container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
">
					<p>
						<strong>Dominio/Matr&iacute;cula: </strong><span><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DOMINIO'];?>
</span><br>
						<strong>Tipo veh&iacute;culo: </strong><span><?php echo TipoVehiculo::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_VEHICULO']);?>
</span><br>
						<strong>Tipo caja: </strong><span><?php echo TipoCaja::get_descripcion_by_codigo($_smarty_tpl->tpl_vars['VEHICULO']->value['TIPO_CAJA']);?>
</span><br>
						<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['DESCRIPCION'];?>
</span>
					</p>
				</div> <!-- end of container_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
 -->

				<div class="bs-example" id="container_permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" style="    margin-left: 35px;">
					<p class="registro-titulo bg-warning">
						<b>Permisos del Veh&iacute;culo:</b>
					</p>
					<?php
$_from = $_smarty_tpl->tpl_vars['VEHICULO']->value['PERMISOS'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['PERMISO'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['PERMISO']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['PERMISO']->value) {
$_smarty_tpl->tpl_vars['PERMISO']->_loop = true;
$foreach_PERMISO_Sav = $_smarty_tpl->tpl_vars['PERMISO'];
?>
						<div class="bs-example permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
" id="container_permiso_<?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ID'];?>
_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
">
							<p>

								<strong>CSC: </strong><span id="callbPerm"><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO'];?>
</span><br>
								<strong>Descripci&oacute;n: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['RESIDUO_'];?>
</span><br>
								<strong>Cantidad: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['CANTIDAD'];?>
 kg</span><br>
								<strong>Estado: </strong><span><?php echo $_smarty_tpl->tpl_vars['PERMISO']->value['ESTADO_'];?>
</span>

							</p>
						</div>
					<?php
$_smarty_tpl->tpl_vars['PERMISO'] = $foreach_PERMISO_Sav;
}
?>
				</div> <!-- end of container_permisos_vehiculo_<?php echo $_smarty_tpl->tpl_vars['VEHICULO']->value['ID'];?>
 -->
			<?php
$_smarty_tpl->tpl_vars['VEHICULO'] = $foreach_VEHICULO_Sav;
}
?>
		</div> <!-- end of container_vehiculos_transportista -->
	<?php }?>
</div>


<?php echo '<script'; ?>
>
	$(document).ready(function() {

		$(".js-mupe").find("li").first().addClass("active");

		$('.editableFeld').each(function() {
			var opts = Array();
			if($(this).data('array')=="1") {
				opts.source = window[$(this).attr('data-values')];
				opts.type = 'select';
				opts.value = $(this).attr('data-id');
			}

			if($(this).attr('data-type')=="textarea") {
				opts.type = 'textarea';
			}
			opts.pk = $(this).attr('data-pk');
			opts.name = $(this).attr('data-name');
			opts.url = 'editField.php';
			opts.emptytext = '';
			opts.success = function(response, newValue) {
				if($(this).data('name')=="Veh/dom") {
					$('#vh2_'+$(this).data('pk')).html(newValue);
				}
				if($(this).data('callb')!=undefined && $(this).data('callb')!="") {
					$(this).parent().parent().find('#callbPerm').html(newValue);
				}

			};
			$(this).editable(opts);
		});
	}); // end of $(document).ready()

<?php echo '</script'; ?>
>
<?php }
}
?>