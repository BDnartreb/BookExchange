-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 24 nov. 2023 à 12:39
-- Version du serveur : 5.7.36
-- Version de PHP : 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookexchange`
--

-- --------------------------------------------------------

--
-- Structure of table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `link_book_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Hydrates table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `image`, `description`, `status`, `id_user`) VALUES
(1, 'Esther', 'Alabaster', 'Esther.png ', 'Description Esther', '1', '1'),
(2, 'The Kinfolk Table', 'Nathan Williams', 'TheKinfolkTable.png', 'Description The Kinfolk Table', '1', '2'),
(3, 'Wabi Sabi', 'Beth Kempton', 'WabiSabi.png ', 'Description Wabi Sabi', '1', '2'),
(4, 'Milk & honey', 'Rupi Kaur', 'MilkHoney.png ', 'Description Milk & honey', '1', '3'),
(5, 'Delight!', 'Justin Rossow', 'Delight.png ', 'Description Delight', '1', '4'),
(6, 'Milwaukee Mission', 'Elder Cooper Low', 'MilwaukeeMission.png ', 'Description Milwaukee Mission', '1', '5'),
(7, 'Minimalist Graphics', 'Julia Schonlau', 'MinimalistGraphics.png ', 'Description Minimalist Graphics', '1', '6'),
(8, 'Hygge', 'Meik Wiking', 'Hygge.png', 'Description Hygge', '1', '16'),
(9, 'Innovation', 'Matt Ridley', 'Innovation.png ', 'Description Innovation', '1', '7'),
(10, 'Psalms', 'Alabaster', 'Psalms.png ', 'Description Psalms', '1', '8'),
(11, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'ThinkingFastSlow.png ', 'Description Thinking, Fast & Slow', '1', '9'),
(12, 'A Book Full Of Hope', 'Rupi Kaur', 'ABookFullOfHope.png ', 'Description A Book Full Of Hope', '1', '10'),
(13, 'The Subtle Art Of...', 'Mark Manson', 'TheSubtleArtOf.png ', 'Description The Subtle Art Of...', '1', '11'),
(14, 'Narnia', 'C.S Lewis', 'Narnia.png ', 'Description Narnia', '1', '12'),
(15, 'Company Of One', 'Paul Jarvis', 'CompanyOfOne.png ', 'Description Company Of One', '1', '14'),
(16, 'The Two Towers', 'J.R.R Tolkien', 'TheTwoTowers.png ', 'Description The Two Towers', '1', '15'),
(17, '17', 'Beth Kempton', 'WabiSabi.png ', 'Description 18', '1', '1'),
(18, '18', 'Beth Kempton', 'WabiSabi.png ', 'Description 19', '1', '1');

-- --------------------------------------------------------

--
-- Structure of the table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL,
  `avatar_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Hydrates table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`,`password`, `registration_date`, `avatar_url`) VALUES
(1, 'CamilleClubLit', 'Camille@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-09-17', 'Joe.png'),
(2, 'Alexlecture', 'Alexlect@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '18/09/2023', ''),
(3, 'Hugo1990_12', 'Hugo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-09-18', ''),
(4, 'Juju1432', 'juju@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-12-19', ''),
(5, 'Christiane75014', 'cricri@paris.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-01-20', ''),
(6, 'Hamzalecture', 'Ham@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-02-21', ''),
(7, 'Lou&Ben50', 'louben@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-03-22', ''),
(8, 'Lolobzh', 'lolo@brest.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-04-23', ''),
(9, 'Sas634', 'sanssas@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-05-24', ''),
(10, 'ML95', 'ML@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-06-06', ''),
(11, 'Verogo33', 'vero@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-06-25', ''),
(12, 'AnnikaBrahms', 'annibrahms@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-07-25', ''),
(13, 'Paul Jarvis', 'polo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-08-25', ''),
(14, 'Victoirefabr912', 'vic@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-12', ''),
(15, 'Lotrfanclub67', 'lotrfanclub@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-21', ''),
(16, 'Hugo1990_12', 'Ugo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-22', '');

-- --------------------------------------------------------

--
-- Structure of the table `messaging`
--

DROP TABLE IF EXISTS `messaging`;
CREATE TABLE IF NOT EXISTS `messaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_read` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;





--
-- Contraints for tables
--

--
-- Contraint for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `link_book_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
