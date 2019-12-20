-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 03:37 AM
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

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`A_id`, `a_name`, `a_date`, `a_time`, `at_marks`) VALUES
(10, 'Histry of JavaScript', '2019-12-01', 1576125457525280000, 50),
(11, 'Histry Of Pakistan', '2019-12-01', 1576126499819802880, 20),
(12, 'Histry of JavaScript', '2019-12-02', 1576126556499183872, 15),
(13, 'Histry Of Buneer', '2019-12-12', 1576139685437662976, 10),
(15, 'histry of pakistan', '2019-12-03', 1576157599016790016, 20),
(16, 'javascript', '2019-12-07', 1576157670113368064, 50),
(17, 'Histry Of Pakistan', '2019-12-01', 1576214608628145920, 50);

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
(10, 22, 1212, 1, 39),
(11, 33, 1214, 1, 15),
(12, 33, 1214, 1, 12),
(13, 33, 1214, 1, 5),
(15, 1, 1219, 1, 15),
(16, 1, 1219, 1, 45),
(17, 34, 1221, 15, 45),
(17, 34, 1221, 16, 20);

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
(1, '2019-12-01', 29, 1212, 1),
(2, '2019-12-02', 29, 1212, 1),
(3, '2019-12-03', 29, 1212, 1),
(1, '2019-12-03', 33, 1214, 1),
(1, '2019-12-04', 33, 1214, 1),
(3, '2019-12-05', 33, 1214, 1),
(2, '2019-12-06', 33, 1214, 1),
(1, '2019-12-07', 33, 1214, 1),
(1, '2019-12-08', 33, 1214, 1),
(1, '2019-12-02', 22, 1215, 1),
(1, '2019-12-03', 22, 1215, 1),
(2, '2019-12-02', 13, 1213, 1),
(3, '2019-12-07', 13, 1213, 1),
(3, '2019-12-18', 13, 1213, 1),
(3, '2019-12-03', 1, 1219, 1),
(2, '2019-12-05', 1, 1219, 1),
(1, '2019-12-06', 1, 1219, 1),
(1, '2019-12-01', 34, 1221, 15),
(1, '2019-12-01', 34, 1221, 16),
(1, '2019-12-02', 34, 1221, 15),
(1, '2019-12-02', 34, 1221, 16),
(1, '2019-12-03', 34, 1221, 15),
(2, '2019-12-03', 34, 1221, 16),
(2, '2019-12-04', 34, 1221, 15),
(2, '2019-12-04', 34, 1221, 16),
(2, '2019-12-05', 34, 1221, 15),
(2, '2019-12-05', 34, 1221, 16);

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
(1212, 'msc_final', 'cs-2019', '2019-2020', '2019-12-11', '06:00:59', '2019-12-12', 1),
(1213, 'msc_final-18', 'sajid96', '2017-2019', '2019-12-11', '06:04:38', '2019-12-13', 1),
(1214, 'msc_final', 'msc007', '2019', '2019-12-11', '09:56:38', '2019-12-12', 1),
(1215, 'msc_previous', 'sajid96', '2019-2020`', '2019-12-11', '10:03:53', '2019-12-13', 1),
(1219, 'msc_previous', 'sajid1996', '2019-2020', '2019-12-12', '06:17:41', '2019-12-18', 1),
(1221, 'phd_part1', 'phd19', '2019-2019', '2019-12-13', '07:27:12', '2019-12-18', 1);

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
(13, 1213, 1),
(29, 1212, 1),
(29, 1212, 1),
(33, 1214, 1),
(33, 1214, 1),
(22, 1215, 1),
(1, 1219, 1),
(1, 1219, 0),
(1, 1219, 8),
(1, 1219, 9),
(1, 1219, 10),
(1, 1219, 11),
(1, 1219, 12),
(1, 1219, 13),
(1, 1219, 14),
(34, 1221, 15),
(34, 1221, 16);

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

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`P_id`, `p_topic`, `p_date`, `p_time`, `pt_marks`) VALUES
(1, 'histry of urdu', '2019-12-01', 1576125474356705792, 10),
(2, 'intruduction to computer', '2019-12-01', 1576126682579947008, 15),
(4, 'pakistan histry', '2019-12-03', 1576157740779985920, 10);

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

--
-- Dumping data for table `presentation_record`
--

INSERT INTO `presentation_record` (`P_id`, `Subject_id`, `Class_id`, `S_id`, `po_marks`) VALUES
(1, 22, 1212, 1, 7),
(2, 33, 1214, 1, 12),
(4, 1, 1219, 1, 8);

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

