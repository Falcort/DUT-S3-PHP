-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 24 Mars 2017 à 11:23
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `PHP`
--

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `id` int(100) NOT NULL,
  `ordre` int(100) NOT NULL,
  `nom_fichier` varchar(100) NOT NULL,
  `date_création` datetime NOT NULL,
  `date_modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `ordre`, `nom_fichier`, `date_création`, `date_modification`) VALUES
(1, 1, '1.jpg', '2017-03-17 11:25:42', '2017-03-17 11:25:42'),
(2, 2, '2.jpg\r\n', '2017-03-17 11:26:31', '2017-03-17 11:26:31');

-- --------------------------------------------------------

--
-- Structure de la table `image_description`
--

CREATE TABLE `image_description` (
  `id_image` int(100) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `date_création` datetime NOT NULL,
  `date_modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
