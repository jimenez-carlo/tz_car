-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: db_tarz
-- ------------------------------------------------------
-- Server version	10.4.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_access`
--

DROP TABLE IF EXISTS `tbl_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_access` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_access`
--

LOCK TABLES `tbl_access` WRITE;
/*!40000 ALTER TABLE `tbl_access` DISABLE KEYS */;
INSERT INTO `tbl_access` VALUES (1,'SUPERADMIN',0,'2025-02-23 12:21:45'),(2,'ADMIN',0,'2025-02-23 12:21:45'),(3,'CLIENT',0,'2025-02-23 12:21:45');
/*!40000 ALTER TABLE `tbl_access` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_book_status`
--

DROP TABLE IF EXISTS `tbl_book_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_book_status` (
  `book_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`book_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_book_status`
--

LOCK TABLES `tbl_book_status` WRITE;
/*!40000 ALTER TABLE `tbl_book_status` DISABLE KEYS */;
INSERT INTO `tbl_book_status` VALUES (1,'PENDING',0,'2025-02-23 13:04:19'),(2,'CONFIRMED',0,'2025-02-23 13:04:19'),(3,'CANCELLED',0,'2025-02-23 13:04:19'),(4,'REJECTED',0,'2025-02-23 13:04:19'),(5,'IN-USE',0,'2025-02-23 13:04:19'),(6,'COMPLETED',0,'2025-02-23 13:04:19');
/*!40000 ALTER TABLE `tbl_book_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_booking`
--

DROP TABLE IF EXISTS `tbl_booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_status_id` int(11) DEFAULT NULL,
  `payment_mode_id` int(11) DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `book_status_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_booking`
--

LOCK TABLES `tbl_booking` WRITE;
/*!40000 ALTER TABLE `tbl_booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_brand`
--

LOCK TABLES `tbl_brand` WRITE;
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` VALUES (1,'MITSUBISHI',0,'2025-02-23 12:39:21'),(2,'KIA',0,'2025-02-23 12:39:21'),(3,'TOYOTA',0,'2025-02-23 12:39:21'),(4,'HYUNDAI',0,'2025-02-23 12:39:21'),(5,'FOTON',0,'2025-02-23 12:39:21'),(6,'BYD',0,'2025-02-23 12:39:21'),(7,'MERCEDES',0,'2025-02-23 12:39:21'),(8,'HONDA',0,'2025-02-23 12:39:21'),(9,'NISSAN',0,'2025-02-23 12:39:21'),(10,'SUZUKI',0,'2025-02-23 12:39:21'),(11,'CHEVROLET',0,'2025-02-23 12:39:21'),(12,'FORD',0,'2025-02-23 12:39:21'),(13,'SUZUKI',0,'2025-02-23 12:39:21'),(14,'VOLKSWAGEN',0,'2025-02-23 12:39:21'),(15,'MG',0,'2025-02-23 12:39:21'),(16,'test',1,'2025-02-24 01:29:01');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_car_category`
--

DROP TABLE IF EXISTS `tbl_car_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_car_category` (
  `car_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_category` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`car_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_car_category`
--

LOCK TABLES `tbl_car_category` WRITE;
/*!40000 ALTER TABLE `tbl_car_category` DISABLE KEYS */;
INSERT INTO `tbl_car_category` VALUES (1,'SEDAN',0,'2025-02-23 12:37:39'),(2,'HATCHBACK',0,'2025-02-23 12:37:39'),(3,'COUPE',0,'2025-02-23 12:37:39'),(4,'SUV',0,'2025-02-23 12:37:39'),(5,'SPORTSCAR',0,'2025-02-23 12:37:39'),(6,'CONVERTIBLE',0,'2025-02-23 12:37:39'),(7,'CORSSOVER',0,'2025-02-23 12:37:39'),(8,'MUSCLE CAR',0,'2025-02-23 12:37:39'),(9,'STATION WAGON',0,'2025-02-23 12:37:39'),(10,'PICKUP TRUCK',0,'2025-02-23 12:37:39'),(11,'JEEP',0,'2025-02-23 12:37:39'),(12,'LIMOUSINE',0,'2025-02-23 12:37:39');
/*!40000 ALTER TABLE `tbl_car_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_car_stock`
--

DROP TABLE IF EXISTS `tbl_car_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_car_stock` (
  `car_stock_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_id` int(11) DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`car_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_car_stock`
--

LOCK TABLES `tbl_car_stock` WRITE;
/*!40000 ALTER TABLE `tbl_car_stock` DISABLE KEYS */;
INSERT INTO `tbl_car_stock` VALUES (1,1,'2',NULL,0,'2025-02-23 13:12:43'),(2,2,'2',NULL,0,'2025-02-23 13:12:43'),(3,3,'2',NULL,0,'2025-02-23 13:12:43'),(4,4,'2',NULL,0,'2025-02-23 13:12:43'),(5,5,'2',NULL,0,'2025-02-23 13:12:43'),(6,6,'2',NULL,0,'2025-02-23 13:12:43'),(7,7,'2',NULL,0,'2025-02-23 13:12:43'),(8,8,'2',NULL,0,'2025-02-23 13:12:43'),(9,9,'2',NULL,0,'2025-02-23 13:12:43'),(10,10,'2',NULL,0,'2025-02-23 13:12:43'),(11,11,'2',NULL,0,'2025-02-23 13:12:43'),(12,12,'2',NULL,0,'2025-02-23 13:12:43');
/*!40000 ALTER TABLE `tbl_car_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_car_type`
--

DROP TABLE IF EXISTS `tbl_car_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_car_type` (
  `car_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_type` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`car_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_car_type`
--

LOCK TABLES `tbl_car_type` WRITE;
/*!40000 ALTER TABLE `tbl_car_type` DISABLE KEYS */;
INSERT INTO `tbl_car_type` VALUES (1,'AUTOMATIC',0,'2025-02-23 12:41:35'),(2,'MANUAL',0,'2025-02-23 12:41:35');
/*!40000 ALTER TABLE `tbl_car_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cars`
--

DROP TABLE IF EXISTS `tbl_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cars` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_id` int(11) DEFAULT NULL,
  `gas_id` int(11) DEFAULT NULL,
  `car_type_id` int(11) DEFAULT NULL,
  `seater_id` int(11) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `rfid` tinyint(4) DEFAULT 0,
  `model` varchar(100) DEFAULT NULL,
  `model_year` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `price` decimal(65,2) DEFAULT 0.00,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cars`
--

LOCK TABLES `tbl_cars` WRITE;
/*!40000 ALTER TABLE `tbl_cars` DISABLE KEYS */;
INSERT INTO `tbl_cars` VALUES (1,1,1,1,2,NULL,1,'Mitsubishi Mirage G4 GLS','2024','Titanium Grey',1799.00,0,'2025-02-23 12:55:51'),(2,1,1,1,2,NULL,1,'Mitsubishi Mirage G4 GLS','2024','Red Metallic',1799.00,0,'2025-02-23 12:55:51'),(3,1,1,1,2,NULL,1,'Mitsubishi Mirage G4 GLS','2024','Cool Silver Metallic',1799.00,0,'2025-02-23 12:55:51'),(4,1,1,1,2,NULL,1,'Mitsubishi Mirage G4 GLS','2024','White Solid',1799.00,0,'2025-02-23 12:55:51'),(5,3,1,1,2,NULL,1,'TOYOTA VIOS','2024','Silver',1799.00,0,'2025-02-23 12:55:51'),(6,3,1,1,2,NULL,1,'TOYOTA VIOS','2024','Super White',1799.00,0,'2025-02-23 12:55:51'),(7,3,1,1,2,NULL,1,'TOYOTA VIOS','2024','Gray',1799.00,0,'2025-02-23 12:55:51'),(8,3,1,1,2,NULL,1,'TOYOTA VIOS','2024','Attitude Black',1799.00,0,'2025-02-23 12:55:51'),(9,3,1,1,2,NULL,1,'TOYOTA VIOS','2024','Red Mica',1799.00,0,'2025-02-23 12:55:51'),(10,3,2,1,12,NULL,0,'HI ACE','2019','White',1799.00,0,'2025-02-23 12:59:30'),(11,3,2,1,12,NULL,0,'HI ACE','2019','Black',1799.00,0,'2025-02-23 12:59:30'),(12,3,2,1,12,NULL,0,'HI ACE','2019','Silver',1799.00,0,'2025-02-23 12:59:30');
/*!40000 ALTER TABLE `tbl_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gas`
--

DROP TABLE IF EXISTS `tbl_gas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gas` (
  `gas_id` int(11) NOT NULL AUTO_INCREMENT,
  `gas` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`gas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gas`
--

LOCK TABLES `tbl_gas` WRITE;
/*!40000 ALTER TABLE `tbl_gas` DISABLE KEYS */;
INSERT INTO `tbl_gas` VALUES (1,'REGULAR',0,'2025-02-23 12:44:45'),(2,'DIESEL',0,'2025-02-23 12:44:45'),(3,'ELECTRIC',0,'2025-02-23 12:44:45');
/*!40000 ALTER TABLE `tbl_gas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gender`
--

DROP TABLE IF EXISTS `tbl_gender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_gender`
--

LOCK TABLES `tbl_gender` WRITE;
/*!40000 ALTER TABLE `tbl_gender` DISABLE KEYS */;
INSERT INTO `tbl_gender` VALUES (1,'MALE',0,'2025-02-23 12:24:56'),(2,'FEMALE',0,'2025-02-23 12:24:56');
/*!40000 ALTER TABLE `tbl_gender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_mode`
--

DROP TABLE IF EXISTS `tbl_payment_mode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_mode` (
  `payment_mode_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_mode` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`payment_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_mode`
--

LOCK TABLES `tbl_payment_mode` WRITE;
/*!40000 ALTER TABLE `tbl_payment_mode` DISABLE KEYS */;
INSERT INTO `tbl_payment_mode` VALUES (1,'CASH',0,'2025-02-23 13:08:00'),(2,'GCASH',0,'2025-02-23 13:08:00'),(3,'PAYMAYA',0,'2025-02-23 13:08:00'),(4,'PAYPAL',0,'2025-02-23 13:08:00');
/*!40000 ALTER TABLE `tbl_payment_mode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_payment_status`
--

DROP TABLE IF EXISTS `tbl_payment_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_payment_status` (
  `payment_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`payment_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_payment_status`
--

LOCK TABLES `tbl_payment_status` WRITE;
/*!40000 ALTER TABLE `tbl_payment_status` DISABLE KEYS */;
INSERT INTO `tbl_payment_status` VALUES (1,'PENDING',0,'2025-02-23 13:09:41'),(2,'PAID',0,'2025-02-23 13:09:41');
/*!40000 ALTER TABLE `tbl_payment_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pickup_location`
--

DROP TABLE IF EXISTS `tbl_pickup_location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pickup_location` (
  `pickup_location_id` int(11) NOT NULL AUTO_INCREMENT,
  `location` text DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`pickup_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pickup_location`
--

LOCK TABLES `tbl_pickup_location` WRITE;
/*!40000 ALTER TABLE `tbl_pickup_location` DISABLE KEYS */;
INSERT INTO `tbl_pickup_location` VALUES (1,'Urdaneta,Ilocos Region, Philippines, Urdaneta, Philippines',0,'2025-02-23 13:19:33');
/*!40000 ALTER TABLE `tbl_pickup_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_seater`
--

DROP TABLE IF EXISTS `tbl_seater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_seater` (
  `seater_id` int(11) NOT NULL AUTO_INCREMENT,
  `seater` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`seater_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_seater`
--

LOCK TABLES `tbl_seater` WRITE;
/*!40000 ALTER TABLE `tbl_seater` DISABLE KEYS */;
INSERT INTO `tbl_seater` VALUES (1,'4',0,'2025-02-23 12:48:12'),(2,'5',0,'2025-02-23 12:48:12'),(3,'6',0,'2025-02-23 12:48:12'),(4,'7',0,'2025-02-23 12:48:12'),(5,'8',0,'2025-02-23 12:48:12'),(6,'9',0,'2025-02-23 12:48:12'),(7,'10',0,'2025-02-23 12:48:12'),(8,'11',0,'2025-02-23 12:48:12'),(9,'12',0,'2025-02-23 12:48:12'),(10,'13',0,'2025-02-23 12:48:12'),(11,'14',0,'2025-02-23 12:48:12'),(12,'15',0,'2025-02-23 12:48:12'),(13,'16',0,'2025-02-23 12:48:12'),(14,'17',0,'2025-02-23 12:48:12'),(15,'18',0,'2025-02-23 12:48:12');
/*!40000 ALTER TABLE `tbl_seater` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_status`
--

DROP TABLE IF EXISTS `tbl_user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_status` (
  `user_status_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_status`
--

LOCK TABLES `tbl_user_status` WRITE;
/*!40000 ALTER TABLE `tbl_user_status` DISABLE KEYS */;
INSERT INTO `tbl_user_status` VALUES (1,'ACTIVE',0,'2025-02-23 12:24:44'),(2,'INACTIVE',0,'2025-02-23 12:24:44');
/*!40000 ALTER TABLE `tbl_user_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) DEFAULT NULL,
  `user_status_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,1,1,1,'suerpadmin@gmail.com','suerpadmin','$2y$10$GB3FNa8EgsakIn.2kFUFvu.tC5Sg9Q8Ko52RMzNqNX9yAmxBhYFq6','suerpadmin','superadmin','09999999999',0,'2025-02-23 12:26:30'),(2,2,1,1,'admin@gmail.com','admin','$2y$10$DxipBXQ5Heam7KUnaxYxhOGfbNZvHXKizhPvl7eu4WSxWW9DCpA0.','admin','admin','9999999999',0,'2025-02-23 12:26:30'),(3,3,1,1,'client@gmail.com','client','$2y$10$GB3FNa8EgsakIn.2kFUFvu.tC5Sg9Q8Ko52RMzNqNX9yAmxBhYFq6','john','doe','09999999999',0,'2025-02-23 12:26:30'),(4,2,1,1,'john@doe.com','john','123','john','doe','09999999999',0,'2025-02-24 01:00:16'),(5,0,1,0,'john1@doe.com','john1','$2y$10$Ly93KmimGq0rSa7GSEP3nO2O6d9UHpebRUUWo3eogB3hsoh.g0KoC','john','doe','09999999999',0,'2025-02-24 01:07:20');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-24  1:32:21
