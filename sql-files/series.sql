-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 12:29 AM
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
-- Table structure for table `course_outcomes`
--

CREATE TABLE `course_outcomes` (
  `id` varchar(5) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_outcomes`
--

INSERT INTO `course_outcomes` (`id`, `content`) VALUES
('co1', 'Test Course Outcome'),
('co2', 'Test Course Outcome'),
('co3', 'Test Course Outcome'),
('co4', 'Test Course Outcome'),
('co5', 'Test Course Outcome');

-- --------------------------------------------------------

--
-- Table structure for table `co_po_mapping`
--

CREATE TABLE `co_po_mapping` (
  `co_id` varchar(50) DEFAULT NULL,
  `po_id` varchar(50) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co_po_mapping`
--

INSERT INTO `co_po_mapping` (`co_id`, `po_id`, `level`) VALUES
('co1', 'po1', 1),
('co1', 'po2', 1),
('co1', 'po3', 1),
('co1', 'po4', 1),
('co1', 'po5', 1),
('co1', 'po6', 1),
('co1', 'po7', 1),
('co1', 'po8', 1),
('co1', 'po9', 1),
('co1', 'po10', 1),
('co1', 'po11', 1),
('co1', 'po12', 1),
('co2', 'po1', 1),
('co2', 'po2', 1),
('co2', 'po3', 1),
('co2', 'po4', 1),
('co2', 'po5', 1),
('co2', 'po6', 1),
('co2', 'po7', 1),
('co2', 'po8', 1),
('co2', 'po9', 1),
('co2', 'po10', 1),
('co2', 'po11', 1),
('co2', 'po12', 1),
('co3', 'po1', 1),
('co3', 'po2', 1),
('co3', 'po3', 1),
('co3', 'po4', 1),
('co3', 'po5', 1),
('co3', 'po6', 1),
('co3', 'po7', 1),
('co3', 'po8', 1),
('co3', 'po9', 1),
('co3', 'po10', 1),
('co3', 'po11', 1),
('co3', 'po12', 1),
('co4', 'po1', 1),
('co4', 'po2', 1),
('co4', 'po3', 1),
('co4', 'po4', 1),
('co4', 'po5', 1),
('co4', 'po6', 1),
('co4', 'po7', 1),
('co4', 'po8', 1),
('co4', 'po9', 1),
('co4', 'po10', 1),
('co4', 'po11', 1),
('co4', 'po12', 1),
('co5', 'po1', 1),
('co5', 'po2', 1),
('co5', 'po3', 1),
('co5', 'po4', 1),
('co5', 'po5', 1),
('co5', 'po6', 1),
('co5', 'po7', 1),
('co5', 'po8', 1),
('co5', 'po9', 1),
('co5', 'po10', 1),
('co5', 'po11', 1),
('co5', 'po12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `ktu_id` varchar(11) NOT NULL,
  `name` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `special_designation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`ktu_id`, `name`, `designation`, `special_designation`) VALUES
('admin', 'admin', 'admin', 'admin'),
('KTU100', 'vijayanand', 'HOD', 'HOD'),
('KTU101', 'haripriya', 'Associate ', 'ttcordinat'),
('KTU102', 'suryapriya', 'Associate ', ''),
('KTU103', 'simi', 'Assistant ', ''),
('KTU104', 'prasanth', 'Assistant ', '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ktu_id` varchar(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL,
  `special_designation` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ktu_id`, `username`, `password`, `designation`, `special_designation`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin'),
('KTU100', 'vijayanand', 'vj100', 'HOD', 'HOD'),
('KTU101', 'haripriya', 'hari100', 'Associate ', 'ttcordinat'),
('KTU102', 'suryapriya', 'surya100', 'Associate ', NULL),
('KTU103', 'simi', 'simi100', 'Assistant ', NULL),
('KTU104', 'prasanth', 'pr100', 'Assistant ', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `program_outcomes`
--

CREATE TABLE `program_outcomes` (
  `id` varchar(5) NOT NULL,
  `content` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_outcomes`
--

INSERT INTO `program_outcomes` (`id`, `content`) VALUES
('po1', 'Test Data'),
('po10', 'Test Data'),
('po11', 'Test Data'),
('po12', 'Test Data'),
('po2', 'Test Data'),
('po3', 'Test Data'),
('po4', 'Test Data'),
('po5', 'Test Data'),
('po6', 'Test Data'),
('po7', 'Test Data'),
('po8', 'Test Data'),
('po9', 'Test Data');

-- --------------------------------------------------------

--
-- Table structure for table `series_calcu`
--

CREATE TABLE `series_calcu` (
  `roll_no` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `series1` int(11) DEFAULT NULL,
  `series2` int(11) DEFAULT NULL,
  `avg_series` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `roll_no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`roll_no`, `name`) VALUES
(1, 'John Doe'),
(2, 'Jane Smith'),
(3, 'Michael Johnson'),
(4, 'Emily Davis'),
(5, 'David Wilson'),
(6, 'Sarah Brown'),
(7, 'Robert Taylor'),
(8, 'Olivia Anderson'),
(9, 'William Martinez'),
(10, 'Sophia Thompson');

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
('haripriya', 'EST200', 4, 16, 3, 'KTU101'),
('haripriya', 'HUN302', 5, 12, 5, 'KTU101'),
('suryapriya', 'ITT201', 7, 9, 1, 'KTU102'),
('vijayanand', 'ITT202', 3, 15, 3, 'KTU100'),
('simi', 'ITT203', 5, 12, 4, 'KTU103'),
('simi', 'ITT205', 3, 13, 4, 'KTU103'),
('prasanth', 'ITT212', 4, 13, 4, 'KTU104'),
('suryapriya', 'ITT216', 2, 14, 2, 'KTU102'),
('prasanth', 'ITT305', 6, 10, 6, 'KTU104');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_files`
--

CREATE TABLE `subjects_files` (
  `subject_code` varchar(50) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects_files`
--

INSERT INTO `subjects_files` (`subject_code`, `file_name`, `file_path`, `uploaded_at`) VALUES
('ITT202', 'permission.pdf', 'uploads/viclg/permission.pdf', '2023-06-21 10:23:01'),
('ITT202', 'permission.pdf', 'uploads/miclg/permission.pdf', '2023-06-21 10:23:06'),
('ITT202', 'permission.pdf', 'uploads/vidpt/permission.pdf', '2023-06-21 10:23:10'),
('ITT202', 'permission.pdf', 'uploads/midpt/permission.pdf', '2023-06-21 10:23:15'),
('ITT202', 'permission.pdf', 'uploads/po/permission.pdf', '2023-06-21 10:23:19'),
('ITT202', 'permission.pdf', 'uploads/peo/permission.pdf', '2023-06-21 10:23:23'),
('ITT202', 'permission.pdf', 'uploads/pso/permission.pdf', '2023-06-21 10:23:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_outcomes`
--
ALTER TABLE `course_outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`ktu_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ktu_id`);

--
-- Indexes for table `program_outcomes`
--
ALTER TABLE `program_outcomes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_calcu`
--
ALTER TABLE `series_calcu`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`roll_no`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
