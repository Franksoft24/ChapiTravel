/*
Navicat MySQL Data Transfer

Source Server         : LocalhostMySql
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : chapi

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2014-11-28 19:10:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
`idcliente`  int(11) NOT NULL AUTO_INCREMENT ,
`idusuario`  int(11) NOT NULL ,
`nombres`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`apellidos`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`direccion`  varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`telefono`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cedula`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`cuentapaypal`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecharegistro`  datetime(1) NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idcliente`),
FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idusuario` (`idusuario`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of cliente
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for destino
-- ----------------------------
DROP TABLE IF EXISTS `destino`;
CREATE TABLE `destino` (
`iddestino`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`ubicacion`  varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`foto`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`iddestino`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of destino
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for facilidad
-- ----------------------------
DROP TABLE IF EXISTS `facilidad`;
CREATE TABLE `facilidad` (
`idfacilidad`  int(11) NOT NULL AUTO_INCREMENT ,
`iddestino`  int(11) NOT NULL ,
`idtipofacilidad`  int(11) NOT NULL ,
`descripcion`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idfacilidad`),
FOREIGN KEY (`iddestino`) REFERENCES `destino` (`iddestino`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idtipofacilidad`) REFERENCES `tipofacilidad` (`idtipofacilidad`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `iddestino` (`iddestino`) USING BTREE ,
INDEX `idtipofacilidad` (`idtipofacilidad`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of facilidad
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for factura
-- ----------------------------
DROP TABLE IF EXISTS `factura`;
CREATE TABLE `factura` (
`idfactura`  int(11) NOT NULL AUTO_INCREMENT ,
`idreservacion`  int(11) NOT NULL ,
`codreferencia`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fechafacturacion`  date NOT NULL ,
`subtotal`  double(9,2) NOT NULL ,
`itbis`  double(9,2) NOT NULL ,
`total`  double(9,2) NOT NULL ,
`comentario`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`habilitado`  tinyint(1) NOT NULL ,
PRIMARY KEY (`idfactura`),
FOREIGN KEY (`idreservacion`) REFERENCES `reservacion` (`idreservacion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idreservacion` (`idreservacion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of factura
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
`idproveedor`  int(11) NOT NULL AUTO_INCREMENT ,
`nombres`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`apellidos`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`identificacion`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'RNC para empresas o CEDULA para personas' ,
`direccion`  varchar(3000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`telefono`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`email`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`fecharegistro`  date NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idproveedor`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for reservacion
-- ----------------------------
DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE `reservacion` (
`idreservacion`  int(11) NOT NULL AUTO_INCREMENT ,
`idcliente`  int(11) NOT NULL ,
`idviaje`  int(11) NOT NULL ,
`cantidadpersonas`  int(3) NOT NULL ,
`estado`  int(1) NOT NULL COMMENT '2 = Confirmada\r\n3 = Cancelada\r\n1 = Pendiente' ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idreservacion`),
FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idviaje`) REFERENCES `viaje` (`idviaje`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idcliente` (`idcliente`) USING BTREE ,
INDEX `idviaje` (`idviaje`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of reservacion
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for reservacionservicio
-- ----------------------------
DROP TABLE IF EXISTS `reservacionservicio`;
CREATE TABLE `reservacionservicio` (
`idreservacionservicio`  int(11) NOT NULL AUTO_INCREMENT ,
`idservicio`  int(11) NOT NULL ,
`idreservacion`  int(11) NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idreservacionservicio`),
FOREIGN KEY (`idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`idreservacion`) REFERENCES `reservacion` (`idreservacion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idservicio` (`idservicio`) USING BTREE ,
INDEX `idreservacion` (`idreservacion`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of reservacionservicio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for ruta
-- ----------------------------
DROP TABLE IF EXISTS `ruta`;
CREATE TABLE `ruta` (
`idruta`  int(11) NOT NULL AUTO_INCREMENT ,
`idviaje`  int(11) NOT NULL ,
`iddestino`  int(11) NOT NULL ,
`orden`  int(9) NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idruta`),
FOREIGN KEY (`idviaje`) REFERENCES `viaje` (`idviaje`) ON DELETE RESTRICT ON UPDATE RESTRICT,
FOREIGN KEY (`iddestino`) REFERENCES `destino` (`iddestino`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idviaje` (`idviaje`) USING BTREE ,
INDEX `iddestino` (`iddestino`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of ruta
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for servicio
-- ----------------------------
DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
`idservicio`  int(11) NOT NULL AUTO_INCREMENT ,
`idproveedor`  int(11) NOT NULL ,
`codigo`  varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`descripcion`  varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`precio`  double(9,2) NOT NULL ,
`habilitado`  tinyint(1) NOT NULL ,
PRIMARY KEY (`idservicio`),
FOREIGN KEY (`idproveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
INDEX `idproveedor` (`idproveedor`) USING BTREE 
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of servicio
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for tipofacilidad
-- ----------------------------
DROP TABLE IF EXISTS `tipofacilidad`;
CREATE TABLE `tipofacilidad` (
`idtipofacilidad`  int(11) NOT NULL AUTO_INCREMENT ,
`nombre`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idtipofacilidad`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of tipofacilidad
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
`idusuario`  int(11) NOT NULL AUTO_INCREMENT ,
`username`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`password`  varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fecharegistro`  datetime(1) NOT NULL ,
`rol`  varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'CLI = Cliente\r\nEMP = Empleado cualquiera\r\nRAV = Representante de Viajes' ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idusuario`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of usuario
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for viaje
-- ----------------------------
DROP TABLE IF EXISTS `viaje`;
CREATE TABLE `viaje` (
`idviaje`  int(11) NOT NULL AUTO_INCREMENT ,
`descripcion`  varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`fechainicio`  date NOT NULL ,
`fechafin`  date NOT NULL ,
`precio`  double(9,2) NOT NULL ,
`foto`  varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL ,
`habilitado`  tinyint(1) NOT NULL DEFAULT 1 ,
PRIMARY KEY (`idviaje`)
)
ENGINE=InnoDB
DEFAULT CHARACTER SET=utf8 COLLATE=utf8_general_ci
AUTO_INCREMENT=1

;

-- ----------------------------
-- Records of viaje
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Auto increment value for cliente
-- ----------------------------
ALTER TABLE `cliente` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for destino
-- ----------------------------
ALTER TABLE `destino` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for facilidad
-- ----------------------------
ALTER TABLE `facilidad` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for factura
-- ----------------------------
ALTER TABLE `factura` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for proveedor
-- ----------------------------
ALTER TABLE `proveedor` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for reservacion
-- ----------------------------
ALTER TABLE `reservacion` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for reservacionservicio
-- ----------------------------
ALTER TABLE `reservacionservicio` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for ruta
-- ----------------------------
ALTER TABLE `ruta` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for servicio
-- ----------------------------
ALTER TABLE `servicio` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for tipofacilidad
-- ----------------------------
ALTER TABLE `tipofacilidad` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for usuario
-- ----------------------------
ALTER TABLE `usuario` AUTO_INCREMENT=1;

-- ----------------------------
-- Auto increment value for viaje
-- ----------------------------
ALTER TABLE `viaje` AUTO_INCREMENT=1;
