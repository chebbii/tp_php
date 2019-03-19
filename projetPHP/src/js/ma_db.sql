-- Adminer 4.7.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `ma_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ma_db`;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `article` (`id`, `title`, `content`, `author`) VALUES
(14,	'First Advert',	'On sait depuis longtemps que travailler c\'est embÃªtant !',	1),
(15,	'Second Advert',	'On sait depuis longtemps que dormir c\'est cool !',	1),
(16,	'Third Advert',	'On sait depuis longtemps que lire c\'est intÃ©ressant !',	1),
(17,	'Fourth Advert',	'On sait depuis longtemps que le PHP c\'est lourd !',	1),
(18,	'Fifth Advert',	'On sait depuis longtemps que les miel pops c\'est le feu !',	1),
(20,	'Sixth Advert',	'On sait depuis longtemps que finit son TP PHP c\'est soulageant !',	1);

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `article` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `article` (`article`),
  CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`article`) REFERENCES `article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `commentaire` (`id`, `username`, `content`, `article`) VALUES
(3,	'Alex',	'This is a comment',	20);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'Sneaz',	'$2y$10$voOp8TL4x1uT.jrUK/fNaODxwmORBKEnN/aDvGLMKBn29rulJVjZq'),
(8,	'User2',	'$2y$10$2iVo9MRmy1G4UssQHh.nxubALHyqz3hOYR2iatDJsyEZxN1JRts4q');
