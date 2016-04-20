<?
require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
require_once("../../../global_incs/configuracion/configuracion.php");
require_once("../../../global_incs/librerias/local.inc.php");

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$retorno  = array();
	$errores  = array();

	if(empty($_POST['accion'])){
		exit;
	}

	$post_valido = true;

	#validaciones
	$campos = False;

	$campos = array(
		'id'     => array('nombre' => 'Id de manifiesto',  'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
		'accion' => array('nombre' => 'Accion a ejecutar', 'filter' => FILTER_VALIDATE_REGEXP, 'options' => array('regexp' => '/^(.+)$/')),
	);

	if($post_valido && $campos !== False){
		$validaciones = filter_input_array(INPUT_POST, $campos);

		foreach($validaciones as $campo => $resultado){
			if(strlen($resultado) == 0){
				$errores[$campo] = 'Error en la carga del campo ' . $campos[$campo]['nombre'] . '.';
				$post_valido = false;
			}
		}
	}
	#validaciones

	if(!count($errores))
	{
		if($_POST['accion'] == 'aceptar')
		{
			$conn1 = Manifiesto::connection();

			try{
				$tipo = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']; 
				if ($tipo == '2'){
					$manifiesto = TransportistaManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				} elseif ($tipo == '1') {
					$manifiesto = GeneradorManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				} else {
					$manifiesto = OperadorManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				}

				$conn1->transaction(); // tabla manifiestos

				if($manifiesto)
				{
					// solo relaciona vehiculos si es transportista
					if ($tipo == '2') {
						$vehiculos = Manifiesto::find('first', array('conditions' => array('id = ?', $_POST['id'])));
						foreach($_SESSION['DATOS_MANIFIESTO']['VEHICULOS'] as $vehiculo){
						
							$vehiculos->create_vehiculos_manifiesto(Array(
								'manifiesto_id'      => $vehiculos->id,
								'establecimiento_id' => $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'],
								'vehiculo_id'        => $vehiculo['ID'],
								'dominio'			 => $vehiculo['DOMINIO'],
								'descripcion'		 => $vehiculo['DESCRIPCION'],
								'utilizado'          => ($vehiculo['UTILIZADO'] == 1) ? 1 : 0
							));
						}
					}

					$manifiesto->estado           = 'a';
					$manifiesto->fecha_aceptacion = new Datetime;
					$manifiesto->empresa_id = $_SESSION['INFORMACION_GENERAL']['EMPRESA']['ID'];
					$manifiesto->nombre = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMBRE_EMPRESA'];
					$manifiesto->tipo = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
					$manifiesto->caa_numero = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CAA_NUMERO'];
					$manifiesto->caa_vencimiento = new Datetime;
					$manifiesto->expediente_numero = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['EXPEDIENTE_NUMERO'];
					$manifiesto->expediente_anio = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['EXPEDIENTE_ANIO'];
					$manifiesto->codigo_actividad = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ACTIVIDAD'];
					$manifiesto->descripcion = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['DESCRIPCION'];
					$manifiesto->calle = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CALLE'];
					$manifiesto->calle_c = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['CALLE_C'];
					$manifiesto->numero = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NUMERO'];
					$manifiesto->numero_c = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NUMERO_C'];
					$manifiesto->piso = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['PISO'];
					$manifiesto->piso_c = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['PISO_C'];
					$manifiesto->provincia = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['PROVINCIA'];
					$manifiesto->provincia_c = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['PROVINCIA_C'];
					$manifiesto->localidad = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['LOCALIDAD'];
					$manifiesto->localidad_c = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['LOCALIDAD_C'];
					$manifiesto->nomenclatura_catastral_circ = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMENCLATURA_CATASTRAL_CIRC'];
					$manifiesto->nomenclatura_catastral_sec = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMENCLATURA_CATASTRAL_SEC'];
					$manifiesto->nomenclatura_catastral_manz = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMENCLATURA_CATASTRAL_MANZ'];
					$manifiesto->nomenclatura_catastral_parc = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMENCLATURA_CATASTRAL_PARC'];
					$manifiesto->nomenclatura_catastral_sub_parc = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['NOMENCLATURA_CATASTRAL_SUB_PARC'];
					$manifiesto->habilitaciones = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['HABILITACIONES'];

					$manifiesto->save();
				}

				$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ? and estado = ?', $_POST['id'], 'p')));

				if($manifiesto)
				{
					if(obtener_participantes_pendientes($_POST['id']) == 0 && $manifiesto->estado_autorizacion_drp == 1) {

						$manifiesto->fecha_aceptacion = new Datetime;
						// el manifiesto simple concentrador es finalizado una vez aprobado.
						if ($manifiesto->tipo_manifiesto == TipoManifiesto::SIMPLE_CONCENTRADOR) {
							$manifiesto->estado = Manifiesto::FINALIZADO;
						} else {
							$manifiesto->estado = Manifiesto::APROBADO;
						}

						// $manifiesto->save();

						#actualizar numero de protocolo de manifiesto
						$ultimo_protocolo = Manifiesto::find_by_sql('SELECT id_protocolo_manifiesto FROM manifiestos WHERE id_protocolo_manifiesto <> 0 ORDER BY id_protocolo_manifiesto DESC LIMIT 1 FOR UPDATE');

						if ( ! isset($ultimo_protocolo[0])) {
							$config = new config;
							$primer_numero_protocolo = $config->getParameters("framework::manifiestos::protocolo_inicial");
						}

						$proximo_id = $ultimo_protocolo[0]->id_protocolo_manifiesto + 1;
						$manifiesto->id_protocolo_manifiesto = $proximo_id;
						$manifiesto->save();

						// generamos documento manifiesto
						$documento_manifiesto = new documentos_manifiestos;
						$documento_manifiesto->generate($manifiesto, DocumentoManifiesto::MANIFIESTO);

						// grabamos row para notificar la aprobacion del manifiesto
						generarRowEmailManifiesto(mail::MANIFIESTO_APROBADO, $manifiesto);

						$form = new formularios;
						$form->finalizarFormularioPorManifiestoId($manifiesto->id);
					}
				}

				$conn1->commit();
			} catch (Exception $e) {
				$conn1->rollback();
				$errores['general'] = $e->getMessage();
			}
		}
		elseif($_POST['accion'] == 'rechazar')
		{	
			$conexion = Manifiesto::connection();
			$conexion->transaction();

			try{
				$tipo = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO'];
				if ($tipo == '2'){
					$manifiesto_relacion = TransportistaManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				} elseif ($tipo == '1') {
					$manifiesto_relacion = GeneradorManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				} else {
					$manifiesto_relacion = OperadorManifiesto::find('first', array('conditions' => array('manifiesto_id = ? and establecimiento_id = ?', $_POST['id'], $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'])));
				}

				if ($manifiesto_relacion) {
					$manifiesto_relacion->estado = 'r';
					$manifiesto_relacion->fecha_aceptacion = new Datetime;
					$manifiesto_relacion->save();

					$manifiesto = Manifiesto::find('first', array('conditions' => array('id = ?', $_POST['id'])));

					if ($manifiesto) {
						$manifiesto->estado = 'r';
						$manifiesto->motivo_rechazo = $_POST['motivo'];
						$manifiesto->rechazado_por = $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'];
						$manifiesto->fecha_rechazo = new Datetime;
						$manifiesto->save();
					}

					$form = new formularios;
					$form->liberarFormularioPorManifiestoId($manifiesto->id);

					// grabamos row para enviar email notificando que el manifiesto fue rechazado
					generarRowEmailManifiesto(mail::MANIFIESTO_RECHAZADO, $manifiesto);
				}

				$conexion->commit();
			} catch (\Exception $e) {
				$conexion->rollback();
				$errores['general'] = $e->getMessage();
			}
		}

		//actualizar_estadisticas_del_usuario();
	}

	$retorno['estado']  = (!count($errores)) ? 0 : 1;
	$retorno['errores'] = $errores;

    echo json_encode($retorno);

}else{
	$manifiesto = obtener_informacion_manifiesto($_GET['id']);

	$_SESSION['DATOS_MANIFIESTO'] = $manifiesto;
	
	$vehiculos = Array();
	foreach($manifiesto['TRANSPORTISTAS'] as $transportista){
		$vehiculos = $transportista['VEHICULOS'];
		}

	$estados = obtener_aprobados_manifiesto($_GET['id']);

	$smarty  = inicializar_smarty();
	$cantidad1 = obtener_cantidad_mensajes_por_establecimiento($_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['ID'], SENTIDO_ESTABLECIMIENTO, 'p');
	$smarty->assign('NUEVOS',         $cantidad1);
	$smarty->assign('GENERADORES',     $manifiesto['GENERADORES']);
	$smarty->assign('TRANSPORTISTAS',  $manifiesto['TRANSPORTISTAS']);
	$smarty->assign('OPERADORES',      $manifiesto['OPERADORES']);
	$smarty->assign('RESIDUOS',        $manifiesto['RESIDUOS']);
	$smarty->assign('VEHICULOS',       $vehiculos);
	$smarty->assign('MANIFIESTO',      $manifiesto);
	$smarty->assign('ESTADO_TRANSPORTISTA', $estados['transportista']);
	$smarty->assign('ESTADO_GENERADOR', $estados['generador']);
	$smarty->assign('ESTADO_OPERADOR',  $estados['operador']);
	$smarty->assign('EMPRESA',         $_SESSION['INFORMACION_GENERAL']['EMPRESA']);
	$smarty->assign('ESTABLECIMIENTO', $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']);
	$smarty->assign('ROL', 			   $_SESSION['INFORMACION_GENERAL']['ESTABLECIMIENTO']['TIPO']);

	$smarty->display('operacion/compartido/operar_manifiesto.tpl');
}

session_write_close();

function generarRowEmailManifiesto($tipo_email, $manifiesto)
{							
	$params = json_encode(array(
		'establecimiento_id' => $manifiesto->establecimiento_creador,
		'manifiesto_id' => $manifiesto->id,
		'id_protocolo_manifiesto' => $manifiesto->id_protocolo_manifiesto,
	));

	$mail = new mail;
	$mail->ponerEnColaDeEnvio($manifiesto->establecimiento_creador, $tipo_email, $params);
}
?>
