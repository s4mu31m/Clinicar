-- Active: 1664081338245@@127.0.0.1@3306@clinicar
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
  CONSTRAINT `Fk_Cliente_asoc` FOREIGN KEY (`Cliente_Agen`) REFERENCES `info_cliente` (`Rut`),
  CONSTRAINT `Fk_Fecha_Serv` FOREIGN KEY (`Hora_Agen`) REFERENCES `servicio_info` (`Fecha_Servicio`),
  CONSTRAINT `Fk_Patente_Due` FOREIGN KEY (`Patente_Auto`) REFERENCES `auto` (`Patente`),
  CONSTRAINT `Fk_Tipo_Serv` FOREIGN KEY (`Tipo_Servicio`) REFERENCES `servicio_info` (`Tipo_Servicio`)
);

LOCK TABLES `agendamiento` WRITE;

INSERT INTO `agendamiento` VALUES ('DB-J5-99','Pascual Peralta','2022-10-22 00:00:00','Lavado Chasis');

DROP TABLE IF EXISTS `auto`;

CREATE TABLE `auto` (
  `Patente` varchar(10) NOT NULL,
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
  PRIMARY KEY (`Patente`),
  KEY `Patente` (`Patente`),
  CONSTRAINT `Fk_Dueño_Auto` FOREIGN KEY (`Patente`) REFERENCES `cliente` (`Rut`)
);


LOCK TABLES `auto` WRITE;

INSERT INTO `auto` VALUES ('DB-J5-99',2021,'5W30','8L','Rojo','F-150','3,0','Bencina','Ford','C-26035/1','PF950/12');

UNLOCK TABLES;

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `Rut` varchar(20) NOT NULL,
  PRIMARY KEY (`Rut`),
  KEY `Rut` (`Rut`),
  CONSTRAINT `Fk_Auto_Dueño` FOREIGN KEY (`Rut`) REFERENCES `info_cliente` (`Rut`),
  CONSTRAINT `Fk_Auto_Prop` FOREIGN KEY (`Rut`) REFERENCES `auto` (`Patente`),
  CONSTRAINT `Fk_Info_Cliente` FOREIGN KEY (`Rut`) REFERENCES `info_cliente` (`Rut`)
);

LOCK TABLES `cliente` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `empleado`;

CREATE TABLE `empleado` (
  `Cod_Empleado` int DEFAULT NULL,
  KEY `Cod_Empleado` (`Cod_Empleado`),
  CONSTRAINT `Cod_Fk_Empleado` FOREIGN KEY (`Cod_Empleado`) REFERENCES `info_empleado` (`Cod_Empleado`),
  CONSTRAINT `Empleado_Serv` FOREIGN KEY (`Cod_Empleado`) REFERENCES `servicio` (`N_Servicio`)
);

LOCK TABLES `empleado` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `info_cliente`;

CREATE TABLE `info_cliente` (
  `Rut` varchar(20) NOT NULL,
  `nombre` char(20) DEFAULT NULL,
  `apellido` char(20) DEFAULT NULL,
  `auto` varchar(30) DEFAULT NULL,
  `telefono` int DEFAULT NULL,
  PRIMARY KEY (`Rut`),
  KEY `Rut` (`Rut`),
  CONSTRAINT `Fk_Info_Cliente_` FOREIGN KEY (`Rut`) REFERENCES `auto` (`Patente`)
);

INSERT INTO `info_cliente` VALUES ('27169879-8','César','Linares','Chevrolet Spark',936936243),('27169879-K','Samuel','Montiel','Audi A8',936936224),('6289643-0','Pascual','Peralta','Ford F-150',936936242);


UNLOCK TABLES;

DROP TABLE IF EXISTS `info_empleado`;

CREATE TABLE `info_empleado` (
  `Cod_Empleado` int DEFAULT NULL,
  `nombre` char(10) DEFAULT NULL,
  `apellido` char(10) DEFAULT NULL,
  KEY `Cod_Empleado` (`Cod_Empleado`),
  KEY `nombre` (`nombre`),
  CONSTRAINT `Fk_EmpleadoCOd_` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleado` (`Cod_Empleado`)
);

LOCK TABLES `info_empleado` WRITE;

UNLOCK TABLES;

DROP TABLE IF EXISTS `servicio`;

CREATE TABLE `servicio` (
  `N_Servicio` int DEFAULT NULL,
  KEY `N_Servicio` (`N_Servicio`),
  CONSTRAINT `Ser_FK` FOREIGN KEY (`N_Servicio`) REFERENCES `servicio_info` (`N_Servicio`)
);


LOCK TABLES `servicio` WRITE;

UNLOCK TABLES;

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
  CONSTRAINT `Auto_asoccc` FOREIGN KEY (`Auto_Asoc`) REFERENCES `auto` (`Patente`),
  CONSTRAINT `Cliente_Asoc` FOREIGN KEY (`Cliente_Asoc`) REFERENCES `info_cliente` (`Rut`),
  CONSTRAINT `Empleado_ASOCC` FOREIGN KEY (`Empleado_Asoc`) REFERENCES `info_empleado` (`nombre`)
);


LOCK TABLES `servicio_info` WRITE;

UNLOCK TABLES;

