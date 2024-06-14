/*
SQLyog Professional v12.09 (64 bit)
MySQL - 8.0.17 : Database - tushu
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tushu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `tushu`;

/*Table structure for table `book` */

DROP TABLE IF EXISTS `book`;

CREATE TABLE `book` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) NOT NULL,
  `price` decimal(30,0) DEFAULT NULL,
  `publication_date` date DEFAULT NULL,
  `publishing_house` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `book` */

insert  into `book`(`id`,`book_name`,`price`,`publication_date`,`publishing_house`) values (240,'The Great Gatsby','11','1925-04-10','Charles Scribner\'s Sons'),(241,'红楼梦','13','1791-01-01','曹雪芹'),(242,'To Kill a Mockingbird','8','1960-07-11','J.B. Lippincott & Co.'),(243,'三国演义','10','1522-01-01','罗贯中'),(244,'1984','7','1949-06-08','Secker & Warburg'),(245,'西游记','12','1592-01-01','吴承恩'),(246,'Pride and Prejudice','9','1813-01-28','T. Egerton'),(247,'水浒传','10','1589-01-01','施耐庵'),(248,'The Catcher in the Rye','6','1951-07-16','Little, Brown and Company'),(249,'The Hobbit','13','1937-09-21','George Allen & Unwin'),(250,'儒林外史','9','1750-01-01','吴敬梓'),(251,'Fahrenheit 451','10','1953-10-19','Ballantine Books'),(252,'聊斋志异','11','1740-01-01','蒲松龄'),(253,'Moby-Dick','12','1851-11-14','Harper & Brothers'),(254,'War and Peace','15','1869-01-01','The Russian Messenger'),(255,'呐喊','7','1923-01-01','鲁迅'),(256,'Great Expectations','7','1861-01-01','Chapman & Hall'),(257,'Jane Eyre','9','1847-10-16','Smith, Elder & Co.'),(258,'边城','7','1934-01-01','沈从文'),(259,'The Odyssey','10','0800-01-01','Ancient Greece'),(260,'围城','10','1947-01-01','钱钟书'),(261,'Crime and Punishment','8','1866-01-01','The Russian Messenger'),(262,'The Brothers Karamazov','11','1880-01-01','The Russian Messenger'),(263,'平凡的世界','13','1986-01-01','路遥'),(264,'Brave New World','9','1932-01-01','Chatto & Windus'),(265,'活着','8','1993-01-01','余华'),(266,'Wuthering Heights','7','1847-12-01','Thomas Cautley Newby'),(267,'白鹿原','12','1993-01-01','陈忠实'),(268,'The Divine Comedy','13','1320-01-01','Italy'),(269,'许三观卖血记','9','1995-01-01','余华'),(270,'Les Misérables','10','1862-01-01','A. Lacroix, Verboeckhoven & Cie'),(271,'Anna Karenina','12','1877-01-01','The Russian Messenger'),(272,'骆驼祥子','7','1936-01-01','老舍'),(273,'Don Quixote','14','1605-01-01','Francisco de Robles'),(274,'日出','8','1936-01-01','曹禺'),(275,'家','9','1933-01-01','巴金'),(276,'寒夜','7','1947-01-01','巴金'),(277,'围炉夜话','11','1851-01-01','袁枚'),(278,'','12','1740-01-01','蒲松龄'),(279,'','-2','1970-01-01',NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `realName` char(30) NOT NULL,
  `gender` char(20) DEFAULT NULL,
  `qq` char(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `mail` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`password`,`realName`,`gender`,`qq`,`phone`,`mail`) values (1,'1','1','1','man','1','1','1'),(2,'admin','123456','郑伊龙','man','1797344574','13479394730','1797344574@qq.com'),(3,'12','1','1','man','','',''),(4,'郑伊龙','1','1','','','',''),(5,'2','1','1','','','',''),(6,'123','1','1','','','',''),(7,'123123','123123','1111','','','','');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
