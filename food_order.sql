-- MySQL dump 10.17  Distrib 10.3.16-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: food_order
-- ------------------------------------------------------
-- Server version	10.3.16-MariaDB

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(45) NOT NULL,
  `customer_mobile` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Adarsh raj','8789998079','cattyadarsh@gmail.com','Adarsh@123'),(2,'satyam','9304712071','satyam@gmail.com','Satyam@123');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `food_type` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL,
  `rest_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rest_id` (`rest_id`),
  CONSTRAINT `food_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'Momo','Momo stuffed with mix of Soft Juicy boneless Chicken, Onion &Coriander cooked in ... read more',80.00,'p6.png','veg','',4),(2,'Veg Manchurian','Soft vegetable dumplings quick fried and served in our special manchurian sauce.',200.00,'ftbg.jpg','veg','',4),(3,'Steam  Momo','Momo stuffed with mix of Soft Juicy boneless Chicken, Onion &Coriander cooked in ... read more',199.00,'p6.png','veg','',5),(4,'Panir Masala','Panir mashala with 2 roti +onion saled..',299.00,'p2.png','veg','',4),(5,'Chinese Platter','Noodles+Chilli Paneer+Veg Manchurian+Fried Rice',248.00,'p2.png','veg','',5),(6,'Panchratan Mix [1 kg]','Dal Burfi - 200g Meva Bati - 200g kaju Kesar - 200g Pinni Desi ghee- 200g Mewa ... read more',865.00,'mithai.jpg','veg','',5),(7,'Mix Shahi Ladoo 1 kg box','Boondi Shahi Ladoo [250 grams, 1 Piece]+Shahi Besan Ladoo [250 grams, 1 Piece]+Atta ... read more',710.00,'mithai.jpg','veg','',5),(8,'Milk Cake','Milk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk CakeMilk Cake',250.00,'milkcake.jpg','veg','',5);
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_details` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `food_id` int(15) DEFAULT NULL,
  `rest_id` int(15) DEFAULT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `food_qty` decimal(10,2) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_timing` time DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `customer_id` int(15) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rest_id` (`rest_id`),
  KEY `food_id` (`food_id`),
  CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`rest_id`) REFERENCES `restaurant` (`restaurant_id`),
  CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` VALUES (1,4,4,'Panir Masala','299.00',1.00,'352.82','2021-05-31','10:05:00','delivered',1,'Adarsh Raj','8789998079','cattyadarsh@gmail.com','Malout , Malout , Punjab , 152107'),(2,2,4,'Veg Manchurian','200.00',1.00,'236','2021-05-31','12:05:00','cancelled',1,'rajadarsh711@gmail.com','08789998079','cattyadarsh@gmail.com','LIG-J-172,bima kunj kolar road bhopal , Patna , Bihar , 462042'),(3,3,5,'Steam Chicken Momo','199.00',1.00,'234.82','2021-05-31','12:05:00','delivered',1,'rajadarsh711@gmail.com','+448789998079','cattyadarsh@gmail.com','73,West jay prakash nagar ,kadam gali near talab,Patna-1 , Patna , Bihar , 800001'),(14,4,4,'Panir Masala','299.00',1.00,'352.82','2021-05-30','14:05:00','delivered',2,'sheikhazharuddin12@gmail.com','9304712071','satyam@gmail.com','Malout , Malout , Punjab , 152107'),(15,1,4,'Momo','80.00',1.00,'94.4','2021-05-31','14:05:00','cancelled',2,'Adarsh raj','08789998079','satyam@gmail.com','LIG-J-172,bima kunj kolar road bhopal , Patna , Bihar , 462042'),(16,2,4,'Veg Manchurian','200.00',2.00,'472','2021-05-31','14:05:00','delivered',2,'Adarsh raj','+448789998079','satyam@gmail.com','73,West jay prakash nagar ,kadam gali near talab,Patna-1 , Patna , Bihar , 800001'),(17,1,4,'Momo','80.00',1.00,'94.4','2021-05-31','17:05:00','pending',2,'Adarsh raj','18789998079','satyam@gmail.com','73,West jay prakash nagar ,kadam gali near talab,Patna-1 , PATNA , Bihar , 800001'),(18,3,5,'Steam Chicken Momo','199.00',1.00,'234.82','2021-05-31','17:05:00','delivered',2,'satyam','+919576675761','satyam@gmail.com','West jay prakash nagar ,kadam gali near talab,Patn , Patna , Bihar , 800001'),(19,1,4,'Momo','80.00',1.00,'94.4','2021-05-31','17:05:00','pending',2,'Adarsh raj','18789998079','satyam@gmail.com','73,West jay prakash nagar ,kadam gali near talab,Patna-1 , PATNA , Bihar , 800001'),(20,2,4,'Veg Manchurian','200.00',3.00,'708','2021-05-31','17:05:00','delivered',2,'satyam','+919576675761','satyam@gmail.com','West jay prakash nagar ,kadam gali near talab,Patn , Patna , Bihar , 800001'),(21,5,5,'Chinese Platter','248.00',1.00,'292.64','2021-05-31','18:05:00','delivered',2,'satyam','+919576675761','satyam@gmail.com','West jay prakash nagar ,kadam gali near talab,Patn , Patna , Bihar , 800001'),(22,8,5,'Milk Cake','250.00',3.00,'885','2021-05-31','19:05:00','delivered',2,'Md Azhar','9304712071','satyam@gmail.com','Malout , Malout , Punjab , 152107'),(23,5,5,'Chinese Platter','248.00',1.00,'292.64','2021-05-31','19:05:00','cancelled',2,'satyam','18102633292','satyam@gmail.com','73,West jay prakash nagar ,kadam gali near talab,Patna-1 , PATNA , Bihar , 800001'),(24,2,4,'Veg Manchurian','200.00',1.00,'236','2021-05-31','20:05:00','confirmed',2,'Md Azhar','9304712071','satyam@gmail.com','Malout , Malout , Punjab , 152107'),(25,2,4,'Veg Manchurian','200.00',1.00,'236','2021-05-31','20:05:00','delivered',2,'Md Azhar','9304712071','satyam@gmail.com','Malout , Malout , Punjab , 152107'),(26,1,4,'Momo','80.00',1.00,'94.4','2021-06-01','08:06:00','pending',1,'Adarsh raj','08789998079','cattyadarsh@gmail.com','LIG-J-172,bima kunj kolar road bhopal , Patna , Bihar , 462042'),(27,8,5,'Milk Cake','250.00',3.00,'885','2021-06-01','08:06:00','delivered',1,'Adarsh raj','8789998079','cattyadarsh@gmail.com','west jay prakash nagar , patna , Bihar , 800001');
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurant`
--

