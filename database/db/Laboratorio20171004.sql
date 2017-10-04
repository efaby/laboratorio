-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.25-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema laboratorio
--

CREATE DATABASE IF NOT EXISTS laboratorio;
USE laboratorio;

--
-- Definition of table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cedula` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clientes`
--

/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` (`id`,`cedula`,`nombres`,`apellidos`,`direccion`,`telefono`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'0603718578','Fabian','Cherees','casas',NULL,1,'2017-08-27 14:17:02','2017-08-27 14:22:54',NULL),
 (2,'0637382924','CArla','Manzo','Calle 1','343334334',1,'2017-08-27 14:27:18','2017-08-27 14:27:33','2017-08-27 14:27:33'),
 (3,'0637382924','maria','peres','asas',NULL,1,'2017-08-27 15:12:39','2017-08-27 15:14:13','2017-08-27 15:14:13'),
 (4,'0603718573','asas','qwqw','asas',NULL,1,'2017-08-27 17:17:31','2017-08-27 17:17:31',NULL);
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;


--
-- Definition of table `detalleorden`
--

DROP TABLE IF EXISTS `detalleorden`;
CREATE TABLE `detalleorden` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orden_id` int(10) unsigned NOT NULL,
  `examens_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precio` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `detalleorden_orden_id_foreign` (`orden_id`),
  KEY `detalleorden_examens_id_foreign` (`examens_id`),
  CONSTRAINT `detalleorden_examens_id_foreign` FOREIGN KEY (`examens_id`) REFERENCES `examens` (`id`),
  CONSTRAINT `detalleorden_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalleorden`
--

/*!40000 ALTER TABLE `detalleorden` DISABLE KEYS */;
INSERT INTO `detalleorden` (`id`,`orden_id`,`examens_id`,`created_at`,`updated_at`,`precio`) VALUES 
 (1,1,181,'2017-08-27 13:59:03',NULL,'33.00'),
 (2,1,182,'2017-08-27 13:59:03',NULL,'22.00'),
 (11,3,2,'2017-09-15 06:09:31',NULL,'2.50'),
 (12,3,181,'2017-09-15 06:09:31',NULL,'8.00'),
 (13,3,17,'2017-09-15 06:09:31',NULL,'25.00'),
 (17,4,195,'2017-09-16 00:09:57',NULL,'34.00'),
 (18,4,24,'2017-09-16 00:09:57',NULL,'3.00'),
 (19,4,109,'2017-09-16 00:09:57',NULL,'10.00'),
 (20,5,2,'2017-09-30 01:31:00',NULL,'2.50'),
 (21,6,28,'2017-09-30 02:11:02',NULL,'2.00');
/*!40000 ALTER TABLE `detalleorden` ENABLE KEYS */;


--
-- Definition of table `examan_muestra`
--

