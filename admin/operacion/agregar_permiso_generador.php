<?php
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");


//require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 22;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

if (isset($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'buscar':
			# code...
			$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : NULL;
			$establecimiento = new Establecimiento;
			$establecimientos = $establecimiento->obtener_establecimiento_sin_permisos($criterio);
			$smarty->assign('accion', "Buscar");
			break;
		case 'mostrar_popup_seleccion':
			echo generar_html_popup();
			exit(0);
			break;
		case 'asignar_permiso':
			$model = new PermisoEstablecimiento;
			$model->establecimiento_id = $_POST['establecimiento_id'];
			$model->residuo = $_POST['residuo'];
			$smarty->assign('accion', "Asignar");
			try {
				$model->save();

				$smarty->assign('mensaje', true);				
			} catch (Exception $e) {
				$smarty->assign('mensaje', false);
				die($e->getMessage());
			}
			break;
	}
}	
$smarty->assign('establecimientos', $establecimientos);
$smarty->assign('criterio', $criterio);
//$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/agregar_permiso_generador.tpl');
session_write_close();


function generar_html_popup()
{
	$residuos = Residuo::get_all();
	
	$html = '
		<div class="backGrey" id="residuos_popup">
		    <form class="form-horizontal" method="POST" action="agregar_permiso_generador.php">
		        <div class="form-group">
		            <label class="col-sm-2 control-label">Residuo</label>
		            <div class="col-sm-10">
		                <select class="form-control residuos" name="residuo" id="residuo">';

	foreach ($residuos as $r) {
		$html .= '			<option value="'.$r->id.'">'.$r->codigo.' - '.utf8_encode($r->descripcion).'</option>';
	}

	$html .= '
		                </select>
		            </div>
		        </div>
			    <div align="right">
			        <button type="submit" class="btn btn-success btn-sm" id="btn_aceptar">Aceptar</button>
			        <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal" style="margin-left:10px;">Cancelar</button>
			    </div>

			    <input type="hidden" name="accion" value="asignar_permiso">
			    <input type="hidden" name="establecimiento_id" id="establecimiento_id" value="'.$_POST['establecimiento_id'].'">

			    <div class="clear20"></div>
			</div>

			<script>
    			$(".residuos").chosen({width:"100%;"});
    		</script>';

	return $html;
}
