-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2021 at 06:03 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle insurance`
--

-- --------------------------------------------------------

--
-- Table structure for table `agency`
--

CREATE TABLE `agency` (
  `a_id` int(9) NOT NULL,
  `aname` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agency`
--

INSERT INTO `agency` (`a_id`, `aname`, `password`, `email`, `address`, `phno`) VALUES
(111, 'MotorCaretakers', '111', 'xyz@gmail.com', 'Banglore', '9999999999'),
(222, 'Automotors', '222', 'zzz@gmail.com', 'Hyderabad', '8888888888'),
(333, 'policybazar', '333', 'yyy@gmail.com', 'Banglore', '7777777777');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE `insurance` (
  `ino` int(9) DEFAULT NULL,
  `iname` varchar(20) DEFAULT NULL,
  `amount` int(30) DEFAULT NULL,
  `duration` int(10) DEFAULT NULL,
  `a_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insurance`
--

INSERT INTO `insurance` (`ino`, `iname`, `amount`, `duration`, `a_id`) VALUES
(1, 'car', 85000, 5, 111),
(2, 'bike', 90000, 5, 222),
(3, 'scooty', 100000, 7, 333);

--
-- Triggers `insurance`
--
DELIMITER $$
CREATE TRIGGER `deleteLog` BEFORE DELETE ON `insurance` FOR EACH ROW INSERT INTO logs VALUES(null, OLD.iname, OLD.ino, 'DELETED', NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `deleted_insurance` AFTER DELETE ON `insurance` FOR EACH ROW INSERT INTO old_insurance
SET ino=OLD.ino,
iname=OLD.iname,
amount=OLD.amount,
a_id=OLD.a_id
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER INSERT ON `insurance` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.iname, NEW.ino, 'INSERTED', NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `ino` int(9) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `iname`, `ino`, `action`, `cdate`) VALUES
(1, 'bike', 2, 'DELETED', '2021-01-28 19:31:15'),
(2, 'car', 1, 'DELETED', '2021-01-28 19:31:16'),
(3, 'car', 1, 'INSERTED', '2021-01-28 19:31:34'),
(4, 'bike', 2, 'INSERTED', '2021-01-28 19:31:50'),
(5, 'scooty', 3, 'INSERTED', '2021-01-28 19:32:03'),
(6, 'bus', 4, 'INSERTED', '2021-01-28 19:32:14'),
(7, 'bus', 4, 'DELETED', '2021-01-28 19:33:48'),
(8, 'bus', 4, 'INSERTED', '2021-01-29 13:54:08'),
(9, 'bus', 4, 'DELETED', '2021-01-29 13:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `old_insurance`
--

CREATE TABLE `old_insurance` (
  `ino` int(9) NOT NULL,
  `iname` varchar(20) NOT NULL,
  `amount` int(20) NOT NULL,
  `a_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `old_insurance`
--

INSERT INTO `old_insurance` (`ino`, `iname`, `amount`, `a_id`) VALUES
(2, 'bike', 40000, 222),
(1, 'car', 10000, 111),
(4, 'bus', 150000, 111),
(4, 'bus', 180000, 222);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `u_id` int(10) DEFAULT NULL,
  `p_no` int(10) DEFAULT NULL,
  `amount` varchar(20) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `a_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`u_id`, `p_no`, `amount`, `p_date`, `a_id`) VALUES
(0, 1, '10000', '0000-00-00', 222),
(0, 2, '3000', '0000-00-00', 111),
(0, 3, '25000', '0000-00-00', 111),
(0, 4, '10000', '0000-00-00', 222),
(0, 5, '5000', '0000-00-00', 222),
(0, 6, '25000', '0000-00-00', 111),
(0, 7, '10000', '0000-00-00', 222),
(0, 8, '10000', '0000-00-00', 222),
(0, 9, '17000', '0000-00-00', 333);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(9) NOT NULL,
  `reg_no` int(9) DEFAULT NULL,
  `reg_date` varchar(20) DEFAULT NULL,
  `reg_status` varchar(20) DEFAULT NULL,
  `ino` int(9) DEFAULT NULL,
  `u_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_no`, `reg_date`, `reg_status`, `ino`, `u_id`) VALUES
(5, 1, '14th  January - 2021', 'Accepted', 1, 1234),
(6, 2, '14th  January - 2021', 'Accepted', 2, 2345),
(7, 3, '14th  January - 2021', 'Accepted', 4, 8888),
(8, 4, '14th  January - 2021', 'Accepted', 3, 9999),
(9, 5, '14th  January - 2021', 'Accepted', 1, 7777),
(10, 6, '14th  January - 2021', 'Accepted', 2, 7777),
(11, 7, '15th  January - 2021', 'Accepted', 3, 786),
(12, 8, '15th  January - 2021', 'Rejected', 1, 7890),
(13, 9, '15th  January - 2021', 'Accepted', 1, 2345),
(14, 10, '28th  January - 2021', 'Accepted', 4, 890),
(15, 11, '28th  January - 2021', 'Accepted', 1, 890),
(16, 12, '29th  January - 2021', 'Accepted', 1, 9999);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(10) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `aadhar` varchar(12) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `password`, `aadhar`, `address`, `email`, `phno`) VALUES
(1, 'veda', 'veda', '789078907890', 'bangalore', 'veda@gmail.com', '7890789000'),
(2, 'taj', 'taj', '123456789012', 'bangalore', 'taj@gmail.com', '5555555555'),
(3, 'akshatha', 'akshatha', '123454321111', 'udupi', 'ramya@gmail.com', '9090909090'),
(4, 'xxx', 'xxx', '456456456456', 'hyderabad', 'xxxx@gmail.com', '8080808080'),
(5, 'soujanya', 'soujanya', '666666666666', 'mangalore', 'souju@gmail.com', '6565656565'),
(6, 'rakshitha', 'rakshitha', '454545454545', 'udupi', 'rak@gmail.com', '9789877890'),
(7, 'farhan', 'farhan', '999999999999', 'bangalore', 'farhan@gmail.com', '9999999999'),
(8, 'ramya', 'ramya', '123409876543', 'hyderabad', 'ramya@gmail.com', '7890789000'),
(9, 'sumaiya', 'sumaiya', '888888888888', 'Chennai', 'sumai@gmail.com', '9876543210'),
(10, 'x', 'x', '098789098789', 'udupi', 'x@gmail.com', '9098789809');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `veh_id` int(20) NOT NULL,
  `veh_no` varchar(20) NOT NULL,
  `veh_type` varchar(20) NOT NULL,
  `veh_desc` varchar(20) NOT NULL,
  `u_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`veh_id`, `veh_no`, `veh_type`, `veh_desc`, `u_id`) VALUES
(1, 'ka-108989', '2 wheeler', 'DL-6666', 8888),
(2, 'ka-209876', '6 wheeler', 'DL-9999', 9999),
(3, 'ka-119876', '4 wheeler', 'DL-0909', 7777);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`veh_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `veh_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
