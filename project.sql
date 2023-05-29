-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: May 29, 2023 at 08:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

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
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `special_designation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `special_designation`) VALUES
(1, 'faculty1', 'HOD', ''),
(2, 'faculty2', 'aprof', ''),
(3, 'faculty3', 'aprof', ''),
(4, 'faculty4', 'prof', ''),
(5, 'faculty5', 'prof', 'ttcordinat');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_preference`
--

CREATE TABLE `faculty_preference` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sub1` varchar(10) NOT NULL,
  `s1_app` int(11) NOT NULL DEFAULT 0,
  `sub2` varchar(10) NOT NULL,
  `s2_app` int(11) NOT NULL DEFAULT 0,
  `sub3` varchar(10) NOT NULL,
  `s3_app` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_preference`
--

INSERT INTO `faculty_preference` (`id`, `name`, `sub1`, `s1_app`, `sub2`, `s2_app`, `sub3`, `s3_app`) VALUES
(1, 'faculty1', 'PE', 1, 'java', 0, 'c', 1),
(2, 'faculty2', '', 0, '', 0, '', 0),
(3, 'faculty3', '', 0, '', 0, '', 0),
(4, 'faculty4', '', 0, '', 0, '', 0),
(5, 'faculty5', 'java', 1, 'c', 0, 'PE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `special_designation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `designation`, `special_designation`) VALUES
(1, 'faculty1', '123', 'HOD', NULL),
(2, 'faculty2', '123', 'aprof', NULL),
(3, 'faculty3', '123', 'aprof', NULL),
(4, 'faculty4', '123', 'prof', NULL),
(5, 'faculty5', '123', 'prof', 'ttcordinat');

-- --------------------------------------------------------

--
-- Table structure for table `preference_final`
--

CREATE TABLE `preference_final` (
  `id` int(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `sub1` varchar(10) NOT NULL,
  `sub2` varchar(10) NOT NULL,
  `sub3` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `code` varchar(6) NOT NULL,
  `sub_name` varchar(10) NOT NULL,
  `LH` int(11) NOT NULL,
  `TH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`code`, `sub_name`, `LH`, `TH`) VALUES
('HUN100', 'PE', 2, 0),
('ITT204', 'c', 4, 2),
('ITT304', 'OOT', 4, 1),
('ITT306', 'java', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tt1`
--

CREATE TABLE `tt1` (
  `id` int(11) NOT NULL,
  `day` varchar(10) NOT NULL,
  `hr1` varchar(10) NOT NULL DEFAULT '-',
  `hr2` varchar(10) NOT NULL DEFAULT '-',
  `hr3` varchar(10) NOT NULL DEFAULT '-',
  `hr4` varchar(10) NOT NULL DEFAULT '-',
  `hr5` varchar(10) NOT NULL DEFAULT '-',
  `hr6` varchar(10) NOT NULL DEFAULT '-'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tt1`
--

INSERT INTO `tt1` (`id`, `day`, `hr1`, `hr2`, `hr3`, `hr4`, `hr5`, `hr6`) VALUES
(1, 'monday', 'ITT204', '-', '-', '-', '-', '-'),
(2, 'tuesday', '-', '-', '-', '-', '-', '-'),
(3, 'wednesday', '-', '-', 'ITT304', '-', '-', '-'),
(4, 'thursday', '-', '-', '-', '-', '-', '-'),
(5, 'friday', '-', '-', '-', '-', '-', 'HUT100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_preference`
--
ALTER TABLE `faculty_preference`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preference_final`
--
ALTER TABLE `preference_final`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `tt1`
--
ALTER TABLE `tt1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faculty_preference`
--
ALTER TABLE `faculty_preference`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `preference_final`
--
ALTER TABLE `preference_final`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tt1`
--
ALTER TABLE `tt1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
