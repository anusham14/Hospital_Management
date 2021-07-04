-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 08:09 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `apt_id` int(11) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `fees` double NOT NULL,
  `pid` int(11) NOT NULL,
  `date_of_apt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`apt_id`, `doc_id`, `fees`, `pid`, `date_of_apt`) VALUES
(20220, 101, 200, 4, '2021-06-05'),
(20221, 103, 100, 5, '2021-06-05'),
(20223, 100, 1200, 2, '2021-05-29'),
(20224, 100, 1200, 4, '2021-05-29'),
(20225, 101, 200, 4, '2021-06-26'),
(20226, 100, 1200, 1, '2021-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sp` varchar(30) NOT NULL,
  `phno` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `rpass` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `fees` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `sp`, `phno`, `email`, `pass`, `rpass`, `dob`, `doj`, `gender`, `fees`) VALUES
(100, 'Anusha Maiti', 'Gynaecologist', '9334465973', 'anushamr141022@gmail.com', 'anu123', 'anu123', '1980-05-14', '2004-01-21', 'female', 1200),
(101, 'Malina Chowdhary', 'Child Specialist', '8140256051', 'malinagaeno@yahoo.co.in', 'malinacg@', 'malinacg@', '1985-07-12', '2009-01-01', 'female', 100),
(102, 'Anisha', 'Cardiologist', '9334462273', 'anusha41022@gmail.com', '12345678', '12345678', '2009-02-04', '2021-05-20', 'female', 10000),
(103, 'Rahul Verma', 'Child Specialist', '9372549321', 'docverma@gmail.com', 'rverm@', 'rverm@', '1981-05-13', '2005-06-15', 'male', 200),
(104, 'Arya Vanshini', 'Orthopedic', '8140256022', 'aryaortho@gmail.com', 'aryavan#', 'aryavan#', '1989-07-31', '2015-10-17', 'female', 500),
(106, 'Amal Prakash', 'Neurologist', '9537294965', 'prakashamal@yahoo.co.in', 'prak12@m', 'prak12@m', '1976-09-22', '2005-11-19', 'male', 10000),
(107, 'Sreekumar S', 'Neurologist', '7296342506', 'sreekum09@gmail.com', 'sree09kum', 'sree09kum', '1978-06-18', '2010-12-14', 'male', 10000),
(108, 'Nitha S Nair', 'Dentist', '7596922549', 'nithaa2701@gmail.com', 'nitha#27', 'nitha#27', '1992-01-27', '2018-08-21', 'female', 100);

-- --------------------------------------------------------

--
-- Table structure for table `medhistory`
--

CREATE TABLE `medhistory` (
  `med_id` int(5) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `medreport` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medhistory`
--

INSERT INTO `medhistory` (`med_id`, `doc_id`, `p_id`, `p_name`, `medreport`) VALUES
(10, 100, 1, 'Anusha Maiti', 'hsugar,hbp,lipid,Nil,'),
(21, 100, 2, 'Sritabh Priyadarshi', 'hsugar,hbp,Nil,'),
(23, 100, 2, 'Sritabh Priyadarshi', 'hsugar,Nil,'),
(25, 100, 1, 'Anusha Maiti', 'BP normal,'),
(26, 100, 7, 'Srija S', 'Digestion , Vomitting ,'),
(27, 100, 2, 'Sritabh Priyadarshi', 'cough and cold,'),
(28, 100, 7, 'Srija S', 'cough and cold,');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phno` varchar(10) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(25) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `phno`, `password`, `gender`, `dob`, `address`) VALUES
(1, 'Anusha Maiti', '9334465973', 'anusha143', 'female', '2001-05-14', 'K-170 shyamali colony Ranchi -2'),
(2, 'Sritabh Priyadarshi', '7360659748', 'sobydany@', 'male', '2000-10-02', 'Opal homes, CUSAT,Kochi'),
(4, 'Sunidhi Agarwal', '8102103513', 'sunidhi2907', 'female', '2001-07-29', 'Amaravati apt, near ICICI bank,lalpur , Ranchi-02'),
(5, 'Alen', '7890456320', 'alen145', 'not', '2021-05-08', 'xyz colony , house 4 , kochi'),
(6, 'Arpita Choudhary', '8340256320', 'arpi_ta', 'female', '1998-01-05', 'L-28 shyamali colony Ranchi -834002 Jharkhand'),
(7, 'Srija S', '9776549221', 'srij@192', 'female', '1995-02-19', 'Hidayath Nagar , HMT , North Kalamessary ,Kochi, Kerala'),
(11, '', '', '', '', '0000-00-00', ''),
(12, 'asri', '8140256025', 'asri', 'male', '2004-02-14', 'Hidayath nagar, house 4 , kochi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`apt_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medhistory`
--
ALTER TABLE `medhistory`
  ADD PRIMARY KEY (`med_id`),
  ADD KEY `doc_id` (`doc_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `apt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20227;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `medhistory`
--
ALTER TABLE `medhistory`
  MODIFY `med_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`pid`) REFERENCES `patients` (`id`);

--
-- Constraints for table `medhistory`
--
ALTER TABLE `medhistory`
  ADD CONSTRAINT `medhistory_ibfk_1` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`id`),
  ADD CONSTRAINT `medhistory_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `patients` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
