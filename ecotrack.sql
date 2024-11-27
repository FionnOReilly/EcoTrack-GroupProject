-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 10:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Database: `ecotrack`

DELIMITER $$

-- Procedures
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_waste_log` (IN `waste_type` VARCHAR(50), IN `bag_size` VARCHAR(50), IN `is_recyclable` VARCHAR(3), IN `date_of_disposal` DATE)   
BEGIN
    INSERT INTO waste_logs (waste_type, bag_size, is_recyclable, date_of_disposal)
    VALUES (waste_type, bag_size, is_recyclable, date_of_disposal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertAdmin` (IN `FullName` VARCHAR(100), IN `Email` VARCHAR(100), IN `Password` VARCHAR(255))   
BEGIN
    INSERT INTO admins (f_name, email, password_hash) 
    VALUES (FullName, Email, Password);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `deleteAdmin` (IN `adminId` INT)   
BEGIN
    DELETE FROM admins WHERE id = adminId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateAdmin` (IN `AdminID` INT, IN `FName` VARCHAR(50), IN `LName` VARCHAR(50), IN `Username` VARCHAR(50), IN `Email` VARCHAR(100), IN `Password` VARCHAR(255))   
BEGIN
    UPDATE admins 
    SET f_name = FName, l_name = LName, username = Username, email = Email, password_hash = Password
    WHERE admin_id = AdminID;
END$$

DELIMITER ;

-- Table structure for `admins`
CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for `users`
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Table structure for `waste_logs`
CREATE TABLE `waste_logs` (
  `id` int(11) NOT NULL,
  `waste_type` varchar(50) NOT NULL,
  `bag_size` varchar(50) NOT NULL,
  `is_recyclable` varchar(3) NOT NULL,
  `date_of_disposal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert data into `users`
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`) 
VALUES (0, 'Riham ', 'Elgammudi', 'Riham@tus.ie', 'test', '2024-11-27 21:03:42', '2024-11-27 21:03:42');

-- Insert data into `waste_logs`
INSERT INTO `waste_logs` (`id`, `waste_type`, `bag_size`, `is_recyclable`, `date_of_disposal`, `created_at`, `updated_at`) 
VALUES 
(7, 'glass', 'Large Bag(20L)', 'Yes', '2024-11-16', '2024-11-15 01:19:34', '2024-11-15 01:19:34'),
(8, 'general', 'Large Bag(100L)', 'No', '2024-11-17', '2024-11-15 01:23:47', '2024-11-15 01:23:47'),
(9, 'glass', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-15 01:24:34', '2024-11-15 01:24:34'),
(10, 'organic', 'Large Bag(20L)', 'Yes', '2024-11-25', '2024-11-15 01:25:35', '2024-11-15 01:25:35'),
(11, 'recyclable', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:29:02', '2024-11-15 01:29:02'),
(12, 'glass', 'Large Bag(20L)', 'Yes', '2024-12-28', '2024-11-15 01:30:48', '2024-11-15 01:30:48'),
(13, 'glass', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:35:34', '2024-11-15 01:35:34'),
(14, 'recyclable', 'Large Bag(100L)', 'No', '2025-03-18', '2024-11-15 01:35:47', '2024-11-15 01:35:47');

-- Indexes for `admins`
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

-- Indexes for `waste_logs`
ALTER TABLE `waste_logs`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT for tables
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `waste_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
