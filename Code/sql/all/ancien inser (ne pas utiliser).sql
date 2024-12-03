

CREATE TABLE `ingredient` (
  `id_ingredient` int(11) NOT NULL,
  `ingredient` varchar(255) NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `id_recette` int(50) NOT NULL
) 

CREATE TABLE `recette` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `port` int(50) NOT NULL,
  `heure_cuiss` int(50) NOT NULL,
  `minute_cuiss` int(50) NOT NULL,
  `heure_prepa` int(50) NOT NULL,
  `minute_prepa` int(50) NOT NULL,
  `heure_rep` int(50) NOT NULL,
  `minute_rep` int(50) NOT NULL,
  `cuiss` varchar(255) NOT NULL,
  `dif` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `histoire` text NOT NULL,
  `region` varchar(255) NOT NULL,
  `temps` int(50) NOT NULL
) 


ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`id_ingredient`);


ALTER TABLE `recette`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `ingredient`
  MODIFY `id_ingredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE `recette`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
