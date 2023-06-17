/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.35-log : Database - hampers
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hampers` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `hampers`;

/*Table structure for table `d_transaksi` */

DROP TABLE IF EXISTS `d_transaksi`;

CREATE TABLE `d_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tran` int(11) DEFAULT NULL,
  `hampers` varchar(255) DEFAULT NULL,
  `jumlah` int(13) DEFAULT NULL,
  `harga` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `d_transaksi` */

insert  into `d_transaksi`(`id`,`id_tran`,`hampers`,`jumlah`,`harga`) values 
(1,1,'Tea Hampers',1,30000),
(2,1,'Valentine\'s Hampers',1,50000),
(5,1,'shipping cost',NULL,8000),
(24,2,'Sweet Hampers',1,70000),
(25,2,'Tea Hampers',1,30000),
(26,2,'shipping cost',NULL,8000),
(27,3,'Choco Hampers',1,32000),
(28,3,'Violet Hampers',1,90000),
(29,3,'shipping cost',NULL,8000);

/*Table structure for table `h_transaksi` */

DROP TABLE IF EXISTS `h_transaksi`;

CREATE TABLE `h_transaksi` (
  `id` int(11) NOT NULL,
  `id_pengguna` varchar(255) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `alamat` text,
  `ongkir` int(1) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `h_transaksi` */

insert  into `h_transaksi`(`id`,`id_pengguna`,`status`,`alamat`,`ongkir`,`addtime`) values 
(1,'2',3,'Jalan pada suka no 39',1,'2023-06-03 00:06:39'),
(2,'2',3,'test',1,'2023-06-04 14:06:29'),
(3,'2',3,'yyoyoyoyoy',1,'2023-06-04 15:06:29');

/*Table structure for table `hampers` */

DROP TABLE IF EXISTS `hampers`;

CREATE TABLE `hampers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_hampers` varchar(255) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `hampers` */

insert  into `hampers`(`id`,`nama_hampers`,`harga`,`image`) values 
(1,'Valentine\'s Hampers',50000,'f11.jpg'),
(2,'Sweet Hampers',70000,'f21.jpg'),
(3,'Tea Hampers',30000,'f31.jpg'),
(4,'Pinky Hampers',40000,'f41.jpg'),
(5,'Girlfriend Hampers',30000,'f51.jpg'),
(6,'Anniversary Hampers',28000,'f61.jpg'),
(7,'Authentic Hampers',30000,'f71.jpg'),
(8,'Birthday Hampers',32000,'f81.jpg'),
(9,'Choco Hampers',32000,'n11.jpg'),
(10,'Classic Hampers',40000,'n21.jpg'),
(11,'Colorful Hampers',40000,'n31.jpg'),
(12,'Fresh Hampers',45000,'n41.jpg'),
(13,'Georgeos Hampers',60000,'n51.jpg'),
(14,'Luxurious Hampers',67000,'n61.jpg'),
(15,'Signature Hampers',85000,'n71.jpg'),
(16,'Violet Hampers',90000,'n81.jpg');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `level` enum('penjual','pembeli') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`nama`,`email`,`password`,`no_hp`,`level`) values 
(1,'raddin','penjual@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu',NULL,'penjual'),
(2,'beli','pembeli@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu','087771911287','pembeli'),
(3,'zahira','zahira@gmail.com','$2y$10$cY45oa2WNmtP/R9VYKwTm.44HT744RPVAWg0WA7nxv9HEn6s6qdH6',NULL,'pembeli'),
(5,'test','test@gmail.com','$2y$10$.NAGn2J.AmKbDxFvNA/cPeGXGl7HfTU.3K0H3wSM3URXddupmTdW.','082372382732','pembeli'),
(6,'dosen','dosen@gmail.com','$2y$10$kKP3MOosShXib.cYf7BjhOvlOvrMWtWmoE.WOHOgpo3xdi2lDh/Y6','08623723231','pembeli'),
(7,'agus','agus@gmail.com','$2y$10$3f6r1sKI4tcsbjTqQOxMQ.1zStvyGx5f/xoehLZ0TiOFgIm/iZfUi','081314669379','pembeli'),
(8,'sudah','sudah@gmail.com','$2y$10$i5weFkrkV6.d7fxJOqLZGeH9bGGYGXK5C00X2erHXaPqJXCkkszkO','023023923','pembeli');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
