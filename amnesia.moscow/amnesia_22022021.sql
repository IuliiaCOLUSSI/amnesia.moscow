-- MySQL dump 10.13  Distrib 8.0.22, for macos10.15 (x86_64)
--
-- Host: localhost    Database: amnesia
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `announcement` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4DB9D91C18F45C82` (`website_id`),
  CONSTRAINT `FK_4DB9D91C18F45C82` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcement`
--

LOCK TABLES `announcement` WRITE;
/*!40000 ALTER TABLE `announcement` DISABLE KEYS */;
INSERT INTO `announcement` VALUES (1,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,NULL,NULL,NULL,'2021-02-20 15:39:22'),(2,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312d4225383331735631.jpg',NULL,NULL,'2021-02-20 15:39:46'),(3,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312d7f0c2e2520209659.jpg',NULL,NULL,'2021-02-20 15:40:47'),(4,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312db9b32ca719547662.jpg',NULL,NULL,'2021-02-20 15:41:45'),(5,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312dc963995416847311.jpg',NULL,NULL,'2021-02-20 15:42:01'),(6,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312dd25ed40767059555.jpg',NULL,NULL,'2021-02-20 15:42:10'),(7,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312dfeeeaaa424623747.jpg',NULL,NULL,'2021-02-20 15:42:54'),(8,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312e3b2c663765236592.jpg',NULL,NULL,'2021-02-20 15:43:55'),(9,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312e4ba0e29947727627.jpg',NULL,NULL,'2021-02-20 15:44:11'),(10,'С ЛЮБОВЬЮ К НАШИМ КЛИЕНТАМ','Специально для тех, кто хочет самостоятельно украшать свой дом свежими цветами!\r\n\r\n\r\n\r\nРаспаковывать Цветочный box - это истинное удовольствие. Можно смаковать, рассматривая каждый цветок, а можно сразу все достать и побыстрее в вазу.',NULL,NULL,'img-6484-60312e64b1a6e347171790.jpg',NULL,NULL,'2021-02-20 15:44:36');
/*!40000 ALTER TABLE `announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `article` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalog_category`
--

DROP TABLE IF EXISTS `catalog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `catalog_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `website_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_349BC7DF18F45C82` (`website_id`),
  CONSTRAINT `FK_349BC7DF18F45C82` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalog_category`
--

LOCK TABLES `catalog_category` WRITE;
/*!40000 ALTER TABLE `catalog_category` DISABLE KEYS */;
INSERT INTO `catalog_category` VALUES (28,'Букеты','Букеты для всех',NULL,NULL,NULL,NULL),(29,'Букеты','Букеты для всех','img-0308-6031500c8744f462428834.jpg',NULL,'2021-02-20 18:08:12',NULL),(30,'Букеты','Букеты для всех','img-0308-60315084be9ed291903325.jpg',NULL,'2021-02-20 18:10:12',NULL),(31,'Букеты','Букеты для всех','img-0308-6031508f69962546822353.jpg',NULL,'2021-02-20 18:10:23',NULL),(32,'Композиции','Композиции для всех','img-6484-603150a84da54662978770.jpg',NULL,'2021-02-20 18:10:48',NULL),(33,'Композиции','Композиции для всех','img-6484-603150b15cf46904803472.jpg',NULL,'2021-02-20 18:10:57',NULL),(34,'Композиции','Композиции для всех','img-6484-603150f87eb16659505975.jpg',NULL,'2021-02-20 18:12:08',NULL);
/*!40000 ALTER TABLE `catalog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_information`
--

DROP TABLE IF EXISTS `delivery_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delivery_information` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_delivery` date DEFAULT NULL,
  `time_delivery` time DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `recipient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recipient_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1564B9C5F675F31B` (`author_id`),
  CONSTRAINT `FK_1564B9C5F675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_information`
--

LOCK TABLES `delivery_information` WRITE;
/*!40000 ALTER TABLE `delivery_information` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210124185225','2021-01-24 18:52:35',24),('DoctrineMigrations\\Version20210124190223','2021-01-24 19:02:31',24),('DoctrineMigrations\\Version20210124191303','2021-01-24 19:13:09',57),('DoctrineMigrations\\Version20210124191529','2021-01-24 19:15:36',31),('DoctrineMigrations\\Version20210124192112','2021-01-24 19:21:24',73),('DoctrineMigrations\\Version20210124192424','2021-01-24 19:24:31',28),('DoctrineMigrations\\Version20210124192543','2021-01-24 19:25:47',21),('DoctrineMigrations\\Version20210205064925','2021-02-05 06:49:33',117),('DoctrineMigrations\\Version20210205065316','2021-02-05 06:53:21',72),('DoctrineMigrations\\Version20210205065415','2021-02-05 06:54:21',27),('DoctrineMigrations\\Version20210205070526','2021-02-05 07:05:32',43),('DoctrineMigrations\\Version20210205083817','2021-02-05 08:38:24',63),('DoctrineMigrations\\Version20210218135218','2021-02-18 13:52:27',31),('DoctrineMigrations\\Version20210218135824','2021-02-18 13:58:27',31),('DoctrineMigrations\\Version20210218140132','2021-02-18 14:01:35',29),('DoctrineMigrations\\Version20210218140640','2021-02-18 14:06:43',55),('DoctrineMigrations\\Version20210220125911','2021-02-20 12:59:16',65),('DoctrineMigrations\\Version20210220130617','2021-02-20 13:06:20',28),('DoctrineMigrations\\Version20210220131407','2021-02-20 13:14:10',65),('DoctrineMigrations\\Version20210220151444','2021-02-20 15:14:50',32),('DoctrineMigrations\\Version20210220152624','2021-02-20 15:26:28',66),('DoctrineMigrations\\Version20210220155450','2021-02-20 15:54:52',33),('DoctrineMigrations\\Version20210220163738','2021-02-20 16:37:41',53),('DoctrineMigrations\\Version20210220164908','2021-02-20 16:49:10',84),('DoctrineMigrations\\Version20210220165132','2021-02-20 16:51:34',25),('DoctrineMigrations\\Version20210220165238','2021-02-20 16:52:40',68),('DoctrineMigrations\\Version20210220180258','2021-02-20 18:03:00',75);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner`
--

DROP TABLE IF EXISTS `partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `website_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_312B3E1618F45C82` (`website_id`),
  CONSTRAINT `FK_312B3E1618F45C82` FOREIGN KEY (`website_id`) REFERENCES `website` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner`
--

LOCK TABLES `partner` WRITE;
/*!40000 ALTER TABLE `partner` DISABLE KEYS */;
INSERT INTO `partner` VALUES (1,'парнер','edsf','/private/var/folders/pr/l7c6q6650ps496m6b8l01l240000gp/T/phpCfzO9K','df','sdf',NULL,NULL,NULL),(2,'парнер','edsf','/private/var/folders/pr/l7c6q6650ps496m6b8l01l240000gp/T/phpfP7RGN','df','sdf',NULL,NULL,NULL),(3,'парнер','edsf','/private/var/folders/pr/l7c6q6650ps496m6b8l01l240000gp/T/phprRNUpD','df','sdf',NULL,NULL,NULL),(4,'парнер','edsf','/private/var/folders/pr/l7c6q6650ps496m6b8l01l240000gp/T/phpTrjrMP','df','sdf',NULL,NULL,NULL),(5,'парнер','qsdqs','img-6811-603123b12d613300381132.jpg','partner','sqd',NULL,'2021-02-20 14:58:57',NULL),(6,'парнер','qsdqs','img-6811-603123fcdd49b458016951.jpg','partner','sqd',NULL,'2021-02-20 15:00:12',NULL);
/*!40000 ALTER TABLE `partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `new_price` double DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shape` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_stock` tinyint(1) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `title_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shape_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description_eng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_eng` double DEFAULT NULL,
  `newprice_eng` double DEFAULT NULL,
  `catalog_category_id` int DEFAULT NULL,
  `for_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D34A04AD3F2BC4C` (`catalog_category_id`),
  CONSTRAINT `FK_D34A04AD3F2BC4C` FOREIGN KEY (`catalog_category_id`) REFERENCES `catalog_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (111,'Название','Полное описание','Краткое описание','Номер',0,0,'голубой','овальный',1,'img-6656-60326f4a3c0e6244038331.jpg',NULL,NULL,'2021-02-21 14:33:46','Название','Полное описание',NULL,NULL,NULL,0,0,28,'для мужчин'),(112,'букет роз 2','букет роз 2','букет роз 2','букет роз 2',7777,777,'фиолетовый','овальный',1,'img-0308-60326fb6b003f558820784.jpg',NULL,NULL,'2021-02-21 14:35:34','bouquet','bouquet',NULL,NULL,NULL,888,88,28,'для детей');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `payment_status` int DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_information_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6117D13BF675F31B` (`author_id`),
  KEY `IDX_6117D13B8EFD213E` (`delivery_information_id`),
  CONSTRAINT `FK_6117D13B8EFD213E` FOREIGN KEY (`delivery_information_id`) REFERENCES `delivery_information` (`id`),
  CONSTRAINT `FK_6117D13BF675F31B` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_item`
--

DROP TABLE IF EXISTS `purchase_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6FA8ED7D558FBEB9` (`purchase_id`),
  KEY `IDX_6FA8ED7D4584665A` (`product_id`),
  CONSTRAINT `FK_6FA8ED7D4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `FK_6FA8ED7D558FBEB9` FOREIGN KEY (`purchase_id`) REFERENCES `purchase` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_item`
--

LOCK TABLES `purchase_item` WRITE;
/*!40000 ALTER TABLE `purchase_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reset_password_request`
--

DROP TABLE IF EXISTS `reset_password_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reset_password_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `selector` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hashed_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `expires_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_7CE748AA76ED395` (`user_id`),
  CONSTRAINT `FK_7CE748AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reset_password_request`
--

LOCK TABLES `reset_password_request` WRITE;
/*!40000 ALTER TABLE `reset_password_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `reset_password_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website`
--

DROP TABLE IF EXISTS `website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website` (
  `id` int NOT NULL AUTO_INCREMENT,
  `main_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_us_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `about_us_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website`
--

LOCK TABLES `website` WRITE;
/*!40000 ALTER TABLE `website` DISABLE KEYS */;
INSERT INTO `website` VALUES (17,'img-5135-60310413269ac552080808.png','img-9221-603106485541f547787270.png',NULL,'2021-02-20 12:53:28',NULL);
/*!40000 ALTER TABLE `website` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-22  9:55:24
