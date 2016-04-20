<?
	require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/librerias/adodb/adodb.inc.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");
	require_once("../../global_incs/librerias/drp.inc.php");

	session_start();

	$smarty  = new Smarty();

	$smarty->template_dir = SMARTY_DIR_TEMPLATES;
	$smarty->compile_dir  = SMARTY_DIR_COMPILADOS;
	$smarty->config_dir   = SMARTY_DIR_CONFIGURACION;
	$smarty->cache_dir    = SMARTY_DIR_CACHE;

	$cambio = CambioEstablecimiento::find('first', array('conditions' => array('id = ? and flag = ?', $_GET['id'], 'p')));
	if($cambio){
		$conexion = CambioEstablecimiento::connection();

		$conexion->transaction();

		try{
			if($cambio->tipo_cambio == 1){
				$permisos_ = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

				foreach($permisos_ as $permiso){
					$permiso->flag = 'r';
					$permiso->save();
				}

				$vehiculos_ = CambioVehiculo::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

				foreach($vehiculos_ as $vehiculo){
					$permisos_ = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

					foreach($permisos_ as $permiso){
						$permiso->flag = 'r';
						$permiso->save();
					}

					$vehiculo->flag = 'r';
					$vehiculo->save();
				}

			}

			$cambio->flag = 'r';
			$cambio->save();

			$conexion->commit();
		} catch (\Exception $e) {
			$conexion->rollback();
			$errores['general'] = $e->getMessage();
		}
		
		header('location: /operacion/cambios_pendientes.php');
		exit;
	}

	session_write_close();
?>
