-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2019 at 08:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `name` varchar(50) NOT NULL,
  `ID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`name`, `ID`) VALUES
('Amazon', '4891'),
('TCS', '7725'),
('Facebook', '7783');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `aadhar` text NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `resume` text NOT NULL,
  `certificate` text NOT NULL,
  `presentComany` varchar(50) DEFAULT NULL,
  `previousCompany` varchar(50) DEFAULT NULL,
  `presentComanyId` varchar(20) DEFAULT NULL,
  `previousCompanyId` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `ID` varchar(20) NOT NULL,
  `name` text NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `companyID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`ID`, `name`, `companyName`, `companyID`, `password`, `mobile`, `email`) VALUES
('Ama909', 'john', 'Amazon', '4891', 'john', 9090931303, 'rohanabk123@hotmail.com'),
('Fac701', 'Mark', 'Facebook', '7783', 'mark', 7019464379, 'mark@gmail.com'),
('TCS701', 'Clay', 'TCS', '7725', 'clay', 7019464379, 'clay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `EID` varchar(50) NOT NULL,
  `presentCompanyID` varchar(50) NOT NULL,
  `appliedID` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `EID`, `presentCompanyID`, `appliedID`, `status`) VALUES
(14, 'Dem749', '4891', '7783', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
