-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 06:27 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `TPO`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic10th_table`
--

CREATE TABLE `academic10th_table` (
  `admission_number` varchar(15) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `board` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic10th_table`
--

INSERT INTO `academic10th_table` (`admission_number`, `school_name`, `board`, `year`, `percentage`) VALUES
('2016bec1071', 'Baal Baari Public School Sr. Sec. Modinagar, Gzb.', 'CBSE', 2013, '74.10');

-- --------------------------------------------------------

--
-- Table structure for table `academic12th_table`
--

CREATE TABLE `academic12th_table` (
  `admission_number` varchar(15) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `board` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `percentage` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic12th_table`
--

INSERT INTO `academic12th_table` (`admission_number`, `school_name`, `board`, `year`, `percentage`) VALUES
('2016bec1071', 'Baal Baari Public School Sr. Sec. Modinagar, Gzb.', 'CBSE', 2015, '86.00');

-- --------------------------------------------------------

--
-- Table structure for table `academicbtech_table`
--

CREATE TABLE `academicbtech_table` (
  `admission_number` varchar(15) NOT NULL,
  `semester` int(2) NOT NULL,
  `sgpa` varchar(10) NOT NULL DEFAULT 'N/A',
  `percentage` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academicbtech_table`
--

INSERT INTO `academicbtech_table` (`admission_number`, `semester`, `sgpa`, `percentage`) VALUES
('2016bec1071', 1, '8.54', 83.00),
('2016bec1071', 2, '9.29', 86.99),
('2016bec1071', 3, 'N/A', 81.60),
('2016bec1071', 4, 'N/A', 83.10),
('2016bec1071', 5, 'N/A', 0.00),
('2016bec1071', 6, 'N/A', 0.00),
('2016bec1071', 7, 'N/A', 0.00),
('2016bec1071', 8, 'N/A', 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `company_registration_table`
--

CREATE TABLE `company_registration_table` (
  `admission_number` varchar(15) NOT NULL,
  `opening_id` int(10) NOT NULL,
  `registration_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_registration_table`
--

INSERT INTO `company_registration_table` (`admission_number`, `opening_id`, `registration_time`) VALUES
('2016bec1071', 1, '2018-07-17 10:31:37'),
('2016bec1071', 2, '2018-07-17 11:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `company_table`
--

CREATE TABLE `company_table` (
  `opening_id` int(10) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_profile` varchar(50) NOT NULL,
  `branches_allowed` varchar(100) NOT NULL,
  `package` decimal(5,2) NOT NULL,
  `registration_deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_table`
--

INSERT INTO `company_table` (`opening_id`, `company_name`, `company_profile`, `branches_allowed`, `package`, `registration_deadline`) VALUES
(1, 'Fidelity', 'Software Engineer', 'ECE', '15.00', '2018-07-18 00:00:00'),
(2, 'Philips', 'Software Engineer', 'ECE, CSE.', '12.00', '2018-07-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `intern_table`
--

CREATE TABLE `intern_table` (
  `admission_number` varchar(15) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern_table`
--

INSERT INTO `intern_table` (`admission_number`, `organization`, `description`) VALUES
('2016bec1071', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_table`
--

CREATE TABLE `login_table` (
  `admission_number` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_table`
--

INSERT INTO `login_table` (`admission_number`, `password`, `user_type`) VALUES
('2016bec1071', '2016bec1071', 'user'),
('admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `personalinfo_table`
--

CREATE TABLE `personalinfo_table` (
  `admission_number` varchar(15) NOT NULL,
  `dob` date DEFAULT NULL,
  `linkedin` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `residential_status` varchar(15) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `present_address` text NOT NULL,
  `permanent_address` text NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `personalinfo_table`
--

INSERT INTO `personalinfo_table` (`admission_number`, `dob`, `linkedin`, `gender`, `category`, `pwd`, `residential_status`, `guardian`, `present_address`, `permanent_address`, `marital_status`, `state`, `country`) VALUES
('2016bec1071', '1999-02-11', 'https://www.linkedin.com/in/aakashverma1124/', 'Male', 'OBC', 'No', 'Hosteller', 'Anil Kumar', 'RKB F-20, Boys Hostel, ABES Engineering College, Ghaziabad.', 'Village + Post Kazmabad Goon, Mohiuddinpur, Distt. Meerut, 250205.', 'No', 'Uttar Pradesh', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `photoresume_table`
--

CREATE TABLE `photoresume_table` (
  `admission_number` varchar(15) NOT NULL,
  `photo_url` varchar(150) NOT NULL,
  `resume_url` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE `project_table` (
  `admission_number` varchar(15) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_table`
--

INSERT INTO `project_table` (`admission_number`, `title`, `description`) VALUES
('2016bec1071', '1. Training Placement Office (TPO) Portal.', '1. TPO Portal is the online portal where students can fill their personal and academic details.\nCurrent openings in the companies are indicated on the portal where students can apply for the companies.\nPortal provides the functionalities such as resume/photo upload, password change, registering of companies etc.\nTechnologies Used:\nHTML, CSS, Bootstrap, Javascript, PHP and MySQL.');

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `admission_number` varchar(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(20) NOT NULL,
  `year` int(1) NOT NULL,
  `email` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `personal_info_verified` varchar(15) NOT NULL DEFAULT 'NO',
  `academic_info_verified` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_table`
--

INSERT INTO `student_table` (`admission_number`, `name`, `course`, `year`, `email`, `branch`, `personal_info_verified`, `academic_info_verified`) VALUES
('2016bec1071', 'Aakash Verma', 'B.Tech.', 3, 'aakash.16bec1071@abes.ac.in', 'ECE', 'YES', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic10th_table`
--
ALTER TABLE `academic10th_table`
  ADD PRIMARY KEY (`admission_number`);

--
-- Indexes for table `academic12th_table`
--
ALTER TABLE `academic12th_table`
  ADD PRIMARY KEY (`admission_number`);

--
-- Indexes for table `company_table`
--
ALTER TABLE `company_table`
  ADD PRIMARY KEY (`opening_id`);

--
-- Indexes for table `login_table`
--
ALTER TABLE `login_table`
  ADD PRIMARY KEY (`admission_number`);

--
-- Indexes for table `personalinfo_table`
--
ALTER TABLE `personalinfo_table`
  ADD PRIMARY KEY (`admission_number`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`admission_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company_table`
--
ALTER TABLE `company_table`
  MODIFY `opening_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
