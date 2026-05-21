-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 08:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(112) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'muskan', '123456');
-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(112) NOT NULL,
  `name` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(2, 'IT Support'),
(3, 'HR'),
(5, 'Retail'),
(6, 'Marketing'),
(8, 'Production'),
(9, 'Networking'),
(10, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(112) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `doj` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `fname`, `mname`, `dob`, `mobile`, `doj`, `designation`, `department`, `grade`) VALUES
(17, 'Sita', 'Ram', 'Nancy', '1996-06-08', '9112200044', '2019-12-04', 'Engineer', '9', '6'),
(15, 'Muskan ', 'Dhananjay ', 'Rekha', '2000-08-05', '9093614628', '2018-03-03', 'Purchasing Manager', '5', '5'),
(10, 'Pihu', 'Rohan', 'Radha', '2003-08-05', '1234567890', '2020-09-09', 'Executive', '3', '2'),
(12, 'Ridhi', 'Rahul', 'Kajal', '2003-12-03', '1234567654', '2020-09-07', 'Engineer', '2', '2'),
(14, 'Sonal', 'Amit ', 'Renu', '1999-09-17', '9905338904', '2021-01-01', 'Marketing Manager', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `employeepayment`
--

CREATE TABLE `employeepayment` (
  `id` int(112) NOT NULL,
  `empId` int(112) NOT NULL,
  `month` varchar(112) NOT NULL,
  `salary` int(112) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeepayment`
--

INSERT INTO `employeepayment` (`id`, `empId`, `month`, `salary`) VALUES
(23, 12, 'July', 4000),
(24, 14, 'July', 4000),
(25, 17, '', 100),
(26, 17, 'May', 120),
(22, 10, 'July', 4000),
(21, 15, 'July', 4000),
(20, 17, 'July', 4000),
(18, 10, 'November', 6000),
(19, 12, 'November', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(112) NOT NULL,
  `grade` varchar(500) NOT NULL,
  `salary` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade`, `salary`) VALUES
(2, 'Class 1', '1000'),
(5, 'class 2', '750'),
(7, 'class 3', '500'),
(6, 'class 4', '250');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(112) NOT NULL,
  `month` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `month`, `amount`) VALUES
(2, 'December', 2000),
(3, 'October', 2000),
(4, 'December', 2000),
(5, 'August', 2000),
(6, 'August', 2000),
(7, 'August', 2000),
(8, 'October', 2000),
(9, 'October', 2000),
(10, 'October', 2000),
(11, 'September', 2000),
(12, 'August', 1001),
(13, 'September', 3000),
(14, 'November', 6000),
(15, 'July', 4000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeepayment`
--
ALTER TABLE `employeepayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employeepayment`
--
ALTER TABLE `employeepayment`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(112) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
