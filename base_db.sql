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
  `courseID` int(10) UNSIGNED NOT NULL,
  `courseProf` varchar(50) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseNo` varchar(10) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `courseProf`, `courseName`, `courseNo`, `lastUpdate`) VALUES
(1, 'Trendon Ellis', 'SecDevOps', 'CIS4433', '2025-10-03 21:18:02'),
(2, 'Wendy Payne', 'Agile Project Management', 'ISM4318', '2025-10-03 21:18:02'),
(3, 'Rique Orozco', 'Emerging Technologies', 'ISM4302', '2025-10-03 21:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stuID` int(10) UNSIGNED NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `stuEmail` varchar(120) NOT NULL,
  `major` varchar(100) NOT NULL,
  `lastUpdate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stuID`, `fName`, `lName`, `stuEmail`, `major`, `lastUpdate`) VALUES
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
  ADD PRIMARY KEY (`courseID`),
  ADD UNIQUE KEY `courseNo` (`courseNo`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stuID`),
  ADD UNIQUE KEY `stuEmail` (`stuEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stuID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
