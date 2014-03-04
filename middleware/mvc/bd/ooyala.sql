/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 50615
 Source Host           : localhost
 Source Database       : ooyala

 Target Server Type    : MySQL
 Target Server Version : 50615
 File Encoding         : utf-8

 Date: 03/04/2014 12:35:27 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `userL` varchar(255) DEFAULT NULL,
  `passL` varchar(255) DEFAULT NULL,
  `actL` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `usuarios`
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('1', 'admin', '123', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
