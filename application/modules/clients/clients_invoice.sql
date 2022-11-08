-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2022 at 10:22 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prapser_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_invoice`
--

CREATE TABLE `clients_invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `detail` text NOT NULL,
  `payment_terms` text DEFAULT NULL,
  `tax` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `paid` enum('Yes','No') NOT NULL,
  `created_date` date NOT NULL,
  `due_date` date NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `workorder_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients_invoice`
--
ALTER TABLE `clients_invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients_invoice`
--
ALTER TABLE `clients_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
