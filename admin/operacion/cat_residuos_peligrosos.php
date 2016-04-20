<?php

require_once("../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../global_incs/configuracion/configuracion.php");
require_once("../../global_incs/librerias/local.inc.php");
require_once("../../global_incs/librerias/paginator/paginator.class.php");


session_start();
// acl
$modulo_id = "19";
$permisos = new permisos();
$permisos->validarAccesoSeccion($modulo_id);

// 
$smarty = inicializar_smarty();

if (isset($_POST['accion'])) {

    switch ($_POST['accion']) {
        case 'buscar':
            # code...
            $criterio = isset($_POST['criterio']) ? $_POST['criterio'] : NULL;
            $residuo = new Residuo;
            $residuos = $residuo->get_listado_residuos($criterio);
            break;
        case 'mostrar_popup_seleccion':
            echo generar_html_popup();
            exit(0);
            break;
        case 'asignar_permiso':
            $residuo = new Residuo;
            $residuo->residuo_id = $_POST['residuo_id'];
            $residuo->residuo = $_POST['residuo'];

            try {
                $residuo->save();
            } catch (Exception $r) {
                die($r->getMessage());
            }
            break;
    }
}   

$residuo = new Residuo;
$query = "
            SELECT *
            FROM cat_residuos_peligrosos";

$residuos = Residuo::find_by_sql($query, array($criterio, $criterio));

return array($residuo, $paginate);

$smarty->display('drp/operacion/cat_residuos_peligrosos.tpl');

session_write_close();