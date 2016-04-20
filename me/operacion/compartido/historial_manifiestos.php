<?php
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");
require_once("../../../global_incs/librerias/csv.php");
require_once("../../../global_incs/librerias/paginator/paginator.class.php");

session_write_close();

$criterios = obtener_criterios_busqueda_manifiestos();
$tipo_manifiesto = $criterios['tipo_manifiesto'];

$model = new Manifiesto;

if (isset($_GET['exportar']))
{
	$manifiestos = $model->get_listado_manifiestos_finalizados($criterios, false);

	$csv = new CSV();
	$csv_data = parseDataForCSV($manifiestos);
	$csv->setHeading('Id', 'Empresa Creadora', 'Establecimiento', 'Sucursal', 'Estado', 'Fecha Tratamiento');
	$csv->addData($csv_data);
	 
	$csv->output("D", "historial_manifiestos.csv");
	$csv->clear();
}
elseif (isset($_GET['action']) AND $_GET['action'] == 'get_manifiestos_relacionados')
{
	$response = array();
	if (is_numeric($_GET['manifiesto_cabecera_id'])) {
		$manif_relacionados = Manifiesto::obtener_manifiestos_relacionados($_GET['manifiesto_cabecera_id']);
		$html = parseHtmlRowsManifiestosRelacionados($manif_relacionados);
		$response['estado'] = 'ok';
		$response['html'] = $html;
	}
	else {
		$response['estado'] = 'error';
	}

	echo json_encode($response);
	exit(0);
}
else
{
	list($manifiestos, $pagination) = $model->get_listado_manifiestos_finalizados($criterios);

	$smarty  = inicializar_smarty();
	$smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
	$smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('MANIFIESTOS', $manifiestos);
	$smarty->assign('PERFIL', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']);
	$smarty->assign('TIPO_MANIFIESTO', isset($_GET['tipo_manifiesto']) ? $_GET['tipo_manifiesto'] : 0);
	$smarty->assign('filtros_buscador', array('protocolo_id', 'creador_empresa', 'fecha_tratamiento'));
	$smarty->assign('criterios', $criterios);
	$smarty->assign('pagination', $pagination);
	$smarty->display('operacion/compartido/historial_manifiestos.tpl');
}

session_write_close();

function parseDataForCSV($manifiestos)
{
	$final_array = array();

	foreach ($manifiestos as $manifiesto) {
		$final_array[] = Array(
			'id_protocolo_manifiesto' => formatear_id_protocolo_manifiesto($manifiesto->id_protocolo_manifiesto),
			'nombre_empresa' => $manifiesto->nombre_empresa,
			'nombre_establecimiento' => $manifiesto->nombre_establecimiento,
			'sucursal' => $manifiesto->sucursal,
			'Estado' => 'Finalizado',
			'fecha_tratamiento' => $manifiesto->fecha_tratamiento->format('Y-m-d H:i:s'),
		);
	}

	return $final_array;
}


function parseHtmlRowsManifiestosRelacionados($manif_relacionados)
{
	$html = '';

	foreach ($manif_relacionados as $hijo) {
		$html .= '
			<tr class="tr_manifiesto_relacionado_al_'.$hijo->manifiesto_padre.'" style="background-color:gainsboro;font-size:12px;">
				<td id="id">'.formatear_id_protocolo_manifiesto($hijo->id_protocolo_manifiesto).'</td>
				<td>'.$hijo->fecha_creacion->format("Y-m-d H:i:s").'</td>
				<td>'.$hijo->nombre_empresa.'</td>
				<td>'.$hijo->nombre_establecimiento.'</td>
				<td>'.$hijo->estado.'</td>
				<td width="25" align="center">
					<a class="hand" href="imprimir_constancia_recepcion.php?id='.$hijo->id.'">
						<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
					</a>
				</td>
				<td width="25" align="center">
					<a class="hand" href="imprimir_certificado_tratamiento.php?id='.$hijo->id.'">
						<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
					</a>
				</td>
				<td width="27" align="left">
					<a class="hand" href="imprimir_manifiesto.php?id='.$hijo->id.'">
						<i class="fa fa-print fa-lg" style="line-height:30px;color: #333333;"></i>
					</a>
				</td>
				<td>&nbsp;</td>';
	}

	return $html;
}
