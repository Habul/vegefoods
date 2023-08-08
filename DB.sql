/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.7.35-log : Database - vegefoods
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`vegefoods` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `vegefoods`;

/*Table structure for table `blog` */

DROP TABLE IF EXISTS `blog`;

CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tran` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(13) DEFAULT NULL,
  `harga` int(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
(50,8,0,NULL,10000);

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
(1,'2',0,NULL,0,'2023-06-17 16:06:28'),
(2,'1',0,NULL,0,'2023-06-17 17:06:03'),
(3,'9',3,'jalan pada suka',1,'2023-06-17 17:06:07'),
(4,'9',3,'jalan ciater pamulang kota tangerang selatan',1,'2023-06-24 09:06:32'),
(5,'9',3,'test',1,'2023-06-24 09:06:55'),
(6,'10',3,'jalan janji jiwa no 85',1,'2023-06-24 09:06:59'),
(7,'11',3,'jalan indomaret tangerang 1',1,'2023-07-01 04:07:17'),
(8,'9',2,'jalan pada suka2',1,'2023-08-08 14:08:08');

/*Table structure for table `pengguna` */

DROP TABLE IF EXISTS `pengguna`;

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `level` enum('penjual','pembeli','admin') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `pengguna` */

insert  into `pengguna`(`id`,`nama`,`email`,`password`,`no_hp`,`level`) values 
(1,'admin','admin@gmail.com','$2y$10$/inP0yRPNAL2kgxiAtqA4ewF5JyDqly3I/r2IfQRMG5bMWxhn2hD2','08237238238','admin'),
(2,'penjual','penjual@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu',NULL,'penjual'),
(3,'zahira','zahira@gmail.com','$2y$10$cY45oa2WNmtP/R9VYKwTm.44HT744RPVAWg0WA7nxv9HEn6s6qdH6',NULL,'pembeli'),
(5,'test','test@gmail.com','$2y$10$.NAGn2J.AmKbDxFvNA/cPeGXGl7HfTU.3K0H3wSM3URXddupmTdW.','082372382732','pembeli'),
(6,'dosen','dosen@gmail.com','$2y$10$kKP3MOosShXib.cYf7BjhOvlOvrMWtWmoE.WOHOgpo3xdi2lDh/Y6','08623723231','pembeli'),
(7,'agus','agus@gmail.com','$2y$10$3f6r1sKI4tcsbjTqQOxMQ.1zStvyGx5f/xoehLZ0TiOFgIm/iZfUi','081314669379','pembeli'),
(8,'sudah','sudah@gmail.com','$2y$10$i5weFkrkV6.d7fxJOqLZGeH9bGGYGXK5C00X2erHXaPqJXCkkszkO','023023923','pembeli'),
(9,'beli','pembeli@gmail.com','$2y$10$D7a4XxbfUGQUEQGXTaAyTeA0MPCZwa2ePgnFP0TPlTE0dl9O0lYOu','087771911287','pembeli'),
(10,'janji','janji@gmail.com','$2y$10$bZjTelwJFymOPP7kW9BMLOMif6.8vI8dfJS/uY0EHToce0fVufUXe','082323283928','pembeli'),
(11,'agung','agung@gmail.com','$2y$10$0Aaygah9cg4ls9uk1.G/e.Q7pceh.QmeBj5yLxMiJfMPApQu76ZOe','083832932839','pembeli');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(255) DEFAULT NULL,
  `satuan` varchar(10) DEFAULT NULL,
  `harga` int(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `produk` */

insert  into `produk`(`id`,`nama_produk`,`satuan`,`harga`,`image`,`detail`) values 
(17,'Beras','kg',13000,'beras22.jpeg','Sumber Antioksidan: Beras mengandung senyawa antioksidan seperti vitamin E dan selenium, yang membantu melawan kerusakan sel akibat radikal bebas dalam tubuh. Antioksidan penting untuk menjaga kesehatan sel dan mengurangi risiko penyakit degeneratif.'),
(18,'bawang merah','kg',38000,'bawang_merah.jpg','Menjaga Kesehatan Saluran Pernapasan: Bawang merah memiliki sifat ekspektoran dan mukolitik, yang berarti dapat membantu meredakan batuk, mengencerkan lendir, dan membersihkan saluran pernapasan. Ini dapat membantu mengatasi gejala pilek, batuk, dan masalah pernapasan lainnya.'),
(19,'bawang putih','kg',34000,'bawang_putih.jpg','Meningkatkan Sistem Kekebalan Tubuh: Bawang memiliki sifat imunomodulator dan dapat membantu meningkatkan sistem kekebalan tubuh. Senyawa belerang dalam bawang membantu meningkatkan produksi dan aktivitas sel-sel imun, sehingga tubuh lebih mampu melawan infeksi dan penyakit.'),
(20,'Cabai','kg',35000,'cabe.jpg','Meningkatkan Metabolisme: Cabai mengandung senyawa capsaicin yang memberikan rasa pedas. Capsaicin dapat meningkatkan metabolisme tubuh dan membantu membakar kalori lebih efisien. Hal ini dapat berguna dalam menurunkan berat badan dan mempertahankan berat badan yang sehat.'),
(21,'Jagung','kg',20000,'jagung.jpeg','kesehatan jantung. Asam folat membantu mengurangi kadar homosistein dalam darah, yang dapat mengurangi risiko penyakit jantung. Serat juga membantu mengurangi kadar kolesterol LDL (kolesterol jahat), yang dapat menjaga kesehatan pembuluh darah.'),
(22,'Pepaya','kg',10000,'pepaya.jpeg','Meningkatkan Pencernaan: Pepaya mengandung enzim papain yang membantu dalam pencernaan protein. Enzim ini dapat memecah protein menjadi asam amino yang lebih mudah dicerna. Pepaya juga mengandung serat pangan yang membantu mencegah sembelit dan menjaga kesehatan sistem pencernaan secara umum.'),
(23,'terong','kg',20000,'terong.jpg','Terong mengandung senyawa antioksidan seperti anthocyanin dan flavonoid. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Ini dapat membantu mengurangi risiko penyakit degeneratif dan penuaan dini.'),
(24,'pisang','kg',22500,'pisang.jpg','Pisang mengandung berbagai nutrisi penting seperti vitamin C, vitamin B6, magnesium, potassium, dan serat. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal. Selain itu, pisang mengandung karbohidrat kompleks yang menyediakan energi yang dibutuhkan oleh tubuh.'),
(25,'sawi','ikat',5000,'sawi.jpg','Sawi merupakan sayuran hijau yang kaya akan nutrisi penting seperti vitamin A, vitamin C, vitamin K, serat, folat, dan kalsium. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal.'),
(26,'Bayam','ikat',5000,'bayam.jpeg','Bayam mengandung senyawa antioksidan, terutama beta-karoten, vitamin C, dan vitamin E. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Ini dapat membantu mengurangi risiko penyakit degeneratif, seperti penyakit jantung, kanker, dan penuaan dini.'),
(27,'toge','kg',20000,'toge.jpg','Toge merupakan sayuran berkecambah yang kaya akan serat pangan. Serat memiliki peran penting dalam menjaga kesehatan pencernaan, mengatur pencernaan, dan mencegah sembelit. Konsumsi makanan yang kaya serat juga dapat membantu menjaga berat badan yang sehat dan mengatur kadar gula darah.'),
(28,'brokoli','kg',30000,'brokoli.jpg','Brokoli merupakan sayuran cruciferous yang kaya akan nutrisi penting seperti vitamin C, vitamin K, vitamin A, folat, serat, dan senyawa antioksidan. Nutrisi-nutrisi ini penting untuk menjaga kesehatan umum tubuh dan mendukung fungsi tubuh yang optimal.'),
(29,'kentang','kg',27000,'kentang.jpeg','Kentang merupakan sumber karbohidrat kompleks yang mengandung pati dan serat pangan. Karbohidrat adalah sumber energi utama bagi tubuh. Konsumsi kentang dapat memberikan energi yang tahan lama dan membantu menjaga keseimbangan gula darah.'),
(30,'wortel','kg',12000,'wortel.jpeg',' Wortel mengandung beta-karoten, yang merupakan senyawa pigmen yang memberikan warna oranye pada wortel. Beta-karoten adalah prekursor vitamin A dalam tubuh, yang penting untuk kesehatan mata. Setelah dikonsumsi, tubuh mengubah beta-karoten menjadi vitamin A yang digunakan untuk menjaga kesehatan retina, meningkatkan penglihatan di malam hari, dan memelihara kesehatan mata secara keseluruhan.'),
(31,'kol','kg',12000,'kol.jpg','Kol mengandung senyawa antioksidan, terutama glukosinolat dan vitamin C. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Senyawa glukosinolat dalam kol juga memiliki potensi anti-kanker dan kemampuan detoksifikasi dalam tubuh.'),
(32,'labu','kg',11500,'labu.jpg','Labu mengandung serat pangan yang tinggi. Serat merupakan komponen penting dalam makanan yang membantu menjaga kesehatan pencernaan. Konsumsi makanan yang kaya serat dapat membantu mencegah sembelit, menjaga kesehatan usus, dan mengatur tingkat gula darah. Selain itu, serat juga memberikan rasa kenyang lebih lama, sehingga dapat membantu dalam pengelolaan berat badan.'),
(33,'paprika','kg',17500,'paprika.jpg','Paprika mengandung senyawa antioksidan, terutama vitamin C. Antioksidan membantu melawan kerusakan sel akibat radikal bebas dan menjaga kesehatan jaringan tubuh. Vitamin C juga memiliki peran penting dalam memperkuat sistem kekebalan tubuh dan menjaga kesehatan kulit.'),
(34,'tomat','kg',25000,'tomat.jpg','Tomat mengandung likopen, yaitu senyawa pigmen yang memberikan warna merah pada tomat. Likopen merupakan antioksidan kuat yang dapat membantu melindungi sel-sel tubuh dari kerusakan akibat radikal bebas. Likopen juga dikaitkan dengan berbagai manfaat kesehatan, termasuk mengurangi risiko penyakit jantung, beberapa jenis kanker, dan penyakit degeneratif.'),
(35,'labu siam','kg',15000,'labusiem.jpg','Labu siam mengandung serat pangan yang tinggi. Serat penting untuk menjaga kesehatan pencernaan, mencegah sembelit, dan menjaga keseimbangan gula darah. Serat juga membantu memberikan rasa kenyang lebih lama, sehingga dapat membantu dalam pengelolaan berat badan.'),
(36,'daun pepaya','ikat',5000,'daun_pepaya2.jpg','Daun pepaya mengandung enzim papain yang dapat membantu memecah protein dalam makanan, sehingga memfasilitasi pencernaan dan penyerapan nutrisi. Konsumsi daun pepaya secara teratur dapat membantu mengurangi gejala gangguan pencernaan seperti kembung, konstipasi, dan gangguan pencernaan lainnya.');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
