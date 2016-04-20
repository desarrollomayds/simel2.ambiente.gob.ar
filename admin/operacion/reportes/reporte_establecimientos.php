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
	$flag_cuit_empresa = empty($_POST['cuit_empresa']) ? 0 : 1;

	$conexion = Manifiesto::Connection();

	$_POST['cuit_empresa']  = $conexion->escape($_POST['cuit_empresa']);

	$res = Manifiesto::find_by_sql("
		SELECT
			empresas.nombre as nombre_empresa,
			empresas.cuit as cuit_empresa,
			if( establecimientos.caa_vencimiento < now() ,
			'si',
			'no') as vencido,
			establecimientos.nombre as nombre_establecimiento
		FROM
			establecimientos,
			empresas
		WHERE
			establecimientos.empresa_id = empresas.id
			AND (
				empresas.cuit like $_POST[cuit_empresa]
				OR '0' = '$flag_cuit_empresa'
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
		$smarty->assign('TITULO', "Protocolo Manifiestos" );
		$smarty->display('drp/operacion/tabla_reporte.tpl');
		exit;
	} elseif ( isset($_POST['descargar_reporte_x']) && isset($_POST['descargar_reporte_y']) ) {
		//header y printcsv
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename=PROTOCOLO_MANIFIESTOS.csv');

		echo printAsCSV ($campos) .PHP_EOL;
		foreach ( $res as &$curr)
			echo printAsCSV ($curr) .PHP_EOL;
		exit;
	} else {
		die('Ingreso no valido');

	}


	session_write_close();
?>
