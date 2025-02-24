-- MySQL dump 10.13  Distrib 8.0.41, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_tarz
-- ------------------------------------------------------
-- Server version	9.2.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('ADMIN','ADMIN');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `booking` (
  `BOOK_ID` int NOT NULL AUTO_INCREMENT,
  `CAR_ID` int NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `BOOK_PLACE` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int NOT NULL,
  `PHONE_NUMBER` bigint NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING',
  PRIMARY KEY (`BOOK_ID`),
  KEY `CAR_ID` (`CAR_ID`),
  KEY `EMAIL` (`EMAIL`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `cars` (`CAR_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (66,2,'swasthik@gmail.com','bangalore','2022-03-22',5,6363549133,'moodabidri','2022-04-09',35000,'UNDER PROCESSING'),(68,1,'varshithvh@gmail.com','mysore','2022-03-22',10,6363549133,'moodabidri','2022-04-02',50000,'RETURNED'),(69,1,'varshithvhegde@gmail.com','bangalore','2022-03-24',10,6363549133,'moodabidri','2022-03-31',50000,'RETURNED');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `CAR_ID` int NOT NULL AUTO_INCREMENT,
  `CAR_NAME` varchar(255) NOT NULL,
  `FUEL_TYPE` varchar(255) NOT NULL,
  `CAPACITY` int NOT NULL,
  `PRICE` int NOT NULL,
  `CAR_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL,
  PRIMARY KEY (`CAR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'FERRAI','PETROL',5,5000,'ferrari.jpg','Y'),(2,'LAMBORGINI','DEISEL',6,7000,'lamborghini.webp','Y'),(3,'PORSCHE','GAS',4,3000,'porsche.jpg','Y'),(20,'SWIFT','DEISEL',22,1000,'IMG-6239c94ea8a4a0.51789849.jpg','Y');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `FED_ID` int NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL,
  `COMMENT` text NOT NULL,
  PRIMARY KEY (`FED_ID`),
  KEY `TEST` (`EMAIL`),
  CONSTRAINT `TEST` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (10,'varshithvh@gmail.com','hai I am satisfied with your service .But need to know whether is there any other options\r\n');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PAY_ID` int NOT NULL AUTO_INCREMENT,
  `BOOK_ID` int NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` int NOT NULL,
  `PRICE` int NOT NULL,
  PRIMARY KEY (`PAY_ID`),
  UNIQUE KEY `BOOK_ID` (`BOOK_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `booking` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (24,68,'4444444444444444','11/22',333,50000);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_access`
--

DROP TABLE IF EXISTS `tbl_access`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_access` (
  `access_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_book_status` (
  `book_status_id` int NOT NULL AUTO_INCREMENT,
  `book_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`book_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_booking` (
  `booking_id` int NOT NULL AUTO_INCREMENT,
  `payment_status_id` int DEFAULT NULL,
  `payment_mode_id` int DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `book_status_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `pickup_location_id` int DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `img` varchar(100) DEFAULT NULL,
  `car_id` int DEFAULT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_booking`
--

LOCK TABLES `tbl_booking` WRITE;
/*!40000 ALTER TABLE `tbl_booking` DISABLE KEYS */;
INSERT INTO `tbl_booking` VALUES (1,2,1,'2025-01-31','2025-02-20',2,3,1,0,'2025-02-24 07:42:14','default.png',1,2000.00),(2,1,2,'2025-01-31','2025-02-19',1,5,1,0,'2025-02-24 14:35:15','default.png',1,2000.00);
/*!40000 ALTER TABLE `tbl_booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_booking_status_history`
--

DROP TABLE IF EXISTS `tbl_booking_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_booking_status_history` (
  `booking_status_history` int NOT NULL AUTO_INCREMENT,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `booking_status_id` int DEFAULT NULL,
  `booking_id` int DEFAULT NULL,
  PRIMARY KEY (`booking_status_history`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_booking_status_history`
--

LOCK TABLES `tbl_booking_status_history` WRITE;
/*!40000 ALTER TABLE `tbl_booking_status_history` DISABLE KEYS */;
INSERT INTO `tbl_booking_status_history` VALUES (1,0,'2025-02-24 14:05:01',1,0),(2,0,'2025-02-24 14:05:12',1,0),(3,0,'2025-02-24 14:07:14',2,0),(4,0,'2025-02-24 14:07:37',1,1),(5,0,'2025-02-24 14:07:52',2,1),(6,0,'2025-02-24 14:35:15',1,2);
/*!40000 ALTER TABLE `tbl_booking_status_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_brand`
--

DROP TABLE IF EXISTS `tbl_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_car_category` (
  `car_category_id` int NOT NULL AUTO_INCREMENT,
  `car_category` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_car_stock` (
  `car_stock_id` int NOT NULL AUTO_INCREMENT,
  `car_id` int DEFAULT NULL,
  `stock` varchar(45) DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_car_type` (
  `car_type_id` int NOT NULL AUTO_INCREMENT,
  `car_type` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cars` (
  `car_id` int NOT NULL AUTO_INCREMENT,
  `brand_id` int DEFAULT NULL,
  `car_category_id` int DEFAULT NULL,
  `gas_id` int DEFAULT NULL,
  `car_type_id` int DEFAULT NULL,
  `seater_id` int DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `rfid` tinyint DEFAULT '0',
  `model` varchar(100) DEFAULT NULL,
  `model_year` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `price` decimal(65,2) DEFAULT '0.00',
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cars`
--

LOCK TABLES `tbl_cars` WRITE;
/*!40000 ALTER TABLE `tbl_cars` DISABLE KEYS */;
INSERT INTO `tbl_cars` VALUES (1,1,1,1,1,2,'default.png',1,'Mitsubishi Mirage G4 GLS','2024','Titanium Grey',1799.00,0,'2025-02-23 12:55:51'),(2,1,1,1,1,2,'default.png',1,'Mitsubishi Mirage G4 GLS','2024','Red Metallic',1799.00,0,'2025-02-23 12:55:51'),(3,1,1,1,1,2,'default.png',1,'Mitsubishi Mirage G4 GLS','2024','Cool Silver Metallic',1799.00,0,'2025-02-23 12:55:51'),(4,1,1,1,1,2,'default.png',1,'Mitsubishi Mirage G4 GLS','2024','White Solid',1799.00,0,'2025-02-23 12:55:51'),(5,3,1,1,1,2,'default.png',1,'TOYOTA VIOS','2024','Silver',1799.00,0,'2025-02-23 12:55:51'),(6,3,1,1,1,2,'default.png',1,'TOYOTA VIOS','2024','Super White',1799.00,0,'2025-02-23 12:55:51'),(7,3,1,1,1,2,'default.png',1,'TOYOTA VIOS','2024','Gray',1799.00,0,'2025-02-23 12:55:51'),(8,3,1,1,1,2,'default.png',1,'TOYOTA VIOS','2024','Attitude Black',1799.00,0,'2025-02-23 12:55:51'),(9,3,1,1,1,2,'default.png',1,'TOYOTA VIOS','2024','Red Mica',1799.00,0,'2025-02-23 12:55:51'),(10,3,4,2,1,12,'default.png',0,'HI ACE','2019','White',1799.00,0,'2025-02-23 12:59:30'),(11,3,4,2,1,12,'default.png',0,'HI ACE','2019','Black',1799.00,0,'2025-02-23 12:59:30'),(12,3,4,2,1,12,'default.png',0,'HI ACE','2019','Silver',1799.00,0,'2025-02-23 12:59:30'),(13,15,2,1,1,1,'file_20250224062157.jpg',1,'test','1','blue',1.00,1,'2025-02-24 06:21:57');
/*!40000 ALTER TABLE `tbl_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_gas`
--

DROP TABLE IF EXISTS `tbl_gas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_gas` (
  `gas_id` int NOT NULL AUTO_INCREMENT,
  `gas` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payment_mode` (
  `payment_mode_id` int NOT NULL AUTO_INCREMENT,
  `payment_mode` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_mode_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_payment_status` (
  `payment_status_id` int NOT NULL AUTO_INCREMENT,
  `payment_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pickup_location` (
  `pickup_location_id` int NOT NULL AUTO_INCREMENT,
  `location` text,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pickup_location_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pickup_location`
--

LOCK TABLES `tbl_pickup_location` WRITE;
/*!40000 ALTER TABLE `tbl_pickup_location` DISABLE KEYS */;
INSERT INTO `tbl_pickup_location` VALUES (1,'Urdaneta,Ilocos Region, Philippines, Urdaneta, Philippines',0,'2025-02-23 13:19:33'),(2,'test1',1,'2025-02-24 04:25:55');
/*!40000 ALTER TABLE `tbl_pickup_location` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_seater`
--

DROP TABLE IF EXISTS `tbl_seater`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_seater` (
  `seater_id` int NOT NULL AUTO_INCREMENT,
  `seater` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`seater_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_user_status` (
  `user_status_id` int NOT NULL AUTO_INCREMENT,
  `user_status` varchar(45) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
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
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `access_id` int DEFAULT NULL,
  `user_status_id` int DEFAULT NULL,
  `gender_id` int DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `deleted_flag` tinyint DEFAULT '0',
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,1,1,1,'suerpadmin@gmail.com','suerpadmin','$2y$10$GB3FNa8EgsakIn.2kFUFvu.tC5Sg9Q8Ko52RMzNqNX9yAmxBhYFq6','suerpadmin','superadmin','09999999999',0,'2025-02-23 12:26:30'),(2,2,1,1,'admin@gmail.com','admin','$2y$10$DxipBXQ5Heam7KUnaxYxhOGfbNZvHXKizhPvl7eu4WSxWW9DCpA0.','admin','admin','9999999999',0,'2025-02-23 12:26:30'),(3,3,1,1,'client@gmail.com','client','$2y$10$GB3FNa8EgsakIn.2kFUFvu.tC5Sg9Q8Ko52RMzNqNX9yAmxBhYFq6','john','doe','09999999999',0,'2025-02-23 12:26:30'),(4,2,1,1,'john@doe.com','john','123','john','doe','09999999999',0,'2025-02-24 01:00:16'),(5,3,1,1,'john1@doe.com','john1','$2y$10$Ly93KmimGq0rSa7GSEP3nO2O6d9UHpebRUUWo3eogB3hsoh.g0KoC','john','doe','09999999999',0,'2025-02-24 01:07:20'),(6,3,1,2,'jimenez.carlo.llabor@gmail.com','cl-cjimenez','$2y$12$HZNaCWcN0cut0cLA5I4z.usTx8AoP6PSpnE8C5aEk9MLVYOsppr32','carlo','jimenez','09217635295',0,'2025-02-24 14:41:53');
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `LIC_NUM` varchar(255) NOT NULL,
  `PHONE_NUMBER` bigint NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  PRIMARY KEY (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Swasthik','Jain','swasthik@gmail.com','B2343',9845687555,'c788b480e4a3c807a14b6f3f4b1a1ae6','male'),('Varshith','Hegde','varshithvh@gmail.com','B3uudh4',6363549133,'e6235c884414e320c8781c22b0c38c9b','male'),('Varshith','hegde','varshithvhegde@gmail.com','ghhdhd',6363549133,'e6235c884414e320c8781c22b0c38c9b','male');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-24 22:43:19
