-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 mars 2021 à 18:05
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_image` text CHARACTER SET utf8 NOT NULL,
  `admin_contact` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_job` varchar(255) CHARACTER SET utf8 NOT NULL,
  `admin_about` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_country`, `admin_job`, `admin_about`) VALUES
(2, 'Gregory Jonville', 'admin@gmail.com', '$2y$10$7zmxri3mVbjQtMep0WK6ueO6Tl4y3DmQKBK1PAXoUSAyhIYmpE9Z2', 'mee.jpg', '0123456789', 'France', 'webdev', 'nothing');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `p_option` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cat_desc` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Samsung', 'Samusun'),
(2, 'Apple', 'Apple'),
(3, 'Sony', 'Sony'),
(4, 'LG', 'LG'),
(5, 'Oneplus', 'Oneplus'),
(6, 'autre', 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_city` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_contact` varchar(10) CHARACTER SET utf8 NOT NULL,
  `customer_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `customer_cp` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_cp`) VALUES
(13, 'gregory jonville', 'gregory@laplateforme.io', '$2y$10$jZvtGRkm7cA0hRAM977EnOGWm1c1Cv7a8s9PETxcxNfxccUCcbE3q', 'France', 'Marseille', '0650217983', '39 rue fauchier', 'auto.jpg', '13002'),
(14, 'Jean machin', 'jean@gmail.com', '$2y$10$gHnbXs4vzMIC6pjWsKBIm.uUPMlNGdKsD.WPlKNmWP/uUG6GZoPbS', 'France', 'Marseille', '0650217983', '39 rue fauchier', 'Armoiries_de_Marseille.svg.png', '13002');

-- --------------------------------------------------------

--
-- Structure de la table `customer_orders`
--

DROP TABLE IF EXISTS `customer_orders`;
CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `due_amount` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `p_option` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `qty`, `p_option`, `order_date`, `order_status`) VALUES
(16, 13, 2000, 1950724109, 2, 'rouge', '2021-03-04 08:30:21', 'Complete'),
(17, 13, 30, 1950724109, 2, 'autre', '2021-03-04 08:30:55', 'Complete'),
(18, 14, 1000, 319602891, 1, 'rouge', '2021-03-04 08:40:50', 'Complete'),
(19, 14, 89, 319602891, 1, 'rouge', '2021-03-04 07:39:14', 'Complete'),
(20, 14, 1000, 349330262, 1, 'noir', '2021-03-04 09:04:24', 'Complete'),
(21, 14, 3000, 1830727177, 3, 'gris', '2021-03-04 16:53:25', 'Complete');

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ref_no` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `payment_date` text CHARACTER SET utf8 NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(18, 1950724109, 2000, 'visa', 123456789, 123, '2021-03-27'),
(19, 1950724109, 30, 'visa', 123456789, 123, '2021-03-19'),
(20, 319602891, 1000, 'marster Card', 1234567890, 123, '2021-03-04'),
(23, 349330262, 1000, 'marster Card', 1234567, 1234, '2021-03-04');

-- --------------------------------------------------------

--
-- Structure de la table `pending_orders`
--

DROP TABLE IF EXISTS `pending_orders`;
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(255) CHARACTER SET utf8 NOT NULL,
  `order_status` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_cat_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `product_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `product_img1` varchar(255) NOT NULL,
  `product_img2` varchar(255) NOT NULL,
  `product_img3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_desc` text CHARACTER SET utf8 NOT NULL,
  `product_keywords` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `add_date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`) VALUES
