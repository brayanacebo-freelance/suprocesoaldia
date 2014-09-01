-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-09-2014 a las 00:40:26
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `suprocesoaldia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `actions`
--

INSERT INTO `actions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Archiva tutela', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Algo tutela', '0000-00-00 00:00:00', '2014-03-02 21:30:03'),
(3, 'Traslado', '2014-03-03 13:49:12', '2014-03-03 13:49:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assistants`
--

CREATE TABLE IF NOT EXISTS `assistants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `document_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `assistants`
--

INSERT INTO `assistants` (`id`, `name`, `nit`, `phone`, `document_type`, `created_at`, `updated_at`) VALUES
(4, 'ALVARO MANCIPE RIAÑO', '1010200086', '3192294153', 0, '2014-06-27 19:02:07', '2014-07-05 17:09:42'),
(10, 'JOSE VICENTE ARCINIEGAS ', '1016002803', '3118216837', 0, '2014-08-11 15:15:35', '2014-08-11 15:15:35'),
(11, 'javier', '123', '123', 0, '2014-08-11 22:35:20', '2014-08-11 22:35:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `department_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 2, 'Medellin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Bogotá', '2014-03-03 12:46:18', '2014-03-03 12:46:18'),
(4, 1, 'Soacha', '2014-06-27 13:37:08', '2014-06-27 13:37:08'),
(5, 1, 'caqueza', '2014-08-12 16:56:24', '2014-08-12 16:56:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `assistant_id` int(10) unsigned NOT NULL,
  `enterprise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_charge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_seen_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_mail_sent_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `assistant_id`, `enterprise`, `in_charge`, `phone`, `last_seen_on`, `last_mail_sent_on`, `created_at`, `updated_at`) VALUES
(13, 4, 'eliminar', 'eliminar', '222927', '2014-08-30 18:10:54', '2014-06-27 19:19:13', '2014-06-27 19:05:13', '2014-08-30 18:10:54'),
(16, 5, 'empresa 1', 'juan perez', '123', '2014-08-09 22:53:07', '2014-08-09 22:11:05', '2014-07-20 18:09:43', '2014-08-09 22:53:07'),
(17, 0, 'empresa 2', 'juan perez', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2014-07-20 18:34:47', '2014-07-20 18:34:47'),
(25, 9, 'asd', 'asd', 'asd', '2014-07-23 23:59:37', '0000-00-00 00:00:00', '2014-07-23 23:58:42', '2014-07-23 23:59:37'),
(26, 9, 'asdf', 'asdfg', 'asdf', '2014-07-24 02:32:16', '0000-00-00 00:00:00', '2014-07-24 02:12:10', '2014-07-24 02:32:16'),
(27, 5, 'a', 'a', 'a', '0000-00-00 00:00:00', '2014-08-09 22:00:00', '2014-07-27 01:02:30', '2014-08-09 22:00:00'),
(30, 5, 'USUARIO@ESTEBAN.com', '123', '123', '2014-08-05 02:24:20', '2014-08-09 22:00:04', '2014-07-28 01:57:58', '2014-08-14 12:29:47'),
(31, 0, 'COOPSOLIDAR', 'JOSE VICENTE ARCINIEGAS', '222927', '2014-08-12 16:52:34', '0000-00-00 00:00:00', '2014-08-11 15:20:21', '2014-08-13 21:16:26'),
(32, 11, 'wachu', 'wachu', '99817212', '0000-00-00 00:00:00', '2014-08-30 17:38:40', '2014-08-30 17:32:13', '2014-08-30 17:38:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cundinamarca', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Antioquia', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_02_15_233520_create_users_table', 1),
('2014_02_15_234041_create_clients_table', 1),
('2014_02_15_234437_create_assistants_table', 1),
('2014_02_15_234958_create_processes_table', 1),
('2014_02_15_235057_create_process_types_table', 1),
('2014_02_15_235324_create_actions_table', 1),
('2014_02_15_235406_create_notification_types_table', 1),
('2014_02_15_235720_create_movement_table', 1),
('2014_02_15_235804_create_departments_table', 1),
('2014_02_15_235834_create_cities_table', 1),
('2014_02_26_002715_create_offices_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movements`
--

CREATE TABLE IF NOT EXISTS `movements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `process_id` int(10) unsigned NOT NULL,
  `action_type` int(10) unsigned NOT NULL,
  `notification_type` int(10) unsigned NOT NULL,
  `notification_date` date NOT NULL,
  `auto_date` date NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `movements`
--

INSERT INTO `movements` (`id`, `process_id`, `action_type`, `notification_type`, `notification_date`, `auto_date`, `comments`, `dir`, `created_at`, `updated_at`) VALUES
(4, 5, 3, 6, '2014-06-27', '2014-06-26', 'ordena liquidacion', '$2y$10$tdb1TyfwwPq5kSASMaCee7oJwJVKP2ilh8PKSdeU79vVYu9GNCq.', '2014-06-27 19:16:27', '2014-06-27 19:16:27'),
(5, 6, 1, 1, '2014-07-20', '2014-07-21', 'lorem ipsum dolor', '$2y$10$20ibQlyCTCh9NqXznrEOkuB.RTf6WMzmA3S69gdCB19edV.2eMB3C', '2014-07-20 18:55:38', '2014-07-20 18:55:38'),
(6, 6, 3, 1, '2014-07-19', '2014-07-20', 'fkdsalñfjkdal', '$2y$10$2h.uMmt1zaVlWMnrrL0MsOxol47oeyWf9ISWDnT0x6U1OUOdxQ0TK', '2014-07-20 19:04:50', '2014-07-20 19:04:50'),
(7, 8, 1, 1, '2014-07-03', '2014-07-04', 'asdasdsa', '$2y$10$R.kOKc7rcLdgQ56HGuYlveYw4li7d7iTlhW67q02gpuYkoMkY8uWe', '2014-07-24 00:00:57', '2014-07-24 00:00:57'),
(8, 9, 1, 1, '2014-07-04', '2014-01-06', 'asd', '$2y$10$636.EwVQ7Xv4tVi5jxQxaOT9TmCeuk7LahOm9SRwL0i4iwmBBD2fy', '2014-07-24 02:12:46', '2014-07-24 02:12:46'),
(9, 12, 1, 1, '0000-00-00', '0000-00-00', 'cambió', '$2y$10$U2qH0r65UrO9nRF8ouOL2.f6rhblZWnDluEGmQF4qDaxMbh0aYi', '2014-07-28 02:02:28', '2014-07-28 02:19:37'),
(10, 12, 3, 3, '0000-00-00', '0000-00-00', 'cmmnt', '$2y$10$srMQCDLXsKIoP2Bb5cQ79.1j1mjoG37jkpJMBvU2E7kGGn9JNhq', '2014-07-28 02:23:39', '2014-07-28 02:28:08'),
(11, 12, 1, 1, '2014-01-08', '2014-01-09', 'poiuytrewascvbnm,..,mnbvcx', '$2y$10$761eeUnTB70uOGRfaI4UOXmOFoeR.3YwOLU1KZJFUlDdkCN3RJy6', '2014-07-28 02:28:44', '2014-07-28 02:28:44'),
(12, 12, 1, 1, '2014-07-11', '2014-01-13', 'asdasdasd', '$2y$10$dfymsyPJoa0XTwaMfAKAWulYgl7qM.Zg8J.rGADFQRSJ9pAztUYq', '2014-07-28 02:30:19', '2014-07-28 02:30:19'),
(13, 12, 1, 1, '2014-07-09', '2014-07-10', 'este es', '$2y$10$3YnLaveftr03nj3gtmIAXOUBETiz4Y6kxOisLtAAfGlCasNq6Sqq', '2014-07-28 02:30:46', '2014-07-28 02:36:58'),
(14, 12, 2, 7, '2014-08-04', '2014-08-05', 'q', '$2y$10$tWP3UhxfNH2n7p.xUtQ4C.8bl9g0vCr1g6HHy4Arq.chmX6CYtsG', '2014-07-28 02:42:12', '2014-08-05 02:42:14'),
(15, 13, 3, 1, '0000-00-00', '0000-00-00', 'lorem ipsum dolor sit amet', '$2y$10$1kd2G3TiHiFzIXzl2JMZxeuy6wx2jh1gscqVBpz.Mbri4Sxz.J19u', '2014-08-02 14:33:23', '2014-08-02 14:33:49'),
(16, 10, 3, 2, '2014-08-08', '2014-08-09', 'comentario del movimiento', '$2y$10$yUSZmVYYnekHPOOJON6X2u3rQE0JjtPEEYn.uvWA8Ah3e6hQlZAnu', '2014-08-09 21:56:35', '2014-08-09 21:58:25'),
(17, 7, 3, 2, '2014-08-09', '0000-00-00', 'hhjghjg', '$2y$10$DzmAx5pNRievEIHgcs4YPOM27sDPCcpuOPeV5CFQ16cBkZUVlwRJS', '2014-08-09 22:00:55', '2014-08-09 22:01:06'),
(18, 6, 1, 6, '2014-08-09', '0000-00-00', 'hjkhjkhkj', '$2y$10$BtqoU70yjVdn9BgI27X1.nF0rBZfnxizHO0eRj4uXMDUVzh7BHC', '2014-08-09 22:02:32', '2014-08-09 22:02:43'),
(19, 5, 2, 5, '2014-08-30', '2014-08-27', 'sofdaqknbczzjhhfgh', '$2y$10$aYUzvuVVywWtN4ZY59o5Eu1ZrMqeah3cJ6OHdemTKAFrOO1e7HGy', '2014-08-30 17:17:00', '2014-08-30 17:20:46'),
(20, 5, 1, 5, '0000-00-00', '2014-08-22', ' jepjqfpew', '$2y$10$7pzhiwWtBuc71DVeWK6xu1q4AwZ43E.z0hYQ1c6kGtoBM017NfC', '2014-08-30 17:17:04', '2014-08-30 17:24:52'),
(21, 27, 3, 7, '2014-08-30', '0000-00-00', 'zXSD', '$2y$10$ashUpfdew70CL05meQhVt.nc4qyyEgbwM48FIncGJQb2xpfsHhfS', '2014-08-30 17:34:05', '2014-08-30 17:34:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification_types`
--

CREATE TABLE IF NOT EXISTS `notification_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `notification_types`
--

INSERT INTO `notification_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Edicto', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Edicto Constitucional', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Edicto de Sentencia Administrativs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Edicto Emplazatorio', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Edicto de Sentencia', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Estado', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Estado Administrativo', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Extracto de Demanda', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'Traslado', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offices`
--

CREATE TABLE IF NOT EXISTS `offices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=79 ;

--
-- Volcado de datos para la tabla `offices`
--

INSERT INTO `offices` (`id`, `city_id`, `name`, `created_at`, `updated_at`) VALUES
(3, 3, '1 EJECUCION', '2014-03-03 12:50:34', '2014-08-13 20:01:01'),
(4, 3, '4 EJECUCION', '2014-03-03 12:53:09', '2014-08-13 20:01:22'),
(5, 3, '5 EJECUCION', '2014-08-12 16:45:18', '2014-08-13 20:01:40'),
(6, 3, '8 EJECUCION', '2014-08-12 16:56:45', '2014-08-13 20:01:59'),
(7, 3, '9 EJECUCION', '2014-08-12 16:59:27', '2014-08-13 20:02:14'),
(8, 3, '11 EJECUCION', '2014-08-12 16:59:47', '2014-08-13 20:02:32'),
(9, 3, '13 EJECUCION', '2014-08-12 17:02:34', '2014-08-13 20:02:48'),
(10, 3, '14 EJECUCION', '2014-08-12 17:03:05', '2014-08-13 20:03:04'),
(11, 3, '15 EJECUCION', '2014-08-12 17:03:12', '2014-08-13 20:03:19'),
(12, 3, '3 EJECUCION', '2014-08-12 17:07:58', '2014-08-13 20:03:39'),
(13, 3, '10 EJECUCION', '2014-08-12 17:09:32', '2014-08-13 20:04:04'),
(14, 3, '6 EJECUCION', '2014-08-12 17:10:00', '2014-08-13 20:04:20'),
(15, 3, '9 CMD', '2014-08-12 17:19:52', '2014-08-13 20:04:51'),
(16, 3, '19 CMD', '2014-08-12 18:08:42', '2014-08-13 20:05:04'),
(17, 3, '20 CMD', '2014-08-13 20:05:15', '2014-08-13 20:05:15'),
(18, 3, 'JUZ 15 CMD MINIMA', '2014-08-13 20:05:25', '2014-08-13 20:05:25'),
(19, 3, '32 CMD ', '2014-08-13 20:05:35', '2014-08-13 20:05:35'),
(20, 3, '8 CMD', '2014-08-13 20:05:45', '2014-08-13 20:05:45'),
(21, 3, '2 DESCON', '2014-08-13 20:05:54', '2014-08-13 20:05:54'),
(22, 3, '6  DESCON', '2014-08-13 20:06:58', '2014-08-13 20:06:58'),
(23, 3, '5 DESCON', '2014-08-13 20:07:08', '2014-08-13 20:07:08'),
(24, 3, '2 EJECUCION', '2014-08-13 20:07:35', '2014-08-13 20:07:35'),
(25, 3, '12 CMD MINIMA ', '2014-08-13 20:07:45', '2014-08-13 20:07:45'),
(26, 3, 'JUZ 13 CMD MINIMA', '2014-08-13 20:07:54', '2014-08-13 20:07:54'),
(27, 3, '31 LABORAL', '2014-08-13 20:08:13', '2014-08-13 20:08:13'),
(28, 3, '1 FAMILIA', '2014-08-13 20:08:22', '2014-08-13 20:08:22'),
(29, 3, '6 FAMILIA', '2014-08-13 20:09:01', '2014-08-13 20:09:01'),
(30, 3, '9 FAMILIA', '2014-08-13 20:09:14', '2014-08-13 20:09:14'),
(31, 3, '12 FAMILIA', '2014-08-13 20:09:23', '2014-08-13 20:09:23'),
(32, 3, '13 FAMILIA', '2014-08-13 20:10:17', '2014-08-13 20:10:17'),
(33, 3, '21 FAMILIA', '2014-08-13 20:11:00', '2014-08-13 20:11:00'),
(34, 3, '15 CM', '2014-08-13 20:11:10', '2014-08-13 20:11:10'),
(35, 3, '26 CM', '2014-08-13 20:11:21', '2014-08-13 20:11:21'),
(36, 3, '50 CM', '2014-08-13 20:11:31', '2014-08-13 20:11:31'),
(37, 3, '35 CDM', '2014-08-13 20:11:45', '2014-08-13 20:11:45'),
(38, 3, '57 CM', '2014-08-13 20:12:00', '2014-08-13 20:12:00'),
(39, 3, '30 CIVIL MUNICIPAL DESCONGESTION', '2014-08-13 20:12:20', '2014-08-13 20:12:20'),
(40, 3, '11 FAMILIA', '2014-08-13 20:12:33', '2014-08-13 20:12:33'),
(41, 3, '3 ADM DESCONGETION', '2014-08-13 20:13:26', '2014-08-13 20:13:26'),
(42, 3, 'JUZ 16 ADM DE DESCONGESTION', '2014-08-13 20:13:37', '2014-08-13 20:13:37'),
(43, 3, '35 ADM', '2014-08-13 20:13:50', '2014-08-13 20:13:50'),
(44, 3, '33 ADM', '2014-08-13 20:13:59', '2014-08-13 20:13:59'),
(45, 3, '32 ADM', '2014-08-13 20:21:28', '2014-08-13 20:21:28'),
(46, 3, 'TRIBUNAL ADM DE PASTO', '2014-08-13 20:21:40', '2014-08-13 20:21:40'),
(47, 3, 'TRIBUNAL ADM DE quindio', '2014-08-13 20:21:49', '2014-08-13 20:21:49'),
(48, 3, '29 AMD ARAUCA', '2014-08-13 20:22:02', '2014-08-13 20:22:02'),
(49, 3, '2 ADM ARAUCA', '2014-08-13 20:22:13', '2014-08-13 20:22:13'),
(50, 3, 'ARAUCA', '2014-08-13 20:22:23', '2014-08-13 20:22:23'),
(51, 3, '3 ADM VALLEDUPAR', '2014-08-13 20:22:32', '2014-08-13 20:22:32'),
(52, 3, 'JUZ CIVIL CIRCUITO CAQUEZA', '2014-08-13 20:22:43', '2014-08-13 20:22:43'),
(53, 3, 'PROMISCUO FAMILIA CAQUEZA', '2014-08-13 20:23:00', '2014-08-13 20:23:00'),
(54, 3, 'PROMISCUO FAMILIA CAQUEZA', '2014-08-13 20:23:01', '2014-08-13 20:23:01'),
(55, 3, 'JUZ CIVIL PROMISCUO DE UNE', '2014-08-13 20:23:10', '2014-08-13 20:23:10'),
(56, 3, 'JUZ FAMILIA SOACHA', '2014-08-13 20:23:19', '2014-08-13 20:23:19'),
(57, 3, 'JUZGADO DE DESCONGESTION SOACHA', '2014-08-13 20:23:30', '2014-08-13 20:23:30'),
(58, 3, 'JUZ 4 CM SOACHA', '2014-08-13 20:24:56', '2014-08-13 20:24:56'),
(59, 3, 'JUZ 2 CCTO SOACHA', '2014-08-13 20:25:09', '2014-08-13 20:25:09'),
(60, 3, 'PROMISCUO CIVIL DE FACA', '2014-08-13 20:25:19', '2014-08-13 20:25:19'),
(61, 3, 'JUZ CM SILVANIA', '2014-08-13 20:25:35', '2014-08-13 20:25:35'),
(62, 3, 'JUZ 2 CM FUSA', '2014-08-13 20:25:45', '2014-08-13 20:25:45'),
(63, 3, 'JUZ PROMISCUO FAMILIA FUSA', '2014-08-13 20:25:56', '2014-08-13 20:25:56'),
(64, 3, '35 ccto', '2014-08-13 20:26:07', '2014-08-13 20:26:07'),
(65, 3, '4 ccto laboral', '2014-08-13 20:26:18', '2014-08-13 20:26:18'),
(66, 3, '16 ccto familia', '2014-08-13 20:26:29', '2014-08-13 20:26:29'),
(67, 3, '11 ccto', '2014-08-13 20:26:37', '2014-08-13 20:26:37'),
(68, 3, '34 CCTO', '2014-08-13 20:26:48', '2014-08-13 20:26:48'),
(69, 3, '23 CCTO', '2014-08-13 20:26:57', '2014-08-13 20:27:11'),
(70, 3, 'CASACION', '2014-08-13 20:27:21', '2014-08-13 20:27:21'),
(71, 3, '31 ADM', '2014-08-13 20:27:37', '2014-08-13 20:27:37'),
(72, 3, '11 CMD', '2014-08-13 20:28:00', '2014-08-13 20:28:00'),
(73, 3, 'JUZ 26 ADM', '2014-08-13 20:28:19', '2014-08-13 20:28:19'),
(74, 3, 'JUZ 21 ADM', '2014-08-13 20:28:30', '2014-08-13 20:28:30'),
(75, 3, 'JUEZ PROMISCUO DE NILO (CUND)', '2014-08-13 20:28:40', '2014-08-13 20:28:40'),
(76, 3, 'JUEZ CIVIL MUNICIPAL DE TUNJA', '2014-08-13 20:28:50', '2014-08-13 20:28:50'),
(77, 3, 'JUZ 13 ADM', '2014-08-13 20:29:01', '2014-08-13 20:29:01'),
(78, 3, 'JUZ 11 ADM', '2014-08-13 20:29:09', '2014-08-13 20:29:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `processes`
--

CREATE TABLE IF NOT EXISTS `processes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(10) unsigned NOT NULL,
  `folder_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department_id` int(10) unsigned NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `office_id` int(10) unsigned NOT NULL,
  `process_type` int(10) unsigned NOT NULL,
  `claimant` text COLLATE utf8_unicode_ci NOT NULL,
  `defendant` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `processes`
--

INSERT INTO `processes` (`id`, `client_id`, `folder_number`, `creation_number`, `department_id`, `city_id`, `office_id`, `process_type`, `claimant`, `defendant`, `created_at`, `updated_at`) VALUES
(5, 13, '1234', '1234', 1, 3, 3, 2, '["demandante1 - 1234","demandado2 - 1234567"]', '["demandado1 - 12345"]', '2014-06-27 19:14:37', '2014-08-30 17:20:18'),
(6, 16, '234', '1234', 1, 3, 3, 4, '["demandante 1","demandante 2"]', '["demandado 1","demandado 2"]', '2014-07-20 18:51:37', '2014-08-09 22:02:43'),
(7, 16, '123', '123', 1, 1, 4, 1, '["prueba "]', '["test"]', '2014-07-20 19:04:04', '2014-08-09 22:01:05'),
(8, 25, 'asdf', 'asdf', 1, 1, 1, 1, '["asdf"]', '["asdf"]', '2014-07-23 23:59:08', '2014-07-24 00:00:57'),
(9, 26, 'sdfg', 'asdf', 1, 1, 1, 1, '["asd"]', '["asd"]', '2014-07-24 02:12:31', '2014-07-24 02:12:46'),
(10, 16, 'uno', 'dos', 1, 1, 1, 1, '["asd"]', '["asd"]', '2014-07-27 01:27:06', '2014-08-09 21:58:22'),
(11, 27, 'iuytre', 'qwertyuio', 1, 1, 1, 1, '["132"]', '["123123"]', '2014-07-28 01:57:13', '2014-07-28 01:57:13'),
(12, 30, '098765', '98765', 2, 2, 3, 1, '["98765","demandante 1","demandatante 2"]', '["65432","damanddodododo 1","demandododod 2"]', '2014-07-28 01:58:28', '2014-08-05 02:58:54'),
(13, 17, '3452', '45454', 1, 2, 3, 1, '["nombre dte - 98765","segundo dte - 640173"]', '["nombre ddo - 123467"]', '2014-08-02 14:31:36', '2014-08-02 14:33:23'),
(16, 31, '001', '2012-588', 1, 1, 3, 1, '["BANCO SANTANDER "]', '["ARISMEL DE JESUS PEREZ"]', '2014-08-13 20:41:13', '2014-08-13 20:41:13'),
(17, 31, '002', '2010-1671', 1, 1, 3, 1, '["CONSERVIR"]', '["CARLOS DAVID ERAZO SALAZAR"]', '2014-08-13 20:42:13', '2014-08-13 20:42:13'),
(18, 31, '003', '2010-1444', 1, 1, 4, 1, '["CONSERVIR"]', '["JHON FREDY HUERTAS VARGAS"]', '2014-08-13 20:43:09', '2014-08-13 20:43:09'),
(19, 31, '004', '2012-753', 1, 1, 4, 1, '["CONALSUMI"]', '["ROBINSON FARID BONILLA"]', '2014-08-13 20:44:13', '2014-08-13 20:44:13'),
(20, 31, '006', '2010-1399', 1, 1, 5, 1, '["CONSERVIR"]', '["EUGENIO JOSE SIERRA CARE"]', '2014-08-13 20:45:03', '2014-08-13 20:46:15'),
(21, 31, '007', '2011-632', 1, 1, 6, 1, '["LUIS ALEJANDRO RIVEROS REINA"]', '["MARIA ELVIRA MURILLO"]', '2014-08-13 20:45:51', '2014-08-13 20:45:51'),
(22, 31, '008', '2010-1417', 1, 1, 7, 1, '["CONSERVIR"]', '["EDGAR GIOVANNY FRANCO"]', '2014-08-13 20:48:48', '2014-08-13 20:48:48'),
(23, 31, '009', '2006-142', 1, 1, 8, 2, '["EFRAIN ANGEL CAMACHO"]', '["MARIA ANGELICA MARTINEZ"]', '2014-08-13 20:49:49', '2014-08-13 20:49:49'),
(24, 31, '010', '2010-1332', 1, 1, 9, 1, '["CONSERVIR"]', '["DANY ALEXANDER URRIETA "]', '2014-08-13 20:50:46', '2014-08-13 20:50:46'),
(25, 27, '123A', '123B', 1, 1, 1, 1, '["asdadsa1-12312313","asdadsa3-12312313"]', '["asdadsa2-12312313"]', '2014-08-30 17:05:13', '2014-08-30 17:05:13'),
(26, 27, 'asd', 'asd', 1, 1, 1, 1, '["asdad112312-44444",""]', '["rree-5555"]', '2014-08-30 17:10:31', '2014-08-30 17:10:31'),
(27, 32, 'wachufolder', 'wachureaction', 2, 2, 1, 3, '["asd-123"]', '["asdasd-123123"]', '2014-08-30 17:33:16', '2014-08-30 17:34:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `process_types`
--

CREATE TABLE IF NOT EXISTS `process_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `process_types`
--

INSERT INTO `process_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'EJECUTIVO SINGULAR', '0000-00-00 00:00:00', '2014-08-13 20:31:57'),
(2, 'EJECUTIVO HIPOTECARIO', '0000-00-00 00:00:00', '2014-08-13 20:32:10'),
(3, 'ALIMENTOS', '2014-03-02 21:25:07', '2014-08-13 20:32:26'),
(4, 'INTERDICCION', '2014-07-04 15:25:57', '2014-08-13 20:32:42'),
(5, 'ORDINARIO LABORAL', '2014-08-12 18:10:50', '2014-08-13 20:33:02'),
(6, 'IMPUGANACION DE PATERNIDAD', '2014-08-12 18:11:02', '2014-08-13 20:33:31'),
(7, 'SUCESIÓN', '2014-08-12 18:11:18', '2014-08-13 20:33:47'),
(8, 'DIVORCIO', '2014-08-12 18:11:25', '2014-08-13 20:34:11'),
(9, 'LIQ SOCIEDAD CONYUGAL', '2014-08-12 18:11:54', '2014-08-13 20:34:25'),
(10, 'FILIACION EXTRAMATRIMONIAL', '2014-08-12 18:12:19', '2014-08-13 20:34:50'),
(11, 'NULIDAD Y RESTABLECIMIENTO DEL DERECHO', '2014-08-12 18:14:41', '2014-08-13 20:35:08'),
(12, 'REPARACION DIRECTA', '2014-08-12 18:15:37', '2014-08-13 20:35:33'),
(13, 'ADOPCION', '2014-08-12 18:15:55', '2014-08-13 20:36:33'),
(14, 'VERBAL-PERTENENCIA DE MINIMA CUANTIA', '2014-08-12 18:18:01', '2014-08-13 20:36:59'),
(15, 'REMOSION DE GUARDA', '2014-08-12 18:18:24', '2014-08-13 20:37:15'),
(16, 'RENDICION DE CUENTAS', '2014-08-12 18:18:38', '2014-08-13 20:38:02'),
(17, 'RESPONSABILIDAD CIVIL', '2014-08-13 20:37:50', '2014-08-13 20:37:50'),
(18, 'DISOLUCION Y LIQUIDACION DE SOCIEDAD COMERCIAL DE HECHO', '2014-08-13 20:38:20', '2014-08-13 20:38:20'),
(19, 'PENSION DE SOBREVIVIENTE', '2014-08-13 20:38:29', '2014-08-13 20:38:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loggeable_id` int(11) NOT NULL,
  `loggeable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `loggeable_id`, `loggeable_type`, `created_at`, `updated_at`) VALUES
(1, 'seguimiento-judicial-admin', '$2y$10$BvLNFV/yz8qKxA6VKzzUbO25Ryz/ECGlthLwdxxMDI3S570WC/cwe', 0, 'SuperAdmin', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'djimsomnia@gmail.com', '$2y$10$1lBjAmkXh4H3TgphJHr/yevHTAZMAtADWJQSsXNmhqHn3fGGQsHZu', 4, 'Assistant', '2014-06-27 19:02:07', '2014-08-11 15:21:55'),
(19, 'javiervaron1@gmail.com', '$2y$10$7Je8imgCDmxIShIw.NbF1.A6nA4hiHRb.mifiBfkV4tt0s8e/97yu', 13, 'Client', '2014-06-27 19:05:13', '2014-08-30 17:42:14'),
(20, 'COOPSOLIDAR@HOTMAILd.COM', '$2y$10$xJhXVHyvuqeliJr7Paz/Iu0UcyDJVOpaxBsbx55lHk.jGoboOOIj6', 14, 'Client', '2014-07-04 15:23:51', '2014-07-04 15:23:51'),
(23, 'javarsa1@yahoo.es', '$2y$10$v/AxfyO8O/3goSmMSaTjHemxg9bBI6DXpDEeaQNPXWL8grL1M9VD2', 16, 'Client', '2014-07-20 18:09:43', '2014-07-20 19:03:23'),
(25, 'empresa2@javiervaron.co', '$2y$10$8VYwYJCVhMYe1S6G81HS5eSFQPSVfTgc8VupGILbPBFsdOqs4Fac2', 17, 'Client', '2014-07-20 18:34:47', '2014-07-20 18:34:47'),
(31, 'asdf@asdf.com', '$2y$10$7.n6tKjt29aHsFP668QmW.zLP0nXs7QaKOm9jLN1ujuL1hHO0w4C6', 21, 'Client', '2014-07-23 23:30:47', '2014-07-23 23:30:47'),
(36, 'tete@tete.com', '$2y$10$oYWPZeCA1i6epZX.UqYoHePmOjA1fR5RulrMykghegL0XuJ9tR2h.', 25, 'Client', '2014-07-23 23:58:42', '2014-07-23 23:58:42'),
(37, 'prueba@esteban.com.co', '$2y$10$cpB28l2ziRWeAS/AMp8B3.nCNW1MpwUimXTpqK9LMoQlEBucLQOfO', 26, 'Client', '2014-07-24 02:12:10', '2014-08-14 12:38:11'),
(38, 'a@a.com', '$2y$10$tOvZXN2ayOWvGI2AUYs.GuivxDkMunrpg0k9fVG29L4zLVVTye706', 27, 'Client', '2014-07-27 01:02:30', '2014-07-27 01:02:30'),
(41, '123@123.com', '$2y$10$nAny3LuFdmbM6f9XSpnpoOzAXZYVsCYbzqg5GVANTjMCxBrTdkcGm', 30, 'Client', '2014-07-28 01:57:58', '2014-08-14 12:37:40'),
(42, 'JOZEUZ1987@HOTMAIL.COM', '$2y$10$.sIMjUg37xsXDQzdTex0ReNud.rmk4SItsBYJ4e.18GPjtF3IJuHq', 10, 'Assistant', '2014-08-11 15:15:35', '2014-08-14 17:52:46'),
(43, 'coopsolidar@hotmail.com', '$2y$10$XOqILNNW2yFh9gRIr6Lag.XbhbUln9ZLMf01O8bkVdvjrQpypt72i', 31, 'Client', '2014-08-11 15:20:21', '2014-08-14 12:28:36'),
(44, 'javier@javiervaron.co', '$2y$10$0OGBhbAPRAmOF7H7CK0J2eD1BO4V1rCbyhTbPptCNrF/pp3jGhZG2', 11, 'Assistant', '2014-08-11 22:35:20', '2014-08-11 22:35:20'),
(45, 'aa@aa.com', '$2y$10$ht/I11gx9tPjXnkFjz2Bh.OQZ8FP7iGAaFZZgNK/NrNoN0b2OnEIC', 32, 'Client', '2014-08-30 17:32:13', '2014-08-30 17:32:13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
