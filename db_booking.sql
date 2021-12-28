/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_booking
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `booking_details` */

DROP TABLE IF EXISTS `booking_details`;

CREATE TABLE `booking_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `booking_id` bigint(20) unsigned NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `kamar_id` bigint(20) unsigned NOT NULL,
  `status` enum('Belum Terbayar','Terbayar','Verifikasi','Verifikasi Ditolak','Gagal','Selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_transfer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  KEY `kamar_id` (`kamar_id`),
  CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`kamar_id`) REFERENCES `kamars` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `booking_details` */

insert  into `booking_details`(`id`,`booking_id`,`tanggal_mulai`,`tanggal_akhir`,`quantity`,`kamar_id`,`status`,`bukti_transfer`,`created_at`,`updated_at`) values 
(2,2,'2021-12-19','2021-12-21',2,3,'Verifikasi','1639840532.jpg','2021-12-18 12:08:58','2021-12-18 15:15:32'),
(3,3,'2021-12-19','2021-12-22',2,1,'Selesai','1639829926.jpg','2021-12-18 12:18:17','2021-12-23 04:25:17'),
(8,8,'2021-12-23','2021-12-24',1,1,'Selesai','1640157482.jpg','2021-12-22 07:17:53','2021-12-23 04:24:09'),
(9,9,'2021-12-29','2021-12-31',1,1,'Selesai','1640699965.jpg','2021-12-28 13:59:00','2021-12-28 14:00:49');

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `kode_booking` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tamu_id` bigint(20) unsigned NOT NULL,
  `tanggal_booking` date NOT NULL,
  `total_transaksi` double NOT NULL,
  `total_berbayar` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tamu_id` (`tamu_id`),
  CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`tamu_id`) REFERENCES `tamus` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bookings` */

insert  into `bookings`(`id`,`kode_booking`,`tamu_id`,`tanggal_booking`,`total_transaksi`,`total_berbayar`,`created_at`,`updated_at`) values 
(2,'#00000001',13,'2021-12-18',1200000,1200000,'2021-12-18 12:08:58','2021-12-18 12:14:12'),
(3,'#00000002',13,'2021-12-18',600000,600000,'2021-12-18 12:18:17','2021-12-18 12:18:17'),
(8,'#00000003',12,'2021-12-22',100000,100000,'2021-12-22 07:17:52','2021-12-22 07:18:19'),
(9,'#00000004',13,'2021-12-28',200000,200000,'2021-12-28 13:59:00','2021-12-28 14:00:09');

/*Table structure for table `kamars` */

DROP TABLE IF EXISTS `kamars`;

CREATE TABLE `kamars` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` enum('Standar','Suite','Deluxe') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `stok_tersedia` int(11) NOT NULL,
  `fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kapasitas_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kamars` */

insert  into `kamars`(`id`,`tipe`,`nama`,`harga`,`stok_tersedia`,`fasilitas`,`image`,`kapasitas_kamar`,`created_at`,`updated_at`) values 
(1,'Standar','Regular Standar',100000,8,'1 Tempat tidur, 1 Sofa, 1 Kamar mandi','1638672034.png','1 Dewasa','2021-12-04 18:38:09','2021-12-28 14:00:49'),
(2,'Suite','Regular Suite',200000,4,'2 Tempat tidur, 1 Sofa, 1 Kamar mandi','1638672198.jpg','2 Dewasa','2021-12-04 18:43:18','2021-12-22 05:18:47'),
(3,'Deluxe','Regular Deluxe',300000,3,'3 Tempat tidur, 2 Sofa, 2 Kamar mandi','1638672406.jpg','3 Dewasa','2021-12-04 18:46:46','2021-12-18 12:14:49');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2019_12_14_000001_create_personal_access_tokens_table',1),
(2,'2021_11_27_143552_create_tamus_table',1),
(3,'2021_12_01_130219_create_kamars_table',1),
(4,'2021_12_10_050236_create_bookings_table',1),
(5,'2021_12_10_050648_create_booking_details_table',1);

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `tamus` */

DROP TABLE IF EXISTS `tamus`;

CREATE TABLE `tamus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pengenal` enum('KTP','Paspor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_pengenal` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `is_delete` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `tamus` */

insert  into `tamus`(`id`,`pengenal`,`nomor_pengenal`,`nama`,`alamat`,`telepon`,`email`,`password`,`repassword`,`created_at`,`updated_at`,`admin`,`is_delete`) values 
(1,'KTP','12345679','Admin','Jalan Admin','1234567891','felix_irw25@yahoo.com','$2y$10$Ax51ud8.8FT3jGP2zVntT.AXJSyzo60/9X3JEtLBFY8DtAQEe2zD2','akuadmin','2021-12-09 07:42:15','2021-12-09 07:42:15',1,0),
(12,'KTP','12345678888','ayuliaa','jimbaran, bali','09876543','ayulia123@gmail.com','$2y$10$fHnc5.wb9A9.5yDCteyQbeI2479GdGWP9/qnG.z2bRtpYZTQDg1eC','ayulia','2021-12-03 22:36:45','2021-12-03 22:36:45',0,0),
(13,'KTP','12345678','Felix Irwanto','Jalan Melati Putih','0123456789','felixirwanto25@gmail.com','$2y$10$VNdKfEbIXWAkgtISssnp5e3iErnm3ACcGuVbquEmMKG0qe.th1lfK','123456','2021-12-08 13:16:55','2021-12-13 04:04:06',0,0),
(15,'KTP','23456789','tes','Jalan Melati Puti','012345678912','fico_pie25@gmail.com','$2y$10$Xdw93UMPBKKnYYR5D99xSesMOkCOwZcuZQEoR48n7qlfpRoWbeMT6','qwerty','2021-12-09 17:35:56','2021-12-09 17:35:56',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
