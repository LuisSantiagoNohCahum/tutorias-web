-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 11-12-2023 a las 03:36:01
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombres`, `apellidop`, `apellidom`, `matricula`, `correo`, `telefono`, `fecha_nac`, `ciudad`, `genero`, `created_at`, `updated_at`, `id_grupo`) VALUES
(3, 'LUIS SANTIAGO', 'NOH', 'CAHUM', '19070049', 'santiagocahum25@gmail.com', '9851142361', '2001-07-25', 'Tixca', 0, '2023-12-03 15:10:22', '2023-12-10 18:18:45', 1),
(4, 'JESUS ISRAEL', 'GAMBOA', 'AKE', '19070050', '.', '9851013456', '2000-12-23', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(5, 'ROGER DAVID', 'ABAN', 'KU', '19070051', 'santiagocahum25@gmail.com', '9851013456', '2000-12-24', '.', 0, '2023-12-03 15:10:22', '2023-12-10 18:18:17', 1),
(6, 'EDUARDO', 'TEC', 'CANCHE', '19070052', '.', '9851013456', '2000-12-25', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(7, 'LUIS ANGEL', 'NOH', 'UH', '19070053', '.', '9851013456', '2000-12-26', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(8, 'RIGER', 'CHI', 'GOMEZ', '19070054', '.', '9851013456', '2000-12-27', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(9, 'JOSE EMMANUEL', 'ESPADAS', 'ARCEO', '19070055', '.', '9851013456', '2000-12-28', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(10, 'MAURICIO', 'BALAM', 'SALVADOR', '19070056', '.', '9851013456', '2000-12-29', '.', 0, '2023-12-03 15:10:22', '2023-12-03 15:10:22', 1),
(12, 'LUIS SANTIAGO', 'NOH', 'CAHUM', '19070049', 'santiagocahum25@gmail.com', '9851142361', '2001-07-25', 'Tixcacalcupul', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(13, 'JESUS ISRAEL', 'GAMBOA', 'AKE', '19070050', '.', '9851013456', '2000-12-23', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(14, 'ROGER DAVID', 'ABAN', 'KU', '19070051', '.', '9851013456', '2000-12-24', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(15, 'EDUARDO', 'TEC', 'CANCHE', '19070052', '.', '9851013456', '2000-12-25', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(16, 'LUIS ANGEL', 'NOH', 'UH', '19070053', '.', '9851013456', '2000-12-26', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(17, 'RIGER', 'CHI', 'GOMEZ', '19070054', '.', '9851013456', '2000-12-27', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(18, 'JOSE EMMANUEL', 'ESPADAS', 'ARCEO', '19070055', '.', '9851013456', '2000-12-28', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(19, 'MAURICIO', 'BALAM', 'SALVADOR', '19070056', '.', '9851013456', '2000-12-29', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3),
(20, 'JHONATHAN', 'NOH', 'HERNANDEZ', '19070057', '.', '9851013456', '2000-12-30', '.', 0, '2023-12-03 19:49:34', '2023-12-03 19:49:34', 3);

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
('admin', '12', 1701447599),
('admin', '9', 1694442604),
('tutor', '11', 1701109434);

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
('/ciclo-escolar/create', 2, NULL, NULL, NULL, 1701109223, 1701109223),
('/ciclo-escolar/delete', 2, NULL, NULL, NULL, 1701109223, 1701109223),
('/ciclo-escolar/index', 2, NULL, NULL, NULL, 1701109223, 1701109223),
('/ciclo-escolar/update', 2, NULL, NULL, NULL, 1701109223, 1701109223),
('/ciclo-escolar/view', 2, NULL, NULL, NULL, 1701109223, 1701109223),
('/gii/*', 2, NULL, NULL, NULL, 1701123881, 1701123881),
('/pat/index', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/semana-real/create', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/semana-real/delete', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/semana-real/update', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/semana/detail-add-semana-real', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/semana/view', 2, NULL, NULL, NULL, 1701132157, 1701132157),
('/semana/view-add-semana', 2, NULL, NULL, NULL, 1701131244, 1701131244),
('/tutor/index', 2, NULL, NULL, NULL, 1701124042, 1701124042),
('/tutor/update', 2, NULL, NULL, NULL, 1701124042, 1701124042),
('/tutor/view', 2, NULL, NULL, NULL, 1701124042, 1701124042),
('admin', 1, 'Administrador con con todos los privilegios', NULL, NULL, 1694442495, 1694442495),
('All', 2, 'Acceso completo al sistema', NULL, NULL, 1694442207, 1694442207),
('PTutor', 2, 'Permiso para el tutor', NULL, NULL, 1701109263, 1701109263),
('tutor', 1, 'Rol para los tutores registrados en el sistema', NULL, NULL, 1701109342, 1701109342);

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
('PTutor', '/gii/*'),
('PTutor', '/pat/index'),
('PTutor', '/semana-real/create'),
('PTutor', '/semana-real/delete'),
('PTutor', '/semana-real/update'),
('PTutor', '/semana/detail-add-semana-real'),
('PTutor', '/semana/view'),
('PTutor', '/semana/view-add-semana'),
('PTutor', '/tutor/index'),
('PTutor', '/tutor/update'),
('PTutor', '/tutor/view'),
('admin', 'All'),
('tutor', 'PTutor');

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
-- Estructura de tabla para la tabla `canalizacion`
--

DROP TABLE IF EXISTS `canalizacion`;
CREATE TABLE IF NOT EXISTS `canalizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estatus` int(11) NOT NULL,
  `asunto` text NOT NULL,
  `cuerpo` text NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `canalizacion`
--

INSERT INTO `canalizacion` (`id`, `estatus`, `asunto`, `cuerpo`, `id_alumno`, `created_at`, `updated_at`) VALUES
(3, 1, '<p>Ninguno</p>', '<p>Ninguno</p>', 10, '2023-12-10 18:05:31', '2023-12-10 18:09:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

DROP TABLE IF EXISTS `carreras`;
CREATE TABLE IF NOT EXISTS `carreras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`) VALUES
(1, 'INGENIERIA EN SISTEMAS COMPUTACIONALES'),
(2, 'INGENIERIA EN ADMINISTRACION'),
(3, 'INGENIERIA CIVIL'),
(4, 'INGENIERIA INDUSTRIAL'),
(5, 'INGENIERIA AMBIENTAL'),
(6, 'INGENIERIA EN GESTION EMPRESARIAL');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciclo_escolar`
--

