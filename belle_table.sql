-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 05 juin 2018 à 19:35
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `belle_table`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'assiettes'),
(2, 'verres'),
(3, 'couteaux'),
(4, 'fourchettes'),
(5, 'cuillieres'),
(6, 'plateaux'),
(7, 'carafes'),
(8, 'accessoires de table'),
(9, 'lots');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `mot_de_passe` varchar(255) COLLATE utf8_bin NOT NULL,
  `civilite` varchar(3) COLLATE utf8_bin NOT NULL,
  `nom` varchar(25) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(25) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `ville` varchar(30) COLLATE utf8_bin NOT NULL,
  `code_postal` varchar(5) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(10) COLLATE utf8_bin NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id`, `adresse_mail`, `mot_de_passe`, `civilite`, `nom`, `prenom`, `adresse`, `ville`, `code_postal`, `telephone`, `lvl`) VALUES
(13, 'dupontd@gmail.com', '$2y$10$21X/CdAy0VntNFiiFO3lXesWuukFJB1bSmOexN33DmlbBsM5qtZ/W', 'mr', 'Dupont', 'Dupondd', '', 'qdsfsqdf', '', '', 0),
(11, 'admin@gmail.com', '$2y$10$TP5BHjri3p/PHiq2pH/qa.dAGUoWiYFusNJKytgfzLItCUvDw3zn2', 'mr', 'admin', 'admin', '', '', '', '', 1),
(5, 'theo.w60@gmail.com', '$2y$10$o65Q/N1qs7DiwjIWikMiwONOqmXJ/t0o59j8Q82gUZt8caO0sfWTq', 'mr', 'Waeckel', 'ThÃ©o', '', 'sdfqsdfqsd', '', '', 1),
(4, 'pierre_nicolas@live.fr', '$2y$10$80V5p04HwDQxYQwU6HU3Z.rf0h9T8ZwIimZ/a1t/TFP.n1Lyqk5he', 'mr', 'Nicolas', 'Salut', '12 rue des igloos', 'Test', '06453', '0202020202', 0),
(6, 'jimmy.sene@laposte.net', '$2y$10$NL7c0agFcv40cX3ac7hAY.2a67KZ62N4vBkLk/f49RprEHpmmAiAG', 'mr', 'SenÃ©', 'Jimmy', '12 RUE DE LA CONFLUENCE, B416', 'SAINT-DENIS', '93200', '0640126739', 1),
(12, 'test@test.fr', '$2y$10$HpO5TzpkHnJ0K7cX1hgIJ.q8znSh/XJaY8o44STpHVTk9tJWHyVqK', 'mr', 'Test', 'Test', '', 'qsffqsdf', '', '', 0),
(14, 'onsaitpas@live.fr', '$2y$10$hW1xxUg2MBzKQoy4Gh/zI.y5pCYRyMQwuIRI4uZCkvRFSNwzk17z.', 'mr', 'Sulpice', 'RÃ©mi', '', 'dfqsdf', '', '', 0),
(15, 'onsaitpasnonplus@live.fr', '$2y$10$vH6S120tQFQy6EVpga4vTeO.qb/ss5X8Du0OrAjdxNGub6wUaSPem', 'mr', 'Lambert-de-cursay', 'Vincent', '', 'PARIS', '', '0202020202', 0),
(16, 'jailaflemmedallercheckmesmailspourverifier@gmail.com', '$2y$10$CzlTtGRtKHPP90./vFA8Wem5cRnhYVpcAsow.Fn0rslJCUeqDUWIC', 'mr', 'Guez', 'F.', '', '', '', '', 0),
(23, 'finaltest@gmail.com', '$2y$10$GIn4LmgHg3JLdBid.hwxeutrB9cO1bm8xM1klDRAdk7fbGnSHLB7m', 'mr', 'Final', 'Test', '', 'Test', '', '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `numero` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `date_commande` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adresse_mail` varchar(50) COLLATE utf8_bin NOT NULL,
  `pseudo` varchar(50) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `adresse_mail`, `pseudo`, `message`, `date`) VALUES
(5, 'jimmy.sene@laposte.net', 'Jimmy', 'Petit test !', '2018-06-04'),
(10, 'jimmy.sene@laposte.net', 'Jimmy', 'Bonjour,\r\n\r\nJe vous envoie ce message pour tester la fonctionnalitÃ© de la page de contact.\r\n\r\nCordialement.', '2018-06-05');

-- --------------------------------------------------------

--
-- Structure de la table `location_salle`
--

