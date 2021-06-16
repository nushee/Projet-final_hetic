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
-- Structure de la table `joueurs_par_region`
--

CREATE TABLE `joueurs_par_region` (
  `Serveurs` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `2010` int(11) DEFAULT NULL,
  `2016` int(11) DEFAULT NULL,
  `2020` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `joueurs_par_region`
--

INSERT INTO `joueurs_par_region` (`Serveurs`, `2010`, `2016`, `2020`) VALUES
('BR  (Brazil)', 7, 8, 9),
('EUNE (Europe Nordic & East)', 12, 11, 14),
('EUW (Europe West)', 24, 24, 25),
('JP  (Japan)', 0, 1, 1),
('KR  (Korea)', 26, 26, 24),
('LAN (Latin America North)', 3, 4, 4),
('LAS (Latin America South)', 3, 4, 4),
('NA  (North America)', 17, 15, 11),
('OCE (Oceania)', 2, 2, 1),
('RU  (Russia)', 1, 1, 1),
('TR  (Turkey)', 5, 5, 6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueurs_par_region`
--
ALTER TABLE `joueurs_par_region`
  ADD PRIMARY KEY (`Serveurs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
