# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.26)
# Database: prijave
# Generation Time: 2020-07-29 06:10:06 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table kategorija
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kategorija`;

CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kategorija` WRITE;
/*!40000 ALTER TABLE `kategorija` DISABLE KEYS */;

INSERT INTO `kategorija` (`id`, `naziv`, `opis`)
VALUES
	(1,'Zapošljavanje u toku izborne kampanje','U državnim organima, organima državne uprave, organima lokalne samouprave, organima lokalne uprave, javnim ustanovama i državnim fondovima, u periodu od dana raspisivanja do dana održavanja izbora, mogu se izuzetno zaposliti lica na određeno vrijeme, odnosno zaključiti ugovor za obavljanje privremenih i povremenih poslova, radi obezbjeđivanja neometanog i redovnog odvijanja i funkcionisanja procesa rada tih organa, na osnovu odluke nadležnog organa ovih subjekata, samo ako je to predviđeno aktom o sistematizaciji radnih mjesta. čl.44/1'),
	(2,'Zloupotreba socijalnih davanja','Budžetskim potrošačkim jedinicama, zabranjena je isplata, odnosno davanje jednokratne novčane pomoći, u skladu sa zakonom kojim se uređuju prava i obavljanje djelatnosti socijalne i dječije zaštite, osim u slučaju smrti člana porodice, teškog oboljenja koje prouzrokuje trajni invaliditet u procentu većem od 50% ili štete na stambenom objektu ili imovini usljed požara ili prirodne nepogode. čl.40/1'),
	(3,'Otpis dugova za struju, vodu, komunalije','Pravnim licima čiji je osnivač, djelimični ili većinski vlasnik država ili jedinica lokalne samouprave da, u periodu od dana raspisivanja do dana održavanja izbora, kao i mjesec dana nakon izbora, vrše otpis dugova građanima, uključujući račune za utrošenu električnu energiju, vodu, kao i račune za sve vrste javnih usluga. čl.42/1'),
	(4,'Korišćenje javnih prostorija za aktivnosti u kampanji','Zabranjeno je korišćenje prostorija državnih organa, organa državne uprave, organa lokalne samouprave i organa lokalne uprave, JU, državnih fondova i privrednih društava čiji je osnivač i/ili većinski ili djelimični vlasnik država ili jedinica lokalne samouprave za pripremu i realizaciju aktivnosti kampanje, ukoliko se isti uslovi ne obezbijede svim učesnicima u izbornom procesu. čl.36/1'),
	(5,'Korišćenje službenih vozila u izbornoj kampanji','Javnim funkcionerima zabranjeno je korišćenje službenih automobila u periodu izborne kampanje, osim u slučajevima službene potrebe čl.43/1'),
	(6,'Vršenje pritiska na pravna lica, privredna društva i fizička lica','Zabranjeno je političkim subjektima, pravnim i fizičkim licima vršenje pritiska na pravna lica, privredna društva i fizička lica prilikom prikupljanja priloga ili bilo koje druge aktivnosti vezane za izbornu kampanju i finansiranje političkih subjekata. Član 35/1'),
	(7,'Nedozvoljeno finansiranje kampanje','Zabranjeno je obećavati ili stavljati u izgled političku ili bilo kakvu drugu protivuslugu, privilegiju ili ličnu korist fizičkom ili pravnom licu radi pribavljanja finansijske, materijalne ili nenovčane podrške političkom subjektu.čl.34/1 \r\nZabranjeno je davanje ili primanje priloga u novcu ili obliku proizvoda ili usluga preko trećih lica čl.34/2 \r\nZabranjeno je prikrivanje privatnih izvora finansiranja i iznosa skupljenih iz privatnih izvora finansiranja. čl.34/3 18 \r\nZabranjeno je političkim subjektima, pravnim i fizičkim licima vršenje pritiska na pravna lica, privredna društva i fizička lica prilikom prikupljanja priloga ili bilo koje druge aktivnosti vezane za izbornu kampanju i finansiranje političkih subjekata. čl.35/1\r\n'),
	(8,'Distribucija propagandnog materijala u državnoj upravi','Zabranjena je distribucija propagandnog materijala i prikupljanje potpisa podrške za predaju izborne liste p.s. i predaju kandidature kandidata za izbor Predsjednika CG u državnim organima, organima državne uprave, organima lokalne samouprave, organima lokalne uprave, JU, državnim fondovima i privrednim društvima čiji je osnivač ili većinski ili djelimični vlasnik država ili jedinica lokalne samouprave. čl.36/2 '),
	(9,'Korišćenje javne mehanizacije bez naknade','U periodu od šest mjeseci prije roka predviđenog za održavanje izbora, zabranjuje se privrednim društvima čiji je osnivač ili većinski vlasnik država ili jedinica lokalne samouprave, da svoju mehanizaciju i opremu ustupaju trećim licima na upotrebu bez posebne odluke i bez ugovora sa naknadom, izuzev u slučajevima sanacije štete nastale usljed elementamih nepogoda, požara ili sprječavanja širenja epidemije zaraznih bolesti  čl.39/1');

