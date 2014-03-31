/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50616
 Source Host           : localhost
 Source Database       : ooyala

 Target Server Type    : MySQL
 Target Server Version : 50616
 File Encoding         : utf-8

 Date: 03/31/2014 10:22:56 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `idGroup` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(70) NOT NULL,
  `activeG` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idGroup`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `groups`
-- ----------------------------
BEGIN;
INSERT INTO `groups` VALUES ('1', 'LANG', '1'), ('2', 'BANG', '1'), ('3', 'YORK', '1'), ('4', 'Prairie Mountain Group', '1');
COMMIT;

-- ----------------------------
--  Table structure for `profile`
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `idProfile` int(11) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(50) NOT NULL,
  PRIMARY KEY (`idProfile`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `profile`
-- ----------------------------
BEGIN;
INSERT INTO `profile` VALUES ('1', 'Local Video Producer'), ('2', 'Local Editor'), ('3', 'Local Content Producer');
COMMIT;

-- ----------------------------
--  Table structure for `properties`
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `idProperty` int(11) NOT NULL AUTO_INCREMENT,
  `property_name` varchar(100) NOT NULL,
  `fkgroup` int(1) NOT NULL,
  `activeP` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idProperty`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `properties`
-- ----------------------------
BEGIN;
INSERT INTO `properties` VALUES ('1', 'LADaily News', '1', '1'), ('2', 'Inland Daily Bulletin', '1', '1'), ('3', 'LA.com', '1', '1'), ('4', 'Long Beach Press Telegram', '1', '1'), ('5', 'Pasadena Star-News', '1', '1'), ('6', 'Redlands Daily Facts', '1', '1'), ('7', 'San Bernardino Sun', '1', '1'), ('8', 'San Gabriel Valley Tribune', '1', '1'), ('9', 'Torrance Daily Breeze', '1', '1'), ('10', 'Whittier Daily News', '1', '1'), ('11', 'San Jose Mercury News', '2', '1'), ('12', 'Contra Costa Times', '2', '1'), ('13', 'Inside Bay Area', '2', '1'), ('14', 'York Daily', '3', '1'), ('15', 'Chambersburg - Public Opinion', '3', '1'), ('16', 'Evening Sun', '3', '1'), ('17', 'Lebanon Daily News', '3', '1'), ('18', 'York Dispatch', '3', '1'), ('19', 'BOULDER DAILY CAMERA', '4', '1'), ('20', 'BUFFZONE', '4', '1'), ('21', 'CANON CITY', '4', '1');
COMMIT;

-- ----------------------------
--  Table structure for `shareVideos`
-- ----------------------------
DROP TABLE IF EXISTS `shareVideos`;
CREATE TABLE `shareVideos` (
  `idShare` int(11) NOT NULL AUTO_INCREMENT,
  `idVideo` int(11) DEFAULT NULL,
  `idProperty` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `propertyToShare` int(11) DEFAULT NULL,
  PRIMARY KEY (`idShare`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `shareVideos`
-- ----------------------------
BEGIN;
INSERT INTO `shareVideos` VALUES ('18', '1', '3', '2', '12'), ('19', '1', '3', '2', '13'), ('20', '1', '3', '2', '19'), ('21', '1', '3', '2', '14');
COMMIT;

-- ----------------------------
--  Table structure for `upload`
-- ----------------------------
DROP TABLE IF EXISTS `upload`;
CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- ----------------------------
--  Table structure for `videos`
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_size` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tmp_name` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL,
  `producer` varchar(255) DEFAULT NULL,
  `datelocal` varchar(255) DEFAULT NULL,
  `datevendor` varchar(255) DEFAULT NULL,
  `imgprev` varchar(255) DEFAULT NULL,
  `embed_code` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `fk_idProperty` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `videos`
-- ----------------------------
BEGIN;
INSERT INTO `videos` VALUES ('1', '10549869', '1.mp4', '/Applications/XAMPP/xamppfiles/temp/phpGje3bl', 'this is a test', 'video Description ', '0', '2', '', '2014-03-24 18:06:20', '2014-03-26T14:09:31Z', '', 'E0azllbDoXacFHM7sNG-2V3G7WkdvDH0', '1', '3'), ('2', '10549869', '1.mp4', '/Applications/XAMPP/xamppfiles/temp/phpluguEy', '', 'video Description cc', null, '12', '', '2014-03-24 18:08:27', null, null, null, '0', '12'), ('3', '10549869', '1.mp4', '/Applications/XAMPP/xamppfiles/temp/php5TMPGy', 'property 3', 'Descripc', null, '2', '', '2014-03-24 18:49:14', null, null, null, '0', '3'), ('4', '10549869', '1.mp4', '/Applications/XAMPP/xamppfiles/temp/phpcghxUz', 'title', 'Descripc', '0', '2', '', '2014-03-24 18:50:21', '2014-03-24T18:04:32Z', '', 'l5cjNkbDpDVvdYowLS4oyZ9j9arXURdJ', '1', '14');
COMMIT;

-- ----------------------------
--  Table structure for `videosinfo`
-- ----------------------------
DROP TABLE IF EXISTS `videosinfo`;
CREATE TABLE `videosinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idvideo` int(11) DEFAULT NULL,
  `player` varchar(255) DEFAULT NULL,
  `expire` varchar(255) DEFAULT NULL,
  `label1` varchar(255) DEFAULT NULL,
  `label2` varchar(255) DEFAULT NULL,
  `label3` varchar(255) DEFAULT NULL,
  `labelnew` varchar(255) NOT NULL,
  `embed_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `videosinfo`
-- ----------------------------
BEGIN;
INSERT INTO `videosinfo` VALUES ('1', '1', '182e91b87daf4f4293431a5ace9f4b1e', '2014-03-31', '476b257cc2cb4bfdb9ab73d00b309dae', 'c74feb4817444ef785e38d1d4aa886d6', 'c4c27d081ff84fc8b7353677907c41bc', '', 'E0azllbDoXacFHM7sNG-2V3G7WkdvDH0'), ('2', '2', 'f05474081d184a0ab032228a27d267aa', '', 'c74feb4817444ef785e38d1d4aa886d6', '193ee99965034e43b770f67ea90eda18', '3cc70e1fbfe54468b3c78229db710e80', '', null), ('3', '3', '885205cc59194f7386b0da03a1f2e65d', '', 'c74feb4817444ef785e38d1d4aa886d6', 'c74feb4817444ef785e38d1d4aa886d6', 'c74feb4817444ef785e38d1d4aa886d6', '', null), ('4', '4', '885205cc59194f7386b0da03a1f2e65d', '', 'c74feb4817444ef785e38d1d4aa886d6', 'c74feb4817444ef785e38d1d4aa886d6', 'c74feb4817444ef785e38d1d4aa886d6', '', 'l5cjNkbDpDVvdYowLS4oyZ9j9arXURdJ');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
