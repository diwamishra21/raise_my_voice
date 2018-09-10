-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2018 at 01:02 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myvoice`
--

-- --------------------------------------------------------

--
-- Table structure for table `practicals`
--

CREATE TABLE `practicals` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `practicals`
--

INSERT INTO `practicals` (`id`, `user_name`, `email`, `address`) VALUES
(1, 'A', 'P-ni002@internal.quatrro.com', '63/9');

-- --------------------------------------------------------

--
-- Table structure for table `temps`
--

CREATE TABLE `temps` (
  `id` bigint(10) NOT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bu` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `work_location` varchar(120) DEFAULT NULL,
  `c_title` varchar(100) DEFAULT NULL,
  `c_subject` varchar(100) DEFAULT NULL,
  `c_option` varchar(100) DEFAULT NULL,
  `c_tried_r_own` varchar(100) DEFAULT NULL,
  `notes` text,
  `attach_data` varchar(255) DEFAULT NULL,
  `policy_agreed` varchar(1) DEFAULT '1',
  `first_access` bigint(10) DEFAULT NULL,
  `last_access` bigint(10) DEFAULT NULL,
  `lastip` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temps`
--

INSERT INTO `temps` (`id`, `user_type`, `empid`, `confirmed`, `name`, `username`, `password`, `email`, `bu`, `department`, `city`, `work_location`, `c_title`, `c_subject`, `c_option`, `c_tried_r_own`, `notes`, `attach_data`, `policy_agreed`, `first_access`, `last_access`, `lastip`, `status`) VALUES
(1, NULL, 'P-ni002', 1, NULL, 'Abhishek', 'Abhishek', 'abhishek@gmail.com', NULL, NULL, NULL, 'technology', NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(10) NOT NULL,
  `user_type` varchar(100) DEFAULT NULL,
  `empid` varchar(255) DEFAULT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bu` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `city` varchar(120) DEFAULT NULL,
  `work_location` varchar(120) DEFAULT NULL,
  `c_title` varchar(100) DEFAULT NULL,
  `c_subject` varchar(100) DEFAULT NULL,
  `c_option` varchar(100) DEFAULT NULL,
  `c_tried_r_own` varchar(100) DEFAULT NULL,
  `notes` text,
  `attach_data` varchar(255) DEFAULT NULL,
  `policy_agreed` varchar(1) DEFAULT '1',
  `first_access` bigint(10) DEFAULT NULL,
  `last_access` bigint(10) DEFAULT NULL,
  `lastip` varchar(45) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `empid`, `confirmed`, `name`, `username`, `password`, `email`, `bu`, `department`, `city`, `work_location`, `c_title`, `c_subject`, `c_option`, `c_tried_r_own`, `notes`, `attach_data`, `policy_agreed`, `first_access`, `last_access`, `lastip`, `status`) VALUES
(1, NULL, 'P-ni002', 1, NULL, 'Abhishek', 'Abhishek', 'abhishek@gmail.com', NULL, NULL, NULL, 'technology', NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `practicals`
--
ALTER TABLE `practicals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temps`
--
ALTER TABLE `temps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `practicals`
--
ALTER TABLE `practicals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temps`
--
ALTER TABLE `temps`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
