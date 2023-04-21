-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2023 at 07:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fk-edusearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$CAm3gPZ4.wvS/XIEdSRjyuWyKIscUZSmGy81vB.Cbx0hyjExnPkGy', 'admin@gmail.com', 0, '2023-04-21 04:33:09.909294', '2023-04-21 05:06:08.619610'),
(2, 'expert', '$2y$10$SP9p0I1BDIyhTolQj49ne.yvAdZ6.0VDHeW0RxyEekH7s3Obv8Zq.', 'expert@gmail.com', 1, '2023-04-21 04:40:21.719293', '2023-04-21 05:06:21.999917'),
(3, 'lecturer', '$2y$10$MUj2qkbdj.yrRN/Q/LeSQekLaoEVBQHvUet3kr5Bv7AfeNL0WIMv.', 'lecturer@gmail.com', 2, '2023-04-21 04:48:28.248413', '2023-04-21 05:06:32.752053'),
(4, 'student', '$2y$10$IAP1nXuyGH/ZQuFWko9vqOvT3aRvSknD999s.k34PP7vtl.F5NS7i', 'student@gmail.com', 3, '2023-04-21 04:49:40.980236', '2023-04-21 05:06:45.889582');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
