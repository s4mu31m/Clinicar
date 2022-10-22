-- Active: 1664647068783@@127.0.0.1@3306@contacts_app
DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE `info_cliente` (
  id INT AUTO_INCREMENT PRIMARY KEY,
  `rut` varchar(20) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL
);
DROP TABLE vehiculo;

CREATE TABLE IF NOT EXISTS `vehiculo` (
  user_id INT NOT NULL,
  `patente` varchar(10) NOT NULL,
  `marca` varchar(15) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `aceite` varchar(15) DEFAULT NULL,
  `vol_aceite` varchar(6) DEFAULT NULL,
  `color` char(10) DEFAULT NULL,
  `motor` varchar(5) DEFAULT NULL,
  `combustible` char(10) DEFAULT NULL,
  `filtro_aceite` varchar(12) DEFAULT NULL,
  `filtro_aire` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`patente`),
  FOREIGN KEY (user_id) REFERENCES info_cliente(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
);


DROP TABLE IF EXISTS `info_empleado`;
CREATE TABLE IF NOT EXISTS `info_empleado` (
  `cod_empleado` int(11) NOT NULL,
  `nombre` char(10) DEFAULT NULL,
  `apellido` char(10) DEFAULT NULL,
  PRIMARY KEY (`cod_empleado`)
);

DROP TABLE IF EXISTS `agendamiento`;
CREATE TABLE IF NOT EXISTS `agendamiento` (
  `patente_auto` varchar(10) NOT NULL,
  `patente_agen` varchar(20) DEFAULT NULL,
  `hora_agen` datetime DEFAULT NULL,
  `tipo_servicio` char(25) DEFAULT NULL,
  PRIMARY KEY (`patente_auto`)
);