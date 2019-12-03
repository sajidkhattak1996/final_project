-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2019 at 08:00 PM
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
  `a_time` time NOT NULL,
  `at_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`A_id`, `a_name`, `a_date`, `a_time`, `at_marks`) VALUES
(1, 'java', '2019-12-03', '00:00:00', 10),
(2, 'java', '2019-12-03', '10:19:46', 5),
(3, 'c_plus plus', '2019-12-04', '10:59:16', 100),
(4, 'Histry Of Pakistan', '2019-12-05', '11:05:56', 10),
(5, 'Histry Of Islam', '2019-12-11', '11:08:13', 100),
(6, 'Histry of JavaScript', '2019-12-11', '11:09:58', 30),
(7, 'Histry Of Buneer', '2019-12-19', '11:12:28', 10),
(8, 'Introducation to Computer', '2019-12-12', '11:13:46', 15),
(9, 'java Histry', '2019-12-03', '11:17:30', 10),
(10, 'Frame works of java script', '2019-12-04', '11:19:08', 20),
(11, 'Histry of Urdu', '2019-12-04', '11:21:58', 3),
(12, 'type of variables in javascript', '2019-12-19', '11:25:18', 10),
(13, 'angular js', '2019-12-04', '11:28:22', 30),
(14, 'angular js histroy', '2019-12-19', '11:29:34', 30),
(15, 'Histroy of www', '2019-12-18', '11:32:33', 40),
(16, 'al', '2019-12-03', '11:57:32', 9);

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

--
-- Dumping data for table `assignment_record`
--

INSERT INTO `assignment_record` (`A_id`, `Subject_id`, `Class_id`, `S_id`, `ao_marks`) VALUES
(3, 29, 1245142, 17, 50),
(3, 29, 1245142, 19, 60),
(3, 29, 1245142, 18, 70),
(3, 29, 1245142, 16, 40),
(4, 29, 1245142, 17, 8),
(4, 29, 1245142, 19, 5),
(4, 29, 1245142, 18, 4),
(4, 29, 1245142, 16, 3),
(5, 29, 1245142, 17, 40),
(5, 29, 1245142, 19, 50),
(5, 29, 1245142, 18, 90),
(5, 29, 1245142, 16, 98),
(6, 29, 1245142, 17, 20),
(6, 29, 1245142, 19, 30),
(6, 29, 1245142, 18, 25),
(6, 29, 1245142, 16, 10),
(7, 29, 1245142, 17, 8),
(7, 29, 1245142, 19, 1),
(7, 29, 1245142, 18, 6),
(7, 29, 1245142, 16, 8),
(8, 29, 1245142, 17, 8),
(8, 29, 1245142, 19, 7),
(8, 29, 1245142, 18, 10),
(8, 29, 1245142, 16, 0),
(9, 29, 1245142, 17, 9),
(9, 29, 1245142, 19, 10),
(9, 29, 1245142, 18, 2),
(9, 29, 1245142, 16, 2),
(10, 29, 1245142, 17, 10),
(10, 29, 1245142, 19, 15),
(10, 29, 1245142, 18, 12),
(10, 29, 1245142, 16, 5),
(12, 29, 1245142, 17, 1),
(12, 29, 1245142, 19, 1),
(12, 29, 1245142, 18, 0),
(12, 29, 1245142, 16, 0),
(13, 29, 1245142, 17, 2),
(13, 29, 1245142, 19, 2),
(13, 29, 1245142, 18, 2),
(13, 29, 1245142, 16, 0),
(14, 29, 1245142, 17, 12),
(14, 29, 1245142, 19, 14),
(14, 29, 1245142, 18, 15),
(14, 29, 1245142, 16, 0),
(15, 29, 1245142, 17, 30),
(15, 29, 1245142, 19, 25),
(15, 29, 1245142, 18, 10),
(15, 29, 1245142, 16, 20),
(16, 29, 1245142, 17, 1),
(16, 29, 1245142, 19, 1),
(16, 29, 1245142, 18, 0),
(16, 29, 1245142, 16, 0);

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

--
-- Dumping data for table `attendence_record`
--

INSERT INTO `attendence_record` (`AT_id`, `AT_date`, `Subject_id`, `Class_id`, `S_id`) VALUES
(1, '2019-12-03', 29, 1245142, 17),
(2, '2019-12-03', 29, 1245142, 19),
(3, '2019-12-03', 29, 1245142, 18),
(1, '2019-12-03', 29, 1245142, 16),
(1, '0000-00-00', 29, 1245142, 17),
(1, '0000-00-00', 29, 1245142, 19),
(1, '0000-00-00', 29, 1245142, 18),
(1, '0000-00-00', 29, 1245142, 16);

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
(1245148, 'bs_chemistry', 'msc-18', '2017-2018', '2019-12-02', '05:46:06', '2019-12-01', 1),
(1245149, 'msc_final-18', 'bs-00082', '2019-2020', '2019-12-02', '05:46:37', '2019-12-03', 1),
(1245150, 'bs_1st_cs', 'bs-00082', '2019-2020', '2019-12-02', '05:52:00', '2019-12-04', 1),
(1245151, 'bs_1st_cs', 'bs-00082', '2019-2020`', '2019-12-02', '05:52:13', '2019-12-01', 1),
(1245152, 'bs_1st_cs', 'msc-18', '2017-2018', '2019-12-02', '05:55:30', '2019-12-01', 1),
(1245153, 'bs_chemistry', 'bs-00082', '2019-2020`', '2019-12-02', '06:00:52', '2019-12-01', 1),
(1245154, 'bs_1st_cs', 'msc-18', '2018-2019', '2019-12-02', '06:01:33', '2019-12-01', 1),
(1245155, 'bs_1st_cs', 'cs-2019', '2019-2020`', '2019-12-02', '06:18:18', '2019-12-27', 1),
(1245156, 'bs_1st_cs', 'Angular2019', '2019-2020`', '2019-12-02', '06:27:58', '2019-12-01', 1),
(1245157, 'msc_final', 'bs-00082', '2019-2020', '2019-12-02', '06:28:14', '2019-12-03', 1),
(1245158, 'msc_final', 'final2018', '2018-2019', '2019-12-02', '08:23:34', '2019-12-01', 1),
(1245159, 'bs_1st_cs', 'cs-2019', '2019-2020`', '2019-12-02', '08:23:55', '2019-12-03', 1),
(1245160, 'msc_final', 'cs-2019', '2018-2019', '2019-12-02', '08:24:26', '2019-12-02', 1),
(1245161, 'bs_1st_cs', 'bs-00082', '2019-2020`', '2019-12-02', '08:25:02', '2019-12-01', 1),
(1245162, 'msc_final', 'msc-18', '2017-2018', '2019-12-02', '08:28:22', '2019-12-01', 1),
(1245163, 'msc_final-18', 'final2018', '2019-2020', '2019-12-02', '08:29:38', '2019-12-01', 1),
(1245164, 'msc_final', 'Angular2019', '2019-2020', '2019-12-02', '08:30:12', '2019-12-03', 1),
(1245165, 'msc_final', 'bs-00082', '2019-2020`', '2019-12-02', '08:37:42', '2019-12-01', 1),
(1245166, 'bs_1st_cs', 'final2018', '2019-2020', '2019-12-02', '08:37:57', '2019-12-03', 1),
(1245167, 'bs_chemistry', 'Angular2019', '2019-2020`', '2019-12-02', '10:58:24', '2019-12-01', 1),
(1245168, 'bs_1st_cs', 'final2018', '2018-2019', '2019-12-02', '11:12:43', '2019-12-03', 1),
(1245169, 'msc_final', 'Angular2019', '2018-2019', '2019-12-02', '11:13:34', '2019-12-03', 1),
(1245170, 'bs_chemistry', 'Angular2019', '2019-2020`', '2019-12-02', '11:32:19', '2019-12-09', 1),
(1245171, 'bs_1st_cs', 'bs-00082', '2019-2020', '2019-12-02', '11:35:05', '2019-12-03', 1),
(1245172, 'msc_final', 'cs-2019', '2017-2018', '2019-12-02', '06:46:35', '2019-12-04', 1);

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
(24, 21, 0),
(21, 1245137, 0),
(20, 1245141, 0),
(29, 1245142, 0),
(22, 1245143, 0),
(13, 1245144, 0),
(22, 1245148, 0),
(23, 1245149, 0),
(21, 1245150, 0),
(23, 1245151, 0),
(22, 1245152, 0),
(20, 1245153, 0),
(23, 1245154, 0),
(20, 1245155, 0),
(20, 1245156, 0),
(21, 1245157, 0),
(22, 1245158, 0),
(21, 1245159, 0),
(22, 1245160, 0),
(23, 1245161, 0),
(20, 1245162, 0),
(22, 1245163, 0),
(20, 1245164, 0),
(23, 1245165, 0),
(23, 1245166, 0),
(22, 1245167, 0),
(20, 1245168, 0),
(22, 1245169, 0),
(23, 1245170, 0),
(23, 1245171, 0),
(22, 1245172, 0);

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
(1245142, 16, 4, 'sajid96'),
(1245142, 17, 1, 'sajid96'),
(1245142, 18, 3, 'sajid96'),
(1245142, 19, 2, 'sajid96');

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
  ADD KEY `S_id` (`S_id`);

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
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `AT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1245173;

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
