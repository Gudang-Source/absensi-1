/*
SQLyog Ultimate v12.5.1 (32 bit)
MySQL - 10.4.11-MariaDB : Database - absensi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`absensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `absensi`;

/*Table structure for table `absen_siswa` */

DROP TABLE IF EXISTS `absen_siswa`;

CREATE TABLE `absen_siswa` (
  `id_absen_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal_pelajaran_detail` int(11) DEFAULT NULL,
  `nis` char(10) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` char(5) DEFAULT NULL,
  `jam_ke` varchar(2) DEFAULT NULL,
  `keterangan` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_absen_siswa`),
  KEY `nis` (`nis`),
  KEY `id_jadwal_pelajaran` (`id_jadwal_pelajaran_detail`),
  CONSTRAINT `absen_siswa_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  CONSTRAINT `absen_siswa_ibfk_2` FOREIGN KEY (`id_jadwal_pelajaran_detail`) REFERENCES `jadwal_pelajaran_detail` (`id_jadwal_pelajaran_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

/*Data for the table `absen_siswa` */

insert  into `absen_siswa`(`id_absen_siswa`,`id_jadwal_pelajaran_detail`,`nis`,`tanggal`,`jam`,`jam_ke`,`keterangan`) values 
(47,10,'1706510005','2020-03-26','11:04','1','I'),
(48,10,'1706510005','2020-03-26','11:04','2','I'),
(49,10,'1706510019','2020-03-19','11:14','1','S'),
(50,10,'1706510019','2020-03-19','11:14','2','S'),
(51,10,'1706510019','2020-03-26','11:14','1','S'),
(52,10,'1706510019','2020-03-26','11:14','2','S'),
(53,12,'1706510005','2020-03-13','20:00','1','I'),
(54,12,'1706510005','2020-03-13','20:00','2','I'),
(55,12,'1706510019','2020-03-27','20:02','1','A'),
(56,12,'1706510019','2020-03-27','20:02','2','A');

