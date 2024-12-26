-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 02:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `break_pass`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `password`, `created_at`) VALUES
(3, 'abhranildey2004@gmail.com', 'abhra123', '2024-12-12 14:41:51'),
(8, 'pratimmmmc@gmail.com', 'naru@123', '2024-12-19 04:48:52'),
(9, 'archismanmukherjee500@gmail.com', 'svcvdjv', '2024-12-19 05:00:39'),
(10, 'archismanmukherjee500@gmail.com', 'svcvdjv', '2024-12-19 05:02:07'),
(12, 'pratimmmmc@gmail.com', 'naru123', '2024-12-19 05:58:19'),
(15, 'goswamiachinta.ag@gmail.com', 'achint123', '2024-12-19 06:19:38'),
(16, 'goswamiachinta.ag@gmail.com', 'achint123', '2024-12-19 06:20:45'),
(17, 'rimaghosh843@gmail.com', 'rim123', '2024-12-19 06:32:04'),
(18, 'abhranildey2004@gmail.com', 'abh123', '2024-12-19 15:23:28'),
(19, 'chakrabortysoumili33@gmail.com', 'sou123', '2024-12-23 05:22:36'),
(20, 'deybai2008@gmail.com', 'bai123', '2024-12-23 07:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'Admin_rony', 'adm123', '2024-12-09 17:26:19');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `feedback` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `phone`, `feedback`, `created_at`) VALUES
(2, 'Archisman mukherjee', 'archismanmukherjee500@gmail.com', 7076316329, 'jfkfbgklhiid', '2024-12-12 13:53:19'),
(3, 'Archisman mukherjee', 'archismanmukherjee500@gmail.com', 7076316329, 'jdvjbsjvbajbvjadbvjsbjv', '2024-12-19 09:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `loc` varchar(150) NOT NULL,
  `pincode` bigint(10) NOT NULL,
  `NH` varchar(20) NOT NULL,
  `issue` varchar(10) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `name`, `email`, `password`, `loc`, `pincode`, `NH`, `issue`, `details`, `created_at`) VALUES
(8, 'archisman mukherjee', 'archismanmukherjee500@gmail.com', 'archis500', 'Himachal Vihar, Matigara, Siliguri Subdivsion, Darjeeling, West Bengal, 713205, India', 713200, 'NH17', 'mechanical', 'gmbhmnmonmmomom ihdbidbiubsviub', '2024-12-10 16:58:24'),
(10, 'ritu', 'ritumalick58@gmail.com', 'ritu123', 'Siliguri, Rajganj, Jalpaiguri District, West Bengal, 734001, India', 713206, 'NH 16', 'mechanical', 'skfjdj ;gj\r\n', '2024-12-11 07:08:40'),
(16, 'naru', 'pratimmmmc@gmail.com', 'naru123', 'Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH16', 'battery', 'vavuvax', '2024-12-19 05:58:19'),
(18, 'achinta', 'goswamiachinta.ag@gmail.com', 'achint123', 'Michael Madhusudan Memorial College, Kabiguru Sarani, Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH17', 'mechanical', 'dhvcsdjkvfj', '2024-12-19 06:20:45'),
(19, 'shreya', 'rimaghosh843@gmail.com', 'rim123', 'Michael Madhusudan Memorial College, Kabiguru Sarani, Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH17', 'mechanical', 'yvubsbuy', '2024-12-19 06:32:04'),
(20, 'Abhranil Dey', 'abhranildey2004@gmail.com', 'abh123', 'Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH17', 'fuel', 'come fast i wat here or you get from tgetr you mb', '2024-12-19 15:23:28'),
(21, 'soumili', 'chakrabortysoumili33@gmail.com', 'sou123', 'Michael Madhusudan Memorial College, Kabiguru Sarani, Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH17', 'mechanical', 'fuobuobvoiioiovewh', '2024-12-23 05:22:37'),
(22, 'baisali', 'deybai2008@gmail.com', 'bai123', 'Michael Madhusudan Memorial College, Kabiguru Sarani, Durgapur, Faridpur Durgapur, Paschim Bardhaman, West Bengal, 713200, India', 713200, 'NH17', 'fuel', 'agfgilfgligli', '2024-12-23 07:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `area` varchar(100) NOT NULL,
  `space` varchar(100) NOT NULL,
  `towing` varchar(10) NOT NULL,
  `pin` int(10) NOT NULL,
  `charges` bigint(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `phone`, `email`, `address`, `area`, `space`, `towing`, `pin`, `charges`, `created_at`) VALUES
(2, 'Archis Motors', 7076316329, 'archismanmukherjee500@gmail.com', 's/234 bidhannagar, 713205', 'NH17', 'Maintenance', 'Yes', 713200, 1700, '2024-12-12 17:40:38'),
(7, 'Akash motors', 7076316326, 'archismanmukherjee500@gmail.com', 'j rj j j  j e', 'NH17', 'Car guide', 'Yes', 713200, 2000, '2024-12-19 07:02:17'),
(8, 'Rony Motors', 7076316329, 'archismanmukherjee500@gmail.com', 's/234 bidhannagar', 'NH17', 'Maintenance', 'Yes', 713200, 2500, '2024-12-21 04:38:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
