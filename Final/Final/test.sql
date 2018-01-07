-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 07 jan. 2018 à 20:33
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `picture` text,
  `trailer` text,
  `overall_rating` double DEFAULT NULL,
  `type` enum('Movie','Serie') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `items`
--

INSERT INTO `items` (`id`, `name`, `year`, `picture`, `trailer`, `overall_rating`, `type`) VALUES
(1, 'Batman Begins', 2005, 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTM3OTc0MzM2OV5BMl5BanBnXkFtZTYwNzUwMTI3._V1_.jpg', 'https://www.youtube.com/embed/vak9ZLfhGnQ', 2.5, 'Movie'),
(2, 'Batman: The Dark Knight', 2008, 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SY1000_CR0,0,675,1000_AL_.jpg', 'https://www.youtube.com/embed/EXeTwQWrcwY', 5, 'Movie'),
(3, 'Game of Thrones', 2011, 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTY3ZDZiNGItOGQwMi00MTEzLTg1YzYtODE3OGUxMTg5MjA4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SY1000_SX675_AL_.jpg', 'https://www.youtube.com/embed/giYeaKsXnsI', 2.5, 'Serie'),
(4, 'Pokemon', 1995, 'https://vignette.wikia.nocookie.net/soundeffects/images/1/1e/Pokemon_Cover.png/revision/latest?cb=20151025055352', 'https://www.youtube.com/embed/r12w4iRBLp4', 0, 'Serie');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `thumbs_up` int(11) DEFAULT NULL,
  `thumbs_down` int(11) DEFAULT NULL,
  `avatar` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `id_item`, `review`, `rating`, `time`, `thumbs_up`, `thumbs_down`, `avatar`) VALUES
(1, 'BatmanFan', 2, 'I really love Batman! Favorite Hero!', 5, '2018-01-07 20:29:28', 1, 0, 'https://avatarfiles.alphacoders.com/717/71761.jpg'),
(2, 'BatmanFanatic', 2, 'He is my favorite too!', 5, '2018-01-07 20:31:39', 0, 0, 'https://i.ytimg.com/vi/FEZLYYeECtc/maxresdefault.jpg'),
(3, 'PokemonHater', 4, 'I hate Pokemon!', 0, '2018-01-07 20:33:07', 0, 1, 'https://archive-media-0.nyafuu.org/vp/image/1400/89/1400892338689.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
