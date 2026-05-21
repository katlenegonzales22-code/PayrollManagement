-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 09:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(32, 'BSED Department'),
(24, 'Infotech Department'),
(26, 'Accounting Department'),
(27, 'Indutech Department'),
(28, 'HRM Department'),
(33, 'BTLED Department');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `dob` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `mobile` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `doj` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `designation` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `department` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `grade` varchar(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `dob`, `mobile`, `doj`, `designation`, `department`, `grade`) VALUES
(19, 'Leah Ignacio', '2003-09-16', '0911223344', '2024-01-01', 'Database Developer', '24', '9'),
(22, 'Irene Charisse Tolibas', '2001-09-14', '092345677', '2025-01-01', 'Database Administrative ', '24', '9'),
(23, 'Kindra Dizon', '2003-02-03', '0934567754', '2025-01-01', 'English', '32', '13'),
(24, 'Raniel Fajardo', '2003-04-05', '0923534567', '2025-01-01', 'Networking ', '24', '9');

-- --------------------------------------------------------

--
-- Table structure for table `employeepayment`
--

CREATE TABLE `employeepayment` (
  `id` int(11) NOT NULL,
  `empId` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `salary` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeepayment`
--

INSERT INTO `employeepayment` (`id`, `empId`, `payment_date`, `salary`) VALUES
(61, 19, '2024-01-31', 12500),
(60, 19, '2024-01-15', 12500),
(62, 22, '2025-01-15', 12500),
(63, 22, '2025-01-31', 12500),
(64, 23, '2025-01-15', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` int(11) NOT NULL,
  `grade` varchar(500) CHARACTER SET utf8mb4 NOT NULL,
  `salary` varchar(500) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `grade`, `salary`) VALUES
(9, '2nd Year', '25000'),
(14, '4th Year', '30000'),
(10, '3rd Year', '29000'),
(13, '1st Year', '20000'),
(15, 'Department Head', '50000');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `employeepayment`
--
ALTER TABLE `employeepayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
