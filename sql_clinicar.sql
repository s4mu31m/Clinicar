-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-10-2022 a las 22:56:28
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicar`
--
CREATE DATABASE IF NOT EXISTS `clinicar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinicar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendamiento`
--

DROP TABLE IF EXISTS `agendamiento`;
CREATE TABLE IF NOT EXISTS `agendamiento` (
  `patente_auto` varchar(10) NOT NULL,
  `patente_agen` varchar(20) DEFAULT NULL,
  `hora_agen` datetime DEFAULT NULL,
  `tipo_servicio` char(25) DEFAULT NULL,
  PRIMARY KEY (`patente_auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `agendamiento`
--

INSERT INTO `agendamiento` (`patente_auto`, `patente_agen`, `hora_agen`, `tipo_servicio`) VALUES
('G4-SD-41', NULL, '2022-10-15 16:30:00', 'Lavado Completo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_cliente`
--

DROP TABLE IF EXISTS `info_cliente`;
CREATE TABLE IF NOT EXISTS `info_cliente` (
  `rut` varchar(20) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `apellido` char(20) DEFAULT NULL,
  `patente` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  KEY `patente` (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_cliente`
--

INSERT INTO `info_cliente` (`rut`, `nombre`, `apellido`, `patente`, `telefono`) VALUES
('21190811-4', 'IVANA', 'INFANTE', 'G4-SD-41', 931083927);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_empleado`
--

DROP TABLE IF EXISTS `info_empleado`;
CREATE TABLE IF NOT EXISTS `info_empleado` (
  `cod_empleado` int(11) NOT NULL,
  `nombre` char(10) DEFAULT NULL,
  `apellido` char(10) DEFAULT NULL,
  PRIMARY KEY (`cod_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_empleado`
--

INSERT INTO `info_empleado` (`cod_empleado`, `nombre`, `apellido`) VALUES
(1, 'Brandon', 'Lopez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_info`
--

DROP TABLE IF EXISTS `servicio_info`;
CREATE TABLE IF NOT EXISTS `servicio_info` (
  `n_servicio` int(11) NOT NULL,
  `tipo_servicio` varchar(30) DEFAULT NULL,
  `auto_asoc` varchar(30) DEFAULT NULL,
  `patente_asoc` varchar(20) DEFAULT NULL,
  `empleado_asoc` varchar(20) DEFAULT NULL,
  `fecha_servicio` datetime DEFAULT NULL,
  PRIMARY KEY (`n_servicio`),
  KEY `patente_asoc` (`patente_asoc`),
  KEY `tipo_servicio` (`tipo_servicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicio_info`
--

INSERT INTO `servicio_info` (`n_servicio`, `tipo_servicio`, `auto_asoc`, `patente_asoc`, `empleado_asoc`, `fecha_servicio`) VALUES
(1, 'Lavado Completo', NULL, 'G4-5D-41', 'BRANDO LOPEZ', '2022-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

DROP TABLE IF EXISTS `vehiculo`;
CREATE TABLE IF NOT EXISTS `vehiculo` (
  `patente` varchar(10) NOT NULL,
  `año` int(11) DEFAULT NULL,
  `aceite` varchar(15) DEFAULT NULL,
  `vol_aceite` varchar(6) DEFAULT NULL,
  `color` char(10) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `motor` varchar(5) DEFAULT NULL,
  `combustible` char(10) DEFAULT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `filtro_aceite` varchar(12) DEFAULT NULL,
  `filtro_aire` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`patente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`patente`, `año`, `aceite`, `vol_aceite`, `color`, `modelo`, `motor`, `combustible`, `marca`, `filtro_aceite`, `filtro_aire`) VALUES
('G4-SD-41', 2017, NULL, NULL, 'GRIS', 'COROLLA', '3,0', 'BENCINA', 'TOYOTA', NULL, NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info_cliente`
--
ALTER TABLE `info_cliente`
  ADD CONSTRAINT `FK_AUTO_DUEÑO` FOREIGN KEY (`rut`) REFERENCES `vehiculo` (`patente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `patente_fk_dueño` FOREIGN KEY (`patente`) REFERENCES `vehiculo` (`patente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `servicio_info`
--
ALTER TABLE `servicio_info`
  ADD CONSTRAINT `fk_ser_au` FOREIGN KEY (`patente_asoc`) REFERENCES `vehiculo` (`patente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ser_empl` FOREIGN KEY (`n_servicio`) REFERENCES `info_empleado` (`cod_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sercliente` FOREIGN KEY (`tipo_servicio`) REFERENCES `info_cliente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_auto_cliente_E` FOREIGN KEY (`patente`) REFERENCES `info_cliente` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
