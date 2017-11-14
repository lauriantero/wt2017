-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14.11.2017 klo 22:47
-- Palvelimen versio: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testi`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `picture` text,
  `trailer` text,
  `overall_rating` double DEFAULT NULL,
  `overall_reviews` int(11) DEFAULT NULL,
  `type` enum('movies','series') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `items`
--

INSERT INTO `items` (`id`, `name`, `year`, `picture`, `trailer`, `overall_rating`, `overall_reviews`, `type`) VALUES
(1, 'Batman Begins', 2005, 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTM3OTc0MzM2OV5BMl5BanBnXkFtZTYwNzUwMTI3._V1_.jpg', '', 0, 0, 'movies'),
(2, 'Batman: The Dark Knight', 2008, 'https://images-na.ssl-images-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_SY1000_CR0,0,675,1000_AL_.jpg', NULL, NULL, NULL, 'movies'),
(3, 'Game of Thrones', 2011, 'https://images-na.ssl-images-amazon.com/images/M/MV5BNTY3ZDZiNGItOGQwMi00MTEzLTg1YzYtODE3OGUxMTg5MjA4XkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_SY1000_SX675_AL_.jpg', NULL, NULL, NULL, 'series');

-- --------------------------------------------------------

--
-- Rakenne taululle `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `id_item` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `thumbs_up` int(11) DEFAULT NULL,
  `thumbs_down` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `reviews`
--

INSERT INTO `reviews` (`id`, `author`, `id_item`, `review`, `rating`, `time`, `thumbs_up`, `thumbs_down`) VALUES
(1, 'Gotham4ever', 1, 'I love Batman! I am so happy that they have decided to keep the story alive with new Batman movies!\r\n\r\n9/10 stars.', 9, '0000-00-00 00:00:00', NULL, NULL),
(2, 'ImGonnaRuinYourDay', 1, 'I loved the movie and the actors, but I feel very offended that this movie is called Batman instead of Batperson.\r\n\r\nActually it is aswell demeaning towards Bats, the movie should be only called person.\r\n\r\nBecause of this, I can only give:\r\n\r\n2/10 stars.', 2, '0000-00-00 00:00:00', NULL, NULL),
(3, 'Gotham4ever', 2, 'Batman is the Best now and always! I wish I lived in Gotham City <3\r\n\r\n10/10 stars!', 10, '0000-00-00 00:00:00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Rajoitteet vedostauluille
--

--
-- Rajoitteet taululle `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`id_item`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
