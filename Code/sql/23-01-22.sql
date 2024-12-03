-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 23 jan. 2022 à 15:28
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

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
('Sans arachides', 'AR'),
('Sans boeuf', 'BO'),
('Sans fruits à coque', 'FC'),
('Sans fruits de mer', 'FM'),
('Sans lactose', 'SL'),
('Sans poisson', 'PO'),
('Sans porc', 'SP'),
('Sans sucre', 'ss'),
('Végane', 'VN'),
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
(23, 'ss'),
(24, 'SP'),
(24, 'VG');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`id`, `title`, `difficulty`, `prepTime`, `cookTime`, `restTime`, `steps`, `cost`, `servings`, `kcal`, `history`, `region`, `nbrComments`, `rating`, `nbrVotes`, `categorie`, `cuiss`, `userID`, `date`, `imgName`) VALUES
(1, 'Pancake farine de châtaigne et lait végétal', 'Facile', '00:15:00', '00:05:00', '00:00:00', 5, 'Pas chère', 4, 524, 'Une super recette de pancakes à la bretonne !\r\nSuper recette pour un petit déjeuner de qualité ;)', 'ile-de-france', 2, 4.8, 700, '', '', 0, '2021-12-28', 'Pancake.jpg'),
(9, 'Tarte au sucre', 'Facile', '00:15:00', '00:30:00', '00:05:00', 0, 'Abordable', 2, NULL, 'La tarte au sucre est une recette facile à faire, et qui fait toujours son effet aux goûters', 'auvergne-rhone-alpes', 0, NULL, 0, 'dessert', 'Four', 5, '2021-12-28', 'tarte.jpg'),
(10, 'Salade aux champignons', 'Débutant', '00:20:00', '00:00:00', '00:00:00', 0, 'Abordable', 6, NULL, 'Cette salade est parfaite si vous manquez de temps et que vous souhaitez manger équilibré. Vous pouvez éventuellement ajouter de la levure, cela rajoute de la consistance et du gout.', 'nouvelle-aquitaine', 0, NULL, 0, 'entree', 'Sans cuisson', 5, '2022-01-03', 'recette-salade-de-champignons-de-paris.jpg'),
(12, 'Gougère bourguignonne', 'Complexe', '00:20:00', '00:45:00', '00:00:00', 0, 'Abordable', 5, NULL, 'C\'est une recette qui vient de bonne maman. Elle est originaire de Dijon, et l\'avait elle même reçus de sa grand mère.', 'auvergne-rhone-alpes', 0, NULL, 0, 'plat', 'Four', 5, '2022-01-06', 'gougere.jpg'),
(24, 'Cannelés bordelais rapides', 'Amateur', '00:15:00', '01:00:00', '01:00:00', 0, 'Abordable', 7, NULL, 'S’il y a bien une pâtisserie à laquelle on pense quand on évoque la région bordelaise : c’est le canelé. Je le conseille 1000 fois à tous ceux qui rechercherais à cuisiner bordelais !', 'nouvelle-aquitaine', 0, NULL, 0, 'dessert', 'Four', 5, '2022-01-23', 'canellé.png');

-- --------------------------------------------------------

--
-- Structure de la table `recipe_ingredients`
--

CREATE TABLE `recipe_ingredients` (
  `recipeID` int(5) NOT NULL,
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` float NOT NULL,
  `measure` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `recipe_ingredients`
--

INSERT INTO `recipe_ingredients` (`recipeID`, `id`, `name`, `amount`, `measure`) VALUES
(1, 1, 'Farine', 150, 'g'),
(1, 2, 'Lait', 20, 'cl'),
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
(10, 93, 'vinaigrette', 3, 'cuill'),
(12, 94, 'eau', 325, 'g'),
(16, 101, '', 0, ''),
(17, 102, '', 0, ''),
(18, 103, '', 0, ''),
(24, 111, 'lait', 500, 'milli'),
(24, 112, 'sel', 1, 'pincé'),
(24, 113, 'oeuf entier', 2, ''),
(24, 114, 'jaune d\'oeuf', 2, ''),
(24, 115, 'vanille', 1, 'gouss'),
(24, 116, 'rhum', 2, 'cuill'),
(24, 117, 'farine', 100, 'gramm'),
(24, 118, 'sucre', 250, 'gramm'),
(24, 119, 'beurre', 50, 'gramm');

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
(13, 1, 'C\'est un test'),
(13, 2, 'Ah bon ?'),
(13, 3, 'oui oui'),
(14, 1, ''),
(15, 1, ''),
(16, 1, ''),
(17, 1, ''),
(18, 1, ''),
(19, 1, ''),
(20, 1, 'Faire bouillir le lait avec la vanille et le beurre.'),
(21, 1, 'Faire bouillir le lait avec la vanille et le beurre.'),
(22, 1, 'Faire bouillir le lait avec la vanille et le beurre.'),
(23, 1, 'Faire bouillir le lait avec la vanille et le beurre.'),
(24, 1, 'Faire bouillir le lait avec la vanille et le beurre.'),
(24, 2, 'Pendant ce temps, mélanger la farine, le sucre puis incorporer les œufs d\'un seul coup, verser ensuite le lait bouillant.'),
(24, 3, 'Mélanger doucement afin d\'obtenir une pâte fluide comme une pâte à crêpes, laisser refroidir, puis ajouter le rhum. Placer au réfrigérateur une heure.'),
(24, 4, 'Préchauffer le four à thermostat 10 (270°C) avec la tôle sur laquelle cuiront les cannelés.'),
(24, 5, 'Verser la pâte bien refroidie dans les moules bien beurrés, en ne les remplissant qu\'à moitié ; rapidement, disposer les cannelés sur la tôle du four chaud pendant 5 minutes, puis baisser le thermostat à 6 (180°C) et continuer la cuisson pendant 1 heure :'),
(24, 6, 'Pour finir Si ce sont des moules en cuivre, les démouler chauds mais si ce sont des moules en silicone démouler froid (cela évite qu\'ils se déforment).');

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
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `recipe_ingredients`
--
ALTER TABLE `recipe_ingredients`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
