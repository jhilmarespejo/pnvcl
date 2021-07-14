-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-07-2021 a las 19:40:40
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bacteriologia`
--

INSERT INTO `bacteriologia` (`id`, `datos_personales_id`, `linfa`, `fecha_muestra`, `laboratorio`, `fecha_resultado`, `resultado_lobulo_oreja`, `resultado_lesion`, `resultado_codo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lobulo de la oreja', '2021-07-09', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Positivo', '2021-07-10 20:53:34', '2021-07-10 20:53:34'),
(2, 1, 'Lobulo de la oreja', '2021-07-09', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Positivo', '2021-07-10 20:53:59', '2021-07-10 20:53:59'),
(3, 1, 'Lobulo de la oreja', '2021-07-01', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 12:54:52', '2021-07-11 12:54:52'),
(4, 1, 'Lobulo de la oreja', '2021-07-01', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(5, 1, 'Lobulo de la oreja', '2021-07-01', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 14:45:02', '2021-07-11 14:45:02'),
(6, 3, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(7, 4, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(8, 5, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(9, 6, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(10, 7, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(11, 8, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(12, 9, 'Lobulo de la oreja', '2021-07-21', 'INLASA', '2021-07-08', 'Positivo', 'Positivo', 'Positivo', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(13, 10, 'Lesion', '2021-07-09', 'INLASA', '2021-06-04', 'Positivo', 'Negativo', 'Negativo', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(14, 11, 'Lesion', '2021-07-09', 'INLASA', '2021-06-04', 'Positivo', 'Negativo', 'Negativo', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(15, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:11:48', '2021-07-12 05:11:48'),
(16, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(17, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(18, 19, 'Lesion', '2021-07-01', 'INLASA', '2021-07-02', 'Positivo', 'Positivo', 'Negativo', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_contactos`
--

DROP TABLE IF EXISTS `control_contactos`;
CREATE TABLE IF NOT EXISTS `control_contactos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datos_personales_id` int(11) NOT NULL,
  `red_salud_id` int(11) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `control_contactos`
--

INSERT INTO `control_contactos` (`id`, `datos_personales_id`, `red_salud_id`, `apellidos`, `nombres`, `edad`, `sexo`, `parentesco`, `conviviente`, `fecha_control`, `sintomatico_piel`, `laboratorio_baar`, `obervaciones`, `antecedente_lepra`, `fecha_contacto`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'JOSE', 'ROMAN', 23, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-05', '2021-07-10 02:33:18', '2021-07-10 02:33:18'),
(2, 1, NULL, 'MARIA', 'GUTIERREZ', 6, NULL, 'Vecino', NULL, NULL, NULL, NULL, NULL, 'No', '2021-07-05', '2021-07-10 02:33:18', '2021-07-10 02:33:18'),
(3, 3, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(4, 4, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(5, 5, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(6, 6, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(7, 7, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(8, 8, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(9, 9, NULL, 'TARQUI FLORES', 'JUANA', 34, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-02', '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(10, 10, NULL, 'MAMANI', 'jusina', 45, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-07', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(11, 10, NULL, 'TARQUI', 'LAURA', NULL, NULL, 'Vecino', NULL, NULL, NULL, NULL, NULL, 'No', '2021-04-27', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(12, 11, NULL, 'MAMANI', 'jusina', 45, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-07-07', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(13, 11, NULL, 'TARQUI', 'LAURA', NULL, NULL, 'Vecino', NULL, NULL, NULL, NULL, NULL, 'No', '2021-04-27', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(14, 19, NULL, 'LOZA', 'ESTER', 33, NULL, 'Pariente', NULL, NULL, NULL, NULL, NULL, 'Si', '2021-06-28', '2021-07-12 16:47:32', '2021-07-12 16:47:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_clinicos`
--

INSERT INTO `datos_clinicos` (`id`, `datos_personales_id`, `inicio_sintomas`, `tiempo_evolucion_cantidad`, `tiempo_evolucion_unidad`, `descripcion_primeros_signos`, `cuadro_clinico_actual`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, '2010', 5, 'Meses', 'Descripción de los primeros signos y/o síntomas', 'Cuadro clínico actual (exploración general, signos y/o síntomas específicos y características de lesiones)', NULL, '2021-07-10 20:32:49', '2021-07-10 20:32:49'),
(2, 1, '2011', 2, 'Meses', 'descriocion sintomas', 'cuadro clinico actual', NULL, '2021-07-11 12:54:52', '2021-07-11 12:54:52'),
(3, 1, '2011', 2, 'Meses', 'descriocion sintomas', 'cuadro clinico actual', NULL, '2021-07-11 12:55:46', '2021-07-11 12:55:46'),
(4, 1, '2011', 2, 'Meses', 'descriocion sintomas', 'cuadro clinico actual', NULL, '2021-07-11 14:45:02', '2021-07-11 14:45:02'),
(5, 3, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(6, 4, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(7, 5, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(8, 6, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(9, 7, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(10, 8, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(11, 9, '2010', 1, 'Años', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(12, 10, '2018', 3, 'Meses', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLINICO ACTUAL', NULL, '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(13, 11, '2018', 3, 'Meses', 'DESCRIPCION PRIMEROS SIGNOS', 'CUADRO CLINICO ACTUAL', NULL, '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(14, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:11:48', '2021-07-12 05:11:48'),
(15, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(16, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(17, 19, '2020', 5, 'Meses', 'DESC PRIM SIGNOS', 'CUADRO CLIN ACTUAL', NULL, '2021-07-12 16:47:33', '2021-07-12 16:47:33');

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
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `localidad` varchar(250) DEFAULT NULL,
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
  `lugar_contagio` varchar(200) DEFAULT NULL,
  `contacto_lepra` char(2) DEFAULT NULL,
  `parentesco` varchar(40) DEFAULT NULL,
  `historia_clinica` varchar(45) DEFAULT NULL,
  `num_ficha` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_datos_generales_epid_servicio_salud1_idx` (`servicio_salud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos_personales`
--

INSERT INTO `datos_personales` (`id`, `servicio_salud_id`, `nombres`, `apellidos`, `ci`, `ci_exp`, `sexo`, `fecha_nacimiento`, `edad`, `celular`, `telefono`, `localidad`, `zona`, `calle`, `numero`, `latlng`, `url_croquis`, `tiempo_res_actual_cantidad`, `tiempo_res_actual_unidad`, `ocupacion_paciente`, `vive_solo`, `celular_referencia`, `serv_salud_cercano`, `lugar_contagio`, `contacto_lepra`, `parentesco`, `historia_clinica`, `num_ficha`, `created_at`, `updated_at`) VALUES
(1, 900022, 'JUAN', 'LOPEZ MIRANDA', '132454', 'TJ', 'Masculino', '2021-07-12', 12, '7451234', '2800010', NULL, 'BALLIVIAN', 'YUNGAS', '3666', NULL, NULL, 3, 'Meses', 'ENCARGADO DE VENTAS', 'Si', '54321234', 'SERVICIO 2', 'FERIA', 'Si', 'Vecino', NULL, NULL, '2021-07-08 02:53:15', '2021-07-08 02:53:15'),
(3, 900001, 'ROGELIO', 'PAREDES MOYA', '7655444', 'BN', 'Femenino', '1980-07-05', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(4, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(5, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(6, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(7, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 16:00:37', '2021-07-11 16:00:37'),
(8, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(9, 900001, 'RAMONA', 'HURTADO MAMANI', '7655444', 'OR', 'Femenino', '1990-07-15', NULL, '7123456', '2466666', 'LAS PALMAS', 'PALMAS', 'PALMAS', '222', NULL, NULL, 6, 'Años', 'VENDEDOR', 'Si', '65555556', 'PUESTO DE SALUD - PUERTO CONSUELO II', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(10, 900028, 'SONIA', 'MAMANI', '777733', 'PN', 'Femenino', '1995-06-28', NULL, '6987654', '28000', 'LAS PERLAS', 'PERLAS', 'PERLA', '999', NULL, '1.jpg', 4, 'Años', 'PROFESORA', 'No', '87766663', 'PUESTO DE SALUD - BOLPEBRA', 'PLAZA', 'Si', 'Vecino', NULL, NULL, '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(11, 900028, 'SONIA', 'MAMANI', '777733', 'PN', 'Femenino', '1995-06-28', NULL, '6987654', '28000', 'LAS PERLAS', 'PERLAS', 'PERLA', '999', NULL, '1.jpg', 4, 'Años', 'PROFESORA', 'No', '87766663', 'PUESTO DE SALUD - BOLPEBRA', 'PLAZA', 'Si', 'Vecino', NULL, NULL, '2021-07-12 02:17:50', '2021-07-12 02:17:50'),
(12, 900016, 'JUAN', 'aergtrhgreth', '132454', 'PT', 'Masculino', '1998-07-08', NULL, '78878', '42', 'LAS PALMAS', 'BALLIVIAN', 'YUNGAS', '222', NULL, 'C:\\xampp\\tmp\\php3857.tmp', 5, 'Años', 'ENCARGADO DE VENTAS', 'Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:09:28', '2021-07-12 05:09:28'),
(13, 900016, 'JUAN', 'aergtrhgreth', '132454', 'PT', 'Masculino', '1998-07-08', NULL, '78878', '42', 'LAS PALMAS', 'BALLIVIAN', 'YUNGAS', '222', NULL, 'C:\\xampp\\tmp\\php5AA7.tmp', 5, 'Años', 'ENCARGADO DE VENTAS', 'Si', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:11:47', '2021-07-12 05:11:47'),
(14, 900059, 'NICOLAS', 'SUAREZ', '556655', 'PN', 'Masculino', '1988-07-07', NULL, '345344', '324234', 'LAS PERLAS', 'PALMAS', 'PALMAS', '3355', NULL, 'C:\\xampp\\tmp\\php1CF.tmp', 5, 'Años', 'ENCARGADO DE VENTAS', 'Si', '253454', 'C.S. AMBULATORIO - SAN MARTIN DE PORRES', NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(15, 900059, 'NICOLAS', 'SUAREZ', '556655', 'PN', 'Masculino', '1988-07-07', NULL, '345344', '324234', 'LAS PERLAS', 'PALMAS', 'PALMAS', '3355', NULL, '/storage/croquis/QggQDanu1SbLGgOGUvKHW184j3Z3BVDDN5TVG9vs.jpg', 5, 'Años', 'ENCARGADO DE VENTAS', 'Si', '253454', 'C.S. AMBULATORIO - SAN MARTIN DE PORRES', NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:47:24', '2021-07-12 05:47:24'),
(16, 900050, 'RAMONA', 'aergtrhgreth', '132454', 'LP', 'Femenino', '2021-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:51:05', '2021-07-12 05:51:05'),
(17, 900050, 'RAMONA', 'aergtrhgreth', '132454', 'LP', 'Femenino', '2021-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/storage/croquis/CDN8fncxViN7Cd8OYEwRrVSvYy4R0HpMB0v7EjLB.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:51:28', '2021-07-12 05:51:28'),
(18, 900002, 'DIONICIO', 'POMA', '9998', 'BN', NULL, '1988-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/storage/croquis/UpxoABCXJzuZ0AiMQpMe3IwAAe0pq17psJSAwOTt.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(19, 900017, 'RAQUEL', 'MOLINA', '88773', 'SC', 'Femenino', '1976-07-12', NULL, '7662354', '34645', NULL, 'URB. MILAGROS', 'AV. ROCA Y CORONADO', '345', '-17.786203849571738,-63.222748830392895', '/storage/croquis/E9gYvI6eX5UcSQIlEztNq65UilcumkEpzYD0P6qq.jpg', 3, 'Años', 'ABOGADA', 'Si', '5345', 'C.S. AMBULATORIO - SAN MARTIN DE PORRES', 'FERIA', 'Si', 'Pariente', NULL, NULL, '2021-07-12 16:47:32', '2021-07-12 16:47:32');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `datos_personales_id`, `multibacilar_lepromatosa`, `multibacilar_dimofa`, `paucibacilar_tuberculoide`, `paucibacilar_indeterminada`, `cabeza`, `tronco`, `ext_superiores`, `ext_inferiores`, `fecha_diagnostico`, `created_at`, `updated_at`) VALUES
(1, 1, 'Si', 'Si', 'Si', 'Si', 'caqbeza', 'TRONCO', 'EXR SUP', 'EXT INF', '2021-07-01', '2021-07-10 21:15:40', '2021-07-10 21:15:40'),
(2, 1, 'No', 'No', 'No', 'No', 'caqbeza', 'TRONCO', 'EXR SUP', 'EXT INF', '2021-07-01', '2021-07-10 21:16:18', '2021-07-10 21:16:18'),
(3, 1, '', 'NULL', 'NULL', 'NULL', 'CABE', 'TRON', 'EXT SUP', 'EXT INF', '2021-12-28', '2021-07-10 21:18:20', '2021-07-10 21:18:20'),
(4, 1, 'NULL', 'NULL', 'NULL', 'NULL', 'CABE', 'TRON', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-10 21:20:23', '2021-07-10 21:20:23'),
(5, 1, NULL, NULL, NULL, NULL, 'c', 't', 'es', 'ei', '2021-07-02', '2021-07-10 21:22:18', '2021-07-10 21:22:18'),
(6, 1, 'Si', 'Si', 'Si', 'Si', 'CABE', 'TRO', 'EXTR SUP', 'EXT INF', '2021-07-02', '2021-07-11 12:54:52', '2021-07-11 12:54:52'),
(7, 1, 'Si', 'Si', 'Si', 'Si', 'CABE', 'TRO', 'EXTR SUP', 'EXT INF', '2021-07-02', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(8, 1, 'Si', 'Si', 'Si', 'Si', 'CABE', 'TRO', 'EXTR SUP', 'EXT INF', '2021-07-02', '2021-07-11 14:45:03', '2021-07-11 14:45:03'),
(9, 3, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(10, 4, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 15:48:03', '2021-07-11 15:48:03'),
(11, 5, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(12, 6, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(13, 7, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(14, 8, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(15, 9, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRONC', 'EXT SUP', 'EXT INF', '2021-07-08', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(16, 10, 'Si', NULL, NULL, 'Si', 'CABEZ', 'TRONC', 'EXT INF', 'EXT SUP', '2021-07-07', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(17, 11, 'Si', NULL, NULL, 'Si', 'CABEZ', 'TRONC', 'EXT INF', 'EXT SUP', '2021-07-07', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(18, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:11:48', '2021-07-12 05:11:48'),
(19, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(20, 18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(21, 19, 'Si', 'Si', 'Si', 'Si', 'CAB', 'TRO', 'EXT SU', 'EXT INF', '2021-07-03', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `discapacidad`
--

INSERT INTO `discapacidad` (`id`, `datos_personales_id`, `manos_grado`, `manos_signo`, `manos_lat`, `pies_grado`, `pies_signo`, `pies_lat`, `ojos_lat`, `ojos_grado`, `ojos_signo`, `lesiones_faringeas`, `aplastamiento_nariz`, `paralisis_fasial`, `otros`, `termino_tto`, `created_at`, `updated_at`) VALUES
(15, 1, '0', 'sin daños', 'D/I', '0', 'sin daños', NULL, NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:28:13', '2021-07-10 14:28:13'),
(16, 1, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', 'D/I', NULL, '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:28:13', '2021-07-10 14:28:13'),
(17, 1, '2', 'Úlcelas y lesiones traumáticas', NULL, '2', 'Mal performante', NULL, 'D/I', '2', 'Iritis o queratitis', NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:28:13', '2021-07-10 14:28:13'),
(18, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, '2021-07-10 14:28:13', '2021-07-10 14:28:13'),
(19, 1, '2', 'Mano caida', NULL, '2', 'Reabsoción leve', NULL, 'D/I', '2', 'Ceguera', NULL, NULL, NULL, NULL, NULL, '2021-07-10 14:28:58', '2021-07-10 14:28:58'),
(20, 3, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(21, 3, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(22, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'No', NULL, NULL, NULL, '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(23, 4, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(24, 4, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(25, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(26, 5, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(27, 5, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(28, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(29, 6, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(30, 6, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(31, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(32, 7, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(33, 7, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(34, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(35, 8, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(36, 8, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(37, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(38, 9, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', NULL, '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(39, 9, '1', 'Insensibilidad', NULL, '1', 'Insensibilidad', NULL, 'D/I', '1', 'Enrojecimiento de la conjuntiva', NULL, NULL, NULL, NULL, NULL, '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(40, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'Si', NULL, NULL, NULL, '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(41, 10, '2', 'Mano en garra movible', 'D/I', '2', 'Dedos en garfio', 'D/I', NULL, '2', 'Visión borrosa', NULL, NULL, NULL, NULL, NULL, '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(42, 10, '2', 'Mano caida', NULL, '2', 'Reabsoción leve', NULL, 'I', '2', 'Ceguera', NULL, NULL, NULL, NULL, NULL, '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(43, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'OTROS', NULL, '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(44, 11, '2', 'Mano en garra movible', 'D/I', '2', 'Dedos en garfio', 'D/I', NULL, '2', 'Visión borrosa', NULL, NULL, NULL, NULL, NULL, '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(45, 11, '2', 'Mano caida', NULL, '2', 'Reabsoción leve', NULL, 'I', '2', 'Ceguera', NULL, NULL, NULL, NULL, NULL, '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(46, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', 'OTROS', NULL, '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(47, 19, '0', 'sin daños', 'D/I', '0', 'sin daños', 'D/I', 'D', '0', 'sin daños', NULL, NULL, NULL, NULL, NULL, '2021-07-12 16:47:33', '2021-07-12 16:47:33'),
(48, 19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Si', NULL, NULL, 'OTRAS LEC', NULL, '2021-07-12 16:47:33', '2021-07-12 16:47:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `histopatologia`
--

INSERT INTO `histopatologia` (`id`, `datos_personales_id`, `laboratorio_informe`, `resultado_histopatologico`, `created_at`, `updated_at`) VALUES
(1, 1, 'LABORATORIO QUE REALIZA EN INFORME', 'RESULTADO HISTOPATOLOGICO', '2021-07-10 20:58:28', '2021-07-10 20:58:28'),
(2, 1, 'LABORATORIO QUE REALIZA EN INFORME', 'RESULTADO HISTOPATOLOGICO', '2021-07-10 20:58:38', '2021-07-10 20:58:38'),
(3, 1, 'INFORME INLASAS', 'POSITIVO', '2021-07-11 12:54:52', '2021-07-11 12:54:52'),
(4, 1, 'INFORME INLASAS', 'POSITIVO', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(5, 1, 'INFORME INLASAS', 'POSITIVO', '2021-07-11 14:45:03', '2021-07-11 14:45:03'),
(6, 3, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(7, 4, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 15:48:03', '2021-07-11 15:48:03'),
(8, 5, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(9, 6, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(10, 7, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(11, 8, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(12, 9, 'LAB INLASA INFORME', 'RESULTADO', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(13, 10, 'INFORME DE INLASA', 'RESULTADO HISTOPAT', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(14, 11, 'INFORME DE INLASA', 'RESULTADO HISTOPAT', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(15, 13, NULL, NULL, '2021-07-12 05:11:48', '2021-07-12 05:11:48'),
(16, 14, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(17, 18, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(18, 19, 'INFORME INLASA', 'RESULTADO HISTOPAT', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `identificacion_caso`
--

INSERT INTO `identificacion_caso` (`id`, `datos_personales_id`, `activa`, `pasiva`, `transferencia`, `created_at`, `updated_at`) VALUES
(1, 1, 'Casa por casa', 'Si', 'Si', '2021-07-10 21:28:37', '2021-07-10 21:28:37'),
(2, 1, 'Casa por casa', 'No', 'No', '2021-07-10 21:28:48', '2021-07-10 21:28:48'),
(3, 1, 'Casa por casa', 'Si', 'Si', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(4, 1, 'Campaña', 'Si', 'Si', '2021-07-11 14:45:03', '2021-07-11 14:45:03'),
(5, 3, 'Casa por casa', 'Si', 'Si', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(6, 4, 'Casa por casa', 'Si', 'Si', '2021-07-11 15:48:03', '2021-07-11 15:48:03'),
(7, 5, 'Casa por casa', 'Si', 'Si', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(8, 6, 'Casa por casa', 'Si', 'Si', '2021-07-11 15:58:43', '2021-07-11 15:58:43'),
(9, 7, 'Casa por casa', 'Si', 'Si', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(10, 8, 'Casa por casa', 'Si', 'Si', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(11, 9, 'Casa por casa', 'Si', 'Si', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(12, 10, 'Campaña', 'Si', 'No', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(13, 11, 'Campaña', 'Si', 'No', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(14, 13, NULL, 'No', 'No', '2021-07-12 05:11:49', '2021-07-12 05:11:49'),
(15, 14, NULL, 'No', 'No', '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(16, 18, NULL, 'No', 'No', '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(17, 19, 'Casa por casa', 'No', 'Si', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE IF NOT EXISTS `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_municipio_provincia1_idx` (`provincia_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90504 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `provincia_id`, `municipio`) VALUES
(90101, 1, 'COBIJA '),
(90102, 1, 'PORVENIR'),
(90103, 1, 'BOLPEBRA'),
(90104, 1, 'BELLA FLOR'),
(90201, 3, 'PUERTO RICO'),
(90202, 3, 'SAN PEDRO(PND)'),
(90203, 3, 'FILADELFIA'),
(90301, 5, 'PUERTO GONZALO MORENO'),
(90302, 5, 'SAN LORENZO(PND)'),
(90303, 5, 'SENA'),
(90401, 4, 'NACEBE (SANTA ROSA DEL ABUNA)'),
(90402, 4, 'INGAVI (HUMAITA)'),
(90501, 2, 'NUEVO MANOA (NUEVA ESPERANZA)'),
(90502, 2, 'VILLA NUEVA (LOMA ALTA)'),
(90503, 2, 'EUREKA (SANTOS MERCADO)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE IF NOT EXISTS `notificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identificacion_caso_id` int(11) NOT NULL,
  `servicio_salud` varchar(250) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_notificacion_identificacion_caso1_idx` (`identificacion_caso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id`, `identificacion_caso_id`, `servicio_salud`, `fecha`, `created_at`, `updated_at`) VALUES
(1, 1, 'C.S. AMBULATORIO - EL SENA', '2021-07-06', '2021-07-11 12:34:11', '2021-07-11 12:34:11'),
(2, 1, 'C.S. AMBULATORIO - EL SENA', '2021-07-05', '2021-07-11 12:50:33', '2021-07-11 12:50:33'),
(3, 1, 'C.S. AMBULATORIO - EL SENA', '2021-07-05', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(4, 5, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(5, 6, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 15:48:03', '2021-07-11 15:48:03'),
(6, 7, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(7, 8, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 15:58:43', '2021-07-11 15:58:43'),
(8, 9, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(9, 10, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(10, 11, 'PUESTO DE SALUD - ALTO BAHIA', '2021-07-13', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(11, 13, 'C.S. INTEGRAL - HOSPITAL INTEGRAL COMUNITARIO PUERTO RICO', '2021-07-11', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(12, 14, 'C.S. AMBULATORIO - VILLA ROJAS', NULL, '2021-07-12 05:11:49', '2021-07-12 05:11:49'),
(13, 15, 'PUESTO DE SALUD - ARCA DE ISRAEL', NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(14, 16, 'C.S. AMBULATORIO - 27 DE MAYO', NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(15, 17, 'C.S. AMBULATORIO - SAN MARTIN DE PORRES', '2021-07-11', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

DROP TABLE IF EXISTS `provincia`;
CREATE TABLE IF NOT EXISTS `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `provincia` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provincia_sedes1_idx` (`sedes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id`, `sedes_id`, `provincia`) VALUES
(1, 1, 'NICOLAS SUAREZ'),
(2, 1, 'FEDERICO ROMAN'),
(3, 1, 'MANURIPI'),
(4, 1, 'ABUNÁ'),
(5, 1, 'MADRE DE DIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `red_salud`
--

DROP TABLE IF EXISTS `red_salud`;
CREATE TABLE IF NOT EXISTS `red_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes_id` int(11) NOT NULL,
  `red_salud` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_red_salud_sedes1_idx` (`sedes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `red_salud`
--

INSERT INTO `red_salud` (`id`, `sedes_id`, `red_salud`) VALUES
(5, 1, 'I COBIJA'),
(47, 1, 'III GONZALO MORENO'),
(87, 1, 'II PUERTO RICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residencia_anterior`
--

DROP TABLE IF EXISTS `residencia_anterior`;
CREATE TABLE IF NOT EXISTS `residencia_anterior` (
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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `residencia_anterior`
--

INSERT INTO `residencia_anterior` (`id`, `datos_personales_id`, `municipio_id`, `localidad`, `tiempo_res_ant_cantidad`, `tiempo_res_ant_unidad`, `created_at`, `updated_at`) VALUES
(23, 1, 90101, 'LOC1', 2, 'Meses', '2021-07-10 01:23:24', '2021-07-10 01:23:24'),
(24, 1, 90303, 'LOC2', 4, 'Años', '2021-07-10 01:23:24', '2021-07-10 01:23:24'),
(25, 1, 90401, 'LOC3', 6, 'Años', '2021-07-10 01:23:24', '2021-07-10 01:23:24'),
(26, 1, 90101, 'LOC1', 1, 'Meses', '2021-07-10 01:38:59', '2021-07-10 01:38:59'),
(27, 1, 90103, 'LOC1', 5, 'Meses', '2021-07-10 01:56:01', '2021-07-10 01:56:01'),
(28, 1, 90103, 'LOC1', 5, 'Meses', '2021-07-10 02:20:39', '2021-07-10 02:20:39'),
(29, 3, 90101, 'LOC11', 1, 'Meses', '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(30, 3, 90103, 'LOC22', 1, 'Años', '2021-07-11 15:10:29', '2021-07-11 15:10:29'),
(31, 4, 90101, 'LOC11', 1, 'Meses', '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(32, 4, 90103, 'LOC22', 1, 'Años', '2021-07-11 15:48:02', '2021-07-11 15:48:02'),
(33, 5, 90101, 'LOC11', 1, 'Meses', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(34, 5, 90103, 'LOC22', 1, 'Años', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(35, 6, 90101, 'LOC11', 1, 'Meses', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(36, 6, 90103, 'LOC22', 1, 'Años', '2021-07-11 15:58:42', '2021-07-11 15:58:42'),
(37, 7, 90101, 'LOC11', 1, 'Meses', '2021-07-11 16:00:37', '2021-07-11 16:00:37'),
(38, 7, 90103, 'LOC22', 1, 'Años', '2021-07-11 16:00:37', '2021-07-11 16:00:37'),
(39, 8, 90101, 'LOC11', 1, 'Meses', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(40, 8, 90103, 'LOC22', 1, 'Años', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(41, 9, 90101, 'LOC11', 1, 'Meses', '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(42, 9, 90103, 'LOC22', 1, 'Años', '2021-07-11 16:10:33', '2021-07-11 16:10:33'),
(43, 10, 90102, 'porvenir', 9, 'Años', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(44, 11, 90102, 'porvenir', 9, 'Años', '2021-07-12 02:17:51', '2021-07-12 02:17:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

DROP TABLE IF EXISTS `sedes`;
CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sedes` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `sedes`) VALUES
(1, 'PANDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_salud`
--

DROP TABLE IF EXISTS `servicio_salud`;
CREATE TABLE IF NOT EXISTS `servicio_salud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `red_salud_id` int(11) NOT NULL,
  `municipio_id` int(11) NOT NULL,
  `serv_salud` varchar(200) NOT NULL,
  `nivel` varchar(45) NOT NULL,
  `subsector` varchar(45) NOT NULL,
  `ambito` varchar(45) NOT NULL,
  `dependencia` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_servicio_salud_red_salud1_idx` (`red_salud_id`),
  KEY `fk_servicio_salud_municipio1_idx` (`municipio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=900113 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_salud`
--

INSERT INTO `servicio_salud` (`id`, `red_salud_id`, `municipio_id`, `serv_salud`, `nivel`, `subsector`, `ambito`, `dependencia`) VALUES
(900001, 5, 90101, 'PUESTO DE SALUD - ALTO BAHIA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900002, 5, 90101, 'C.S. AMBULATORIO - 27 DE MAYO', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900003, 5, 90101, 'C.S. AMBULATORIO - SANTA CLARA', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900004, 5, 90101, 'HOSPITAL SEGUNDO NIVEL - HOSPITAL INTEGRAL DE ESPECIALIDADES EN SALUD (H.I.E.S. OBRERO N° PANDO)', '2do NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja Nacional de Salud '),
(900005, 5, 90101, 'HOSPITAL SEGUNDO NIVEL - HOSPITAL BOLIVIANO JAPONES DR. ROBERTO GALINDO TERAN', '2do NIVEL ', 'Público', 'U', 'H. Alcaldía Municipal'),
(900006, 5, 90101, 'C.S. AMBULATORIO - COBIJA', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900007, 5, 90101, 'CENTRO SALUD - C.S. CLÍNICA BURGOS', '1er NIVEL ', 'Organismos Privados  ', 'U', 'Privados Varios'),
(900008, 5, 90101, 'C.S. AMBULATORIO - VILLA BUSCH', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900009, 5, 90101, 'PUESTO DE SALUD - NUEVA ESPERANZA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900010, 5, 90101, 'CENTRO SALUD - C.S. SANIDAD FFAA', '1er NIVEL ', 'FF.AA. de la Nación  ', 'U', 'Por definir ( FFAA )'),
(900011, 5, 90101, 'PUESTO DE SALUD - NUEVO TRIUNFO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900012, 5, 90101, 'CENTRO SALUD - C.S. CAJA CORDES COBIJA', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja CORDES '),
(900013, 5, 90101, 'CENTRO SALUD - C.S. CAJA DE CAMINOS', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja de Caminos'),
(900014, 5, 90101, 'CENTRO SALUD - POLICLINICO COSSMIL COBIJA', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'COSSMIL  '),
(900015, 5, 90101, 'C.S. AMBULATORIO - MAPAJO', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900016, 5, 90102, 'C.S. AMBULATORIO - VILLA ROJAS', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900017, 5, 90102, 'C.S. AMBULATORIO - SAN MARTIN DE PORRES', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900018, 5, 90103, 'PUESTO DE SALUD - BOLPEBRA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900019, 5, 90103, 'C.S. CON INTERNACION - MUKDEN', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900020, 5, 90103, 'PUESTO DE SALUD - YAMINAGUAS', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900021, 5, 90103, 'C.S. CON INTERNACION - NAREUDA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900022, 5, 90104, 'PUESTO DE SALUD - SANTA RITA (KM 70)', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900023, 5, 90104, 'C.S. CON INTERNACION - CON CAMAS SANTA LUCIA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900025, 5, 90104, 'PUESTO DE SALUD - BELLA FLOR (V. AMAZONICA)', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900028, 87, 90201, 'C.S. INTEGRAL - HOSPITAL INTEGRAL COMUNITARIO PUERTO RICO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900030, 47, 90202, 'C.S. AMBULATORIO - LOMA VELARDE', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900031, 5, 90203, 'C.S. AMBULATORIO - FILADELFIA', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900032, 5, 90203, 'PUESTO DE SALUD - EMPRESINHA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900033, 5, 90203, 'C.S. AMBULATORIO - BUYUYO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900034, 5, 90203, 'C.S. CON INTERNACION - CHIVE', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900035, 47, 90301, 'C.S. AMBULATORIO - MIRAFLORES', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900036, 47, 90301, 'C.S. CON INTERNACION - GONZALO MORENO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900037, 47, 90301, 'C.S. AMBULATORIO - LAS PIEDRAS', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900038, 47, 90301, 'PUESTO DE SALUD - FRONTERA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900039, 47, 90301, 'C.S. CON INTERNACION - PORTACHUELO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900041, 87, 90302, 'PUESTO DE SALUD - BLANCA FLOR', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900042, 87, 90302, 'PUESTO DE SALUD - TRINIDASITO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900043, 87, 90302, 'PUESTO DE SALUD - GALILEA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900045, 87, 90303, 'C.S. AMBULATORIO - EL SENA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900047, 87, 90401, 'C.S. CON INTERNACION - SANTA ROSA - PANDO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900048, 87, 90401, 'C.S. CON INTERNACION - 1RO. DE MAYO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900049, 87, 90402, 'C.S. AMBULATORIO - HUMAITA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900050, 47, 90501, 'C.S. AMBULATORIO - NUEVA ESPERANZA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900051, 47, 90502, 'C.S. AMBULATORIO - LOMA ALTA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900053, 47, 90503, 'C.S. AMBULATORIO - RESERVA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900056, 87, 90303, 'PUESTO DE SALUD - PALMA REAL', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900057, 5, 90203, 'PUESTO DE SALUD - LUZ DE AMERICA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900058, 87, 90201, 'C.S. CON INTERNACION - CONQUISTA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900059, 47, 90501, 'PUESTO DE SALUD - ARCA DE ISRAEL', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900061, 47, 90502, 'C.S. AMBULATORIO - SANTA CRUSITO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900062, 5, 90104, 'PUESTO DE SALUD - SANTA LOURDES', '1er NIVEL ', 'Público', 'R', 'C.C.H. - (Ministerio)'),
(900063, 5, 90102, 'PUESTO DE SALUD - SAN JOSE', '1er NIVEL ', 'Público', 'R', 'C.C.H. - (Ministerio)'),
(900065, 47, 90202, 'PUESTO DE SALUD - VALPARAISO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900066, 47, 90502, 'PUESTO DE SALUD - SANTA FE', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900067, 47, 90301, 'C.S. AMBULATORIO - CONTRAVARICIA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900068, 5, 90101, 'C.S. AMBULATORIO - PETROLERO', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900071, 47, 90202, 'C.S. AMBULATORIO - TRES ESTRELLAS', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900072, 5, 90101, 'C.S. AMBULATORIO - CD-VIR / PANDO', '1er NIVEL ', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900073, 5, 90101, 'CENTRO SALUD - C.S. SEGURO UNIVERSITARIO (S.I.S.U.)', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Seguro Universitario '),
(900074, 5, 90101, 'CENTRO SALUD - C.S. CAJA PETROLERA', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja Petrolera '),
(900075, 87, 90402, 'PUESTO DE SALUD - INGAVI', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900076, 47, 90502, 'PUESTO DE SALUD - PERSEVERANCIA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900077, 5, 90101, 'CENTRO SALUD - C.S. CLINICA POLICIAL VIRGEN DE COPACABANA', '1er NIVEL ', 'Policia Nacional', 'U', 'Policia Nacional  '),
(900078, 5, 90203, 'PUESTO DE SALUD - SOBERANIA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900079, 5, 90104, 'C.S. AMBULATORIO - EL CARMEN', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900080, 47, 90501, 'PUESTO DE SALUD - PUERTO CONSUELO II', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900084, 47, 90301, 'C.S. AMBULATORIO - BUEN FUTURO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900085, 47, 90503, 'PUESTO DE SALUD - SAN MARTIN', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900086, 47, 90202, 'C.S. AMBULATORIO - FORTALEZA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900087, 47, 90502, 'PUESTO DE SALUD - ENAREWENA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900088, 47, 90301, 'C.S. AMBULATORIO - AGUA DULCE', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900089, 87, 90302, 'PUESTO DE SALUD - NARANJAL', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900090, 87, 90201, 'PUESTO DE SALUD - BATRAJA', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900092, 5, 90104, 'C.S. CON INTERNACION - PUERTO EVO', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900093, 5, 90101, 'BANCO DE SANGRE DE REFERENCIA DEPARTAMENTAL', 'Banco de Sangre', 'Público', 'U', 'Ministerio de Salud (Min.)'),
(900094, 87, 90401, 'C.S. AMBULATORIO - PUERTO MORALES', '1er NIVEL ', 'Público', 'R', 'Ministerio de Salud (Min.)'),
(900095, 87, 90302, 'C.S. CON INTERNACION - VISTA  ALEGRE', '1er NIVEL ', 'Público', 'R', 'H. Alcaldía Municipal'),
(900096, 5, 90101, 'POLICONSULTORIO - POLICONSULTORIO. CIMFA', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja Nacional de Salud '),
(900097, 47, 90501, 'PUESTO DE SALUD - P.S. TRES HERMANOS', '1er NIVEL ', 'Público', 'R', 'H. Alcaldía Municipal'),
(900098, 5, 90104, 'PUESTO DE SALUD - P.S.  MAPAJO', '1er NIVEL ', 'Público', 'R', 'H. Alcaldía Municipal'),
(900099, 5, 90101, 'C.S. INTEGRAL - CLINICA UNEDI S.R.L.', '1er NIVEL ', 'Organismos Privados  ', 'U', 'Privados Varios'),
(900100, 5, 90101, 'C.S. INTEGRAL - CLINICA INTEGRAMEDICA', '1er NIVEL ', 'Organismos Privados  ', 'U', 'Privados Varios'),
(900101, 87, 90303, 'PUESTO DE SALUD - GIRADO', '1er NIVEL ', 'Público', 'R', 'H. Alcaldía Municipal'),
(900102, 5, 90101, 'CENTRO DE AISLAMIENTO - COVID-19 PERLA DEL ARCE', '1er NIVEL ', 'Público', 'U', 'Gobernacion '),
(900103, 5, 90101, 'C.S. CON INTERNACION - HOSPITAL COVID-19 DR. HERNAN MESSUTI RIVERA', '1er NIVEL ', 'Público', 'U', 'C.C.H. - (Ministerio)'),
(900111, 5, 90101, 'POLICONSULTORIO - POLICONSULTORIO DIVINO NIÑO', '1er NIVEL ', 'Organismos Privados  ', 'U', 'Privados Varios'),
(900112, 5, 90104, 'POLICONSULTORIO - CAJA DE SALUD DE LA BANCA PRIVADA REGIONAL COBIJA', '1er NIVEL ', 'Seguridad Social (CAJAS)', 'U', 'Caja Bancaria  ');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tratamiento`
--

INSERT INTO `tratamiento` (`id`, `datos_personales_id`, `tto_anterior`, `anterior_multibacilar`, `anterior_paucibacilar`, `actual_multibacilar`, `actual_paucibacilar`, `actual_fecha_inicio`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-06-01', '2021-07-10 21:26:41', '2021-07-10 21:26:41'),
(2, 1, 'Abandono', NULL, NULL, 'Si', 'Si', '2021-06-01', '2021-07-10 21:27:08', '2021-07-10 21:27:08'),
(3, 1, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-05', '2021-07-11 12:55:47', '2021-07-11 12:55:47'),
(4, 1, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-05', '2021-07-11 14:45:03', '2021-07-11 14:45:03'),
(5, 3, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 15:10:30', '2021-07-11 15:10:30'),
(6, 4, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 15:48:03', '2021-07-11 15:48:03'),
(7, 5, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 15:56:22', '2021-07-11 15:56:22'),
(8, 6, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 15:58:43', '2021-07-11 15:58:43'),
(9, 7, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 16:00:38', '2021-07-11 16:00:38'),
(10, 8, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 16:01:08', '2021-07-11 16:01:08'),
(11, 9, 'Abandono', 'Si', 'Si', 'Si', 'Si', '2021-07-07', '2021-07-11 16:10:34', '2021-07-11 16:10:34'),
(12, 10, 'Ninguno', 'Si', NULL, 'Si', NULL, '2021-07-07', '2021-07-12 02:16:18', '2021-07-12 02:16:18'),
(13, 11, 'Ninguno', 'Si', NULL, 'Si', NULL, '2021-07-07', '2021-07-12 02:17:51', '2021-07-12 02:17:51'),
(14, 13, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:11:49', '2021-07-12 05:11:49'),
(15, 14, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:13:36', '2021-07-12 05:13:36'),
(16, 18, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-12 05:52:46', '2021-07-12 05:52:46'),
(17, 19, 'Ninguno', 'Si', NULL, 'Si', NULL, '2021-07-07', '2021-07-12 16:47:33', '2021-07-12 16:47:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `rememberToken` varchar(250) DEFAULT NULL,
  `timestamps` varchar(250) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `rememberToken`, `timestamps`, `updated_at`, `created_at`) VALUES
(1, 'jhilmar', 'jhilmar.e.f@gmail.com', 'administrador', NULL, '$2y$10$kHB.6iF14Pq3n1ZKdOdIr.mAEiRYK6wmq8xjPjKMvHl1hQ5bRxSyi', NULL, NULL, '2021-07-07 17:12:57', '2021-07-07 17:12:57'),
(2, 'Juan Jose', 'juanjosef@yopmail.com', 'ejecutivo', NULL, '$2y$10$SDo.Era.H0CdawDNMHM73e9UP5qEsh0JaonN6uibmyL8OwLbx5Ts6', NULL, NULL, '2021-07-09 01:33:38', '2021-07-09 01:33:38'),
(3, 'Edie Gutierrez', 'edie@yopmail.com', 'operativo', NULL, '$2y$10$wURBMVUQUfU8DAwPOfHDvukd4DcLOi0pUysml7vGGDqKFhO2rI7MK', NULL, NULL, '2021-07-09 01:47:55', '2021-07-09 01:47:55');

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
-- Filtros para la tabla `red_salud`
--
ALTER TABLE `red_salud`
  ADD CONSTRAINT `fk_red_salud_sedes1` FOREIGN KEY (`sedes_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `residencia_anterior`
--
ALTER TABLE `residencia_anterior`
  ADD CONSTRAINT `fk_recidencia_anterior_datos_personales1` FOREIGN KEY (`datos_personales_id`) REFERENCES `datos_personales` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_recidencia_anterior_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio_salud`
--
ALTER TABLE `servicio_salud`
  ADD CONSTRAINT `fk_servicio_salud_municipio1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
