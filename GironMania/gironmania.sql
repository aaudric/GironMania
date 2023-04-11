-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 11 avr. 2023 à 10:23
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gironmania`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_art` int(11) NOT NULL,
  `ID_STRIPE` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` float NOT NULL,
  `url_photo` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `ID_PRICE` varchar(100) NOT NULL,
  PRIMARY KEY (`id_art`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `ID_STRIPE`, `nom`, `quantite`, `prix`, `url_photo`, `description`, `ID_PRICE`) VALUES
(1, 'prod_NfXGJq4XA7PocJ', 'Fifa 23', 29, 79.99, '../images/EASPORTSFIFA23.jpg', '<p>FIFA 23 est un jeu vidéo de simulation de football développé par EA Vancouver et édité par Electronic Arts. Il s\'agit du 30e volet de la série FIFA.\r\n		Sur notre site il est disponible avec les consoles suivantes.\r\n		</p> \r\n\r\n		<ul>\r\n			<li>PS5</li>\r\n			<li>Xbox One</li>\r\n			<li>Xbox Series S</li>\r\n			<li>Xbox Series X</li>\r\n			<li>Nintendo Switch</li>\r\n		</ul>\r\n		\r\n		<h2>Détails du produit</h2>\r\n		\r\n		<p class=\"large\">\r\n		FIFA 23 est le dernier jeu vidéo estampillé « FIFA » développé par EA.\r\n		Les versions du jeu PlayStation 5, Xbox Series et Nintendo Switch utilisent la technologie HyperMotion2. \r\n		Elle permet de retranscrire les mouvements de 22 joueurs professionnels jouant à haute intensité. \r\n		Cette nouvelle technologie augmente le réalisme du jeu et de ses animations.Pour ce nouvel opus, il y a la possibilité de jouer en cross plateforme.\r\n		<br/>En effet, il y a un seul éco-système en fonction de la version choisie (huitième ou neuvième générations de console), notamment sur \r\n		le mode de jeu Fifa Ultimate Team 23 où il n\'y a qu\'un seul marché des transferts.\r\n		</p>', 'price_1MuCC9C7KqWda1zXiuXKsxyZ'),
(2, 'prod_NfXIdVSC1bv9Fv', 'Call Of Duty Modern Warfare 2', 16, 89.99, '../images/cod.jpg', '<h2>Détails du produit</h2>\r\n		\r\n		<p>\r\n		Call of Duty: Modern Warfare II est un jeu vidéo de tir à la première personne développé par le studio Infinity Ward, et édité par Activision. \r\n		Il a été dévoilé le 28 avril 20222 et est sorti le 28 octobre 2022 sur Microsoft Windows (Steam, Battle.net), PlayStation 4, PlayStation 5, Xbox One et Xbox Series S et Xbox Series X.\r\n		<br/>Il s\'agit de la suite de Call of Duty: Modern Warfare sorti en 2019. \r\n		Comme ce dernier, il sera rattaché au battle royale Call of Duty: Warzone 2.0 disponible en free-to-play.</p>\r\n\r\n		<p>Nous vous le proposons sur les plateformes suivantes : </p>\r\n	\r\n		<ul>\r\n			<li>PS5</li>\r\n			<li>Xbox One</li>\r\n			<li>Xbox Series S</li>\r\n			<li>Xbox Series X</li>\r\n		</ul>', 'price_1MuCDnC7KqWda1zX3IGJKwfr'),
(3, 'prod_NfXK3sbaORCZ5P', 'GTA V', 53, 65.99, '../images/gtav.jpg', '<p> Grand Theft Auto V, la célèbre saga de Grand Theft Auto revient avec ce 5e épisode (GTA V) où le joueur est plongé dans l’État fictif de San Andreas. \r\n            L’histoire suit les traces de trois criminels que l’on peut incarner à tour de rôle. \r\n            <br/>Leur destin est lié par des missions remplies d’action, mêlant braquages, courses poursuites, fusillades, arnaques…\r\n		    <br/><br/>Sur notre site le jeu est disponible avec les consoles suivantes:\r\n		</p> \r\n\r\n		<ul>\r\n			<li>PS5</li>\r\n			<li>Xbox One</li>\r\n			<li>Xbox Series S</li>\r\n			<li>Xbox Series X</li>\r\n		</ul>\r\n		\r\n		<h2>Détails du produit</h2>\r\n		\r\n		<p class=\"large\">\r\n        Grand Theft Auto V (plus communément GTA V ou GTA 5) est un jeu vidéo d\'action-aventure, développé par Rockstar North et édité par Rockstar Games. \r\n        L\'histoire solo suit trois protagonistes Michael De Santa, Franklin Clinton et Trevor Philips, et leurs braquages sous la pression d\'une agence gouvernementale corrompue et de puissants criminels. \r\n        Le jeu en monde ouvert permet aux joueurs de parcourir librement la campagne ouverte de San Andreas et la ville fictive de Los Santos, inspirée de Los Angeles.\r\n		\r\n		</p>', 'price_1MuCFcC7KqWda1zXbf44Aon2');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(255) NOT NULL AUTO_INCREMENT,
  `ID_STRIPE` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `adresse` text NOT NULL,
  `numero` int(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=MyISAM AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `ID_STRIPE`, `nom`, `prenom`, `adresse`, `numero`, `mail`, `mdp`) VALUES
(94, 'cus_NfXLUr3ifFkYel', 'Girondin', 'Audric', '38 Boulevard de Verdun', 768376757, 'audricgir@gmail.com', '93000408ac9d054f50da96eb6fff9b67');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id_commande` int(11) NOT NULL AUTO_INCREMENT,
  `id_art` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `envoi` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client` (`id_client`),
  KEY `id_art` (`id_art`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id_commande`, `id_art`, `id_client`, `quantite`, `envoi`) VALUES
(1, 1, 7, 1, 0),
(2, 2, 7, 1, 0),
(3, 3, 7, 1, 0),
(4, 1, 85, 1, 0),
(5, 3, 94, 1, 0),
(6, 1, 94, 1, 0),
(7, 1, 94, 1, 0),
(8, 1, 96, 1, 0),
(9, 2, 94, 1, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
