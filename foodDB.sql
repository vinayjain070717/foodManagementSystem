-- MySQL dump 10.13  Distrib 5.7.32, for Win64 (x86_64)
--
-- Host: localhost    Database: foodDB
-- ------------------------------------------------------
-- Server version	5.7.32-log

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
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(30) NOT NULL,
  `last_name` char(20) NOT NULL,
  `mobile_number` char(20) NOT NULL,
  `email_id` char(20) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrator`
--

LOCK TABLES `administrator` WRITE;
/*!40000 ALTER TABLE `administrator` DISABLE KEYS */;
INSERT INTO `administrator` VALUES (2,'admin123','admin','29299393','admin@gmail','1234');
/*!40000 ALTER TABLE `administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `donation`
--

DROP TABLE IF EXISTS `donation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` char(20) NOT NULL,
  `email_id` char(20) NOT NULL,
  `address` char(20) NOT NULL,
  `mobile_number` char(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donation`
--

LOCK TABLES `donation` WRITE;
/*!40000 ALTER TABLE `donation` DISABLE KEYS */;
INSERT INTO `donation` VALUES (1,'Sam','abcd@gmail','add1','3939939','2021-11-06');
/*!40000 ALTER TABLE `donation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(30) NOT NULL,
  `last_name` char(20) NOT NULL,
  `mobile_number` char(20) NOT NULL,
  `email_id` char(20) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'emp1','emp1LastName','383399','emp1@gmail','1234');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `foods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `category` char(20) NOT NULL,
  `quantity` char(20) NOT NULL,
  `expiry_date` date NOT NULL,
  `donation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IX_Relationship1` (`donation_id`),
  CONSTRAINT `Relationship1` FOREIGN KEY (`donation_id`) REFERENCES `donation` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES (1,'abcd','cat1','10','2021-11-26',1),(3,'efgh','cat2','0','2021-11-27',1),(4,'Apple','fruits','20','2021-11-27',1),(5,'Pineapple','fruits','10','2021-11-27',1);
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regular_user`
--

DROP TABLE IF EXISTS `regular_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regular_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(20) NOT NULL,
  `last_name` char(20) NOT NULL,
  `social_insurance_number` int(11) NOT NULL,
  `mobile_number` char(20) NOT NULL,
  `email_id` char(20) NOT NULL,
  `address` char(50) NOT NULL,
  `password` char(20) NOT NULL,
  `is_eligible` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regular_user`
--

LOCK TABLES `regular_user` WRITE;
/*!40000 ALTER TABLE `regular_user` DISABLE KEYS */;
INSERT INTO `regular_user` VALUES (2,'user1','qefg',1233,'1223994','user1@gmail','address1','1234',1),(3,'efgh','qefg',1233,'1223994','abc2@gmail','address1','1234',1);
/*!40000 ALTER TABLE `regular_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_request`
--

DROP TABLE IF EXISTS `user_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `user_email` char(20) NOT NULL,
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_fulfilled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IX_Relationship2` (`food_id`),
  KEY `IX_Relationship3` (`user_id`),
  CONSTRAINT `Relationship2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`id`),
  CONSTRAINT `Relationship3` FOREIGN KEY (`user_id`) REFERENCES `regular_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_request`
--

LOCK TABLES `user_request` WRITE;
/*!40000 ALTER TABLE `user_request` DISABLE KEYS */;
INSERT INTO `user_request` VALUES (1,5,'abcd@gmail',3,2,-1),(2,5,'abcd@gmail',5,2,1),(3,5,'abcd@gmail',5,2,-1),(4,5,'abc2@gmail',3,3,-1);
/*!40000 ALTER TABLE `user_request` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-15 12:17:53
