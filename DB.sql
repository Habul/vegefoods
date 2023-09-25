/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - vegefoods
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vegefoods` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `vegefoods`;

/*Table structure for table `alamat` */

DROP TABLE IF EXISTS `alamat`;

CREATE TABLE `alamat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_pengguna` int DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `pilih` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `alamat` */

insert  into `alamat`(`id`,`id_pengguna`,`alamat`,`pilih`) values 
(1,9,'test alamat no 1a',0),
(2,9,'test2 alamat 2a',0),
(4,9,'test',1),
(6,12,'jalan udin petot',0),
(7,12,'jalan pada suka 1',1),
(8,13,'test',1),
(9,14,'jalan jalan jalan',0),
(10,14,'jalan panjang',0),
(12,14,'jalan maju mundur',1);

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT NULL,
  `detail` text,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `blog` */

insert  into `blog`(`id`,`judul`,`detail`,`image`) values 
(3,'Jus Tomat','Jus Tomat Kaya akan Antioksidan: Jus tomat mengandung senyawa antioksidan, terutama likopen. Likopen adalah pigmen alami yang memberikan warna merah pada tomat dan memiliki sifat antioksidan yang kuat. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dalam tubuh dan dapat melindungi tubuh dari risiko penyakit degeneratif, termasuk penyakit jantung, beberapa jenis kanker, dan penuaan dini.','justomat.jpeg'),
(4,'jus pisang','Kaya Akan Nutrisi: Jus pisang mengandung berbagai nutrisi penting seperti vitamin C, vitamin B6, kalium, magnesium, dan serat. Vitamin C adalah antioksidan yang membantu meningkatkan sistem kekebalan tubuh dan menjaga kesehatan kulit. Vitamin B6 berperan dalam metabolisme energi dan fungsi saraf. Kalium adalah elektrolit penting yang membantu menjaga keseimbangan cairan tubuh dan fungsi otot yang sehat. Magnesium berperan dalam menjaga kesehatan tulang dan sistem saraf. Serat dalam jus pisang membantu menjaga pencernaan yang sehat dan mengatur pergerakan usus.','juspisang.jpeg'),
(5,'jus bayam','jus bayam baik untuk Mendukung Sistem Kekebalan Tubuh: Jus bayam mengandung vitamin C dan vitamin A, yang berperan penting dalam menjaga sistem kekebalan tubuh yang sehat. Vitamin C membantu meningkatkan produksi dan aktivitas sel-sel kekebalan tubuh, sementara vitamin A berperan dalam menjaga integritas sel-sel membran mukosa dan memperkuat pertahanan tubuh terhadap infeksi. Konsumsi jus bayam dapat membantu meningkatkan kekebalan tubuh dan melindungi dari penyakit.','jusbayam.jpeg');

/*Table structure for table `d_transaksi` */

DROP TABLE IF EXISTS `d_transaksi`;

CREATE TABLE `d_transaksi` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_tran` int NOT NULL,
  `id_produk` int DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `harga` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

/*Data for the table `d_transaksi` */

insert  into `d_transaksi`(`id`,`id_tran`,`id_produk`,`jumlah`,`harga`) values 
(32,1,17,1,20000),
(33,2,18,1,34000),
(34,3,19,1,34000),
(35,3,0,NULL,10000),
(36,3,19,1,34000),
(37,4,23,1,20000),
(38,4,20,1,35000),
(39,4,0,NULL,10000),
(42,5,19,1,34000),
(43,5,0,NULL,10000),
(44,6,27,1,20000),
(45,6,0,NULL,8000),
(46,7,35,1,15000),
(47,7,34,1,25000),
(48,7,0,NULL,10000),
(49,8,34,1,25000),
(50,8,0,NULL,10000),
(51,9,34,1,25000),
(52,9,33,1,17500),
(53,9,0,NULL,8000),
(54,10,33,1,17500),
(55,10,29,1,27000),
(56,10,0,NULL,8000),
(57,11,30,1,12000),
(58,11,0,NULL,10000),
(59,12,34,1,25000),
(60,12,0,NULL,10000),
(61,13,36,1,5000),
(62,13,35,1,15000),
(63,13,0,NULL,10000),
(64,14,34,5,125000),
(65,14,0,NULL,10000),
(68,15,31,2,24000),
(69,15,0,NULL,10000),
(74,16,33,2,35000),
(75,16,0,NULL,10000),
(76,17,30,2,24000),
(77,17,0,NULL,10000),
(78,18,29,1,27000),
(79,18,0,NULL,8000),
(80,19,34,2,50000),
(81,19,33,1,17500),
(82,19,0,NULL,10000),
(86,20,29,1,27000),
(93,21,30,3,36000),
(94,22,18,1,38000);

