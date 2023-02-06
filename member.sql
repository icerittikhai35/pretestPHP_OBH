-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 06:17 PM
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
(1, 'Surasak', '8b1a9953c4611296a827abf8c47804d7', 1, 'sak', 'surasak', 952344657, 'surasak@gmail,.com', 'asdas 123 asasd 12 asda sdaa', 0, '', 'asdasdasd', '2023-02-06 14:40:20'),
(4, 'Tawee', '202cb962ac59075b964b07152d234b70', 2, 'Hawee', 'Sopapan', 1234567890, 'Tawee@g.co', '', NULL, NULL, '', '2023-02-06 15:14:20'),
(5, 'test', '202cb962ac59075b964b07152d234b70', 2, 'test', 'test', 1234, 'test@g.co', '123asd qwe1231 asd 123 1asd ', 123412, 'asdewet', '', '2023-02-06 15:20:40'),
(6, 'test1', '202cb962ac59075b964b07152d234b70', 2, 'test', 'test', 1234567, '12312@asdasd.com', '123asd qwe1231 asd 123 1asd ', 123412, 'asdewet', '', '2023-02-06 15:23:59'),
(7, 'test3', '202cb962ac59075b964b07152d234b70', 0, 'test3', 'test3', 1234567, 'icerittikhai2@asda.v', '123asd qwe1231 asd 123 1asd ', 123412, 'asdewet', '', '2023-02-06 17:15:09');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
