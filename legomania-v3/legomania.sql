-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mer 11 Juin 2014 à 17:58
-- Version du serveur: 5.5.37-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `legomania`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `category_id` int(2) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL DEFAULT 'untitled',
  `margin_rate` float NOT NULL DEFAULT '0.15',
  `expedition_price` float NOT NULL DEFAULT '7',
  `description` text NOT NULL,
  PRIMARY KEY (`category_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `categorys`
--

INSERT INTO `categorys` (`category_id`, `created_at`, `updated_at`, `name`, `margin_rate`, `expedition_price`, `description`) VALUES
(1, '2014-06-02 01:02:00', '2014-05-14 01:27:24', 'enfant', 0.15, 3, 'L''univers kids !'),
(2, '2014-06-04 02:42:03', '2014-06-05 05:04:47', 'collection', 0.15, 3, 'D''une manière générale, une collection est un rassemblement d''objets.'),
(3, '2014-06-03 04:43:14', '2014-04-07 01:35:04', 'super-hero', 0.15, 3, 'Le terme super-héros désigne un type de héros fictif, que l''on retrouve principalement dans les comics ou dans leurs adaptations audiovisuelles.'),
(4, '2014-04-25 02:04:08', '2014-06-03 08:02:03', 'classique', 0.15, 3, 'Tout nos produits cultes ...'),
(5, '2014-06-01 03:17:07', '2014-06-06 13:05:30', 'discount', 0.15, 7, 'Nos fins de séries !'),
(6, '2014-04-15 06:11:33', '2014-06-06 13:10:34', 'starwars', 0.15, 11, 'Star Wars est une épopée cinématographique de science-fiction créée par George Lucas en 1977.');

-- --------------------------------------------------------

--
-- Structure de la table `legos`
--

CREATE TABLE IF NOT EXISTS `legos` (
  `lego_id` int(3) NOT NULL AUTO_INCREMENT,
  `category_id` int(2) NOT NULL DEFAULT '1',
  `name` varchar(255) NOT NULL DEFAULT 'untitled',
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`lego_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Contenu de la table `legos`
--

INSERT INTO `legos` (`lego_id`, `category_id`, `name`, `price`) VALUES
(1, 1, 'pirate', 2),
(2, 1, 'space', 2),
(3, 1, 'cow-boy', 10),
(4, 3, 'superman', 10),
(5, 2, 'starsky et hutch', 40),
(7, 4, 'blue block', 1),
(8, 4, 'boîte de 100 multicolores', 15),
(9, 4, 'boîte de 1000 multicolores', 30),
(10, 2, 'james bond', 40),
(11, 2, 'mission impossible', 35),
(12, 3, 'hulk ', 15),
(13, 3, 'batman', 20),
(14, 3, 'spider man', 52),
(15, 4, 'boîte de 35 pièces rouges', 30),
(16, 4, 'boîte de 200 rose', 8),
(17, 6, 'Jedi', 30);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
