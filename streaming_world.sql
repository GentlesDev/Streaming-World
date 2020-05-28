-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 27 mai 2020 à 14:09
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `streaming_world`
--

-- --------------------------------------------------------

--
-- Structure de la table `artworks`
--

DROP TABLE IF EXISTS `artworks`;
CREATE TABLE IF NOT EXISTS `artworks` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(120) NOT NULL,
  `Url` varchar(500) NOT NULL,
  `Image` varchar(120) NOT NULL,
  `Image_Cover` varchar(150) NOT NULL,
  `In_Streaming` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artworks`
--

INSERT INTO `artworks` (`Id`, `Name`, `Url`, `Image`, `Image_Cover`, `In_Streaming`) VALUES
(1, 'Kimetsu No Yaiba', 'kny', 'kny_cover.gif', 'kny_cover.jpg', 'oui'),
(2, 'Dragon Ball', 'db', 'db_cover.gif', 'db_cover.jpg', 'oui'),
(3, 'Naruto', 'naruto', 'naruto_cover.gif', 'naruto_cover.jpg', 'oui'),
(4, 'One Piece', 'op', 'op_cover.gif', 'op_cover.jpg', 'oui'),
(5, 'My Hero Academia', 'mha', 'mha_cover.gif', 'mha_cover.jpg', 'oui'),
(6, 'One Punch Man', 'opm', 'opm_cover.gif', 'opm_cover.jpg', 'non'),
(7, 'Vinland Saga', 'vs', 'vs_cover.gif', 'vs_cover.jpg', 'oui'),
(8, 'Gintama', 'gintama', 'gintama_cover.gif', 'gintama_cover.jpg', 'oui'),
(9, 'Hajime No Ippo', 'ippo', 'ippo_cover.gif', 'ippo_cover.jpg', 'oui'),
(10, 'Fate', 'fate', 'fate_cover.gif', 'fate_cover.jpg', 'oui'),
(11, 'Saiki Kusuo No Psi Nan', 'saiki', 'saiki_cover.gif', 'saiki_cover.jpg', 'oui'),
(12, 'Made In Abyss', 'madeinabyss', 'madeinabyss.gif', 'madeinabyss_cover.jpg', 'oui'),
(13, 'Shingeki No Kyojin', 'snk', 'snk_cover.gif', 'snk_cover.jpg', 'oui');

-- --------------------------------------------------------

--
-- Structure de la table `artworks_seasons`
--

DROP TABLE IF EXISTS `artworks_seasons`;
CREATE TABLE IF NOT EXISTS `artworks_seasons` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `Season_Name` varchar(10010) NOT NULL,
  `Season_Image` varchar(10001) NOT NULL,
  `Season_Url` varchar(10000) DEFAULT NULL,
  `Artwork_Id` int(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `artworks_seasons`
--

INSERT INTO `artworks_seasons` (`Id`, `Season_Name`, `Season_Image`, `Season_Url`, `Artwork_Id`) VALUES
(1, 'Kimetsu No Yaiba Saison 1', 'knys1.jpg', 'knys1', 1),
(2, 'Kimetsu No Yaiba Films/OAV', 'knyfo.png', 'knyfo', 1),
(3, 'Dragon Ball', 'db.jpg', 'db', 2),
(4, 'Z', 'dbz.jpg', 'dbz', 2),
(5, 'GT', 'dbgt.jpg', 'dbgt', 2),
(6, 'Super', 'dbs.png', 'dbs', 2),
(7, 'Dragon Ball Films/OAV', 'dbfo.jpg', 'dbfo', 2),
(8, 'Naruto', 'naruto.jpg', 'naruto', 3),
(9, 'Shippuden', 'shippuden.jpg', 'shippuden', 3),
(10, 'Naruto Films/OAV', 'narutofo.jpg', 'narutofo', 3),
(11, 'One Piece', 'op.jpg', 'op', 4),
(12, 'One Piece Films/OAV', 'opfo.jpg', 'opfo', 4),
(13, 'My Hero Academia Saison 1', 'mhas1.jpg', 'mhas1', 5),
(14, 'My Hero Academia Saison 2', 'mhas2.jpg', 'mhas2', 5),
(15, 'My Hero Academia Saison 3', 'mhas3.jpg', 'mhas3', 5),
(16, 'My Hero Academia Saison 4', 'mhas4.jpg', 'mhas4', 5),
(17, 'My Hero Academia Films/OAV', 'mhafo.jpg', 'mhafo', 5),
(18, 'Vinland Saga Saison 1', 'vss1.jpg', 'vss1', 7),
(19, 'Gintama', 'gintama.jpg', 'gintama', 8),
(20, 'Gintama Films/OAV', 'gintamafo.png', 'gintamafo', 8),
(21, 'Hajime No Ippo Saison 1', 'ippos1.jpg', 'ippos1', 9),
(22, 'Hajime No Ippo Saison 2', 'ippos2.jpg', 'ippos2', 9),
(23, 'Hajime No Ippo Saison 3', 'ippos3.png', 'ippos3', 9),
(24, 'Hajime No Ippo Films/OAV', 'ippofo.png', 'ippofo', 9),
(25, 'Stay Night 2006', 'fsn2006.jpg', 'sn', 10),
(26, 'Zero', 'fzero.jpg', 'zero', 10),
(27, 'Stay Night: Unlimited Blade Works', 'fubw.jpg', 'ubw', 10),
(28, 'Apocrypha', 'fa.jpg', 'apocrypha', 10),
(30, 'Grand Order: Zetai Majuu Sensen Babylonia', 'fgob.jpg', 'gob', 10),
(31, 'Fate Films/OAV', 'ffo.jpg', 'ffo', 10),
(32, 'Saiki Kusuo No Psi Nan Saison 1', 'saiki.jpg', 'sks1', 11),
(33, 'Saiki Kusuo No Psi Nan Saison 2', 'saiki.jpg', 'sks2', 11),
(34, 'Saiki Kusuo No Psi Nan Saison 3', 'saiki.jpg', 'sks3', 11),
(38, 'Made In Abyss Saison 1', 'madeinabyss_cover.jpg', 'madeinabysss1', 12),
(39, 'Shingeki No Kyojin Saison 1', 'snk_cover.jpg', 'snks1', 13);

-- --------------------------------------------------------

--
-- Structure de la table `orderline`
--

DROP TABLE IF EXISTS `orderline`;
CREATE TABLE IF NOT EXISTS `orderline` (
  `Order_Id` int(11) NOT NULL,
  `Product_Id` int(11) NOT NULL,
  `Quantity_Ordered` int(200) NOT NULL,
  `PriceEach` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orderline`
