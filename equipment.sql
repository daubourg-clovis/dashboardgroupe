-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 31 juil. 2020 à 09:21
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `equipment`
--
CREATE DATABASE IF NOT EXISTS `equipment` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `equipment`;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `type`) VALUES
(1, 'lumière'),
(4, 'meubles'),
(5, 'meubles'),
(6, 'meubles'),
(7, 'meubles'),
(8, 'meubles'),
(15, ''),
(16, ''),
(18, ''),
(19, 'legumes'),
(20, ''),
(22, ''),
(23, ''),
(24, 'meubles'),
(25, ''),
(29, ''),
(30, ''),
(31, ''),
(32, ''),
(33, ''),
(34, ''),
(35, 'meubles'),
(38, ''),
(39, 'fruit'),
(40, 'fruit'),
(65, 'fruit'),
(66, 'fruit');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `reference` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `purchasedate` date NOT NULL,
  `warrantydate` date NOT NULL,
  `price` float NOT NULL,
  `purchaseticket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maintenance` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usermanual` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_id` (`seller_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `purchasedate`, `warrantydate`, `price`, `purchaseticket`, `maintenance`, `usermanual`, `category_id`, `seller_id`) VALUES
(7, 'fdfd', '745754', '1970-01-01', '1970-01-01', 12, 'pas cher', 'enlever la peau', 'nombres', 4, 4),
(9, 'banane', '45', '1970-01-01', '1970-01-01', 6, 'okjh', 'enlever la peau', 'ne pas mettre au frigo', 6, 5),
(29, 'fdfd', '45', '1970-01-01', '1970-01-01', 6, 'okjh', 'enlever la peau', 'ne pas mettre au frigo', 39, 38),
(31, 'pomme', '745754', '1970-01-01', '1970-01-01', 12, 'pas cher', 'enlever la peau', 'nombres', 65, 64);

-- --------------------------------------------------------

--
-- Structure de la table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `address`) VALUES
(4, 'fdfd', 'fdfdfdf'),
(5, 'IKEA', 'Dijon'),
(6, 'IKEA', 'Dijon'),
(7, 'IKEA', 'Dijon'),
(14, '', ''),
(15, '', ''),
(17, '', ''),
(18, 'biocoop', 'besançon'),
(19, '', ''),
(21, '', ''),
(22, '', ''),
(23, 'Fly', 'Dijon'),
(24, '', ''),
(28, '', ''),
(29, '', ''),
(30, '', ''),
(31, '', ''),
(32, '', ''),
(33, '', ''),
(34, 'Auchan', 'Dijon'),
(37, '', ''),
(38, 'marchÃ© bio', 'Dijon'),
(39, 'marchÃ© bio', 'Dijon'),
(64, 'marchÃ© bio', 'Dijon'),
(65, 'marchÃ© bio', 'Dijon');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`username`, `pwd`) VALUES
('admin', '*97E7471D816A37E38510728AEA47440F9C6E2585'),
('Vanessa', '*23AE809DDACAF96AF0FD78ED04B6A265E05AA257');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
