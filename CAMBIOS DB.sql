ALTER TABLE `control_contactos` ADD `contacto_diagnostico` VARCHAR(200) NULL AFTER `contacto_parentesco`;


-- 29-07-2021
ALTER TABLE 
`bacteriologia` ADD `linfa_lesion` VARCHAR(10) NULL AFTER `linfa`, 
ADD `linfa_codo` VARCHAR(10) NULL AFTER `linfa_lesion`;

ALTER TABLE `bacteriologia` CHANGE `linfa` `linfa_lobulo_oreja` VARCHAR(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL;

ALTER TABLE `datos_personales` ADD `tipo_caso` VARCHAR(10) NULL AFTER `nombres`;

ALTER TABLE `datos_personales` ADD `municipio_id` INT NULL AFTER `servicio_salud_id`;

