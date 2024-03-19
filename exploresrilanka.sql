-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 01:29 AM
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
-- Database: `exploresrilanka`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(6) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `verification_code` int(8) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `email`, `password`, `first_name`, `last_name`, `full_name`, `picture`, `contact_number`, `nationality`, `verification_code`, `email_verified_at`) VALUES
(33, 'C00002', 'heoughten111@gmail.com', '123', 'Ishan Ardithya', 'Bandarigoda', '', 'Images/users/C00006.jpg', '0774561234', 'LK', NULL, '2024-03-15 00:37:08'),
(56, 'C00003', 'ardithya123@gmail.com', '123', 'Ishan', 'Ardithya', 'Ishan Ardithya', 'images/users/C00006.jpg', '0771235678', 'LK', NULL, '2024-03-14 01:04:31'),
(57, 'C00004', 'heoughten123@gmail.com', '123', 'Ishan Ardithya', 'Bandarigoda', '', NULL, '07771209811', 'LK', NULL, '2024-03-18 03:06:08');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `hotel_id` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `distance` int(3) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `hotel_picture` varchar(255) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `hotel_id`, `email`, `password`, `full_name`, `address`, `contact_number`, `city`, `distance`, `short_desc`, `hotel_picture`, `email_verified_at`) VALUES
(0, 'C00001', 'Ardithya123@gmail.comm', '123', 'MAALU MAALU RESORT', 'asdasd', 'asdasdsa', 'Kandy', 1, 'The intrinsic splendour of Kandy, Sri Lanka is brought to life by Maalu Maalu Resort and Spa. The vast infinite pool appears to be a seamless connection between the mountains and hotel.', 'Images/hotels/H00003.jpg', NULL),
(0, 'C00002', 'example1@gmail.com', 'password1', 'Hotel ABC', '123 Street', '123456789', 'Kandy', 2, 'Hotel ABC offers a cozy stay in the heart of Kandy. Enjoy comfortable rooms and exceptional service during your visit.', 'Images/hotels/H00003.jpg', NULL),
(0, 'C00003', 'example2@gmail.com', 'password2', 'Hotel XYZ', '456 Street', '987654321', 'Kandy', 3, 'Discover the charm of Kandy at Hotel XYZ. With its convenient location and modern amenities, your stay will be unforgettable.', 'Images/hotels/H00002.jpg', NULL),
(0, 'C00004', 'example3@gmail.com', 'password3', 'Grand Hotel', '789 Street', '987123654', 'Colombo', 4, 'Experience luxury at its finest at Grand Hotel Kandy. Indulge in exquisite dining and breathtaking views during your stay.', 'Images/hotels/H00002.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `customer_id` (`customer_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
