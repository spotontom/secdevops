DROP DATABASE IF EXISTS `base_db`;
CREATE DATABASE `base_db`;
USE `base_db`;

-- Create table structure for "courses"

CREATE TABLE `courses` (
  `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_prof` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_no` varchar(10) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`course_id`)
);

-- Insert generic data into "courses"

INSERT INTO `courses` (`course_id`, `course_prof`, `course_name`, `course_no`, `last_update`) VALUES
(1, 'Rose Wilson', 'Principles of Financial Accounting I', 'ACC2001', '2025-10-24 04:42:12'),
(2, 'Mary Simpson', 'Principles of Financial Accounting I', 'ACC2001', '2025-10-24 04:42:12'),
(3, 'Mary Simpson', 'Principles of Financial Accounting II', 'ACC2011', '2025-10-24 04:42:12'),
(4, 'Ken Smith', 'Microcomputer Applications', 'CGS1570', '2025-10-24 04:42:12'),
(5, 'Wayne Paulson', 'Microcomputer Applications', 'CGS1570', '2025-10-24 04:42:12'),
(6, 'Ted Eve', 'Introduction to Programming Logic', 'COP1000', '2025-10-24 04:42:12'),
(7, 'Cate Jackson', 'Introduction to Java Programming', 'COP2250', '2025-10-24 04:42:12'),
(8, 'Wayne Paulson', 'Data Structure (SQL)', 'COP2700', '2025-10-24 04:42:12'),
(9, 'David Lawson', 'Network Fundamentals', 'CTS1650', '2025-10-24 04:42:12'),
(10, 'Rose Ryan', 'Web Design I', 'DIG2100', '2025-10-24 04:42:12'),
(11, 'Ben Cole', 'Principles of Economics, Macro', 'ECO2013', '2025-10-24 04:42:12'),
(12, 'Mat Musk', 'Principles of Economics, Macro', 'ECO2013', '2025-10-24 04:42:12'),
(13, 'Mat Musk', 'Principles of Economics, Micro', 'ECO2023', '2025-10-24 04:42:12'),
(14, 'Cathy Patterson', 'Financial Management', 'FIN3400', '2025-10-24 04:42:12'),
(15, 'Ted Eve', 'SecDevOps', 'CIS4433', '2025-10-24 04:42:12'),
(16, 'Wayne Paulson', 'Agile Project Management', 'ISM4318', '2025-10-24 04:42:12'),
(17, 'Rose Ryan', 'Emerging Technologies', 'ISM4302', '2025-10-24 04:42:12');

-- Create table structure for "students"

CREATE TABLE `students` (
  `stu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `stu_email` varchar(120) NOT NULL UNIQUE,
  `major` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`stu_id`)
);

-- Insert generic data into "students"

INSERT INTO `students` (`stu_id`, `f_name`, `l_name`, `stu_email`, `major`, `last_update`) VALUES
(1, 'Spike', 'Witwicky', 'switwicky@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(2, 'Johnathan', 'Smith', 'jsmith8@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(3, 'Kevin', 'Flynn', 'kflynn2@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(4, 'Claire', 'Redfield', 'credfield@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(5, 'David', 'Lightman', 'dlightman@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(6, 'Ellen', 'Ripley', 'eripley@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(7, 'Luz', 'Noceda', 'lnoceda@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(8, 'Barney', 'Calhoun', 'bcalhoun@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(9, 'Misa', 'Hayase', 'mhayase@my.gulfcoast.edu', '', '2025-10-24 04:42:12'),
(10, 'Cliff', 'Steele', 'csteele2@my.gulfcoast.edu', '', '2025-10-24 04:42:12');

-- Create table structure for "logs"

CREATE TABLE `logs` (
  `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sign_in` datetime NOT NULL,
  `sign_out` datetime NOT NULL,
  `stu_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `log_updated` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`),
  FOREIGN KEY (`stu_id`) REFERENCES students(`stu_id`),
  FOREIGN KEY (`course_id`) REFERENCES courses(`course_id`)
);

-- Create "ts_user"

GRANT SELECT, INSERT, UPDATE, DELETE ON * TO log_user@localhost IDENTIFIED BY 'pa55word';