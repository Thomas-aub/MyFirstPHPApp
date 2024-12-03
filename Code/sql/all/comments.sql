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
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `recipeID` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `date` date NOT NULL,
  `cDesc` varchar(255) NOT NULL,
  `userID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`recipeID`, `id`, `date`, `cDesc`, `userID`) VALUES
(1, 1, '2021-12-13', 'Pour ma part j\'ai remplacé la farine par 50gr de farine complète et 50gr de flocon d\'avoine et le sucre par du sirop d\'érable... Excellent', 4),
(1, 2, '2021-12-07', 'inutile de mettre du sucre, assez hallucinant comme idée d\'ailleurs : les bananes en comportent + on va sans doute manger les pancakes avec un ingrédient sucré dessus. idem pour le beurre que j\'ai enlevé puisqu\'on cuit déjà dans du gras', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
