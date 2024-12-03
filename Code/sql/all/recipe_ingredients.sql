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
-- Structure de la table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipeID` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(5) NOT NULL,
  `measure` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipeID`, `id`, `name`, `amount`, `measure`) VALUES
(1, 1, 'Farine', 150, 'g'),
(1, 2, 'Lait', 20, 'cl'),
(1, 3, 'Oeuf', 1, ''),
(1, 4, 'Sucre', 1, 'cas'),
(1, 5, 'Huile de tournesol', 1, 'cas'),
(1, 6, 'Levure chimique', 1, 'cac');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
