-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2023 at 07:02 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+05:30";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bussched`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` text,
  KEY `admin-users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

DROP TABLE IF EXISTS `breakdown`;
CREATE TABLE IF NOT EXISTS `breakdown` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bus_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time_to_repair` time NOT NULL,
  `status` enum('repaired','repairing') NOT NULL DEFAULT 'repairing',
  PRIMARY KEY (`id`),
  KEY `breakdown-bus` (`bus_no`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`id`, `bus_no`, `description`, `time_to_repair`, `status`) VALUES
(1, 'NC1112', 'Tyre puncture', '00:15:00', 'repairing'),
(2, 'NC1113', 'Accident', '00:30:00', 'repairing'),
(3, 'NC1111', 'Accident', '00:15:00', 'repaired');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

DROP TABLE IF EXISTS `bus`;
CREATE TABLE IF NOT EXISTS `bus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_no` char(6) NOT NULL,
  `type` varchar(2) NOT NULL,
  `seats_no` int(11) NOT NULL,
  `route` varchar(6) NOT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `no_of_reviews` int(11) NOT NULL,
  `start` varchar(50) DEFAULT NULL,
  `dest` varchar(50) DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `conductor` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bus_no` (`bus_no`),
  KEY `bus-route` (`route`),
  KEY `start` (`start`),
  KEY `bus_owner` (`owner`),
  KEY `buw_dest` (`dest`),
  KEY `bus_driver` (`driver`),
  KEY `bus_conductor` (`conductor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_no`, `type`, `seats_no`, `route`, `rating`, `no_of_reviews`, `start`, `dest`, `owner`, `conductor`, `driver`) VALUES
(1, 'NC1111', 'S', 44, '120', 3.8571, 7, 'Piliyandala', 'Pettah', 'owner2', 'conductor1', 'driver1'),
(2, 'NC1112', 'S', 40, '120', 2.8, 5, 'Pettah', 'Piliyandala', 'owner2', 'conductor2', 'driver2'),
(3, 'NC1113', 'L', 50, '120', 5, 3, 'Piliyandala', 'Pettah', 'owner1', 'conductor3', 'driver3'),
(4, 'NC1114', 'S', 40, '120', 4, 2, 'Pettah', 'Piliyandala', 'owner1', 'conductor4', 'driver4'),
(5, 'NC1115', 'L', 50, '120', 5, 1, 'Piliyandala', 'Pettah', 'owner1', 'conductor5', 'driver5'),
(6, 'NC1116', 'S', 40, '120', 5, 1, 'Pettah', 'Piliyandala', 'owner1', 'conductor6', 'driver6'),
(7, 'NC1117', 'L', 50, '120', 0, 0, 'Piliyandala', 'Pettah', 'owner1', 'conductor7', 'driver7'),
(8, 'NC1118', 'S', 40, '120', 0, 0, 'Pettah', 'Piliyandala', 'owner1', 'conductor8', 'driver8'),
(9, 'NC1119', 'L', 50, '120', 5, 1, 'Piliyandala', 'Pettah', 'owner1', 'conductor9', 'driver9');

-- --------------------------------------------------------

--
-- Table structure for table `bus_available`
--

DROP TABLE IF EXISTS `bus_available`;
CREATE TABLE IF NOT EXISTS `bus_available` (
  `id` int(11) NOT NULL,
  `bus_no` varchar(50) DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

DROP TABLE IF EXISTS `conductor`;
CREATE TABLE IF NOT EXISTS `conductor` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `licence_no` char(8) NOT NULL,
  `assigned_bus` char(6) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `no_of_reviews` int(11) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `licence_no` (`licence_no`),
  KEY `assigned_bus` (`assigned_bus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`username`, `name`, `phone`, `address`, `licence_no`, `assigned_bus`, `date_of_birth`, `rating`, `no_of_reviews`) VALUES
('conductor1', 'Nalin Silva', '0761234567', 'Colombo, Sri Lanka', 'B1234568', 'NC1111', '1960-05-05', 3.1667, 6),
('conductor2', 'Kevin Ronalds', '0777111222', 'Piliyandala, Sri Lanka', 'B1234569', NULL, NULL, 3.50002, 4),
('conductor3', '', '', '', '', NULL, NULL, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tp` int(11) NOT NULL,
  `bus_no` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `tp`, `bus_no`) VALUES
(1, 'Kamal', 'kamal@gmail.com', 777123456, 'NB1324');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

DROP TABLE IF EXISTS `driver`;
CREATE TABLE IF NOT EXISTS `driver` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` text,
  `licence_no` char(8) DEFAULT NULL,
  `assigned_bus` char(6) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `no_of_reviews` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`username`, `name`, `phone`, `address`, `licence_no`, `assigned_bus`, `date_of_birth`, `rating`, `no_of_reviews`) VALUES
