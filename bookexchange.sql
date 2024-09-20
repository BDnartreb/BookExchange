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
(1, 'Esther', 'Alabaster', './Images/Esther.png ', 'Description Esther', '1', '2'),
(2, 'The Kinfolk Table', 'Nathan Williams', './Images/TheKinfolkTable.png', 'Description The Kinfolk Table', '0', '1'),
(3, 'Wabi Sabi', 'Beth Kempton', './Images/WabiSabi.png ', 'Description Wabi Sabi', '1', '1');

-- --------------------------------------------------------

--
-- Structure of the table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registration_date` datetime NOT NULL,
  `avatar_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure of the table `messaging`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `receiver_read` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;






--
-- Hydrates table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`,`password`, `registration_date`, `avatar_url`) VALUES
(1, 'BB', 'BB@home.fr', '', '2024-09-17 11:31:37', ''),
('2', 'Joe', 'Joe@home.fr', '', '18/09/2024', '');
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
