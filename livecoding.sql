/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - livecoding
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`livecoding` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `livecoding`;

/*Table structure for table `tbl_inventory` */

DROP TABLE IF EXISTS `tbl_inventory`;

CREATE TABLE `tbl_inventory` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) DEFAULT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_inventory` */

insert  into `tbl_inventory`(`Id`,`nama_barang`,`qty_barang`) values 
(1,'Buku Ilmu Pengetahuan Sosial',5),
(2,'Buku Ilmu Pengetahuan Alam',9),
(4,'Buku Sejarah Yang Disembunyikan',7);

/*Table structure for table `tbl_login` */

DROP TABLE IF EXISTS `tbl_login`;

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_login` */

insert  into `tbl_login`(`id`,`username`,`password`,`email`,`status`) values 
(1,'admin','$2y$10$PdaEHLWVnm5RyO1qU64hxuyRva9xenPBJKIGrEoEDMvaXWI2jUX82','admin@gmail.com',1),
(2,'hafidz','$2y$10$PdaEHLWVnm5RyO1qU64hxuyRva9xenPBJKIGrEoEDMvaXWI2jUX82',NULL,1),
(3,'udin','$2y$10$PdaEHLWVnm5RyO1qU64hxuyRva9xenPBJKIGrEoEDMvaXWI2jUX82',NULL,1);

/*Table structure for table `tbl_penerimaan` */

DROP TABLE IF EXISTS `tbl_penerimaan`;

CREATE TABLE `tbl_penerimaan` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_po` int(11) DEFAULT NULL,
  `no_penerimaan` varchar(50) DEFAULT NULL,
  `nama_supp` varchar(100) DEFAULT NULL,
  `alamat_sup` varchar(255) DEFAULT NULL,
  `no_sj` varchar(50) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status_penerimaan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_po` (`id_po`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `tbl_penerimaan_ibfk_1` FOREIGN KEY (`id_po`) REFERENCES `tbl_purchase_order` (`Id`),
  CONSTRAINT `tbl_penerimaan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_inventory` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_penerimaan` */

insert  into `tbl_penerimaan`(`Id`,`id_po`,`no_penerimaan`,`nama_supp`,`alamat_sup`,`no_sj`,`tanggal_diterima`,`id_barang`,`qty`,`status_penerimaan`) values 
(1,1,'0001/Penerimaan/2024','Berdikari Book','Jl. Elang Jawa No.29, Karangsari, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta','BM-001-DC-11-24','2024-04-20',1,2,'APPROVE'),
(2,3,'0002/Penerimaan/2024','Berdikari Book','Jl. Elang Jawa No.29, Karangsari, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta ','BM-001-DC-11-24','2024-04-20',2,7,'APPROVE'),
(3,4,'0003/Penerimaan/2024','PT. Buku Kita','Jl. Raya Rembun No.9 Rembun, Dampit, Malang','BM-001-DC-11-24','2024-04-20',4,7,'APPROVE');

/*Table structure for table `tbl_purchase_order` */

DROP TABLE IF EXISTS `tbl_purchase_order`;

CREATE TABLE `tbl_purchase_order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `no_po` varchar(50) DEFAULT NULL,
  `id_so` int(11) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `alamat_customer` varchar(255) DEFAULT NULL,
  `status_po` varchar(50) DEFAULT NULL,
  `date_po` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `qty_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_so` (`id_so`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `tbl_purchase_order_ibfk_1` FOREIGN KEY (`id_so`) REFERENCES `tbl_sales_order` (`Id`),
  CONSTRAINT `tbl_purchase_order_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `tbl_inventory` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_purchase_order` */

insert  into `tbl_purchase_order`(`Id`,`no_po`,`id_so`,`nama_customer`,`alamat_customer`,`status_po`,`date_po`,`id_barang`,`qty_barang`) values 
(1,'PO/0001/24',1,'CV. Mulia Gemilang','Jl. Serayu no 5 Dahanredjo','APPROVE','2024-04-17',1,2),
(2,'PO/0002/24',1,'Toko Gunung Agung','Ps. Pucang Anom, Jl. Pucang Anom, Kertajaya, Kec. Gubeng, Surabaya','APPROVE','2024-04-17',1,5),
(3,'PO/0002/24',2,'PT. Media Harian Kita','Jl. Raya Driyoredjo No. 87, Driyorejdo, Gresik','APPROVE','2024-04-17',2,7),
(4,'PO/0003/24',4,'Berdikari Book','Yogyakarta','APPROVE','2024-04-17',4,7);

/*Table structure for table `tbl_role` */

DROP TABLE IF EXISTS `tbl_role`;

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `nama_module` varchar(255) DEFAULT NULL,
  `access_controller` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_role` */

insert  into `tbl_role`(`id`,`id_user`,`nama_module`,`access_controller`) values 
(1,1,'Configuration User','configuration_user'),
(2,2,'Setting','setting'),
(4,1,'Role Menu','role_menu'),
(5,1,'Setting','setting'),
(6,2,'Inventory','inventory'),
(7,3,'Sales Order','sales_order'),
(8,2,'Purchase Order','purchase_order'),
(9,2,'Sales Order','sales_order'),
(10,3,'Purchase Order','purchase_order'),
(11,2,'Penerimaan','penerimaan_inventory_masuk'),
(12,1,'Penerimaan','penerimaan_inventory_masuk'),
(13,1,'Inventory','inventory');

/*Table structure for table `tbl_sales_order` */

DROP TABLE IF EXISTS `tbl_sales_order`;

CREATE TABLE `tbl_sales_order` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `no_so` varchar(50) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `alamat_customer` varchar(255) DEFAULT NULL,
  `status_so` varchar(50) DEFAULT NULL,
  `date_so` date DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `tbl_sales_order_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `tbl_inventory` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_sales_order` */

insert  into `tbl_sales_order`(`Id`,`no_so`,`nama_customer`,`alamat_customer`,`status_so`,`date_so`,`id_barang`) values 
(1,'SO/0001/24','CV. Mulia Gemilang','Jl. Serayu no 5 Dahanredjo','APPROVE',NULL,1),
(2,'SO/0002/24','PT. Media Grafindo ','Jl. Raya Menganti no. 76','APPROVE',NULL,2),
(3,'SO/0003/24','PT. Gramedia Surabaya','Jl. Basuki Rahmat No.93-95','REJECT','2024-04-16',2),
(4,'SO/0004/24','Toko Gunung Agung','Ps. Pucang Anom, Jl. Pucang Anom, Kertajaya, Kec. Gubeng, Surabaya','APPROVE','2024-04-17',1),
(5,'SO/0005/24','PT. Media Harian Kita','Jl. Raya Driyoredjo No. 87, Driyorejdo, Gresik','APPROVE','2024-04-17',2),
(6,'SO/0006/24','Berdikari Book','Yogyakarta','APPROVE','2024-04-17',4);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_login` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`id_login`,`nama`,`alamat`,`tgl_lahir`,`no_telp`) values 
(1,1,'Administrator','Multiverse','1970-01-01',NULL),
(2,2,'Hafidz','Gresik','1970-01-01','0895341421879'),
(3,3,'Udin','Gresik','1970-01-01',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
