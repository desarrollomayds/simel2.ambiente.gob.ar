<?
require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();

$smarty  = inicializar_smarty();
$errores  = Array();

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	// Si no se especifica ningún id de empresa se redirige
	if ( ! isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: listado_empresas.php');
	}

	$empresa = Empresa::find('first', array('conditions' => array('id = ?', $_GET['id'])));

	if ($empresa)
	{
		$smarty->assign('EMPRESA', obtener_info_empresa($empresa));
		$smarty->display('drp/operacion/edit_listado_empresas.tpl');
	}
	else
	{
		header('Location: listado_empresas.php');
	}
}

session_write_close();

function obtener_info_empresa($model_empresa)
{
	$empresa = array();

	if ($model_empresa)
	{
		$empresa = Array(
			'ID'                        => $model_empresa->id,
			'NOMBRE'                    => $model_empresa->nombre,
			'CUIT'                      => $model_empresa->cuit,
			'ROLES'                     => Array(  'GENERADOR'     => $model_empresa->rol_generador,
									   			   'TRANSPORTISTA' => $model_empresa->rol_transportista,
								 				   'OPERADOR'      => $model_empresa->rol_operador),

			'FECHA_INICIO_ACT'          => formatear_fecha_activerecord($model_empresa->fecha_inicio_act),

			'CALLE_R'                   => $model_empresa->calle,
			'NUMERO_R'                  => $model_empresa->numero,
			'PISO_R'                    => $model_empresa->piso,
			'OFICINA_R'                 => $model_empresa->oficina,
			'PROVINCIA_R'               => $model_empresa->provincia,
			'LOCALIDAD_R'	            => $model_empresa->localidad,
			'CODIGO_POSTAL'	            => $model_empresa->codigo_postal,

			'CALLE_L'                   => $model_empresa->calle_l,
			'NUMERO_L'                  => $model_empresa->numero_l,
			'PISO_L'                    => $model_empresa->piso_l,
			'OFICINA_L'                 => $model_empresa->oficina_l,
			'PROVINCIA_L'               => $model_empresa->provincia_l,
			'LOCALIDAD_L'	            => $model_empresa->localidad_l,
			'CODIGO_POSTAL_L'	        => $model_empresa->codigo_postal_l,

			'CALLE_C'                   => $model_empresa->calle_c,
			'NUMERO_C'                  => $model_empresa->numero_c,
			'PISO_C'                    => $model_empresa->piso_c,
			'OFICINA_C'                 => $model_empresa->oficina_c,
			'PROVINCIA_C'               => $model_empresa->provincia_c,
			'LOCALIDAD_C'	            => $model_empresa->localidad_c,
			'CODIGO_POSTAL_C'	        => $model_empresa->codigo_postal_c,

			'NUMERO_TELEFONICO'         => $model_empresa->numero_telefonico,

			'PROVINCIA_R_'              => obtener_provincia($model_empresa->provincia),
			'PROVINCIA_R_ID'              => $model_empresa->provincia,
			'LOCALIDAD_R_'              => obtener_localidad($model_empresa->localidad),
			'LOCALIDAD_R_ID'              => $model_empresa->localidad,

			'PROVINCIA_L_'              => obtener_provincia($model_empresa->provincia_l),
			'PROVINCIA_L_ID'              => $model_empresa->provincia_l,
			'LOCALIDAD_L_'              => obtener_localidad($model_empresa->localidad_l),
			'LOCALIDAD_L_ID'              => $model_empresa->localidad_l,

			'PROVINCIA_C_'              => obtener_provincia($model_empresa->provincia_c),
            'PROVINCIA_C_ID'              => $model_empresa->provincia_c,
			'LOCALIDAD_C_'              => obtener_localidad($model_empresa->localidad_c),
            'LOCALIDAD_C_ID'              => $model_empresa->localidad_c,

			'ESTABLECIMIENTOS'          => Array(),
			'REPRESENTANTES_LEGALES'    => Array(),
			'REPRESENTANTES_TECNICOS'   => Array()
		);

		$representantes_legales = RepresentanteLegal::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_legales){
			foreach($representantes_legales as $representante){
				$empresa['REPRESENTANTES_LEGALES'][] = Array(
					'ID'               => $representante->id,
					'NOMBRE'           => $representante->nombre,
					'APELLIDO'         => $representante->apellido,
					'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
					'TIPO_DOCUMENTO'   => $representante->tipo_documento,
					'NUMERO_DOCUMENTO' => $representante->numero_documento,
					'CUIT'             => $representante->cuit,

                    'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento),
                    'TIPO_DOCUMENTO_ID'  => $representante->tipo_documento,
				);
			}
		}

		$representantes_tecnicos = RepresentanteTecnico::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		if($representantes_tecnicos){
			foreach($representantes_tecnicos as $representante){
				$empresa['REPRESENTANTES_TECNICOS'][] = Array(
					'ID'               => $representante->id,
					'NOMBRE'           => $representante->nombre,
					'APELLIDO'         => $representante->apellido,
					'FECHA_NACIMIENTO' => formatear_fecha_activerecord($representante->fecha_nacimiento),
					'TIPO_DOCUMENTO'   => $representante->tipo_documento,
					'NUMERO_DOCUMENTO' => $representante->numero_documento,
					'CARGO'            => $representante->cargo,
					'CUIT'             => $representante->cuit,

					'TIPO_DOCUMENTO_'  => obtener_tipo_documento($representante->tipo_documento),
					'TIPO_DOCUMENTO_ID'  => $representante->tipo_documento,
				);
			}
		}

		// obtenemos id y nombre de establecimientos. si quieren ver establecimientos pedimos por ajax la info de cada uno.
		$establecimientos = Establecimiento::find('all', array('conditions' => array('empresa_id = ? and flag = ?', $empresa['ID'], 't')));

		foreach ($establecimientos as $est) {
			$empresa['ESTABLECIMIENTOS'][] = array('ID' => $est->id, 'NOMBRE' => $est->nombre);
		}
	}

	return $empresa;
}

?>