/*Table structure for table `agama` */

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `id_agama` int(1) NOT NULL,
  `nama_agama` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_agama`),
  CONSTRAINT `agama_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `pengajar` (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `agama` */

insert  into `agama`(`id_agama`,`nama_agama`) values 
(1,'Islam'),
(2,'Kristen');

/*Table structure for table `akun` */

DROP TABLE IF EXISTS `akun`;

CREATE TABLE `akun` (
  `id_akun` int(11) NOT NULL AUTO_INCREMENT,
  `nip` char(32) DEFAULT NULL,
  `password` varchar(256) DEFAULT '$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',
  `id_hak_akses` int(1) DEFAULT NULL,
  PRIMARY KEY (`id_akun`),
  KEY `nip` (`nip`),
  KEY `id_hak_akses` (`id_hak_akses`),
  CONSTRAINT `akun_ibfk_2` FOREIGN KEY (`id_hak_akses`) REFERENCES `hak_akses` (`id`),
  CONSTRAINT `akun_ibfk_3` FOREIGN KEY (`nip`) REFERENCES `pengajar` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=331 DEFAULT CHARSET=utf8mb4;

/*Data for the table `akun` */

insert  into `akun`(`id_akun`,`nip`,`password`,`id_hak_akses`) values 
(1,'111111111111111111','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',1),
(136,'195808021986032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(137,'195908131988031002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(138,'196003091984032006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(139,'196101081987091002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(140,'196103081986031015','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(141,'196103231989032006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(142,'196103241992031003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(143,'196104101986032011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(144,'196105061989031001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(145,'196108161986031011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(146,'196110101989022002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(147,'196202201989031007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(148,'196207211984031006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(149,'196211051986032008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(150,'196301151992032002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(151,'196404181993022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(152,'196405101988032010','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(153,'196405311988032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(154,'196407181995121003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(155,'196410032007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(156,'196505121989021003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(157,'196508171992032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(158,'196603172008074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',3),
(159,'196701211996012001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(160,'196704092007012011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(161,'196704131994032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(162,'196706112000122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(163,'196801061994122001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(164,'196901012007012032','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(165,'196903262007011006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(166,'196906301994122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(167,'197001112008012003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(168,'197009121995121001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(169,'197012122007012020','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(170,'197111191997022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(171,'197204062008012013','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(172,'197207182015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(173,'197207302003073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(174,'197304082000122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(175,'197403222008011003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(176,'197501222005011004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(177,'197502012006042018','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(178,'197503102008011007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(179,'197507022009021002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(180,'197602192005073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(181,'197703102007012007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(182,'197705092005022004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(183,'197709142015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(184,'197803102010011007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(185,'197808012010012004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(186,'197906172010011006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(187,'197907012006042011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(188,'197911282014082002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(189,'198001012013073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(190,'198008012008073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(191,'198010102008074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(192,'198011242015014001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(193,'198012172006073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(194,'198012272014102002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(195,'198103132005074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(196,'198105032010011018','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(197,'198105212010011008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(198,'198107212007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(199,'198108262007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(200,'198201142009022007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(201,'198308272009022004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(202,'198402192009074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(203,'198404142007064001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(204,'198405302009022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(205,'198407202010012011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(206,'198409072009073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(207,'198409182009021001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(208,'198412052008084001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(209,'198506152007073000','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(210,'198511022010012008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(211,'198606282009074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(212,'198609262011012002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(213,'198703052011074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(214,'198801292010074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(215,'198804132015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(216,'198903132015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(217,'198911282016073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(218,'199001102013074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(219,'199002122014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(220,'199009272015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(221,'199112062014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(222,'199202142015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(223,'199203292016073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(224,'199204102015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(225,'199205032015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(226,'199205142015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(227,'199208032014073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(228,'199210282014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(229,'199211182015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(230,'199309222015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(231,'199402242016014001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(232,'199404112016074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(234,'195808021986032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(235,'195908131988031002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(236,'196003091984032006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(237,'196101081987091002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(238,'196103081986031015','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(239,'196103231989032006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(240,'196103241992031003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(241,'196104101986032011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(242,'196105061989031001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(243,'196108161986031011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(244,'196110101989022002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(245,'196202201989031007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(246,'196207211984031006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(247,'196211051986032008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(248,'196301151992032002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(249,'196404181993022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(250,'196405101988032010','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(251,'196405311988032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(252,'196407181995121003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(253,'196410032007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(254,'196505121989021003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(255,'196508171992032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(256,'196603172008074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(257,'196701211996012001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(258,'196704092007012011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(259,'196704131994032004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(260,'196706112000122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(261,'196801061994122001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(262,'196901012007012032','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(263,'196903262007011006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(264,'196906301994122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(265,'197001112008012003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(266,'197009121995121001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(267,'197012122007012020','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(268,'197111191997022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(269,'197204062008012013','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(270,'197207182015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(271,'197207302003073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(272,'197304082000122003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(273,'197403222008011003','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(274,'197501222005011004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(275,'197502012006042018','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(276,'197503102008011007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(277,'197507022009021002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(278,'197602192005073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(279,'197703102007012007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(280,'197705092005022004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(281,'197709142015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(282,'197803102010011007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(283,'197808012010012004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(284,'197906172010011006','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(285,'197907012006042011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(286,'197911282014082002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(287,'198001012013073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(288,'198008012008073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(289,'198010102008074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(290,'198011242015014001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(291,'198012172006073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(292,'198012272014102002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(293,'198103132005074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(294,'198105032010011018','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(295,'198105212010011008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(296,'198107212007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(297,'198108262007073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(298,'198201142009022007','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(299,'198308272009022004','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(300,'198402192009074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(301,'198404142007064001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(302,'198405302009022001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(303,'198407202010012011','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(304,'198409072009073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(305,'198409182009021001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(306,'198412052008084001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(307,'198506152007073000','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(308,'198511022010012008','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(309,'198606282009074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(310,'198609262011012002','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(311,'198703052011074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(312,'198801292010074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(313,'198804132015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(314,'198903132015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(315,'198911282016073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(316,'199001102013074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(317,'199002122014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(318,'199009272015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(319,'199112062014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(320,'199202142015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(321,'199203292016073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(322,'199204102015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(323,'199205032015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(324,'199205142015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(325,'199208032014073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(326,'199210282014074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(327,'199211182015073001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(328,'199309222015074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(329,'199402242016014001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2),
(330,'199404112016074001','$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm',2);

/*Table structure for table `hak_akses` */

DROP TABLE IF EXISTS `hak_akses`;

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `hak_akses` */

insert  into `hak_akses`(`id`,`role`) values 
(1,'Admin'),
(2,'Guru'),
(3,'Guru BK');

/*Table structure for table `jadwal_pelajaran` */

DROP TABLE IF EXISTS `jadwal_pelajaran`;

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelajaran` char(9) DEFAULT NULL,
  `id_kelas` char(7) DEFAULT NULL,
  `nip` char(32) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_pelajaran`),
  KEY `id_pelajaran` (`id_pelajaran`),
  KEY `id_kelas` (`id_kelas`),
  KEY `nip` (`nip`),
  CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`),
  CONSTRAINT `jadwal_pelajaran_ibfk_3` FOREIGN KEY (`id_pelajaran`) REFERENCES `mata_pelajaran` (`id_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal_pelajaran` */

insert  into `jadwal_pelajaran`(`id_jadwal_pelajaran`,`id_pelajaran`,`id_kelas`,`nip`) values 
(1,'C33011030','3011121','198412052008084001'),
(2,'C33011020','3011121','198012272014102002'),
(3,'C33011050','3011121','196202201989031007'),
(4,'C33011040','3011121','196003097853032006'),
(5,'A10000011','3011121','196405101988032010'),
(6,'D10000010','3011121','196603172008074001'),
(7,'A10000030','3011121','199112062014074001'),
(8,'A10000060','3011121','196906301994122003'),
(9,'A10000040','3011121','196103081986031015'),
(10,'A10000020','3011121','196704131994032004'),
(11,'B10000031','3011121','198001012013073001'),
(12,'B10000032','3011121','198402192009074001'),
(14,'C33011030','3011122','198412052008084001'),
(15,'C33011020','3011122','198012272014102002'),
(16,'C33011050','3011122','196202201989031007'),
(17,'C33011040','3011122','196003097853032006'),
(18,'A10000011','3011122','196405101988032010'),
(19,'D10000010','3011122','196603172008074001'),
(20,'A10000030','3011122','199112062014074001'),
(21,'A10000060','3011122','196906301994122003'),
(22,'A10000040','3011122','196103081986031015'),
(23,'A10000020','3011122','196704131994032004'),
(24,'B10000031','3011122','198001012013073001'),
(25,'B10000032','3011122','198402192009074001'),
(29,'C33013020','3013121','198108262007073001'),
(30,'C33011050','3013121','198108262007073001'),
(31,'C33013020','3013121','198108262007073001'),
(39,'C33013040','3013121','199203292016073001'),
(40,'A10000062','3013121','198402192009074001'),
(41,'C33013040','3013121','199203292016073001'),
(42,'A10000030','3013121','198405302009022001'),
(43,'A10000040','3013121','196103081986031015'),
(44,'A10000060','3013121','196906301994122003'),
(45,'A10000020','3013121','196704131994032004'),
(46,'C33011050','3013121','198108262007073001'),
(47,'B10000031','3013121','198409182009021001'),
(48,'D10000010','3013121','199001102013074001'),
(49,'A10000011','3013121','196410032007073001'),
(50,'C33011040','3011123','197602192005073001'),
(59,'C33011020','3011123','198012272014102002'),
(60,'B10000031','3011123','198001012013073001'),
(61,'A10000060','3011123','196906301994122003'),
(62,'C33011050','3011123','196202201989031007'),
(63,'C33011030','3011123','198412052008084001'),
(64,'A10000062','3011123','198402192009074001'),
(65,'A10000040','3011123','196103081986031015'),
(66,'A10000030','3011123','199112062014074001'),
(67,'A10000020','3011123','196704131994032004'),
(68,'A10000011','3011123','196405101988032010'),
(69,'D10000010','3011123','196603172008074001');

/*Table structure for table `jadwal_pelajaran_detail` */

DROP TABLE IF EXISTS `jadwal_pelajaran_detail`;

CREATE TABLE `jadwal_pelajaran_detail` (
  `id_jadwal_pelajaran_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal_pelajaran` int(11) DEFAULT NULL,
  `hari` char(1) DEFAULT NULL,
  `jumlah_jam` varchar(2) DEFAULT NULL,
  `jam_mulai` char(5) DEFAULT NULL,
  PRIMARY KEY (`id_jadwal_pelajaran_detail`),
  KEY `id_jadwal_pelajaran` (`id_jadwal_pelajaran`),
  CONSTRAINT `jadwal_pelajaran_detail_ibfk_1` FOREIGN KEY (`id_jadwal_pelajaran`) REFERENCES `jadwal_pelajaran` (`id_jadwal_pelajaran`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal_pelajaran_detail` */

insert  into `jadwal_pelajaran_detail`(`id_jadwal_pelajaran_detail`,`id_jadwal_pelajaran`,`hari`,`jumlah_jam`,`jam_mulai`) values 
(1,1,'3','5','07:45'),
(2,1,'2','4','07:00'),
(3,2,'1','4','11:00'),
(4,3,'1','4','14:45'),
(5,3,'2','4','10:15'),
(6,4,'2','4','14:00'),
(7,4,'3','9','07:00'),
(8,5,'4','9','07:00'),
(9,6,'4','1','09:15'),
(10,7,'4','2','10:15'),
(11,9,'5','4','07:00'),
(12,10,'5','2','19:00'),
(13,11,'5','1','12:30'),
(14,12,'5','2','13:15'),
(15,8,'4','2','12:30'),
(16,23,'1','2','07:45'),
(17,24,'1','1','09:15'),
(18,19,'1','1','12:30'),
(19,21,'1','2','10:15'),
(20,17,'1','6','13:15'),
(21,18,'2','3','07:00'),
(22,20,'2','2','09:15'),
(23,22,'2','4','11:00'),
(24,14,'3','4','07:00'),
(25,25,'3','2','10:15'),
(26,15,'4','4','07:00'),
(27,16,'4','4','10:15'),
(28,17,'4','3','14:00'),
(29,17,'5','4','07:00'),
(30,14,'5','4','10:15'),
(31,16,'5','4','14:00'),
(39,29,'1','8','07:45'),
(40,30,'1','4','12:30'),
(41,31,'2','5','07:00'),
(42,39,'2','8','11:00'),
(43,40,'3','2','07:00'),
(44,43,'4','4','07:00'),
(45,44,'4','2','10:15'),
(46,45,'4','2','12:30'),
(47,46,'5','4','07:00'),
(48,47,'5','1','10:15'),
(49,48,'5','1','11:00'),
(50,49,'5','3','12:30'),
(51,50,'1','4','07:45'),
(52,60,'1','1','11:00'),
(53,61,'1','2','12:30'),
(54,59,'2','4','07:00'),
(55,50,'2','9','10:15'),
(56,62,'3','4','07:00'),
(57,63,'3','8','10:15'),
(58,62,'4','4','07:00'),
(59,64,'4','2','10:15'),
(60,65,'4','4','12:30'),
(61,68,'5','3','07:00'),
(62,69,'5','1','09:15'),
(63,66,'5','2','10:15'),
(64,67,'5','2','12:30');

/*Table structure for table `jurusan` */

DROP TABLE IF EXISTS `jurusan`;

CREATE TABLE `jurusan` (
  `id_jurusan` char(4) NOT NULL,
  `nama_jurusan` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`),
  CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `kelas` (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jurusan` */

insert  into `jurusan`(`id_jurusan`,`nama_jurusan`) values 
('3011','Rekayasa Perangkat Lunak'),
('3013','Multimedia');

/*Table structure for table `kelas` */

DROP TABLE IF EXISTS `kelas`;

CREATE TABLE `kelas` (
  `id_kelas` char(7) NOT NULL,
  `id_jurusan` char(4) DEFAULT NULL,
  `nama_kelas` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `siswa` (`id_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kelas` */

insert  into `kelas`(`id_kelas`,`id_jurusan`,`nama_kelas`) values 
('3011121','3011','XII RPL 1'),
('3011122','3011','XII RPL 2'),
('3011123','3011','XII RPL 3'),
('3013121','3013','XII MM 1');

/*Table structure for table `mata_pelajaran` */

DROP TABLE IF EXISTS `mata_pelajaran`;

CREATE TABLE `mata_pelajaran` (
  `id_pelajaran` char(10) NOT NULL,
  `nama_pelajaran` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id_pelajaran`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mata_pelajaran` */

insert  into `mata_pelajaran`(`id_pelajaran`,`nama_pelajaran`) values 
('A10000011','Pendidikan Agama Islam dan Budi Pekerti'),
('A10000012','Pendidikan Agama Kristen dan Budi Pekerti'),
('A10000013','Pendidikan Agama Katholik dan Budi Pekerti'),
('A10000014','Pendidikan Agama Hindu dan Budi Pekerti'),
('A10000015','Pendidikan Agama Budha dan Budi Pekerti'),
('A10000016','Pendidikan Agama Kong Hu Cu dan Budi Pekerti'),
('A10000020','Pendidikan Pancasila dan Kewarganegaraan'),
('A10000030','Bahasa Indonesia'),
('A10000040','Matematika'),
('A10000050','Sejarah Indonesia'),
('A10000060','Bahasa Inggris dan Bahasa Asing Lainnya'),
('A10000062','Bahasa Jepang'),
('A10000064','Bahasa Bahasa Mandarin'),
('B10000010','Seni Budaya'),
('B10000020','Pendidikan Jasmani, Olah Raga dan Kesehatan'),
('B10000031','Muatan Lokal Bahasa Daerah (Sunda)'),
('B10000032','Muatan Lokal Bahasa Daerah (Jepang)'),
('B10000033','Muatan Lokal Bahasa Daerah (Mandarin)'),
('C13000010','Simulasi dan Komunikasi Digital'),
('C17000010','Simulasi dan Komunikasi Digital'),
('C23020040','Sistem Telekomunikasi '),
('C27030010','Etika Profesi '),
('C27030020','Aplikasi Pengolah Angka/Spreadsheet '),
('C33011010','Pemodelan Perangkat Lunak '),
('C33011020','Basis Data '),
('C33011030','Pemrograman Berorientasi Objek'),
('C33011040','Pemrograman Web dan Perangkat Bergerak'),
('C33011050','Produk Kreatif dan Kewirausahaan '),
('C33013010','Desain Grafis Percetakan'),
('C33013020','Desain Media Interaktif'),
('C33013030','Animasi 2D dan 3D'),
('C33013040','Teknik Pengolahan Audio dan Video'),
('D10000010','Bimbingan dan Konseling/Konselor (BP/BK)');

/*Table structure for table `pengajar` */

DROP TABLE IF EXISTS `pengajar`;

CREATE TABLE `pengajar` (
  `nip` char(32) NOT NULL,
  `id_agama` int(1) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`nip`),
  KEY `id_agama` (`id_agama`),
  CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  CONSTRAINT `pengajar_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `akun` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajar` */

insert  into `pengajar`(`nip`,`id_agama`,`nama`) values 
('111111111111111111',1,'ADMIN'),
('195808021986032004',1,'TITI SUTIARSIH'),
('195908131988031002',1,'ANWAR HAFILI'),
('196003091984032006',1,'SITI HAYATI'),
('196101081987091002',1,'YAYA HERNAYA'),
('196103081986031015',1,'CECE HERYANA'),
('196103231989032006',1,'ICE SUSANTY'),
('196103241992031003',1,'ROHMAT JAKARIA'),
('196104101986032011',1,'LILIS NURALIAH'),
('196105061989031001',1,'SURYANA'),
('196108161986031011',1,'AGUS RACHMAT'),
('196110101989022002',1,'SRI LASTINI'),
('196202201989031007',1,'ASEP EKA SETIA PRIATNA'),
('196207211984031006',1,'ATUS YULIANSYAH KOSIM SAPUTRA'),
('196211051986032008',1,'ANNE SUKMAWATI KURNIA DEWI'),
('196301151992032002',1,'TATI SUTARNI'),
('196404181993022001',1,'IIN PRIHARTINI'),
('196405101988032010',1,'TITIN SUPRIYATIN'),
('196405311988032004',1,'PUDJI SRIJANI'),
('196407181995121003',1,'UU SUPARDI'),
('196410032007073001',1,'YAYAT SUDRAJAT'),
('196505121989021003',1,'JOHAN SUHARYANTO SUMARNO'),
('196508171992032004',1,'IMAS FATIMAH'),
('196603172008074001',1,'WENING WIGATI'),
('196701211996012001',1,'RINA ROSIANA'),
('196704092007012011',1,'TATI ANDARINI'),
('196704131994032004',1,'LILIS TATI ELIS'),
('196706112000122003',1,'NENENG YULIAH'),
('196801061994122001',1,'LILIS NURLAELA'),
('196901012007012032',1,'RAHAYU'),
('196903262007011006',1,'RUDI MULYANA'),
('196906301994122003',1,'EUIS NURSIBAHHAYATI'),
('197001112008012003',1,'RODIYAH'),
('197009121995121001',1,'USEP NURJAMAN'),
('197012122007012020',1,'NIA KURNIASIH'),
('197111191997022001',1,'AVI RAHMANIAH HARLAS GUNAWAN'),
('197204062008012013',1,'RATNA SUMINAR'),
('197207182015074001',1,'SRI DIANAWATI'),
('197207302003073001',1,'IBRAHIM SIDKI'),
('197304082000122003',1,'YENDA HENDRAWATI'),
('197403222008011003',1,'HENDRO TRI WINARKO'),
('197501222005011004',1,'TATANG TAHYAN'),
('197502012006042018',1,'AI HARYANTY'),
('197503102008011007',1,'MARTENDI MONDIYANA'),
('197507022009021002',1,'MASYUDI'),
('197602192005073001',1,'YUDI SUBEKTI'),
('197703102007012007',1,'ELIES DIATY'),
('197705092005022004',1,'PEMI SRI HANDINI'),
('197709142015073001',1,'USMAN'),
('197803102010011007',1,'ASEP WAHYU'),
('197808012010012004',1,'TATI NURHAYATI'),
('197906172010011006',1,'ADE SURYADI'),
('197907012006042011',1,'SANTY YULIANASARI'),
('197911282014082002',1,'SITI HASANAH'),
('198001012013073001',1,'M. REZA ANDRANA'),
('198008012008073001',1,'EDI KUSNADI'),
('198010102008074001',1,'RINI MELATI'),
('198011242015014001',2,'SOPIA NAOMI SIAHAAN'),
('198012172006073001',1,'DADAN SYARIFUDIN'),
('198012272014102002',1,'ANI NURAENI'),
('198103132005074001',1,'VERA RETNA CHRISTINA'),
('198105032010011018',1,'SUTARSA'),
('198105212010011008',1,'PARWANTO'),
('198107212007073001',1,'DEDI SURYADI'),
('198108262007073001',1,'ZIMZIM AL-AMIN SYAHID'),
('198201142009022007',1,'RISNA MAELANI'),
('198308272009022004',1,'ITA ASTUTI'),
('198402192009074001',1,'NENENG SELVI DELVIANA'),
('198404142007064001',1,'HANIFAH'),
('198405302009022001',1,'ASRI NUR SUPIANTI'),
('198407202010012011',1,'SILVIA RETNAWATI'),
('198409072009073001',1,'YADI RISHANDI'),
('198409182009021001',1,'ERIFA RACHMANSYAH'),
('198412052008084001',1,'HIMATUL MUNAWAROH'),
('198506152007073000',1,'ADE SARKOSIH'),
('198511022010012008',1,'INTAN KANDHI SUKMI'),
('198606282009074001',1,'WULANSARI'),
('198609262011012002',1,'RADEN RORO SITI AMELIYA PURNAMA PUTRI'),
('198703052011074001',1,'ALIYA NUR LATHIFAH ZAHARA'),
('198801292010074001',1,'PIPIN SUPINAH'),
('198804132015073001',1,'EKA PRASETIO SAFAAT'),
('198903132015074001',1,'IINDIYAH PURWANTI'),
('198911282016073001',1,'YUSEF ABDUL AZIZ'),
('199001102013074001',1,'RATIH PRATIWI'),
('199002122014074001',1,'ELY LISNAWATI'),
('199009272015074001',1,'SEPTIANI LARASWANTI'),
('199112062014074001',1,'NADHIRA DESTIANA'),
('199202142015073001',1,'HENA GIAN HERMANA'),
('199203292016073001',1,'RAKSA GRIYA RAMADHAN'),
('199204102015074001',1,'DEA FITRIANY'),
('199205032015074001',1,'RESTY MEILANI'),
('199205142015074001',1,'RIRI SRI ASTUTI'),
('199208032014073001',1,'FIRMAN SETIAWAN'),
('199210282014074001',1,'MUDITA AZIZATURRAHMA'),
('199211182015073001',1,'TIAR SHAH RUL ADAM'),
('199309222015074001',1,'HILMA SELVIANTI'),
('199402242016014001',1,'ELSA RENATA'),
('199404112016074001',1,'HASNI NURUL WILDANIAH');

/*Table structure for table `siswa` */

DROP TABLE IF EXISTS `siswa`;

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `id_jurusan` char(10) DEFAULT NULL,
  `id_kelas` char(7) DEFAULT NULL,
  `id_agama` int(1) DEFAULT NULL,
  `nama` varchar(128) DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  PRIMARY KEY (`nis`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_agama` (`id_agama`),
  KEY `id_jurusan` (`id_jurusan`),
  CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  CONSTRAINT `siswa_ibfk_3` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa` */

insert  into `siswa`(`nis`,`id_jurusan`,`id_kelas`,`id_agama`,`nama`,`jenis_kelamin`) values 
('1602011512','3013','3013121',1,'Dicka Rizki Ramdani Herdiawan','L'),
('1706510001','3011','3011121',1,'Adisa Alfiani Fitri','P'),
('1706510002','3011','3011123',1,'Aditya Wisnu Ferdiansyah','L'),
('1706510003','3011','3011122',1,'Ageng Setiabudi','L'),
('1706510004','3011','3011122',1,'Agung Firmansyah','L'),
('1706510005','3011','3011121',1,'Ahmad Syauqi','L'),
('1706510006','3011','3011123',1,'Al Disha Gryffinda','P'),
('1706510007','3011','3011122',1,'Alif Vebrian','L'),
('1706510008','3011','3011123',1,'Alifah Fisalsabilawati','P'),
('1706510009','3011','3011123',1,'Alifian Naufal Deswantoro','L'),
('1706510010','3011','3011121',1,'Alreza Ihsan Pratama','L'),
('1706510011','3011','3011123',1,'Alvito Rafiqna Ramadhani','L'),
('1706510012','3011','3011121',1,'Ammar Ghani Fauzan','L'),
('1706510013','3011','3011122',1,'Anisa Azzahra','P'),
('1706510014','3011','3011123',1,'Anna Kurniaty','P'),
('1706510015','3011','3011122',1,'Ari Ramdani','L'),
('1706510016','3011','3011123',1,'Arya Riva Al Hafidz','L'),
('1706510017','3011','3011121',1,'Arya Syachria Utomo','L'),
('1706510018','3011','3011122',1,'Ayu Lestari','P'),
('1706510019','3011','3011121',1,'Aziz Rizki Adhiaksa','L'),
('1706510020','3011','3011123',1,'Desvi Noviani','P'),
('1706510021','3011','3011122',1,'Dhafa Azmi Athallah','L'),
('1706510022','3011','3011111',1,'Dhalvien Pratama Putra, Ar','L'),
('1706510023','3011','3011121',1,'Dicky Handoko','L'),
('1706510025','3011','3011122',1,'Diva Arya Bagaskara','L'),
('1706510026','3011','3011122',1,'Elsa Tutia Ningsih','P'),
('1706510028','3011','3011123',1,'Evic Nur-avivah','P'),
('1706510029','3011','3011121',1,'Fachrul Ghifary','L'),
('1706510030','3011','3011121',1,'Fahri Muhamad Fadil','L'),
('1706510031','3011','3011121',1,'Fa\'iq Rivaldy','L'),
('1706510032','3011','3011123',1,'Farhan Ali Pratama','L'),
('1706510033','3011','3011123',1,'Fauzan Istiansyah Wahdi','L'),
('1706510034','3011','3011122',1,'Fauzan Rian Rabbani Wijoretno','L'),
('1706510035','3011','3011123',1,'Finka Anjani Sholihat','P'),
('1706510036','3011','3011123',1,'Fitriani','P'),
('1706510037','3011','3011123',1,'Gingin Adiputra Ginanjar','L'),
('1706510039','3011','3011122',1,'Ima Nur Aisiah','P'),
('1706510040','3011','3011121',1,'Indah Sukma Dewi','P'),
('1706510041','3011','3011122',2,'Irene Kristin Dongoran','P'),
('1706510043','3011','3011121',1,'Kiki Rijkiamsah','L'),
('1706510044','3011','3011123',1,'Lendrik Gunawan','L'),
('1706510045','3011','3011122',1,'Mira Santika Sari','P'),
('1706510046','3011','3011123',1,'Mochamad Lukman Kurniawan','L'),
('1706510047','3011','3011121',1,'Mochamad Yugi Hanif Muharam','L'),
('1706510048','3011','3011121',1,'Mochammad Kelvin Razaam','L'),
('1706510049','3011','3011123',1,'Mochammad Rifqi Rizqullah','L'),
('1706510050','3011','3011123',1,'Moechamad Rizky Sagara','L'),
('1706510051','3011','3011123',1,'Mohamad Rifqi Gurnita','L'),
('1706510052','3011','3011122',1,'Muhamad Aufa Thoriq','L'),
('1706510053','3011','3011123',1,'Muhamad Daffa Fakhriza','L'),
('1706510054','3011','3011122',1,'Muhamad Faisal Firdaus','L'),
('1706510055','3011','3011121',1,'Muhamad Insan Kamil','L'),
('1706510056','3011','3011122',1,'Muhammad Sigit Permana','L'),
('1706510058','3011','3011123',1,'Muhamad Zulfahmi Nurulhaq','L'),
('1706510059','3011','3011122',1,'Muhammad Dhafa Erlangga','L'),
('1706510060','3011','3011121',1,'Muhammad Faizal Alghiffari','L'),
('1706510061','3011','3011122',1,'Muhammad Fauzi Azmi','L'),
('1706510062','3011','3011123',1,'Muhammad Fazril Tawakal','L'),
('1706510063','3011','3011122',1,'Muhammad Ikhsan Ghifari','L'),
('1706510064','3011','3011122',1,'Muhammad Ilham Rizki Pratama','L'),
('1706510065','3011','3011123',1,'Muhammad Iqbal Nugraha','L'),
('1706510066','3011','3011122',1,'Muhammad Makmur','L'),
('1706510067','3011','3011121',1,'Muhammad Rafli Pasya','L'),
('1706510068','3011','3011121',1,'Muhammad Rizki Fadillah','L'),
('1706510069','3011','3011123',1,'Muhammad Sofyan Nurrahman','L'),
('1706510071','3011','3011121',1,'Naufal Rizky Noordiansyah','L'),
('1706510072','3011','3011122',1,'Nicky Kamaludin','L'),
('1706510073','3011','3011123',1,'Oki Prianto','L'),
('1706510074','3011','3011122',1,'Priliana Sanisa Tianarti','P'),
('1706510075','3011','3011123',1,'Putri Khoirun Nisa','P'),
('1706510076','3011','3011122',1,'Raden Rivaldi Winera Alliansyah','L'),
('1706510077','3011','3011121',1,'Rafie Athari Shazni','L'),
('1706510078','3011','3011122',1,'Rafly Pramadiansyah','L'),
('1706510079','3011','3011121',1,'Raissa Putri Giani','P'),
('1706510080','3011','3011121',1,'Randika Rudiadi Disastra','L'),
('1706510081','3011','3011123',1,'Reka Zakia','P'),
('1706510082','3011','3011122',1,'Renaldy Maulana Hendriawan','L'),
('1706510083','3011','3011121',1,'Rendi Liandi','L'),
('1706510084','3011','3011123',1,'Rian Saepul Rohman','L'),
('1706510085','3011','3011121',1,'Ridwan Trisna Maulana','L'),
('1706510086','3011','3011122',1,'Rifani Aliya Nurfatimah','P'),
('1706510087','3011','3011122',1,'Rifki Mubarok','L'),
('1706510088','3011','3011121',1,'Rifki Setiawan','L'),
('1706510091','3011','3011123',1,'Rina Nur Baiti','P'),
('1706510092','3011','3011121',1,'Risda Mawaddah','P'),
('1706510093','3011','3011122',1,'Ristian Aditya','L'),
('1706510094','3011','3011122',1,'Rizki Maulana','L'),
('1706510095','3011','3011122',1,'Rizky Subagja','L'),
('1706510097','3011','3011121',1,'Saeful Rauuf','L'),
('1706510098','3011','3011121',1,'Salma Azizah','P'),
('1706510099','3011','3011121',1,'Sendy Firmansyah','L'),
('1706510100','3011','3011123',1,'Septian Maulana Yusup','L'),
('1706510101','3011','3011123',1,'Soleh Wahyu Pratama','L'),
('1706510103','3011','3011121',1,'Syahrunni\'mah','L'),
('1706510104','3011','3011121',1,'Tiara Nuri Zahira','P'),
('1706510105','3011','3011121',1,'Yoga Nizar Habibulloh','L'),
('1706710003','3013','3013121',1,'Adit Sapta Nugraha','L'),
('1706710004','3013','3013121',1,'Adji Sucipto','L'),
('1706710005','3013','3013121',1,'Ahmad Sarip Gimnastiar','L'),
('1706710007','3013','3013121',1,'Aksal Raihan Athallah','L'),
('1706710010','3013','3013121',1,'Allya Novianti','P'),
('1706710014','3013','3013121',1,'Anestya Sinta Sentosa','P'),
('1706710016','3013','3013121',1,'Astri Lestari','P'),
('1706710017','3013','3013121',1,'Aulia Fransisca Irawan','P'),
('1706710020','3013','3013121',1,'Devi Alfi Kamila','P'),
('1706710022','3013','3013121',1,'Diva Anggita Putri','P'),
('1706710025','3013','3013121',1,'Febi Amelia Nurizki','P'),
('1706710027','3013','3013121',1,'Hagi Husen Sabili','L'),
('1706710028','3013','3013121',1,'Hasna Lathifa Prastiti','P'),
('1706710032','3013','3013121',1,'Lina Marwati','P'),
('1706710033','3013','3013121',1,'Listia Nurni','P'),
('1706710034','3013','3013121',1,'Meryta Jati','P'),
('1706710035','3013','3013121',1,'Mike Andrilia Wulandari','P'),
('1706710037','3013','3013121',1,'Mohammed Alif Az Zaidan Indrapraja','L'),
('1706710039','3013','3013121',1,'Muhamad Gibran Al Gifhari','L'),
('1706710044','3013','3013121',1,'Oki Achmad Maulana','L'),
('1706710047','3013','3013121',1,'Rachman Nugraha','L'),
('1706710048','3013','3013121',1,'Rama Ramadani','L'),
('1706710052','3013','3013121',1,'Rifky Hidayat Rubianto','L'),
('1706710054','3013','3013121',1,'Rivaldi Dwi Agung Wardani','L'),
('1706710056','3013','3013121',1,'Rizky Aulia Azzahra','P'),
('1706710057','3013','3013121',1,'Rizky Muhammad Razzan','L'),
('1706710058','3013','3013121',1,'Sahid Firmansyah','L'),
('1706710063','3013','3013121',1,'Siti Tamti Salamah','P'),
('1706710065','3013','3013121',1,'Tubagus Muhammad Rifqi Arrasy','L'),
('1706710066','3013','3013121',1,'Vicky Setiawan','L'),
('1706710067','3013','3013121',1,'Vyra Noviar Ramdhiany','P'),
('1706710068','3013','3013121',1,'Widya Nur Akasah','P'),
('1706710069','3013','3013121',1,'Wulandari','P'),
('1706710070','3013','3013121',1,'Yudis Muhamad Azis','L'),
('1706710071','3013','3013121',1,'Yunia Armandini','P'),
('1806510106','3011','3011113',1,'Abdul Kholik Aprilyansyah','L'),
('1806510107','3011','3011112',1,'Adi Ramadhan','L'),
('1806510108','3011','3011111',1,'Adya Esa Syabilla','L'),
('1806510109','3011','3011111',1,'Agus Arif Adipermana','L'),
('1806510110','3011','3011113',1,'Ahmad Farid Al Haris','L'),
('1806510111','3011','3011112',1,'Ahmad Kamal Muzakky','L'),
('1806510112','3011','3011112',1,'Ahmad Muhtadin Saefulloh','L'),
('1806510113','3011','3011111',1,'Ahmad Salim Alifiansyah','L'),
('1806510114','3011','3011113',1,'ALE SYAHBANA D.M.D.','L'),
('1806510115','3011','3011113',1,'Ali Hidaya Salam','L'),
('1806510116','3011','3011112',1,'Alif Ahmad Saefulloh','L'),
('1806510117','3011','3011113',1,'Alvina Pradita','P'),
('1806510118','3011','3011112',1,'Amelia Nathasa','P'),
('1806510119','3011','3011112',1,'Andre Aldi Marcellino','L'),
('1806510120','3011','3011111',2,'Andreas Kevin Pratama','L'),
('1806510121','3011','3011113',1,'Ardi Aryatama Nugraha','L'),
('1806510122','3011','3011112',1,'Arialdi Sonny Nurazmi','L'),
('1806510123','3011','3011112',1,'Asep Aldi Hidayat','L'),
('1806510124','3011','3011113',1,'Aulia Zulmi Al - Zahra','P'),
('1806510125','3011','3011112',1,'Ayuni Ade Pamungkas','P'),
('1806510127','3011','3011111',1,'Azwar Sukmawijaya','L'),
('1806510128','3011','3011113',2,'Claudio Caesar Zefanya','L'),
('1806510129','3011','3011113',1,'Cynthia Nur Azzahra','P'),
('1806510130','3011','3011113',1,'Dadang Hidayat','L'),
('1806510131','3011','3011111',1,'Dea Aurelia','P'),
('1806510132','3011','3011113',1,'Diana Damayanti','P'),
('1806510133','3011','3011112',1,'Dio Armando','L'),
('1806510134','3011','3011111',1,'Faisal Fahreza','L'),
('1806510135','3011','3011111',1,'Falia Davina Gustaman','P'),
('1806510136','3011','3011112',1,'Faundra Akbar Faddyl','L'),
('1806510137','3011','3011112',1,'Fazar Dwi Septian','L'),
('1806510138','3011','3011113',1,'Hafiz Alvarezi','L'),
('1806510139','3011','3011111',1,'Hafsah Fauziah Lestari','P'),
('1806510140','3011','3011113',1,'Haidar Ali Osman Bahafzallah','L'),
('1806510141','3011','3011113',1,'Harish Firdaus','L'),
('1806510142','3011','3011111',1,'Helsa Alika Femiani','P'),
('1806510143','3011','3011112',1,'Ilham Ahmad Fadillah','L'),
('1806510144','3011','3011113',1,'Ilham Arya Yuda','L'),
('1806510145','3011','3011111',1,'Ilham Fauzi Pradesa','L'),
('1806510146','3011','3011112',1,'Ilhan Nurihsan','L'),
('1806510147','3011','3011112',1,'Indra Mulyawan','L'),
('1806510149','3011','3011112',1,'Jafar Alfaris','L'),
('1806510150','3011','3011113',2,'Jeremia Edwin Hamonangan','L'),
('1806510151','3011','3011111',2,'Johandi Christian','L'),
('1806510152','3011','3011112',1,'Khany Nur Hanifah','P'),
('1806510153','3011','3011113',1,'Kurniawan Sandi Ramadan','L'),
('1806510154','3011','3011113',1,'Lolla Mariah','P'),
('1806510155','3011','3011112',2,'Marco Sihombing','L'),
('1806510156','3011','3011112',1,'Meira Nurul Avivah','P'),
('1806510158','3011','3011111',1,'Mochamad Ardiansyah','L'),
('1806510160','3011','3011112',1,'Mochamad Ilham Fauzi','L'),
('1806510161','3011','3011112',1,'Mohammad Rafli Oktavian','L'),
('1806510162','3011','3011111',1,'MUCHAMAD DIAZ ADHARI','L'),
('1806510163','3011','3011113',1,'Muhamad Agung Ramadhan','L'),
('1806510164','3011','3011113',1,'M. Aldi Rivaldi','L'),
('1806510165','3011','3011111',1,'Muhamad Ardi Nur Insan','L'),
('1806510166','3011','3011112',1,'Muhamad Daffany Prasetya Wahyudi','L'),
('1806510167','3011','3011111',1,'Muhamad Egi Fahlefi','L'),
('1806510168','3011','3011112',1,'Muhamad Musyafa','L'),
('1806510169','3011','3011112',1,'Mochamad Nifan Y','L'),
('1806510170','3011','3011113',1,'Muhamad Rifki Zaelani','L'),
('1806510171','3011','3011113',1,'Muhammad Fajar Fathurrahman','L'),
('1806510172','3011','3011113',1,'Muhammad Hilmi Fahrezi','L'),
('1806510173','3011','3011111',1,'Muhammad Naufal Fauzi','L'),
('1806510174','3011','3011111',1,'Muhammad Rizki Febriana','L'),
('1806510175','3011','3011112',1,'Muhammad Zidan Hidayat','L'),
('1806510176','3011','3011113',1,'Nazmah Syahla Naulinna','P'),
('1806510177','3011','3011111',1,'Nita Nurul Fauziah','P'),
('1806510178','3011','3011111',1,'Nur Handika Zaelani','L'),
('1806510179','3011','3011112',1,'Nurhafidz Muhamad Faizal','L'),
('1806510180','3011','3011112',1,'Panca Hermawan','L'),
('1806510181','3011','3011113',1,'Putra Hardiansyah','L'),
('1806510182','3011','3011113',1,'Raihan Fauzi Rauf','L'),
('1806510183','3011','3011113',1,'Raimy Widyawan','L'),
('1806510184','3011','3011111',1,'Ravvi Haikal Zusrival Ali','L'),
('1806510185','3011','3011111',1,'Rd. Muhammad Dimas Bayu Rahadiputra','L'),
('1806510186','3011','3011112',1,'Rezka Iqbal Maulana','L'),
('1806510187','3011','3011111',1,'Rhefa Agustia Priatna','L'),
('1806510188','3011','3011113',1,'Ria Sheli Susanti','P'),
('1806510189','3011','3011113',1,'Ricky Yoga Saputra','L'),
('1806510190','3011','3011113',1,'Ridwan Arief Mutaqin','L'),
('1806510191','3011','3011111',1,'Rina Oktaviani','P'),
('1806510192','3011','3011112',1,'Riski Mars Bintang Pamungkas','L'),
('1806510193','3011','3011112',1,'Rita Jennia Nurul Mudawamah Oktafiani','P'),
('1806510194','3011','3011111',1,'Rivaldo Fauzan Robani','L'),
('1806510195','3011','3011113',1,'Riyandi Abdul Rohman','L'),
('1806510196','3011','3011111',1,'Rizal Muhammad Zhahirdin','L'),
('1806510197','3011','3011111',1,'Robby Gusfian','L'),
('1806510198','3011','3011111',1,'Salma Edyna Putri','P'),
('1806510199','3011','3011111',1,'Sandi Maulana','L'),
('1806510200','3011','3011112',1,'Silva Amalia Siti Sadiah','P'),
('1806510201','3011','3011113',1,'Syahnan Afifah Zahra','P'),
('1806510202','3011','3011112',1,'Vikri Permana','L'),
('1806510203','3011','3011112',1,'Vito Arsy Saputra','L'),
('1806510204','3011','3011112',1,'Wanda Nur Azizah','P'),
('1806510205','3011','3011113',1,'Xavine Shyalun Ilhamsyah','P'),
('1806510206','3011','3011113',1,'Yoga Prasetya','L'),
('1806510207','3011','3011112',1,'Yudi Septiadi','L'),
('1806510208','3011','3011111',1,'Yusep Irsyad Najib Setiawan','L'),
('1806510209','3011','3011111',1,'Yusrinda Amelya','P'),
('1806710107','3011','3011111',1,'M.Hadifh dwiyanto','L');

/*Table structure for table `siswa_bermasalah` */

DROP TABLE IF EXISTS `siswa_bermasalah`;

CREATE TABLE `siswa_bermasalah` (
  `id_siswa_bermasalah` int(11) NOT NULL AUTO_INCREMENT,
  `nis` char(10) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id_siswa_bermasalah`),
  KEY `nis` (`nis`),
  KEY `nip` (`nip`),
  CONSTRAINT `siswa_bermasalah_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `siswa` (`nis`),
  CONSTRAINT `siswa_bermasalah_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pengajar` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa_bermasalah` */

/*Table structure for table `siswa_binaan` */

DROP TABLE IF EXISTS `siswa_binaan`;

CREATE TABLE `siswa_binaan` (
  `id_siswa_binaan` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa_bermasalah` int(11) DEFAULT NULL,
  `nip` char(18) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  PRIMARY KEY (`id_siswa_binaan`),
  KEY `id_siswa_bermasalah` (`id_siswa_bermasalah`),
  KEY `nip` (`nip`),
  CONSTRAINT `siswa_binaan_ibfk_1` FOREIGN KEY (`id_siswa_bermasalah`) REFERENCES `siswa_bermasalah` (`id_siswa_bermasalah`),
  CONSTRAINT `siswa_binaan_ibfk_2` FOREIGN KEY (`nip`) REFERENCES `pengajar` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `siswa_binaan` */

/* Trigger structure for table `pengajar` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `add_akun` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `add_akun` AFTER INSERT ON `pengajar` FOR EACH ROW BEGIN

	INSERT INTO akun (nip, password, id_hak_akses) VALUES (new.nip, '$2y$10$Qk.vjS0yFBSvygJ2yQ/ji.uAkoOfsq1mzP7C8ntS2vti0cMcYdVhm', '2');

    END */$$


DELIMITER ;

/* Function  structure for function  `get_jam_selesai` */

/*!50003 DROP FUNCTION IF EXISTS `get_jam_selesai` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `get_jam_selesai`(`input_id_jadwal_pelajaran_detail` VARCHAR(3)) RETURNS char(5) CHARSET utf8mb4
BEGIN

	declare var_jam_selesai char(5);

	declare var_jam_mulai char(5);

	set var_jam_selesai = (SELect date_format(Date_add(concat(date_format(current_Date(), '%Y-%m-%d '), jadwal_pelajaran_detail.jam_mulai), interval jadwal_pelajaran_detail.jumlah_jam * 45 minute), '%H:%i') from jadwal_pelajaran inner join jadwal_pelajaran_detail on jadwal_pelajaran_detail.`id_jadwal_pelajaran` = jadwal_pelajaran.`id_jadwal_pelajaran` where jadwal_pelajaran_detail.id_jadwal_pelajaran_detail = input_id_jadwal_pelajaran_detail);

	set var_jam_mulai = (select jam_mulai from jadwal_pelajaran_detail where id_jadwal_pelajaran_detail = input_id_jadwal_pelajaran_detail);

	set var_jam_selesai = if(var_jam_mulai < '10:00' and var_jam_selesai > '10:15',

	date_format(date_add(concat(current_date(), ' ', var_jam_selesai), interval 15 minute), '%H:%i'), var_jam_selesai);

	SET var_jam_selesai = IF(var_jam_mulai >= '10:15' AND var_jam_selesai > '11:45' and var_jam_mulai < '11:45',

	DATE_FORMAT(DATE_ADD(CONCAT(CURRENT_DATE(), ' ', var_jam_selesai), INTERVAL 45 MINUTE), '%H:%i'), var_jam_selesai);

	SET var_jam_selesai = IF(var_jam_mulai < '10:00' AND var_jam_selesai > '11:45',

	DATE_FORMAT(DATE_ADD(CONCAT(CURRENT_DATE(), ' ', var_jam_selesai), INTERVAL 45 minute), '%H:%i'), var_jam_selesai);

	return var_jam_selesai;

    END */$$
DELIMITER ;

/* Function  structure for function  `get_jumlah_jam_sehari` */

/*!50003 DROP FUNCTION IF EXISTS `get_jumlah_jam_sehari` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `get_jumlah_jam_sehari`(`input_id_kelas` CHAR(7), `input_hari` CHAR(1)) RETURNS varchar(2) CHARSET utf8mb4
BEGIN

    declare jumlah_jam_sehari varchar(2);

    set jumlah_jam_sehari = (SELECT SUM(jadwal_pelajaran_detail.jumlah_jam) FROM jadwal_pelajaran_detail

INNER JOIN jadwal_pelajaran ON jadwal_pelajaran_detail.id_jadwal_pelajaran = jadwal_pelajaran.id_jadwal_pelajaran

WHERE jadwal_pelajaran.id_kelas = input_id_kelas AND jadwal_pelajaran_detail.hari = input_hari);

return jumlah_jam_sehari;



    END */$$
DELIMITER ;

/* Procedure structure for procedure `insert_jadwal_pelajaran_detail` */

/*!50003 DROP PROCEDURE IF EXISTS  `insert_jadwal_pelajaran_detail` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_jadwal_pelajaran_detail`(IN `input_id_jadwal_pelajaran` INT(11), IN `input_hari` CHAR(11), IN `input_jumlah_jam` VARCHAR(2), IN `input_jam_mulai` CHAR(5))
BEGIN

	insert into jadwal_pelajaran_detail (id_jadwal_pelajaran, hari, jumlah_jam, jam_mulai) values (input_id_jadwal_pelajaran, input_hari, input_jumlah_jam, input_jam_mulai);

	END */$$
DELIMITER ;

/*Table structure for table `jml_tidak_masuk` */

DROP TABLE IF EXISTS `jml_tidak_masuk`;

/*!50001 DROP VIEW IF EXISTS `jml_tidak_masuk` */;
/*!50001 DROP TABLE IF EXISTS `jml_tidak_masuk` */;

/*!50001 CREATE TABLE  `jml_tidak_masuk`(
 `tanggal` date ,
 `nis` char(10) ,
 `nip` char(32) ,
 `jumlah_jam` varchar(2) ,
 `keterangan` char(1) ,
 `id_jadwal_pelajaran_detail` int(11) ,
 `hari` char(1) 
)*/;

/*Table structure for table `laporan_absen` */

DROP TABLE IF EXISTS `laporan_absen`;

/*!50001 DROP VIEW IF EXISTS `laporan_absen` */;
/*!50001 DROP TABLE IF EXISTS `laporan_absen` */;

/*!50001 CREATE TABLE  `laporan_absen`(
 `keterangan` char(1) ,
 `tanggal` date ,
 `nis` char(10) ,
 `nip` char(32) 
)*/;

/*View structure for view jml_tidak_masuk */

/*!50001 DROP TABLE IF EXISTS `jml_tidak_masuk` */;
/*!50001 DROP VIEW IF EXISTS `jml_tidak_masuk` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jml_tidak_masuk` AS select `absen_siswa`.`tanggal` AS `tanggal`,`absen_siswa`.`nis` AS `nis`,`jadwal_pelajaran`.`nip` AS `nip`,`jadwal_pelajaran_detail`.`jumlah_jam` AS `jumlah_jam`,`absen_siswa`.`keterangan` AS `keterangan`,`jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail` AS `id_jadwal_pelajaran_detail`,`jadwal_pelajaran_detail`.`hari` AS `hari` from ((`absen_siswa` join `jadwal_pelajaran_detail` on(`absen_siswa`.`id_jadwal_pelajaran_detail` = `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`)) join `jadwal_pelajaran` on(`jadwal_pelajaran_detail`.`id_jadwal_pelajaran` = `jadwal_pelajaran`.`id_jadwal_pelajaran`)) */;

/*View structure for view laporan_absen */

/*!50001 DROP TABLE IF EXISTS `laporan_absen` */;
/*!50001 DROP VIEW IF EXISTS `laporan_absen` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_absen` AS (select `absen_siswa`.`keterangan` AS `keterangan`,`absen_siswa`.`tanggal` AS `tanggal`,`absen_siswa`.`nis` AS `nis`,`jadwal_pelajaran`.`nip` AS `nip` from ((`absen_siswa` join `jadwal_pelajaran_detail` on(`absen_siswa`.`id_jadwal_pelajaran_detail` = `jadwal_pelajaran_detail`.`id_jadwal_pelajaran_detail`)) join `jadwal_pelajaran` on(`jadwal_pelajaran_detail`.`id_jadwal_pelajaran` = `jadwal_pelajaran`.`id_jadwal_pelajaran`)) order by `absen_siswa`.`tanggal`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