/*Table structure for table `h_transaksi` */

DROP TABLE IF EXISTS `h_transaksi`;

CREATE TABLE `h_transaksi` (
  `id` int NOT NULL,
  `id_pengguna` varchar(255) DEFAULT NULL,
  `id_penjual` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '0',
  `alamat` text,
  `ongkir` int DEFAULT '0',
  `note` text,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `h_transaksi` */

insert  into `h_transaksi`(`id`,`id_pengguna`,`id_penjual`,`status`,`alamat`,`ongkir`,`note`,`addtime`) values 
(3,'9','2',3,'jalan pada suka',1,NULL,'2023-06-17 17:06:07'),
(4,'9','2',3,'jalan ciater pamulang kota tangerang selatan',1,NULL,'2023-06-24 09:06:32'),
(5,'9','2',3,'test',1,NULL,'2023-06-24 09:06:55'),
(6,'10','2',3,'jalan janji jiwa no 85',1,NULL,'2023-06-24 09:06:59'),
(7,'11','2',3,'jalan indomaret tangerang 1',1,NULL,'2023-07-01 04:07:17'),
(8,'9','2',3,'jalan pada suka2',1,NULL,'2023-08-08 14:08:08'),
(9,'9','2',3,'test alamat no 1aaa',1,NULL,'2023-08-09 09:08:52'),
(10,'9','2',3,'jalan kadu bitung',1,NULL,'2023-08-10 10:08:58'),
(11,'9','2',3,'xxxxx',1,NULL,'2023-08-10 11:08:17'),
(12,'9','2',3,'wwwwwwwwwwwww',1,NULL,'2023-08-10 12:08:07'),
(13,'11','2',3,'jalan pemda curug no 1a',1,'sayuran sudah layu','2023-08-11 02:08:57'),
(14,'9','2',3,NULL,1,NULL,'2023-09-16 14:09:23'),
(15,'9','2',3,'jalan pamulang no 1a',1,'barang rusak','2023-09-17 13:09:18'),
(16,'9','2',3,'jalan pamulang no 1a',1,NULL,'2023-09-17 14:09:39'),
(17,'11','2',3,NULL,1,NULL,'2023-09-23 16:09:32'),
(18,'11','2',3,NULL,1,NULL,'2023-09-23 16:09:51'),
(19,'11','2',2,NULL,1,'barang rusak','2023-09-23 17:09:36'),
(20,'9',NULL,0,'test alamat no 1a',0,NULL,'2023-09-25 04:09:59'),
(21,'12',NULL,0,'jalan pada suka 1',0,NULL,'2023-09-25 06:09:00'),
(22,'14',NULL,0,'jalan maju mundur',0,NULL,'2023-09-25 06:09:03');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `level` enum('penjual','pembeli','admin') DEFAULT NULL,
  `address` text,
  `id_alamat` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`nama`,`email`,`password`,`no_hp`,`level`,`address`,`id_alamat`) values 
