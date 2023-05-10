-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 10, 2023 at 06:47 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emjay`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'catdefault.png',
  `icon_class` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `parent`, `status`, `image`, `icon_class`) VALUES
(1, '2020', '0', 1, 'catdefault.png', 'fa fa-folder'),
(2, '2021', '0', 1, 'catdefault.png', 'fa fa-folder'),
(3, '2022', '0', 1, 'catdefault.png', 'fa fa-folder'),
(4, '2023', '0', 1, 'catdefault.png', 'fa fa-folder'),
(5, 'january', '1', 1, 'catdefault.png', 'fa fa-folder'),
(6, 'february', '1', 1, 'catdefault.png', 'fa fa-folder'),
(7, 'ABL', '5', 1, 'catdefault.png', NULL),
(8, 'HCL', '5', 1, 'catdefault.png', NULL),
(9, 'march', '2', 1, 'catdefault.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shipment_order_id` int NOT NULL,
  `cat_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `shipment_order_id`, `cat_id`) VALUES
(1, 198, 0),
(2, 199, 0),
(3, 200, 0),
(4, 201, 0),
(5, 202, 0),
(6, 203, 0),
(7, 204, 0),
(8, 206, 0),
(9, 209, 7),
(10, 210, 8),
(11, 217, 7),
(12, 218, 7),
(13, 219, 0),
(14, 220, 8),
(15, 221, 7),
(16, 222, 8),
(17, 0, 7),
(18, 0, 8),
(19, 0, 7),
(20, 226, 8),
(21, 231, 7),
(22, 232, 8),
(23, 233, 8),
(24, 234, 7),
(25, 235, 8),
(26, 236, 7),
(27, 237, 7),
(28, 238, 7),
(29, 239, 8),
(30, 240, 7),
(31, 241, 8),
(32, 242, 7),
(33, 243, 8),
(34, 251, 0),
(35, 252, 8),
(36, 253, 2),
(37, 254, 4),
(38, 255, 5),
(39, 256, 8),
(40, 257, 1),
(41, 258, 6),
(42, 268, 4),
(43, 269, 5),
(44, 271, 8),
(45, 272, 6),
(46, 273, 3),
(47, 274, 5),
(48, 275, 8),
(49, 276, 6),
(50, 277, 2),
(51, 278, 2),
(52, 336, 1),
(53, 337, 0),
(54, 367, 0),
(55, 428, 9),
(56, 429, 2),
(57, 430, 8),
(58, 431, 5),
(59, 439, 5),
(60, 448, 9),
(61, 451, 7),
(62, 452, 1),
(63, 453, 0),
(64, 454, 5),
(65, 455, 4),
(66, 456, 4),
(67, 457, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