DROP TABLE IF EXISTS `location_salle`;
CREATE TABLE IF NOT EXISTS `location_salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `salle_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id_marque`, `nom_marque`) VALUES
(1, 'AUCUNE'),
(2, 'ALBI'),
(3, 'MALMAISON'),
(4, 'MARLY'),
(5, 'JARDIN D\'EDEN'),
(6, 'Silver Time');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `marque_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `categorie_id`, `marque_id`) VALUES
(1, 'Ensemble de 5 pieces en porcelaine', '', 200, 1, 1),
(2, 'Assiette presentation porcelaine', '', 80, 1, 1),
(3, 'Assiette americaine en porcelaine', '', 80, 1, 1),
(4, 'Assiette creuse a calotte en porcelaine', '', 80, 1, 1),
(5, 'Assiette a dessert en porcelaine', '', 50, 1, 1),
(6, 'Assiette a pain en porcelaine', '', 50, 1, 1),
(7, 'Assiette de presentation en metal argente', '', 80, 1, 1),
(8, 'Assiette americaine en porcelaine finition platine', '', 120, 1, 1),
(9, 'Assiette americaine en porcelaine finition or', '', 100, 1, 1),
(10, 'Assiette de presentation en porcelaine de Limoges', '', 50, 1, 1),
(11, 'Assiette creuse a ailes en porcelaine de Limoges', '', 50, 1, 1),
(12, 'Plateau rectangulaire en acier et bois noyer', '', 30, 6, 1),
(13, 'Broc a eau en cristal', '', 100, 7, 1),
(14, 'Saliere et poivriere sur plateau en metal argente', '', 30, 8, 1),
(15, 'Sauciere grand modele en metal argente', '', 30, 8, 1),
(16, 'Plat ovale en metal argente', '', 50, 6, 1),
(17, 'Service a caviar en metal argente', '', 30, 8, 1),
(18, 'Broc a eau en metal argente', '', 30, 7, 1),
(19, '3 compartiments en metal argente', '', 60, 8, 1),
(20, 'Plat rond en metal argente', '', 30, 6, 1),
(21, 'Service 2 coupelles en metal argente', '', 30, 8, 1),
(22, 'Plat a gratin ovale en verre et metal argente', '', 80, 6, 1),
(23, 'Service 4 coupelles en metal argente', '', 30, 8, 1),
(24, 'Beurrier rectangulaire en metal argente', '', 30, 8, 1),
(25, 'Plateau a fromage en metal argente', '', 30, 6, 1),
(26, 'Huilier - Vinaigrier en metal argente', '', 25, 8, 1),
(27, 'Moutardier - Confiturier en metal argente', '', 25, 8, 1),
(28, 'Coffret de 2 porte-couteaux en metal argente', '', 25, 8, 1),
(29, 'Verre a eau en cristal souffle', '', 50, 2, 1),
(30, 'Coffret de 2 gobelets en cristal souffle', '', 50, 2, 1),
(31, 'Flute a champagne en cristal souffle', '', 50, 2, 1),
(32, 'Coffret de deux flutes en cristal', '', 50, 2, 1),
(33, 'Coffret de deux flutes en cristal gris', '', 80, 2, 1),
(34, 'Coffret de deux flutes en cristal bleu', '', 80, 2, 1),
(35, 'Coffret de deux flutes en cristal rouge', '', 80, 2, 1),
(36, 'Seau a champagne en metal argente', '', 80, 7, 1),
(37, 'Serviteur a vin en metal argente', '', 80, 7, 1),
(38, 'Carafe a whisky en cristal', '', 80, 7, 1),
(39, 'Decanteur a vin en cristal', '', 80, 7, 1),
(40, 'Carafe a vin en cristal', '', 80, 7, 1),
(41, 'Carafe a whisky en cristal souffle', '', 80, 7, 1),
(42, 'Carafe a vin - aiguiere en metal argente', '', 80, 7, 1),
(43, 'Carafe a whisky finition or en cristal', '', 120, 7, 1),
(44, 'Carafe a vodka finition or en cristal', '', 120, 7, 1),
(45, 'Seau a glace finition or en cristal', '', 120, 7, 1),
(46, 'Ruche', '', 220, 9, 3),
(47, 'Ruche', '', 220, 9, 4),
(48, 'Ruche', '', 220, 9, 5),
(49, 'Fourchette de table en metal argente', '', 50, 4, 2),
(50, 'Couteau de table en metal argente', '', 50, 3, 2),
(51, 'Couteau a viande de table en metal argente', '', 50, 3, 2),
(52, 'Cuillere de table en metal argente', '', 50, 5, 2),
(53, 'Fourchette a poisson en metal argente', '', 50, 4, 2),
(54, 'Ensemble de 48 pieces pour 12 personnes de table en metal argente', '', 500, 9, 2),
(55, 'Pelle et couteau a gateaux en metal argente', '', 80, 9, 2),
(56, '36 pieces de table pour 6 en metal argente', '', 150, 9, 2),
(57, 'Cuillere a caviar en corne', '', 50, 5, 2),
(58, 'Tartineur a caviar en corne', '', 50, 3, 2),
(59, 'Tartineur en metal argente', '', 20, 3, 2),
(60, 'Pince a sucre en metal argente', '', 20, 8, 2),
(61, 'Cuillere a glace en metal argente', '', 20, 5, 2),
(62, 'Pelle coupante a gateaux en metal argente', '', 20, 8, 2),
(63, 'Coffret 6 fourchettes a gateaux et une pelle', '', 80, 9, 2),
(64, 'Fourchette a decouper en metal argente', '', 20, 4, 2),
(65, 'Fourchette a homard en metal argente', '', 30, 4, 2),
(66, 'Ensemble de 110 pieces privileges en metal argente', '', 1000, 9, 2),
(67, 'Cuillere a soupe en metal argente', '', 20, 5, 2),
(68, '2 compartiments en metal argente', '', 30, 8, 5),
(69, 'Ensemble individuel 5 pieces en metal argente', '', 80, 9, 5),
(70, 'Paire de baguettes chinoises or rose', '', 30, 8, 5),
(71, 'Baguettes chinoises en bois et metal argente', '', 30, 8, 5),
(72, 'Coffret 2 cuilleres espresso en metal argente', '', 30, 5, 5),
(73, 'Couteau standard en metal argente', '', 20, 3, 5),
(74, 'Fourchette standard en metal argente', '', 20, 4, 5),
(75, 'Pelle coupante a gateaux en metal argente', '', 20, 8, 5),
(76, 'Cuillere a servir en metal argente', '', 20, 5, 5),
(77, 'Cuillere a dessert en metal argente', '', 15, 5, 5),
(78, 'Couteau a dessert en metal argente', '', 20, 3, 5),
(79, 'Cuillere de table en metal argente', '', 20, 5, 5),
(80, '48 pieces en ecrin pour 12en metal argente', '', 100, 9, 5),
(81, '36 pieces de table pour 6 en metal argente', '', 100, 9, 5),
(82, 'Fontaine a the en metal argente ', '', 250, 8, 6),
(83, 'Sucrier en metal argente', '', 50, 8, 6),
(84, 'Cremier en metal argente', '', 80, 8, 6),
(85, 'Plat a cake en metal argente', '37x19', 30, 8, 6),
(86, 'Plat carre en metal argente', '', 50, 8, 6),
(87, 'Plat rectangulaire en metal argente', '', 50, 8, 6),
(88, 'Corbeille a pain en metal argente', '', 50, 8, 6),
(89, 'Bocal grand modele en metal argente', '', 80, 8, 6),
(90, 'Bocal grand modele en metal argente', '', 80, 8, 6),
(91, 'Bocal petit modele metal argente', '', 80, 8, 6),
(92, 'Coupelle en metal argente', '', 80, 8, 6),
(93, 'Theiere en metal argente', '', 80, 8, 6);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `ville` varchar(30) COLLATE utf8_bin NOT NULL,
  `code_postal` varchar(5) COLLATE utf8_bin NOT NULL,
  `tarif` int(11) NOT NULL,
  `disponibilite` varchar(12) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id`, `nom`, `description`, `adresse`, `ville`, `code_postal`, `tarif`, `disponibilite`) VALUES
(1, 'Charles de Gaulle', 'Cuisine, grande salle \"rivierere du chene\", arriere salle \"fleur de Lys\", balcon terasse.', '2 rue charles de gaulle', 'Paris', '75002', 1500, 'disponible'),
(2, 'Ruban bleu', '14 Tables, une cuisine.', '12 rue edouard brillant', 'Grenoble', '38100', 1000, 'indisponible'),
(3, 'Albert Moulignier', '6 tables, une cuisine semipro, jardin de 500m2, stationnement pour invites de 15 places.', '14 rue albert mouligner', 'Meru', '60110', 1500, 'disponible');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
