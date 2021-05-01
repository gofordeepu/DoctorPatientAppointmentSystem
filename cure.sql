-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2021 at 02:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cure`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ApId` int(11) NOT NULL,
  `pemail` varchar(50) NOT NULL,
  `demail` varchar(50) NOT NULL,
  `bookingDate` datetime DEFAULT current_timestamp(),
  `appointmentDate` date NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`ApId`, `pemail`, `demail`, `bookingDate`, `appointmentDate`, `status`) VALUES
(1, 'dipanshu@gmail.com', 'singh.deepu8450@gmail.com', '2021-04-29 13:49:02', '2021-04-30', 4),
(2, 'dipanshu@gmail.com', 'singh.deepu8450@gmail.com', '2021-04-29 13:49:16', '2021-05-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `dname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `dname`) VALUES
(1, 'Howrah'),
(2, 'Jadavpur'),
(3, 'Dhakuriya'),
(4, 'Garia'),
(5, 'Ballygunj');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Did` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Degree` varchar(20) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `District` int(11) DEFAULT NULL,
  `openTime` time NOT NULL,
  `closeTime` time NOT NULL,
  `Password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Did`, `Name`, `Email`, `Mobile`, `Degree`, `Description`, `District`, `openTime`, `closeTime`, `Password`) VALUES
(1, 'DEEPU SINGH', 'singh.deepu8450@gmail.com', '9123699985', 'MBBS', 'Hi i am eye specialist.', 1, '10:30:00', '12:30:00', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Email` varchar(50) NOT NULL,
  `Message` varchar(5000) DEFAULT NULL,
  `MessageDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Email`, `Message`, `MessageDate`) VALUES
('singh.deepu8450@gmail.com', 'Hi this really a nice website i have ever seen thank you.', '2021-04-29 13:52:09');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`pid`, `Email`, `Name`, `Mobile`, `Password`) VALUES
(1, 'dipanshu@gmail.com', 'DIPANSHU SINGH', '9123699984', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `sid` int(11) NOT NULL,
  `appointmentStatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`sid`, `appointmentStatus`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'Cancelled'),
(4, 'Completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ApId`),
  ADD KEY `pemail` (`pemail`),
  ADD KEY `demail` (`demail`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `Did` (`Did`),
  ADD UNIQUE KEY `Mobile` (`Mobile`),
  ADD KEY `District` (`District`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `pid` (`pid`),
  ADD UNIQUE KEY `Mobile` (`Mobile`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ApId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`pemail`) REFERENCES `patients` (`Email`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`demail`) REFERENCES `doctors` (`Email`),
  ADD CONSTRAINT `appointment_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`sid`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`District`) REFERENCES `district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
