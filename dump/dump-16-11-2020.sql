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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'Milorad Pavic','Dictionary of the Khazars - Androgynous Edition','\"The first novel of the XXI century\" already transalated into 39 language here in its latest edition: \"The Antrogynous edition\". A international bestseller (more than 110 editions in the World), Dictionary of the Khazars was cited by The New York Times Book Review as one of the best books of the year. Written in two versions, male and female (both available in Vintage International), which are identical save for seventeen crucial lines, Dictionary is the imaginary book of knowledge of the Khazars, a people who flourished somewhere beyond Transylvania between the seventh and ninth centuries. Eschewing conventional narrative and plot, this lexicon novel combines the dictionaries of the worlds three major religions with entries that leap between past and future, featuring three unruly wise men, a book printed in poison ink, suicide by mirrors, a chimerical princess, a sect of priests who can infiltrate ones dreams, romances between the living and the dead, and much more. \"No chronology will be observed here, nor is one necessary. Hence each reader will put together the book for himself, as in a game of dominoes or cards, and, as with a mirror, he will get out of this dictionary as much as he puts into it, for you [...] cannot get more out of the truth than what you put into it.\" - Milorad Pavic “Dictionary of the Khazars” rivals Umberto Ecos “The Name of the Rose” in wit, invention and intellect and exceeds it in sheer whodunit intricacy”. Douglas Seibold, Chicago Tribune \"As with Borges, or Garcia Marquez… Pavić knows how to support his textual legerdemain with superb portrait miniatures and entrancing anecdotes\" - Michael Dirda, Washington Post Cet heritier serbe de Borges, Perec, Tolkien et Calvino invite même le lecteur a festoyer sans reserve, et a « lire comme il mange en se servant de son oeil droit comme d une fourchette et de son oeil gauche comme d un couteau,et en jetant les os par-dessus Iepaule » - Sabine Audrerie, La Croix','English',352,'51Eyc-vNo1L._SY346_.jpg'),(2,'Isaac Asimov','The Foundation Trilogy (Foundation (Publication Order) @ 1-3)','A THOUSAND-YEAR EPIC, A GALACTIC STRUGGLE, A MONUMENTAL WORK IN THE ANNALS OF SCIENCE FICTION\r\n\r\nFOUNDATION begins a new chapter in the story of mans future. As the Old Empire crumbles into barbarism throughout the million worlds of the galaxy, Hari Seldon and his band of psychologists must create a new entity, the Foundation-dedicated to art, science, and technology-as the beginning of a new empire.\r\n\r\nFOUNDATION AND EMPIRE describes the mighty struggle for power amid the chaos of the stars in which man stands at the threshold of a new enlightened life which could easily be destroyed by the old forces of barbarism.\r\n\r\nSECOND FOUNDATION follows the Seldon Plan after the First Empires defeat and describes its greatest threat-a dangerous mutant strain gone wild, which produces a mind capable of bending mens wills, directing their thoughts, reshaping their desires, and destroying the universe.','English',702,'511NKRGsLGL.jpg'),(3,'Isaac Asimov','I, Robot (The Robot Series)','This classic science fiction masterwork by Isaac Asimov weaves stories about robots, humanity, and the deep questions of existence into a novel of shocking intelligence and heart.\r\n\r\n“A must-read for science-fiction buffs and literature enjoyers alike.”—The Guardian\r\n\r\nI, Robot, the first and most widely read book in Asimovs Robot series, forever changed the worlds perception of artificial intelligence. Here are stories of robots gone mad, of mind-reading robots, and robots with a sense of humor. Of robot politicians, and robots who secretly run the world—all told with the dramatic blend of science fact and science fiction that has become Asimovs trademark.\r\n\r\nThe Three Laws of Robotics:\r\n1) A robot may not injure a human being or, through inaction, allow a human being to come to harm.\r\n2) A robot must obey orders given to it by human beings except where such orders would conflict with the First Law.\r\n3) A robot must protect its own existence as long as such protection does not conflict with the First or Second Law.\r\n\r\nWith these three, simple directives, Isaac Asimov formulated the laws governing robots behavior. In I, Robot, Asimov chronicles the development of the robot from its primitive origins in the present to its ultimate perfection in the not-so-distant future—a  future in which humanity itself may be rendered obsolete.\r\n\r\n“Tremendously exciting and entertaining . . . Asimov dramatizes an interesting question: How can we live with machines that, generation by generation, grow more intelligent than their creators and not eventually clash with our own invention?”—The Chicago Tribune','English',304,'41ED86iNFkL._SY346_.jpg'),(4,'Stephen Hawking','A Brief History Of Time: From Big Bang To Black Holes','Was there a beginning of time? Could time run backwards? Is the universe infinite or does it have boundaries?\r\n\r\nThese are just some of the questions considered in the internationally acclaimed masterpiece by the world renowned physicist - generally considered to have been one of the worlds greatest thinkers.\r\n\r\nIt begins by reviewing the great theories of the cosmos from Newton to Einstein, before delving into the secrets which still lie at the heart of space and time, from the Big Bang to black holes, via spiral galaxies and strong theory. To this day A Brief History of Time remains a staple of the scientific canon, and its succinct and clear language continues to introduce millions to the universe and its wonders.\r\n\r\nThis new edition includes recent updates from Stephen Hawking with his latest thoughts about the No Boundary Proposal and offers new information about dark energy, the information paradox, eternal inflation, the microwave background radiation observations, and the discovery of gravitational waves.\r\n\r\nIt was published in tandem with the app, Stephen Hawkings Pocket Universe.','English',231,'51P8miZZ6OL.jpg'),(5,'Lawrence Krauss','A Universe from Nothing: Why There Is Something Rather than Nothing','Bestselling author and acclaimed physicist Lawrence Krauss offers a paradigm-shifting view of how everything that exists came to be in the first place.\r\n\r\n“Where did the universe come from? What was there before it? What will the future bring? And finally, why is there something rather than nothing?”\r\n\r\nOne of the few prominent scientists today to have crossed the chasm between science and popular culture, Krauss describes the staggeringly beautiful experimental observations and mind-bending new theories that demonstrate not only can something arise from nothing, something will always arise from nothing. With a new preface about the significance of the discovery of the Higgs particle, A Universe from Nothing uses Krausss characteristic wry humor and wonderfully clear explanations to take us back to the beginning of the beginning, presenting the most recent evidence for how our universe evolved—and the implications for how its going to end.\r\n\r\nProvocative, challenging, and delightfully readable, this is a game-changing look at the most basic underpinning of existence and a powerful antidote to outmoded philosophical, religious, and scientific thinking.','English',226,'51eHhjPTXIL._SX327_BO1,204,203,200_.jpg');
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

-- Dump completed on 2020-11-16  0:53:37
