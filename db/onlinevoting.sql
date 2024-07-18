-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 06:20 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinevoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidateid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `admno` varchar(30) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '1',
  `symbol` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidateid`, `cid`, `admno`, `status`, `symbol`) VALUES
(24, 5, '124', '1', NULL),
(23, 5, '123', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `compidt` int(30) NOT NULL,
  `title` varchar(50) NOT NULL,
  `dis` varchar(500) NOT NULL,
  `priority` varchar(30) NOT NULL,
  `reply` varchar(10) NOT NULL,
  `date` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `cid` int(30) NOT NULL,
  `cname` varchar(30) NOT NULL,
  `desig` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `stime` varchar(20) NOT NULL,
  `etime` varchar(30) NOT NULL,
  `ins` varchar(5000) NOT NULL,
  `status` int(30) NOT NULL DEFAULT 1,
  `pstatus` varchar(1) DEFAULT '0',
  `result_status` varchar(30) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`cid`, `cname`, `desig`, `date`, `stime`, `etime`, `ins`, `status`, `pstatus`, `result_status`) VALUES
(5, 'Class Leader for s6', 'Class Leader', '2024-04-27', '9', '12', 'read instructions', 2, '0', '1'),
(6, 'test', 'test', '2024-04-30', '9', '12', 'test instructions', 1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `electoralroll`
--

CREATE TABLE `electoralroll` (
  `er_id` int(11) NOT NULL,
  `admno` varchar(10) NOT NULL,
  `cid` int(11) NOT NULL,
  `candidateid` int(11) DEFAULT 0,
  `votingtime` time(5) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `electoralroll`
--

INSERT INTO `electoralroll` (`er_id`, `admno`, `cid`, `candidateid`, `votingtime`, `status`) VALUES
(59, '126', 5, 24, NULL, '3'),
(58, '125', 5, 0, NULL, '1'),
(57, '124', 5, 23, NULL, '3'),
(56, '123', 5, 23, NULL, '3');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(50) NOT NULL,
  `status` varchar(2) NOT NULL,
  `usertype` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `status`, `usertype`, `password`) VALUES
('admin@gmail.com', '1', '0', 'admin123'),
('testuser1@gmail.com', '1', '1', 'Test@123'),
('testuser2@gmail.com', '1', '1', 'Test@123'),
('testuser3@gmail.com', '1', '1', 'Test@123'),
('testuser4@gmail.com', '1', '1', 'Test@123');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phn` varchar(30) NOT NULL,
  `admno` int(20) NOT NULL,
  `course` varchar(10) NOT NULL,
  `sem` int(20) NOT NULL,
  `roll_no` int(50) NOT NULL,
  `img` varchar(100) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`full_name`, `email`, `phn`, `admno`, `course`, `sem`, `roll_no`, `img`) VALUES
('Test User1', 'testuser1@gmail.com', '7994245510', 123, 'BCA', 6, 1, '123.png'),
('Test User2', 'testuser2@gmail.com', '7994245510', 124, 'BCA', 6, 2, 'default.png'),
('Test User3', 'testuser3@gmail.com', '7994245510', 125, 'BCA', 6, 3, 'default.png'),
('Test User4', 'testuser4@gmail.com', '7994245510', 126, 'BCA', 6, 4, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `id` int(11) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`id`, `time`) VALUES
(1, '00:00'),
(2, '01:00'),
(3, '02:00'),
(4, '03:00'),
(5, '04:00'),
(6, '06:00'),
(7, '07:00'),
(8, '08:00'),
(9, '09:00'),
(10, '10:00'),
(11, '11:00'),
(12, '12:00'),
(13, '13:00'),
(14, '14:00'),
(15, '15:00'),
(16, '16:00'),
(17, '17:00'),
(18, '18:00'),
(19, '19:00'),
(20, '20:00'),
(21, '21:00'),
(22, '22:00'),
(23, '23:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidateid`),
  ADD UNIQUE KEY `symbol` (`symbol`);

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`compidt`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `electoralroll`
--
ALTER TABLE `electoralroll`
  ADD PRIMARY KEY (`er_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `admno` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `compidt` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `cid` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `electoralroll`
--
ALTER TABLE `electoralroll`
  MODIFY `er_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
