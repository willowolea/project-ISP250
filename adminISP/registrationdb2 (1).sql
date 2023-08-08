-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2023 at 10:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrationdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `companyName` varchar(50) NOT NULL,
  `companyAddress` varchar(150) NOT NULL,
  `companyPhone` varchar(15) NOT NULL,
  `companyEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyName`, `companyAddress`, `companyPhone`, `companyEmail`) VALUES
('FREEWILL AUTO SDN BHD', 'Km 13, Jalan Kota Bharu ke Pasir Puteh, Kota Bharu, Malaysia', '03-45698712', 'freewillauto@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` varchar(30) NOT NULL,
  `courseName` varchar(30) NOT NULL,
  `coursePrice` float NOT NULL,
  `courseBio` varchar(500) NOT NULL,
  `courseCredit` int(10) NOT NULL,
  `coursePeriod` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `courseName`, `coursePrice`, `courseBio`, `courseCredit`, `coursePeriod`) VALUES
('AU85', 'AUTOMOTIVE 1', 550, 'Learning the basics of automotive', 3, 6),
('AU87', 'AUTO 9', 990, 'Introduction to Car Spare Parts', 3, 5),
('AU88', 'AUTOMOTIVE 2', 488, 'Continuity to Automotive 1. Learning the job scopes of every job', 3, 5),
('B45', 'BUSINESS', 550, 'Fundamentals of Business Management', 2, 7),
('E4', 'Entrepreneurship ', 600, 'Fundamentals of Entrepreneurship', 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `studID` varchar(30) NOT NULL,
  `InvID` int(255) NOT NULL,
  `invDate` date DEFAULT NULL,
  `invTime` time DEFAULT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `courseID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`studID`, `InvID`, `invDate`, `invTime`, `amount`, `courseID`) VALUES
('padil', 3, '2023-07-14', '11:04:07', 605.00, 'AU85'),
('padil', 4, '2023-07-14', '11:04:24', 605.00, 'AU85'),
('padil', 5, '2023-07-14', '16:32:34', 660.00, 'E4'),
('padil', 6, '2023-07-14', '20:26:04', 1089.00, 'AU87'),
('padil', 7, '2023-07-14', '20:28:22', 605.00, 'AU85');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentID` int(255) NOT NULL,
  `studID` varchar(30) NOT NULL,
  `cardHolder` varchar(300) NOT NULL,
  `monthYear` varchar(30) NOT NULL,
  `cardNumber` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentID`, `studID`, `cardHolder`, `monthYear`, `cardNumber`) VALUES
(2, 'padil', 'Fadhil', '09/26', '009867895432'),
(3, 'nisnis', '0', '0', '0'),
(4, 'hehe', '0', '0', '0'),
(5, 'dol', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registrationID` int(255) NOT NULL,
  `timeSet` time(6) NOT NULL,
  `dateIn` date NOT NULL,
  `dateOut` date NOT NULL,
  `studID` varchar(30) NOT NULL,
  `courseID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registrationID`, `timeSet`, `dateIn`, `dateOut`, `studID`, `courseID`) VALUES
(1, '22:19:28.000000', '2023-07-13', '2024-01-13', 'nisnis', 'AU88'),
(2, '04:22:10.000000', '2023-07-14', '2024-01-14', 'hehe', 'AU85'),
(3, '10:32:24.000000', '2023-07-14', '2024-01-14', 'padil', 'E4'),
(4, '10:49:38.000000', '2023-07-14', '2024-01-14', 'padil', 'AU87'),
(5, '14:27:39.000000', '2023-07-14', '2024-01-14', 'padil', 'AU85');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` varchar(30) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `staffIC` varchar(20) NOT NULL,
  `staffPhone` varchar(15) NOT NULL,
  `staffPass` varchar(30) NOT NULL,
  `staffEmail` varchar(30) NOT NULL,
  `staffJob` varchar(20) NOT NULL,
  `staffSalary` varchar(10) NOT NULL,
  `staffAddress` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `staffName`, `staffIC`, `staffPhone`, `staffPass`, `staffEmail`, `staffJob`, `staffSalary`, `staffAddress`) VALUES
('abdul', 'Abdul Rahim', '980908-09-9089', '019-98765432', 'abd', 'abd@gmail.com', 'Mechanic', '3200', 'Sebereang Pulai'),
('adech', 'ADENAN CHE WEEL', '012354-03-8977', '011-1265478', 'Adech477', 'adech@gmail.com', 'DIRECTING MANAGER', '5000.00', '5, Taman Ria'),
('saba', 'SABARUDIN AHMAD', '870414-03-5007', '012-3456789', 'sab', 'sabsab@gmail.com', 'trainer', '4000', 'kota bharu,kelantan'),
('tini', 'tantantini', '950807-03-0622', '018-098765', 'tintin', 'tini@gmail.com', 'admin clerk', '3000', 'kuala lumpur');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` int(5) NOT NULL,
  `statusCond` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `statusCond`) VALUES
(0, 'Unregistered'),
(1, 'Registered');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` varchar(30) NOT NULL,
  `studName` varchar(50) NOT NULL,
  `studIC` varchar(20) NOT NULL,
  `studPhone` varchar(15) NOT NULL,
  `studPass` varchar(20) NOT NULL,
  `studEmail` varchar(30) NOT NULL,
  `studAddress` varchar(300) NOT NULL,
  `statusID` int(5) NOT NULL,
  `registrationID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studName`, `studIC`, `studPhone`, `studPass`, `studEmail`, `studAddress`, `statusID`, `registrationID`) VALUES
('dol', '', '', '123456789', '123', 'dol@gmail.com', '', 0, ''),
('hehe', '', '', '1234567890', '123', 'hehe@gmail.com', '', 1, 'AU85'),
('nisnis', '', '', '23456789', '123', 'anis@gmail.com', '', 1, 'AU88'),
('padil', 'Muhammad Fadhil bin Rosli', '030210-10-1537', '0197091728', '123', 'padil@gmail.com', '31 Lorong seri tanjung 4C', 1, 'AU85');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyName`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`InvID`),
  ADD KEY `inv1` (`studID`),
  ADD KEY `inv2` (`courseID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registrationID`),
  ADD KEY `r1` (`courseID`),
  ADD KEY `r2` (`studID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `fk1` (`statusID`),
  ADD KEY `fk2` (`registrationID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `InvID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registrationID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `inv1` FOREIGN KEY (`studID`) REFERENCES `student` (`studID`),
  ADD CONSTRAINT `inv2` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `r1` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`),
  ADD CONSTRAINT `r2` FOREIGN KEY (`studID`) REFERENCES `student` (`studID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`statusID`) REFERENCES `status` (`statusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
