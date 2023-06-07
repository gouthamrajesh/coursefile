-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 11:54 AM
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
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `faculty` varchar(100) DEFAULT NULL,
  `subject_code` varchar(50) NOT NULL,
  `semester` int(11) DEFAULT NULL,
  `teaching_hours` int(11) DEFAULT NULL,
  `subject_credit` int(11) DEFAULT NULL,
  `ktu_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`faculty`, `subject_code`, `semester`, `teaching_hours`, `subject_credit`, `ktu_id`) VALUES
('gou', 'ASD23', 7, 45, 8, NULL),
('admin', 'HUN222', 2, 12, 12, NULL),
('gou', 'HUN302', 5, 50, 6, NULL),
('Neer', 'ITT202', 5, 12, 4, NULL),
('Neer', 'ITT302', 5, 12, 4, NULL),
('Neer', 'ITT305', 5, 12, 4, NULL),
('gou', 'ITT402', 4, 34, 6, NULL),
('gou12', 'TT1', 12345, 23, 34, NULL),
('gou12', 'TT2', 12345, 23, 34, NULL),
('neer2', 'TT3', 2, 2, 2, NULL),
('neer2', 'TT4', 2, 2, 2, NULL),
('neer2', 'TT41', 2, 2, 2, NULL),
('neer2', 'TT43', 2, 2, 2, NULL),
('neer2', 'TT44', 2, 2, 2, NULL),
('neer2', 'TT4q', 2, 2, 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
