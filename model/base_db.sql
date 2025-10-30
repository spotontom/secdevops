-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2025 at 11:20 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12


-- Create the tech_support database
DROP DATABASE IF EXISTS base_db;
CREATE DATABASE base_db;
USE base_db;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `base_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_ID` int(10) UNSIGNED NOT NULL,
  `course_professor` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_number` varchar(10) NOT NULL,
  `course_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_ID`, `course_professor`, `course_name`, `course_number`, `course_updated`) VALUES
  (1,'Rose Wilson','Principles of Financial Accounting I','ACC2001','2025-10-03 21:18:02'),
  (2,'Mary Simpson','Principles of Financial Accounting I','ACC2001','2025-10-03 21:18:02'),
  (3,'Mary Simpson','Principles of Financial Accounting II','ACC2011','2025-10-03 21:18:02'),
  (4,'Ken Smith','Microcomputer Applications','CGS1570','2025-10-03 21:18:02'),
  (5,'Wayne Paulson','Microcomputer Applications','CGS1570','2025-10-03 21:18:02'),
  (6,'Ted Eve','Introduction to Programming Logic','COP1000','2025-10-03 21:18:02'),
  (7,'Cate Jackson','Introduction to Java Programming','COP2250','2025-10-03 21:18:02'),
  (8,'Wayne Paulson','Data Structure (SQL)','COP2700','2025-10-03 21:18:02'),
  (9,'David Lawson','Network Fundamentals','CTS1650','2025-10-03 21:18:02'),
  (10,'Rose Ryan','Web Design I','DIG2100','2025-10-03 21:18:02'),
  (11,'Ben Conner','Principles of Economics, Macro','ECO2013','2025-10-03 21:18:02'),
  (12,'Mat Musk','Principles of Economics, Macro','ECO2013','2025-10-03 21:18:02'),
  (13,'Mat Musk','Principles of Economics, Micro','ECO2023','2025-10-03 21:18:02'),
  (14,'Cathy Patterson','Financial Management','FIN3400','2025-10-03 21:18:02'),
  (15,'Ted Eve','SecDevOps','CIS4433','2025-10-03 21:18:02'),
  (16,'Wayne Paulson','Agile Project Management','ISM4318','2025-10-03 21:18:02'),
  (17,'Rose Ryan','Emerging Technologies','ISM4302','2025-10-03 21:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_ID` int(10) UNSIGNED NOT NULL,
  `student_fname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(120) NOT NULL,
  `student_major` varchar(100) NOT NULL,
  `student_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_ID`, `student_fname`, `student_lname`, `student_email`, `student_major`, `student_updated`) VALUES
(1, 'Peter', 'Cullen', 'pcullen@my.gulfcoast.edu', '', '2025-10-03 21:18:02'),
(2, 'Tom', 'Kenny', 'tkenny2@my.gulfcoast.edu', '', '2025-10-03 21:18:02'),
(3, 'Frank', 'Welker', 'fwelker@my.gulfcoast.edu', '', '2025-10-03 21:18:02'),
(4, 'Steve', 'Blum', 'sblum@my.gulfcoast.edu', '', '2025-10-03 21:18:02'),
(5, 'Tabitha', 'St. Germain', 'tsgermain@my.gulfcoast.edu', '', '2025-10-03 21:18:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_ID`),
  ADD UNIQUE KEY `course_number` (`course_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_ID`),
  ADD UNIQUE KEY `student_email` (`student_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;