-- MariaDB dump 10.19  Distrib 10.4.22-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: carproject
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `ADMIN_ID` varchar(255) NOT NULL,
  `ADMIN_PASSWORD` varchar(255) NOT NULL,
  PRIMARY KEY (`ADMIN_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_ID` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `BOOK_PLACE` varchar(255) NOT NULL,
  `BOOK_DATE` date NOT NULL,
  `DURATION` int(11) NOT NULL,
  `PHONE_NUMBER` bigint(20) NOT NULL,
  `DESTINATION` varchar(255) NOT NULL,
  `RETURN_DATE` date NOT NULL,
  `PRICE` int(11) NOT NULL,
  `BOOK_STATUS` varchar(255) NOT NULL DEFAULT 'UNDER PROCESSING',
  `BOOK_SS` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`BOOK_ID`),
  KEY `CAR_ID` (`CAR_ID`),
  KEY `EMAIL` (`EMAIL`),
  CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`CAR_ID`) REFERENCES `cars` (`CAR_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (66,2,'swasthik@gmail.com','bangalore','2022-03-22',5,6363549133,'moodabidri','2022-04-09',35000,'UNDER PROCESSING',NULL),(68,1,'varshithvh@gmail.com','mysore','2022-03-22',10,6363549133,'moodabidri','2022-04-02',50000,'RETURNED',NULL),(69,1,'varshithvhegde@gmail.com','bangalore','2022-03-24',10,6363549133,'moodabidri','2022-03-31',50000,'REJECTED',NULL),(71,20,'swasthik@gmail.com','test','2025-01-01',0,9217635295,'3','2025-01-01',0,'CONFIRMED','file_20250302163104.png');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `CAR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CAR_NAME` varchar(255) NOT NULL,
  `FUEL_TYPE` varchar(255) NOT NULL,
  `CAPACITY` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  `CAR_IMG` varchar(255) NOT NULL,
  `AVAILABLE` varchar(255) NOT NULL,
  PRIMARY KEY (`CAR_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'FERRAI','PETROL',5,5000,'ferrari.jpg','Y'),(2,'LAMBORGINI','DEISEL',6,7000,'lamborghini.webp','Y'),(3,'PORSCHE','GAS',4,3000,'porsche.jpg','Y'),(20,'SWIFT','DEISEL',22,1000,'IMG-6239c94ea8a4a0.51789849.jpg','Y'),(22,'test','test',2,5000,'file_20250302111401.jpg','Y'),(24,'test','test',2,5000,'file_20250302111710.png','Y'),(25,'test','test',2,5000,'file_20250302111830.png','Y');
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `FED_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(255) NOT NULL,
  `COMMENT` text NOT NULL,
  PRIMARY KEY (`FED_ID`),
  KEY `TEST` (`EMAIL`),
  CONSTRAINT `TEST` FOREIGN KEY (`EMAIL`) REFERENCES `users` (`EMAIL`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (10,'varshithvh@gmail.com','hai I am satisfied with your service .But need to know whether is there any other options\r\n'),(11,'swasthik@gmail.com','test');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `PAY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `BOOK_ID` int(11) NOT NULL,
  `CARD_NO` varchar(255) NOT NULL,
  `EXP_DATE` varchar(255) NOT NULL,
  `CVV` int(11) NOT NULL,
  `PRICE` int(11) NOT NULL,
  PRIMARY KEY (`PAY_ID`),
  UNIQUE KEY `BOOK_ID` (`BOOK_ID`),
  CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`BOOK_ID`) REFERENCES `booking` (`BOOK_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
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
-- Table structure for table `tbl_booking_status_history`
--

DROP TABLE IF EXISTS `tbl_booking_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_booking_status_history` (
  `booking_status_history` int(11) NOT NULL AUTO_INCREMENT,
  `deleted_flag` tinyint(4) DEFAULT 0,
  `date_created` datetime DEFAULT current_timestamp(),
  `booking_status_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_status_history`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `FNAME` varchar(255) NOT NULL,
  `LNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `LIC_NUM` varchar(255) NOT NULL,
  `PHONE_NUMBER` bigint(11) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `GENDER` varchar(255) NOT NULL,
  PRIMARY KEY (`EMAIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('Swasthik','Jain','swasthik@gmail.com','B2343',9845687555,'$2y$10$Ly93KmimGq0rSa7GSEP3nO2O6d9UHpebRUUWo3eogB3hsoh.g0KoC','male'),('Varshith','Hegde','varshithvh@gmail.com','B3uudh4',6363549133,'202cb962ac59075b964b07152d234b70','male'),('Varshith','hegde','varshithvhegde@gmail.com','ghhdhd',6363549133,'202cb962ac59075b964b07152d234b70','male');
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

-- Dump completed on 2025-03-03  0:43:04
