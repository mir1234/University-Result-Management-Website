-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2015 at 05:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `neubresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'neub', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `credit` float NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_title`, `course_code`, `credit`, `dept_id`, `status`) VALUES
(7, 'Fundamentals of Computers', 'CSE-111', 3, '1', 'active'),
(8, 'Structured Programming Language', 'CSE-113', 3, '1', 'active'),
(9, 'Structured Programming Language Lab', 'CSE-114', 1.5, '1', 'active'),
(10, 'Calculus', 'MAT-101', 3, '1', 'active'),
(11, 'Bangladesh Studies', 'GED-101', 3, '1', 'active'),
(12, 'Basic Electrical Engineering', 'CSE-121', 3, '1', 'active'),
(13, 'Basic Electrical Engineering Lab', 'CSE-122', 1.5, '1', 'active'),
(14, 'Discrete Mathematics', 'CSE-123', 3, '1', 'active'),
(15, 'Fundamentals of Chemistry', 'CHE-101', 3, '1', 'active'),
(16, 'Mechanics, Wave, Heat & Thermodynamics', 'PHY-101', 3, '1', 'active'),
(17, 'Data Structure', 'CSE-131', 3, '1', 'active'),
(18, 'Data Structure Lab', 'CSE-132', 1.5, '1', 'active'),
(19, 'Matrices, Vector Analysis and Geometry', 'MAT-103', 3, '1', 'active'),
(20, 'Electromagnetism and Optics', 'PHY-103', 3, '1', 'active'),
(21, 'English Language', 'ENG-101', 3, '1', 'active'),
(22, 'Object Oriented Programming Language', 'CSE-211', 3, '1', 'active'),
(23, 'Object Oriented Programming Language Lab', 'CSE-212', 1.5, '1', 'active'),
(24, 'Electronic Devices and Circuits', 'CSE-213', 3, '1', 'active'),
(25, 'Electronic Devices and Circuits Lab', 'CSE-214', 1.5, '1', 'active'),
(26, 'Engineering Drawings', 'CSE-216', 2, '1', 'active'),
(27, 'Basic Statistics & Probability', 'STA-201', 3, '1', 'active'),
(28, 'Digital Logic Design', 'CSE-221', 3, '1', 'active'),
(29, 'Digital Logic Design Lab', 'CSE-222', 1.5, '1', 'active'),
(30, 'Project Work I', 'CSE-200', 2, '1', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`id`, `title`, `status`) VALUES
(1, 'CSE', 'active'),
(2, 'BBA', 'active'),
(3, 'EEE', 'active'),
(5, 'LAW', 'active'),
(6, 'MAT', 'active'),
(12, 'SSW', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `t_id` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `post_time` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `t_id`, `topic`, `semester`, `year`, `dept_id`, `course_code`, `post_time`, `status`) VALUES
(5, '1', 'Fundamental of Computer result published', 'summer', '2014', '1', 'CSE-111', '2015-08-27 18:10:10', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE IF NOT EXISTS `result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` varchar(255) NOT NULL,
  `t_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `grade` enum('A+','A','A-','B+','B','B-','C+','C','D','F') NOT NULL,
  `cgpa` float NOT NULL,
  `semester` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `course_status` enum('retake-for-improve','retake-for-pass','newly-taken') NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `s_id`, `t_id`, `course_id`, `dept_id`, `marks`, `grade`, `cgpa`, `semester`, `year`, `course_status`, `status`) VALUES
(10, '140203020004', '1', 'CSE-111', '1', '56', 'B-', 2.75, 'summer', '2014', 'newly-taken', 'active'),
(17, '140203020002', '1', 'CSE-111', '1', '83', 'A+', 4, 'summer', '2014', 'newly-taken', 'active'),
(21, '140203020005', '1', 'CSE-111', '1', '72', 'A-', 3.5, 'summer', '2014', 'newly-taken', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `s_id` varchar(255) NOT NULL,
  `admission_semester` enum('spring','summer','fall') NOT NULL,
  `admission_year` year(4) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `blood_group` enum('A (+ve)','A (-ve)','B (+ve)','B (-ve)','O (+ve)','O (-ve)','AB (+ve)','AB (-ve)','') NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `f_name`, `m_name`, `contact`, `email`, `address`, `s_id`, `admission_semester`, `admission_year`, `status`, `picture`, `blood_group`, `dept_id`) VALUES
(1, 'Mir Lutfur Rahman', 'Mir Abdul Latif', 'Beauty Begum', '+8801739213886', 'mirlutfur.rahman@gmail.com', '9-Paharika, North Peer Mohollah, Sylhet-3100.', '140203020002', 'summer', 2014, 'active', '144053145214405314523331.jpg', 'A (+ve)', '1'),
(4, 'Pranta Sarker', 'P_father', 'P_mother', '+880', 'p@gmail.com', 'Subidbazar', '140203020004', 'summer', 2014, 'active', '', 'O (+ve)', '1'),
(5, 'Topu Dash Roy', 'T_father', 'T_mother', '+880', 'tdr@gmail.com', 'Bisswanath.', '140203020005', 'summer', 2014, 'active', '', 'A (+ve)', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `dept_id` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `contact`, `username`, `password`, `picture`, `dept_id`, `status`) VALUES
(1, 'MD. Mamun Hossain', 'mdhossain@gmail.com', '+8801712345678', 'm', '1234', '14381935751438193575333.gif', '1', 'active'),
(9, 'Al Mehdi Saadat Chowdhury', 'saadat_cse@gmail.com', '+8801712345678', 'a', '38951', '144058989814405898985314.jpg', '1', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
