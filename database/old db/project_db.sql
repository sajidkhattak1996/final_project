-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2019 at 05:00 PM
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
  `name` varchar(50) NOT NULL,
  `a_date` date NOT NULL,
  `at_marks` int(20) NOT NULL,
  `ob_marks` int(20) NOT NULL
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
(1, 'p'),
(2, 'a'),
(3, 'l');

-- --------------------------------------------------------

--
-- Table structure for table `attendence_record`
--

CREATE TABLE `attendence_record` (
  `AT_id` int(10) NOT NULL,
  `AT_date` date NOT NULL,
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1245137, 'msc_final-18', 'cs-2019', '2019-2020`', '2019-11-29', '05:16:22', '2019-12-25', 1),
(1245141, 'msc_final', 'msc-18', '2019-2020`', '2019-11-29', '05:58:20', '2019-01-30', 1),
(1245142, 'sajid_ktk', 'sajid96', '2019-2020', '2019-11-29', '08:44:42', '2019-12-25', 1),
(1245143, 'bs_chemistry', 'cs-2019', '2017-2018', '2019-11-30', '04:44:20', '2019-12-25', 1),
(1245144, 'msc_final', 'bs-00082', '2019-2020', '2019-11-30', '04:44:39', '2020-01-01', 1),
(1245145, 'msc_final', 'Angular2019', '2019-2020`', '2019-11-30', '04:44:53', '2019-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `have`
--

CREATE TABLE `have` (
  `Subject_id` bigint(20) NOT NULL,
  `Class_id` bigint(30) NOT NULL,
  `S_id` bigint(30) NOT NULL,
  `A_id` bigint(20) NOT NULL,
  `P_id` bigint(20) NOT NULL,
  `Q_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `have`
--

INSERT INTO `have` (`Subject_id`, `Class_id`, `S_id`, `A_id`, `P_id`, `Q_id`) VALUES
(24, 21, 0, 0, 0, 0),
(21, 1245137, 0, 0, 0, 0),
(20, 1245141, 0, 0, 0, 0),
(29, 1245142, 0, 0, 0, 0),
(22, 1245143, 0, 0, 0, 0),
(13, 1245144, 0, 0, 0, 0),
(13, 1245145, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `presentation`
--

CREATE TABLE `presentation` (
  `P_id` bigint(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `p_date` date NOT NULL,
  `pt_marks` int(20) NOT NULL,
  `ob_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quize`
--

CREATE TABLE `quize` (
  `Q_id` bigint(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `q_date` date NOT NULL,
  `qt_marks` int(20) NOT NULL,
  `ob_marks` int(20) NOT NULL
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
(1245141, 20, 0, 'msc-18'),
(1245142, 16, 8, 'sajid96'),
(1245142, 17, 2, 'sajid96'),
(1245142, 18, 0, 'sajid96'),
(1245142, 19, 4, 'sajid96');

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
(16, 'ttkslfj ksj', 'tt@gmam', '1234567890'),
(17, 'amair khattak', 'amairktk@gmail.com', '1234567890'),
(18, 'kashif kk', 'kashifktk@gmail.com', 'kashif12345'),
(19, 'fahem kkkk', 'fahem@gamail.com', '1234567890');

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
(1, 'c++'),
(2, 'php'),
(3, 'js'),
(4, 'database'),
(5, 'c Plus Plus'),
(6, 'db'),
(7, 'html'),
(8, 'os'),
(9, 'chemistry'),
(10, 'DataStructure'),
(11, 'biology'),
(12, 'zoology'),
(13, 'physics'),
(14, 'ps'),
(15, 'bio'),
(16, 'gdsgs'),
(17, 'is'),
(18, 'sql'),
(19, 'opp'),
(20, 'biochemistry'),
(21, 'urdu'),
(22, 'english'),
(23, 'maths'),
(24, 'mthematic'),
(25, 'java'),
(26, 'angular js'),
(27, 'phatalogy'),
(28, 'mathematic'),
(29, 'javascript');

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
(1, 'Sajid khattak', 31012345967, '1234567894567', 'Qurtuba University', 'pakistan', 'peshawar', 'sajid@gmail.com', '1234567890'),
(2, 'amair', 12345678996, '12345678902345', 'amar school and college', 'pakistan', 'karak_kpk', 'amair@gmail.com', 'amair12345');

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
  ADD KEY `S_id` (`S_id`),
  ADD KEY `A_id` (`A_id`);

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
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `AT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1245146;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `P_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quize`
--
ALTER TABLE `quize`
  MODIFY `Q_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
