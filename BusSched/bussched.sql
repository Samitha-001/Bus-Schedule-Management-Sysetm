-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 01:31 PM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `name`, `phone`, `address`) VALUES
('admin', 'John Doe', '0771112222', 'Colombo, Sri Lanka');

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
(1, 'ND1111', 'Tyre puncture', '00:10:00'),
(2, 'ND1234', 'Accident', '00:30:00'),
(3, 'NC1111', 'Accident', '00:25:00'),
(6, 'ND2222', 'Accident', '00:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `bus_no` char(6) NOT NULL,
  `type` varchar(2) NOT NULL,
  `seats_no` int(11) NOT NULL,
  `availability` int(1) NOT NULL DEFAULT 0,
  `route` varchar(6) NOT NULL,
  `start` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `bus_no`, `type`, `seats_no`, `availability`, `route`, `start`) VALUES
(1, 'ND1234', 'S', 10, 1, '120', 'Pettah'),
(2, 'ND1111', 'L', 8, 0, '120', 'Piliyandala'),
(9, 'ND2222', 'S', 10, 1, '120', 'Pettah'),
(10, 'NC1111', 'L', 8, 0, '120', 'Piliyandala'),
(12, 'NC5555', 'L', 5, 1, '120', 'Pettah'),
(13, 'NC2378', 'S', 3, 0, '120', 'Pettah'),
(14, 'NC1278', 'L', 6, 1, '120', 'Pettah');

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
('conductor1', 'Nalin Silva', '0761234567', 'Colombo, Sri Lanka', 'B1234568', 'ND1111', '1960-05-05');

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
(1, '120', 'Piliyandala', 0, 0),
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
('owner1', 'Gamini Jayasinghe', '0774567891', 'Gampaha, Sri Lanka');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` char(10) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `points` int(11) DEFAULT NULL,
  `points_expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `bus_rating` int(11) DEFAULT NULL,
  `conductor_id` int(11) NOT NULL,
  `conductor_rating` int(11) DEFAULT NULL,
  `driver_id` int(11) NOT NULL,
  `driver_rating` int(11) DEFAULT NULL
) ;

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
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `bus_no` varchar(255) NOT NULL,
  `passengers` int(11) NOT NULL,
  `departure_time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id`, `from`, `to`, `bus_no`, `passengers`, `departure_time`, `date`) VALUES
(1, 'Piliyandala', 'Pettah', 'ND1111', 2, '13:00:00', '2022-10-30'),
(2, 'Piliyandala', 'Pettah', 'NC2378', 2, '11:00:00', '2022-12-03');

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
(4, 'admin', 'admin@gmail.com', '$2y$10$heD0CciBFXAnIvjuusXbP.ct7eo0D4dIfiurrsqJQHJhClIxw.reK', 'admin'),
(5, 'passenger1', 'passenger1@gmail.com', '$2y$10$PCP8OdTRkI1srnomErM.q.2uEOQVYYEfOyscXAdqwW6uEL76djL0e', 'passenger'),
(8, 'driver1', 'driver1@gmail.com', '$2y$10$yTbl/PFFQaIZniz3ivFGAOgvk0AQhQQPjnsVGkd98MpWLFN.Y0pYW', 'driver'),
(9, 'conductor1', 'conductor1@gmail.com', '$2y$10$bMVz/K0hBMQDg4AoG2xbJuq2UeXJUTYIdWbI.hpgs4g0hMI79L9UC', 'conductor'),
(10, 'owner1', 'owner1@gmail.com', '$2y$10$GdDG/irbumEp0VpFLJPogeGtAEYY9dYij8ftnHs9Gc7cRw9lL9hO6', 'owner'),
(11, 'scheduler1', 'scheduler1@gmail.com', '$2y$10$1THV3yZOP8/szD6606QR2Obc00IVUWi7QBkHOkPlViYIrJAtwY93e', 'scheduler'),
(12, 'passenger2', 'passenger2@gmail.com', '$2y$10$p2Zb8MPKVXWURgv3ZnWfBOf9EkL/ReBOvJe.T3Sxvg3lmn89UqKaq', 'passenger'),
(13, 'passenger3', 'passenger3@gmail.com', '$2y$10$fvFq9oUdtqaxg9R6bd4uvOiF2R37haUg7Fq8UGEVQEnHX6EPy2grK', 'passenger'),
(14, 'conductor2', 'conductor2@gmail.com', '$2y$10$w1nSMzzsYePLnksk0W.Ix.MudotSXiLnDnJbnxJjPEiq4YSP4TnNW', 'conductor'),
(15, 'driver2', 'driver2@gmail.com', '$2y$10$GFbu3C3YgjVuyimriMpdZejHWYzzMluO7X2i.d8MXbuvHC1jrTP.a', 'driver'),
(16, 'owner2', 'owner2@gmail.com', '$2y$10$6IdhAxOwbENjYCOz6fiqY.ksK1Cu5bVVqUCcwURMOlofw8I2v2UFy', 'owner'),
(17, 'scheduler2', 'scheduler2@gmail.com', '$2y$10$Hn0xWamaVgYhvFLMjEgnVOzNJ8N3UXf6rpEclzQCPy4tydSJfHw7a', 'scheduler');

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
  ADD KEY `start` (`start`);

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
  ADD KEY `rating-trip` (`trip_id`);

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
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket-bus` (`bus_no`),
  ADD KEY `ticket-to` (`to`),
  ADD KEY `ticket-from` (`from`);

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trip`
--
ALTER TABLE `trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin-users` FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `breakdown`
--
ALTER TABLE `breakdown`
  ADD CONSTRAINT `breakdown-bus` FOREIGN KEY (`bus_no`) REFERENCES `bus` (`bus_no`);

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus-route` FOREIGN KEY (`route`) REFERENCES `route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`start`) REFERENCES `halt` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

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
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket-bus` FOREIGN KEY (`bus_no`) REFERENCES `bus` (`bus_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-from` FOREIGN KEY (`from`) REFERENCES `halt` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket-to` FOREIGN KEY (`to`) REFERENCES `halt` (`name`) ON UPDATE CASCADE;

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
