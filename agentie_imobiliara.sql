# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-05-27 20:42:23
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "case_vile"
#

DROP TABLE IF EXISTS `case_vile`;
CREATE TABLE `case_vile` (
  `id_casa` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(255) DEFAULT NULL,
  `camere` int(2) unsigned NOT NULL DEFAULT '0',
  `pret_casa` bigint(20) unsigned NOT NULL DEFAULT '0',
  `localitate` varchar(60) NOT NULL DEFAULT '',
  `an_constructie` int(10) unsigned NOT NULL DEFAULT '0',
  `id_agent` int(11) unsigned NOT NULL DEFAULT '0',
  `suprafata` varchar(25) DEFAULT NULL,
  `garaj` varchar(10) DEFAULT 'nu',
  `piscina` varchar(10) DEFAULT 'nu',
  `info` varchar(500) DEFAULT NULL,
  `tip_contract` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_casa`),
  KEY `id_agent` (`id_agent`),
  CONSTRAINT `case_vile_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `useri` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "case_vile"
#

INSERT INTO `case_vile` VALUES (2,'CASA 3CAMERE ALBA-IULIA',3,100000,'Alba-Iulia',2012,1,'130mp utili / 130mp total','1','0','Casa ansamblu rezidential de vanzare in zona Centru - Alba Iulia, avand 3 camere, 2 dormitoare, suprafata totala construita 140 mp, si suprafata teren 300 mp.','De vanzare'),(3,'CASA 4 CAMERE SIBIU',4,81500,'Sibiu',2017,13,'345','1','0','Casa individuala de vanzare in zona Sibiu-Gara, avand 4 camere, 3 dormitoare, suprafata totala construita 115 mp, si suprafata teren 345 mp. Deschiderea este de 17 ml. Imobilul are amprenta 105 mp.','De vanzare'),(4,'CASA 4 CAMERE ALBA-IULIA',4,39550,'Alba-Iulia',2017,13,'160mp utili / 200mp total','0','0','Agentia va ofera casa de vanzare in Alba Iulia, cartierul Recea, in una din cele mai selecte zone rezidentiale. Casa este dispusa pe trei nivele, este construita recent Merita vazuta !','De vanzare');

#
# Structure for table "contact"
#

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id_mesaj` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(255) NOT NULL DEFAULT '',
  `prenume` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `mesaj` varchar(2000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_mesaj`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "contact"
#

INSERT INTO `contact` VALUES (8,'Maftei','Vasile','maftei.vasile@gmail.com','Buna ziua. Acum cateva luni am apelat la o agentie imobiliara pentru a cumpara un apartament.\r\nPretul era de 48000 euro, iar comisionul agentiei era de 1440 euro, dar am negociat verbal la 700 euro. M-am decis pana la urma pe apartamentul ala (cunoscand si proprietarul), dar i-am zis agentului ca nu mai sunt interesat. Dupa cateva zile am semnat contractul de vanzare cumparare, iar dupa 2 luni am primit plic de la mediator precum ca vor sa ne intelegem pe cale amiabila si sa le dau comisionul de 700 euro.'),(10,'Stanescu','Mihai','stan@gmail.com','Am achizitionat un apartament itermediat de agentie , reprezentat prin Claudiu Rus , pot sa spun ca totul a fost peste asteptari. Multumiri in special domnului pe care il recomandam cu incredere.');

#
# Structure for table "useri"
#

DROP TABLE IF EXISTS `useri`;
CREATE TABLE `useri` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL DEFAULT '',
  `prenume` varchar(50) NOT NULL DEFAULT '',
  `telefon` varchar(15) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `password` varchar(500) NOT NULL DEFAULT '',
  `admin` binary(2) DEFAULT '0\0',
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "useri"
#

INSERT INTO `useri` VALUES (1,'Copindean','Alin','0729592287','alin.copindean@gmail.com','parola',X'3100',NULL),(2,'Popescu','Ion','0722222833','ion@gmail.com','parola',X'3000',NULL),(10,'Curta','Ion','0722549933','curta.ion@yahoo.com','parola',X'3100','images/agent_1.jpg'),(13,'Danila','Claudiu','0741008687','claudiu.danila@gmail.com','parola',X'3100','images/claudiu_d.jpg'),(14,'Frunza','Tiberiu','0737523418','frunza.tiberiu@gmail.com','parola',X'3100','images/tiberiu_frunza.jpg');

#
# Structure for table "terenuri"
#

DROP TABLE IF EXISTS `terenuri`;
CREATE TABLE `terenuri` (
  `id_teren` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(255) DEFAULT NULL,
  `pret` bigint(20) unsigned NOT NULL DEFAULT '0',
  `localitate` varchar(60) NOT NULL DEFAULT '',
  `id_agent` int(11) unsigned NOT NULL DEFAULT '0',
  `suprafata` varchar(10) DEFAULT NULL,
  `tip_teren` varchar(25) NOT NULL DEFAULT '',
  `info` varchar(500) DEFAULT NULL,
  `tip_contract` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_teren`),
  KEY `id_agent` (`id_agent`),
  CONSTRAINT `terenuri_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `useri` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

#
# Data for table "terenuri"
#

INSERT INTO `terenuri` VALUES (25,'TEREN Alba-Iulia 1200MP',13500,'Alba-Iulia',1,'1200','Intravilan','Teren Intravilan Construibil de vanzare in Alba Iulia - Micesti, reper Cartierul Orizont, avand o suprafata de 1200 mp. Pretul este negociabil.','De vanzare'),(26,'TEREN CLUJ-NAPOCA 600MP',25000,'Cluj-Napoca',1,'600','Intravilan','Teren Intravilan de vanzare in Cluj Napoca, reper orizont 9, avand o suprafata de 600 mp si deschiderea de 31 ml la 1 strada. Pret usor negociabil','De vanzare');

#
# Structure for table "postari"
#

DROP TABLE IF EXISTS `postari`;
CREATE TABLE `postari` (
  `id_postare` int(11) NOT NULL AUTO_INCREMENT,
  `titlu_postare` varchar(255) NOT NULL DEFAULT '',
  `continut_postare` varchar(2500) DEFAULT NULL,
  `id_user` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_postare`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `postari_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `useri` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "postari"
#

INSERT INTO `postari` VALUES (4,'Comisionul FNGCIMM','<p><b>3. Comisionul cÄƒtre FNGCIMM</b>\r\n<p>Cel de-al doilea cost suplimentar este comisionul de 0,49% din valoarea garanÅ£iei datorat  Fondului de Garantare a Creditelor pentru ÃŽntreprinderile Mici ÅŸi Mijlocii (FNGCIMM). LuÃ¢nd Ã®n calcul tot un Ã®mprumut  de 57.000 de euro, acesta ar ajunge la aproape 140 de euro (comisionul se aplicÄƒ doar la suma efectiv garantatÄƒ de cÄƒtre stat). De notat este cÄƒ acest comision cÄƒtre FNGCIMM va trebui sÄƒ-l plÄƒteÅŸti Ã®n fiecare an pÃ¢nÄƒ la rambursarea creditului. Partea bunÄƒ este cÄƒ el scade gradual, odatÄƒ cu diminuarea soldului creditului.',1),(8,'Creditul Prima CasÄƒ','<p><b>DatoritÄƒ avansului sÄƒu redus, de doar 5% din valoarea imobilului achiziÈ›ionat, acest tip de credit rÄƒmÃ¢ne foarte popular printre romÃ¢ni.</b></p>\r\n<p>ÃŽn esenÈ›Äƒ, el poate fi accesat (Ã®n condiÈ›iile de eligibilitate prevÄƒzute de cÄƒtre bÄƒnci, desigur) de cÄƒtre oricine nu deÈ›ine Ã®n proprietate o locuinÈ›Äƒ proprie cu o suprafaÈ›Äƒ mai mare de 50 de metri pÄƒtraÈ›i utili. Suma maximÄƒ Ã®mprumutatÄƒ pentru un imobil finalizat este 57.000 de euro â€“ ceea ce Ã®nseamnÄƒ cÄƒ, luÃ¢nd Ã®n calcul avansul, acesta ar costa 60.000 de euro. Valoarea maximÄƒ a unui imobil nou, pe de altÄƒ parte, ajunge la 70.000 de euro (cu tot cu avans).',13);

#
# Structure for table "apartamente"
#

DROP TABLE IF EXISTS `apartamente`;
CREATE TABLE `apartamente` (
  `id_apartament` int(11) NOT NULL AUTO_INCREMENT,
  `titlu` varchar(255) DEFAULT NULL,
  `camere` int(10) unsigned NOT NULL DEFAULT '0',
  `pret` bigint(20) unsigned NOT NULL DEFAULT '0',
  `localitate` varchar(60) NOT NULL DEFAULT '',
  `an_constructie` int(10) unsigned NOT NULL DEFAULT '0',
  `id_agent` int(11) unsigned NOT NULL DEFAULT '0',
  `suprafata` varchar(15) DEFAULT NULL,
  `info` varchar(500) DEFAULT NULL,
  `Etaj` varchar(10) DEFAULT '-',
  `tip_contract` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_apartament`),
  KEY `id_agent` (`id_agent`),
  CONSTRAINT `apartamente_ibfk_1` FOREIGN KEY (`id_agent`) REFERENCES `useri` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "apartamente"
#

INSERT INTO `apartamente` VALUES (2,'APARTAMENT 2 CAMERE SIBIU',2,250,'Sibiu',2010,1,'50','Va propunem spre inchiriere un apartament cu 2 camere, situat in cartierul central, intr-un bloc construit in anul 2010, comfort 1, decomandat, etaj 3 din 5, avand suprafata de 50 mp, cu 1 baie, 1 balcon, 1 loc de parcare.','3/5','De inchiriere'),(3,'APARTAMENT 2 CAMERE ALBA-IULIA',2,52000,'Alba-Iulia',1990,1,'52','Va propunem spre vanzare un apartament cu 2 camere, situat in cartierul cetate , intr-un bloc construit in anul 1990, confort 1, decomandat, etaj 2 din 4, avand suprafata de 52 mp, cu 1 baie,bucatarie, loc de parcare.','2/4','De vanzare'),(4,'APARTAMENT 1 CAMERA CLUJ-NAPOCA',1,35000,'Cluj-Napoca',1980,10,'35','Va propunem spre vanzare un apartament situat in zona centrala ,  construit in anul 1980, comfort 1 sporit, decomandat, etaj 6 din 7, avand suprafata totala de 35 mp, cu 1 grup sanitar, 1 balcon, loc de parcare.','6/7','De vanzare'),(5,'APARTAMENT 3 CAMERE CLUJ-NAPOCA',3,380,'Cluj-Napoca',2015,10,'65','Va propunem spre inchiriere, un apartament cu 3 camere, situat in cartierul Orhideea , intr-un bloc construit in anul 2015, comfort lux, decomandat, etaj 2 din 3, avand suprafata de 65 mp, cu 1 baie, 1 balcon mare, 1 loc de parcare.','2/3','De inchiriere'),(8,'APARTAMENT 3 CAMERE SIBIU',3,68000,'Sibiu',2016,10,'67','Va propunem spre vanzare un apartament cu 3 camere, situat in cartierul MALL , intr-un bloc construit in anul 2016, confort lux, decomandat, etaj 1 din 4, avand suprafata utila de 67 mp, cu 1 baie, 1 balcon, loc de parcare.','1/4','De vanzare'),(9,'APARTAMENT 4 CAMERE ALBA-IULIA',4,60500,'Alba-Iulia',1987,13,'65','Va propunem spre vanzare un apartament cu 4 camere, situat in cartierul Cetate , intr-un bloc construit in anul 1987, comfort 2 sporit, semidecomandat, etaj 2 din 10, avand suprafata de 65 mp, cu 1 baie, loc de parcare.','2/10','De vanzare'),(10,'APARTAMENT 3 CAMERE CLUJ-NAPOCA',3,85400,'Cluj-Napoca',1980,14,'75mp utili / 75','Va propunem spre vanzare un apartament cu 3 camere, situat in zona Mercur, intr-un bloc construit in anul 1980, comfort 1, decomandat, etaj 4 din 4, avand suprafata utila de 75 mp, cu 1 grup sanitar, 1 balcon, loc de parcare.','4/4','De vanzare');

#
# Structure for table "imagini"
#

DROP TABLE IF EXISTS `imagini`;
CREATE TABLE `imagini` (
  `id_imagine` int(11) NOT NULL AUTO_INCREMENT,
  `locatie_imagine` varchar(255) DEFAULT NULL,
  `id_apartament` int(11) DEFAULT NULL,
  `id_casa` int(11) DEFAULT NULL,
  `id_teren` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_imagine`),
  KEY `id_apartament` (`id_apartament`),
  KEY `id_casa` (`id_casa`),
  KEY `id_teren` (`id_teren`),
  CONSTRAINT `imagini_ibfk_1` FOREIGN KEY (`id_apartament`) REFERENCES `apartamente` (`id_apartament`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `imagini_ibfk_2` FOREIGN KEY (`id_teren`) REFERENCES `terenuri` (`id_teren`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `imagini_ibfk_3` FOREIGN KEY (`id_casa`) REFERENCES `case_vile` (`id_casa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

#
# Data for table "imagini"
#

INSERT INTO `imagini` VALUES (24,'images/teren_1.jpeg',NULL,NULL,25),(25,'images/teren_2.jpeg',NULL,NULL,25),(26,'images/teren_3a.jpeg',NULL,NULL,26),(27,'images/teren_3b.jpeg',NULL,NULL,26),(28,'images/ap1A.jpeg',2,NULL,NULL),(29,'images/ap1b.jpeg',2,NULL,NULL),(30,'images/ap1c.jpeg',2,NULL,NULL),(31,'images/apvanz1a.jpeg',3,NULL,NULL),(32,'images/apvanz1b.jpeg',3,NULL,NULL),(33,'images/apvanz1c.jpeg',3,NULL,NULL),(34,'images/casa1a.jpeg',NULL,2,NULL),(35,'images/casa1b.jpeg',NULL,2,NULL),(36,'images/casa1c.jpeg',NULL,2,NULL),(37,'images/apart_x1.jpeg',4,NULL,NULL),(38,'images/apart_x2.jpeg',4,NULL,NULL),(39,'images/apart_x3.jpeg',4,NULL,NULL),(40,'images/apart_ok1.jpg',5,NULL,NULL),(41,'images/apart_ok2.jpg',5,NULL,NULL),(42,'images/apart_ok3.jpg',5,NULL,NULL),(49,'images/ap3-OK.jpg',8,NULL,NULL),(50,'images/ap3-OK2.jpg',8,NULL,NULL),(51,'images/ap3-OK3.jpg',8,NULL,NULL),(52,'images/casaok1.jpeg',NULL,3,NULL),(53,'images/casaok2.jpeg',NULL,3,NULL),(54,'images/casaok3.jpeg',NULL,3,NULL),(55,'images/AAA1.jpg',9,NULL,NULL),(56,'images/AAA2.jpg',9,NULL,NULL),(57,'images/AAA3.jpg',9,NULL,NULL),(58,'images/CCCC1.jpg',NULL,4,NULL),(59,'images/CCCC2.jpg',NULL,4,NULL),(60,'images/CCCC3.JPG',NULL,4,NULL),(61,'images/APP1.jpg',10,NULL,NULL),(62,'images/APP2.jpg',10,NULL,NULL),(63,'images/APP3.jpg',10,NULL,NULL);

#
# View "v_apartamente_inchiriere"
#

DROP VIEW IF EXISTS `v_apartamente_inchiriere`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_apartamente_inchiriere`
  AS
SELECT
  `a`.`id_apartament`,
  `a`.`titlu`,
  `a`.`camere`,
  `a`.`pret`,
  `a`.`localitate`,
  `a`.`an_constructie`,
  `a`.`suprafata`,
  `a`.`info`,
  `a`.`Etaj`,
  `a`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`apartamente` a
    JOIN `imagini` i ON ((`a`.`id_apartament` = `i`.`id_apartament`)))
WHERE
  (`a`.`tip_contract` = 'De inchiriere')
GROUP BY
  `a`.`id_apartament`;

#
# View "v_apartamente_lista_imagine"
#

DROP VIEW IF EXISTS `v_apartamente_lista_imagine`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_apartamente_lista_imagine`
  AS
SELECT
  `a`.`id_apartament`,
  `a`.`titlu`,
  `a`.`camere`,
  `a`.`pret`,
  `a`.`localitate`,
  `a`.`an_constructie`,
  `a`.`suprafata`,
  `a`.`info`,
  `a`.`Etaj`,
  `a`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`apartamente` a
    JOIN `imagini` i ON ((`a`.`id_apartament` = `i`.`id_apartament`)))
GROUP BY
  `a`.`id_apartament`;

#
# View "v_apartamente_vanzare"
#

DROP VIEW IF EXISTS `v_apartamente_vanzare`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_apartamente_vanzare`
  AS
SELECT
  `a`.`id_apartament`,
  `a`.`titlu`,
  `a`.`camere`,
  `a`.`pret`,
  `a`.`localitate`,
  `a`.`an_constructie`,
  `a`.`suprafata`,
  `a`.`info`,
  `a`.`Etaj`,
  `a`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`apartamente` a
    JOIN `imagini` i ON ((`a`.`id_apartament` = `i`.`id_apartament`)))
WHERE
  (`a`.`tip_contract` = 'De vanzare')
GROUP BY
  `a`.`id_apartament`;

#
# View "v_case_inchiriere"
#

DROP VIEW IF EXISTS `v_case_inchiriere`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_case_inchiriere`
  AS
SELECT
  `c`.`id_casa`,
  `c`.`titlu`,
  `c`.`camere`,
  `c`.`pret_casa`,
  `c`.`localitate`,
  `c`.`an_constructie`,
  `c`.`suprafata`,
  `c`.`garaj`,
  `c`.`piscina`,
  `c`.`info`,
  `c`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`case_vile` c
    JOIN `imagini` i ON ((`c`.`id_casa` = `i`.`id_casa`)))
WHERE
  (`c`.`tip_contract` = 'De inchiriere')
GROUP BY
  `c`.`id_casa`;

#
# View "v_case_lista_imagine"
#

DROP VIEW IF EXISTS `v_case_lista_imagine`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_case_lista_imagine`
  AS
SELECT
  `c`.`id_casa`,
  `c`.`titlu`,
  `c`.`camere`,
  `c`.`pret_casa`,
  `c`.`localitate`,
  `c`.`an_constructie`,
  `c`.`suprafata`,
  `c`.`garaj`,
  `c`.`piscina`,
  `c`.`info`,
  `c`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`case_vile` c
    JOIN `imagini` i ON ((`c`.`id_casa` = `i`.`id_casa`)))
GROUP BY
  `c`.`id_casa`;

#
# View "v_case_vanzare"
#

DROP VIEW IF EXISTS `v_case_vanzare`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_case_vanzare`
  AS
SELECT
  `c`.`id_casa`,
  `c`.`titlu`,
  `c`.`camere`,
  `c`.`pret_casa`,
  `c`.`localitate`,
  `c`.`an_constructie`,
  `c`.`suprafata`,
  `c`.`garaj`,
  `c`.`piscina`,
  `c`.`info`,
  `c`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`case_vile` c
    JOIN `imagini` i ON ((`c`.`id_casa` = `i`.`id_casa`)))
WHERE
  (`c`.`tip_contract` = 'De vanzare')
GROUP BY
  `c`.`id_casa`;

#
# View "v_terenuri_inchiriere"
#

DROP VIEW IF EXISTS `v_terenuri_inchiriere`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_inchiriere`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
WHERE
  (`t`.`tip_contract` = 'De inchiriere')
GROUP BY
  `t`.`id_teren`;

#
# View "v_terenuri_lista_imagine"
#

DROP VIEW IF EXISTS `v_terenuri_lista_imagine`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_lista_imagine`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
GROUP BY
  `t`.`id_teren`;

#
# View "v_terenuri_vanzare"
#

DROP VIEW IF EXISTS `v_terenuri_vanzare`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_vanzare`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
WHERE
  (`t`.`tip_contract` = 'De vanzare')
GROUP BY
  `t`.`id_teren`;

#
# View "v_terenuri_vanzare_alba"
#

DROP VIEW IF EXISTS `v_terenuri_vanzare_alba`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_vanzare_alba`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
WHERE
  ((`t`.`tip_contract` = 'De vanzare') AND (`t`.`localitate` = 'Alba-Iulia'))
GROUP BY
  `t`.`id_teren`;

#
# View "v_terenuri_vanzare_cluj"
#

DROP VIEW IF EXISTS `v_terenuri_vanzare_cluj`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_vanzare_cluj`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
WHERE
  ((`t`.`tip_contract` = 'De vanzare') AND (`t`.`localitate` = 'Cluj-Napoca'))
GROUP BY
  `t`.`id_teren`;

#
# View "v_terenuri_vanzare_sibiu"
#

DROP VIEW IF EXISTS `v_terenuri_vanzare_sibiu`;
CREATE
  ALGORITHM = UNDEFINED
  VIEW `v_terenuri_vanzare_sibiu`
  AS
SELECT
  `t`.`id_teren`,
  `t`.`titlu`,
  `t`.`pret`,
  `t`.`localitate`,
  `t`.`suprafata`,
  `t`.`tip_teren`,
  `t`.`info`,
  `t`.`tip_contract`,
  `i`.`locatie_imagine` AS 'imagine'
FROM
  (`terenuri` t
    JOIN `imagini` i ON ((`t`.`id_teren` = `i`.`id_teren`)))
WHERE
  ((`t`.`tip_contract` = 'De vanzare') AND (`t`.`localitate` = 'Sibiu'))
GROUP BY
  `t`.`id_teren`;

#
# Procedure "total_apartamente"
#

DROP PROCEDURE IF EXISTS `total_apartamente`;
CREATE PROCEDURE `total_apartamente`()
begin

SELECT COUNT(id_apartament) as apartamente_total

FROM apartamente;
	
end;

#
# Procedure "total_case1"
#

DROP PROCEDURE IF EXISTS `total_case1`;
CREATE PROCEDURE `total_case1`()
begin
SELECT COUNT(id_casa) as case_total


FROM case_vile;
end;

#
# Procedure "total_terenuri"
#

DROP PROCEDURE IF EXISTS `total_terenuri`;
CREATE PROCEDURE `total_terenuri`()
begin
SELECT COUNT(id_teren) as terenuri_total


FROM terenuri;
end;
