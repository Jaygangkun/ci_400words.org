/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : fourhundredwords

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-07-30 23:11:58
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `stories`
-- ----------------------------
DROP TABLE IF EXISTS `stories`;
CREATE TABLE `stories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `content` text,
  `upvotes` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `is_best_of` tinyint(4) DEFAULT NULL,
  `is_home` tinyint(4) DEFAULT NULL,
  `words` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `is_show` tinyint(4) DEFAULT NULL,
  `notes` text,
  `is_publish` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stories
-- ----------------------------
INSERT INTO `stories` VALUES ('3', 'test1', 'This is test 3 submitted test\nda\nasdf\nasd\nfasdf\nasdf\nasdf sdfwerasdf', '6', '2', '0', '0', '13', '2023-07-28 05:03:05', '1', null, '1');
INSERT INTO `stories` VALUES ('5', 'testaa', 'asdfasd\nfas\ndfa\nsdf\nas\ndfa\nsdf\nasdf', '3', '4', '0', '1', '8', '2023-07-29 02:27:36', null, 'aasdfa\nsdf\nasd\nfa\nsdf\nas\ndf', '1');
INSERT INTO `stories` VALUES ('7', 'test8', 'this is test 8this is test 8this is test 8this is test 8this is test 8this is test 8\nthis is test 8\nthis is test 8this is test 8this is test 8this is test 8this is test 8\nthis is test 8this is test 8this is test 8\n\nthis is test 8\nthis is test 8\nthis is test 8\nthis is test 8', '1', '2', '0', '0', '65', '2023-07-30 22:03:11', '1', '', '1');

-- ----------------------------
-- Table structure for `upvotes`
-- ----------------------------
DROP TABLE IF EXISTS `upvotes`;
CREATE TABLE `upvotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(256) DEFAULT NULL,
  `user_browser` varchar(256) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of upvotes
-- ----------------------------
INSERT INTO `upvotes` VALUES ('2', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '5');
INSERT INTO `upvotes` VALUES ('3', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '6');
INSERT INTO `upvotes` VALUES ('4', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '7');

-- ----------------------------
-- Table structure for `views`
-- ----------------------------
DROP TABLE IF EXISTS `views`;
CREATE TABLE `views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_ip` varchar(256) DEFAULT NULL,
  `user_browser` varchar(256) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of views
-- ----------------------------
INSERT INTO `views` VALUES ('1', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '5');
INSERT INTO `views` VALUES ('2', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '6');
INSERT INTO `views` VALUES ('3', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '3');
INSERT INTO `views` VALUES ('4', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '7');
