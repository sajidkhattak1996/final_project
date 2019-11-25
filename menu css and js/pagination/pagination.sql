-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2015 at 09:16 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pagination`
--

-- --------------------------------------------------------

--
-- Table structure for table `pagination`
--

CREATE TABLE IF NOT EXISTS `pagination` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `text1` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `pagination`
--

INSERT INTO `pagination` (`id`, `text1`) VALUES
(1, 'test 1'),
(2, 'test 2'),
(3, 'test 3'),
(4, 'test 4'),
(5, 'test 5'),
(6, 'test 6'),
(7, 'test 7'),
(8, 'test 8'),
(9, 'test 9'),
(10, 'test 10'),
(11, 'test 11'),
(12, 'test 12'),
(13, 'test 13'),
(14, 'test 14'),
(15, 'test 15'),
(16, 'test 16'),
(17, 'test 17'),
(18, 'test 18'),
(19, 'test 19'),
(20, 'test 20'),
(21, 'test 21'),
(22, 'test 22'),
(23, 'test 23'),
(24, 'test 24'),
(25, 'test 25'),
(26, 'test 26'),
(27, 'test 27'),
(28, 'test 28'),
(29, 'test 29'),
(30, 'test 30'),
(31, 'test 31'),
(32, 'test 32'),
(33, 'test 33'),
(34, 'test 34'),
(35, 'test 35'),
(36, 'test 36'),
(37, 'test 37'),
(38, 'test 38'),
(39, 'test 39'),
(40, 'test 40'),
(41, 'test 41'),
(42, 'test 42'),
(43, 'test 43'),
(44, 'test 44'),
(45, 'test 45'),
(46, 'test 46'),
(47, 'test 47'),
(48, 'test 48'),
(49, 'test 49'),
(50, 'test 50'),
(51, 'test 51'),
(52, 'test 52'),
(53, 'test 53'),
(54, 'test 54'),
(55, 'test'),
(56, 'test'),
(57, 'test'),
(58, 'test'),
(59, 'test'),
(60, 'test'),
(61, 'test'),
(62, 'test'),
(63, 'test'),
(64, 'test'),
(65, 'test');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
