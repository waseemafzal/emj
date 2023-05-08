-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2023 at 01:33 PM
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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
CREATE TABLE IF NOT EXISTS `history` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shipment_order_id` int NOT NULL,
  `cat_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

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
(51, 278, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mailing`
--

DROP TABLE IF EXISTS `mailing`;
CREATE TABLE IF NOT EXISTS `mailing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
