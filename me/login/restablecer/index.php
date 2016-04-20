<?php

    require_once("../../../global_incs/librerias/securimage/securimage.php");
	require_once("../../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../../global_incs/configuracion/configuracion.php");
	require_once("../../../global_incs/librerias/local.inc.php");

	$error = false;

	$smarty  = inicializar_smarty();
	
	$post_valido = 0;

	$restablecer = false;

	// Solicitud de restablecimiento de contraseña
	if ($_POST['check'] === 'gyg26d2u8d8723gd928wyhdd' && $_POST['valido'] != true)
	{

		$establecimiento = Establecimiento::Connection();
		
		$usuario = Establecimiento::find('first', array('conditions' => array('usuario = ?', $_POST['usuario'])));
		
		// No se encuentra el usuario
		if ( ! $usuario)
		{
			$error = 'El CUIT/ID del establecimiento no es correcto.';
		}
		else
		{
			
			$encrypt = new sesion();
			
			$r = $encrypt->getHash('', $usuario->usuario);

			// Se graban las nuevas variables de SALT y HASH
			$usuario->salt = $r[0];
			$usuario->reset_contrasenia = 'S';

			$usuario->save();

			// Se graba el HASH en establecimientos_hash
			$establecimientos_hash = EstablecimientoHash::Connection();

			// Se actualizan los estados de los hash pendientes, vencidos
			$res = EstablecimientoHash::find('all', array('conditions' => array('establecimiento_id=?',$usuario->id)));

			foreach ($res as $row)
			{
				$row->estado_hash = 'V';
				$row->save();
			}

			// Grabo el HASH
			$rest_est_hash = new EstablecimientoHash(Array(
				'establecimiento_id' => $usuario->id,
				'hash' => $r[1],
				'fecha_registracion' => date("Y-m-d H:i:s"),
				'fecha_vencimiento' => date("Y-m-d", strtotime('+7 day',strtotime(date("Y-m-d")))).date("H:i:s"),
				'fecha_modificacion' => NULL,
				'estado_hash' => 'A'
			));

			$rest_est_hash->save();

			// Se pone el mail en cola
			$emailToQue = new mail();
            $emailToQue->ponerEnColaDeEnvio($usuario->id, '9');

            $post_valido = 1;

		}	

	}

	// Ingreso mediante enlace proporcionado por mail
	if (isset($_GET["v"]))
	{

		$esta_hash = EstablecimientoHash::Connection();

		$res_est_hash = EstablecimientoHash::find('first', array('conditions' => array('hash = ? and estado_hash=?', $_GET['v'], 'A')));

		if (!$res_est_hash)
		{
			$error = "El enlace por el cual esta intentando acceder no es válido";
		}
		else
		{

			//obtengo el usuario y hash para comparar
			$establecimiento = Establecimiento::Connection();
			$res_est = Establecimiento::find('first', array('conditions' => array('id = ?', $res_est_hash->establecimiento_id)));
			if (!$res_est)
			{
				$error	= "Ocurrio un error al obtener los datos del usuario.";
			}
			else
			{

				//CAMBIAR EL ESTADO DEL ESTABLECIMIENTO
				$res_est->reset_contrasenia = 'S';
				$res_est->save();

				//CAMBIAR EL ESTADO DEL HASH
				$res_est_hash->estado_hash = 'P';
				$res_est_hash->save();

				$restablecer = true;

			}

		}
	}

	// Proceso de cambio de contraseña
	if ($_POST['check'] == 'hei28euhebs9skadpolw11')
	{	
		if (isset($_POST['nueva_clave']) && isset($_POST['nueva_clave_confirmacion']))
		{

			if ( ! empty($_POST['nueva_clave']) && ! empty($_POST['nueva_clave_confirmacion']))
			{

				if ($_POST['nueva_clave'] === $_POST['nueva_clave_confirmacion'])
				{
					// HASH en estado P
					$esta_hash = EstablecimientoHash::Connection();
					$res_est_hash = EstablecimientoHash::find('first', array('conditions' => array('hash = ? AND estado_hash = ?', $_GET['v'], 'P')));

					if (!$res_est_hash)
					{
						$error = "El enlace por el cual esta intentando acceder no es válido";
					}
					else
					{
						//obtengo el usuario y hash para comparar
						$establecimiento = Establecimiento::Connection();
						$res_est = Establecimiento::find('first', array('conditions' => array('id = ?', $res_est_hash->establecimiento_id)));

						$encrypt = new sesion();

						$r = $encrypt->getHash("", $_POST['nueva_clave']);

						$res_est->contrasenia = $r[1];
						$res_est->salt = $r[0];
						$res_est->save();

						header('Location: ../login_usuario.php');
					}
					
				}

			}

		}
		else
		{
			$error = "Hubo errores a la hora de procesar el formulario.";
		}

		$restablecer = true;

	} 

	if ($post_valido)
	{
		header('Location: finalizado.php');
	}

	$smarty->assign('REESTABLECER_USUARIO', $restablecer);
	$smarty->assign('ERRORES', $error);
	$smarty->display('login/restablecer.tpl');

	session_write_close();
?>
