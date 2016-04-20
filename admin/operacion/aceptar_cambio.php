<?

require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

ini_set('display_errors', true);

session_start();

$smarty = new Smarty();

$smarty->template_dir = SMARTY_DIR_TEMPLATES;
$smarty->compile_dir = SMARTY_DIR_COMPILADOS;
$smarty->config_dir = SMARTY_DIR_CONFIGURACION;
$smarty->cache_dir = SMARTY_DIR_CACHE;

$cambio = CambioEstablecimiento::find('first', array('conditions' => array('id = ? and flag = ?', $_GET['id'], 'p')));

if ($cambio) {
    $conexion = CambioEstablecimiento::connection();

    $conexion->transaction();

    try {
        if ($cambio->tipo_cambio == 1) {
            $empresa = Empresa::find('first', array('conditions' => array('id = ? and flag = ?', $cambio->empresa_id, 't')));

            $establecimiento_ = $empresa->create_establecimientos(Array(
                'nombre' => $cambio->nombre,
                'tipo' => $cambio->tipo,
                'usuario' => $cambio->usuario,
                'contrasenia' => $cambio->contrasenia,
                'caa_numero' => $cambio->caa_numero,
                'caa_vencimiento' => $cambio->caa_vencimiento,
                'expediente_numero' => $cambio->expediente_numero,
                'expediente_anio' => $cambio->expediente_anio,
                'codigo_actividad' => $cambio->codigo_actividad,
                'descripcion' => $cambio->descripcion,
                'calle' => $cambio->calle,
                'numero' => $cambio->numero,
                'piso' => $cambio->piso,
                'provincia' => $cambio->provincia,
                'localidad' => $cambio->localidad,
                'latitud' => $cambio->latitud,
                'longitud' => $cambio->longitud,
                'calle_c' => $cambio->calle_c,
                'numero_c' => $cambio->numero_c,
                'piso_c' => $cambio->piso_c,
                'provincia_c' => $cambio->provincia_c,
                'localidad_c' => $cambio->localidad_c,
                'nomenclatura_catastral_circ' => $cambio->nomenclatura_catastral_circ,
                'nomenclatura_catastral_sec' => $cambio->nomenclatura_catastral_sec,
                'nomenclatura_catastral_manz' => $cambio->nomenclatura_catastral_manz,
                'nomenclatura_catastral_parc' => $cambio->nomenclatura_catastral_parc,
                'nomenclatura_catastral_sub_parc' => $cambio->nomenclatura_catastral_sub_parc,
                'habilitaciones' => $cambio->habilitaciones,
            ));


            $permisos_ = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

            foreach ($permisos_ as $permiso) {
                $permiso_ = $establecimiento_->create_permisos_establecimientos(Array(
                    'residuo' => $permiso->residuo,
                    'cantidad' => $permiso->cantidad,
                    'estado' => $permiso->estado,
                    'fecha_inicio' => convertir_fecha_es_en($permiso->fecha_inicio),
                    'fecha_fin' => convertir_fecha_es_en($permiso->fecha_fin)
                ));

                $permiso->flag = 't';
                $permiso->save();
            }

            $vehiculos_ = CambioVehiculo::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

            foreach ($vehiculos_ as $vehiculo) {
                $vehiculo_ = $establecimiento_->create_vehiculos(Array(
                    'dominio' => $vehiculo->dominio,
                    'descripcion' => $vehiculo->descripcion,
                    'credencial_serie' => $vehiculo->credencial_serie,
                    'credencial_numero' => $vehiculo->credencial_numero
                ));

                $permisos_ = CambioPermisoEstablecimiento::find('all', array('conditions' => array('cambio_id = ? and flag = ?', $_GET['id'], 'p')));

                foreach ($permisos_ as $permiso) {
                    $permiso_ = $vehiculo_->create_permisos_vehiculos(Array(
                        'residuo' => $permiso->residuo,
                        'cantidad' => $permiso->cantidad,
                        'estado' => $permiso->estado,
                        'fecha_inicio' => convertir_fecha_es_en($permiso->fecha_inicio),
                        'fecha_fin' => convertir_fecha_es_en($permiso->fecha_fin)
                    ));

                    $permiso->flag = 't';
                    $permiso->save();
                }

                $vehiculo->flag = 't';
                $vehiculo->save();
            }
        } else {
            $establecimiento = Establecimiento::find('first', array('conditions' => array('id = ? and flag = ?', $cambio->establecimiento_id, 't')));

            //ESTO SUCEDE SI CAMBIARON UN NUMERO DE CAA O SI CAMBIARON SU FECHA DE VENCIMIENTO, POR UNO
            //U OTRO MOTIVO DEBO DE DEJARLO ASENTADO EN UN REGISTRO DE CAA_HISTORICO
          /*  if ($establecimiento->caa_numero != $cambio->caa_numero || $establecimiento->caa_vencimiento != $cambio->caa_vencimiento) {
                $historico = CAAHistorico::create(Array(
                            'id_establecimiento' => $cambio->establecimiento_id,
                            'CAA' => $cambio->caa_numero,
                            'id_usuario_autorizador' => $_SESSION['INFORMACION_USUARIO']['ID']
                ));
            }*/
           $fecha_normal =  formatear_fecha_activerecord($cambio->caa_vencimiento);
           echo convertir_fecha_es_en($fecha_normal);

            $establecimiento->nombre = $cambio->nombre;
            $establecimiento->descripcion = $cambio->descripcion;
            $establecimiento->calle = $cambio->calle;
            $establecimiento->numero = $cambio->numero;
            $establecimiento->caa_numero = $cambio->caa_numero;
            $establecimiento->caa_vencimiento = $fecha_normal;
            $establecimiento->piso = $cambio->piso;
            $establecimiento->provincia = $cambio->provincia;
            $establecimiento->localidad = $cambio->localidad;
            $establecimiento->longitud = $cambio->longitud;
            $establecimiento->latitud = $cambio->latitud;
            $establecimiento->calle_c = $cambio->calle_c;
            $establecimiento->numero_c = $cambio->numero_c;
            $establecimiento->piso_c = $cambio->piso_c;
            $establecimiento->provincia_c = $cambio->provincia_c;
            $establecimiento->localidad_c = $cambio->localidad_c;
            $establecimiento->nomenclatura_catastral_circ = $cambio->nomenclatura_catastral_circ;
            $establecimiento->nomenclatura_catastral_sec = $cambio->nomenclatura_catastral_sec;
            $establecimiento->nomenclatura_catastral_manz = $cambio->nomenclatura_catastral_manz;
            $establecimiento->nomenclatura_catastral_parc = $cambio->nomenclatura_catastral_parc;
            $establecimiento->nomenclatura_catastral_sub_parc = $cambio->nomenclatura_catastral_sub_parc;
            $establecimiento->habilitaciones = $cambio->habilitaciones;

            $establecimiento->save();
        }

        $cambio->flag = 't';
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
