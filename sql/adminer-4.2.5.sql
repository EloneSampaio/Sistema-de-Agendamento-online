-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `evento`;
CREATE TABLE `evento` (
  `idade` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `descricao` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `inicio` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fim` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `evento` (`idade`, `nome`, `id`, `titulo`, `descricao`, `inicio`, `fim`) VALUES
('11/11/1111',	'Elone Isata Goncaves Sampaio',	84,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('11/11/1111',	'Thiago Tavares',	85,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('11/11/1111',	'Feliciano Vasale',	88,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('11/11/1111',	'Maria de Jesus',	89,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('11/11/1111',	'rrrrr',	90,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('11/11/1111',	'rrrrr',	91,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('11/11/1111',	's',	92,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('11/11/1111',	's',	93,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('22/11/2221',	'wwwwww',	94,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('22/11/2221',	'wwwwww',	95,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('22/11/2111',	'ss',	96,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('22/11/2111',	'ss',	97,	NULL,	NULL,	'2016-10-05 00:00:00',	NULL),
('22/11/1111',	'dd',	98,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('22/11/1111',	'dd',	99,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('12/11/1111',	'dd',	100,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL),
('12/11/1111',	'dd',	101,	NULL,	NULL,	'2016-10-04 00:00:00',	NULL);

DELIMITER ;;

CREATE TRIGGER `evento_update` BEFORE INSERT ON `evento` FOR EACH ROW
UPDATE vagas
    SET disponivel= disponivel+ 1
    WHERE data= new.inicio;;

DELIMITER ;

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `provincia` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `municipio` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `servico` (`provincia`, `municipio`, `status`, `id`) VALUES
('Luanda',	'Cazenga',	1,	1);

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `usuario` (`id`, `nome`, `senha`) VALUES
(17,	'sam',	'3d7c80251c0955685e69100025814a04'),
(18,	'sam',	'3d7c80251c0955685e69100025814a04'),
(19,	'sam',	'3d7c80251c0955685e69100025814a04'),
(20,	'sam',	'3d7c80251c0955685e69100025814a04'),
(21,	'sam',	'3d7c80251c0955685e69100025814a04'),
(22,	'sam',	'3d7c80251c0955685e69100025814a04'),
(23,	'sam',	'3d7c80251c0955685e69100025814a04'),
(24,	'sam',	'3d7c80251c0955685e69100025814a04'),
(25,	'sam',	'3d7c80251c0955685e69100025814a04'),
(26,	'sam',	'3d7c80251c0955685e69100025814a04'),
(27,	'sam',	'3d7c80251c0955685e69100025814a04'),
(28,	'sam',	'3d7c80251c0955685e69100025814a04'),
(29,	'sam',	'3d7c80251c0955685e69100025814a04'),
(30,	'sam',	'3d7c80251c0955685e69100025814a04'),
(31,	'sam',	'3d7c80251c0955685e69100025814a04'),
(32,	'sam',	'3d7c80251c0955685e69100025814a04'),
(33,	'sam',	'3d7c80251c0955685e69100025814a04'),
(34,	'sam',	'3d7c80251c0955685e69100025814a04'),
(35,	'sam',	'3d7c80251c0955685e69100025814a04'),
(36,	'sam',	'3d7c80251c0955685e69100025814a04'),
(37,	'sam',	'3d7c80251c0955685e69100025814a04'),
(38,	'sam',	'3d7c80251c0955685e69100025814a04');

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE `vagas` (
  `disponivel` int(11) DEFAULT '0',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ofertada` int(11) NOT NULL DEFAULT '20',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

INSERT INTO `vagas` (`disponivel`, `id`, `data`, `ofertada`) VALUES
(10,	17,	'2016-10-04 00:00:00',	23),
(8,	18,	'2016-10-05 00:00:00',	7),
(0,	19,	'2016-10-08 00:00:00',	99);

-- 2016-10-26 06:28:55
