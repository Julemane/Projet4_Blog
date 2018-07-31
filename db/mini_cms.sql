-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 31 juil. 2018 à 15:11
-- Version du serveur :  5.7.21
-- Version de PHP :  7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mini_cms`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'valid',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `status`) VALUES
(37, 31, 'admin', 'Bla bla coimmentaire                                                                                                                                                   ', '2018-07-28 12:01:27', 'valid'),
(38, 31, 'admin', 'Hello                                                                                                                                                                                                                                                ', '2018-07-28 12:01:30', 'valid'),
(39, 35, 'admin', '                                                                                                                                    Hello world                                                                                                                        ', '2018-07-28 12:01:41', 'valid'),
(40, 35, 'admin', '                                                                                                                                                                                Commentaire de test                                                                                                                                                                ', '2018-07-28 12:01:46', 'valid'),
(41, 17, 'admin', '                      commentaire                    ', '2018-07-28 12:34:11', 'valid'),
(42, 35, 'admin', '                                                                                                              un commentaire inutile                                                                                                    ', '2018-07-28 12:42:05', 'valid'),
(43, 35, 'admin', '                                                                                        Un commentaire                                                                                                     ', '2018-07-28 13:09:41', 'valid'),
(44, 35, 'admin', '                      commentaire                                                             ', '2018-07-28 18:30:57', 'valid'),
(45, 35, 'admin', '                      enieme commenaire de test                                                            ', '2018-07-28 18:31:06', 'valid'),
(46, 31, 'admin', 'Commentaire editer                     ', '2018-07-30 11:04:45', 'valid'),
(47, 17, 'admin', 'Hello voici mon commentaire                    ', '2018-07-30 11:32:16', 'warning'),
(48, 35, 'ptimimi', 'commentaire de test status', '2018-07-30 18:37:32', 'valid'),
(49, 35, 'magali', 'Hello\r\ngdfgdf', '2018-07-30 19:15:36', 'valid'),
(50, 35, 'admin', 'commentaire', '2018-07-30 20:13:58', 'valid');

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `inscription_date` date NOT NULL,
  `userLevel` varchar(20) NOT NULL DEFAULT 'member',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id`, `nickname`, `password`, `mail`, `inscription_date`, `userLevel`) VALUES
(6, 'ptimimi', '$2y$10$mEWreR9lpNaDXJ4lXQwW0.ko7BJQwhUbyrmPWjfsheHcwicTlrk3y', 'jimimi@hotmail.fr', '2018-07-23', 'admin'),
(7, 'magali', '$2y$10$3m04/vxLq.lUM58T4bH7dO43mYUk5pu4o4TEw4MtnBDpx0Tm8wLG6', 'magali@hotmail.com', '2018-07-23', 'member'),
(8, 'admin', '$2y$10$b4a6m7f90J5XalUNUaDfce0gdFjnCBf6uKe6Yk0wiMz1.qOjWECwq', 'test@gmail.com', '2018-07-25', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `post_img` varchar(50) NOT NULL DEFAULT 'public/images/post_img.png',
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `content`, `post_img`, `creation_date`) VALUES
(17, 'l\'Alaska grandeur nature', 'jeremy', '<p>Comme Hawa&iuml;, l\'Alaska est s&eacute;par&eacute; du Mainland et se situe au nord-ouest du Canada. Bord&eacute; par l\'oc&eacute;an Arctique au nord et la mer de B&eacute;ring et l\'oc&eacute;an Pacifique au sud, ce territoire est s&eacute;par&eacute; de l\'Asie par le d&eacute;troit de B&eacute;ring. En outre, ses divisions administratives ne sont pas des comt&eacute;s mais des boroughs. Alaska signifie &laquo; grande Terre &raquo; ou &laquo; continent &raquo; en al&eacute;oute3. Cette r&eacute;gion, que l\'on appelait au XIXe si&egrave;cle l\'&laquo; Am&eacute;rique russe &raquo;, tire son nom d\'une longue presqu\'&icirc;le, au nord-ouest du continent am&eacute;ricain, &agrave; environ 1 000 km au sud du d&eacute;troit de Bering, et qui se lie, vers le sud, aux &icirc;les Al&eacute;outiennes. Le surnom de l\'Alaska est &laquo; la derni&egrave;re</p>', 'public/images/alaskaSnow.jpg', '2018-07-24 14:41:53'),
(31, 'Article sur le Lorem', 'Jérémy', '<p>Qu\'est-ce que le Lorem Ipsum? Le Lorem Ipsum est simplement du faux texte employ&eacute; dans la composition et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard de l\'imprimerie depuis les ann&eacute;es 1500, quand un imprimeur anonyme assembla ensemble des morceaux de texte pour r&eacute;aliser un livre sp&eacute;cimen de polices de texte. Il n\'a pas fait que survivre cinq si&egrave;cles, mais s\'est aussi adapt&eacute; &agrave; la bureautique informatique, sans que son contenu n\'en soit modifi&eacute;. Il a &eacute;t&eacute; popularis&eacute; dans les ann&eacute;es 1960 gr&acirc;ce &agrave; la vente de feuilles Letraset contenant des passages du Lorem Ipsum, et, plus r&eacute;cemment, par son inclusion dans des applications de mise en page de texte, comme Aldus PageMaker.On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&ecirc;che de se concentrer sur la mise en page elle-m&ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</p>', 'public/images/glacier-855813_1280.jpg', '2018-07-24 19:18:28'),
(35, 'Promotion Alaska edition', 'Jérémy', '<p style=\"text-align: left;\">La beaut&eacute; &eacute;poustouflante des paysages, les &eacute;normes glaciers de la p&eacute;riode glaciaire et l&rsquo;abondance des esp&egrave;ces sauvages font de l&rsquo;Alaska un endroit unique sur Terre. Cet &Eacute;tat offre un large &eacute;ventail d&rsquo;activit&eacute;s pour satisfaire toutes les envies et tous les go&ucirc;ts. Quels que soient vos choix, votre voyage en Alaska sera un v&eacute;ritable plaisir&nbsp;!</p>\r\n<p>&nbsp;</p>', 'public/images/alaskaRoad.jpg', '2018-07-25 13:30:34');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
