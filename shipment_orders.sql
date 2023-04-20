-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2023 at 08:07 AM
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
-- Table structure for table `shipment_orders`
--

DROP TABLE IF EXISTS `shipment_orders`;
CREATE TABLE IF NOT EXISTS `shipment_orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shipment_type` int NOT NULL COMMENT '1=personal effect,2=ocean frieght,3=Air Frieght,4=Vehicle Shipment',
  `shipper_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_country` int NOT NULL DEFAULT '160',
  `shipper_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipper_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_pickup` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `pickup_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `request_insurance` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No',
  `delivery_type` enum('Home','Lagos Warehouse') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_country` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `consignee_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `length` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `package_type` enum('Extra Large Box','Large Box','Medium Box','Letter') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `package_weight` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `carriage_value` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `shipment_from` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipment_to` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shipment_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `expected_delivery_date` date DEFAULT NULL,
  `track_number` double NOT NULL,
  `user_id` int DEFAULT NULL,
  `shipment_status` int NOT NULL,
  `shipment_name` varchar(255) NOT NULL,
  `landing_bill_no` varchar(255) NOT NULL,
  `booking_no` varchar(255) NOT NULL,
  `executed_place` varchar(255) NOT NULL,
  `executed_by` varchar(255) NOT NULL,
  `executed_date` varchar(255) NOT NULL,
  `departure_date` varchar(255) NOT NULL,
  `departure_time` varchar(255) NOT NULL,
  `arrival_date` varchar(255) NOT NULL,
  `arrival_time` varchar(255) NOT NULL,
  `declared_value` varchar(255) NOT NULL,
  `description_of_goods` varchar(255) NOT NULL,
  `ultimate_consignee` varchar(255) NOT NULL,
  `ultimate_consignee_address` varchar(255) NOT NULL,
  `notify_party` varchar(255) NOT NULL,
  `intermediate` varchar(255) NOT NULL,
  `notify_party_address` varchar(255) NOT NULL,
  `intermediate_address` varchar(255) NOT NULL,
  `forwording_agent` varchar(255) NOT NULL,
  `destination_agent` varchar(255) NOT NULL,
  `forwording_agent_address` varchar(255) NOT NULL,
  `destination_agent_address` varchar(255) NOT NULL,
  `service_type` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `mode_of_transport` varchar(255) NOT NULL,
  `port_of_origin` varchar(255) NOT NULL,
  `pre_carriage_by` varchar(255) NOT NULL,
  `place_of_receipt` varchar(255) NOT NULL,
  `loading_pier` varchar(255) NOT NULL,
  `port_of_loading` varchar(255) NOT NULL,
  `exporting_carrier` varchar(255) NOT NULL,
  `vessel_name` varchar(255) NOT NULL,
  `voyage_identification` varchar(255) NOT NULL,
  `port_of_unloading` varchar(255) NOT NULL,
  `on_carriage_by` varchar(255) NOT NULL,
  `place_of_delievry` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `shipment_orders`
--

