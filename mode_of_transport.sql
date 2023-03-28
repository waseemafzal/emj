-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 28, 2023 at 08:32 AM
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
-- Table structure for table `mode_of_transport`
--

DROP TABLE IF EXISTS `mode_of_transport`;
CREATE TABLE IF NOT EXISTS `mode_of_transport` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mode_of_transport`
--

INSERT INTO `mode_of_transport` (`id`, `description`, `method`) VALUES
(1, 'Chowk Shah Abbass, Multan', 'mail'),
(2, 'jllkhjk', 'ground'),
(3, '/;m.,m', 'rail'),
(4, 'm.,', 'ocean'),
(5, 'bvcbv', 'unknown'),
(6, 'nlhjlk', 'pipe');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
