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
	$res = Manifiesto::find_by_sql("SELECT * FROM permisos_establecimientos 
	LEFT JOIN establecimientos
ON permisos_establecimientos.establecimiento_id=establecimientos.id;	
	");
	
	/*$res = Manifiesto::find_by_sql("
	SELECT
		id_protocolo_manifiesto,
		NOMBRE_GENERADOR,
		CUIT_GENERADOR,
		NOMBRE_TRANSPORTISTA,
		CUIT_TRANSPORTISTA,
		NOMBRE_OPERADOR,
		CUIT_OPERADOR,
		DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS 'fecha creacion',
		DATE_FORMAT(fecha_aceptacion, '%d/%m/%Y') AS 'fecha aceptacion',
		DATE_FORMAT(fecha_tratamiento,'%d/%m/%Y') AS 'fecha tratamiento',
		#tipo_manifiesto,
		#establecimiento_creador,
		estado,
		IF( estado_autorizacion_drp > 0 , 'SI' , 'NO') 'ESTADO AUTORIZACION DRP',
		DATE_FORMAT(fecha_autorizacion_drp,'%d/%m/%Y') AS 'fecha  autorizacion_drp',
		usuario_autorizacion_drp
	FROM
		manifiestos as mani
	RIGHT JOIN
		(
			SELECT
				emp.nombre  NOMBRE_GENERADOR,
				emp.cuit    CUIT_GENERADOR,
				manifiesto_id
			FROM
				generadores_manifiesto gen,
				establecimientos  est,
				empresas  emp
			WHERE
				gen.establecimiento_id = est.id
				AND emp.id = est.empresa_id
		) AS GENERADOR
			ON GENERADOR.manifiesto_id = mani.id
	RIGHT JOIN
		(
			SELECT
				emp.nombre  NOMBRE_TRANSPORTISTA,
				emp.cuit    CUIT_TRANSPORTISTA,
				manifiesto_id
			FROM
				transportistas_manifiesto trans,
				establecimientos  est,
				empresas  emp
			WHERE
				trans.establecimiento_id = est.id
				AND emp.id = est.empresa_id
		) AS TRANSPORTISTA
			ON TRANSPORTISTA.manifiesto_id = mani.id
	RIGHT JOIN
		(
			SELECT
				emp.nombre  NOMBRE_OPERADOR,
				emp.cuit    CUIT_OPERADOR,
				manifiesto_id
			FROM
				operadores_manifiesto ope,
				establecimientos  est,
				empresas  emp
			WHERE
				ope.establecimiento_id = est.id
				AND emp.id = est.empresa_id
		) AS OPERADOR
			ON OPERADOR.manifiesto_id = mani.id
	WHERE
		id_protocolo_manifiesto > 0
		AND fecha_tratamiento IS NOT NULL
		AND (fecha_creacion  >= STR_TO_DATE($_POST[fecha_desde], '%d/%m/%Y') OR '0' = '$flag_fecha_desde' )
		AND (fecha_creacion  <= STR_TO_DATE($_POST[fecha_hasta], '%d/%m/%Y') OR '0' = '$flag_fecha_hasta' )
	ORDER BY
		id_protocolo_manifiesto

	");*/

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;


	$contenedores  = Array();
foreach($res as &$contenedor){
			$contenedores[] = Array(	
			'ID'      => $contenedor->id,
			'NOMBRE' => $contenedor->nombre,
			'RESIDUO' => $contenedor->residuo,
			'CANTIDAD' => $contenedor->cantidad,
			'ESTADO' => $contenedor->estado,
			'FECHA_INICIO' => $contenedor->fecha_inicio,
			'FECHA_FIN' => $contenedor->fecha_fin,
			'FLAG' => $contenedor->flag,
			'FECHA_ULTIMA_MODIFICACION' => $contenedor->fecha_ultima_modificacion,
			'USUARIO_ULTIMA_MODIFICACION' => $contenedor->usuario_ultima_modificacion,
			
			 );
		}

$campos[0]='ID';
$campos[1]='ESTABLECIMIENTO';
$campos[2]='RESIDUO';
$campos[3]='CANTIDAD';
$campos[4]='ESTADO';
$campos[5]='FECHA INICIO';
$campos[6]='FECHA FIN';
$campos[7]='FLAG';
$campos[8]='FECHA ULTIMA MODIFICACION';
$campos[9]='USUARIO ULTIMA MODIFICACION';





	if( isset($_POST['ver_reporte_x']) && isset($_POST['ver_reporte_y']) || empty($res) ){
		//MOSTRAR PLANTILLLA, TABLA

		$smarty->assign('CAMPOS'   , $campos );
		$smarty->assign('RESULTADO', $contenedores );
		$smarty->assign('TITULO', "Protocolo Manifiestos" );
		$smarty->display('drp/operacion/tabla_reporte.tpl');
		exit;
	} elseif ( isset($_POST['descargar_reporte_x']) && isset($_POST['descargar_reporte_y']) ) {
		//header y printcsv
		header('Content-type: application/force-download');
		header('Content-Transfer-Encoding: binary');
		header('Content-Disposition: attachment; filename=PROTOCOLO_MANIFIESTOS.csv');

		echo printAsCSV ($campos) .PHP_EOL;
		foreach ( $contenedores as &$curr)
			echo printAsCSV ($curr) .PHP_EOL;
		exit;
	} else {
		die('Ingreso no valido');

	}


	session_write_close();
?>
