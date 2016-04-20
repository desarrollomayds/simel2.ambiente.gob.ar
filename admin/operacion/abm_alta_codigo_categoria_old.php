<?
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");

session_start();
// acl
$modulo_id = "19";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

// smarty
$smarty = inicializar_smarty();

f (isset($_POST['accion'])) {

	switch ($_POST['accion']) {
		case 'buscar':
			# code...
			$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : NULL;
			$residuo = new Residuo;
			$residuos = $residuo->get_listado_residuos($criterio);
			break;
		case 'mostrar_popup_seleccion':
			echo generar_html_popup();
			exit(0);
			break;
		case 'asignar_permiso':
			$model = new Residuo;
			$model->residuo_id = $_POST['residuo_id'];
			$model->residuo = $_POST['residuo'];

			try {
				$model->save();
			} catch (Exception $r) {
				die($r->getMessage());
			}
			break;
	}
}	

$modelo = new Residuo;
list($residuos, $paginador) = $modelo->get_listado_residuos($_POST['criterio']);

$smarty->assign('residuos', $residuos);
$smarty->assign('criterio', $criterio);
$smarty->assign('paginador', $paginador);
$smarty->display('drp/operacion/abm_alta_codigo_categoria_old.tpl');

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
/*
