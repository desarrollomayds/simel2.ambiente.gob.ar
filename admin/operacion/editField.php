<?php
/**
 * Created by PhpStorm.
 * User: falvarino
 * Date: 19/08/2015
 * Time: 05:53 PM
 */

require_once("../../global_incs/librerias/securimage/securimage.php");
require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/librerias/adodb/adodb.inc.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/drp.inc.php");

session_start();


$pk = (!empty($_REQUEST['pk']))?$_REQUEST['pk']:null;
$value = (!empty($_REQUEST['value']))?$_REQUEST['value']:null;
$field = (!empty($_REQUEST['name']))?$_REQUEST['name']:null;

$campoTabla = explode('/',$field);


if(count($errores) == 0){
    $conexion = Manifiesto::connection();



    try{
        $conexion = Manifiesto::connection();
        $conexion->transaction();
        switch($campoTabla[0]) {
            case "Emp":
                $entidad = Empresa::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "RL":
                $entidad = Empresa::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "RT":
                $entidad = RepresentanteTecnico::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "Est":
                $entidad = Establecimiento::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "Per":
                $entidad = PermisoEstablecimiento::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "Veh":
                $entidad = Vehiculo::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
            case "VePer":
                $entidad = PermisoVehiculo::find('first', Array('conditions' => Array('id = ?', $pk)));
                break;
        }


        switch($field) {
            case 'Emp/fecinact':
                $entidad->fecha_inicio_act = convertir_fecha_es_en($value);
                break;
            case 'Emp/telef':
                $entidad->numero_telefonico = $value;
                echo $value;
                break;
            case 'Emp/domrrecalle':
                $entidad->calle = $value;
                break;
            case 'Emp/domrrenum':
                $entidad->numero = $value;
                break;
            case 'Emp/domrrepiso':
                $entidad->piso = $value;
                break;
            case 'Emp/domrreofi':
                $entidad->oficina = $value;
                break;
            case 'Emp/pro1':
                $entidad->provincia = $value;
                break;
            case 'Emp/loca1':
                $entidad->localidad = $value;
                break;
            case 'Emp/domrrecp':
                $entidad->codigo_postal = $value;
                break;
            case 'Emp/domrlecalle':
                $entidad->calle_l = $value;
                break;
            case 'Emp/domrlenum':
                $entidad->numero_l = $value;
                break;
            case 'Emp/domrlepiso':
                $entidad->piso_l = $value;
                break;
            case 'Emp/domrleofi':
                $entidad->oficina_l = $value;
                break;
            case 'Emp/pro2':
                $entidad->provincia_l = $value;
                break;
            case 'Emp/loca2':
                $entidad->localidad_l = $value;
                break;
            case 'Emp/domrlecp':
                $entidad->codigo_postal_l = $value;
                break;
            case 'Emp/domrcocalle':
                $entidad->calle_c = $value;
                break;
            case 'Emp/domrconum':
                $entidad->numero_c = $value;
                break;
            case 'Emp/domrcopiso':
                $entidad->piso_c = $value;
                break;
            case 'Emp/domrcoofi':
                $entidad->oficina_c = $value;
                break;
            case 'Emp/pro3':
                $entidad->provincia_c = $value;
                break;
            case 'Emp/loca3':
                $entidad->localidad_c = $value;
                break;
            case 'Emp/domrcocp':
                $entidad->codigo_postal_c = $value;
                break;
            case 'RL/nom':
                $entidad->nombre = $value;
                break;
            case 'RL/ape':
                $entidad->apellido = $value;
                break;
            case 'RL/fn':
                $entidad->fecha_nacimiento = convertir_fecha_es_en($value);
                break;
            case 'RL/tdni':
                $entidad->tipo_documento = $value;
                break;
            case 'RL/dni':
                $entidad->numero_documento = $value;
                break;
            case 'RL/cuit':
                $entidad->cuit = $value;
                break;
            case 'RT/nom':
                $entidad->nombre = $value;
                break;
            case 'RT/ape':
                $entidad->apellido = $value;
                break;
            case 'RT/fn':
                $entidad->fecha_nacimiento = convertir_fecha_es_en($value);
                break;
            case 'RT/tdni':
                $entidad->tipo_documento = $value;
                break;
            case 'RT/dni':
                $entidad->numero_documento = $value;
                break;
            case 'RT/cargo':
                $entidad->cargo = $value;
                break;
            case 'RT/cuit':
                $entidad->cuit = $value;
                break;
            case 'Est/nomb':
                $entidad->nombre = $value;
                break;
            case 'Est/caanu':
                $entidad->caa_numero = $value;
                break;
            case 'Est/caaven':
                $entidad->caa_vencimiento = $value;
                break;
            case 'Est/exnu':
                $entidad->expediente_numero = $value;
                break;
            case 'Est/exanio':
                $entidad->expediente_anio = $value;
                break;
            case 'Est/act':
                $entidad->codigo_actividad = $value;
                break;
            case 'Est/desc':
                $entidad->descripcion = $value;
                break;
            case 'Est/email':
                $entidad->email = $value;
                break;
            case 'Est/recalle':
                $entidad->calle = $value;
                break;
            case 'Est/renum':
                $entidad->numero = $value;
                break;
            case 'Est/repiso':
                $entidad->piso = $value;
                break;
            case 'Est/reprov':
                $entidad->provincia = $value;
                break;
            case 'Est/reloca1':
                $entidad->localidad = $value;
                break;
            case 'Est/recp':
                $entidad->codigo_postal = $value;
                break;
            case 'Est/cacalle':
                $entidad->calle_c = $value;
                break;
            case 'Est/canum':
                $entidad->numero_c = $value;
                break;
            case 'Est/capiso':
                $entidad->piso_c = $value;
                break;
            case 'Est/caprov':
                $entidad->provincia_c = $value;
                break;
            case 'Est/caloca1':
                $entidad->localidad_c = $value;
                break;
            case 'Est/cacp':
                $entidad->codigo_postal_c = $value;
                break;
            case 'Est/catacir':
                $entidad->nomenclatura_catastral_circ = $value;
                break;
            case 'Est/catasec':
                $entidad->nomenclatura_catastral_sec = $value;
                break;
            case 'Est/cataman':
                $entidad->nomenclatura_catastral_manz = $value;
                break;
            case 'Est/catapar':
                $entidad->nomenclatura_catastral_parc = $value;
                break;
            case 'Est/catasup':
                $entidad->nomenclatura_catastral_sub_parc = $value;
                break;
            case 'Est/nocasub':
                $entidad->habilitaciones = $value;
                break;
            case 'Per/res_':
                $entidad->residuo = $value;
                break;
            case 'Per/cant':
                $entidad->cantidad = $value;
                break;
            case 'Veh/dom':
                $entidad->dominio = $value;
                break;
            case 'Veh/desc':
                $entidad->descripcion = $value;
                break;
            case 'VePer/res_':
                $entidad->residuo = $value;
                break;
            case 'VePer/can':
                $entidad->cantidad = $value;
                break;
            case 'VePer/est':
                $entidad->estado = $value;
                break;
        }

        $entidad->fecha_ultima_modificacion   = strftime('%Y-%m-%d');
        $entidad->usuario_ultima_modificacion = $_SESSION['INFORMACION_USUARIO']['ID'];
        $entidad->save();

        $conexion->commit();

    } catch (\Exception $e) {
        $conexion->rollback();
        $errores['general'] = $e->getMessage();
        echo "NO";
    }
}
session_write_close();
?>
