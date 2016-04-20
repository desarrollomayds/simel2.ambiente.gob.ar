<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

$smarty = inicializar_smarty();

// Tipo de establecimiento
$ROL_ID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];

// Empresa ID
$empresaID = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
// Establecimiento ID
$establecimientoID = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];

$model = new CambioSolicitadoEstablecimiento;
$solicitud = $model->getSolicitud($empresaID, $establecimientoID);
$cambios_pendientes = count($solicitud->cambios_establecimientos);

$nomenclatura_catastral_circ = Range(0, 22);
$nomenclatura_catastral_sec = array_merge(Range(0, 99), Range('A', 'Z'));

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $retorno = array();
    $errores = array();
    $establecimiento = array();

    if (empty($_POST['accion'])) {
        exit;
    }

    $post_valido = true;

    if ($_POST['accion'] == 'establecimiento') {
        $campos = array(
            'establecimiento_nombre' => array('nombre' => 'Nombre', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'descripcion' => array('nombre' => 'Descripci&oacute;n', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

            'provincia_r' => array('nombre' => 'Provincia (real)', 'filter' => FILTER_VALIDATE_INT),
            'localidad_r' => array('nombre' => 'Localidad (real)', 'filter' => FILTER_VALIDATE_INT),
            'calle_r' => array('nombre' => 'Calle (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'numero_r' => array('nombre' => 'Numeracion (real)', 'filter' => FILTER_VALIDATE_INT),
            'piso_r' => array('nombre' => 'Piso (real)', 'filter' => FILTER_VALIDATE_INT),
            'cpostal_r' => array('nombre' => 'C&oacute;digo Postal (real)', 'filter' => FILTER_VALIDATE_INT),

            'latitud_r' => array('nombre' => 'Latitud (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'longitud_r' => array('nombre' => 'Longitud (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

            'provincia_c' => array('nombre' => 'Provincia (constituido)', 'filter' => FILTER_VALIDATE_INT),
            'localidad_c' => array('nombre' => 'Localidad (constituido)', 'filter' => FILTER_VALIDATE_INT),
            'calle_c' => array('nombre' => 'Calle (constituido)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'numero_c' => array('nombre' => 'Numeracion (constituido)', 'filter' => FILTER_VALIDATE_INT),
            'piso_c' => array('nombre' => 'Piso (constituido)', 'filter' => FILTER_VALIDATE_INT),
            'cpostal_c' => array('nombre' => 'C&oacute;digo Postal (constituido)', 'filter' => FILTER_VALIDATE_INT),

            'nomenclatura_catastral_circ' => array('nombre' => 'Nomenclatura catastral circ', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'nomenclatura_catastral_sec' => array('nombre' => 'Nomenclatura catastral sec', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'habilitaciones' => array('nombre' => 'Habilitaciones', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'direccion_email' => array('nombre' => 'Direccion de email', 'filter' => FILTER_VALIDATE_EMAIL)
        );

        if ($post_valido) {
            $validaciones = filter_input_array(INPUT_POST, $campos);

            foreach ($validaciones as $campo => $resultado) {
                if (strlen($resultado) == 0) {
                    $errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
                    $post_valido = false;
                }
            }
        }
    }

    //VALIDO CAMPOS PARA EL CAMBIO DE CAA
    if ($_POST['accion'] == 'cambio_caa') {
        $campos = array(
            'caa_numero' => array('nombre' => 'Numero de CAA', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
            'caa_vencimiento' => array('nombre' => 'Fecha de vencimiento de CAA', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
        );

        if ($post_valido) {
            $validaciones = filter_input_array(INPUT_POST, $campos);

            foreach ($validaciones as $campo => $resultado) {
                if (strlen($resultado) == 0) {
                    $errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
                    $post_valido = false;
                }
            }
        }
    }
    #validaciones

    if (count($errores) == 0) {
        if ($_POST['accion'] == 'contrasenia') {
            if (!strlen($_POST['contrasenia_nueva']) || !strlen($_POST['contrasenia_nueva_bis']) || !strlen($_POST['contrasenia_actual'])) {
                $errores['general'] = 'Es necesario ingresar todos los campos de contrase&ntilde;a para proceder a cambiarla.';
            }

            if ($_POST['contrasenia_nueva'] != $_POST['contrasenia_nueva_bis']) {
                $errores['general'] = 'La nueva contrase&ntilde;a difiere de su versi&oacute;n verificadora, por favor vuelva a ingresarla.';
            }

            if (count($errores) == 0) {

                $conexion = Establecimiento::connection();
                $conexion->transaction();

                try {
                    $establecimiento = Establecimiento::find('first', array('conditions' => array('id = ?', $establecimientoID)));

                    if ($establecimiento) {
                        // Clase de manejo de encriptado
                        $encrypt = new sesion();

                        // Genera el HASH de la contraseña actual introducida según el SALT del usuario
                        $r = $encrypt->getHash($establecimiento->salt, $_POST['contrasenia_actual']);

                        if ($establecimiento->contrasenia == $r[1]) {
                            // Genera el HASH de la contraseña nueva introducida según el SALT del usuario
                            $s = $encrypt->getHash($establecimiento->salt, $_POST['contrasenia_nueva']);
                            if ($establecimiento->contrasenia != $s[1]) {
                                $establecimiento->contrasenia = $s[1];
                                $establecimiento->save();
                            } else {
                                $errores['general'] = 'La nueva contrase&nacute;a no puede ser identica a la actual.';
                            }
                        } else {
                            $errores['general'] = 'La contrase&nacute;a actual no coincide con la ingresada.';
                        }
                    } else {
                        $errores['general'] = 'Error inesperado.';
                    }

                    $conexion->commit();

                } catch (\Exception $e) {
                    $conexion->rollback();
                    $errores['general'] = $e->getMessage();
                }
            }
        } else if ($_POST['accion'] == 'establecimiento') {

            if ($cambios_pendientes > 0) {
                $errores['general'] = "El establecimiento seleccionado tiene cambios pendientes de auditoria";
            } else {

                $conexion = CambioEstablecimiento::connection();

                $conexion->transaction();

                try {

                    $solicitud->save();

                    $cambio_establecimiento = CambioEstablecimiento::create(Array(
                        'solicitud_id' => $solicitud->id,
                        'tipo_cambio' => 'E',
                        'empresa_id' => $solicitud->empresa_id,
                        'nombre' => $_POST['establecimiento_nombre'],
                        'caa_numero' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_NUMERO'],
                        'caa_vencimiento' => convertir_fecha_es_en($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_VENCIMIENTO']),
                        'descripcion' => $_POST['descripcion'],
                        'provincia' => $_POST['provincia_r'],
                        'localidad' => $_POST['localidad_r'],
                        'calle' => $_POST['calle_r'],
                        'numero' => $_POST['numero_r'],
                        'piso' => $_POST['piso_r'],
                        'codigo_postal' => $_POST['cpostal_r'],
                        'latitud' => $_POST['latitud_r'],
                        'longitud' => $_POST['longitud_r'],
                        'provincia_c' => $_POST['provincia_c'],
                        'localidad_c' => $_POST['localidad_c'],
                        'calle_c' => $_POST['calle_c'],
                        'numero_c' => $_POST['numero_c'],
                        'piso_c' => $_POST['piso_c'],
                        'codigo_postal_c' => $_POST['cpostal_c'],
                        'nomenclatura_catastral_circ' => $_POST['nomenclatura_catastral_circ'],
                        'nomenclatura_catastral_sec' => $_POST['nomenclatura_catastral_sec'],
                        'nomenclatura_catastral_manz' => $_POST['nomenclatura_catastral_manz'],
                        'nomenclatura_catastral_parc' => $_POST['nomenclatura_catastral_parc'],
                        'nomenclatura_catastral_sub_parc' => $_POST['nomenclatura_catastral_sub_parc'],
                        'habilitaciones' => $_POST['habilitaciones'],
                        'email' => $_POST['direccion_email'],
                        'tipo' => $ROL_ID,
                    ));

                    $cambio_establecimiento->save();

                    $conexion->commit();

                } catch (\Exception $e) {
                    $conexion->rollback();
                    $errores['general'] = $e->getMessage();
                }


            }
        } else if ($_POST['accion'] == 'cambio_caa') {

            $ccaa_pendiente = CambioCaaEstablecimiento::find('all', array('conditions' => array('solicitud_id = ?', $solicitud->id)));

            if ($ccaa_pendiente) {
                $errores['general'] = "Usted ya tiene una solicitud de cambio en la informaci&oacute;n del CAA pendiente";
            } else {

                $conexion = CambioEstablecimiento::connection();

                $conexion->transaction();

                try {

                    $solicitud->save();

                    $cambio_caa = CambioCaaEstablecimiento::create(Array(
                        'solicitud_id' => $solicitud->id,
                        'tipo_cambio' => 'E',
                        'caa_numero_old' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_NUMERO'],
                        'caa_vencimiento_old' => convertir_fecha_es_en($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_VENCIMIENTO']),
                        'caa_numero_new' => $_POST['caa_numero'],
                        'caa_vencimiento_new' => convertir_fecha_es_en($_POST['caa_vencimiento']),
                    ));

                    $cambio_caa->save();

                    $conexion->commit();
                } catch (\Exception $e) {
                    $conexion->rollback();
                    $errores['general'] = $e->getMessage();
                }
            }
        }
    }

    $retorno['estado'] = (!count($errores)) ? 0 : 1;
    $retorno['errores'] = $errores;

    echo json_encode($retorno);
} else {
    $informacion = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO'];

    $localidades_r = Array();
    $localidades_c = Array();

    $actividades = obtener_actividades();

    $provincias = obtener_provincias();
    if ($informacion) {
        $localidades_r = obtener_localidades($informacion['PROVINCIA_R'], 0);
        $localidades_c = obtener_localidades($informacion['PROVINCIA_C'], 0);
    }

    if (empty($localidades_r))
        $localidades_r = obtener_localidades($provincias[0]['CODIGO'], 0);

    if (empty($localidades_c))
        $localidades_c = obtener_localidades($provincias[0]['CODIGO'], 0);

    $punto_inicio = $informacion['CALLE_R'] . " " . $informacion['NUMERO_R'] . ", " . obtener_localidad($informacion['LOCALIDAD_R']) . ", " . obtener_municipio_por_localidad($informacion['LOCALIDAD_R']) . ", " . obtener_provincia($informacion['PROVINCIA_R']) . ", " . " argentina";
    $cantidad = obtener_cantidad_mensajes_por_establecimiento($establecimientoID, SENTIDO_ESTABLECIMIENTO, 'p');
    $smarty->assign('ROL_ID', $ROL_ID);
    $smarty->assign('NUEVOS', $cantidad);
    $smarty->assign('EMPRESA', $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
    $smarty->assign('ALERTAS', $_SESSION['INFORMACION_GENERAL']['ALERTAS']);
    $smarty->assign('ESTADISTICAS', $_SESSION['INFORMACION_GENERAL']['ESTADISTICAS']);
    $smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
    $smarty->assign('GENERADOR', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
    $smarty->assign('PROVINCIAS', $provincias);
    $smarty->assign('PUNTO_INICIO', $punto_inicio);
    $smarty->assign('LOCALIDADES_R', $localidades_r);
    $smarty->assign('LOCALIDADES_C', $localidades_c);
    $smarty->assign('NOMENCLATURA_CATASTRAL_CIRC', $nomenclatura_catastral_circ);
    $smarty->assign('NOMENCLATURA_CATASTRAL_SEC', $nomenclatura_catastral_sec);
    $smarty->assign('CAMBIOS_PENDIENTES', $cambios_pendientes);
    $smarty->assign('PERFIL', obtener_tipo($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']));

    //var_dump($_SESSION['INFORMACION_GENERAL']);die;

    $smarty->display('operacion/compartido/mi_cuenta.tpl');
}

session_write_close();
?>