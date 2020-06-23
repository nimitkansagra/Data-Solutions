-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 03:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_solution`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `last_login_ip` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `last_login_time`, `last_login_ip`) VALUES
(1, 'Nimit', 'nimitkansagra@outlook.com', '$2y$10$fV0YpilCs0sUiSHWsLW5HOCaw9fvBV25wD2qmWcxU4mtbqcv7kFRa', '2020-06-18 05:15:39', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`) VALUES
(1, 'Vachhani Umang Dhirajbhai', 'umangvachhani2357@gmail.com', '9978555796'),
(2, 'Yagnesh Baraiya', 'dryagnesh.baraiya@gmail.com', '9512240122'),
(3, 'Nimit', 'nirav96016@gmail.com', '9537522691');

-- --------------------------------------------------------

--
-- Table structure for table `dvr`
--

CREATE TABLE `dvr` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvr`
--

INSERT INTO `dvr` (`id`, `customer_id`, `company`, `storage_capacity`, `storage_unit`, `priority`, `problem`, `estimate`, `status`, `inward`, `outward`, `returned`) VALUES
(1, 3, 'wd', 200, 'GB', 'asdf', 'fhjkljhk sdfg', 0, 0, '2020-06-22 15:59:32', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_login`
--

CREATE TABLE `failed_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(64) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `ip_address` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `failed_login`
--

INSERT INTO `failed_login` (`id`, `email`, `time`, `ip_address`) VALUES
(1, 'nimitkansagra@outlook.com', '2020-06-18 05:35:24', '::1'),
(2, 'nimitkansagra@outlook.com', '2020-06-22 13:39:30', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `harddisk`
--

CREATE TABLE `harddisk` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `serial_no` varchar(64) NOT NULL,
  `firmware_no` varchar(64) NOT NULL,
  `wwn_no` varchar(64) NOT NULL,
  `type` varchar(10) NOT NULL,
  `ssd_type` varchar(3) NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laptop`
--

CREATE TABLE `laptop` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `model_no` varchar(64) NOT NULL,
  `with_adapter` tinyint(4) NOT NULL,
  `with_battery` tinyint(4) NOT NULL,
  `with_harddisk` tinyint(4) NOT NULL,
  `problem` text NOT NULL,
  `quotation` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laptop`
--

INSERT INTO `laptop` (`id`, `customer_id`, `company`, `model_no`, `with_adapter`, `with_battery`, `with_harddisk`, `problem`, `quotation`, `status`, `inward`, `outward`, `returned`) VALUES
(1, 1, 'HP', '1', 1, 0, 1, 'prblem', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(2, 1, 'dell', '98', 1, 0, 0, 'Problem2', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(4, 1, 'Asus', 'Rog 3', 0, 0, 0, 'Probmlemo', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(5, 1, 'Samsung', 'S231', 0, 0, 0, 'Problemo2', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(6, 1, 'Samsung', 'S231', 0, 0, 0, 'Problemo2', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(7, 1, 'Samsung', 'S231', 0, 0, 0, 'Problemo2', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(8, 1, 'Samsung', 'S000', 1, 0, 0, 'Problem', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(9, 1, 'Samsung', 'S322', 0, 0, 0, 'Problito', 0, 0, '2020-06-19 10:36:28', NULL, 0),
(10, 2, 'WD', 'WD31234', 1, 0, 0, 'Not working', 0, 0, '2020-06-22 14:18:15', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `memorycard`
--

CREATE TABLE `memorycard` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `estimate` int(11) NOT NULL,
  `problem` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `motherboard`
--

CREATE TABLE `motherboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `with_ram` tinyint(4) NOT NULL,
  `with_cpu` tinyint(4) NOT NULL,
  `with_fan` tinyint(4) NOT NULL,
  `problem` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `motherboard`
--

INSERT INTO `motherboard` (`id`, `customer_id`, `company`, `name`, `with_ram`, `with_cpu`, `with_fan`, `problem`, `status`, `inward`, `outward`, `returned`) VALUES
(1, 2, 'Asus', 'LGA11', 0, 1, 1, 'Problemo', 0, '2020-06-19 13:37:00', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pendrive`
--

CREATE TABLE `pendrive` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `company` varchar(64) NOT NULL,
  `storage_capacity` mediumint(9) NOT NULL,
  `storage_unit` varchar(3) NOT NULL,
  `priority` varchar(64) NOT NULL,
  `problem` text NOT NULL,
  `estimate` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `inward` timestamp NOT NULL DEFAULT current_timestamp(),
  `outward` timestamp NULL DEFAULT NULL,
  `returned` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `dvr`
--
ALTER TABLE `dvr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `failed_login`
--
ALTER TABLE `failed_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `harddisk`
--
ALTER TABLE `harddisk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `laptop`
--
ALTER TABLE `laptop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `memorycard`
--
ALTER TABLE `memorycard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `pendrive`
--
ALTER TABLE `pendrive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dvr`
--
ALTER TABLE `dvr`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_login`
--
ALTER TABLE `failed_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `harddisk`
--
ALTER TABLE `harddisk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptop`
--
ALTER TABLE `laptop`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `memorycard`
--
ALTER TABLE `memorycard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motherboard`
--
ALTER TABLE `motherboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pendrive`
--
ALTER TABLE `pendrive`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dvr`
--
ALTER TABLE `dvr`
  ADD CONSTRAINT `dvr_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `failed_login`
--
ALTER TABLE `failed_login`
  ADD CONSTRAINT `failed_login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `admin` (`email`);

--
-- Constraints for table `harddisk`
--
ALTER TABLE `harddisk`
  ADD CONSTRAINT `harddisk_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `laptop`
--
ALTER TABLE `laptop`
  ADD CONSTRAINT `laptop_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `memorycard`
--
ALTER TABLE `memorycard`
  ADD CONSTRAINT `memorycard_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `motherboard`
--
ALTER TABLE `motherboard`
  ADD CONSTRAINT `motherboard_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `pendrive`
--
ALTER TABLE `pendrive`
  ADD CONSTRAINT `pendrive_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
