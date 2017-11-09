-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  jeu. 12 oct. 2017 à 19:06
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `solde_rdv`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartients`
--

CREATE TABLE `appartients` (
  `code_produit` int(11) NOT NULL,
  `code_structure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `beneficies`
--

CREATE TABLE `beneficies` (
  `code_client` int(11) NOT NULL,
  `code_formule` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorieproduits`
--

CREATE TABLE `categorieproduits` (
  `code_categorie_produit` int(11) NOT NULL,
  `lib_categorie_produit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieproduits`
--

INSERT INTO `categorieproduits` (`code_categorie_produit`, `lib_categorie_produit`) VALUES
(1, 'vetement'),
(2, 'boisson'),
(3, 'gastronomie'),
(4, 'sante');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `code_client` int(11) NOT NULL,
  `nom_client` varchar(100) NOT NULL,
  `prenom_client` varchar(200) NOT NULL,
  `contact_1` varchar(11) NOT NULL,
  `contact_2` varchar(11) NOT NULL,
  `adress_postal` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_connexion` date NOT NULL,
  `heure_connexion` time NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`code_client`, `nom_client`, `prenom_client`, `contact_1`, `contact_2`, `adress_postal`, `email`, `pseudo`, `password`, `date_connexion`, `heure_connexion`, `longitude`, `latitude`) VALUES