INSERT INTO `shipment_orders` (`id`, `shipment_type`, `shipper_name`, `shipper_phone`, `shipper_address`, `shipper_country`, `shipper_state`, `shipper_city`, `request_pickup`, `pickup_location`, `request_insurance`, `delivery_type`, `consignee_name`, `consignee_address`, `consignee_phone`, `item_description`, `consignee_country`, `consignee_state`, `consignee_city`, `quantity`, `length`, `width`, `height`, `package_type`, `package_weight`, `carriage_value`, `amount`, `shipment_from`, `shipment_to`, `shipment_date`, `expected_delivery_date`, `track_number`, `user_id`, `shipment_status`, `shipment_name`, `landing_bill_no`, `booking_no`, `executed_place`, `executed_by`, `executed_date`, `departure_date`, `departure_time`, `arrival_date`, `arrival_time`, `declared_value`, `description_of_goods`, `ultimate_consignee`, `ultimate_consignee_address`, `notify_party`, `intermediate`, `notify_party_address`, `intermediate_address`, `forwording_agent`, `destination_agent`, `forwording_agent_address`, `destination_agent_address`, `service_type`, `route`, `mode_of_transport`, `port_of_origin`, `pre_carriage_by`, `place_of_receipt`, `loading_pier`, `port_of_loading`, `exporting_carrier`, `vessel_name`, `voyage_identification`, `port_of_unloading`, `on_carriage_by`, `place_of_delievry`) VALUES
(2, 4, 'waseem', '3417090031', 'Hussain town Multan\r\ntown', 160, '2647', 'Select City', 'yes', 'nishter college', 'yes', 'Home', 'mr ben', 'jsksjds', '03417090031', '<p>skjsdkj</p>\r\n', '1', '42', '5909', '2', '3', '3', '3', 'Extra Large Box', '1', '1', NULL, 'Lahore', 'Lahore', '2022-10-29', NULL, 0, NULL, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 'waseem', '341709003', 'xyz', 160, '2648', '48510', 'yes', 'xys', 'yes', 'Home', 'mr ben', 'Hussain town Multan\r\ntown', '3417090031', '<p>hellof</p>\r\n', '17', '327', '7255', '2', '2', '2', '2', 'Extra Large Box', '1', '1', NULL, 'liaqatpur', 'liaqatpur', '2022-10-29', NULL, 40960587, NULL, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(4, 1, 'Wajid', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 61210695, 7, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(5, 4, 'Seyaam', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', NULL, '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 40080218, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, 'Jawad', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 97399963, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(7, 4, 'Jawad khan', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', NULL, '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 75713930, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(8, 4, 'Jawad days', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', NULL, '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 73769471, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 1, 'Jawad', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 95889687, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 4, 'wajid ali', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', NULL, '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 14943, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(13, 2, 'Ismail khan niazi', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 14225224, 7, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(14, 1, 'Naveed ', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 43205899, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(15, 1, 'haha', '+234676466', 'gagag', 160, 'Bashshar', 'Bani Wanif', 'yes', 'gahaha', 'yes', 'Home', 'bahah', 'bahsj', '+2346767', 'hahah', 'Andorra', 'Canillo', 'Canillo', '2', '6494', '4', '4', '', '1', '1', NULL, 'gaha', 'haha', '2022-11-17', NULL, 46335237, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(16, 1, 'seeeeema', '15', 'XXX', 160, 'Pind Pondri', 'Chak 42', 'yes', 'chowk jalebi wala', 'yes', 'Home', 'jajajajaj', 'm', '1', 'good', 'p', '42', '2', '1', '1', '1', '1', 'Extra Large Box', '56', '7', NULL, 'multan', 'lahore', '2022-11-08', NULL, 89099449, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(17, 1, 'wajid', '+23431313', '1jaj', 160, 'Manu\'a', 'Ofu', 'yes', 'nsjsj', 'yes', 'Home', 'naja', 'a', '+23499', 'haja', 'Afghanistan', 'Gawr', 'Shahrak', '2', '4', '4', '4', '', '1', '1', NULL, 'a', 'a', '2022-11-17', NULL, 21141464, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(18, 1, 'wajid', '+23431313', '1jaj', 160, 'Manu\'a', 'Ofu', 'yes', 'nsjsj', 'yes', 'Home', 'naja', 'a', '+23499', 'haja', 'Afghanistan', 'Gawr', 'Shahrak', '2', '4', '4', '4', '', '1', '1', NULL, 'a', 'a', '2022-11-17', NULL, 55004198, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(19, 1, 'hwwh', '+23466464', 'bbsh', 160, 'Baglan', 'Baghlan', 'yes', 'bb', 'yes', 'Home', 'bhw', 'bshh', '+2349464', 'babs', 'Algeria', 'Adrar', 'Adrar', '2', '9494', '4', '4', '', '123', '1', NULL, 'hhshs', 'hshs', '2022-11-17', NULL, 93712401, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(20, 1, 'Abdul Wajid', '+2343331245671', 'Lahore Sector Z1', 160, 'New York', 'Brookhaven', 'yes', 'Same as above', 'yes', 'Home', 'Bilal Razaq Kashmiri', 'Township', '+2343481072184', 'This packet has large as', 'Afghanistan', 'Baglan', 'Baghlan', '3', '6', '1', '6', '', '65', '12', NULL, 'Lahore', 'Jaranwala', '2022-11-18', NULL, 91466675, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(21, 1, 'Naveed file', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 19385476, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(22, 1, 'Naveed file', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 69094402, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(23, 1, 'seema', '+234123', 'xxxx', 160, 'Farah', 'Farah', 'yes', 'gagay', 'yes', 'Home', 'gg', 'hh', '+23499', 'haha', 'Afghanistan', 'Badgis', 'Bala Morghab', '2', '47', '4', '4', '', '64', '4', NULL, 'haha', 'nanaj', '2022-11-19', NULL, 1132491, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(24, 4, 'gg', '+23499', 'vv', 160, 'Manu\'a', 'Ofu', 'yes', 'hb', 'yes', 'Home', 'bb', 'b', '+23456', 'h', 'Algeria', 'Batnah', '\'Ayn Tutah', '1', '4', '4', '4', 'Letter', '11', '22', NULL, 'ao', 'a', '2022-11-22', NULL, 9801762, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(25, 1, 'seyam', '+923417090031', 'new shah shams colony', 160, 'Punjab', 'Multan', 'yes', 'new shah shams', 'yes', 'Home', 'Mr ben', 'Nigeria', '+234319739494', 'one pair of shoes', 'Nigeria', 'Abia', 'Amaigbo', '1', '2', '1', '2', '', '1', '45', NULL, 'Pakistan', 'nigeria', '2022-11-22', NULL, 64342, 16, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(26, 1, 'wasen', '+2349595', 'lahore', 160, 'Punjab', 'Abdul Hakim', 'yes', 'lahor', 'no', 'Home', 'Ebenzir', 'lagos', '+23434364', 'xjej', 'Nigeria', 'Abia', 'Aba', '2', '1299', '9', '8', '', '25', '2080', NULL, 'multan', 'anna', '2022-12-15', NULL, 79187420, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(27, 1, 'ben', '+2344438548762', 'Huntington beach', 160, 'Maryland', 'Baltimore', 'yes', 'randallstown', 'no', 'Home', 'waseem', 'Pakistan', '+2344439858822', 'dhghjkk', 'Pakistan', 'Punjab', 'Alipur', '2', '2', '2', '2', '', '25', '500', NULL, 'Baltimore', 'Lagos', '2022-12-17', NULL, 53456434, 18, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(28, 1, 'ben', '+2344438548762', 'Huntington beach', 160, 'Maryland', 'Baltimore', 'yes', 'randallstown', 'no', 'Home', 'waseem', 'Pakistan', '+2344439858822', 'dhghjkk', 'Pakistan', 'Punjab', 'Alipur', '2', '2', '2', '2', '', '25', '500', NULL, 'Baltimore', 'Lagos', '2022-12-17', NULL, 65315053, 18, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(29, 3, 'waseem', '+923417090031', 'Lahore multan', 160, 'Punjab', 'Abdul Hakim', 'yes', 'Nishter road', 'yes', 'Home', 'adnan', '566 b Street2', '+92341079649', 'this is really important durex item', 'Pakistan', 'Punjab', 'Attock', '1', '19', '54', '21', '', '2', '25', NULL, 'multan', 'Lahore', '2023-1-10', NULL, 54457542, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(38, 3, 'Junaid', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 71921314, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(39, 2, 'Junaid', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 31639814, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(41, 2, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 7129045, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(42, 2, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 60272988, 30, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(43, 3, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 53099917, 30, 3, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(44, 1, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 32565635, 30, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(45, 4, 'Yousaf Aheer', '+923215548866', 'Chah Jammu wala', 160, 'Punjab', 'Multan', 'yes', 'Multan', 'no', 'Home', 'Hashim', 'Wilayatabad', '+923215666986', 'New', 'Pakistan', 'Punjab', 'Multan', '1', '', '', '', 'Letter', '858', '88588', NULL, 'Chah Jammu wala', 'wilayatabad', '2023-1-12', NULL, 23148991, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(46, 1, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 99377740, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(47, 1, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 99377740, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(48, 4, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 39359183, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 4, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 39359183, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(50, 4, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 73696506, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 1, 'waseem afzal', '+9295956', 'Pakistan', 160, 'Badakhshan', 'Eshkashemn', 'yes', 'nsj', 'yes', 'Home', 'kaj', 'nsn', '+67294946', 'hahah', 'Afghanistan', 'Bamiyan', 'Qil Qal\'eh', '0', '', '', '', '', '55', '6666', NULL, 'hsh', 'hsjjs', '2023-1-12', NULL, 75596538, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 1, 'waseem afzal', '+9295956', 'Pakistan', 160, 'Badakhshan', 'Eshkashemn', 'yes', 'nsj', 'yes', 'Home', 'kaj', 'nsn', '+67294946', 'hahah', 'Afghanistan', 'Bamiyan', 'Qil Qal\'eh', '0', '', '', '', '', '55', '6666', NULL, 'hsh', 'hsjjs', '2023-1-12', NULL, 70789127, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(53, 1, 'waseem afzal', '+9295956', 'Pakistan', 160, 'Badakhshan', 'Eshkashemn', 'yes', 'nsj', 'yes', 'Home', 'kaj', 'nsn', '+67294946', 'hahah', 'Afghanistan', 'Bamiyan', 'Qil Qal\'eh', '0', '', '', '', '', '55', '6666', NULL, 'hsh', 'hsjjs', '2023-1-12', NULL, 95651491, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(54, 1, 'waseem afzal', '+9295956', 'Pakistan', 160, 'Badakhshan', 'Eshkashemn', 'yes', 'nsj', 'yes', 'Home', 'kaj', 'nsn', '+67294946', 'hahah', 'Afghanistan', 'Bamiyan', 'Qil Qal\'eh', '0', '', '', '', '', '55', '6666', NULL, 'hsh', 'hsjjs', '2023-1-12', NULL, 16822376, 19, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(55, 4, 'Yousaf Aheer', '+9269888', 'jhb', 160, 'Punjab', 'Multan', 'no', 'gh', 'no', 'Home', 'nbv', 'nbhj', '+9369655', 'bjju', 'Afghanistan', 'Kabul', 'Kabul', '1', '', '', '', 'Letter', '66', '9369', NULL, 'bb', 'hhh', '2023-1-13', NULL, 44757295, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(56, 4, 'Yousaf Aheer', '+9269888', 'jhb', 160, 'Punjab', 'Multan', 'no', 'gh', 'no', 'Home', 'nbv', 'nbhj', '+9369655', 'bjju', 'Afghanistan', 'Kabul', 'Kabul', '1', '', '', '', 'Letter', '66', '9369', NULL, 'bb', 'hhh', '2023-1-13', NULL, 44757295, 30, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(57, 1, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 80013249, 31, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(58, 1, 'M seyaam ', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 62248151, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(59, 0, 'wa', 'shipper_phone', 'shipper_address', 160, 'shipper_state', 'shipper_city', 'No', 'pickup_location', 'No', '', 'consignee_name', 'consignee_address', 'consignee_phone', 'item_description', 'consignee_country', 'consignee_state', 'consignee_city', 'quantity', '', '', '', '', '', '', NULL, 'shipment_from', 'shipment_to', '', NULL, 72112681, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(60, 0, 'wa', 'shipper_phone', 'shipper_address', 160, 'shipper_state', 'shipper_city', 'No', 'pickup_location', 'No', '', 'consignee_name', 'consignee_address', 'consignee_phone', 'item_description', 'consignee_country', 'consignee_state', 'consignee_city', 'quantity', '', '', '', '', '', '', NULL, 'shipment_from', 'shipment_to', '', NULL, 57285666, 7, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(61, 1, 'Yousaf', '03075493296', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Multan', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '', '35', '45', 'Extra Large Box', '56', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 63102944, 31, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(62, 1, 'waseem afzal afzal', '+23494694', 'new shja', 160, 'Baluchistan', 'Dera Allah Yar', 'yes', '123 house new shah shams colony', 'yes', 'Home', 'Mr Ben', 'Lagos', '+23464673', 'no description', 'Nigeria', 'Abia', 'Aba', '2', '\"82\",\"82\"', '\"88\",\"82\"', '\"9\",\"920\"', '', '89', '99', NULL, 'multan', 'lagos', '2023-1-17', NULL, 45682030, 2, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(63, 1, 'waseem afzal afzal', '+234555', 'multan', 160, 'Badakhshan', 'Khandud', 'yes', 'new shah shams colony', 'yes', 'Home', 'naveed', 'na kana sahb', '+2346465', 'tables', 'Afghanistan', 'Gawr', 'Shahrak', '2', '\"6\",\"77\"', '\"6\",\"65\"', '\"7\",\"1\"', 'Extra Large Box', '77', '899', NULL, 'Lahore', 'kndar', '2023-1-19', NULL, 90245206, 2, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(64, 1, 'Naveed file', '03278178979', 'Chowk Shah Abbass', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '56', '35', '45', 'Extra Large Box', '56', '67', NULL, 'multan', 'lahore', '2022-11-08', NULL, 43335552, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(65, 1, ' sasa', ' 2231321', ' sdvsvd', 1, ' 42', ' 5912', ' yes', ' ssvd', ' yes', '', ' sdvsdv', ' svdvds', ' 2323', ' sdsd', ' 1', ' 42', ' 5909', ' 2', ' 42', ' 73', ' 86', '', ' 3', ' 3', NULL, ' as', ' vsd', ' 2023-02-04', NULL, 69583499, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(66, 4, 'wajid ali', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '', '', '', NULL, '', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 60108495, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(67, 4, 'wajid ali', '03278178979', 'nishter road multan', 160, '2682', '31136', 'yes', 'Chowk', 'yes', 'Home', 'jawad', 'multan', '03411663111', 'good', '1', '42', '5909', '2', '', '', '', NULL, '', '', NULL, 'multan', 'lahore', '2022-11-08', NULL, 41862214, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(68, 4, 'dADA2', '211234', 'DSVSD', 1, '45', '5922', 'yes', 'ASVVSD', 'yes', 'Home', 'SVDVSD', 'VSDA', '32RR32', 'VSDSVD', '3', '118', '6131', '1', '', '', '', NULL, '', '', NULL, 'CAS', 'CSA', '', NULL, 28622916, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 4, 'dADA2', '211234', 'DSVSD', 1, '45', '5922', 'yes', 'ASVVSD', 'yes', 'Home', 'SVDVSD', 'VSDA', '32RR32', 'VSDSVD', '3', '118', '6131', '1', '', '', '', NULL, '', '', NULL, 'CAS', 'CSA', '', NULL, 70449913, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(70, 4, 'qfewf', '423', 'sdvvsd', 1, '49', '5938', 'yes', 'sdvvds', 'yes', 'Home', 'svdsdv', 'svdvd', '3r32', 'svdvds', '2', '76', '6023', '1', '', '', '', NULL, '', '', NULL, 'sdvvsd', 'svdvd', '', NULL, 48764156, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(71, 1, 'Adnam', '03421996688', 'Gulgasht', 166, '2728', '31464', 'no', 'Vihari Chowk', 'no', 'Home', 'Shaheer', 'Sui Gas chiwk', '03255584155', 'New ', '166', '2728', '31464', '2', '2,5', '2,5', '2,5', 'Extra Large Box', '25', '5', NULL, 'Multan', 'Multan', '2023-03-22', NULL, 68959004, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(72, 4, 'Waseem', '03412886636', 'Chowk', 166, '2728', '31464', 'no', 'Lahore Road', 'no', 'Home', 'wajahat', 'Mianwali', '03155663355', 'ghju', '166', '2728', '31464', '2', '', '', '', NULL, '', '', NULL, 'Multan', 'Mianwali', '', NULL, 39073883, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(73, 3, 'jafir', '03422556325', 'Bosan Road ', 166, '2728', '31464', 'no', 'Sher Shah', 'no', 'Home', 'Gul', 'Gulgasht', '03215558835', 'hhh', '166', '2728', '31464', '2', '2,7', '8,2', '5,7', 'Extra Large Box', '258', '25', NULL, 'Lahore ', 'Multan', '2023-03-25', NULL, 96284268, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 3, 'Ghulam Ali', '03125566688', 'gulgasht', 166, '2728', '31464', 'no', 'bosan road', 'no', 'Home', 'Jaffir', 'Layyah', '03125866336', 'yugh', '166', '2728', '31444', '1', '2', '5', '8', 'Large Box', '588', '55', NULL, 'Multan', 'Layyah', '2023-03-23', NULL, 47254554, 10, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
