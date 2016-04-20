<? 
	/*
		sentido : 
			0 = hacia drp
			1 = hacia establecimiento

		estado : 
			p = no leido
			l = leido
			b = borrado
	*/
  define('SENTIDO_DRP',             0);
  define('SENTIDO_ESTABLECIMIENTO', 1);

	function obtener_mensajes_drp($sentido, $estado, $pagina){
		$id_establecimiento = (int)$id_establecimiento;
		$sentidos = array(	'0' => 'A DRP', 
          							'1' => 'A EMPRESA'
        						 );

		$estados  = array(	'p' => 'NO LEIDO', 
        		 					  'l' => 'LEIDO', 
        							  'b' => 'ELIMINADO'
        						 );
        
		$mensajes  = Array();
		$mensajes_ = Mensaje::find('all', array('conditions' => array('sentido = ? and (estado = ? or ? = \'\')', $sentido, $estado, $estado), 'limit' => 10, 'offset' => $pagina * 10, 'order' => 'id desc'));

		foreach($mensajes_ as &$mensaje){
			$mensajes[] = Array(	'ID'                 => $mensaje->id, 
									'ID_USUARIO_DRP'     => $mensaje->id_usuario_drp,
									'ID_ESTABLECIMIENTO' => $mensaje->id_establecimiento,
									'FECHA_ENVIO'        => formatear_fecha_activerecord($mensaje->fecha_envio),
                  'LEIDO'              => !is_null($mensaje->fecha_lectura), 
									'FECHA_LECTURA'      => formatear_fecha_activerecord($mensaje->fecha_lectura),
									'FLAG_LECTURA'       => (formatear_fecha_activerecord($mensaje->fecha_lectura) != ''),  
									'IMPORTANCIA'        => $mensaje->importancia,
									'TITULO'             => $mensaje->titulo,
									'CUERPO'             => $mensaje->cuerpo,
									'ESTADO'             => $mensaje->estado,
									'ESTADO_'            => $estados[$mensaje->estado],
							 	  );
		}

		return $mensajes;	
	}

 	function obtener_cantidad_mensajes_drp($sentido, $estado){
  	$mensajes = Mensaje::count(array('conditions' => array('sentido = ? and (estado = ? or ? = \'\')', $sentido, $estado, $estado)));

		if(is_null($mensajes))
			$mensajes = 0;
			
		return $mensajes;
	}


	function obtener_mensajes_por_establecimiento($id_establecimiento, $sentido, $estado, $pagina){
		$id_establecimiento = (int)$id_establecimiento;
		$sentidos = array(	'0' => 'A DRP', 
          							'1' => 'A EMPRESA'
        						 );

		$estados  = array(	'p' => 'NO LEIDO', 
        		 					  'l' => 'LEIDO', 
        							  'b' => 'ELIMINADO'
        						 );
        
		$mensajes  = Array();
		$mensajes_ = Mensaje::find('all', array('conditions' => array('sentido = ? and id_establecimiento = ? and (estado = ? or ? = \'\')', $sentido, $id_establecimiento, $estado, $estado), 'limit' => 10, 'offset' => $pagina * 10, 'order' => 'id desc'));

		foreach($mensajes_ as &$mensaje){
			$mensajes[] = Array(	'ID'                 => $mensaje->id, 
									'ID_USUARIO_DRP'     => $mensaje->id_usuario_drp,
									'ID_ESTABLECIMIENTO' => $mensaje->id_establecimiento,
									'FECHA_ENVIO'        => formatear_fecha_activerecord($mensaje->fecha_envio),
                  'LEIDO'              => !is_null($mensaje->fecha_lectura), 
									'FECHA_LECTURA'      => formatear_fecha_activerecord($mensaje->fecha_lectura),
									'FLAG_LECTURA'       => (formatear_fecha_activerecord($mensaje->fecha_lectura) != ''),  
									'IMPORTANCIA'        => $mensaje->importancia,
									'TITULO'             => $mensaje->titulo,
									'CUERPO'             => $mensaje->cuerpo,
									'ESTADO'             => $mensaje->estado,
									'ESTADO_'            => $estados[$mensaje->estado],
							 	  );
		}

		return $mensajes;	
	}

 	function obtener_cantidad_mensajes_por_establecimiento($id_establecimiento, $sentido, $estado){
  	$mensajes = Mensaje::count(array('conditions' => array('sentido = ? and id_establecimiento = ? and (estado = ? or ? = \'\')', $sentido, $id_establecimiento, $estado, $estado)));

		if(is_null($mensajes))
			$mensajes = 0;
			
		return $mensajes;
	}

	function obtener_mensaje_por_id($id_establecimiento, $id_mensaje){
		$id_establecimiento = (int)$id_establecimiento;
		$id_mensaje         = (int)$id_mensaje;
		$sentidos = array(	'0' => 'A DRP', 
          							'1' => 'A EMPRESA'
        						 );

		$estados  = array(	'p' => 'NO LEIDO', 
        	 						  'l' => 'LEIDO', 
         							  'b' => 'ELIMINADO'
         						 );

		$mensaje  = Array();
		$mensaje_ = Mensaje::find('first', array('conditions' => array('id_establecimiento = ? and id = ?', $id_establecimiento, $id_mensaje)));

		if($mensaje_){
			$mensaje = Array(	'ID'                 => $mensaje_->id, 
								'ID_USUARIO_DRP'     => $mensaje_->id_usuario_drp,
								'ID_ESTABLECIMIENTO' => $mensaje_->id_establecimiento,
								'FECHA_ENVIO'        => formatear_fecha_activerecord($mensaje_->fecha_envio),
								'FECHA_LECTURA'      => formatear_fecha_activerecord($mensaje_->fecha_lectura),
								'IMPORTANCIA'        => $mensaje_->importancia,
								'TITULO'             => $mensaje_->titulo,
								'CUERPO'             => $mensaje_->cuerpo,
								'ESTADO'             => $mensaje_->estado,
								'ESTADO_'            => $estados[$mensaje_->estado],
								'SENTIDO'            => $mensaje_->sentido,
								'SENTIDO_'           => $sentidos[$mensaje_->sentido]
							  );

			$mensaje_->fecha_lectura = strftime('%Y-%m-%d');
			$mensaje_->save();
		}

		return $mensaje;
	}

	function obtener_mensaje_por_id_drp($id_mensaje){
		$id_mensaje         = (int)$id_mensaje;
		$sentidos = array(	'0' => 'A DRP', 
          							'1' => 'A EMPRESA'
        						 );

		$estados  = array(	'p' => 'NO LEIDO', 
        	 						  'l' => 'LEIDO', 
         							  'b' => 'ELIMINADO'
         						 );

		$mensaje  = Array();
		$mensaje_ = Mensaje::find('first', array('conditions' => array('id = ?', $id_mensaje)));

		if($mensaje_){
			$mensaje = Array(	'ID'                 => $mensaje_->id, 
								'ID_USUARIO_DRP'     => $mensaje_->id_usuario_drp,
								'ID_ESTABLECIMIENTO' => $mensaje_->id_establecimiento,
								'FECHA_ENVIO'        => formatear_fecha_activerecord($mensaje_->fecha_envio),
								'FECHA_LECTURA'      => formatear_fecha_activerecord($mensaje_->fecha_lectura),
								'IMPORTANCIA'        => $mensaje_->importancia,
								'TITULO'             => $mensaje_->titulo,
								'CUERPO'             => $mensaje_->cuerpo,
								'ESTADO'             => $mensaje_->estado,
								'ESTADO_'            => $estados[$mensaje_->estado],
								'SENTIDO'            => $mensaje_->sentido,
								'SENTIDO_'           => $sentidos[$mensaje_->sentido]
							  );

			$mensaje_->fecha_lectura = strftime('%Y-%m-%d');
			$mensaje_->save();
		}

		return $mensaje;
	}
?>