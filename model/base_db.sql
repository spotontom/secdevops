DROP DATABASE IF EXISTS `base_db`;
CREATE DATABASE `base_db`;
USE `base_db`;

-- Create table structure for "courses"

CREATE TABLE `courses` (
  `course_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_professor` varchar(50) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `course_number` char(10) NOT NULL,
  `course_updated` DATETIME NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`course_ID`)
);

-- Insert generic data into "courses"

INSERT INTO `courses` (`course_ID`, `course_professor`, `course_name`, `course_number`, `course_updated`) VALUES
(1, 'Debbie Wilson', 'Principles of Financial Accounting I', 'ACC2001', '2025-10-24 04:42:12'),
(2, 'Mary Simpson', 'Principles of Financial Accounting I', 'ACC2001', '2025-10-24 04:42:12'),
(3, 'Mary Simpson', 'Principles of Financial Accounting II', 'ACC2011', '2025-10-24 04:42:12'),
(4, 'Ken Smith', 'Microcomputer Applications', 'CGS1570', '2025-10-24 04:42:12'),
(5, 'Wayne Paulson', 'Microcomputer Applications', 'CGS1570', '2025-10-24 04:42:12'),
(6, 'Ben Carmen', 'Introduction to Programming Logic', 'COP1000', '2025-10-24 04:42:12'),
(7, 'Cate Jackson', 'Introduction to Java Programming', 'COP2250', '2025-10-24 04:42:12'),
(8, 'Wayne Paulson', 'Data Structure (SQL)', 'COP2700', '2025-10-24 04:42:12'),
(9, 'David Lawson', 'Network Fundamentals', 'CTS1650', '2025-10-24 04:42:12'),
(10, 'Ralph Ryan', 'Web Design I', 'DIG2100', '2025-10-24 04:42:12'),
(11, 'Ben Carmen', 'Principles of Economics, Macro', 'ECO2013', '2025-10-24 04:42:12'),
(12, 'Steve Musk', 'Principles of Economics, Macro', 'ECO2013', '2025-10-24 04:42:12'),
(13, 'Steve Musk', 'Principles of Economics, Micro', 'ECO2023', '2025-10-24 04:42:12'),
(14, 'Cathy Patterson', 'Financial Management', 'FIN3400', '2025-10-24 04:42:12'),
(15, 'Ben Carmen', 'SecDevOps', 'CIS4433', '2025-10-24 04:42:12'),
(16, 'Wayne Paulson', 'Agile Project Management', 'ISM4318', '2025-10-24 04:42:12'),
(17, 'Ralph Ryan', 'Emerging Technologies', 'ISM4302', '2025-10-24 04:42:12');

-- Create table structure for "students"

CREATE TABLE `students` (
  `student_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(50) NOT NULL,
  `student_lname` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL UNIQUE,
  `student_major` varchar(100) NOT NULL,
  `student_updated` DATETIME NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`student_ID`)
);

-- Insert generic data into "students"

INSERT INTO `students` (`student_ID`, `student_fname`, `student_lname`, `student_email`, `student_major`, `student_updated`) VALUES
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

CREATE TABLE `log` (
  `log_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_signin` datetime NOT NULL,
  `log_signout` datetime NOT NULL,
  `log_student_ID` int(10) UNSIGNED NOT NULL,
  `log_course_ID` int(10) UNSIGNED NOT NULL,
  `log_updated` DATETIME NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_ID`),
  FOREIGN KEY (`log_student_ID`) REFERENCES students(`student_ID`),
  FOREIGN KEY (`log_course_ID`) REFERENCES courses(`course_ID`)
);

-- Create "log_user"

GRANT SELECT, INSERT, UPDATE, DELETE ON * TO log_user@localhost IDENTIFIED BY 'pa55word';