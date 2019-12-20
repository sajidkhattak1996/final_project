-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2019 at 04:41 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `A_id` bigint(20) NOT NULL,
  `a_name` varchar(80) NOT NULL,
  `a_date` date NOT NULL,
  `a_time` bigint(20) NOT NULL,
  `at_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_record`
--

CREATE TABLE `assignment_record` (
  `A_id` bigint(20) NOT NULL,
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(20) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `ao_marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `AT_id` int(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`AT_id`, `status`) VALUES
(1, 'P'),
(2, 'A'),
(3, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record`
--

CREATE TABLE `attendence_record` (
  `AT_id` int(10) NOT NULL,
  `AT_date` date NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence_record`
--

INSERT INTO `attendence_record` (`AT_id`, `AT_date`, `Class_id`, `S_id`) VALUES
(1, '2019-11-01', 1227, 5),
(2, '2019-11-01', 1227, 6),
(1, '2019-11-01', 1227, 11),
(1, '2019-11-01', 1227, 8),
(2, '2019-11-01', 1227, 7),
(3, '2019-11-01', 1227, 10),
(1, '2019-11-01', 1227, 9),
(1, '2019-11-04', 1227, 5),
(2, '2019-11-04', 1227, 6),
(3, '2019-11-04', 1227, 11),
(1, '2019-11-04', 1227, 8),
(1, '2019-11-04', 1227, 7),
(2, '2019-11-04', 1227, 10),
(1, '2019-11-04', 1227, 9),
(1, '2019-11-05', 1227, 5),
(1, '2019-11-05', 1227, 6),
(2, '2019-11-05', 1227, 11),
(1, '2019-11-05', 1227, 8),
(1, '2019-11-05', 1227, 7),
(1, '2019-11-05', 1227, 10),
(3, '2019-11-05', 1227, 9),
(1, '2019-11-06', 1227, 5),
(1, '2019-11-06', 1227, 6),
(1, '2019-11-06', 1227, 11),
(1, '2019-11-06', 1227, 8),
(1, '2019-11-06', 1227, 7),
(1, '2019-11-06', 1227, 10),
(1, '2019-11-06', 1227, 9),
(1, '2019-11-07', 1227, 5),
(1, '2019-11-07', 1227, 6),
(3, '2019-11-07', 1227, 11),
(2, '2019-11-07', 1227, 8),
(1, '2019-11-07', 1227, 7),
(1, '2019-11-07', 1227, 10),
(1, '2019-11-07', 1227, 9),
(1, '2019-11-08', 1227, 5),
(1, '2019-11-08', 1227, 6),
(2, '2019-11-08', 1227, 11),
(1, '2019-11-08', 1227, 8),
(3, '2019-11-08', 1227, 7),
(1, '2019-11-08', 1227, 10),
(1, '2019-11-08', 1227, 9),
(2, '2019-12-09', 1227, 5),
(1, '2019-12-09', 1227, 6),
(1, '2019-12-09', 1227, 11),
(1, '2019-12-09', 1227, 8),
(3, '2019-12-09', 1227, 7),
(1, '2019-12-09', 1227, 10),
(1, '2019-12-09', 1227, 9),
(1, '2019-11-10', 1227, 5),
(1, '2019-11-10', 1227, 6),
(3, '2019-11-10', 1227, 11),
(1, '2019-11-10', 1227, 8),
(1, '2019-11-10', 1227, 7),
(2, '2019-11-10', 1227, 10),
(1, '2019-11-10', 1227, 9),
(1, '2019-11-11', 1227, 5),
(3, '2019-11-11', 1227, 6),
(1, '2019-11-11', 1227, 11),
(2, '2019-11-11', 1227, 8),
(1, '2019-11-11', 1227, 7),
(1, '2019-11-11', 1227, 10),
(1, '2019-11-11', 1227, 9),
(1, '2019-11-17', 1227, 16),
(1, '2019-11-17', 1227, 15),
(1, '2019-11-17', 1227, 17),
(2, '2019-11-17', 1227, 11),
(1, '2019-11-17', 1227, 8),
(2, '2019-11-17', 1227, 12),
(1, '2019-11-17', 1227, 7),
(1, '2019-11-17', 1227, 10),
(1, '2019-11-17', 1227, 9),
(2, '2019-11-17', 1227, 13),
(2, '2019-11-17', 1227, 5),
(1, '2019-11-17', 1227, 6),
(2, '2019-11-17', 1227, 14),
(1, '2019-11-20', 1227, 16),
(1, '2019-11-20', 1227, 15),
(1, '2019-11-20', 1227, 17),
(1, '2019-11-20', 1227, 11),
(1, '2019-11-20', 1227, 8),
(1, '2019-11-20', 1227, 12),
(1, '2019-11-20', 1227, 7),
(1, '2019-11-20', 1227, 10),
(1, '2019-11-20', 1227, 9),
(1, '2019-11-20', 1227, 13),
(1, '2019-11-20', 1227, 5),
(1, '2019-11-20', 1227, 6),
(1, '2019-11-20', 1227, 14),
(2, '2019-11-21', 1227, 16),
(2, '2019-11-21', 1227, 15),
(2, '2019-11-21', 1227, 17),
(2, '2019-11-21', 1227, 11),
(1, '2019-11-21', 1227, 8),
(1, '2019-11-21', 1227, 12),
(1, '2019-11-21', 1227, 7),
(1, '2019-11-21', 1227, 10),
(1, '2019-11-21', 1227, 9),
(1, '2019-11-21', 1227, 13),
(1, '2019-11-21', 1227, 5),
(1, '2019-11-21', 1227, 6),
(1, '2019-11-21', 1227, 14);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_id` bigint(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Enrollment_key` varchar(50) NOT NULL DEFAULT '',
  `Class_session` varchar(30) DEFAULT NULL,
  `Start_date` date NOT NULL,
  `currenttime` time NOT NULL,
  `Expire_date` date NOT NULL,
  `T_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_id`, `Name`, `Enrollment_key`, `Class_session`, `Start_date`, `currenttime`, `Expire_date`, `T_id`) VALUES
(1225, 'msc_final', 'final2018', '2017-2018', '2019-12-16', '11:04:28', '2019-12-15', 4),
(1226, 'Bscs', 'sajid96', '2019-2020', '2019-12-17', '07:41:04', '2019-12-31', 4),
(1227, 'msc_final', 'cs-2019', '2019-2020`', '2019-12-17', '12:32:43', '2019-12-31', 4);

-- --------------------------------------------------------

--
-- Table structure for table `have`
--

CREATE TABLE `have` (
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `have`
--

INSERT INTO `have` (`Subject_id`, `Class_id`, `S_id`) VALUES
(2, 1225, 0),
(3, 1226, 0),
(1, 1227, 5),
(1, 1227, 6),
(1, 1227, 7),
(1, 1227, 8),
(1, 1227, 9),
(1, 1227, 10),
(1, 1227, 11),
(1, 1227, 12),
(1, 1227, 13),
(1, 1227, 14),
(1, 1227, 15),
(1, 1227, 16),
(1, 1227, 17);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `L_id` int(20) NOT NULL,
  `link` varchar(300) NOT NULL,
  `description` varchar(200) NOT NULL,
  `ldate` date NOT NULL,
  `Class_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`L_id`, `link`, `description`, `ldate`, `Class_id`) VALUES
(5, 'https://www.google.com/', 'google', '2019-12-17', 1226),
(6, 'https://cs.stanford.edu/people/eroberts/courses/soco/projects/1998-99/robotics/history.html', 'Histry of Robot', '2019-12-17', 1226);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(20) NOT NULL,
  `title` varchar(80) NOT NULL,
  `msg` varchar(300) NOT NULL,
  `cdate` date NOT NULL,
  `expire_date` date NOT NULL,
  `Class_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `msg`, `cdate`, `expire_date`, `Class_id`) VALUES
(1, 'Angular js', 'Welcome to the Anugular javascript .', '0000-00-00', '2019-12-28', 1226),
(2, 'Robotic', 'Robotics is an interdisciplinary branch of engineering and science that includes mechanical engineering, electronic engineering, information engineering, computer science, and others. Robotics deals with the design, construction, operation, and use of robots, as well as computer systems for their co', '2019-12-18', '2019-12-28', 1226);

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `P_id` bigint(20) NOT NULL,
  `p_topic` varchar(80) NOT NULL,
  `p_date` date NOT NULL,
  `p_time` bigint(30) NOT NULL,
  `pt_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `presentation_record`
--

CREATE TABLE `presentation_record` (
  `P_id` bigint(20) NOT NULL,
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `po_marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quize`
--

CREATE TABLE `quize` (
  `Q_id` bigint(20) NOT NULL,
  `q_topic` varchar(80) NOT NULL,
  `q_date` date NOT NULL,
  `q_time` bigint(20) NOT NULL,
  `qt_marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_record`
--

CREATE TABLE `quiz_record` (
  `Q_id` bigint(20) NOT NULL,
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `qo_marks` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `Reg_no` int(20) NOT NULL,
  `Enrollment_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Class_id`, `S_id`, `Reg_no`, `Enrollment_key`) VALUES
(1227, 5, 31, 'cs-2019'),
(1227, 6, 36, 'cs-2019'),
(1227, 7, 10, 'cs-2019'),
(1227, 8, 8, 'cs-2019'),
(1227, 9, 16, 'cs-2019'),
(1227, 10, 14, 'cs-2019'),
(1227, 11, 7, 'cs-2019'),
(1227, 12, 8, 'cs-2019'),
(1227, 13, 29, 'cs-2019'),
(1227, 14, 49, 'cs-2019'),
(1227, 15, 3, 'cs-2019'),
(1227, 16, 1, 'cs-2019'),
(1227, 17, 4, 'cs-2019');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `c_date` date NOT NULL,
  `file` varchar(100) NOT NULL,
  `Class_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `topic`, `c_date`, `file`, `Class_id`) VALUES
(8, 'recurrence relation', '2019-12-18', '1-recurrence related Question solved (1) (1).docx', 1226),
(9, 'morphem', '2019-12-18', '3-morphemes (1).docx', 1226),
(10, 'context free graimar', '2019-12-18', 'CNF and PDA.pdf', 1226);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_id` bigint(30) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `student_name`, `Email`, `password`) VALUES
(1, 'M  .Owais khan', 'owais@gmail.com', '123456789123456789'),
(2, 'Faheem ullah', 'faheem@gmail.com', 'asdfghjkl'),
(3, 'ihsan ullah', 'ihsan@gmail.com', 'asdfghjkl'),
(4, 'Habib ur rehman', 'habib@gmail.com', 'asdfghjkl'),
(5, 'Nasir Iqbal', 'nasir@gmial.com', 'nasir12345'),
(6, 'Bilal khan', 'bilal@gmail.com', '1234567890'),
(7, 'Faisal ktk', 'faisal@gmail.com', 'qwertyuiop'),
(8, 'Ibrar khan', 'ibrar@gmail.com', '1234567890'),
(9, 'Reyaz iqbal', 'rayaz@gmail.com', '1234567890'),
(10, 'Sajjad iqbal', 'sajjad@gmail.com', 'qwertyuiop'),
(11, 'Qasir khan', 'qasir@gmail.com', '1234567890'),
(12, 'Amana bibi', 'amna@gmail.com', '1234567890'),
(13, 'Sara Hussan', 'sara@gmail.com', 'qwertyuiop'),
(14, 'Habib Unas', 'habib19@gmail.com', '1234567890'),
(15, 'Nazia Usaf zai', 'nazia123@gmail.com', '123456789123456789'),
(16, 'Samreen qamar', 'samreen@gmail.com', 'qwertyuiop'),
(17, 'Uzma bibi', 'uzma@gmail.com', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_id` bigint(20) NOT NULL,
  `subject_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subject_id`, `subject_name`) VALUES
(1, 'intruduction to computer'),
(2, 'mthematic'),
(3, 'Compiler Construction');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_id` bigint(20) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Contact_no` bigint(20) NOT NULL,
  `Cnic` varchar(20) NOT NULL,
  `Institute_name` varchar(80) NOT NULL,
  `Country` varchar(40) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_id`, `Name`, `Contact_no`, `Cnic`, `Institute_name`, `Country`, `City`, `Email`, `Password`) VALUES
(4, 'sajid ktk', 3102145236, '123411524152112', 'University of pehawar', 'pakistan', 'peshawar', 'sajid@gmail.com', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`AT_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`Class_id`,`Enrollment_key`),
  ADD KEY `T_id` (`T_id`),
  ADD KEY `Enrollment_key` (`Enrollment_key`),
  ADD KEY `Enrollment_key_2` (`Enrollment_key`),
  ADD KEY `Enrollment_key_3` (`Enrollment_key`);

--
-- Indexes for table `have`
--
ALTER TABLE `have`
  ADD KEY `Class_id` (`Class_id`),
  ADD KEY `have_ibfk_2` (`Subject_id`),
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`L_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `presentation`
--
ALTER TABLE `presentation`
  ADD PRIMARY KEY (`P_id`);

--
-- Indexes for table `quize`
--
ALTER TABLE `quize`
  ADD PRIMARY KEY (`Q_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Class_id`,`S_id`,`Enrollment_key`),
  ADD KEY `Class_id` (`Class_id`,`S_id`),
  ADD KEY `Reg_id` (`S_id`),
  ADD KEY `enrollment_key` (`Enrollment_key`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`,`Email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `AT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1228;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `L_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `P_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `quize`
--
ALTER TABLE `quize`
  MODIFY `Q_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
