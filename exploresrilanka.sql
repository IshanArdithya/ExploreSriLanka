-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 02:55 PM
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
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `inquiry_id` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`inquiry_id`, `name`, `email`, `contact_number`, `country`, `message`) VALUES
('IQ00001', 'Ishan Ardithya Bandarigoda', 'ardithya123@gmail.com', '0777', 'Sri Lanka', 'asdsds');

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
  `email_verified_at` datetime DEFAULT NULL,
  `registered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `email`, `password`, `first_name`, `last_name`, `full_name`, `picture`, `contact_number`, `country`, `verification_code`, `email_verified_at`, `registered`) VALUES
('C00011', 'ardithya123@gmail.com', '123', 'Ishan', 'Ardithya', 'Ishan Ardithya', 'images/users/C00011.jpg', '94778266684', 'Sri Lanka (ශ්‍රී ලංකාව)', NULL, '2024-03-25 02:29:15', '2024-03-25'),
('C00012', 'ishanardithya@gmail.com', '', 'Ishan', 'Ardithya Bandarigoda', 'Ishan Ardithya Bandarigoda', 'images/users/C00012.jpg', '94752166684', 'Sri Lanka (ශ්‍රී ලංකාව)', NULL, '2024-04-24 04:45:03', NULL),
('C00013', 'nice1djbravo@gmail.com', '', 'Heoughten', '', 'Heoughten', 'images/users/C00013.jpg', '90+90 1231315151', 'Turkey (Türkiye)', NULL, '2024-04-24 04:47:14', NULL),
('C00014', 'heoughten123@gmail.com', '', 'Ishan', 'Ardithya Bandarigoda', 'Ishan Ardithya Bandarigoda', 'images/users/C00014.jpg', '712313123131', 'Russia (Россия)', NULL, '2024-04-24 04:47:40', NULL);

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
  `customer_id` varchar(6) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL,
  `pkg_order_id` varchar(10) DEFAULT NULL,
  `approval` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelreservation`
--

INSERT INTO `hotelreservation` (`reservation_id`, `hotel_id`, `name`, `room_number`, `reserved_from`, `reserved_till`, `customer_id`, `totalprice`, `pkg_order_id`, `approval`) VALUES
('RES00001', 'H00002', 'Grand Plaza Hotel', 201, '2050-01-01', '2050-01-02', '', 0.00, 'PKG00007', ''),
('RES00002', 'H00002', 'Grand Plaza Hotel', 201, '2051-01-01', '2051-01-02', '', 0.00, 'PKG00008', 'Approved'),
('RES00003', 'H00001', 'Colombo Reach Hotel', 101, '2024-04-09', '2024-04-20', '', 0.00, 'PKG00009', 'Approved'),
('RES00004', 'H00002', 'Grand Plaza Hotel', 201, '2055-05-05', '2055-05-06', '', 0.00, 'PKG00010', 'Pending'),
('RES00005', 'H00003', 'Ocean View Resort', 303, '2024-02-21', '2024-04-23', '', 3000.00, NULL, 'Pending'),
('RES00006', 'H00005', 'Mountain Retreat Inn', 501, '2024-04-24', '2024-04-27', 'C00011', 0.00, 'PKG00009', 'Approved'),
('RES00007', 'H00005', 'Mountain Retreat Inn', 501, '2024-05-15', '2024-05-18', '', 0.00, 'PKG00011', '');

-- --------------------------------------------------------

--
-- Table structure for table `hotelrooms`
--

