/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : fourhundredwords

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-08-03 21:52:05
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
  `published_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stories
-- ----------------------------
INSERT INTO `stories` VALUES ('3', 'a', 'This is test 3 submitted test\nda\nasdf\nasd\nfasdf\nasdf\nasdf sdfwerasdfasdfasdf', '7', '2', '0', '0', '13', '2023-07-28 05:03:05', '1', '', '1', null);
INSERT INTO `stories` VALUES ('5', 'b', 'asdfasd\nfas\ndfa\nsdf\nas\ndfa\nsdf\nasdf', '31', '4', '0', '1', '8', '2023-07-29 02:27:36', '1', 'aasdfa\nsdf\nasd\nfa\nsdf\nas\ndf', '1', null);
INSERT INTO `stories` VALUES ('7', 'c', 'this is test 8this is test 8this is test 8this is test 8this is test 8this is test 8\nthis is test 8\nthis is test 8this is test 8this is test 8this is test 8this is test 8\nthis is test 8this is test 8this is test 8\n\nthis is test 8\nthis is test 8\nthis is test 8\nthis is test 8', '1', '2', '0', '0', '65', '2023-07-30 22:03:11', '1', '', '1', null);
INSERT INTO `stories` VALUES ('8', 'd', 'asdfasdf.\nasd\nfa\nsdfasdf', '1', '3', '0', '0', '4', '2023-07-31 21:41:27', '1', '', '1', null);
INSERT INTO `stories` VALUES ('9', 'e', 'asdfasdf.\nasd\nfa\nsdfasdfasdfasdfasdfaswer', '0', '2', '0', '0', '4', '2023-07-31 21:41:35', '1', '', '1', null);
INSERT INTO `stories` VALUES ('10', 'f', 'awerwerwer', '0', '2', '0', '1', '1', '2023-07-31 21:41:40', null, '', null, '2023-08-02 17:49:25');
INSERT INTO `stories` VALUES ('11', 'g', 'werasdfad', '0', '1', '0', '0', '1', '2023-07-31 21:46:29', '1', '', '1', null);
INSERT INTO `stories` VALUES ('12', 'h', 'werqwer', '0', '1', '0', '0', '1', '2023-07-31 22:43:49', '1', '', '1', null);
INSERT INTO `stories` VALUES ('13', 'i', 'sdfgsdfgsdfg asdfas\ndfa\nsdf\nas\ndf asdfasdf asdf asdf\n\n asdf asdf a\n asdfasdf', '0', '1', '0', '0', '13', '2023-07-31 22:43:53', '1', '', '1', null);
INSERT INTO `stories` VALUES ('14', 'm', 'swerasdfasdf', '0', '1', '0', '0', '1', '2023-07-31 22:43:58', '1', '', '1', null);
INSERT INTO `stories` VALUES ('15', 'l', null, null, '1', null, null, null, '2023-08-02 18:47:51', '1', null, '1', null);
INSERT INTO `stories` VALUES ('16', 'k', '$builder->orderBy(42, \'RANDOM\');\n// Produces: ORDER BY RAND(42)\nLimiting or Counting Results?\nLimit?\n$builder->limit()?\nLets you limit the number of rows you would like returned by the query:\n\n<?php\n\n$builder->limit(10);\n// Produces: LIMIT 10\nThe second parameter lets you set a result offset.\n\n<?php\n\n$builder->limit(10, 20);\n// Produces: LIMIT 20, 10 (in MySQL. Other databases have slightly different syntax)\n$builder->countAllResults()?\nPermits you to determine the number of rows in a particular Query Builder query. Queries will accept Query Builder restrictors such as where(), orWhere(), like(), orLike(), etc. Example:\n\n<?php$builder->orderBy(42, \'RANDOM\');\n// Produces: ORDER BY RAND(42)\nLimiting or Counting Results?\nLimit?\n$builder->limit()?\nLets you limit the number of rows you would like returned by the query:\n\n<?php\n\n$builder->limit(10);\n// Produces: LIMIT 10\nThe second parameter lets you set a result offset.\n\n<?php\n\n$builder->limit(10, 20);\n// Produces: LIMIT 20, 10 (in MySQL. Other databases have slightly different syntax)\n$builder->countAllResults()?\nPermits you to determine the number of rows in a particular Query Builder query. Queries will accept Query Builder restrictors such as where(), orWhere(), like(), orLike(), etc. Example:\n\n<?php$builder->orderBy(42, \'RANDOM\');\n// Produces: ORDER BY RAND(42)\nLimiting or Counting Results?\nLimit?\n$builder->limit()?\nLets you limit the number of rows you would like returned by the query:\n\n<?php\n\n$builder->limit(10);\n// Produces: LIMIT 10\nThe second parameter lets you set a result offset.\n\n<?php\n\n$builder->limit(10, 20);\n// Produces: LIMIT 20, 10 (in MySQL. Other databases have slightly different syntax)\n$builder->countAllResults()?\nPermits you to determine the number of rows in a particular Query Builder query. Queries will accept Query Builder restrictors such as where(), orWhere(), like(), orLike(), etc. Example:\n\n<?php$builder->orderBy(42, \'RANDOM\');\n// Produces: ORDER BY RAND(42)\nLimiting or Counting Results?\nLimit?\n$builder->limit()?\nLets you limit the number of rows you would like returned by the query:\n\n<?php\n\n$builder->limit(10);\n// Produces: LIMIT 10\nThe second parameter lets you set a result offset.\n\n<?php\n\n$builder->limit(10, 20);\n// Produces: LIMIT 20, 10 (in MySQL. Other databases have slightly different syntax)\n$builder->countAllResults()?\nPermits you to determine the number of rows in a particular Query Builder query. Queries will accept Query Builder restrictors such as where(), orWhere(), like(), orLike(), etc. Example:\n\n<?php$builder->orderBy(42, \'RANDOM\');\n// Produces: ORDER BY RAND(42)\nLimiting or Counting Results?\nLimit?\n$builder->limit()?\nLets you limit the number of rows you would like returned by the query:\n\n<?php\n\n$builder->limit(10);\n// Produces: LIMIT 10\nThe second parameter lets you set a result offset.\n\n<?php\n', '0', '1', '0', '0', '391', '2023-08-02 18:47:57', '1', '', '1', '2023-08-02 18:37:43');
INSERT INTO `stories` VALUES ('17', 'j', 'asdfasd\nfa\nsdf\nasdf', '0', '0', '0', '0', '4', '2023-08-02 18:48:03', '1', '', '1', '2023-08-02 17:49:07');
INSERT INTO `stories` VALUES ('18', 'ttt', 'asdfasdfasdf\nasd\nfa\nsdf', '0', '2', '0', '1', '4', '2023-08-02 18:38:05', '1', '', '1', '2023-08-02 18:40:20');
INSERT INTO `stories` VALUES ('19', 'ttt', 'asdfasdfasdf\nasd\nfa\nsdf', '0', '1', '0', '0', '4', '2023-08-02 18:38:14', '1', '', '1', '2023-08-02 21:53:22');
INSERT INTO `stories` VALUES ('20', 'ttt', 'asdfasdfasdf\nasd\nfa\nsdf', '0', '1', '0', '0', '4', '2023-08-02 18:38:40', '1', '', '1', '2023-08-02 21:53:26');
INSERT INTO `stories` VALUES ('21', 'ttt', 'asdfasdfasdf\nasd\nfa\nsdf', '0', '2', '0', '0', '4', '2023-08-02 18:39:03', '1', '', '1', '2023-08-02 18:40:10');
INSERT INTO `stories` VALUES ('22', 'asdfa', 'safasdfas', '0', '2', '0', '0', '1', '2023-08-02 21:52:34', '1', '', '1', '2023-08-02 21:53:32');
INSERT INTO `stories` VALUES ('23', 'asdfa', 'sdfasdf', '0', '1', '0', '0', '1', '2023-08-02 21:52:45', '1', '', '1', '2023-08-02 21:53:37');
INSERT INTO `stories` VALUES ('24', 'asdfag', 'asdfasdf', '0', '1', '0', '0', '1', '2023-08-02 21:53:11', '1', '', '1', '2023-08-02 21:54:20');
INSERT INTO `stories` VALUES ('25', 'asdf', 'asdfasdfasdf', '0', '2', '0', '0', '1', '2023-08-02 21:54:30', '1', '', '1', '2023-08-02 21:54:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of upvotes
-- ----------------------------
INSERT INTO `upvotes` VALUES ('2', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '10');
INSERT INTO `upvotes` VALUES ('3', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '6');
INSERT INTO `upvotes` VALUES ('4', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '7');
INSERT INTO `upvotes` VALUES ('5', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '5');
INSERT INTO `upvotes` VALUES ('6', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '3');
INSERT INTO `upvotes` VALUES ('7', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '8');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `role` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('3', 'admin1', '5a105e8b9d40e1329780d62ea2265d8a', 'superAdmin');

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of views
-- ----------------------------
INSERT INTO `views` VALUES ('1', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '5');
INSERT INTO `views` VALUES ('2', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '6');
INSERT INTO `views` VALUES ('3', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '3');
INSERT INTO `views` VALUES ('4', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '7');
INSERT INTO `views` VALUES ('5', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '8');
INSERT INTO `views` VALUES ('6', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '9');
INSERT INTO `views` VALUES ('7', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '10');
INSERT INTO `views` VALUES ('8', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '16');
INSERT INTO `views` VALUES ('9', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '18');
INSERT INTO `views` VALUES ('10', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '15');
INSERT INTO `views` VALUES ('11', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '21');
INSERT INTO `views` VALUES ('12', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '22');
INSERT INTO `views` VALUES ('13', '172.16.1.45', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36', '25');
INSERT INTO `views` VALUES ('14', '172.16.1.45', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36', '8');
