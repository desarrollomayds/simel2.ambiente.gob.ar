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
		header('Location: abm_alta_codigo_categoria.php');
	}

	$residuo = Residuo::find('first', array('conditions' => array('codigo = ?', $_GET['id'])));

	if ($residuo)
	{
		$smarty->assign('ACCION', 'modificar');
		$smarty->assign('RESIDUO', obtener_info_categoria($residuo));
		$smarty->display('drp/operacion/edit_categoria.tpl');

		
	}
	else
	{
		header('Location: edit_categoria.php');
	}
}

session_write_close();

function obtener_info_categoria($modelo_categoria)
{
	$residuo = array();

	if ($modelo_categoria)
	{
		$residuo = Array(
			'CODIGO'                        => $modelo_categoria->codigo,
			'CATEGORIA'                   	=> $modelo_categoria->categoria,
			'DESCRIPCION'        			=> $modelo_categoria->descripcion

		);
	}
	
	return $residuo;

}



	
	
?>
{literal}
<script>
    $(document).ready(function() {});


    function modificarCodigoCategoria()
    {
        //var codigo = $("#codigo").val();
        var categoria = $("#categoria").val();
        var descripcion = $("#descripcion").val();
        var err_msg = '';

        

        if ( ! descripcion.length) {
            err_msg += 'Indique la descripc&iacute;on.';
        }

        if (err_msg != '') {
            BootstrapDialog.alert({
                title: 'Errores.',
                message: err_msg,
                type: BootstrapDialog.TYPE_DANGER,
            });

            return false;
        }

        $.ajax({
            type: "POST",
            url: admin_path+"/operacion/ajax/ajax_abm_codigo_categoria.php",
            data: {
                codigo: codigo,
                categoria: categoria,
                descripcion: descripcion,
                accion: 'modificar',
            },
            dataType: "text json",
            success: function(rsp_obj) {
                if (rsp_obj.success) {
                    mostrarMensajeYRedireccionar('Categoría Modificada.');
                } else {
                    BootstrapDialog.alert({
                        title: 'Ha ocurrido un error.',
                        message: rsp_obj.err_msg,
                        type: BootstrapDialog.TYPE_DANGER,
                    });
                }
            }
        });
        
    }

</script>
