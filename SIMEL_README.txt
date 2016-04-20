SIMEL - Estructura del código
-----------------------------

- manifiestos
| - admin  				sitio administrativo de SIMEL (http://simel.ambiente.gob.ar/admin)
| - assets			
| - cron 				script importacion afip, script ejecucion de políticas.
|
| - global_incs			
  | - classes			clases desarrolladas para simel
  | - configuracion 	archivos de configuración yml
  | - librerias			librerias externas
  | - mensajes			diccionario
  | - modelos 			modelos que extienden Active Record. Cada uno representa una tabla en la db (ver nomenclatura)
  | - t
  	| - compile 		archivos compilados de los templates
  	| - templates		templates smarty (.tpl)

 | - manifiestos		sitio constitucional de la DRP (http://simel.ambiente.gob.ar)
 | - me 				sitio SIMEL http://simel.ambiente.gob.ar


Base de Datos
-------------

Simel utiliza Active Record (http://www.phpactiverecord.org/), como ORM. Todas las tablas se representan en un modelo bajo global_incs/modelos. El nombre del archivo tiene que coincidir con el nombre del modelo.

Hago un repaso de la relaciones entre las tablas más utilizadas:

* Empresas y establecimientos:
	
	- empresas: regitro de empresas, el campo cuit las identifica como únicas.

	- establecimientos: los establecimientos son los entidades que dispone una empresa para utilizar simel. En esta tabla se define que tipo de establecimiento es (generador: 1 , transportista: 2, operador: 3), el usuario con el que puede ingresar al sistema y la información correspondiente al establecimiento.

	- permisos_establecimientos: define los residuos con los que puede operar un establecimiento.

	- formularios: cada formulario equivale a un manifiesto que puede crear un establecimiento. El sistema checkea esta tabla y si tiene formularios disponibles va a permitir al establecimiento generar uno nuevo.

* Manifiestos:

	Estas son las tablas que entran en juego en el circuito ciclo de vida de un manifiesto:

	- manifiestos: tabla que registra el tipo de manifiesto, el protocolo generador y el estado del circuito del manifiesto.

	- generadores_manifiesto: guarda la relación entre un manifiesto y su generador/es. Guarda los datos del establecimiento para mantener un historial de la información en ese momento.

	- transportistas_manifiesto: guarda la relación entre un manifiesto y su transportista. Guarda los datos del establecimiento para mantener un historial de la información en ese momento.

	- operadores_manifiesto: guarda la relación entre un manifiesto y su operador. Guarda los datos del establecimiento para mantener un historial de la información en ese momento.

	- residuos_manifiesto: guarda la relación entre un manifiesto y sus residuos. Es donde queda registrado el tratamiento que se aplicó al residuo.

	- vehiculos_manifiesto: guarda la relación de los vehiculos de un manifiesto e información mínima del vehiculo para llevar un registro historico.

	- documentos_manifiestos: lleva la relación de los documentos generados del manifiesto.

	- tipo_documentos_manifiestos: define los tipos de documentos que existen en el sistema.

	- tipo_manifiestos: define los tipos de manifiesto que existen en el sistema.

	- permisos_tipo_manifiestos: hay casos donde se requiere que un establecimiento solo pueda generar manifiestos de un tipo si tiene permisos para operar con un residuo. En esta tabla es donde se definen estas limitaciones.

	- cambios_estados_manifiestos: tabla escrita por un trigger para generar llevar registro en los cambios de estado de un manifiesto. De momento no es consumida por el sistema.


* Cambios establecimientos:

	Uno de los requisitos originales de simel fue que la parte administrativa no pudiese editar datos de un establecimiento deliberadamente. Por ende, todos los cambios a aplicar en un establecimiento debe hacerlo el propio usuario generando solicitudes de cambio dentro de la sección Mi Cuenta. Estas solicitudes luego son aprobadas o rechazadas por la parte administrativa.

	- cambios_solicitados_establecimientos: representa una solicitud y su estado. Solo puede existir una solicitud pendiente (P) por establecimiento.

	Por cada solicitud generada, pueden existir 1 o más relaciones con las siguientes tablas:
		- cambios_establecimientos
		- cambios_permisos_establecimientos
		- cambios_caa_establecimientos
		- cambios_vehiculos
		- cambios_permisos_vehiculos

* Alertas:

	Existen distintas alertas en el sistema para notificar al usuario ciertos eventos, por ejemplo, que su certificado ambiental venció, la cantidad de manifiestos que le quedan es poca, etc. Algunas alertas son bloqueantes y no van a permitir al usuario generar nuevos manifiestos. De todos modos estos bloqueos permiten seguir participando de manifiestos ya creados y operar en la sección "mi cuenta".

	- alertas: tabla que define las alertas existentes.
	- tipo_alertas: define el tipo de alertas: error, bloqueo, información, etc.
	- alertas_secciones: relaciona alertas con secciones para saber donde deben ser mostradas. Si la sección es un string vacio, indica que la alerta debe ser mostrada en todas las secciones.


* Emails:
	
	En SIMEL, los emails generados por acciones en el sistema no son envíados automáticamente sino que se guardan en estado pendiente en la tabla emails. Hay un cron configurado en el servidor que ejecuta un script que se encargá de ir envíando los emails de esta tabla.

	- emails: registra el estado del email, su tipo e información para el armado del mismo.
	- tipo_emails: define los emails que existen en el sistema.


* SIMEL - Administración:
		
	El sitio administrativo checkea que el usuario tenga permisos al recurso que trata de acceder. Las tablas en cuestión son:

	- cat_usuarios: usuarios administrativos.
	- modulos_administracion: define los modulos existentes.
	- permisos_modulos_administracion: define a nivel usuario si tiene acceso a cada modulo. La tabla es completada por un trigger aunque por default el estado de acceso es false (perEstado = 'N')
	- permisos_roles_modulos_administracion: define por rol los accesos a modulos. Hoy día no se le da uso a esta tabla.
