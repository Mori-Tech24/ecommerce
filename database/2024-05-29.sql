/*
SQLyog Community v13.2.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - autocart
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`autocart` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `autocart`;

/*Table structure for table `tbl_attendance` */

DROP TABLE IF EXISTS `tbl_attendance`;

CREATE TABLE `tbl_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `bio_type` int(11) DEFAULT NULL,
  `attendance_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_attendance` */

insert  into `tbl_attendance`(`id`,`user_id`,`bio_type`,`attendance_date`) values 
(1,5,1,'2024-05-16 18:57:35'),
(2,2,1,'2024-05-16 18:57:52');

/*Table structure for table `tbl_bin` */

DROP TABLE IF EXISTS `tbl_bin`;

CREATE TABLE `tbl_bin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bin_name` varchar(50) DEFAULT NULL,
  `bin_photo` text DEFAULT NULL,
  `isDeleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_bin` */

insert  into `tbl_bin`(`id`,`bin_name`,`bin_photo`,`isDeleted`) values 
(1,'Bin 1','bin1.png',0),
(2,'Bin 2','bin2.png',0),
(3,'Bin 3','bin3.png',0);

/*Table structure for table `tbl_bin_collection_form` */

DROP TABLE IF EXISTS `tbl_bin_collection_form`;

CREATE TABLE `tbl_bin_collection_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `date_recorded` date DEFAULT NULL,
  `floor_id` int(11) DEFAULT NULL,
  `area_id` int(11) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_bin_collection_form` */

insert  into `tbl_bin_collection_form`(`id`,`user_id`,`date_recorded`,`floor_id`,`area_id`,`status`,`isDeleted`) values 
(1,2,'2024-05-17',1,2,'collected',0),
(2,4,'2024-05-17',1,2,'uncollected',1),
(3,4,'2024-05-17',2,2,'uncollected',1),
(4,2,'2024-05-18',2,2,'collected',1);

/*Table structure for table `tbl_floor` */

DROP TABLE IF EXISTS `tbl_floor`;

CREATE TABLE `tbl_floor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_name` varchar(30) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_floor` */

insert  into `tbl_floor`(`id`,`floor_name`,`isDeleted`) values 
(1,'Floor 1',0),
(2,'Floor 2',0),
(3,'Floor 3',0),
(4,'Floor 4',0),
(5,'Floor 5',0),
(6,'Floor 6',0);

/*Table structure for table `tbl_setup_area` */

DROP TABLE IF EXISTS `tbl_setup_area`;

CREATE TABLE `tbl_setup_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(50) DEFAULT NULL,
  `isDeleted` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_setup_area` */

insert  into `tbl_setup_area`(`id`,`area_name`,`isDeleted`) values 
(1,'CR',0),
(2,'OFFICE',0);

/*Table structure for table `tbl_setup_biotype` */

DROP TABLE IF EXISTS `tbl_setup_biotype`;

CREATE TABLE `tbl_setup_biotype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `biotype_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_setup_biotype` */

insert  into `tbl_setup_biotype`(`id`,`biotype_name`) values 
(0,'Clock Out'),
(1,'Clock In');

/*Table structure for table `tbl_setup_gender` */

DROP TABLE IF EXISTS `tbl_setup_gender`;

CREATE TABLE `tbl_setup_gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_setup_gender` */

insert  into `tbl_setup_gender`(`id`,`gender_name`) values 
(1,'Male'),
(2,'Female');

/*Table structure for table `tbl_trashbins_trans` */

DROP TABLE IF EXISTS `tbl_trashbins_trans`;

CREATE TABLE `tbl_trashbins_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bin_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `added_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_trashbins_trans` */

