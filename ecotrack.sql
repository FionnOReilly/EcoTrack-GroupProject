-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:43 PM
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

DELIMITER ;

DELIMITER $$
------------------
CREATE PROCEDURE InsertAdmin(
    IN p_full_name VARCHAR(50),
    IN p_email VARCHAR(100),
    IN p_password_hash VARCHAR(255)
)
BEGIN
    INSERT INTO admins (full_name, email, password_hash)
    VALUES (p_full_name,  p_email, p_password_hash);
END $$

DELIMITER ;
-----------------
DELIMITER $$

CREATE PROCEDURE DeleteAdmin(IN p_admin_id INT)
BEGIN
    UPDATE admins
    SET deleted_at = NOW()
    WHERE admin_id = p_admin_id;
END $$

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'joe', 'bloggs', 'joe@gmail.com', 'joe123', '2024-11-20 18:33:48', '2024-11-20 18:33:48');

-- --------------------------------------------------------

--
--table structure for admins--
--
CREATE TABLE admins (
    'admin_id' INT AUTO_INCREMENT PRIMARY KEY,  -- Renamed to admin_id instead of user_id
    'full_name' VARCHAR(50) NOT NULL,
    'email' VARCHAR(100) NOT NULL UNIQUE,
    'password' VARCHAR(255) NOT NULL,
    'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,  -- Timestamp for record creation
    'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  -- Timestamp for record update
    'deleted_at' TIMESTAMP NULL DEFAULT NULL  
);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13, 'glass', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:35:34', '2024-11-15 01:35:34');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waste_logs`
--
ALTER TABLE `waste_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
