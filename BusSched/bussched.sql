-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 08:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


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

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `breakdown`
--

CREATE TABLE `breakdown` (
  `id` int(255) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `time_to_repair` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `breakdown`
--

INSERT INTO `breakdown` (`id`, `bus_no`, `description`, `time_to_repair`) VALUES
(1, 'NC1112', 'Tyre puncture', '00:15:00'),
(2, 'NC1113', 'Accident', '00:30:00'),
(3, 'NC1111', 'Accident', '00:25:00'),
(7, 'NC1114', 'Tyre puncture', '00:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus_no` char(6) NOT NULL,
  `type` varchar(2) NOT NULL,
  `seats_no` int(11) NOT NULL,
  `route` varchar(6) NOT NULL,
  `start` varchar(50) DEFAULT NULL,
  `dest` varchar(50) DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `conductor` varchar(50) DEFAULT NULL,
  `driver` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_no`, `type`, `seats_no`, `route`, `start`, `dest`, `owner`, `conductor`, `driver`) VALUES
(1, 'NC1111', 'S', 44, '120', 'Piliyandala', 'Pettah', 'owner2', 'conductor1', 'driver1'),
(2, 'NC1112', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner2', NULL, NULL),
(3, 'NC1113', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(4, 'NC1114', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(5, 'NC1115', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(6, 'NC1116', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(7, 'NC1117', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(8, 'NC1118', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(9, 'NC1119', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(10, 'NC1120', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(11, 'NC1121', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(12, 'NC1122', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(14, 'NC1124', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(15, 'NC1125', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', NULL, NULL),
(16, 'NC1126', 'S', 40, '120', 'Pettah', 'Piliyandala', 'owner1', NULL, NULL),
(17, 'NC1127', 'L', 50, '120', 'Piliyandala', 'Pettah', 'owner1', 'conductor1', NULL),
(41, 'NC4444', 'L', 5, '120', NULL, NULL, 'owner2', NULL, NULL),
(43, 'NC5555', 'S', 50, '120', 'Pettah', 'Piliyandala', 'owner1', 'conductor1', 'driver1'),
(46, 'NC9999', 'L', 20, '120', NULL, NULL, 'owner1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `licence_no` char(8) NOT NULL,
  `assigned_bus` char(6) DEFAULT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`username`, `name`, `phone`, `address`, `licence_no`, `assigned_bus`, `date_of_birth`) VALUES
('conductor1', 'Nalin Silva', '0761234567', 'Colombo, Sri Lanka', 'B1234568', NULL, '1960-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tp` int(11) NOT NULL,
  `bus_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `tp`, `bus_no`) VALUES
(1, 'Kamal', 'kamal@gmail.com', 777123456, 'NB1324');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `licence_no` char(8) NOT NULL,
  `assigned_bus` char(6) DEFAULT NULL,
  `date_of_birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`username`, `name`, `phone`, `address`, `licence_no`, `assigned_bus`, `date_of_birth`) VALUES
('driver1', 'Saman Perera', '0777222333', 'Piliyandala, Sri Lanka', 'B1234567', NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `e_ticket`
--

CREATE TABLE `e_ticket` (
  `id` int(11) NOT NULL,
  `passenger` varchar(50) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `ticket_number` char(10) NOT NULL,
  `booking_time` datetime NOT NULL,
  `status` enum('booked','cancelled','used','expired') NOT NULL DEFAULT 'booked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE `fare` (
  `id` int(11) NOT NULL,
  `source` varchar(20) NOT NULL,
  `dest` varchar(20) NOT NULL,
  `bus_route` varchar(6) NOT NULL,
  `amount` float NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `halt`
--

CREATE TABLE `halt` (
  `id` int(11) NOT NULL,
  `route_id` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `distance_from_source` float NOT NULL,
  `fare_from_source` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(12, '120', 'Kumaratunga Munidasa Rd.', 11, 189),
(13, '120', 'Cambridge Place', 12, 198),
(14, '120', 'Public Library', 13, 210),
(15, '120', 'Dharmapala Mawatha', 14, 222),
(16, '120', 'Town Hall', 15, 231),
(17, '120', 'Ibbanwala Junction', 16, 239),
(18, '120', 'T.B. Jayah Rd. (Darley Rd.)', 17, 251),
(19, '120', 'Gamani Hall Jct.', 18, 260),
(20, '120', 'D.r. Wijewardena Rd.', 19, 272),
(21, '120', 'Lake House', 20, 281),
(22, '120', 'Fort', 21, 293),
(23, '120', 'Pettah', 22, 302);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL
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

CREATE TABLE `passenger` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `points` int(11) DEFAULT NULL,
  `points_expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`username`, `name`, `phone`, `address`, `dob`, `profile_pic`, `points`, `points_expiry`) VALUES
('passenger3', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `rater` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_rating` int(11) DEFAULT NULL,
  `conductor_id` int(11) NOT NULL,
  `conductor_rating` int(11) DEFAULT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_rating` int(11) DEFAULT NULL
) ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `rater`, `trip_id`, `bus_id`, `bus_rating`, `conductor_id`, `conductor_rating`, `driver_id`, `driver_rating`) VALUES
(1, 5, 1, 1, 5, 9, 5, 8, 5),
(2, 5, 2, 2, 5, 9, 5, 15, 4),
(3, 5, 3, 3, 5, 9, 5, 8, 5),
(4, 5, 4, 4, 5, 9, 5, 15, 5),
(5, 5, 5, 5, 5, 9, 5, 8, 5),
(6, 5, 6, 6, 5, 9, 5, 15, 5),
(7, 5, 7, 7, 5, 9, 5, 8, 5),
(8, 5, 8, 8, 5, 9, 5, 15, 5),
(9, 5, 9, 1, 5, 9, 5, 8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `route_id` varchar(6) NOT NULL,
  `source` varchar(50) NOT NULL,
  `destination` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route_id`, `source`, `destination`) VALUES
(1, '120', 'Piliyandala', 'Pettah');

-- --------------------------------------------------------

--
-- Table structure for table `scheduler`
--

CREATE TABLE `scheduler` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scheduler`
--

INSERT INTO `scheduler` (`username`, `name`, `phone`, `address`) VALUES
('scheduler1', 'Dilan Mendis', '0764444444', 'Colombo, Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

CREATE TABLE `trip` (
  `id` int(11) NOT NULL,
  `trip_date` date NOT NULL,
  `departure_time` time NOT NULL,
  `starting_halt` varchar(255) NOT NULL,
  `bus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`id`, `trip_date`, `departure_time`, `starting_halt`, `bus_id`) VALUES
(1, '2023-01-01', '08:00:00', 'Piliyandala', 1),
(2, '2023-01-01', '08:00:00', 'Pettah', 2),
(3, '2023-01-01', '09:00:00', 'Piliyandala', 3),
(4, '2023-01-01', '09:00:00', 'Pettah', 4),
(5, '2023-01-01', '10:00:00', 'Piliyandala', 5),
(6, '2023-01-01', '10:00:00', 'Pettah', 6),
(7, '2023-01-01', '11:00:00', 'Piliyandala', 7),
(8, '2023-01-01', '11:00:00', 'Pettah', 8),
(9, '2023-01-01', '12:00:00', 'Piliyandala', 9),
(10, '2023-01-01', '12:00:00', 'Pettah', 10),
(11, '2023-01-01', '13:00:00', 'Piliyandala', 11),
(12, '2023-01-01', '13:00:00', 'Pettah', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(24, 'passenger3', 'passenger3@gmail.com', '$2y$10$plgImcQAUY0bbPoZKJdKQu1Zzh3sLA4nugciAgjqtpAQGx7jkUcim', 'passenger');

--
-- Triggers `users`
--
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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `admin-users` (`username`);

--
-- Indexes for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breakdown-bus` (`bus_no`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bus_no` (`bus_no`),
  ADD KEY `bus-route` (`route`),
  ADD KEY `start` (`start`),
  ADD KEY `bus_owner` (`owner`),
  ADD KEY `buw_dest` (`dest`),
  ADD KEY `bus_driver` (`driver`),
  ADD KEY `bus_conductor` (`conductor`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `licence_no` (`licence_no`),
  ADD KEY `assigned_bus` (`assigned_bus`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `e_ticket`
--
ALTER TABLE `e_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket-passenger` (`passenger`),
  ADD KEY `ticket-trip` (`trip_id`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `source` (`source`,`dest`),
  ADD KEY `fare-dest` (`dest`);

--
-- Indexes for table `halt`
--
ALTER TABLE `halt`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating-bus` (`bus_id`),
  ADD KEY `rating-driver` (`conductor_id`),
  ADD KEY `rating-trip` (`trip_id`),
  ADD KEY `rater-user` (`rater`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `RouteID` (`route_id`),
  ADD UNIQUE KEY `route_id` (`route_id`);

--
-- Indexes for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `trip`
--
ALTER TABLE `trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trip-bus` (`bus_id`),
  ADD KEY `trip-start` (`starting_halt`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `breakdown`
--
ALTER TABLE `breakdown`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `e_ticket`
--
ALTER TABLE `e_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fare`
--
ALTER TABLE `fare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `halt`
--
ALTER TABLE `halt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  ADD CONSTRAINT `bus_conductor` FOREIGN KEY (`conductor`) REFERENCES `conductor` (`username`),
  ADD CONSTRAINT `bus_driver` FOREIGN KEY (`driver`) REFERENCES `driver` (`username`),
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`start`) REFERENCES `halt` (`name`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `bus_owner` FOREIGN KEY (`owner`) REFERENCES `owner` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `buw_dest` FOREIGN KEY (`dest`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `ticket-passenger` FOREIGN KEY (`passenger`) REFERENCES `passenger` (`username`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare-dest` FOREIGN KEY (`dest`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fare-source` FOREIGN KEY (`source`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `halt`
--
ALTER TABLE `halt`
  ADD CONSTRAINT `halt-route` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON UPDATE CASCADE;

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
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `rater-user` FOREIGN KEY (`Rater`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-bus` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-conductor` FOREIGN KEY (`conductor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-driver` FOREIGN KEY (`conductor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `rating-trip` FOREIGN KEY (`trip_id`) REFERENCES `trip` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `scheduler`
--
ALTER TABLE `scheduler`
  ADD CONSTRAINT `scheduler_ibfk_1` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `trip`
--
ALTER TABLE `trip`
  ADD CONSTRAINT `trip-bus` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trip-start` FOREIGN KEY (`starting_halt`) REFERENCES `halt` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