insert  into `tbl_trashbins_trans`(`id`,`bin_id`,`total`,`added_date`) values 
(1,1,2,'2024-05-16 17:40:27'),
(2,1,1,'2024-05-16 17:40:27'),
(3,3,2,'2024-05-16 17:40:27'),
(4,1,1,'2024-05-16 17:40:27'),
(5,2,3,'2024-05-16 17:40:27'),
(6,1,3,'2024-05-16 17:40:44'),
(7,3,1,'2024-05-16 18:40:21'),
(8,4,1,'2024-05-16 18:56:24'),
(9,4,1,'2024-05-16 18:56:32');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `user_photo` text DEFAULT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `usertype_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` char(128) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `usertype_id` (`usertype_id`),
  KEY `gender_id` (`gender_id`),
  CONSTRAINT `tbl_users_ibfk_1` FOREIGN KEY (`usertype_id`) REFERENCES `tbl_usertype` (`id`),
  CONSTRAINT `tbl_users_ibfk_2` FOREIGN KEY (`gender_id`) REFERENCES `tbl_setup_gender` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`lastname`,`firstname`,`middlename`,`gender_id`,`email_address`,`user_photo`,`added_date`,`usertype_id`,`username`,`password`,`isDeleted`) values 
(1,'Dantes','Dingdong','Rivera',1,NULL,'66321aa92ce97.jpg','2024-04-27 11:57:54',1,'ding','$2y$10$.thMn53k5XsYz9g5Nybpuu19WzCTeJ7pja7xmxlJ7mhhA5ZtjN9K6',0),
(2,'Rivera','Marian','Dantes',2,NULL,'663228a24f7f7.jpg','2024-04-27 11:58:59',2,'marian','$2y$10$8KsCWwMZgoxn04gLsNvzSOBEPtuACqNEZF2A6k7CTheRzjgyX9SK6',0),
(3,'Alcasid','Ogie',NULL,1,NULL,NULL,'2024-05-16 17:38:15',2,'ogie','$2y$10$g3Qxv5BEBs0uHZWlkyd.o.7gERyk/49sL7JZralhSDyfD9PUL.Ifa',0),
(4,'Sotto','Vic',NULL,1,NULL,'6645e2e048100.jpg','2024-05-16 18:40:53',2,'vic','$2y$10$41LIl1GCMO4pShH9WaVXOeIRnKNXiQPxyr7zdsrNQq4HebWJUVsLC',0),
(5,'Gibbs','Janno',NULL,1,NULL,'6645e63501e97.jpg','2024-05-16 18:55:08',2,'janno','$2y$10$VF5.LOUYyTdbF1L0BzPJB.0U.PvDgcuP4hFyXviNGCsHWaLEDKEl6',0),
(6,'sotto','oyo','',1,'oyo@gmail.com',NULL,'2024-05-28 23:10:12',2,'oyo','$2y$10$HAdNYPsvvJZDQyzfxrZt6eQmKQtgHhh1DmFHUL.r8wGM5ydnDQOx.',0),
(7,'soberano','lisa','',2,'lisa@gmail.com',NULL,'2024-05-28 23:21:56',2,'lisa','$2y$10$NyduLQjNr82oHfsJdv5iceDb2K5bCgyvJWFkX/M5tGUxYLw3Lie72',0);

/*Table structure for table `tbl_usertype` */

DROP TABLE IF EXISTS `tbl_usertype`;

CREATE TABLE `tbl_usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_usertype` */

insert  into `tbl_usertype`(`id`,`usertype_name`) values 
(1,'Admin'),
(2,'Employee');

/*Table structure for table `tmp_transaction` */

DROP TABLE IF EXISTS `tmp_transaction`;

CREATE TABLE `tmp_transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `actual_srp` decimal(18,4) NOT NULL,
  `profit` decimal(18,4) DEFAULT NULL,
  `action_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_id` (`product_id`,`action_by`),
  KEY `action_by` (`action_by`),
  CONSTRAINT `tmp_transaction_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `tbl_products` (`id`),
  CONSTRAINT `tmp_transaction_ibfk_2` FOREIGN KEY (`action_by`) REFERENCES `tbl_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tmp_transaction` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