INSERT INTO `ciclo_escolar` (`id`, `nombre`, `created_at`, `updated_at`, `fecha_inicial`, `fecha_final`, `id_estatus`) VALUES
(1, 'CICLO 2023-2024', '2023-11-05 08:11:48', '2023-12-10 18:45:32', '2023-08-30', '2024-06-19', 2),
(2, 'CICLO 2022-2023', '2023-11-05 10:29:34', '2023-11-05 17:19:48', '2022-08-17', '2023-06-07', 2),
(3, 'CICLO 2024-2025', '2023-12-09 21:13:30', '2023-12-09 21:13:30', '2024-08-01', '2025-07-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterios`
--

DROP TABLE IF EXISTS `criterios`;
CREATE TABLE IF NOT EXISTS `criterios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `criterios`
--

INSERT INTO `criterios` (`id`, `nombre`) VALUES
(1, '<p>CUMPLE TIEMPO Y FORMA CON LAS ACTIVIDADES ENCOMENDADAS&nbsp;EN EL LLENADO CORRECTO DE&nbsp;LA FICHA DE EXPEDIENTE EN LÍNEA.</p>'),
(2, '<p>TRABAJA EN EQUIPO Y SE ADAPTA A NUEVAS SITUACIONES<br></p>'),
(3, '<p>MUESTRA LIDERAZGO EN LAS ACTIVIDADES ENCOMENDADAS&nbsp;<br></p>'),
(4, '<p>EVALUA A SU TUTOR (A) EN LAS FECHAS ESTABLECIDAS POR LA COORDINACIÓN EN TIEMPO Y EN FORMA&nbsp; &nbsp;ORGANIZA SU TIEMPO Y TRABAJA DE MANERA PROACTIVA<br></p>'),
(5, '<p>INTERPRETA LA REALIDAD Y SE SENSIBILIZA APORTANDO SOLUCIONES A LA PROBLEMÁTICA CON LA ACTIVIDAD COMPLEMENTARIA</p>'),
(6, '<p>REALIZA SUGERENCIAS INNOVADORA PARA BENEFICIO O MEJORA DEL PROGRAMA CUMPLE&nbsp;PARTICIPANDO EN LAS SESIONES GRUPALES E INDIVIDUALES&nbsp;</p>'),
(7, '<p>TIENE INICIATIVA PARA AYUDAR EN LAS ACTIVIDADES ENCOMENDADAS Y MUESTRA ESPÍRITU DE SERVICIO&nbsp;Y MANTUVO LIMPIA SU AULA</p>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

DROP TABLE IF EXISTS `diagnostico`;
CREATE TABLE IF NOT EXISTS `diagnostico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) NOT NULL,
  `motivo` int(11) NOT NULL,
  `asignaturas` text NOT NULL,
  `otro` text NOT NULL,
  `especifique` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_alumno` (`id_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`id`, `id_alumno`, `motivo`, `asignaturas`, `otro`, `especifique`) VALUES
