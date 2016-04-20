-- agregamos tabla de excepciones para cuits que no existentes en personas_juridicas
CREATE TABLE `personas_juridicas_excepciones` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `cuit` bigint(10) UNSIGNED NOT NULL,
  `razon_social` VARCHAR(255) DEFAULT NULL,
  `activo` ENUM('y','n') CHARACTER SET utf8 DEFAULT 'y',
  `fecha_creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuit` (`cuit`),
  KEY `cuit_activo` (`cuit`,`activo`)
) ENGINE=INNODB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- excepciones cuit, modulo para admin
INSERT INTO `modulos_administracion` (`modNombreMenu`, `modDescrip`, `modLink`, `tmaID`, `modOrden`, `modFecReg`) VALUES ('Excepciones CUIT', '', 'operacion/excepciones_cuit.php', '2', '14', NOW());
UPDATE `permisos_modulos_administracion` SET `perEstado` = 'S' WHERE `modID` = 15;
INSERT INTO `permisos_roles_modulos_administracion` (`modID`, `codigo_rol`, `perFecReg`) VALUES ('15', '1', NOW());

-- cambios en altas tempranas
ALTER TABLE `empresas` 
	DROP COLUMN `alta_temprana`,
	DROP COLUMN `responsable_alta`, DROP INDEX `responsable_alta`; 

ALTER TABLE `establecimientos` 
	DROP COLUMN `alta_temprana_definitiva`,
	ADD COLUMN `fecha_creacion` TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL AFTER `alta_temprana`; 

DELETE FROM `tipo_emails` WHERE `id` = '19';

-- Agregamos modulo estadísticas - Cantidad por Residuo
INSERT INTO `manifiestos`.`modulos_administracion` (`modNombreMenu`, `modDescrip`, `modLink`, `tmaID`, `modOrden`, `modFecReg`) VALUES ('Cantidad por Residuo', '', 'operacion/estadisticas_cantidad_por_residuo.php', '2', '15', NOW()); 
UPDATE `permisos_modulos_administracion` SET perEstado = 'S' WHERE modID=16;
INSERT INTO `manifiestos`.`permisos_roles_modulos_administracion` (`modID`, `codigo_rol`, `perFecReg`) VALUES ('16', '1', NOW()); 

-- Agregamos modulo estadísticas - Cantidad por Residuo y Tratamiento
INSERT INTO `manifiestos`.`modulos_administracion` (`modNombreMenu`, `modDescrip`, `modLink`, `tmaID`, `modOrden`, `modFecReg`) VALUES ('Cantidad por Residuo y Tratamiento', '', 'operacion/estadisticas_cantidad_por_residuo_y_tratamiento.php', '2', '16', NOW()); 
UPDATE `permisos_modulos_administracion` SET perEstado = 'S' WHERE modID=17;
INSERT INTO `manifiestos`.`permisos_roles_modulos_administracion` (`modID`, `codigo_rol`, `perFecReg`) VALUES ('17', '1', NOW()); 

-- Agregamos modulo estadísticas - Entrada/Salida Residuos por Distrito
INSERT INTO `manifiestos`.`modulos_administracion` (`modNombreMenu`, `modDescrip`, `modLink`, `tmaID`, `modOrden`, `modFecReg`) VALUES ('Entrada/Salida de Residuos', '', 'operacion/estadisticas_entrada_salida_de_residuos.php', '2', '17', NOW()); 
UPDATE `permisos_modulos_administracion` SET perEstado = 'S' WHERE modID=18;
INSERT INTO `manifiestos`.`permisos_roles_modulos_administracion` (`modID`, `codigo_rol`, `perFecReg`) VALUES ('18', '1', NOW()); 

-- Módulo estadísticas - Manifiestos.
INSERT INTO `manifiestos`.`modulos_administracion` (`modNombreMenu`) VALUES ('Manifiestos');
UPDATE `manifiestos`.`modulos_administracion` SET `modLink`='operacion/estadisticas_manifiestos.php', `tmaID`=2, `modOrden`=18 WHERE  `modID`=19;

update permisos_modulos_administracion set perEstado = 'S' where modID=19;

-- Modulo estadisticas - Cantidad de Manifiestos
INSERT INTO `manifiestos`.`modulos_administracion` (`modNombreMenu`, `modLink`, `tmaID`, `modOrden`, `modFecReg`) VALUES ('Cantidad de Manifiestos', 'operacion/estadisticas_cantidad_de_manifiestos.php', '2', '20', NOW()); 
UPDATE `permisos_modulos_administracion` SET perEstado = 'S' WHERE modID = 20;
INSERT INTO `manifiestos`.`permisos_roles_modulos_administracion` (`modID`, `codigo_rol`, `perFecReg`) VALUES ('20', '1', NOW()); 

-- Cambios al reporte modulo inicial de estadisticas de Manifiestos.
UPDATE `manifiestos`.`modulos_administracion` SET `modNombreMenu`='Manifiestos por Establecimiento', `modLink`='operacion/estadisticas_manifiestos_por_establecimiento.php' WHERE  `modID`=19;

# 2016/02/02 - ISSUE 0000737: L3 - me - Agregar cuadro de observaciones en creación de manifiesto
ALTER TABLE `manifiestos`.`manifiestos` ADD COLUMN `observaciones` TEXT NULL AFTER `estado`; 
