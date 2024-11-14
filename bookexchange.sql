-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Data base : `bookexchange`
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
(8, 'Hygge', 'Meik Wiking', 'Hygge.png', 'Description Hygge', '1', '3'),
(9, 'Innovation', 'Matt Ridley', 'Innovation.png ', 'Description Innovation', '1', '7'),
(10, 'Psalms', 'Alabaster', 'Psalms.png ', 'Description Psalms', '1', '8'),
(11, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'ThinkingFastSlow.png ', 'Description Thinking, Fast & Slow', '1', '9'),
(12, 'A Book Full Of Hope', 'Rupi Kaur', 'ABookFullOfHope.png ', 'Description A Book Full Of Hope', '1', '10'),
(13, 'The Subtle Art Of...', 'Mark Manson', 'TheSubtleArtOf.png ', 'Description The Subtle Art Of...', '1', '11'),
(14, 'Narnia', 'C.S Lewis', 'Narnia.png ', 'Description Narnia', '1', '12'),
(15, 'Company Of One', 'Paul Jarvis', 'CompanyOfOne.png ', 'Description Company Of One', '1', '14'),
(16, 'The Two Towers', 'J.R.R Tolkien', 'TheTwoTowers.png ', 'Description The Two Towers', '1', '15'),
(17, 'Titre du livre 17', 'Unknown', 'avatarbook.png ', 'Description du livre 17', '0', '1'),
(18, 'Titre du livre 18', 'Auteur inconnu', 'avatarbook.png ', 'Description du livre 18', '1', '1');

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
(2, 'Alexlecture', 'Alexlect@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-09-18', 'avatar2.jpg'),
(3, 'Hugo1990_12', 'Hugo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-09-18', 'avatar3.jpg'),
(4, 'Juju1432', 'juju@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2023-12-19', 'avatar4.jpg'),
(5, 'Christiane75014', 'cricri@paris.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-01-20', 'avatar5.jpg'),
(6, 'Hamzalecture', 'Ham@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-02-21', 'avatar6.jpg'),
(7, 'Lou&Ben50', 'louben@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-03-22', 'avatar7.jpg'),
(8, 'Lolobzh', 'lolo@brest.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-04-23', 'avatar8.jpg'),
(9, 'Sas634', 'sanssas@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-05-24', 'avatar9.jpg'),
(10, 'ML95', 'ML@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-06-06', 'avatar10.jpg'),
(11, 'Verogo33', 'vero@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-06-25', 'avatar11.jpg'),
(12, 'AnnikaBrahms', 'annibrahms@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-07-25', 'avatar12.jpg'),
(13, 'Paul Jarvis', 'polo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-08-25', 'avatar13.jpg'),
(14, 'Victoirefabr912', 'vic@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-12', 'avatar14.jpg'),
(15, 'Lotrfanclub67', 'lotrfanclub@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-21', 'avatar15.jpg'),
(16, 'Hugo1990_12', 'Ugo@home.fr', '$2y$10$bqbCb5Kfoeutiadn6Kl6WuafJFFeN/y6KlYrCD9OD7vFH4ws8.pBW', '2024-09-22', 'avatar3.jpg');

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
  `receiver_read` boolean NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


--
-- Hydrates table `messaging`
--

INSERT INTO `messaging` (`id`, `message`, `sender_id`,`receiver_id`, `receiver_read`, `date`) VALUES
(1, 'Message de 1 à 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper. Duis arcu massa, scelerisque vitae, consequat in, pretium a,', '1', '3', '', '2024-10-14 10:51:26'),
(2, 'Réponse de 3 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. Duis semper.', '3', '1', '', '2024-10-14 10:53:26'),
(3, 'Message de 1 à 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam. Maecenas ligula massa, varius a, semper congue, euismod non, mi. Proin porttitor, orci nec nonummy molestie, enim est eleifend mi, non fermentum diam nisl sit amet erat. ', '1', '2', '', '2024-10-15 08:15:23'),
(4, 'Message de 2 à 3', '2', '3', '', '2024-10-16 09:58:16'),
(5, 'Message de 4 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '4', '1', '', '2024-10-17 10:51:26'),
(6, 'Réponse de 4 à 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '4', '3', '', '2024-10-18 10:53:26'),
(7, 'Message de 2 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '2', '1', '', '2024-10-19 08:15:23'),
(8, 'Message de 1 à 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '1', '2', '', '2024-10-20 10:51:26'),
(9, 'Réponse de 3 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '3', '1', '', '2024-10-21 10:53:26'),
(10, 'Message de 1 à 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '1', '3', '', '2024-10-22 08:15:23'),
(11, 'Message de 1 à 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '1', '4', '', '2024-10-23 10:51:26'),
(12, 'Réponse de 4 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '4', '1', '', '2024-10-24 10:53:26'),
(13, 'Message de 2 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '2', '1', '1', '2024-10-25 08:15:23'),
(14, 'Message de 3 à 12 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '3', '12', '', '2024-10-25 08:15:23'),
(15, 'Message de 7 à 9 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus.', '7', '9', '', '2024-10-25 08:15:23'),
(16, 'Message de 9 à 7 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '9', '7', '', '2024-10-25 08:16:23'),
(17, 'Message de 16 à 8 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '16', '8', '', '2024-10-25 08:15:23'),
(18, 'Message de 1 à 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '1', '2', '', '2024-10-26 08:15:23'),
(19, 'Message de 2 à 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '2', '4', '', '2024-10-25 08:16:23'),
(20, 'Message de 3 à 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '3', '4', '', '2024-10-25 08:15:23'),
(21, 'Message de 4 à 3 : Lorem', '4', '3', '', '2024-10-25 08:15:23'),
(22, 'Message de 3 à 4 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '3', '4', '', '2024-10-25 08:16:32'),
(23, 'Message de 2 à 3 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '2', '3', '', '2024-10-26 08:15:23'),
(24, 'Message de 1 à 2 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '1', '2', '', '2024-10-27 08:15:23'),
(25, 'Message de 2 à 1 : Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non risus. Suspendisse lectus tortor, dignissim sit amet, adipiscing nec, ultricies sed, dolor. Cras elementum ultrices diam.', '2', '1', '', '2024-10-27 08:15:32'),
(26, 'Message de 1 à 6 : Hello from Camille to HamzaLecture : Lorem', '1', '6', '', '2024-10-31 08:17:23'),
(27, 'Message de 1 à 2 : Salut Alex C Camille, comment ça va ?', '1', '2', '', '2024-11-01 17:17:23'),
(28, 'Message de 2 à 1 : Salut Camille, je vais bien merci. Et toi?', '2', '1', '', '2024-11-01 17:18:23'),
(29, 'Message de 1 à 5 : Bonjour Christiane', '1', '5', '', '2024-11-02 08:17:23'),
(30, 'Message de 1 à 3 : G beaucoup aimé ton livre', '1', '3', '', '2024-11-03 09:24:23');


