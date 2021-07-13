-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 12 fév. 2021 à 10:21
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ndsite`
--

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `describtexts`
--

DROP TABLE IF EXISTS `describtexts`;
CREATE TABLE IF NOT EXISTS `describtexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_descript_id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `describtexts`
--

INSERT INTO `describtexts` (`id`, `fk_descript_id`, `text`) VALUES
(1, 1, 'L\'esprit: DuquesneIT est une entreprise fraîchement crée dans le domaine de l\'IT et plus particulièrement dans la conception d\'applications VBA sur Excel ou en VB sur Libre office, et de sites web.'),
(2, 1, 'Ingéniosité et praticité sans troll garanti.'),
(3, 2, 'Les projets VBA'),
(4, 2, 'Excel et Calc'),
(5, 2, 'Access et Base'),
(6, 3, 'Les sites internet'),
(7, 3, 'Modifier un fichier à distance !? Mais oui!'),
(8, 4, 'Tarifs et conditions'),
(9, 4, 'Les tarifs'),
(10, 4, 'Modalités d\'interventions'),
(11, 5, 'Parcours de Nicolas Duquesne'),
(12, 5, 'Avant l\'informatique'),
(13, 5, 'Mes projets et démarches'),
(14, 3, 'Les projets Web');

-- --------------------------------------------------------

--
-- Structure de la table `descriptions`
--

DROP TABLE IF EXISTS `descriptions`;
CREATE TABLE IF NOT EXISTS `descriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_css` varchar(20) NOT NULL,
  `fk_image_id` int(11) DEFAULT NULL,
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `descriptions`
--

INSERT INTO `descriptions` (`id`, `id_css`, `fk_image_id`, `title`) VALUES
(1, 'spirit', 1, 'Présentation'),
(2, 'vba', 2, 'Interventions VBA/VB'),
(3, 'web', 4, 'Interventions web'),
(4, 'deal', 3, 'Tarifs et conditions'),
(5, 'cv', 6, 'Parcours de Nicolas Duquesne');

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `alt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `source`, `title`, `alt`) VALUES
(1, 'hello.png', 'Présentation', 'Présentation'),
(2, 'VB.png', 'Interventions en VBA/VB', 'Interventions en VBA/VB'),
(3, 'deal.png', 'Tarifs et conditions', 'Tarifs et conditions'),
(4, 'web.png', 'Interventions web', 'Interventions web'),
(5, 'mail.png', 'Contact mail', 'Contact mail'),
(6, 'CV.png', 'CV Nicolas Duquesne', 'CV Nicolas Duquesne');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
