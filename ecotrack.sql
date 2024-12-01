-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 09:15 PM
-- Generation Time: Dec 01, 2024 at 05:34 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertWasteLog` (IN `waste_type` VARCHAR(255), IN `bag_size` VARCHAR(255), IN `is_recyclable` BOOLEAN, IN `date_of_disposal` DATE, IN `user_id` INT)   BEGIN
    INSERT INTO waste_logs (waste_type, bag_size, is_recyclable, date_of_disposal, user_id)
    VALUES (waste_type, bag_size, is_recyclable, date_of_disposal, user_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidateUser` (IN `p_email` VARCHAR(255), IN `p_password` VARCHAR(255))   BEGIN
    SELECT id, email, first_name, last_name, role
    FROM users
    WHERE email = p_email AND password = p_password;
END$$

DELIMITER ;

-- --------------------------------------------------------
--
-- Table structure for table `admin`
--
CREATE TABLE 'admins' (
    'admin_id' INT AUTO_INCREMENT PRIMARY KEY, 
    'first_name' VARCHAR(50) NOT NULL,
    'last_name' VARCHAR(50) NOT NULL,
    'email' VARCHAR(100) NOT NULL UNIQUE,
    'password' VARCHAR(255) NOT NULL,
    'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  
    'deleted_at' TIMESTAMP NULL DEFAULT NULL  
);
--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `current_points` int(11) NOT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `user_id`, `username`, `current_points`, `rank`) VALUES
(6, 2, 'test test', 8, 1),
(7, 1, 'joe bloggs', 2, 2),
(8, 6, 'test2 test2', 0, 3),
(9, 3, 'John Doe', 0, 4),
(10, 4, 'Johnnyyyyy Doe', 0, 5),
(11, 5, 'popopopopo popoppo', 0, 6);

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
  `role` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'joe', 'bloggs', 'joe@gmail.com', 'joe123', '2024-11-20 18:33:48', '2024-11-27 19:33:38', 'admin'),
(2, 'test', 'test', 'test@test.com', 'test123', '2024-11-27 19:34:08', '2024-11-27 19:34:08', 'admin'),
(3, 'John', 'Doe', 'john.doe@example.com', 'password123', '2024-11-27 21:45:39', '2024-11-28 12:27:32', 'user'),
(4, 'Johnnyyyyy', 'Doe', 'john.doe@example.coms', 'password123', '2024-11-27 21:45:54', '2024-11-27 21:45:54', NULL),
(5, 'popopopopo', 'popoppo', 'asdadd@gmasd.com', '1231231', '2024-11-27 21:47:26', '2024-11-27 21:47:26', NULL),
(6, 'test2', 'test2', 'test2@test.com', 'test123', '2024-11-28 12:27:17', '2024-11-28 12:27:36', 'user'),
(7, 'sophie', 'begley', 'sophie@gmail.com', 'sophie123', '2024-12-01 16:07:34', '2024-12-01 16:07:34', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_goals`
--

CREATE TABLE `user_goals` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `current_points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_goals`
--

INSERT INTO `user_goals` (`user_id`, `user_name`, `current_points`) VALUES
(1, 'joe bloggs', 1),
(2, 'test test', 4),
(3, 'John Doe', 1),
(4, 'Johnnyyyyy Doe', 0),
(5, 'popopopopo popoppo', 0),
(6, 'test2 test2', 0),
(7, 'sophie begley', 0);

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
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
INSERT INTO `waste_logs` (`id`, `waste_type`, `bag_size`, `is_recyclable`, `date_of_disposal`, `created_at`, `updated_at`, `user_id`) VALUES
(7, 'glass', 'Large Bag(20L)', 'Yes', '2024-11-16', '2024-11-15 01:19:34', '2024-11-15 01:19:34', NULL),
(8, 'general', 'Large Bag(100L)', 'No', '2024-11-17', '2024-11-15 01:23:47', '2024-11-15 01:23:47', NULL),
(9, 'glass', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-15 01:24:34', '2024-11-15 01:24:34', NULL),
(10, 'organic', 'Large Bag(20L)', 'Yes', '2024-11-25', '2024-11-15 01:25:35', '2024-11-15 01:25:35', NULL),
(11, 'recyclable', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:29:02', '2024-11-15 01:29:02', NULL),
(12, 'glass', 'Large Bag(20L)', 'Yes', '2024-12-28', '2024-11-15 01:30:48', '2024-11-15 01:30:48', NULL),
(13, 'glass', 'Small Bag (25L)', 'No', '2024-11-23', '2024-11-15 01:35:34', '2024-11-15 01:35:34', NULL),
(22, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-12-08', '2024-11-27 19:27:00', '2024-11-27 19:27:00', NULL),
(23, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-12-08', '2024-11-27 19:27:01', '2024-11-27 19:27:01', NULL),
(24, 'general', 'Large Bag(100L)', 'No', '2028-11-27', '2024-11-27 19:27:24', '2024-11-27 19:27:24', NULL),
(25, 'general', 'Small Bag (25L)', 'Yes', '2024-11-06', '2024-11-27 19:41:23', '2024-11-27 19:41:23', NULL),
(26, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:29', '2024-11-27 19:48:29', NULL),
(27, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40', NULL),
(28, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40', NULL),
(29, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40', NULL),
(30, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40', NULL),
(31, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-10-29', '2024-11-27 19:48:40', '2024-11-27 19:48:40', NULL),
(32, 'organic', 'Large Bag(20L)', 'No', '2024-11-30', '2024-11-27 21:29:56', '2024-11-27 21:29:56', NULL),
(33, 'recyclable', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-29 10:24:41', '2024-11-29 10:24:41', 2),
(34, 'recyclable', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-29 10:24:55', '2024-11-29 10:24:55', 2),
(36, 'recyclable', 'Medium Bag(50L)', 'No', '2024-11-30', '2024-11-29 10:29:02', '2024-11-29 10:29:02', 2),
(38, 'general', 'Small Bag (25L)', 'No', '2024-11-15', '2024-11-29 10:30:04', '2024-11-29 10:30:04', 2),
(41, 'general', 'Small Bag (25L)', 'Yes', '2024-11-05', '2024-11-29 10:38:59', '2024-11-29 10:38:59', 1),
(43, 'recyclable', 'Small Bag (25L)', 'Yes', '2024-11-28', '2024-12-01 15:40:21', '2024-12-01 15:40:21', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_goals`
--
ALTER TABLE `user_goals`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `waste_logs`
--
ALTER TABLE `waste_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD CONSTRAINT `leaderboard_fk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_goals`
--
ALTER TABLE `user_goals`
  ADD CONSTRAINT `user_goals_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `waste_logs`
--
ALTER TABLE `waste_logs`
  ADD CONSTRAINT `waste_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
