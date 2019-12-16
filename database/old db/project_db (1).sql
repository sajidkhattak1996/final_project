-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 10:45 AM
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
(1, 'Histry Of Pakistan', '2019-12-01', 1575736662729999104, 10),
(2, 'c_plus plus', '2019-12-02', 1575736705522788096, 30),
(3, 'abcd', '2019-12-03', 1575736797995985920, 20),
(4, 'abcd2', '2019-12-03', 1575736798000569088, 20),
(5, 'xyz', '2019-12-03', 1575736798008414976, 20),
(6, 'skjladjl', '2019-12-03', 1575736798015621888, 20);

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
(1, 29, 1245142, 17, 5),
(1, 29, 1245142, 19, 4),
(1, 29, 1245142, 18, 4),
(1, 29, 1245142, 16, 1),
(2, 29, 1245142, 17, 20),
(2, 29, 1245142, 19, 25),
(2, 29, 1245142, 18, 15),
(2, 29, 1245142, 16, 10),
(3, 29, 1245142, 17, 10),
(4, 29, 1245142, 19, 8),
(5, 29, 1245142, 18, 6),
(6, 29, 1245142, 16, 15);

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
(1, '0000-00-00', 29, 1245142, 16),
(3, '2019-12-07', 29, 1245142, 17),
(3, '2019-12-07', 29, 1245142, 19),
(3, '2019-12-07', 29, 1245142, 18),
(3, '2019-12-07', 29, 1245142, 16),
(2, '2019-11-01', 29, 1245142, 17),
(1, '2019-11-01', 29, 1245142, 19),
(2, '2019-11-01', 29, 1245142, 18),
(1, '2019-11-01', 29, 1245142, 16),
(1, '2019-11-02', 29, 1245142, 17),
(1, '2019-11-02', 29, 1245142, 19),
(3, '2019-11-02', 29, 1245142, 18),
(1, '2019-11-02', 29, 1245142, 16),
(2, '2019-11-12', 29, 1245142, 17),
(2, '2019-11-12', 29, 1245142, 19),
(1, '2019-11-12', 29, 1245142, 18),
(1, '2019-11-12', 29, 1245142, 16),
(1, '2019-11-22', 29, 1245142, 17),
(3, '2019-11-22', 29, 1245142, 19),
(3, '2019-11-22', 29, 1245142, 18),
(3, '2019-11-22', 29, 1245142, 16),
(1, '2019-11-26', 29, 1245142, 17),
(2, '2019-11-26', 29, 1245142, 19),
(2, '2019-11-26', 29, 1245142, 18),
(1, '2019-11-26', 29, 1245142, 16),
(1, '2019-12-01', 29, 1245142, 17),
(1, '2019-12-01', 29, 1245142, 19),
(1, '2019-12-01', 29, 1245142, 18),
(1, '2019-12-01', 29, 1245142, 16),
(1, '2019-12-02', 29, 1245142, 17),
(1, '2019-12-02', 29, 1245142, 19),
(1, '2019-12-02', 29, 1245142, 18),
(1, '2019-12-02', 29, 1245142, 16),
(1, '2019-11-19', 29, 1245142, 17),
(1, '2019-11-19', 29, 1245142, 19),
(1, '2019-11-19', 29, 1245142, 18),
(1, '2019-11-19', 29, 1245142, 16),
(1, '2019-11-03', 29, 1245142, 17),
(1, '2019-11-03', 29, 1245142, 19),
(2, '2019-11-03', 29, 1245142, 18),
(2, '2019-11-03', 29, 1245142, 16),
(3, '2019-11-20', 29, 1245142, 17),
(1, '2019-11-20', 29, 1245142, 19),
(1, '2019-11-20', 29, 1245142, 18),
(1, '2019-11-20', 29, 1245142, 16),
(1, '2019-12-19', 29, 1245142, 17),
(1, '2019-12-19', 29, 1245142, 19),
(1, '2019-12-19', 29, 1245142, 18),
(1, '2019-12-19', 29, 1245142, 16),
(1, '2019-11-16', 29, 1245142, 17),
(1, '2019-11-16', 29, 1245142, 19),
(1, '2019-11-16', 29, 1245142, 18),
(1, '2019-11-16', 29, 1245142, 16),
(1, '2019-11-28', 29, 1245142, 17),
(1, '2019-11-28', 29, 1245142, 19),
(1, '2019-11-28', 29, 1245142, 18),
(1, '2019-11-28', 29, 1245142, 16),
(1, '2019-12-23', 29, 1245142, 17),
(1, '2019-12-23', 29, 1245142, 19),
(1, '2019-12-23', 29, 1245142, 18),
(1, '2019-12-23', 29, 1245142, 16),
(1, '2019-12-08', 29, 1245142, 17),
(1, '2019-12-08', 29, 1245142, 19),
(1, '2019-12-08', 29, 1245142, 18),
(1, '2019-12-08', 29, 1245142, 16),
(1, '2019-12-09', 29, 1245142, 17),
(2, '2019-12-09', 29, 1245142, 19),
(2, '2019-12-09', 29, 1245142, 18),
(1, '2019-12-09', 29, 1245142, 16),
(1, '2019-12-10', 29, 1245142, 17),
(3, '2019-12-10', 29, 1245142, 19),
(2, '2019-12-10', 29, 1245142, 18),
(1, '2019-12-10', 29, 1245142, 16),
(1, '2019-12-13', 29, 1245142, 17),
(1, '2019-12-13', 29, 1245142, 19),
(1, '2019-12-13', 29, 1245142, 18),
(1, '2019-12-13', 29, 1245142, 16),
(1, '2019-12-28', 29, 1245142, 17),
(2, '2019-12-28', 29, 1245142, 19),
(1, '2019-12-28', 29, 1245142, 18),
(2, '2019-12-28', 29, 1245142, 16),
(3, '2019-12-25', 29, 1245142, 17),
(3, '2019-12-25', 29, 1245142, 19),
(2, '2019-12-25', 29, 1245142, 18),
(1, '2019-12-25', 29, 1245142, 16),
(2, '2019-12-22', 29, 1245142, 17),
(2, '2019-12-22', 29, 1245142, 19),
(2, '2019-12-22', 29, 1245142, 18),
(2, '2019-12-22', 29, 1245142, 16),
(1, '2019-12-24', 29, 1245142, 17),
(1, '2019-12-24', 29, 1245142, 19),
(1, '2019-12-24', 29, 1245142, 18),
(1, '2019-12-24', 29, 1245142, 16),
(1, '2019-12-21', 29, 1245142, 17),
(1, '2019-12-21', 29, 1245142, 19),
(1, '2019-12-21', 29, 1245142, 18),
(1, '2019-12-21', 29, 1245142, 16),
(2, '2019-12-26', 29, 1245142, 17),
(2, '2019-12-26', 29, 1245142, 19),
(2, '2019-12-26', 29, 1245142, 18),
(2, '2019-12-26', 29, 1245142, 16),
(1, '2019-12-27', 29, 1245142, 17),
(1, '2019-12-27', 29, 1245142, 19),
(1, '2019-12-27', 29, 1245142, 18),
(1, '2019-12-27', 29, 1245142, 16),
(1, '2019-12-29', 29, 1245142, 17),
(1, '2019-12-29', 29, 1245142, 19),
(1, '2019-12-29', 29, 1245142, 18),
(1, '2019-12-29', 29, 1245142, 16),
(1, '2019-12-30', 29, 1245142, 17),
(1, '2019-12-30', 29, 1245142, 19),
(1, '2019-12-30', 29, 1245142, 18),
(1, '2019-12-30', 29, 1245142, 16),
(1, '2019-12-31', 29, 1245142, 17),
(1, '2019-12-31', 29, 1245142, 19),
(1, '2019-12-31', 29, 1245142, 18),
(1, '2019-12-31', 29, 1245142, 16),
(1, '2019-12-06', 29, 1245142, 17),
(1, '2019-12-06', 29, 1245142, 19),
(1, '2019-12-06', 29, 1245142, 18),
(1, '2019-12-06', 29, 1245142, 16),
(1, '2019-11-29', 29, 1245142, 17),
(1, '2019-11-29', 29, 1245142, 19),
(1, '2019-11-29', 29, 1245142, 18),
(1, '2019-11-29', 29, 1245142, 16),
(1, '2019-11-18', 29, 1245142, 17),
(1, '2019-11-18', 29, 1245142, 19),
(1, '2019-11-18', 29, 1245142, 18),
(1, '2019-11-18', 29, 1245142, 16),
(1, '2019-10-06', 29, 1245142, 17),
(1, '2019-10-06', 29, 1245142, 19),
(1, '2019-10-06', 29, 1245142, 18),
(1, '2019-10-06', 29, 1245142, 16),
(1, '2019-10-16', 29, 1245142, 17),
(2, '2019-10-16', 29, 1245142, 19),
(2, '2019-10-16', 29, 1245142, 18),
(1, '2019-10-16', 29, 1245142, 16),
(1, '2019-09-18', 29, 1245142, 17),
(1, '2019-09-18', 29, 1245142, 19),
(1, '2019-09-18', 29, 1245142, 18),
(1, '2019-09-18', 29, 1245142, 16);

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
  `p_topic` varchar(80) NOT NULL,
  `p_date` date NOT NULL,
  `p_time` bigint(30) NOT NULL,
  `pt_marks` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `presentation`
