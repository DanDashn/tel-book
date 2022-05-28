CREATE DATABASE  IF NOT EXISTS `tel-book` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tel-book`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: tel-book
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'Москва'),(2,'Адлер'),(3,'Санкт-Петербург'),(4,'Самара'),(5,'Севастополь'),(6,'Палех'),(7,'Новосибирск'),(8,'Новый Свет'),(9,'Лоо'),(10,'Краснодар');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peoples`
--

DROP TABLE IF EXISTS `peoples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peoples` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `patronymic` varchar(45) DEFAULT NULL,
  `phone` varchar(18) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `id_city` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id_idx` (`id_city`),
  CONSTRAINT `city_id` FOREIGN KEY (`id_city`) REFERENCES `city` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peoples`
--

LOCK TABLES `peoples` WRITE;
/*!40000 ALTER TABLE `peoples` DISABLE KEYS */;
INSERT INTO `peoples` VALUES (52,'Антон','Чесноков','Тимофеевич','+7 (912) 685-46-32','anton1977@yandex.ru','Весенняя ул., д. 5 кв.171',1),(54,'Альбина','Нюхалова','Степановна','+7 (912) 180-71-72','albina14121964@gmail.com',' Весенняя ул., д. 12 кв.205',3),(55,'Семен','Краснопёров','Ираклиевич','+7 (911) 375-49-25','semen.krasnoperov@outlook.com','Ленина В.И.ул., д. 16 кв.10',4),(56,'Егор','Руднев','Аркадьевич','+7 (929) 571-26-52','egor1435@hotmail.com','Максима Горького ул., д. 17 кв.198',5),(57,'Венедикт','Ионов','Юрьевич','+7 (952) 610-59-22','venedikt13111984@ya.ru','Железнодорожная ул., д. 24 кв.127',6),(58,'Клара','Грызлова','Тимофеевна','+7 (993) 848-35-42','klara.gryzlova@hotmail.com','Пролетарская ул., д. 21 кв.49',7),(59,'Степан','Шигин','Нифонтович','+7 (922) 760-65-42','stepan1968@gmail.com','Белорусская ул., д. 6 кв.31',8),(61,'Юрий','Оськин','Игнатьевич','+7 (961) 536-70-19','yuriy1979@hotmail.com','Севернаяул., д. 4 кв.84',10),(62,'Евгения','Сияна','Ильиновна','+7 (972) 395-78-36','evgeniya25@yandex.ru','Березовая ул., д. 6 кв.152',9);
/*!40000 ALTER TABLE `peoples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin123','admin123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'tel-book'
--

--
-- Dumping routines for database 'tel-book'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-20  0:16:00