CREATE TABLE `hotelrooms` (
  `hotel_id` varchar(6) NOT NULL,
  `name` varchar(200) NOT NULL,
  `district` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `guests` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `room_id` int(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `add_to_packages` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotelrooms`
--

INSERT INTO `hotelrooms` (`hotel_id`, `name`, `district`, `description`, `guests`, `room_type`, `room_id`, `price`, `add_to_packages`) VALUES
('H00001', 'Colombo Reach Hotel', 'Colombo', 'This is a description.', 1, 'Luxury', 101, 100.00, 'Yes'),
('H00001', 'Colombo Reach Hotel', 'Colombo', 'This is a description..', 2, 'Standard', 102, 100.00, 'No'),
('H00001', 'Colombo Reach Hotel', 'Colombo', 'This is a discription...', 2, 'Luxury', 103, 100.00, 'No'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 'This is a discription....', 2, 'Standard', 201, 100.00, 'Yes'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 'This is a discription.....', 1, 'Luxury', 202, 100.00, 'Yes'),
('H00002', 'Grand Plaza Hotel', 'Kandy', 'This is a discription......', 2, 'Standard', 203, 1000.00, 'Yes'),
('H00003', 'Ocean View Resort', 'Galle', 'This is a discription.......', 3, 'Luxury', 301, 1000.00, 'No'),
('H00003', 'Ocean View Resort', 'Galle', 'This is a discription........', 3, 'Standard', 302, 1000.00, 'No'),
('H00003', 'Ocean View Resort', 'Galle', 'This is a discription.........', 1, 'Luxury', 303, 1000.00, 'Yes'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 'This is a discription..........', 2, 'Standard', 401, 1000.00, 'Yes'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 'This is a discription...........', 2, 'Luxury', 402, 1000.00, 'No'),
('H00004', 'Sunset Beach Hotel', 'Hikkaduwa', 'This is a discription............', 3, 'Standard', 403, 1000.00, 'No'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 'This is a discription.............', 2, 'Luxury', 501, 1000.00, 'Yes'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 'This is a discription..............', 1, 'Standard', 502, 1000.00, 'Yes'),
('H00005', 'Mountain Retreat Inn', 'Badulla', 'This is a discription...............', 1, 'Luxury', 503, 1000.00, 'Yes');

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
  `status` varchar(10) DEFAULT NULL,
  `registered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `email`, `password`, `name`, `address`, `contact_number`, `district`, `distance`, `short_desc`, `hotel_picture`, `hotel_url`, `active`, `status`, `registered`) VALUES
('H00001', 'colomboreach@example.com', '123', 'Colombo Reach Hotel', '123 Main Street, Colombo', '123456789', 'Colombo', 5, 'Luxurious hotel in the heart of Colombo.', 'Images/home4.jpg', 'hotel_ColomboReachHotel.php', 1, 'Verified', '2024-03-18'),
('H00002', 'grandplaza@example.com', 'grandplazapass', 'Grand Plaza Hotel', '456 Central Avenue, Kandy', '987654321', 'Kandy', 8, 'Elegant hotel offering stunning views of Kandy.', 'Images/ella2.jpg', '', 1, 'Verified', '2024-04-01'),
('H00003', 'heoughten111@gmail.com', 'oceanviewpass', 'Ocean View Resort', '789 Beach Road, Galle', '456789123', 'Galle', 3, 'Seaside resort offering relaxation and tranquility.', NULL, '', 1, 'Verified', '2024-04-02'),
('H00004', 'sunsetbeach@example.com', 'sunsetbeachpass', 'Sunset Beach Hotel', '10 Ocean Drive, Hikkaduwa', '789123456', 'Galle', 10, 'Beachfront hotel perfect for a tropical getaway.', NULL, '', 1, 'Declined', '2024-04-07'),
('H00005', 'heoughten111@gmail.com', 'mountainretreatpass', 'Mountain Retreat Inn', '15 Mountain View, Nuwara Eliya', '321654987', 'Nuwara Eliya', 15, 'Cozy inn nestled in the picturesque mountains.', 'Images/package3.jpg', '', 1, 'Verified', '2024-04-15'),
('H00006', 'Heoughten123@gmail.com', '$2y$10$VrzegAOuE8FTYemJey2A1.dqy89Z6phulVtMXV3VmZ1LGgriI1QR6', 'Sunrises Hotel', '123', '123', 'Colombo', 4, NULL, NULL, '', 0, 'Verified', '2024-04-22');

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
  `reserved_till` date NOT NULL,
  `reserved_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packageorders`
--

INSERT INTO `packageorders` (`pkg_order_id`, `package_name`, `customer_id`, `customer_name`, `reserved_from`, `reserved_till`, `reserved_date`) VALUES
('PKG00001', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-05-05', '2024-05-06', '2024-03-05'),
('PKG00002', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-05-05', '2024-05-06', '2024-04-02'),
('PKG00003', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-12-15', '2024-12-16', '2024-04-02'),
('PKG00004', 'Adventure Expedition', 'C00010', 'Ishan Ardithya', '2024-12-18', '2024-12-19', '2024-04-05'),
('PKG00006', '', 'C00011', 'Ishan Ardithya', '2050-01-01', '2050-01-02', '2024-04-10'),
('PKG00007', '', 'C00011', 'Ishan Ardithya', '2050-01-01', '2050-01-02', '2024-04-11'),
('PKG00008', '', 'C00011', 'Ishan Ardithya', '2051-01-01', '2051-01-02', '2024-04-18');

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
  `shopitemurl` varchar(255) NOT NULL,
  `date_added` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shopitems`
--

INSERT INTO `shopitems` (`item_id`, `item_name`, `item_price`, `item_description`, `item_photo`, `stocks`, `shopitemurl`, `date_added`) VALUES
('ITEM00001', 'TEST2024', 2000.00, '2024TEST', 'images/shop/425495886_122097390284210734_708901627464760107_n.jpg', 10, 'shop-items/item-TEST2024.php', '2024-02-25'),
('ITEM00002', 'Project A', 555.00, 'AAAAAAA', 'images/shop/bocchi-bocchi-the-rock.gif', 5, 'shop-items/item-ProjectA.php', '2024-04-25'),
('ITEM00003', 'Bocchiii', 0.01, 'Bocchii for sale!', 'images/shop/bocchi-bocchitherock.gif', 1, 'shop-items/item-Bocchiii.php', '2024-04-25');

-- --------------------------------------------------------

--
-- Table structure for table `shoporders`
--

CREATE TABLE `shoporders` (
  `order_id` varchar(10) NOT NULL,
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
  `totalprice` decimal(10,2) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shoporders`
--

INSERT INTO `shoporders` (`order_id`, `customer_id`, `customer_name`, `street_address`, `district`, `city`, `email`, `contact_number`, `contact_number2`, `special_notes`, `items`, `totalprice`, `order_date`) VALUES
('ORDER00001', 'C00011', 'Ishan Ardithya', '81/127', 'Colombo', 'Homagama', 'ardithya123@gmail.com', '077', '011', 'GGEZZZ', 'ITEM00003*1, ITEM00001*2', 500.02, '2024-03-23'),
('ORDER00002', 'C00011', 'Ishan Ardithya', '81/127', 'Colombo', 'Colombo', 'ardithya123@gmail.com', '123', '011', 'GGEZZZZ', 'ITEM00002*3, ITEM00001*2', 1500.02, '2024-04-24');

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
  `specialty` varchar(255) DEFAULT NULL,
  `short_desc` varchar(200) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `active` int(1) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `registered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguide`
--

INSERT INTO `tourguide` (`tg_id`, `email`, `password`, `first_name`, `last_name`, `full_name`, `age`, `contact_number`, `district`, `experience`, `specialty`, `short_desc`, `picture`, `active`, `status`, `registered`) VALUES
('TG0001', 'sunil@example.com', 'sunilpass', 'Sunil', 'Perera', 'Sunil Perera', 35, '123456789', 'Colombo', 5, 'History', 'Passionate tour guide with extensive knowledge in history.', NULL, 1, 'Verified', '2024-03-04'),
('TG0002', 'kamal@example.com', 'kamalpass', 'Kamal', 'Silva', 'Kamal Silva', 40, '987654321', 'Kandy', 8, 'Adventure', 'Experienced adventure tour guide specializing in outdoor activities.', NULL, 1, 'Verified', '2024-03-05'),
('TG0003', 'nimal@example.com', 'nimalpass', 'Nimal', 'Fernando', 'Nimal Fernando', 30, '777888999', 'Galle', 3, 'Cultural', 'Enthusiastic about showcasing cultural heritage sites.', NULL, 1, 'Verified', '2024-03-10'),
('TG0004', 'anil@example.com', 'anilpass', 'Anil', 'Kumar', 'Anil Kumar', 28, '555666777', 'Anuradhapura', 4, 'Wildlife', 'Passionate wildlife enthusiast with in-depth knowledge of flora and fauna.', NULL, 1, 'Verified', '2024-04-02'),
('TG0005', 'priya@example.com', 'priyapass', 'Priya', 'Ranasinghe', 'Priya Ranasinghe', 32, '333444555', 'Nuwara Eliya', 6, 'Nature', 'Dedicated to showcasing the beauty of nature through guided tours.', NULL, 1, 'Verified', '2024-04-07'),
('TG0006', 'nice1djbravo@gmail.com', 'samanthapass', 'Samantha', 'Jayasinghe', 'Samantha Jayasinghe', 36, '999000111', 'Badulla', 7, 'Hiking', 'Experienced hiking guide passionate about exploring scenic trails.', NULL, 1, 'Pending', '2024-04-08'),
('TG0007', 'ardithya123@gmail.com', '$2y$10$NdKtB012Su4jbo0dxO5PlO0rlKnksU2481dlup7dqSh3NEN6nidY2', 'Ishan', 'Ardithya', 'Ishan Ardithya', 55, '123', 'Colombo', 5, 'Wild Life, Adventures', NULL, NULL, 0, 'Verified', '2024-04-09'),
('TG0008', 'ishanardithya@gmail.com', '$2y$10$TgA0qDHoC1vuGh0q5KLDD.flOu9hDsC3WAgkdwLaAIbHSULiAFUDG', 'Ishan', 'Ardithya', 'Ishan Ardithya', 55, '123', 'Colombo', 12, 'Wild Life, Adventures', NULL, NULL, 0, 'Verified', NULL);

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
  `customer_id` varchar(6) NOT NULL,
  `pkg_order_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tourguidebooking`
--

INSERT INTO `tourguidebooking` (`booking_id`, `tg_id`, `name`, `booked_from`, `booked_till`, `customer_id`, `pkg_order_id`) VALUES
('B00001', 'TG0002', 'Kamal Silva', '2024-03-05', '2024-03-06', '', 'PKG00001'),
('B00002', 'TG0006', 'Samantha Jayasinghe', '2024-05-05', '2024-05-06', '', 'PKG00002'),
('B00003', 'TG0006', 'Samantha Jayasinghe', '2024-12-15', '2024-12-16', '', 'PKG00003'),
('B00004', 'TG0002', 'Kamal Silva', '2024-12-18', '2024-12-19', '', 'PKG00004'),
('B00005', 'TG0002', 'Kamal Silva', '2050-01-01', '2050-01-02', '', 'PKG00007'),
('B00006', 'TG0001', 'Sunil Perera', '2051-01-01', '2051-01-02', '', 'PKG00008'),
('B00007', 'TG0008', 'Ishan Ardithya', '2052-02-02', '2052-02-03', 'C00014', 'PKG00009');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`inquiry_id`);

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
-- Indexes for table `shoporders`
--
ALTER TABLE `shoporders`
  ADD PRIMARY KEY (`order_id`);

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
