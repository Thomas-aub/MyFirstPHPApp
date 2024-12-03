-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 déc. 2021 à 17:12
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `compte`
--

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
(3, 'rtyu', 'rtyu@gmail.com', '$2y$10$nubn6wpYP7QOkekhiVIJM.U33fx/xoVj3worRE2zACm4hLijkhDXm', '', '2021-11-22 13:29:11', '', NULL, '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