--
-- Dumping data for table `quize`
--

INSERT INTO `quize` (`Q_id`, `q_topic`, `q_date`, `q_time`, `qt_marks`) VALUES
(1, 'Histry Of JavaScript', '2019-12-01', 1576125493856289024, 20),
(2, 'Histry Of JavaScript', '2019-12-04', 1576126728111136000, 10),
(4, 'histry of google', '2019-12-05', 1576157771105808128, 30);

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

--
-- Dumping data for table `quiz_record`
--

INSERT INTO `quiz_record` (`Q_id`, `Subject_id`, `Class_id`, `S_id`, `qo_marks`) VALUES
(1, 22, 1212, 1, 15),
(2, 33, 1214, 1, 8),
(4, 1, 1219, 1, 15);

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
(0, 0, 0, 'cs-2019'),
(1212, 1, 1, 'cs-2019'),
(1212, 29, 0, 'cs-2019'),
(1213, 1, 1, 'sajid96'),
(1214, 1, 1, 'msc007'),
(1214, 33, 0, 'msc007'),
(1215, 1, 0, 'sajid96'),
(1219, 0, 0, 'sajid1996'),
(1219, 1, 1, 'sajid1996'),
(1219, 8, 0, 'sajid1996'),
(1219, 9, 0, 'sajid1996'),
(1219, 10, 0, 'sajid1996'),
(1219, 11, 0, 'sajid1996'),
(1219, 12, 0, 'sajid1996'),
(1219, 13, 20, 'sajid1996'),
(1219, 14, 21, 'sajid1996'),
(1221, 15, 5, 'phd19'),
(1221, 16, 10, 'phd19');

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
(42, 'owais', '2019-12-15', 'assigment about cheating.rtf', 1219),
(44, 'sajid', '2019-12-15', 'Ghani Khan  Pashto Poet.docx', 1219),
(45, 'presentationn', '2019-12-15', '2013-04-09 19.27.52.jpg', 1219),
(46, 'lecc', '2019-12-15', 'Lecture2.pdf', 1219),
(47, 'doc', '2019-12-15', 'COMPUTER CODING SYSTEMS.docx', 1219),
(48, 'faisla', '2019-12-15', 'fisal ppp1.pptx', 1219),
(49, 'Mac Operating System', '2019-12-15', 'Mac System Software.docx', 1221);

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
(1, 'habib afghani', 'habib@gmail.com', 'asdfghjkl'),
(2, 'kashif ktk', 'kashif@gmail.com', 'qwertyuiop'),
(3, 'ihsan khan', 'ihsan@gmail.com', 'zxcvbnm,./'),
(4, 'irfan ktk khan', 'irfan@gmail.com', 'zxcvbnm,'),
(5, 'sajjad khan', 'sajid@gmail.com', 'qwertyuiop'),
(6, 'sajjad khan', 'sajjad@gmail.com', 'qwertyuiop'),
(7, 'Hamid hasrat', 'hamid@gmail.com', 'hamid@gmail'),
(8, 'Hazrat Bilal', 'hazratbilal@gmail.com', 'asdfghjkl'),
(9, 'Faheem ktk', 'faheem@gmail.com', 'faheem@gmail'),
(10, 'Farman ktk', 'farman@gmail.com', '1234567890'),
(11, 'Farman ali', 'farmanali@gmail.com', '1234567890'),
(12, 'Sajid ali', 'gulzar@gmail.com', '1234567890'),
(13, 'Haris khan', 'haris@gmail.com', '1234567890'),
(14, 'Haris khan', 'harisali@gmail.com', '1234567890'),
(15, 'Zohaib faisal', 'zohaib@gmail.com', '12345678'),
(16, 'Nasir iqbal', 'nasir@gmail.com', '12345678');

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
(29, 'javascript'),
(30, 'english1'),
(31, 'statictisc'),
(32, 'computer'),
(33, 'intruduction to computer'),
(34, 'Communication & Network');

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
(2, 'amair', 12345678996, '12345678902345', 'amar school and college', 'pakistan', 'karak_kpk', 'amair@gmail.com', 'amair12345'),
(3, 'ihsan', 1234567891, '12345678901234', 'university College ', 'pakistaniii', 'peshawar', 'ihsan@gmail.com', 'qwertyuiop');

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
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `AT_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `Class_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1223;

--
-- AUTO_INCREMENT for table `presentation`
--
ALTER TABLE `presentation`
  MODIFY `P_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quize`
--
ALTER TABLE `quize`
  MODIFY `Q_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `S_id` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `Subject_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `T_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
