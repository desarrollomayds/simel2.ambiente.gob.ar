<?php

require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");

session_start();

$smarty = inicializar_smarty();
// acl
$modulo_id = 10;
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

// 
$provincias = obtener_provincias();

if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['accion'] == "aprobar")
{
    $retorno = array();
    $errores = array();
    $establecimiento = array();

    $post_valido = true;

    $campos = array(
        'establecimiento' => array('nombre' => 'id establecimiento', 'filter' => FILTER_VALIDATE_INT),
        'cuit' => array('nombre' => 'CUIT', 'filter' => FILTER_VALIDATE_INT),
        'nombre' => array('nombre' => 'Nombre', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
        
        'nombre_establecimiento' => array('nombre' => 'Nombre', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')), 
        'provincia' => array('nombre' => 'Provincia (real)', 'filter' => FILTER_VALIDATE_INT),
        'localidad' => array('nombre' => 'Localidad (real)', 'filter' => FILTER_VALIDATE_INT),
        'calle' => array('nombre' => 'Calle (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
        'numero' => array('nombre' => 'Numeracion (real)', 'filter' => FILTER_VALIDATE_INT),
        'piso' => array('nombre' => 'Piso (real)', 'filter' => FILTER_VALIDATE_INT),
        'codigo_postal' => array('nombre' => 'C&oacute;digo Postal (real)', 'filter' => FILTER_VALIDATE_INT),

        'latitud' => array('nombre' => 'Latitud (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
        'longitud' => array('nombre' => 'Longitud (real)', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),

        'expediente_numero' => array('nombre' => 'Nro Expediente', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),
        'expediente_anio' => array('nombre' => 'A&ntilde;o', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^([0-9]+)$/')),

        'email' => array('nombre' => 'Direccion de email', 'filter' => FILTER_VALIDATE_EMAIL)
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

    if ($post_valido) {

        $establecimiento = Establecimiento::find('first', array('conditions' => array('id=? AND tipo=1 AND flag="t"', $_POST['establecimiento'])));

        $establecimiento->alta_temprana = 0;
        $establecimiento->nombre = $_POST['nombre'];
        $establecimiento->sucursal = $_POST['sucursal'];

        $establecimiento->provincia = $_POST['provincia'];
        $establecimiento->localidad = $_POST['localidad'];
        $establecimiento->calle = $_POST['calle'];
        $establecimiento->numero = $_POST['numero'];
        $establecimiento->piso = $_POST['piso'];
        $establecimiento->codigo_postal = $_POST['codigo_postal'];
        $establecimiento->latitud = $_POST['latitud'];
        $establecimiento->longitud = $_POST['longitud'];

        $establecimiento->email = $_POST['email'];

        $establecimiento->expediente_numero = $_POST['expediente_numero'];
        $establecimiento->expediente_anio = $_POST['expediente_anio'];

        $establecimiento->fecha_alta_drp = new Datetime;

        $establecimiento->save();
    }

    $retorno['estado'] = (!count($errores)) ? 0 : 1;
    $retorno['errores'] = $errores;

    exit(json_encode($retorno));
}
elseif($_POST['accion'] == "rechazar")
{
    $establecimiento = Establecimiento::find('first', array('conditions' => array('id=? AND flag="t"', $_POST['establecimiento'])));
    
    if ($establecimiento) {
        $establecimiento->flag = 'r';
        $establecimiento->save();
        exit(json_encode(array("respuesta" => true)));
    } else {
        exit(json_encode(array("respuesta" => false)));   
    }
}
elseif($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['establecimiento']))
{
    $query = "SELECT est.*, 
                emp.cuit, 
                emp.nombre AS empresa_nombre, 
                pest.residuo
              FROM empresas emp, establecimientos est
              LEFT JOIN permisos_establecimientos pest 
                ON (est.id = pest.establecimiento_id)
              WHERE est.empresa_id = emp.id
                AND est.alta_temprana = 1
                AND est.flag = 't'
                AND est.id = ?
              LIMIT 1";

    $alta_temprana = Establecimiento::find_by_sql($query, array($_GET['establecimiento']));
    $localidades = obtener_localidades($alta_temprana[0]->provincia, 0);

    $smarty->assign('establecimiento', $_GET['establecimiento']);
    $smarty->assign('alta_temprana', $alta_temprana[0]);
    $smarty->assign('provincias', $provincias);
    $smarty->assign('localidades', $localidades);
}
else
{
    exit("No tiene permisos");
}

$smarty->display('drp/operacion/alta_temprana.tpl');

session_write_close();