(1, 'toure', 'johnatan', '', '', '', '', '', '', '0000-00-00', '00:00:00', 0, 0),
(2, 'jj', 'jjjj', '', '', '', '', '', '', '0000-00-00', '00:00:00', 0, 0),
(3, 'tohe', 'bdh', '', '', '', '', '', '', '0000-00-00', '00:00:00', 0, 0),
(4, 'mano', 'sssssssss', '', '', '', '', '', '', '0000-00-00', '00:00:00', 0, 0),
(5, 'Traoré', '', '', '', '', '', '', '', '0000-00-00', '00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `formules`
--

CREATE TABLE `formules` (
  `code_formule` int(11) NOT NULL,
  `nom_formule` varchar(255) NOT NULL,
  `delai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `formules`
--

INSERT INTO `formules` (`code_formule`, `nom_formule`, `delai`) VALUES
(1, 'free', 1),
(2, 'premium', 12);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `code_produit` int(11) NOT NULL,
  `lib_produit` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `reduction` varchar(255) NOT NULL,
  `prix_initial` int(11) NOT NULL,
  `date_fin_promo` date NOT NULL,
  `date_debut_promo` date NOT NULL,
  `heure_debut_promo` time NOT NULL,
  `heure_fin_promo` time NOT NULL,
  `code_categorie_produit` int(11) NOT NULL,
  `code_structure` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`code_produit`, `lib_produit`, `description`, `reduction`, `prix_initial`, `date_fin_promo`, `date_debut_promo`, `heure_debut_promo`, `heure_fin_promo`, `code_categorie_produit`, `code_structure`) VALUES
(1, 'chemise', 'chemise carrelée bleue avec longue manche', '50', 15000, '2017-10-20', '2017-10-09', '00:00:00', '00:00:00', 1, 1),
(2, 'pantalon', 'pantalon jean', '25', 18000, '2017-10-26', '2017-10-11', '00:00:00', '00:00:00', 1, 2),
(3, 'robe', '', '10', 0, '2017-10-26', '2017-10-09', '00:00:00', '00:00:00', 1, 1),
(4, 'vin', 'chateau de france', '15', 6000, '2017-10-13', '2017-10-09', '00:00:00', '00:00:00', 2, 5),
(5, 'frite', '', '', 1500, '2017-10-20', '2017-10-03', '00:00:00', '00:00:00', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `code_role` int(11) NOT NULL,
  `lib_role` varchar(60) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `structures`
--

CREATE TABLE `structures` (
  `code_structure` int(11) NOT NULL,
  `code_client` int(11) NOT NULL,
  `nom_structure` varchar(255) NOT NULL,
  `longitude` double NOT NULL,
  `latitude` double NOT NULL,
  `image_structure` varchar(255) NOT NULL,
  `adresse_structure` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `code_type_structure` int(11) NOT NULL,
  `contact_structure` int(11) NOT NULL,
  `code_formule` int(11) NOT NULL,
  `date_limite_activite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `structures`
--

INSERT INTO `structures` (`code_structure`, `code_client`, `nom_structure`, `longitude`, `latitude`, `image_structure`, `adresse_structure`, `description`, `code_type_structure`, `contact_structure`, `code_formule`, `date_limite_activite`) VALUES
(1, 1, 'Ali shopping', 1.434917, 43.573085, '', '', '', 1, 0, 0, '2017-10-13 00:00:00'),
(2, 2, 'serou', 1.447856, 43.604573, '', '', '', 1, 0, 0, '2017-10-20 00:00:00'),
(3, 2, 'ets frere', 1.511496, 43.53992, '', '', '', 1, 0, 0, '2017-10-12 00:00:00'),
(4, 3, 'ets silla', 1.373341, 43.644029, '', '', '', 1, 0, 0, '2017-10-26 00:00:00'),
(5, 4, 'jules depot', 1.435198, 43.62186, '', '', '', 3, 0, 0, '2017-10-27 00:00:00'),
(6, 5, 'Espace plein air', 1.496152, 43.568863, '', '', '', 2, 0, 0, '2017-10-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `typestructures`
--

CREATE TABLE `typestructures` (
  `code_type_structure` int(11) NOT NULL,
  `lib_type_structure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typestructures`
--

INSERT INTO `typestructures` (`code_type_structure`, `lib_type_structure`) VALUES
(1, 'magasin'),
(2, 'restaurant'),
(3, 'depot de boisson');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `idclef` varchar(20) NOT NULL DEFAULT '',
  `code_role` varchar(20) NOT NULL DEFAULT '',
  `login` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `date_creation` date NOT NULL DEFAULT '0000-00-00',
  `derniere_connexion` date NOT NULL DEFAULT '0000-00-00',
  `page` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `idclef`, `code_role`, `login`, `password`, `email`, `date_creation`, `derniere_connexion`, `page`) VALUES
(2, '6irilgjospip0b3io2jr', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'g.jf.richard@gmail.com', '2012-08-01', '2017-10-08', 'compte.php'),
(3, 'qlk26zvcukwr7ntbcjw1', 'user', 'Guillaume', '02b92a8b360cfd35536906de08f9dc57', 'g.jf.richard@gmail.com', '2012-09-25', '0000-00-00', 'compte.php');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartients`
--
ALTER TABLE `appartients`
  ADD PRIMARY KEY (`code_produit`,`code_structure`);

--
-- Index pour la table `beneficies`
--
ALTER TABLE `beneficies`
  ADD PRIMARY KEY (`code_client`,`code_formule`);

--
-- Index pour la table `categorieproduits`
--
ALTER TABLE `categorieproduits`
  ADD PRIMARY KEY (`code_categorie_produit`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`code_client`);

--
-- Index pour la table `formules`
--
ALTER TABLE `formules`
  ADD PRIMARY KEY (`code_formule`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`code_produit`),
  ADD KEY `code_structure` (`code_structure`),
  ADD KEY `code_categorie_produit` (`code_categorie_produit`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`code_role`);

--
-- Index pour la table `structures`
--
ALTER TABLE `structures`
  ADD PRIMARY KEY (`code_structure`),
  ADD KEY `code_formule` (`code_formule`),
  ADD KEY `code_client` (`code_client`,`code_type_structure`);

--
-- Index pour la table `typestructures`
--
ALTER TABLE `typestructures`
  ADD PRIMARY KEY (`code_type_structure`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorieproduits`
--
ALTER TABLE `categorieproduits`
  MODIFY `code_categorie_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `code_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `formules`
--
ALTER TABLE `formules`
  MODIFY `code_formule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `code_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `code_role` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `structures`
--
ALTER TABLE `structures`
  MODIFY `code_structure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `typestructures`
--
ALTER TABLE `typestructures`
  MODIFY `code_type_structure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
