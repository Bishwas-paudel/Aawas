-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aawas`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_property`
--

CREATE TABLE `add_property` (
  `property_id` int(10) NOT NULL,
  `city` varchar(100) NOT NULL,
  `ward_no` int(10) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `estimated_price` bigint(10) NOT NULL,
  `total_rooms` int(10) NOT NULL,
  `bedroom` int(10) NOT NULL,
  `living_room` int(10) NOT NULL,
  `kitchen` int(10) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `latitude` decimal(9,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `owner_id` int(10) NOT NULL,
  `booked` varchar(10) DEFAULT 'No',
  `Street_No` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_property`
--

INSERT INTO `add_property` (`property_id`, `city`, `ward_no`, `Area`, `contact_no`, `property_type`, `estimated_price`, `total_rooms`, `bedroom`, `living_room`, `kitchen`, `description`, `latitude`, `longitude`, `owner_id`, `booked`, `Street_No`) VALUES
(174, 'Pokhara', 17, 'Chorepatan Area', 982222222, 'Full House Rent', 10000, 3, 1, 1, 1, 'WATER AND ELECTRICITY  24 HOUR', 28.206802, 83.976199, 16, 'No', 12),
(175, 'Pokhara', 17, 'Chorepatan Area', 420, 'Full House Rent', 10000, 6, 3, 1, 1, 'WATER AND ELECTRICITY  24 HOUR', 28.206802, 83.976199, 16, 'No', 12),
(177, 'Pokhara', 1, 'Bagar Area', 9866317885, 'Flat Rent', 10000, 1, 1, 1, 1, 'hello', 28.206880, 83.976129, 12, 'No', 3),
(178, 'Pokhara', 8, 'Airport Area', 9866317885, 'Full House Rent', 50000, 6, 3, 2, 1, 'Best room for the family', 28.207900, 83.974659, 9, 'No', 20),
(179, 'Pokhara', 1, 'Bagar Area', 9866317885, 'Room Rent', 4500, 1, 1, 0, 0, 'Best room for student', 28.207876, 83.974654, 9, 'No', 12),
(180, 'Pokhara', 1, 'Archalbot Area', 9866317885, 'Flat Rent', 12000, 4, 2, 1, 1, 'Best Environment', 28.207855, 83.974633, 9, 'No', 12),
(181, 'Pokhara', 7, 'Newroad Area', 9866317885, 'Room Rent', 5000, 1, 1, 0, 0, 'can cook', 27.700769, 85.300140, 9, 'No', 12),
(182, 'Pokhara', 1, 'Bhalam Area', 9866317885, 'Flat Rent', 12000, 4, 2, 1, 1, 'Call for more detail', 28.206824, 83.976084, 9, 'No', 2),
(183, 'Pokhara', 5, 'Airport Area', 9866317885, 'Room Rent', 5000, 1, 1, 0, 0, 'best room', 28.206813, 83.976103, 9, 'No', 2);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `message` text NOT NULL,
  `owner_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(9, 'Bishwas Paudel', 'a@gmail.com', '698d51a19d8a121ce581499d7b701668', 9866317885, 'pokhara nepal', 'Citizenship', 'owner-photo/logo.png'),
(12, 'Bishwas Paudel', 'bishwas0429@gmail.com', '698d51a19d8a121ce581499d7b701668', 9866317885, 'pokhara nepal', 'Citizenship', 'owner-photo/Untitled design (1).png'),
(13, 'prajwal bastola', 'prajwal@gmail.com', '123', 9806622211, 'pokhara nepal', 'Voter Card', 'owner-photo/logo.png'),
(14, 'Bishwas Paudel', 'test@321', 'caf1a3dfb505ffed0d024130f58c5cfa', 9866317885, 'pokhara nepal', 'Driving Licence', 'owner-photo/1358293.jpeg'),
(15, 'Bishwas Paudel', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 9866317885, 'pokhara nepal', 'Driving Licence', 'owner-photo/profile (2).png'),
(16, 'nimal bastola', 'nirmal@gmail.com', '4ba674d85fbee92042e7d76e61145904', 363636, 'pokhara nepal', 'Citizenship', 'owner-photo/White and Purple Professional Technology Startup Business Company Presentation (3).jpg'),
(17, 'sajan kc', 'sajan@gmail.com', '698d51a19d8a121ce581499d7b701668', 980777221, 'pokhara nepal', 'Driving Licence', 'owner-photo/facebook (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `property_photo`
--

CREATE TABLE `property_photo` (
  `property_photo_id` int(12) NOT NULL,
  `p_photo` varchar(500) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_photo`
--

INSERT INTO `property_photo` (`property_photo_id`, `p_photo`, `property_id`) VALUES
(37, 'product-photo/placeholder - Copy.png', 174),
(38, 'product-photo/gmail (1).png', 174),
(39, 'product-photo/placeholder - Copy.png', 175),
(40, 'product-photo/gmail (1).png', 175),
(46, 'product-photo/facebook (1).png', 177),
(47, 'product-photo/gmail (1).png', 177),
(48, 'product-photo/night.jpg', 178),
(49, 'product-photo/building-concept-illustration_114360-4469.webp', 178),
(50, 'product-photo/1_rk_apartment-for-rent-vijay_nagar_4-Indore-bedroom.webp', 179),
(51, 'product-photo/download.jpg', 179),
(52, 'product-photo/download (4).jpg', 180),
(53, 'product-photo/luxury-bedroom-suite-resort-high-rise-hotel-with-working-table_105762-1783.webp', 180),
(54, 'product-photo/hvjhvjhbk.jpg', 181),
(55, 'product-photo/home1.jpg', 182),
(56, 'product-photo/home2.jpg', 182),
(57, 'product-photo/home1.jpg', 183),
(58, 'product-photo/home1.jpg', 183);

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `Rental_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_type` varchar(100) NOT NULL,
  `id_photo` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`Rental_id`, `full_name`, `email`, `password`, `phone_no`, `address`, `id_type`, `id_photo`) VALUES
(9, 'bishwas paudel', 'paudel@12gmail.com', '698d51a19d8a121ce581499d7b701668', 9806681124, 'pokhara nepal', 'Citizenship', 'rental_photo/_2c485cdd-f01f-4cbb-a86a-33dbf73d8dea.jpeg'),
(13, 'Bishwas Paudel', 'a@gmail.com', '698d51a19d8a121ce581499d7b701668', 9806681124, 'gandaki pokhara nepal', 'Driving Licence', 'rental_photo/lagrandee.jpg'),
(14, 'bishwas paudel', 'b@gmail.com', '698d51a19d8a121ce581499d7b701668', 9866317885, 'gandaki pokhara nepal', 'Citizenship', 'rental_photo/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(10) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `rating` int(5) NOT NULL,
  `property_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_property`
--
ALTER TABLE `add_property`
  ADD PRIMARY KEY (`property_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`);

--
-- Indexes for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD PRIMARY KEY (`property_photo_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`Rental_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `property_id` (`property_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_property`
--
ALTER TABLE `add_property`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `property_photo`
--
ALTER TABLE `property_photo`
  MODIFY `property_photo_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `Rental_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `property_photo`
--
ALTER TABLE `property_photo`
  ADD CONSTRAINT `property_photo_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `add_property` (`property_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
