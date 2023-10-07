-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 10:40 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mast`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `bid_amount` decimal(10,2) NOT NULL,
  `proposal` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `work_progress` int(11) NOT NULL DEFAULT 0,
  `release_request` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `freelancer_id`, `work_id`, `bid_amount`, `proposal`, `created_at`, `status`, `work_progress`, `release_request`) VALUES
(1, 1, 2, '1.00', 'a', '2023-09-08 05:19:05', 1, 2, 2),
(2, 1, 3, '5.00', 'qwertyu uiop', '2023-09-22 11:29:18', 1, 2, 2),
(3, 1, 5, '9.00', 'test proposal', '2023-09-23 17:51:06', 0, 0, 0),
(4, 1, 6, '97.00', 'test proposal 2', '2023-09-23 17:54:39', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `collaboration`
--

CREATE TABLE `collaboration` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `note` text NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `shared_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collaboration`
--

INSERT INTO `collaboration` (`id`, `filename`, `note`, `freelancer_id`, `shared_by`, `created_at`) VALUES
(1, 'C:\\xampp\\htdocs\\geek\\uploads/sign_aj2.html', '', 1, 0, '2023-09-24 21:59:34'),
(2, 'C:\\xampp\\htdocs\\geek\\uploads\\2.png', '', 1, 0, '2023-09-24 22:38:31'),
(3, 'C:\\xampp\\htdocs\\geek\\uploads/11.png', 'test', 1, 0, '2023-09-24 22:47:06'),
(4, 'http://localhost/geeks_for_geeks/uploads/111.png', 'test', 1, 1, '2023-09-24 22:50:01'),
(5, 'http://localhost/geeks_for_geeks/uploads/Screenshot_2023-05-05_154920.png', '', 1, 1, '2023-10-04 14:24:06'),
(6, 'Screenshot_2023-06-23_161304.png', '', 1, 1, '2023-10-04 14:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 4, 'customer', 'customer', '', NULL, NULL, '2023-09-06 10:30:55', '2023-09-06 10:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `freelancers`
--

CREATE TABLE `freelancers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `hourly_rate` decimal(10,2) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancers`
--

INSERT INTO `freelancers` (`id`, `user_id`, `first_name`, `last_name`, `profile_image`, `skills`, `bio`, `hourly_rate`, `phone_number`, `email`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'majid', 'N', NULL, NULL, 'sdfsdfkpsdkfpsdf sdfkspfk sdofsaof sdofsofoasf sfosaofasof', NULL, '8089332859', NULL, 'IND', '2023-09-06 07:19:48', '2023-10-07 06:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_skills`
--

