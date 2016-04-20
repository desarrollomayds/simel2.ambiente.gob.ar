<?
	require_once("../../../global_incs/librerias/securimage/securimage.php");
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");
	require_once("../../../global_incs/librerias/drp.inc.php");
	require_once("../../../global_incs/librerias/simple.csv.php");

	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", true);

	//el flag en 1 significa que el filtro esta activo
	$flag_fecha_desde = empty($_POST['fecha_desde']) ? 0 : 1;
	$flag_fecha_hasta = empty($_POST['fecha_hasta']) ? 0 : 1;

	$conexion = Manifiesto::Connection();

	$_POST['fecha_desde']  = $conexion->escape($_POST['fecha_desde']);
	$_POST['fecha_hasta']  = $conexion->escape($_POST['fecha_hasta']);

	$res = Manifiesto::find_by_sql("
		SELECT
			`nombre` AS 'NOMBRE',
			`cuit` AS 'CUIT',
			DATE_FORMAT(`fecha_inscripcion`,'%d/%m/%Y') 'FECHA INSCRIPCION',
			DATE_FORMAT(`fecha_inicio_act`,'%d/%m/%Y')  'FECHA INICIO ACTIVIDADES'
		FROM
			`empresas`
		WHERE
			(
				fecha_inscripcion  >= STR_TO_DATE($_POST[fecha_desde], '%d/%m/%Y')
				OR '0' = '$flag_fecha_desde'
			)
			AND (
				fecha_inscripcion  <= STR_TO_DATE($_POST[fecha_hasta], '%d/%m/%Y')
				OR '0' = '$flag_fecha_hasta'
			)

	");

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	/*
	$smarty->force_compile = true;
	$smarty->caching       = false;
	* */

	$campos = array();

	foreach( $res as &$current ){
		//NO CONOZCO OTRA FORMA DE VOLVERLO UN ARRAY
		$current = (array)json_decode($current->to_json());
		if( empty($campos) ){
			$campos = array_keys($current);
		}
	}

	foreach( $campos as &$current_campo){
		$current_campo = str_replace("_", " ", $current_campo);
		$current_campo = strtoupper($current_campo);
	}
	/*
	echo  "<pre>" ;
	var_dump($_POST);exit;*/

	if( isset($_POST['ver_reporte_x']) && isset($_POST['ver_reporte_y']) || empty($res) ){
		//MOSTRAR PLANTILLLA, TABLA

		$smarty->assign('CAMPOS'   , $campos );
		$smarty->assign('RESULTADO', $res );
		$smarty->assign('TITULO', "Lista de empresas registradas" );
		$smarty->display('drp/operacion/tabla_reporte.tpl');
		exit;
	} elseif ( isset($_POST['descargar_reporte_x']) && isset($_POST['descargar_reporte_y']) ) {
		//header y printcsv
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename=LISTA_EMPRESAS_REGISTRADAS.csv');

		echo printAsCSV ($campos) .PHP_EOL;
		foreach ( $res as &$curr)
			echo printAsCSV ($curr) .PHP_EOL;
		exit;
	} else {
		die('Ingreso no valido');

	}


	session_write_close();
?>
