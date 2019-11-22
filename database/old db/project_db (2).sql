-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 08:29 PM
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
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `Class_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Enrollment_key` varchar(50) NOT NULL DEFAULT 'NULL',
  `Class_session` varchar(30) DEFAULT NULL,
  `Start_date` date NOT NULL,
  `Expire_date` date NOT NULL,
  `T_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`Class_id`, `Name`, `Enrollment_key`, `Class_session`, `Start_date`, `Expire_date`, `T_id`) VALUES
(1, 'mscfinal', '205142', '2017-uop', '2019-11-06', '2019-11-28', 5),
(2, 'bs_semister1', '100000', '2018', '2019-11-06', '2019-11-20', 6);

-- --------------------------------------------------------

--
-- Table structure for table `class_room`
--

CREATE TABLE `class_room` (
  `CR_id` int(20) NOT NULL,
  `CR_Name` varchar(50) NOT NULL,
  `C_Session` varchar(50) NOT NULL,
  `Subject_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Class_id` int(30) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `Reg_no` int(20) NOT NULL,
  `Enrollment_key` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Class_id`, `S_id`, `Reg_no`, `Enrollment_key`) VALUES
(1, 1, 0, 'bssemister1'),
(1, 1, 0, 'msc_final2017'),
(1, 3, 0, '205142'),
(1, 4, 0, '205142'),
(1, 5, 0, '205142'),
(1, 7, 0, '205142'),
(1, 8, 0, '205142'),
(1, 9, 0, '205142'),
(1, 10, 0, '205142'),
(1, 11, 0, '205142'),
(1, 12, 0, '205142'),
(1, 13, 0, '205142'),
(1, 14, 0, '205142'),
(1, 15, 0, '205142'),
(1, 16, 0, '205142'),
(2, 2, 0, '205142');

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
(1, 'sajid ktk', 'sajid@gmail.com', '1234567890'),
(2, 'faheem', 'faheem@gmail.com', '12345'),
(3, 'kashif', 'kashif@gmail.com', '1234567890'),
(4, 'kashif jani', 'kashif2@gmail.com', '1234567890'),
(5, 'sajid asjflkjsl', 'sajid@gmail.comhj', '1234567890'),
(6, 'sajid asjflkjsl', 'sajidd@gmail.comhj', '1234567890'),
(7, 'sajid asjflkjsl', 'sajiddd@gmail.comhj', '1234567890'),
(8, 'sajid asjflkjsl', 'asajiddd@gmail.comhj', '1234567890'),
(9, 'sajid asjflkjsl', 'asajidddz@gmail.comhj', '1234567890'),
(10, 'janii khan', 'jani@gmail', '1234567890'),
(11, 'janii khan', 'janiii@gmail', '1234567890'),
(12, 'janii khan', 'janiii@ggmail', '1234567890'),
(13, 'janii khan', 'janiii@ggmailzz', '1234567890'),
(14, 'ttkslfj ksj', 'tt@gm', '1234567890'),
(15, 'ttkslfj ksj', 'tt@gma', '1234567890'),
(16, 'ttkslfj ksj', 'tt@gmam', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subject_id` int(20) NOT NULL,
  `subject_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `take`
--

CREATE TABLE `take` (
  `S_id` bigint(30) NOT NULL,
  `Subject_id` int(20) NOT NULL,
  `Attendence` varchar(30) NOT NULL,
  `A_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(5, 'sajid', 3102093992, '1420279089405', 'university of peshawar', 'pakistan', 'peshawar', 'sajid@gmail.com', '1234567890'),
(6, 'faheem', 112345789, '12345678905678', 'asdfghwertyuio', 'asdfghjuiodfgh', 'xcfghjmkgh', 'asdfg@asdfghj', '1234567890'),
(7, 'sajid', 3102093992, '784653128965432', 'fhdfgsfdgs', 'hdrgsdw', 'hdgsvz', 's@s', '123456789'),
(8, 'faheem', 1234567890, '1234567890', 'sdfghjk', 'werfghn', 'cfghjk', 'faheem@gmail.com', '1234567890'),
(9, 'owais', 1234567890, '1234567890', 'sdfghjk', 'werfghn', 'cfghjk', 'owais@gmail.com', '1234567890'),
(3010120, 'sajid', 3102093992, '1420279089405', 'klsdfljs', 'dssfda', 'asfdsa', 'sss@sss', '123456789'),
(3010121, 'ihsan', 1234567890, '123456789045656', 'sdfkhl', 'gshgjkdlh', 'skjf sdfal', 'ihsan@gmail.com', '1234567890'),
(3010122, 'jamal', 1223567980908, '123456789098765', 'dgfhjk', 'ghjHGHJ', 'srydtfyghkljk', 'jamal@gmail.com', '1234567890'),
(3010123, 'khattak', 1111111111111, '122222222222222', 'sjdfk salf ', 'aklfsfjlk asfkjlj', 'sldkflj slj', 'ktk@gmail.com', '11111111'),
(3010124, 'jani', 2302939103103, '12223913931384', 'aksjf sahk', 'asfkjlfj', 'ashdhfkj ', 'mm@gm', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `teachs`
--

CREATE TABLE `teachs` (
  `T_id` bigint(20) NOT NULL,
  `Subject_id` int(30) NOT NULL,
  `teach_date` date NOT NULL,
  `Assignment` int(11) NOT NULL,
  `Quizez` int(11) NOT NULL,
  `presentation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `class_room`
--
ALTER TABLE `class_room`
  ADD PRIMARY KEY (`CR_id`,`C_Session`),
  ADD KEY `Subject_id` (`Subject_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Class_id`,`S_id`,`Enrollment_key`),
  ADD KEY `Class_id` (`Class_id`,`S_id`),
  ADD KEY `Reg_id` (`S_id`),
  ADD KEY `enrollment_key` (`Enrollment_key`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`,`Email`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`),
  ADD KEY `Subject_id` (`Subject_id`);

--
-- Indexes for table `take`
--
ALTER TABLE `take`
  ADD PRIMARY KEY (`S_id`,`Subject_id`,`A_date`),
  ADD KEY `Reg_no` (`Subject_id`),
  ADD KEY `Subject_id` (`Subject_id`),
  ADD KEY `S_id` (`S_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`,`Email`);

--
-- Indexes for table `teachs`
--
ALTER TABLE `teachs`
  ADD PRIMARY KEY (`T_id`,`Subject_id`,`teach_date`),
  ADD KEY `Subject_id` (`Subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_room`
--
ALTER TABLE `class_room`
  MODIFY `CR_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3010125;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_ibfk_1` FOREIGN KEY (`T_id`) REFERENCES `teacher` (`T_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `class_room`
--
ALTER TABLE `class_room`
  ADD CONSTRAINT `class_room_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`Subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`Class_id`) REFERENCES `class` (`Class_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`S_id`) REFERENCES `student` (`S_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `take`
--
ALTER TABLE `take`
  ADD CONSTRAINT `take_ibfk_1` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`Subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `take_ibfk_2` FOREIGN KEY (`S_id`) REFERENCES `student` (`S_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teachs`
--
ALTER TABLE `teachs`
  ADD CONSTRAINT `teachs_ibfk_2` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`Subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
