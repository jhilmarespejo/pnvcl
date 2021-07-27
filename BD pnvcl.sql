-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pnvcl
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pnvcl
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pnvcl` DEFAULT CHARACTER SET utf8 ;
USE `pnvcl` ;

-- -----------------------------------------------------
-- Table `pnvcl`.`sedes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`sedes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`provincia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`provincia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `sedes_id` INT NOT NULL,
  `nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_provincia_sedes1_idx` (`sedes_id` ASC),
  CONSTRAINT `fk_provincia_sedes1`
    FOREIGN KEY (`sedes_id`)
    REFERENCES `pnvcl`.`sedes` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`municipio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`municipio` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `provincia_id` INT NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_municipio_provincia1_idx` (`provincia_id` ASC),
  CONSTRAINT `fk_municipio_provincia1`
    FOREIGN KEY (`provincia_id`)
    REFERENCES `pnvcl`.`provincia` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`red_salud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`red_salud` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `municipio_id` INT NOT NULL,
  `nombre` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_red_salud_municipio1_idx` (`municipio_id` ASC),
  CONSTRAINT `fk_red_salud_municipio1`
    FOREIGN KEY (`municipio_id`)
    REFERENCES `pnvcl`.`municipio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`servicio_salud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`servicio_salud` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `red_salud_id` INT NOT NULL,
  `nombre` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_servicio_salud_red_salud1_idx` (`red_salud_id` ASC),
  CONSTRAINT `fk_servicio_salud_red_salud1`
    FOREIGN KEY (`red_salud_id`)
    REFERENCES `pnvcl`.`red_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`datos_personales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`datos_personales` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `servicio_salud_id` INT NOT NULL,
  `nombres` VARCHAR(150) NOT NULL,
  `apellidos` VARCHAR(150) NOT NULL,
  `ci` VARCHAR(12) NULL,
  `ci_exp` VARCHAR(3) NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `edad` INT NULL,
  `celular` VARCHAR(10) NULL,
  `telefono` VARCHAR(10) NULL,
  `zona` VARCHAR(100) NULL,
  `calle` VARCHAR(100) NULL,
  `numero` VARCHAR(20) NULL,
  `latlng` VARCHAR(100) NULL,
  `url_croquis` VARCHAR(250) NULL,
  `tiempo_residencia` VARCHAR(45) NULL,
  `ocupacion_paciente` VARCHAR(100) NULL,
  `vive_solo` VARCHAR(2) NULL,
  `celular_referencia` VARCHAR(10) NULL,
  `serv_salud_cercano` VARCHAR(150) NULL,
  
  -- COMPLETAR LA HISTORIA CLINICA
  `historia_clinica` VARCHAR(45) NULL,
  `num_ficha` VARCHAR(45) NULL,
  -- COMPLETAR LA HISTORIA CLINICA
  
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_datos_generales_epid_servicio_salud1_idx` (`servicio_salud_id` ASC),
  CONSTRAINT `fk_datos_generales_epid_servicio_salud1`
    FOREIGN KEY (`servicio_salud_id`)
    REFERENCES `pnvcl`.`servicio_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`control_contactos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`control_contactos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `red_salud_id` INT NOT NULL,
  `apellidos` VARCHAR(100) NULL,
  `nombres` VARCHAR(100) NULL,
  `edad` INT NULL,
  `sexo` VARCHAR(10) NULL,
  `parentesco` VARCHAR(100) NULL,
  `conviviente` VARCHAR(45) NULL,
  `fecha_control` DATE NULL,
  `sintomatico_piel` CHAR(2) NULL,
  `laboratorio_baar` VARCHAR(10) NULL,
  `obervaciones` VARCHAR(500) NULL,
  `antecedente_lepra` VARCHAR(2) NULL,
  `fecha_frm1` DATE NULL,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_control_contactos_datos_personales1_idx` (`datos_personales_id` ASC),
  INDEX `fk_control_contactos_red_salud1_idx` (`red_salud_id` ASC),
  CONSTRAINT `fk_control_contactos_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_control_contactos_red_salud1`
    FOREIGN KEY (`red_salud_id`)
    REFERENCES `pnvcl`.`red_salud` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`datos_clinicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`datos_clinicos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `inicio_sintomas` VARCHAR(45) NULL,
  `tiempo_evolucion` VARCHAR(45) NULL,
  `descripcion_primeros_signos` LONGTEXT NULL,
  `cuadro_clinico_actual` LONGTEXT NULL,
  `fecha` DATE NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_datos_clinicos_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_datos_clinicos_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`recidencia_anterior`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`recidencia_anterior` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `municipio_id` INT NOT NULL,
  `localidad` VARCHAR(150) NULL,
  `tiempo` VARCHAR(50) NULL,
  `posible_contagio` VARCHAR(200) NULL,
  `contacto_lepra` VARCHAR(2) NULL,
  `parentesco` VARCHAR(40) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_recidencia_anterior_datos_personales1_idx` (`datos_personales_id` ASC),
  INDEX `fk_recidencia_anterior_municipio1_idx` (`municipio_id` ASC),
  CONSTRAINT `fk_recidencia_anterior_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_recidencia_anterior_municipio1`
    FOREIGN KEY (`municipio_id`)
    REFERENCES `pnvcl`.`municipio` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`bacteriologia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`bacteriologia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `linfa` VARCHAR(45) NULL,
  `fecha_muestra` DATE NULL,
  `laboratorio` VARCHAR(45) NULL,
  `fecha_resultado` VARCHAR(45) NULL,
  `resultado_lobulo_oreja` VARCHAR(10) NULL,
  `resultado_lesion` VARCHAR(10) NULL,
  `resultado_codo` VARCHAR(10) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_bacteriologia_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_bacteriologia_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`diagnostico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`diagnostico` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `multibacilar_lepromatosa` VARCHAR(45) NULL,
  `multibacilar_dimofa` VARCHAR(45) NULL,
  `paucibacilar_tuberculoide` VARCHAR(45) NULL,
  `paucibacilar_indeterminada` VARCHAR(45) NULL,
  `cabeza` VARCHAR(1500) NULL,
  `tronco` VARCHAR(1500) NULL,
  `ext_superiores` VARCHAR(1500) NULL,
  `ext_inferiores` MEDIUMTEXT NULL,
  `fecha_diagnostico` DATE NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_diagnostico_clinico_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_diagnostico_clinico_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`discapacidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`discapacidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `manos_grado` CHAR(1) NULL,
  `manos_signo` VARCHAR(45) NULL,
  `manos_lat` CHAR(3) NULL,
  `pies_grado` CHAR(1) NULL,
  `pies_signo` VARCHAR(45) NULL,
  `pies_lat` CHAR(3) NULL,
  `ojos_lat` CHAR(3) NULL,
  `ojos_grado` CHAR(1) NULL,
  `ojos_signo` VARCHAR(45) NULL,
  `lesiones_faringeas` VARCHAR(45) NULL,
  `aplastamiento_nariz` VARCHAR(45) NULL,
  `paralisis_fasial` VARCHAR(45) NULL,
  `otros` VARCHAR(500) NULL,
  `termino_tto` CHAR(2) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_discapacidad_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_discapacidad_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`tratamiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`tratamiento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `tto_anterior` VARCHAR(45) NULL,
  `anterior_multibacilar` VARCHAR(45) NULL,
  `anterior_paucibacilar` VARCHAR(45) NULL,
  `actual_multibacilar` VARCHAR(45) NULL,
  `actual_paucibacilar` VARCHAR(45) NULL,
  `actual_fecha_inicio` DATE NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_tratamiento_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_tratamiento_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`identificacion_caso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`identificacion_caso` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `activa` VARCHAR(45) NULL,
  `pasiva` VARCHAR(45) NULL,
  `transferencia` VARCHAR(45) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_identificacion_caso_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_identificacion_caso_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`notificacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`notificacion` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `identificacion_caso_id` INT NOT NULL,
  `servicio_salud` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_notificacion_identificacion_caso1_idx` (`identificacion_caso_id` ASC),
  CONSTRAINT `fk_notificacion_identificacion_caso1`
    FOREIGN KEY (`identificacion_caso_id`)
    REFERENCES `pnvcl`.`identificacion_caso` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`histopatologia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`histopatologia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `laboratorio_informe` VARCHAR(100) NULL,
  `resultado_histopatologico` VARCHAR(500) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_histopatologia_datos_personales1_idx` (`datos_personales_id` ASC),
  CONSTRAINT `fk_histopatologia_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pnvcl`.`control_programa_tto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pnvcl`.`control_programa_tto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `datos_personales_id` INT NOT NULL,
  `diagnostico_id` INT NOT NULL,
  `numero_control` INT NULL,
  `fecha` DATE NULL,
  `poliquimioterapia` VARCHAR(45) NULL,
  `estados_reaccionales` VARCHAR(45) NULL,
  `fecha_est_reaccionales` DATE NULL,
  `tto_estados_reaccionales` VARCHAR(45) NULL,
  `hallazgos_clinicos` VARCHAR(900) NOT NULL,
  `discapacidad_id` INT NOT NULL,
  `control_programa_ttocol1` VARCHAR(45) NULL,
  `culmina_tto` VARCHAR(10) NULL,
  `fecha_fin_tto` DATE NULL,
  `obs` VARCHAR(900) NULL,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_control_programa_tto_datos_personales1_idx` (`datos_personales_id` ASC),
  INDEX `fk_control_programa_tto_diagnostico1_idx` (`diagnostico_id` ASC),
  INDEX `fk_control_programa_tto_discapacidad1_idx` (`discapacidad_id` ASC),
  CONSTRAINT `fk_control_programa_tto_datos_personales1`
    FOREIGN KEY (`datos_personales_id`)
    REFERENCES `pnvcl`.`datos_personales` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_control_programa_tto_diagnostico1`
    FOREIGN KEY (`diagnostico_id`)
    REFERENCES `pnvcl`.`diagnostico` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_control_programa_tto_discapacidad1`
    FOREIGN KEY (`discapacidad_id`)
    REFERENCES `pnvcl`.`discapacidad` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
