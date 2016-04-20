<?
	require_once("../../../global_incs/librerias/securimage/securimage.php");
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");
	require_once("../../../global_incs/librerias/drp.inc.php");
	require_once("../../../global_incs/librerias/simple.csv.php");

	error_reporting(E_ALL | E_STRICT);
	ini_set("display_errors", false);

	//el flag en 1 significa que el filtro esta activo
	$flag_residuo           = empty($_POST['residuo']) ? 0 : 1;
	$flag_fecha_desde       = empty($_POST['fecha_desde']) ? 0 : 1;
	$flag_fecha_hasta       = empty($_POST['fecha_hasta']) ? 0 : 1;
	$flag_provincia_destino = empty($_POST['provincia_destino'])  ? 0 : 1;
	$flag_provincia_origen  = empty($_POST['provincia_origen']) ? 0 : 1;


	$conexion = Manifiesto::Connection();

	$_POST['fecha_desde']  = $conexion->escape($_POST['fecha_desde']);
	$_POST['fecha_hasta']  = $conexion->escape($_POST['fecha_hasta']);
	$_POST['residuo']      = $conexion->escape($_POST['residuo']);
	$_POST['provincia_origen']   = $conexion->escape($_POST['provincia_origen']);
	$_POST['provincia_destino']  = $conexion->escape($_POST['provincia_destino']);



	$res = Manifiesto::find_by_sql("
				SELECT
					DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS 'fecha creacion',
					RESIDUO,
					UPPER(ESTADO_RESIDUO) AS ESTADO_RESIDUO,
					CONTENEDOR,
					id_protocolo_manifiesto,
					CANTIDAD_REAL,
					CANTIDAD_ESTIMADA,
					PROVINCIA_ORIGEN,
					PROVINCIA_DESTINO
				FROM
					manifiestos as mani
				RIGHT JOIN
					(
						SELECT
							manifiesto_id,
							provincias.descripcion as PROVINCIA_ORIGEN,
							provincias.codigo as PROVINCIA_ORIGEN_CODIGO
						FROM
							generadores_manifiesto gen,
							establecimientos  est,
							empresas  emp,
							cat_provincias provincias
						WHERE
							gen.establecimiento_id = est.id
							AND est.provincia = provincias.codigo
							AND emp.id = est.empresa_id
					) AS GENERADOR
						ON GENERADOR.manifiesto_id = mani.id
				RIGHT JOIN
					(
						SELECT
							manifiesto_id,
							provincias.descripcion as PROVINCIA_DESTINO,
							provincias.codigo as PROVINCIA_DESTINO_CODIGO
						FROM
							operadores_manifiesto ope,
							establecimientos  est,
							empresas  emp,
											cat_provincias provincias
						WHERE
							ope.establecimiento_id = est.id
							AND est.provincia = provincias.codigo
							AND emp.id = est.empresa_id
					) AS OPERADOR
						ON OPERADOR.manifiesto_id = mani.id
				RIGHT JOIN
					(
						SELECT
							manifiestos.manifiesto_id AS manifiesto_id,
							manifiestos.residuo_id as RESIDUO,
							estados.descripcion AS ESTADO_RESIDUO,
							contenedor.descripcion as CONTENEDOR,
							manifiestos.cantidad_real as CANTIDAD_REAL,
							cantidad_estimada      as CANTIDAD_ESTIMADA
						FROM
							`residuos_manifiesto` manifiestos,
							`estados` ,
							`cat_contenedores` contenedor
						WHERE
							manifiestos.estado = estados.id
							AND manifiestos.contenedor_tipo_id = contenedor.codigo
					) AS RESIDUO
						ON RESIDUO.manifiesto_id = mani.id
				WHERE
					id_protocolo_manifiesto > 0
					AND (RESIDUO = $_POST[residuo] OR '0' = '$flag_residuo')
					AND (fecha_creacion  >= STR_TO_DATE($_POST[fecha_desde], '%d/%m/%Y') OR '0' = '$flag_fecha_desde' )
					AND (fecha_creacion  <= STR_TO_DATE($_POST[fecha_hasta], '%d/%m/%Y') OR '0' = '$flag_fecha_hasta' )
					AND (PROVINCIA_DESTINO_CODIGO  = $_POST[provincia_destino] OR '0' = '$flag_provincia_destino')
					AND (PROVINCIA_ORIGEN_CODIGO   = $_POST[provincia_origen]  OR '0' = '$flag_provincia_origen')
				ORDER BY
					fecha_creacion,
					RESIDUO
	");

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$estados = array(
		'p' => 'pendiente',
		'r' => 'rechazado',
		'a' => 'aceptado',
		'e' => 'recibido',
		'f' => 'finalizado'
	);

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
		$smarty->assign('TITULO', "LISTADO Y" );
		$smarty->display('drp/operacion/tabla_reporte.tpl');
		exit;
	} elseif ( isset($_POST['descargar_reporte_x']) && isset($_POST['descargar_reporte_y']) ) {
		//header y printcsv
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename=LISTADO_Y.csv');

		echo printAsCSV ($campos) .PHP_EOL;
		foreach ( $res as &$curr)
			echo printAsCSV ($curr) .PHP_EOL;
		exit;
	} else {
		die('Ingreso no valido');

	}


	session_write_close();
?>