--

INSERT INTO `orderline` (`Order_Id`, `Product_Id`, `Quantity_Ordered`, `PriceEach`) VALUES
(1, 2, 1, 42),
(1, 28, 1, 55),
(1, 23, 1, 195),
(2, 24, 1, 15),
(2, 25, 1, 15),
(2, 26, 1, 22.5),
(3, 7, 1, 130),
(4, 27, 1, 175),
(5, 1, 1, 70),
(6, 26, 3, 22.5);

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Id` int(11) NOT NULL,
  `TaxRate` double DEFAULT NULL,
  `TaxAmount` double DEFAULT NULL,
  `TotalAmount` double DEFAULT NULL,
  `CreationTimestamp` datetime DEFAULT NULL,
  `CompleteTimestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`Id`, `User_Id`, `TaxRate`, `TaxAmount`, `TotalAmount`, `CreationTimestamp`, `CompleteTimestamp`) VALUES
(1, 1, 20, 5840, 292, '2020-01-03 10:26:19', NULL),
(2, 1, 20, 1050, 52.5, '2020-01-03 10:27:34', NULL),
(3, 1, 20, 2600, 130, '2020-01-03 10:29:08', '2020-01-03 10:30:28'),
(4, 1, 20, 3500, 175, '2020-01-03 10:30:53', '2020-01-03 11:02:29'),
(5, 1, 20, 1400, 70, '2020-01-03 11:55:15', '2020-01-03 11:55:15'),
(6, 1, 20, 1350, 67.5, '2020-01-04 17:45:23', '2020-01-04 17:45:23');

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Content` varchar(900) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `Product_Id` int(255) DEFAULT NULL,
  `Episode_Id` int(255) DEFAULT NULL,
  `Artwork_Id` int(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`Id`, `Content`, `CreationTimestamp`, `Nickname`, `Product_Id`, `Episode_Id`, `Artwork_Id`) VALUES
(1, 'hate de voir la suite !!', '2020-01-04 15:30:46', 'admin', NULL, 1, 1),
(31, 'Superbe episode!', '2020-01-04 16:25:56', 'admin', NULL, 1, 2),
(30, 'Superbe episode!', '2020-01-04 16:25:46', 'admin', NULL, 1, 7),
(32, 'Ex', '2020-05-12 14:29:26', 'admin', NULL, 22, 8),
(33, 'woaa', '2020-05-12 14:31:46', 'admin', NULL, 22, 8),
(34, 'Best animation db', '2020-05-12 14:32:06', 'admin', NULL, 1, 2),
(35, 'wow', '2020-05-13 14:52:51', 'admin', 2, NULL, NULL),
(36, 'nani', '2020-05-13 14:53:20', 'admin', 3, NULL, NULL),
(37, 'Superbe figurine', '2020-05-13 14:57:41', 'admin', 1, NULL, NULL),
(38, 'Meilleur Fate', '2020-05-23 12:56:23', 'admin', NULL, 1, 10),
(39, 'ça promet', '2020-05-23 13:01:20', 'admin', NULL, 26, 10),
(40, 'yaree Broly !!', '2020-05-23 13:08:31', 'admin', NULL, 1, 2),
(41, 'yes', '2020-05-23 14:24:38', 'admin', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `productline`
--

DROP TABLE IF EXISTS `productline`;
CREATE TABLE IF NOT EXISTS `productline` (
  `LineId` int(255) NOT NULL AUTO_INCREMENT,
  `ProductLine` varchar(50) COLLATE latin1_bin NOT NULL,
  PRIMARY KEY (`LineId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_bin;

