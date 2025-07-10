-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 10 juil. 2025 à 11:26
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
-- Base de données : `boutique_en_ligne`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total` float NOT NULL,
  `statut` varchar(100) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commandes_par_produits`
--

CREATE TABLE `commandes_par_produits` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantité` int(11) NOT NULL,
  `prix_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix_unitaire` float NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `url_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix_unitaire`, `description`, `type`, `url_img`) VALUES
(1, 'Fraise', 1, 'dsfdfshfdh', 'fruit', 'tp-boutique_en_ligne/public/images/fraise.jpg'),
(2, 'Pomme de terre', 2, 'Pomme de terre super chouette', 'legume', 'tp-boutique_en_ligne/public/images/patate.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `admin`) VALUES
(1, 'Gateau', 'Elodie', 'elodie.gateau.raffeneau@gmail.com', '$2y$10$mua7V8LALr5cpbznGTxT6.xOZ0pHaAfce5Vh1pOhLx5vqXJ0SX24O', NULL),
(4, 'Vertueux', 'Maxime', 'maxime@example.com', '$2y$10$eRpE0uBGSNVoVOcjQF9GM.BSfIrGminfxSU4/C9zPz.iHN.MguMoW', NULL),
(6, 'test', 'test', 'test@mail.com', '$2y$10$WEgwgs7nscdyLZ6lI03bs.IBIO89y/O22ImlC7aLPvy0AmsZzxRIi', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `commandes_par_produits`
--
ALTER TABLE `commandes_par_produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produit` (`id_produit`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commandes_par_produits`
--
ALTER TABLE `commandes_par_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commandes_par_produits`
--
ALTER TABLE `commandes_par_produits`
  ADD CONSTRAINT `commandes_par_produits_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `commandes_par_produits_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
