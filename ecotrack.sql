-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2024 at 11:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecotrack`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertUser` (IN `p_first_name` VARCHAR(100), IN `p_last_name` VARCHAR(100), IN `p_email` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN
  
        INSERT INTO Users (first_name, last_name, email, password)
        VALUES (p_first_name, p_last_name, p_email, p_password);
    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_waste_log` (IN `waste_type` VARCHAR(50), IN `bag_size` VARCHAR(50), IN `is_recyclable` VARCHAR(3), IN `date_of_disposal` DATE)   BEGIN
    INSERT INTO waste_logs (waste_type, bag_size, is_recyclable, date_of_disposal)
    VALUES (waste_type, bag_size, is_recyclable, date_of_disposal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidateUser` (IN `p_email` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN
    SELECT id, email, first_name, last_name, role
    FROM users
    WHERE email = p_email AND password = p_password;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'joe', 'bloggs', 'joe@gmail.com', 'joe123', '2024-11-20 18:33:48', '2024-11-27 19:33:38', 'admin'),
(2, 'test', 'test', 'test@test.com', 'test123', '2024-11-27 19:34:08', '2024-11-27 19:34:08', 'admin'),
(3, 'John', 'Doe', 'john.doe@example.com', 'password123', '2024-11-27 21:45:39', '2024-11-27 21:45:39', NULL),
(4, 'Johnnyyyyy', 'Doe', 'john.doe@example.coms', 'password123', '2024-11-27 21:45:54', '2024-11-27 21:45:54', NULL),
(5, 'popopopopo', 'popoppo', 'asdadd@gmasd.com', '1231231', '2024-11-27 21:47:26', '2024-11-27 21:47:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `waste_logs`
--

CREATE TABLE `waste_logs` (
  `id` int(11) NOT NULL,
  `waste_type` varchar(50) NOT NULL,
  `bag_size` varchar(50) NOT NULL,
  `is_recyclable` varchar(3) NOT NULL,
  `date_of_disposal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waste_logs`
--

INSERT INTO `waste_logs` (`id`, `waste_type`, `bag_size`, `is_recyclable`, `date_of_disposal`, `created_at`, `updated_at`) VALUES
(7, 'glass', 'Large Bag(20L)', 'Yes', '2024-11-16', '2024-11-15 01:19:34', '2024-11-15 01:19:34'),
(8, 'general', 'Large Bag(100L)', 'No', '2024-11-17', '2024-11-15 01:23:47', '2024-11-15 01:23:47'),
(9, 'glass', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-15 01:24:34', '2024-11-15 01:24:34'),
(10, 'organic', 'Large Bag(20L)', 'Yes', '2024-11-25', '2024-11-15 01:25:35', '2024-11-15 01:25:35'),
(11, 'recyclable', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:29:02', '2024-11-15 01:29:02'),
(12, 'glass', 'Large Bag(20L)', 'Yes', '2024-12-28', '2024-11-15 01:30:48', '2024-11-15 01:30:48'),
(13, 'glass', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:35:34', '2024-11-15 01:35:34'),
(22, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-12-08', '2024-11-27 19:27:00', '2024-11-27 19:27:00'),
(23, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-12-08', '2024-11-27 19:27:01', '2024-11-27 19:27:01'),
(24, 'general', 'Large Bag(100L)', 'No', '2028-11-27', '2024-11-27 19:27:24', '2024-11-27 19:27:24'),
(25, 'general', 'Small Bag (25L)', 'Yes', '2024-11-06', '2024-11-27 19:41:23', '2024-11-27 19:41:23'),
(26, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:29', '2024-11-27 19:48:29'),
(27, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40'),
(28, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40'),
(29, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40'),
(30, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40'),
(31, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40'),
(32, 'organic', 'Large Bag(20L)', 'No', '2024-11-30', '2024-11-27 21:29:56', '2024-11-27 21:29:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `waste_logs`
--
ALTER TABLE `waste_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `waste_logs`
--
ALTER TABLE `waste_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