--

INSERT INTO `presentation` (`P_id`, `p_topic`, `p_date`, `p_time`, `pt_marks`) VALUES
(1, 'khan', '0000-00-00', 20191204102522, 50),
(2, 'js', '2019-12-03', 20191204103803, 10),
(3, '', '2019-12-04', 20191204113304, 10),
(4, '', '2019-12-04', 20191204113304, 10),
(5, '', '2019-12-04', 20191204113304, 10),
(6, '', '2019-12-04', 20191204113304, 10),
(7, 'ab1', '2019-12-30', 20191204113554, 4),
(8, 'bb2', '2019-12-30', 20191204113554, 4),
(9, 'ccc3', '2019-12-30', 20191204113554, 4),
(10, 'ddd4', '2019-12-30', 20191204113554, 4),
(11, 'abc', '2019-12-10', 20191204113736, 5),
(12, 'abc', '2019-12-10', 20191204113736, 5),
(13, 'abc', '2019-12-10', 20191204113736, 5),
(14, 'abc', '2019-12-10', 20191204113736, 5),
(15, 'Histry of javascript', '2019-12-20', 20191204000000, 100),
(16, 'what is js', '2019-12-20', 20191204000000, 100),
(17, 'type of js', '2019-12-20', 20191204000000, 100),
(18, 'libray of js', '2019-12-20', 20191204000000, 100),
(19, 'Histry of javascript', '2019-12-05', 0, 3),
(20, 'what is js', '2019-12-05', 0, 3),
(21, 'type of js', '2019-12-05', 0, 3),
(22, 'libray of js', '2019-12-05', 0, 3),
(23, 'Histry of javascript', '2019-12-06', 0, 5),
(24, 'what is js', '2019-12-06', 0, 5),
(25, 'type of js', '2019-12-06', 0, 5),
(26, 'libray of js', '2019-12-06', 0, 5),
(27, 'Histry of javascript', '2019-12-06', 0, 5),
(28, 'what is js', '2019-12-06', 0, 5),
(29, 'type of js', '2019-12-06', 0, 5),
(30, 'libray of js', '2019-12-06', 0, 5),
(31, 'Histry of javascript', '2019-12-04', 0, 5),
(32, 'what is js', '2019-12-04', 0, 5),
(33, 'type of js', '2019-12-04', 0, 5),
(34, 'libray of js', '2019-12-04', 0, 5),
(35, 'ab1', '2019-12-04', 0, 2),
(36, 'bb2', '2019-12-04', 0, 2),
(37, 'type of js', '2019-12-04', 0, 2),
(38, 'ddd4', '2019-12-04', 0, 2),
(39, 'Histry of javascript', '2019-12-25', 1575454429706729984, 6),
(40, 'what is js', '2019-12-25', 1575454429712953088, 6),
(41, 'type of js', '2019-12-25', 1575454429717863936, 6),
(42, 'libray of js', '2019-12-25', 1575454429723105792, 6),
(43, 'khan', '2019-12-05', 1575455194932945920, 10),
(44, 'khan', '2019-12-05', 1575461587341075968, 10),
(45, 'Histry of javascript', '2019-12-05', 1575463956293894144, 10),
(46, 'what is js', '2019-12-05', 1575463956298487808, 10),
(47, 'ccc3', '2019-12-05', 1575463956302454016, 10),
(48, 'libray of js', '2019-12-05', 1575463956306482944, 10),
(49, 'ab22', '2019-12-12', 1575467093743244032, 36),
(50, 'bb2', '2019-12-12', 1575467093749277184, 36),
(51, 'type of js', '2019-12-12', 1575467093752954880, 36),
(52, 'ddd4', '2019-12-12', 1575467093761556992, 36),
(53, 'Histry of Javascript', '2019-12-08', 1575775543622888960, 100),
(54, 'histry of urdu', '2020-01-01', 1575775731946388992, 100);

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
(2, 29, 1245142, 17, 7),
(2, 29, 1245142, 19, 8),
(2, 29, 1245142, 18, 7),
(2, 29, 1245142, 16, 2),
(3, 29, 1245142, 17, 8),
(3, 29, 1245142, 19, 5),
(3, 29, 1245142, 18, 7),
(3, 29, 1245142, 16, 6),
(7, 29, 1245142, 17, 3),
(8, 29, 1245142, 19, 3),
(9, 29, 1245142, 18, 1),
(10, 29, 1245142, 16, 0),
(11, 29, 1245142, 17, 2),
(11, 29, 1245142, 19, 2),
(11, 29, 1245142, 18, 2),
(11, 29, 1245142, 16, 2),
(15, 29, 1245142, 17, 50),
(16, 29, 1245142, 19, 60),
(17, 29, 1245142, 18, 100),
(18, 29, 1245142, 16, 100),
(19, 29, 1245142, 17, 2),
(20, 29, 1245142, 19, 2),
(21, 29, 1245142, 18, 2),
(22, 29, 1245142, 16, 0),
(23, 29, 1245142, 17, 1),
(24, 29, 1245142, 19, 3),
(25, 29, 1245142, 18, 2),
(26, 29, 1245142, 16, 3),
(23, 29, 1245142, 17, 1),
(24, 29, 1245142, 19, 3),
(25, 29, 1245142, 18, 2),
(26, 29, 1245142, 16, 3),
(31, 29, 1245142, 17, 0),
(32, 29, 1245142, 19, 2),
(33, 29, 1245142, 18, 2),
(34, 29, 1245142, 16, 3),
(35, 29, 1245142, 17, 2),
(36, 29, 1245142, 19, 3),
(37, 29, 1245142, 18, 4),
(38, 29, 1245142, 16, 4),
(39, 29, 1245142, 17, 2),
(40, 29, 1245142, 19, 2),
(41, 29, 1245142, 18, 2),
(42, 29, 1245142, 16, 6),
(43, 29, 1245142, 17, 6),
(43, 29, 1245142, 19, 7),
(43, 29, 1245142, 18, 0),
(43, 29, 1245142, 16, 3),
(44, 29, 1245142, 17, 6),
(44, 29, 1245142, 19, 7),
(44, 29, 1245142, 18, 0),
(44, 29, 1245142, 16, 3),
(45, 29, 1245142, 17, 7),
(46, 29, 1245142, 19, 7),
(47, 29, 1245142, 18, 6),
(48, 29, 1245142, 16, 7),
(49, 29, 1245142, 17, 12),
(50, 29, 1245142, 19, 10),
(51, 29, 1245142, 18, 0),
(52, 29, 1245142, 16, 9),
(53, 29, 1245142, 17, 40),
(53, 29, 1245142, 19, 50),
(53, 29, 1245142, 18, 80),
(53, 29, 1245142, 16, 90),
(54, 29, 1245142, 17, 60),
(54, 29, 1245142, 19, 50),
(54, 29, 1245142, 18, 80),
(54, 29, 1245142, 16, 65);

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
(1, 'janna', '0000-00-00', 2645123564321, 50),
(2, 'Histry Of JavaScript', '2019-12-04', 1575462510805417984, 10),
(3, 'Histry Of JavaScript', '2019-12-04', 1575463318812143104, 10),
(4, 'jksf', '2019-12-05', 0, 6),
(5, 'javascript histry', '2019-12-05', 0, 6),
(6, 'angular', '2019-12-05', 0, 6),
(7, 'pakistan histry', '2019-12-05', 0, 6),
(8, 'jksf', '2019-12-11', 1575465274844037888, 5),
(9, 'javascript histry', '2019-12-11', 1575465274848412160, 5),
(10, 'angular', '2019-12-11', 1575465274855072000, 5),
(11, 'pakistan histry', '2019-12-11', 1575465274858913024, 5);

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
(2, 29, 1245142, 17, 8),
(2, 29, 1245142, 19, 8),
(2, 29, 1245142, 18, 5),
(2, 29, 1245142, 16, 4),
(3, 29, 1245142, 17, 7),
(3, 29, 1245142, 19, 4),
(3, 29, 1245142, 18, 7),
(3, 29, 1245142, 16, 6),
(4, 29, 1245142, 17, 6),
(5, 29, 1245142, 19, 2),
(6, 29, 1245142, 18, 2),
(7, 29, 1245142, 16, 0),
(8, 29, 1245142, 17, 9),
(9, 29, 1245142, 19, 8),
(10, 29, 1245142, 18, 7),
(11, 29, 1245142, 16, 9);

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
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `P_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `quize`
--
ALTER TABLE `quize`
  MODIFY `Q_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