(1, 3, 2, '<ul><li>Programacion orientada a objetos</li><li>Programacion Funcional</li></ul>', '<p>Ninguna&nbsp;</p>', '<p>Ninguna</p>'),
(2, 4, 2, '<ul><li>Algebra Lineal</li><li>Ecuaciones diferenciales</li><li>Calculo Integral</li></ul>', '<p>No participo en actividad complementaria</p>', '<p>Ninguna</p>'),
(6, 9, 4, '<ul><li>Lenguajes y autómatas I</li></ul>', '<p>Ninguna</p>', '<p>Ninguna</p>'),
(7, 5, 1, '<ul><li>Agregado hoy</li></ul>', '<p>Ninguna</p>', '<p>Ninguna</p>');

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
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calificacion` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_criterio` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_alumno` (`id_alumno`),
  KEY `idx_criterio` (`id_criterio`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `calificacion`, `id_alumno`, `id_criterio`) VALUES
(15, 4, 5, 1),
(16, 4, 5, 2),
(17, 4, 5, 3),
(18, 4, 5, 4),
(19, 4, 5, 5),
(20, 4, 5, 6),
(21, 4, 5, 7),
(22, 1, 10, 1),
(23, 1, 10, 2),
(24, 0, 10, 3),
(25, 2, 10, 4),
(26, 1, 10, 5),
(27, 2, 10, 6),
(28, 0, 10, 7),
(29, 3, 8, 1),
(30, 3, 8, 2),
(31, 1, 8, 3),
(32, 4, 8, 4),
(33, 0, 8, 5),
(34, 0, 8, 6),
(35, 0, 8, 7),
(36, 4, 9, 1),
(37, 4, 9, 2),
(38, 2, 9, 3),
(39, 2, 9, 4),
(40, 0, 9, 5),
(41, 4, 9, 6),
(42, 0, 9, 7),
(43, 4, 4, 1),
(44, 2, 4, 2),
(45, 0, 4, 3),
(46, 4, 4, 4),
(47, 2, 4, 5),
(48, 0, 4, 6),
(49, 0, 4, 7),
(50, 1, 3, 1),
(51, 0, 3, 2),
(52, 0, 3, 3),
(53, 0, 3, 4),
(54, 0, 3, 5),
(55, 0, 3, 6),
(56, 0, 3, 7),
(64, 3, 7, 1),
(65, 3, 7, 2),
(66, 3, 7, 3),
(67, 3, 7, 4),
(68, 3, 7, 5),
(69, 3, 7, 6),
(70, 0, 7, 7),
(71, 4, 6, 1),
(72, 4, 6, 2),
(73, 4, 6, 3),
(74, 4, 6, 4),
(75, 3, 6, 5),
(76, 4, 6, 6),
(77, 0, 6, 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grupo_master`
--

