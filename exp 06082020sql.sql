#
# SQL Export
# Created by Querious (300050)
# Created: 6 August 2020 at 17:04:13 CEST
# Encoding: Unicode (UTF-8)
#


SET @ORIG_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;

SET @ORIG_UNIQUE_CHECKS = @@UNIQUE_CHECKS;
SET UNIQUE_CHECKS = 0;

SET @ORIG_TIME_ZONE = @@TIME_ZONE;
SET TIME_ZONE = '+00:00';

SET @ORIG_SQL_MODE = @@SQL_MODE;
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';



DROP TABLE IF EXISTS `users_session`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `status`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `prijava`;
DROP TABLE IF EXISTS `kategorija`;
DROP TABLE IF EXISTS `grad`;
DROP TABLE IF EXISTS `fajlovi`;


CREATE TABLE `fajlovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_prijave` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;


CREATE TABLE `grad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv_gr` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


CREATE TABLE `kategorija` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  `opis` text NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;


CREATE TABLE `prijava` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategorija` int(11) NOT NULL,
  `grad` int(11) NOT NULL,
  `primjedba` text NOT NULL,
  `attachment` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `ime` varchar(100) DEFAULT NULL,
  `datum_i` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `isActive` int(11) NOT NULL DEFAULT '1',
  `datum_u` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;


CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;


CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;


CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateCreated` datetime NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `salt` varchar(250) NOT NULL,
  `roleId` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `IsActive` int(1) DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;


