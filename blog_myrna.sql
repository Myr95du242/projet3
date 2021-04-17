

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `author` varchar(70) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

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
(14, 2, 'LaVie de papy', 'Il est là avec les autres', '2021-04-10 15:33:58'),
(15, 5, 'vqsbq', 'bdsb', '2021-04-13 15:50:44'),
(16, 5, 'la guerre des nerfs', 'Ils sont si pas possible', '2021-04-13 15:51:01'),
(17, 5, 'lolota', 'bababa', '2021-04-13 16:21:53'),
(18, 7, 'Vivra', 'ils iront avec elles', '2021-04-13 16:22:11'),
(19, 7, 'Bienvenu', 'Chez les zombies', '2021-04-13 16:22:29'),
(20, 7, 'Barbie', 'Allons seulement', '2021-04-13 16:23:42'),
(21, 7, 'Parfait Denis', 'Il ne se rendait pas compte que l\'on ne fait pas confiance à...', '2021-04-13 16:24:37'),
(22, 7, 'Boris de Lhiam', 'il viendra quand le temps arrivera', '2021-04-13 16:27:40'),
(23, 5, 'lolo', 'lololol', '2021-04-13 16:47:57'),
(24, 5, 'dzaf', 'aza', '2021-04-14 16:07:26'),
(25, 4, 'Louis Second 2', 'La douceur de chaque chose est imparable', '2021-04-14 21:33:50'),
(26, 10, 'couo', 'jNLNznf', '2021-04-15 12:34:12');

-- --------------------------------------------------------

--
-- Structure de la table `contact_user`
--

DROP TABLE IF EXISTS `contact_user`;
CREATE TABLE IF NOT EXISTS `contact_user` (
  `id_contact_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `email_adress` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id_contact_user`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact_user`
--

INSERT INTO `contact_user` (`id_contact_user`, `name`, `email_adress`, `phone_number`, `message`) VALUES
(3, 'lourde', 'grand@gmail.com', '0707075656', 'je ne suis pas avec'),
(4, 'bdhahda', 'c@gmail.com', '0606065656', 'Je ne suis pas avce les autres que je'),
(5, 'bdhahda', 'c@gmail.com', '0606065656', 'csqfcqfv'),
(6, 'csqcs', 'c@gmail.com', '0606065656', 'fqeefa'),
(7, 'bdhahda', 'c@gmail.com', '0606065656', 'QFEGERGRHR'),
(8, 'DARCY', 'da@yahoo.com', '0202020303', 'Ils sont tous allés au parloir'),
(9, 'vdsvdsb', 'c@gmail.com', 'bdsbdb', 'bbsbdsb'),
(10, 'csqcs', 'c@gmail.com', '0606065656', 'qvdved'),
(11, 'bdhahda', 'c@gmail.com', 'cscfaefz', 'afzfzf'),
(12, 'Arlette', 'c@gmail.com', '0606065656', 'dvgdbgghh'),
(13, 'vdsv', 'c@gmail.com', 'vdqv', 'vvqgvdqgq'),
(14, 'Myleo Rapht', 'c@gmail.com', '0606065656', 'Je ne suis pas avec les autres'),
(15, 'PAPA', 'pa@yahoo.fr', '0606065677', 'Je t\'aime plus encore');

-- --------------------------------------------------------

--
-- Structure de la table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `id_file` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(70) NOT NULL,
  `url_file` varchar(255) NOT NULL,
  PRIMARY KEY (`id_file`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `file`
--

INSERT INTO `file` (`id_file`, `name`, `url_file`) VALUES
(1, 'CV_Myrna.pdf', 'public/CV_Myrna.pdf');

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id_member`, `pseudo`, `email`, `password`, `ip`) VALUES
(1, 'myr', 'my@yahoo.fr', '123', '127000'),
(2, 'daryl', 'dar@gmail.com', '$2y$10$SH9rSwJgpScMreRm4L8yPeOiDk26sW9A25lm.RC69gnAa5.ANo4iy', '127.0.0.1'),
(3, 'toto', 'toto@gmail.com', '$2y$10$OLl/Noa/ebjX3VTpR6xlWePmpi/LiFMfyXb65fNz3NEUV9WxxS2cO', '127.0.0.1'),
(4, 'Mymy de Paris', 'mp@gmail.com', '$2y$10$AAsvtmQFPmD.QNP9vDImYeqER8UUZeIpf.ZrG0HQYZgoGWF1HELiq', '127.0.0.1'),
(5, 'taty', 'taty@yahoo.fr', '$2y$10$z8UH.GnD6jcdNJ4vWtqYK.xkEtbiKgliutoX0RI.z7tEX/NwvgnVK', '127.0.0.1');

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id_post`, `title`, `date_post`, `chapo`, `content`, `author`) VALUES
(32, 'la nuit de parage', '2021-04-17 20:43:28', 'ils sont vrais', 'Ce n&#039;est pas vrai', 'Part'),
(33, 'Ils viennent avec les autres', '2021-04-17 20:44:04', 'ce n&#039;est pas toujours ce que l&#039;on veut', 'Ils viennent avec les zouzous', 'Karl'),
(30, 'Rue', '2021-04-17 20:42:44', 'La rue de Brazza', 'C&#039;est presque près', 'Coucou Loulou');
