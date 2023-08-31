-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: task_update
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Admin','0129371212','admin@gmail.com',NULL,'$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u',NULL,NULL,NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (4,'Blog','Blog Description','2023-07-30 20:07:55','2023-07-31 12:40:56','active',''),(5,'Novel','Novel US change','2023-07-31 12:28:51','2023-08-30 08:11:30','active','novel'),(8,'Story','Story Desc','2023-07-31 14:28:37','2023-08-30 08:09:12','inactive','story'),(10,'Romantic','Romantic','2023-07-31 16:28:21','2023-08-20 23:51:47','inactive','romantic'),(19,'Horror','Horror desc','2023-08-28 04:19:27','2023-08-28 04:19:27','active','horror');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'hao','quochao@gmail.com','0123456789','binh chanh',NULL,NULL),(3,'hao le','quochao2k2@gmail.com','1223456789','binh chanh','2023-08-09 00:48:48','2023-08-25 03:17:39'),(11,'hao le','quochao2k@gmail.com','1233456789','binh chanh','2023-08-09 02:47:23','2023-08-09 02:47:23'),(22,'hao le','thomaszen63@gmail.com','1234556789','phu tho','2023-08-28 02:22:27','2023-08-28 02:22:27'),(27,'hao le','thomaszen@gmail.com','1234568943','go vap','2023-08-28 05:24:27','2023-08-28 05:24:27'),(50,'hao le','quochao2K2@gmail.com','1233456789','binh chanh','2023-08-31 11:01:11','2023-08-31 11:01:11');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `histories`
--

