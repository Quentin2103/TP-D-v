-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 23 oct. 2019 à 11:53
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `bug`
--

-- --------------------------------------------------------

--
-- Structure de la table `bug`
--

CREATE TABLE `bug` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci NOT NULL,
  `createAt` date NOT NULL DEFAULT current_timestamp(),
  `closed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `bug`
--

INSERT INTO `bug` (`id`, `titre`, `desc`, `createAt`, `closed`) VALUES
(1, 'Crash App', 'Explorer s\'ouvre puis se ferme directement', '2019-09-17', 0),
(2, 'PC lent', 'Le PC mets 2h60 à s\'allumer', '2019-10-08', 0),
(3, 'Probleme Connexion', 'Impossible de se connecter à internet', '2019-09-23', 0),
(4, 'ça marche ?', 'ajout avec le truc rigolo', '2019-10-04', 0),
(8, 'testpoopo', 'opopopo', '2019-10-21', 0),
(9, 'Retest', 'Normalement ça marche\r\n', '2019-10-21', 0),
(10, 'retest aprem', 'normaly it\'s ok', '2019-10-21', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `bug`
--
ALTER TABLE `bug`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `bug`
--
ALTER TABLE `bug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