/*!40000 ALTER TABLE `kategorija` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table prijava
# ------------------------------------------------------------

DROP TABLE IF EXISTS `prijava`;

CREATE TABLE `prijava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorija` int(11) NOT NULL,
  `grad` varchar(100) NOT NULL,
  `primjedba` text NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `datum_i` varchar(100) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `prijava` WRITE;
/*!40000 ALTER TABLE `prijava` DISABLE KEYS */;

INSERT INTO `prijava` (`id`, `kategorija`, `grad`, `primjedba`, `attachment`, `email`, `ime`, `datum_i`, `status`)
VALUES
	(1,1,'podgorica','','','dejozcg@gmail.com','Vuko',NULL,1),
	(2,1,'podgorica','adasd','','dejozcg@gmail.com','Dejan',NULL,1),
	(3,2,'budva','sadas','','dejozcg@gmail.com','Dejan',NULL,1),
	(4,9,'bar','dasdas','','admin@example.com','Vuko',NULL,1),
	(5,7,'bar','dasdas','','admin@example.com','Vuko','2020-07-28 17:23:13',1),
	(6,3,'budva','dasdas','','dejozcg@gmail.com','Dejan','2020-07-28 17:23:13',1),
	(7,2,'podgorica','dasas','','','','2020-07-28 17:23:13',1),
	(8,1,'podgorica','asd','','','Vuko','2020-07-28 17:23:13',1),
	(9,1,'podgorica','asdas','','','Vuko','2020-07-28 17:23:13',1),
	(10,1,'podgorica','asdasd','','','Vuko','2020-07-28 17:23:13',1),
	(11,1,'podgorica','das','','','asd','2020-07-28 17:23:13',1),
	(12,3,'budva','dsadasd','','','','2020-07-28 17:23:13',1),
	(13,1,'podgorica','dsad','','','','2020-07-28 17:23:13',1),
	(14,1,'podgorica','dsad','','','','2020-07-28 17:23:13',1),
	(15,1,'podgorica','dsad','','','','2020-07-28 17:23:13',1),
	(16,1,'podgorica','asdas','','','','2020-07-28 17:23:13',1),
	(17,1,'podgorica','asdas','','','','2020-07-28 17:23:13',1),
	(18,1,'podgorica','asd','','','','2020-07-28 17:23:13',1),
	(19,1,'podgorica','das','','','','2020-07-28 17:23:13',1),
	(20,3,'budva','asdasd','','','asf','2020-07-28 17:23:13',1),
	(21,1,'podgorica','fghfgh','','','das','2020-07-28 17:23:13',1),
	(22,1,'podgorica','das','','','Vuko','2020-07-28 17:23:13',1),
	(23,1,'podgorica','das','','','','2020-07-28 17:23:13',1),
	(24,1,'podgorica','adsdas','','','','2020-07-28 17:23:13',1),
	(25,1,'podgorica','dsadas','','','','2020-07-28 17:23:13',1),
	(26,3,'budva','asdads','','','','2020-07-28 17:23:13',1),
	(28,1,'podgorica','sadasd','','','','2020-07-28 17:23:13',1),
	(29,1,'podgorica','asdas','','','','2020-07-28 17:23:13',1),
	(30,1,'podgorica','dasd','','','','2020-07-28 17:23:13',1),
	(31,1,'podgorica','das','','','','2020-07-28 17:23:13',1),
	(32,1,'podgorica','asdasd','','','','2020-07-28 17:23:13',1),
	(33,1,'podgorica','dasdas','','','','2020-07-28 17:23:13',1),
	(34,1,'podgorica','saddsa','','','','2020-07-28 17:23:13',1),
	(35,1,'podgorica','asdas','1594969476833271.JPG','','','2020-07-28 17:23:13',1),
	(36,1,'podgorica','dasd','1594969411586082.JPG','','','2020-07-28 17:23:13',1),
	(37,1,'podgorica','dsa','Budva.pdf','','','2020-07-28 17:23:13',1),
	(38,1,'podgorica','asdas','Andrijevica.pdf','','','2020-07-28 17:23:13',1),
	(39,1,'podgorica','asdas','Andrijevica.pdf','','','2020-07-28 17:23:13',1),
	(40,1,'podgorica','dsfsd','1594969476833271.JPG','','','2020-07-28 17:23:13',1),
	(41,1,'podgorica','fyufh','1594969411586082.JPG','','','2020-07-28 17:23:13',1),
	(42,1,'podgorica','sad','1594969516282431.JPG','','','2020-07-28 17:23:13',1),
	(43,1,'podgorica','Snjs','A6EC4767-8B26-4671-8775-13BF50250FBC.jpeg','','','2020-07-28 17:23:13',1),
	(44,1,'podgorica','Snjs','A6EC4767-8B26-4671-8775-13BF50250FBC.jpeg','','','2020-07-28 17:23:13',1),
	(45,1,'podgorica','Shsh','image.jpg','','','2020-07-28 17:23:13',1),
	(46,1,'podgorica','das','','','','2020-07-28 17:23:13',1);

/*!40000 ALTER TABLE `prijava` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