DROP TABLE IF EXISTS `histories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `histories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int NOT NULL,
  `total_amount` decimal(8,2) NOT NULL,
  `product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `links` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `histories`
--

LOCK TABLES `histories` WRITE;
/*!40000 ALTER TABLE `histories` DISABLE KEYS */;
INSERT INTO `histories` VALUES (1,'NCC','w opsgreat 2',4,8000.00,'2',NULL,NULL,'pending','http://task-update.test/admin/sale/detail/35'),(2,'w opsgreat 2','opsgreat 1',4,20000.00,'9,23',NULL,NULL,'pending',''),(3,'opsgreat 2','quochao2k2@gmail.com',2,4000.00,'2',NULL,NULL,'pending','http://task-update.test/admin/sale/detail/35'),(5,'NCC','w opsgreat 2',3,884.00,'9,16,23','2023-08-24 04:46:03','2023-08-24 04:46:03','pending','http://task-update.test/admin/orders/detail/103'),(6,'w opsgreat 2','quochao2k2@gmail.com',2,333.00,'2,8','2023-08-24 05:03:27','2023-08-24 05:03:27','pending','http://task-update.test/admin/sale/detail/38'),(7,'w opsgreat 2','quochao2k2@gmail.com',2,884.00,'16,23','2023-08-24 06:41:20','2023-08-24 06:41:20','pending','http://task-update.test/admin/sale/detail/40'),(8,'w opsgreat 2','quochao2k2@gmail.com',1,2000.00,'2','2023-08-25 03:13:14','2023-08-25 03:13:14','pending','http://task-update.test/admin/sale/detail/41'),(9,'w opsgreat 2','quochao2k2@gmail.com',1,2000.00,'2','2023-08-25 03:17:39','2023-08-25 03:17:39','pending','http://task-update.test/admin/sale/detail/42'),(10,'NCC','w opsgreat 2',6,12000.00,'2','2023-08-25 04:44:23','2023-08-25 04:44:23','pending','http://task-update.test/admin/orders/detail/104'),(11,'NCC','w opsgreat 2',31,5304.00,'2,7,8,9,16,23','2023-08-25 04:56:26','2023-08-25 04:56:26','pending','http://task-update.test/admin/orders/detail/119'),(12,'NCC','w opsgreat 3',1,333.00,'9','2023-08-25 07:17:21','2023-08-25 07:17:21','pending','http://task-update.test/admin/orders/detail/120'),(13,'NCC','w opsgreat 3',1,884.00,'23','2023-08-25 07:27:12','2023-08-25 07:27:12','pending','http://task-update.test/admin/orders/detail/123'),(14,'NCC','w opsgreat 3',1,333.00,'9','2023-08-25 07:28:49','2023-08-25 07:28:49','pending','http://task-update.test/admin/orders/detail/124'),(15,'NCC','w opsgreat 3',1,333.00,'9','2023-08-25 07:30:00','2023-08-25 07:30:00','pending','http://task-update.test/admin/orders/detail/126'),(16,'NCC','w opsgreat 1',15,4420.00,'9,16,23','2023-08-25 07:32:51','2023-08-25 07:32:51','pending','http://task-update.test/admin/orders/detail/127'),(17,'NCC','w opsgreat 1',18,1768.00,'7,8,9,16,23','2023-08-25 08:20:36','2023-08-25 08:20:36','pending','http://task-update.test/admin/orders/detail/128'),(18,'NCC','w opsgreat 2',18,1768.00,'7,8,9,16,23','2023-08-25 08:20:36','2023-08-25 08:20:36','pending','http://task-update.test/admin/orders/detail/129'),(19,'NCC','w opsgreat 3',18,1768.00,'7,8,9,16,23','2023-08-25 08:20:36','2023-08-25 08:20:36','pending','http://task-update.test/admin/orders/detail/130'),(20,'NCC','w opsgreat 4',18,1768.00,'7,8,9,16,23','2023-08-25 08:20:37','2023-08-25 08:20:37','pending','http://task-update.test/admin/orders/detail/131'),(21,'NCC','w opsgreat 1',1,333.00,'7','2023-08-25 08:21:19','2023-08-25 08:21:19','pending','http://task-update.test/admin/orders/detail/132'),(22,'w opsgreat 2','thomaszen63@gmail.com',2,333.00,'2,7','2023-08-28 02:22:27','2023-08-28 02:22:27','pending','http://task-update.test/admin/sale/detail/43'),(23,'NCC','w opsgreat 2',7,1776.00,'16,24','2023-08-28 04:35:49','2023-08-28 04:35:49','pending','http://task-update.test/admin/orders/detail/133'),(24,'NCC','w opsgreat 3',7,1776.00,'16,24','2023-08-28 04:35:49','2023-08-28 04:35:49','pending','http://task-update.test/admin/orders/detail/134'),(25,'w opsgreat 2','quochao2k2@gmail.com',3,444.00,'16,23,24','2023-08-28 04:53:32','2023-08-28 04:53:32','pending','http://task-update.test/admin/sale/detail/44'),(26,'w opsgreat 2','thomaszen@gmail.com',3,2652.00,'23','2023-08-28 05:24:27','2023-08-28 05:24:27','pending','http://task-update.test/admin/sale/detail/45'),(27,'w opsgreat 2','thomaszen@gmail.com',3,2652.00,'23','2023-08-28 05:25:40','2023-08-28 05:25:40','pending','http://task-update.test/admin/sale/detail/46'),(28,'w opsgreat 2','thomaszen63@gmail.com',1,333.00,'7','2023-08-28 05:29:38','2023-08-28 05:29:38','pending','http://task-update.test/admin/sale/detail/47'),(29,'NCC','w opsgreat 2',15,4420.00,'2,23','2023-08-28 06:34:22','2023-08-28 06:34:22','pending','http://task-update.test/admin/orders/detail/135'),(30,'NCC','w opsgreat 2',2,888.00,'24','2023-08-28 07:42:13','2023-08-28 07:42:13','pending','http://task-update.test/admin/orders/detail/136'),(31,'NCC','w opsgreat 3',2,888.00,'24','2023-08-28 07:42:13','2023-08-28 07:42:13','pending','http://task-update.test/admin/orders/detail/137'),(32,'NCC','w opsgreat 1',1,333.00,'9,','2023-08-30 03:23:20','2023-08-30 03:23:20','pending','http://task-update.test/admin/orders/detail/164'),(33,'NCC','w opsgreat 3',1,884.00,'23','2023-08-30 03:26:54','2023-08-30 03:26:54','pending','http://task-update.test/admin/orders/detail/165'),(34,'NCC','w opsgreat 2',1,333.00,'2325','2023-08-30 03:26:54','2023-08-30 03:26:54','pending','http://task-update.test/admin/orders/detail/165'),(35,'NCC','w opsgreat 1',4,1994.00,'25, 24, 23','2023-08-31 04:19:33','2023-08-31 04:19:33','pending','http://task-update.test/admin/orders/detail/193'),(36,'NCC','w opsgreat 1',4,1994.00,'1','2023-08-31 04:22:27','2023-08-31 04:22:27','pending','http://task-update.test/admin/orders/detail/195'),(37,'NCC','w opsgreat 1',3,1661.00,'1','2023-08-31 04:22:51','2023-08-31 04:22:51','pending','http://task-update.test/admin/orders/detail/196'),(38,'NCC','w opsgreat 1',3,1661.00,'23, 24, 25','2023-08-31 04:29:34','2023-08-31 04:29:34','pending','http://task-update.test/admin/orders/detail/199'),(39,'NCC','w opsgreat 1, w opsgreat 2',3,1110.00,'24, 25','2023-08-31 04:29:49','2023-08-31 04:29:49','pending','http://task-update.test/admin/orders/detail/200'),(40,'NCC','w opsgreat 1, w opsgreat 2',9,4983.00,'9, 23, 24','2023-08-31 06:56:16','2023-08-31 06:56:16','pending','http://task-update.test/admin/orders/detail/205'),(41,'NCC','w opsgreat 1, w opsgreat 2',6,3100.00,'23, 25','2023-08-31 07:15:19','2023-08-31 07:15:19','pending','http://task-update.test/admin/orders/detail/206'),(42,'NCC','w opsgreat 1',4,3096.00,'23, 24','2023-08-31 07:50:34','2023-08-31 07:50:34','pending','http://task-update.test/admin/orders/detail/207'),(43,'NCC','w opsgreat 1',1,333.00,'25','2023-08-31 08:41:02','2023-08-31 08:41:02','pending','http://task-update.test/admin/orders/detail/208');
/*!40000 ALTER TABLE `histories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_08_08_031628_create_categories_table',2),(6,'2023_08_08_064704_create_products_table',3),(7,'2023_08_08_083326_add_author_type_to_users_table',4),(8,'2023_08_08_092412_create_purchases_table',5),(9,'2023_08_08_092423_create_purchase_products_table',5),(11,'2023_08_09_025423_create_customers_table',6),(12,'2023_08_09_025431_create_sales_table',7),(13,'2023_08_09_025437_create_sale_products_table',7),(14,'2023_08_15_094758_create_posts_table',8),(15,'2023_08_17_083337_add_content_to_posts_table',9),(16,'2023_08_17_103319_create_admins_table',10),(17,'2023_08_21_015335_add_status_to_categories_table',11),(18,'2023_08_21_015939_add_status_and_price_sale_to_products_table',12),(19,'2023_08_21_020249_remove_author_id_from_products_table',13),(21,'2023_08_21_021004_add_foreign_key_author_id_to_products_table',14),(22,'2023_08_21_023246_add_status_to_posts_table',15),(23,'2023_08_21_032001_add_slug_to_categories_table',16),(24,'2023_08_21_071446_add_slug_to_products_table',17),(42,'2023_08_21_073912_create_warehouses_table',18),(43,'2023_08_21_073926_create_stores_table',18),(44,'2023_08_21_074000_create_warehouse_stores_table',18),(45,'2023_08_21_074026_create_product_stores_table',18),(46,'2023_08_21_074037_create_product_warehouses_table',18),(47,'2023_08_21_092840_add_status_to_warehouses_table',18),(48,'2023_08_21_092919_add_status_to_stores_table',18),(49,'2023_08_21_095418_add_warehouse_id_to_purchases_table',19),(50,'2023_08_23_135105_create_jobs_table',20),(51,'2023_08_24_102205_create_histories_table',21),(53,'2023_08_29_114621_remove_warehouse_id_to_purchases_table',22),(54,'2023_08_29_114825_add_warehouse_id_to_purchases_table',23);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (2,'QH\\Core\\Models\\Admin',1,'develo\Z-access','8a97b4f87c7d587fbf2da7fad9cbe4599c02228627fc67d2bb2941c8d875fb29','[\"*\"]',NULL,NULL,'2023-08-29 03:05:39','2023-08-29 03:05:39');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (4,'my-newyork-trip','my newyork trip','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra et ultrices neque ornare aenean euismod. Velit dignissim sodales ut eu sem integer vitae justo','64ddc2048ce58-this-is-my-title.jpg','2023-08-16 23:45:24','2023-08-17 02:11:37',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pharetra et ultrices neque ornare aenean euismod. Velit dignissim sodales ut eu sem integer vitae justo. Ut placerat orci nulla pellentesque dignissim enim sit amet venenatis. Rhoncus dolor purus non enim praesent elementum facilisis. Id nibh tortor id aliquet lectus proin nibh nisl condimentum. Vestibulum morbi blandit cursus risus at ultrices mi tempus. Risus nec feugiat in fermentum posuere urna. Venenatis tellus in metus vulputate eu scelerisque felis imperdiet proin. Eu mi bibendum neque egestas congue quisque. Nunc sed augue lacus viverra vitae congue eu consequat ac. Tortor aliquam nulla facilisi cras fermentum. Dui ut ornare lectus sit amet est placerat in. Augue neque gravida in fermentum et. Non tellus orci ac auctor augue mauris. Mattis enim ut tellus elementum sagittis vitae. Venenatis tellus in metus vulputate. Lacus laoreet non curabitur gravida arcu. Varius morbi enim nunc faucibus a. Porttitor rhoncus dolor purus non enim.</p>\r\n\r\n<p>Et leo duis ut diam quam. Auctor urna nunc id cursus metus aliquam eleifend mi in. Pellentesque dignissim enim sit amet venenatis. Libero justo laoreet sit amet cursus. Eget dolor morbi non arcu risus quis varius quam quisque. Imperdiet nulla malesuada pellentesque elit. Id aliquet lectus proin nibh nisl condimentum id. Tincidunt lobortis feugiat vivamus at augue eget. Diam vel quam elementum pulvinar etiam non quam lacus suspendisse. Consectetur libero id faucibus nisl tincidunt eget nullam. Accumsan sit amet nulla facilisi morbi. Lorem mollis aliquam ut porttitor leo a. In dictum non consectetur a erat nam at lectus urna. Ut eu sem integer vitae justo. In fermentum et sollicitudin ac orci phasellus. Vulputate sapien nec sagittis aliquam malesuada bibendum. Velit ut tortor pretium viverra suspendisse potenti. Cursus risus at ultrices mi tempus imperdiet. Massa tincidunt nunc pulvinar sapien et ligula.</p>\r\n\r\n<p>Ultrices in iaculis nunc sed augue lacus viverra vitae congue. Natoque penatibus et magnis dis parturient. Dignissim enim sit amet venenatis urna. In hac habitasse platea dictumst quisque sagittis. Ultrices gravida dictum fusce ut placerat orci nulla pellentesque. Eleifend donec pretium vulputate sapien nec sagittis aliquam. Non curabitur gravida arcu ac tortor dignissim convallis aenean et. Sem et tortor consequat id. Varius vel pharetra vel turpis nunc eget. Bibendum enim facilisis gravida neque convallis. Elit at imperdiet dui accumsan sit amet nulla facilisi morbi. Viverra justo nec ultrices dui sapien.</p>\r\n\r\n<p>Amet justo donec enim diam vulputate ut pharetra. Quis blandit turpis cursus in hac habitasse. Felis eget nunc lobortis mattis aliquam faucibus. Lectus sit amet est placerat in egestas erat imperdiet. Ullamcorper dignissim cras tincidunt lobortis feugiat vivamus at augue eget. Quam adipiscing vitae proin sagittis nisl rhoncus mattis. Arcu ac tortor dignissim convallis aenean et tortor. Pharetra pharetra massa massa ultricies mi quis. Eu nisl nunc mi ipsum faucibus vitae aliquet nec. Enim ut sem viverra aliquet eget sit. Purus gravida quis blandit turpis cursus in hac. Non blandit massa enim nec.</p>\r\n\r\n<p>Morbi tincidunt augue interdum velit. Vitae et leo duis ut diam quam. Risus nec feugiat in fermentum. Integer malesuada nunc vel risus commodo viverra. Lacinia quis vel eros donec ac odio tempor. At lectus urna duis convallis convallis. Et netus et malesuada fames ac turpis egestas integer eget. Purus semper eget duis at tellus at. Dignissim suspendisse in est ante in nibh mauris cursus mattis. Sem integer vitae justo eget magna fermentum. Eu scelerisque felis imperdiet proin fermentum leo vel orci porta. Risus quis varius quam quisque id diam vel quam. Suspendisse ultrices gravida dictum fusce ut placerat orci nulla pellentesque.</p>','active'),(7,'london','London','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.','64dddb1072d59-london.jpg','2023-08-17 01:32:16','2023-08-17 01:54:27',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>','active'),(8,'paris','Paris','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','64dde58a8a7ee-paris.jpg','2023-08-17 02:16:58','2023-08-17 02:16:58',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>','active'),(9,'hong-kong','hong kong','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','64dde58a8a7ee-paris.jpg','2023-08-17 02:16:58','2023-08-17 02:16:58',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>','active'),(10,'phu-quoc','phu quoc','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','64dde58a8a7ee-paris.jpg','2023-08-17 02:16:58','2023-08-17 02:16:58',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>','active'),(11,'nhat-ban','nhat ban','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','64dde58a8a7ee-paris.jpg','2023-08-17 02:16:58','2023-08-17 02:16:58',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>','active'),(12,'han-quoc','han quoc','update Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua','64dde58a8a7ee-paris.jpg','2023-08-17 02:16:58','2023-08-17 02:49:43',3,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa vitae tortor condimentum lacinia quis vel eros donec. Aliquam etiam erat velit scelerisque in dictum. Felis donec et odio pellentesque diam. Pretium nibh ipsum consequat nisl vel. Faucibus in ornare quam viverra. Vivamus at augue eget arcu dictum varius duis at. Turpis massa sed elementum tempus egestas sed sed risus. Rhoncus mattis rhoncus urna neque viverra. Varius vel pharetra vel turpis nunc eget. Commodo ullamcorper a lacus vestibulum sed arcu non odio euismod.</p>\r\n\r\n<p>Platea dictumst vestibulum rhoncus est pellentesque elit. Erat nam at lectus urna duis convallis convallis tellus id. Viverra nam libero justo laoreet sit amet cursus sit. Diam maecenas sed enim ut sem viverra aliquet. Tellus rutrum tellus pellentesque eu. Id cursus metus aliquam eleifend mi in nulla posuere sollicitudin. A cras semper auctor neque vitae tempus. Scelerisque felis imperdiet proin fermentum leo vel orci. Condimentum vitae sapien pellentesque habitant morbi tristique senectus. Velit sed ullamcorper morbi tincidunt ornare massa. Diam sollicitudin tempor id eu nisl nunc. Viverra nam libero justo laoreet sit amet.</p>\r\n\r\n<p>Eget arcu dictum varius duis at consectetur lorem donec massa. Dui accumsan sit amet nulla facilisi. Magna fermentum iaculis eu non. Sagittis purus sit amet volutpat consequat mauris. Ornare massa eget egestas purus. Ornare arcu odio ut sem nulla pharetra diam. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit. Id porta nibh venenatis cras. Nunc eget lorem dolor sed. Ut enim blandit volutpat maecenas volutpat blandit aliquam etiam erat. Senectus et netus et malesuada fames ac turpis egestas. Id diam maecenas ultricies mi eget. Morbi tempus iaculis urna id volutpat lacus laoreet non. Tristique nulla aliquet enim tortor at auctor urna nunc id. Risus nullam eget felis eget nunc. Lorem ipsum dolor sit amet consectetur. Est ullamcorper eget nulla facilisi etiam dignissim. Lobortis mattis aliquam faucibus purus in massa tempor nec.</p>\r\n\r\n<p>Est lorem ipsum dolor sit. Fermentum leo vel orci porta. Quis vel eros donec ac odio tempor. Pretium viverra suspendisse potenti nullam. Nullam ac tortor vitae purus faucibus ornare suspendisse. Molestie nunc non blandit massa. In eu mi bibendum neque egestas congue quisque egestas. Nisl condimentum id venenatis a condimentum vitae. Aliquam etiam erat velit scelerisque in dictum non consectetur a. Consectetur a erat nam at lectus urna duis convallis convallis. Est lorem ipsum dolor sit. Morbi quis commodo odio aenean sed adipiscing. Et tortor at risus viverra adipiscing at in. Et netus et malesuada fames ac. Interdum varius sit amet mattis vulputate enim. Enim sit amet venenatis urna cursus eget nunc. A condimentum vitae sapien pellentesque habitant morbi tristique senectus.</p>\r\n\r\n<p>Amet luctus venenatis lectus magna fringilla. Bibendum enim facilisis gravida neque convallis a cras semper auctor. Viverra nam libero justo laoreet sit amet cursus. Auctor neque vitae tempus quam pellentesque nec nam aliquam. Aenean pharetra magna ac placerat vestibulum lectus mauris. Amet nisl purus in mollis nunc sed. Eget aliquet nibh praesent tristique magna sit amet. Sed libero enim sed faucibus turpis in. Ut tellus elementum sagittis vitae et leo duis ut. Mauris vitae ultricies leo integer.</p>','active'),(13,'chau-phi','chau phi','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.','64dddb1072d59-london.jpg','2023-08-17 01:32:16','2023-08-17 01:54:27',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>','active'),(14,'a-free-trip','a free trip','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.','64dddb1072d59-london.jpg','2023-08-17 01:32:16','2023-08-17 01:54:27',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>','active'),(15,'around-world-in-3-days','around world in 3 days','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet.','64dddb1072d59-london.jpg','2023-08-17 01:32:16','2023-08-17 01:54:27',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elit ut aliquam purus sit amet. Tristique nulla aliquet enim tortor at auctor urna. Malesuada pellentesque elit eget gravida cum sociis natoque penatibus et. <strong>Malesuada proin libero nunc consequat interdum varius</strong>. Commodo nulla facilisi nullam vehicula ipsum a arcu cursus. Elementum integer enim neque volutpat ac tincidunt vitae. Augue eget arcu dictum varius duis at. Magnis dis parturient montes nascetur ridiculus mus mauris vitae. Ullamcorper dignissim cras tincidunt lobortis feugiat. Nibh cras pulvinar mattis nunc sed blandit libero volutpat sed. Sed arcu non odio euismod lacinia at quis risus sed. In aliquam sem fringilla ut. Pretium quam vulputate dignissim suspendisse in.</p>\r\n\r\n<p>Scelerisque fermentum dui faucibus in ornare. Nec nam aliquam sem et tortor. Volutpat est velit egestas dui id ornare arcu. Fermentum dui faucibus in ornare. Imperdiet dui accumsan sit amet nulla facilisi morbi. A iaculis at erat pellentesque adipiscing commodo elit. Nisi scelerisque eu ultrices vitae auctor eu. Fringilla urna porttitor rhoncus dolor purus non enim. Morbi tristique senectus et netus et malesuada fames ac. Iaculis eu non diam phasellus vestibulum lorem sed risus. Ut consequat semper viverra nam libero justo. Rhoncus urna neque viverra justo nec ultrices dui sapien. Etiam non quam lacus suspendisse faucibus interdum posuere lorem. Ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum est ultricies integer quis auctor elit. Pellentesque pulvinar pellentesque habitant morbi tristique. Ornare lectus sit amet est placerat in. Fermentum posuere urna nec tincidunt praesent semper feugiat nibh sed.</p>\r\n\r\n<p>Pretium lectus quam id leo in. Sed id semper risus in hendrerit gravida. Odio eu feugiat pretium nibh ipsum. Pharetra diam sit amet nisl suscipit adipiscing bibendum. Tellus id interdum velit laoreet id. Nibh sed pulvinar proin gravida hendrerit lectus. Tempor orci dapibus ultrices in iaculis nunc sed augue. Accumsan sit amet nulla facilisi morbi. Enim ut sem viverra aliquet eget sit amet. Sit amet tellus cras adipiscing enim eu turpis egestas.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas. Magna sit amet purus gravida quis. Praesent elementum facilisis leo vel fringilla est ullamcorper eget. Sit amet consectetur adipiscing elit duis. Velit aliquet sagittis id consectetur. Ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Amet consectetur adipiscing elit pellentesque habitant morbi tristique. Quam pellentesque nec nam aliquam sem et tortor. Dolor sit amet consectetur adipiscing elit duis. Scelerisque fermentum dui faucibus in ornare. Amet volutpat consequat mauris nunc congue nisi vitae suscipit. Neque volutpat ac tincidunt vitae. Nec dui nunc mattis enim ut. Iaculis eu non diam phasellus vestibulum lorem sed risus ultricies. Neque laoreet suspendisse interdum consectetur. Tortor at risus viverra adipiscing at in. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Duis ultricies lacus sed turpis tincidunt id aliquet. Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>\r\n\r\n<p>Porttitor eget dolor morbi non arcu. Neque laoreet suspendisse interdum consectetur libero id. Tincidunt lobortis feugiat vivamus at augue eget. Donec ac odio tempor orci dapibus ultrices. Tincidunt lobortis feugiat vivamus at augue eget arcu. Arcu non odio euismod lacinia at. Cras sed felis eget velit aliquet. Pharetra convallis posuere morbi leo. Enim tortor at auctor urna nunc id cursus metus aliquam. Sapien et ligula ullamcorper malesuada proin libero nunc consequat. Tempor id eu nisl nunc mi. Nisi quis eleifend quam adipiscing vitae proin sagittis nisl. Ultrices dui sapien eget mi proin sed. Purus in mollis nunc sed id. Rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Arcu cursus euismod quis viverra nibh cras.</p>','active'),(16,'this-is-my-journey','this is my journey','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','64e2d20e479b7-this-is-my-journey.jpg','2023-08-20 19:55:10','2023-08-20 20:15:08',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Curabitur gravida arcu ac tortor dignissim convallis. Est ullamcorper eget nulla facilisi etiam dignissim diam quis enim. Sit amet nulla facilisi morbi tempus iaculis urna id. Natoque penatibus et magnis dis parturient montes nascetur ridiculus. Massa sapien faucibus et molestie ac feugiat sed. Dapibus ultrices in iaculis nunc sed augue lacus viverra. Arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque. Aliquet enim tortor at auctor urna. Ultrices eros in cursus turpis massa tincidunt dui ut ornare. Dui ut ornare lectus sit amet est placerat in. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Sit amet mattis vulputate enim nulla aliquet. Mattis pellentesque id nibh tortor id aliquet.</p>\r\n\r\n<p>Fames ac turpis egestas maecenas pharetra convallis. Vitae congue eu consequat ac felis. Gravida quis blandit turpis cursus in hac habitasse. A erat nam at lectus urna duis convallis convallis. Quam id leo in vitae turpis massa sed elementum. Scelerisque eu ultrices vitae auctor eu augue ut lectus. At ultrices mi tempus imperdiet nulla malesuada pellentesque. Vestibulum sed arcu non odio euismod. Velit aliquet sagittis id consectetur. Euismod in pellentesque massa placerat duis ultricies lacus. A diam sollicitudin tempor id. Mi proin sed libero enim sed faucibus turpis in. Duis ut diam quam nulla porttitor. Dolor purus non enim praesent elementum facilisis leo vel fringilla. Blandit volutpat maecenas volutpat blandit aliquam etiam erat.</p>\r\n\r\n<p>Vitae suscipit tellus mauris a diam maecenas. Facilisis mauris sit amet massa vitae tortor condimentum lacinia quis. Vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Donec ac odio tempor orci dapibus. Tincidunt tortor aliquam nulla facilisi. Ipsum a arcu cursus vitae. Vulputate sapien nec sagittis aliquam. Vel eros donec ac odio. At tellus at urna condimentum mattis.</p>\r\n\r\n<p>Dolor purus non enim praesent. Erat pellentesque adipiscing commodo elit at imperdiet dui. Pretium lectus quam id leo in vitae turpis. Tortor condimentum lacinia quis vel. Quam lacus suspendisse faucibus interdum posuere lorem ipsum. Non enim praesent elementum facilisis leo. Consectetur a erat nam at lectus urna duis convallis. Nunc congue nisi vitae suscipit tellus. Lectus nulla at volutpat diam ut venenatis. Etiam sit amet nisl purus. Laoreet suspendisse interdum consectetur libero id.</p>\r\n\r\n<p>Donec et odio pellentesque diam volutpat commodo sed egestas egestas. Volutpat blandit aliquam etiam erat velit scelerisque in dictum. Mi eget mauris pharetra et ultrices neque ornare aenean. Adipiscing elit ut aliquam purus sit amet luctus venenatis lectus. Odio aenean sed adipiscing diam donec. Nunc sed augue lacus viverra vitae congue eu consequat ac. Tincidunt praesent semper feugiat nibh sed pulvinar proin. Ultricies leo integer malesuada nunc vel risus commodo viverra. Morbi tristique senectus et netus et malesuada fames ac turpis. Pharetra magna ac placerat vestibulum lectus. Dignissim sodales ut eu sem integer vitae. Lacus vel facilisis volutpat est velit egestas. Luctus venenatis lectus magna fringilla urna porttitor rhoncus.</p>','active'),(18,'harry-potter-10-review','harry potter 10 review','update Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ut sem viverra aliquet eget sit amet. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse.','64e6bf522d97e-harry-potter-10-review.jpg','2023-08-24 02:24:18','2023-08-28 06:24:48',2,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim ut sem viverra aliquet eget sit amet. Suspendisse potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Amet porttitor eget dolor morbi non. Donec enim diam vulputate ut. Eu mi bibendum neque egestas congue quisque egestas diam in. Tincidunt id aliquet risus feugiat in. Tincidunt lobortis feugiat vivamus at augue eget. Convallis a cras semper auctor neque. Ullamcorper malesuada proin libero nunc consequat interdum varius.</p>\r\n\r\n<p>Libero justo laoreet sit amet cursus sit amet. Sagittis purus sit amet volutpat consequat mauris nunc congue. A pellentesque sit amet porttitor. Euismod lacinia at quis risus sed vulputate odio ut. Consectetur a erat nam at lectus urna duis. Aliquam ultrices sagittis orci a scelerisque purus semper eget duis. Leo vel orci porta non pulvinar neque. Diam vel quam elementum pulvinar etiam. Dolor magna eget est lorem. Sit amet mattis vulputate enim nulla aliquet porttitor lacus luctus. Pretium quam vulputate dignissim suspendisse. Non odio euismod lacinia at quis risus sed vulputate odio. Facilisis volutpat est velit egestas dui id ornare. Vitae purus faucibus ornare suspendisse sed nisi lacus sed. Posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Sit amet dictum sit amet justo donec enim. Sed lectus vestibulum mattis ullamcorper. Sapien nec sagittis aliquam malesuada.</p>\r\n\r\n<p>Vivamus arcu felis bibendum ut tristique et egestas. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam. Lectus proin nibh nisl condimentum id venenatis a condimentum vitae. Proin nibh nisl condimentum id. At urna condimentum mattis pellentesque id nibh tortor id. Aliquam eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis. Gravida neque convallis a cras semper auctor neque vitae. Interdum posuere lorem ipsum dolor sit amet consectetur. Tristique nulla aliquet enim tortor at auctor urna. Semper eget duis at tellus at urna condimentum mattis pellentesque.</p>\r\n\r\n<p>Aliquam malesuada bibendum arcu vitae elementum curabitur vitae nunc. Non enim praesent elementum facilisis leo vel fringilla est ullamcorper. Dictumst vestibulum rhoncus est pellentesque. Sit amet porttitor eget dolor morbi non. Risus ultricies tristique nulla aliquet enim tortor at auctor. Amet massa vitae tortor condimentum lacinia quis vel eros donec. Amet purus gravida quis blandit. Molestie a iaculis at erat pellentesque adipiscing commodo elit. Sed ullamcorper morbi tincidunt ornare massa eget egestas purus. Consectetur purus ut faucibus pulvinar elementum integer enim neque volutpat.</p>\r\n\r\n<p>Mattis ullamcorper velit sed ullamcorper. Id consectetur purus ut faucibus pulvinar elementum integer enim neque. Nunc lobortis mattis aliquam faucibus purus in massa tempor. Magna ac placerat vestibulum lectus mauris ultrices eros in cursus. Aliquet lectus proin nibh nisl condimentum id venenatis a. Egestas purus viverra accumsan in. Nisi quis eleifend quam adipiscing vitae proin. Eget duis at tellus at urna condimentum mattis. Eget nulla facilisi etiam dignissim diam quis enim. Bibendum est ultricies integer quis auctor elit sed vulputate. Convallis tellus id interdum velit. Vestibulum morbi blandit cursus risus at ultrices.</p>','active');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_warehouses`
--

DROP TABLE IF EXISTS `product_warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_warehouses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_warehouses_warehouse_id_foreign` (`warehouse_id`),
  KEY `product_warehouses_product_id_foreign` (`product_id`),
  CONSTRAINT `product_warehouses_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `product_warehouses_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_warehouses`
--

LOCK TABLES `product_warehouses` WRITE;
/*!40000 ALTER TABLE `product_warehouses` DISABLE KEYS */;
INSERT INTO `product_warehouses` VALUES (1,2,23,8,'2023-08-21 10:04:24','2023-08-31 06:56:16'),(2,3,16,10,'2023-08-21 10:04:24','2023-08-28 04:35:49'),(3,2,9,15,'2023-08-21 23:24:42','2023-08-31 06:56:16'),(6,2,16,14,'2023-08-21 23:24:42','2023-08-28 04:35:48'),(7,2,8,9,'2023-08-21 23:24:42','2023-08-25 08:20:36'),(8,2,2,11,'2023-08-21 23:24:42','2023-08-28 06:34:22'),(10,3,9,5,'2023-08-25 07:30:00','2023-08-25 08:20:36'),(11,1,9,10,'2023-08-25 07:32:51','2023-08-30 03:23:19'),(12,1,16,8,'2023-08-25 07:32:51','2023-08-25 08:20:36'),(13,1,23,12,'2023-08-25 07:32:51','2023-08-31 07:50:34'),(14,1,7,5,'2023-08-25 08:20:36','2023-08-25 08:21:19'),(15,1,8,5,'2023-08-25 08:20:36','2023-08-25 08:20:36'),(16,2,7,2,'2023-08-25 08:20:36','2023-08-25 08:20:36'),(17,3,7,4,'2023-08-25 08:20:36','2023-08-25 08:20:36'),(18,3,8,5,'2023-08-25 08:20:36','2023-08-25 08:20:36'),(19,3,23,3,'2023-08-25 08:20:36','2023-08-30 03:26:54'),(20,5,7,4,'2023-08-25 08:20:37','2023-08-25 08:20:37'),(21,5,8,5,'2023-08-25 08:20:37','2023-08-25 08:20:37'),(22,5,9,4,'2023-08-25 08:20:37','2023-08-25 08:20:37'),(23,5,16,3,'2023-08-25 08:20:37','2023-08-25 08:20:37'),(24,5,23,2,'2023-08-25 08:20:37','2023-08-25 08:20:37'),(25,2,24,5,'2023-08-28 04:35:48','2023-08-28 07:42:13'),(26,3,24,6,'2023-08-28 04:35:49','2023-08-28 07:42:13'),(27,2,25,4,'2023-08-30 03:26:54','2023-08-31 07:15:19'),(28,1,24,4,'2023-08-31 06:56:16','2023-08-31 07:50:34'),(29,1,25,2,'2023-08-31 07:15:19','2023-08-31 08:41:02');
/*!40000 ALTER TABLE `product_warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `qty` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `author_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price_sale` decimal(8,2) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `author_id` bigint unsigned NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_author_id_foreign` (`author_id`),
  CONSTRAINT `products_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Harry Potter 1','/storage/uploads/1692787295.harry-potter.jpg',100.00,10,'<p>content</p>',8,'Novelist','2023-07-31 21:58:09','2023-08-23 03:41:35',NULL,'active',1,'harry-potter-1'),(2,'Fans','/storage/uploads/1692787270.harry-potter.jpg',2000.00,27,'<p>content fans</p>',4,'Blog','2023-07-31 21:58:09','2023-08-28 06:34:22',NULL,'active',1,'fans'),(7,'Harry Potter 2','/storage/uploads/1692787244.harry-potter.jpg',333.00,34,'<p>aaa</p>',5,'Novelist','2023-07-31 20:12:03','2023-08-31 06:52:27',NULL,'active',1,'harry-potter-2'),(8,'Harry Potter 3','/storage/uploads/1692787219.harry-potter.jpg',333.00,30,'<p>aaa</p>',5,'Novelist','2023-07-31 20:35:13','2023-08-25 08:20:37',NULL,'active',1,'harry-potter-3'),(9,'Harry Potter 4','/storage/uploads/1692787195.harry-potter.jpg',333.00,45,'<p>content</p>',5,'Novelist','2023-07-31 20:38:11','2023-08-31 06:56:16',NULL,'active',1,'harry-potter-4'),(16,'Harry Potter 7','/storage/uploads/1692787174.harry-potter.jpg',333.00,40,'<p>content</p>',5,'Novelist','2023-08-09 02:20:38','2023-08-28 04:53:32',NULL,'active',1,'harry-potter-7'),(22,'Lucifer Morningstar','/storage/uploads/1692787322.harry-potter.jpg',333.00,12,'<p>a</p>',5,'Novelist','2023-08-14 00:20:51','2023-08-31 06:43:18',NULL,'active',1,'lucifer-morningstar'),(23,'Lucifer Morningstar season 1','/storage/uploads/1692602170.lucifer.jpg',884.00,33,'<p>lucifer&nbsp;</p>',5,'Novelist','2023-08-21 00:16:10','2023-08-31 07:50:34',NULL,'active',1,'lucifer-morningstar-season-1'),(24,'Lucifer Morningstar season 3','/storage/uploads/1693196950.lucifer.jpg',444.00,29,'<p>Lucifer Morningstar season 3</p>',5,'Novelist','2023-08-28 04:29:11','2023-08-31 07:50:34',NULL,'active',1,'lucifer-morningstar-season-3'),(25,'Lucifer Morningstar 6','/storage/uploads/1693208427.lucifer.jpg',333.00,16,'<p>decs</p>',8,'Novelist','2023-08-28 07:40:28','2023-08-31 08:41:02',NULL,'active',1,'lucifer-morningstar-6');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_products`
--

DROP TABLE IF EXISTS `purchase_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `total_amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warehouse_id` bigint unsigned DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `purchase_products_purchase_id_foreign` (`purchase_id`),
  KEY `purchase_products_product_id_foreign` (`product_id`),
  KEY `purchase_products_warehouse_id_foreign` (`warehouse_id`),
  CONSTRAINT `purchase_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_products_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE,
  CONSTRAINT `purchase_products_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_products`
--

LOCK TABLES `purchase_products` WRITE;
/*!40000 ALTER TABLE `purchase_products` DISABLE KEYS */;
INSERT INTO `purchase_products` VALUES (1,1,1,2,5000,10000,'2023-08-02 03:02:38',NULL,1),(2,1,1,2,10000,20000,'2023-08-02 03:03:39',NULL,1),(3,2,8,20,2000,40000,'2023-08-02 03:03:39',NULL,1),(6,9,8,2,333,666,NULL,NULL,1),(7,9,9,2,333,666,NULL,NULL,1),(8,10,1,3,100,300,NULL,NULL,1),(9,10,2,3,2000,6000,NULL,NULL,1),(14,20,8,3,333,999,NULL,NULL,1),(15,20,9,3,333,999,NULL,NULL,1),(16,21,9,2,333,666,NULL,NULL,1),(17,22,9,3,333,999,NULL,NULL,1),(19,23,9,3,333,999,NULL,NULL,1),(20,24,8,6,333,1998,NULL,NULL,1),(21,24,9,12,333,3996,NULL,NULL,1),(23,25,8,3,333,999,NULL,NULL,1),(24,25,16,3,333,999,NULL,NULL,1),(25,26,8,3,333,999,NULL,NULL,1),(26,26,16,4,333,1332,NULL,NULL,1),(27,27,16,4,333,1332,NULL,NULL,1),(28,28,22,10,333,3330,NULL,NULL,1),(29,43,16,1,333,333,NULL,NULL,1),(30,43,23,3,884,2652,NULL,NULL,1),(31,60,23,1,884,884,NULL,NULL,1),(32,61,9,3,333,999,NULL,NULL,1),(33,62,2,4,2000,8000,NULL,NULL,1),(100,103,9,1,333,333,NULL,NULL,1),(101,103,16,1,333,333,NULL,NULL,1),(102,103,23,1,884,884,NULL,NULL,1),(103,104,2,6,2000,12000,NULL,NULL,1),(104,119,2,6,2000,12000,NULL,NULL,1),(105,119,7,6,333,1998,NULL,NULL,1),(106,119,8,1,333,333,NULL,NULL,1),(107,119,9,6,333,1998,NULL,NULL,1),(108,119,16,6,333,1998,NULL,NULL,1),(109,119,23,6,884,5304,NULL,NULL,1),(110,120,9,1,333,333,NULL,NULL,1),(111,123,23,1,884,884,NULL,NULL,1),(112,124,9,1,333,333,NULL,NULL,1),(113,126,9,1,333,333,NULL,NULL,1),(114,127,9,5,333,1665,NULL,NULL,1),(115,127,16,5,333,1665,NULL,NULL,1),(116,127,23,5,884,4420,NULL,NULL,1),(117,128,7,4,333,1332,NULL,NULL,1),(118,128,8,5,333,1665,NULL,NULL,1),(119,128,9,4,333,1332,NULL,NULL,1),(120,128,16,3,333,999,NULL,NULL,1),(121,128,23,2,884,1768,NULL,NULL,1),(122,129,7,4,333,1332,NULL,NULL,1),(123,129,8,5,333,1665,NULL,NULL,1),(124,129,9,4,333,1332,NULL,NULL,1),(125,129,16,3,333,999,NULL,NULL,1),(126,129,23,2,884,1768,NULL,NULL,1),(127,130,7,4,333,1332,NULL,NULL,1),(128,130,8,5,333,1665,NULL,NULL,1),(129,130,9,4,333,1332,NULL,NULL,1),(130,130,16,3,333,999,NULL,NULL,1),(131,130,23,2,884,1768,NULL,NULL,1),(132,131,7,4,333,1332,NULL,NULL,1),(133,131,8,5,333,1665,NULL,NULL,1),(134,131,9,4,333,1332,NULL,NULL,1),(135,131,16,3,333,999,NULL,NULL,1),(136,131,23,2,884,1768,NULL,NULL,1),(137,132,7,1,333,333,NULL,NULL,1),(138,133,16,3,333,999,NULL,NULL,1),(139,133,24,4,444,1776,NULL,NULL,1),(140,134,16,3,333,999,NULL,NULL,1),(141,134,24,4,444,1776,NULL,NULL,1),(142,135,2,10,2000,20000,NULL,NULL,1),(143,135,23,5,884,4420,NULL,NULL,1),(144,136,24,2,444,888,NULL,NULL,1),(145,137,24,2,444,888,NULL,NULL,1),(146,164,9,1,333,333,NULL,NULL,1),(147,165,23,1,884,884,NULL,NULL,1),(148,165,25,1,333,333,NULL,NULL,1),(149,205,24,3,444,1332,NULL,NULL,1),(150,205,9,3,333,999,NULL,NULL,1),(151,205,23,3,884,2652,NULL,NULL,1),(152,206,23,2,884,1768,NULL,NULL,1),(153,206,25,1,333,333,NULL,NULL,1),(154,206,25,3,333,999,NULL,NULL,2),(155,207,23,3,884,2652,NULL,NULL,1),(156,207,24,1,444,444,NULL,NULL,1),(157,208,25,1,333,333,NULL,NULL,1);
/*!40000 ALTER TABLE `purchase_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `total_qty` int NOT NULL,
  `shipping_cost` int NOT NULL DEFAULT '0',
  `total_amount` int NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','finished') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `purchase_date` date NOT NULL DEFAULT (curdate()),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warehouse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,5,0,20000,'some note','finished','2023-08-02','2023-08-02 02:56:02',NULL,'2'),(2,10,0,300000,'some note','pending','2023-08-02','2023-08-02 02:56:02',NULL,'2'),(9,4,0,1332,'note','pending','2023-08-03','2023-08-02 13:01:06','2023-08-02 13:01:06','2'),(10,6,0,6300,NULL,'pending','2023-08-08','2023-08-08 02:46:02','2023-08-08 02:46:02','2'),(11,3,0,999,'buy 3 hp 6','pending','2023-08-08','2023-08-08 02:55:58','2023-08-08 02:55:58','2'),(12,1,0,333,NULL,'pending','2023-08-08','2023-08-08 02:56:39','2023-08-08 02:56:39','2'),(13,5,0,1665,NULL,'pending','2023-08-08','2023-08-08 02:57:06','2023-08-08 02:57:06','2'),(14,3,0,999,NULL,'pending','2023-08-08','2023-08-08 02:58:29','2023-08-08 02:58:29','2'),(20,6,0,1998,NULL,'finished','2023-08-08','2023-08-08 03:05:15','2023-08-08 03:05:15','2'),(21,2,0,666,NULL,'pending','2023-08-08','2023-08-08 03:05:28','2023-08-08 03:05:28','2'),(22,6,0,1998,NULL,'finished','2023-08-09','2023-08-08 19:50:52','2023-08-08 19:50:52','2'),(23,3,0,999,NULL,'finished','2023-08-09','2023-08-08 21:55:48','2023-08-08 21:55:48','2'),(24,22,0,7326,NULL,'pending','2023-08-09','2023-08-09 01:40:00','2023-08-09 01:40:00','2'),(25,6,0,1998,NULL,'pending','2023-08-09','2023-08-09 02:22:23','2023-08-09 02:22:23','2'),(26,7,0,2331,'note','pending','2023-08-11','2023-08-10 19:02:16','2023-08-10 19:02:16','2'),(27,4,0,1332,NULL,'pending','2023-08-11','2023-08-11 00:44:25','2023-08-11 00:44:25','2'),(28,10,0,3330,NULL,'pending','2023-08-18','2023-08-18 01:11:45','2023-08-18 01:11:45','2'),(43,4,0,2985,NULL,'pending','2023-08-21','2023-08-21 03:40:14','2023-08-21 03:40:14','2'),(60,1,0,884,NULL,'pending','2023-08-21','2023-08-21 04:06:22','2023-08-21 04:06:22','2'),(61,3,0,999,NULL,'pending','2023-08-22','2023-08-21 23:24:42','2023-08-21 23:24:42','2'),(62,4,0,8000,NULL,'pending','2023-08-24','2023-08-24 02:37:42','2023-08-24 02:37:42','2'),(103,3,0,1550,NULL,'pending','2023-08-24','2023-08-24 04:46:03','2023-08-24 04:46:03','2'),(104,6,0,12000,NULL,'pending','2023-08-25','2023-08-25 04:44:22','2023-08-25 04:44:22','2'),(119,31,0,23631,NULL,'pending','2023-08-25','2023-08-25 04:56:26','2023-08-25 04:56:26','2'),(120,1,0,333,NULL,'pending','2023-08-25','2023-08-25 07:17:21','2023-08-25 07:17:21','2'),(123,1,0,884,NULL,'pending','2023-08-25','2023-08-25 07:27:12','2023-08-25 07:27:12','2'),(124,1,0,333,NULL,'pending','2023-08-25','2023-08-25 07:28:48','2023-08-25 07:28:48','2'),(126,1,0,333,NULL,'pending','2023-08-25','2023-08-25 07:30:00','2023-08-25 07:30:00','2'),(127,15,0,7750,NULL,'pending','2023-08-25','2023-08-25 07:32:51','2023-08-25 07:32:51','2'),(128,18,0,7096,'add multiple warehouse','pending','2023-08-25','2023-08-25 08:20:36','2023-08-25 08:20:36','2'),(129,18,0,7096,'add multiple warehouse','pending','2023-08-25','2023-08-25 08:20:36','2023-08-25 08:20:36','2'),(130,18,0,7096,'add multiple warehouse','pending','2023-08-25','2023-08-25 08:20:36','2023-08-25 08:20:36','2'),(131,18,0,7096,'add multiple warehouse','pending','2023-08-25','2023-08-25 08:20:36','2023-08-25 08:20:36','2'),(132,1,0,333,NULL,'pending','2023-08-25','2023-08-25 08:21:19','2023-08-25 08:21:19','2'),(133,7,0,2775,NULL,'pending','2023-08-28','2023-08-28 04:35:48','2023-08-28 04:35:48','2'),(134,7,0,2775,NULL,'pending','2023-08-28','2023-08-28 04:35:49','2023-08-28 04:35:49','2'),(135,15,0,24420,NULL,'pending','2023-08-28','2023-08-28 06:34:22','2023-08-28 06:34:22','2'),(136,2,0,888,NULL,'pending','2023-08-28','2023-08-28 07:42:13','2023-08-28 07:42:13','2'),(137,2,0,888,NULL,'pending','2023-08-28','2023-08-28 07:42:13','2023-08-28 07:42:13','2'),(164,1,0,333,NULL,'pending','2023-08-30','2023-08-30 03:23:19','2023-08-30 03:23:19','1'),(165,2,0,1217,NULL,'pending','2023-08-30','2023-08-30 03:26:54','2023-08-30 03:26:54','3, 2'),(166,1,0,666,NULL,'pending','2023-08-31','2023-08-31 03:27:54','2023-08-31 03:27:54','1'),(167,2,0,2442,NULL,'pending','2023-08-31','2023-08-31 03:28:50','2023-08-31 03:28:50','1, 2'),(168,1,0,999,NULL,'pending','2023-08-31','2023-08-31 03:30:06','2023-08-31 03:30:06','1'),(169,3,0,1110,NULL,'pending','2023-08-31','2023-08-31 03:33:36','2023-08-31 03:33:36','1'),(170,5,0,1665,NULL,'pending','2023-08-31','2023-08-31 03:34:02','2023-08-31 03:34:02','1, 2'),(171,5,0,1665,NULL,'pending','2023-08-31','2023-08-31 03:40:08','2023-08-31 03:40:08','1, 2'),(172,3,0,1110,NULL,'pending','2023-08-31','2023-08-31 03:41:49','2023-08-31 03:41:49','1, 2'),(173,4,0,1332,NULL,'pending','2023-08-31','2023-08-31 03:44:34','2023-08-31 03:44:34','1'),(174,2,0,666,NULL,'pending','2023-08-31','2023-08-31 03:51:51','2023-08-31 03:51:51','1'),(175,3,0,999,NULL,'pending','2023-08-31','2023-08-31 03:52:23','2023-08-31 03:52:23','1'),(176,3,0,999,NULL,'pending','2023-08-31','2023-08-31 03:55:15','2023-08-31 03:55:15','1'),(177,3,0,999,NULL,'pending','2023-08-31','2023-08-31 03:55:45','2023-08-31 03:55:45','1'),(178,3,0,999,NULL,'pending','2023-08-31','2023-08-31 03:56:06','2023-08-31 03:56:06','1'),(179,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:56:24','2023-08-31 03:56:24','1'),(180,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:57:09','2023-08-31 03:57:09','1'),(181,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:58:32','2023-08-31 03:58:32','1'),(182,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:58:47','2023-08-31 03:58:47','1'),(183,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:59:02','2023-08-31 03:59:02','1'),(184,2,0,777,NULL,'pending','2023-08-31','2023-08-31 03:59:33','2023-08-31 03:59:33','1'),(185,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:03:06','2023-08-31 04:03:06','1'),(186,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:04:05','2023-08-31 04:04:05','1'),(187,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:11:58','2023-08-31 04:11:58','1'),(188,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:12:54','2023-08-31 04:12:54','1'),(189,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:14:17','2023-08-31 04:14:17','1'),(190,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:14:30','2023-08-31 04:14:30','1'),(191,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:16:01','2023-08-31 04:16:01','1, 2'),(192,2,0,777,NULL,'pending','2023-08-31','2023-08-31 04:18:51','2023-08-31 04:18:51','1, 2'),(193,4,0,1994,NULL,'pending','2023-08-31','2023-08-31 04:19:33','2023-08-31 04:19:33','1'),(194,4,0,1994,NULL,'pending','2023-08-31','2023-08-31 04:21:47','2023-08-31 04:21:47','1'),(195,4,0,1994,NULL,'pending','2023-08-31','2023-08-31 04:22:27','2023-08-31 04:22:27','1'),(196,3,0,1661,NULL,'pending','2023-08-31','2023-08-31 04:22:51','2023-08-31 04:22:51','1'),(197,3,0,1661,NULL,'pending','2023-08-31','2023-08-31 04:26:54','2023-08-31 04:26:54','1'),(198,3,0,1661,NULL,'pending','2023-08-31','2023-08-31 04:28:53','2023-08-31 04:28:53','1'),(199,3,0,1661,NULL,'pending','2023-08-31','2023-08-31 04:29:34','2023-08-31 04:29:34','1'),(200,3,0,1110,NULL,'pending','2023-08-31','2023-08-31 04:29:49','2023-08-31 04:29:49','1, 2'),(201,3,0,1110,NULL,'pending','2023-08-31','2023-08-31 06:33:38','2023-08-31 06:33:38','1'),(202,2,0,777,NULL,'pending','2023-08-31','2023-08-31 06:34:12','2023-08-31 06:34:12','1'),(203,2,0,777,NULL,'pending','2023-08-31','2023-08-31 06:34:57','2023-08-31 06:34:57','1'),(204,3,0,999,NULL,'pending','2023-08-31','2023-08-31 06:52:27','2023-08-31 06:52:27','1'),(205,9,0,4983,'some note','pending','2023-08-31','2023-08-31 06:56:16','2023-08-31 06:56:16','1, 2'),(206,6,0,3100,NULL,'pending','2023-08-31','2023-08-31 07:15:19','2023-08-31 07:15:19','1, 2'),(207,4,0,3096,NULL,'pending','2023-08-31','2023-08-31 07:50:34','2023-08-31 07:50:34','1'),(208,1,0,333,NULL,'pending','2023-08-31','2023-08-31 08:41:02','2023-08-31 08:41:02','1');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_products`
--

DROP TABLE IF EXISTS `sale_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale_products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `total_amount` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_products_sale_id_foreign` (`sale_id`),
  KEY `sale_products_product_id_foreign` (`product_id`),
  CONSTRAINT `sale_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sale_products_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_products`
--

LOCK TABLES `sale_products` WRITE;
/*!40000 ALTER TABLE `sale_products` DISABLE KEYS */;
INSERT INTO `sale_products` VALUES (1,1,1,1,300,300,NULL,NULL),(2,1,1,2,300,600,NULL,NULL),(3,2,9,1,333,333,NULL,NULL),(5,3,8,2,333,666,NULL,NULL),(7,4,8,1,333,333,NULL,NULL),(8,4,9,3,333,999,NULL,NULL),(10,5,9,8,333,2664,NULL,NULL),(12,6,8,1,333,333,NULL,NULL),(15,8,8,1,333,333,NULL,NULL),(16,9,8,1,333,333,NULL,NULL),(17,10,16,3,333,999,NULL,NULL),(18,11,16,8,333,2664,NULL,NULL),(19,12,23,3,884,2652,NULL,NULL),(20,31,9,3,333,999,NULL,NULL),(21,31,23,3,884,2652,NULL,NULL),(22,32,2,2,2000,4000,NULL,NULL),(23,32,23,3,884,2652,NULL,NULL),(24,33,2,3,2000,6000,NULL,NULL),(25,34,2,3,2000,6000,NULL,NULL),(26,35,2,2,2000,4000,NULL,NULL),(29,38,2,1,2000,2000,NULL,NULL),(30,38,8,1,333,333,NULL,NULL),(31,39,16,1,333,333,NULL,NULL),(32,39,23,1,884,884,NULL,NULL),(33,40,16,1,333,333,NULL,NULL),(34,40,23,1,884,884,NULL,NULL),(35,41,2,1,2000,2000,NULL,NULL),(36,42,2,1,2000,2000,NULL,NULL),(37,43,2,1,2000,2000,NULL,NULL),(38,43,7,1,333,333,NULL,NULL),(39,44,16,1,333,333,NULL,NULL),(40,44,23,1,884,884,NULL,NULL),(41,44,24,1,444,444,NULL,NULL),(42,45,23,3,884,2652,NULL,NULL),(43,46,23,3,884,2652,NULL,NULL),(44,47,7,1,333,333,NULL,NULL);
/*!40000 ALTER TABLE `sale_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint unsigned NOT NULL,
  `total_qty` int NOT NULL,
  `shipping_cost` int NOT NULL DEFAULT '0',
  `total_amount` int NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('pending','shipped','delivered','canceled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `sale_date` date NOT NULL DEFAULT (curdate()),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sales_customer_id_foreign` (`customer_id`),
  CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,1,5,0,20000,'note','pending','2023-08-09',NULL,NULL),(2,1,4,0,1332,NULL,'pending','2023-08-09','2023-08-09 00:33:51','2023-08-09 00:33:51'),(3,3,6,0,1998,NULL,'pending','2023-08-09','2023-08-09 00:48:48','2023-08-09 00:48:48'),(4,1,7,0,2331,NULL,'pending','2023-08-09','2023-08-09 01:25:48','2023-08-09 01:25:48'),(5,3,9,0,2997,NULL,'pending','2023-08-09','2023-08-09 01:29:02','2023-08-09 01:29:02'),(6,1,1,0,333,NULL,'pending','2023-08-09','2023-08-09 01:31:45','2023-08-09 01:31:45'),(8,3,1,0,333,NULL,'pending','2023-08-09','2023-08-09 02:36:47','2023-08-09 02:36:47'),(9,11,1,0,333,NULL,'pending','2023-08-09','2023-08-09 02:47:23','2023-08-09 02:47:23'),(10,3,3,0,999,'hp 7','pending','2023-08-11','2023-08-10 19:04:12','2023-08-10 19:04:12'),(11,3,8,0,2664,'note','pending','2023-08-11','2023-08-11 00:46:13','2023-08-11 00:46:13'),(12,3,3,0,2652,NULL,'pending','2023-08-21','2023-08-21 00:19:57','2023-08-21 00:19:57'),(31,3,6,0,3651,NULL,'pending','2023-08-23','2023-08-23 01:53:02','2023-08-23 01:53:02'),(32,3,5,0,6652,NULL,'pending','2023-08-23','2023-08-23 03:45:48','2023-08-23 03:45:48'),(33,3,3,0,6000,NULL,'pending','2023-08-24','2023-08-24 02:27:34','2023-08-24 02:27:34'),(34,3,3,0,6000,NULL,'pending','2023-08-24','2023-08-24 02:31:24','2023-08-24 02:31:24'),(35,3,2,0,4000,NULL,'pending','2023-08-24','2023-08-24 03:18:02','2023-08-24 03:18:02'),(38,3,2,0,2333,NULL,'pending','2023-08-24','2023-08-24 05:03:27','2023-08-24 05:03:27'),(39,3,2,0,1217,NULL,'pending','2023-08-24','2023-08-24 05:07:47','2023-08-24 05:07:47'),(40,3,2,0,1217,NULL,'pending','2023-08-24','2023-08-24 06:41:20','2023-08-24 06:41:20'),(41,3,1,0,2000,NULL,'delivered','2023-08-25','2023-08-25 03:13:13','2023-08-25 03:13:13'),(42,3,1,0,2000,NULL,'shipped','2023-08-25','2023-08-25 03:17:39','2023-08-25 03:17:39'),(43,22,2,0,2333,'some note','canceled','2023-08-28','2023-08-28 02:22:27','2023-08-28 03:55:32'),(44,3,3,0,1661,NULL,'pending','2023-08-28','2023-08-28 04:53:32','2023-08-28 04:53:32'),(45,27,3,0,2652,NULL,'pending','2023-08-28','2023-08-28 05:24:27','2023-08-28 05:24:27'),(46,27,3,0,2652,NULL,'pending','2023-08-28','2023-08-28 05:25:39','2023-08-28 05:25:39'),(47,22,1,0,333,NULL,'pending','2023-08-28','2023-08-28 05:29:38','2023-08-28 05:29:38'),(48,3,4,0,2434,NULL,'pending','2023-08-31','2023-08-31 10:04:38','2023-08-31 10:04:38');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stores`
--

LOCK TABLES `stores` WRITE;
/*!40000 ALTER TABLE `stores` DISABLE KEYS */;
INSERT INTO `stores` VALUES (1,'opsgreat 1','0123646782','q1',NULL,NULL,'active'),(2,'opsgreat 2','0123646282','q1',NULL,NULL,'active'),(3,'opsgreat 4','1234567851','binh chanh','2023-08-23 03:31:16','2023-08-23 03:31:16','active'),(4,'opsgreat 5','1234567899','Go Vap','2023-08-28 04:48:24','2023-08-28 04:48:24','active');
/*!40000 ALTER TABLE `stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user','agent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('Novelist','Poet','Essayist') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@gmail.com',NULL,'admin','$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u',NULL,NULL,NULL,'Novelist'),(2,'Agent','quochao2k2@gmail.com',NULL,'agent','$2y$10$eu.6N.aHR2QenOWpq7kGuOXOkmUKHMSWn60M.fM7aDOOntyFwbUAe','MvLAhC4C6QIz9lXlmeo8v6fM95aLctTZKFRpaZ9Z6oGkMUDMzQSChZo0OXql',NULL,'2023-08-24 02:48:55','Poet'),(3,'User','user@gmail.com',NULL,'user','$2y$10$SWHgKHcAV.2c9wGZXeHsguxv90A34tm94ScvQggEPu/13ueBL2T4u',NULL,NULL,NULL,'Essayist'),(4,'Prof. Garth Leffler','paris83@example.com','2023-08-07 01:05:02','user','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','5Nu7ITx6GH','2023-08-07 01:05:02','2023-08-07 01:05:02','Novelist'),(5,'Bernadine Mayert IV','arne.walter@example.net','2023-08-07 01:05:02','agent','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','6fg54A2i4V','2023-08-07 01:05:02','2023-08-07 01:05:02','Novelist'),(6,'Jaylen Goodwin','halvorson.mabel@example.org','2023-08-07 01:05:02','admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Db1czv7Gtf','2023-08-07 01:05:02','2023-08-07 01:05:02','Novelist'),(7,'Prof. Perry Rempel V','althea.dicki@example.net','2023-08-07 01:05:02','user','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','JL17E0gKzV','2023-08-07 01:05:02','2023-08-07 01:05:02','Novelist'),(8,'Joshua Volkman','dashawn42@example.org','2023-08-07 01:05:02','admin','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','Z2UCK85ywu','2023-08-07 01:05:02','2023-08-07 01:05:02','Novelist'),(9,'hao le','thomaszen63@gmail.com',NULL,'user','$2y$10$oU/M0czncAQOyU0UwePw8OIinWAUC/2QcVSbbnXjx2kNFT2iGDzTW',NULL,'2023-08-24 02:47:19','2023-08-24 02:47:19','Novelist');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_stores`
--

DROP TABLE IF EXISTS `warehouse_stores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouse_stores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `store_id` bigint unsigned NOT NULL,
  `warehouse_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `warehouse_stores_store_id_foreign` (`store_id`),
  KEY `warehouse_stores_warehouse_id_foreign` (`warehouse_id`),
  CONSTRAINT `warehouse_stores_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `warehouse_stores_warehouse_id_foreign` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_stores`
--

LOCK TABLES `warehouse_stores` WRITE;
/*!40000 ALTER TABLE `warehouse_stores` DISABLE KEYS */;
INSERT INTO `warehouse_stores` VALUES (1,1,1,'2023-08-21 10:05:18',NULL),(2,1,2,'2023-08-21 10:05:18',NULL),(3,2,3,NULL,NULL);
/*!40000 ALTER TABLE `warehouse_stores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `warehouses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouses`
--

LOCK TABLES `warehouses` WRITE;
/*!40000 ALTER TABLE `warehouses` DISABLE KEYS */;
INSERT INTO `warehouses` VALUES (1,'w opsgreat 1','0123435948','q3',NULL,NULL,'active'),(2,'w opsgreat 2','01234567899','q4',NULL,NULL,'active'),(3,'w opsgreat 3','0112345678','q2',NULL,NULL,'active'),(5,'w opsgreat 4','1234526789','q9','2023-08-23 03:30:45','2023-08-23 03:30:45','active'),(6,'w opsgreat 5','1234567989','Go Vap','2023-08-28 04:37:36','2023-08-28 04:47:18','active');
/*!40000 ALTER TABLE `warehouses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'task_update'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-31 18:02:55
