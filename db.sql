/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`database` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `database`;

/*Table structure for table `article_category` */

DROP TABLE IF EXISTS `article_category`;

CREATE TABLE `article_category` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(10) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

/*Data for the table `article_category` */

insert  into `article_category`(`id`,`category`,`reg_date`) values 
(1,'Email','2020-12-01 22:57:36'),
(2,'Internet','2020-12-01 21:47:07'),
(3,'Word','2020-12-01 21:47:14'),
(4,'Excel','2020-12-01 23:19:21'),
(19,'social','2020-12-01 22:33:13'),
(49,'asdfasdfds','2020-12-01 23:51:41'),
(50,'53454444','2020-12-01 23:53:23');

/*Table structure for table `article_content` */

DROP TABLE IF EXISTS `article_content`;

CREATE TABLE `article_content` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `article_content` */

insert  into `article_content`(`id`,`article_id`,`title`,`content`,`category`,`reg_date`) values 
(1,1,'article 1.1','<html>\n	<head>\n		<title>article 1.1</title>\n	</head>\n	<body>\n		article 1.1article 1.1article 1.1article 1.1article 1.1\n	</body>\n</html>','Email','2020-12-01 01:56:42'),
(2,2,'article 1.2','<html>\n	<head>\n		<title>article 1.2</title>\n	</head>\n	<body>\n		article 1.2article 1.2article 1.2article 1.2article 1.2article 1.2article 1.2\n	</body>\n</html>','Internet','2020-12-01 02:05:59'),
(3,3,'article 3.5','<html>\n	<head>\n		<title>article 3.5</title>\n	</head>\n	<body>\n		sgffgsdgsdfgsdfg\n	</body>\n</html>','Word','2020-12-01 02:06:32'),
(4,4,'React JS - Food Social Site','<html>\n	<head>\n		<title>React JS - Food Social Site</title>\n	</head>\n	<body>\n		asdfadsfdsafsdafdsaff\n	</body>\n</html>','Word','2020-12-01 02:10:10'),
(5,5,'fdsgfdsgfsdgsfdg','<html>\n	<head>\n		<title>fdsgfdsgfsdgsfdg</title>\n	</head>\n	<body>\n		sfgfsdgfsdgdsg\n	</body>\n</html>','Internet','2020-12-01 02:11:15'),
(6,6,'sdfgfdgfsgsdf','<html>\n	<head>\n		<title>sdfgfdgfsgsdf</title>\n	</head>\n	<body>\n		gfsdgfsdgsfdg\n	</body>\n</html>','Word','2020-12-01 02:12:18'),
(7,7,'fdgfsdgsfdgdfgfsdg','<html>\n	<head>\n		<title>fdgfsdgsfdgdfgfsdg</title>\n	</head>\n	<body>\n		sdfgfdssfdgsfdgs\n	</body>\n</html>','Excel','2020-12-01 02:12:42'),
(8,8,'sdfgfdsgsfdg','<html>\n	<head>\n		<title>sdfgfdsgsfdg</title>\n	</head>\n	<body>\n		fsdgfsdgsdgdsg\n	</body>\n</html>','Word','2020-12-01 02:13:15'),
(9,9,'sdfgfdsgsfdg444444444444','<html>\n	<head>\n		<title>sdfgfdsgsfdg444444444444</title>\n	</head>\n	<body>\n		fsdgfsdgsdgdsg44444444444\n	</body>\n</html>','Word','2020-12-01 02:13:24'),
(10,10,'adfsdfsadfdsafs','<html>\n	<head>\n		<title>adfsdfsadfdsafs</title>\n	</head>\n	<body>\n		adfsdfsfsadfsdafaf\n	</body>\n</html>','Excel','2020-12-01 02:16:19'),
(11,11,'social 1.1','<html>\n	<head>\n		<title>social 1.1</title>\n	</head>\n	<body>\n		social 1.1social 1.1social 1.1social 1.1social 1.1social 1.1social 1.1social 1.1\n	</body>\n</html>','social','2020-12-01 22:33:33'),
(12,12,'fffffffffffff','<html>\n	<head>\n		<title>fffffffffffff</title>\n	</head>\n	<body>\n		ffffffffffffffffffffff\n	</body>\n</html>','4444444444','2020-12-01 22:37:52'),
(13,13,'55555555555555555','<html>\n	<head>\n		<title>55555555555555555</title>\n	</head>\n	<body>\n		5555555555555555555555555\n	</body>\n</html>','5555555555','2020-12-01 22:39:41'),
(14,14,'ttttttttttttt','<html>\n	<head>\n		<title>ttttttttttttt</title>\n	</head>\n	<body>\n		tttttttttttttttttttt\n	</body>\n</html>','5555555555','2020-12-01 22:41:28'),
(15,15,'aaaaaaaaaaaaaaaaa','<html>\n	<head>\n		<title>aaaaaaaaaaaaaaaaa</title>\n	</head>\n	<body>\n		aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa\n	</body>\n</html>','aaaaaaaaaa','2020-12-01 22:42:05'),
(16,16,'ssssssssss','<html>\n	<head>\n		<title>ssssssssss</title>\n	</head>\n	<body>\n		ssssssssssssssss\n	</body>\n</html>','ssssssssss','2020-12-01 22:48:12'),
(17,17,'asadfsd','<html>\n	<head>\n		<title>asadfsd</title>\n	</head>\n	<body>\n		asdfasdfasdf\n	</body>\n</html>','aaaaaaaa','2020-12-01 23:24:40'),
(18,18,'fdfdffd','<html>\n	<head>\n		<title>fdfdffd</title>\n	</head>\n	<body>\n		fdfdffdfd\n	</body>\n</html>','asdfasdfds','2020-12-01 23:51:52'),
(19,19,'fdfdffdweewrwrew','<html>\n	<head>\n		<title>fdfdffdweewrwrew</title>\n	</head>\n	<body>\n		fdfdffdfdwerewrewr\n	</body>\n</html>','asdfasdfds','2020-12-01 23:51:55');

