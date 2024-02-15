-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 04 déc. 2023 à 14:08
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetpersovolleyball`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id_adherent` int(11) NOT NULL,
  `civilite` varchar(20) DEFAULT NULL,
  `nom_adherent` varchar(50) DEFAULT NULL,
  `prenom_adherent` varchar(50) DEFAULT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `num_licence` varchar(10) NOT NULL,
  `tel_adherent` varchar(20) DEFAULT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_postal` char(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateDeNaissance` date DEFAULT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`id_adherent`, `civilite`, `nom_adherent`, `prenom_adherent`, `pseudo`, `num_licence`, `tel_adherent`, `adresse`, `code_postal`, `email`, `dateDeNaissance`, `id_equipe`) VALUES
(1, 'F', 'Marie', 'Isabelle', 'Isabella', '1633181', '0231378670', 'rue Maxence Van Der Meersch', '14470', 'PB@gmail.com', '2023-12-13', 0),
(5, 'F', 'Marie', 'Isabelle', 'Isabella', '2633181', '0231378670', 'rue Maxence Van Der Meersch', '14470', 'PB@gmail.com', '2023-12-28', 0);

-- --------------------------------------------------------

--
-- Structure de la table `encadrant`
--

CREATE TABLE `encadrant` (
  `id_encadrant` int(11) NOT NULL,
  `nom_encadrant` varchar(50) NOT NULL,
  `prenom_encadrant` varchar(50) NOT NULL,
  `num_licence` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `equipes`
--

CREATE TABLE `equipes` (
  `id_equipe` int(11) NOT NULL,
  `nom_equipe` varchar(50) NOT NULL,
  `id_encadrant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

CREATE TABLE `villes` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id_adherent`),
  ADD UNIQUE KEY `num_licence` (`num_licence`),
  ADD KEY `id_equipe` (`id_equipe`);

--
-- Index pour la table `encadrant`
--
ALTER TABLE `encadrant`
  ADD PRIMARY KEY (`id_encadrant`),
  ADD UNIQUE KEY `num_licence` (`num_licence`);

--
-- Index pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `id_encadrant` (`id_encadrant`);

--
-- Index pour la table `villes`
--
ALTER TABLE `villes`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id_adherent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `encadrant`
--
ALTER TABLE `encadrant`
  MODIFY `id_encadrant` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `equipes`
--
ALTER TABLE `equipes`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `villes`
--
ALTER TABLE `villes`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `encadrant`
--
ALTER TABLE `encadrant`
  ADD CONSTRAINT `encadrant_ibfk_1` FOREIGN KEY (`num_licence`) REFERENCES `adherent` (`num_licence`);

--
-- Contraintes pour la table `equipes`
--
ALTER TABLE `equipes`
  ADD CONSTRAINT `equipes_ibfk_1` FOREIGN KEY (`id_encadrant`) REFERENCES `encadrant` (`id_encadrant`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
