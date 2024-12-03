-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 jan. 2022 à 11:53
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

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

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `id_ingredient` int(11) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `id_recette` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`id_ingredient`, `ingredient`, `quantite`, `id_recette`) VALUES
(1, 'pomme', '5g', 55),
(2, 'pomme', '5g', 8),
(3, 'poire', '7e', 8),
(4, 'pomme', '5g', 8),
(5, 'poire', '7e', 8),
(6, 'pomme', '5g', 8),
(7, 'Claudia', '6g', 8),
(8, 'pomme', '5g', 8),
(9, 'pomme', '5g', 8),
(10, 'pomme', '5g', 8),
(11, '', '', 8),
(12, 'pomme', '56s', 8),
(13, 'Claudia', '55g', 8),
(14, 'pomme', '56s', 8),
(15, 'Claudia', '55g', 8),
(16, 'pomme', '5g', 9),
(17, 'pomme', '5g', 10),
(18, 'pomme', '5g', 11),
(19, '', '', 12),
(20, 'pomme', '5g', 13),
(21, 'sucre', '8000kg', 13),
(22, '^po', '53', 14),
(23, '', '', 2),
(24, 'pomme', '5g', 3);

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE `option` (
  `option` varchar(20) NOT NULL,
  `name` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `option`
--

INSERT INTO `option` (`option`, `name`) VALUES
('Sans sucre', 'ss'),
('Végétarien', 'VG');

-- --------------------------------------------------------

--
-- Structure de la table `optionjoin`
--

CREATE TABLE `optionjoin` (
  `recipeID` int(5) NOT NULL,
  `opt` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `optionjoin`
--

INSERT INTO `optionjoin` (`recipeID`, `opt`) VALUES
(2, 'VG'),
(3, 'VG'),
(4, 'VG'),
(5, 'VG'),
(6, 'VG'),
(7, 'VG'),
(8, 'VG'),
(9, 'VG'),
(10, 'ss'),
(10, 'VG'),
(72, 'ss'),
(72, 'VG');

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `id` int(5) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `difficulty` varchar(11) NOT NULL,
  `prepTime` time NOT NULL,
  `cookTime` time NOT NULL DEFAULT '00:00:00',
  `restTime` time NOT NULL DEFAULT '00:00:00',
  `steps` int(5) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `servings` int(3) NOT NULL,
  `kcal` int(5) DEFAULT NULL,
  `history` text NOT NULL,
  `region` varchar(100) NOT NULL,
  `nbrComments` int(5) DEFAULT 0,
  `rating` float DEFAULT NULL,
  `nbrVotes` int(6) NOT NULL DEFAULT 0,
  `categorie` varchar(255) NOT NULL,
  `cuiss` varchar(255) NOT NULL,
  `userID` int(5) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `imgName` varchar(50) DEFAULT NULL
) ;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `title`, `difficulty`, `prepTime`, `cookTime`, `restTime`, `steps`, `cost`, `servings`, `kcal`, `history`, `region`, `nbrComments`, `rating`, `nbrVotes`, `categorie`, `cuiss`, `userID`, `date`, `imgName`) VALUES
(1, 'Pancake farine de châtaigne et lait végétal', 'Facile', '00:15:00', '00:05:00', '00:00:00', 5, 'Pas chère', 4, 524, 'Une super recette de pancakes à la bretonne !\r\nSuper recette pour un petit déjeuner de qualité ;)', '', 2, 4.8, 700, '', '', 0, '2021-12-28', 'Pancake.jpg'),
(9, 'Tarte au sucre', 'Facile', '00:15:00', '00:30:00', '00:05:00', 0, 'Abordable', 2, NULL, 'La tarte au sucre est une recette facile à faire, et qui fait toujours son effet aux goûters', 'auvergne-rhone-alpes', 0, NULL, 0, 'dessert', 'Four', 5, '2021-12-28', 'tarte.jpg'),
(10, 'Salade aux champignons', 'Débutant', '00:20:00', '00:00:00', '00:00:00', 0, 'Abordable', 6, NULL, 'Cette salade est parfaite si vous manquez de temps et que vous souhaitez manger équilibré. Vous pouvez éventuellement ajouter de la levure, cela rajoute de la consistance et du gout.', 'nouvelle-aquitaine', 0, NULL, 0, 'entree', 'Sans cuisson', 5, '2022-01-03', 'recette-salade-de-champignons-de-paris.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipeID` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` int(5) NOT NULL,
  `measure` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipeID`, `id`, `name`, `amount`, `measure`) VALUES
(1, 1, 'Farine', 150, 'g'),
(1, 2, 'Lait', 20, 'cl'),
(31, 32, '', 0, ''),
(32, 33, '', 0, ''),
(33, 34, '', 0, ''),
(34, 35, '', 0, ''),
(35, 36, '', 0, ''),
(36, 37, '', 0, ''),
(37, 38, '', 0, ''),
(38, 39, '', 0, ''),
(39, 40, '', 0, ''),
(40, 41, '', 0, ''),
(41, 42, '', 0, ''),
(42, 43, '', 0, ''),
(43, 44, '', 0, ''),
(44, 45, '', 0, ''),
(45, 46, '', 0, ''),
(46, 47, '', 0, ''),
(47, 48, '', 0, ''),
(48, 49, '', 0, ''),
(49, 50, '', 0, ''),
(50, 51, '', 0, ''),
(51, 52, '', 0, ''),
(52, 53, '', 0, ''),
(53, 54, '', 0, ''),
(54, 55, '', 0, ''),
(55, 56, '', 0, ''),
(56, 57, '', 0, ''),
(57, 58, '', 0, ''),
(58, 59, '', 0, ''),
(59, 60, '', 0, ''),
(60, 61, '', 0, ''),
(61, 62, '', 0, ''),
(62, 63, '', 0, ''),
(63, 64, '', 0, ''),
(64, 65, '', 0, ''),
(65, 66, '', 0, ''),
(66, 67, '', 0, ''),
(67, 68, '', 0, ''),
(68, 69, '', 0, ''),
(69, 70, '', 0, ''),
(70, 71, '', 0, ''),
(71, 72, '', 0, ''),
(72, 73, '', 0, ''),
(73, 74, '', 0, ''),
(2, 75, 'Sucre', 500, 'g'),
(2, 76, 'Pate à tarte', 1, ''),
(3, 77, 'Sucre', 500, 'g'),
(3, 78, 'Pate à tarte', 1, ''),
(4, 79, 'Sucre', 500, 'g'),
(4, 80, 'Pate à tarte', 1, ''),
(5, 81, 'Sucre', 500, 'g'),
(5, 82, 'Pate à tarte', 1, ''),
(6, 83, 'Sucre', 500, 'g'),
(6, 84, 'Pate à tarte', 1, ''),
(7, 85, 'Sucre', 500, 'g'),
(7, 86, 'Pate à tarte', 1, ''),
(8, 87, 'Sucre', 500, 'g'),
(8, 88, 'Pate à tarte', 1, ''),
(9, 89, 'Sucre', 500, 'g'),
(9, 90, 'Pate à tarte', 1, ''),
(10, 91, 'salade', 1, ''),
(10, 92, 'champignons', 200, 'g'),
(10, 93, 'vinaigrette', 3, 'cuill');

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
(1, 5, 'Lorsque les bulles apparaissent et éclatent, retournez les pancakes et poursuivrez la cuisson 1 min sur l\'autre face.'),
(2, 1, 'étaler la pate'),
(2, 2, 'mettre le sucre'),
(2, 3, 'mettre au four'),
(3, 1, 'étaler la pate'),
(3, 2, 'mettre le sucre'),
(3, 3, 'mettre au four'),
(4, 1, 'étaler la pate'),
(4, 2, 'mettre le sucre'),
(4, 3, 'mettre au four'),
(5, 1, 'étaler la pate'),
(5, 2, 'mettre le sucre'),
(5, 3, 'mettre au four'),
(6, 1, 'étaler la pate'),
(6, 2, 'mettre le sucre'),
(6, 3, 'mettre au four'),
(7, 1, 'étaler la pate'),
(7, 2, 'mettre le sucre'),
(7, 3, 'mettre au four'),
(8, 1, 'étaler la pate'),
(8, 2, 'mettre le sucre'),
(8, 3, 'mettre au four'),
(9, 1, 'étaler la pate'),
(9, 2, 'mettre le sucre'),
(9, 3, 'mettre au four'),
(10, 1, 'laver la salade'),
(10, 2, 'couper les champignons'),
(10, 3, 'mélanger les champignons et la salade'),
(10, 4, 'ajouter la vinaigrette'),
(31, 1, ''),
(32, 1, ''),
(33, 1, ''),
(34, 1, ''),
(35, 1, ''),
(36, 1, ''),
(37, 1, ''),
(38, 1, ''),
(39, 1, ''),
(40, 1, ''),
(41, 1, ''),
(42, 1, ''),
(43, 1, ''),
(44, 1, ''),
(45, 1, ''),
(46, 1, ''),
(47, 1, ''),
(48, 1, ''),
(49, 1, ''),
(50, 1, ''),
(51, 1, ''),
(52, 1, ''),
(53, 1, ''),
(54, 1, ''),
(55, 1, ''),
(56, 1, ''),
(57, 1, ''),
(58, 1, ''),
(59, 1, ''),
(60, 1, ''),
(61, 1, ''),
(62, 1, ''),
(63, 1, ''),
(64, 1, ''),
(65, 1, ''),
(66, 1, ''),
(67, 1, ''),
(68, 1, ''),
(69, 1, ''),
(70, 1, ''),
(71, 1, ''),
(72, 1, ''),
(73, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT current_timestamp(),
  `sexe` varchar(1) NOT NULL,
  `date_naiss` date DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `pseudo`, `email`, `password`, `token`, `date_inscription`, `sexe`, `date_naiss`, `description`) VALUES
(1, 'gabinho69', 'gabin.odin69@gmail.com', '$2y$10$.g0G3jVBfIOc189Y8tPSNOMc870Bntpx/B7NN.Gfdz3tnMFUEMfJy', 'ed85521c7f5898503027214887fdbb0eac943eba7abe05f862854f74af0da164eaff329469967b8157b18ddee345d5e79b13b5c59a1e47ebf2ecfab91448725f', '2021-10-31 16:59:10', 'H', '2003-01-11', 'olalalalalalala'),
(2, 'azerty69', 'azerty@gmail.com', '$2y$10$0k9II5nS8eSpzizW43Lee.Z9srWT/p4sdJxzx5QTdQsrwZGyN81aG', '', '2021-10-31 21:49:06', '', NULL, ''),
(3, 'rtyu', 'rtyu@gmail.com', '$2y$10$nubn6wpYP7QOkekhiVIJM.U33fx/xoVj3worRE2zACm4hLijkhDXm', '', '2021-11-22 13:29:11', '', NULL, ''),
(4, 'test', 'test@gmail.com', '$2y$10$3pG9o8H5Hzbz68UAQnMF9e67CVOcf/6pJCTOzfxhO69yWJypj2Ele', '', '2021-12-12 12:21:43', 'F', '2005-10-06', 'Je suis un test'),
(5, 'toto', 'toto@toto.com', '$2y$10$hCtstQFRSK19k7t/FhidtuGzRcDl0yHL7zC.0UGdmxR0AO7lpy4YK', '', '2021-12-22 00:05:39', 'H', '2021-12-08', 'Je suis toto');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_ingredient`);

--
-- Index pour la table `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`option`);

--
-- Index pour la table `optionjoin`
--
ALTER TABLE `optionjoin`
  ADD PRIMARY KEY (`recipeID`,`opt`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `steps`
--
ALTER TABLE `steps`
  ADD PRIMARY KEY (`recipeID`,`stepNbr`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