CREATE TABLE `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `hash` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_session_ibfk_1` (`user_id`),
  CONSTRAINT `users_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




LOCK TABLES `fajlovi` WRITE;
INSERT INTO `fajlovi` (`id`, `id_prijave`, `file_name`, `file_path`) VALUES 
	(1,58,'image_4.jpg','1596446648926image-4.jpg'),
	(2,58,'image_5.jpg','1596446648927image-5.jpg'),
	(3,59,'image_1.jpg','1596446744812image-1.jpg'),
	(4,59,'image_2.jpg','1596446744812image-2.jpg'),
	(5,60,'image_1.jpg','1596446744812image-1.jpg'),
	(6,60,'image_2.jpg','1596446744812image-2.jpg'),
	(7,58,'image_1.jpg','1596446648927image-5.jpg'),
	(8,58,'1596446648927image-5.jpg','1596446648927image-5.jpg');
UNLOCK TABLES;


LOCK TABLES `grad` WRITE;
INSERT INTO `grad` (`id`, `naziv_gr`, `status`) VALUES 
	(1,'Podgorica','1'),
	(2,'Budva','1'),
	(3,'Nikšić','1'),
	(4,'Bar','1'),
	(5,'Danilovgrad','1');
UNLOCK TABLES;


LOCK TABLES `kategorija` WRITE;
INSERT INTO `kategorija` (`id`, `naziv`, `opis`, `isActive`) VALUES 
	(1,'Zapošljavanje u toku izborne kampanje','U državnim organima, organima državne uprave, organima lokalne samouprave, organima lokalne uprave, javnim ustanovama i državnim fondovima, u periodu od dana raspisivanja do dana održavanja izbora, mogu se izuzetno zaposliti lica na određeno vrijeme, odnosno zaključiti ugovor za obavljanje privremenih i povremenih poslova, radi obezbjeđivanja neometanog i redovnog odvijanja i funkcionisanja procesa rada tih organa, na osnovu odluke nadležnog organa ovih subjekata, samo ako je to predviđeno aktom o sistematizaciji radnih mjesta. čl.44/1',1),
	(2,'Zloupotreba socijalnih davanja','Budžetskim potrošačkim jedinicama, zabranjena je isplata, odnosno davanje jednokratne novčane pomoći, u skladu sa zakonom kojim se uređuju prava i obavljanje djelatnosti socijalne i dječije zaštite, osim u slučaju smrti člana porodice, teškog oboljenja koje prouzrokuje trajni invaliditet u procentu većem od 50% ili štete na stambenom objektu ili imovini usljed požara ili prirodne nepogode. čl.40/1',1),
	(3,'Otpis dugova za struju, vodu, komunalije','Pravnim licima čiji je osnivač, djelimični ili većinski vlasnik država ili jedinica lokalne samouprave da, u periodu od dana raspisivanja do dana održavanja izbora, kao i mjesec dana nakon izbora, vrše otpis dugova građanima, uključujući račune za utrošenu električnu energiju, vodu, kao i račune za sve vrste javnih usluga. čl.42/1',1),
	(4,'Korišćenje javnih prostorija za aktivnosti u kampanji','Zabranjeno je korišćenje prostorija državnih organa, organa državne uprave, organa lokalne samouprave i organa lokalne uprave, JU, državnih fondova i privrednih društava čiji je osnivač i/ili većinski ili djelimični vlasnik država ili jedinica lokalne samouprave za pripremu i realizaciju aktivnosti kampanje, ukoliko se isti uslovi ne obezbijede svim učesnicima u izbornom procesu. čl.36/1',1),
	(5,'Korišćenje službenih vozila u izbornoj kampanji','Javnim funkcionerima zabranjeno je korišćenje službenih automobila u periodu izborne kampanje, osim u slučajevima službene potrebe čl.43/1',1),
	(6,'Vršenje pritiska na pravna lica, privredna društva i fizička lica','Zabranjeno je političkim subjektima, pravnim i fizičkim licima vršenje pritiska na pravna lica, privredna društva i fizička lica prilikom prikupljanja priloga ili bilo koje druge aktivnosti vezane za izbornu kampanju i finansiranje političkih subjekata. Član 35/1',1),
	(7,'Nedozvoljeno finansiranje kampanje','Zabranjeno je obećavati ili stavljati u izgled političku ili bilo kakvu drugu protivuslugu, privilegiju ili ličnu korist fizičkom ili pravnom licu radi pribavljanja finansijske, materijalne ili nenovčane podrške političkom subjektu.čl.34/1 \r\nZabranjeno je davanje ili primanje priloga u novcu ili obliku proizvoda ili usluga preko trećih lica čl.34/2 \r\nZabranjeno je prikrivanje privatnih izvora finansiranja i iznosa skupljenih iz privatnih izvora finansiranja. čl.34/3 18 \r\nZabranjeno je političkim subjektima, pravnim i fizičkim licima vršenje pritiska na pravna lica, privredna društva i fizička lica prilikom prikupljanja priloga ili bilo koje druge aktivnosti vezane za izbornu kampanju i finansiranje političkih subjekata. čl.35/1\r\n',1),
	(8,'Distribucija propagandnog materijala u državnoj upravi','Zabranjena je distribucija propagandnog materijala i prikupljanje potpisa podrške za predaju izborne liste p.s. i predaju kandidature kandidata za izbor Predsjednika CG u državnim organima, organima državne uprave, organima lokalne samouprave, organima lokalne uprave, JU, državnim fondovima i privrednim društvima čiji je osnivač ili većinski ili djelimični vlasnik država ili jedinica lokalne samouprave. čl.36/2 ',1),
	(9,'Korišćenje javne mehanizacije bez naknade','U periodu od šest mjeseci prije roka predviđenog za održavanje izbora, zabranjuje se privrednim društvima čiji je osnivač ili većinski vlasnik država ili jedinica lokalne samouprave, da svoju mehanizaciju i opremu ustupaju trećim licima na upotrebu bez posebne odluke i bez ugovora sa naknadom, izuzev u slučajevima sanacije štete nastale usljed elementamih nepogoda, požara ili sprječavanja širenja epidemije zaraznih bolesti  čl.39/1',1);
UNLOCK TABLES;


LOCK TABLES `prijava` WRITE;
INSERT INTO `prijava` (`id`, `kategorija`, `grad`, `primjedba`, `attachment`, `email`, `ime`, `datum_i`, `status`, `isActive`, `datum_u`) VALUES 
	(1,1,2,'','','dejozcg@gmail.com','Vuko',NULL,1,1,NULL),
	(2,1,2,'adasd','','dejozcg@gmail.com','Dejan',NULL,1,1,NULL),
	(3,2,2,'sadas','','dejozcg@gmail.com','Dejan',NULL,1,1,NULL),
	(4,9,2,'dasdas','','admin@example.com','Vuko',NULL,1,1,NULL),
	(5,7,2,'dasdas','','admin@example.com','Vuko','2020-07-28 17:23:13',1,1,NULL),
	(6,3,2,'dasdas','','dejozcg@gmail.com','Dejan','2020-07-28 17:23:13',1,1,NULL),
	(7,2,1,'dasas','','','','2020-07-28 17:23:13',1,1,NULL),
	(8,1,1,'asd','','','Vuko','2020-07-28 17:23:13',1,1,NULL),
	(9,1,1,'asdas','','','Vuko','2020-07-28 17:23:13',1,1,NULL),
	(10,1,1,'asdasd','','','Vuko','2020-07-28 17:23:13',1,1,NULL),
	(11,1,1,'das','','','asd','2020-07-28 17:23:13',1,1,NULL),
	(12,3,1,'dsadasd','','','','2020-07-28 17:23:13',2,1,NULL),
	(13,1,1,'dsad','','','','2020-07-28 17:23:13',2,1,NULL),
	(14,1,1,'dsad','','','','2020-07-28 17:23:13',2,1,NULL),
	(15,1,1,'dsad','','','','2020-07-28 17:23:13',2,1,NULL),
	(16,1,1,'asdas','','','','2020-07-28 17:23:13',2,1,NULL),
	(17,1,1,'asdas','','','','2020-07-28 17:23:13',2,1,NULL),
	(18,1,2,'asd','','','','2020-07-28 17:23:13',2,1,NULL),
	(19,1,2,'das','','','','2020-07-28 17:23:13',1,1,NULL),
	(20,3,2,'asdasd','','','asf','2020-07-28 17:23:13',1,1,NULL),
	(21,1,2,'fghfgh','','','das','2020-07-28 17:23:13',1,1,NULL),
	(22,1,2,'das','','','Vuko','2020-07-28 17:23:13',1,1,NULL),
	(23,1,2,'das','','','','2020-07-28 17:23:13',1,1,NULL),
	(24,1,2,'adsdas','','','','2020-07-28 17:23:13',3,1,NULL),
	(25,1,2,'dsadas','','','','2020-07-28 17:23:13',5,1,NULL),
	(26,3,2,'asdads','','','','2020-07-28 17:23:13',5,1,NULL),
	(28,1,2,'sadasd','','','','2020-07-28 17:23:13',5,1,NULL),
	(29,1,3,'asdas','','','','2020-07-28 17:23:13',5,1,NULL),
	(30,1,3,'dasd','','','','2020-07-28 17:23:13',3,1,NULL),
	(31,1,3,'das','','','','2020-07-28 17:23:13',3,1,NULL),
	(32,1,3,'asdasd','','','','2020-07-28 17:23:13',3,1,NULL),
	(33,1,3,'dasdas','','','','2020-07-28 17:23:13',3,1,NULL),
	(34,1,3,'saddsa','','','','2020-07-28 17:23:13',3,1,NULL),
	(35,1,3,'asdas','1594969476833271.JPG','','','2020-07-28 17:23:13',3,1,NULL),
	(36,1,3,'dasd','1594969411586082.JPG','','','2020-07-28 17:23:13',3,1,NULL),
	(37,1,3,'dsa','Budva.pdf','','','2020-07-28 17:23:13',3,1,NULL),
	(38,1,4,'asdas','Andrijevica.pdf','','','2020-07-28 17:23:13',1,1,NULL),
	(39,1,4,'asdas','Andrijevica.pdf','','','2020-07-28 17:23:13',1,1,NULL),
	(40,1,4,'dsfsd','1594969476833271.JPG','','','2020-07-28 17:23:13',4,1,NULL),
	(41,1,4,'fyufh','1594969411586082.JPG','','','2020-07-28 17:23:13',4,1,NULL),
	(42,1,4,'sad','1594969516282431.JPG','','','2020-07-28 17:23:13',4,1,NULL),
	(43,1,4,'Snjs','A6EC4767-8B26-4671-8775-13BF50250FBC.jpeg','','','2020-07-28 17:23:13',4,1,NULL),
	(44,1,4,'Snjs','A6EC4767-8B26-4671-8775-13BF50250FBC.jpeg','','','2020-07-28 17:23:13',4,1,NULL),
	(45,1,4,'Shsh','image.jpg','','','2020-07-28 17:23:13',4,1,NULL),
	(46,1,4,'das','','','','2020-07-28 17:23:13',4,1,NULL),
	(47,2,4,'proba','','','','2020-07-29 08:27:25',4,1,NULL),
	(48,3,4,'dsadas','','','','2020-07-29 14:00:48',4,1,NULL),
	(49,3,1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.','','','','2020-07-31 11:11:52',1,1,NULL),
	(50,3,1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.','','','','2020-07-31 11:11:58',1,1,NULL),
	(51,3,1,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.','','','','2020-07-31 14:40:10',1,1,NULL),
	(52,1,1,'nova','','dejozcg@gmail.com','Dejan','2020-07-31 17:55:02',1,1,NULL),
	(53,1,1,'nova','','dejozcg@gmail.com','Dejan','2020-07-31 17:55:05',1,1,NULL),
	(54,3,2,'nova prava',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:11:12',1,1,NULL),
	(55,3,2,'nova prava',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:11:12',1,1,NULL),
	(56,1,1,'nova prava',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:12:19',1,1,NULL),
	(57,1,1,'nova prava',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:12:19',1,1,NULL),
	(58,2,4,'45',NULL,'admin@example.com','dasdas','2020-08-03 11:25:11',2,1,NULL),
	(59,3,1,'312312',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:25:44',1,1,NULL),
	(60,3,1,'312312',NULL,'dejozcg@gmail.com','Dejan','2020-08-03 11:25:44',1,1,NULL),
	(61,1,1,'sass',NULL,'','','2020-08-04 13:03:26',1,1,NULL),
	(62,1,1,'fvvv',NULL,'','','2020-08-04 13:03:54',1,1,NULL),
	(63,0,1,'',NULL,'','','2020-08-04 13:24:01',1,1,NULL),
	(64,8,4,'od sad',NULL,'','','2020-08-04 14:52:31',5,1,NULL),
	(65,4,2,'jhkh',NULL,'','','2020-08-06 16:38:38',1,1,NULL),
	(66,9,2,'dsadasdas',NULL,'','','2020-08-06 16:40:18',1,1,NULL),
	(67,8,5,'t',NULL,'','','2020-08-06 16:40:45',1,1,NULL);
UNLOCK TABLES;


LOCK TABLES `roles` WRITE;
INSERT INTO `roles` (`id`, `name`) VALUES 
	(1,'Admin'),
	(2,'Editor');
UNLOCK TABLES;


LOCK TABLES `status` WRITE;
INSERT INTO `status` (`id`, `naziv`) VALUES 
	(1,'Podnešena'),
	(2,'U proceduri'),
	(3,'Odbačena'),
	(4,'Riješeno'),
	(5,'Obrisan');
UNLOCK TABLES;


LOCK TABLES `users` WRITE;
INSERT INTO `users` (`id`, `name`, `email`, `dateCreated`, `username`, `password`, `salt`, `roleId`, `createdBy`, `IsActive`, `last_login`) VALUES 
	(22,'dejan','dejozcg@yahoo.com','2020-07-30 12:12:27','dejo','34680f28d7f6c44f73bb597967d7696d9ec65665f23781b86b32a4339db99225','d0b8bc3f5139c9de8bacfcce34d091d3',1,22,1,'2020-08-06 01:20:02'),
	(23,'novo ime','dejozcg@gmail.com','2020-07-30 12:12:27','novi','607707ad1d1ddc7688483a581172a4dea6212873155819fa5d7c18ac3e49d86c','13ab9542deba831816f4068e859b609a',2,1,1,NULL),
	(24,'novo ime','dejozcg@yahoo.com','2020-07-30 12:12:27','dsad','97717c8f152373f68a2fe7a64161173b1b1561e7db07cc880d27ece72610927c','eb80075466d568f083b06a10a6bee9e0',1,1,1,NULL),
	(25,'cvdfvdvds','dejozcg@yahoo.com','2020-07-30 12:12:27','dsadd','ace59c12866915320de24f5e668741b95d7bdd2689494ce091b01270d5d1fd0a','e5e967a370565f68250cf537fec61f3e',1,1,1,NULL),
	(26,'customer','customer@demo.com','2020-07-30 12:12:27','dejo1','904217d8b7cf141fd1e8bdbf5766466c5ead61e64125d9e77fc6ae6831059872','f8392da752441e62a4c33208e7ba7b5e',2,1,1,NULL),
	(27,'cvdfvdvds','dejozcg@yahoo.com','2020-07-30 12:12:27','dsad','dasda','ads',1,1,1,NULL),
	(28,'cvdfvdvds','dejozcg@yahoo.com','2020-07-30 12:12:27','dsad','dasda','ads',1,1,1,NULL),
	(29,'cvdfvdvds','dejozcg@yahoo.com','2020-07-30 12:12:27','dsad','dasda','ads',1,1,1,NULL),
	(30,'cvdfvdvds','dejozcg@yahoo.com','2020-07-30 12:12:27','dsad','dasda','ads',1,1,1,NULL),
	(31,'aaaa','admin@example.com','2020-07-30 12:12:27','aaaa','b75f378926c69375d9d163381282346715fc11a396dd1b1e28531bdb437c5bbd','cd685a0dda055c201af1cd3a00e05b13',1,1,1,NULL),
	(32,'dejan','dejozcg@gmail.com1','2020-08-05 01:07:49','dejo11','c797fd1a8ca4957a6bb26310411f93c7f96bb9e1d48e3c1372a4f767f2ecc739','d01da87a76c9a6f03275cc4d48101ca4',1,1,1,NULL),
	(33,'novo ime','admin1@example.com','2020-08-05 01:11:22','novi1','96c7274617242804347ef2d0bffad11bdb5325b0d5510afa0b4181f44ed66b5a','1e322c7dd1fac0b4d2059b61c2f8b8eb',1,1,1,NULL);
UNLOCK TABLES;


LOCK TABLES `users_session` WRITE;
UNLOCK TABLES;






SET FOREIGN_KEY_CHECKS = @ORIG_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS = @ORIG_UNIQUE_CHECKS;

SET @ORIG_TIME_ZONE = @@TIME_ZONE;
SET TIME_ZONE = @ORIG_TIME_ZONE;

SET SQL_MODE = @ORIG_SQL_MODE;



# Export Finished: 6 August 2020 at 17:04:13 CEST

