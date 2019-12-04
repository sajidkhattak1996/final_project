-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 04:50 PM
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
(1, 'java', '2019-12-03', 0, 10),
(2, 'java', '2019-12-03', 101946, 5),
(3, 'c_plus plus', '2019-12-04', 105916, 100),
(4, 'Histry Of Pakistan', '2019-12-05', 110556, 10),
(5, 'Histry Of Islam', '2019-12-11', 110813, 100),
(6, 'Histry of JavaScript', '2019-12-11', 110958, 30),
(7, 'Histry Of Buneer', '2019-12-19', 111228, 10),
(8, 'Introducation to Computer', '2019-12-12', 111346, 15),
(9, 'java Histry', '2019-12-03', 111730, 10),
(10, 'Frame works of java script', '2019-12-04', 111908, 20),
(11, 'Histry of Urdu', '2019-12-04', 112158, 3),
(12, 'type of variables in javascript', '2019-12-19', 112518, 10),
(13, 'angular js', '2019-12-04', 112822, 30),
(14, 'angular js histroy', '2019-12-19', 112934, 30),
(15, 'Histroy of www', '2019-12-18', 113233, 40),
(16, 'al', '2019-12-03', 115732, 9),
(17, 'javascript Library', '2019-12-05', 71914, 50),
(18, 'Histry Of Pakistan', '2019-12-05', 1575466007966228992, 21),
(19, 'c_plus plus', '2019-12-11', 1575466228383336192, 28),
(20, 'ab11', '2019-12-05', 1575467146416090880, 21),
(21, 'abbbbbb22', '2019-12-05', 1575467146421181952, 21),
(22, 'acccccc444', '2019-12-05', 1575467146429097984, 21),
(23, 'skjladjl', '2019-12-05', 1575467146433789952, 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`A_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `A_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
