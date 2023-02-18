-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2023 at 06:29 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_table`
--

CREATE TABLE `crud_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `date_of_birth` varchar(100) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL,
  `updated_on` datetime DEFAULT NULL,
  `deleted_on` datetime DEFAULT NULL,
  `del_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crud_table`
--

INSERT INTO `crud_table` (`id`, `name`, `mobile_no`, `email_id`, `gender`, `date_of_birth`, `added_on`, `updated_on`, `deleted_on`, `del_status`) VALUES
(1, 'Muralidharan R', '9597442159', 'murali@gmail.com', 'Male', '2002-07-14', '2023-02-16 20:56:00', NULL, NULL, 0),
(2, 'Sudharsan S', '7449050225', 'sudharsh@gmail.com', 'Male', '2001-05-21', '2023-02-16 23:46:00', '2023-02-17 18:29:19', '2023-02-16 21:13:38', 0),
(3, 'Chandu S', '8686586997', 'chandu@gmail.com', 'Male', '2001-06-17', '2023-02-16 20:12:13', NULL, NULL, 0),
(4, 'Sukash K', '9597331797', 'sukash@gmail.com', 'Male', '2006-05-12', '2023-02-16 20:56:40', NULL, NULL, 0),
(6, 'Kamal Nath S', '9597796646', 'kamal@gmail.com', 'Male', '2023-02-17', '2023-02-16 20:54:06', NULL, NULL, 0),
(8, 'Muralidharan R', '9597442159', 'murali@gmail.com', 'Male', '2002-07-14', '2023-02-17 17:02:41', '2023-02-17 17:35:09', '2023-02-17 17:36:07', 1),
(9, 'Muralidharan R', '9597442100', 'murali@gmail.com', 'Male', '2023-02-15', '2023-02-17 17:02:47', '2023-02-17 17:30:04', '2023-02-17 17:36:04', 1),
(10, 'Muralidharan R', '9597442190', 'murali@gmail.co', 'Male', '2023-02-17', '2023-02-17 17:28:33', NULL, '2023-02-17 17:34:33', 1),
(11, 'Test1', '1234567891', 'test@gmail.co', 'Male', '2023-02-18', '2023-02-17 17:35:29', '2023-02-17 17:35:51', '2023-02-17 17:35:53', 1),
(12, 'Dhakshan D', '9524239591', 'dhakshan@gmail.com', 'Male', '2019-09-25', '2023-02-17 17:36:41', NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_table`
--
ALTER TABLE `crud_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_table`
--
ALTER TABLE `crud_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
