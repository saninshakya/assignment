/*
Navicat MySQL Data Transfer

Source Server         : mysql-localhost
Source Server Version : 50153
Source Host           : localhost:3306
Source Database       : ait_su

Target Server Type    : MYSQL
Target Server Version : 50153
File Encoding         : 65001

Date: 2015-03-16 08:13:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ait_event`
-- ----------------------------
DROP TABLE IF EXISTS `ait_event`;
CREATE TABLE `ait_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `date` date DEFAULT NULL,
  `clock` text,
  `user_id` int(11) DEFAULT NULL,
  `delete_flg` int(16) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_event
-- ----------------------------
INSERT INTO `ait_event` VALUES ('133', '1', '2015-03-01', '00:00', null, '0');
INSERT INTO `ait_event` VALUES ('134', '2', '2015-03-02', '00:00', null, '0');
INSERT INTO `ait_event` VALUES ('135', '3', '2015-03-03', '00:00', null, '0');

-- ----------------------------
-- Table structure for `ait_role`
-- ----------------------------
DROP TABLE IF EXISTS `ait_role`;
CREATE TABLE `ait_role` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_role
-- ----------------------------
INSERT INTO `ait_role` VALUES ('1', 'Admin');
INSERT INTO `ait_role` VALUES ('2', 'Guest');

-- ----------------------------
-- Table structure for `ait_user`
-- ----------------------------
DROP TABLE IF EXISTS `ait_user`;
CREATE TABLE `ait_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ait_user
-- ----------------------------
INSERT INTO `ait_user` VALUES ('1', 'admin', 'admin', '1');
INSERT INTO `ait_user` VALUES ('2', 'user', 'user', '1');
INSERT INTO `ait_user` VALUES ('3', 'guest', 'guest', '2');