(1, 4, 6, '2021-03-04 06:38:56', 'Cable usb-C', '61+V9ogmslL._AC_SL1500_.jpg', '71uN-pwbusL._AC_SX679_.jpg', 'cable-usb-vers-usb-type-c-15m-kubii.jpg', 15, '<p><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Type : USB-C.</span></p>\r\n<p><span style=\"color: #333333; font-family: Roboto, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Longueur : 1,5m.</span></p>', 'usb-c'),
(2, 2, 6, '2021-03-04 10:49:05', '3310', 'nokia-3310.jpg', 'téléchargement (2).jfif', 'téléchargement (3).jfif', 89, '<p style=\"margin: 0.5em 0px; color: #202122; font-family: sans-serif;\">Le 3310 est un t&eacute;l&eacute;phone compact mais un peu lourd avec ses 133 grammes. De forme rectangulaire l&eacute;g&egrave;rement arrondie, il tient dans la paume d\'une main. Son &eacute;cran monochrome affiche 84 &times; 48 pixels. Ce t&eacute;l&eacute;phone a &eacute;t&eacute; tr&egrave;s appr&eacute;ci&eacute; pour sa grande robustesse et sa r&eacute;sistance aux chocs.</p>\r\n<p style=\"margin: 0.5em 0px; color: #202122; font-family: sans-serif;\">Les boutons peuvent &ecirc;tre actionn&eacute;s avec le pouce. Le bouton bleu, qui est le bouton principal, permet de choisir les options, et le bouton &laquo; C &raquo; de retourner en arri&egrave;re ou de quitter l\'application. On trouve des boutons qui permettent de naviguer vers le haut et vers le bas, avec deux fl&egrave;ches qui indiquent la direction. Le bouton &laquo; Marche/Arr&ecirc;t/Profil &raquo; est un bouton noir situ&eacute; sur le dessus du t&eacute;l&eacute;phone.</p>', '3310'),
(4, 1, 2, '2021-03-04 06:44:32', 'Iphone 12', 'iphone-12-pro-blue-hero.png', 'iphone-12-pro-blue-hero.png', 'iphone-12-pro-blue-hero.png', 1200, '<p>L\'iPhone 12 est le mod&egrave;le principal de la 14e g&eacute;n&eacute;ration de smartphone d\'Apple annonc&eacute; le 13 octobre 2020. Il est &eacute;quip&eacute; d\'un &eacute;cran de 6,1 pouces OLED HDR 60 Hz, d\'un double capteur photo avec ultra grand-angle et d\'un SoC Apple A14 Bionic compatible 5G (sub-6 GHz).</p>', 'iphone 12'),
(11, 1, 4, '2021-03-04 09:43:16', 'LG V20', '61p2sKtBZzL._AC_SX679_.jpg', 'lg-v20.png', 'original-lg-v20-h910-h918-vs995-unlocked.jpg', 100, '<p>Le LG V20 est un smartphone de 5,7 pouces. Il a la particularit&eacute; de poss&eacute;der deux dalles : une IPS LCD QHD pour l\'&eacute;cran principal, et l\'autre IPS Quantum d\'une r&eacute;solution de 160 x 1040 pixels qui permet d\'afficher les notifications, des raccourcis, etc.<br />Le t&eacute;l&eacute;phone est &eacute;quip&eacute; d\'un SoC Snapdragon 820, 4Go de RAM, un double capteur photo arri&egrave;re de 16 m&eacute;gapixels et un capteur de 5 m&eacute;gapixels &agrave; l\'avant. Le t&eacute;l&eacute;phone existe en version 32 et 64Go.<br />A cause de sa batterie amovible, le t&eacute;l&eacute;phone n\'est pas &eacute;tanche, mais il est cependant r&eacute;sistant aux chocs et certifi&eacute; MIL-STD-810G.</p>', 'LG V20'),
(12, 3, 2, '2021-03-04 09:46:05', 'coque iphone 12 ', 'MHL03.jfif', 'téléchargement (4).jfif', 'téléchargement (5).jfif', 45, '<h1 class=\"materializer\" style=\"margin: 0px; padding: 0px; color: #111111; quotes: \'&laquo;&nbsp;\' \'&nbsp;&raquo;\'; transition-property: opacity; transition-duration: 0.1s; opacity: 1; font-size: 32px; line-height: 1.125; letter-spacing: 0.004em; font-family: \'SF Pro Display\', \'SF Pro Icons\', \'AOS Icons\', \'Helvetica Neue\', Helvetica, Arial, sans-serif;\" data-autom=\"productTitle\">Coque en silicone avec MagSafe pour iPhone 12 | 12 Pro</h1>', 'iphone 12'),
(15, 1, 1, '2021-03-04 06:31:35', 'Galaxy S20', 'samsung-galaxy-s20-frandroid-2020-5g.png', 'S20-FE_Navy_SKUimage_MO-img.webp', 'téléchargement (1).jfif', 1000, '<p>Le Samsung Galaxy S20 est un smartphone haut de gamme de Samsung annonc&eacute; en f&eacute;vrier 2020 et disponible d&eacute;but mars 2020 qui succ&egrave;de au Galaxy S10. Il est &eacute;quip&eacute; d\'un &eacute;cran AMOLED de 6,2 pouces certifi&eacute; HDR10+, d\'un triple capteur photo polyvalent entre ultra grand-angle et zoom 3X (30X en hybride) et d\'un processeur Exynos 990 grav&eacute; en 7 nm &eacute;paul&eacute; par 8 Go de RAM (12 Go en version 5G). Il est disponible en version 4G ou 4G+5G et avec 128 Go de stockage UFS 3.0.</p>', 'samsung Galaxy S20');

-- --------------------------------------------------------

--
-- Structure de la table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `p_cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_cat_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `p_cat_desc` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`p_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(1, 'Smartphone', 'occasion pres du neuf'),
(2, 'Telephone', 'Telephones simples'),
(3, 'Coques', 'Coques de telephone'),
(4, 'Accessoires', 'Accessoires de smartphone');

-- --------------------------------------------------------

--
-- Structure de la table `récupération`
--

DROP TABLE IF EXISTS `récupération`;
CREATE TABLE IF NOT EXISTS `récupération` (
  `id_recuperation` int(11) NOT NULL AUTO_INCREMENT,
  `email_client` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `verification` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_recuperation`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slide_image` text CHARACTER SET utf8 NOT NULL,
  `slide_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `slide_text` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `slider`
--

INSERT INTO `slider` (`slide_id`, `slide_name`, `slide_image`, `slide_title`, `slide_text`) VALUES
(18, 'Depannage informatique', 'reparation-pc-nice-1170x780.jpg', 'Depannage informatique', '  Diagnostic rapide pour des problemes informatiques simples.'),
(19, 'smartphones', 'Smartphones-unter-200-Euro.jpg', 'smartphones', 'Des produits quasi neufs à bon prix !');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
