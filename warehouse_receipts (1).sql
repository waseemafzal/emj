-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2023 at 07:27 PM
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
-- Table structure for table `warehouse_receipts`
--

DROP TABLE IF EXISTS `warehouse_receipts`;
CREATE TABLE IF NOT EXISTS `warehouse_receipts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `warehouse_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `employ_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `issued_by` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `entry_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `transaction_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `division` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bonded_warehouse` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `destination_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `client_to_bill` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mode_of_transport` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `origin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `destination` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `carrier` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `driver_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `driver_license_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pro_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `driver_tracking_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `package_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pieces` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `part_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dimension_unit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `weight_unit_measure` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `volume_unit_measure` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unit_weight` varchar(255) NOT NULL,
  `unit_volume` varchar(255) NOT NULL,
  `total_weight` varchar(255) NOT NULL,
  `total_volume` varchar(255) NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unitary_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serial_number_1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serial_number_2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_length` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_weight` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_width` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_height` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `container_volume` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `charges_status` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `charges_description` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prepaid` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_quantity` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tax_code` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tax_rate` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tax_amount` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount_with_tax` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `final_amount` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expense` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `income` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qr_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `warehouse_receipts`
--

INSERT INTO `warehouse_receipts` (`id`, `warehouse_name`, `employ_name`, `issued_by`, `date`, `time`, `entry_no`, `transaction_number`, `division`, `bonded_warehouse`, `destination_agent`, `shipper_name`, `consignee_name`, `shipper_address`, `consignee_address`, `client_to_bill`, `mode_of_transport`, `origin`, `destination`, `supplier_name`, `supplier_address`, `carrier`, `driver_name`, `driver_license_number`, `pro_number`, `driver_tracking_number`, `status`, `description`, `package_type`, `pieces`, `part_number`, `model`, `location`, `length`, `width`, `height`, `dimension_unit`, `weight_unit_measure`, `volume_unit_measure`, `unit_weight`, `unit_volume`, `total_weight`, `total_volume`, `quantity`, `unit`, `unitary_value`, `total_value`, `container_type`, `container_description`, `container_number`, `serial_number_1`, `serial_number_2`, `container_location`, `container_length`, `container_weight`, `container_width`, `container_height`, `container_volume`, `charges_status`, `charges_description`, `prepaid`, `total_quantity`, `price`, `amount`, `tax_code`, `tax_rate`, `tax_amount`, `amount_with_tax`, `currency`, `final_amount`, `expense`, `income`, `notes`, `file`, `qr_image`) VALUES
(1, 'Emj', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', 'Multan', 'hkjhjk', 'Ahmad', 'waseem', 'mr ben', 'Shah Jamal ', 'Multan', 'ultimate_consignee', 'hjk', 'Shah Jamal ', 'Multan', 'Jawad Ahmad', 'chowk shah abbas', 'Speedocargo', 'Jawad', '798', '789798', '', '', '', 'large box', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Mini Goods', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', 'a013a47ae0f0b90e9471902861ffaad8.jpg', NULL),
(2, 'Local Warehouse', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', '', '', '', 'waseem', 'mr ben', '', '', 'ultimate_consignee', '', '', '', 'Jawad Ahmad', '', '', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', NULL),
(5, 'Local Warehouse', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', '', '', '', 'waseem', 'mr ben', 'xyz', 'xyz', 'ultimate_consignee', 'sdsd', 'sds', 'sdsd', 'Jawad Ahmad', 'sdsd', 'UPS', 'Jawad', '798', '789798', '', 'Unassigned', 'ssd', 'extra large box', '2', '12', '12', '12', '35', '2', '144', 'inches', 'lb', 'ft3', '', '', '', '', '6', '3', '3', '200', 'Cargo', 'sds', '8900', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', 'sds', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', NULL),
(4, 'Emj', 'Jawad Ahmad', 'kjhk', '2023-01-24', '16:19', '796000', '678', '', '', '', 'waseem', 'mr ben', '', '', 'ultimate_consignee', '', '', '', 'Jawad Ahmad', '', '', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', NULL),
(6, 'Emj', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', 'Multan', 'hkjhjk', 'Ahmad', 'waseem', 'mr ben', 'Lahore', 'Multan', 'ultimate_consignee', 'joijoi', 'joij', 'joijo', 'Jawad Ahmad', 'Multan', 'jhjk', 'Jawad', '798', '789798', '', 'lkjlk', 'jlkjlkj', 'extra large box', '4', 'lkjlkj', 'k;lk', 'k;lk;l', '07', '09', '08', 'inches', 'lb', 'ft3', '', '', '', '', '6', '90890', '8908', '891', 'Cargo', 'k;lk', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', 'jlkjl', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', 'jlkhlk,k;ljkhkjhk', 'b1799d4d7ee01521948e3cd66d85e7c7.jpg', NULL),
(7, 'Emj', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', 'Multan', 'hkjhjk', 'Ahmad', 'waseem', 'mr ben', 'Lahore', 'Multan', 'ultimate_consignee', 'joijoi', 'joij', 'joijo', 'Jawad Ahmad', 'Multan', 'jhjk', 'Jawad', '798', '789798', '', 'lkjlk', 'jlkjlkj', 'extra large box', '4', 'lkjlkj', 'k;lk', 'k;lk;l', '07', '09', '08', 'inches', 'lb', 'ft3', '', '', '', '', '6', '90890', '8908', '891', 'Cargo', 'k;lk', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', 'jlkjl', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', 'jlkhlk,k;ljkhkjhk', '09e8eb251ec040c3fa62b6a4ccb9be28.jpg', NULL),
(8, 'Emj', 'Jawad Ahmad', 'Emj', '2023-01-24', '16:19', '796000', '678', 'Multan', 'hkjhjk', 'Ahmad', 'waseem', 'mr ben', 'Lahore', 'Multan', 'ultimate_consignee', 'joijoi', 'joij', 'joijo', 'Jawad Ahmad', 'Multan', 'jhjk', 'Jawad', '798', '789798', '', 'lkjlk', 'jlkjlkj', 'extra large box', '4', 'lkjlkj', 'k;lk', 'k;lk;l', '07', '09', '08', 'inches', 'lb', 'ft3', '', '', '', '', '6', '90890', '8908', '891', 'Cargo', 'k;lk', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', 'jlkjl', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', 'jlkhlk,k;ljkhkjhk', '1aac1e47f26a42013b502999ff2a5846.jpg', ''),
(9, '', 'hkj', 'Emj', '', '', '', '678', '', '', 'Waseem Afzal', 'waseem', 'mr ben', 'Sui Gas Chowk Multan', 'Delhi, India', 'ultimate_consignee', 'jljlk', 'mlk', 'klmlk', 'Jawad Ahmad', '', 'ml;m', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '2', '78', '156', 'Mini Goods', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', 'd80ff4bb356186231c926cdb7577558b.jpg', ''),
(10, '', 'hkj', 'Emj', '', '', '', '678', '', '', 'Shaheer', 'waseem', 'mr ben', '', '', 'ultimate_consignee', '', '', '', 'Jawad Ahmad', '', '', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(11, '', 'hkj', 'Emj', '', '', '', '678', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'rail', '', '', 'Jawad Ahmad', '', '', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '845151989ce681573270f9dd8f7de84a.jpg', ''),
(12, '', 'hkj', 'Emj', '', '', '', '678', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'ground', '', '', 'Jawad Ahmad', '', '', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(13, '', 'hkj', 'Emj', '', '', '', '678', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Jawad Ahmad', '', '1', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(14, '', 'Jawad Ahmad', 'Emj', '', '', '', '3004945', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Jawad Ahmad', '', '1', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(15, '', 'hkj', 'Emj', '', '', '', '1006532', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Waseem', '', '1', 'Jawad', '798', '789798', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Cargo', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(16, '', 'Jawad Ahmad', 'Emj', '', '', '', '6796077', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Waseem', '', '1', 'Jawad', '1100', '', '', '', '', 'Not Selected', '', '', '', '', '', '', '', 'Not Selected', 'lb', 'ft3', '', '', '', '', '6', '', '', '', 'Mini Goods', '', '23', '89', '787', 'Multan', '230', '440', '34', '239', '449', 'Active', '', '897', '', '56', '789', '897', '768', '565', '1200', 'Pkr', '1050', '200', '900', '', '', ''),
(17, '', 'Jawad Ahmad', 'Emj', '', '', '', '8781990', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Waseem', '', '1', 'Jawad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, '', 'Jawad Ahmad', 'Emj', '', '', '', '5732473', '', '', 'waseem afzal', 'waseem', 'mr ben', '', '', 'ultimate_consignee', 'Choose Mode', '', '', 'Waseem', '', '1', 'Jawad', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Active', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
