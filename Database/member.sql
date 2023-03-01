-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2023 at 05:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `member`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `login_flag` tinyint(1) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `username`, `login_flag`, `ip_address`, `last_update`) VALUES
(1, 'Surasak', 0, '128.0.0.1', '2023-02-07 16:02:06'),
(2, 'iii', 0, '::1', '2023-02-07 16:06:03'),
(3, 'iii', 0, '::1', '2023-02-07 16:09:41'),
(4, '123', 3, '::1', '2023-02-07 16:10:17'),
(5, 'fsdf', 1, '::1', '2023-02-07 16:10:58'),
(6, 'iii', 0, '::1', '2023-02-08 03:59:56'),
(7, 'ize', 1, '::1', '2023-02-08 04:15:47'),
(8, 'iii', 0, '::1', '2023-02-08 04:29:46'),
(9, 'ize', 1, '::1', '2023-02-08 04:29:53'),
(10, 'iii', 0, '::1', '2023-02-08 04:32:07'),
(11, 'ize', 1, '::1', '2023-02-08 04:36:56'),
(12, 'iii', 0, '::1', '2023-02-08 04:38:34'),
(13, 'admin', 2, '::1', '2023-02-08 04:41:50'),
(14, 'admin', 2, '::1', '2023-02-08 04:49:26'),
(15, 'iii', 0, '::1', '2023-02-08 05:50:27'),
(16, 'admin', 2, '::1', '2023-02-08 06:13:04'),
(17, 'admin', 1, '::1', '2023-02-08 07:02:14'),
(18, 'admin', 1, '::1', '2023-02-08 07:02:38'),
(19, 'admin', 0, '::1', '2023-02-08 07:02:48'),
(20, 'iii', 1, '::1', '2023-02-08 07:03:26'),
(21, 'admin', 1, '::1', '2023-02-08 07:03:32'),
(22, 'admin', 1, '::1', '2023-02-08 07:08:00'),
(23, 'admin', 1, '::1', '2023-02-08 07:10:00'),
(24, 'iii', 1, '::1', '2023-02-08 07:10:38'),
(25, 'iii', 1, '::1', '2023-02-21 04:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `user_level` tinyint(1) NOT NULL DEFAULT 2,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `tel` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ref_code` int(10) DEFAULT NULL,
  `ref_remark` varchar(50) DEFAULT NULL,
  `remark` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `user_level`, `fname`, `lname`, `tel`, `email`, `address`, `ref_code`, `ref_remark`, `remark`, `last_update`) VALUES
(6, 'test1', '202cb962ac59075b964b07152d234b70', 2, 'test', 'test', 1234567, '12312@asdasd.com', '123asd qwe1231 asd 123 1asd ', 123412, 'asdewet', '', '2023-02-06 15:23:59'),
(8, 'ize', '202cb962ac59075b964b07152d234b70', 1, 'ize', 'ize', 1234567, 'ritthikai.khan@gmail.com', '123asd qwe1231 asd 123 1asd ', 123412, 'asdewet', '', '2023-02-07 15:21:03'),
(9, 'iii', '36347412c7d30ae6fde3742bbc4f21b9', 0, 'iiii', 'iiii', 1234, 'iii@fsd.cp', '1234', 1234, '1234', '4', '2023-02-07 14:28:05'),
(10, 'admin', '202cb962ac59075b964b07152d234b70', 2, 'admin1', 'admin', 1231451341, 'admin@gmail.com', '123asd qwe1231 ', 1231, '12312', '', '2023-02-08 07:10:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
