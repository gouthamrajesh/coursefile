-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 06:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cumu_calcu`
--

CREATE TABLE `cumu_calcu` (
  `roll_no` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `avg_series` int(11) DEFAULT NULL,
  `avg_assignment` int(11) DEFAULT NULL,
  `avg_attendance` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cumu_calcu`
--

INSERT INTO `cumu_calcu` (`roll_no`, `name`, `avg_series`, `avg_assignment`, `avg_attendance`, `total`) VALUES
(1, 'John Doe', 25, 15, 96, NULL),
(2, 'Jane Smith', 25, 15, 39, NULL),
(3, 'Michael Johnson', 25, 15, 66, NULL),
(4, 'Emily Davis', 25, 15, 72, NULL),
(5, 'David Wilson', 25, 15, 98, NULL),
(6, 'Sarah Brown', 25, 15, 80, NULL),
(7, 'Robert Taylor', 25, 15, 87, NULL),
(8, 'Olivia Anderson', 25, 15, 88, NULL),
(9, 'William Martinez', 25, 15, 95, NULL),
(10, 'Sophia Thompson', 25, 15, 100, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cumu_calcu`
--
ALTER TABLE `cumu_calcu`
  ADD PRIMARY KEY (`roll_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