(1,'admin','admin@gmail.com','$2y$10$/inP0yRPNAL2kgxiAtqA4ewF5JyDqly3I/r2IfQRMG5bMWxhn2hD2','08237238238','admin',NULL,NULL),
(2,'penjual','penjual@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu','081314669379','penjual','jalan ciater pamulang no 1A',NULL),
(3,'zahira','zahira@gmail.com','$2y$10$cY45oa2WNmtP/R9VYKwTm.44HT744RPVAWg0WA7nxv9HEn6s6qdH6',NULL,'pembeli',NULL,NULL),
(5,'test','test@gmail.com','$2y$10$.NAGn2J.AmKbDxFvNA/cPeGXGl7HfTU.3K0H3wSM3URXddupmTdW.','082372382732','pembeli',NULL,NULL),
(6,'dosen','dosen@gmail.com','$2y$10$kKP3MOosShXib.cYf7BjhOvlOvrMWtWmoE.WOHOgpo3xdi2lDh/Y6','08623723231','pembeli',NULL,NULL),
(7,'agus','agus@gmail.com','$2y$10$3f6r1sKI4tcsbjTqQOxMQ.1zStvyGx5f/xoehLZ0TiOFgIm/iZfUi','081314669379','pembeli',NULL,NULL),
(8,'sudah','sudah@gmail.com','$2y$10$i5weFkrkV6.d7fxJOqLZGeH9bGGYGXK5C00X2erHXaPqJXCkkszkO','023023923','pembeli',NULL,NULL),
(9,'Budi','pembeli@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu','087771911287','pembeli','jalan pamulang no 1a',4),
(10,'janji','janji@gmail.com','$2y$10$bZjTelwJFymOPP7kW9BMLOMif6.8vI8dfJS/uY0EHToce0fVufUXe','082323283928','pembeli',NULL,NULL),
(11,'agung','agung@gmail.com','$2y$10$0Aaygah9cg4ls9uk1.G/e.Q7pceh.QmeBj5yLxMiJfMPApQu76ZOe','083832932839','pembeli',NULL,NULL),
(12,'udin','udin@gmail.com','$2y$10$5BqxSbwy4c7CIgcglgcdB.6yhij4qt4SfMSOXZ6g5ULmsFeQuaYFq','23920392039','pembeli','jalan udin petot',7),
(13,'riski','riski@gmail.com','$2y$10$BtBpCWyxZGqccTQZ.ZLK8.EtfuZYRAefKxcKCnIqSiLb2oUoV4lWC','2932930293','pembeli','test',NULL),
(14,'sis','sis@gmail.com','$2y$10$BUWyhl6dDtAwY5g8yS/shOM3uJPc4LZUo/OzwRTapg1/tjMtd/nTm','232323323','pembeli','jalan jalan jalan',12);

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `harga` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id`,`nama_produk`,`stok`,`satuan`,`harga`,`image`,`detail`) values 
(17,'Beras',1,'kg',13000,'beras22.jpeg','Sumber Antioksidan: Beras mengandung senyawa antioksidan seperti vitamin E dan selenium, yang membantu melawan kerusakan sel akibat radikal bebas dalam tubuh. Antioksidan penting untuk menjaga kesehatan sel dan mengurangi risiko penyakit degeneratif.'),
(18,'bawang merah',1,'kg',38000,'bawang_merah.jpg','Menjaga Kesehatan Saluran Pernapasan: Bawang merah memiliki sifat ekspektoran dan mukolitik, yang berarti dapat membantu meredakan batuk, mengencerkan lendir, dan membersihkan saluran pernapasan. Ini dapat membantu mengatasi gejala pilek, batuk, dan masalah pernapasan lainnya.'),
(19,'bawang putih',5,'kg',34000,'bawang_putih.jpg','Meningkatkan Sistem Kekebalan Tubuh: Bawang memiliki sifat imunomodulator dan dapat membantu meningkatkan sistem kekebalan tubuh. Senyawa belerang dalam bawang membantu meningkatkan produksi dan aktivitas sel-sel imun, sehingga tubuh lebih mampu melawan infeksi dan penyakit.'),
(20,'Cabai',4,'kg',35000,'cabe.jpg','Meningkatkan Metabolisme: Cabai mengandung senyawa capsaicin yang memberikan rasa pedas. Capsaicin dapat meningkatkan metabolisme tubuh dan membantu membakar kalori lebih efisien. Hal ini dapat berguna dalam menurunkan berat badan dan mempertahankan berat badan yang sehat.'),
(21,'Jagung',6,'kg',20000,'jagung.jpeg','kesehatan jantung. Asam folat membantu mengurangi kadar homosistein dalam darah, yang dapat mengurangi risiko penyakit jantung. Serat juga membantu mengurangi kadar kolesterol LDL (kolesterol jahat), yang dapat menjaga kesehatan pembuluh darah.'),
(22,'Pepaya',4,'kg',10000,'pepaya.jpeg','Meningkatkan Pencernaan: Pepaya mengandung enzim papain yang membantu dalam pencernaan protein. Enzim ini dapat memecah protein menjadi asam amino yang lebih mudah dicerna. Pepaya juga mengandung serat pangan yang membantu mencegah sembelit dan menjaga kesehatan sistem pencernaan secara umum.'),
(23,'terong',3,'kg',20000,'terong.jpg','Terong mengandung senyawa antioksidan seperti anthocyanin dan flavonoid. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Ini dapat membantu mengurangi risiko penyakit degeneratif dan penuaan dini.'),
(24,'pisang',4,'kg',22500,'pisang.jpg','Pisang mengandung berbagai nutrisi penting seperti vitamin C, vitamin B6, magnesium, potassium, dan serat. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal. Selain itu, pisang mengandung karbohidrat kompleks yang menyediakan energi yang dibutuhkan oleh tubuh.'),
(25,'sawi',5,'ikat',5000,'sawi.jpg','Sawi merupakan sayuran hijau yang kaya akan nutrisi penting seperti vitamin A, vitamin C, vitamin K, serat, folat, dan kalsium. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal.'),
(26,'Bayam',4,'ikat',5000,'bayam.jpeg','Bayam mengandung senyawa antioksidan, terutama beta-karoten, vitamin C, dan vitamin E. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Ini dapat membantu mengurangi risiko penyakit degeneratif, seperti penyakit jantung, kanker, dan penuaan dini.'),
(27,'toge',5,'kg',20000,'toge.jpg','Toge merupakan sayuran berkecambah yang kaya akan serat pangan. Serat memiliki peran penting dalam menjaga kesehatan pencernaan, mengatur pencernaan, dan mencegah sembelit. Konsumsi makanan yang kaya serat juga dapat membantu menjaga berat badan yang sehat dan mengatur kadar gula darah.'),
(28,'brokoli',4,'kg',30000,'brokoli.jpg','Brokoli merupakan sayuran cruciferous yang kaya akan nutrisi penting seperti vitamin C, vitamin K, vitamin A, folat, serat, dan senyawa antioksidan. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal.'),
(29,'kentang',3,'kg',27000,'kentang.jpeg','Kentang merupakan sumber karbohidrat kompleks yang mengandung pati dan serat pangan. Karbohidrat adalah sumber energi utama bagi tubuh. Konsumsi kentang dapat memberikan energi yang tahan lama dan membantu menjaga keseimbangan gula darah.'),
(30,'wortel',2,'kg',12000,'wortel.jpeg',' Wortel mengandung beta-karoten, yang merupakan senyawa pigmen yang memberikan warna oranye pada wortel. Beta-karoten adalah prekursor vitamin A dalam tubuh, yang penting untuk kesehatan mata. Setelah dikonsumsi, tubuh mengubah beta-karoten menjadi vitamin A yang digunakan untuk menjaga kesehatan retina, meningkatkan penglihatan di malam hari, dan memelihara kesehatan mata secara keseluruhan.'),
(31,'kol',5,'kg',12000,'kol.jpg','Kol mengandung senyawa antioksidan, terutama glukosinolat dan vitamin C. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Senyawa glukosinolat dalam kol juga memiliki potensi anti-kanker dan kemampuan detoksifikasi dalam tubuh.'),
(32,'labu',5,'kg',11500,'labu.jpg','Labu mengandung serat pangan yang tinggi. Serat merupakan komponen penting dalam makanan yang membantu menjaga kesehatan pencernaan. Konsumsi makanan yang kaya serat dapat membantu mencegah sembelit, menjaga kesehatan usus, dan mengatur tingkat gula darah. Selain itu, serat juga memberikan rasa kenyang lebih lama, sehingga dapat membantu dalam pengelolaan berat badan.'),
(33,'paprika',2,'kg',17500,'paprika.jpg','Paprika mengandung senyawa antioksidan, terutama vitamin C. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Vitamin C juga memiliki peran penting dalam memperkuat sistem kekebalan tubuh dan menjaga kesehatan kulit.'),
(34,'tomat',1,'kg',25000,'tomat.jpg','Tomat mengandung likopen, yaitu senyawa pigmen yang memberikan warna merah pada tomat. Likopen merupakan antioksidan kuat yang dapat membantu melindungi sel-sel tubuh dari kerusakan akibat radikal bebas. Likopen juga dikaitkan dengan berbagai manfaat kesehatan, termasuk mengurangi risiko penyakit jantung, beberapa jenis kanker, dan penyakit degeneratif.'),
(35,'labu siam',10,'kg',15000,'labusiem.jpg','Labu siam mengandung serat pangan yang tinggi. Serat penting untuk menjaga kesehatan pencernaan, mencegah sembelit, dan menjaga keseimbangan gula darah. Serat juga membantu memberikan rasa kenyang lebih lama, sehingga dapat membantu dalam pengelolaan berat badan.'),
(36,'daun pepaya',10,'ikat',5000,'daun_pepaya2.jpg','Daun pepaya mengandung enzim papain yang dapat membantu memecah protein dalam makanan, sehingga memfasilitasi pencernaan dan penyerapan nutrisi. Konsumsi daun pepaya secara teratur dapat membantu mengurangi gejala gangguan pencernaan seperti kembung, konstipasi, dan gangguan pencernaan lainnya.');

/*Table structure for table `r_transaksi` */

DROP TABLE IF EXISTS `r_transaksi`;

CREATE TABLE `r_transaksi` (
  `id` int NOT NULL,
  `id_pengguna` varchar(255) DEFAULT NULL,
  `id_penjual` varchar(255) DEFAULT NULL,
  `note` text,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `r_transaksi` */

insert  into `r_transaksi`(`id`,`id_pengguna`,`id_penjual`,`note`,`addtime`) values 
(19,'11','2','barang rusak','2023-09-23 17:09:03');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
