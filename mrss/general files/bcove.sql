/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50616
 Source Host           : localhost
 Source Database       : bcove

 Target Server Type    : MySQL
 Target Server Version : 50616
 File Encoding         : utf-8

 Date: 03/18/2014 18:51:08 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `properties`
-- ----------------------------
DROP TABLE IF EXISTS `properties`;
CREATE TABLE `properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `property` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `grupo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `properties`
-- ----------------------------
BEGIN;
INSERT INTO `properties` VALUES ('1', 'San Jose Mercury News', 'ZmqT9DWetp-25gyiy6LgV7-oSQghZsO99Gs_ozuWHY0.', 'BANG'), ('2', 'Contra Costa Times', 't88xHO25MU5KobDS7Cy2epra-O1sMbYTBno72BjzLuY.', 'BANG'), ('3', 'Inside Bay Area', '3xzz-NowiyBZfpH_tt6ng5hivoXwgRo1QhFQrqlUzU8.', 'BANG'), ('4', 'LADaily News', 'Uwcshahfk4WbrptNZdbwkXG3cTcUmz2-NgiMYd4RESU.', 'LANG'), ('5', 'Inland Daily Bulletin', 'q_4ThmOVjsdwWJ4nZOB9jUl3yVloy_vg-R-9a_j-ewA.', 'LANG'), ('6', 'LA.com', 'T3mMyzLlxJ_1QSVNd_Fg1DtFKaBT8BID-CnfiKZKW-o.', 'LANG'), ('7', 'Long Beach Press Telegram', 'gx87eTSjT0xhgYCTUlbmXJqQ1iQ-2OgMZWzfFgZCTB4.', 'LANG'), ('8', 'Pasadena Star-News', 'okE4AFHomkSknUrOb9zJKvWUUTe5I4t1fel6K3BD4WU.', 'LANG'), ('9', 'Redlands Daily Facts', '-ct_5DKCycNlKbrGTulHS-t5YMjYs5ZmBwmu4D2WCLQ.', 'LANG'), ('10', 'San Bernardino Sun', 'ZmqT9DWetp-8Rcwf1lpHG-mDxBo4i3YrVrq9fyTmt1M.', 'LANG'), ('11', 'San Gabriel Valley Tribune', 'ZmqT9DWetp8YMIRidR4YQzLFkKxCQOA39v8Cv_zqpe4.', 'LANG'), ('12', 'Torrance Daily Breeze', 'gYvHFERw6qblzRV9mHmAmLB3mMYCgjgPeklLAGFyYGY.', 'LANG'), ('13', 'Whittier Daily News', 'T3mMyzLlxJ-UEbgcuhLRofEUotDSGfE-7CAJmVyPxms.', 'LANG'), ('14', 'York Daily Record (formerly InYork)', '_HCkowACZOJAX_3ErQpPgPwoQN9DM7n7nxbaKr1NsSU.', 'YORK'), ('15', 'Chambersburg - Public Opinion', 'rqWco6nWqXOJnDHUM-E9vyQL3IMJnNLXq-HaXnTl9-o.', 'YORK'), ('16', 'Evening Sun', '3xzz-NowiyA7CoSf0OXoy-xaJeyGsl7b-IWJm0DiwTM.', 'YORK'), ('17', 'Lebanon Daily News', 'AfgpFv_zBH0YUA1kbbKp04tRuNOWbGTM15Y6Uqs9zBs.', 'YORK'), ('18', 'York Dispatch', 'uoxfQgVsRyOCg2gS-ECEPPEEKZvzS_AnBTUycZROAE0.', 'YORK'), ('19', 'Twincities - Pioneer Press', 'OUgjQsPN--7XwaWXPssptPjUqhbgM4ucs_pe4phTmtI.', 'STPAUL'), ('20', 'ChicoER', 'tvaXsaT2b4x9yiNpfOXZGrpoWBYjutYe2dbEbJLWeww.', 'NORCAL'), ('21', 'Eureka Times-Standard', 'XEd7FV_HTDrn9aK4-QO6FvhPvbkCnKdgg26VDyHNecY.', 'NORCAL'), ('22', 'Monterey Herald', 'sc1dzQ1lIJdjIiZq2rKNFud5DV2kS06thzPYpSSu9XE.', 'NORCAL'), ('23', 'Paradise Post', 'okE4AFHomkTTX_J_8gL_xFHLdk3xqtvGpEU58ndwAaQ.', 'NORCAL'), ('24', 'Times Herald-Vallejo', 'gYvHFERw6qZz6wPN_ta5HHaRCm5ispA6AtQMmt7a1Xg.', 'NORCAL'), ('25', 'The Denver Post', 'ZbifFq9DD7lB5_I8U64G2cLzuo4Y-MUBMFYESfjOuRY.', 'NORCAL'), ('26', 'Boulder Daily Camera', '_psG_4YIm53UbRRBcJKXNNqcZNdy3qPeZmVYR-kbiUM.', 'PMP'), ('27', 'BuffZone', '0vUNF0w7RiaXXIjy5PFnmTXo5A3Y1FnNbJOtobOMrVUst2YELd07Ag..', 'PMP'), ('28', 'Canon City', 'I9v1BFyzjndiTvy5ieEWgXWjfEJc14cRaMiPL-LR3StxfHlMba3wRw..', 'PMP'), ('29', 'Colorado Daily', 'Nii8RBqNPEkP0nEaJN7kr_Ea8_QgkI0-Jam4EzWMlvqv8JVsoyZlwg..', 'PMP'), ('30', 'Journal Advocate', 'IEfW7dHpbZsFCjAyz-PI2KGu4gyo4Z5KvHdw56ZCy48CaokgFbIG6Q..', 'PMP'), ('31', 'Longmont Times Call', 'lfgjxJBnMM0xQkicq6ZN5aEjyOi_YeIRBXY_Ejc9S6X1Gf-U6Pss8w..', 'PMP'), ('32', 'Loveland Herald-Reporter', 'BNDVpy3YUke1q5ZqE_1493aMkZSDLMRLQCt7xnGalBAJyCVCIXwlLQ..', 'PMP'), ('33', 'Burleson', 'kKTa8Kavnkfa2ot-7y0v60WGwdbgv3e_gxm7Kv2SibnSu_joFPAXiA..', 'STAR'), ('34', 'Crowley', 'bs1hBp05xQLp-M8iN3TF2kJyUwBD3PuUw7lew7slLyY.', 'STAR'), ('35', 'Alvarado Star', 'jOYAk1hAUssJpgQ_mT4dxbEsbOy23MXPcYGMOPz_ITD2qA8i33OnZQ..', 'STAR'), ('36', 'Carlsbard (current argus)', 'a0029J3u9NC-qJH4jgg8jTmh2HJ4j-7D5LpdwrGl0F1B2_jYZZ6bLg..', 'TEXMEX'), ('37', 'El Paso Times', 'XEd7FV_HTDrIt_zSGHwU4GDk_D2YXcfjrkoQZPemD7A.', 'TEXMEX'), ('38', 'Farmington Daily Times', 'AS2d0DV_154AYg6IST7lDCaR-YAK1gvn60cqu58Ln-GGB_u6tAC5ZQ..', 'TEXMEX'), ('39', 'Media One Utah', 'YQ6n_FybTnBtCdq7_PsjB-3Oa2gTypPisPI_nsTgax8.', 'UTAH'), ('40', 'Graham Leader', 'EnEpHqGoKPjJcgoJV50mCALh3TuqsKdw5mIugHlsQ6rlZA4CFad8Qg..', 'TX');
COMMIT;

-- ----------------------------
--  Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `idlogin` int(11) NOT NULL AUTO_INCREMENT,
  `userL` varchar(255) DEFAULT NULL,
  `passL` varchar(255) DEFAULT NULL,
  `actL` varchar(255) DEFAULT NULL,
  `property` int(3) NOT NULL,
  `admin` int(1) NOT NULL DEFAULT '0',
  `profile` int(1) NOT NULL,
  PRIMARY KEY (`idlogin`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `usuarios`
-- ----------------------------
BEGIN;
INSERT INTO `usuarios` VALUES ('1', 'admin', '202cb962ac59075b964b07152d234b70', '1', '0', '1', '0');
COMMIT;

