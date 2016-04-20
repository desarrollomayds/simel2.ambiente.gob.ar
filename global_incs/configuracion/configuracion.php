<?

#general
	define('SITIO_DIR_RAIZ',  '/sitios/simel2.ambiente.gob.ar/');
	define('VALIDAR_CAPTCHA', true);


	define('DATABASE_ENGINE', 'mysql');
	define('DATABASE_HOST',   'vmweblinux.medioambiente.gov.ar');
	define('DATABASE_USER',   'admin_dbmel2');
	define('DATABASE_PASS',   'desarrollo');
	define('DATABASE_NAME',   'admin_dbmel2');

#activerecord
	define('ACTIVERECORD_DIR_MODELOS', SITIO_DIR_RAIZ . 'global_incs/modelos/');

#smarty
	define('SMARTY_DIR_TEMPLATES',     SITIO_DIR_RAIZ . 'global_incs/t/templates/');
	define('SMARTY_DIR_COMPILADOS',    SITIO_DIR_RAIZ . 'global_incs/t/compile/');
	define('SMARTY_DIR_CONFIGURACION', SITIO_DIR_RAIZ . 'global_incs/t/config/');
	define('SMARTY_DIR_CACHE',         SITIO_DIR_RAIZ . 'global_incs/t/cache/');

#secciones
	define('SECCION_GENERADOR',     1);
	define('SECCION_TRANSPORTISTA', 2);
	define('SECCION_OPERADOR',      3);


#google maps
	#define('GOOGLE_MAPS_KEY',       'ABQIAAAAuyDfnfBXgGYJhrmq26ItZhQQk8CmEmR4LBExg-6DvcujUFHefxRGPIPMMQtFLcLPJx95DHqM31zMeQ');
	define('GOOGLE_MAPS_KEY',       'AIzaSyDMzHSGRXEil6xm-TzRb_tCeY9fHcBCYgc');

?>
