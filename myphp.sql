/*
Navicat MySQL Data Transfer

Source Server         : easyphp
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : myphp

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-03-20 10:06:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for easy_basic
-- ----------------------------
DROP TABLE IF EXISTS `easy_basic`;
CREATE TABLE `easy_basic` (
  `id` int(11) NOT NULL,
  `web_title` varchar(255) DEFAULT NULL,
  `web_email` varchar(255) DEFAULT NULL,
  `web_copyright` varchar(255) DEFAULT NULL,
  `seo_keyword` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_count` varchar(255) DEFAULT NULL,
  `basic_num` int(11) DEFAULT NULL,
  `basic_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_basic
-- ----------------------------
INSERT INTO `easy_basic` VALUES ('1', 'E..yPHP', 'kyomini@qq.com', 'Copyright © 2018 - 2019 www.kyotos.top By NaokiOno All Rights Reserved.', '无MVC,简单,PHP,MYSQL,喜欢', '史上最简单的无MVC框架思想的老PHP', '##', '5', 'gif, jpg,jpeg,png,bmp');

-- ----------------------------
-- Table structure for easy_category
-- ----------------------------
DROP TABLE IF EXISTS `easy_category`;
CREATE TABLE `easy_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT NULL,
  `cate_name` varchar(255) DEFAULT NULL,
  `cate_keyword` varchar(255) DEFAULT NULL,
  `cate_description` varchar(255) DEFAULT NULL,
  `cate_url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_category
-- ----------------------------
INSERT INTO `easy_category` VALUES ('1', '0', 'CN / ChangChun', '长春印象', '「古朴和清新」人生80%的时间在这里。', '#', '1');
INSERT INTO `easy_category` VALUES ('2', '0', '纽约', 'newyork', 'newyork', '#', '2');
INSERT INTO `easy_category` VALUES ('3', '0', '日本', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for easy_content
-- ----------------------------
DROP TABLE IF EXISTS `easy_content`;
CREATE TABLE `easy_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_pid` int(11) DEFAULT NULL,
  `content_title` varchar(255) DEFAULT NULL,
  `content_keyword` varchar(255) DEFAULT NULL,
  `content_description` varchar(255) DEFAULT NULL,
  `content_thumbnail` varchar(255) DEFAULT NULL,
  `content_text` varchar(255) DEFAULT NULL,
  `content_time` varchar(255) NOT NULL,
  `content_draft` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_content
-- ----------------------------
INSERT INTO `easy_content` VALUES ('1', '1', '测试', '测试', '测试', '测试', '测试测试测试![](http://127.0.0.1/Public/Uploads/HCIgC_IMG_51881.png)', '1552978511', '1');
INSERT INTO `easy_content` VALUES ('2', '3', '魅力的樱花啊樱花', '魅力的樱花啊樱花', '魅力的樱花啊樱花', '@', '魅力的樱花啊樱花', '1553041055', '1');
INSERT INTO `easy_content` VALUES ('3', '2', '厉害了我的国', '厉害了', '厉害了', '@', '厉害了我的国', '1553041073', '1');
INSERT INTO `easy_content` VALUES ('4', '2', '真他妈讨厌', '真他妈讨厌', '真他妈讨厌', '#', '真他妈讨厌真他妈讨厌', '1553041094', '1');
INSERT INTO `easy_content` VALUES ('5', '1', '真他妈讨厌2', '真他妈讨厌2', '真他妈讨厌2', '@', '真他妈讨厌2真他妈讨厌2', '1553041116', '1');
INSERT INTO `easy_content` VALUES ('6', '1', '你这SB跟屁虫', '你这SB跟屁虫', '你这SB跟屁虫', '你这SB跟屁虫', '你这SB跟屁虫', '1553041125', '1');
INSERT INTO `easy_content` VALUES ('7', '3', '日本文化', '日本文化', '日本文化', '日本文化', '日本有太多的文化', '1553041271', '1');

-- ----------------------------
-- Table structure for easy_counter
-- ----------------------------
DROP TABLE IF EXISTS `easy_counter`;
CREATE TABLE `easy_counter` (
  `counter` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_counter
-- ----------------------------
INSERT INTO `easy_counter` VALUES ('30');

-- ----------------------------
-- Table structure for easy_user
-- ----------------------------
DROP TABLE IF EXISTS `easy_user`;
CREATE TABLE `easy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of easy_user
-- ----------------------------
INSERT INTO `easy_user` VALUES ('1', 'admin', '小野', 'c81e728d9d4c2f636f067f89cc14862c', 'kyomini@qq.com', 'https://avatars1.githubusercontent.com/u/7269988?s=460&v=4', '2');
