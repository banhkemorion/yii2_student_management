/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : student_management

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-10-22 21:41:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for account
-- ----------------------------
DROP TABLE IF EXISTS `account`;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(255) DEFAULT '1',
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of account
-- ----------------------------
INSERT INTO `account` VALUES ('1', 'trung', '123456', '1', null, null);
INSERT INTO `account` VALUES ('2', 'trung2', '$2y$13$WvVsVtE.qyjcOTEuhIDXUORJDVjihEynG6RcIzw./LBwEcWiClM/C', '1', null, null);
INSERT INTO `account` VALUES ('3', 'trung3', '$2y$13$ILXj6H9BaWWyFq7WiA72EugFOc.dVGHI7dRt9WpElwhlic7mSubTy', '1', null, null);

-- ----------------------------
-- Table structure for class_room
-- ----------------------------
DROP TABLE IF EXISTS `class_room`;
CREATE TABLE `class_room` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of class_room
-- ----------------------------
INSERT INTO `class_room` VALUES ('1', 'PT1111', '1');
INSERT INTO `class_room` VALUES ('2', 'MUL11', '1');
INSERT INTO `class_room` VALUES ('5', 'MARKETING', '1');
INSERT INTO `class_room` VALUES ('6', 'PTS', '1');
INSERT INTO `class_room` VALUES ('7', 'WEB', '1');
INSERT INTO `class_room` VALUES ('12', 'Marketingh', '0');
INSERT INTO `class_room` VALUES ('13', 'PT2222', '0');
INSERT INTO `class_room` VALUES ('14', 'PT123', '0');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(255) DEFAULT NULL,
  `icon` blob,
  `class_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('1', 'photoshop', null, '1', '0');
INSERT INTO `subject` VALUES ('2', 'tieng anh 1.1', null, '2', '0');
INSERT INTO `subject` VALUES ('3', 'php1', null, '2', '0');
INSERT INTO `subject` VALUES ('4', 'php2', null, '1', '1');
INSERT INTO `subject` VALUES ('5', 'php3', null, '1', '0');
INSERT INTO `subject` VALUES ('6', 'php3', null, '1', '1');
INSERT INTO `subject` VALUES ('7', 'tieng anh 1.1', null, '1', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `firt_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `notes` text,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('15', 'trung', null, null, null, 'uploads/Beautiful-Design-Game-004-1476213328.jpg', '1', null, '0');
INSERT INTO `user` VALUES ('16', 'trungdq', null, null, null, 'uploads/10845962_406559302833248_1184036714200965006_n-1476199653.jpg', '1', null, '0');
INSERT INTO `user` VALUES ('17', 'trungdq', null, null, null, 'uploads/10845962_406559302833248_1184036714200965006_n-1476200923.jpg', '1', null, '1');
INSERT INTO `user` VALUES ('18', 'TRUNGDQ123', null, null, null, 'uploads/11998690_902174429850911_432283536_n-1476200931.jpg', '1', null, '1');
INSERT INTO `user` VALUES ('19', 'z czx11111111221212', null, null, null, 'uploads/Beautiful-Design-Game-004-1476201977.jpg', '1', null, '0');
INSERT INTO `user` VALUES ('20', 'trungdq3434', null, null, null, 'uploads/user.png', '1', null, '1');
INSERT INTO `user` VALUES ('21', '1212', null, null, null, 'uploads/user.png', '1', null, '0');
INSERT INTO `user` VALUES ('22', 'trungdq34', null, null, null, 'uploads/user/user.png', '1', null, '1');
INSERT INTO `user` VALUES ('23', '111', null, null, null, 'uploads/user/user.png', '2', null, '0');
INSERT INTO `user` VALUES ('24', 'qwqw', null, null, null, 'uploads/user/user.png', '1', null, '0');
INSERT INTO `user` VALUES ('25', 'qwe', null, null, null, 'uploads/Beautiful-Design-Game-004-1476206727.jpg', '1', null, '0');
INSERT INTO `user` VALUES ('26', 't11111', null, null, null, 'uploads/user/user.png', '1', null, '0');
INSERT INTO `user` VALUES ('27', 'adasd', null, null, null, 'uploads/cover_764246610310952_1421728720318-1476997578.png', '1', null, '0');
INSERT INTO `user` VALUES ('28', 'trungdq3434', null, null, null, 'uploads/1782066_712942458774701_7726720722105478730_n-1476212025.jpg', '1', null, '0');
INSERT INTO `user` VALUES ('32', 'pt121212', null, null, '12345', null, '1', null, '0');
INSERT INTO `user` VALUES ('33', 'admin23', null, null, '12345', 'uploads/cover_764246610310952_1421728720318-1476989415.png', '1', null, '0');
