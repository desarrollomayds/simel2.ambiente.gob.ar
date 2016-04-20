<?


	#filtrar usuarios no autenticados
	if(isset($_SESSION) !== True)
		session_start();

 	function obtener_informacion_rol_drp($codigo){
		$rol       = Array();
		$rol_      = Rol::first(array('conditions' => array('codigo = ? and flag = ?', $codigo, 't')));
		$estados   = Array(	't' => 'funcional',
							'f' => 'baja logica');

		if($rol_){
			$rol = Array(
							'CODIGO'       => $rol_->codigo,
							'DESCRIPCION'  => $rol_->descripcion,
							'MIEMBROS'     => obtener_cantidad_usuarios_por_rol($rol_->codigo),
							'ESTADO'       => $rol_->flag
						 );

			$rol['ESTADO_'] = $estados[$rol['ESTADO']];
		}

		return $rol;
	}

 	function obtener_roles($criterio, $pagina){
		$roles     = Array();
		$roles_    = Rol::find('all', array('conditions' => array('descripcion like ? and flag = ?', $criterio, 't'), 'limit' => 20, 'offset' => $pagina * 20, 'order' => 'codigo desc'));
		$estados   = Array(	't' => 'funcional',
							'f' => 'baja logica');

		foreach($roles_ as $rol){
			$rol = Array(
							'CODIGO'       => $rol->codigo,
							'DESCRIPCION'  => $rol->descripcion,
							'MIEMBROS'     => obtener_cantidad_usuarios_por_rol($rol->codigo),
							'ESTADO'       => $rol->flag
						 );

			$rol['ESTADO_'] = $estados[$rol['ESTADO']];

			$roles[] = $rol;
		}

		return $roles;
	}

 	function obtener_cantidad_roles($criterio, $pagina=false){
		$roles = Rol::count(array('conditions' => array('descripcion like ? and flag = ?', $criterio, 't')));

		if(is_null($roles))
			$roles = 0;

		return $roles;
	}

 	function obtener_cantidad_usuarios_por_rol($codigo){
		$usuarios = Usuario::count(array('conditions' => array('codigo_rol = ? and flag = ?', $codigo, 't')));

		if(is_null($usuarios))
			$usuarios = 0;

		return $usuarios;
	}


 	function obtener_informacion_usuario_drp($id){
		$usuario   = Array();
		$usuario_  = Usuario::first(array('conditions' => array('id = ? and flag = ?', $id, 't')));
		$estados   = Array(	't' => 'funcional',
							'f' => 'baja logica');

		if($usuario_){
			$rol = obtener_informacion_rol_drp($usuario_->codigo_rol);

			$usuario = Array(
							'ID'                => $usuario_->id,
							'LOGIN'             => $usuario_->login,
							'PASSWORD'          => $usuario_->password,
							'APELLIDO'          => $usuario_->apellido,
							'NOMBRE'            => $usuario_->nombre,
							'TIPO_DOCUMENTO'    => $usuario_->tipo_documento,
							'NRO_DOCUMENTO'     => $usuario_->nro_documento,
							'FECHA_NACIMIENTO'  => formatear_fecha_activerecord($usuario_->fecha_nacimiento),
							'SEXO'              => $usuario_->sexo,
							'ROL'               => $usuario_->codigo_rol,
							'ESTADO'            => $usuario_->flag
						 );

			$usuario['ESTADO_'] = $estados[$usuario['ESTADO']];
			$usuario['ROL_']    = $rol['DESCRIPCION'];
		}

		return $usuario;
	}

 	function obtener_usuarios($criterio, $pagina){
		$usuarios     = Array();
		$usuarios_    = Usuario::find('all', array('conditions' => array('(login like ? or nombre like ? or apellido like ? or nro_documento like ?) and flag = ?', $criterio, $criterio, $criterio, $criterio, 't'), 'limit' => 20, 'offset' => $pagina * 20, 'order' => 'id desc'));
		$estados      = Array(	't' => 'funcional',
								'f' => 'baja logica');

		foreach($usuarios_ as $usuario){
			$rol = obtener_informacion_rol_drp($usuario->codigo_rol);

			$usuario = Array(
							'ID'                => $usuario->id,
							'LOGIN'             => $usuario->login,
							'PASSWORD'          => $usuario->password,
							'APELLIDO'          => $usuario->apellido,
							'NOMBRE'            => $usuario->nombre,
							'TIPO_DOCUMENTO'    => $usuario->tipo_documento,
							'NRO_DOCUMENTO'     => $usuario->nro_documento,
							'FECHA_NACIMIENTO'  => formatear_fecha_activerecord($usuario->fecha_nacimiento),
							'SEXO'              => $usuario->sexo,
							'ROL'               => $usuario->codigo_rol,
							'ESTADO'            => $usuario->flag
						 );

			$usuario['ESTADO_'] = $estados[$usuario['ESTADO']];
			$usuario['ROL_']    = $rol['DESCRIPCION'];

			$usuarios[] = $usuario;
		}

		return $usuarios;
	}


 	function obtener_cantidad_usuarios($criterio, $pagina=false){
		$roles = Rol::count(array('conditions' => array('descripcion like ? and flag = ?', $criterio, 't')));

		if(is_null($roles))
			$roles = 0;

		return $roles;
	}


?>
