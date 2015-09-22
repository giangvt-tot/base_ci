/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : hoc-thanh-tai

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-09-22 22:10:25
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for htt_article
-- ----------------------------
DROP TABLE IF EXISTS `htt_article`;
CREATE TABLE `htt_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_article
-- ----------------------------

-- ----------------------------
-- Table structure for htt_card
-- ----------------------------
DROP TABLE IF EXISTS `htt_card`;
CREATE TABLE `htt_card` (
  `id` int(11) NOT NULL,
  `code` int(20) NOT NULL COMMENT 'Mã thẻ cào',
  `series` varchar(50) NOT NULL COMMENT 'series thẻ cào',
  `deadline` date DEFAULT NULL COMMENT 'Hạn sử dụng',
  `deadline_unix` int(20) NOT NULL COMMENT 'Hạn sử dụng, dạng Timestamp',
  PRIMARY KEY (`id`,`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_card
-- ----------------------------

-- ----------------------------
-- Table structure for htt_category
-- ----------------------------
DROP TABLE IF EXISTS `htt_category`;
CREATE TABLE `htt_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_category
-- ----------------------------

-- ----------------------------
-- Table structure for htt_course
-- ----------------------------
DROP TABLE IF EXISTS `htt_course`;
CREATE TABLE `htt_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_course
-- ----------------------------

-- ----------------------------
-- Table structure for htt_faqs
-- ----------------------------
DROP TABLE IF EXISTS `htt_faqs`;
CREATE TABLE `htt_faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_faqs
-- ----------------------------

-- ----------------------------
-- Table structure for htt_feedback
-- ----------------------------
DROP TABLE IF EXISTS `htt_feedback`;
CREATE TABLE `htt_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_feedback
-- ----------------------------

-- ----------------------------
-- Table structure for htt_payment
-- ----------------------------
DROP TABLE IF EXISTS `htt_payment`;
CREATE TABLE `htt_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_payment
-- ----------------------------

-- ----------------------------
-- Table structure for htt_pay_log
-- ----------------------------
DROP TABLE IF EXISTS `htt_pay_log`;
CREATE TABLE `htt_pay_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_pay_log
-- ----------------------------

-- ----------------------------
-- Table structure for htt_permission
-- ----------------------------
DROP TABLE IF EXISTS `htt_permission`;
CREATE TABLE `htt_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `permission` text,
  `value` int(3) DEFAULT NULL,
  `status` int(3) DEFAULT '1' COMMENT '0: quyền ko có hiệu lực, 1: quyền có hiệu lực',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_permission
-- ----------------------------
INSERT INTO `htt_permission` VALUES ('1', '1', '*.*', '1', '1');

-- ----------------------------
-- Table structure for htt_role
-- ----------------------------
DROP TABLE IF EXISTS `htt_role`;
CREATE TABLE `htt_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_role
-- ----------------------------

-- ----------------------------
-- Table structure for htt_user
-- ----------------------------
DROP TABLE IF EXISTS `htt_user`;
CREATE TABLE `htt_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT '1' COMMENT 'Trạng thái hoạt động: 0->đã xóa, 1->bình thường',
  `phone` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of htt_user
-- ----------------------------
INSERT INTO `htt_user` VALUES ('1', 'giangvt', 'c6c4a74bac421980c11025580ba8b003b3dc7cf7', 'giangvt.sami@gmail.com', '23', 'VN', '1', null);
INSERT INTO `htt_user` VALUES ('2', 'test', 'sss', 'asd', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('3', 'test', 'sss', 'asd', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('4', 'test', 'sss', 'asd', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('5', 'test', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('6', 'test', 'sss', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('7', '\"name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('8', '`name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('9', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('10', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('11', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('12', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('13', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('14', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('15', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('16', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('17', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('18', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('19', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('20', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('21', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('22', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('23', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('24', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('25', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('26', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('27', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('28', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('29', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('30', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('31', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('32', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('33', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('34', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('35', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('36', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('37', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('38', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('39', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('40', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('41', '\"name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('42', '`name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('43', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('44', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('45', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('46', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('47', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('48', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('49', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('50', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('51', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('52', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('53', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('54', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('55', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('56', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('57', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('58', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('59', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('60', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('61', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('62', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('63', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('64', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('65', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('66', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('67', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('68', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('69', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('70', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('71', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('72', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('73', '\'name', '', '', null, null, '1', null);
INSERT INTO `htt_user` VALUES ('74', '\'name', '', '', null, null, '1', null);