--
-- Déchargement des données de la table `productline`
--

INSERT INTO `productline` (`LineId`, `ProductLine`) VALUES
(1, 'accessoires'),
(2, 'blu-ray'),
(3, 'figurines'),
(4, 'tome');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Artworks_Id` int(11) NOT NULL,
  `Name` varchar(120) NOT NULL,
  `Photo` varchar(90) NOT NULL,
  `ProductLine` varchar(50) NOT NULL,
  `Description` varchar(900) NOT NULL,
  `QuantityInStock` int(255) NOT NULL,
  `BuyPrice` double NOT NULL,
  `Price` double NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`Id`, `Artworks_Id`, `Name`, `Photo`, `ProductLine`, `Description`, `QuantityInStock`, `BuyPrice`, `Price`) VALUES
(1, 2, 'SonGoku Ultra Instinct Dragon Ball Super', 'GokuMui.png', 'figurines', 'Banpresto Figurine - DBZ - Son Goku FES Vol 8 - Ultra Instinct Son Goku - 20 cm ', 50, 0.8, 75),
(2, 3, 'Naruto Shippuden Bijuu Mode', 'NarutoBijuu.jpg', 'figurines', 'TAMASHII NATIONS Naruto Shippuden Naruto Uzumaki -Kurama- Kizuna Relation, BandaiFiguartsZERO', 35, 0.8, 42),
(3, 4, 'Monkey D. Luffy 4ème', 'LuffyGear4.jpg', 'figurines', 'One Piece Modèle Surdimensionné Monkey D. Luffy 4ème Scène Statue Décoration D\'animation', 120, 0.8, 128),
(5, 1, 'Kamado Tanjiro', 'tanjiro.jpg', 'figurines', 'Demon Slayer PVC Action Figures Kamado Tanjirou Tenth Style The Dragon of Change Anime Kimetsu no Yaiba Figurine', 500, 15, 50),
(7, 5, 'All Might United States of Smash', 'allmight.jpg', 'figurines', 'Figurine Boku no Hero Academia - All Might & All For One - United States of Smash Version', 500, 95, 130),
(23, 6, 'Genos One Punch Man', 'genos.jpg', 'figurines', 'Genos By Tsume One Punch Man. La figurine est dotée d\'un système d\'éclairage LED complexe! Les pièces mécaniques de ses bras sont très détaillées ! Poids: 10 kg, largeur: 40cm, longueur: 40 cm, hauteur: 49 cm.', 500, 110, 195),
(22, 3, 'Madara Uchiwa by TSUME PRECO', 'madara.jpg', 'figurines', 'Naruto Shippuden - Figurine Madara Uchiwa by TSUME\r\nL\'échelle 1/4 a permis une sculpture plus fine de l\'armure ainsi que du pelage du Kyubi. Les LEDs incluent dans les yeux de Madara et du Kyubi mettent en valeur leur Sharingan.\r\nTaille : 51 cm', 500, 100, 185),
(21, 4, 'Empereur Kaido', 'Kaido.jpg', 'figurines', 'Anime One Piece quatre empereurs Kaido PVC Action Figure Modèle 19cm	', 250, 50, 65),
(24, 1, 'Tanjiro Pikachu version', 'PokeTanjiro.jpg', 'figurines', 'Véritable anime phénomène,  Kimetsu no Yaiba a déboulé dans la vie de nombreux fans de manga et d\'anime sans prévenir. Mais puisque créer des figurines à l\'effigie des personnages de l\'anime était trop simple, la société Game Harbors a souhaité mettre à l\'honneur un crossover un peu particulier : Kimetsu no Yaiba x Pokémon. Tanjiro sous la forme d\'un Pikachu (13cm).', 500, 5, 15),
(25, 1, 'Nezuko Pikachu version', 'PokeNezuko.jpg', 'figurines', 'Véritable anime phénomène,  Kimetsu no Yaiba a déboulé dans la vie de nombreux fans de manga et d\'anime sans prévenir. Mais puisque créer des figurines à l\'effigie des personnages de l\'anime était trop simple, la société Game Harbors a souhaité mettre à l\'honneur un crossover un peu particulier : Kimetsu no Yaiba x Pokémon. Nezuko sous la forme d\'un Pikachu (13cm).', 500, 5, 15),
(26, 1, 'Tanjiro et Nezuko Pikachu version', 'PokeTanjiro&Nezuko.jpg', 'figurines', 'Véritable anime phénomène,  Kimetsu no Yaiba a déboulé dans la vie de nombreux fans de manga et d\'anime sans prévenir. Mais puisque créer des figurines à l\'effigie des personnages de l\'anime était trop simple, la société Game Harbors a souhaité mettre à l\'honneur un crossover un peu particulier : Kimetsu no Yaiba x Pokémon. Ainsi, Tanjiro et Nezuko s\'illustrent alors sous la forme d\'un Pikachu (13cm).', 500, 10, 22.5),
(27, 2, 'GOGETA SSJ BLUE 52CM', 'gogita.png', 'figurines', 'Figurine de Gogeta en Super Saiyan Blue\r\nConçus et peint à la mains, la reproduction est fidèle au personnage de la série Dragon Ball.\r\nLa figurine contient des led.\r\nMatière: Résine haute qualité\r\nDimension: 52cm\r\nÉdition: Édition limitée\r\nÉditeur: Figure Class\r\nPièces: 240pcs', 500, 100, 175),
(28, 2, 'Statue Dragon Ball Z Majin Végéta HQS Plus By Tsume 54cm', 'majin.jpeg', 'figurines', 'La statue représente le prince des Saiyans sur le point de lancer son attaque – parfois appelée “Atomic Blast” – contre Majin Buu.\r\nIl porte sur le front la marque du sceau de possession de Babidi dont il vient tout juste de se libérer.\r\nSa tenue porte les stigmates de son combat face à Goku, et des éclairs l\'entourent… signe signe de la puissance du Super Saiyan 2.', 500, 25, 55);

-- --------------------------------------------------------

--
-- Structure de la table `streaming`
--

DROP TABLE IF EXISTS `streaming`;
CREATE TABLE IF NOT EXISTS `streaming` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Artworks_Id` int(11) NOT NULL,
  `Caption` varchar(120) NOT NULL,
  `Status` int(200) NOT NULL,
  `Saison` varchar(10010) DEFAULT NULL,
  `Description` varchar(900) NOT NULL,
  `Video` varchar(120) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `streaming`
