<?
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	session_start();

	forzar_argumentos_uppercase(); //FORZAR LOS PARAMETROS QUE LLEGAN POR GET Y POST A SER UPPERCASE

	if(!isset($_SESSION['PASOS_CORRECTOS']) or !in_array(2, $_SESSION['PASOS_CORRECTOS']) or !isset($_GET['rol'])){
		header("Location: paso_2.php");
		exit;
	}

	// Variables
	$permiso = false;
	$completo = false;
	$perfiles = $_SESSION['DATOS_EMPRESA']['ROLES'];

	// Verifica que roles seleccionó el usuario
	foreach ($perfiles as $rol => $id)
	{
		// Verifica si el usuario tiene permiso para acceder al formulario de un rol específico
		if ($_GET['rol'] == $id)
		{
			// Se otorga permiso
			$permiso = true;

			// Se verifica si el rol actual es el último seleccionado por el usuario:
			// Si es true, redirecciona al paso_4
			if (max($perfiles) <= $_GET['rol'])
			{
				$completo = true;
			}
			break;
		}
	}

	// Si no tiene permiso, se redirecciona al paso anterior
	if ($permiso != true)
	{
		header("Location: paso_2.php");
		exit;
	}

	// Si faltan perfiles por completar, se busca cual es el siguiente a redireccionar
	if (!$completo)
	{
		for ($i=1;$i<4;++$i)
		{
			// Busco si el siguiente posible perfil seleccionado esta dentro de los $perfiles
			if ($_GET['rol'] < $i && in_array($i, $perfiles))
			{
				// Redirecciono al siguiente perfil
				$siguiente = $i;
				break;
			}
		}
	}

	$smarty  = inicializar_smarty();

        $_SESSION["select"]["GENERADOR"] = $_SESSION["DATOS_EMPRESA"]["ROLES"]["GENERADOR"];
        $_SESSION["select"]["TRANSPORTISTA"] = $_SESSION["DATOS_EMPRESA"]["ROLES"]["TRANSPORTISTA"];
        $_SESSION["select"]["OPERADOR"] = $_SESSION["DATOS_EMPRESA"]["ROLES"]["OPERADOR"];


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$retorno  = array();
		$errores  = array();

		if(count($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS']) == 0){
			$campo = 'establecimientos';
			$errores[$campo] = 'Debe dar de alta al menos un establecimiento';
		}

		foreach($_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'] as $establecimiento){
			if(count($establecimiento['PERMISOS']) == 0 && $establecimiento['TIPO'] == $_GET['rol'])
			{
				$campo = 'permisos_establecimientos';

				if(!isset($errores[$campo])){
					$errores[$campo] = Array();
				}

				$errores[$campo][] = 'Debe asignar al menos un permiso al establecimiento <strong>'.$establecimiento['NOMBRE'].'</strong>';
			}

			if($establecimiento['TIPO'] == 2 && $establecimiento['TIPO'] == $_GET['rol']){ //transporte
				if(count($establecimiento['VEHICULOS']) == 0)
				{
					$campo = 'vehiculos';

					if(!isset($errores[$campo])){
						$errores[$campo] = Array();
					}

					$errores[$campo][] = 'Debe asignar al menos un vehiculo al establecimiento  <strong>'.$establecimiento['NOMBRE'].'</strong>';
				}
				else
				{
					foreach($establecimiento['VEHICULOS'] as $vehiculo){
						if(count($vehiculo['PERMISOS']) == 0){
							$campo = 'permisos_vehiculos';

							if(!isset($errores[$campo])){
								$errores[$campo] = Array();
							}

							$errores[$campo][] = 'Debe asignar al menos un permiso al vehiculo <strong>'.$vehiculo['DOMINIO'].'</strong> del establecimiento  <strong>'.$establecimiento['NOMBRE'].'</strong> ';
						}
					}
				}
			}
		}

		if(!count($errores)){

			if (!$completo)
			{
				$retorno['siguiente'] = 'paso_3.php?rol='.$siguiente;
			}
			else
			{
				$retorno['siguiente'] = 'paso_4.php';
				$_SESSION['PASOS_CORRECTOS'][3] = 3;
			}
		}

		$retorno['estado']  = (!count($errores)) ? 0 : 1;
		$retorno['errores'] = $errores;

		echo json_encode($retorno);
	}
	else
	{
		unset($_SESSION['PASOS_CORRECTOS'][3]);

		// Verifica que no exista mas de un establecimiento 2 y 3 dentro de las $_SESSION
		$permitir_agregar = true;
		if ($_GET['rol'] != 1)
		{
			$est = $_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS'];
			$cantidad = 0;

			for ($i = 0; $i < 3; $i++) {

			    if($est[$i]["TIPO"]==$_GET['rol']) {
			        $cantidad++;
			        $permitir_agregar = false;
			    }
			}
		}

		// Si existe, no se permitirá agregar mas
		$smarty->assign('ESTABLECIMIENTOS', $_SESSION['DATOS_EMPRESA']['ESTABLECIMIENTOS']);
		$smarty->assign('EMPRESA',          $_SESSION['DATOS_EMPRESA']);
		$smarty->assign('NOMBRE_PASO',  obtener_nombre_paso($_GET['rol']));
		$smarty->assign('ROL_ID',  $_GET['rol']);
		$smarty->assign('PERMITIR_AGRGAR',  $permitir_agregar);

		$smarty->display('registracion/paso_3.tpl');
	}

	session_write_close();
?>