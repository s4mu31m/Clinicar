-- Active: 1664647068783@@127.0.0.1@3306@clinicar
DROP DATABASE IF EXISTS clinicar;

CREATE DATABASE clinicar;

USE clinicar;

DROP TABLE IF EXISTS agendamiento;

SET FOREIGN_KEY_CHECKS=0;

CREATE TABLE  agendamiento (
  `Patente_Auto` varchar(10) NOT NULL,
  `Cliente_Agen` varchar(20) DEFAULT NULL,
  `Hora_Agen` datetime DEFAULT NULL,
  `Tipo_Servicio` char(25) DEFAULT NULL,
  PRIMARY KEY (`Patente_Auto`),
  KEY `Tipo_Servicio` (`Tipo_Servicio`),
  KEY `Patente_Auto` (`Patente_Auto`),
  KEY `Cliente_Agen` (`Cliente_Agen`),
  KEY `Hora_Agen` (`Hora_Agen`),
  CONSTRAINT `Fk_Cliente_asoc` FOREIGN KEY (`Cliente_Agen`) REFERENCES `info_cliente` (`rut`),
  CONSTRAINT `Fk_Fecha_Serv` FOREIGN KEY (`Hora_Agen`) REFERENCES `servicio_info` (`Fecha_Servicio`),
  CONSTRAINT `Fk_Patente_Due` FOREIGN KEY (`Patente_Auto`) REFERENCES `car` (`patente`),
  CONSTRAINT `Fk_Tipo_Serv` FOREIGN KEY (`Tipo_Servicio`) REFERENCES `servicio_info` (`Tipo_Servicio`)
);


INSERT INTO `agendamiento` VALUES ('DB-J5-99','Pascual Peralta','2022-10-22 00:00:00','Lavado Chasis');

DROP TABLE IF EXISTS `car`;

CREATE TABLE `car` (
  `patente` varchar(10) NOT NULL,
  `Año` int DEFAULT NULL,
  `Aceite` varchar(15) DEFAULT NULL,
  `Vol_Aceite` varchar(6) DEFAULT NULL,
  `Color` char(10) DEFAULT NULL,
  `Modelo` varchar(15) DEFAULT NULL,
  `Motor` varchar(5) DEFAULT NULL,
  `Combustible` char(10) DEFAULT NULL,
  `Marca` varchar(15) DEFAULT NULL,
  `Filtro_Aire` varchar(12) DEFAULT NULL,
  `Filtro_Aceite` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`patente`),
  KEY `patente` (`patente`),
  CONSTRAINT `Fk_Dueño_Auto` FOREIGN KEY (`patente`) REFERENCES `cliente` (`rut`)
);



INSERT INTO `car` VALUES ('DB-J5-99',2021,'5W30','8L','Rojo','F-150','3,0','Bencina','Ford','C-26035/1','PF950/12');




DROP TABLE IF EXISTS `info_cliente`;

CREATE TABLE `info_cliente` (
  `rut` varchar(20) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `patente` varchar(30) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`rut`),
  KEY `rut` (`rut`)
);

INSERT INTO `info_cliente` VALUES ('27169879-8','César Linares','Chevrolet Spark',936936243),('27169879-K','Samuel Montiel','Audi A8',936936224),('6289643-0','Pascual Peralta','Ford F-150',936936242);


DROP TABLE IF EXISTS `info_empleado`;

CREATE TABLE `info_empleado` (
  `Cod_Empleado` int DEFAULT NULL,
  `nombre` char(10) DEFAULT NULL,
  KEY `Cod_Empleado` (`Cod_Empleado`),
  KEY `nombre` (`nombre`),
  CONSTRAINT `Fk_EmpleadoCOd_` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Cod_Empleado`)
);

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio` (
  `N_Servicio` int DEFAULT NULL,
  KEY `N_Servicio` (`N_Servicio`),
  CONSTRAINT `Ser_FK` FOREIGN KEY (`N_Servicio`) REFERENCES `servicio_info` (`N_Servicio`)
);


DROP TABLE IF EXISTS `servicio_info`;

CREATE TABLE `servicio_info` (
  `N_Servicio` int DEFAULT NULL,
  `Tipo_Servicio` char(25) DEFAULT NULL,
  `Auto_Asoc` varchar(30) DEFAULT NULL,
  `Cliente_Asoc` varchar(20) DEFAULT NULL,
  `Empleado_Asoc` char(20) DEFAULT NULL,
  `Fecha_Servicio` datetime DEFAULT NULL,
  KEY `N_Servicio` (`N_Servicio`),
  KEY `Tipo_Servicio` (`Tipo_Servicio`),
  KEY `Auto_Asoc` (`Auto_Asoc`),
  KEY `Cliente_Asoc` (`Cliente_Asoc`),
  KEY `Fecha_Servicio` (`Fecha_Servicio`),
  KEY `Empleado_Asocc_idx` (`Empleado_Asoc`),
  CONSTRAINT `Auto_asoccc` FOREIGN KEY (`Auto_Asoc`) REFERENCES `car` (`patente`),
  CONSTRAINT `Cliente_Asoc` FOREIGN KEY (`Cliente_Asoc`) REFERENCES `info_cliente` (`rut`),
  CONSTRAINT `Empleado_ASOCC` FOREIGN KEY (`Empleado_Asoc`) REFERENCES `info_empleado` (`nombre`)
);



