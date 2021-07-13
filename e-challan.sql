-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 07:21 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-challan`
--

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE `challan` (
  `name` varchar(40) DEFAULT NULL,
  `place` varchar(40) NOT NULL,
  `license_no` varchar(40) NOT NULL,
  `vehicle_no` varchar(40) NOT NULL,
  `vehicle_type` varchar(40) NOT NULL,
  `created_by` varchar(40) NOT NULL,
  `challan_id` int(11) NOT NULL,
  `phone_no` bigint(11) NOT NULL,
  `fine_amount` int(11) NOT NULL,
  `challan_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`name`, `place`, `license_no`, `vehicle_no`, `vehicle_type`, `created_by`, `challan_id`, `phone_no`, `fine_amount`, `challan_desc`) VALUES
('Sandesh Shrestha', 'India', '123456789012', 'ba12ra4', 'cycle', 'hi', 12, 9811111111, 500, 'riding without helmet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `middle_name` varchar(40) DEFAULT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone_no` varchar(40) NOT NULL,
  `role` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `post` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `middle_name`, `last_name`, `username`, `password`, `address`, `phone_no`, `role`, `gender`, `post`) VALUES
(3, 'sam', 'daf', 'sdfsd', 'sam', '12345', 'hello', '9811111111', 'admin', 'Male', 'sdfsg'),
(12, 'nono', 'dsf', 'dsgsd', 'dfgfdgewr', 'qweq', 'asgsg', '9811111111', 'admin', 'Female', ''),
(13, 'Sandesh', 'hello', 'Shrestha', 'iDK', '12345', 'Nepal', '9811111111', 'traffic', 'Male', 'idk'),
(14, 'sa', 'sa', 'sa', 'sa', '12345', 'sa', '9811111111', 'traffic', 'Male', 'sa'),
(15, 'Helo', 'Hi', 'hi', 'hi', 'hi', 'hi', '1234567890', 'traffic', 'Male', 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challan`
--
ALTER TABLE `challan`
  ADD PRIMARY KEY (`challan_id`),
  ADD UNIQUE KEY `challan_id` (`challan_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challan`
--
ALTER TABLE `challan`
  MODIFY `challan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
