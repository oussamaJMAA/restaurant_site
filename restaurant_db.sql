-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 15 mai 2021 à 16:54
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `restaurant_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id_Form` int(11) NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `contenu`, `id_Form`, `id_User`) VALUES
(29, 'dd', 21, 74),
(31, 'daz', 22, 75),
(32, 'zzz', 22, 75),
(33, 'frf', 22, 75),
(34, 'fezfz', 23, 75),
(35, 'azff', 23, 75);

-- --------------------------------------------------------

--
-- Structure de la table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `Date` date NOT NULL,
  `id_User` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `form`
--

INSERT INTO `form` (`id`, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`) VALUES
(22, 'dza', '1.jpg', 'dza', 1, '2021-05-15', 74),
(23, 'dazdad', '2.jpg', 'dzadzadaz', 0, '2021-05-15', 74);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_Form` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likes`
--

INSERT INTO `likes` (`id`, `id_User`, `id_Form`) VALUES
(9, 74, 21),
(10, 75, 22);

-- --------------------------------------------------------

--
-- Structure de la table `plat`
--

CREATE TABLE `plat` (
  `id_plat` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `plat`
--

INSERT INTO `plat` (`id_plat`, `nom`, `image`, `description`, `prix`) VALUES
(1, 'Thiep a la viande', '1.jpg', 'brisure de riz , agneau, sause aux oignons', 20.29),
(2, 'Maffe de boeuf', '2.jpg', 'Riz,Boeuf tomate a l\'archide,manioc,carottes', 35);

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promo` int(11) NOT NULL,
  `val_promo` int(11) NOT NULL,
  `date_activation` date NOT NULL,
  `date_expiration` date NOT NULL,
  `id_plat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) UNSIGNED NOT NULL,
  `nom` varchar(15) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `verification` varchar(50) DEFAULT 'pending',
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `role`, `location`, `caption`, `verification`, `gender`) VALUES
(9, 'admin', 'admin', 'admin.admin@admin.admin', 'admin', 'admin', 'admin', '', '', 'pending', ''),
(53, 'jmaa', 'oussama', 'jemaaoussama64@gmail.com', 'user1', '123456789', '', '', '', 'pending', ''),
(54, 'Jmaa', 'fathi', 'oussamajemaa@yahoo.com', 'user2', '123456789', '', '', '', 'pending', ''),
(69, 'Jmaa', 'Roukaia', 'roukaia70@gmail.com', 'user3', '123456789', '', '', '', 'pending', ''),
(74, 'AZER', 'AZER', 'dzad@esprit.tn', 'AZER123', '$2y$10$n7N5wReCXSuXPnexilaDjOfhanqup8UNtr3BuU7wt9tYhq7lK2oZK', '', '', '', 'pending', 'Male'),
(75, 'TEST1', 'TEST1', 'TEST1@ESPRIT.TN', 'TEST1', '$2y$10$BmgV6cmVNvSYFw/KEkccLeq6UUoPEReT14xzuGVVQA6dqu1nJEMcS', '', '', '', 'pending', 'Female');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_User`),
  ADD KEY `fk_form_id` (`id_Form`);

--
-- Index pour la table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`id_User`),
  ADD KEY `fk_Form_id` (`id_Form`);

--
-- Index pour la table `plat`
--
ALTER TABLE `plat`
  ADD PRIMARY KEY (`id_plat`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promo`),
  ADD UNIQUE KEY `id_plat` (`id_plat`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `plat`
--
ALTER TABLE `plat`
  MODIFY `id_plat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plat` (`id_plat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