--

INSERT INTO `streaming` (`Id`, `Artworks_Id`, `Caption`, `Status`, `Saison`, `Description`, `Video`, `CreationTimestamp`) VALUES
(1, 1, 'Kimetsu No Yaiba 01 VOSTFR', 1, 'Kimetsu No Yaiba Saison 1', 'Regardez le nouvel anime far de la decennie', 'Kimetsu_no_Yaiba_01_VOSTFR.mp4', '2019-12-28 15:17:47'),
(2, 1, 'Kimetsu No Yaiba 02 VOSTFR', 2, 'Kimetsu No Yaiba Saison 1', 'Continuez avec l\'episode 2 !!', 'Kimetsu_no_Yaiba_02_VOSTFR.mp4', '2019-12-28 16:26:43'),
(4, 7, 'Vinland Saga 24 VOSTFR', 24, 'Vinland Saga Saison 1', 't\'as vu le titre', 'Vinland_Saga_24_VOSTFR.mp4', '2019-12-31 10:28:00'),
(5, 2, 'DBS Broly', 1, 'Dragon Ball Films/OAV', 't\'as vu le titre', 'DBS_FILM_01_Broly_2018_VOSTFR.mp4', '2019-12-31 10:29:13'),
(6, 1, 'Kimetsu No Yaiba 03 VOSTFR', 3, 'Kimetsu No Yaiba Saison 1', 'ep kny 03', 'Kimetsu_no_Yaiba_03_VOSTFR.mp4', '2019-12-31 10:37:46'),
(8, 1, 'Kimetsu No Yaiba 04 VOSTFR', 4, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_04_VOSTFR.mp4', '2020-01-01 17:00:07'),
(9, 1, 'Kimetsu No Yaiba 05 VOSTFR', 5, 'Kimetsu No Yaiba Saison 1', 'ep 5', 'Kimetsu_no_Yaiba_05_VOSTFR.mp4', '2020-01-01 17:00:31'),
(10, 1, 'Kimetsu No Yaiba 06 VOSTFR', 6, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_06_VOSTFR.mp4', '2020-01-01 17:00:46'),
(11, 1, 'Kimetsu No Yaiba 07 VOSTFR', 7, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_07_VOSTFR.mp4', '2020-01-01 17:01:01'),
(12, 1, 'Kimetsu No Yaiba 08 VOSTFR', 8, 'Kimetsu No Yaiba Saison 1', 'ep 8', 'Kimetsu_no_Yaiba_08_VOSTFR.mp4', '2020-01-01 17:01:25'),
(13, 1, 'Kimetsu No Yaiba 09 VOSTFR', 9, 'Kimetsu No Yaiba Saison 1', 'tkt', 'Kimetsu_no_Yaiba_09_VOSTFR.mp4', '2019-12-31 10:37:46'),
(14, 1, 'Kimetsu No Yaiba 10 VOSTFR', 10, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_10_VOSTFR.mp4', '2020-01-01 17:00:07'),
(15, 1, 'Kimetsu No Yaiba 11 VOSTFR', 11, 'Kimetsu No Yaiba Saison 1', 'ep 5', 'Kimetsu_no_Yaiba_11_VOSTFR.mp4', '2020-01-01 17:00:31'),
(16, 1, 'Kimetsu No Yaiba 12 VOSTFR', 12, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_12_VOSTFR.mp4', '2020-01-01 17:00:46'),
(17, 1, 'Kimetsu No Yaiba 13 VOSTFR', 13, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_13_VOSTFR.mp4', '2020-01-01 17:01:01'),
(18, 1, 'Kimetsu No Yaiba 14 VOSTFR', 14, 'Kimetsu No Yaiba Saison 1', 'ep 8', 'Kimetsu_no_Yaiba_14_VOSTFR.mp4', '2020-01-01 17:01:25'),
(19, 1, 'Kimetsu No Yaiba 15 VOSTFR', 15, 'Kimetsu No Yaiba Saison 1', 'Regardez le nouvel anime far de la decennie', 'Kimetsu_no_Yaiba_15_VOSTFR.mp4', '2019-12-28 15:17:47'),
(20, 1, 'Kimetsu No Yaiba 16 VOSTFR', 16, 'Kimetsu No Yaiba Saison 1', 'Continuez avec l\'episode 2 !!', 'Kimetsu_no_Yaiba_16_VOSTFR.mp4', '2019-12-28 16:26:43'),
(21, 1, 'Kimetsu No Yaiba 17 VOSTFR', 17, 'Kimetsu No Yaiba Saison 1', 'tkt', 'Kimetsu_no_Yaiba_17_VOSTFR.mp4', '2019-12-31 10:37:46'),
(22, 1, 'Kimetsu No Yaiba 18 VOSTFR', 18, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_18_VOSTFR.mp4', '2020-01-01 17:00:07'),
(23, 1, 'Kimetsu No Yaiba 19 VOSTFR', 19, 'Kimetsu No Yaiba Saison 1', 'ep 5', 'Kimetsu_no_Yaiba_19_VOSTFR.mp4', '2020-01-01 17:00:31'),
(24, 1, 'Kimetsu No Yaiba 20 VOSTFR', 20, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_20_VOSTFR.mp4', '2020-01-01 17:00:46'),
(25, 1, 'Kimetsu No Yaiba 21 VOSTFR', 21, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_21_VOSTFR.mp4', '2020-01-01 17:01:01'),
(26, 1, 'Kimetsu No Yaiba 22 VOSTFR', 22, 'Kimetsu No Yaiba Saison 1', 'ep 22', 'Kimetsu_no_Yaiba_22_VOSTFR.mp4', '2020-01-01 17:01:25'),
(27, 1, 'Kimetsu No Yaiba 23 VOSTFR', 23, 'Kimetsu No Yaiba Saison 1', 'tkt', 'Kimetsu_no_Yaiba_23_VOSTFR.mp4', '2019-12-31 10:37:46'),
(28, 1, 'Kimetsu No Yaiba 24 VOSTFR', 24, 'Kimetsu No Yaiba Saison 1', 'ep 4', 'Kimetsu_no_Yaiba_24_VOSTFR.mp4', '2020-01-01 17:00:07'),
(29, 1, 'Kimetsu No Yaiba 25 VOSTFR', 25, 'Kimetsu No Yaiba Saison 1', 'ep 5', 'Kimetsu_no_Yaiba_25_VOSTFR.mp4', '2020-01-01 17:00:31'),
(30, 1, 'Kimetsu No Yaiba 26 VOSTFR', 26, 'Kimetsu No Yaiba Saison 1', 'magnifique !!!!', 'Kimetsu_no_Yaiba_26_VOSTFR.mp4', '2020-01-01 17:00:46'),
(31, 7, 'Vinland Saga 01 VOSTFR', 1, 'Vinland Saga Saison 1', 'ep 1', 'Vinland_Saga_01_VOSTFR.mp4', '2020-01-02 14:52:03'),
(32, 7, 'Vinland Saga 02 VOSTFR', 2, 'Vinland Saga Saison 1', 'ep 2', 'Vinland_Saga_02_VOSTFR.mp4', '2020-01-02 14:53:18'),
(33, 7, 'Vinland Saga 03 VOSTFR', 3, 'Vinland Saga Saison 1', 'ep 3', 'Vinland_Saga_03_VOSTFR.mp4', '2020-01-02 14:54:15'),
(34, 7, 'Vinland Saga 04 VOSTFR', 4, 'Vinland Saga Saison 1', 'ep 4', 'Vinland_Saga_04_VOSTFR.mp4', '2020-01-02 14:55:17'),
(35, 7, 'Vinland Saga 05 VOSTFR', 5, 'Vinland Saga Saison 1', 'ep 5', 'Vinland_Saga_05_VOSTFR.mp4', '2020-01-02 14:56:12'),
(36, 7, 'Vinland Saga 06 VOSTFR', 6, 'Vinland Saga Saison 1', 'ep 6', 'Vinland_Saga_06_VOSTFR.mp4', '2020-01-02 14:57:53'),
(37, 7, 'Vinland Saga 07 VOSTFR', 7, 'Vinland Saga Saison 1', 'ep 7', 'Vinland_Saga_07_VOSTFR.mp4', '2020-01-02 14:58:42'),
(38, 7, 'Vinland Saga 08 VOSTFR', 8, 'Vinland Saga Saison 1', 'ep 8', 'Vinland_Saga_08_VOSTFR.mp4', '2020-01-02 14:59:56'),
(39, 7, 'Vinland Saga 09 VOSTFR', 9, 'Vinland Saga Saison 1', 'ep 9', 'Vinland_Saga_09_VOSTFR.mp4', '2020-01-02 15:00:58'),
(40, 7, 'Vinland Saga 10 VOSTFR', 10, 'Vinland Saga Saison 1', 'ep 10', 'Vinland_Saga_10_VOSTFR.mp4', '2020-01-02 15:01:56'),
(41, 7, 'Vinland Saga 11 VOSTFR', 11, 'Vinland Saga Saison 1', 'ep 11', 'Vinland_Saga_11_VOSTFR.mp4', '2020-01-02 15:02:55'),
(42, 7, 'Vinland Saga 12 VOSTFR', 12, 'Vinland Saga Saison 1', 'ep 12', 'Vinland_Saga_12_VOSTFR.mp4', '2020-01-02 15:03:44'),
(43, 7, 'Vinland Saga 13 VOSTFR', 13, 'Vinland Saga Saison 1', 'ep 13', 'Vinland_Saga_13_VOSTFR.mp4', '2020-01-02 15:04:32'),
(44, 7, 'Vinland Saga 14 VOSTFR', 14, 'Vinland Saga Saison 1', 'ep 14', 'Vinland_Saga_14_VOSTFR.mp4', '2020-01-02 15:05:24'),
(45, 7, 'Vinland Saga 15 VOSTFR', 15, 'Vinland Saga Saison 1', 'ep 15', 'Vinland_Saga_15_VOSTFR.mp4', '2020-01-02 15:06:12'),
(46, 7, 'Vinland Saga 16 VOSTFR', 16, 'Vinland Saga Saison 1', 'ep 16', 'Vinland_Saga_16_VOSTFR.mp4', '2020-01-02 15:06:57'),
(47, 7, 'Vinland Saga 17 VOSTFR', 17, 'Vinland Saga Saison 1', 'ep 17', 'Vinland_Saga_17_VOSTFR.mp4', '2020-01-02 15:08:00'),
(48, 7, 'Vinland Saga 18 VOSTFR', 18, 'Vinland Saga Saison 1', 'ep 18', 'Vinland_Saga_18_VOSTFR.mp4', '2020-01-02 15:08:53'),
(49, 7, 'Vinland Saga 19 VOSTFR', 19, 'Vinland Saga Saison 1', 'ep 19', 'Vinland_Saga_19_VOSTFR.mp4', '2020-01-02 15:09:42'),
(50, 7, 'Vinland Saga 20 VOSTFR', 20, 'Vinland Saga Saison 1', 'ep 20', 'Vinland_Saga_20_VOSTFR.mp4', '2020-01-04 10:48:50'),
(51, 7, 'Vinland Saga 21 VOSTFR', 21, 'Vinland Saga Saison 1', 'ep 21', 'Vinland_Saga_21_VOSTFR-1.mp4', '2020-01-04 10:49:41'),
(52, 7, 'Vinland Saga 22 VOSTFR', 22, 'Vinland Saga Saison 1', 'ep 22', 'Vinland_Saga_22_VOSTFR.mp4', '2020-01-04 10:50:20'),
(53, 7, 'Vinland Saga 23 VOSTFR', 23, 'Vinland Saga Saison 1', 'ep 23', 'Vinland_Saga_23_VOSTFR.mp4', '2020-01-04 10:51:20'),
(54, 8, 'Gintama 22 VOSTFR', 22, 'Gintama', 'Retrouvez l\'episode 22 du meilleur anime d\'humour!', 'gintama22.mp4', '2020-05-12 13:33:39'),
(60, 8, 'Gintama 23 VOSTFR', 23, 'Gintama', 'madao 23', 'gintama23.mp4', '2020-05-15 16:37:04'),
(62, 8, 'Gintama 24 VOSTFR', 24, 'Gintama', 'gintama 24', 'gintama24.mp4', '2020-05-16 19:32:44'),
(63, 8, 'Gintama 25 VOSTFR', 25, 'Gintama', 'gintama 25', 'gintama25.mp4', '2020-05-16 19:32:44'),
(64, 8, 'Gintama 26 VOSTFR', 26, 'Gintama', 'gintama 26', 'gintama26.mp4', '2020-05-16 19:32:44'),
(65, 8, 'Gintama 27 VOSTFR', 27, 'Gintama', 'gintama 27', 'gintama27.mp4', '2020-05-16 19:37:17'),
(66, 8, 'Gintama 28 VOSTFR', 28, 'Gintama', 'gintama 28', 'gintama28.mp4', '2020-05-16 19:37:17'),
(67, 8, 'Gintama 29 VOSTFR', 29, 'Gintama', 'gintama 29', 'gintama29.mp4', '2020-05-16 19:37:17'),
(68, 8, 'Gintama 30 VOSTFR', 30, 'Gintama', 'gintama 30', 'gintama30.mp4', '2020-05-16 19:37:17'),
(69, 8, 'Gintama 31 VOSTFR', 31, 'Gintama', 'gintama 31', 'gintama31.mp4', '2020-05-16 19:37:17'),
(70, 8, 'Gintama 32 VOSTFR', 32, 'Gintama', 'gintama 32', 'gintama32.mp4', '2020-05-16 19:37:17'),
(71, 11, 'Saiki Kusuo No Psi Nan 02 VOSTFR', 2, 'Saiki Kusuo No Psi Nan Saison 1', 'Saiki Kusuo 02', 'sai02.mp4', '2020-05-16 19:50:43'),
(72, 10, 'Fate/Zero 01 VOSTFR', 1, 'Zero', 'Fate/Zero 1', 'fatezero01.mp4', '2020-05-17 13:30:26'),
(73, 10, 'Fate/Zero 02 VOSTFR', 2, 'Zero', 'Fate/zero 2', 'fatezero02.mp4', '2020-05-17 13:31:01'),
(74, 10, 'Fate/Zero 03 VOSTFR', 3, 'Zero', 'Fate/zero 3', 'fatezero03.mp4', '2020-05-17 13:32:11'),
(75, 10, 'Fate/Zero 04 VOSTFR', 4, 'Zero', 'Fate/zero 4', 'fatezero04.mp4', '2020-05-17 13:32:41'),
(76, 10, 'Fate/Zero 05 VOSTFR', 5, 'Zero', 'Fate/zero 5', 'fatezero05.mp4', '2020-05-17 13:33:01'),
(77, 10, 'Fate/Zero 06 VOSTFR', 6, 'Zero', 'Fate/zero 6', 'fatezero06.mp4', '2020-05-17 13:33:21'),
(78, 10, 'Fate/Zero 07 VOSTFR', 7, 'Zero', 'Fate/zero 7', 'fatezero07.mp4', '2020-05-17 13:33:44'),
(79, 10, 'Fate/Zero 08 VOSTFR', 8, 'Zero', 'Fate/zero 8', 'fatezero08.mp4', '2020-05-17 13:34:33'),
(80, 10, 'Fate/Zero 09 VOSTFR', 9, 'Zero', 'Fate/zero 9', 'fatezero09.mp4', '2020-05-17 13:34:54'),
(81, 10, 'Fate/Zero 10 VOSTFR', 10, 'Zero', 'Fate/zero 10', 'fatezero10.mp4', '2020-05-17 13:35:17'),
(82, 10, 'Fate/Zero 11 VOSTFR', 11, 'Zero', 'Fate/zero 11', 'fatezero11.mp4', '2020-05-17 13:35:45'),
(83, 10, 'Fate/Zero 12 VOSTFR', 12, 'Zero', 'Fate/zero 12', 'fatezero12.mp4', '2020-05-17 13:36:06'),
(84, 10, 'Fate/Zero 13 VOSTFR', 13, 'Zero', 'Fate/zero 13', 'fatezero13.mp4', '2020-05-17 13:36:24'),
(85, 10, 'Fate/Zero 14 VOSTFR', 14, 'Zero', 'Fate/zero 14', 'fatezero14.mp4', '2020-05-17 13:36:48'),
(86, 10, 'Fate/Zero 15 VOSTFR', 15, 'Zero', 'Fate/zero 15', 'fatezero15.mp4', '2020-05-17 13:37:14'),
(87, 10, 'Fate/Zero 16 VOSTFR', 16, 'Zero', 'Fate/zero 16', 'fatezero16.mp4', '2020-05-17 13:39:20'),
(88, 10, 'Fate/Zero 17 VOSTFR', 17, 'Zero', 'Fate/zero  17', 'fatezero17.mp4', '2020-05-17 13:39:53'),
(89, 10, 'Fate/Zero 18 VOSTFR', 18, 'Zero', 'Fate/zero 18', 'fatezero18.mp4', '2020-05-17 13:40:13'),
(90, 10, 'Fate/Zero 19 VOSTFR', 19, 'Zero', 'Fate/zero 19', 'fatezero19.mp4', '2020-05-17 13:40:34'),
(91, 10, 'Fate/Zero 20 VOSTFR', 20, 'Zero', 'Fate/zero 20', 'fatezero20.mp4', '2020-05-17 13:40:58'),
(92, 10, 'Fate/Zero 21 VOSTFR', 21, 'Zero', 'Fate/zero 21', 'fatezero21.mp4', '2020-05-17 13:41:22'),
(93, 10, 'Fate/Zero 22 VOSTFR', 22, 'Zero', 'Fate/zero 22', 'fatezero22.mp4', '2020-05-17 13:41:49'),
(94, 10, 'Fate/Zero 23 VOSTFR', 23, 'Zero', 'Fate/zero 23', 'fatezero23.mp4', '2020-05-17 13:42:27'),
(95, 10, 'Fate/Zero 24 VOSTFR', 24, 'Zero', 'Fate/zero 24', 'fatezero24.mp4', '2020-05-17 13:43:32'),
(96, 10, 'Fate/Zero 25 VOSTFR', 25, 'Zero', 'Fate/zero 25', 'fatezero25.mp4', '2020-05-17 13:43:55'),
(99, 5, 'Vinland Saga 01 VOSTFR', 1, 'My Hero Academia Saison 2', 'JSP', 'Kimetsu_no_Yaiba_01_VOSTFR.mp4', '2020-05-21 15:11:05'),
(98, 10, 'Fate/Stay Night: Unlimited Blade Works 01 VOSTFR', 26, 'Stay Night: Unlimited Blade Works', 'fate ubw 1', 'fateubw01.mp4', '2020-05-18 13:32:34'),
(100, 5, 'dsqdsq', 1, 'My Hero Academia Saison 1', 'qsd', 'sqdqsd.mp4', '2020-05-21 15:14:05'),
(101, 5, 'Vinland Saga 01 VOSTFR', 1, 'My Hero Academia Saison 3', 'fdgfdg', 'Kimetsu_no_Yaiba_01_VOSTFR.mp4', '2020-05-21 15:26:41'),
(102, 5, 'Vinland Saga 02 VOSTFR', 2, 'My Hero Academia Saison 3', 'fdgdfg', 'Kimetsu_no_Yaiba_01_VOSTFR.mp4', '2020-05-21 15:30:00'),
(103, 5, 'My Hero Academia 22 VOSTFR', 22, 'My Hero Academia Saison 4', 'qsq', 'Kimetsu_no_Yaiba_22_VOSTFR.mp4', '2020-05-21 15:32:35'),
(104, 5, 'My Hero Academia 23 VOSTFR', 23, 'My Hero Academia Saison 4', 'fsdsdfsd', 'Kimetsu_no_Yaiba_23_VOSTFR.mp4', '2020-05-21 15:33:55'),
(105, 10, 'Fate Apocrypha 1 VOSTFR', 1, 'Apocrypha', 'fate apo 1', 'fateapocrypha01.mp4', '2020-05-22 17:00:07'),
(106, 10, 'Fate Apocrypha 2 VOSTFR', 2, 'Apocrypha', 'fate apocrypha 02', 'fateapocrypha02.mp4', '2020-05-23 14:26:10'),
(107, 4, 'op 05 vostfr', 5, 'One Piece', 'sqdqsd', 'Kimetsu_no_Yaiba_11_VOSTFR.mp4', '2020-05-25 16:02:17'),
(108, 4, 'op 08 vostfr', 8, 'One Piece', 'sqdsqdqsd', 'Kimetsu_no_Yaiba_17_VOSTFR.mp4', '2020-05-25 16:03:11'),
(109, 13, 'Made In Abyss 01 VOSTFR', 1, 'Made In Abyss Saison 1', 'Episode 1', 'Made in Abyss - 01 vostfr FHD.mp4', '2020-05-26 15:23:52'),
(110, 12, 'Made In Abyss 01 VOSTFR', 1, 'Made In Abyss Saison 1', 'Episode 01 VOSTFR', 'Made in Abyss - 01 vostfr FHD.mp4', '2020-05-26 16:10:07'),
(111, 13, 'Shingeki No Kyojin 02 VOSTFR', 2, 'Shingeki No Kyojin Saison 1', 'Ep 2', 'shingeki+no+kyojin+02.mp4', '2020-05-26 16:27:53');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(120) NOT NULL,
  `LastName` varchar(120) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `Pseudo` varchar(20) DEFAULT NULL,
  `Password` varchar(120) NOT NULL,
  `Address` varchar(360) NOT NULL,
  `City` varchar(120) NOT NULL,
  `Zip` varchar(11) NOT NULL,
  `Role` varchar(11) NOT NULL,
  `CreationTimestamp` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`Id`, `FirstName`, `LastName`, `Email`, `Pseudo`, `Password`, `Address`, `City`, `Zip`, `Role`, `CreationTimestamp`) VALUES
(1, 'Abmane', 'Oussoul', 'admin@gmail.com', 'admin', '$2y$11$1cf67a5dea60152ac284fu.dmjXduH4H4JEW7C3vmtO/PI1mx9cAa', '05 avenue nord', 'Paris', '75010', 'admin', '2019-12-26 16:53:31'),
(3, 'Kuzumo', 'Power', 'sallukhan0805@gmail.com', 'Omoshiroy', '$2y$11$423b35d4a0d61dbe6c816u.Ja2kSZFDmMAB7EhU53jPBvC0pLB75y', 'chez konoha ', 'Le village de beerus', '68125', 'user', '2019-12-27 17:34:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
