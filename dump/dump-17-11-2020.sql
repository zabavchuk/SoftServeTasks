-- MySQL dump 10.13  Distrib 5.7.23, for Win32 (AMD64)
--
-- Host: localhost    Database: softserve_test
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `lang` varchar(50) NOT NULL,
  `pages` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Milorad Pavic','Dictionary of the Khazars - Androgynous Edition','\"The first novel of the XXI century\" already transalated into 39 language here in its latest edition: \"The Antrogynous edition\". A international bestseller (more than 110 editions in the World), Dictionary of the Khazars was cited by The New York Times Book Review as one of the best books of the year.','English',352,'51Eyc-vNo1L._SY346_.jpg'),(2,'Isaac Asimov','The Foundation Trilogy (Foundation (Publication Order) @ 1-3)','A THOUSAND-YEAR EPIC, A GALACTIC STRUGGLE, A MONUMENTAL WORK IN THE ANNALS OF SCIENCE FICTION\r\n\r\nFOUNDATION begins a new chapter in the story of mans future.','English',702,'511NKRGsLGL.jpg'),(3,'Isaac Asimov','I, Robot (The Robot Series)','This classic science fiction masterwork by Isaac Asimov weaves stories about robots, humanity, and the deep questions of existence into a novel of shocking intelligence and heart.\r\n\r\n\"A must-read for science-fiction buffs and literature enjoyers alike.\" - The Guardian','English',304,'41ED86iNFkL._SY346_.jpg'),(4,'Stephen Hawking','A Brief History Of Time: From Big Bang To Black Holes','Was there a beginning of time? Could time run backwards? Is the universe infinite or does it have boundaries?\r\n\r\nThese are just some of the questions considered in the internationally acclaimed masterpiece by the world renowned physicist - generally considered to have been one of the worlds greatest thinkers.','English',231,'51P8miZZ6OL.jpg'),(5,'Lawrence Krauss','A Universe from Nothing: Why There Is Something Rather than Nothing','Bestselling author and acclaimed physicist Lawrence Krauss offers a paradigm-shifting view of how everything that exists came to be in the first place.\r\n\r\n\"Where did the universe come from? What was there before it? What will the future bring? And finally, why is there something rather than nothing?\"','English',226,'51eHhjPTXIL._SX327_BO1,204,203,200_.jpg');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-17 22:15:27
