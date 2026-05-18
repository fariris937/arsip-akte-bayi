/*
SQLyog Community v13.3.0 (64 bit)
MySQL - 8.0.45-0ubuntu0.24.04.1 : Database - arsip-akte-bayi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`arsip-akte-bayi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `arsip-akte-bayi`;

/*Table structure for table `akte_bayis` */

DROP TABLE IF EXISTS `akte_bayis`;

CREATE TABLE `akte_bayis` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` int DEFAULT NULL,
  `tahun` int DEFAULT NULL,
  `tanggal_daftar` date NOT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kota_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `akte_bayis_kota_id_foreign` (`kota_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `akte_bayis` */

insert  into `akte_bayis`(`id`,`nama`,`bulan`,`tahun`,`tanggal_daftar`,`tempat_lahir`,`nama_ayah`,`nama_ibu`,`alamat`,`file`,`created_at`,`updated_at`,`kota_id`) values 
(1,'ZAYYAN ELVARO MAHREZ',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[false, \"akte_bayi/69fc0dace7ada_Dokumen_Adminduk_250502085735Akta_Zayyan_Elvaro_Mahrez.pdf\", \"akte_bayi/69fc0dace7c25_Dokumen_Adminduk_250502085735Kk_Agus_Supriyanto.pdf\", \"akte_bayi/69fc0dace7d8f_Dokumen_Adminduk_250502085735Kk_Dari.pdf\", \"akte_bayi/69fc0dace7f50_Dokumen_Adminduk_250502085735Kk_Sakri.pdf\", \"akte_bayi/69fc0dace80ae_F1.03.pdf\", \"akte_bayi/69fc0dace871c_F1.06.pdf\", \"akte_bayi/69fc0dace8d5b_F2.01.pdf\", \"akte_bayi/69fc0dace9155_KK.pdf\", \"akte_bayi/69fc0dace9827_KTP ORTU.pdf\", \"akte_bayi/69fc0dace9cb2_SKL.pdf\"]','2026-05-07 03:57:32','2026-05-07 03:57:32',NULL),
(2,'UKASYA NAUFAL ZAYDEN',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0dad981d2_AKTA NIKAH.pdf\", \"akte_bayi/69fc0dad9867c_Dokumen_Adminduk_250522083840Akta_Ukasya_Naufal_Zayden.pdf\", \"akte_bayi/69fc0dad987b0_Dokumen_Adminduk_250522083840Kk_Eko_Yulianto.pdf\", \"akte_bayi/69fc0dad989b3_F1.06.pdf\", \"akte_bayi/69fc0dad98c41_F2.01.pdf\", \"akte_bayi/69fc0dad98ec1_KK.pdf\", \"akte_bayi/69fc0dad9917a_KTP ORTU.pdf\", \"akte_bayi/69fc0dad994f3_SKL.pdf\"]','2026-05-07 03:57:33','2026-05-07 03:57:33',NULL),
(3,'RINJANI AULIA LESTARI',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0dae8e7af_AKTA NIKAH.pdf\", \"akte_bayi/69fc0dae8ec3b_Dokumen_Adminduk_250602105653Akta_Rinjani_Aulia_Lestari.pdf\", \"akte_bayi/69fc0dae8ee66_Dokumen_Adminduk_250602105653Kk_Sukarji.pdf\", \"akte_bayi/69fc0dae8ef89_F1.06.pdf\", \"akte_bayi/69fc0dae8f1e7_F2.01.pdf\", \"akte_bayi/69fc0dae8f580_KK.pdf\", \"akte_bayi/69fc0dae8f904_KTP ORTU.pdf\", \"akte_bayi/69fc0dae8fd93_SKL.pdf\", \"akte_bayi/69fc0dae90613_SURAT PERNYATAAN BENAR ANAK KANDUNG.pdf\"]','2026-05-07 03:57:34','2026-05-07 03:57:34',NULL),
(4,'RAIFA ARAMOANA DZAHABBIYAH',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0daf5b5cd_AKTA NIKAH.pdf\", \"akte_bayi/69fc0daf5c664_Dokumen_Adminduk_250602085931Akta_Raifa_Aramoana_Dzahabbiyah.pdf\", \"akte_bayi/69fc0daf5cb60_Dokumen_Adminduk_250602085931Kk_Hargo_Teguh_Widodo.pdf\", \"akte_bayi/69fc0daf5d1fd_F1.06.pdf\", \"akte_bayi/69fc0daf5d5fc_F2.01.pdf\", \"akte_bayi/69fc0daf5d96d_KK.pdf\", \"akte_bayi/69fc0daf5dc8d_KTP ORTU.pdf\", \"akte_bayi/69fc0daf5e3f9_SKL.pdf\"]','2026-05-07 03:57:35','2026-05-07 03:57:35',NULL),
(5,'MUHAMMAD HAMILUL QURAN',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db05131a_BUKU NIKAH.pdf\", \"akte_bayi/69fc0db051a6a_Dokumen_Adminduk_250522083646Akta_Muhammad_Hamilul_Quran.pdf\", \"akte_bayi/69fc0db051ddf_Dokumen_Adminduk_250522083646Kk_Mochamad_Amrozi.pdf\", \"akte_bayi/69fc0db051f9a_Dokumen_Adminduk_250522083646Km_Supardi.pdf\", \"akte_bayi/69fc0db052179_F1.06.pdf\", \"akte_bayi/69fc0db0523e3_F2.01 KELAHIRAN.pdf\", \"akte_bayi/69fc0db052708_F2.01 KEMATIAN.pdf\", \"akte_bayi/69fc0db052a4d_KK.pdf\", \"akte_bayi/69fc0db052e16_KTP ORTU.pdf\", \"akte_bayi/69fc0db0534be_SKL.pdf\", \"akte_bayi/69fc0db053852_SURAT KEMATIAN.pdf\"]','2026-05-07 03:57:36','2026-05-07 03:57:36',NULL),
(6,'MUHAMMAD DHAFIN ALFARIZKI (NGURUS MANDIRI NAMA IBU BERMASALAH)',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db11c0ee_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db11cbb0_F1.06.pdf\", \"akte_bayi/69fc0db11d65f_F2.01.pdf\", \"akte_bayi/69fc0db11e0eb_KK.pdf\", \"akte_bayi/69fc0db11e8d5_KTP ORTU.pdf\", \"akte_bayi/69fc0db11ef75_SKL.pdf\", \"akte_bayi/69fc0db11f675_WhatsApp Image 2025-05-26 at 09.10.37.jpeg\", \"akte_bayi/69fc0db11fc3c_WhatsApp Image 2025-05-26 at 09.18.30.jpeg\"]','2026-05-07 03:57:37','2026-05-07 03:57:37',NULL),
(7,'MECCA KIREINA NAYYARA (NGURUS SENDIRI KE MPP, AKTA ORANG TUA HILANG)',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db1c2bb6_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db1c31a8_F1.06.pdf\", \"akte_bayi/69fc0db1c34d2_F2.01.pdf\", \"akte_bayi/69fc0db1c3734_KK.pdf\", \"akte_bayi/69fc0db1c3dfd_KTP ORTU.pdf\", \"akte_bayi/69fc0db1c4784_SKL.pdf\", \"akte_bayi/69fc0db1c58c3_Surat Pernyataan Benar Anak Kandung.pdf\"]','2026-05-07 03:57:37','2026-05-07 03:57:37',NULL),
(8,'KEINARRA ZHEA PRASETIYA',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db26db5b_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db26e124_Dokumen_Adminduk_250517092512Akta_Keinarra_Zhea_Prasetiya.pdf\", \"akte_bayi/69fc0db26e2e1_Dokumen_Adminduk_250517092512Kk_Eko_Budi_Prasetiyo.pdf\", \"akte_bayi/69fc0db26e63c_F1.06.pdf\", \"akte_bayi/69fc0db26e889_F2.01.pdf\", \"akte_bayi/69fc0db26f1e2_KK.pdf\", \"akte_bayi/69fc0db26f934_KTP ORTU.pdf\", \"akte_bayi/69fc0db26fd19_SKL.pdf\"]','2026-05-07 03:57:38','2026-05-07 03:57:38',NULL),
(9,'KEINARRA FILIO SHOFIA FIRMANSYAH',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db3102aa_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db310793_Dokumen_Adminduk_250515102129Akta_Keinarra_Filio_Shofia_Firmansyah.pdf\", \"akte_bayi/69fc0db3109a4_Dokumen_Adminduk_250515102129Kk_Beny_Firmansyah.pdf\", \"akte_bayi/69fc0db310b1b_F1.06.pdf\", \"akte_bayi/69fc0db310d63_F2.01.pdf\", \"akte_bayi/69fc0db310f54_KK.pdf\", \"akte_bayi/69fc0db3111c5_KTP ORTU.pdf\", \"akte_bayi/69fc0db311398_SKL.pdf\"]','2026-05-07 03:57:39','2026-05-07 03:57:39',NULL),
(10,'HAFIDZOH HAFZAH',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db3dcac0_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db3dcf2a_Dokumen_Adminduk_250505081926Akta_Hafidzoh_Hafzah.pdf\", \"akte_bayi/69fc0db3dd11c_Dokumen_Adminduk_250505081926Kk_Dwi_Yanda_Irsandi_Buata.pdf\", \"akte_bayi/69fc0db3dd2b0_F1.06.pdf\", \"akte_bayi/69fc0db3dd4b9_F2.01.pdf\", \"akte_bayi/69fc0db3dddda_KK.pdf\", \"akte_bayi/69fc0db3de681_KTP ORTU.pdf\", \"akte_bayi/69fc0db3decb6_SKL.pdf\", \"akte_bayi/69fc0db3df1ad_Surat Pernyataan Anak Kandung.pdf\"]','2026-05-07 03:57:39','2026-05-07 03:57:39',NULL),
(11,'ATHIRA ARDILLAH PUTRI',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db4aaa76_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db4ab1fb_Dokumen_Adminduk_250502090012Akta_Athira_Ardillah_Putri.pdf\", \"akte_bayi/69fc0db4ab4cb_Dokumen_Adminduk_250502090012Kk_Sugiarto.pdf\", \"akte_bayi/69fc0db4ab6f9_F1.06.pdf\", \"akte_bayi/69fc0db4ac1af_F2.01.pdf\", \"akte_bayi/69fc0db4ac3df_KK.pdf\", \"akte_bayi/69fc0db4ac6db_KTP ORTU.pdf\", \"akte_bayi/69fc0db4aca5e_SKL.pdf\"]','2026-05-07 03:57:40','2026-05-07 03:57:40',NULL),
(12,'ATHARFA EVANDER SAHID',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[false, \"akte_bayi/69fc0db5b067f_Dokumen_Adminduk_250502141729Akta_Atharfa_Evander_Sahid.pdf\", \"akte_bayi/69fc0db5b08fc_Dokumen_Adminduk_250502141729Kk_Novian_Nur_Hudah_Pratama.pdf\", \"akte_bayi/69fc0db5b0a6b_F1.06.pdf\", \"akte_bayi/69fc0db5b0d46_F2.01.pdf\", \"akte_bayi/69fc0db5b0fcf_KK.pdf\", \"akte_bayi/69fc0db5b1256_KTP ORTU.pdf\", \"akte_bayi/69fc0db5b1592_SKL.pdf\", \"akte_bayi/69fc0db5b17e1_Surat Pernyataan Benar Anak Kandung.pdf\"]','2026-05-07 03:57:41','2026-05-07 03:57:41',NULL),
(13,'ALFAREZI ADITYA RAHARJA',5,2025,'2025-05-13',NULL,NULL,NULL,NULL,'[\"akte_bayi/69fc0db6a5f0c_AKTA NIKAH.pdf\", \"akte_bayi/69fc0db6a6396_Dokumen_Adminduk_250502090144Akta_Alfarezi_Aditya_Raharja.pdf\", \"akte_bayi/69fc0db6a6588_Dokumen_Adminduk_250502090144Kk_Suliono.pdf\", \"akte_bayi/69fc0db6a66cf_Dokumen_Adminduk_250502090144Km_Sahab.pdf\", \"akte_bayi/69fc0db6a686f_F1.06.pdf\", \"akte_bayi/69fc0db6a6b07_F2.01 KELAHIRAN.pdf\", \"akte_bayi/69fc0db6a6d61_F2.01 KEMATIAN.pdf\", \"akte_bayi/69fc0db6a7037_KK.pdf\", \"akte_bayi/69fc0db6a788e_KTP ORTU.pdf\", \"akte_bayi/69fc0db6a8222_SKL.pdf\", \"akte_bayi/69fc0db6a8755_SURAT KETERANGAN KEMATIAN.pdf\", \"akte_bayi/69fc0db6a8a49_SURAT PERNYATAAN BENAR ANAK KANDUNG.pdf\"]','2026-05-07 03:57:42','2026-05-07 03:57:42',NULL);

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `kotas` */

DROP TABLE IF EXISTS `kotas`;

CREATE TABLE `kotas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kotas` */

insert  into `kotas`(`id`,`nama`,`created_at`,`updated_at`) values 
(1,'Gresik','2026-01-23 01:25:04','2026-01-23 01:25:04'),
(2,'Mojokerto','2026-01-23 01:25:15','2026-01-23 01:25:15');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_10_01_000000_add_is_admin_to_users_table',1),
(5,'2026_01_14_113323_create_akte_bayis_table',1),
(6,'2026_01_23_063613_add_beda_kota_to_akte_bayis_table',1),
(7,'2026_01_23_064214_create_kotas_table',1),
(8,'2026_01_23_065843_modify_akte_bayis_add_kota_id_drop_beda_kota',1),
(9,'2026_01_23_075111_add_bulan_tahun_to_akte_bayis_table',1),
(10,'2026_01_23_082205_modify_file_column_in_akte_bayis_table',2),
(11,'2026_01_25_000000_add_fields_to_akte_bayis_table',3);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('cUqDBqhuC1yHDg1V6doO3od5Kws1WhmRhG0faoiO',1,'192.168.2.10','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoicTdlQ0pFeVAyY2ZTRTdNS1VZeXJTTzgzZEFsZW5iazUyWnV1ZVk4biI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xOTIuMTY4LjIuMjAvYXJzaXAtYWt0ZS1iYXlpL2FrdGUtYmF5aSI7czo1OiJyb3V0ZSI7czoxNToiYWt0ZS1iYXlpLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1778126099),
('N0Hh0ajYvg8JRAgT15uGjQ0xxKGnZGKzMIbrahmM',1,'192.168.2.80','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoib1hKVjI2Mk5JUGFhSHMwREdndVE5UDdMekdjVlVkMFJtWGh2ZEFEMCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xOTIuMTY4LjIuMjAvYXJzaXAtYWt0ZS1iYXlpL2FrdGUtYmF5aSI7czo1OiJyb3V0ZSI7czoxNToiYWt0ZS1iYXlpLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1778126798);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`is_admin`) values 
(1,'Admin User','admin@rs.com','2026-01-23 01:07:59','$2y$12$Bzrg48BHz8PA4JnN4Dstwuno.B/dzApVMhBKSftAV9vLSAP2M.c3i','HErYlhMo4BRx2ACC1Zkil7wVH3ZdjRDlbPYChjpOXUv92Z0dP6CGP4NF8PM3','2026-01-23 01:08:00','2026-01-23 01:08:00',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


ALTER TABLE `akte_bayis`
ADD CONSTRAINT `akte_bayis_kota_id_foreign`
FOREIGN KEY (`kota_id`) REFERENCES `kotas` (`id`)
ON DELETE SET NULL;
