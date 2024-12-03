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
-- Structure de la table `steps`
--

CREATE TABLE `steps` (
  `recipeID` int(5) NOT NULL,
  `stepNbr` int(5) NOT NULL,
  `stepDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `steps`
--

INSERT INTO `steps` (`recipeID`, `stepNbr`, `stepDesc`) VALUES
(1, 1, 'Fouettez l’œuf et le sucre dans un saladier. Ajoutez l\'huile'),
(1, 2, 'Mélangez à part la farine et la levure, puis incorporez le mélange à la préparation précédente.'),
(1, 3, 'Ajoutez le lait petit à petit pour éviter les grumeaux.'),
(1, 4, 'Faites chauffer une poêle et à l\'aide d\'une petite louche, déposer des cercles de pâte dans la poêle.'),
(1, 5, 'Lorsque les bulles apparaissent et éclatent, retournez les pancakes et poursuivrez la cuisson 1 min sur l\'autre face.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
