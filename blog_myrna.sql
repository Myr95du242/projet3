-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 12 avr. 2021 à 09:25
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_myrna`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `author` varchar(70) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_post`, `author`, `comments`, `date_comment`) VALUES
(1, 1, 'Marcy', 'J\'aime bien ces trucs', '2021-04-09 22:26:04'),
(2, 2, 'Henry', 'Ils aiment pas faire ce qu\'il faut', '2021-04-09 22:26:04'),
(3, 1, 'Gabin', 'Ils viennent de partout', '2021-04-09 22:28:59'),
(4, 3, 'Filou', 'Ce n\'est rien du tout', '2021-04-09 22:28:59'),
(5, 3, 'Zert', 'ils vont tous chercher', '2021-04-09 22:31:04'),
(6, 1, 'Bonny', 'Les vets et les pas murs', '2021-04-09 22:31:04'),
(7, 2, 'tata', 'je suis là', '2021-04-10 12:52:45'),
(8, 2, 'samETsam', 'Rien de  plus beau', '2021-04-10 12:54:23'),
(9, 3, 'lala', 'Je ne suis pas là', '2021-04-10 13:46:46'),
(10, 3, 'lala', 'Je ne suis pas là', '2021-04-10 13:48:45'),
(11, 3, 'parti', 'Je ne suis pas là', '2021-04-10 13:54:23'),
(12, 3, 'cscs', 'vsvsv', '2021-04-10 14:09:22'),
(13, 1, 'Lardy', 'Je n\'aime pas faire ce que tu veux.', '2021-04-10 14:15:48'),
(14, 2, 'LaVie de papy', 'Il est là avec les autres', '2021-04-10 15:33:58');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(70) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id_member`, `pseudo`, `email`, `password`, `ip`) VALUES
(1, 'myr', 'my@yahoo.fr', '123', '127000'),
(2, 'daryl', 'dar@gmail.com', '$2y$10$SH9rSwJgpScMreRm4L8yPeOiDk26sW9A25lm.RC69gnAa5.ANo4iy', '127.0.0.1'),
(3, 'toto', 'toto@gmail.com', '$2y$10$OLl/Noa/ebjX3VTpR6xlWePmpi/LiFMfyXb65fNz3NEUV9WxxS2cO', '127.0.0.1'),
(4, 'Mymy de Paris', 'mp@gmail.com', '$2y$10$AAsvtmQFPmD.QNP9vDImYeqER8UUZeIpf.ZrG0HQYZgoGWF1HELiq', '127.0.0.1');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `date_post` datetime NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(70) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `title`, `date_post`, `chapo`, `content`, `author`) VALUES
(1, 'Changement en anglais', '2021-04-09 22:21:12', 'On mettra tout en anglais', 'C\'est la langue du moment et on ne peut pas faire mieux', 'LB KIB'),
(2, 'Barman', '2021-04-09 22:22:00', 'Le vin dans ses mains', 'Ce barman te donne envie de boire un vin', 'Katrisma'),
(3, 'DS4', '2021-04-09 22:23:54', 'La première voiture de My', 'Elle a toujours aimé une telle voiture. On ira encore', 'Craud');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
