-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 04 avr. 2020 à 15:20
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `roulette`
--
CREATE DATABASE IF NOT EXISTS `roulette` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `roulette`;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifiants` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `argent` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `identifiants`, `mdp`, `argent`) VALUES
(1, 'test', 'test', 3000),
(2, 'jean', '123456', 500),
(3, 'Darwin', 'Pfeg12', 11000),
(4, 'zaza', 'zaza', 55000),
(5, 'zazaa', 'zazaa123', 50000),
(6, 'tolode', 'tolode', 10000000),
(7, 'tolode', 'tolode', 10000000),
(8, 'tolode', 'tolode', 10000000);

-- --------------------------------------------------------

--
-- Structure de la table `game`
--

DROP TABLE IF EXISTS `game`;
CREATE TABLE IF NOT EXISTS `game` (
  `player` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `mise` int(20) NOT NULL,
  `profit` int(20) NOT NULL,
  PRIMARY KEY (`player`,`date`),
  KEY `player` (`player`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `game`
--

INSERT INTO `game` (`player`, `date`, `mise`, `profit`) VALUES
(1, '2019-05-23 12:29:55', 2000, 4000),
(1, '2019-05-23 12:33:48', 1000, 0),
(1, '2019-05-24 12:43:12', 1000, 2000),
(1, '2019-05-24 12:43:23', 1000, 0),
(2, '2019-05-23 12:28:22', 6000, 0),
(2, '2019-05-23 12:35:51', 90, 180),
(2, '2019-05-23 13:04:47', 90, 0),
(2, '2019-05-23 13:08:35', 25, 0),
(2, '2019-05-23 13:09:02', 25, 50),
(2, '2019-05-23 13:09:10', 25, 50),
(2, '2019-05-23 13:09:35', 25, 0),
(2, '2019-05-23 13:10:30', 5, 10),
(2, '2019-05-23 13:11:00', 5, 10),
(3, '2019-05-23 12:26:59', 25, 50),
(3, '2019-05-23 14:00:45', 72, 144),
(3, '2019-05-23 14:00:53', 72, 144),
(3, '2019-05-24 12:41:32', 16, 32),
(3, '2019-05-24 12:41:42', 16, 32),
(3, '2019-05-24 12:42:03', 16, 32),
(3, '2019-05-24 12:42:14', 16, 0),
(3, '2019-05-24 12:58:55', 48, 96),
(3, '2019-05-24 12:59:20', 6, 12),
(3, '2019-05-24 12:59:32', 2, 4),
(3, '2019-05-24 13:00:06', 4, 0),
(3, '2019-05-24 13:02:59', 4, 0),
(3, '2019-05-24 13:03:11', 96, 192),
(3, '2019-05-24 13:03:30', 92, 0),
(3, '2019-05-24 13:10:06', 50, 100),
(3, '2019-05-24 13:13:06', 50, 100),
(3, '2019-05-24 13:17:30', 50, 100),
(3, '2019-05-24 13:22:08', 50, 100),
(3, '2019-05-24 13:23:34', 50, 100),
(3, '2019-05-24 13:23:38', 50, 100),
(3, '2019-05-24 13:23:42', 50, 100),
(3, '2019-05-24 13:23:55', 50, 100),
(3, '2019-05-24 13:25:43', 100, 200),
(3, '2019-05-24 13:30:33', 100, 0),
(3, '2019-05-24 13:32:12', 100, 0),
(3, '2019-05-24 13:32:28', 100, 200),
(3, '2019-05-24 13:32:42', 100, 200),
(3, '2019-05-24 13:35:29', 100, 200),
(3, '2019-05-24 13:35:37', 100, 0),
(3, '2019-05-24 13:37:40', 100, 200),
(3, '2019-05-24 13:49:24', 100, 0),
(3, '2019-05-24 13:49:36', 100, 3500),
(3, '2019-05-27 14:51:34', 300, 600),
(3, '2019-05-27 14:59:06', 600, 0),
(3, '2019-05-27 14:59:11', 600, 1200),
(3, '2019-05-27 14:59:13', 600, 0),
(3, '2019-05-27 14:59:32', 600, 0),
(3, '2019-05-27 15:00:03', 400, 0),
(3, '2019-05-27 15:00:24', 50, 100),
(3, '2019-05-29 18:00:29', 25, 50),
(3, '2019-05-29 18:05:34', 25, 0),
(3, '2019-05-29 18:05:57', 25, 50),
(3, '2019-05-29 18:06:53', 25, 50),
(3, '2019-05-29 18:07:27', 25, 50),
(3, '2019-05-29 18:07:50', 25, 925),
(3, '2019-05-29 18:08:38', 25, 50),
(3, '2019-05-29 18:09:57', 25, 0),
(3, '2019-05-29 18:10:43', 25, 50),
(3, '2019-05-29 18:11:35', 25, 0),
(3, '2019-05-29 18:12:48', 25, 0),
(3, '2019-05-29 20:27:41', 5000, 10000),
(4, '2019-09-20 12:35:11', 5000, 10000),
(8, '2020-01-03 12:13:08', 5400, 10800),
(8, '2020-01-03 12:13:31', 460800, 921600),
(8, '2020-01-03 12:14:01', 921600, 0),
(8, '2020-01-03 12:14:19', 1000000, 0),
(8, '2020-01-03 12:14:36', 2000000, 4000000);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`player`) REFERENCES `clients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
