CREATE TABLE IF NOT EXISTS `urzadzenia` (
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

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `imie` text NOT NULL,
  `nazwisko` text NOT NULL,
  `ranga` text NOT NULL,
  `has` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin2;

CREATE TABLE IF NOT EXISTS `wydarzenia` (
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