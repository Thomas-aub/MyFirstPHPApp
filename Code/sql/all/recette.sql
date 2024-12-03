-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 13 déc. 2021 à 12:08
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `inser`
--

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `difficulty` varchar(11) NOT NULL,
  `prepTime` time NOT NULL,
  `cookTime` time NOT NULL,
  `restTime` time NOT NULL,
  `steps` int(5) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `servings` int(3) NOT NULL,
  `kcal` int(5) NOT NULL,
  `history` varchar(255) NOT NULL,
  `region` varchar(100) NOT NULL,
  `nbrComments` int(5) NOT NULL,
  `rating` float NOT NULL,
  `nbrVotes` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `title`, `difficulty`, `prepTime`, `cookTime`, `restTime`, `steps`, `cost`, `servings`, `kcal`, `history`, `region`, `nbrComments`, `rating`, `nbrVotes`) VALUES
(1, 'Pancake farine de châtaigne et lait végétal', 'Facile', '00:15:00', '00:05:00', '00:00:00', 5, 'Pas chère', 4, 524, '', '', 2, 4.8, 700);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
