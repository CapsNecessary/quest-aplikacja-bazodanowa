CREATE TABLE `urzadzenia` (
  `id` int(11) NOT NULL,
  `uwiw` text NOT NULL,
  `kategoria` text NOT NULL,
  `sala` text NOT NULL,
  `lpwsali` text NOT NULL,
  `model` text NOT NULL,
  `wyglad` text NOT NULL,
  `procesor` text NOT NULL,
  `ram` text NOT NULL,
  `plyta` text NOT NULL,
  `dysk` text NOT NULL,
  `przekatna` text NOT NULL,
  `mac` text NOT NULL,
  `licencje` text NOT NULL,
  `inne` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

CREATE TABLE `uzytkownicy` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `ranga` text NOT NULL,
  `has` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin2;

CREATE TABLE `wydarzenia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_urzadzenia` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `typ_wydarzenia` text NOT NULL,
  `opis` text NOT NULL,
  `status` text NOT NULL,
  `ip` text,
  `user` text,
  `dataczas` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4243 DEFAULT CHARSET=latin2;

//Fragment przykładowych danych
INSERT INTO `urzadzenia` VALUES (1,'S_UW/IW/367','serwer','324 zapl','1','','Serwer Dell','Xeon','1GB','','','','','ws2003',''),(2,'ZZS S_UWIW 218','serwer','308z','1','','Serwer Dell','Xeon','1GB','','','','','ws2003',''),(3,'S_UW/IW/176','serwer','308z','2','','Serwer SkĹadak','','','','2 hdd 160GB','','','',''),(4,'S_UWIW','serwer','308z','','MAC serwer Model A1186 EMC No: 2113','Srebrny MAC','','1GB?','','hdd 160GB?','','','OSX',''),(5,'UWIW 459,457,456','serwer','308z','3','NAS Qnap TS-219P?','NAS','','','','2 hdd 1TB','','','QOS',''),(6,'UW/IW/632','serwer','308z','4','NAS Qnap TS-669PRO','NAS','Intel Atom D2700 2130 MHz','1GB','','6 hdd 2TB','','','QOS',''),(7,'UW/IW/633','serwer','308z','5','HP ML310eGen8v2','','Xeon E3-1240v3','16GB','','2 hdd 2TB','','','ws2012 HyperVcore',''),(8,'UWIW/552','komputer','322','1','stacjonarny i5-4430 GA-B85M','Brutus','i5 4430 3GHz','8GB','Gigabyte GA-B85M-HD3','HDD 500GB wcc1u3907310','','94-DE-80-B5-77-92','w7hoem','Kupione z obudowami Logic teraz obudowy Brutus');)
INSERT INTO `wydarzenia` VALUES (1,1,'1980-01-01','zakup','data niepewna','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(2,2,'1980-01-01','zakup','data niepewna','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(3,3,'1980-01-01','zakup','data niepewna','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(4,4,'2007-01-01','zakup','data niepewna','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(5,5,'2012-01-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(6,6,'2015-01-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(7,7,'2015-01-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(8,8,'2013-09-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(9,9,'2013-09-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(10,10,'2013-09-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00'),(11,11,'2013-09-01','zakup','','potwierdzony','10.1.1.1','admi','2018-01-01 07:00:00');)

