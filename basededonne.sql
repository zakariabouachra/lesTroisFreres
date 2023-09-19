-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 24 nov. 2022 à 02:56
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `cartpay`
--

CREATE TABLE `cartpay` (
  `id` int(3) NOT NULL,
  `numberC` varchar(20) NOT NULL,
  `nomC` varchar(20) NOT NULL,
  `mois` enum('01','02','03','04','05','06','07','08','09','10','11','12') NOT NULL,
  `annee` enum('2021','2022','2023','2024','2025','2026','2027','2028','2029','2030') NOT NULL,
  `cvv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) DEFAULT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(1, 5, 79, '2022-11-19 12:25:53', 'en cours de traitement'),
(2, 5, 237, '2022-11-19 12:29:57', 'en cours de traitement'),
(3, 5, 105, '2022-11-19 12:51:51', 'en cours de traitement'),
(4, 5, 519, '2022-11-19 13:23:01', 'en cours de traitement'),
(5, 5, 480, '2022-11-19 13:37:23', 'en cours de traitement'),
(6, 5, 690, '2022-11-19 15:34:49', 'en cours de traitement'),
(7, 5, 0, '2022-11-19 15:39:23', 'en cours de traitement'),
(8, 5, 0, '2022-11-19 15:40:48', 'en cours de traitement'),
(9, 5, 0, '2022-11-19 15:42:38', 'en cours de traitement'),
(10, 5, 0, '2022-11-19 15:44:15', 'en cours de traitement'),
(11, 5, 0, '2022-11-19 15:46:20', 'en cours de traitement'),
(12, 5, 0, '2022-11-19 15:47:13', 'en cours de traitement'),
(13, 5, 0, '2022-11-19 15:47:18', 'en cours de traitement'),
(14, 5, 0, '2022-11-19 15:48:00', 'en cours de traitement'),
(15, 5, 0, '2022-11-19 17:22:16', 'en cours de traitement'),
(16, 5, 0, '2022-11-19 17:23:54', 'en cours de traitement'),
(17, 5, 0, '2022-11-19 17:25:58', 'en cours de traitement'),
(18, 5, 0, '2022-11-19 17:27:51', 'en cours de traitement'),
(19, 5, 0, '2022-11-19 17:28:09', 'en cours de traitement'),
(20, 5, 0, '2022-11-19 17:28:33', 'en cours de traitement'),
(21, 5, 0, '2022-11-19 17:28:46', 'en cours de traitement'),
(22, 5, 0, '2022-11-19 17:29:31', 'en cours de traitement'),
(23, 5, 0, '2022-11-19 17:29:52', 'en cours de traitement'),
(24, 5, 0, '2022-11-19 17:36:26', 'en cours de traitement'),
(25, 5, 327, '2022-11-19 17:38:35', 'en cours de traitement'),
(26, 5, 69, '2022-11-19 17:38:54', 'en cours de traitement'),
(27, 5, 69, '2022-11-19 17:39:28', 'en cours de traitement'),
(28, 5, 193, '2022-11-19 17:39:55', 'en cours de traitement'),
(29, 5, 414, '2022-11-19 17:40:33', 'en cours de traitement'),
(30, 5, 0, '2022-11-20 05:23:10', 'en cours de traitement'),
(31, 5, 0, '2022-11-20 05:23:51', 'en cours de traitement'),
(32, 5, 0, '2022-11-20 05:24:51', 'en cours de traitement'),
(33, 5, 0, '2022-11-20 05:26:13', 'en cours de traitement'),
(34, 5, 0, '2022-11-20 05:26:48', 'en cours de traitement'),
(35, 5, 0, '2022-11-20 05:27:18', 'en cours de traitement'),
(36, 5, 0, '2022-11-20 05:27:49', 'en cours de traitement'),
(37, 5, 0, '2022-11-20 05:28:02', 'en cours de traitement'),
(38, 5, 0, '2022-11-20 05:32:17', 'en cours de traitement'),
(39, 5, 0, '2022-11-20 05:32:57', 'en cours de traitement'),
(40, 5, 0, '2022-11-20 05:36:40', 'en cours de traitement'),
(41, 5, 0, '2022-11-20 06:10:53', 'en cours de traitement'),
(42, 5, 374, '2022-11-20 19:20:49', 'en cours de traitement'),
(43, 5, 0, '2022-11-20 20:22:35', 'en cours de traitement'),
(44, 5, 0, '2022-11-20 21:22:39', 'en cours de traitement'),
(45, 5, 55, '2022-11-20 21:33:33', 'en cours de traitement'),
(46, 5, 300, '2022-11-20 21:35:24', 'en cours de traitement'),
(47, 5, 0, '2022-11-21 01:40:31', 'en cours de traitement'),
(48, 5, 0, '2022-11-21 01:44:55', 'en cours de traitement'),
(49, 5, 50, '2022-11-21 02:12:11', 'en cours de traitement'),
(50, 5, 639, '2022-11-21 02:15:48', 'en cours de traitement'),
(51, 5, 405, '2022-11-21 02:17:35', 'en cours de traitement'),
(52, 5, 297, '2022-11-21 03:23:31', 'en cours de traitement'),
(53, 15, 472, '2022-11-21 14:20:20', 'en cours de traitement'),
(54, 5, 495, '2022-11-22 09:54:39', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) DEFAULT NULL,
  `id_produit` int(3) DEFAULT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 1, 18, 1, 79),
(2, 2, 18, 3, 79),
(3, 3, 19, 1, 105),
(4, 4, 25, 1, 99),
(5, 4, 19, 4, 105),
(6, 5, 20, 4, 120),
(7, 14, 29, 0, 99),
(8, 22, 21, 0, 50),
(9, 23, 24, 0, 109),
(10, 24, 21, 0, 50),
(11, 25, 24, 3, 109),
(12, 26, 23, 1, 69),
(13, 27, 23, 1, 69),
(14, 28, 23, 2, 69),
(15, 28, 28, 1, 55),
(16, 29, 23, 6, 69),
(17, 40, 29, 0, 99),
(18, 42, 28, 5, 55),
(19, 42, 29, 1, 99),
(20, 45, 28, 1, 55),
(21, 46, 26, 6, 50),
(22, 49, 21, 1, 50),
(23, 50, 30, 6, 89),
(24, 50, 32, 1, 65),
(25, 50, 33, 1, 40),
(26, 51, 31, 9, 45),
(27, 52, 20, 3, 99),
(28, 53, 25, 8, 59),
(29, 54, 20, 5, 99);

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id_produit` int(3) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(5) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id_produit`, `categorie`, `nom`, `description`, `type`, `photo`, `prix`, `stock`) VALUES
(18, 'sport', 'fifa 2023', 'meilleur jeux', 'PS5', '/projetF/CRUD/photos/product-6.jpg', 79, 10),
(19, 'sport', 'god-of-wars', 'jeux exellent', 'PS5', '../CRUD/photos/product-2.jpg', 105, 0),
(20, 'Action', 'Call-of-dutty', 'jeux parfait', 'PS5', '/projetF/CRUD/photos/product-7.jpg', 99, 7),
(21, 'aventure', 'far-cry', 'aventure game edition', 'PS5', '../CRUD/photos/product-8.jpg', 50, 0),
(23, 'Action', 'Mortal-Combat', 'une beaute', 'PS4', '../CRUD/photos/blog-6.jpg', 69, 0),
(24, 'Action', 'Call-of-dutty', 'the best of the best', 'PS4', '../CRUD/photos/product-1.jpg', 109, 0),
(25, 'Action', 'GTA 5 ', 'jeux du moment', 'PS4', '/projetF/CRUD/photos/product-3.jpg', 59, 0),
(26, 'Action', 'Dark-Souls-2', 'La mort est incluse.', 'PS4', '../CRUD/photos/product-4.jpg', 50, 0),
(27, 'sport', 'NHL-22', 'rugby man', 'XBOX', '../CRUD/photos/product-11.jpg', 40, 2),
(28, 'Conduite', 'Forza-Horizon-7', 'Conduire comme dans le reel', 'XBOX', '../CRUD/photos/product-9.jpg', 55, 0),
(29, 'Action', 'Assassins Creed', 'amazing', 'XBOX', '../CRUD/photos/xboxpic.jpg', 99, 2),
(30, 'Aventure', 'GTA-VICE-CITY', 'like reel life', 'XBOX', '../CRUD/photos/product-10.jpg', 89, 2),
(31, 'Action', 'Sonic', 'pour les petits', 'PC', '../CRUD/photos/product-13.jpg', 45, 0),
(32, 'Aventure', 'BattelFields', 'forever', 'PC', '../CRUD/photos/pc.jpg', 65, 4),
(33, 'Aventure', 'TMNT', 'beau', 'PC', '../CRUD/photos/banner-1.jpg', 40, 1),
(34, 'sport', 'Metriod', 'beauted', 'PC', '../CRUD/photos/product-14.jpg', 75, 10);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `nom`, `prenom`, `email`, `adresse`, `ville`, `cp`) VALUES
(5, 'test', '123', 'BOUACHRA', 'ZAKARIA', 'zikotato03@gmail.com', 'H2C1X9', 'CASABLANCA', '20390'),
(13, '', '', '', '', '', '', '', ''),
(14, 'testeur', '123', 'BOUACHRA', 'ZAKARIA', 'zikotato03@gmail.com', 'H2C1X9', 'montreal', 'H2C1X9'),
(15, 'steve', '123', 'steve', 'jobs', 'zikotato03@gmail.com', '20390', 'CASABLANCA', '20390');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cartpay`
--
ALTER TABLE `cartpay`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id_produit`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cartpay`
--
ALTER TABLE `cartpay`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
