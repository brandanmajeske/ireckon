# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.15)
# Database: irdb
# Generation Time: 2013-02-27 12:34:22 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `categorytitle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;

INSERT INTO `category` (`categoryid`, `categorytitle`)
VALUES
	(1,'Homework'),
	(2,'Chores'),
	(3,'Finances'),
	(4,'Grocery Shopping');

/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table item
# ------------------------------------------------------------

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemtitle` varchar(50) NOT NULL,
  `itemdate` date NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `itemtext` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;

INSERT INTO `item` (`id`, `itemtitle`, `itemdate`, `categoryid`, `itemtext`)
VALUES
	(1,'Reading','2013-02-05',1,'Reading PHP text book chapter 2 - 5'),
	(2,'Cleaning','2013-02-12',2,'Clean the kitchen'),
	(3,'Bills','2013-02-13',3,'Pay gas bill'),
	(4,'Grocery','2013-02-15',4,'Get milk and eggs');

/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table items
# ------------------------------------------------------------

DROP TABLE IF EXISTS `items`;

CREATE TABLE `items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `category` varchar(50) DEFAULT NULL,
  `item_text` text,
  `item_title` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;

INSERT INTO `items` (`id`, `user_name`, `category`, `item_text`, `item_title`)
VALUES
	(1,'brandan','Kids','Give Jane a big hug!','Give Jane a big hug!'),
	(2,'brandan','Kids','Give Jordan a big hug!','Give Jordan a big hug!'),
	(3,'brandan','Evening routine','Cook some tasty dinner and eat it.','Cook some tasty dinner and eat it.'),
	(4,'brandan','Homework','Some math assignment','Some math assignment'),
	(5,'brandan','BDF1302','Add styles to action list.','Add styles to action list.'),
	(6,'brandan','Homework','Testing the iReckon item list CRUD.','Testing the iReckon item list CRUD.'),
	(8,'Jordan','Behaviors','Time to go to sleep!','Time to go to sleep!'),
	(9,'jane','Sleep','Sleepytime','Sleepytime'),
	(10,'jane','Music','Time to dance to the music','Time to dance to the music'),
	(11,'brandan','Work','do some math for the quarterly totals.','Calculate Quarterly Totals');

/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `about` text,
  PRIMARY KEY (`id`),
  KEY `user_name` (`user_name`),
  CONSTRAINT `profiles_ibfk_1` FOREIGN KEY (`user_name`) REFERENCES `users` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;

INSERT INTO `profiles` (`id`, `user_name`, `about`)
VALUES
	(1,'brandan','This is brandans profile.');

/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `full_name` varchar(50) DEFAULT NULL,
  `salt` varchar(10) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `UX_name` (`user_name`),
  UNIQUE KEY `UX_name_password` (`password`,`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`user_id`, `user_name`, `password`, `full_name`, `salt`, `email`)
VALUES
	(1,'brandan','bed912739730c294acb13eecfce3385b','Brandan Majeske','jfshskjd','brandan@bmaj.com'),
	(17,'brian','19c52f38111ffbd02a709670d61997a1','brianmajeske','1361847372','bmajeske@fullsail.edu'),
	(18,'jane','5c77994677d6fd87d82622b11e111fc5','jane','1361847495','j@j.com'),
	(19,'Jordie','12775cc585759b5c989af8a2741e3b94','Jordan Majeske','1361847718','jordie@jordan.com'),
	(20,'Jill','c1c0c18245a4dc0ee38f15a31214c1ec','Jill Jackson','1361851987','jill@jill.com'),
	(21,'brodie','b3949cfc85a8606e1393eee2a4e31763','brodie bee','1361918153','bb@brodiebee.com'),
	(22,'jessica','a1c2b67dcb24a3785822385feed1a84a','jessica rabbit','1361918541','jr@bunnie.com'),
	(23,'jordan','11daaca4daee3fc25bc010fd71791cf7','jordan','1361939093','jordan@jd.com');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
