-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 16 juin 2021 à 13:04
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP : 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `id15715955_groupe5`
--

-- --------------------------------------------------------

--
-- Structure de la table `evolution`
--

CREATE TABLE `evolution` (
  `annee` int(11) NOT NULL,
  `nombre` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `evenement` int(11) DEFAULT NULL,
  `champion` int(11) DEFAULT NULL,
  `rework` int(11) DEFAULT NULL,
  `telechargement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evolution`
--

INSERT INTO `evolution` (`annee`, `nombre`, `evenement`, `champion`, `rework`, `telechargement`) VALUES
(2009, '0', 1, 42, NULL, NULL),
(2010, '3', 0, 25, NULL, NULL),
(2011, '35', 2, 23, 4, NULL),
(2012, '66', 3, 18, 5, NULL),
(2013, '79', 3, 9, 10, NULL),
(2014, '100', 5, 6, 47, NULL),
(2015, '118', 6, 5, 33, NULL),
(2016, '144', 5, 6, 6, NULL),
(2017, '168', 7, 5, 4, NULL),
(2018, '162', 13, 3, 16, NULL),
(2019, '188', 14, 5, 19, NULL),
(2020, '237', 16, 6, 13, 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `evolution`
--
ALTER TABLE `evolution`
  ADD PRIMARY KEY (`annee`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
