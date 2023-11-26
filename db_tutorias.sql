-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 26-11-2023 a las 07:20:16
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tutorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(100) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `matricula` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `genero` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `id_grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_grupoMaster` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `apellidop`, `apellidom`, `matricula`, `correo`, `telefono`, `fecha_nac`, `ciudad`, `genero`, `created_at`, `updated_at`, `id_grupo`) VALUES
(1, 'LUIS SANTIAGO', 'NOH', 'CAHUM', '19070049', 'santiagocahum25@gmail.com', '9851142361', '2001-07-25', 'Tixcacalcupul', 0, '2023-11-19 21:32:19', '2023-11-19 21:32:19', 1),
(2, 'JESUS ISRAEL', 'GAMBOA', 'AKE', '19070050', '.', '9851013456', '2000-12-23', '.', 0, '2023-11-19 21:32:19', '2023-11-19 21:32:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matricula` varchar(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidop` varchar(50) NOT NULL,
  `apellidom` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `matricula`, `nombres`, `apellidop`, `apellidom`, `correo`, `telefono`, `curp`, `fecha_nac`, `ciudad`) VALUES
(1, 'ger', 'Luis Santiago', 'Noh Cahum', 'noh', 'l12', '9851142361', 'tyjrjk', '2001-07-25', 'tix'),
(2, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(3, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(4, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(5, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(6, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(7, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(8, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(9, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(10, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(11, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(12, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(13, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(14, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(15, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(16, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(17, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(18, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(19, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(20, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(21, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(22, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(23, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(24, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(25, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(26, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(27, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(28, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(29, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(30, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(31, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(32, '19070049', 'Example', 'Data Imp', 'e1', 'santi@gmail.com', '987654323', 'tfghvmbkn', '2022-12-21', 'tixca'),
(33, '19070067', 'Example', 'Data Imp', 'e2', 'samtiago@gmail.com', '9851089786', 'LSNC208976HYNHHSA0', '2022-05-11', 'Tixcacalcupul'),
(34, 'CAHUM', '19070049', 'LUIS SANTIAGO', 'NOH', 'santiagocahum25@gmail.com', '9851142361', '0', '2001-07-25', 'Tixcacalcupul'),
(35, 'AKE', '19070050', 'JESUS ISRAEL', 'GAMBOA', '.', '9851013456', '0', '2000-12-23', '.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Admin', '9', 1694442604);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1694441822, 1694441822),
('Admin', 1, 'Administrador con con todos los privilegios', NULL, NULL, 1694442495, 1694442495),
('All', 2, 'Acceso completo al sistema', NULL, NULL, 1694442207, 1694442207);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('All', '/*'),
('Admin', 'All');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'INGENIERIA EN SISTEMAS COMPUTACIONALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciclo_escolar`
--

DROP TABLE IF EXISTS `ciclo_escolar`;
CREATE TABLE IF NOT EXISTS `ciclo_escolar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo_escolar`
--

INSERT INTO `ciclo_escolar` (`id`, `nombre`, `created_at`, `updated_at`, `fecha_inicial`, `fecha_final`, `id_estatus`) VALUES
(1, 'CICLO 2023-2024', '2023-11-05 08:11:48', '2023-11-05 08:32:30', '2023-08-30', '2024-06-19', 1),
(2, 'CICLO 2022-2023', '2023-11-05 10:29:34', '2023-11-05 17:19:48', '2022-08-17', '2023-06-07', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

DROP TABLE IF EXISTS `estatus`;
CREATE TABLE IF NOT EXISTS `estatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `nombre`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_letra`
--

DROP TABLE IF EXISTS `grupo_letra`;
CREATE TABLE IF NOT EXISTS `grupo_letra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letra_key` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_letra`
--

INSERT INTO `grupo_letra` (`id`, `letra_key`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_master`
--

DROP TABLE IF EXISTS `grupo_master`;
CREATE TABLE IF NOT EXISTS `grupo_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_periodo` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_semestre` int(11) NOT NULL,
  `id_grupoLetra` int(11) NOT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_periodo` (`id_periodo`),
  KEY `idx_carrera` (`id_carrera`),
  KEY `idx_semestre` (`id_semestre`),
  KEY `idx_grupoLetra` (`id_grupoLetra`),
  KEY `idx_tutor` (`id_tutor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_master`
--

INSERT INTO `grupo_master` (`id`, `id_periodo`, `id_carrera`, `id_semestre`, `id_grupoLetra`, `id_tutor`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 1, 3, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letra_periodo`
--

DROP TABLE IF EXISTS `letra_periodo`;
CREATE TABLE IF NOT EXISTS `letra_periodo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `letra_key` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1631145764),
('m130524_201442_init', 1631145776),
('m190124_110200_add_verification_token_column_to_user_table', 1631145777),
('m140506_102106_rbac_init', 1694410726),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1694410726),
('m180523_151638_rbac_updates_indexes_without_prefix', 1694410726),
('m200409_110543_rbac_update_mssql_trigger', 1694410726);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo_escolar`
--

DROP TABLE IF EXISTS `periodo_escolar`;
CREATE TABLE IF NOT EXISTS `periodo_escolar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `letra_periodo` varchar(2) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `id_ciclo` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_ciclo` (`id_ciclo`),
  KEY `id_estatus` (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo_escolar`
--

INSERT INTO `periodo_escolar` (`id`, `nombre`, `id_estatus`, `letra_periodo`, `date_start`, `date_end`, `id_ciclo`, `created_at`, `updated_at`) VALUES
(1, '2023B', 1, 'B', '2023-08-30', '2023-12-22', 1, '2023-11-05 15:02:09', '2023-11-19 17:05:50'),
(3, '2022B', 2, 'B', '2022-08-31', '2022-12-23', 2, '2023-11-05 17:17:49', '2023-11-05 17:17:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(45) DEFAULT NULL,
  `rol_valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `rol_nombre`, `rol_valor`) VALUES
(1, 'Usuario', 10),
(2, 'Admin', 100),
(4, 'Capturista', 20),
(10, 'Coordinador', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `num_semestre` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semestre`
--

INSERT INTO `semestre` (`id`, `nombre`, `num_semestre`) VALUES
(1, 'PRIMER SEMESTRE', 1),
(2, 'SEGUNDO SEMESTRE', 2),
(3, 'TERCER SEMESTRE', 3),
(4, 'CUARTO SEMESTRE', 4),
(5, 'QUINTO SEMESTRE', 5),
(6, 'SEXTO SEMESTRE', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

DROP TABLE IF EXISTS `tutor`;
CREATE TABLE IF NOT EXISTS `tutor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `genero` int(11) NOT NULL,
  `id_user` smallint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `genero`, `id_user`) VALUES
(1, 'LUIS SANTIAGO', 'NOH CAHUM', 'l19070049@valladolid.tecnm.mx', '9851142361', 0, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE IF NOT EXISTS `tutores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(75) NOT NULL,
  `apellido` varchar(75) NOT NULL,
  `correo` varchar(75) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `fecha_nac` varchar(75) NOT NULL,
  `update_date` varchar(75) NOT NULL,
  `created_date` varchar(75) NOT NULL,
  `genero` varchar(75) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutores`
--

INSERT INTO `tutores` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `fecha_nac`, `update_date`, `created_date`, `genero`) VALUES
(1, 'Luis Santiago', 'Noh Cahum', 'fvrh', '9851142361', 'theyh', '2023-10-03 12:04:47', '2023-10-03 12:04:47', 'fgh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` smallint(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(9, 'root', 'El4u2OFmro6HdVohznDGhv45RhYiBoe8', '$2y$13$b3MlkEF5WmnTFIfdTzyTV.XTSCttIOBcKInVnAp9GlkDPZ0hFas0C', NULL, 'rusell.im@valladolid.tecnm.mx', 10, 1653351873, 1653351873, 'QnphEMrAbjb3aM5EGodGe7pCW1PPuhsl_1653351873'),
(11, 'luis.nc', 'm3XEmH6t_-_cyYRFoZywJ_rNP5IF1-rI', '$2y$13$TY5V6KQV1IkBBYd5ldZPNeqlmxC76/QPZR0KrVAEwjLqObF2txBjG', NULL, 'l19070049@valladolid.tecnm.mx', 9, 1700430159, 1700452464, 'Iv7z2nBrWJkL65PR8Ec6O6uO7_ryGXd6_1700430159');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `fk_idGrupoMaster` FOREIGN KEY (`id_grupo`) REFERENCES `grupo_master` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  ADD CONSTRAINT `fk_Estatus_idEstatus` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_master`
--
ALTER TABLE `grupo_master`
  ADD CONSTRAINT `fk_IdCarrera` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IdGrupoLetra` FOREIGN KEY (`id_grupoLetra`) REFERENCES `grupo_letra` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IdPeriodo` FOREIGN KEY (`id_periodo`) REFERENCES `periodo_escolar` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IdSemestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IdTutor` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  ADD CONSTRAINT `fk_idCiclo` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo_escolar` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idEstatus` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_IdUsername` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