/*Table structure for table `article_role` */

DROP TABLE IF EXISTS `article_role`;

CREATE TABLE `article_role` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `article_role` */

insert  into `article_role`(`id`,`article_id`,`user_id`,`reg_date`) values 
(1,1,1,'2020-12-01 01:56:49'),
(2,1,2,'2020-12-01 01:58:03'),
(3,2,1,'2020-12-01 02:06:52'),
(4,2,2,'2020-12-01 02:06:52'),
(5,3,1,'2020-12-01 02:06:59'),
(6,3,2,'2020-12-01 02:06:59'),
(7,10,2,'2020-12-01 02:16:25'),
(8,4,2,'2020-12-03 16:42:21');

/*Table structure for table `article_title` */

DROP TABLE IF EXISTS `article_title`;

CREATE TABLE `article_title` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `category` varchar(10) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `article_title` */

insert  into `article_title`(`id`,`title`,`category`,`reg_date`) values 
(1,'article 1.1','Email','2020-12-01 01:56:42'),
(2,'article 1.2','Internet','2020-12-01 02:05:59'),
(3,'article 3.5','Word','2020-12-01 02:06:32'),
(4,'React JS - Food Social Site','Word','2020-12-01 02:10:10'),
(5,'fdsgfdsgfsdgsfdg','Internet','2020-12-01 02:11:14'),
(6,'sdfgfdgfsgsdf','Word','2020-12-01 02:12:18'),
(7,'fdgfsdgsfdgdfgfsdg','Excel','2020-12-01 02:12:42'),
(8,'sdfgfdsgsfdg','Word','2020-12-01 02:13:15'),
(9,'sdfgfdsgsfdg444444444444','Word','2020-12-01 02:13:24'),
(10,'adfsdfsadfdsafs','Excel','2020-12-01 02:16:19'),
(11,'social 1.1','social','2020-12-01 22:33:33'),
(12,'fffffffffffff','4444444444','2020-12-01 22:37:52'),
(13,'55555555555555555','5555555555','2020-12-01 22:39:41'),
(14,'ttttttttttttt','5555555555','2020-12-01 22:41:28'),
(15,'aaaaaaaaaaaaaaaaa','aaaaaaaaaa','2020-12-01 22:42:05'),
(16,'ssssssssss','ssssssssss','2020-12-01 22:48:12'),
(17,'asadfsd','aaaaaaaa','2020-12-01 23:24:40'),
(18,'fdfdffd','asdfasdfds','2020-12-01 23:51:52'),
(19,'fdfdffdweewrwrew','asdfasdfds','2020-12-01 23:51:55');

/*Table structure for table `site_title` */

DROP TABLE IF EXISTS `site_title`;

CREATE TABLE `site_title` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titleName` varchar(200) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `site_title` */

insert  into `site_title`(`id`,`titleName`,`reg_date`) values 
(13,'sdfdsfsffd','2020-12-04 04:13:47');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  `full_name` varchar(20) DEFAULT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`first_name`,`last_name`,`full_name`,`user_name`,`email`,`pass`,`role`,`reg_date`) values 
(1,'first name','last name','full name','user name','admin@gmail.com','admin123',1,'2020-12-01 01:56:30'),
(2,'M','Rider','M Rider','moon','moom@gmail.com','Asd@123',2,'2020-12-01 01:57:48'),
(3,'Ms','Rider','Ms Rider','moom@gmail.coms','moom@gmail.coms','Asd@123',2,'2020-12-03 16:45:22');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
