-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 01 Avril 2017 à 15:37
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `energie_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `releves`
--

CREATE TABLE `releves` (
  `id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `sites`
--

INSERT INTO `sites` (`id`, `name`, `type`, `latitude`, `longitude`) VALUES
(20, 'Rue de Toul', 1, 50.6346784, 3.0458889),
(21, 'Johan', 1, 789, 3.0458889),
(22, 'Aritat', 0, 50.6346784, 3.0458889),
(23, 'Kopteach', 1, 789, 3.0458889),
(24, 'azezae', 0, 987, 987);

-- --------------------------------------------------------

--
-- Structure de la table `transports`
--

CREATE TABLE `transports` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `producer_site_id` int(11) NOT NULL,
  `consumer_site_id` int(11) NOT NULL,
  `debit_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `transports`
--

INSERT INTO `transports` (`id`, `name`, `producer_site_id`, `consumer_site_id`, `debit_max`) VALUES
(4, 'sredgfhbj', 20, 21, 546),
(16, 'Jean', 20, 24, 897),
(17, 'Kopteach', 20, 22, 897),
(31, 'Kopteach', 20, 22, 897),
(32, 'Kopteach', 21, 22, 897),
(33, 'Marion', 21, 22, 897),
(34, 'Kopteach', 20, 24, 897);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'a@a.com', '$2y$10$oGzzkN9DkL.9e0irzudzgeOezR7xkIG3.U5bfBF5GO9SG5ai60nle'),
(2, 'test@test.com', '$2y$10$A6diBxEOkHL2ALhD6JLOd.TUcN2scTpNhbYsZLIDe9zpO4DiHiuxu'),
(3, 'b@b.com', '$2y$10$jucGWrg/1GLbxqyik5Mfau61gSnUoC3tT3pV6XiFQF4rMU9FVuyiS'),
(4, 'c@c.com', '$2y$10$T2mbUsE4fsIw8TW4tLerpuKsrtdhsIqmQxaoBFb6wAewctFoHhVnm'),
(5, 'd@d.com', '$2y$10$6GsKBKneuvniNIIs9CN/oexIShZODWQF7wq0f0GuW.VfTMF1/INyy'),
(6, 'v@v.com', '$2y$10$CCey8UqDv5331J78j70xhOrESUBboEfsVtCeC91HOJ2W.5VGe0Nmy');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `releves`
--
ALTER TABLE `releves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `site_key` (`site_id`);

--
-- Index pour la table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transports`
--
ALTER TABLE `transports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumer_site_id_2` (`consumer_site_id`),
  ADD KEY `producer_site_id` (`producer_site_id`,`consumer_site_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `releves`
--
ALTER TABLE `releves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `transports`
--
ALTER TABLE `transports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
