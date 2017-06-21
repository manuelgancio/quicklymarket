-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: qmarquet
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB

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
-- Table structure for table `articulo`
--

DROP TABLE IF EXISTS `articulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulo` (
  `id_a` int(11) NOT NULL AUTO_INCREMENT,
  `nom_a` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_a`),
  KEY `id_cat` (`id_cat`),
  CONSTRAINT `articulo_ibfk_1` FOREIGN KEY (`id_cat`) REFERENCES `categoria` (`id_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulo`
--

LOCK TABLES `articulo` WRITE;
/*!40000 ALTER TABLE `articulo` DISABLE KEYS */;
INSERT INTO `articulo` VALUES (1,'Lampara Clara 60w',60,'nuevo',120,' ',1,NULL,NULL),(2,'Adpador Modular Universal',109,'nuevo',28,' ',1,NULL,NULL),(3,'Rueda p/Mueble 1 1/12\" ',34,'nuevo',20,' ',1,NULL,NULL),(4,'Martillo Bola 225gr',119,'nuevo',10,' ',1,NULL,NULL),(5,'Silla Escritorio',2590,'nuevo',10,' ',2,NULL,NULL),(6,'Armario 2 puertas',3590,'nuevo',15,' ',2,NULL,NULL),(7,'Puff/Baul',1000,'usado',1,' ',2,NULL,NULL),(8,'Juego comedor + 6 sillas',5000,'usado',1,' ',2,NULL,NULL),(9,'Boina de pana p/hombre',229,'nuevo',15,' ',3,NULL,NULL),(10,'Bikini Dama Algodon',179,'nuevo',20,' ',3,NULL,NULL),(11,'Campera Hombre XL',1000,'usado',1,' ',3,NULL,NULL),(12,'Camiseta Microfibra Dama',299,'nuevo',20,' ',3,NULL,NULL),(13,'Camara Kodak 13MP',200,'nuevo',15,' ',4,NULL,NULL),(14,'Tripode chico',150,'usado',1,' ',4,NULL,NULL),(15,'Estuche para camara',150,'nuevo',22,' ',4,NULL,NULL),(16,'Lente Olimpikus',300,'nuevo',9,' ',4,NULL,NULL),(17,'Multiprocesadora Philips',2000,'nuevo',9,' ',5,NULL,NULL),(18,'Plancha UFESA',1700,'nuevo',14,' ',5,NULL,NULL),(19,'Horno Microondas',3000,'usado',1,' ',5,NULL,NULL),(20,'Batidora Industrial ACME',7000,'nuevo',19,' ',5,NULL,NULL);
/*!40000 ALTER TABLE `articulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacion_tipo`
--

DROP TABLE IF EXISTS `calificacion_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacion_tipo` (
  `id_cl` int(11) NOT NULL DEFAULT '0',
  `tipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cl`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacion_tipo`
--

LOCK TABLES `calificacion_tipo` WRITE;
/*!40000 ALTER TABLE `calificacion_tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `calificacion_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cambia`
--

DROP TABLE IF EXISTS `cambia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cambia` (
  `id_cam` int(11) NOT NULL DEFAULT '0',
  `id_est` int(11) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cam`),
  KEY `id_u` (`id_u`),
  KEY `id_est` (`id_est`),
  CONSTRAINT `cambia_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `usuario` (`id_u`),
  CONSTRAINT `cambia_ibfk_2` FOREIGN KEY (`id_est`) REFERENCES `estado` (`id_est`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cambia`
--

LOCK TABLES `cambia` WRITE;
/*!40000 ALTER TABLE `cambia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cambia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_cat` int(11) NOT NULL DEFAULT '0',
  `nomb_cat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Ferreteria'),(2,'Muebles'),(3,'Textil'),(4,'Fotografia'),(5,'Electrodomesticos');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_e` int(11) NOT NULL DEFAULT '0',
  `cargo` varchar(30) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `pass_emp` varchar(255) NOT NULL,
  `id_p` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_e`),
  KEY `id_p` (`id_p`),
  CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Admin.S.','chuck@qm.com','******',1),(2,'Moderador','kersey@qm.com','******',2),(3,'Moderador','q-gon@qm.com','******',3);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_est` int(11) NOT NULL DEFAULT '0',
  `fecha_est` date DEFAULT NULL,
  `e_act` bit(1) DEFAULT NULL,
  `e_ant` bit(1) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_est`),
  KEY `id_u` (`id_u`),
  CONSTRAINT `estado_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `usuario` (`id_u`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genera`
--

DROP TABLE IF EXISTS `genera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genera` (
  `id_comp` int(11) NOT NULL DEFAULT '0',
  `comentario` varchar(120) DEFAULT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_sel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_comp`),
  KEY `id_cl` (`id_cl`),
  KEY `id_sel` (`id_sel`),
  CONSTRAINT `genera_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `calificacion_tipo` (`id_cl`),
  CONSTRAINT `genera_ibfk_2` FOREIGN KEY (`id_sel`) REFERENCES `selecciona` (`id_sel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genera`
--

LOCK TABLES `genera` WRITE;
/*!40000 ALTER TABLE `genera` DISABLE KEYS */;
/*!40000 ALTER TABLE `genera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permuta`
--

DROP TABLE IF EXISTS `permuta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permuta` (
  `id_per` int(11) NOT NULL DEFAULT '0',
  `fecha_per` date DEFAULT NULL,
  `nro_arts1` int(11) DEFAULT NULL,
  `nro_arts2` int(11) DEFAULT NULL,
  `concreta` bit(1) DEFAULT NULL,
  `id_sel1` int(11) DEFAULT NULL,
  `id_sel2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_per`),
  KEY `id_sel1` (`id_sel1`),
  KEY `id_sel2` (`id_sel2`),
  CONSTRAINT `permuta_ibfk_1` FOREIGN KEY (`id_sel1`) REFERENCES `selecciona` (`id_sel`),
  CONSTRAINT `permuta_ibfk_2` FOREIGN KEY (`id_sel2`) REFERENCES `selecciona` (`id_sel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permuta`
--

LOCK TABLES `permuta` WRITE;
/*!40000 ALTER TABLE `permuta` DISABLE KEYS */;
/*!40000 ALTER TABLE `permuta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `id_p` int(11) NOT NULL DEFAULT '0',
  `p_nomb` varchar(50) DEFAULT NULL,
  `p_ap` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `apto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Chuck','Norris','099666666','Av. Alerta',1234,6),(2,'Charles','Bronson','098678543','Magnun',7878,0),(3,'Liam','Neeson','098098345','Coruscant',2727,0),(4,'Jean-Claude','Francois','094567432','Av.Hong Kong',5623,0),(5,'Steven','Seagal','03890408','Cno.Corrales',126,0),(6,'Burgues','Meredith','096888999','Av.Bvar.Artigas',780,10);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preg_resp`
--

DROP TABLE IF EXISTS `preg_resp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preg_resp` (
  `id_pr` int(11) NOT NULL DEFAULT '0',
  `id_preg` int(11) DEFAULT NULL,
  `id_resp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pr`),
  KEY `id_preg` (`id_preg`),
  KEY `id_resp` (`id_resp`),
  CONSTRAINT `preg_resp_ibfk_1` FOREIGN KEY (`id_preg`) REFERENCES `pregunta` (`id_preg`),
  CONSTRAINT `preg_resp_ibfk_2` FOREIGN KEY (`id_resp`) REFERENCES `respuesta` (`id_resp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preg_resp`
--

LOCK TABLES `preg_resp` WRITE;
/*!40000 ALTER TABLE `preg_resp` DISABLE KEYS */;
INSERT INTO `preg_resp` VALUES (1,1,1);
/*!40000 ALTER TABLE `preg_resp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `id_preg` int(11) NOT NULL DEFAULT '0',
  `fecha_p` date DEFAULT NULL,
  `pregunta` varchar(120) DEFAULT NULL,
  `id_pub` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_preg`),
  KEY `id_pub` (`id_pub`),
  CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`id_pub`) REFERENCES `publica` (`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
INSERT INTO `pregunta` VALUES (1,'2017-05-30','Tenes en color coral?',4);
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publica`
--

DROP TABLE IF EXISTS `publica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publica` (
  `id_pub` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_in` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo` bit(1) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  `id_a` int(11) DEFAULT NULL,
  `e_pub` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_pub`),
  KEY `id_u` (`id_u`),
  KEY `id_a` (`id_a`),
  CONSTRAINT `publica_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `usuario` (`id_u`),
  CONSTRAINT `publica_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `articulo` (`id_a`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publica`
--

LOCK TABLES `publica` WRITE;
/*!40000 ALTER TABLE `publica` DISABLE KEYS */;
INSERT INTO `publica` VALUES (1,'2017-05-30','2017-07-30','\0',1,18,NULL),(2,'2017-05-30','2017-06-30','',1,16,NULL),(3,'2017-05-30','2017-06-30','',1,1,NULL),(4,'2017-05-30','2017-06-30','',3,9,NULL);
/*!40000 ALTER TABLE `publica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registro`
--

DROP TABLE IF EXISTS `registro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registro` (
  `id_r` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha_r` date DEFAULT NULL,
  `accion` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_r`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registro`
--

LOCK TABLES `registro` WRITE;
/*!40000 ALTER TABLE `registro` DISABLE KEYS */;
/*!40000 ALTER TABLE `registro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respuesta`
--

DROP TABLE IF EXISTS `respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `respuesta` (
  `id_resp` int(11) NOT NULL DEFAULT '0',
  `fecha_resp` date DEFAULT NULL,
  `respuesta` varchar(120) DEFAULT NULL,
  `id_pub` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_resp`),
  KEY `id_pub` (`id_pub`),
  CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`id_pub`) REFERENCES `publica` (`id_pub`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respuesta`
--

LOCK TABLES `respuesta` WRITE;
/*!40000 ALTER TABLE `respuesta` DISABLE KEYS */;
INSERT INTO `respuesta` VALUES (1,'2017-05-30','Que decis anormal, los corales son animales marinos',4);
/*!40000 ALTER TABLE `respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `selecciona`
--

DROP TABLE IF EXISTS `selecciona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `selecciona` (
  `id_sel` int(11) NOT NULL DEFAULT '0',
  `fecha_comp` date DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL,
  `id_a` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_sel`),
  KEY `id_u` (`id_u`),
  KEY `id_a` (`id_a`),
  CONSTRAINT `selecciona_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `usuario` (`id_u`),
  CONSTRAINT `selecciona_ibfk_2` FOREIGN KEY (`id_a`) REFERENCES `articulo` (`id_a`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `selecciona`
--

LOCK TABLES `selecciona` WRITE;
/*!40000 ALTER TABLE `selecciona` DISABLE KEYS */;
/*!40000 ALTER TABLE `selecciona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_u` int(11) NOT NULL DEFAULT '0',
  `correo` varchar(50) DEFAULT NULL,
  `pass_u` varchar(255) NOT NULL,
  `tipo` char(1) DEFAULT NULL,
  `rep` int(11) DEFAULT NULL,
  `depto` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `fecha_ins` date DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `ntraj` int(11) DEFAULT NULL,
  `act_u` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id_u`),
  KEY `id_p` (`id_p`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_p`) REFERENCES `persona` (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'jcvd@123.com','******','s',0,'Montevideo','Montevideo','2017-05-27',4,NULL,NULL),(2,'sseagal@yahoo.com','******','p',0,'Montevideo','Montevideo','2017-06-08',5,NULL,NULL),(3,'mick@rocky.com','******','p',0,'Montevideo','Montevideo','2017-06-01',6,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-21  9:35:04
