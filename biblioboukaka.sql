-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 12 avr. 2024 à 15:56
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `biblioboukaka`
--

-- --------------------------------------------------------

--
-- Structure de la table `librairies`
--

CREATE TABLE `librairies` (
  `numeroLibrairie` smallint(5) UNSIGNED NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `responsable` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `librairies`
--

INSERT INTO `librairies` (`numeroLibrairie`, `nom`, `adresse`, `telephone`, `responsable`) VALUES
(1, 'L\'Armitière', '88 Rue Jeanne d\'Arc 76000 Rouen', '02 35 70 57 42', 'Matthieu de Montchalin'),
(2, 'FNAC', '8 allées Eugène Delacroix 76000 Rouen', '0892 35 04 05', 'Martin Nouvelet');

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `numeroLivre` smallint(5) UNSIGNED NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(128) NOT NULL,
  `anneePub` smallint(5) NOT NULL,
  `genre` varchar(32) NOT NULL,
  `etat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `livres`
--

INSERT INTO `livres` (`numeroLivre`, `titre`, `auteur`, `anneePub`, `genre`, `etat`) VALUES
(1, 'Capitaine Fracasse ', 'Théophile Gautier ', 1863, 'roman', 1),
(2, 'Les Fleurs du Mal ', 'Charles Baudelaire', 1857, 'poésie', 0),
(3, 'Les paradis artificiels', 'Charles Baudelaire', 1860, 'poésie', 0),
(5, 'Invitation au voyage', 'Charles Baudelaire', 1858, 'poésie', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vendre`
--

CREATE TABLE `vendre` (
  `numeroVendre` smallint(5) UNSIGNED NOT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `nombre` smallint(5) DEFAULT NULL,
  `numeroLibrairie` smallint(5) UNSIGNED DEFAULT NULL,
  `numeroLivre` smallint(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `vendre`
--

INSERT INTO `vendre` (`numeroVendre`, `prix`, `nombre`, `numeroLibrairie`, `numeroLivre`) VALUES
(1, '5.80', 24, 1, 1),
(2, '13.69', 26, 1, 2),
(3, '6.20', 55, 2, 1),
(4, '7.50', 153, 2, 2),
(5, '16.00', 4, 2, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `librairies`
--
ALTER TABLE `librairies`
  ADD PRIMARY KEY (`numeroLibrairie`);

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD PRIMARY KEY (`numeroLivre`);

--
-- Index pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD PRIMARY KEY (`numeroVendre`),
  ADD KEY `numeroLibrairie` (`numeroLibrairie`),
  ADD KEY `numeroLivre` (`numeroLivre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `librairies`
--
ALTER TABLE `librairies`
  MODIFY `numeroLibrairie` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `livres`
--
ALTER TABLE `livres`
  MODIFY `numeroLivre` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vendre`
--
ALTER TABLE `vendre`
  MODIFY `numeroVendre` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vendre`
--
ALTER TABLE `vendre`
  ADD CONSTRAINT `vendre_ibfk_1` FOREIGN KEY (`numeroLibrairie`) REFERENCES `librairies` (`numeroLibrairie`),
  ADD CONSTRAINT `vendre_ibfk_2` FOREIGN KEY (`numeroLivre`) REFERENCES `livres` (`numeroLivre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
