-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 03 Mars 2017 à 16:59
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `followtasks`
--

-- --------------------------------------------------------

--
-- Structure de la table `columns`
--

CREATE TABLE `columns` (
  `column_id` int(11) NOT NULL,
  `column_label` varchar(75) NOT NULL,
  `column_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `columns`
--

INSERT INTO `columns` (`column_id`, `column_label`, `column_order`) VALUES
(1, 'A faire', 1),
(2, 'En cours', 2),
(3, 'Terminé', 3),
(4, 'Bugs / Retours', 4);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_description` varchar(250) NOT NULL,
  `task_column_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_description`, `task_column_id`) VALUES
(1, 'Faire le CRUD pour les tâches', 3),
(3, 'Faire une mise à jour de la base de données', 2),
(4, 'Test update description with modal', 1),
(6, 'Refaire le modele ', 1),
(7, 'Mettre en pré-production pour finaliser les tests', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `columns`
--
ALTER TABLE `columns`
  ADD PRIMARY KEY (`column_id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `columns`
--
ALTER TABLE `columns`
  MODIFY `column_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