DROP TABLE IF EXISTS `examan_muestra`;
CREATE TABLE `examan_muestra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `examan_id` int(10) unsigned NOT NULL,
  `muestra_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examenmuestra_examens_id_foreign` (`examan_id`),
  KEY `examenmuestra_muestras_id_foreign` (`muestra_id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examan_muestra`
--

/*!40000 ALTER TABLE `examan_muestra` DISABLE KEYS */;
INSERT INTO `examan_muestra` (`id`,`examan_id`,`muestra_id`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,2,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (3,3,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (4,4,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,5,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (6,6,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (7,7,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,8,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (9,9,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (10,10,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,11,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (12,12,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (13,13,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (14,14,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (15,15,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (16,16,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (17,17,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (18,18,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (19,19,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (20,20,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (21,21,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (22,22,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (23,23,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (24,24,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (25,25,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (26,26,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (27,27,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (28,28,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (29,29,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (30,30,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (31,31,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (32,32,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (33,33,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (34,34,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (35,35,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (36,36,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (37,37,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (38,38,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (39,39,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (40,40,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (41,41,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (42,42,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (43,43,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (44,44,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (45,45,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (46,46,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (47,47,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (48,48,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (49,49,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (50,50,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (51,51,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (52,52,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (53,53,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (54,54,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (55,55,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (56,56,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (57,57,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (58,58,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (59,59,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (60,60,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (61,61,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (62,62,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (63,63,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (64,64,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (65,65,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (66,66,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (67,67,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (68,68,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (69,69,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (70,70,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (71,71,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (72,72,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (73,73,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (74,74,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (75,75,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (76,76,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (77,77,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (78,78,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (79,79,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (80,80,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (81,81,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (82,82,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (83,83,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (84,84,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (85,85,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (86,86,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (87,87,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (88,88,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (89,89,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (90,90,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (91,91,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (92,92,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (93,93,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (94,94,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (95,95,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (96,96,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (97,97,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (98,98,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (99,99,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (100,100,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (101,101,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (102,102,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (103,103,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (104,104,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (105,105,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (106,106,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (107,107,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (108,108,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (109,109,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (110,110,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (111,111,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (112,112,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (113,113,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (114,114,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (115,115,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (116,116,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (117,117,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (118,118,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (119,119,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (120,120,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (121,121,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (122,122,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (123,123,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (124,124,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (125,125,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (126,126,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (127,127,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (128,128,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (129,129,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (130,130,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (131,131,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (132,132,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (133,133,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (134,134,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (135,135,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (136,136,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (137,137,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (138,138,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (139,139,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (140,140,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (141,141,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (142,142,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (143,143,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (144,144,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (145,145,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (146,146,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (147,147,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (148,148,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (149,149,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (150,150,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (151,151,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (152,152,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (153,153,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (154,154,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (155,155,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (156,156,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (157,157,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (158,167,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (159,168,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (160,169,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (161,170,6,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (162,171,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (163,172,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (164,173,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (165,174,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (166,175,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (167,176,6,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (168,177,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (169,178,5,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (170,179,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (171,180,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (172,181,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (173,182,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (174,183,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (175,184,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (176,185,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (177,186,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (178,187,7,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (182,192,4,NULL,NULL,NULL),
 (183,191,3,NULL,NULL,NULL),
 (184,192,2,NULL,NULL,NULL);
/*!40000 ALTER TABLE `examan_muestra` ENABLE KEYS */;


--
-- Definition of table `examens`
--

DROP TABLE IF EXISTS `examens`;
CREATE TABLE `examens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoexamens_id` int(10) unsigned NOT NULL,
  `nombre` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantilla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio_normal` decimal(5,2) NOT NULL,
  `precio_laboratorio` decimal(5,2) NOT NULL,
  `precio_clinica` decimal(5,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `muestras_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `examens_tipoexamens_id_foreign` (`tipoexamens_id`),
  CONSTRAINT `examens_tipoexamens_id_foreign` FOREIGN KEY (`tipoexamens_id`) REFERENCES `tipoexamens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examens`
--

/*!40000 ALTER TABLE `examens` DISABLE KEYS */;
INSERT INTO `examens` (`id`,`tipoexamens_id`,`nombre`,`plantilla`,`precio_normal`,`precio_laboratorio`,`precio_clinica`,`estado`,`created_at`,`updated_at`,`deleted_at`,`muestras_id`) VALUES 
 (1,1,'HEMATÍES','<p>HEMAT&Iacute;ES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /mm3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','5.00',1,'0000-00-00 00:00:00','2017-08-27 21:45:49',NULL,1),
 (2,1,'HEMOGLOBINA','<p>HEMOGLOBINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','2.50','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 20:51:08',NULL,1),
 (3,1,'HEMATOCRITO','<p>HEMATOCRITO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','2.50','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 20:57:44',NULL,1),
 (4,1,'CMHC','<p>CMHC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 20:59:33',NULL,1),
 (5,1,'VCM','<p>VCM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:00:46',NULL,1),
 (6,1,'HCM','<p>HCM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','6.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:01:36',NULL,1),
 (7,1,'LEUCOCITOS','<p>LEUCOCITOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:02:42',NULL,1),
 (8,1,'FORMULA LEUCOCITARIA','<p>FORMULA LEUCOCITARIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:04:10',NULL,1),
 (9,1,'CAYADOS','<p>CAYADOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:04:56',NULL,1),
 (10,1,'SEGMENTADOS','<p>SEGMENTADOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:05:50',NULL,1),
 (11,1,'EOSINÓFILOS','<p>EOSIN&Oacute;FILOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:06:39',NULL,1),
 (12,1,'BASÓFILOS','<p>BAS&Oacute;FILOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:07:34',NULL,1),
 (13,1,'MONOCITOS','<p>MONOCITOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:08:28',NULL,1),
 (14,1,'LINFOCITOS','<p>LINFOCITOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:09:13',NULL,1),
 (15,1,'PLAQUETAS','<p>PLAQUETAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','2.00','2.00',1,'0000-00-00 00:00:00','2017-08-27 21:10:17',NULL,1),
 (16,1,'RETICULOCITOS','<p>RETICULOCITOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','2.00','2.00',1,'0000-00-00 00:00:00','2017-08-27 21:11:09',NULL,1),
 (17,1,'FROTIS DE SANGRE PERIFÉRICA','<p>FROTIS DE SANGRE PERIF&Eacute;RICA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','25.00','20.00','20.00',1,'0000-00-00 00:00:00','2017-08-27 21:11:55',NULL,2),
 (18,1,'ÁCIDO FÓLICO','<p>&Aacute;CIDO F&Oacute;LICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ng/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2.30-12.0</p>','15.00','13.00','13.00',1,'0000-00-00 00:00:00','2017-08-27 21:46:22',NULL,3),
 (19,1,'COOMBS DIRECTO','<p>COOMBS DIRECTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','5.00',1,'0000-00-00 00:00:00','2017-08-27 21:14:27',NULL,1),
 (20,1,'COOMBS INDIRECTO','<p>COOMBS INDIRECTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','7.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 21:15:18',NULL,2),
 (21,1,'DÍMERO- D.','<p>D&Iacute;MERO- D.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 500</p>','25.00','20.00','20.00',1,'0000-00-00 00:00:00','2017-08-27 21:16:22',NULL,4),
 (22,1,'FERRITINA','<p>FERRITINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ng/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hombres: (20-250)</p>\r\n\r\n<p>FERRITINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ng/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mujeres (10-120)</p>\r\n\r\n<p>FERRITINA &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; ng/mL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; 6 meses a 15 a&ntilde;os (7-140)</p>','12.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-27 21:47:04',NULL,3),
 (23,1,'FIBRINÓGENO','<p>FIBRIN&Oacute;GENO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 150-400</p>','6.00','5.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 21:21:19',NULL,4),
 (24,1,'GRUPO SANGUÍNEO','<p>GRUPO SANGU&Iacute;NEO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','2.50','3.00',1,'0000-00-00 00:00:00','2017-08-27 21:22:34',NULL,1),
 (25,1,'HIERRO SÉRICO','<p>HIERRO S&Eacute;RICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 60-140 mujeres : 40-145</p>\r\n\r\n<p>HIERRO S&Eacute;RICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ni&ntilde;os 1-5 a&ntilde;os: 22-136</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 21:26:15',NULL,3),
 (26,1,'I.R.N','<p>I.R.N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:27:26',NULL,4),
 (27,1,'TIEMPO DE COAGULACIÓN','<p>TIEMPO DE COAGULACI&Oacute;N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; N/A</p>','2.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:28:03',NULL,4),
 (28,1,'TIEMPO DE HEMORRAGIA','<p>TIEMPO DE HEMORRAGIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','2.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 21:28:30',NULL,4),
 (29,1,'TIEMPO DE PROTROMBINA (T.P.)','<p>TIEMPO DE PROTROMBINA (T.P.) seg-% 70-100 000 % (v. ref: 70-100%)</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 21:42:30',NULL,4),
 (30,1,'TIEMPO DE TROMBOPLASTINA PARCIAL (T.T.P.)','<p>TIEMPO DE TROMBOPLASTINA PARCIAL (T.T.P.)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; seg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 45</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 21:43:43',NULL,4),
 (31,1,'TRANSFERRINA','<p>TRANSFERRINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ng/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 200-360</p>','8.00','6.00','5.00',1,'0000-00-00 00:00:00','2017-08-27 21:44:45',NULL,3),
 (32,1,'VITAMINA B12','<p>VITAMINA B12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; pg/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 174-874</p>','15.00','13.00','13.00',1,'0000-00-00 00:00:00','2017-08-27 21:48:40',NULL,3),
 (33,2,'ÁCIDO ÚRICO','<p>&Aacute;CIDO &Uacute;RICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2,5,6,0</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 21:53:34',NULL,3),
 (34,2,'ALBUMINA','<p>ALBUMINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3,5-5,0</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 21:54:42',NULL,3),
 (35,2,'APOLIPOPORTEÍNAS \"A\"','<p>APOLIPOPORTE&Iacute;NAS &quot;A&quot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 122-161</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 21:57:48',NULL,3),
 (36,2,'APOLIPOPORTEÍNAS \"B\"','<p>APOLIPOPORTE&Iacute;NAS &quot;B&quot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 69-105</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 21:58:26',NULL,3),
 (37,2,'B.U.N','<p>B.U.N&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-20</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 21:59:32',NULL,3),
 (38,2,'BILIRRUBINA DIRECTA','<p>BILIRRUBINA DIRECTA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 0.25</p>','3.00','2.00','2.00',1,'0000-00-00 00:00:00','2017-08-27 22:00:19',NULL,3),
 (39,2,'BILIRRUBINA INDIRECTA','<p>BILIRRUBINA INDIRECTA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 0.75</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 22:01:06',NULL,3),
 (40,2,'BILIRRUBINA TOTAL','<p>BILIRRUBINA TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 1.0</p>','3.00','2.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 22:01:38',NULL,3),
 (41,2,'COLESTEROL TOTAL','<p>COLESTEROL TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 200</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:02:32',NULL,3),
 (42,2,'CREATININA','<p>CREATININA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0,60- 1,2</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:03:43',NULL,3),
 (43,2,'CURVA DE TOLERANCIA 50G. DE GLUCOSA','<p>CURVA DE TOLERANCIA 50G. DE GLUCOSA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 22:04:13',NULL,3),
 (44,2,'CURVA DE TOLERANCIA 75G. DE GLUCOSA','<p>CURVA DE TOLERANCIA 75G. DE GLUCOSA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 22:04:44',NULL,3),
 (45,2,'FRUCTOSAMINA','<p>FRUCTOSAMINA &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; umol/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 205-285</p>','6.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 22:05:39',NULL,3),
 (46,2,'GLUCOSA 2H POSTPRANDIAL','<p>GLUCOSA 2H POSTPRANDIAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:06:17',NULL,3),
 (47,2,'GLUCOSA BASAL','<p>GLUCOSA BASAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 70-100</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:06:44',NULL,3),
 (48,2,'HbA1c','<p>HbA1c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pctes. no diabeticos menor a 6.50</p>\r\n\r\n<p>HbA1c&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pctes. diab&eacute;ticos menor a 7.0</p>','15.00','10.00','7.00',1,'0000-00-00 00:00:00','2017-08-27 22:08:05',NULL,1),
 (49,2,'HDL COLESTEROL','<p>HDL COLESTEROL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 45-55</p>\r\n\r\n<p>HDL COLESTEROL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hombres : 35-55</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:09:15',NULL,3),
 (50,2,'LDL COLESTEROL','<p>LDL COLESTEROL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 130</p>','2.50','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 22:09:50',NULL,3),
 (51,2,'LIPIDOS TOTALES','<p>LIPIDOS TOTALES &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 400-800</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:10:32',NULL,3),
 (52,2,'PROTEINAS TOTALES','<p>PROTEINAS TOTALES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 6,0-8,0</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:11:20',NULL,3),
 (53,2,'TRIGLICÉRIDOS','<p>TRIGLIC&Eacute;RIDOS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-150</p>','3.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-09-16 00:30:49',NULL,3),
 (54,2,'ÚREA','<p>&Uacute;REA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-50</p>','2.50','1.50','1.25',1,'0000-00-00 00:00:00','2017-08-27 22:13:07',NULL,3),
 (55,3,'AMILASA','<p>AMILASA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 220</p>','6.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 22:13:57',NULL,3),
 (56,3,'C.P.K','<p>C.P.K&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 24-190</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 22:15:47',NULL,3),
 (57,3,'CK-MB','CK-MB U/L \'hasta 25','10.00','8.00','8.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,3),
 (58,3,'FOSFATASA ÁCIDA PROSTÁTICA','<p>FOSFATASA &Aacute;CIDA PROST&Aacute;TICA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 1.70</p>','5.00','4.00','5.00',1,'0000-00-00 00:00:00','2017-08-27 22:16:38',NULL,3),
 (59,3,'FOSFATASA ÁCIDA TOTAL','<p>FOSFATASA &Aacute;CIDA TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 5.40</p>','5.00','4.00','5.00',1,'0000-00-00 00:00:00','2017-08-27 22:17:17',NULL,3),
 (60,3,'FOSFATASA ALCALINA','<p>FOSFATASA ALCALINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 64-306</p>\r\n\r\n<p>FOSFATASA ALCALINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ni&ntilde;os (hasta 644)</p>','5.00','2.50','2.50',1,'0000-00-00 00:00:00','2017-08-27 22:33:54',NULL,3),
 (61,3,'G.G.T','<p>G.G.T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 11-61</p>\r\n\r\n<p>G.G.T&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MUJERES. 9 -39</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 22:34:53',NULL,3),
 (62,3,'L.D.H.','<p>L.D.H.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 225-450</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 22:36:00',NULL,3),
 (63,3,'LIPASA','<p>LIPASA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 60</p>','6.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 22:36:29',NULL,3),
 (64,3,'T.G.O.','<p>T.G.O.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; hasta 37</p>','4.00','2.50','2.50',1,'0000-00-00 00:00:00','2017-08-27 22:36:56',NULL,3),
 (65,3,'T.G.P.','<p>T.G.P.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 42</p>','4.00','2.50','2.50',1,'0000-00-00 00:00:00','2017-08-27 22:41:01',NULL,3),
 (66,3,'TROPONINA I  (cTnI)','<p>TROPONINA I(cTnI)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 0.60</p>','12.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-27 22:45:25',NULL,3),
 (67,4,'PROCALCITONINA','<p>PROCALCITONINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 0.50</p>','40.00','30.00','30.00',1,'0000-00-00 00:00:00','2017-08-27 22:46:14',NULL,3),
 (68,5,'AGLUTINACIONES FEBRILES','<p>AGLUTINACIONES FEBRILES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','4.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 22:47:05',NULL,3),
 (69,5,'EBERTH \"O\"','<p>EBERTH &quot;O&quot; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; N/A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; N/A</p>','0.00','0.00','0.00',1,'0000-00-00 00:00:00','2017-08-27 22:48:15',NULL,3),
 (70,5,'A.S.T.O','<p>A.S.T.O&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 200</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 19:48:43',NULL,3),
 (71,5,'A.N.A','<p>A.N.A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo: mayor a 1.2</p>\r\n\r\n<p>A.N.A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo: menor a 1.0</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 19:49:11',NULL,3),
 (72,5,'ANA BLOT ( 9 LINE )','<p>ANA BLOT ( 9 LINE )&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','45.00','40.00','40.00',1,'0000-00-00 00:00:00','2017-08-28 19:49:32',NULL,3),
 (73,5,'Anti-CCP','<p>Anti-CCP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 20.0</p>','30.00','20.00','20.00',1,'0000-00-00 00:00:00','2017-08-28 19:50:33',NULL,3),
 (74,5,'Anti-dsDNA','<p>Anti-dsDNA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 20.0</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 19:50:56',NULL,3),
 (75,5,'Anti-Smith','<p>Anti-Smith&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo: mayor a 25 l&iacute;nea de corte: 15-25 Anti-Smith&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo: menor 15</p>','20.00','15.00','15.00',1,'0000-00-00 00:00:00','2017-08-28 19:51:25',NULL,3),
 (76,5,'CELULAS L.E','<p>CELULAS L.E&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','5.00',1,'0000-00-00 00:00:00','2017-08-28 19:52:20',NULL,3),
 (77,5,'F.R.','<p>F.R.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 20.0</p>','6.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 19:52:56',NULL,3),
 (78,5,'P.C.R.','<p>P.C.R.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/L &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; hasta 6.0</p>','6.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 19:53:15',NULL,3),
 (79,5,'A.N.C.A. (P)','<p>A.N.C.A. (P)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 5.0</p>','16.00','13.00','13.00',1,'0000-00-00 00:00:00','2017-08-28 19:53:34',NULL,3),
 (80,5,'Anti-TG','<p>Anti-TG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 125.0</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-28 19:53:54',NULL,3),
 (81,5,'Anti-TPO','<p>Anti-TPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 40.0</p>','18.00','15.00','15.00',1,'0000-00-00 00:00:00','2017-08-28 19:54:41',NULL,3),
 (82,5,'C3','<p>C3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 90-180</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 19:54:58',NULL,3),
 (83,5,'C4','<p>C4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-40</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 19:55:16',NULL,3),
 (84,5,'IgA','<p>IgA mg/dL &#39;70-400</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 19:55:33',NULL,3),
 (85,5,'IgE','<p>IgE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 100.0</p>\r\n\r\n<p>IgE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0-1 a&ntilde;os : 0-15</p>\r\n\r\n<p>IgE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1-5 a&ntilde;os : 0-60</p>\r\n\r\n<p>IgE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6-9 a&ntilde;os : 0-80</p>\r\n\r\n<p>IgE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;10-15 a&ntilde;os: 0-90</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 19:56:06',NULL,3),
 (86,5,'IgG','<p>IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 700-1.600</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 19:56:42',NULL,3),
 (87,5,'IgM','<p>IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 40-230</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 19:57:13',NULL,3),
 (88,6,'Anti- H.A.V IgM','<p>Anti- H.A.V IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>Anti- H.A.V IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','12.00','10.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 19:57:35',NULL,3),
 (89,6,'Anti- H.A.V TOTAL','<p>Anti- H.A.V TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 Anti- H.A.V TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','12.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 19:58:15',NULL,3),
 (90,6,'Anti H.C.V','<p>Anti H.C.V&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 19:58:36',NULL,3),
 (91,6,'C.M.V IgG','<p>C.M.V IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>C.M.V IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 19:59:20',NULL,3),
 (92,6,'C.M.V IgM','<p>C.M.V IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 C.M.V IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 19:59:42',NULL,3),
 (93,6,'CHLAMYDIA IgG','<p>CHLAMYDIA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 CHLAMYDIA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:00:01',NULL,3),
 (94,6,'CHLAMYDIA IgM','<p>CHLAMYDIA IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 CHLAMYDIA IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:00:23',NULL,3),
 (95,6,'DENGUE IgG','<p>DENGUE IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','7.50','5.00','5.00',1,'0000-00-00 00:00:00','2017-08-28 20:00:52',NULL,3),
 (96,6,'DENGUE IgM','<p>DENGUE IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','7.50','5.00','5.00',1,'0000-00-00 00:00:00','2017-08-28 20:01:08',NULL,3),
 (97,6,'EPSTEIN BAAR IgG','<p>EPSTEIN BAAR IgG &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 EPSTEIN BAAR IgG &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:01:36',NULL,3),
 (98,6,'EPSTEIN BAAR IgM','<p>EPSTEIN BAAR IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 EPSTEIN BAAR IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:02:06',NULL,3),
 (99,6,'H.I.V.','<p>H.I.V.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','8.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 20:03:10',NULL,3),
 (100,6,'H.I.V. (ELISA)','<p>H.I.V. (ELISA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:03:29',NULL,3),
 (101,6,'HBcAb','<p>HBcAb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 23:25:40',NULL,3),
 (102,6,'HBcAb IgM','<p>HBcAb IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-27 23:26:14',NULL,3),
 (103,6,'HBeAb','<p>HBeAb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 23:26:59',NULL,3),
 (104,6,'HBeAg','<p>HBeAg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 23:27:30',NULL,3),
 (105,6,'HBsAb','<p>HBsAb&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 23:28:29',NULL,3),
 (106,6,'HBsAb (ELISA)','<p>HBsAb (ELISA)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-27 23:28:58',NULL,3),
 (107,6,'HBsAg','<p>HBsAg&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','6.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-27 23:29:31',NULL,3),
 (108,6,'HBsAg (ELISA)','HBsAg (ELISA) N/A \'N/A','10.00','8.00','8.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,3),
 (109,6,'HELICOBACTER PYLORI  IgG','<p>HELICOBACTER PYLORI IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (v. ref : hasta 20)</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-27 23:30:11',NULL,3),
 (110,6,'HELICOBACTER PYLORI  IgM','<p>HELICOBACTER PYLORI IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (v.ref : hasta 40)</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-27 23:30:38',NULL,3),
 (111,6,'HERPES I IgG','<p>HERPES I IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>HERPES I IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:31:32',NULL,3),
 (112,6,'HERPES I IgM','<p>HERPES I IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90 HERPES I IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:32:23',NULL,3),
 (113,6,'HERPES II IgG','<p>HERPES II IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>HERPES II IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:33:10',NULL,3);
INSERT INTO `examens` (`id`,`tipoexamens_id`,`nombre`,`plantilla`,`precio_normal`,`precio_laboratorio`,`precio_clinica`,`estado`,`created_at`,`updated_at`,`deleted_at`,`muestras_id`) VALUES 
 (114,6,'HERPES II IgM','<p>HERPES II IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>HERPES II IgM&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:34:02',NULL,3),
 (115,6,'RUBEOLA IgG','<p>RUBEOLA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>RUBEOLA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','8.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:34:54',NULL,3),
 (116,6,'RUBEOLA IgM','RUBEOLA IgM index \'(control negativo : menor a 0.90)\n(control positivo   : mayor a 1.10) ','8.00','7.00','6.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,3),
 (117,6,'TOXOPLASMA IgG','<p>TOXOPLASMA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control negativo : menor a 0.90</p>\r\n\r\n<p>TOXOPLASMA IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; index&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; control positivo : mayor a 1.10</p>','10.00','7.00','6.00',1,'0000-00-00 00:00:00','2017-08-27 23:37:03',NULL,3),
 (118,6,'TOXOPLASMA IgM','TOXOPLASMA IgM index \'(control negativo: menor a 0.90)\n(control positivo: mayor a 1.10)','10.00','7.00','6.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,3),
 (119,6,'V.D.R.L.','<p>V.D.R.L.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-27 23:37:28',NULL,3),
 (120,7,'B-H.C.G','<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1ra semana 10-30</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2da semana 30-100</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 3ra semana 100-1.000</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4ta semana 1.000-10.000</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2do-3er mes 30.000-&gt;100.000</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2do trimestre 10.000-30.000</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; 3er trimestre 5.000-15.000</p>\r\n\r\n<p>B-H.C.G&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HOMBRES/MARCADOR TUMORAL: hasta 5.0</p>','12.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:12:25',NULL,3),
 (121,7,'CORTISOL A.M.','<p>CORTISOL A.M.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 5,0-25,0</p>\r\n\r\n<p>CORTISOL A.M.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; menos de 5 dias : 0.6-20.0</p>\r\n\r\n<p>CORTISOL A.M.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2 meses-15 a&ntilde;os : 2.4-23.0</p>\r\n\r\n<p>CORTISOL A.M.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 16-18 a&ntilde;os : 2.4-29.0</p>','10.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:15:50',NULL,3),
 (122,7,'CORTISOL P.M.','<p>CORTISOL P.M. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3.0-13.0</p>','10.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:16:42',NULL,3),
 (123,7,'D.H.E.A.S','<p>D.H.E.A.S&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-162</p>','12.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:17:24',NULL,3),
 (124,7,'ESTRADIOL','<p>ESTRADIOL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &rho;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-158</p>','12.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:18:14',NULL,3),
 (125,7,'F.S.H','<p>F.S.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase folicular 3.30 - 11.30 F.S.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase ovulatoria 5.20 - 20.40 F.S.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase lutea 1.80 - 8.20 F.S.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; menopausia 48.60 - 143.90 F.S.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HOMBRES: 1.0 - 14.0</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:19:33',NULL,3),
 (126,7,'FT3','<p>FT3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &rho;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1,40-4,20</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:20:51',NULL,3),
 (127,7,'FT4','<p>FT4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/dL&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0.80-2.0</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:21:42',NULL,3),
 (128,7,'HORMONA DE CRECIMIENTO','<p>HORMONA DE CRECIMIENTO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 5.0</p>','12.00','9.00','9.00',1,'0000-00-00 00:00:00','2017-08-28 20:22:25',NULL,3),
 (129,7,'INSULINA 2H POSTPARNDIAL','<p>INSULINA 2H POSTPARNDIAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:23:20',NULL,3),
 (130,7,'INSULINA BASAL','<p>INSULINA BASAL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ni&ntilde;os &lt; 12 a&ntilde;os : menor a 10.0</p>\r\n\r\n<p>INSULINA BASAL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; adultos : 2.0-15.0</p>\r\n\r\n<p>INSULINA BASAL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &micro;UI/mL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; diab&eacute;ticos tipo II : 0.7-25.0</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:25:02',NULL,3),
 (131,7,'INSULINA P.M','<p>INSULINA P.M &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:26:05',NULL,3),
 (132,7,'L.H','<p>L.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase folicular 1.60 - 7.90 L.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase ovulatoria 13.20 - 82.70 L.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; fase lutea 0.70 - 9.90 L.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; menopausia 13.20 - 45.70 L.H&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HOMBRES: 0.70 - 7.40</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:27:40',NULL,3),
 (133,7,'P.T.H (Hormona paratiroidea)','<p>P.T.H (Hormona paratiroidea)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &rho;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 15,0 - 65,0</p>','20.00','15.00','15.00',1,'0000-00-00 00:00:00','2017-08-28 20:28:37',NULL,3),
 (134,7,'PEPTIDO \"C\"','<p>PEPTIDO &quot;C&quot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0,80-4,20</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:29:19',NULL,3),
 (135,7,'PROGESTERONA','<p>PROGESTERONA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-159</p>','12.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:29:53',NULL,3),
 (136,7,'PROLACTINA','<p>PROLACTINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 20.0 PROLACTINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; HOMBRES: 1.50 - 12.0</p>','12.00','8.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:30:48',NULL,3),
 (137,7,'T3','<p>T3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0,69-2,02</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:31:47',NULL,3),
 (138,7,'T4','<p>T4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4,40-10,80</p>\r\n\r\n<p>T4&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &micro;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mujeres: 4,80 - 11,0</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:32:58',NULL,3),
 (139,7,'TEST DE EMBARAZO','<p>TEST DE EMBARAZO</p>','5.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:33:41',NULL,3),
 (140,7,'TESTOSTERONA LIBRE','<p>TESTOSTERONA LIBRE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &rho;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-161</p>','25.00','20.00','20.00',1,'0000-00-00 00:00:00','2017-08-28 20:34:10',NULL,3),
 (141,7,'TESTOSTERONA TOTAL','<p>TESTOSTERONA TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-160</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:34:43',NULL,3),
 (142,7,'TSH','<p>TSH&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mUI/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0,35-4,50</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:35:18',NULL,3),
 (143,8,'A.F.P.','<p>A.F.P. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 8.5</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:36:19',NULL,3),
 (144,8,'C.E.A','<p>C.E.A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; menor a 5.0 en no fumadores C.E.A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; menor a 10.0 en fumadores</p>','15.00','10.00','10.00',1,'0000-00-00 00:00:00','2017-08-28 20:37:49',NULL,3),
 (145,8,'CA 125','<p>CA 125&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; UI/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 35.0</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-28 20:38:20',NULL,3),
 (146,8,'CA 15-3','<p>CA 15-3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 37.0</p>','20.00','15.00','15.00',1,'0000-00-00 00:00:00','2017-08-28 20:39:19',NULL,3),
 (147,8,'CA 19-9','<p>CA 19-9&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 40,0</p>','25.00','15.00','15.00',1,'0000-00-00 00:00:00','2017-08-28 20:39:55',NULL,3),
 (148,8,'P.S.A. LIBRE','<p>P.S.A. LIBRE&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 1.3 Equivale al 00.00 %</p>','10.00','8.00','8.00',1,'0000-00-00 00:00:00','2017-08-28 20:41:08',NULL,3),
 (149,8,'P.S.A. TOTAL','<p>P.S.A. TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; hasta 4,0</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 20:43:41',NULL,3),
 (150,8,'TIROGLOBULINA','<p>TIROGLOBULINA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 10-176</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-28 20:44:11',NULL,3),
 (151,9,'CALCIO IÓNICO','<p>CALCIO I&Oacute;NICO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 4,0-5,4</p>','6.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 20:45:26',NULL,3),
 (152,9,'CALCIO TOTAL','<p>CALCIO TOTAL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 8,5-10,5</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:46:10',NULL,3),
 (153,9,'CLORO','<p>CLORO &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; mEq/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 98-106</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:46:50',NULL,3),
 (154,9,'FÓSFORO','<p>F&Oacute;SFORO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#39;2,5-4,8</p>\r\n\r\n<p>F&Oacute;SFORO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ni&ntilde;os : v. ref: 4.0-7.0</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:48:09',NULL,3),
 (155,9,'MAGNESIO','<p>MAGNESIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mg/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1,9-2,5</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:48:54',NULL,3),
 (156,9,'POTASIO','<p>POTASIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mEq/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3,5-5,0</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:49:23',NULL,3),
 (157,9,'SODIO','<p>SODIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; mEq/L&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 135-150</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:50:18',NULL,3),
 (167,11,'B.A.A.R','<p>B.A.A.R&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','4.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:51:25',NULL,5),
 (168,11,'CALCIO','<p>CALCIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:51:54',NULL,5),
 (169,11,'CLORO','<p>CLORO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 20:52:50',NULL,5),
 (170,11,'DEPURACIÓN DE CREATININA','<p>DEPURACI&Oacute;N DE CREATININA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','10.00','5.00','5.00',1,'0000-00-00 00:00:00','2017-08-28 20:53:32',NULL,6),
 (171,11,'E.M.O.','<p>E.M.O. &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; N/A &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; N/A</p>','2.00','1.50','2.50',1,'0000-00-00 00:00:00','2017-08-28 20:54:08',NULL,5),
 (172,11,'GRAM DE GOTA FRESCA','<p>GRAM DE GOTA FRESCA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','1.50','1.50',1,'0000-00-00 00:00:00','2017-08-28 20:54:45',NULL,5),
 (173,11,'MICROALBUMINURIA','<p>MICROALBUMINURIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &eta;g/dL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; hasta 20.0</p>','10.00','5.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 20:55:12',NULL,5),
 (174,11,'POTASIO','<p>POTASIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','4.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:55:57',NULL,5),
 (175,11,'PROTEÍNAS AL AZAR','<p>PROTE&Iacute;NAS AL AZAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','1.50','1.50',1,'0000-00-00 00:00:00','2017-08-28 20:57:17',NULL,5),
 (176,11,'PROTEÍNAS EN 24 HORAS','PROTEÍNAS EN 24 HORAS N/A \'N/A','5.00','4.00','3.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,6),
 (177,11,'SODIO','<p>SODIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','4.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:57:49',NULL,5),
 (178,11,'TEST DE EMBARAZO','<p>TEST DE EMBARAZO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','4.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 20:58:21',NULL,5),
 (179,12,'ADENOVIRUS','<p>ADENOVIRUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','8.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 20:59:07',NULL,7),
 (180,12,'COPROLÓGICO- COPROPARASITARIO','<p>COPROL&Oacute;GICO- COPROPARASITARIO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','3.00','2.00','1.50',1,'0000-00-00 00:00:00','2017-08-28 20:59:41',NULL,7),
 (181,12,'COPROPARASITARIO SERIADO','<p>COPROPARASITARIO SERIADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 21:00:18',NULL,7),
 (182,12,'GIARDIA LAMBLIA Ag.','<p>GIARDIA LAMBLIA Ag.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-28 21:01:05',NULL,7),
 (183,12,'HELICOBACTER PILORY Ag.','<p>HELICOBACTER PILORY Ag.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','15.00','12.00','12.00',1,'0000-00-00 00:00:00','2017-08-28 21:01:34',NULL,7),
 (184,12,'POLIMORFONUCLEARES','<p>POLIMORFONUCLEARES&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','2.00','1.50','1.50',1,'0000-00-00 00:00:00','2017-08-28 21:01:59',NULL,7),
 (185,12,'ROTAVIRUS','<p>ROTAVIRUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','8.00','6.00','6.00',1,'0000-00-00 00:00:00','2017-08-28 21:02:25',NULL,7),
 (186,12,'SANGRE OCULTA','<p>SANGRE OCULTA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','4.00','4.00',1,'0000-00-00 00:00:00','2017-08-28 21:02:53',NULL,7),
 (187,12,'SUBSTANCIAS REDUCTORAS','<p>SUBSTANCIAS REDUCTORAS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>','5.00','3.00','3.00',1,'0000-00-00 00:00:00','2017-08-28 21:03:16',NULL,7),
 (193,2,'teste','<p>tes sdsdsd</p>','3.00','2.00','1.00',1,'2017-08-27 13:43:57','2017-08-28 21:03:33','2017-08-28 21:03:33',7),
 (194,2,'teste','<p>sdsds</p>','4.00','3.00','2.00',1,'2017-08-27 13:49:30','2017-08-28 21:03:24','2017-08-28 21:03:24',2),
 (195,13,'igf1','<p>dfdfdf</p>','34.00','20.00','15.00',1,'2017-09-15 23:54:50','2017-09-15 23:54:50',NULL,3);
/*!40000 ALTER TABLE `examens` ENABLE KEYS */;


--
-- Definition of table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (126,'2014_10_11_163655_create_tipousuarios_table',1),
 (127,'2014_10_12_000000_create_users_table',1),
 (128,'2014_10_12_100000_create_password_resets_table',1),
 (129,'2017_07_28_163755_create_tipoexamens_table',1),
 (130,'2017_07_28_163812_create_tipopacientes_table',1),
 (131,'2017_07_28_163941_create_muestras_table',1),
 (132,'2017_07_28_164030_create_examens_table',1),
 (133,'2017_08_01_052430_create_pacientes_table',1),
 (134,'2017_08_04_055053_create_orden_table',1),
 (135,'2017_08_04_055154_create_detalleorden_table',1),
 (136,'2017_08_04_055226_create_resultado_table',1),
 (137,'2017_08_23_043651_update_examen',1),
 (138,'2017_08_23_045003_create_examen_muestra',1),
 (139,'2017_08_23_045406_create_cliente',1),
 (140,'2017_08_23_050542_update_paciente',1),
 (141,'2017_08_23_051042_update_orden',1),
 (142,'2017_08_25_050456_update_pacientes',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


--
-- Definition of table `muestras`
--

DROP TABLE IF EXISTS `muestras`;
CREATE TABLE `muestras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muestras`
--

/*!40000 ALTER TABLE `muestras` DISABLE KEYS */;
INSERT INTO `muestras` (`id`,`nombre`,`descripcion`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'ACETILCOLINESTERASA   ','ACETILCOLINESTERASA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (2,'ACIDO VALPROICO ','ACIDO VALPROICO ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (3,'AGLUTINACIONES','AGLUTINACIONES',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (4,'A.N.A   (EIA) ','A.N.A   (EIA) ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,'Anti-ds-DNA  (EIA) ','Anti-ds-DNA  (EIA) ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (6,'Anti-ss-DNA ','Anti-ss-DNA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (7,'A.N.C.A. C  ( PR3) ','A.N.C.A. C  ( PR3) ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (8,'A.N.C.A. P  ( MPO)','A.N.C.A. P  ( MPO)',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (9,'Anti C.C.P  (EIA)','Anti C.C.P  (EIA)',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (10,'Anti- Sm','Anti- Sm',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (11,'ANABLOT','ANABLOT',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (12,'Anti-TPO   ','Anti-TPO   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (13,'Anti-TG        ','Anti-TG        ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (14,'PARATOHORMONA ','PARATOHORMONA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (15,'APOLIP.  \"A\" ','APOLIP.  \"A\" ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (16,'APOLIP.  \"B\"','APOLIP.  \"B\"',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (17,'C3   ','C3   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (18,'C4 ','C4 ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (19,'Beta- 2-Microglobulina','Beta- 2-Microglobulina',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (20,'CARBAMAZEPINA','CARBAMAZEPINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (21,'Anti- CCP','Anti- CCP',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (22,'T.G.O. ','T.G.O. ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (23,'L.D.H. ','L.D.H. ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (24,'C.P.K.   ','C.P.K.   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (25,'CK-MB','CK-MB',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (26,'TROPONINA (cTnI)','TROPONINA (cTnI)',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (27,'ALDOLASA   ','ALDOLASA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (28,'CORTISOL  AM','CORTISOL  AM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (29,'CORTISOL  PM','CORTISOL  PM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (30,'H. PARATIROIDEA ','H. PARATIROIDEA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (31,'SODIO ','SODIO ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (32,'POTASIO','POTASIO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (33,'CLORO     ','CLORO     ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (34,'CALCIO TOTAL','CALCIO TOTAL',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (35,'CALCIO IONICO','CALCIO IONICO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (36,'FOSFORO ','FOSFORO ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (37,'MAGNESIO ','MAGNESIO ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (38,'AMONIO   ','AMONIO   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (39,'DIFENILHIDANTOINA','DIFENILHIDANTOINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (40,'FOSF. ACIDA TOTAL','FOSF. ACIDA TOTAL',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (41,'FOSF. ACIDA PROST','FOSF. ACIDA PROST',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (42,'HIERRO SERICO','HIERRO SERICO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (43,'TRANSFERRINA ','TRANSFERRINA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (44,'FERRITINA ','FERRITINA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (45,'ACIDO FOLICO  ','ACIDO FOLICO  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (46,'VITAMINA B12 ','VITAMINA B12 ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (47,'ERITROPOYETINA','ERITROPOYETINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (48,'H. CRECIMIENTO','H. CRECIMIENTO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (49,'TESTOSTERONA','TESTOSTERONA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (50,'S.H.GB.','S.H.GB.',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (51,'DHEAS  ','DHEAS  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (52,'A.C.T. H.    ','A.C.T. H.    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (53,'HbA1c   ','HbA1c   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (54,'BETA - H.C.G    ','BETA - H.C.G    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (55,'BIL. TOTAL ','BIL. TOTAL ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (56,'BIL. DIRECTA ','BIL. DIRECTA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (57,'BIL. INDIRECTA ','BIL. INDIRECTA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (58,'T.G.O  ','T.G.O  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (59,'T.G.P.      ','T.G.P.      ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (60,'FOSF. ALCALINA ','FOSF. ALCALINA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (61,'G.G.T.    ','G.G.T.    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (62,'L.D.H.    ','L.D.H.    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (63,'AMILASA ','AMILASA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (64,'LIPASA   ','LIPASA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (65,'PROTEIN TOTALES ','PROTEIN TOTALES ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (66,'ALBUMINA ','ALBUMINA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (67,'GLOBULINAS ','GLOBULINAS ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (68,'HAV  TOTAL','HAV  TOTAL',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (69,'HAV  IgM  ','HAV  IgM  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (70,'HBsAg','HBsAg',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (71,'HBsAb','HBsAb',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (72,'HBeAg','HBeAg',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (73,'HBeAb','HBeAb',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (74,'HBcAb','HBcAb',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (75,'Anti H.C.V','Anti H.C.V',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (76,'Anti H.I.V. 1 y 2','Anti H.I.V. 1 y 2',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (77,'HBc IgM ','HBc IgM ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (78,'HERPES I   IgG   ','HERPES I   IgG   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (79,'HERPES I   IgM   ','HERPES I   IgM   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (80,'HERPES II  IgG     ','HERPES II  IgG     ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (81,'HERPES II  IgM ','HERPES II  IgM ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (82,'H. PYLORI  IgG ','H. PYLORI  IgG ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (83,'H. PYLORI  IgM','H. PYLORI  IgM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (84,'H. PYLORI  Ag   ','H. PYLORI  Ag   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (85,'IgE  SERICA  ','IgE  SERICA  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (86,'IGF-1','IGF-1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (87,'IgG','IgG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (88,'IgM','IgM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (89,'IgA','IgA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (90,'INSULINA  ','INSULINA  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (91,'PEPTIDO-C   ','PEPTIDO-C   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (92,'INDICE HOMA ','INDICE HOMA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (93,'L.H.  ','L.H.  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (94,'F.S.H.    ','F.S.H.    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (95,'C.E.A    ','C.E.A    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (96,'CA 19-9  ','CA 19-9  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (97,'TIROGLOBULINA ','TIROGLOBULINA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (98,'CA-125','CA-125',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (99,'CA 15-3    ','CA 15-3    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (100,'A.F.P.   ','A.F.P.   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (101,'CA 72-4    ','CA 72-4    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (102,'BETA-H.C.G     ','BETA-H.C.G     ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (103,'MICROALBUMINURIA','MICROALBUMINURIA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (104,'PROLACTINA   ','PROLACTINA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (105,'PROGESTERONA ','PROGESTERONA ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (106,'ESTRADIOL','ESTRADIOL',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (107,'PROCALCITONINA','PROCALCITONINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (108,'P.S.A  TOTAL  ','P.S.A  TOTAL  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (109,'P.S.A  LIBRE  ','P.S.A  LIBRE  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (110,'P.T.H. ','P.T.H. ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (111,'TOXOPLASMA IgG','TOXOPLASMA IgG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (112,'TOXOPLASMA IgM','TOXOPLASMA IgM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (113,'RUBEOLA IgG','RUBEOLA IgG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (114,'RUBEOLA IgM ','RUBEOLA IgM ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (115,'C.M.V.  IgG    ','C.M.V.  IgG    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (116,'C.M.V.  IgM   ','C.M.V.  IgM   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (117,'EPSTEIN BARR IgM ','EPSTEIN BARR IgM ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (118,'CLAMYDIA   IgG','CLAMYDIA   IgG',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (119,'CLAMYDIA IgM','CLAMYDIA IgM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (120,'A.S.T.O   ','A.S.T.O   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (121,'P.C.R.  ','P.C.R.  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (122,'HS- P.C.R.  ','HS- P.C.R.  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (123,'F.R. (LATEX)  ','F.R. (LATEX)  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (124,'H.C.G. ','H.C.G. ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (125,'FT3    ','FT3    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (126,'T4 ','T4 ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (127,'T3 ','T3 ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (128,'FT4  ','FT4  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (129,'T.S.H ','T.S.H ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (130,'V.D.R.L   ','V.D.R.L   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (131,'Anti H.I.V. 1 y 2','Anti H.I.V. 1 y 2',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (132,'VITAMINA D 25 - HIDROXI ','VITAMINA D 25 - HIDROXI ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (133,'17- HIDROXI - PROGESTERONA','17- HIDROXI - PROGESTERONA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (134,'GLUCOSA    ','GLUCOSA    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (135,'CREATININA   ','CREATININA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (136,'UREA      ','UREA      ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (137,'COLESTEROL TOTAL ','COLESTEROL TOTAL ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (138,'COLESTEROL  HDL ','COLESTEROL  HDL ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (139,'COLESTEROL  LDL   ','COLESTEROL  LDL   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (140,'TRIGLICERIDOS    ','TRIGLICERIDOS    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (141,'LIPIDOS TOTALES  ','LIPIDOS TOTALES  ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (142,'ACD. URICO ','ACD. URICO ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (143,'T.P.        ','T.P.        ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (144,'T.T.P. ','T.T.P. ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (145,'DIMERO-D','DIMERO-D',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (146,'T. COAGULACION','T. COAGULACION',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (147,'T. HEMORRAGIA','T. HEMORRAGIA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (148,'FIBRINOGENO','FIBRINOGENO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (149,'HEMAT?ES','HEMAT?ES',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (150,'HEMOGLOBINA','HEMOGLOBINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (151,'HEMATOCRITO','HEMATOCRITO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (152,'CMHC','CMHC',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (153,'VCM','VCM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (154,'HCM','HCM',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (155,'LEUCOCITOS','LEUCOCITOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (156,'FORMULA LEUCOCITARIA','FORMULA LEUCOCITARIA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (157,'CAYADOS','CAYADOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (158,'SEGMENTADOS','SEGMENTADOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (159,'EOSINÓFILOS','EOSINÓFILOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (160,'BASÍFILOS','BASÍFILOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (161,'MONOCITOS','MONOCITOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (162,'LINFOCITOS','LINFOCITOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (163,'PLAQUETAS','PLAQUETAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (164,'RETICULOCITOS','RETICULOCITOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (165,'FROTIS DE SANGRE PERIFÉRICA','FROTIS DE SANGRE PERIF?RICA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (166,'EMO','EMO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (167,'FRESCO','FRESCO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (168,'KOH','KOH',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (169,'COPROPARASITARIO','COPROPARASITARIO',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (170,'SANGRE OCULTA','SANGRE OCULTA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (171,'GRUPO SANGUINEO   ','GRUPO SANGUINEO   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (172,'POLIMORFONUCLEARES ','POLIMORFONUCLEARES ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (173,'AZUCARES REDUCTORES ','AZUCARES REDUCTORES ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (174,'ROTAVIRUS ','ROTAVIRUS ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (175,'ADENOVIRUS','ADENOVIRUS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (176,'GLICEMIA 2 H. POST-INGES-    ','GLICEMIA 2 H. POST-INGES-    ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (177,'TA DE 75 gr de GLUCOSA','TA DE 75 gr de GLUCOSA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (178,'VOLUMEN DE 24 HORAS','VOLUMEN DE 24 HORAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (179,'PROTEINAS  DE 24 HORAS','PROTEINAS  DE 24 HORAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (180,'CREATININA EN SANGRE ','CREATININA EN SANGRE ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (181,'CREATININA EN ORINA   ','CREATININA EN ORINA   ',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (182,'DEPURACION DE CREATININA','DEPURACION DE CREATININA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `muestras` ENABLE KEYS */;


--
-- Definition of table `orden`
--

DROP TABLE IF EXISTS `orden`;
CREATE TABLE `orden` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pacientes_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `abono` decimal(5,2) NOT NULL,
  `tipo_pago` tinyint(4) NOT NULL,
  `iva` decimal(5,2) NOT NULL,
  `subtotal` decimal(5,2) NOT NULL,
  `total` decimal(5,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `descuento` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_medico` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario_atiende` int(11) NOT NULL DEFAULT '0',
  `atendido` int(11) NOT NULL DEFAULT '0',
  `plantilla` longtext COLLATE utf8mb4_unicode_ci,
  `tipopaciente_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `orden_pacientes_id_foreign_idx` (`pacientes_id`),
  CONSTRAINT `orden_pacientes_id_foreign` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orden`
--

/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` (`id`,`pacientes_id`,`user_id`,`fecha_emision`,`fecha_entrega`,`abono`,`tipo_pago`,`iva`,`subtotal`,`total`,`estado`,`created_at`,`updated_at`,`deleted_at`,`cliente_id`,`descuento`,`nombre_medico`,`usuario_atiende`,`atendido`,`plantilla`,`tipopaciente_id`) VALUES 
 (1,1,1,'2017-08-27','2017-08-27 18:59:03','0.00',1,'0.00','5.00','5.00',1,'2017-08-27 13:59:03','2017-09-14 07:23:37',NULL,0,'0','Dr. Coloma',1,1,'<p>COPROPARASITARIO SERIADO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 333 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; N/A</p>\r\n\r\n<p>GIARDIA LAMBLIA Ag.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 88.77</p>\r\n\r\n<div style=\"page-break-after: always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<p>Este texto tambien</p>',1),
 (2,1,1,'2017-09-15','2017-09-29 00:00:00','15.00',1,'0.00','35.00','30.00',1,'2017-09-15 05:18:00','2017-09-15 06:06:20','2017-09-15 06:06:20',0,'5','Dra. caceres',1,0,NULL,1),
 (3,1,1,'2017-09-15','2017-09-16 00:00:00','5.00',1,'0.00','35.50','30.50',1,'2017-09-15 06:07:42','2017-09-15 06:09:31',NULL,0,'5','Dra. cevallos',0,0,NULL,1),
 (4,1,1,'2017-09-15','2017-09-16 00:00:00','0.00',1,'0.00','47.00','47.00',1,'2017-09-15 23:56:40','2017-09-16 00:11:27','2017-09-16 00:11:27',0,'0','Dr. Perez',1,0,'<p>&nbsp;</p>\r\n\r\n<p>HELICOBACTER PYLORI IgG&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; U/mL&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (v. ref : hasta 20)</p>\r\n\r\n<p>dfdfdf</p>\r\n\r\n<div style=\"page-break-after: always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<p>GRUPO SANGU&Iacute;NEO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>\r\n\r\n<p>&nbsp;</p>',1),
 (5,1,1,'2017-09-30','2017-09-30 00:00:00','0.00',1,'0.00','2.50','2.50',1,'2017-09-30 01:31:00',NULL,NULL,0,'0','Juan Montalvo',0,0,NULL,1),
 (6,1,1,'2017-09-30','2017-09-29 21:09:00','0.00',1,'0.00','2.00','2.00',1,'2017-09-30 02:11:02','2017-09-30 02:22:21',NULL,0,'0','Carlos C',1,1,'<p>TIEMPO DE HEMORRAGIA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; N/A</p>\r\n\r\n<div style=\"page-break-after: always\"><span style=\"display:none\">&nbsp;</span></div>\r\n\r\n<p>Otra hoja</p>',1);
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;


--
-- Definition of table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipopacientes_id` int(10) unsigned NOT NULL,
  `cedula` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enfermedades` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_tipopacientes_id_foreign` (`tipopacientes_id`),
  CONSTRAINT `pacientes_tipopacientes_id_foreign` FOREIGN KEY (`tipopacientes_id`) REFERENCES `tipopacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`,`tipopacientes_id`,`cedula`,`nombres`,`apellidos`,`celular`,`direccion`,`telefono`,`genero`,`enfermedades`,`estado`,`created_at`,`updated_at`,`deleted_at`,`edad`) VALUES 
 (1,1,NULL,'Fabian','Villa','0984816234','Calle 1','032943455','Mas','ninguno',1,'2017-08-25 05:41:40','2017-08-25 05:44:34',NULL,34);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


--
-- Definition of table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


--
-- Definition of table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
CREATE TABLE `resultado` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `detalleorden_id` int(10) unsigned NOT NULL,
  `plantilla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resultado_detalleorden_id_foreign` (`detalleorden_id`),
  CONSTRAINT `resultado_detalleorden_id_foreign` FOREIGN KEY (`detalleorden_id`) REFERENCES `detalleorden` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resultado`
--

/*!40000 ALTER TABLE `resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado` ENABLE KEYS */;


--
-- Definition of table `tipoexamens`
--

DROP TABLE IF EXISTS `tipoexamens`;
CREATE TABLE `tipoexamens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipoexamens`
--

/*!40000 ALTER TABLE `tipoexamens` DISABLE KEYS */;
INSERT INTO `tipoexamens` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'HEMATOLOGÍA Y COAGULACIÓN',1,'0000-00-00 00:00:00','2017-08-27 20:20:31',NULL),
 (2,'QUÍMICA SANGUÍNEA',1,'0000-00-00 00:00:00','2017-08-27 20:20:56',NULL),
 (3,'ENZIMAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (4,'MARCADOR DE FASE AGUDA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (5,'SERO-INMUNOLOGÍA',1,'0000-00-00 00:00:00','2017-08-27 20:23:36',NULL),
 (6,'INMUNO-INFECCIOSAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (7,'HORMONAS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (8,'MARCADORES TUMORALES',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (9,'ELECTROLITOS',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (10,'MICROBIOLOGÍA',1,'0000-00-00 00:00:00','2017-08-27 20:24:46',NULL),
 (11,'ORINA',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (12,'HECES',1,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),
 (13,'Otros',1,'2017-09-15 23:53:19','2017-09-15 23:53:19',NULL);
/*!40000 ALTER TABLE `tipoexamens` ENABLE KEYS */;


--
-- Definition of table `tipopacientes`
--

DROP TABLE IF EXISTS `tipopacientes`;
CREATE TABLE `tipopacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipopacientes`
--

/*!40000 ALTER TABLE `tipopacientes` DISABLE KEYS */;
INSERT INTO `tipopacientes` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'Particular',1,'2017-08-25 05:34:35','2017-08-25 05:34:35',NULL),
 (2,'Laboratorios',1,'2017-08-25 05:34:44','2017-08-25 05:34:57',NULL),
 (3,'Clinicas',1,'2017-08-25 05:34:51','2017-08-25 05:34:51',NULL);
/*!40000 ALTER TABLE `tipopacientes` ENABLE KEYS */;


--
-- Definition of table `tipousuarios`
--

DROP TABLE IF EXISTS `tipousuarios`;
CREATE TABLE `tipousuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipousuarios`
--

/*!40000 ALTER TABLE `tipousuarios` DISABLE KEYS */;
INSERT INTO `tipousuarios` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'usuario 1',1,'2017-08-27 15:18:21','2017-08-27 18:15:14',NULL),
 (2,'other',1,'2017-08-27 18:15:23','2017-08-27 18:15:26','2017-08-27 18:15:26'),
 (3,'ssdsd',1,'2017-08-27 18:15:53','2017-08-27 18:15:57','2017-08-27 18:15:57');
/*!40000 ALTER TABLE `tipousuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