CREATE TABLE `freelancer_skills` (
  `id` int(11) NOT NULL,
  `freelancer_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancer_skills`
--

INSERT INTO `freelancer_skills` (`id`, `freelancer_id`, `skill_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 5),
(4, 1, 4),
(5, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `payment_status` enum('pending','completed','failed') NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `customer_id` int(11) DEFAULT NULL,
  `bid` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_email` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `additional_info` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `order_id`, `amount`, `currency`, `payment_status`, `payment_date`, `customer_id`, `bid`, `customer_name`, `customer_email`, `transaction_id`, `payment_method`, `additional_info`) VALUES
(8, 'order_MfjWTjtIuRqgwY', '5.00', 'INR', 'completed', '2023-09-23 09:49:46', 4, 2, 'customer@customer.in', 'customer@customer.in', 'pay_MfjWfbnZv4fOcF', 'credit card', 'Additional payment info'),
(9, 'order_Mfs2sBEryXEyfp', '97.00', 'INR', 'completed', '2023-09-23 18:10:00', 4, 4, 'customer@customer.in', 'customer@customer.in', 'pay_Mfs37BeHrzIDbE', 'credit card', 'Additional payment info');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'php', '', '2023-09-06 10:20:54', '2023-10-05 10:02:26', 0),
(2, 'javascript', 'v8', '2023-09-07 10:05:22', '2023-10-05 10:02:54', 0),
(3, 'python', 'python', '2023-09-23 15:37:57', '2023-09-23 15:37:57', 1),
(4, 'ruby', 'ruby', '2023-09-23 15:39:16', '2023-09-23 15:39:16', 1),
(5, 'c#', 'c#', '2023-09-23 15:40:17', '2023-09-23 15:40:17', 1),
(6, 'java', 'java', '2023-09-23 17:53:26', '2023-09-23 17:53:26', 1),
(7, 'net', '', '2023-10-05 09:46:50', '2023-10-05 09:46:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('freelancer','customer','admin') NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'majid.n@bimageconsulting.in', 'majid.n@bimageconsulting.in', '$2y$10$oXJP.RNbWXiERU0p6A1Wge8MUgr2NAeSiHLzQqzArX/ASp2F4b1su', 'freelancer', 1, '2023-09-06 07:19:48', '2023-10-07 04:41:16'),
(3, 'admin', 'admin@admin.in', '$2y$10$oXJP.RNbWXiERU0p6A1Wge8MUgr2NAeSiHLzQqzArX/ASp2F4b1su', 'admin', 1, '2023-09-06 10:05:45', '2023-09-06 10:05:57'),
(4, 'customer@customer.in', 'customer@customer.in', '$2y$10$X9qM70LOkjXnqd6sNWjytutNFUBrT.f89AiTawVvwliKQbOiq5qpO', 'customer', 1, '2023-09-06 10:30:55', '2023-10-07 08:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `work_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `skills_required` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `customer_id`, `work_title`, `description`, `duration`, `budget`, `skills_required`, `status`, `created_at`, `updated_at`) VALUES
(2, 4, 'test', 'as', 1, '1.00', NULL, 1, '2023-09-07 07:22:51', '2023-09-20 06:38:31'),
(3, 4, 'test2', 'test2', 40, '4.00', NULL, 0, '2023-09-07 10:07:00', '2023-09-07 10:07:00'),
(4, 4, 'test3', 'test3', 60, '10.00', NULL, 0, '2023-09-07 10:07:27', '2023-09-07 10:07:27'),
(5, 4, 'new work test', 'new work test with ruby', 30, '10.00', NULL, 0, '2023-09-23 15:41:06', '2023-09-23 15:41:06'),
(6, 4, 'new work test2', 'with skill java only', 90, '100.00', NULL, 0, '2023-09-23 17:54:04', '2023-09-23 17:54:04'),
(7, 4, 'test work 05102023', 'test work 05102023 test work 05102023test work 05102023 test work 05102023', 90, '100.00', NULL, 0, '2023-10-05 15:22:39', '2023-10-05 15:22:39');

-- --------------------------------------------------------

--
-- Table structure for table `work_skills`
--

CREATE TABLE `work_skills` (
  `id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_skills`
--

INSERT INTO `work_skills` (`id`, `work_id`, `skill_id`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 1),
(4, 4, 2),
(5, 5, 4),
(6, 6, 6),
(7, 7, 1),
(8, 7, 2),
(9, 7, 3),
(10, 7, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freelancer_id` (`freelancer_id`),
  ADD KEY `work_id` (`work_id`);

--
-- Indexes for table `collaboration`
--
ALTER TABLE `collaboration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freelancer_id` (`freelancer_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `work_skills`
--
ALTER TABLE `work_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_id` (`work_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `collaboration`
--
ALTER TABLE `collaboration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancers`
--
ALTER TABLE `freelancers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_skills`
--
ALTER TABLE `work_skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`),
  ADD CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `freelancers`
--
ALTER TABLE `freelancers`
  ADD CONSTRAINT `freelancers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `freelancer_skills`
--
ALTER TABLE `freelancer_skills`
  ADD CONSTRAINT `freelancer_skills_ibfk_1` FOREIGN KEY (`freelancer_id`) REFERENCES `freelancers` (`id`),
  ADD CONSTRAINT `freelancer_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`user_id`);

--
-- Constraints for table `work_skills`
--
ALTER TABLE `work_skills`
  ADD CONSTRAINT `work_skills_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`),
  ADD CONSTRAINT `work_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