('driver1', 'Saman Perera', '0771234567', 'Colombo, Sri Lanka', NULL, NULL, NULL, 3, 6),
('driver2', NULL, NULL, NULL, NULL, NULL, NULL, 2.99998, 4),
('driver3', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2),
('driver4', NULL, NULL, NULL, NULL, NULL, NULL, 4, 2),
('driver5', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
('driver6', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
('driver7', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
('driver8', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1),
('driver9', NULL, NULL, NULL, NULL, NULL, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `e_ticket`
--

DROP TABLE IF EXISTS `e_ticket`;
CREATE TABLE IF NOT EXISTS `e_ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passenger` varchar(50) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `seats_reserved` varchar(30) DEFAULT NULL,
  `ticket_number` char(10) DEFAULT NULL,
  `source_halt` varchar(50) NOT NULL,
  `dest_halt` varchar(50) NOT NULL,
  `booking_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passenger_count` int(11) NOT NULL DEFAULT '1',
  `price` int(11) DEFAULT NULL,
  `payment_method` enum('cash','points') NOT NULL DEFAULT 'points',
  `status` enum('booked','collected','expired','inactive') NOT NULL DEFAULT 'booked',
  `collected_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket-passenger` (`passenger`),
  KEY `ticket-trip` (`trip_id`),
  KEY `ticket-source-halt` (`source_halt`),
  KEY `ticket-dest-halt` (`dest_halt`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `e_ticket`
--

INSERT INTO `e_ticket` (`id`, `passenger`, `trip_id`, `departure_time`, `arrival_time`, `seat_number`, `seats_reserved`, `ticket_number`, `source_halt`, `dest_halt`, `booking_time`, `passenger_count`, `price`, `payment_method`, `status`, `collected_time`) VALUES
(0, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Fort', '2023-03-19 01:28:15', 1, 0, 'points', 'inactive', NULL),
(17, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Kohuwala', '2023-03-19 01:31:40', 1, 0, 'points', 'inactive', NULL),
(32, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Werahera', 'Boralesgamuwa', '2023-03-19 01:50:19', 1, 0, 'points', 'inactive', NULL),
(33, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Dutugemunu St.', 'Werahera', '2023-03-19 02:02:37', 1, 0, 'points', 'inactive', NULL),
(34, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Rattanapitiya', '2023-04-15 08:37:15', 1, 0, 'points', 'inactive', NULL),
(35, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Fort', '2023-04-17 22:05:15', 1, 0, 'points', 'inactive', NULL),
(36, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-04-17 16:44:52', 1, 0, 'points', 'inactive', NULL),
(37, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-04-17 16:44:56', 1, 0, 'points', 'inactive', NULL),
(38, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Public Library', '2023-04-25 05:48:10', 1, 0, 'points', 'inactive', NULL),
(39, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Thummulla', '2023-04-25 05:48:10', 1, 0, 'points', 'inactive', NULL),
(40, 'passenger1', 6, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Rattanapitiya', '2023-04-26 01:19:19', 5, 0, 'points', 'booked', NULL),
(41, 'passenger1', 6, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Werahera', '2023-04-26 03:03:14', 1, 0, 'points', 'inactive', NULL),
(43, 'passenger1', 12, NULL, NULL, NULL, NULL, NULL, 'D.r. Wijewardena Rd.', 'Pettah', '2023-04-26 03:09:21', 5, 100, 'points', 'expired', NULL),
(44, 'passenger1', 3, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-04-26 05:59:37', 2, 75, 'points', 'inactive', NULL),
(46, 'passenger1', 3, NULL, NULL, NULL, NULL, NULL, 'Rattanapitiya', 'Pepiliyana', '2023-04-26 05:59:51', 1, 60, 'points', 'inactive', NULL),
(51, 'passenger1', 12, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-04-26 06:01:15', 1, 125, 'points', 'expired', NULL),
(52, 'passenger1', 10, NULL, NULL, NULL, 'D6, D5', NULL, 'Piliyandala', 'Kohuwala', '2023-04-27 00:25:24', 2, 290, 'cash', 'inactive', NULL),
(53, 'passenger1', 2, NULL, NULL, NULL, 'D4, D5, E5, E7, D6', NULL, 'Piliyandala', 'Dutugemunu St.', '2023-04-27 00:47:08', 5, 850, 'points', 'inactive', NULL),
(54, 'passenger1', 11, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Rattanapitiya', '2023-04-27 01:10:45', 1, 100, 'cash', 'collected', NULL),
(55, 'passenger1', 4, NULL, NULL, NULL, NULL, NULL, 'Lake House', 'Werahera', '2023-04-27 02:19:29', 1, 355, 'cash', 'collected', NULL),
(56, 'passenger1', 3, NULL, NULL, NULL, 'D4, E4', NULL, 'Piliyandala', 'Werahera', '2023-04-28 02:50:25', 2, 120, 'cash', 'collected', NULL),
(57, 'passenger1', 3, NULL, NULL, NULL, 'E5, D5', NULL, 'Piliyandala', 'Boralesgamuwa', '2023-04-28 03:20:25', 2, 150, 'cash', 'collected', NULL),
(58, 'passenger1', 1, NULL, NULL, NULL, 'A1, C2', NULL, 'Piliyandala', 'Pepiliyana', '2023-04-29 07:44:19', 5, 625, 'cash', 'collected', NULL),
(59, 'passenger1', 3, NULL, NULL, NULL, 'D4', NULL, 'Werahera', 'Kohuwala', '2023-04-30 02:03:29', 2, 250, 'cash', 'collected', NULL),
(60, 'passenger1', 3, NULL, NULL, NULL, 'B3', NULL, 'Piliyandala', 'Kohuwala', '2023-04-30 02:08:53', 2, NULL, 'cash', 'booked', NULL),
(61, 'passenger1', 3, NULL, NULL, NULL, 'A1', NULL, 'Piliyandala', 'Werahera', '2023-04-30 02:12:47', 1, 69, 'points', 'inactive', NULL),
(62, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 04:53:26', 1, 125, 'points', 'inactive', NULL),
(63, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 04:56:00', 1, 75, 'points', 'inactive', NULL),
(64, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:00:42', 1, 125, 'points', 'booked', NULL),
(65, 'passenger1', 1, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:01:22', 1, 125, 'points', 'booked', NULL),
(66, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:02:18', 1, 125, 'points', 'booked', NULL),
(67, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:06:35', 1, 75, 'points', 'inactive', NULL),
(68, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:06:37', 1, 75, 'points', 'booked', NULL),
(69, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:07:02', 1, 75, 'points', 'booked', NULL),
(70, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:07:13', 1, 75, 'points', 'booked', NULL),
(71, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:08:12', 2, 250, 'points', 'inactive', NULL),
(72, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Rattanapitiya', '2023-05-03 05:09:54', 1, 100, 'points', 'inactive', NULL),
(73, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:10:01', 1, 75, 'points', 'booked', NULL),
(74, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Boralesgamuwa', '2023-05-03 05:10:26', 1, 75, 'points', 'booked', NULL),
(75, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:52', 1, 125, 'points', 'booked', NULL),
(76, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:54', 1, 125, 'points', 'booked', NULL),
(77, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:54', 1, 125, 'points', 'booked', NULL),
(78, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'booked', NULL),
(79, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'inactive', NULL),
(80, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'booked', NULL),
(81, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'booked', NULL),
(82, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'booked', NULL),
(83, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pepiliyana', '2023-05-03 05:11:55', 1, 125, 'points', 'booked', NULL),
(84, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Kohuwala', '2023-05-03 05:12:44', 1, 145, 'points', 'booked', NULL),
(85, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Werahera', '2023-05-03 05:13:55', 1, 60, 'points', 'booked', NULL),
(86, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Werahera', '2023-05-03 05:14:40', 1, 60, 'points', 'booked', NULL),
(87, 'passenger1', 2, NULL, NULL, NULL, NULL, NULL, 'Piliyandala', 'Pamankada', '2023-05-03 05:16:38', 1, 190, 'points', 'booked', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

DROP TABLE IF EXISTS `fare`;
CREATE TABLE IF NOT EXISTS `fare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `bus_route` varchar(6) NOT NULL,
  `amount` float NOT NULL,
  `last_updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `source` (`source`,`dest`),
  KEY `fare-dest` (`dest`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`id`, `source`, `dest`, `bus_route`, `amount`, `last_updated`) VALUES
(2, 'Kohuwala', 'Fort', '120', 100, '0000-00-00 00:00:00'),
(5, 'Kohuwala', 'Thimbirigasyaya', '120', 55, '0000-00-00 00:00:00'),
(9, 'Kohuwala', 'Thummulla', '120', 123, '2022-11-20 08:12:46'),
(14, 'Kohuwala', 'Town Hall', '120', 70, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fare_instances`
--

DROP TABLE IF EXISTS `fare_instances`;
CREATE TABLE IF NOT EXISTS `fare_instances` (
  `instance` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  PRIMARY KEY (`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fare_instances`
--

INSERT INTO `fare_instances` (`instance`, `fare`) VALUES
(1, 60),
(2, 75),
(3, 100),
(4, 125),
(5, 145),
(6, 170),
(7, 190),
(8, 200),
(9, 215),
(10, 230),
(11, 245),
(12, 260),
(13, 275),
(14, 290),
(15, 300),
(16, 310),
(17, 330),
(18, 340),
(19, 355),
(20, 365),
(21, 380),
(22, 390),
(23, 410),
(24, 420),
(25, 435),
(26, 445),
(27, 460),
(28, 475),
(29, 490),
(30, 505),
(31, 515),
(32, 530),
(33, 540),
(34, 560),
(35, 570),
(36, 585),
(37, 595),
(38, 610),
(39, 625),
(40, 640),
(41, 650),
(42, 665),
(43, 680),
(44, 690),
(45, 705),
(46, 720),
(47, 730),
(48, 745),
(49, 760),
(50, 775),
(51, 785),
(52, 800),
(53, 810),
(54, 830),
(55, 840),
(56, 855),
(57, 870),
(58, 880),
(59, 895),
(60, 910),
(61, 920),
(62, 930),
(63, 945),
(64, 960),
(65, 975),
(66, 985),
(67, 1000),
(68, 1010),
(69, 1030),
(70, 1040),
(71, 1055),
(72, 1065),
(73, 1080),
(74, 1090),
(75, 1105),
(76, 1120),
(77, 1130),
(78, 1145),
(79, 1160),
(80, 1175),
(81, 1185),
(82, 1200),
(83, 1210),
(84, 1230),
(85, 1240),
(86, 1255),
(87, 1265),
(88, 1280),
(89, 1295),
(90, 1310),
(91, 1320),
(92, 1335),
(93, 1345),
(94, 1360),
(95, 1375),
(96, 1390),
(97, 1400),
(98, 1410),
(99, 1430),
(100, 1440),
(101, 1455),
(102, 1465),
(103, 1480),
(104, 1495),
(105, 1510),
(106, 1520),
(107, 1535),
(108, 1545),
(109, 1560),
(110, 1575),
(111, 1590),
(112, 1600),
(113, 1615),
(114, 1630),
(115, 1645),
(116, 1655),
(117, 1670),
(118, 1680),
(119, 1695),
(120, 1710),
(121, 1720),
(122, 1735),
(123, 1750),
(124, 1760),
(125, 1775),
(126, 1790),
(127, 1800),
(128, 1815),
(129, 1830),
(130, 1845),
(131, 1855),
(132, 1870),
(133, 1880),
(134, 1900),
(135, 1910),
(136, 1925),
(137, 1935),
(138, 1950),
(139, 1960),
(140, 1975),
(141, 1990),
(142, 2000),
(143, 2015),
(144, 2030),
(145, 2045),
(146, 2055),
(147, 2070),
(148, 2080),
(149, 2100),
(150, 2110),
(151, 2125),
(152, 2135),
(153, 2150),
(154, 2160),
(155, 2180),
(156, 2190),
(157, 2205),
(158, 2215),
(159, 2230),
(160, 2245),
(161, 2260),
(162, 2270),
(163, 2280),
(164, 2300),
(165, 2310),
(166, 2325),
(167, 2335),
(168, 2350),
(169, 2360),
(170, 2380),
(171, 2390),
(172, 2405),
(173, 2415),
(174, 2430),
(175, 2445),
(176, 2460),
(177, 2470),
(178, 2485),
(179, 2500),
(180, 2510),
(181, 2525),
(182, 2540),
(183, 2550),
(184, 2560),
(185, 2580),
(186, 2590),
(187, 2605),
(188, 2615),
(189, 2630),
(190, 2645),
(191, 2660),
(192, 2670),
(193, 2685),
(194, 2700),
(195, 2715),
(196, 2725),
(197, 2740),
(198, 2750),
(199, 2765),
(200, 2780),
(201, 2795),
(202, 2805),
(203, 2820),
(204, 2830),
(205, 2850),
(206, 2860),
(207, 2870),
(208, 2885),
(209, 2900),
(210, 2915),
(211, 2925),
(212, 2940),
(213, 2950),
(214, 2965),
(215, 2980),
(216, 2995),
(217, 3005),
(218, 3020),
(219, 3030),
(220, 3050),
(221, 3060),
(222, 3075),
(223, 3085),
(224, 3100),
(225, 3115),
(226, 3130),
(227, 3140),
(228, 3150),
(229, 3170),
(230, 3180),
(231, 3195),
(232, 3205),
(233, 3220),
(234, 3230),
(235, 3250),
(236, 3260),
(237, 3275),
(238, 3285),
(239, 3300),
(240, 3315),
(241, 3330),
(242, 3340),
(243, 3355),
(244, 3370),
(245, 3380),
(246, 3395),
(247, 3410),
(248, 3420),
(249, 3430),
(250, 3450),
(251, 3460),
(252, 3475),
(253, 3485),
(254, 3500),
(255, 3515),
(256, 3530),
(257, 3540),
(258, 3555),
(259, 3570),
(260, 3580),
(261, 3595),
(262, 3610),
(263, 3620),
(264, 3635),
(265, 3650),
(266, 3665),
(267, 3675),
(268, 3690),
(269, 3700),
(270, 3720),
(271, 3730),
(272, 3740),
(273, 3755),
(274, 3770),
(275, 3780),
(276, 3795),
(277, 3810),
(278, 3820),
(279, 3835),
(280, 3850),
(281, 3865),
(282, 3875),
(283, 3890),
(284, 3900),
(285, 3920),
(286, 3930),
(287, 3945),
(288, 3955),
(289, 3970),
(290, 3980),
(291, 4000),
(292, 4010),
(293, 4020),
(294, 4035),
(295, 4050),
(296, 4065),
(297, 4075),
(298, 4090),
(299, 4100),
(300, 4120),
(301, 4130),
(302, 4145),
(303, 4155),
(304, 4170),
(305, 4185),
(306, 4200),
(307, 4215),
(308, 4230),
(309, 4240),
(310, 4255),
(311, 4270),
(312, 4285),
(313, 4295),
(314, 4310),
(315, 4325),
(316, 4335),
(317, 4350),
(318, 4365),
(319, 4380),
(320, 4390),
(321, 4405),
(322, 4420),
(323, 4435),
(324, 4450),
(325, 4460),
(326, 4475),
(327, 4490),
(328, 4500),
(329, 4515),
(330, 4530),
(331, 4545),
(332, 4555),
(333, 4570),
(334, 4585),
(335, 4600),
(336, 4610),
(337, 4625),
(338, 4640),
(339, 4650),
(340, 4670),
(341, 4680),
(342, 4695),
(343, 4705),
(344, 4720),
(345, 4740),
(346, 4750),
(347, 4765),
(348, 4775),
(349, 4790),
(350, 4800);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `passenger` varchar(50) NOT NULL,
  `friend` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `friends-user` (`passenger`),
  KEY `friends-friend` (`friend`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `passenger`, `friend`) VALUES
(1, 'passenger1', 'passenger3'),
(2, 'passenger1', 'passenger4');

-- --------------------------------------------------------

--
-- Table structure for table `halt`
--

DROP TABLE IF EXISTS `halt`;
CREATE TABLE IF NOT EXISTS `halt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `distance_from_source` float NOT NULL,
  `fare_from_source` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `halt`
--

INSERT INTO `halt` (`id`, `route_id`, `name`, `distance_from_source`, `fare_from_source`) VALUES
(1, '120', 'Piliyandala', 0, 20),
(2, '120', 'Werahera', 1, 48),
(3, '120', 'Boralesgamuwa', 2, 59),
(4, '120', 'Rattanapitiya', 3, 77),
(5, '120', 'Pepiliyana', 4, 95),
(6, '120', 'Kohuwala', 5, 113),
(7, '120', 'Dutugemunu St.', 6, 131),
(8, '120', 'Pamankada', 7, 147),
(9, '120', 'Havelock City', 8, 153),
(10, '120', 'Thimbirigasyaya', 9, 165),
(11, '120', 'Thummulla', 10, 177),
(12, '120', 'Kumaratunga M. Rd.', 11, 189),
(13, '120', 'Cambridge Place', 12, 198),
(14, '120', 'Public Library', 13, 210),
(15, '120', 'Dharmapala Mw.', 14, 222),
(16, '120', 'Town Hall', 15, 231),
(17, '120', 'Ibbanwala Junction', 16, 239),
(18, '120', 'T.B. Jayah Rd.', 17, 251),
(19, '120', 'Gamani Hall Jct.', 18, 260),
(20, '120', 'D.r. Wijewardena Rd.', 19, 272),
(21, '120', 'Lake House', 20, 281),
(22, '120', 'Fort', 21, 293),
(23, '120', 'Pettah', 22, 302);

-- --------------------------------------------------------

--
-- Table structure for table `location_update`
--

DROP TABLE IF EXISTS `location_update`;
CREATE TABLE IF NOT EXISTS `location_update` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `user_role` enum('conductor','passenger') NOT NULL,
  `ticket` int(11) DEFAULT NULL,
  `tripID` int(11) NOT NULL,
  `halt` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `update-ticket` (`ticket`),
  KEY `update-username` (`username`),
  KEY `update-halt` (`halt`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location_update`
--

INSERT INTO `location_update` (`id`, `username`, `user_role`, `ticket`, `tripID`, `halt`, `timestamp`) VALUES
(31, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:05:23'),
(32, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:06:55'),
(33, 'conductor1', 'conductor', NULL, 11, 'Piliyandala', '2023-05-08 00:07:00'),
(34, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:10:00'),
(35, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:12:30'),
(36, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:19:18'),
(37, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:20:04'),
(38, 'passenger1', 'passenger', 54, 11, 'Piliyandala', '2023-05-08 00:20:41');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

DROP TABLE IF EXISTS `owner`;
CREATE TABLE IF NOT EXISTS `owner` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`username`, `name`, `phone`, `address`) VALUES
('owner1', 'Gamini Jayasinghe', '0774567891', 'Gampaha, Sri Lanka'),
('owner2', 'Owner Perera', '0112444444', 'Colombo, Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` text,
  `dob` date DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `points` int(11) DEFAULT '0',
  `points_expiry` date DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`username`, `name`, `phone`, `address`, `dob`, `profile_pic`, `points`, `points_expiry`) VALUES
('passenger1', 'John Doe', '0771234568', 'Colombo 02, Sri Lanka', '1998-02-13', NULL, 346, '2023-03-15'),
('passenger2', 'Jane Doe', '0771234567', 'Colombo, Sri Lanka', '0000-00-00', NULL, 170, '2023-06-22'),
('passenger3', 'Kamal Fernando', '', '', '2018-02-27', NULL, 104, '2022-02-02'),
('passenger4', NULL, NULL, NULL, NULL, NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
CREATE TABLE IF NOT EXISTS `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points_from` varchar(50) NOT NULL,
  `points_to` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `points-from` (`points_from`),
  KEY `points-to` (`points_to`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `points_from`, `points_to`, `amount`) VALUES
(1, 'passenger1', 'passenger2', 1),
(2, 'passenger1', 'passenger3', 50),
(3, 'passenger1', 'passenger2', 1),
(4, 'passenger1', 'passenger2', 1),
(5, 'passenger1', 'passenger2', 5),
(6, 'passenger1', 'passenger2', 5),
(7, 'passenger1', 'passenger2', 1),
(8, 'passenger1', 'passenger2', 1),
(9, 'passenger1', 'passenger2', 1),
(10, 'passenger1', 'passenger3', 1),
(11, 'passenger1', 'passenger2', 5),
(12, 'passenger1', 'passenger2', 4),
(13, 'passenger1', 'passenger3', 1),
(14, 'passenger1', 'passenger3', 1),
(15, 'passenger1', 'passenger2', 1),
(16, 'passenger1', 'passenger2', 5),
(17, 'passenger1', 'passenger3', 1),
(18, 'passenger1', 'passenger2', 5),
(19, 'passenger1', 'passenger4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(11) NOT NULL,
  `rater` varchar(50) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `bus_no` char(6) NOT NULL,
  `bus_rating` int(11) DEFAULT NULL,
  `conductor` varchar(50) NOT NULL,
  `conductor_rating` int(11) DEFAULT NULL,
  `driver` varchar(50) NOT NULL,
  `driver_rating` int(11) DEFAULT NULL,
  `time_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `rater-user` (`rater`),
  KEY `rating-ticket` (`ticket_id`),
  KEY `rating-driver` (`driver`),
  KEY `rating-conductor` (`conductor`),
  KEY `rating-trip` (`trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `ticket_id`, `rater`, `trip_id`, `bus_no`, `bus_rating`, `conductor`, `conductor_rating`, `driver`, `driver_rating`, `time_updated`) VALUES
(1, 0, 'passenger1', 1, 'NC1111', 5, 'conductor1', 5, 'driver1', 5, '2023-04-25 04:52:32'),
(2, 0, 'passenger1', 2, 'NC1112', 5, 'conductor2', 5, 'driver2', 4, '2023-04-25 04:52:32'),
(3, 0, 'passenger2', 3, 'NC1113', 5, 'conductor3', 5, 'driver3', 5, '2023-04-25 04:52:32'),
(4, 0, 'passenger2', 4, 'NC1114', 5, 'conductor4', 5, 'driver4', 5, '2023-04-25 04:52:32'),
(5, 0, 'passenger2', 5, 'NC1115', 5, 'conductor5', 5, 'driver5', 5, '2023-04-25 04:52:32'),
(6, 0, 'passenger1', 6, 'NC1116', 5, 'conductor6', 5, 'driver6', 5, '2023-04-25 04:52:32'),
(7, 0, 'passenger3', 7, 'NC1111', 5, 'conductor7', 5, 'driver7', 5, '2023-04-25 04:52:32'),
(8, 0, 'passenger3', 8, 'NC1112', 5, 'conductor8', 5, 'driver8', 5, '2023-04-25 04:52:32'),
(9, 0, 'passenger1', 9, 'NC1113', 5, 'conductor9', 5, 'driver9', 5, '2023-04-25 04:52:32'),
(11, 34, 'passenger1', 1, 'NC1111', 1, 'conductor1', 3, 'driver1', 1, '2023-04-25 11:36:46'),
(12, 0, 'passenger1', 1, 'NC1111', 4, 'conductor1', 3, 'driver1', 2, '2023-04-25 11:54:42'),
(13, 17, 'passenger1', 1, 'NC1111', 5, 'conductor1', 3, 'driver1', 4, '2023-04-25 11:55:41'),
(14, 32, 'passenger1', 2, 'NC1112', 1, 'conductor2', 3, 'driver2', 1, '2023-04-25 11:57:10'),
(15, 35, 'passenger1', 1, 'NC1111', 4, 'conductor1', 3, 'driver1', 3, '2023-04-26 09:14:58'),
(16, 39, 'passenger1', 2, 'NC1112', 1, 'conductor2', 3, 'driver2', 5, '2023-04-27 09:10:09'),
(17, 36, 'passenger1', 1, 'NC1111', 3, 'conductor1', 2, 'driver1', 3, '2023-04-28 10:05:26'),
(18, 51, 'passenger1', 13, 'NC1119', 5, 'conductor9', 5, 'conductor9', 5, '2023-05-01 11:26:41'),
(19, 55, 'passenger1', 4, 'NC1114', 3, 'conductor4', 2, 'driver4', 3, '2023-05-04 06:50:33'),
(20, 61, 'passenger1', 3, 'NC1113', 5, 'conductor3', 3, 'driver3', 3, '2023-05-05 09:17:36'),
(21, 62, 'passenger1', 2, 'NC1112', 2, 'conductor2', 3, 'driver2', 2, '2023-05-05 13:54:11');

--
-- Triggers `ratings`
--
DROP TRIGGER IF EXISTS `rating_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `rating_insert_trigger` AFTER INSERT ON `ratings` FOR EACH ROW BEGIN
UPDATE driver
  SET rating = ((rating * no_of_reviews) + NEW.driver_rating) / (no_of_reviews + 1),
      no_of_reviews = no_of_reviews + 1
  WHERE username = NEW.driver;

  -- Update conductor table
  UPDATE conductor
  SET rating = ((rating * no_of_reviews) + NEW.conductor_rating) / (no_of_reviews + 1),
      no_of_reviews = no_of_reviews + 1
  WHERE username = NEW.conductor;

  -- Update bus table
  UPDATE bus
  SET rating = ((rating * no_of_reviews) + NEW.bus_rating) / (no_of_reviews + 1),
      no_of_reviews = no_of_reviews + 1
  WHERE bus_no = NEW.bus_no;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` varchar(6) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `RouteID` (`route_id`),
  UNIQUE KEY `route_id` (`route_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route_id`, `source`, `destination`) VALUES
(1, '120', 'Piliyandala', 'Pettah');

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

DROP TABLE IF EXISTS `scheduler`;
CREATE TABLE IF NOT EXISTS `scheduler` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`username`, `name`, `phone`, `address`) VALUES
('conductor7', '', '', ''),
('conductor9', '', '', ''),
('scheduler1', 'Dilan Mendis', '0764444444', 'Colombo, Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `seats_availability`
--

DROP TABLE IF EXISTS `seats_availability`;
CREATE TABLE IF NOT EXISTS `seats_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(50) NOT NULL,
  `seat_no` varchar(3) NOT NULL,
  `availability` enum('available','reserved') NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`),
  KEY `seat-trip` (`trip_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seats_availability`
--

INSERT INTO `seats_availability` (`id`, `trip_id`, `seat_no`, `availability`) VALUES
(1, 2, 'A1', 'available'),
(2, 2, 'A4', 'available'),
(3, 2, 'C4', 'available'),
(4, 2, 'D4', 'available'),
(5, 2, 'C5', 'available'),
(6, 2, 'A5', 'reserved'),
(7, 2, 'D5', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE IF NOT EXISTS `trip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `starting_halt` varchar(255) NOT NULL,
  `bus_no` char(6) DEFAULT NULL,
  `status` enum('scheduled','started','ended','') NOT NULL DEFAULT 'scheduled',
  `last_updated_halt` varchar(50) DEFAULT NULL,
  `location_updated_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `trip-bus` (`bus_no`),
  KEY `trip-start` (`starting_halt`),
  KEY `trip-lastupdated` (`last_updated_halt`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `trip_date`, `departure_time`, `starting_halt`, `bus_no`, `status`, `last_updated_halt`, `location_updated_time`) VALUES
(1, '2023-01-01', '08:00:00', 'Piliyandala', 'NC1111', 'ended', 'Pettah', '2023-05-07 12:50:11'),
(2, '2023-01-01', '08:00:00', 'Pettah', 'NC1112', 'ended', 'Piliyandala', NULL),
(3, '2023-01-01', '09:00:00', 'Piliyandala', 'NC1113', 'started', 'Kumaratunga M. Rd.', NULL),
(4, '2023-01-01', '09:00:00', 'Pettah', 'NC1114', 'scheduled', NULL, NULL),
(5, '2023-01-01', '10:00:00', 'Piliyandala', 'NC1115', 'scheduled', NULL, NULL),
(6, '2023-01-01', '10:00:00', 'Pettah', 'NC1116', 'scheduled', NULL, NULL),
(7, '2023-01-01', '11:00:00', 'Piliyandala', 'NC1111', 'scheduled', NULL, NULL),
(8, '2023-01-01', '11:00:00', 'Pettah', 'NC1112', 'scheduled', NULL, NULL),
(9, '2023-01-01', '12:00:00', 'Piliyandala', 'NC1113', 'scheduled', NULL, NULL),
(10, '2023-01-01', '12:00:00', 'Pettah', 'NC1114', 'scheduled', NULL, NULL),
(11, '2023-01-01', '13:00:00', 'Piliyandala', 'NC1115', 'started', 'Piliyandala', '2023-05-08 00:20:41'),
(12, '2023-01-01', '13:00:00', 'Pettah', 'NC1116', 'scheduled', NULL, NULL),
(13, '2023-05-16', '16:30:00', 'Pettah', 'NC1119', 'scheduled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(5, 'passenger1', 'passenger1@gmail.com', '$2y$10$PCP8OdTRkI1srnomErM.q.2uEOQVYYEfOyscXAdqwW6uEL76djL0e', 'passenger'),
(8, 'driver1', 'driver1@gmail.com', '$2y$10$yTbl/PFFQaIZniz3ivFGAOgvk0AQhQQPjnsVGkd98MpWLFN.Y0pYW', 'driver'),
(9, 'conductor1', 'conductor1@gmail.com', '$2y$10$bMVz/K0hBMQDg4AoG2xbJuq2UeXJUTYIdWbI.hpgs4g0hMI79L9UC', 'conductor'),
(10, 'owner1', 'owner1@gmail.com', '$2y$10$GdDG/irbumEp0VpFLJPogeGtAEYY9dYij8ftnHs9Gc7cRw9lL9hO6', 'owner'),
(11, 'scheduler1', 'scheduler1@gmail.com', '$2y$10$1THV3yZOP8/szD6606QR2Obc00IVUWi7QBkHOkPlViYIrJAtwY93e', 'scheduler'),
(15, 'driver2', 'driver2@gmail.com', '$2y$10$GFbu3C3YgjVuyimriMpdZejHWYzzMluO7X2i.d8MXbuvHC1jrTP.a', 'driver'),
(17, 'scheduler2', 'scheduler2@gmail.com', '$2y$10$Hn0xWamaVgYhvFLMjEgnVOzNJ8N3UXf6rpEclzQCPy4tydSJfHw7a', 'scheduler'),
(18, 'admin', 'admin@gmail.com', '$2y$10$uToJ2Z85hvNy7tXoPyI0GOjHXuBoLppw70H3pXIhJcgM38caBRnMW', 'admin'),
(19, 'passenger2', 'passenger2@gmail.com', '$2y$10$cRiVy19KCCaZRwBIjB/VaOm/j6g7STW5r/m736dzyLIpTcsFsbb5W', 'passenger'),
(22, 'owner2', 'owner2@gmail.com', '$2y$10$gb1e8dxlEbRJICSWRO9Wy.NQYlqAO4z6sE3IZdTnNh/QCLa.1r7N2', 'owner'),
(24, 'passenger3', 'passenger3@gmail.com', '$2y$10$plgImcQAUY0bbPoZKJdKQu1Zzh3sLA4nugciAgjqtpAQGx7jkUcim', 'passenger'),
(26, 'conductor2', 'conductor2@gmail.com', '$2y$10$piqG.CgJetX6cij2hSRVtOuwvPDppYyjHgUa4MzzgzfCAPKpAviA2', 'conductor'),
(27, 'conductor3', 'conductor3@gmail.com', '$2y$10$57ANik1qPl/2DZeMIoHPveLeUTEqKIaVt3RWTmXXTBbkNeHIF/3dC', 'conductor'),
(32, 'conductor6', 'conductor6@gmail.com', '$2y$10$UKufg9luxJDAiXQvy9.n.OHAm2ssMgDJeCCG6qXeA3DMXJff0n8sm', 'conductor'),
(33, 'conductor4', 'conductor4@gmail.com', '$2y$10$Vd36jzhrroqoPW1d.63ExeXqoM2p0vM7AcsY.70S/Lbd2ank3p7u2', 'conductor'),
(34, 'conductor5', 'conductor5@gmail.com', '$2y$10$WdQJOpCwpmx9yrthmpC.FOhh8IaMgnu0s7PfIJw/IhnmI0jJ26yVi', 'conductor'),
(35, 'conductor7', 'conductor7@gmail.com', '$2y$10$go3/TPGqXPiAuhsgadLrOetx1fhTnldIgJ9QDZsDLO2Nz402ZAfNC', 'conductor'),
(38, 'conductor8', 'conductor8@gmail.com', '$2y$10$SvkWBU5a61I.jpiGiA.BbOVHQtASAABj5FdetorWDPsS0wZeUyzoq', 'conductor'),
(39, 'conductor9', 'conductor9@gmail.com', '$2y$10$9qZYVIW3SyspqfPI4vdx7.pBZTd5ZycLT5UoCxLWUsudklU8UGoXC', 'conductor'),
(40, 'conductor10', 'conductor10@gmail.com', '$2y$10$ySW7j9uzBFhCeKgZYrJele7ZQKhxVynC2SvXIQjSiApGsOQCKvLcm', 'conductor'),
(42, 'driver4', 'driver4@gmail.com', '$2y$10$Py/zXzr6g1AIWXrGddaM3eHNle7OiLv31hg9Y0Z/Fqlf2cQpsNL16', 'driver'),
(43, 'driver5', 'driver5@gmail.com', '$2y$10$VQGygwk0d45ioCzwGLJHie3i7NZyK65dqUHPuYxRecRxiG0z/PJQa', 'driver'),
(44, 'driver6', 'driver6@gmail.com', '$2y$10$JwSXl57yWQCJ40OCyjipwuGEmnWc//MOLXCH.6kzW9LQ0Hbeeyfv2', 'driver'),
(45, 'driver7', 'driver7@gmail.com', '$2y$10$CNKDfQxzPkk1phT5DW88U.v8jMX5SS6OaUltZRtLY9.4376aJOs6e', 'driver'),
(46, 'driver8', 'driver8@gmail.com', '$2y$10$cSaXo68g.R5XLDVQMPl3gOs8REUAm2wKgG9XwopuC2BA9/GQWkFqC', 'driver'),
(47, 'driver9', 'driver9@gmail.com', '$2y$10$q1JInzLERtoBejZH5VAa8eYT1DooS8rRo2C5uDzyn6ZXsod0o.jSG', 'driver'),
(48, 'driver3', 'driver3@gmail.com', '$2y$10$JBzdpP3aPOuYQWFqm7EfK.ao0KgP7.c5oD2Ztm9uoLDlGr3WGZrvS', 'driver'),
(50, 'passenger4', 'passenger4@gmail.com', '$2y$10$rAA5/R4ySTvx.IgLc2GTxO.0KQ3XcSQIC25aVPx1po6rI8NuEkVQC', 'passenger');

--
-- Triggers `users`
--
DROP TRIGGER IF EXISTS `update_user_role_trigger`;
DELIMITER $$
CREATE TRIGGER `update_user_role_trigger` BEFORE UPDATE ON `users` FOR EACH ROW IF NEW.role != OLD.role AND NEW.role = 'driver' THEN
    INSERT INTO driver (username) VALUES (NEW.username);
  END IF
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `user_insert_trigger`;
DELIMITER $$
CREATE TRIGGER `user_insert_trigger` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    IF NEW.role = 'conductor' THEN
        INSERT INTO conductor (username) VALUES (NEW.username);
    ELSEIF NEW.role = 'passenger' THEN
        INSERT INTO passenger (username) VALUES (NEW.username);
    ELSEIF NEW.role = 'scheduler' THEN
        INSERT INTO scheduler (username) VALUES (NEW.username);
    ELSEIF NEW.role = 'driver' THEN
        INSERT INTO driver (username) VALUES (NEW.username);
    ELSEIF NEW.role = 'admin' THEN
        INSERT INTO admin (username) VALUES (NEW.username);
    ELSEIF NEW.role = 'owner' THEN
        INSERT INTO owner (username) VALUES (NEW.username);
    END IF;
END
$$
DELIMITER ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin-users` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus-route` FOREIGN KEY (`route`) REFERENCES `route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bus_conductor` FOREIGN KEY (`conductor`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `bus_dest` FOREIGN KEY (`dest`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bus_driver` FOREIGN KEY (`driver`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `bus_owner` FOREIGN KEY (`owner`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_ibfk_2` FOREIGN KEY (`assigned_bus`) REFERENCES `bus` (`bus_no`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `e_ticket`
--
ALTER TABLE `e_ticket`
  ADD CONSTRAINT `ticket-dest-halt` FOREIGN KEY (`dest_halt`) REFERENCES `halt` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-passenger` FOREIGN KEY (`passenger`) REFERENCES `passenger` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-source-halt` FOREIGN KEY (`source_halt`) REFERENCES `halt` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare-dest` FOREIGN KEY (`dest`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fare-source` FOREIGN KEY (`source`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends-friend` FOREIGN KEY (`friend`) REFERENCES `passenger` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends-user` FOREIGN KEY (`passenger`) REFERENCES `passenger` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `halt`
--
ALTER TABLE `halt`
  ADD CONSTRAINT `halt-route` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON UPDATE CASCADE;

--
-- Constraints for table `location_update`
--
ALTER TABLE `location_update`
  ADD CONSTRAINT `update-halt` FOREIGN KEY (`halt`) REFERENCES `halt` (`name`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `update-ticket` FOREIGN KEY (`ticket`) REFERENCES `e_ticket` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `update-username` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `passenger`
--
ALTER TABLE `passenger`
  ADD CONSTRAINT `passenger_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `points`
--
ALTER TABLE `points`
  ADD CONSTRAINT `points-from` FOREIGN KEY (`points_from`) REFERENCES `passenger` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `points-to` FOREIGN KEY (`points_to`) REFERENCES `passenger` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rating-conductor` FOREIGN KEY (`conductor`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-driver` FOREIGN KEY (`driver`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-passenger` FOREIGN KEY (`rater`) REFERENCES `passenger` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-ticket` FOREIGN KEY (`ticket_id`) REFERENCES `e_ticket` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD CONSTRAINT `scheduler_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `seats_availability`
--
ALTER TABLE `seats_availability`
  ADD CONSTRAINT `seat-trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip-lastupdated` FOREIGN KEY (`last_updated_halt`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip-start` FOREIGN KEY (`starting_halt`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
