-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 13 Juillet 2016 à 18:12
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `adg`
--

-- --------------------------------------------------------

--
-- Structure de la table `fontawesome`
--

CREATE TABLE IF NOT EXISTS `fontawesome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `code` text NOT NULL,
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `fontawesome`
--

INSERT INTO `fontawesome` (`id`, `nom`, `code`) VALUES
(1, 'fa-tablet', '&amp;#xf10a;'),
(2, 'fa-industry', '&amp;#xf275;'),
(3, 'fa-blind', '&amp;#xf29d;'),
(4, 'fa-align-justify', '&amp;#xf039;'),
(5, 'fa-ambulance', '&amp;#xf0f9;'),
(6, 'fa-battery-quarter', '&amp;#xf243;'),
(7, 'fa-battery-4', '&amp;#xf240;'),
(8, 'fa-bell', '&amp;#xf0f3;'),
(9, 'fa-building', '&amp;#xf1ad;'),
(10, 'fa-print', '&amp;#xf02f;'),
(11, 'fa-user', '&amp;#xf007;');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
