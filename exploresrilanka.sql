-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 04:16 AM
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
  `customer_id` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `verification_code` int(8) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `email`, `password`, `first_name`, `last_name`, `full_name`, `picture`, `contact_number`, `country`, `verification_code`, `email_verified_at`) VALUES
('C00004', 'heoughten123@gmail.com', '123', 'Ishan Ardithya', 'Bandarigoda', '', NULL, '94778266684', 'Sri Lanka (ශ්‍රී ලංකාව)', NULL, '2024-03-18 03:06:08'),
('C00005', 'nice1djbravo@gmail.com', '', 'Heoughten', '', 'Heoughten', 'images/users/C00005.jpg', NULL, NULL, NULL, '2024-03-21 02:05:22'),
('C00006', 'irontharindu@gmail.com', '', 'Tharindu', 'Hulangamuwa', 'Tharindu Hulangamuwa', 'images/users/C00006.jpg', NULL, NULL, NULL, '2024-03-21 02:17:45'),
('C00008', 'heoughten100@gmail.com', '', 'Ishan', 'Ardithya', 'Ishan Ardithya', 'images/users/C00008.jpg', '1778266684', 'United States', NULL, '2024-03-22 00:39:57'),
('C00010', 'heoughten111@gmail.com', '', 'Ishan', 'Ardithya', 'Ishan Ardithya', 'images/users/C00010.jpg', '94778266684', 'Sri Lanka (ශ්‍රී ලංකාව)', NULL, '2024-03-22 02:01:03'),
('C00011', 'ardithya123@gmail.com', '123', 'Ishan', 'Ardithya', 'Ishan Ardithya', 'images/users/C00011.jpg', '94778266684', 'Sri Lanka (ශ්‍රී ලංකාව)', NULL, '2024-03-22 02:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `hotelreservation`
--

CREATE TABLE `hotelreservation` (
  `reservation_id` varchar(10) NOT NULL,
  `hotel_id` varchar(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `room_number` int(10) NOT NULL,
  `reserved_from` date NOT NULL,
  `reserved_till` date NOT NULL,
  `pkg_order_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelreservation`
--

INSERT INTO `hotelreservation` (`reservation_id`, `hotel_id`, `name`, `room_number`, `reserved_from`, `reserved_till`, `pkg_order_id`) VALUES
('RES00001', 'H00002', 'Grand Plaza Hotel', 201, '2050-01-01', '2050-01-02', 'PKG00007'),
('RES00002', 'H00002', 'Grand Plaza Hotel', 201, '2051-01-01', '2051-01-02', 'PKG00008'),
('RES00003', 'H00001', 'Colombo Reach Hotel', 101, '2052-02-02', '2052-02-03', 'PKG00009'),
('RES00004', 'H00002', 'Grand Plaza Hotel', 201, '2055-05-05', '2055-05-06', 'PKG00010');

-- --------------------------------------------------------

--
-- Table structure for table `hotelrooms`
--

CREATE TABLE `hotelrooms` (
  `hotel_id` varchar(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `district` varchar(50) NOT NULL,
  `room_id` int(6) NOT NULL,
  `add_to_packages` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelrooms`
--

INSERT INTO `hotelrooms` (`hotel_id`, `name`, `district`, `room_id`, `add_to_packages`) VALUES
('H00001', 'Colombo Reach Hotel', 'Colombo', 101, 'Yes'),
('H00001', 'Colombo Reach Hotel', 'Colombo', 102, 'No'),
('H00001', 'Colombo Reach Hotel', 'Colombo', 103, 'No'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 201, 'Yes'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 202, 'Yes'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 203, 'Yes'),
('H00003', 'Ocean View Resort', 'Galle', 301, 'No'),
('H00003', 'Ocean View Resort', 'Galle', 302, 'No'),
('H00003', 'Ocean View Resort', 'Galle', 303, 'Yes'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 401, 'Yes'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 402, 'No'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 403, 'No'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 501, 'Yes'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 502, 'Yes'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 503, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_number` varchar(200) NOT NULL,
  `district` varchar(100) DEFAULT NULL,
  `distance` int(3) DEFAULT NULL,
  `short_desc` varchar(255) DEFAULT NULL,
  `hotel_picture` varchar(255) DEFAULT NULL,
  `hotel_url` varchar(250) NOT NULL,
  `active` int(1) NOT NULL,
  `verified` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `email`, `password`, `name`, `address`, `contact_number`, `district`, `distance`, `short_desc`, `hotel_picture`, `hotel_url`, `active`, `verified`) VALUES
('H00001', 'colomboreach@example.com', '123', 'Colombo Reach Hotel', '123 Main Street, Colombo', '123456789', 'Colombo', 5, 'Luxurious hotel in the heart of Colombo.', NULL, 'hotel_ColomboReachHotel.php', 1, 'Verified'),
('H00002', 'grandplaza@example.com', 'grandplazapass', 'Grand Plaza Hotel', '456 Central Avenue, Kandy', '987654321', 'Kandy', 8, 'Elegant hotel offering stunning views of Kandy.', NULL, '', 1, '2023-01-01'),
('H00003', 'oceanview@example.com', 'oceanviewpass', 'Ocean View Resort', '789 Beach Road, Galle', '456789123', 'Galle', 3, 'Seaside resort offering relaxation and tranquility.', NULL, '', 1, '2023-01-01'),
('H00004', 'sunsetbeach@example.com', 'sunsetbeachpass', 'Sunset Beach Hotel', '10 Ocean Drive, Hikkaduwa', '789123456', 'Hikkaduwa', 10, 'Beachfront hotel perfect for a tropical getaway.', NULL, '', 1, '2023-01-01'),
('H00005', 'mountainretreat@example.com', 'mountainretreatpass', 'Mountain Retreat Inn', '15 Mountain View, Nuwara Eliya', '321654987', 'Anuradhapura', 15, 'Cozy inn nestled in the picturesque mountains.', NULL, '', 1, '2023-01-01');

-- --------------------------------------------------------

--
-- Table structure for table `packageorders`
--

CREATE TABLE `packageorders` (
  `pkg_order_id` varchar(10) NOT NULL,
  `package_name` varchar(150) NOT NULL,
  `customer_id` varchar(6) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `reserved_from` date NOT NULL,
  `reserved_till` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packageorders`
--

INSERT INTO `packageorders` (`pkg_order_id`, `package_name`, `customer_id`, `customer_name`, `reserved_from`, `reserved_till`) VALUES
('PKG00001', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-05-05', '2024-05-06'),
('PKG00002', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-05-05', '2024-05-06'),
('PKG00003', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-12-15', '2024-12-16'),
('PKG00004', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-12-18', '2024-12-19'),
('PKG00006', '', 'C00011', 'Ishan Ardithya', '2050-01-01', '2050-01-02'),
('PKG00007', '', 'C00011', 'Ishan Ardithya', '2050-01-01', '2050-01-02'),
('PKG00008', '', 'C00011', 'Ishan Ardithya', '2051-01-01', '2051-01-02'),
('PKG00009', 'Adventure Expedition', 'C00011', 'Ishan Ardithya', '2052-02-02', '2052-02-03'),
('PKG00010', 'Adventure Expedition', 'C00011', 'Ishan Ardithya', '2055-05-05', '2055-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `shopitems`
--

CREATE TABLE `shopitems` (
  `item_id` varchar(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_description` text NOT NULL,
  `item_photo` varchar(255) NOT NULL,
  `stocks` int(11) NOT NULL,
  `shopitemurl` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopitems`
--

INSERT INTO `shopitems` (`item_id`, `item_name`, `item_price`, `item_description`, `item_photo`, `stocks`, `shopitemurl`) VALUES
('ITEM00001', 'AAA', 12.00, 'gg', 'images/shop/369859512_122425494279690_8855905069679084746_n.jpg', 1, 'shop-items/item-AAA.php'),
('ITEM00002', 'BBB', 12.00, 'asadasd', 'images/shop/bocchi-bocchitherock.gif', 0, 'shop-items/item-BBB.php'),
('ITEM00003', 'CCC', 123.00, 'asdada', 'images/shop/bocchi-bocchi-the-rock.gif', 123, 'shop-items/item-CCC.php'),
('ITEM00004', 'DDD', 213.00, 'asdadad', 'images/shop/bocchi-the-rock-hitori.gif', 41234, 'shop-items/item-DDD.php'),
('ITEM00005', 'FFF', 21312.00, 'adasda', 'images/shop/ezgif.com-webp-to-png-converter.png', 0, 'shop-items/item-FFF.php'),
('ITEM00006', 'NEW', 1231.00, 'adasdad', 'images/shop/bocchi-bocchi-the-rock.gif', 2, 'shop-items/item-NEW.php'),
('ITEM00007', 'xzx', 99.00, '0000000', 'images/shop/k63jtqtxu38b1.gif', 0, 'shop-items/item-xzx.php'),
('ITEM00008', 'ZZZ', 123.00, 'asdasdad', 'images/shop/bocchi-the-rock-anime-character-pink-haired-musician-girl-wallpaper-2732x768_73.jpg', 123, 'shop-items/item-ZZZ.php'),
('ITEM00009', 'VVVVVV', 123.00, 'asdasdasda', 'images/shop/FB_IMG_1695844247292.jpg', 0, 'shop-items/item-VVVVVV.php');

-- --------------------------------------------------------

--
-- Table structure for table `shoporders`
--

CREATE TABLE `shoporders` (
  `customer_id` varchar(6) NOT NULL,
  `customer_name` varchar(200) NOT NULL,
  `street_address` varchar(200) NOT NULL,
  `district` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `contact_number2` varchar(20) NOT NULL,
  `special_notes` varchar(255) NOT NULL,
  `items` varchar(400) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoporders`
--

INSERT INTO `shoporders` (`customer_id`, `customer_name`, `street_address`, `district`, `city`, `email`, `contact_number`, `contact_number2`, `special_notes`, `items`, `totalprice`) VALUES
('', 'Ishan Ardithya', '', '', '', 'ardithya123@gmail.com', '', '', '', '', 43263.00),
('', 'Ishan Ardithya', '', '', '', 'ardithya123@gmail.com', '', '', '', 'FFF*2, DDD*3', 43263.00),
('', 'Ishan Ardithya', '', '', '', 'ardithya123@gmail.com', '', '', '', 'FFF*2, DDD*3', 43263.00),
('', 'Ishan Ardithya', '', '', '', 'ardithya123@gmail.com', '', '', '', '*2, *2', 43050.00),
('', 'Ishan Ardithya', '', '', '', 'ardithya123@gmail.com', '', '', '', 'ITEM00005*2, ITEM00004*2', 43050.00);

-- --------------------------------------------------------

--
-- Table structure for table `tourguide`
--

CREATE TABLE `tourguide` (
  `tg_id` varchar(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `age` int(3) DEFAULT NULL,
  `contact_number` varchar(13) DEFAULT NULL,
  `district` varchar(50) DEFAULT NULL,
  `experience` int(3) DEFAULT NULL,
  `specialty` varchar(150) DEFAULT NULL,
  `short_desc` varchar(200) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`tg_id`, `email`, `password`, `first_name`, `last_name`, `full_name`, `age`, `contact_number`, `district`, `experience`, `specialty`, `short_desc`, `picture`, `active`, `email_verified_at`) VALUES
('TG0001', 'sunil@example.com', 'sunilpass', 'Sunil', 'Perera', 'Sunil Perera', 35, '123456789', 'Colombo', 5, 'History', 'Passionate tour guide with extensive knowledge in history.', NULL, 1, '2023-01-01 00:00:00'),
('TG0002', 'kamal@example.com', 'kamalpass', 'Kamal', 'Silva', 'Kamal Silva', 40, '987654321', 'Kandy', 8, 'Adventure', 'Experienced adventure tour guide specializing in outdoor activities.', NULL, 1, '2023-01-01 00:00:00'),
('TG0003', 'nimal@example.com', 'nimalpass', 'Nimal', 'Fernando', 'Nimal Fernando', 30, '777888999', 'Galle', 3, 'Cultural', 'Enthusiastic about showcasing cultural heritage sites.', NULL, 1, '2023-01-01 00:00:00'),
('TG0004', 'anil@example.com', 'anilpass', 'Anil', 'Kumar', 'Anil Kumar', 28, '555666777', 'Anuradhapura', 4, 'Wildlife', 'Passionate wildlife enthusiast with in-depth knowledge of flora and fauna.', NULL, 1, '2023-01-01 00:00:00'),
('TG0005', 'priya@example.com', 'priyapass', 'Priya', 'Ranasinghe', 'Priya Ranasinghe', 32, '333444555', 'Nuwara Eliya', 6, 'Nature', 'Dedicated to showcasing the beauty of nature through guided tours.', NULL, 1, '2023-01-01 00:00:00'),
('TG0006', 'samantha@example.com', 'samanthapass', 'Samantha', 'Jayasinghe', 'Samantha Jayasinghe', 36, '999000111', 'Badulla', 7, 'Hiking', 'Experienced hiking guide passionate about exploring scenic trails.', NULL, 1, '2023-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tourguidebooking`
--

CREATE TABLE `tourguidebooking` (
  `booking_id` varchar(10) NOT NULL,
  `tg_id` varchar(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `booked_from` date NOT NULL,
  `booked_till` date NOT NULL,
  `pkg_order_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguidebooking`
--

INSERT INTO `tourguidebooking` (`booking_id`, `tg_id`, `name`, `booked_from`, `booked_till`, `pkg_order_id`) VALUES
('B00001', 'TG0002', 'Kamal Silva', '2024-05-05', '2024-05-06', 'PKG00001'),
('B00002', 'TG0006', 'Samantha Jayasinghe', '2024-05-05', '2024-05-06', 'PKG00002'),
('B00003', 'TG0006', 'Samantha Jayasinghe', '2024-12-15', '2024-12-16', 'PKG00003'),
('B00004', 'TG0002', 'Kamal Silva', '2024-12-18', '2024-12-19', 'PKG00004'),
('B00005', 'TG0002', 'Kamal Silva', '2050-01-01', '2050-01-02', 'PKG00007'),
('B00006', 'TG0001', 'Sunil Perera', '2051-01-01', '2051-01-02', 'PKG00008'),
('B00007', 'TG0001', 'Sunil Perera', '2052-02-02', '2052-02-03', 'PKG00009'),
('B00008', 'TG0002', 'Kamal Silva', '2055-05-05', '2055-05-06', 'PKG00010');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `hotelreservation`
--
ALTER TABLE `hotelreservation`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `hotelrooms`
--
ALTER TABLE `hotelrooms`
  ADD PRIMARY KEY (`hotel_id`,`room_id`),
  ADD KEY `hotel_id_index` (`hotel_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `packageorders`
--
ALTER TABLE `packageorders`
  ADD PRIMARY KEY (`pkg_order_id`);

--
-- Indexes for table `shopitems`
--
ALTER TABLE `shopitems`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tourguide`
--
ALTER TABLE `tourguide`
  ADD PRIMARY KEY (`tg_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `tourguidebooking`
--
ALTER TABLE `tourguidebooking`
  ADD PRIMARY KEY (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
