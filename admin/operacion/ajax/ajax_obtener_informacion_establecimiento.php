<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty  = inicializar_smarty();
$errores  = Array();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	if ( ! isset($_GET['establecimiento_id']) || empty($_GET['establecimiento_id'])) {
		header('Location: listado_empresas.php');
	}

	$establecimiento = Establecimiento::find('first', array('conditions' => array('id = ?', $_GET['establecimiento_id'])));

	if ($establecimiento)
	{
		$smarty->assign('ESTABLECIMIENTO', obtener_info_establecimiento($establecimiento));
		$html = $smarty->fetch('drp\operacion\ajax\ajax_obtener_informacion_establecimiento.tpl');
		echo $html;
		exit(0);
	}
	else
	{
		header('Location: listado_empresas.php');
	}
}

session_write_close();

function obtener_info_establecimiento($establecimiento)
{
	$est_info = Array(
		'ID'                               => $establecimiento->id,
		'NOMBRE'                           => $establecimiento->nombre,
		'TIPO'                             => $establecimiento->tipo,
		'USUARIO'                          => $establecimiento->usuario,
		'CONTRASENIA'                      => $establecimiento->contrasenia,
		'CAA_NUMERO'                       => $establecimiento->caa_numero,
		'CAA_VENCIMIENTO'                  => formatear_fecha_activerecord($establecimiento->caa_vencimiento),
		'ACTIVIDAD'                        => utf8_encode($establecimiento->codigo_actividad),
		'FLAG'							   => $establecimiento->flag,
		'EXPEDIENTE_NUMERO'                => $establecimiento->expediente_numero,
		'EXPEDIENTE_ANIO'                  => $establecimiento->expediente_anio,
		'DESCRIPCION'                      => $establecimiento->descripcion,
		'EMAIL'                      	   => $establecimiento->email,

		'CALLE_R'                          => $establecimiento->calle,
		'NUMERO_R'                         => $establecimiento->numero,
		'PISO_R'                           => $establecimiento->piso,
		'PROVINCIA_R'                      => $establecimiento->provincia,
		'LOCALIDAD_R'                      => $establecimiento->localidad,
		'CODIO_POSTAL'                     => $establecimiento->codigo_postal,

		'CALLE_C'                          => $establecimiento->calle_c,
		'NUMERO_C'                         => $establecimiento->numero_c,
		'PISO_C'                           => $establecimiento->piso_c,
		'PROVINCIA_C'                      => $establecimiento->provincia_c,
		'LOCALIDAD_C'                      => $establecimiento->localidad_c,
		'CODIO_POSTAL_C'                   => $establecimiento->codigo_postal_c,

		'NOMENCLATURA_CATASTRAL'           => $establecimiento->nomenclatura_catastral_circ . " - " .
											  $establecimiento->nomenclatura_catastral_sec  . " - " .
											  $establecimiento->nomenclatura_catastral_manz . " - " .
											  $establecimiento->nomenclatura_catastral_parc . " - " .
											  $establecimiento->nomenclatura_catastral_sub_parc,

		'NOMENCLATURA_CATASTRAL_CIRC'      => $establecimiento->nomenclatura_catastral_circ,
		'NOMENCLATURA_CATASTRAL_SEC'       => $establecimiento->nomenclatura_catastral_sec,
		'NOMENCLATURA_CATASTRAL_MANZ'      => $establecimiento->nomenclatura_catastral_manz,
		'NOMENCLATURA_CATASTRAL_PARC'      => $establecimiento->nomenclatura_catastral_parc,
		'NOMENCLATURA_CATASTRAL_SUB_PARC'  => $establecimiento->nomenclatura_catastral_sub_parc,
		'HABILITACIONES'                   => $establecimiento->habilitaciones,

		'VEHICULOS'                        => Array(),
		'PERMISOS'                         => Array(),

		'TIPO_'                            => obtener_tipo($establecimiento->tipo),
		'TIPO_ID'                          => $establecimiento->tipo,
		'ACTIVIDAD_'                       => utf8_encode(obtener_actividad($establecimiento->codigo_actividad)),
		'ACTIVIDAD_ID'                     => $establecimiento->codigo_actividad,

	    'PROVINCIA_R_'             		   => obtener_provincia($establecimiento->provincia),
	    'PROVINCIA_R_ID'              	   => $establecimiento->provincia,
	    'LOCALIDAD_R_'              	   => obtener_localidad($establecimiento->localidad),
	    'LOCALIDAD_R_ID'              	   => $establecimiento->localidad,

		'PROVINCIA_C_'                     => obtener_provincia($establecimiento->provincia_c),
	    'PROVINCIA_C_ID'              	   => $establecimiento->provincia_c,
	    'LOCALIDAD_C_'              	   => obtener_localidad($establecimiento->localidad_c),
	    'LOCALIDAD_C_ID'              	   => $establecimiento->localidad_c,
	);

	$permisos = PermisoEstablecimiento::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $est_info['ID'], 't')));

	if ($permisos) {
		foreach ($permisos as $permiso) {
			$informacion_del_permiso = Array(
				'ID'			=> $permiso->id,
				'RESIDUO'		=> $permiso->residuo,
				'CANTIDAD'		=> $permiso->cantidad,
				'ESTADO'		=> $permiso->estado,
				'RESIDUO_'		=> obtener_categoria_residuo($permiso->residuo),
				'ESTADO_'		=> obtener_estado($permiso->estado),
				'ESTADO_ID'		=> $permiso->estado,
			);

			$tratamientos = array();

			foreach ($permiso->tratamientos as $trat) {
				$tratamientos[] = $trat->operacion_residuo;
			}

			$informacion_del_permiso['TRATAMIENTOS'] = $tratamientos;
			$est_info['PERMISOS'][] = $informacion_del_permiso;
		}
	}

	$vehiculos = Vehiculo::find('all', array('conditions' => array('establecimiento_id = ? and flag = ?', $est_info['ID'], 't')));

	if($vehiculos){
		foreach($vehiculos as $vehiculo){
			$vehiculo_ = Array(
				'ID'                => $vehiculo->id,
				'DOMINIO'           => $vehiculo->dominio,
				'TIPO_VEHICULO'     => $vehiculo->tipo_vehiculo,
				'TIPO_CAJA'         => $vehiculo->tipo_caja,
				'DESCRIPCION'       => $vehiculo->descripcion,
				'PERMISOS'          => Array()
			 );

			$permisos = PermisoVehiculo::find('all', array('conditions' => array('vehiculo_id = ? and flag = ?', $vehiculo_['ID'], 't')));

			if($permisos){
				foreach($permisos as $permiso){
					$vehiculo_['PERMISOS'][] = Array(
	                    'ID'                 => $permiso->id,
	                    'RESIDUO'            => $permiso->residuo,
	                    'CANTIDAD'           => $permiso->cantidad,
	                    'ESTADO'             => $permiso->estado,
	                    'RESIDUO_'           => obtener_categoria_residuo($permiso->residuo, 0),
	                    'ESTADO_'            => obtener_estado($permiso->estado),
	                    'ESTADO_ID'            => $permiso->estado,
	                );
				}
			}

			$est_info['VEHICULOS'][] = $vehiculo_;
		}
	}

	return $est_info;
}

?>
