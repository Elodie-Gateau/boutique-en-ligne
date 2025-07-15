-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 15 juil. 2025 à 16:53
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

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `id_user`, `total`, `statut`, `date_commande`) VALUES
(20, 23, 21, 'En cours de traitement', '2025-07-15');

-- --------------------------------------------------------

--
-- Structure de la table `commandes_par_produits`
--

CREATE TABLE `commandes_par_produits` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix_total` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commandes_par_produits`
--

INSERT INTO `commandes_par_produits` (`id`, `id_produit`, `id_commande`, `quantite`, `prix_total`) VALUES
(27, 9, 20, 8, 4.80),
(28, 13, 20, 9, 16.20);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prix_unitaire` float(10,2) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `url_img` varchar(255) DEFAULT NULL,
  `statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `prix_unitaire`, `description`, `type`, `url_img`, `statut`) VALUES
(8, 'Pomme', 1.20, 'Pomme croquante, juteuse et légèrement sucrée, idéale pour une collation saine ou une tarte maison.', 'fruit', 'public/images/products/pomme.jpg', 'en ligne'),
(9, 'Banane', 0.60, 'Banane mûre, douce et fondante, parfaite pour un en-cas énergétique ou vos smoothies préférés.', 'fruit', 'public/images/products/banane.jpg', 'en ligne'),
(10, 'Tomate', 0.90, 'Tomate rouge, ferme et pleine de saveur, idéale pour les salades, sandwiches ou sauces maison.', 'fruit', 'public/images/products/tomate.jpg', 'en ligne'),
(11, 'Carotte', 0.40, 'Carotte fraîche, croquante et riche en vitamines, à déguster crue ou cuite.', 'legume', 'public/images/products/carotte.jpg', 'en ligne'),
(12, 'Raisin', 2.50, 'Grappe de raisin juteuse, sucrée et sans pépins, pour une pause gourmande ou en dessert.', 'fruit', 'public/images/products/raisin.jpg', 'en ligne'),
(13, 'Brocoli', 1.80, 'Tête de brocoli vert, tendre et riche en nutriments, parfaite pour accompagner vos plats ou à la vapeur.', 'legume', 'public/images/products/brocoli.jpg', 'en ligne'),
(14, 'Orange', 1.10, 'Orange juteuse et pleine de vitamines, parfaite à presser ou à déguster en quartiers.', 'fruit', 'public/images/products/orange.jpg', 'en ligne'),
(15, 'Poivron rouge', 1.30, 'Poivron rouge, doux et savoureux, parfait pour les poêlées, farcis ou en crudités.', 'fruit', 'public/images/products/poivron.jpg', 'en ligne'),
(28, 'test2', 12.00, 'test2', 'legume', 'public/images/products/carotte.jpg', 'en ligne');

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
  `admin` tinyint(1) DEFAULT NULL,
  `statut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `admin`, `statut`) VALUES
(23, 'admin3', 'admin3', 'admin2@admin.fr', '$2y$10$RW..CfrP7mbQbybF7K.EweyyMUdTHmyqaYDP8k7/9M6nzgr.Xnboy', 1, 'actif');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `commandes_par_produits`
--
ALTER TABLE `commandes_par_produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
