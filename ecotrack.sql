-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 09:15 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_waste_log` (IN `waste_type` VARCHAR(50), IN `bag_size` VARCHAR(50), IN `is_recyclable` VARCHAR(3), IN `date_of_disposal` DATE, IN `user_id` INT)   BEGIN
    INSERT INTO waste_logs (
        waste_type, 
        bag_size, 
        is_recyclable, 
        date_of_disposal, 
        user_id
    )
    VALUES (
        waste_type, 
        bag_size, 
        is_recyclable, 
        date_of_disposal, 
        user_id
    );
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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'joe', 'bloggs', 'joe@gmail.com', 'joe123', '2024-11-20 18:33:48', '2024-11-20 18:33:48');

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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_logs`
--

INSERT INTO `waste_logs` (`id`, `waste_type`, `bag_size`, `is_recyclable`, `date_of_disposal`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'glass', 'Large Bag(20L)', 'Yes', '2024-11-16', 1, '2024-11-15 01:19:34', '2024-11-26 18:13:00'),
(8, 'general', 'Large Bag(100L)', 'No', '2024-11-17', 1, '2024-11-15 01:23:47', '2024-11-26 18:13:00'),
(9, 'glass', 'Medium Bag(50L)', 'No', '2024-11-30', 1, '2024-11-15 01:24:34', '2024-11-26 18:13:00'),
(10, 'organic', 'Large Bag(20L)', 'Yes', '2024-11-25', 1, '2024-11-15 01:25:35', '2024-11-26 18:13:00'),
(11, 'recyclable', 'Small Bag (25L)', 'No', '2024-11-23', 1, '2024-11-15 01:29:02', '2024-11-26 18:13:00'),
(12, 'glass', 'Large Bag(20L)', 'Yes', '2024-12-28', 1, '2024-11-15 01:30:48', '2024-11-26 18:13:00'),
(13, 'glass', 'Small Bag (25L)', 'No', '2024-11-23', 1, '2024-11-15 01:35:34', '2024-11-26 18:13:00'),
(22, 'recyclable', 'Large Bag(20L)', 'Yes', '2024-11-20', 1, '2024-11-20 22:13:52', '2024-11-26 18:13:00'),
(23, 'glass', 'Medium Bag(50L)', 'No', '2024-11-27', 1, '2024-11-26 19:02:16', '2024-11-26 19:02:16');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `waste_logs`
--
ALTER TABLE `waste_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `waste_logs`
--
ALTER TABLE `waste_logs`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
