-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 05:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messman`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'mess');

-- --------------------------------------------------------

--
-- Table structure for table `inmate`
--

CREATE TABLE `inmate` (
  `iid` varchar(11) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `dues` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inmate`
--

INSERT INTO `inmate` (`iid`, `fname`, `lname`, `dues`) VALUES
('b140047cs', 'Brad', 'Pitt', 0),
('b140053cs', 'Athira', 'Reddy', 0),
('b150030cs', 'Jorge', 'F', 0),
('b160034cs', 'Adesh', 'Srivastava', 0),
('b16046cs', 'Francis', 'Rahul', 0),
('b160473cs', 'David', 'Fincher', 0),
('m140061ca', 'Sonali', 'Rawat', 0),
('m150030ca', 'Rahul', 'Kumar', 202),
('m150031ca', 'Akash', 'singh', 0),
('m150032ca', 'Neha', 'Sharma', 0),
('m150033ca', 'Ashwani', 'Kulkarni', 0),
('m150035ca', 'Pooja', 'Singh', 0),
('m150044cs', 'Jack', 'Jones', 0),
('m150053cs', 'Pratyush', 'Agarwal', 0),
('m150055ca', 'Diwakar', 'Prajapati', 0),
('m150065ca', 'Amit', 'Soni', 0),
('m150431ca', 'Apurva', 'kumar', 0),
('m150432ca', 'Ravi', 'Jadli', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `sid` varchar(11) NOT NULL,
  `sname` varchar(30) NOT NULL,
  `squan` int(11) DEFAULT NULL,
  `sprice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`sid`, `sname`, `squan`, `sprice`) VALUES
('s01', 'Lays', 10, 22),
('s02', 'Dark Fantasy', 7, 50),
('s03', 'Curd', 13, 23),
('s04', 'Coke', 12, 35),
('s05', 'Parley Biscuits', 22, 10),
('s06', 'Minute Maid', 2, 40),
('s07', 'Peda Sweet', 21, 5),
('s08', 'Dairy Milk Silk', 7, 60),
('s09', 'Maggi', 12, 12),
('s10', '50-50 Bisc', 22, 20),
('s11', 'Rusk', 34, 40),
('s12', 'Chana Masala', 16, 15),
('s13', 'Bourbon', 13, 30),
('s14', 'Oats', 9, 160),
('s15', 'Amul Milk', 12, 30),
('s16', 'Sofit Shake', 14, 35),
('s17', 'Orange Juice', 29, 35),
('s18', 'Ice cream', 12, 30),
('s19', 'Nutri Choice', 16, 50),
('s20', 'Oreo', 18, 35);

-- --------------------------------------------------------

--
-- Table structure for table `transact`
--

CREATE TABLE `transact` (
  `iid` varchar(11) NOT NULL,
  `sid` varchar(11) NOT NULL,
  `iquant` int(11) NOT NULL,
  `rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transact`
--

INSERT INTO `transact` (`iid`, `sid`, `iquant`, `rate`) VALUES
('m150030ca', 's20', 1, 35),
('m150030ca', 's19', 1, 50),
('m150030ca', 's17', 1, 35),
('m150030ca', 's13', 1, 30),
('m150030ca', 's10', 2, 40),
('m150030ca', 's09', 1, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `inmate`
--
ALTER TABLE `inmate`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `transact`
--
ALTER TABLE `transact`
  ADD KEY `iid` (`iid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `iid_2` (`iid`),
  ADD KEY `iid_3` (`iid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transact`
--
ALTER TABLE `transact`
  ADD CONSTRAINT `transact_ibfk_1` FOREIGN KEY (`iid`) REFERENCES `inmate` (`iid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transact_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `stocks` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
