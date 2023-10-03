-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 03, 2023 at 02:33 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
                           `id` int(11) NOT NULL,
                           `titre` varchar(100) COLLATE utf8mb4_bin NOT NULL,
                           `description` text COLLATE utf8mb4_bin NOT NULL,
                           `categories` int(11) NOT NULL,
                           `id_user` int(11) NOT NULL,
                           `commentaires` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `titre`, `description`, `categories`, `id_user`, `commentaires`) VALUES
    (1, 'zrgergerger', 'gegetrth', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
                             `id` int(11) NOT NULL,
                             `nom` varchar(20) COLLATE utf8mb4_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
    (1, 'Web');

-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `commentaire` (
                               `id` int(11) NOT NULL,
                               `description` text COLLATE utf8mb4_bin NOT NULL,
                               `article` text COLLATE utf8mb4_bin NOT NULL,
                               `id_user` int(11) NOT NULL,
                               `id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `lien_categorie_article`
--

CREATE TABLE `lien_categorie_article` (
                                          `id_article` int(11) NOT NULL,
                                          `id_categorie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
                        `id` int(11) NOT NULL,
                        `email` text COLLATE utf8mb4_bin NOT NULL,
                        `pseudo` varchar(20) COLLATE utf8mb4_bin NOT NULL DEFAULT '',
                        `mdp` varchar(300) COLLATE utf8mb4_bin NOT NULL,
                        `admin` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentaire`
--
ALTER TABLE `commentaire`
    ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
    ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commentaire`
--
ALTER TABLE `commentaire`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
    MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
