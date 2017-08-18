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
-- Definition of table `detalleorden`
--

DROP TABLE IF EXISTS `detalleorden`;
CREATE TABLE `detalleorden` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `orden_id` int(10) unsigned NOT NULL,
  `examens_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalleorden_orden_id_foreign` (`orden_id`),
  KEY `detalleorden_examens_id_foreign` (`examens_id`),
  CONSTRAINT `detalleorden_examens_id_foreign` FOREIGN KEY (`examens_id`) REFERENCES `examens` (`id`),
  CONSTRAINT `detalleorden_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalleorden`
--

/*!40000 ALTER TABLE `detalleorden` DISABLE KEYS */;
INSERT INTO `detalleorden` (`id`,`orden_id`,`examens_id`,`created_at`,`updated_at`) VALUES 
 (1,10,6,'2017-08-16 04:39:49',NULL),
 (2,10,7,'2017-08-16 04:39:49',NULL),
 (3,11,4,'2017-08-17 03:16:18',NULL),
 (4,11,5,'2017-08-17 03:16:18',NULL),
 (5,11,6,'2017-08-17 03:16:18',NULL);
/*!40000 ALTER TABLE `detalleorden` ENABLE KEYS */;


--
-- Definition of table `examens`
--

DROP TABLE IF EXISTS `examens`;
CREATE TABLE `examens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipoexamens_id` int(10) unsigned NOT NULL,
  `muestras_id` int(10) unsigned NOT NULL,
  `nombre` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plantilla` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `precio_especial` decimal(5,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `examens_tipoexamens_id_foreign` (`tipoexamens_id`),
  KEY `examens_muestras_id_foreign` (`muestras_id`),
  CONSTRAINT `examens_muestras_id_foreign` FOREIGN KEY (`muestras_id`) REFERENCES `muestras` (`id`),
  CONSTRAINT `examens_tipoexamens_id_foreign` FOREIGN KEY (`tipoexamens_id`) REFERENCES `tipoexamens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examens`
--

/*!40000 ALTER TABLE `examens` DISABLE KEYS */;
INSERT INTO `examens` (`id`,`tipoexamens_id`,`muestras_id`,`nombre`,`plantilla`,`precio`,`precio_especial`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,1,1,'Examen 1','<p>wekkk</p>','3.00','7.00',1,'2017-08-05 03:38:54','2017-08-16 02:20:17',NULL),
 (2,1,2,'Examen 2','<p>aLa</p>','3.00','2.00',1,'2017-08-13 15:45:25','2017-08-13 15:45:25',NULL),
 (3,1,1,'Examen 3','<p>Exaneb</p>','2.00','4.00',1,'2017-08-16 02:02:39','2017-08-16 02:02:39',NULL),
 (4,1,2,'Examen 4','<p>l</p>','5.00','10.00',1,'2017-08-16 02:03:10','2017-08-16 02:03:10',NULL),
 (5,1,1,'Examen 5','<p>l</p>','16.00','32.00',1,'2017-08-16 02:03:59','2017-08-16 02:03:59',NULL),
 (6,1,1,'Examen 6','<p>xzs</p>','7.00','14.00',1,'2017-08-16 02:16:35','2017-08-16 02:16:35',NULL),
 (7,1,1,'Examen 7','<p>s</p>','6.00','12.00',1,'2017-08-16 02:17:02','2017-08-16 02:17:02',NULL),
 (8,1,1,'Examen 8','<p>sds</p>','9.00','18.00',1,'2017-08-16 02:17:27','2017-08-16 02:17:27',NULL),
 (9,1,1,'Examen 9','<p>sd&ntilde;</p>','10.00','20.00',1,'2017-08-16 04:55:00','2017-08-16 04:55:00',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`,`migration`,`batch`) VALUES 
 (55,'2014_10_11_163655_create_tipousuarios_table',1),
 (56,'2014_10_12_000000_create_users_table',1),
 (57,'2014_10_12_100000_create_password_resets_table',1),
 (58,'2017_07_28_163755_create_tipoexamens_table',1),
 (59,'2017_07_28_163812_create_tipopacientes_table',1),
 (60,'2017_07_28_163941_create_muestras_table',1),
 (61,'2017_07_28_164030_create_examens_table',1),
 (62,'2017_08_01_052430_create_pacientes_table',1),
 (63,'2017_08_04_055053_create_orden_table',1),
 (64,'2017_08_04_055154_create_detalleorden_table',1),
 (65,'2017_08_04_055226_create_resultado_table',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muestras`
--

/*!40000 ALTER TABLE `muestras` DISABLE KEYS */;
INSERT INTO `muestras` (`id`,`nombre`,`descripcion`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'Muestra 1','Muestra 1',1,'2017-08-05 01:46:51','2017-08-05 01:46:51',NULL),
 (2,'Muestra 2','Muestra 2',1,'2017-08-13 15:42:43','2017-08-13 15:42:43',NULL);
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
  `subtotal` decimal(5,2) NOT NULL,
  `descuento` double DEFAULT NULL,
  `total` decimal(5,2) NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orden_pacientes_id_foreign` (`pacientes_id`),
  CONSTRAINT `orden_pacientes_id_foreign` FOREIGN KEY (`pacientes_id`) REFERENCES `tipopacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orden`
--

/*!40000 ALTER TABLE `orden` DISABLE KEYS */;
INSERT INTO `orden` (`id`,`pacientes_id`,`user_id`,`fecha_emision`,`fecha_entrega`,`abono`,`tipo_pago`,`subtotal`,`descuento`,`total`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,1,1,'2017-08-16','2017-08-16 03:38:52','1.00',1,'5.00',1,'4.00',1,NULL,NULL,NULL),
 (2,1,1,'2017-08-16','2017-08-16 03:40:03','1.00',1,'7.00',1,'6.00',1,'2017-08-16 03:40:03',NULL,NULL),
 (3,1,1,'2017-08-16','2017-08-16 03:41:20','1.00',1,'5.00',1,'4.00',1,'2017-08-16 03:41:20',NULL,NULL),
 (4,1,1,'2017-08-16','2017-08-16 03:41:49','1.00',1,'16.00',1,'15.00',1,'2017-08-16 03:41:49',NULL,NULL),
 (5,1,1,'2017-08-16','2017-08-16 04:22:30','1.00',1,'7.00',1,'6.00',1,'2017-08-16 04:22:30',NULL,NULL),
 (6,1,1,'2017-08-16','2017-08-16 04:26:02','1.00',1,'7.00',1,'6.00',1,'2017-08-16 04:26:02',NULL,NULL),
 (7,1,1,'2017-08-16','2017-08-16 04:29:20','1.00',1,'7.00',1,'6.00',1,'2017-08-16 04:29:20',NULL,NULL),
 (8,1,1,'2017-08-16','2017-08-16 04:34:40','1.00',1,'7.00',1,'6.00',1,'2017-08-16 04:34:40',NULL,NULL),
 (9,1,1,'2017-08-16','2017-08-16 04:36:08','1.00',1,'13.00',1,'12.00',1,'2017-08-16 04:36:08',NULL,NULL),
 (10,1,1,'2017-08-16','2017-08-16 04:39:49','1.00',1,'13.00',1,'12.00',1,'2017-08-16 04:39:49',NULL,NULL),
 (11,1,1,'2017-08-17','2017-08-17 03:16:18','10.00',1,'28.00',1,'27.00',1,'2017-08-17 03:16:18',NULL,NULL);
/*!40000 ALTER TABLE `orden` ENABLE KEYS */;


--
-- Definition of table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipopacientes_id` int(10) unsigned NOT NULL,
  `cedula` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `celular` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enfermedades` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pacientes_tipopacientes_id_foreign` (`tipopacientes_id`),
  CONSTRAINT `pacientes_tipopacientes_id_foreign` FOREIGN KEY (`tipopacientes_id`) REFERENCES `tipopacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`,`tipopacientes_id`,`cedula`,`nombres`,`apellidos`,`fecha_nacimiento`,`celular`,`direccion`,`telefono`,`genero`,`enfermedades`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,1,'0602567801','Juan','Perez','2010-03-11','0994006084','Los Pinos','032940026','Mas','Varias Enfermedades de \r\nPruebas',1,'2017-08-10 04:40:16','2017-08-13 16:19:30',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipoexamens`
--

/*!40000 ALTER TABLE `tipoexamens` DISABLE KEYS */;
INSERT INTO `tipoexamens` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'EMO',1,'2017-08-05 01:45:14','2017-08-05 01:45:31',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipopacientes`
--

/*!40000 ALTER TABLE `tipopacientes` DISABLE KEYS */;
INSERT INTO `tipopacientes` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'Paciente Normal',1,'2017-08-05 01:42:41','2017-08-05 01:42:41',NULL),
 (2,'Paciente Expecial',1,'2017-08-13 16:03:50','2017-08-13 16:03:50',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipousuarios`
--

/*!40000 ALTER TABLE `tipousuarios` DISABLE KEYS */;
INSERT INTO `tipousuarios` (`id`,`nombre`,`estado`,`created_at`,`updated_at`,`deleted_at`) VALUES 
 (1,'Administrador',1,'2017-08-05 01:43:08','2017-08-05 01:43:25',NULL),
 (2,'Secretaria',1,'2017-08-13 15:40:50','2017-08-13 15:40:50',NULL);
/*!40000 ALTER TABLE `tipousuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
