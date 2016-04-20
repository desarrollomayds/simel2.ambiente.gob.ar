<?
  require_once("../../global_incs/librerias/securimage/securimage.php");
	require_once("../../global_incs/librerias/smarty/Smarty.class.php");
	require_once("../../global_incs/configuracion/configuracion.php");
	require_once("../../global_incs/librerias/local.inc.php");

	$errores = false;

	$smarty  = inicializar_smarty();

	$mensajes = new mensajes();

	$post_valido = false;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$post_valido = true;
    $session = new sesion();

    $authMode = (boolean) $session->getParameters("session::ldap::auth_mode");

    $informacion = obtener_informacion_por_usuario_drp($_POST['usuario']);

    if($authMode){
      $post_valido = $sesion->ldapLogin($_REQUEST["usuario"],$_REQUEST["contrasenia"]);
      $data = $sesion->ldapGetUserData();
      //print_r($data);

      if(count($informacion)==0){
          $conexion = Usuario::connection();
          $conexion->transaction();

          try{
              $usuario = Usuario::create(Array(
                  'login'            => $data["uid"][0],
                  'nombre'           => $data["givenname"][0],
                  'apellido'         => $data["sn"][0],
                  'codigo_rol'       => 2,
                  'flag'             => 't'
              ));

              //echo "<pre>".print_r($usuario,true)."</pre>";
              $usuario->save();

              $conexion->commit();
          } catch (\Exception $e) {
              $conexion->rollback();
              $errores['general'] = $e->getMessage();
          }

          //print_r($conexion);
      };

    }
    else{
      if(!$informacion){
        $errores['LOGIN'] = $mensajes->getMessageText("general::07100003");
        $post_valido = false;
      }else{
        $encrypt	= new sesion();
        $r = $encrypt->getHash($informacion["SALT"], $_POST["contrasenia"]);
  /*
  echo $r[1];
  echo "<br>";
  echo $informacion["CONTRASENIA"];
  die("die");
  */
        if($informacion['CONTRASENIA'] != $r[1])
        {
          $errores['LOGIN'] = $mensajes->getMessageText("general::07100003");
          $post_valido = false;
        }
      }
    }
	}

	if($post_valido === false){
		$smarty->assign('ERRORES', $errores);
		$smarty->display('drp/login/login_usuario.tpl');
	}else{
		$_SESSION['INFORMACION_USUARIO'] = $informacion;

		switch ($informacion["ROL"]) {
	    case 0:
	    	//header('location: ../operacion/listado_usuarios.php');
        header('location: ../operacion/listado_registros_pendientes.php');
	        break;
	    case 1:
	        header('location: ../operacion/listado_registros_pendientes.php');
	        break;
	    case 2:
	        //header('location: ../operacion/listado_usuarios.php');
          header('location: ../operacion/listado_registros_pendientes.php');
	        break;
	    default:
	       	header('location: ../admin/login/login_usuario.php');
		}
	}

	session_write_close();
?>
