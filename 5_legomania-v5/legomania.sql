-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 20, 2014 at 12:54 PM
-- Server version: 5.5.20-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `legomania`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
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
-- Dumping data for table `categorys`
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `user_id` int(10) NOT NULL,
  `lego_id` int(10) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `created_at`, `user_id`, `lego_id`, `content`) VALUES
(1, '2014-06-20 04:26:48', 1, 4, 'Cool !'),
(2, '2014-06-17 01:19:42', 2, 4, 'Top !!'),
(3, '2014-06-18 14:30:23', 1, 3, 'C''est trop nul ce produit !');

-- --------------------------------------------------------

--
-- Table structure for table `legos`
--

CREATE TABLE IF NOT EXISTS `legos` (
  `lego_id` int(3) NOT NULL AUTO_INCREMENT,
  `category_id` int(2) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'untitled',
  `price` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`lego_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `legos`
--

INSERT INTO `legos` (`lego_id`, `category_id`, `name`, `price`) VALUES
(1, 2, 'piratexxsd', 24),
(2, 1, 'space', 2),
(3, 1, 'cow-boy', 10),
(4, 3, 'superman', 10),
(5, 2, 'starsky et hutch', 40),
(7, 4, 'blue block', 1),
(8, 4, 'boîte de 100 multicolores', 15),
(9, 4, 'boîte de 1000 multicolores', 30),
(10, 3, 'james bond', 40),
(11, 2, 'mission impossible', 35),
(12, 1, 'piratexxd', 34),
(13, 3, 'batman', 20),
(14, 3, 'spider man', 52),
(15, 4, 'boîte de 35 pièces rouges', 30),
(16, 4, 'boîte de 200 rose', 8),
(17, 6, 'Jedi', 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `name`) VALUES
(1, 'baptiste@5inq.fr', 'azerty', 'Baptiste Deleplace'),
(2, 'bonjour@5inq.fr', 'abcdef', 'John Peterson');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