INSERT INTO `grupo_master` (`id`, `id_periodo`, `id_carrera`, `id_semestre`, `id_grupoLetra`, `id_tutor`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 1, 1, 3, 1, NULL),
(3, 4, 1, 1, 1, NULL);

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
-- Estructura de tabla para la tabla `pat`
--

DROP TABLE IF EXISTS `pat`;
CREATE TABLE IF NOT EXISTS `pat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_semestre` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `estatus` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_semestre` (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pat`
--

INSERT INTO `pat` (`id`, `id_semestre`, `nombre`, `descripcion`, `estatus`) VALUES
(1, 1, 'PAT PRIMER SEMESTRE', 'V1 PAT PARA LOS PRIMEROS SEMESTRES DE TODAS LAS INGENIERIAS', 1),
(3, 1, 'PAT PRIMER SEMESTRE V3', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `performance`
--

DROP TABLE IF EXISTS `performance`;
CREATE TABLE IF NOT EXISTS `performance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `eDesempeño` int(11) NOT NULL,
  `bDesempeño` int(11) NOT NULL,
  `arDesempeño` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_grupo` (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `performance`
--

INSERT INTO `performance` (`id`, `id_grupo`, `eDesempeño`, `bDesempeño`, `arDesempeño`) VALUES
(9, 1, 20, 6, 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `periodo_escolar`
--

INSERT INTO `periodo_escolar` (`id`, `nombre`, `id_estatus`, `letra_periodo`, `date_start`, `date_end`, `id_ciclo`, `created_at`, `updated_at`) VALUES
(1, '2023B', 1, 'B', '2023-08-30', '2023-12-22', 1, '2023-11-05 15:02:09', '2023-12-03 19:50:39'),
(3, '2022B', 2, 'B', '2022-08-31', '2022-12-23', 2, '2023-11-05 17:17:49', '2023-11-05 17:17:49'),
(4, '2024A', 2, 'A', '2024-01-03', '2024-06-01', 1, '2023-12-03 19:48:06', '2023-12-03 19:50:50');

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
-- Estructura de tabla para la tabla `semana`
--

DROP TABLE IF EXISTS `semana`;
CREATE TABLE IF NOT EXISTS `semana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_semana` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_tutoria` int(11) NOT NULL,
  `tematica` text NOT NULL,
  `objetivos` text NOT NULL,
  `justificacion` text NOT NULL,
  `estrategias_tutor` text NOT NULL,
  `acciones` text NOT NULL,
  `estrategias_tutorado` text,
  `id_pat` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_pat` (`id_pat`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semana`
--

INSERT INTO `semana` (`id`, `num_semana`, `nombre`, `tipo_tutoria`, `tematica`, `objetivos`, `justificacion`, `estrategias_tutor`, `acciones`, `estrategias_tutorado`, `id_pat`) VALUES
(1, 1, 'SEMANA 1', 0, '<p>Bienvenida, presentación por parte del Tutor, Actualización del Expediente.&nbsp;</p><p><font style=\"background-color: rgb(255, 255, 0);\" color=\"#ff0000\"><b>SESIÓN PRESENCIAL CON EL TUTOR PASAR LISTA</b></font></p>', '<p>El docente contactará y se organiganizará con los alumnos para poder brindarles instrucciones&nbsp; de la actualización del Expediente y proporcionarles información relevante a traves del jefe de grupo o por medio de una aplicación web, whatsapp, meet etc..&nbsp;<br></p>', '<p>Es de suma importancia que los alumnos se sientan acompañados a través de su ciclo escolar ya que por eso se les asigna un tutor por grupo y asi los tutores juegan un papel importante como guias, ya que un tutor es necesario en el crecimiento del perfil estudiantil. El tutor tiene la obligación de estar pendiente de cada alumno y transmitirle motivación de continuar día a día cosntruyendo juntos un futuro agradable.<br></p>', '<p>Contactarse con el&nbsp; grupo del salón ó de preferencia con todo el grupo de manera presencial&nbsp; ó a través de una herramienta de redes sociales, para poder brindarle información. Integrar al grupo de una manera amable y coordial.</p><p>Proporcionar Información relevante a los alumnos.PASAR LISTA Y CORROBORAR CON SUS MAESTROS SI ALGUN ALUMNO ESTA FALTANDO O NO SE ESTA CONECTANDO</p>', '<p>El docente se presentó o conectó con el grupo para darles la instrucción y ellos puedan realizar la actualización del expediente, posteriormente se contacto con el jefe de grupo correspondiente para poder enviarle la informarle de noticias relevantes acerca del programa de tutorias, del cual&nbsp;el jefe de grupo se los compartio a sus compañeros de tal modo se estuvo monitoriando con cada uno para poder tener su confirmación de recibido y actualización de su expediente.<br></p>', '<ul><li>Responder en tiempo y en forma para su confirmación de haberse enterado de la información dadá por el tutor&nbsp; a través de un medio de Tecnología.</li><li>Participar&nbsp; y Estar puntual cuando los (as) citen. En Linea y actualizar su expediente</li><li>Participación</li></ul>', 1),
(2, 2, 'SEMANA 2', 0, '<p>Actualización del Expediente.&nbsp;</p><p><font style=\"background-color: rgb(255, 255, 0);\" color=\"#ff0000\"><b>SESIÓN PRESENCIAL CON EL TUTOR PASAR LISTA</b></font></p>', '<p>El docente asigando como tutor se&nbsp; presentará ó pondrá en contacto a través de una aplicación web con su grupo correspondiente para darle seguimiento a la actualización del expediente, motivarlos y brindarles información neesaria del perfil del tutor&nbsp; &nbsp;&nbsp;<br></p>', '<p>Contar con información actualizada del estudiante, a través de los formularios en línea y a su vez poder contactarlos cuando se requiera por los departamentos de psicología, trayectoría académica, la coordinación o sus tutores.</p><p>Cabe mencionar que es obligatorio que el alumno llene su expediente de manera correcta y completa, de tal forma que si no lo hace, no será liberado del semestre de manera automática.</p>', '<p>Darle seguimiento y que los alumnos actualicen sus expedientes, Brindarle información necesaria del perfil del tutor. PASAR LISTA Y CORROBORAR CON SUS MAESTROS SI ALGUN ALUMNO ESTA FALTANDO O NO SE ESTA CONECTANDO<br></p>', '<p>El docente se presentará&nbsp; en su sesión, de manera f´´isica o virtual&nbsp; a través de una Video Conferencia por medio de la aplicación google meet&nbsp; para transmitir y explicar&nbsp; a los alumnos como realizará la actualización del expediente en la página del Tecnológico Nacional de México Campus Valladolid, los pasos son los siguientes</p><p>Entran a la página principal del ITSVA,&nbsp; en la pestaña estudiantes,&nbsp; pestaña tutoría y&nbsp; actualizar expediente en el link, tienen que tener su correo institucional y su clave es muy importante.&nbsp; Se realizó una captura de pantalla para tener evidencia de la tutoría.&nbsp; &nbsp;</p>', '<p>SE PASARÁN LAS DIAPOSTIVAS FORMADOR DE FORMADORES Y REALIZARAN LOS ALUMNOS EL EJERCICIO, EL MATERIAL ESTA EL EL DRIVE&nbsp;<br></p>', 1),
(3, 3, 'SEMANA 3', 0, '<p>Difusión de&nbsp; tutoría, psicologia Trayectoria, Reforzamiento, Talento Emprendedor, Curso Mooc, Modelo de Educación Dual y Bolsa de Trabajo&nbsp;(video o diapositivas que compartiran&nbsp;Las responsables son las encargadas de difundir la información de la sesión.&nbsp;NO HAY SESIÓN VIRTUAL CON EL TUTOR&nbsp;&nbsp;</p>', '<p>Dar a conocer&nbsp; el programa tutoría,&nbsp; asesorías de reforzamiento, psicología y trayectoria académica&nbsp; y&nbsp; a las responsables, adjunto al catálogo de maestros que apoyarán a dicho programa, la presentación de las responsables del área de psicología.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p><p>Explicar de manera clara y detallada el formato de liberación del semestre al tutorado(a)&nbsp;</p>', '<p>Es importante que el alumno conozca los servicios que brinda la institución sobre todo en el área académica, ya que podría ser una herramienta de apoyo en el reforzamiento&nbsp; de alguna materia que esté reprobando o que requiera ayuda.</p><p>De la misma manera que conozca las actividades que realizan los departamentos de psicología y Trayectoria académica y acudir a ellas cuando lo requiera.</p>', '<p>Que el alumno conozca los programas y utilizar los servicios cuando lo requiera.</p><p>Que el alumno conozca los lineamientos del formado de evaluación para poder liberarlo el semestre.&nbsp; &nbsp;&nbsp;</p><p>Todos los alumnos se conectarán en la fecha que se les proporcionará, adjuntando el horario y el enlace se encontrará en la sección de tutorías de la página de la institución. PASAR LISTA Y CORROBORAR CON SUS MAESTROS SI ALGUN ALUMNO ESTA FALTANDO O NO SE ESTA CONECTANDO</p>', '<p>Se presentó&nbsp; a través de una Video Conferencia por medio del google meet el programa de tutorías, reforzamiento académico y psicología, Talendo emprendedor, curso Mooc, Modelos de Educación Dual y Bolsa de Trabajo, en donde se les explicó a los alumnos la manera en cómo opera dichos programas.&nbsp;<span style=\"font-size: 1rem;\">La coordinadora de tutoría&nbsp; compartió información a todos los jefes de grupo y alumnos.&nbsp;</span><span style=\"font-size: 1rem;\">Al final se realizó una serie de preguntas y aclaración de dudas.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</span></p>', '<ul><li>Asistencia</li><li>Puntualidad</li><li>Participación</li></ul>', 1),
(4, 7, 'SEMANA 7', 0, '<p>Competencias laborales<br></p>', '<p>Fomentar las competencias que un profesionista en el área de ingeniería debe tener para ejecutar tareas efectivas.<br></p>', '<p>Actualmente el modelo de educación de educación superior esta basado en el modelo educativo del XXI formación y desarrollo de competencias profesionales razón de ser del tema de esta sesión aunado al deseo del estudiante en conocer más sobre su carrera y en especial para fortalecer los esfuerzos que día a día se lleva en cada una de las temáticas de los planes de estudio, únicamente que desde el área tutorias estas competencias se han de fomentar con diversas herramientas de trabajo.<br></p>', '<p>Se analiza el perfil de egreso del tutorado previamente y se planea en base a las oportunidades y debilidades del grupo, para ello el tutor puede elegir varias opciones por ejemplo, trabajar sobre las competencias que requieren mayor atención o reforzar los que ya se tienen, o iniciar las que no se tiene&nbsp; aún.<br></p>', '<p>El tutor presenta el material y analiza cada estudiante a qué nivel tiene estos rasgos elaborando en su libreta de apuntes una lista de verificación para autoevaluarse, también describe acciones que requiere reforzar y su opinión sobre la utilidad de la información para su formación profesional. Los datos de costumbre, nombre fecha, carrera semestre y grupo para evidencia, se comparte y esta actividad puede ser al aire libre, el tutor puede solicitar al departamento de tutoría el material impreso.<br></p>', '<ul><li>Asistencia</li><li>Puntualidad</li><li>Participación</li></ul>', 1),
(5, 12, 'SEMANA 12', 0, '<p>Introspección / empatía<br></p>', '<p>Reflexionar sobre los comportamientos del día a día en el rol que el estudiante desempeña y principalmente en su actual vida académica, para coadyuvar el logro de sus objetivos profesionales.&nbsp;<br></p>', '<p>La introspección es útil para reflexionar sobre lo que se puede mejorar y para qué.&nbsp; Permitirá identificar patrones y etapas (capítulos) de su vida hasta el día de hoy. Identifica lo que tiene que construir en el siguiente capítulo de su vida. Tomar conciencia de qué recursos, capacidades y cualidades conforman sus fortalezas principales. Identifica qué es lo que está frenando e imponiendo límites en el siguiente capítulo de su vida. Tener claridad sobre los recursos, capacidades y cualidades de su fuerza interna. Identifica los riesgos implicados en el próximo capítulo de su vida. Ser consciente de los retos a futuro. Identifica las oportunidades en el próximo capítulo de su vida. Ser consciente de las nuevas oportunidades y posibilidades que se presentan.<br></p>', '<p>Utilizar las actividades del cuaderno del estudiante de ttoría para propiciar la relfexión de cada estudiante sobre sus fortalezas, su meta de vida, sus debilidades y las amenazas que puedieran existir con el propósito de potenciar sus capacidades y enfocar sus esfuerzos al logro de sus objetivos.<br></p>', '<p>El tutor presenta el video https://www.youtube.com/watch?v=JOXfNwLTyMc, se solicita a los estudiantes formar equipos y compartir sus comentarios y en una hoja escribir propuestas creativas para la solución d elos casos analizados en el vídeo, esta es una actividad en la que interviene la empatía, las emociones, la solidaridad y la reflexión se requiere de entusiamo para comprender que se trata de ser mejores cada día para con uno mismo y los demás. Se entrega la hoja y un equipo o dos comparten sus experiencias o el tutor puede solicitar la participación de algunos voluntarios.&nbsp;<br></p>', '<ul><li><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Asistencia</font></li><li><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Puntualidad</font></li><li><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Participación</font></li></ul>', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semana_real`
--

DROP TABLE IF EXISTS `semana_real`;
CREATE TABLE IF NOT EXISTS `semana_real` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupomaster` int(11) NOT NULL,
  `id_semana` int(11) NOT NULL,
  `semana_atendida` int(11) NOT NULL,
  `alumnos_atendidos` int(11) NOT NULL,
  `alumnos_faltantes` int(11) NOT NULL,
  `total_alumnos` int(11) NOT NULL,
  `atendidos_hombres` int(11) NOT NULL,
  `atendidos_mujeres` int(11) NOT NULL,
  `total_gatendidos` int(11) NOT NULL,
  `evidencias` longtext NOT NULL,
  `observaciones` text NOT NULL,
  `alumnos` text,
  PRIMARY KEY (`id`),
  KEY `idx_grupomaster` (`id_grupomaster`),
  KEY `idx_semana` (`id_semana`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `semana_real`
--

INSERT INTO `semana_real` (`id`, `id_grupomaster`, `id_semana`, `semana_atendida`, `alumnos_atendidos`, `alumnos_faltantes`, `total_alumnos`, `atendidos_hombres`, `atendidos_mujeres`, `total_gatendidos`, `evidencias`, `observaciones`, `alumnos`) VALUES
(7, 1, 1, 1, 1, 1, 1, 1, 1, 1, '../../uploads/Evidencia_tstrepo_1701383152.png', '<p>Se dio la tutoria</p>', NULL),
(8, 1, 4, 1, 1, 1, 1, 1, 1, 1, '', '<p>D</p>', NULL),
(9, 1, 5, 0, 0, 0, 0, 0, 0, 0, '', '<p>D</p>', NULL),
(10, 1, 2, 1, 23, 2, 25, 10, 13, 23, '', '<p><i style=\"\"><font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">Se realizo la actualización de expediente</font></i></p>', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id`, `nombre`, `apellido`, `correo`, `telefono`, `genero`, `id_user`) VALUES
(1, 'LUIS SANTIAGO', 'NOH CAHUM', 'l19070049@valladolid.tecnm.mx', '9851142361', 0, 11),
(2, 'Martha Elena', 'Manrique Rodriguez', 'l19070041@valladolid.tecnm.mx', '9851142361', 1, 12),
(11, 'Jesus Israel', 'Gamboa Ake', 'santiagocahum25@gmail.com', '9851142361', 0, 23);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(9, 'root', 'El4u2OFmro6HdVohznDGhv45RhYiBoe8', '$2y$13$b3MlkEF5WmnTFIfdTzyTV.XTSCttIOBcKInVnAp9GlkDPZ0hFas0C', NULL, 'rusell.im@valladolid.tecnm.mx', 10, 1653351873, 1701108543, 'QnphEMrAbjb3aM5EGodGe7pCW1PPuhsl_1653351873'),
(11, 'luis.nc', 'm3XEmH6t_-_cyYRFoZywJ_rNP5IF1-rI', '$2y$13$TY5V6KQV1IkBBYd5ldZPNeqlmxC76/QPZR0KrVAEwjLqObF2txBjG', NULL, 'l19070049@valladolid.tecnm.mx', 10, 1700430159, 1700452464, 'Iv7z2nBrWJkL65PR8Ec6O6uO7_ryGXd6_1700430159'),
(12, 'martha.mr', 'ff04RFnYeYQ7U4ROw5xHrdjENz67K21i', '$2y$13$0.GB6l16XneGQt.hA0QZP.spNeDuiLpS8R483uJNadipAJSVewkRO', NULL, 'l19070041@valladolid.tecnm.mx', 10, 1701446225, 1701447515, 'oD0eTSwkScpLzfOg5gUiCouvNJNKCQ0Y_1701446225'),
(23, 'jesus.ga', 'SG8nHrpacBwMhDeTNSoWwV6goMw5gOT2', '$2y$13$NP5CQZ2H2AkAV8rqP1XbIOJCxHbF71U8FihYQXoQG6I.XfAnGz8..', NULL, 'santiagocahum25@gmail.com', 9, 1702250967, 1702250967, '8mbC9NqR7IZGo6zld9M7lB7xRY7M68nw_1702250967');

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
-- Filtros para la tabla `canalizacion`
--
ALTER TABLE `canalizacion`
  ADD CONSTRAINT `fk_Alumno_idAlumno2` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciclo_escolar`
--
ALTER TABLE `ciclo_escolar`
  ADD CONSTRAINT `fk_Estatus_idEstatus` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `fk_Alumno_idAlumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `fk_Evaluacion_idAlumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Evaluacion_idCriterio` FOREIGN KEY (`id_criterio`) REFERENCES `criterios` (`id`) ON UPDATE CASCADE;

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
-- Filtros para la tabla `pat`
--
ALTER TABLE `pat`
  ADD CONSTRAINT `fk_idSemestrePAT` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `fk_IdGrupo_GrupoMaster` FOREIGN KEY (`id_grupo`) REFERENCES `grupo_master` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `periodo_escolar`
--
ALTER TABLE `periodo_escolar`
  ADD CONSTRAINT `fk_idCiclo` FOREIGN KEY (`id_ciclo`) REFERENCES `ciclo_escolar` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idEstatus` FOREIGN KEY (`id_estatus`) REFERENCES `estatus` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `semana`
--
ALTER TABLE `semana`
  ADD CONSTRAINT `fk_idPat_semana` FOREIGN KEY (`id_pat`) REFERENCES `pat` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `semana_real`
--
ALTER TABLE `semana_real`
  ADD CONSTRAINT `fk_idGrupoMaster_Real` FOREIGN KEY (`id_grupomaster`) REFERENCES `grupo_master` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSemana_SemanaReal` FOREIGN KEY (`id_semana`) REFERENCES `semana` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `fk_IdUsername` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
