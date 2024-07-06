-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 16 juin 2024 à 23:34
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `transport`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email_adress` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `email_adress`, `password`) VALUES
(1, 'juniorhounmadjai@gmail.com', '$2y$10$AWwlMLTale.SlsQUI6ogA.emY2fPZ8jXoilu7SQZHdWUEH/gdZojS'),
(2, 'loveway@gmail.com', '$2y$10$1I.O16jfJNtRoXVzOhiE8OKMW7jsccTR.UMuvFlSkth5rILnhi98W'),
(3, 'admin@mail.com', '$2y$10$l9a.zFSPR9RS07ql3iarIugZQJoqnZ8lrcQUtcy5fRJAyZiZgJ.XW');

-- --------------------------------------------------------

--
-- Structure de la table `livraisons`
--

CREATE TABLE `livraisons` (
  `id_livraison` int(11) NOT NULL,
  `code_livraison` varchar(11) NOT NULL,
  `client` varchar(150) NOT NULL,
  `num_client_debut` int(11) NOT NULL,
  `num_client_fin` int(11) NOT NULL,
  `debut` varchar(150) NOT NULL,
  `fin` varchar(150) NOT NULL,
  `date_commande` date NOT NULL,
  `statut` varchar(150) NOT NULL,
  `titre` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` int(11) NOT NULL,
  `objet` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `lu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `nom`, `prenom`, `email`, `contact`, `objet`, `message`, `lu`) VALUES
(1, 'HFYEUE', 'Love-Way', 'admin@mail.com', 11223344, 'gklngkgg gjggfff ffuf', 'jhdhf hdfjf', 0);

-- --------------------------------------------------------

--
-- Structure de la table `postuler`
--

CREATE TABLE `postuler` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` int(11) NOT NULL,
  `poste` text NOT NULL,
  `cv` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `postuler`
--

INSERT INTO `postuler` (`id`, `nom`, `prenom`, `email`, `contact`, `poste`, `cv`, `statut`) VALUES
(1, 'HFYEUE', 'Love-Way', 'admin@mail.com', 11223344, 'Coursier/Livreur', 'upload/HFYEUELove-Way.pdf', 1),
(2, 'HOUNMADJAI', 'Cedric', 'juniorhounmadjai@gmail.com', 99017524, 'Coursier/Chauffeur', 'upload/HOUNMADJAICedric.pdf', 0);

-- --------------------------------------------------------

--
-- Structure de la table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `dat` date NOT NULL,
  `heure` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `program`
--

INSERT INTO `program` (`id`, `id_person`, `dat`, `heure`) VALUES
(1, 1, '2024-07-17', '20:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_first_name` varchar(150) NOT NULL,
  `num` varchar(100) NOT NULL,
  `mail_adress` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `name_first_name`, `num`, `mail_adress`, `password`) VALUES
(1, 'Love-Way HFYEUE', '11223344', 'admin@mail.com', '$2y$10$gNxVOlByudULn7jqpPX2.Ox2xtaCJxh.7NyZ/3i3OeHALiCIUXr6y'),
(2, 'Cedric HOUNMADJAI', '99017524', 'juniorhounmadjai@gmail.com', '$2y$10$IhADBaLfyW5zz5bo0JKpYugWgJQTuAQypP1Zz3XpoBH7gV4Lv2BRi');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Index pour la table `livraisons`
--
ALTER TABLE `livraisons`
  ADD PRIMARY KEY (`id_livraison`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `postuler`
--
ALTER TABLE `postuler`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `livraisons`
--
ALTER TABLE `livraisons`
  MODIFY `id_livraison` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `postuler`
--
ALTER TABLE `postuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