DROP TABLE IF EXISTS `restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurant` (
  `restaurant_id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_name` varchar(45) NOT NULL,
  `restaurant_email` varchar(45) NOT NULL,
  `restaurant_password` varchar(45) NOT NULL,
  `restaurant_openTime` varchar(45) DEFAULT NULL,
  `restaurant_closeTime` varchar(45) DEFAULT NULL,
  `restaurant_desc` text DEFAULT NULL,
  `restaurant_place` varchar(45) DEFAULT NULL,
  `restaurant_type` varchar(45) NOT NULL,
  `restaurant_logo` varchar(45) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurant`
--

LOCK TABLES `restaurant` WRITE;
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` VALUES (1,'HastyTasty','admin@hastytasty.com','Hasty@123','11:00','20:00','A restaurant (French: [ÊÉ›stoÊÉ‘Ìƒ] (About ','Arwal','veg','p1.png'),(2,'Adarsh raj','admin@hastytasy.com','jjj',NULL,NULL,NULL,'h','nonveg','p3.png'),(3,'Biryani House','admin@biryanihouse.com','Biryani@123','11:00','23:35','					 https://www.geeksforgeeks.org/signup-form-using-php-and-mysql-database/					 								','Patna','mixed','p2.png'),(4,'Manmohak Sweets','admin@manmohaksweets.com','Manmohak@123','11:59','20:29','A restaurant (French: [??sto???] (About this soundlisten)), or an eatery, is a business that prepares and serves food and drinks to customers.[1] Meals are generally served and eaten on the premises, but many restaurants also offer take-out and food delivery services.','Patna','veg','p5.png'),(5,'Satyam Sweets','admin@satyamsweets.com','Satyam@123','11:00','23:00','					 					 At w3schools.com you will learn how to make a website. They offer free tutorials in all web development technologies.				 												','Patna','mixed','ftbg.jpg');
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'food_order'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-01 12:52:38
