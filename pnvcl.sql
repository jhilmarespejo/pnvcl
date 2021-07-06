-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-07-2021 a las 14:51:33
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pnvcl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bacteriologia`
--

DROP TABLE IF EXISTS `bacteriologia`;
CREATE TABLE IF NOT EXISTS `bacteriologia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `linfa` varchar(45) DEFAULT NULL,
  `fecha_muestra` date DEFAULT NULL,
  `laboratorio` varchar(200) DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `resultado_lobulo_oreja` varchar(10) DEFAULT NULL,
  `resultado_lesion` varchar(10) DEFAULT NULL,
  `resultado_codo` varchar(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_bacteriologia_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_contactos`
--

DROP TABLE IF EXISTS `control_contactos`;
CREATE TABLE IF NOT EXISTS `control_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `red_salud_id` int(11) NOT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `parentesco` varchar(100) DEFAULT NULL,
  `conviviente` varchar(45) DEFAULT NULL,
  `fecha_control` date DEFAULT NULL,
  `sintomatico_piel` char(2) DEFAULT NULL,
  `laboratorio_baar` varchar(10) DEFAULT NULL,
  `obervaciones` varchar(500) DEFAULT NULL,
  `antecedente_lepra` varchar(2) DEFAULT NULL,
  `fecha_contacto` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_control_contactos_datos_personales1_idx` (`datos_personales_id`),
  KEY `fk_control_contactos_red_salud1_idx` (`red_salud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_programa_tto`
--

DROP TABLE IF EXISTS `control_programa_tto`;
CREATE TABLE IF NOT EXISTS `control_programa_tto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `numero_control` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `poliquimioterapia` varchar(45) DEFAULT NULL,
  `estados_reaccionales` varchar(45) DEFAULT NULL,
  `fecha_est_reaccionales` date DEFAULT NULL,
  `tto_estados_reaccionales` varchar(45) DEFAULT NULL,
  `hallazgos_clinicos` varchar(900) NOT NULL,
  `discapacidad_id` int(11) NOT NULL,
  `control_programa_ttocol1` varchar(45) DEFAULT NULL,
  `culmina_tto` varchar(10) DEFAULT NULL,
  `fecha_fin_tto` date DEFAULT NULL,
  `obs` varchar(900) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_control_programa_tto_datos_personales1_idx` (`datos_personales_id`),
  KEY `fk_control_programa_tto_diagnostico1_idx` (`diagnostico_id`),
  KEY `fk_control_programa_tto_discapacidad1_idx` (`discapacidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_clinicos`
--

DROP TABLE IF EXISTS `datos_clinicos`;
CREATE TABLE IF NOT EXISTS `datos_clinicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `inicio_sintomas` varchar(45) DEFAULT NULL,
  `tiempo_evolucion_cantidad` tinyint(4) DEFAULT NULL,
  `tiempo_evolucion_unidad` varchar(6) DEFAULT NULL,
  `descripcion_primeros_signos` longtext,
  `cuadro_clinico_actual` longtext,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_datos_clinicos_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_personales`
--

DROP TABLE IF EXISTS `datos_personales`;
CREATE TABLE IF NOT EXISTS `datos_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_salud_id` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `ci` varchar(12) DEFAULT NULL,
  `ci_exp` varchar(4) DEFAULT NULL,
  `sexo` varchar(10) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `zona` varchar(100) DEFAULT NULL,
  `calle` varchar(100) DEFAULT NULL,
  `numero` varchar(20) DEFAULT NULL,
  `latlng` varchar(100) DEFAULT NULL,
  `url_croquis` varchar(250) DEFAULT NULL,
  `tiempo_res_actual_cantidad` tinyint(4) DEFAULT NULL,
  `tiempo_res_actual_unidad` varchar(6) DEFAULT NULL,
  `ocupacion_paciente` varchar(100) DEFAULT NULL,
  `vive_solo` varchar(2) DEFAULT NULL,
  `celular_referencia` varchar(10) DEFAULT NULL,
  `serv_salud_cercano` varchar(150) DEFAULT NULL,
  `lugar_posible_contagio` varchar(200) DEFAULT NULL,
  `contacto_lepra` char(2) DEFAULT NULL,
  `parentesco` varchar(40) DEFAULT NULL,
  `historia_clinica` varchar(45) DEFAULT NULL,
  `num_ficha` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_datos_generales_epid_servicio_salud1_idx` (`servicio_salud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
CREATE TABLE IF NOT EXISTS `diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `multibacilar_lepromatosa` varchar(45) DEFAULT NULL,
  `multibacilar_dimofa` varchar(45) DEFAULT NULL,
  `paucibacilar_tuberculoide` varchar(45) DEFAULT NULL,
  `paucibacilar_indeterminada` varchar(45) DEFAULT NULL,
  `cabeza` text,
  `tronco` text,
  `ext_superiores` text,
  `ext_inferiores` text,
  `fecha_diagnostico` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_diagnostico_clinico_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discapacidad`
--

DROP TABLE IF EXISTS `discapacidad`;
CREATE TABLE IF NOT EXISTS `discapacidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `manos_grado` char(1) DEFAULT NULL,
  `manos_signo` varchar(45) DEFAULT NULL,
  `manos_lat` char(3) DEFAULT NULL,
  `pies_grado` char(1) DEFAULT NULL,
  `pies_signo` varchar(45) DEFAULT NULL,
  `pies_lat` char(3) DEFAULT NULL,
  `ojos_lat` char(3) DEFAULT NULL,
  `ojos_grado` char(1) DEFAULT NULL,
  `ojos_signo` varchar(45) DEFAULT NULL,
  `lesiones_faringeas` varchar(45) DEFAULT NULL,
  `aplastamiento_nariz` varchar(45) DEFAULT NULL,
  `paralisis_fasial` varchar(45) DEFAULT NULL,
  `otros` varchar(500) DEFAULT NULL,
  `termino_tto` char(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_discapacidad_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histopatologia`
--

DROP TABLE IF EXISTS `histopatologia`;
CREATE TABLE IF NOT EXISTS `histopatologia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `laboratorio_informe` text,
  `resultado_histopatologico` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_histopatologia_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `identificacion_caso`
--

DROP TABLE IF EXISTS `identificacion_caso`;
CREATE TABLE IF NOT EXISTS `identificacion_caso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `activa` varchar(45) DEFAULT NULL,
  `pasiva` varchar(45) DEFAULT NULL,
  `transferencia` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_identificacion_caso_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipio_provincia1_idx` (`provincia_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion_caso_id` int(11) NOT NULL,
  `servicio_salud` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_notificacion_identificacion_caso1_idx` (`identificacion_caso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provincia_sedes1_idx` (`sedes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recidencia_anterior`
--

DROP TABLE IF EXISTS `recidencia_anterior`;
CREATE TABLE IF NOT EXISTS `recidencia_anterior` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `localidad` varchar(150) DEFAULT NULL,
  `tiempo_res_ant_cantidad` tinyint(4) DEFAULT NULL,
  `tiempo_res_ant_unidad` varchar(6) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_recidencia_anterior_datos_personales1_idx` (`datos_personales_id`),
  KEY `fk_recidencia_anterior_municipio1_idx` (`municipio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_salud`
--

DROP TABLE IF EXISTS `red_salud`;
CREATE TABLE IF NOT EXISTS `red_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio_id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_red_salud_municipio1_idx` (`municipio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

DROP TABLE IF EXISTS `sedes`;
CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_salud`
--

DROP TABLE IF EXISTS `servicio_salud`;
CREATE TABLE IF NOT EXISTS `servicio_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_salud_id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicio_salud_red_salud1_idx` (`red_salud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamiento`
--

DROP TABLE IF EXISTS `tratamiento`;
CREATE TABLE IF NOT EXISTS `tratamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `tto_anterior` varchar(45) DEFAULT NULL,
  `anterior_multibacilar` varchar(45) DEFAULT NULL,
  `anterior_paucibacilar` varchar(45) DEFAULT NULL,
  `actual_multibacilar` varchar(45) DEFAULT NULL,
  `actual_paucibacilar` varchar(45) DEFAULT NULL,
  `actual_fecha_inicio` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_tratamiento_datos_personales1_idx` (`datos_personales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bacteriologia`
--
ALTER TABLE `bacteriologia`
  ADD CONSTRAINT `fk_bacteriologia_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `control_contactos`
--
ALTER TABLE `control_contactos`
  ADD CONSTRAINT `fk_control_contactos_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_control_contactos_red_salud1` FOREIGN KEY (`red_salud_id`) REFERENCES `red_salud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `control_programa_tto`
--
ALTER TABLE `control_programa_tto`
  ADD CONSTRAINT `fk_control_programa_tto_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_control_programa_tto_diagnostico1` FOREIGN KEY (`diagnostico_id`) REFERENCES `diagnostico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_control_programa_tto_discapacidad1` FOREIGN KEY (`discapacidad_id`) REFERENCES `discapacidad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_clinicos`
--
ALTER TABLE `datos_clinicos`
  ADD CONSTRAINT `fk_datos_clinicos_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datos_personales`
--
ALTER TABLE `datos_personales`
  ADD CONSTRAINT `fk_datos_generales_epid_servicio_salud1` FOREIGN KEY (`servicio_salud_id`) REFERENCES `servicio_salud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `fk_diagnostico_clinico_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `discapacidad`
--
ALTER TABLE `discapacidad`
  ADD CONSTRAINT `fk_discapacidad_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `histopatologia`
--
ALTER TABLE `histopatologia`
  ADD CONSTRAINT `fk_histopatologia_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `identificacion_caso`
--
ALTER TABLE `identificacion_caso`
  ADD CONSTRAINT `fk_identificacion_caso_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `fk_municipio_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD CONSTRAINT `fk_notificacion_identificacion_caso1` FOREIGN KEY (`identificacion_caso_id`) REFERENCES `identificacion_caso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_provincia_sedes1` FOREIGN KEY (`sedes_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `recidencia_anterior`
--
ALTER TABLE `recidencia_anterior`
  ADD CONSTRAINT `fk_recidencia_anterior_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recidencia_anterior_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `red_salud`
--
ALTER TABLE `red_salud`
  ADD CONSTRAINT `fk_red_salud_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio_salud`
--
ALTER TABLE `servicio_salud`
  ADD CONSTRAINT `fk_servicio_salud_red_salud1` FOREIGN KEY (`red_salud_id`) REFERENCES `red_salud` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD CONSTRAINT `fk_tratamiento_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
